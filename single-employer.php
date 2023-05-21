<?php
get_header();

?>

<?php
echo '<div class="' . esc_attr($post_type) . '__content">';
?>
<div class="employer__intro">
	<div class="container">
		<div class="employer__intro__inner">
			<div class="employer__wysiwyg">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<div class="employer__skills">
	<div class="container">
		<?php
		// Get the current employer post ID
		$current_employer_id = get_the_ID();

		// Prepare the meta query arguments
		$meta_query_args = array(
			'relation' => 'AND',
			array(
				'key' => 'employers',
				'value' => '"' . $current_employer_id . '"',
				'compare' => 'LIKE'
			)
		);


		$args = array(
			'post_type' => 'skill',
			'posts_per_page' => -1,
			'meta_query' => $meta_query_args
		);

		$skills_query = new WP_Query($args);

		if ($skills_query->have_posts()) {
			echo '<h2>Skills Used While Working Here:</h2>';
			echo '<ul>';
			while ($skills_query->have_posts()) {
				$skills_query->the_post();

				echo '<li>' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			// No skills found
			echo '<p>No skills found for this employer.</p>';
		}

		// Reset the post data
		wp_reset_postdata();

		?>
	</div>
</div>

<?php echo '</div>'; ?>

<?php
get_footer();
