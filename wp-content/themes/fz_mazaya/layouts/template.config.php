<?php
/**
* @package   fw_mazaya
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/


// generate css for layout
$css[] = sprintf('.wrapper { max-width: %dpx; }', $this['config']->get('template_width'));
// generate css for logo
$css[] = sprintf('.logo, .logotext h1 { margin: %dpx 0; }', $this['config']->get('logo_margin'));
/* Page Background */
$css[] = sprintf('#page { background: %s; }', $this['config']->get('background-color'));
$css[] = sprintf('#page { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/%s);}', $this['config']->get('background-pattern'));
$css[] = sprintf('#background-image { background-image: url(../../../../%s); }', $this['config']->get('background-image'));
/* Blocks Padding */
$css[] = sprintf('#top-a, #header, #mainfanouss, #bottom-a, #bottom-b, #bottom-c { padding: %spx; }', $this['config']->get('blocks-padding'));
/* Toolbar Block */
$css[] = sprintf('.toolbar-bgcolor { background: %s; }', $this['config']->get('toolbar-bgcolor'));
$css[] = sprintf('.toolbar-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s);}', $this['config']->get('toolbar-pattern'));
$css[] = sprintf('#toolbar-block { color: %s; }', $this['config']->get('toolbar-color'));
$css[] = sprintf('#toolbar-block a { color: %s; }', $this['config']->get('toolbar-link-color'));
/* Top A Block */
$css[] = sprintf('.top-a-bgcolor { background: %s; }', $this['config']->get('top-a-bgcolor'));
$css[] = sprintf('.top-a-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('top-a-pattern'));
$css[] = sprintf('#top-a-block { color: %s; }', $this['config']->get('top-a-color'));
$css[] = sprintf('#top-a-block a { color: %s; }', $this['config']->get('top-a-link-color'));
/* header */
$css[] = sprintf('.header-bgcolor { background: %s; }', $this['config']->get('header-bgcolor'));
$css[] = sprintf('.header-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('header-pattern'));
$css[] = sprintf('#header-block { color: %s; }', $this['config']->get('header-color'));
$css[] = sprintf('#header-block a { color: %s; }', $this['config']->get('header-link-color'));
/* Top Menu */
$css[] = sprintf('#toolbar-block .menu-dropdown a.level1, .menu-dropdown span.level1 { color: %s; }', $this['config']->get('topmenu-link-color'));
$css[] = sprintf('#toolbar-block .menu-dropdown a.level1:hover, .menu-dropdown span.level1:hover { color: %s!important; }', $this['config']->get('topmenu-link-hover'));
$css[] = sprintf('#toolbar-block .menu-dropdown a.level1, .menu-dropdown span.level1  { font-size: %spx !important; }', $this['config']->get('topmenu-fontsize'));
/* Vertical Menu */
$css[] = sprintf('.menu-bgcolor { background: %s; }', $this['config']->get('menu-bgcolor'));
$css[] = sprintf('#menu-block .menu-dropdown a.level1, .menu-dropdown span.level1 { color: %s; }', $this['config']->get('menu-link-color'));
$css[] = sprintf('#menu-block .menu-dropdown a.level1, #menu-block .menu-dropdown span.level1  { font-size: %spx !important; }', $this['config']->get('menu-fontsize'));
/* newflash */
$css[] = sprintf('.newflash-bgcolor { background: %s; }', $this['config']->get('newflash-bgcolor'));
$css[] = sprintf('.newflash-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('newflash-pattern'));
$css[] = sprintf('#newflash { padding: %spx; }', $this['config']->get('newflash-padding'));
$css[] = sprintf('#newflash { color: %s; }', $this['config']->get('newflash-color'));
$css[] = sprintf('#newflash a { color: %s; }', $this['config']->get('newflash-link-color'));
/* Main Block */
$css[] = sprintf('.main-bgcolor { background-color: %s !important; }', $this['config']->get('main-bgcolor'));
$css[] = sprintf('.main-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('main-pattern'));
$css[] = sprintf('#main { color: %s; }', $this['config']->get('main-color'));
$css[] = sprintf('#main a { color: %s; }', $this['config']->get('main-link-color'));
/* Bottom a Block */
$css[] = sprintf('.bottom-a-bgcolor { background: %s; }', $this['config']->get('bottom-a-bgcolor'));
$css[] = sprintf('.bottom-a-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('bottom-a-pattern'));
$css[] = sprintf('#bottom-a { color: %s; }', $this['config']->get('bottom-a-color'));
$css[] = sprintf('#bottom-a-block a { color: %s; }', $this['config']->get('bottom-a-link-color'));
/* Bottom B Block */
$css[] = sprintf('.bottom-b-bgcolor { background: %s; }', $this['config']->get('bottom-b-bgcolor'));
$css[] = sprintf('.bottom-b-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('bottom-b-pattern'));
$css[] = sprintf('#bottom-b { color: %s; }', $this['config']->get('bottom-b-color'));
$css[] = sprintf('#bottom-b-block a { color: %s; }', $this['config']->get('bottom-b-link-color'));


/* Bottom C Block */
$css[] = sprintf('.bottom-c-bgcolor { background: %s; }', $this['config']->get('bottom-c-bgcolor'));
$css[] = sprintf('.bottom-c-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }', $this['config']->get('bottom-c-pattern'));
$css[] = sprintf('#bottom-c { color: %s; }', $this['config']->get('bottom-c-color'));
$css[] = sprintf('#bottom-c-block a { color: %s; }', $this['config']->get('bottom-c-link-color'));


/* Footer Block */
$css[] = sprintf('.footer-bgcolor { background: %s; }', $this['config']->get('footer-bgcolor'));
$css[] = sprintf('.footer-pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s);}', $this['config']->get('footer-pattern'));
$css[] = sprintf('#footer { color: %s; }', $this['config']->get('footer-color'));
$css[] = sprintf('#footer-block a { color: %s; }', $this['config']->get('footer-link-color'));


/*  module  variations 
-----------------------------------------------------------  */

$css[] = sprintf('.module,#content {margin: %spx;}', $this['config']->get('module-margin'));
$css[] = sprintf('.mod-box, .mod-box1, .mod-box2, .mod-box3, .mod-box4, .sinote-note .sinote-note-container {padding: %spx;}', $this['config']->get('module-padding'));
//Module Title
$css[] = sprintf('h3.module-title {  font-size: %spx!important;}', $this['config']->get('moduleh3fontsize'));

// box
$css[] = sprintf('.boxbgcolor {  background: %s;}', $this['config']->get('boxbgcolor'));
$css[] = sprintf('.boxpattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }',  $this['config']->get('boxpattern'));
$css[] = sprintf('.mod-box h3.module-title {color: %s;}', $this['config']->get('boxmodule-title'));
$css[] = sprintf('.mod-box {color: %s;}', $this['config']->get('boxmodule-text'));
$css[] = sprintf('.mod-box a {color: %s;}', $this['config']->get('boxlink-color'));
if (($boxstyle = $this['config']->get('boxstyle')) && $this['path']->path("css:/module-variations/box/$boxstyle.css")) { $this['asset']->addFile('css', "css:/module-variations/box/$boxstyle.css"); }


// box1
$css[] = sprintf('.box1bgcolor {  background: %s;}', $this['config']->get('box1bgcolor'));
$css[] = sprintf('.box1pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }',  $this['config']->get('box1pattern'));
$css[] = sprintf('.mod-box1 h3.module-title {color: %s;}', $this['config']->get('box1module-title'));
$css[] = sprintf('.mod-box1 {color: %s;}', $this['config']->get('box1module-text'));
$css[] = sprintf('.mod-box1 a {color: %s;}', $this['config']->get('box1link-color'));
if (($box1style = $this['config']->get('box1style')) && $this['path']->path("css:/module-variations/box1/$box1style.css")) { $this['asset']->addFile('css', "css:/module-variations/box1/$box1style.css"); }
// box2
$css[] = sprintf('.box2bgcolor {  background: %s;}', $this['config']->get('box2bgcolor'));
$css[] = sprintf('.box2pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s);}',  $this['config']->get('box2pattern'));
$css[] = sprintf('.mod-box2 h3.module-title {color: %s;}', $this['config']->get('box2module-title'));
$css[] = sprintf('.mod-box2 {color: %s;}', $this['config']->get('box2module-text'));
$css[] = sprintf('.mod-box2 a {color: %s;}', $this['config']->get('box2link-color'));
if (($box2style = $this['config']->get('box2style')) && $this['path']->path("css:/module-variations/box2/$box2style.css")) { $this['asset']->addFile('css', "css:/module-variations/box2/$box2style.css"); }

// box3
$css[] = sprintf('.box3bgcolor {  background: %s;}', $this['config']->get('box3bgcolor'));
$css[] = sprintf('.box3pattern { background-image: url(../../../../wp-content/themes/fw_mazaya/images/patterns/trans/%s); }',  $this['config']->get('box3pattern'));
$css[] = sprintf('.mod-box3 h3.module-title {color: %s;}', $this['config']->get('box3module-title'));
$css[] = sprintf('.mod-box3 {color: %s;}', $this['config']->get('box3module-text'));
$css[] = sprintf('.mod-box3 a {color: %s;}', $this['config']->get('box3link-color'));
if (($box3style = $this['config']->get('box3style')) && $this['path']->path("css:/module-variations/box1/$box3style.css")) { $this['asset']->addFile('css', "css:/module-variations/box3/$box3style.css"); }


/* Typography
-----------------------------------------------------------  */
//Post Headings
$css[] = sprintf('h1 {  font-size: %spx;}', $this['config']->get('h1fontsize'));
$css[] = sprintf('h1 {  font-color: %s;}', $this['config']->get('h1fontcolor'));

$css[] = sprintf('h2 {  font-size: %spx;}', $this['config']->get('h2fontsize'));
$css[] = sprintf('h2 {  font-color: %s;}', $this['config']->get('h2fontcolor'));

$css[] = sprintf('h3 {  font-size: %spx;}', $this['config']->get('h3fontsize'));
$css[] = sprintf('h3 {  font-color: %s;}', $this['config']->get('h3fontcolor'));

$css[] = sprintf('h4 {  font-size: %spx;}', $this['config']->get('h4fontsize'));
$css[] = sprintf('h4 {  font-color: %s;}', $this['config']->get('h4fontcolor'));

$css[] = sprintf('h5 {  font-size: %spx;}', $this['config']->get('h5fontsize'));
$css[] = sprintf('h5 {  font-color: %s;}', $this['config']->get('h5fontcolor'));

$css[] = sprintf('h6 {  font-size: %spx;}', $this['config']->get('h6fontsize'));
$css[] = sprintf('h6 {  font-color: %s;}', $this['config']->get('h6fontcolor'));


// Body Font
$css[] = sprintf('body {  font-size: %spx;}', $this['config']->get('bodyfontsize'));
$css[] = sprintf('body {  line-height: %spx;}', $this['config']->get('bodylineheight'));
$css[] = sprintf('body {  color: %s;}', $this['config']->get('bodycolor'));


// WoredPress Theme Option

$css[] = sprintf('#system .item > header .meta { display: %s;}', $this['config']->get('single-meta-info'));
$css[] = sprintf('#system .author-box { display: %s;}', $this['config']->get('authorbox'));
$css[] = sprintf('#related { display: %s;}', $this['config']->get('relatedbox'));


$css[] = sprintf('#system .items > .width50 .title { font-size: %spx !important;}', $this['config']->get('post-title-fronpage'));



//Social Icons 
$css[] = sprintf('.social-icons li a {  color: %s;}', $this['config']->get('social-icons-color'));
$css[] = sprintf('.social-icons li a:hover {  color: %s;}', $this['config']->get('social-icons-hover'));
$css[] = sprintf('.social-icons li a {  font-size: %spx;}', $this['config']->get('social-icons-size'));

// generate css for 3-column-layout
$sidebar_a       = '';
$sidebar_b       = '';
$maininner_width = 100;
$sidebar_a_width = intval($this['config']->get('sidebar-a_width'));
$sidebar_b_width = intval($this['config']->get('sidebar-b_width'));
$sidebar_classes = "";
$rtl             = $this['config']->get('direction') == 'rtl';
$body_config	 = array();

// set widths
if ($this['modules']->count('sidebar-a')) {
	$sidebar_a = $this['config']->get('sidebar-a'); 
	$maininner_width -= $sidebar_a_width;
	$css[] = sprintf('#sidebar-a { width: %d%%; }', $sidebar_a_width);
}

if ($this['modules']->count('sidebar-b')) {
	$sidebar_b = $this['config']->get('sidebar-b'); 
	$maininner_width -= $sidebar_b_width;
	$css[] = sprintf('#sidebar-b { width: %d%%; }', $sidebar_b_width);
}

$css[] = sprintf('#maininner { width: %d%%; }', $maininner_width);

// all sidebars right
if (($sidebar_a == 'right' || !$sidebar_a) && ($sidebar_b == 'right' || !$sidebar_b)) {
	$sidebar_classes .= ($sidebar_a) ? 'sidebar-a-right ' : '';
	$sidebar_classes .= ($sidebar_b) ? 'sidebar-b-right ' : '';

// all sidebars left
} elseif (($sidebar_a == 'left' || !$sidebar_a) && ($sidebar_b == 'left' || !$sidebar_b)) {
	$sidebar_classes .= ($sidebar_a) ? 'sidebar-a-left ' : '';
	$sidebar_classes .= ($sidebar_b) ? 'sidebar-b-left ' : '';
	$css[] = sprintf('#maininner { float: %s; }', $rtl ? 'left' : 'right');

// sidebar-a left and sidebar-b right
} elseif ($sidebar_a == 'left') {
	$sidebar_classes .= 'sidebar-a-left sidebar-b-right ';
	$css[] = '#maininner, #sidebar-a { position: relative; }';
	$css[] = sprintf('#maininner { %s: %d%%; }', $rtl ? 'right' : 'left', $sidebar_a_width);
	$css[] = sprintf('#sidebar-a { %s: -%d%%; }', $rtl ? 'right' : 'left', $maininner_width);

// sidebar-b left and sidebar-a right
} elseif ($sidebar_b == 'left') {
	$sidebar_classes .= 'sidebar-a-right sidebar-b-left ';
	$css[] = '#maininner, #sidebar-a, #sidebar-b { position: relative; }';
	$css[] = sprintf('#maininner, #sidebar-a { %s: %d%%; }', $rtl ? 'right' : 'left', $sidebar_b_width);
	$css[] = sprintf('#sidebar-b { %s: -%d%%; }', $rtl ? 'right' : 'left', $maininner_width + $sidebar_a_width);
}

// number of sidebars
if ($sidebar_a && $sidebar_b) {
	$sidebar_classes .= 'sidebars-2 ';
} elseif ($sidebar_a || $sidebar_b) {
	$sidebar_classes .= 'sidebars-1 ';
}

// generate css for slide dropdown menu
foreach (array(1 => '.dropdown', 2 => '.columns2', 3 => '.columns3', 4 => '.columns4') as $i => $class) {
	$css[] = sprintf('#menu %s { width: %dpx; }', $class, $i * intval($this['config']->get('menu_width')));
}


// generate css for toolbar dropdown menu
foreach (array(1 => '.dropdown', 2 => '.columns2', 3 => '.columns3', 4 => '.columns4') as $i => $class) {
	$css[] = sprintf('#toolbar-block %s { width: %dpx; }', $class, $i * intval($this['config']->get('menutoolbar_width')));
}

// load css
$this['asset']->addFile('css', 'css:base.css');
$this['asset']->addFile('css', 'css:layout.css');
$this['asset']->addFile('css', 'css:menus.css');
$this['asset']->addString('css', implode("\n", $css));
$this['asset']->addFile('css', 'css:modules.css');
$this['asset']->addFile('css', 'css:tools.css');

$this['asset']->addFile('css', 'css:system.css');
$this['asset']->addFile('css', 'css:extensions.css');
$this['asset']->addFile('css', 'css:custom.css');

$this['asset']->addFile('css', 'css:feature/additional.css');
$this['asset']->addFile('css', 'css:feature/addresponsive.css');
$this['asset']->addFile('css', 'css:feature/custom.css');
$this['asset']->addFile('css', 'css:feature/menu.css');
$this['asset']->addFile('css', 'css:feature/modules.css');
$this['asset']->addFile('css', 'css:feature/system-all.css');
$this['asset']->addFile('css', 'css:feature/tools.css');
$this['asset']->addFile('css', 'css:feature/extensions.css');
$this['asset']->addFile('css', 'css:feature/font-awesome.min.css');
$this['asset']->addFile('css', 'css:feature/flexslider.css');
$this['asset']->addFile('css', 'css:feature/costum-widget.css');
$this['asset']->addFile('css', 'css:feature/single.css');
$this['asset']->addFile('css', 'css:ewp.css');
if (($color = $this['config']->get('color1')) && $this['path']->path("css:/color1/$color.css")) { $this['asset']->addFile('css', "css:/color1/$color.css"); }
if (($color = $this['config']->get('color2')) && $this['path']->path("css:/color2/$color.css")) { $this['asset']->addFile('css', "css:/color2/$color.css"); }
if (($font = $this['config']->get('font1')) && $this['path']->path("css:/font1/$font.css")) { $this['asset']->addFile('css', "css:/font1/$font.css"); }
if (($font = $this['config']->get('font2')) && $this['path']->path("css:/font2/$font.css")) { $this['asset']->addFile('css', "css:/font2/$font.css"); }
if (($font = $this['config']->get('font3')) && $this['path']->path("css:/font3/$font.css")) { $this['asset']->addFile('css', "css:/font3/$font.css"); }
$this['asset']->addFile('css', 'css:style.css');
if ($this['config']->get('direction') == 'rtl') $this['asset']->addFile('css', 'css:rtl.css');
if ($this['config']->get('direction') == 'rtl') $this['asset']->addFile('css', 'css:feature/rtl.css');
$this['asset']->addFile('css', 'css:responsive.css');
$this['asset']->addFile('css', 'css:print.css');


// feature  Style Additional 
if (($shadowstyle = $this['config']->get('shadowstyle')) && $this['path']->path("css:/feature/$shadowstyle.css")) { $this['asset']->addFile('css', "css:/feature/$shadowstyle.css"); }
// Image Animation Css File
if (($imageanimation = $this['config']->get('imageanimation')) && $this['path']->path("css:/feature/$imageanimation.css")) { $this['asset']->addFile('css', "css:/feature/$imageanimation.css"); }
// Border Raduis
if (($borderradius = $this['config']->get('borderradius')) && $this['path']->path("css:/feature/$borderradius.css")) { $this['asset']->addFile('css', "css:/feature/$borderradius.css"); }
// Verticla Menu Active 
if (($verticalmenu = $this['config']->get('verticalmenu')) && $this['path']->path("css:/feature/$verticalmenu.css")) { $this['asset']->addFile('css', "css:/feature/$verticalmenu.css"); }
// social
if (($socialicons = $this['config']->get('socialicons')) && $this['path']->path("css:/feature/social/$socialicons.css")) { $this['asset']->addFile('css', "css:/feature/social/$socialicons.css"); }

// Fixed Top-menu
if (($topmenufixed = $this['config']->get('topmenufixed')) && $this['path']->path("css:/feature/$topmenufixed.css")) { $this['asset']->addFile('css', "css:/feature/$topmenufixed.css"); }

// TopMenu Display Responsive Select Menu
if (($topmenuresponsive = $this['config']->get('topmenuresponsive')) && $this['path']->path("css:/feature/$topmenuresponsive.css")) { $this['asset']->addFile('css', "css:/feature/$topmenuresponsive.css"); }

// Display description
if (($poststext = $this['config']->get('poststext')) && $this['path']->path("css:/feature/$poststext.css")) { $this['asset']->addFile('css', "css:/feature/$poststext.css"); }

// Bloks Style Additional Css File

if (($toolbarstyle = $this['config']->get('toolbarstyle')) && $this['path']->path("css:/blockstyle/toolbar/$toolbarstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/toolbar/$toolbarstyle.css"); }
if (($topastyle = $this['config']->get('topastyle')) && $this['path']->path("css:/blockstyle/top-a/$topastyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/top-a/$topastyle.css"); }
if (($headerstyle = $this['config']->get('headerstyle')) && $this['path']->path("css:/blockstyle/header/$headerstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/header/$headerstyle.css"); }
if (($newflashstyle = $this['config']->get('newflashstyle')) && $this['path']->path("css:/blockstyle/newflash/$newflashstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/newflash/$newflashstyle.css"); }
if (($menustyle = $this['config']->get('menustyle')) && $this['path']->path("css:/blockstyle/menu/$menustyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/menu/$menustyle.css"); }
if (($mainstyle = $this['config']->get('mainstyle')) && $this['path']->path("css:/blockstyle/main/$mainstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/main/$mainstyle.css"); }
if (($bottombstyle = $this['config']->get('bottombstyle')) && $this['path']->path("css:/blockstyle/bottom-b/$bottombstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/bottom-b/$bottombstyle.css"); }
if (($bottomastyle = $this['config']->get('bottomastyle')) && $this['path']->path("css:/blockstyle/bottom-a/$bottomastyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/bottom-a/$bottomastyle.css"); }
if (($bottomcstyle = $this['config']->get('bottomcstyle')) && $this['path']->path("css:/blockstyle/bottom-c/$bottomcstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/bottom-c/$bottomcstyle.css"); }
if (($footerstyle = $this['config']->get('footerstyle')) && $this['path']->path("css:/blockstyle/footer/$footerstyle.css")) { $this['asset']->addFile('css', "css:/blockstyle/footer/$footerstyle.css"); }


// load fonts
$http  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$fonts = array(
	'droidsans' => 'template:fonts/droidsans.css',
	'opensans' => 'template:fonts/opensans.css',
	'yanonekaffeesatz' => 'template:fonts/yanonekaffeesatz.css',
	'mavenpro' => 'template:fonts/mavenpro.css',
	'droidkufi' => 'template:fonts/droidkufi.css',
	'oswald' => 'template:fonts/oswald.css',
	'creteround' => 'template:fonts/creteround.css',
	'notosans' => 'template:fonts/notosans.css',
	'gesstwomedium' => 'template:fonts/gesstwomedium.css',
	'kreon' => 'template:fonts/kreon.css');

foreach (array_unique(array($this['config']->get('font1'), $this['config']->get('font2'), $this['config']->get('font3'))) as $font) {
	if (isset($fonts[$font])) {
		$this['asset']->addFile('css', $fonts[$font]);
	}
}

// set body css classes
$body_classes  = $sidebar_classes.' ';
$body_classes .= $this['system']->isBlog() ? 'isblog ' : 'noblog ';
$body_classes .= $this['config']->get('page_class');

$this['config']->set('body_classes', $body_classes);



// add javascripts
/*$this['asset']->addFile('js', 'js:warp.js');
$this['asset']->addFile('js', 'js:responsive.js');
$this['asset']->addFile('js', 'js:accordionmenu.js');
$this['asset']->addFile('js', 'js:dropdownmenu.js');
$this['asset']->addFile('js', 'js:template.js');*/



// add social buttons
$body_config['twitter'] = (int) $this['config']->get('twitter', 0);
$body_config['plusone'] = (int) $this['config']->get('plusone', 0);
$body_config['facebook'] = (int) $this['config']->get('facebook', 0);

$this['config']->set('body_config', json_encode($body_config));

// add javascripts
// internet explorer
if ($this['useragent']->browser() == 'msie') {

	// add conditional comments
	$head[] = sprintf('<!--[if lte IE 8]><script src="%s"></script><![endif]-->', $this['path']->url('js:html5.js'));
	$head[] = sprintf('<!--[if IE 8]><link rel="stylesheet" href="%s" /><![endif]-->', $this['path']->url('css:ie8.css'));
    $head[] = sprintf('<!--[if IE 8]><link rel="stylesheet" href="%s" /><![endif]-->', $this['path']->url('css:feature/ie8.css'));
}

// add $head
if (isset($head)) {
	$this['template']->set('head', implode("\n", $head));
}