<?php
/**
 * el Duderino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package el_Duderino
 */

if ( ! function_exists( 'el_duderino_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function el_duderino_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on el Duderino, use a find and replace
	 * to change 'el-duderino' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'el-duderino', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'el-duderino' ),
		'primary-mobile' => esc_html__( 'Primary Mobile', 'el-duderino' ),
		'footer' => esc_html__( 'Footer', 'el-duderino' ),
	) );




	if ( ! function_exists( 'get_nav_menu_item_count' ) ) {

			function get_nav_menu_item_count( $location ) {

				$menu_to_count = wp_get_nav_menu_items(array(
					'echo' => 0,
					'depth' => 1,
					'theme_location' => $location
					));

				$count = substr_count($menu_to_count,'class="menu-item ');

				return $count;

			}

	}


	if ( ! function_exists( 'get_nav_menu_item_count_class' ) ) {

			// @param string $menu [Menu name, ID, or slug]
			function get_nav_menu_item_count_class($menu){

				$menu_items = wp_get_nav_menu_items( 'primary-menu' );


				$item_count = substr_count($menu_items,'class="menu-item ');


				if( $item_count > 0 ) {

					return ' items-'.$item_count;

				}

				else {

					return false;

				}

			}

	}

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'el_duderino_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'el_duderino_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function el_duderino_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'el_duderino_content_width', 640 );
}
add_action( 'after_setup_theme', 'el_duderino_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function el_duderino_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'el-duderino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'el-duderino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'el_duderino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function el_duderino_scripts() {
	wp_enqueue_style( 'el-duderino-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'el-duderino-global-js', get_template_directory_uri() . '/js/global.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	/**
	 * Add async attributes to enqueued scripts where needed.
	 * The ability to filter script tags was added in WordPress 4.1 for this purpose.
	 */
	// function el_duderino_async_scripts( $tag, $handle, $src ) {
	//     // the handles of the enqueued scripts we want to async
	//     $async_scripts = array( 'el-duderino-global-js' );

	//     if ( in_array( $handle, $async_scripts ) ) {
	//         return '<script id="' . $handle . '" type="text/javascript" src="' . $src . '" async="async"></script>' . "\n";
	//     }

	//     return $tag;
	// }
	// add_filter( 'script_loader_tag', 'el_duderino_async_scripts', 10, 3 );




}
add_action( 'wp_enqueue_scripts', 'el_duderino_scripts' );

/**
 * Password Protected Post
 * Customizes the_password_form 
 */
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $html = '<p>'. __( "To view this protected post, enter the password below:" ).'</p>' 
            .'<form class="post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">'
                .'<label class="post-password-form__label" for="' . $label . '">' . __( "Password:" ) . ' </label>'
                .'<input class="post-password-form__field" name="post_password" id="' . $label . '" placeholder="enter password" type="password" size="20" maxlength="20" />'
                .'<input class="post-password-form__submit" type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />'
            .'</form>';

    return $html;
}
add_filter( 'the_password_form', 'my_password_form' );

/**
 * Move WP core jQuery to the footer
 */
// wp_scripts()->add_data( 'jquery', 'group', 1 );
// wp_scripts()->add_data( 'jquery-core', 'group', 1 );
// wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

/**---------------------------
 * Adobe Typekit -- Optional
 * ---------------------------/

/* ======================================
add_action( 'wp_head', 'el_duderino_load_typekit', 0 );

if ( ! function_exists( 'el_duderino_load_typekit' ) ) {

function el_duderino_load_typekit() { ?>
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
<?php }

}
========================================== */




/*=====  End of SCRIPTS & STYLES  ======*/

/**
 * Implement custom meta tags in the document head.
 */
require get_template_directory() . ('/inc/wp-head-meta.php');


/**
 * Implement the Custom functions used for Advanced Custom Fields .
 */
require get_template_directory() . ('/inc/acf/acf-functions.php');

/**
 * Implement the Custom menu using BEM CSS naming conventions.
 */
require get_template_directory() . ('/inc/wp-bem-menu.php');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
