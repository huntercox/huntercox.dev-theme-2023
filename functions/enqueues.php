<?php
// Register styles/scripts for theme usage

/* Enqueue default theme stylesheet */
wp_register_style('hcdev2023-theme', get_template_directory_uri() . '/style.css');

/* Enqueue FontAwesome */
wp_enqueue_style('hcdev2023-fontawesome', get_template_directory_uri() . '/assets/dist/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css');
wp_enqueue_style('hcdev2023-fontawesome-solid', get_template_directory_uri() . '/assets/dist/vendor/@fortawesome/fontawesome-free/css/solid.min.css');

if (!is_admin()) {
	wp_enqueue_style('hcdev2023-theme');
}

wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/dist/vendor/jquery-parallax.js/parallax.min.js', array('jquery'), '1.5.0', true);
