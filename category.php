<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Olaw2jr
 * @since Olaw2jr 1.0
 */

get_header(); ?>

<header class="well">
<div class="container">
  <?php olaw2jr_breadcrumbs(); ?>
</div>
</header>

<div class="container">

	<div class="row">
        <div class="col-md-8">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h3 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h3>

				<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		  <div class="media">
		  	<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		  	
	        <a class="pull-left hidden-xs" href="<?php the_permalink(); ?>">

	          <?php the_post_thumbnail('categories'); ?>
	          
	        </a>
	        <div class="media-body">
	          
	          <p class="entry-meta">
	               <small>
	                    <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
	                    <i class="fa fa-clock-o"></i>  <?php the_time('F d, Y'); ?>
	               </small>
	          </p>

	          <?php the_excerpt(); ?>
	          
	        </div>
	      </div>

	      <hr>

	      <?php endwhile; else: ?>
               <p><?php _e('No posts were found. Sorry!'); ?></p>
          <?php endif; ?>

	    </div><!-- /col-md-8 -->

		<?php get_sidebar(); ?>

	</div><!-- /row -->

</div>

<?php get_footer(); ?>