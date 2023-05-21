<?php
get_header();
?>

<div class="page__content">
	<div class="container">


		<?php if (have_posts()) :
			echo '<div class="skill__list" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">';
			while (have_posts()) :
				the_post();
		?>
				<div class="skill">
					<?php
					$devicon = get_field('devicon');
					if ($devicon) {
						echo '<div class="skill__icon">';
						echo '<i class="devicon-' . esc_attr($devicon) . '"></i>';
						echo '</div>';
					} elseif (get_field('custom_image')) {
						$size = 'medium';
						$id = get_field('custom_image');
						$src = wp_get_attachment_image_src($id, $size);
						$url = $src[0];
						echo '<div class="skill__icon">';
						echo '<img src="' . $url . '" alt="' . $post->post_title . '">';
						echo '</div>';
					}
					?>
					<?php
					echo '<a href="' . get_the_permalink() . '"><h4>' . get_the_title() . '</h4></a>';
					echo '<div class="skill__description">' . get_the_content() . '</div>';
					?>
				</div>
		<?php
			endwhile;
			echo '</div>';

		endif; ?>
	</div>
</div>


<?php
get_footer();
