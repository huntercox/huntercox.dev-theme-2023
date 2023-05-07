<?php
$layout_settings = [];
$styles = [];

$settings = get_sub_field('settings');

$color_settings = $settings['color_settings'];
$spacing_settings = $settings['spacing_settings'];

if ($color_settings) {

	$background_color = $color_settings['background_color'];
	$text_color = $color_settings['text_color'];

	if ($background_color || $text_color) {
		$layout_settings['background_color'] = $background_color;
		$layout_settings['text_color'] = $text_color;

		$color_styles = '';

		if ($background_color) {
			$layout_settings['background_color'] = $background_color;
			$color_styles .= 'background-color: ' . $background_color . ';';
		}

		if ($text_color) {
			$layout_settings['text_color'] = $text_color;
			$color_styles .= 'color: ' . $text_color . ';';
		}

		$styles['color'] = $color_styles;
	}
}

if ($spacing_settings) {
	// Padding
	$padding = $spacing_settings['padding'];

	$top    = $padding['top'];
	$right  = $padding['right'];
	$bottom = $padding['bottom'];
	$left 	= $padding['left'];

	if ($top || $right || $bottom || $left) {
		$padding_styles = '';

		if ($top) {
			$layout_settings['padding_top'] = $top;
			$padding_styles .= 'padding-top: ' . $top . 'px;';
		}
		if ($right) {
			$layout_settings['padding_right'] = $right;
			$padding_styles .= 'padding-right: ' . $right . 'px;';
		}
		if ($bottom) {
			$layout_settings['padding_bottom'] = $bottom;
			$padding_styles .= 'padding-bottom: ' . $bottom . 'px;';
		}
		if ($left) {
			$layout_settings['padding_left'] = $left;
			$padding_styles .= 'padding-left: ' . $left . 'px;';
		}

		$styles['padding'] = $padding_styles;
	}

	// Margin
	$margin = $spacing_settings['margin'];

	$top    = $margin['top'];
	$right  = $margin['right'];
	$bottom = $margin['bottom'];
	$left 	= $margin['left'];

	if ($top || $right || $bottom || $left) {
		$margin_styles = '';

		if ($top) {
			$layout_settings['margin_top'] = $top;
			$margin_styles .= 'margin-top: ' . $top . 'px;';
		}
		if ($right) {
			$layout_settings['margin_right'] = $right;
			$margin_styles .= 'margin-right: ' . $right . 'px;';
		}
		if ($bottom) {
			$layout_settings['margin_bottom'] = $bottom;
			$margin_styles .= 'margin-bottom: ' . $bottom . 'px;';
		}
		if ($left) {
			$layout_settings['margin_left'] = $left;
			$margin_styles .= 'margin-left: ' . $left . 'px;';
		}

		$styles['margin'] = $margin_styles;
	}
}


echo '<style>';
foreach ($styles as $style) {
	echo '.layout--basic_content .content { ' . $style . ' }';
}
echo '</style>';


echo '<div class="content">';
echo '<div class="container">';
the_sub_field('text_content');
echo '</div>';
echo '</div>';
