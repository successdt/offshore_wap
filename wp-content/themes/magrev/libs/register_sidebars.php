<?php if ( ! defined('ABSPATH')) exit('restricted access'); 

add_action( 'widgets_init', 'theme_register_sidebars' );

function theme_register_sidebars()
{	
	global $_webnukes;
	
	//EXAMPLE HOW TO REGISTER SIDEBAR
	
	/** Blog Sidebar */
	
	register_sidebar(
		array( 'id' => 'homepage-sidebar1',
			'name' => __( 'Homepage Sidebar 1', THEME_NAME ),
			'description' => 'Widgets in this area will be shown on the Blog Posts Pages.',
			'before_widget' => '<div id="%1$s" class=" widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	);
	
	register_sidebar(
		array( 'id' => 'header-sidebar1',
			'name' => __( 'Header Sidebar', THEME_NAME ),
			'description' => 'Widgets in this area will be shown on the Blog Posts Pages.',
			'before_widget' => '<div id="%1$s" class=" widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	); 	
	
	register_sidebar(
		array( 'id' => 'footer-sidebar1',
			'name' => __( 'Footer Sidebar 1', THEME_NAME ),
			'description' => 'Widgets in this area will be shown on the Footer Area.',
			'before_widget' => '<div id="%1$s" class="span3 widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	); 	
	
	/** Create dynamic sidebars */
	$settings = $_webnukes->get_options('sub_sidebars');
	//printr($settings);
	if($_webnukes->kvalue($settings,'DYNAMIC'))
	{	
		foreach($_webnukes->kvalue($_webnukes->kvalue($settings,'DYNAMIC'),'create_sidebar') as $key=>$val)
		{ 
			$name = ($val != '') ? $val : __('Dynamic Sidebar ', THEME_NAME).$key;
			$id = ($_webnukes->kvalue($val,'id')) ? $val['id'] : 'dynamic-sidebar'.$key;
			
			$before_title = '<div class="title"><h1>';
			$after_title = '</h1></div>';
			$class = 'block';

			/** Register Dynamic Sidebar */
			register_sidebar(
				array( 'id' => $id,
					'name' => $name,
					'before_widget' => '<div id="%1$s" class="'.$class.' %2$s">',
					'after_widget' => '</div>',
					'before_title' => $before_title,
					'after_title' => $after_title
				)
			);
		}
	}
	
	
	
	global $wp_registered_sidebars;
	$s_list = get_option(THEME_NAME . '_sidebars_list');
	if(empty($s_list) || (count($s_list) < count($wp_registered_sidebars))){
		$data = array();
		foreach( (array)$wp_registered_sidebars as $sidebar)
		{
			$data[kvalue($sidebar, 'id')] = kvalue($sidebar, 'name');
		}
		update_option(THEME_NAME . '_sidebars_list', $data);
	}
}


/**
 * Function is used to load dynamically created sidebars
 *
 * @param	string		$tpl_name		Name of WP template file where do you want to show the sidebar
 * @param	string		$default		id/Name of the default sidebar if provided $tpl_name doesn't find.
 * @return	string						prints the dyanmic created html of sidebar if found else prints nothing
 */
function _load_dynamic_sidebar($tpl_name, $default = 'blog-sidebar')
{
	global $_webnukes;
	
	$settings = get_option(THEME_PREFIX.'sidebar_creator');
	
	if($_webnukes->kvalue($settings, 'status') == 'active')
	{
		$tmpls = array_reduce( (array)$_webnukes->kvalue($settings, 'DYNAMIC'), create_function('$new_tpl, $v', '$new_tpl[$v["template"]] = $v; return $new_tpl;') );

		if($sidebar = $_webnukes->kvalue($tmpls, $tpl_name)) 
		{
			if(is_active_sidebar($_webnukes->kvalue($sidebar, 'id'))) dynamic_sidebar($sidebar['id']);
		}else dynamic_sidebar($default);
	}else dynamic_sidebar($default);
}