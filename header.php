<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package questRaw
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<h1 class="hidden"><?php echo esc_html_e( get_bloginfo() ); ?></h1>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'questraw' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
		<a href=" <?php echo esc_url( home_url( '/' ) ); ?> ">
			<?php $header_image = get_header_image(); ?>
			<img src=" <?php echo esc_url( $header_image ); ?>">
		</a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
		<h2 class="hidden">Main Navigation</h2>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'questraw' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'topbar-menu', 'container_class' => 'topbar-menu' )); 
			wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<nav id="mobileNav">
		<h2 class="hidden">Mobile Navigation</h2>
		<?php $mobile_header_image = get_template_directory_uri() ; ?>
		<img src=" <?php echo esc_url( $mobile_header_image ); ?>/img/mobile-logo.png">
			<div>
				<div class="container">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
			<div id="mobile-nav-container">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-mobile' ) );
				wp_nav_menu( array( 'theme_location' => 'topbar-menu', 'container_class' => 'topbar-mobile' )); 
			 ?>
			</div>
		</nav>
	</header><!-- #masthead -->
	<div class="clearfix"></div>


	<div id="content" class="site-content">
