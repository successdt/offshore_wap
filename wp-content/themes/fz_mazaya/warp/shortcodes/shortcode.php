<?php
define ( 'JS_PATH' , get_template_directory_uri().'/warp/shortcodes/shortcode.js');
add_action('admin_head','html_quicktags');
function html_quicktags() {

	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	wp_print_scripts( 'quicktags' );

	$buttons = array();

	for ($i=0; $i <= (count($buttons)-1); $i++) {
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}'
			,'{$buttons[$i]['options']['open_tag']}'
			,'{$buttons[$i]['options']['close_tag']}'
			,'{$buttons[$i]['options']['key']}'
		); \n";
	}
	
	$output .= "\n /* ]]> */ \n
	</script>";
	echo $output;
}
function mazaya_custom_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_tcustom_tinymce_plugin");
		add_filter('mce_buttons_3', 'register_tcustom_button');
	}
}
function register_tcustom_button($buttons) {
	array_push(
		$buttons,
			"Video",
		"Audio",
		"LightBox",
		"AddBox",
		"AddButtons",
		"|",		
		"AddFlickr",
		"|",
		"highlight",
		"dropcap",
		"|",
		"checklist",
		"starlist",
		"|",
		"divider"	); 
	return $buttons;
} 
function add_tcustom_tinymce_plugin($plugin_array) {
	$plugin_array['mazayaShortCodes'] = JS_PATH;
	return $plugin_array;
}
add_action('init', 'mazaya_custom_addbuttons');

## Buttons -------------------------------------------------- #
function mazaya_shortcode_button( $atts, $content = null ) {
    @extract($atts);

	$size  = ($size)  ? ' '.$size  :' small' ;
	$color = ($color) ? ' '.$color : ' gray';
	$link  = ($link) ? ' '.$link : '';
	$target = ($target) ? ' target="_blank"' : '';

	$out = '<a href="'.$link.'"'.$target.' class="button buttoncostum'.$size.$color.$align.'">' .do_shortcode($content). '</a>';
    return $out;
}
add_shortcode('button', 'mazaya_shortcode_button');
## Boxes -------------------------------------------------- #
function mazaya_shortcode_box( $atts, $content = null ) {
    @extract($atts);

	$type =  ($type)  ? ' '.$type  :'shadow' ;
	$width = ($width) ? ' style="width:'.$width.'"' : '';

	$out = '<div class="box'.$type.'"'.$width.'> <h3 class="boxtitle"><i class="icon-'.$icon.'"></i> '.$title.'</h3>
				' .do_shortcode($content). '
			</div>';
    return $out;
}
add_shortcode('box', 'mazaya_shortcode_box');

## Lightbox -------------------------------------------------- #
function mazaya_shortcode_lightbox( $atts, $content = null ) {
    @extract($atts);

	$out = '<a data-lightbox="transitionIn:'.$transition.'; width:'.$width.' ;height:'.$height.'" href="'.$link.'" title="'.$title.'">' .do_shortcode($content). '</a>';
	
	
	
	
    return $out;
}
add_shortcode('lightbox', 'mazaya_shortcode_lightbox');

## audio -------------------------------------------------- #
function mazaya_shortcode_audio( $atts, $content = null ) {
    @extract($atts);

	$out = '<audio id="player2" controls="controls">
<source src="'. $mp3 .'" type="audio/mp3"/>
 </audio>';
    return $out;
}
add_shortcode('audio', 'mazaya_shortcode_audio');


## Flickr -------------------------------------------------- #
function mazaya_shortcode_flickr( $atts, $content = null ) {
    @extract($atts);

	$number  = ($number)  ? $number  : '5' ;
	$orderby = ($orderby) ? $orderby : 'random';

	$out = '<div class="flickr-block clearfix">
	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='. $number .'&amp;display='. $orderby .'&amp;size=s&amp;layout=x&amp;source=user&amp;user='. $id .'"></script>
	</div>';       

    return $out;
}
add_shortcode('flickr', 'mazaya_shortcode_flickr');
## AddVideo -------------------------------------------------- #
function mazaya_shortcode_AddVideo( $atts, $content = null ) {
    @extract($atts);

	$width  = ($width)  ? $width  :'550' ;
	$height = ($height) ? $height : '300';
	$video_url = @parse_url($content);

	if ( $video_url['host'] == 'www.youtube.com' || $video_url['host']  == 'youtube.com' ) {
		parse_str( @parse_url( $content, PHP_URL_QUERY ), $my_array_of_vars );
		$video =  $my_array_of_vars['v'] ;
		$out ='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
	}
	elseif( $video_url['host'] == 'www.youtu.be' || $video_url['host']  == 'youtu.be' ){
		$video = substr(@parse_url($content, PHP_URL_PATH), 1);
		$out ='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
	}
	elseif( $video_url['host'] == 'www.vimeo.com' || $video_url['host']  == 'vimeo.com' ){
		$video = (int) substr(@parse_url($content, PHP_URL_PATH), 1);
		$out='<iframe src="http://player.vimeo.com/video/'.$video.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
	elseif( $video_url['host'] == 'www.dailymotion.com' || $video_url['host']  == 'dailymotion.com' ){
		$video = substr(@parse_url($content, PHP_URL_PATH), 7);
		$video_id = strtok($video, '_');
		$out='<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$video_id.'"></iframe>';
	}
		
    return $out;
}
add_shortcode('video', 'mazaya_shortcode_AddVideo');
## AddAudio -------------------------------------------------- #
function mazaya_shortcode_Tooltip( $atts, $content = null ) {
    @extract($atts);
	if( empty($gravity) ) $gravity = '';
	$out = '<span class="post-tooltip tooltip-'.$gravity.'" title="'.$content.'">'.$text.'</span>';
   return $out;
}
add_shortcode('tooltip', 'mazaya_shortcode_Tooltip');

## highlight -------------------------------------------------- #
function mazaya_highlight_shortcode( $atts, $content = null ) {  
    return '<span class="highlight">'.$content.'</span>';  
}  
add_shortcode("highlight", "mazaya_highlight_shortcode");  

## Dropcap  -------------------------------------------------- #
function mazaya_dropcap_shortcode( $atts, $content = null ) {  
    return '<span class="dropcap">'.$content.'</span>';  
}  
add_shortcode("dropcap", "mazaya_dropcap_shortcode");  

## checklist -------------------------------------------------- #
function mazaya_checklist_shortcode( $atts, $content = null ) {  
    return '<div class="checklist">'.do_shortcode($content).'</div>';  
}  
add_shortcode("checklist", "mazaya_checklist_shortcode");
## starlist -------------------------------------------------- #
function mazaya_starlist_shortcode( $atts, $content = null ) {  
    return '<div class="starlist">'.do_shortcode($content).'</div>';  
}  
add_shortcode("starlist", "mazaya_starlist_shortcode");

## Divider -------------------------------------------------- #
function mazaya_shortcode_divider( $atts, $content = null ) {
	$out ='<div class="clear"></div><div class="divider"></div>';
   return $out;
}
add_shortcode('divider', 'mazaya_shortcode_divider');




