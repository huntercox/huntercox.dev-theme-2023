<?php
$column_layouts = get_sub_field('column_layouts');

if (have_rows($column_layouts)) :
	while (have_rows($column_layouts)) : the_row();

		if (get_row_layout() == '2_columns') :
			// 2 Columns
			get_template_part('columns/columns', 'two');
			echo ' yes this does work';
		endif;
	endwhile;
endif;
