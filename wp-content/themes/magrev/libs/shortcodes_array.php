<?php if ( ! defined('ABSPATH')) exit('restricted access'); /** stop direct script access */

/**
 * Shorcode array that is being used to create shorcodes as well as shortcodes inserter fields
 * @package WordPress
 * @subpackage WelCare
 * @author	WP Nukes Developers Team (Allan)
 * @link	http://www.wpnukes.com
 * @since	Version 1.0
 */
 
//$options = array();
global $options; 
/** Doctor search form */
$options['contact_form']['captcha'] = array(
										'label'=>'Enable Catcha',
										'type'=>'dropdown',
										'value'=>array('true'=>'True','false'=>'False'),
										'std'=>'false',
									);
$options['contact_form']['title'] = array(
										'label'=>'Title',
										'type'=>'input',
										'std'=>'Contact Form',
									);
$options['gallery']['title'] = array(
										'label'=>'Title',
										'type'=>'input',
										'std'=>'Gallery',
									);
$options['gallery']['number'] = array(
										'label'=>'Items to Show',
										'type'=>'input',
										'std'=>'5',
									);
$options['two_cols_posts']['cat1'] = array(
										'label'=>'Category 1',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=>fw_get_categories(),
									);
									
$options['two_cols_posts']['cat2'] = array(
										'label'=>'Category 2',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=>fw_get_categories(),
									);
									
$options['three_col_posts']['cat1'] = array(
										'label'=>'Category 1',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=>fw_get_categories(),
									);
									
$options['three_col_posts']['cat2'] = array(
										'label'=>'Category 2',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=>fw_get_categories(),
									);
									
$options['three_col_posts']['cat3'] = array(
										'label'=>'Category 3',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=>fw_get_categories(),
									);

$options['one_col_post']['cat'] = array(
										'label'=>'Category',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=>fw_get_categories(),
									);

$options['slider']['order'] = array(
										'label'=>'Order',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=> array('ASC' => 'Ascending' , 'DESC' => 'Descending'),
									);
									
$options['slider']['orderby'] = array(
										'label'=>'Order By',
										'type'=>'dropdown',
										'std'=>'1',
										'value'=> array('comment_count' => 'Comments' , 'title' => 'Title'),
									);
									
$options['slider']['slides'] = array(
										'label'=>'Slides To Show',
										'type'=>'input',
										'std'=>'3',
									);
									
$options['portfolio']['category'] = array(
										'label'=>'Category',
										'type'=>'dropdown',
										'value'=>fw_get_categories(array('taxonomy'=>'portfolio_category')),
									);
									
$options['portfolio']['layout'] = array(
										'label'=>'Layout',
										'type'=>'dropdown',
										'value'=> array('' => 'Two Columns', 'two-colm' => 'Three Columns', 'three-colm' => 'Four Columns'),
									);

$options['portfolio']['show'] = array(
										'label'=>'Posts To Show',
										'type'=>'input',
										'std'=>'5',
									);
									
