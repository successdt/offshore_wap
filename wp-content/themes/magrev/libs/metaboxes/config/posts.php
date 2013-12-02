<?php 

$options = array();

$options['fw_event']['sidebar']			= array(
											'label' =>__('Post Sidebar', THEME_NAME),
											'type' =>'dropdown',
											'info' => __( 'select the sidebar for the current post' , THEME_NAME),
											'validation'=>'',
											'value' => fw_sidebars_array(),
											'attrs'=>array('class' => 'input-block-level'),
										);


$options['fw_event']['event_organizer'] = array(
											'label' =>__('Event Organizer', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_event']['event_ticker_link'] = array(
											'label' =>__('Buy Ticker URL', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_event']['event_start'] = array(
											'label' =>__('Event Start time', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-small', 'id' => 'event_start_time'),
										);
$options['fw_event']['event_end'] = array(
											'label' =>__('Event End Time', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-small', 'id' => 'event_end_time'),
										);
$options['fw_event']['searchAddress'] = array(
											'label' =>__('Search Address', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level', 'id' => 'searchTextField'),
											'settings'=> array('html'=>'<div id="map_canvas" style="width:100%; height: 200px;" class="clear"></div>'),
										);
$options['fw_event']['event_place'] = array(
											'label' =>__('Event Place', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level', 'id' => 'event_place'),
										);
$options['fw_event']['lang'] = array(
											'label' =>__('Langitude', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-small', 'id' => 'lang'),
										);
$options['fw_event']['lat'] = array(
											'label' =>__('Latitude', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-small', 'id' => 'lat'),
										);

$options['post']['sidebar'] = 			array(
											'label' =>__('Post Sidebar', THEME_NAME),
											'type' =>'dropdown',
											'info' => __( 'select the sidebar for the current post' , THEME_NAME),
											'validation'=>'',
											'value' => fw_sidebars_array(),
											'attrs'=>array('class' => 'input-block-level'),
										);



$options['fw_singer']['address'] = array(
											'label' =>__('Singer Address', THEME_NAME),
											'type' =>'input',
											'info' => __( 'Enter the author address' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['singer_email'] = array(
											'label' =>__('Singer Email', THEME_NAME),
											'type' =>'input',
											'info' => __( 'Enter email address of the singer' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['singer_link'] = array(
											'label' =>__('Singer Link', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['facebook'] = array(
											'label' =>__('Singer Facebook Link', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['twitter'] = array(
											'label' =>__('Singer Twitter Link', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['youtube'] = array(
											'label' =>__('Singer Youtube Link', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['soundcloud'] = array(
											'label' =>__('Singer SoundCloud Link', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_singer']['sidebar']			= array(
											'label' =>__('Sidebar', THEME_NAME),
											'type' =>'dropdown',
											'info' => __( 'select the sidebar for the current singer' , THEME_NAME),
											'validation'=>'',
											'value' => fw_sidebars_array(),
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_audio']['singer']			= array(
											'label' =>__('Singer', THEME_NAME),
											'type' =>'dropdown',
											'info' => __( 'select the singer of the current audio' , THEME_NAME),
											'validation'=>'',
											'value' => fw_singers_array(),
											'attrs'=>array('class' => 'input-block-level'),
										);
$options['fw_audio']['sidebar']			= array(
											'label' =>__('Sidebar', THEME_NAME),
											'type' =>'dropdown',
											'info' => __( 'select the sidebar for the current singer' , THEME_NAME),
											'validation'=>'',
											'value' => fw_sidebars_array(),
											'attrs'=>array('class' => 'input-block-level'),
										);


$options['fw_slider']['webnukes_detail_url'] = array(
									'label'=>__('Detail Page URL', THEME_NAME),
									'type'=>'input',
									'attrs'=>array('class'=>'input-block-level'),
									'info' => __('Insert the hyperlin to futher detail page of the slide', THEME_NAME),
								);


$options['page']['enable_meta']			= array(
											'label' =>__('Show Meta Information', THEME_NAME),
											'type' =>'switch',
											//'info' => __( 'select the sidebar for the current page' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['page']['seo_title']			= array(
											'label' =>__('SEO Title', THEME_NAME),
											'type' =>'input',
											'info' => __( 'Search Engines use a maximum of 60 chars for the title.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
											'settings' => array( 'section_title' => 'SEO Settings'),
										);
										
$options['page']['seo_description']			= array(
											'label' =>__('SEO Description', THEME_NAME),
											'type' =>'textarea',
											'info' => __( 'Search Engines use a maximum of 160 chars for the description.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level', 'style' => 'height: 150px;'),
										);

$options['page']['seo_keywords']			= array(
											'label' =>__('SEO Keywords (comma separated)', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
										
$options['page']['seo_noindex']			= array(
											'label' =>__('Robots Meta NOINDEX', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['page']['seo_nofollow']			= array(
											'label' =>__('Robots Meta NOFOLLOW', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['page']['seo_noodp']			= array(
											'label' =>__('Robots Meta NOODP', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['page']['seo_noydir']			= array(
											'label' =>__('Robots Meta NOYDIR', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['page']['seo_disable']			= array(
											'label' =>__('Disable on this page/post', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
										

$options['post']['seo_title']			= array(
											'label' =>__('SEO Title', THEME_NAME),
											'type' =>'input',
											'info' => __( 'Search Engines use a maximum of 60 chars for the title.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
											'settings' => array( 'section_title' => 'SEO Settings'),
										);
										
$options['post']['seo_description']			= array(
											'label' =>__('SEO Description', THEME_NAME),
											'type' =>'textarea',
											'info' => __( 'Search Engines use a maximum of 160 chars for the description.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level', 'style' => 'height: 150px;'),
										);

$options['post']['seo_keywords']			= array(
											'label' =>__('SEO Keywords (comma separated)', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
										
$options['post']['seo_noindex']			= array(
											'label' =>__('Robots Meta NOINDEX', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['post']['seo_nofollow']			= array(
											'label' =>__('Robots Meta NOFOLLOW', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['post']['seo_noodp']			= array(
											'label' =>__('Robots Meta NOODP', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['post']['seo_noydir']			= array(
											'label' =>__('Robots Meta NOYDIR', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['post']['seo_disable']			= array(
											'label' =>__('Disable on this page/post', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['wpnukes_galleries']['seo_title']			= array(
											'label' =>__('SEO Title', THEME_NAME),
											'type' =>'input',
											'info' => __( 'Search Engines use a maximum of 60 chars for the title.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
											'settings' => array( 'section_title' => 'SEO Settings'),
										);
										
$options['wpnukes_galleries']['seo_description']			= array(
											'label' =>__('SEO Description', THEME_NAME),
											'type' =>'textarea',
											'info' => __( 'Search Engines use a maximum of 160 chars for the description.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level', 'style' => 'height: 150px;'),
										);

$options['wpnukes_galleries']['seo_keywords']			= array(
											'label' =>__('SEO Keywords (comma separated)', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
										
$options['wpnukes_galleries']['seo_noindex']			= array(
											'label' =>__('Robots Meta NOINDEX', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['wpnukes_galleries']['seo_nofollow']			= array(
											'label' =>__('Robots Meta NOFOLLOW', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['wpnukes_galleries']['seo_noodp']			= array(
											'label' =>__('Robots Meta NOODP', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['wpnukes_galleries']['seo_noydir']			= array(
											'label' =>__('Robots Meta NOYDIR', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['wpnukes_galleries']['seo_disable']			= array(
											'label' =>__('Disable on this page/post', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);


$options['portfolio']['seo_title']			= array(
											'label' =>__('SEO Title', THEME_NAME),
											'type' =>'input',
											'info' => __( 'Search Engines use a maximum of 60 chars for the title.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
											'settings' => array( 'section_title' => 'SEO Settings'),
										);
										
$options['portfolio']['seo_description']			= array(
											'label' =>__('SEO Description', THEME_NAME),
											'type' =>'textarea',
											'info' => __( 'Search Engines use a maximum of 160 chars for the description.' , THEME_NAME),
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level', 'style' => 'height: 150px;'),
										);

$options['portfolio']['seo_keywords']			= array(
											'label' =>__('SEO Keywords (comma separated)', THEME_NAME),
											'type' =>'input',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);
										
$options['portfolio']['seo_noindex']			= array(
											'label' =>__('Robots Meta NOINDEX', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['portfolio']['seo_nofollow']			= array(
											'label' =>__('Robots Meta NOFOLLOW', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['portfolio']['seo_noodp']			= array(
											'label' =>__('Robots Meta NOODP', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['portfolio']['seo_noydir']			= array(
											'label' =>__('Robots Meta NOYDIR', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);

$options['portfolio']['seo_disable']			= array(
											'label' =>__('Disable on this page/post', THEME_NAME),
											'type' =>'switch',
											'validation'=>'',
											'attrs'=>array('class' => 'input-block-level'),
										);



