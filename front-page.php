<?php
/**
 * The template for displaying Home page
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */

get_header(); ?>

<?php echo wd_slider_template(); ?>

<div class="purchase">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <span>Get Serious With Your Business</span>
                <p>Wether you've just started out or have been in Business for years, we can help you start grow and manage your business Online....</p>
            </div>            
            <div class="col-md-3">
                <a href="<?php echo home_url(); ?>/portifolios" class="btn btn-primary btn-lg">See Our Portifolio</a>            
            </div>
        </div>
    </div>
</div>

<?php get_sidebar('home'); ?>


<?php get_footer(); ?>