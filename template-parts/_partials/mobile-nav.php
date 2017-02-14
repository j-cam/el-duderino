<div id="NavDrawer" class="layer__mobile-nav is-moved-by-drawer drawer drawer--left">
<?php // wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile', 'menu_class' => 'mobile-nav', 'container' => false ) ); ?>
  <div class="drawer__header">
      <div class="branding__logo-mobile-menu">
          <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="" /></a>
      </div>
      <div class="drawer__close js-drawer-close">
          <button type="button" class="close-menu-button js-drawer-open-left" aria-controls="NavDrawer" aria-expanded="false" aria-label="Close">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-menu-button.svg" alt="" />
          </button>
      </div>
  </div>
  <?php
      /**
       * Bem Menu: Custom Walker
       * @subpackage /includes/wp-bem-menu.php
       */
      bem_menu(
      // menu location
      'primary',
      // menu namespace
      'mobile-nav'
      );
  ?>
</div>
