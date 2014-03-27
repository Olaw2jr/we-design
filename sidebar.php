<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */

?>

		<div class="col-md-4">

      <?php if ( !function_exists( 'dynamic_sidebar' ) ||
        !dynamic_sidebar('Primary Sidebar') ) : ?>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Search</h3>
            </div>
            <div class="panel-body">
               <?php get_search_form(); ?>
            </div><!-- /panel-body -->
          </div><!-- /panel -->

        

      <?php endif; ?>

    </div>
	