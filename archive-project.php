<?php
get_header();
?>

<div class="page__content">
	<div class="container">
		<?php

		$projects_page = get_post(314);

		echo '<div class="projects-page__content">';
		echo $projects_page->post_content;
		echo '</div>';
		?>

		<div class="projects__filters">
			<form id="myform" method="POST">
				<?php
				$args = array(
					'post_type' => 'project',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				);
				$posts = get_posts($args);

				// Collect all post IDs
				$post_ids = array();
				foreach ($posts as $post) {
					$post_ids[] = $post->ID;
				}

				// Fetch the terms related to these posts
				$categories = wp_get_object_terms($post_ids, 'category', array(
					'hide_empty' => true,
				)); ?>
				<fieldset id="category-filters">
					<legend>By Category:</legend>

					<label>
						<input type="checkbox" name="all" id="category-all" checked /> All
					</label>

					<?php
					foreach ($categories as $category) :
						if (is_object($category)) {
							if ($category->slug == 'uncategorized') {
								continue;
							}
							$catSlug = $category->slug;
					?>
							<label>
								<input type="checkbox" name="<?php echo $catSlug; ?>" id="category-<?php echo $catSlug; ?>" /> <?= $category->name; ?>
							</label>
					<?php }
					endforeach;
					?>
				</fieldset>

				<fieldset id="date-filters">
					<legend>By Date:</legend>
					<label>
						<input type="checkbox" name="any" id="date-any" checked /> Any
					</label>
					<label>
						<input type="checkbox" name="2016" id="date-2016" /> 2016
					</label>
					<label>
						<input type="checkbox" name="2017" id="date-2017" /> 2017
					</label>
					<label>
						<input type="checkbox" name="2018" id="date-2018" /> 2018
					</label>
				</fieldset>
			</form>
		</div>

		<!-- <form>
			<label for="filtered">
				<input type="checkbox" name="filtered" id="checkbox_filtered">
				Filtered?
			</label>
		</form> -->

		<div id="response">
			<?php
			$args = array(
				'post_type' => 'project',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'order' => 'asc',
			);

			$projects = new WP_Query($args);
			while ($projects->have_posts()) : $projects->the_post();
				$id = get_post_field('ID');
				echo '<div class="project project--' . $id . '">';
				echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
				// Category
				$terms = wp_get_post_terms($projects->post->ID, array('category'));
				foreach ($terms as $term) :
					echo '<div class="project__category">' . $term->name . '</div>';
				endforeach;

				// Date
				echo '<div class="project__date">' . get_field('project_date') . '</div>';
				echo '</div>';
			endwhile;
			?>

		</div>

	</div>

</div>


<?php
get_footer();
