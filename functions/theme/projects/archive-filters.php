<?php
function hsc_projects_filters_function()
{

	$formdata = $_POST;

	$response = '';

	$args = array(
		'post_type' => 'project',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'order' => 'desc',
	);

	if (isset($formdata['category']) && $formdata['category'][0]['name'] != 'all') {

		$categories = [];
		foreach ($formdata['category'] as $category) {
			$categories[] = $category['name'];
		}

		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $categories,
			)
		);
	}

	// Date
	if (isset($formdata['date']) && $formdata['date'][0]['name'] != 'any') {

		$dates = [];
		// $date_year = $formdata['date'][0]['name'];
		foreach ($formdata['date'] as $date) {
			$dates[] = $date['name'];
		}

		$args['meta_query'] = array(
			'relation' => 'OR',
			array(
				'key' => 'project_date',
				'value' => $dates,
				'compare' => 'IN',
				'type' => 'NUMERIC',
			),
		);
	}

	$projects = new WP_Query($args);
	while ($projects->have_posts()) : $projects->the_post();
		$id = get_post_field('ID');

		$item = '';

		$item .= '<div class="project project--' . $id . '">';
		$item .= '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';

		// Category
		$terms = wp_get_post_terms($projects->post->ID, array('category'));
		foreach ($terms as $term) :
			$item .= '<div class="project__category">' . $term->name . '</div>';
		endforeach;

		// Date
		$item .= '<div class="project__date">' . get_field('project_date') . '</div>';

		$item .= '</div>'; //end .project

		$response .= $item;

	endwhile;


	echo $response;
	wp_die();
}
add_action('wp_ajax_hsc_projects_filters_action', 'hsc_projects_filters_function');
add_action('wp_ajax_nopriv_hsc_projects_filters_action', 'hsc_projects_filters_function');


function hsc_create_query_args_from_form_data($formdata, $args)
{
	$fields = [];

	$category_fields['category'] = $formdata['category'];
	$date_fields['date'] = $formdata['date'];

	// combine the two arrays above into a new array $fields
	$fields[] = $category_fields;
	$fields[] = $date_fields;

	if ($category_fields[0]['name'] == 'all' && $date_fields[0]['name'] == 'any') {
		return $args;
	} else {

		if ($category_fields[0]['name'] != 'all') {
			$categories = array();
			foreach ($category_fields as $field) {
				if ($field['name'] !== 'all') {
					$categories[] = $field['name'];
				}
			}
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $categories,
				),
			);
			return $args;
		}

		if ($date_fields[0]['name'] != 'any') {
			$dates = array();
			foreach ($date_fields as $field) {
				if ($field['name'] !== 'any') {
					$dates[] = $field['name'];
				}
			}
			$args['meta_query'] = array(
				array(
					'key' => 'project_date',
					'value' => $dates,
					'compare' => 'IN',
				),
			);
			return $args;
		}
	}
}
