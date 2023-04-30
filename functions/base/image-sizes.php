<?php

function hsc_setup_custom_image_sizes()
{
	add_theme_support('post-thumbnails');
	add_image_size('flex-hero', 1000, 320, true);
	add_image_size('flex-hero-tall', 1000, 800, true);
}
add_action('after_setup_theme', 'hsc_setup_custom_image_sizes');
