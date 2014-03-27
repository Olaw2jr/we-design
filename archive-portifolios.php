<?php
/**
 *
 *Template Name: Portifolio
 *
 *
 * The template for displaying portifolio page
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

	<div id="options" class="clearfix container">
		<?php
			$terms = get_terms("portifolio-type");
			$count = count($terms);
			echo '<ul id="filters" class="pagination option-set clearfix" data-option-key="filter">';
			echo '<li><a href="#" data-filter="*">show all</a></li>';
			if ( $count > 0 ){
					
				foreach ( $terms as $term ) {
							
					$termname = strtolower($term->name);
					$termname = str_replace(' ', '-', $termname);
					echo '<li><a href="#" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
				}
			}
			echo "</ul>";
		?>
		</div>

	<div class="row">
		<div id="container" class="clearfix isotope">

		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
			<?php 
				$custom = get_post_custom($post->ID);
        		$website = $custom["website"][0];  
        		$client = $custom["client"][0]; 
        		$logo= get_the_post_thumbnail($post->ID);
			?>

			<?php
				$terms = get_the_terms( $post->ID, 'portifolio-type' );
								
				if ( $terms && ! is_wp_error( $terms ) ) : 
					$links = array();

				foreach ( $terms as $term ) 
					{
						$links[] = $term->name;
					}
						$links = str_replace(' ', '-', $links);	
						$tax = join( " ", $links );		
				else :	
						$tax = '';	
				endif;
			?>

		<div id="element" class="col-md-4 element <?php echo strtolower($tax); ?>">
			<div class="panel panel-default">
    <div class="panel-heading text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
    </div>
    <div class="panel-body">
        <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portifolio'); ?></a></p>
    </div>
    <div class="panel-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-block btn-primary">More info</a>
    </div>
  </div>
		</div>


		<?php endwhile; else: ?>
			<p><?php _e('No Porejects were found. Sorry!'); ?></p>
		<?php endif; ?>

		</div>
	</div>
</div>

<?php
// Gets footer.php
get_footer();

?>