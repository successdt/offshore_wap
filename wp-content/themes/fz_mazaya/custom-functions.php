<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*-----------------------------------------------------------------------------------*/
/*  mazaya costum fonctions
-------------------------------------------------------------------------------------*/

/*  mazaya soundcloud
-----------------------------------------------------------------------------------*/
function mazaya_soundcloud($url , $autoplay = 'false' ) {
	return '<iframe height="166" src="https://w.soundcloud.com/player/?url='.$url.'&amp;auto_play='.$autoplay.'&amp;show_artwork=true"></iframe>';
}
// begain mom_post_image since v4
function mom_post_image($size = 'thumbnail'){
		global $post;
		$image = '';
		//get the post thumbnail
		$image_id = get_post_thumbnail_id($post->ID);
		$image = wp_get_attachment_image_src($image_id,  
		$size);
		$image = $image[0];
		if ($image) return $image;
		//if the post is video post and haven't a feutre image
		$type = get_post_meta($post->ID, 'mom_article_type', true);
		$vtype = get_post_meta($post->ID, 'mom_video_type', true);
		$vId = get_post_meta($post->ID, 'mom_video_id', true);
		if($type == 'video') {
						if($vtype == 'youtube') {
						  $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';
						} elseif ($vtype == 'vimeo') {
						$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vId.php"));
						  $image = $hash[0]['thumbnail_large'];
						} elseif ($vtype == 'daily') {
						  $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
						}
				}
		if ($image) return $image;
		//If there is still no image, get the first image from the post
		return mom_get_first_image();
		}
		function mom_get_first_image() {
		  global $post, $posts;
		  $first_img = '';
		  ob_start();
		  ob_end_clean();
		  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		  $first_img = $matches[1][0];
		
		  return $first_img;
		}

/*  mazaya Post Views
-----------------------------------------------------------------------------------*/
 
 
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.'';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
 /*  mazaya Post Format
 -----------------------------------------------------------------------------------*/
 
// adding post format support
    add_theme_support( 'post-formats',      // post formats
        array( 
            'image',   // an image
            'video',   // video 
            'audio',   // audio 
            'gallery',   // gallery

        )
    );
    
    
    
 /*  Custom Author Box
 -----------------------------------------------------------------------------------*/

function author_contact_methods( $contactmethods ) {
 
    // Remove we what we don't want
    unset( $contactmethods[ 'aim' ] );
    unset( $contactmethods[ 'yim' ] );
    unset( $contactmethods[ 'jabber' ] );
 
    // Add some useful ones
    $contactmethods[ 'twitter' ] = 'Twitter Username';
    $contactmethods[ 'facebook' ] = 'Facebook Profile URL';
    $contactmethods[ 'linkedin' ] = 'LinkedIn Public Profile URL';
    $contactmethods[ 'googleplus' ] = 'Google+ Profile URL';
    $contactmethods[ 'pinterest' ] = 'Pinterest Profile URL';
    $contactmethods[ 'dribbble' ] = 'Dribbble Profile URL';
    $contactmethods[ 'flickr' ] = 'Flickr Profile URL';
    $contactmethods[ 'instagram' ] = 'Instagram Profile URL';
    $contactmethods[ 'soundcloud' ] = 'Soundcloud Profile URL';
    return $contactmethods;
}
 
add_filter( 'user_contactmethods', 'author_contact_methods' );

