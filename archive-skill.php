<?php
get_header();
?>

<div class="page__content">
	<div class="container">
		<div class="skill-archive-container">
			<?php
			$color_counter = 0;
			$colors = hsc_get_colors();

			if (have_posts()) : ?>

				<ul class="skills label-list">
					<?php while (have_posts()) : the_post();
						$color = get_field('color', $post->ID);

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
					?>
						<li class="skill" style="background-color: <?php echo $color; ?>;">
							<a href="<?php the_permalink(); ?>" style="color: <?php echo $text_color; ?>;">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif;
			?>
		</div>
	</div>
</div>


<?php
get_footer();
