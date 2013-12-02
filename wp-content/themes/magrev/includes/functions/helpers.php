<?php if ( ! defined('ABSPATH')) exit('restricted access');

if( !function_exists('fw_sidebars_array') )
{
	function fw_sidebars_array()
	{
		global $wp_registered_sidebars;

		$data = array();
		foreach( (array)$wp_registered_sidebars as $sidebar)
		{
			$data[kvalue($sidebar, 'id')] = kvalue($sidebar, 'name');
		}
		
		if(empty($data)) {
			$data = get_option(THEME_NAME . '_sidebars_list');
		}
		return $data;
		
	}
}


if( !function_exists('fw_page_template') )
{
	function fw_page_template( $tpl )
	{
		$page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => $tpl));
		if($page) return current( (array)$page);
		else return false;
	}
}

if( !function_exists('fw_create_user') )
{
	function fw_create_user( $data )
	{
		
			$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
			$user_id = wp_create_user( kvalue($data, 'user_login'), $random_password, kvalue($data, 'user_email') );
			if ( is_wp_error($user_id) && is_array( $user_id->get_error_messages() ) ) 
			{
				foreach($user_id->get_error_messages() as $message)	echo '<p>'.$message.'</p>';
			}
			else echo '<p>'.__('Registration Successful - An email is sent', THEME_NAME).'</p>';
	}
}

if( !function_exists('kvalue') )
{
	function kvalue( $obj, $val, $def = '' )
	{
		if( is_array($obj) ) 
		{
			if( isset( $obj[$val] ) ) return $obj[$val];
		}
		elseif( is_object( $obj ) )
		{
			if( isset( $obj->$val ) ) return $obj->$val;	
		}
		
		if( $def ) return $def;
		else return false;
	}
}

function fw_get_post_array( $args = array() )
{
	$default = array('post_type' => 'post', 'showposts' => -1, 'post_status' => 'publish', 'show_rand' => true );
	$args = wp_parse_args( $args, $default );
	$query = query_posts($args);
	$return = array();
	if( kvalue( $args, 'show_rand' ) ) $return = array('rand'=>__('Random', THEME_NAME));
	foreach( $query as $q ){
		$return[kvalue( $q, 'ID' )] = kvalue( $q, 'post_title' );
	}
	wp_reset_query();
	return $return;
}

function fw_singers_array()
{
	$query = query_posts(array('post_type' => 'fw_singer', 'showposts'=> -1));
	$return = array();
	foreach( $query as $q ){
		$return[kvalue( $q, 'ID' )] = kvalue( $q, 'post_title' );
	}
	wp_reset_query();
	return $return;
}


function google_fonts_array()
{
	$cache = wp_cache_get( 'alloptions', 'options');
	if( kvalue( $cache, 'google_web_fonts' ) ) $fonts = kvalue( $cache, 'google_web_fonts' );
	else $fonts = @file_get_contents(get_template_directory().'/libs/default_fonts');
	
	$fonts = @json_decode($fonts);
	$return = array();
	foreach( (array) kvalue( $fonts, 'items' ) as $f )
	{
		$return[kvalue($f, 'family')] = kvalue($f, 'family');
	}
	return $return;
}


function texttoslug($string)
{
	return trim(preg_replace("#([^a-z0-9])#i","_",strtolower($string)));
}

function slugtotext($string)
{
	return ucwords(trim(preg_replace("#([^a-z0-9])#i"," ",strtolower($string))));
}

function fw_get_pages($args = '')
{
	$pages = get_pages($args);
	foreach($pages as $page)
	{
		$pages_arr[$page->ID] = $page->post_title;
	}
	
	return $pages_arr;
}

function fw_get_languages( $lang_dir = '' )
{
	$directory = wp_get_theme()->DomainPath;
	$dir = ( $lang_dir ) ? $lang_dir : $directory ;
	
	$data = @scandir($dir);

	if( ! $data ) return array();
	
	if($data && is_array( $data ) ) unset($data[0], $data[1]);
	
	$return = array();
	
	foreach( $data as $d)
	{
		if( substr($d, -3 ) == '.mo')
		{
			$name = substr($d, 0, (strlen($d) - 3));
			$return[$name] = $name;
		}
	}
	return $return;
}

function multi_categories($settings = array())
{
	$categories = fw_get_categories();
	$size = (count($categories) < 10) ? count($categories) * 20 : 220;
	return form_multiselect('categories[selected][]', $categories, $settings['categories'][0], 'style="height:'.$size.'px;"' );	
}

/**
 * current_user_role
 *
 * Get the current wordpress user role
 *
 * @access	public
 * @example	current_user_role();
 * @param	void
 * @return	string
 */
	 
function current_user_role()
{
	return key($GLOBALS['current_user']->caps);
}

function search_node($array, $node)
{
	foreach($array as $k=>$v)
	{
		if( ! is_array($v)) return false;
		if($k == $node)
		{
			return $v;
		}
		elseif(is_array($v))
		{
			$v = search_node($v, $node);
			if($v) return $v;
		}
	}
	return false;
}

function last_nodes($array = array(), $options = array())
{
	if ( ! $options) return array();
	
	if ( ! is_array($array))
	{
		if( ! isset($options[$array])) return false;
		$array = $options[$array];
	}
	
	$settings = array();
	foreach($array as $k=>$v)
	{
		if($k == 'DYNAMIC')
		{
			$settings['DYNAMIC'] = array();
			foreach($v as $dk=>$dv)
			{
				$settings['DYNAMIC'] = array_merge((array) $settings['DYNAMIC'], (array)setting_node($dv, $dk));
			}
		}else $settings = array_merge($settings,(array) setting_node($v, $k));
	}
	
	return $settings;
}

function setting_node($array = array(), $key)
{
	if ( ! is_array($array)) return array();
	elseif(isset($array['label'])) return array($key=>$array);
	
	$settings = array();
	foreach($array as $k=>$v)
	{	
		if(is_array($v))
		{
			$match = setting_node($v, $k);
			if($match)
			{
				$settings = array_merge($settings, $match);
			}
		}
	}

	return $settings;
}

/** A function to fetch the categories from wordpress */
function fw_get_categories($arg = false)
{
	global $wp_taxonomies;
	if( ! empty($arg['taxonomy']) && ! isset($wp_taxonomies[$arg['taxonomy']]))
	{
		register_taxonomy( $arg['taxonomy'], THEME_PREFIX.$arg['taxonomy']);
	}
	$cats = array(); 
	$categories = get_categories($arg);

	foreach($categories as $category)
	{
		$cats[$category->term_id] = $category->name;
	}
	return $cats;
}

if ( ! function_exists('word_limiter'))
{
	function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '') return $str;
		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);
		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}
		
		return rtrim($matches[0]).$end_char;
	}
}

if ( ! function_exists('character_limiter'))
{
	function character_limiter($str, $n = 500, $end_char = '&#8230;', $allowed_tags = false)
	{
		if($allowed_tags) $str = strip_tags($str, $allowed_tags);
		if (strlen($str) < $n)	return $str;
		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

		if (strlen($str) <= $n) return $str;

		$out = "";
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';
			
			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
			}		
		}
	}
}

function array_to_string($array = array(), $options = array())
{
	$default = array('wrap_s'=>'="','wrap_e'=>'" ');
	if( ! is_array($options)) parse_str($options, $options);
	
	$options = array_merge($default, $options);
	
	$return = '';
	foreach($array as $k=>$v)
	{
		$return .= $k.$options['wrap_s'].$v.$options['wrap_e'];
	}
	
	return $return;
}