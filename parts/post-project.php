<li class="project">
	<h4 class="project__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
	<div class="project__meta">
		<?php
		$date = get_field('project_date');
		if ($date) {
			echo '<span class="project__date">' . $date . '</span>';
		}

		$categories = $post->post_category;
		$cats = array();
		foreach ($categories as $id) {
			$cat_name = get_the_category_by_ID($id);
			$cats[] = $cat_name;
		}
		if ($cats) {
			echo '<span class="project__category">' . implode('', $cats) . '</span>';
		}
		?>
	</div>
</li>