<?php
 
// Enqueue Styles and Scripts Files
 
    function wd_front_slider_scripts() {
        //wp_enqueue_script( 'jquery' );
 
        wp_enqueue_style( '3d_slider-style', get_template_directory_uri() . '/inc/slider/css/style.css' );
 
        wp_enqueue_script('Modernizr', get_template_directory_uri() . '/inc/slider/js/modernizr.custom.53451.js','2.0.6', false );
        wp_enqueue_script('jquery.gallery', get_template_directory_uri() . '/inc/slider/js/jquery.gallery.js', array('jquery'),'3.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'wd_front_slider_scripts' );



// Initialize Slider
 
    function wd_front_slider_initialize() { ?>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('#dg-container').gallery({
                    autoplay    :   true
                });
            });
        </script/>
    <?php }
    add_action( 'wp_head', 'wd_front_slider_initialize' );




// Create Slider
 
    function wd_slider_template() { ?>
 
        <!--=== Slider ===-->
            <section id="dg-container" class="dg-container">
                <div class="dg-wrapper">

                <?php
                    $mypost = array( 'post_type' => 'portifolios', );
                    $loop = new WP_Query( $mypost );
                    ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post();?>

                    <a class="img-responsive"  href="#"><?php the_post_thumbnail('homepage-slide'); ?><div></div></a>
                    
                <?php endwhile; ?>
                
                </div>

                <!--nav>    
                    <span class="dg-prev">&lt;</span>
                    <span class="dg-next">&gt;</span>
                </nav-->
            </section><!--/slider-->
        <!--=== End Slider ===-->
   <?php }


