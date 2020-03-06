<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'furnishop' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="topbar">
			<div class="theme-wrapper">
				<?php if ( has_nav_menu( 'top' ) ) :
					get_template_part( 'template-parts/navigation/navigation', 'top' );
				endif; ?>
				<div class="header-social">
					<?php
						wp_nav_menu( array(
							'container'      => false,
							'theme_location' => 'social',
							'menu_id'        => 'social-menu',
							'menu_class'     => 'social-menu',
							'walker'         => new Furnishop_Walker_Nav_Social
						) );
					?>
				</div>
				<?php if ( is_active_sidebar( 'topbar-widget' ) ) : ?>
					<div class="topbar-widget-area">
						<?php get_sidebar( 'topbar' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- .topbar -->
		<div class="header-branding container-fluid">
			<div class="theme-wrapper row">
				<div class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="header-logo col-lg-3">
					<?php the_custom_logo(); ?>
				</div>
				<?php if ( is_active_sidebar( 'header-widget' ) ) : ?>
					<div class="branding-block header-widget-area col-lg-6">
						<div class="row">
							<?php get_sidebar( 'header' ); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="branding-block woocommerce-block col-lg-3">
					<div class="row">
						<div class="woocommerce-block_cart col-lg-8">
							<?php
								if ( function_exists( 'furnishop_woocommerce_header_cart' ) ) {
									furnishop_woocommerce_header_cart();
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .header-branding -->
		<div class="navbar-shop container-fluid">
			<div class="theme-wrapper row">
				<nav class="menu-shop col-lg-3">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'catalog',
						'container'      => false,
						'menu_id'        => 'catalog-menu',
						'menu_class'     => 'catalog-menu',
					) );
					?>
				</nav>
				<div class="header-search col-lg-9">
					<div class="search-toggle">
						<i class="fa fa-search"></i>
					</div>
					<?php get_sidebar( 'search' ); ?>
				</div>
			</div>
		</div><!-- .navbar-shop -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
