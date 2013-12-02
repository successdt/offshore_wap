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
/* Custom Css */
<?php echo $this['config']->get('custom_css'); ?>
</style>

</head>

<body id="page" class="page <?php echo $this['config']->get('body_classes'); ?>" data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>
<div id="background-image">



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
		
<ul class="social-icons float-right">
<li class="facebook"><a href="<?php echo $this['config']->get('facebook_url'); ?>" target="_blank" title="Facebook">Facebook</a></li>
<li class="twitter"><a href="<?php echo $this['config']->get('twitter_url'); ?>" target="_blank" title="Twitter">Twitter</a></li>
<li class="gplus"><a href="<?php echo $this['config']->get('gplus_url'); ?>" target="_blank" title="Google plus">gplus</a></li>
<li class="youtube"><a href="<?php echo $this['config']->get('youtube_url'); ?>" target="_blank" title="Youtube">Youtube</a></li>
<li class="rss"><a href="<?php echo $this['config']->get('rss_url'); ?>" target="_blank" title="Rss Feed">rss</a></li>
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

	 <div id="header-block" class="header-bgcolor">
	 <div class="header-pattern">
	 <div class="header-shadow"></div>
	 
	 <div class="wrapper clearfix">
	 <header id="header">
		

		 <div id="headerbar" class="clearfix">
	
			<a id="logo" class="<?php echo $this['config']->get('logo_class'); ?> size-auto" href="<?php echo $this['config']->get('logo_url'); ?>"><img src="<?php echo $this['config']->get('site_url'); ?>/wp-content/themes/fw_mazaya/images/logo/<?php echo $this['config']->get('costumlogo'); ?>" alt="<?php echo $this['config']->get('site_name'); ?>" title="<?php echo $this['config']->get('site_name'); ?>">   <h1> <?php echo $this['config']->get('site_name'); ?></h1> </a>

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
		
</div>
	
			<?php /* Begin Newflash */ if ($this['modules']->count('newflash + search')) : ?>	
			
		 <div id="newflash-block" class="newflash-bgcolor">
	   <div class="newflash-pattern">
	 <div class="wrapper clearfix">
				<div id="newflashbar" class="clearfix">				
				<?php if ($this['modules']->count('newflash')) : ?>
				<div id="newflash"><?php echo $this['modules']->render('newflash'); ?></div>
				<?php endif; ?>

				<?php if ($this['modules']->count('search')) : ?>
				<div id="search"><?php echo $this['modules']->render('search'); ?></div>
				<?php endif; ?>			
		</div></div></div></div>

		<?php /* End Newflash */ endif; ?>	


<div class="wrapper clearfix">
<div id="main-block" class="clearfix main-bgcolor">
<div class="main-pattern">


					<div>
 <?php /* Begin Verticla Menu */  if ($this['modules']->count('menu')) : ?>
 <div id="menu-block" class="menu-bgcolor">
 <div class="menu-pattern">
 <nav id="menu"><?php echo $this['modules']->render('menu'); ?></nav>
 </div></div>
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
			


  <!-- maininner end 	<?php if ($this['modules']->count('sidebar-c')) : ?>
			<aside id="sidebar-c" class="grid-block"><?php echo $this['modules']->render('sidebar-c', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>-->

			<?php if ($this['modules']->count('sidebar-a')) : ?>
			<aside id="sidebar-a" class="grid-box"><?php echo $this['modules']->render('sidebar-a', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>
			
			<?php if ($this['modules']->count('sidebar-b')) : ?>
			<aside id="sidebar-b" class="grid-box"><?php echo $this['modules']->render('sidebar-b', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>


		</div> </div></div>
	
		<?php endif; ?>
		
		
		<!-- main end -->	
     </div></div></div>	
	 		

			<?php  /* Begin Bottom A */ if ($this['modules']->count('bottom-a')) : ?>
			<div id="bottom-a-block" class="bottom-a-bgcolor">
			<div class="bottom-a-pattern">
			
			
			
			<div class="wrapper clearfix">
		   <section id="bottom-a" class="grid-block"><?php echo $this['modules']->render('bottom-a', array('layout'=>$this['config']->get('bottom-a'))); ?></section>	</div>
	   	</div>
	   	 </div>
		<?php  /* End Bottom A  */ endif; ?>


			<?php  /* Begin Bottom B */ if ($this['modules']->count('bottom-b')) : ?>
			<div id="bottom-b-block" class="bottom-b-bgcolor">
			<div class="bottom-b-pattern">

		<div class="wrapper clearfix">   <section id="bottom-b" class="grid-block"><?php echo $this['modules']->render('bottom-b', array('layout'=>$this['config']->get('bottom-b'))); ?>
		   </section></div>
		   
		   
	   	</div> </div>
		<?php  /* End Bottom B  */ endif; ?>
		
		
		
			<?php  /* Begin Bottom C */ if ($this['modules']->count('bottom-c')) : ?>
			<div id="bottom-c-block" class="bottom-c-bgcolor">
			<div class="bottom-c-pattern">

		  <div class="wrapper clearfix">  <section id="bottom-c" class="grid-block"><?php echo $this['modules']->render('bottom-c', array('layout'=>$this['config']->get('bottom-c'))); ?></section></div>
		   
		   
	   	</div> </div>
		<?php  /* End Bottom C  */ endif; ?>
		
		
		<?php if ($this['modules']->count('footer + debug') || $this['config']->get('warp_branding') || $this['config']->get('totop_scroller')) : ?>
		<div id="footer-block" class="footer-bgcolor">
		<div class="footer-pattern">
<div class="wrapper clearfix">
		<footer id="footer">


<div class="footer-text"><?php echo $this['config']->get('footer_text'); ?></div>


			<?php if ($this['config']->get('totop_scroller')) : ?>
			<a id="totop-scroller" href="#page"><i class="icon-circle-arrow-up icon-large"></i></a>
			<?php endif; ?>

			<?php
				echo $this['modules']->render('footer');
				?> <div class="warp-branding"> <?php
				$this->output('warp_branding');
				?></div><?php
				echo $this['modules']->render('debug');
			?>

		</footer></div></div></div>
		<?php endif; ?>

	</div>
	
	<?php echo $this->render('footer'); ?>

</body>
</html>