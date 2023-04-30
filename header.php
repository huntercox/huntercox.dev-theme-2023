<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="site">

		<header class="header">
			<div class="container">

				<div class="header__brand">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="header__site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					else :
					?>
						<p class="header__site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
					endif;
					?>
				</div>

				<nav class="header__main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
			</div>

		</header>

		<main class="content">
			<?php
			if (!is_front_page()) :
				echo '<div class="page__header">';
				echo '<div class="container">';
				/* Breadcrumbs */
				custom_page_breadcrumbs();

				/* Page Title */
				the_title('<h1 class="page__title">', '</h1>');
				echo '</div>';
				echo '</div>';
			endif;
			?>