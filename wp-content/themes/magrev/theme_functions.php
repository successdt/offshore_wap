<?php 
	
//Including Custom Post Types
include('libs/custom_post_types.php');

/* Register Custom taxonomiess */
include('libs/taxonomies.php');

// Including Meta Boxes
include('libs/metaboxes/metaboxes.php');

include('libs/ajax_handler.php');

// Including Meta Boxes
include('libs/fw_seo.php');

// Including the Shortcodes
include('libs/shortcodes_class.php');
include('libs/shortcode_editor.php');

/** Register custom post type gallery */
include('libs/wpnukes-gallery/wpnukes-gallery.php');

//Adding Shortcodes
$fw_shortcodes = new FW_Shortcodes;
$fw_shortcodes->add_shortcode();

/** If the popup for shortcode inserter is loaded */
if(isset($_GET['fw_editor_action']) && $_GET['fw_editor_action'] == 'shortcode')
{
 	include('libs/sc-editor.php');exit;
}

/** GET Views Count of Single Post **/
function fw_get_post_views($post_id){
	$count_key = 'fw_post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	if($count==''){
		add_post_meta($post_id, $count_key, '0');
		return 0;
	}
	return $count;
}

/** SET Views Count For Single Post **/
function fw_set_post_views($post_id){
	$count_key = 'fw_post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	$count = ($count == '') ? 1 : $count+1;
	update_post_meta($post_id, $count_key, $count);
}
	
/*** FW Rating Call Back ***/
function fw_rating_callback() {
	$post = $_POST['post'];
	$rate = $_POST['rate'];
	
	$total_rating = get_post_meta($post,'fw_total_rating', true);
	$total_persons = get_post_meta($post,'fw_total_persons', true);
	$avrg_rating = get_post_meta($post,'fw_average_rating', true);
	$total_rating = ($total_rating=='') ? 0 : $total_rating;
	$total_rating += $rate;
	$total_persons = $total_persons + 1;
	$avrg_rating = $total_rating / $total_persons;
	
	update_post_meta($post,'fw_total_rating',$total_rating);
	update_post_meta($post,'fw_total_persons',$total_persons);
	update_post_meta($post,'fw_average_rating',$avrg_rating);
	echo $avrg_rating;
	die();
}
	
add_action('wp_ajax_fw_rating', 'fw_rating_callback');
	
	
function fw_comment_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="last">
		<p><?php _e( 'Pingback:', THEME_NAME ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', THEME_NAME ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
	break;
	default :
	?>
	 <li class="clearfix" id="comment-<?php comment_ID(); ?>">
		<figure>
			<a href="#"><?php echo get_avatar( $comment, 80 ); ?></a>
		</figure>
		<div>
			<h6><?php echo get_comment_author_link(); ?></h6> <span> <?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?> </span>
			<p><?php comment_text(); ?></p>
		  
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'reply', THEME_NAME ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</li>
	<?php
	endswitch;
}
	
function fw_comment_form( $args = array(), $post_id = null ) {
	global $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => ' <fieldset><input id="author" name="author" type="text" placeholder="name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
		'email'  => '<input id="email" name="email" placeholder="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
		'url'    => '<input id="url" name="url" placeholder="site"  type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></fieldset>',
	);

	$required_text = '';
	$styles_on_login = (is_user_logged_in()) ? 'style="float: left;"' : '';
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="message" '.$styles_on_login .'></textarea>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Comment', THEME_NAME ),
		'title_reply_to'       => __( 'Leave a Comment to %s', THEME_NAME  ),
		'cancel_reply_link'    => __( 'Cancel reply', THEME_NAME  ),
		'label_submit'         => __( 'Add a Comment', THEME_NAME  ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
		 <div class="comment-form" id="respond">
		 <h5><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h5>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php echo $args['comment_notes_after']; ?>
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" <?php echo $styles_on_login; ?>/>
							<?php comment_id_fields( $post_id ); ?>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
				<div class="clearfix"></div>
			</div>
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<p>Comments are closed</p>
			<?php do_action( 'comment_form_comments_closed' ); ?>
			
		<?php endif; 
}


/**
 * this function either prints or return the pagination of any archive/listing page.
 *
 * @param	array	$args	Array of arguments
 * @param	bolean	$echo	whether print or return the output.
 *
 * @return	string	Prints or return the pagination output.
 */
function fw_the_pagination($args = array(), $echo = 1)
{
	
	global $wp_query;
	
	$default =  array('base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages, 'next_text' => __('Next', THEME_NAME), 'prev_text' => __('Prev', THEME_NAME), 'type'=>'list');
						
	$args = wp_parse_args($args, $default);			
	
	$pagination = '<div class="pagination pagination-left">'.paginate_links($args).'</div>';
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo $pagination;
		return $pagination;
	}
}



	
    