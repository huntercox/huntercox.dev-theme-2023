<?php
function custom_page_breadcrumbs()
{
	global $post;

	$home_url = home_url('/');
	$current_url = home_url(add_query_arg(array(), $wp->request));
	$breadcrumbs = '';

	// Only display breadcrumbs on pages
	if (is_page()) {
		$ancestors = get_post_ancestors($post);

		// Display ancestor pages
		if ($ancestors) {
			$ancestors = array_reverse($ancestors);

			foreach ($ancestors as $ancestor) {
				$breadcrumbs .= '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li> &gt; ';
			}
		}

		// Display current page without link
		$breadcrumbs .= '<span>' . get_the_title() . '</span>';
	}

	if ($breadcrumbs) {
		echo '<div class="breadcrumbs"><div class="container"><ul class="code">~/' . $breadcrumbs . '</ul></div></div>';
	}
}
