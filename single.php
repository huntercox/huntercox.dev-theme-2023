<?php
get_header();

?>
<div class="container">
	<?php
	echo '<div class="' . esc_attr($post_type) . '__content">';
	?>
	<?php the_content(); ?>
</div>
</div>
<?php
get_footer();
