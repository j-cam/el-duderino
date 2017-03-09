<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package el_Duderino
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

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscores-master' ); ?></a>
	<!-- ADD NAV DRAWER HERE  -->
	<?php locate_template( 'template-parts/_partials/mobile-nav.php', true ); ?>

	<div id="page" class="layout__site">
		<header id="masthead" class="layout__site-header site-header" role="banner">
			<?php locate_template( 'template-parts/_partials/main-nav.php', true ); ?>
		</header><!-- #masthead -->
		<div id="content" class="layout__site-content layer--site-content ">
