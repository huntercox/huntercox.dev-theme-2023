<?php
get_header();

?>
<div class="container">
	<?php
	echo '<div class="' . esc_attr($post_type) . '__content">';
	?>
	<div class="project__meta">
		<div class="project__date">
			<strong>Date: </strong><?php the_field('project_date'); ?>
		</div>

		<div class="project__category">
			<?php
			$categories = get_terms();
			$categories = get_the_terms($post->ID, 'category');

			$categories = array_map(function ($category) {
				return $category->name;
			}, $categories);
			?>
			<strong>Category: </strong><?php echo $categories[0]; ?>
		</div>

		<div class="project__skills">
			<strong>Skills: </strong>
			<?php
			$skills = get_field('skills');
			if ($skills) {
				echo '<ul>';
				foreach ($skills as $skill) {
					echo '<li>' . $skill->post_title . '</li>';
				}
				echo '</ul>';
			}
			?>
		</div>

		<?php
		$project_link = get_field('project_link');

		if ($project_link) {
		?>
			<div class="project__link">
				<strong>Link: </strong><a href="<?php echo esc_url($project_link); ?>" target="_blank">View Project</a>
			</div>
		<?php
		}
		?>
	</div>

	<div class="project__description">
		<?php the_content(); ?>
	</div>

	<div class="project__contributions">
		<h6>Contributions</h6>
		<?php
		$contributions = get_field('contributions');
		if ($contributions) {
			echo '<ul>';
			foreach ($contributions as $contribution) {
				echo '<li>' . $contribution['description'] . '</li>';
			}
			echo '</ul>';
		}
		?>
	</div>
</div>
</div>
<?php
get_footer();
