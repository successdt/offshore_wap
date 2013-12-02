<?php if ( ! defined('ABSPATH')) exit('restricted access');

//SUB, DYNAMIC
$options = array();

//settings
//string section, preview boleen, 
//section_heading = HEADING OF THE SECTION
/**
	DYNAMIC SECTION
	Use the section only in very first element
	Use tab to create the sub tabs
*/

//GENERAL SETTINGS

$options['general_settings']['SUB']['popular_titles']['type'] = array(
												'label' =>__('Source', THEME_NAME),
												'type' =>'dropdown',
												'info' => __( 'Select the popular titles soruce' , THEME_NAME),
												'validation'=>'',
												'std' => 'Category',
												'value' => array(	'category'=>__('Category', THEME_NAME), 'popular'=>__('Popular Posts', THEME_NAME) ),
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['general_settings']['SUB']['popular_titles']['category'] = array(
												'label' =>__('Category', THEME_NAME),
												'type' =>'dropdown',
												'info' => __( 'Select the popular titles category' , THEME_NAME),
												'validation'=>'',
												'value' => fw_get_categories(),
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['general_settings']['SUB']['popular_titles']['post_num'] = array(
												'label' =>__('Number of Posts', THEME_NAME),
												'type' =>'input',
												'info' => __( 'Number of Posts to show in popular titles' , THEME_NAME),
												'validation'=>'',
												'std' => 5,
												'attrs'=>array('class' => 'input-small'),
											);
											
											
$options['general_settings']['SUB']['general']['portfolio_setting'] = array(
												'label' =>__('Portfolio Layout', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Select portfolio default layout', THEME_NAME),
												'std' => '',
												'validation'=>'',
												'value' => array('' => 'Two Columns', 'two-colm' => 'Three Columns', 'three-colm' => 'Four Columns'),
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['general_settings']['SUB']['logo']['logo'] = array(
												'label' =>__('Logo', THEME_NAME),
												'type' =>'image',
												'info' => '',
												'validation'=>'valid_url',
												'attrs'=>array('placeholder'=>'Upload logo', 'class' => 'input-block-level'),
												'settings'=>array('preview'=>true),
											);
/*$options['general_settings']['SUB']['logo']['slogan'] = array(
												'label' =>__('Slogan', THEME_NAME),
												'type' =>'input',
												'info' => '',
												'validation'=>'required',
												'attrs'=>array('placeholder'=>'Enter slogan', 'class' => 'input-block-level'),
											);*/

											
$options['general_settings']['SUB']['header_settings']['favicon'] = array(
												'label' =>__('Favicon', THEME_NAME),
												'type' =>'image',
												'info' => __( 'Enter the .ico file URL or use upload option, <a href="http://en.wikipedia.org/wiki/Favicon" target="_blank"><strong>what is favicon?</strong></a>.' , THEME_NAME),
												'validation'=>'valid_url',
												'attrs'=>array('placeholder'=>'Upload Favicon', 'class' => 'input-block-level'),
												'settings'=>array('preview'=>true),
											);
$options['general_settings']['SUB']['header_settings']['banner_status'] = array(
												'label' =>__('Header Banner Status', THEME_NAME),
												'type' =>'switch',
												'info' => __( 'Show / Hide banner in the header area' , THEME_NAME),
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
												'settings' => array( 'section_heading'=> __('Header Banner Settings', THEME_NAME) )
											);
$options['general_settings']['SUB']['header_settings']['banner_code'] = array(
												'label' =>__('Banner Code', THEME_NAME),
												'type' =>'textarea',
												'info' => __( 'Insert the advertisment code or content here' , THEME_NAME),
												'validation'=>'stripslashes',
												'attrs'=>array('class' => 'input-block-level'),
											);
$options['general_settings']['SUB']['header_settings']['css_js'] = array(
												'label' =>__('Header CSS/JS', THEME_NAME),
												'type' =>'textarea',
												'info' => '',
												'validation'=>'stripslashes',
												'attrs'=>array('placeholder'=>'Header CSS/JS', 'class' => 'input-block-level'),
												'settings' => array('section_heading' => __('Header Script / Styles', THEME_NAME)),
											);

$options['general_settings']['SUB']['footer_settings']['copyrights'] = array(
												'label' =>__('Copyrights', THEME_NAME),
												'type' =>'textarea',
												'info' => '',
												'validation'=>'stripslashes',
												'attrs'=>array('placeholder'=>'Enter copyright text', 'class' => 'input-block-level'),
											);


$options['general_settings']['SUB']['footer_settings']['analytics'] = array(
												'label' =>__('Analytics Code', THEME_NAME),
												'type' =>'textarea',
												'info' => __( 'Insert the analytics code or custom scripts to include in footer', THEME_NAME ),
												'validation'=>'stripslashes',
												'attrs'=>array('placeholder'=>'Enter tracking code here', 'class' => 'input-block-level'),
											);

$options['contact_page_settings']['SUB']['contact_page_settings']['contact_email'] = array(
												'label' =>__('Contact Email', THEME_NAME),
												'type' =>'input',
												'info' => __( 'Insert email ID where contact email should be shouted' , THEME_NAME),
												'validation'=>'valid_email',
												'attrs'=>array('class' => 'input-block-level'),
											);
$options['contact_page_settings']['SUB']['contact_page_settings']['success_msg'] = array(
												'label' =>__('Success Message', THEME_NAME),
												'type' =>'textarea',
												'info' => __( 'Insert custom success message for contact form submission' , THEME_NAME),
												'validation'=>'stripslashes',
												'attrs'=>array('class' => 'input-block-level'),
											);
$options['sidebars']['SUB']['sidebars']['sidebar'] = array(
												'label' =>__('Create Sidebar', THEME_NAME),
												'type' =>'input',
												'info' => '',
												'validation'=>'',
												'attrs'=>array('class' => 'input-small'),
											);

$options['sidebars']['SUB']['sidebars_settings']['blog'] = array(
												'label' =>__('Blog Page', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for Blog page', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);
$options['sidebars']['SUB']['sidebars_settings']['category'] = array(
												'label' =>__('Post Category', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for Post Category page', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);
$options['sidebars']['SUB']['sidebars_settings']['tag'] = array(
												'label' =>__('Post Tag', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for Post Tag page', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);
$options['sidebars']['SUB']['sidebars_settings']['author'] = array(
												'label' =>__('Post Author', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for Post Author page', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);
$options['sidebars']['SUB']['sidebars_settings']['archive'] = array(
												'label' =>__('Post Archive', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for Post Archive page', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);
$options['sidebars']['SUB']['sidebars_settings']['search'] = array(
												'label' =>__('Search Page', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for audio album listing', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);
$options['sidebars']['SUB']['sidebars_settings']['gallery'] = array(
												'label' =>__('Gallery Page', THEME_NAME),
												'type' =>'dropdown',
												'info' => __('Choose sidebar for gallery page', THEME_NAME),
												'validation'=>'',
												'value' => fw_sidebars_array(),
												'attrs'=>array('class' => 'input-small'),
											);

											
$options['seo_settings']['SUB']['general_settings']['canonical_urls'] = array(
												'label' =>__('Canonical URLs', THEME_NAME),
												'type' =>'switch',
												'info' => __('Use Canonical URLs', THEME_NAME),
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['homepage_settings']['home_title'] = array(
												'label' =>__('Home Title', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['homepage_settings']['home_description'] = array(
												'label' =>__('Home Description', THEME_NAME),
												'type' =>'textarea',
												'info' => '',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['homepage_settings']['home_keywords'] = array(
												'label' =>__('Home Keywords (comma separated)', THEME_NAME),
												'type' =>'textarea',
												'info' => '',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['titles_settings']['rewrite_titles'] = array(
												'label' =>__('Rewrite Titles', THEME_NAME),
												'type' =>'switch',
												'info' => '',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['titles_settings']['capitalize_titles'] = array(
												'label' =>__('Capitalize Titles', THEME_NAME),
												'type' =>'switch',
												'info' => '',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['titles_settings']['page_title_format'] = array(
												'label' =>__('Page Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %page_title% - Title of Page <br/>
															%blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%author_nicename% - Page Author\' Name <br/>
															%author_firstname% - Page Author Firstname <br/>
															%author_lastname% - Page Author Lastname <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['titles_settings']['post_title_format'] = array(
												'label' =>__('Post Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %post_title% - Title of Post <br/>
															%blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%cat_title% - Category of the Page <br/>
															%author_nicename% - Page Author\' Name <br/>
															%author_firstname% - Page Author Firstname <br/>
															%author_lastname% - Page Author Lastname <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['titles_settings']['cat_title_format'] = array(
												'label' =>__('Category Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%cat_title% - Category Name <br/>
															%cat_desc% - Category Description <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['titles_settings']['date_title_format'] = array(
												'label' =>__('Archive Title Format (Date)', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%archive_date% - Date of Archive <br/>
															%archive_month% - Month of Archive <br/>
															%archive_year% - Year of Archive <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['titles_settings']['author_title_format'] = array(
												'label' =>__('Archive Title Format (Author)', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%author_nicename% - Page Author\' Name <br/>
															%author_firstname% - Page Author Firstname <br/>
															%author_lastname% - Page Author Lastname <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['titles_settings']['tag_title_format'] = array(
												'label' =>__('Tag Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%tag% - Tag Name <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['titles_settings']['post_title_format'] = array(
												'label' =>__('Post Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %post_title% - Title of Post <br/>
															%blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%cat_title% - Category of the Page <br/>
															%author_nicename% - Page Author\' Name <br/>
															%author_firstname% - Page Author Firstname <br/>
															%author_lastname% - Page Author Lastname <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['titles_settings']['search_title_format'] = array(
												'label' =>__('Search Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%search_keyword% - Searched Keyword <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['titles_settings']['404_format'] = array(
												'label' =>__('404 Title Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %blog_title% - Blog title <br/>
															%blog_desc% - Blog Description <br/>
															%requested_link% - Requested Link  <br/>
															%requested_keyword% - Requested Keyword  <br/>
														  ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['titles_settings']['paged_format'] = array(
												'label' =>__('Pagination Format', THEME_NAME),
												'type' =>'input',
												'info' => ' %pageno% - Current Page Number',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['general_settings']['paged_format'] = array(
												'label' =>__('Custom post Types SEO', THEME_NAME),
												'type' =>'switch',
												'info' => 'To Apply SEO on Custom Post Types ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['webmaster_verify']['google_webmaster'] = array(
												'label' =>__('Google Webmaster Tools', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Google verification code here to verfiy site',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['webmaster_verify']['bing_webmaster'] = array(
												'label' =>__('Bing Webmaster Center', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Bing Verification code here to verfiy the site ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);

$options['seo_settings']['SUB']['webmaster_verify']['pinterest_webmaster'] = array(
												'label' =>__('Pinterest Verification', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Pinterest Verification code here to verfiy the site ',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['noindex_settings']['noindex_categories'] = array(
												'label' =>__('Categories', THEME_NAME),
												'type' =>'switch',
												'info' => 'Use NoIndex for Categories Pages',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['noindex_settings']['noindex_date_archives'] = array(
												'label' =>__('Date Archives', THEME_NAME),
												'type' =>'switch',
												'info' => 'Use NoIndex for Date Archives',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['noindex_settings']['noindex_author_archives'] = array(
												'label' =>__('Author Archives', THEME_NAME),
												'type' =>'switch',
												'info' => 'Use NoIndex for Author Archives',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['seo_settings']['SUB']['noindex_settings']['noindex_author_archives'] = array(
												'label' =>__('Tag Archives', THEME_NAME),
												'type' =>'switch',
												'info' => 'Use NoIndex for Tag Archives',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);



$options['api_settings']['SUB']['api_settings']['twitter_key'] = array(
												'label' =>__('Twitter Key', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Twitter Key',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['api_settings']['SUB']['api_settings']['twitter_secret'] = array(
												'label' =>__('Twitter Secret', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Twitter Secret',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['api_settings']['SUB']['api_settings']['twitter_token'] = array(
												'label' =>__('Twitter Token', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Twitter Token',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);
											
$options['api_settings']['SUB']['api_settings']['twitter_token_secret'] = array(
												'label' =>__('Twitter Token Secret', THEME_NAME),
												'type' =>'input',
												'info' => 'Enter Twitter Token Secret',
												'validation'=>'',
												'attrs'=>array('class' => 'input-block-level'),
											);




$section[] = array(
					'title' => __('General Settings', THEME_NAME),
					'id'=> 'general_settings',
					'SUB'=>array(
						array(
						'title' => __('General', THEME_NAME),
						'id'=> 'general',					
						),
						array(
						'title' => __('Logo', THEME_NAME),
						'id'=> 'logo',					
						),
						array(
						'title' => __('Header Settings', THEME_NAME),
						'id'=> 'header_settings',					
						),
						array(
						'title' => __('Footer Settings', THEME_NAME),
						'id'=> 'footer_settings',					
						),
						array(
						'title' => __('Popular Titles', THEME_NAME),
						'id'=> 'popular_titles',					
						),
						
					)
			);
			
$section[] = array(
					'title' => __('Contact Page Settings', THEME_NAME),
					'id'=> 'contact_page_settings',
					'SUB'=>array(
						array(
						'title' => __('Contact Page Settings', THEME_NAME),
						'id'=> 'contact_page_settings',		
						)
					)
			);
			
$section[] = array(
					'title' => __('Sidebars', THEME_NAME),
					'id'=> 'sidebars',
					'SUB'=>array(
						array(
						'title' => __('Sidebars', THEME_NAME),
						'id'=> 'sidebars',					
						),
						array(
						'title' => __('Sidebars Settings', THEME_NAME),
						'id'=> 'sidebars_settings',					
						)
					)
			);
			
$section[] = array(
					'title' => __('API Settings', THEME_NAME),
					'id'=> 'api_settings',
					'SUB'=>array(
						array(
						'title' => __('Settings', THEME_NAME),
						'id'=> 'api_settings',			
						)
					)
					
			);
			
$section[] = array(
					'title' => __('SEO Settings', THEME_NAME),
					'id'=> 'seo_settings',
					'SUB'=>array(
						array(
						'title' => __('General Settings', THEME_NAME),
						'id'=> 'general_settings',			
						),
						array(
						'title' => __('Home Page Settings', THEME_NAME),
						'id'=> 'homepage_settings',			
						),
						array(
						'title' => __('Titles Settings', THEME_NAME),
						'id'=> 'titles_settings',			
						),
						array(
						'title' => __('Webmaster Verifications', THEME_NAME),
						'id'=> 'webmaster_verify',			
						),
						array(
						'title' => __('NoIndex Settings', THEME_NAME),
						'id'=> 'noindex_settings',			
						)
					)
					
			);