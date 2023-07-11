<?php

add_action('init', function () {
	register_post_type('project', array(
		'labels' => array(
			'name' => 'Projects',
			'singular_name' => 'Project',
			'menu_name' => 'Projects',
			'all_items' => 'All Projects',
			'edit_item' => 'Edit Project',
			'view_item' => 'View Project',
			'view_items' => 'View Projects',
			'add_new_item' => 'Add New Project',
			'new_item' => 'New Project',
			'parent_item_colon' => 'Parent Project:',
			'search_items' => 'Search Projects',
			'not_found' => 'No projects found',
			'not_found_in_trash' => 'No projects found in Trash',
			'archives' => 'Project Archives',
			'attributes' => 'Project Attributes',
			'insert_into_item' => 'Insert into project',
			'uploaded_to_this_item' => 'Uploaded to this project',
			'filter_items_list' => 'Filter projects list',
			'filter_by_date' => 'Filter projects by date',
			'items_list_navigation' => 'Projects list navigation',
			'items_list' => 'Projects list',
			'item_published' => 'Project published.',
			'item_published_privately' => 'Project published privately.',
			'item_reverted_to_draft' => 'Project reverted to draft.',
			'item_scheduled' => 'Project scheduled.',
			'item_updated' => 'Project updated.',
			'item_link' => 'Project Link',
			'item_link_description' => 'A link to a project.',
		),
		'public' => true,
		'show_in_rest' => true,
		'show_in_graphql' => true,
		'graphql_single_name' => 'project',
		'graphql_plural_name' => 'projects',
		'menu_icon' => 'dashicons-clipboard',
		'supports' => array(
			0 => 'title',
			1 => 'editor',
		),
		'taxonomies' => array(
			0 => 'category',
		),
		// 'has_archive' => 'projects',
		'rewrite' => array(
			'feeds' => false,
		),
		'delete_with_user' => false,
	));
});
