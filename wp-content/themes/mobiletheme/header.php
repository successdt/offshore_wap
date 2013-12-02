<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="margin-top: 0 !important;">
<head profile="http://gmpg.org/xfn/11">

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="google-site-verification" content="VzguWk-ilpPa1iSGjdHH1fIGG5rYp87ZLsW2nmcrjvQ" />
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44406166-1', 'gamechonloc.mobi');
  ga('send', 'pageview');

</script>
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
		<div id="topMenu" class="ddsmoothmenu">
			<ul id="menu-top-menu" class="menu">
				<li id="menu-item-9" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-9"><a href="http://gamechonloc.mobi/category/game">Games</a>
				<ul class="sub-menu">
					<li id="menu-item-10" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10"><a href="http://gamechonloc.mobi/category/game/game-offline">Game Offline</a></li>
					<li id="menu-item-27" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-27"><a href="http://gamechonloc.mobi/category/game/game-offline">Game Offline</a></li>
					<li id="menu-item-33" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33"><a href="http://gamechonloc.mobi/category/game/game-kinh-dien">Game Kinh điển</a></li>
				</ul>
				</li>
				<li id="menu-item-42" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-42"><a href="http://gamechonloc.mobi/category/ung-dung">Ứng dụng</a></li>
				<li id="menu-item-11" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-11"><a href="http://gamechonloc.mobi/category/tin-hot">Tin hot</a></li>
				<li id="menu-item-28" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-28"><a href="http://gamechonloc.mobi/category/kenh-18">Kênh 18+</a>
					<ul class="sub-menu">
						<li id="menu-item-29" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-29"><a href="http://gamechonloc.mobi/category/kenh-18/anh-nong">Ảnh nóng</a></li>
						<li id="menu-item-39" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-39"><a href="http://gamechonloc.mobi/category/kenh-18/anh-hot-girl">Ảnh hot girl</a></li>
						<li id="menu-item-36" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-36"><a href="http://gamechonloc.mobi/category/kenh-18/hot-clip">Hot clip</a></li>
					</ul>
				</li>
				<li id="menu-item-41" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-41"><a href="http://gamechonloc.mobi/category/truyen">Truyện</a>
					<ul class="sub-menu">
						<li id="menu-item-727" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-727"><a href="http://gamechonloc.mobi/category/truyen/truyen-cuoc-song">Truyện cuộc sống</a></li>
						<li id="menu-item-728" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-728"><a href="http://gamechonloc.mobi/category/truyen/truyen-cuoi">Truyện cười</a></li>
						<li id="menu-item-729" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-729"><a href="http://gamechonloc.mobi/category/truyen/truyen-tuoi-teen">Truyện tuổi teen</a></li>
					</ul>
				</li>
			</ul>
		</div>		
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
	<div style="position: fixed; bottom: 0px; left: 0px; z-index: 10000;">
		<div style="background: #FFF4CC!important; text-align: center!important;">
		    <a style="color:#635238!important;" href="http://gamechonloc.hotclip.mobi">       
		        <img style="vertical-align: middle;" src="http://upanh.topjar.mobi/images/2012/10/25/6HDr0.gif">
		    </a>
		</div>  
	</div>
