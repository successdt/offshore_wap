<?php
/**
* @package   yoo_master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get template configuration
include($this['path']->path('layouts:template.config.php'));
	
?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>">

<head>
<?php echo $this['template']->render('head'); ?>
<style>
/* Custom Css Code */
<?php echo $this['config']->get('custom_css'); ?>
</style>

</head>

<body id="page"  class="page <?php echo $this['config']->get('body_classes'); ?>" data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>
<div id="background-image" <?php body_class($class); ?> >


	<?php if ($this['modules']->count('absolute')) : ?>
	<div id="absolute">
		<?php echo $this['modules']->render('absolute'); ?>
	</div>
	<?php endif; ?>
			<?php /* Begin Toolbar */ if ($this['modules']->count('toolbar-l + toolbar-r') || $this['config']->get('date')) : ?>
			
			  <div id="toolbar-block"  class="toolbar-bgcolor toolbar-pattern">
			  <div class="toolbar-pattern">
			
			<div id="toolbar" class="wrapper clearfix">

				<?php if ($this['modules']->count('toolbar-l') || $this['config']->get('date')) : ?>
				<div class="float-left">
				
					<?php if ($this['config']->get('date')) : ?>
					<time datetime="<?php echo $this['config']->get('datetime'); ?>"><?php echo $this['config']->get('actual_date'); ?></time>
					<?php endif; ?>
				
					<?php echo $this['modules']->render('toolbar-l'); ?>
					
				</div>
				<?php endif; ?>
					
				<?php if ($this['modules']->count('toolbar-r')) : ?>
				<div class="float-right"><?php echo $this['modules']->render('toolbar-r'); ?></div>
				<?php endif; ?>
				
				
				
					<!-- Social Code en Toolbar -->	

				<ul class="social-icons float-right">
				<?php if ($this['config']->get('facebook-display')) : ?>
				<li class="facebook"><a href="<?php echo $this['config']->get('facebook_url'); ?>" target="_blank" title="Facebook">   <i class="icon-facebook"></i>   </a></li>
				<?php endif; ?>
				<?php if ($this['config']->get('twitter-display')) : ?> 
            <li class="twitter"><a href="<?php echo $this['config']->get('twitter_url'); ?>" target="_blank" title="Twitter">     <i class="icon-twitter"></i>     </a></li>
            <?php endif; ?>
            <?php if ($this['config']->get('google-plus-display')) : ?>
            <li class="gplus"><a href="<?php echo $this['config']->get('gplus_url'); ?>" target="_blank" title="Google plus">      <i class="icon-google-plus"></i>       </a></li>
            <?php endif; ?>
            <?php if ($this['config']->get('youtube-display')) : ?>
            <li class="youtube"><a href="<?php echo $this['config']->get('youtube_url'); ?>" target="_blank" title="Youtube">     <i class="icon-youtube-play"></i>    </a></li>
            <?php endif; ?>
             <?php if ($this['config']->get('dribbble-display')) : ?>
             <li class="dribbble"><a href="<?php echo $this['config']->get('dribbble_url'); ?>" target="_blank" title="Dribbble">     <i class="icon-dribbble"></i>    </a></li>
              <?php endif; ?>
             <?php if ($this['config']->get('flickr-display')) : ?>
             <li class="flickr"><a href="<?php echo $this['config']->get('flickr_url'); ?>" target="_blank" title="Flickr">     <i class="icon-flickr"></i>    </a></li>
            <?php endif; ?>
            <?php if ($this['config']->get('linkedin-display')) : ?>
             <li class="linkedin"><a href="<?php echo $this['config']->get('linkedin_url'); ?>" target="_blank" title="Linkedin">    <i class="icon-linkedin"></i>    </a></li>
             <?php endif; ?>
             <?php if ($this['config']->get('pinterest-display')) : ?>
             <li class="pinterest"><a href="<?php echo $this['config']->get('pinterest_url'); ?>" target="_blank" title="Pinterest">    <i class="icon-pinterest"></i>    </a></li>
             <?php endif; ?>
             <?php if ($this['config']->get('instagram-display')) : ?>
             <li class="instagram"><a href="<?php echo $this['config']->get('instagram_url'); ?>" target="_blank" title="Instagram">    <i class="icon-instagram"></i>    </a></li>
             <?php endif; ?>
              <?php if ($this['config']->get('soundcloud-display')) : ?>
             <li class="soundcloud"><a href="<?php echo $this['config']->get('soundcloud_url'); ?>" target="_blank" title="Soundcloud">    <i class="icon-cloud"></i>    </a></li>
             <?php endif; ?> 
            <?php if ($this['config']->get('rss-display')) : ?>
            <li class="rss"><a href="<?php echo $this['config']->get('rss_url'); ?>" target="_blank" title="Rss Feed">    <i class="icon-rss"></i>    </a></li>
				 <?php endif; ?>
				
				</ul>
				
				
			</div>
			</div>
            </div>
			<?php  /* End Toolbar */  endif; ?>


			<?php  /* Begin Top A */ if ($this['modules']->count('top-a')) : ?>
			<div id="top-a-block" class="top-a-bgcolor">
			<div class="top-a-pattern">
			<div class="wrapper clearfix">
		   <section id="top-a" class="grid-block"><?php echo $this['modules']->render('top-a', array('layout'=>$this['config']->get('top-a'))); ?></section>
	     	</div> </div></div>
		   <?php  /* End Top A */ endif; ?>
	
	
	
