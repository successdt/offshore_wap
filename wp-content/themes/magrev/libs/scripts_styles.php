<?php if ( ! defined('ABSPATH')) exit('restricted access');

if( ! is_admin())
{
	
	/** add action to wp_print_styles for print our styles */
	add_action('wp_head', 'fw_theme_head', 30);
	
	/** add action wp_footer */
	add_action('wp_footer', 'fw_theme_footer');
}



function fw_theme_head()
{
	global $_webnukes;
	
	echo $_webnukes->get_options('general_settings', 'header_code');
	echo '<script type="text/javascript">var theme_url = "'.THEME_URL.'/"; var fw_ajax = "'.get_bloginfo('url').'/wp-admin/admin-ajax.php";</script>';
	$fw_meta = new FW_SEO_META;
	echo $fw_meta->fw_meta();
}

function fw_theme_footer()
{
	global $_webnukes;
	
	echo $_webnukes->get_options('general_settings', 'footer_code');
}