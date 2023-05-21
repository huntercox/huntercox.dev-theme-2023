<?php
get_header();

?>

<?php
echo '<div class="' . esc_attr($post_type) . '__content">';
?>
<div class="skill__intro">
	<div class="container">
		<div class="skill__intro__inner">
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

			<div class="skill__wysiwyg">
				<?php the_content(); ?>
			</div>

		</div>
	</div>
</div>

<div class="skill__experience">
	<div class="container">
		<div class="skill__experience__inner">
			<?php
			$experience = get_field('experience');

			$years = $experience['years'];
			$knowledge_level = $experience['knowledge_level']; // Junior, Mid, Senior
			$context = $experience['context']; // Personal, Work, or Both
			?>
			<ul class="skill__experience__list">
				<li><span>Years of Experience:</span> <?php echo $years . ' years'; ?></li>
				<li><span>Knowledge Level:</span> <?php echo $knowledge_level['label']; ?></li>
				<li><span>Context:</span> <?php echo $context['label']; ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php
$employers = get_field('employers');

if ($employers) { ?>
	<div class="skill__employers">
		<div class="container">
			<div class="skill__employers__inner">
				<div class="skill__employers__header">
					<h5>Employers who paid me to work with <?php echo '<span class="skill__name">' . ucwords($post->post_title) . '</span>'; ?> :</h5>
				</div>
				<ul class="skill__employers__list">
					<?php
					foreach ($employers as $employer) {
						$name = $employer->post_title;
						echo '<li>' . $name . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</div>
<?php
}
?>

<div class="skill__uses">
	<div class="container">
		<div class="skill__uses__inner">
			<?php
			if (have_rows('usage')) {
				echo '<h5>How I use ' . '<span class="skill__name">' . ucwords($post->post_title) . '</span> :</h5>';
				echo '<ul class="skill__uses__list">';
				while (have_rows('usage')) {
					the_row();
					$use = get_sub_field('use');

					echo '<li class="skill__uses__use">' . $use . '</li>';
				}
				echo '</ul>';
			}
			?>
		</div>
	</div>
</div>





<div class="icon--bg">
	<?php
	$icon = get_field('icon');
	if ($icon) {
		echo '<div class="skill__icon">';
		echo '<i class="devicon-' . esc_attr($icon) . '"></i>';
		echo '</div>';
	}
	?>
</div>

</div>
<?php
get_footer();
