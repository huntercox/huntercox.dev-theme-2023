<?php
# CPT for Employers is added within ACF Pro

function hsc_is_current_employer($employer_id)
{
	// check if the current employer post has current-employer box checked

	// Employment Dates > Current Employer
	$employment_dates = get_field('employment_dates', $employer_id);
	$current_employer = $employment_dates['current_employer'];

	if ($current_employer == false) {
		return false;
	}

	// if so, return true
	return true;
}

/**
 * @param array $employment_dates array containing start_date and end_date
 * return string $length_of_employment
 */
function hsc_get_length_of_employment($employment_dates)
{
	$start_date = $employment_dates['start_date'];
	$end_date = $employment_dates['end_date'];

	$start = new DateTime($start_date);
	$end = new DateTime($end_date);

	$duration = $start->diff($end);

	// Access the time difference properties
	$years = $duration->y;
	$months = $duration->m;
	$days = $duration->d;

	// Round up the days to the nearest month if it's more than 15 days
	if ($days > 15) {
		$months += 1;
		if ($months == 12) {
			$months = 0;
			$years += 1;
		}
	}

	$length_of_employment = 'Length of Time: {$years} years and {$months} months.';

	return $length_of_employment;
}
