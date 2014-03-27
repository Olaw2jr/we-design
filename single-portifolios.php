<?php
/**
 *Template Name: Single Portifolio
 *
 * The template for displaying Single Portifolio page
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

      <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
    
      <?php 
        $custom = get_post_custom($post->ID);
            $website = $custom["website"][0];  
            $client = $custom["client"][0]; 
            $logo= get_the_post_thumbnail($post->ID);

                if ($website != "" || $website != "http://"){
                $website= "<a type='button' class='btn btn-primary' href=\"$website\">VISIT THE PROJECT</a>";
            }else{
                $website= "";
            }
      ?>

      <div class="row">

        <div class="col-lg-12">
          <h3 class="page-header"> <?php the_title(); ?> </h3>
        </div>

      </div>

      <div class="row">

        <div class="col-md-8">
          <div class="img-responsive thumbnail"> <?php the_post_thumbnail('portifolios'); ?> </div> 
        </div>

        <div class="col-md-4">
          <h4>About Project</h4>
          <?php the_content( ); ?>
          <h4>Project Details</h4>
          <ul class="list-unstyled">
            <?php if($client != "")  print "<li><span class='glyphicon glyphicon-user'></span>  $client</li>"; ?>
            <li><span class="glyphicon glyphicon-calendar"></span>  <?php the_time('l F d, Y'); ?></li>
            <li><span class="glyphicon glyphicon-tags"></span> <?php echo get_the_term_list($post->ID, 'portifolio-type', '', ', ',''); ?></li><br>
            <?php if($website != "") print "<li>$website</li>"; ?>
          </ul>

        </div>

      </div>

  <?php endwhile; else: ?>
      <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>

      <div class="row">

<!-- begin custom related loop, isa -->
 
<?php 
 
// get the custom post type's taxonomy terms
 
$custom_taxterms = wp_get_object_terms( $post->ID, 'portifolio-type', array('fields' => 'ids') );
// arguments
$args = array(
'post_type' => 'portifolios',
'post_status' => 'publish',
'posts_per_page' => 3, // you may edit this number
'orderby' => 'rand',
'tax_query' => array(
    array(
        'taxonomy' => 'portifolio-type',
        'field' => 'id',
        'terms' => $custom_taxterms
    )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
echo '<div class="col-lg-12">
                <h3 class="page-header">More Projects</h3>
            </div>';
while ( $related_items->have_posts() ) : $related_items->the_post();
?>

        <div class="col-sm-3 col-xs-6">
        	<a href="<?php the_permalink(); ?>" class="img-responsive portfolio-item thumbnail"><?php the_post_thumbnail('portifolio'); ?></a>
        </div>

<?php
endwhile;
echo '<br>';
endif;
// Reset Post Data
wp_reset_postdata();
?>
 
 
<!-- end custom related loop, isa -->

      </div>

    </div>


<?php
// Gets footer.php
get_footer();

?>