<?php
// Customize Comment Output
function twbs_comment_format($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

			<li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
                <a class="pull-left" href="#">
                    <div class="avatar-img thumbnail"><?php echo get_avatar($comment, '64'); ?></div>
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php comment_author_link(); ?> 
                    	<small><?php comment_date(); ?></small>

                    	<span class="label label-default">
				        	<?php comment_reply_link( array_merge( $args, array( 
				        		'reply_text' => __( 'Reply' ), 
				        		'depth' => $depth, 
				        		'max_depth' => $args['max_depth'] ) ) ); 
				        	?>
				        </span>
                    </h4>
                    <div class="commenttext">
	           			<?php if ($comment->comment_approved == '0') { // Awaiting Moderation ?>
							<em><?php _e('Your comment is awaiting moderation.') ?></em>
						<?php } ?>
						<?php comment_text(); ?>
	        		</div>
                </div>

<?php } // twbs_comment_format ?>