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



add_action( 'wp_head', 'advanced_typekit_loading', 0 );

function advanced_typekit_loading() {
?>
  <script>
    (function(d) {
      var config = {
        kitId: 'nht4bzh',
        scriptTimeout: 3000,
        async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
  </script>
<?php
}
