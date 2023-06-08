<?php
function hsc_filter_projects_by_category()
{
	$catSlug = $_POST['category'];

	$response = '';

	if ($catSlug == "all") {
		/* ALL PROJECTS */
		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
		]);
		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	} else {

		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
			'tax_query' => [
				[
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $catSlug,
				]
			],
		]);

		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	}


	echo $response;
	exit;
}
add_action('wp_ajax_hsc_projects_filters_categories', 'hsc_filter_projects_by_category');
add_action('wp_ajax_nopriv_hsc_projects_filters_categories', 'hsc_filter_projects_by_category');




function hsc_filter_projects_by_date()
{
	$date_year = $_POST['date'];


	$response = '';

	if ($date_year == "any") {
		/* ALL PROJECTS */
		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
		]);

		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	} else {

		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
			'meta_query' => [
				array(
					'key'     => 'project_date',
					'value'   => $date_year,
					'compare' => '=',
					'type'    => 'NUMERIC',
				),
			],
		]);

		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	}


	echo $response;
	exit;
}
add_action('wp_ajax_hsc_projects_filters_dates', 'hsc_filter_projects_by_date');
add_action('wp_ajax_nopriv_hsc_projects_filters_dates', 'hsc_filter_projects_by_date');


function hsc_filter_projects()
{
	$date_year = $_POST['date'];
	$category  = $_POST['category'];

	$response = '';

	if ($date_year == "any") {
		/* ALL PROJECTS */
		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
		]);
		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	} elseif ($category == "all") {
		/* ALL PROJECTS */
		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
		]);
		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	} else {

		$ajaxposts = new WP_Query([
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'asc',
			'meta_query' => [
				'relation' =>	'AND',
				[
					'key'     => 'project_date',
					'value'   => $date_year,
					'compare' => '=',
					'type'    => 'NUMERIC',
				],
			],
			'tax_query' => [
				[
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $category,
					'operator' => 'IN'
				]
			],
		]);

		if ($ajaxposts->have_posts()) {
			while ($ajaxposts->have_posts()) : $ajaxposts->the_post();

				$response .= get_template_part('parts/post', 'project');
			endwhile;
		} else {
			$response = 'empty';
		}
	}


	echo $response;
	exit;
}
add_action('wp_ajax_hsc_projects_filters', 'hsc_filter_projects_by_date');
add_action('wp_ajax_nopriv_hsc_projects_filters', 'hsc_filter_projects');
