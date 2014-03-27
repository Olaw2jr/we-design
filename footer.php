<?php 
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 *
 */
 
// Gets all the scripts included by wordpress, wordpress plugins or functions.php 
// using wp_enqueue_script if it has $in_footer set to true
wp_footer(); ?>
		
<?php get_sidebar( 'footer' ); ?>

<!--=== Copyright ===-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">                      
                <p class="copyright-space">
                    <?php echo date('Y'); ?> &copy; <?php echo get_bloginfo('title'); ?> Reserved. 
                    <a href="<?php echo home_url(); ?>">Privacy Policy</a> | <a href="<?php echo home_url(); ?>">Terms of Service</a>
                </p>
            </div>

            <!--<div class="col-md-6">
                <p class="copyright-space"><a class="pull-right" href="<?php echo esc_url( home_url( '/' ) ); ?>">Tanzanian Web Developer</a></p>
            </div>-->

            <div class="col-md-6">  
                <a href="<?php echo home_url(); ?>">
                    <img id="logo-footer" src="<?php echo get_template_directory_uri(); ?>/assets/img/codeispoetry.png" class="pull-right" alt="" />
                </a>
            </div>
        </div><!--/row-->
    </div><!--/container--> 
</div><!--/copyright--> 
<!--=== End Copyright ===-->

	<script type="text/javascript" >

		jQuery(window).load(function(){
			// cache container
			var $container = jQuery('#container');
			// initialize isotope
			$container.isotope({
			  // options...
			  itemSelector : '.element',
			  layoutMode : 'fitRows'
			});

			// filter items when filter link is clicked
			jQuery('#filters a').click(function(){
			  var selector = jQuery(this).attr('data-filter');
			  $container.isotope({ filter: selector });
			  return false;
			});
		});

		</script>

<!--<script type="text/javascript" >

jQuery(function($) {
        $('#foo2').carouFredSel({
                prev: '#prev2',
                next: '#next2',
                auto: false,
                items: 3,

        });
});
</script>-->

	</body>
</html> 