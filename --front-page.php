<?php
get_header();
?>

<div class="page__content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<?php
get_template_part('parts/dev', 'skills');
?>


<?php
get_footer();
