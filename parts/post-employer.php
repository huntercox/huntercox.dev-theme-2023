<?php
$classes = '';
if (hsc_is_current_employer($post->ID)) {
	$classes .= ' employer--current';
}
$classes .= ' employer--' . $post->post_name;
?>
<div class="employer<?php echo esc_attr($classes); ?>">
	<h2 class="employer__name"><?php echo $post->post_title ?></h2>
	<div class="employer__info">
		<h5 class="employer__job-title"><?php the_field('job_title', $post->ID); ?></h5>
		<div class="employer__job-description"><?php the_content(); ?></div>
	</div>

</div>