<?php

/**
 * Template Name: Flexible Content
 */
get_header();
?>

<?php

// Get Flexible Content functions
require get_template_directory() . '/functions/acf/flexible-content.php';


if (have_rows('flex_layouts')) :
	while (have_rows('flex_layouts')) : the_row();

		echo '<section class="flex-layout layout--' . get_row_layout() . '">';
		echo '<div class="flex-layout__content">';

		if (get_row_layout() == 'hero') :
			/* HERO */
			get_template_part('templates/flexible-content/hero');

		elseif (get_row_layout() == 'basic_content') :
			/* BASIC CONTENT */
			get_template_part('templates/flexible-content/content', 'basic');

		elseif (get_row_layout() == 'advanced_content') :
			/* ADVANCED CONTENT */
			get_template_part('templates/flexible-content/content', 'advanced');

		elseif (get_row_layout() == 'section_heading') :
			/* SECTION HEADING */
			get_template_part('templates/flexible-content/section-heading');

		elseif (get_row_layout() == 'columns') :
			/* SECTION HEADING */
			get_template_part('templates/flexible-content/columns');

		endif;
		echo '</div>';
		echo '</section>';

	endwhile;
endif;
?>

<?php
get_footer();
