<?php
// Register styles/scripts for theme usage


function hsc_enqueue_styles_and_scripts()
{

	wp_register_style('hcdev2023-theme', get_template_directory_uri() . '/style.css');

	/* Main Stylesheet */
	if (!is_admin()) {
		wp_enqueue_style('hcdev2023-theme');
	}

	/* Enqueue FontAwesome */
	wp_enqueue_style('hcdev2023-fontawesome', get_template_directory_uri() . '/assets/dist/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css');
	wp_enqueue_style('hcdev2023-fontawesome-solid', get_template_directory_uri() . '/assets/dist/vendor/@fortawesome/fontawesome-free/css/solid.min.css');



	/* Parallax */
	wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/dist/vendor/jquery-parallax.js/parallax.min.js', array('jquery'), '1.5.0', false);
	// wp_enqueue_script('parallax');

	/* Enqueue Xdebug plugin */
	wp_enqueue_script('xdebug-error-tab', get_template_directory_uri() . '/assets/src/js/xdebug-error-tab.js', array('jquery'), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'hsc_enqueue_styles_and_scripts');
