<?php

if(!isset($jobs)) :
    $jobs = getDataJson('data-items-jobs', 'data');
endif;


// Initialize variables
$earliestStartDate = null;
$latestEndDate = null;

// Loop through jobs to find earliest start date and latest end date
foreach ($jobs as $job) :
    // Skip jobs with "display" set to false
    if ($job["display"] != "true") :
        continue;
    endif;

    $startDate = DateTime::createFromFormat('d.m.Y', $job['date_start']);
    $endDate = ($job['date_end'] === 'In progress') ? new DateTime() : DateTime::createFromFormat('d.m.Y', $job['date_end']);

    // Check for earliest start date
    if ($earliestStartDate === null || $startDate < $earliestStartDate) :
        $earliestStartDate = $startDate;
    endif;

    // Check for latest end date
    if ($latestEndDate === null || $endDate > $latestEndDate) :
        $latestEndDate = $endDate;
    endif;
endforeach;

// Format dates for display
$earliestStartDateDisplay = ($earliestStartDate !== null) ? $earliestStartDate->format('m.Y') : 'N/A';
$latestEndDateDisplay = ($latestEndDate !== null) ? $latestEndDate->format('m.Y') : 'In progress';
?>


<div class="dm-jobs-grid" data-motion="transition-fade-0">

    <div class="work-timeline">
        <?php

        if ($earliestStartDate !== null && $latestEndDate !== null) :
            $startYear = (int)$earliestStartDate->format('Y');
            $endYear = (int)$latestEndDate->format('Y');


            for ($currentYear = $startYear; $currentYear <= $endYear; $currentYear++) :
                echo '<div class="year">';
                echo '<span>' . $currentYear . '</span>';

                // Loop through each month in the current year
                for ($month = 1; $month <= 12; $month++) :
                    $currentDate = new DateTime("$currentYear-$month-01");

                    echo '<div class="month">';
                    echo '<span>' . $currentDate->format('M.Y') . '</span>';
                    echo '</div>';
                endfor;

                echo '</div>';
            endfor;
        endif;
        ?>
    </div>

    <div class="jobs-timeline">
        <?php

        if ($earliestStartDate !== null && $latestEndDate !== null) :
            $startYear = (int)$earliestStartDate->format('Y');
            $endYear = (int)$latestEndDate->format('Y');

            for ($currentYear = $startYear; $currentYear <= $endYear; $currentYear++) :
                echo '<div class="year">';
                echo '<span>' . $currentYear . '</span>';

                // Loop through each month in the current year
                for ($month = 1; $month <= 12; $month++) :
                    $currentDate = new DateTime("$currentYear-$month-01");
                    $daysWorkedInMonth = calculateDaysWorkedInMonth($currentDate, $jobs);

                    if ($daysWorkedInMonth >= 28) :
                        echo '<div class="month worked">';
                    else :
                        echo '<div class="month">';
                    endif;

                    echo '<span>' . $currentDate->format('M.Y') . '</span>';
                    echo '</div>';
                endfor;

                echo '</div>';
            endfor;
        endif;
        ?>
    </div>

    <?php
    $total_experience_years = 0;
    $total_experience_months = 0;
    $total_timeline_days = 0;

    $job_periods = array();

    foreach ($jobs as $job) :
        // Skip jobs where "display" is not equal to "true"
        if ($job["display"] != "true") :
            continue;
        endif;

        $startDate = DateTime::createFromFormat('d.m.Y', $job["date_start"]);
        $endDate = ($job["date_end"] === "In progress" || $job["date_end"] === "Working")
            ? new DateTime() // If job is in progress, use current date as end date
            : DateTime::createFromFormat('d.m.Y', $job["date_end"]);

        $experience_interval = $startDate->diff($endDate);
        $experience_years = $experience_interval->y;
        $experience_months = $experience_interval->m;

        $total_experience_years += $experience_years;
        $total_experience_months += $experience_months;

        // Store the job period
        $job_periods[] = array('start' => $startDate, 'end' => $endDate);
    endforeach;

    // Correct total timeline by handling overlapping periods
    foreach ($job_periods as $key => $period) :
        $total_timeline_interval = $period['start']->diff($period['end']);
        $total_timeline_days += $total_timeline_interval->days;

        // Check for overlapping periods
        for ($i = $key + 1; $i < count($job_periods); $i++) :
            $overlap_start = max($period['start'], $job_periods[$i]['start']);
            $overlap_end = min($period['end'], $job_periods[$i]['end']);

            if ($overlap_start < $overlap_end) :
                $overlap_interval = $overlap_start->diff($overlap_end);
                $total_timeline_days -= $overlap_interval->days;
            endif;
        endfor;
    endforeach;

    // Convert total experience months into years if they exceed 12
    $total_experience_years += floor($total_experience_months / 12); // Convert excess months to years
    $total_experience_months = $total_experience_months % 12; // Remaining months

    // Convert total timeline days to months and years
    $total_timeline_years = floor($total_timeline_days / 365);
    $total_timeline_months = floor(($total_timeline_days % 365) / 30);

    // Display the results
    if ($total_experience_years > 0 || $total_experience_months > 0) :
        ?>
        <p>
            <span>Total Work Experience: </span>
            <span><?php echo $total_experience_years; ?></span>
            <span> years, </span>
            <span><?php echo $total_experience_months; ?></span>
            <span> months</span>
        </p>
    <?php endif; ?>

    <?php
    if ($total_timeline_years > 0 || $total_timeline_months > 0) :
        ?>
        <p>
            <span>Total Work Timeline: </span>
            <span><?php echo $total_timeline_years; ?></span>
            <span> years, </span>
            <span><?php echo $total_timeline_months; ?></span>
            <span> months</span>
        </p>
    <?php endif; ?>


</div>
