<?php
get_header();
?>
<div class="page__content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<div class="dev-stats">
	<div class="container">
		<h4>Developer Stats</h4>
		<ul>
			<li>Web Developer for 10 years</li>
			<li>WordPress/PHP Developer for 7 years</li>
			<li>Over 5 years of agency experience</li>
		</ul>
	</div>
</div>

<div class="employment-history">
	<div class="container">
		<h4>Employment History</h4>
		<div class="employers">
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
</div>

<?php
get_footer();
