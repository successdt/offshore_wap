<?php if ( ! defined('ABSPATH')) exit('restricted access'); /** stop direct script access */

/**
 * Show the shorcodes inserter
 * @package WordPress
 * @subpackage WelCare
 * @author	WP Nukes Developers Team (Allan)
 * @link	http://www.wpnukes.com
 * @since	Version 1.0
 */

if ( ! isset( $_GET['inline'] ) )
	define( 'IFRAME_REQUEST' , true );


if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    wp_die(__('You do not have permission to edit posts.', THEME_NAME));


/**
 * generates the fields from a given array
 *
 * @param	string	$k			value that need to be assigned to field name or id
 * @param	array	$v			An array of values that required to generated a field
 * @param	array	$settings	An array of settings
 * @param	bolean	$element_only	Either print the values or return the values.
 *
 * @return array/string		Either print the values or return the values.
 */
function fwhtml_generator($k,$v,&$settings, $element_only = false)
{
	if( ! is_array($v)) return;
	$html = NULL;
	$id = 0;
	$selected = '';
	$extra = (isset($v['extra'])) ? $v['extra'] : array();
	
	$html .= '<label class="label">'.$v['label'].':</label> ';
		
	switch($v['type'])
	{
		case "text":
			$value = (isset($settings[$k])) ? $settings[$k] : '';
			$v['style']['data-param'] = $k;
			$element = form_input(array_merge(array('name'=>$k,'value'=>$value,'id'=>$k), (array) $v['style']));
		break;
		
		case "select":
			$v['style'] = isset($v['style']) ? array_merge((array) $v['style'], array('id'=>$k)) : array('id'=>$k);
			$value = (isset($settings[$k])) ? $settings[$k] : '';
			$v['style']['data-param'] = $k;
			$element = form_dropdown($k, $v['value'], $value, $v['style']);
		break;
				
		case "textarea":
			$value = empty($settings[$k]) ? $v['value'] : $settings[$k];
			$element = '<textarea rows="5" name="'.$k.'" class="textbox" id="'.$k.'">'.$value.'</textarea>';
		break;
		
		case "radio":
			$element = '';
			foreach($v['value'] as $key=>$val)
				$element .= form_radio($k, $key, ($settings[$k] == $key) ? true : '',$v['style']).'<label for="'.$k.'">'.$val.'</label>';
		break;
		case "colorbox": /**Code by coder 3.2.0 */
			$value = (isset($settings[$k])) ? $settings[$k] : '';
			$v['style']['data-param'] = $k;
			$element = form_input(array_merge(array('name'=>$k,'value'=>$value,'id'=>$k, 'class'=>'nuke-color-field'), (array) $v['style']));
		break;
		
	}
	
	if($element_only) return $element;
	
	$html .= $element;
	
	if(!empty($v['shorthelp']))
	{
		$html .= '<p class="infobox">'.$v['shorthelp'].'</p>';
	}
		
	//$html .= '</label>';
	if(!empty($v['help']))
	{
		$html .= '<li class="info"><a href="#" class="info"><span class="bubble">'.$v['help'].'</span></a></li>';
	}
	
	return $html;
}
$GLOBALS['_webnukes']->load('html_class');
//printr($GLOBALS['_webnukes']->html);
?>

<html>
	<head>
		<title><?php _e('Shortcodes created', THEME_NAME); ?></title>
		
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/admin-css.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shortcodes.js"></script>
	</head>
    <body>
        <h2><?php _e('List of available Shortcodes', THEME_NAME); ?></h2>
        
        <div id="accordion">
			<?php
			global $options;
			$options = array();
            get_template_part('libs/shortcodes_array');
            $sc_options = $options;
            foreach($sc_options as $key=>$value){ ?>
            
                    <h3><?php echo ucwords(str_replace(array('_', '-'), ' ', $key)); ?></h3>
                
                    <div>
                        <?php if(is_array($value)){ ?>
                            <h4><?php _e('Available parameters', THEME_NAME); ?>: </h4>
                            <?php
                            $temp = array();
                            foreach($value as $k=>$v)
							{
                                $v['attrs']['data-param'] = $k;
								$settings = array();
								echo '<label class="label">'.$v['label'].':</label> ';
                                echo $GLOBALS['_webnukes']->html->generator($k, $v, array(), 'element');//fwhtml_generator($k, $v, $settings);
								//echo fwhtml_generator($k, $v, $settings);
                            }
                            echo '<hr/>';
                        }else{
                            echo __('No parameters avaialble ', THEME_NAME);
                        }?>
                        <input type="button" class="btn_insert" data-name="<?php echo $key; ?>" value="<?php _e('Insert Shortcode', THEME_NAME); ?>"/>
                    </div>

            <?php 
            } ?>
        </div>
    </body>
</html>