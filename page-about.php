<?php
/**
 *
 *Template Name: About
 *
 *
 * The template for displaying About page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */

get_header(); ?>

<header class="well">
<div class="container">
  <?php olaw2jr_breadcrumbs(); ?>
</div>
</header>

    <div class="container">
      
      <div class="row">
      <?php if (have_posts()) : ?>
              
        <?php while (have_posts()) : the_post(); ?>
      
        <div class="col-lg-12">
          <h1 class="page-header"><?php the_title(); ?>, <br><small>It's Nice to Meet You!</small></h1>
          <?php the_content( ); ?>
        </div>

        <?php endwhile; ?>

    <?php endif; ?>

        <div class="col-lg-12">
          <h2 class="page-header">Our Team</h2>
        </div>

      </div>

  <div class="row">
    
    <div class="col-lg-4 col-sm-5">
      <div class="tm_view tm_view_sixth">
        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/admn-manu.jpg" alt="">
        <div class="tm_mask"></div>
        <div class="tm_content">
          <h2>Prince Emineys <br><small>Web Designer/Developer</small></h2>
          <p> Graphics Designer and Web developer since teen, also likes blogging and I love my job! </p>
          <!--<a href="#" type="button" class="btn btn-primary">Read More</a>-->
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="tooltip-social facebook-link"><a href="https://facebook.com/princeemineys" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social twitter-link"><a href="https://twitter.com/emineysprince" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <!--<li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>-->
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-sm-5">
      <div class="tm_view tm_view_sixth">
        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/admn-oscar.jpg" alt="">
        <div class="tm_mask"></div>
        <div class="tm_content">
          <h2>Oscah Ollotu <br><small>Web Developer/Marketing Expert</small></h2>
          <p> Web Designer/Developer. Loves Marketing(Internet Marketing), WordPress, Laravel and Bootstrap! </p>
          <!--<a href="#" type="button" class="btn btn-primary">Read More</a>-->
          <ul class="list-unstyled list-inline list-social-icons">
            <!--<li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>-->
            <li class="tooltip-social twitter-link"><a href="https://twitter.com/olaw2jr" data-toggle="tooltip" data-placement="top" title="Oscah Ollotu on Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="https://plus.google.com/+OscarEugine?rel=author" data-toggle="tooltip" data-placement="top" title="Oscah Ollotu on Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-sm-5">
      <div class="tm_view tm_view_sixth">
        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/700x430.jpg" alt="">
        <div class="tm_mask"></div>
        <div class="tm_content">
          <h2>You Doe <br><small>Got An Idea???</small></h2>
          <p> We are currently available for work. Please, contact us for a quote! </p>
          <a href="<?php echo home_url(); ?>/contact" type="button" class="btn btn-primary">Contact Us</a>
        </div>
      </div>
    </div>
  </div>

<?//php get_sidebar('customer'); ?>

</div>

<?php
// Gets footer.php
get_footer();

?>