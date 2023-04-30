<?php
function hsc_acf_input_admin_footer()
{
?>

	<script type="text/javascript">
		(function($) {

			acf.add_filter('color_picker_args', function(args, $field) {

				// add the hexadecimal codes here for the colors you want to appear as swatches
				args.palettes = ['#1e1e3f', '#001775', '#514A8E', '#38D6B4', '#FF7CC2']

				// return colors
				return args;

			});

		})(jQuery);
	</script>

<?php }

add_action('acf/input/admin_footer', 'hsc_acf_input_admin_footer');
