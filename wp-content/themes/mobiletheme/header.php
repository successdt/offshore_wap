<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="margin-top: 0 !important;">
<head profile="http://gmpg.org/xfn/11">

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php /*
<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-37645850-1']);
	  _gaq.push(['_setAllowLinker', true]);
	  _gaq.push(['_setDomainName', 'darkit.info']);
	  _gaq.push(['_trackPageview']);
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
</script>
*/ ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>

<body>

<div id="wrapper">

	<div id="logo">
		<a href="<?php bloginfo('rss2_url'); ?>" class="mobile_rss"><img src="<?php bloginfo('template_directory'); ?>/images/mobile_rss.gif" border="0" alt="Subscribe" /></a>
		<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/logo.png" /></a>
	</div>
	<div class="navbar">
		<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/icon_home.png" /></a>
		<?php 
		if ( function_exists( 'wp_nav_menu' ) ){
			wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_id' => 'topMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );
		}else{
			primarymenu();
		}?>
				
	</div>
	
		<?php
		if ( is_category() ) {
		  $current_cat = get_query_var('cat');
		  $currenCat = get_category($current_cat);
  		?>
  		<div class="sub-menu">
			<ul>
				<li style="font-weight: bold; color: #F9A017;">
					<?php echo $currenCat->name; ?>
				</li>
				<?php wp_list_categories('&title_li=&child_of='.$current_cat . '&show_option_none=');?>
			</ul>
  		</div>
		<?php }
		?>
	
	<?php /*
	<div class="breadcrums">
		<a href="<?php bloginfo('url'); ?>">Trang Chủ</a><span>&nbsp;>&nbsp;</span>
		<?php if (function_exists('cm_breadcrumb_nav')) {cm_breadcrumb_nav();} ?>
	</div>
	*/ ?>