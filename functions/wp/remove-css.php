<?php
function remove_default_wp_styles()
{
	// Dequeue Block Library CSS
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');

	// Dequeue Classic Theme Styles CSS
	wp_dequeue_style('classic-theme-styles');

	// Remove inline CSS styles containing "--wp--preset--"
	add_action('wp_head', function () {
		ob_start(function ($buffer) {
			return preg_replace('/<style[^>]*>[^<]*--wp--preset--[^\n<]+<\/style>/i', '', $buffer);
		});
	}, 0);
}
add_action('wp_enqueue_scripts', 'remove_default_wp_styles', 100);


remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
