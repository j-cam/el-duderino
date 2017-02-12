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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscores-master' ); ?></a>
	<!-- ADD NAV DRAWER HERE  -->
	<div id="NavDrawer" class="drawer drawer--left">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'main-nav__main-menu', 'container' => false ) ); ?>
	</div>
	<header id="masthead" class="site-header" role="banner">


		<nav id="site-navigation" class="main-nav" role="navigation">

			<div class="main-nav__wrapper">
				<div class="tablet-down--hide">
					<div class="layer__main-nav main-nav__flex-container">
						<div class="main-nav__site-branding-flex-item">
							<div class="main-nav__site-branding">
								<?php
								if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;

								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								<?php
								endif; ?>
							</div>
					</div><!-- end: site-branding-flex-item -->
					<div class="main-nav__menu-flex-item">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'main-nav__main-menu', 'container' => false ) ); ?>
					</div><!-- end: menu-flex-item -->
				</div><!-- end: device helper - hide tablet -->
			</div><!-- end: .main-nav__main-menu-wrap -->

			<!-- MOBILE NAV HEADER WITH NAV DRAWER TRIGGER GOES HERE -->
			<div class="desktop--hide tablet-down--show">
			    <div class="mobile-nav__header flex-container">
			        <div class="site-nav--mobile">
            			<!-- _S toggle button -->
            			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'underscores-master' ); ?></button>
			            <button type="button" class="hamburger-button js-drawer-open-left" aria-controls="NavDrawer" aria-expanded="false">
			                <img src="<?php echo get_template_directory_uri(); ?>/images/hamburger.svg" alt="menu" />
			            </button>
			        </div>
			        <div class="branding__logo-mobile">
			            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			        </div>
			        <div class="site-nav--mobile">
			        </div>
			    </div>
			</div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="layer__site-content site-content">



























<?php /*
			<div id="wrap-site-nav-menus" class="wrapper">
			    <!-- start: device helper DT nav -->
			    <div id="" class="tablet-down--hide">
						<div class="navbar__flex-container">
							<div class="navbar__logo-block">
								<h1 class="site-title navbar__site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							</div>
						 	<div class="navbar__nav-block">
							<?php
								// bem_nav_menu( array(
								// 	'theme_location' => 'primary',
								// 	'container' => false,
								// 	'menu_id'=> 'main-navigation',
								// 	'menu_class' => 'main-navigation',
								// 	'css_class_prefix' => 'primary-menu',
								// 	'css_class_modifiers' => null
								// 	) );
								?>
							</div>
						</div>
					</div><!-- end: device helper DT nav -->
					<div class="desktop--hide tablet-down--show">
						<?php
							bem_nav_menu( array(
								'theme_location' => 'primary-mobile',
								'container' => false,
								'menu_id'=> 'primary-menu-mobile',
								'menu_class' => 'mobile-nav'. $menu_item_count_class,
								'css_class_prefix' => 'mobile-nav',
								'css_class_modifiers' => null
								) );
				    ?>
					</div>
*/ ?>