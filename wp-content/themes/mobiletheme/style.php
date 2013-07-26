<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
a:link, a:visited {color:#<?php echo $mob_color; ?>;}
#logo {background-color:#<?php echo $mob_color; ?>;}
#wrapper {width:<?php echo $mob_width; ?>;}