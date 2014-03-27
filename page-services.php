<?php
/**
 *
 *Template Name: Services
 *
 *
 * The template for displaying Services page
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

	<div class="business-header">
	    <div class="container">

		    <div class="row">
		        <div class="col-lg-12">
		          	<!-- The background image is set in the custom CSS -->
		            <h2 class="tagline">We love helping people. And we take pride in giving our clients an effective, high-quality product.</h2>
		        </div>
		    </div>
	      
	    </div>    
	</div>


	<div class="container">
    
      <hr>
      
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <h2>Who we are</h2>
          <p>We are an affordable web design company that offers your business internet presence like no other. We will not only register a domain name for your company, but will set up web hosting and our web designers will develop a website that will attract new clients and be virtually visible.</p>
          <p> Our highly skilled team of website designers have experience in commercial and graphic advertising and web marketing, creating websites, corporate images and printed promotional material that gets recognition. We can also set up a marketing campaign to help you grow your business!</p>
          <p><a class="btn btn-primary btn-large" href="#">See Our Work</a></p>
        </div>
        <div class="col-lg-4 col-sm-4">
          <h2>Contact Us</h2>
		  <address>
  			<strong>WeDesign, Inc.</strong><br>
  			P.O Box 78;<br>
			USA-River, Arusha<br>
		  </address>
		  <address>
			<abbr title="Phone">P:</abbr> (+255) 714-667-787<br>
            <abbr title="Email">E:</abbr> <a href="mailto:#">hello@wedesign.co.tz</a>
		  </address>
        </div>
      </div>
      
      <hr>
    </div>

    <?php get_sidebar('home'); ?>

<?php
// Gets footer.php
get_footer();

?>