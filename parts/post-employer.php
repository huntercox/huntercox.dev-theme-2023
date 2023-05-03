<?php
$classes = '';
if (hsc_is_current_employer($post->ID)) {
	$classes .= ' employer--current';
}
$classes .= ' employer--' . $post->post_name;

echo '<div class="employer' . esc_attr($classes) . '">';

/* Employer Name */
$employer_name = $post->post_title;
echo '<h2 class="employer__name">' . $employer_name . '</h2>';

$employment_dates = get_field('employment_dates', $post->ID);
$employment_start_date = $employment_dates['start_date'];
$employment_end_date = '';

echo '<div class="employer__dates">';

// Start & End Date
if ($employment_start_date) {
	echo '<div class="employer__dates__start-date">';
	echo 'Start Date: ' . $employment_start_date;
	echo '</div>';
}

if (!hsc_is_current_employer($post->ID)) {
	$employment_end_date = $employment_dates['end_date'];

	if ($employment_end_date) {
		echo '<div class="employer__dates__end-date">';
		echo 'End Date: ' . $employment_end_date;
		echo '</div>';
	}
}

// Length of Time Employed
if ($employment_start_date && $employment_end_date) {
	$employment_dates = array(
		'start_date' => $employment_start_date,
		'end_date' => $employment_end_date
	);
	$length_of_employment = hsc_get_length_of_employment($employment_dates);
	echo $length_of_employment;
}

echo '</div>';

echo '</div>';
