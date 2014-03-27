<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
  return;
?>

    <?php if ( have_comments() ) : ?>

        <!-- the comments -->
        <h4><?php comments_number('No Comments', '1 Comment', '% Comments' ); ?></h4><hr>

        <ol>
            <?php wp_list_comments('callback=twbs_comment_format'); ?>
        </ol>

        <ul class="pager">
          <li><?php previous_comments_link('<i class="icon-chevron-left"></i>&nbsp; Older Comments'); ?></li>
          <li><?php next_comments_link('Newer Comments &nbsp;<i class="icon-chevron-right"></i>'); ?></li>
        </ul>

        <?php else : // or, if we don't have comments:
            if ( ! comments_open() ) : ?>
                <p class="nocomments"><?php _e( 'Comments are closed.', 'WeDesign' ); ?></p>
        <?php endif; // end ! comments_open() ?>

    <?php endif; // end have_comments() ?>

        <!-- /the comments -->

        <hr>

            <!-- Comment Form -->
            <div class="post-comment">
            	<h3><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h3>

                <div class="cancel-comment-reply">
                  <?php cancel_comment_reply_link(); ?>
                </div>

                <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
                <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
                <?php else : ?>

                <form role="form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                    <?php if ( is_user_logged_in() ) : ?>

                    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>

                    <?php else : ?>

                    <label>Name</label>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-0">
                            <input type="text" class="form-control" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" placeholder="Name" <?php if ($req) echo "aria-required='true'"; ?> />
                        </div>                
                    </div>
                    
                    <label>Email <span class="color-red">*</span></label>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-0">
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" placeholder="Email" <?php if ($req) echo "aria-required='true'"; ?> />
                        </div>                
                    </div>

                    <?php endif; ?>
                    
                    <label>Message</label>
                    <div class="row">
                        <div class="col-md-11 col-md-offset-0">
                            <textarea class="form-control" rows="8" name="comment" id="comment" tabindex="4" placeholder="Type your comment here..."></textarea>
                            <span class="help-block .col-md-8"><small>You can use these HTML tags:<br /><code><?php echo allowed_tags(); ?></code></small></span>
                        </div>                
                    </div>
                    <div></div>
                    <p>
                        <button class="btn btn-primary" type="submit">Post Comment</button>
                        <?php comment_id_fields(); ?>
                    </p>

                    <?php do_action('comment_form', $post->ID); ?> 

                </form>

                <?php endif; // If registration required and not logged in ?>

            </div>
            <!-- End Comment Form -->