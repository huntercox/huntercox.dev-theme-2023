<?php
/*  */
add_action('admin_enqueue_scripts', 'enqueue_admin_custom_scripts');
function enqueue_admin_custom_scripts($hook)
{
	if ('edit.php' !== $hook) {
		return;
	}

	wp_enqueue_script('admin-custom', get_template_directory_uri() . '/assets/src/js/admin-custom.js', array('jquery'), '1.0.0', true);
}

/* Add the column */
add_filter('manage_edit-employer_columns', 'add_start_date_column');
function add_start_date_column($columns)
{
	$columns['start_date'] = 'Start Date';
	return $columns;
}

/* Populate the column */
add_action('manage_employer_posts_custom_column', 'display_start_date_column', 10, 2);
function display_start_date_column($column_name, $post_id)
{
	if ('start_date' === $column_name) {
		// Get the group field
		$employment_dates = get_field('employment_dates', $post_id);

		if ($employment_dates && isset($employment_dates['start_date'])) {
			$start_date = $employment_dates['start_date'];
			if ($start_date) {
				$date_string = $start_date;
				$date_object = DateTime::createFromFormat('m/d/Y', $date_string);
				$formatted_date = $date_object->format('M. Y');
				echo $formatted_date;
			}
		} else {
			echo '-';
		}
	}
}

/* Make the column sortable */
add_filter('manage_edit-employer_sortable_columns', 'make_start_date_column_sortable');
function make_start_date_column_sortable($columns)
{
	$columns['start_date'] = 'start_date';
	return $columns;
}

/* Sort the column */
add_action('pre_get_posts', 'sort_by_start_date');
function sort_by_start_date($query)
{
	if (!is_admin() || !$query->is_main_query()) {
		return;
	}

	$orderby = $query->get('orderby');

	if ('start_date' === $orderby) {
		$query->set('meta_key', 'employment_dates_start_date');
		$query->set('orderby', 'meta_value');
		$query->set('order', 'ASC'); // Change 'ASC' to 'DESC' for descending order
	}
}
