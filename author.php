<?php
/**
 * The template for displaying Author archive pages
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

	    <?php if ( have_posts() ) : ?>

      <?php
        /*
         * Queue the first post, that way we know what author
         * we're dealing with (if that is the case).
         *
         * We reset this later so we can run the loop
         * properly with a call to rewind_posts().
         */
        the_post();
      ?>

      <?php
        /*
         * Since we called the_post() above, we need to
         * rewind the loop back to the beginning that way
         * we can run the loop properly, in full.
         */
        rewind_posts();
      ?>

      <?php if ( get_the_author_meta( 'description' ) ) : ?>
        <?php get_template_part( 'author-bio' ); ?>
      <?php endif; ?>

      <hr>

      <header class="archive-header well well-sm">
        <h4 class="archive-title"><?php printf( __( 'Post By %s', 'olaw2jr' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h4>
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

</div>

<?php get_footer(); ?>