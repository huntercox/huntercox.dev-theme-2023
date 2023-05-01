<?php
$flex_settings = [];
$styles = [];

$settings = get_sub_field('settings');

$image_settings = $settings['image_settings'];

if ($image_settings) {

	$height = $image_settings['height'];
	$parallax = $image_settings['toggle_parallax'];

	if ($height || $parallax) {


		if ($height) {
			$flex_settings['height'] = $height;
			$styles[] .= 'height: ' . $flex_settings['height'] . 'px;';
		}

		if ($parallax === false) {
			$flex_settings['parallax'] = 'false';
		} else {
			$flex_settings['parallax'] = 'true';
		}
		$parallax_setting = $flex_settings['parallax'];
		$styles[] .= '--hsc-flex-hero--parallax: ' . $parallax_setting . ';';
	}
}


echo '<style>';
echo '.layout--hero .hero { ';
foreach ($styles as $style) {
	echo $style;
}
echo ' }';
echo '</style>';


echo $stylesheet;

$image = get_sub_field('image');

if ($image) :

	echo '<div class="hero">';

	if ($flex_settings['parallax'] == 'true') {
		$size = 'flex-hero-tall';
		$img_src = wp_get_attachment_image_src($image, $size);

		$adjusted_height = intval($flex_settings['height']) - 20;
		echo '<style>/* Parallax */
		.parallax-window {
			min-height: ' . esc_html($adjusted_height) . 'px;
			background: transparent;
		}</style>';

		echo '<div style="height:' . esc_attr($flex_settings['height']) . 'px; overflow: hidden;">';
		echo '<div class="hero--parallax parallax-window" data-bleed="10"  data-image-src="' . $img_src[0] . '" data-parallax="scroll" data-natural-width="1000" data-position="center left" data-speed="0.1" data-bleed="50"></div>';
		echo '</div>';
	} else {
		$size = 'flex-hero';
		$img_src = wp_get_attachment_image_src($image, $size);
		$url = $img_src[0];
		echo '<div class="hero--background-image bg-img" style="background-image: url(' . esc_url($url) . '); height: ' . esc_attr($flex_settings['height']) . 'px;"></div>';
	}
	echo '</div>';
endif;
