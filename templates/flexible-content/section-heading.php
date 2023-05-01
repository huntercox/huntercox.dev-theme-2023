<div class="section-heading">
	<div class="container">
		<?php
		$heading = get_sub_field('heading');

		if ($heading) {
			$text = $heading['text'];
			$tag = $heading['heading_tag'];

			$opening_heading_tag = '<' . $tag . '>';
			$closing_heading_tag = '</' . $tag . '>';

			echo $opening_heading_tag . $text . $closing_heading_tag;
		}
		?>
	</div>
</div>