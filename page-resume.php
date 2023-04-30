<?php
get_header();

?>
<div class="page__header">
	<div class="container">
		<div class="page__header--inner">
			<?php
			if (is_admin()) {
				the_title('<h1 class="page__title">', '</h1> (page)');
			} else {
				the_title('<h1 class="page__title">', '</h1>');
			}
			?>
		</div>
	</div>
</div>
<div class="page__content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<div class="employers">
	<div class="container">
		<?php
		$employers = get_posts(array(
			'post_type' => 'employer',
			'posts_per_page' => -1,
			'order' => 'DESC'
		));
		foreach ($employers as $employer) {
			$employer_name = $employer->post_title;
			echo '<h2>' . $employer_name . '</h2>';
		}
		?>
	</div>
</div>

<?php
get_footer();
