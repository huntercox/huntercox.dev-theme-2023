<?php

function hsc_output_color_palette()
{
	$color_palette = <<<EOL
	<div class="colors">
		<ul>
			<li class="purple">
				<span></span>
			</li>
			<li class="green">
				<span></span>
			</li>
			<li class="pink">
				<span></span>
			</li>
			<li class="yellow">
				<span></span>
			</li>
			<li class="blue">
				<span></span>
			</li>
			<li class="red">
				<span></span>
			</li>
		</ul>
	</div>
	EOL;

	echo $color_palette;
}


function hsc_get_colors()
{
	return [
		'purple' => '#514A8E',
		'green'  => '#38D6B4',
		'pink'   => '#FF7CC2',
		'yellow' => '#d0b628',
		'blue'   => '#547cff',
		'red'    => '#cb4155'
	];
}

function hsc_print_skills_w_colors()
{
	$print_skills = '';
	$color_counter = 0;
	$colors = hsc_get_colors();

	$skills = get_posts([
		'post_type' => 'skill',
		'numberposts' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	]);

	$print_skills .= '<ul class="skills label-list">';

	foreach ($skills as $skill) {
		$color = get_field('color', $skill->ID);

		if (!$color) {
			$color_keys = array_keys($colors);
			$color_key = $color_keys[$color_counter % count($color_keys)];
			$color = $colors[$color_key];
			$color_counter++;
		}

		// Check the background color and set the text color accordingly
		$text_color = '#15023d';  // Default text color
		if ($color == $colors['purple'] || $color == $colors['red']) {
			$text_color = '#ffffff';  // Change text color for purple and red backgrounds
		}

		$color = 'style="background-color: ' . $color . '; color: ' . $text_color . ';"';
		$print_skills .= '<li class="skill" ' . $color . '>' . $skill->post_title . '</li>';
	}

	$print_skills .= '</ul>';

	return $print_skills;
}




add_shortcode('hsc_skills', 'hsc_print_skills_w_colors');
