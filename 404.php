<?php
/**
 * The template for displaying 404 pages (Not Found)
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
			<div class="col-md-12 _404Heading">
				
				<h1>You found a dead link!</h1>
				
			</div> <!-- end of span12 tag-->
			
			<div class="col-md-12 _404Link">
				<i class="fa fa-unlink"></i>
			</div>
			
			<div class="col-md-12 _404Error">
				404 Error <i class="fa fa-bolt"></i>
			</div>
			
			<div class="col-md-12 _404Home">
				<h4>Go back <a href="<?php echo home_url(); ?>"> <i class="fa fa-home"></i> </a> or <a href="<?php echo home_url(); ?>/contact"> Report it. </a> </h4>
			</div>			
		</div> <!-- end of row tag-->

	
	
	
	
	<div class="row">
		<div class="col-md-12">
			
		</div> <!-- end of span12 tag-->
	</div> <!-- end of row tag-->
	
	
</div>

<?php get_footer(); ?>