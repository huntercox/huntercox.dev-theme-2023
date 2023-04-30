<?php
$skill_sections = get_field('skills_sections');

if (have_rows('skills_sections')) :
	while (have_rows('skills_sections')) :
		the_row();
		echo '<h1>this?</h1>';
	endwhile;
endif;
