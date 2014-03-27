<?php 
/**
 * 
 *Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 *
 * @return void
 */

//Enqueues scripts and styles for front end.
  function cwd_wp_bootstrap_scripts_styles() {

    //Calls Other Scripts
    wp_enqueue_script( 'comment-reply' ); 
    wp_enqueue_script('jquery'); 

    // Loads Bootstrap minified JavaScript file.
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'),'3.0.0', true );

    // Loads Isotope minified JavaScript file. 
    wp_enqueue_script('isotopejs', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array('jquery'),'1.5.25', true );

    // Loads Backtop JavaScript file.
    wp_enqueue_script( 'back-to-top', get_template_directory_uri() . '/assets/js/back-to-top.js', array( 'jquery' ), '6.2.1', true );

    // Loads Bootstrap minified CSS file.
    wp_enqueue_style('bootstrapwp', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false ,'3.0.0');

    // Loads Font Awesome minified CSS file.
    wp_enqueue_style('Font_Awesome_wp', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', false ,'4.0.3');
    
    // Loads our main stylesheet.
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array('bootstrapwp') ,'1.0');

  }
  add_action('wp_enqueue_scripts', 'cwd_wp_bootstrap_scripts_styles');


/**
 * WordPress Widgets start right here.
 */
function wedesign_widgets_init() {

  register_sidebar( array(
              'name'          => __( 'Primary Sidebar', 'wedesign' ),
              'description'   => __( 'Area 1 - sidebar.php - Displays on Default, Blog, Blog Excerpt page templates', 'wedesign' ),
              'id'            => 'primary-widget-area',
              'before_widget' => '<div class="panel panel-default">',
                'after_widget' => "</div></div>",
                'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
                'after_title' => '</h3></div><div class="panel-body">',
            ) );

  register_sidebar( array(
              'name'          => __( 'Home Widget 1', 'wedesign' ),
              'description'   => __( 'Area 6 - sidebar-home.php - Displays on the Home Page', 'wedesign' ),
              'id'            => 'home-widget-1',
              'before_title'  => '<div id="widget-title-one" class="widget-title-home"><h3>',
              'after_title'   => '</h3></div>',
              'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
              'after_widget'  => '</div>'
            ) );

  register_sidebar( array(
              'name'          => __( 'Home Widget 2', 'wedesign' ),
              'description'   => __( 'Area 7 - sidebar-home.php - Displays on the Home Page', 'wedesign' ),
              'id'            => 'home-widget-2',
              'before_title'  => '<div id="widget-title-two" class="widget-title-home"><h3>',
              'after_title'   => '</h3></div>',
              'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
              'after_widget'  => '</div>'
            ) );

  register_sidebar( array(
              'name'          => __( 'Home Widget 3', 'wedesign' ),
              'description'   => __( 'Area 8 - sidebar-home.php - Displays on the Home Page', 'wedesign' ),
              'id'            => 'home-widget-3',
              'before_title'  => '<div id="widget-title-three" class="widget-title-home"><h3>',
              'after_title'   => '</h3></div>',
              'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
              'after_widget'  => '</div>'
            ) );

  register_sidebar( array(
              'name'          => __( 'Footer Widget', 'wedesign' ),
              'description'   => __( 'Area 12 - sidebar-footer.php - Maximum of 3 widgets per row', 'wedesign' ),
              'id'            => 'footer-widget',
              'before_title'  => '<div class="headline"><h3>',
              'after_title'   => '</h3></div>',
              'before_widget' => '<div class="col-md-4">',
              'after_widget'  => '</div>'
            ) );
}

add_action( 'widgets_init', 'wedesign_widgets_init' );



// Replaces the excerpt "more" text by a link
  function new_excerpt_more($more) {
    global $post;
    return '<br><a class="btn btn-primary pull-right" href="'. get_permalink($post->ID) . '">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';

  }
  add_filter('excerpt_more', 'new_excerpt_more');


//Calls nav menu
  if ( ! function_exists( 'cwd_wp_bootstrapwp_theme_setup' ) ):
    function cwd_wp_bootstrapwp_theme_setup() {
      // Adds the main menu
      register_nav_menus( array(
        'main-menu' => __( 'Main Menu', 'cwd_wp_bootstrapwp' ),
      ) );
    }
  endif;
  add_action( 'after_setup_theme', 'cwd_wp_bootstrapwp_theme_setup' );


//Require includes files
  require_once 'inc/nav.php';
  require_once 'inc/pagination.php';
  require_once 'inc/comment_format.php';
  require_once 'inc/breadcrumbs.php';
  require_once 'inc/post-type.php'; 
  require_once 'inc/Recent_Posts-widget.php';

  //require( get_template_directory() . '/inc/slider/slider_post_type.php' ); // Create Front Page Slider Post Type
  require( get_template_directory() . '/inc/slider/slider.php' ); // Create Front Page Slider


//Add support for thumbnails
  if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 750, 250, true);
    add_image_size('archives', 64, 64, true);
    add_image_size('categories', 100, 100, true);
    add_image_size('portifolio', 545, 335, true);
    add_image_size('portifolios', 710, 440, true);
    add_image_size( 'homepage-slide', 480, 260, true ); // Front page slide image
  }

//Add Register Custom Widgets
add_action( 'widgets_init', 'olaw2jr_load_widgets' );
function olaw2jr_load_widgets() {
register_widget( 'Olaw2jr_Latest_Posts' );
}


//Rwrites rules
  add_action('init', 'wpstrap_rewrite');
function wpstrap_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
    add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
    $wp_rewrite->flush_rules(); // !!!
}
