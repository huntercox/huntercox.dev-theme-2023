<?php
// Remove WP duotone filter/svg elements included on frontend
function remove_wp_svg_filters()
{
	//remove_filter('wp_get_attachment_image_attributes', 'wp_filter_add_color_scheme_attributes');
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
	remove_action('in_admin_header', 'wp_global_styles_render_svg_filters');
}
add_action('init', 'remove_wp_svg_filters');
