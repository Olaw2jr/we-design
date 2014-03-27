<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */

get_header(); ?>

<!--Custom codes goes here-->

<?php // Get number of results
$results_count = $wp_query->found_posts;
?>
<header class="well">
<div class="container">
  <?php olaw2jr_breadcrumbs(); ?>
</div>
</header>

<div class="container">
        <h1>Search <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
                <?php if ($results_count == '' || $results_count == 0) { // No Results ?>
                        <p><span class="label label-danger"><?php _e('No Results'); ?></span>&nbsp; <?php _e('Try different search terms.'); ?></p>
                <?php } else { // Results Found ?>
                        <p><span class="label label-success"><?php echo $results_count . __(' Results'); ?></span></p>
                <?php } // end results check ?>
                <div class="row">
                        <div class="col-md-3">
                                <?//php get_search_form(); ?>
                        </div>
                </div>
</div> <!-- .container -->

<div class="container">

        <div class="row">
        <div class="col-md-8">

                <?php if ( have_posts() ) : ?>

                        <header class="page-header">
                                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>
                        </header><!-- .Search Results -->

                        <?php /* The loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                  <div class="media">
                <a class="pull-left hidden-xs" href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('archives'); ?>
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
               <p><span class="label label-danger"><?php _e('No Results'); ?></span>&nbsp; <?php _e('Try different search terms.'); ?></p>
          <?php endif; ?>

            </div><!-- /col-md-8 -->

                <?php get_sidebar(); ?>

        </div><!-- /row -->

</div>
<?php get_footer(); ?>