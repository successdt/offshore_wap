<?php if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>

    <div class="comment-wrap">
       <div class="comment">
            <?php global $post; ?>
           
           <h5><?php echo get_comments_number($post->ID); ?> <?php _e('Comments', THEME_NAME ); ?></h5>
           <ul>
                <?php wp_list_comments( array( 'callback' => 'fw_comment_list' ) ); ?>
           </ul>
           
           <?php
                // Are there comments to navigate through?
                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
            </nav><!-- .comment-navigation -->
            <?php endif; // Check for comment navigation ?>
            
            <?php if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="no-comments"><?php _e( 'Comments are closed.' , THEME_NAME ); ?></p>
            <?php endif; ?>
            
        </div>
    </div>
    
<?php endif; ?>

<?php fw_comment_form(); ?>
