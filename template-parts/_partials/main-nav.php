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
              <button type="button" class="hamburger-button js-drawer-open-left" aria-controls="NavDrawer" aria-expanded="false" aria-label="<?php esc_html_e( 'Primary Menu', 'underscores-master' ); ?>">
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
