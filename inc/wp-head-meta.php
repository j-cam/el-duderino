<?php
/**
 * Add custom meta tags in the document head
 *
 * @package WordPress
 * @subpackage el-duderino
 * @since 1.0.0
 */

/*=================================================
=            WP HEAD / DOC HEAD / META            =
=================================================*/
/**
 * Enable DNS Prefetching
 */

function dns_prefetch() {
$prefetch = 1;
    echo "\n <!-- DNS Prefetching Start --> \n";
    echo '<meta http-equiv="x-dns-prefetch-control" content="'.$prefetch.'">'."\n";

    if ($prefetch) {
      $dns_domains = array(
          "//use.typekit.net",
          "//s0.wp.com",
          "//ajax.googleapis.com",
          "//s0.wp.com",
          "//s.gravatar.com",
          "//stats.wordpress.com",
          "//www.google-analytics.com"
      );
      foreach ($dns_domains as $domain) {
        if (!empty($domain)){
          echo '<link rel="dns-prefetch" href="'.$domain.'" />'."\n";
        }
      }
      unset($domain);
    }
    echo "<!-- DNS Prefetching end --> \n";
}
add_action( 'wp_head', 'dns_prefetch', 0 );


/*=====  End of WP HEAD / DOC HEAD / META  ======*/