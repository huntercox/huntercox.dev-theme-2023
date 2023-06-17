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
		<?php
		$start_date = get_field('status', $post->ID)['start_date'];
		$end_date 	= get_field('status', $post->ID)['end_date'];

		if ($start_date || $end_date) {
			echo '<div class="employer__dates">';
		}
		if ($start_date) {
			$start_month = $start_date['month'];
			$start_year = $start_date['year'];
			echo '<div class="employer__dates__start-date">';
			echo '<span>Start Date: </span>';
			echo $start_month . ' ' . $start_year;
			echo '</div>';
		}

		if (!hsc_is_current_employer($post->ID)) {

			if ($end_date) {
				$end_month = $end_date['month'];
				$end_year = $end_date['year'];
				echo '<div class="employer__dates__end-date">';
				echo '<span>End Date: </span>';
				echo $end_month . ' ' . $end_year;
				echo '</div>';

				echo '<div class="employer__dates__length-of-employment">';

				if (!hsc_is_current_employer($post->ID)) {
					$status = get_field('status');
					$length_of_employment = $status['length_of_employment'];
					$years  = $length_of_employment['years'];
					$months = $length_of_employment['months'];

					$length_of_employment = $years . ' years & ' . $months . ' months';
					echo $length_of_employment;
				}
				echo '</div>';
			}
		}

		// close employer__dates
		if ($start_date || $end_date) {
			echo '</div>';
		}
		?>


		<div class="employer__job-description"><?php the_content(); ?></div>


		<div class="employer__skills-used">
			<?php
			$skills_used = get_field('skills_used');

			if ($skills_used) {
				echo '<span>Skills Used</span>';
				echo '<ul>';
				foreach ($skills_used as $skill) {
					echo '<li>' . $skill->post_title . '</li>';
				}
				echo '</ul>';
			}
			?>
		</div>
	</div>

</div>