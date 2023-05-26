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


		if (have_posts()) :
			echo '<ul class="project__list">';

			$count = $wp_query->found_posts;
			$current = 1;

			while (have_posts()) :
				the_post();
		?>
				<li class="project">
					<?php
					if ($current < $count) {
						echo '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>, &nbsp; </h4>';
					} else {
						echo '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
					}
					?>
				</li>
		<?php

				$current++;

			endwhile;
			echo '</ul>';

		endif; ?>
	</div>
</div>


<?php
get_footer();
