<?php
get_header();

?>
<div class="container">
	<div class="post__header">
		<?php the_title('<h1 class="post__title">', '</h1>'); ?>
	</div>
	<div class="post__content">
		<?php the_content(); ?>
	</div>
</div>
<?php
get_footer();
