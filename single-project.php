<?php
get_header();

?>
<div class="container">
	<?php
	echo '<div class="' . esc_attr($post_type) . '__content">';
	?>

	<div>
		<strong>Date:</strong> <?php the_field('project_date'); ?>
	</div>

	<div>
		<?php
		$categories = get_terms();
		$categories = get_the_terms($post->ID, 'category');

		$categories = array_map(function ($category) {
			return $category->name;
		}, $categories);
		?>
		<strong>Category:</strong> <?php echo $categories[0]; ?>
	</div>

	<div>
		<strong>Skills:</strong>
		<?php
		$skills = get_field('skills');
		foreach ($skills as $skill) {
			echo '<span>' . $skill . '</span>';
		}
		?>
	</div>

	<?php the_content(); ?>
</div>
</div>
<?php
get_footer();
