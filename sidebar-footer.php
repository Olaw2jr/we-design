<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Widget Template
 *
 *
 * 
 *
 * @category Olaw2jr Framework
 * @package  Framework
 * @since    1.0
 * @author   Oscah Olotu
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.oscah.co.tz/
 */


if( !is_active_sidebar( 'footer-widget' ) ) {
	return;
}
?>
<!--=== Footer ===-->
	<div class="footer">
	    <div class="container">
	        <div class="row">


			<?php if( is_active_sidebar( 'footer-widget' ) ) : ?>

				<?php dynamic_sidebar( 'footer-widget' ); ?>

			<?php endif; //end of colophon-widget ?>

			</div><!--/row-->   
    	</div><!--/container--> 
	</div><!--/footer-->    
<!--=== End Footer ===-->