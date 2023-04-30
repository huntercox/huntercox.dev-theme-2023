<?php
$layout_settings = [];

$settings = get_sub_field('layout_settings');

$image_settings = $settings['image_settings'];

if ($image_settings) {

	// Control the height of the image in the hero
	$height = $image_settings['height'];
	if ($height) {
		$layout_settings['height'] = $height;
	}

	// Toggle parallax on/off
	$parallax = $image_settings['toggle_parallax'];
	if ($parallax) {
		$layout_settings['parallax'] = $parallax;
	}
}



$image = get_sub_field('image');

if ($image) :

	echo '<div class="hero">';

	if ($layout_settings['parallax'] == true) {
		$size = 'flex-hero-tall';
		$img_src = wp_get_attachment_image_src($image, $size);

		$adjusted_height = intval($layout_settings['height']) - 20;
		echo '<style>/* Parallax */
		.parallax-window {
			min-height: ' . esc_html($adjusted_height) . 'px;
			background: transparent;
		}</style>';

		echo '<div style="height:' . esc_attr($layout_settings['height']) . 'px; overflow: hidden;">';
		echo '<div class="hero--parallax parallax-window" data-bleed="10"  data-image-src="' . $img_src[0] . '" data-parallax="scroll" data-natural-width="1000" data-position="center left" data-speed="0.1" data-bleed="50"></div>';
		echo '</div>';
	} else {
		$size = 'flex-hero';
		$img_src = wp_get_attachment_image_src($image, $size);
		$url = $img_src[0];
		echo '<div class="hero--background-image bg-img" style="background-image: url(' . esc_url($url) . '); height: ' . esc_attr($layout_settings['height']) . '"></div>';
	}
	echo '</div>';
endif;
