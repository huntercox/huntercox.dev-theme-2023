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

		<div class="projects__filters" id="projects-filters">
			<div class="projects__filters--category">
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
				<ul class="cat-list flex" style="justify-content: space-between;">
					<li class="label label--active"><a class="cat-list_item" href="#!" data-slug="all">All Projects</a></li>

					<?php
					foreach ($categories as $category) :
						if (is_object($category)) {
							if ($category->slug == 'uncategorized') {
								continue;
							} ?>
							<li class="label">
								<a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>"><?= $category->name; ?></a>
							</li>
					<?php }
					endforeach;
					?>
				</ul>
			</div>

			<div class="projects__filters--date">
				<ul class="date-list flex">
					<li class="label label--active"><a class="date-list_item" href="#!" data-slug="any">Any Time</a></li>

					<li class="label">
						<a class="date-list_item" href="#!" data-slug="2016">2016</a>
					</li>
					<li class="label">
						<a class="date-list_item" href="#!" data-slug="2017">2017</a>
					</li>
					<li class="label">
						<a class="date-list_item" href="#!" data-slug="2018">2018</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="projects__list">
			<?php
			$projects = new WP_Query([
				'post_type' => 'project',
				'posts_per_page' => -1,
				'order_by' => 'date',
				'order' => 'ASC',
			]);
			?>

			<?php if ($projects->have_posts()) : ?>
				<ul class="projects__list-items">
					<?php
					while ($projects->have_posts()) : $projects->the_post();
						include('parts/post-project.php');
					endwhile;
					?>
				</ul>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>

	</div>

</div>


<?php
get_footer();
