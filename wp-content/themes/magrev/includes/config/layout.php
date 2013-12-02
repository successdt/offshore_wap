<?php if ( ! defined('ABSPATH')) exit('restricted access');
//$vid = &$GLOBALS['_wpnukes_videos'];
include( get_template_directory().'/libs/shortcodes_array.php' );

$default_settings = array();

foreach( array_keys( $options ) as $def ){
	$default_settings[$def] = array('title'=>ucwords( str_replace( '_', ' ', $def ) ),'min-col'=>1,'max-col'=>4);
}


foreach( $options as $k => $v )
{
	$options[$k]['cols'] = array(
										'type' =>'hidden',
										'std' =>'1',
										'attrs'=>array('class' => 'widget_cols'),
									);
}

/*$default_settings = array(
							//'slider' => array('title'=>'Slider','min-col'=>1,'max-col'=>3,'delete'=>false),
							'blog' => array('title'=>'Blog','min-col'=>1,'max-col'=>4),
							'playlist' => array('title'=>'Playlist & Player','min-col'=>1,'max-col'=>4),
							'singers' => array('title'=>'Singers','min-col'=>1,'max-col'=>4),
							'content' => array('title'=>'Cotents','min-col'=>1,'max-col'=>4),
							'gallery' => array('title'=>'Gallery','min-col'=>1,'max-col'=>4),
							'events' => array('title'=>'Upcoming Events','min-col'=>1,'max-col'=>4),
							'albums' => array('title'=>'Albums','min-col'=>1,'max-col'=>4),
							'contactus' => array('title'=>'Contact Us','min-col'=>1,'max-col'=>4),

							'heading' => array('title'=>'Heading','min-col'=>1,'max-col'=>4, 'delete'=>false),
							
						);
$options = array();


$options['gallery']['ids'] = array(
										'label' => __('Image', THEME_NAME),
										'type' =>'wp_gallery',
										'info' => 'Enter Commma seprated images ids',
										'validation'=>'',
										'std' => '8',
										'attrs'=>array('class' => 'input-block-level'),
									);

$options['gallery']['cols'] = array(
										'type' =>'hidden',
										'std' =>'1',
										'attrs'=>array('class' => 'widget_cols'),
									);
$options['content']['content'] = array(
										'label' => __('Content', THEME_NAME),
										'type' =>'textarea',
										'validation'=>'',
										'std' => '',
										'attrs'=>array('class' => 'input-block-level', 'placeholder'=>'Enter Content, You can use HTML'),
									);
$options['content']['cols'] = array(
										'type' =>'hidden',
										'std' =>'1',
										'attrs'=>array('class' => 'widget_cols'),
									);

									
$options['playlist']['title'] = array(
										'label' => __('Heading', THEME_NAME),
										'type' =>'input',
										'validation'=>'',
										'std' => 'Track List',
										'attrs'=>array('class' => 'input-block-level'),
									);
$options['playlist']['post'] = array(
										'label' => __('Select Audio', THEME_NAME),
										'type' =>'dropdown',
										'validation'=>'',
										'std' => '8',
										'value' => fw_get_post_array(array('post_type' => 'fw_audio')),
										'attrs'=>array('class' => 'input-small'),
									);
$options['playlist']['cols'] = array(
										'type' =>'hidden',
										'std' =>'1',
										'attrs'=>array('class' => 'widget_cols'),
									);

$options['heading']['tag'] = array(
										'label' => __('Heading Tag', THEME_NAME),
										'type' =>'dropdown',
										'validation'=>'',
										'std' => '2',
										'value' => array('1' => 'H1', '2' => 'H2', '3' => 'H3', '4' => 'H4', '5' => 'H5', '6' => 'H6'),
										'attrs'=>array('class' => 'input-small'),
									);
$options['heading']['heading'] = array(
										'label' => __('Heading', THEME_NAME),
										'type' =>'input',
										'validation'=>'',
										'std' => '',
										'attrs'=>array('class' => 'input-small'),
									);
$options['heading']['cols'] = array(
										'type' =>'hidden',
										'std' =>'1',
										'attrs'=>array('class' => 'widget_cols'),
									);

$options['contactus']['title'] = 	array(
										'label' => __('Title', THEME_NAME),
										'type' =>'input',
										'validation'=>'',
										'std' => '',
										'attrs'=>array('class' => 'input-block-level'),
									);
$options['contactus']['cols'] = array(
										'type' =>'hidden',
										'std' =>'1',
										'attrs'=>array('class' => 'widget_cols'),
									);
$options['blog']['category'] = array(
										'label' => __('Category', THEME_NAME),
										'type' =>'dropdown',
										'info' => 'Select the category for blog post',
										'validation'=>'',
										'std' => '8',
										'value' => fw_get_categories(),
									);
$options['blog']['number'] = array(
										'label' => __('Number of Posts', THEME_NAME),
										'type' =>'input',
										'info' => 'Enter number of blog posts to show',
										'validation'=>'',
										'std' => '5',
										'attrs'=>array('class' => 'input-small'),
									);
$options['blog']['cols'] = array(
										'type' =>'hidden',
										'std' =>'4',
										'attrs'=>array('class' => 'widget_cols'),
									);


$options['albums']['number'] = array(
										'label' => __('Number of Audios', THEME_NAME),
										'type' =>'input',
										'info' => 'Enter number of audios to show',
										'validation'=>'',
										'std' => '5',
										'attrs'=>array('class' => 'input-small'),
									);
$options['albums']['cols'] = array(
										'type' =>'hidden',
										'std' =>'4',
										'attrs'=>array('class' => 'widget_cols'),
									);


$options['events']['title'] = array(
										'label' => __('Heading', THEME_NAME),
										'type' =>'input',
										'info' => 'Enter Heading of the event area',
										'validation'=>'',
										'std' => 'Upcoming Events',
										'attrs'=>array('class' => 'input-block-level'),
									);
$options['events']['number'] = array(
										'label' => __('Number of Events', THEME_NAME),
										'type' =>'input',
										'info' => 'Enter number of events to show',
										'validation'=>'',
										'std' => '5',
										'attrs'=>array('class' => 'input-small'),
									);
$options['events']['cols'] = array(
										'type' =>'hidden',
										'std' =>'4',
										'attrs'=>array('class' => 'widget_cols'),
									);

$options['singers']['number'] = array(
										'label' => __('Number of Singers', THEME_NAME),
										'type' =>'input',
										'info' => 'Enter number of singers to show',
										'validation'=>'',
										'std' => '5',
										'attrs'=>array('class' => 'input-small'),
									);
$options['singers']['cols'] = array(
										'type' =>'hidden',
										'std' =>'4',
										'attrs'=>array('class' => 'widget_cols'),
									);*/
