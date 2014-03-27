<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Olaw2jr
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
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
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'Olaw2jr' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'Olaw2jr' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'Olaw2jr' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'Olaw2jr' ), get_the_date( _x( 'Y', 'yearly archives date format', 'Olaw2jr' ) ) );
					else :
						_e( 'Archives', 'Olaw2jr' );
					endif;
				?></h1>
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