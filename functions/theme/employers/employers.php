<?php
# CPT for Employers is added within ACF Pro

function hsc_is_current_employer($employer_id)
{
	// check if the current employer post has current-employer box checked

	// Employment Dates > Current Employer
	$length_of_employment = get_field('status', $employer_id);
	$dates = $length_of_employment['dates'];
	$start_date = $dates['start_date'];
	$end_date = $dates['end_date'];

	$current_employer = $length_of_employment['current_employer'];

	if ($current_employer == false) {
		return false;
	}

	// if so, return true
	return true;
}
