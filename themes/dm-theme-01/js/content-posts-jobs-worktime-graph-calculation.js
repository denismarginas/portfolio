document.addEventListener("DOMContentLoaded", function() {

    // Construct jobs object from HTML
    const jobs = [];

    document.querySelectorAll('.dm-job').forEach(jobElement => {
        const companyName = jobElement.querySelector('.company-name').textContent.trim();

        const workIntervals = jobElement.querySelectorAll('.work-details .work-time-type .work-dates');
        const worktimetype = [];

        workIntervals.forEach(workInterval => {
            const workTimes = workInterval.querySelectorAll('li');

            let dateStart = null;
            let dateEnd = null;

            workTimes.forEach((li) => {
                const date = li.textContent.trim();

                // Skip if date is "-" or "In progress"
                if (date === "-") {
                    return;
                }

                if (!dateStart) {
                    dateStart = date;
                }
                // Assign date to dateEnd only if it's a valid date and not "In progress"
                dateEnd = date;
            });

            // Push only if both start and end dates are available
            if (dateStart && dateEnd) {
                worktimetype.push({ date_start: dateStart, date_end: dateEnd });
            }
        });

        let date_start = null;
        let date_end = null;

        const workSummary = jobElement.querySelector('.work-summary .work-dates');

        if (workSummary) {
            const workDates = workSummary.querySelectorAll('li');

            workDates.forEach((li) => {
                const date = li.textContent.trim();

                if (date === "-") {
                    return;
                }

                if (!date_start) {
                    date_start = date;
                }
                // If the date is "In progress", assign "In progress" to date_end
                if (date === "In progress") {
                    date_end = "In progress";
                } else {
                    date_end = date;
                }
            });
        }

        const display = "true";

        jobs.push({
            companyName,
            worktimetype,
            date_start,
            date_end,
            display
        });
    });

    function calculateDaysWorkedInMonth(currentDate, jobs) {
        let daysWorked = 0;

        jobs.forEach(job => {
            if (job.display !== "true") {
                return;
            }

            const jobStartDate = parseDate(job.date_start);
            const jobEndDate = (job.date_end === "In progress" || job.date_end === "Working") ? new Date() : parseDate(job.date_end);

            const monthStart = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
            const monthEnd = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

            const overlapStart = jobStartDate > monthStart ? jobStartDate : monthStart;
            const overlapEnd = jobEndDate < monthEnd ? jobEndDate : monthEnd;

            if (overlapStart <= overlapEnd) {
                const interval = (overlapEnd - overlapStart) / (1000 * 60 * 60 * 24) + 1; // Include the end day
                daysWorked += interval;
            }
        });

        return daysWorked;
    }

    function calculateDateRanges(jobs) {
        let earliestStartDate = null;
        let latestEndDate = null;

        jobs.forEach(job => {
            if (job.display !== "true") {
                return;
            }

            let startDate = parseDate(job.date_start);
            let endDate = job.date_end === "In progress" ? new Date() : parseDate(job.date_end);

            if (earliestStartDate === null || startDate < earliestStartDate) {
                earliestStartDate = startDate;
            }

            if (latestEndDate === null || endDate > latestEndDate) {
                latestEndDate = endDate;
            }
        });

        const earliestStartDateDisplay = earliestStartDate ? formatDate(earliestStartDate) : 'N/A';
        const latestEndDateDisplay = latestEndDate ? formatDate(latestEndDate) : 'In progress';

        return { earliestStartDateDisplay, latestEndDateDisplay };
    }

    function parseDate(dateString) {
        const [day, month, year] = dateString.split('.');
        return new Date(`${year}-${month}-${day}`);
    }

    function formatDate(date) {
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${month < 10 ? '0' + month : month}.${year}`;
    }

    function generateTimeline(earliestStartDateDisplay, latestEndDateDisplay) {
        let timelineHTML = '<div class="work-timeline">';

        if (earliestStartDateDisplay !== 'N/A' && latestEndDateDisplay !== 'In progress') {
            const [startMonth, startYear] = earliestStartDateDisplay.split('.').map(num => parseInt(num, 10));
            const [endMonth, endYear] = latestEndDateDisplay.split('.').map(num => parseInt(num, 10));

            for (let currentYear = startYear; currentYear <= endYear; currentYear++) {
                timelineHTML += `<div class="year"><span>${currentYear}</span>`;

                for (let month = 1; month <= 12; month++) {
                    if ((currentYear > startYear || (currentYear === startYear && month >= startMonth)) &&
                        (currentYear < endYear || (currentYear === endYear && month <= endMonth))) {

                        const date = new Date(currentYear, month - 1);
                        const monthYear = date.toLocaleString('default', { month: 'short', year: 'numeric' });

                        timelineHTML += `<div class="month"><span>${monthYear}</span></div>`;
                    }
                }

                timelineHTML += '</div>';
            }
        }

        timelineHTML += '</div>';
        return timelineHTML;
    }

    function generateJobsTimeline(earliestStartDateDisplay, latestEndDateDisplay, jobs) {
        let timelineHTML = '<div class="jobs-timeline">';

        const [startMonth, startYear] = earliestStartDateDisplay.split('.').map(num => parseInt(num));
        const [endMonth, endYear] = latestEndDateDisplay.split('.').map(num => parseInt(num));

        for (let currentYear = startYear; currentYear <= endYear; currentYear++) {
            timelineHTML += `<div class="year"><span>${currentYear}</span>`;

            for (let month = 1; month <= 12; month++) {
                const currentDate = new Date(currentYear, month - 1, 1);

                const isBeforeStartMonth = currentYear === startYear && month < startMonth;
                const isAfterEndMonth = currentYear === endYear && month > endMonth;

                const isWorked = !(isBeforeStartMonth || isAfterEndMonth) && calculateDaysWorkedInMonth(currentDate, jobs) >= 28;

                timelineHTML += `<div class="month ${isWorked ? 'worked' : ''}">`;
                timelineHTML += `<span>${currentDate.toLocaleString('default', { month: 'short' })}.${currentYear}</span>`;
                timelineHTML += '</div>';
            }

            timelineHTML += '</div>';
        }

        timelineHTML += '</div>';

        return timelineHTML;
    }


    function renderExperienceTimeline(earliestStartDateDisplay, latestEndDateDisplay, jobs) {
        let totalExperienceYears = 0;
        let totalExperienceMonths = 0;
        let totalTimelineDays = 0;

        const jobPeriods = [];

        jobs.forEach(job => {
            if (job.display !== "true") return;

            const startDate = new Date(job.date_start.split('.').reverse().join('-'));
            let endDate;
            if (job.date_end === "In progress" || job.date_end === "Working") {
                endDate = new Date();
            } else {
                endDate = new Date(job.date_end.split('.').reverse().join('-'));
            }

            const diffTime = Math.abs(endDate - startDate);
            const diffDays = diffTime / (1000 * 60 * 60 * 24);
            const years = Math.floor(diffDays / 365);
            const months = Math.floor((diffDays % 365) / 30);

            totalExperienceYears += years;
            totalExperienceMonths += months;

            jobPeriods.push({ start: startDate, end: endDate });

            totalTimelineDays += diffDays;
        });

        totalExperienceYears += Math.floor(totalExperienceMonths / 12);
        totalExperienceMonths = totalExperienceMonths % 12;

        jobPeriods.forEach((period, key) => {
            for (let i = key + 1; i < jobPeriods.length; i++) {
                const overlapStart = new Date(Math.max(period.start, jobPeriods[i].start));
                const overlapEnd = new Date(Math.min(period.end, jobPeriods[i].end));

                if (overlapStart < overlapEnd) {
                    const overlapTime = Math.abs(overlapEnd - overlapStart);
                    const overlapDays = overlapTime / (1000 * 60 * 60 * 24);
                    totalTimelineDays -= overlapDays;
                }
            }
        });

        const totalTimelineYears = Math.floor(totalTimelineDays / 365);
        const totalTimelineMonths = Math.floor((totalTimelineDays % 365) / 30);

        let experienceHTML = '';
        if (totalExperienceYears > 0 || totalExperienceMonths > 0) {
            experienceHTML += `
            <p>
                <span>Total Work Experience: </span>
                <span>${totalExperienceYears}</span>
                <span> years, </span>
                <span>${totalExperienceMonths}</span>
                <span> months</span>
            </p>
        `;
        }

        let timelineHTML = '';
        if (totalTimelineYears > 0 || totalTimelineMonths > 0) {
            timelineHTML += `
            <p>
                <span>Total Work Timeline: </span>
                <span>${totalTimelineYears}</span>
                <span> years, </span>
                <span>${totalTimelineMonths}</span>
                <span> months</span>
            </p>
        `;
        }

        return experienceHTML + timelineHTML;
    }


    document.querySelectorAll('.dm-jobs-grid').forEach(grid => {
        const { earliestStartDateDisplay, latestEndDateDisplay } = calculateDateRanges(jobs);
        grid.innerHTML = '';

        const timelineHTML = generateTimeline(earliestStartDateDisplay, latestEndDateDisplay);
        grid.innerHTML = timelineHTML;

        const jobslineHTML = generateJobsTimeline(earliestStartDateDisplay, latestEndDateDisplay, jobs);
        grid.innerHTML += jobslineHTML;

        const experienceHTML = renderExperienceTimeline(earliestStartDateDisplay, latestEndDateDisplay, jobs);
        grid.innerHTML += experienceHTML;
    });



});
