<?php
/**
 * The template for displaying all single posts
 *
 *
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
        <div class="col-lg-8">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
          <!-- the actual blog post -->
          <span class="cat-links"><?php the_category(', '); ?></span>
          <h3 class="entry-title"><?php the_title(); ?></h3>
          <div class="img-responsive"><?php the_post_thumbnail(); ?></div>

          <p class="entry-meta">
               <small>
                    <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                    <i class="fa fa-clock-o"></i> <?php the_time('F d, Y'); ?>
                    <i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number('Leave a comment','1 Comment','2 Comments'); ?></a>
               </small>
          </p>


          <?php the_content( ); ?>

          <p class="entry-meta">
               <small>
                    <i class="fa fa-tag"></i> <?php the_tags(', '); ?>
               </small>
          </p>

          <hr>
          <!-- /the actual blog post -->

          <?php endwhile; else: ?>
               <p><?php _e('No posts were found. Sorry!'); ?></p>
          <?php endif; ?>

          <?php comments_template(); ?>

        </div>
        
        <?php get_sidebar(); ?>

      </div>
    </div><!-- /.container -->

<?php get_footer(); ?>