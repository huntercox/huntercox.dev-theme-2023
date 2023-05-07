<?php
# CPT for Employers is added within ACF Pro

function hsc_is_current_employer($employer_id)
{
	// check if the current employer post has current-employer box checked

	// Employment Dates > Current Employer
	$status = get_field('status', $employer_id);

	if ($status) {

		$current_employer = $status['current_employer'];

		if ($current_employer == false) {
			return false;
		}

		// if so, return true
		return true;
	}
}
