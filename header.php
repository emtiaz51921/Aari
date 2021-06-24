<?php
/**
 * The header for this theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aari
 * @version 1.0.2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset', 'display' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url', 'display' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aari' ); ?></a>


<!-- Main Content
================================================== -->
<div id="mainContent">

	<div class="sidebar-overlay"></div>

	<!-- Nav Bar
	================================================== -->
	<div id="masthead" class="header-controller text-center <?php echo ( ( is_front_page() && is_home() ) || is_home() ) ? '' : 'header-overlay'; ?>">
		<div class="container">
			<nav id="nav" class="navbar navbar-expand-lg <?php echo ( ( is_front_page() && is_home() ) || is_home() ) ? 'nav-overlay' : ''; ?>">

				<?php
				if ( aari_custom_logo_dark() !== false ) {
					echo wp_kses_post( aari_custom_logo_dark() );
				} else {
					aari_text_logo_display();
				}
				?>


				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<button id="nav-toggle" class="nav-toggle" role="button">
						<span class="mdi mdi-menu"></span>
					</button>

					<nav class="nav-collapse">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'depth'          => 5,
								'container'      => 'ul',
								'menu_class'     => 'menu-items',
								'fallback_cb'    => 'AARI_Wp_Bootstrap_Navwalker::fallback',
								'walker'         => new AARI_Wp_Bootstrap_Navwalker(),

							)
						);
						?>
					</nav>
				<?php endif; ?>

				<div class="search_trigger">
					<?php
					echo ( get_theme_mod( 'aari_search' ) && has_nav_menu( 'primary' ) ) ? '<a class="nav-search search-trigger" href="#"><span class="jam jam-search"></span></a>' : '';
					?>
				</div>

			</nav>

		</div>
	</div>

	<!-- search form -->
	<?php

	if ( get_theme_mod( 'aari_search' ) && has_nav_menu( 'primary' ) ) {
		aari_search_form();
	}

	?>
	<!-- search form -->











