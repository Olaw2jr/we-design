<?php
    /**
     * The main template file.
     *
     * This is the most generic template file in a WordPress theme and one of the
     * two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * For example, it puts together the home page when no home.php file exists.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     *
     * @package WordPress
     * @subpackage WpStrap
     * @since wpstrap 1.0
     */

// Gets header.php
get_header(); ?>




    <div class="container">

      <div class="row">
        <div class="col-md-8">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


    <div class="<?php $post_cats = get_the_category(); foreach( $post_cats as $category ) { echo $category->slug.' ';} ?>">
          <!-- blog entry -->
          <span class="cat-links"><?php the_category(', '); ?></span>
          <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <?php the_post_thumbnail(); ?>

          <p class="entry-meta">
               <small>
                    <i class="fa fa-user"></i> <?php the_author_posts_link(); ?> 
                    <i class="fa fa-clock-o"></i> <?php the_time('F d, Y'); ?>
                    <i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number('Leave a comment','1 Comment','2 Comments'); ?></a>
               </small>
          </p>


          <?php the_excerpt(); ?>
                    
          <hr>
          <!-- /blog entry -->
    </div>

          <?php endwhile; else: ?>
               <p><?php _e('No posts were found. Sorry!'); ?></p>
          <?php endif; ?>

          <ul class="pager">
            <li class="next"><?php next_posts_link('← Older'); ?></li>
            <li class="previous"><?php previous_posts_link('Newer →'); ?></li>
          </ul>

        </div>

        <?php get_sidebar(); ?>
      
      <hr>
     </div><!-- /.row -->
    </div><!-- /.container -->

<?php // Gets footer.php
get_footer();
?>