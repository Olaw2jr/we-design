<?php 
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
 
  <?php 
  // Fires the 'wp_head' action and gets all the scripts included by wordpress, wordpress plugins or functions.php 
  // using wp_enqueue_script if it has $in_footer set to false (which is the default)
  wp_head(); ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars fa-lg"></i>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img class="logo-header" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-default.png" alt="WeDesign">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <?php // Loading WordPress Custom Menu
        wp_nav_menu( array(
          'container_class' => 'navbar-collapse collapse',
          'menu_class'      => 'nav navbar-nav navbar-right',
          'menu_id'         => 'main-menu',
          'walker'          => new Cwd_wp_bootstrapwp_Walker_Nav_Menu()
        ) );
      ?><!-- /.navbar-collapse -->
  </div>
</div>
