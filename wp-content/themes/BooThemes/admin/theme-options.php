<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "fp";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

$imagepath =  get_bloginfo('stylesheet_directory') . '/admin/images/';

// Set the Options Array
$options = array();

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload"); 
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
					
$options[] = array( "name" => "Welcome Slogan h1",
					"desc" => "Enter your top welcome Slogan (Eg. Welcome to BooThemes.com)",
					"id" => $shortname."_sloganh1",
					"std" => "Welcome to BooThemes.com",
					"type" => "textarea");
                                           
$options[] = array( "name" => "Welcome Slogan description",
					"desc" => "Enter your top welcome Slogan (Eg. Best Magento themes and Worpdress Themes)",
					"id" => $shortname."_sloganspan",
					"std" => "Boothemes.Com is founded by Kevin Truong - an experienced SEOER and Blog designer based in Ho Chi Minh, VietNam.",
					"type" => "textarea");
															       
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");
				
$options[] = array( "name" => "Header Banner",
					"desc" => "Enter your banner code (Eg. Google Adsense)",
					"id" => $shortname."_header_banner",
					"std" => "",
					"type" => "textarea");
					
$options[] = array( "name" => "Feedburner ID",
					"desc" => "Enter your FeedBurner ID",
					"id" => $shortname."_feedburner",
					"std" => "",
					"type" => "text");
				
$options[] = array( "name" => "Homepage Settings",
                    "type" => "heading");
					
$options[] = array( "name" => "Featured post tags",
					"desc" => "Posts with tags in this field will show up on homepage featured posts. Separate tags by comma if you want to use more than one tag.",
					"id" => $shortname."_slider_tags",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Number post of Slider Featured post",
					"desc" => "Add a number of post you want to show at slider",
					"id" => $shortname."_number",
					"std" => "3",
					"type" => "text");
					
$options[] = array( "name" => __('How to add image to slide','framework'),
					"desc" => __("Do it for featured posts on featured tag you choise above"),
					 "std" => "step1 : http://boothemes.com/images/f1.png 
					
step2 : http://boothemes.com/images/f2.png 
					 
step3 : http://boothemes.com/images/f3.png ",
                    "type" => "textarea");
					
$options[] = array( "name" => "wp_content or wp_excerpt for homepage",
					"desc" => "wp_content will show the entire post content on the homepage unless you use the MORE tag inside your post. wp_excerpt will show a limited amount of text from your posts",
					"id" => $shortname."_content",
					"options" => array('wp_content', 'wp_excerpt'),
					"std" => "wp_content",
					"type" => "select");

$options[] = array( "name" => "wp_excerpt number of words",
					"desc" => "If you are using wp_excerpt you can set the number of words you want to display from each of your posts on the homepage",
					"id" => $shortname."_excerpt_number",
					"std" => "90",
					"type" => "text");					
 
$options[] = array( "name" => "Footer Options",
					"type" => "heading");
					
$options[] = array( "name" => "Footer Text Left",
					"desc" => "Here you can enter any text you want (eg. copyright text)",
					"id" => $shortname."_footer-text",
					"std" => "Copyright &copy; 2011 - boothemes. All rights reserved.",
					"type" => "text");
				
				
$options[] = array( "name" => "Post Options",
					"type" => "heading");
					
$options[] = array( "name" => "Disable Related Posts",
					"desc" => "Check to disable the related posts",
					"id" => $shortname."_related_posts",
					"std" => "false",
					"type" => "checkbox");
		
$options[] = array( "name" => "Disable Share buttons",
					"desc" => "Check to disable the Share Post buttons",
					"id" => $shortname."_share_buttons",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Social Media Options",
					"type" => "heading");      

$options[] = array( "name" => "Twitter",
					"desc" => "Enter your Twitter username here.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Facebook",
					"desc" => "Enter your Facebook username here.",
					"id" => $shortname."_facebook",
					"std" => "",
					"type" => "text");
					
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
