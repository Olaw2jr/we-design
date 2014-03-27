<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Olaw2jr
 * @since Olaw2jr 1.0
 */
?>

	<div class="media">
        <a class="pull-left hidden-xs" href="<?php the_author_meta('user_url');?>">
          <?php
			/**
			 * Filter the author bio avatar size.
			 *
			 * @since Olaw2jr 1.0
			 *
			 * @param int $size The avatar height and width size in pixels.
			 */
			$author_bio_avatar_size = apply_filters( 'Olaw2jr_author_bio_avatar_size', 200 );
			echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
			?>
	    </a>
        <div class="media-body">
          <h2 class="media-heading"><?php printf( __( 'About %s', 'Olaw2jr' ), get_the_author() ); ?></h2>

          <?php the_author_meta( 'description' ); ?>

          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/Olaw2jr" data-widget-id="437890821740703744">Tweets by @Olaw2jr</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



              <!-- Social media links. -->
                <div class="social">
                  <?php 
                    $facebook_profile = get_the_author_meta( 'facebook_profile' );
                      if ( $facebook_profile ) {
                        echo '<a href="' . esc_url($facebook_profile) . '" class="tip" data-original-title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a>';
                        }
                    $twitter_profile = get_the_author_meta( 'twitter_profile' );
                      if ( $twitter_profile ) {
                        echo ' <a href="' . esc_url($twitter_profile) . '" class="tip" data-original-title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a> ';
                        }
                    $google_profile = get_the_author_meta( 'google_profile' );
                      if ( $google_profile ) {
                        echo ' <a href="' . esc_url($google_profile) . '" class="tip" data-original-title="Google Plus"><i class="fa fa-google-plus-square fa-2x"></i></a> ';
                        }
                    $linkedin_profile = get_the_author_meta( 'linkedin_profile' );
                      if ( $linkedin_profile ) {
                        echo ' <a href="' . esc_url($linkedin_profile) . '" class="tip" data-original-title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a> ';
                        }
                  ?>
                </div>
        </div>
    </div>
