<?php
get_header();
?>
<div class="page__content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<div class="employers">
	<div class="container">
		<?php
		$args = array(
			'post_type' => 'employer',
			'posts_per_page' => -1,
			'order' => 'DESC'
		);
		$employers = new WP_Query($args);
		while ($employers->have_posts()) : $employers->the_post();

			get_template_part('parts/post', 'employer');
		endwhile;
		?>
	</div>
</div>

<?php
get_footer();