/*  Related Thumb
 -----------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );
add_image_size( 'related-thumb', 300, 200, true ); // Hard Crop Mode
add_image_size( 'mazaya-thumb', 400, 260, true ); // Hard Crop Mode
add_image_size( 'posts-image-thumb', 75, 65, true ); // Hard Crop Mode
/*  Intro Text limit 
 -----------------------------------------------------------------------------------*/

    function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
    }
     
    function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
    }	
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
    }
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/warp/plugin-activation.php';


	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	add_action('tgmpa_register', 'mazaya_register_required_plugins');
	function mazaya_register_required_plugins() {
			$plugins = array(
			array(
				'name'     				=> 'Rokcommon', // The plugin name
				'slug'     				=> 'wp_rokcommon', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/warp/plugins/wp_rokcommon.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
						array(
				'name'     				=> 'Widgetkit', // The plugin name
				'slug'     				=> 'widgetkit', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/warp/plugins/widgetkit.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'CF Post Formats', // The plugin name
				'slug'     				=> 'cf-post-formats', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/warp/plugins/cf-post-formats.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			
			
			array(
				'name'     				=> 'Roksprocket', // The plugin name
				'slug'     				=> 'wp_roksprocket', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/warp/plugins/wp_roksprocket.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
		);
		
	
	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'warp';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

add_theme_support( 'automatic-feed-links' );

/* load scripts flexslider 2 */
function mazaya_adding_scripts() {

wp_register_script('warplibray', get_template_directory_uri() . '/warp/js/warp.js', array('jquery'),'6.4.2',true);
wp_enqueue_script('warplibray');

wp_register_script('responsivelibray', get_template_directory_uri() . '/warp/js/responsive.js', array('jquery'),'1.0.0',true);
wp_enqueue_script('responsivelibray');

wp_register_script('templatelibray', get_template_directory_uri() . '/js/template.js', array('jquery'),'6.4.2',true);
wp_enqueue_script('templatelibray');
wp_register_script('dropdownmenulibray', get_template_directory_uri() . '/warp/js/dropdownmenu.js', array('jquery'),'6.4.2',true);
wp_enqueue_script('dropdownmenulibray');
wp_register_script('accordionmenu', get_template_directory_uri() . '/warp/js/accordionmenu.js', array('jquery'),'6.4.2',true);
wp_enqueue_script('accordionmenu');
/*wp_register_script('jquery-plugins', get_template_directory_uri() . '/js/jquery.plugins.js', array('jquery'), false);
wp_enqueue_script('jquery-plugins');*/

/*wp_register_script('jquery-libray', get_template_directory_uri() . '/js/jquery.js', array('jquery'),'1.8.1',true);
wp_enqueue_script('jquery-libray');*/

wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'),'2.1',true);
wp_enqueue_script('flexslider');

}
add_action( 'wp_enqueue_scripts', 'mazaya_adding_scripts' );  

/*
//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

*/
if ( ! isset( $content_width ) ) $content_width = 900;




function ispireme_fix_category_tag ($ispireme_cat_output) {
$ispireme_cat_output = str_replace(array('rel="category tag"','rel="category"'),'', $ispireme_cat_output);

return $ispireme_cat_output;
}
add_filter( 'the_category', 'ispireme_fix_category_tag' );










/******************************************************************************.
*  Code modifies the default excerpt_length and excerpt_more filters.
*******************************************************************************/
function custom_wp_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
	    $text = get_the_content('');
	 
	    $text = strip_shortcodes( $text );
	 
	    $text = apply_filters('the_content', $text);
	    $text = str_replace(']]>', ']]&gt;', $text);
	     
	    /***Add the allowed HTML tags separated by a comma.***/
	    $allowed_tags = '<p>,<a>,<em>,<strong>'; 
	    $text = strip_tags($text, $allowed_tags);
	     
	    /***Change the excerpt word count.
	    $excerpt_word_count = 10;
	    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
	     
	    /*** Change the excerpt ending
	    $excerpt_end = ' <a href="'. get_permalink($post->ID) . '">' . '&raquo; Continue Reading.' . '</a>';
	    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
	     
	    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
	    if ( count($words) > $excerpt_length ) {
	        array_pop($words);
	        $text = implode(' ', $words);
	        $text = $text . $excerpt_more;
	    } else {
	        $text = implode(' ', $words);
    }
    
    ***/
    
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
//remove_filter('get_the_excerpt', 'wp_trim_excerpt');
//add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');


/* ********************
* Limit post excerpts. Within theme files used as
* print string_limit_words(get_the_excerpt(), 20);
******************************************************************** */
function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}
function catch_that_image($post_content) {
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
	$first_img = $matches[1][0];
	return $first_img;
}

function new_excerpt_more( $excerpt ) {
	return str_replace( '[...]', '.', $excerpt );
}
add_filter( 'wp_trim_excerpt', 'new_excerpt_more');