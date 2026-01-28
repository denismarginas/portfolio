document.addEventListener("DOMContentLoaded", function() {
    function parseDate(dateString) {
        const [day, month, year] = dateString.split('.').map(Number);
        return new Date(year, month - 1, day);
    }

    function calculateWorkTime(startDate, endDate) {
        const start = new Date(startDate);
        const end = new Date(endDate);

        let years = end.getFullYear() - start.getFullYear();
        let months = end.getMonth() - start.getMonth();
        let days = end.getDate() - start.getDate();

        if (days < 0) {
            months--;
            const prevMonth = new Date(end.getFullYear(), end.getMonth(), 0);
            days += prevMonth.getDate();
        }

        if (months < 0) {
            years--;
            months += 12;
        }

        if (days > 28) {
            months++;
            days = 0;
        }

        return { years, months, days };
    }

    document.querySelectorAll('.dm-job').forEach(job => {
        const workDateLists = job.querySelectorAll('.work-details .work-data .work-dates');

        let totalYears = 0;
        let totalMonths = 0;
        let totalDays = 0;

        workDateLists.forEach(workDates => {
            const dateItems = workDates.querySelectorAll('li');

            if (dateItems.length === 3) {
                const startDateText = dateItems[0]?.textContent.trim();
                const endDateText = dateItems[2]?.textContent.trim();

                const startDate = parseDate(startDateText);
                const endDate = endDateText === "In progress" ? new Date() : parseDate(endDateText);

                if (startDate && endDate) {
                    const { years, months, days } = calculateWorkTime(startDate, endDate);
                    totalYears += years;
                    totalMonths += months;
                    totalDays += days;

                    if (totalDays >= 30) {
                        totalMonths += Math.floor(totalDays / 30);
                        totalDays = totalDays % 30;
                    }

                    if (totalMonths >= 12) {
                        totalYears += Math.floor(totalMonths / 12);
                        totalMonths = totalMonths % 12;
                    }
                }
            }
        });

        if (!job.querySelector('.work-details .work-data .work-time')) {
            const workTimeHTML = `
                <li>
                    <ul class="work-time">
                        <li data-motion="transition-fade-1 transition-slideInLeft-1" data-duration="1s" data-delay="0.1s">
                            <p>Work Time:</p>
                        </li>
                        ${totalYears > 0 ? `
                        <li data-motion="transition-fade-1 transition-slideInLeft-1" data-duration="1.2s" data-delay="0.2s">
                            <span class="nr-circle years-nr">${totalYears}</span>
                            <span class="time-text">${totalYears > 1 ? 'Years' : 'Year'}</span>
                        </li>` : ''}
                        ${totalMonths > 0 ? `
                        <li data-motion="transition-fade-1 transition-slideInLeft-1" data-duration="1.2s" data-delay="0.3s">
                            <span class="nr-circle months-nr">${totalMonths}</span>
                            <span class="time-text">${totalMonths > 1 ? 'Months' : 'Month'}</span>
                        </li>` : ''}
                    </ul>
                </li>`;

            const workDetails = job.querySelector('.work-details .work-data');
            if (workDetails) {
                workDetails.insertAdjacentHTML('afterbegin', workTimeHTML);
            }
        }
    });
});