<div class="wrapper clearfix">
	<!-- Header  Begin-->	

	 <div id="header-block" class="header-bgcolor">
	 <div class="header-pattern">
	 <div class="header-shadow"></div>
	 <header id="header">
	 
	 
	   <div id="headerbar" class="clearfix">
	
			<a id="logo" class="<?php echo $this['config']->get('logo_class'); ?> size-auto" href="<?php echo $this['config']->get('logo_url'); ?>"><img src="<?php echo $this['config']->get('costumlogo'); ?>" alt="<?php echo $this['config']->get('site_name'); ?>" title="<?php echo $this['config']->get('site_name'); ?>">   
			<?php /*<h1> <?php echo $this['config']->get('site_name'); ?></h1> </a>*/ ?>

				<?php if ($this['modules']->count('logo')) : ?>	
				<a id="logo" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['modules']->render('logo'); ?></a>
				<?php endif; ?>

				     <?php if ($this['modules']->count('headerbar')) : ?>
				<?php echo $this['modules']->render('headerbar'); ?>
			
			<?php endif; ?>
		</div>
		
		
		
			<?php if ($this['modules']->count('banner')) : ?>
			<div id="banner"><?php echo $this['modules']->render('banner'); ?></div>
			<?php endif; ?>


		</header>
		</div></div>		
<!-- Header  End-->
	
			<?php /* Begin Newflash */ if ($this['modules']->count('newflash + search')) : ?>	
			
		 <div id="newflash-block" class="newflash-bgcolor">
	   <div class="newflash-pattern">
	   <div class="newflash-shadow"></div> 
				<div id="newflashbar" class="clearfix">				
				<?php if ($this['modules']->count('newflash')) : ?>
				<div id="newflash"><?php echo $this['modules']->render('newflash'); ?></div>
				<?php endif; ?>

				<?php if ($this['modules']->count('search')) : ?>
				<div id="search"><?php echo $this['modules']->render('search'); ?></div>
				<?php endif; ?>			
		</div></div></div>

		<?php /* End Newflash */ endif; ?>	



<div id="main-block" class="clearfix main-bgcolor">
<div class="main-pattern">
<div class="main-block-shadow"></div>

					<div>




 <?php /* Begin Verticla Menu */  if ($this['modules']->count('menu')) : ?>
 <div id="menu-block" class="menu-bgcolor">
 <nav id="menu"><?php echo $this['modules']->render('menu'); ?></nav>
 </div>
 <?php /* End Verticla Menu */ endif; ?>
			
			
			
			
			
			
				

