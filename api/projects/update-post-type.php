<?php
function update_project_post_type($args, $post_type)
{
	if ('project' === $post_type) {
		$args['show_in_graphql'] = true;
		$args['graphql_single_name'] = 'project';
		$args['graphql_plural_name'] = 'projects';
	}

	return $args;
}
add_filter('register_post_type_args', 'update_project_post_type', 10, 2);
