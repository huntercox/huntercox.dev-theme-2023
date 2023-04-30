<?php
add_filter('body_class', 'hsc_custom_body_class');
/**
 * Add custom field body class(es) to the body classes.
 *
 * It accepts values from a per-page custom field, and only outputs when viewing a singular static Page.
 *
 * @param array $classes Existing body classes.
 * @return array Amended body classes.
 */
function hsc_custom_body_class(array $classes)
{
	$new_class = is_page() ? get_post_meta(get_the_ID(), 'body_class', true) : null;

	if ($new_class) {
		$classes[] = $new_class;
	}

	return $classes;
}
