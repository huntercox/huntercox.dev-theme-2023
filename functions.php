<?php
// Main functions.php file of theme

/* WordPress */
require get_template_directory() . '/functions/wp/remove-comments.php';
require get_template_directory() . '/functions/wp/remove-svgs.php';
require get_template_directory() . '/functions/wp/remove-css.php';
require get_template_directory() . '/functions/wp/remove-emojis.php';

/* ACF */
require get_template_directory() . '/functions/acf/admin-styles.php';
require get_template_directory() . '/functions/acf/options.php';
require get_template_directory() . '/functions/acf/color-palette.php';
require get_template_directory() . '/functions/acf/flexible-content.php';

/* Enqueues */
require get_template_directory() . '/functions/enqueues.php';

/* Base */
require get_template_directory() . '/functions/base/menus.php';
require get_template_directory() . '/functions/base/image-sizes.php';

/* Theme */
require get_template_directory() . '/functions/theme/template-conditions.php';
require get_template_directory() . '/functions/theme/breadcrumbs.php';
require get_template_directory() . '/functions/theme/body-class.php';
require get_template_directory() . '/functions/theme/employers/employers.php';
require get_template_directory() . '/functions/theme/projects/archive-filters.php';

require get_template_directory() . '/functions/theme/theme.php';

/* Theme > Admin */
require get_template_directory() . '/functions/theme/admin/employer-start-date-column.php';

/* Theme > Projects */
require get_template_directory() . '/functions/theme/projects/register-projects.php';

/* Theme > Employers */
require get_template_directory() . '/functions/theme/employers/register-employers.php';

/* Theme > Skills */
require get_template_directory() . '/functions/theme/skills/register-skills.php';


/* API */
// require get_template_directory() . '/api/projects/update-post-type.php';
// add_action('init', function () {

// 	if (is_graphql_http_request()) {
// 		wp_send_json(['server' => $_SERVER]);
// 	}
// });