<div id="mainfanouss">	
		<?php if ($this['modules']->count('top-b')) : ?>
		<section id="top-b" class="grid-block"><?php echo $this['modules']->render('top-b', array('layout'=>$this['config']->get('top-b'))); ?></section>
		<?php endif; ?>
	
		
		<?php if ($this['modules']->count('innertop + innerbottom + sidebar-a + sidebar-b') || $this['config']->get('system_output')) : ?>
		<div id="main" class="grid-block">

			<div id="maininner" class="grid-box">

				<?php if ($this['modules']->count('innertop')) : ?>
				<section id="innertop" class="grid-block"><?php echo $this['modules']->render('innertop', array('layout'=>$this['config']->get('innertop'))); ?></section>
				<?php endif; ?>

				<?php if ($this['modules']->count('breadcrumbs')) : ?>
				<section id="breadcrumbs"><?php echo $this['modules']->render('breadcrumbs'); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output')) : ?>
				<section id="content" class="grid-block"><?php echo $this['template']->render('content'); ?></section>
				<?php endif; ?>

				<?php if ($this['modules']->count('innerbottom')) : ?>
				<section id="innerbottom" class="grid-block"><?php echo $this['modules']->render('innerbottom', array('layout'=>$this['config']->get('innerbottom'))); ?></section>
				<?php endif; ?>

			</div>
			<!-- maininner end -->

			<?php if ($this['modules']->count('sidebar-a')) : ?>
			<aside id="sidebar-a" class="grid-box"><?php echo $this['modules']->render('sidebar-a', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>
			
			<?php if ($this['modules']->count('sidebar-b')) : ?>
			<aside id="sidebar-b" class="grid-box"><?php echo $this['modules']->render('sidebar-b', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>
		</div> </div></div>
	
		<?php endif; ?>
		
		
		<!-- main end -->	
     </div></div>	
	 <div class="wrapper bottom-b-shadow "></div>

		
		<div class="wrapper clearfix">

					<?php  /* Begin Bottom a */ if ($this['modules']->count('bottom-a')) : ?>
			<div id="bottom-a-block" class="bottom-a-bgcolor">
			<div class="bottom-a-pattern">

		   <section id="bottom-a" class="grid-block"><?php echo $this['modules']->render('bottom-a', array('layout'=>$this['config']->get('bottom-a'))); ?></section>
		   
		   
	   	</div> </div>
		<?php  /* End Bottom a  */ endif; ?>
		
		
		
			<?php  /* Begin Bottom B */ if ($this['modules']->count('bottom-b')) : ?>
			<div id="bottom-b-block" class="bottom-b-bgcolor">
			<div class="bottom-b-pattern">
			
		   <section id="bottom-b" class="grid-block"><?php echo $this['modules']->render('bottom-b', array('layout'=>$this['config']->get('bottom-b'))); ?></section>
	   	</div>
	   	 </div>
	   	 
	   	 
	   	 
	   	 
	   	  <div class="wrapper bottom-b-shadow "></div>
		<?php  /* End Bottom B  */ endif; ?>

			<?php  /* Begin Bottom C */ if ($this['modules']->count('bottom-c')) : ?>
			<div id="bottom-c-block" class="bottom-c-bgcolor">
			<div class="bottom-c-pattern">

		   <section id="bottom-c" class="grid-block"><?php echo $this['modules']->render('bottom-c', array('layout'=>$this['config']->get('bottom-c'))); ?></section>
		   
		   
	   	</div> </div>
		<?php  /* End Bottom C  */ endif; ?>
		</div>

		<div class="wrapper clearfix">

		<?php if ($this['modules']->count('footer + debug') || $this['config']->get('warp_branding') || $this['config']->get('totop_scroller')) : ?>
		<div id="footer-block" class="footer-bgcolor">
		<div class="footer-pattern">

		<footer id="footer">

<div class="float-left footer-text"><?php echo $this['config']->get('footer_text'); ?></div>


			<?php if ($this['config']->get('totop_scroller')) : ?>
			<a id="totop-scroller" href="#page"><i class="icon-circle-arrow-up icon-large"></i></a>
			<?php endif; ?>

			<?php
				echo $this['modules']->render('footer');
				
				
				?> <div class="float-right warp-branding"> <?php
				// $this->output('warp_branding');
				?></div><?php
				echo $this['modules']->render('debug');
			?>

		</footer></div></div>
		<?php endif; ?>

	</div></div>
	
	<?php echo $this->render('footer'); ?>

	</div>
	
</body>
</html>