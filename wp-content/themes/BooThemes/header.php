<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
 
<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

<?php if(get_option('fp_custom_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('fp_custom_favicon'); ?>" /><?php } ?>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<?php if (get_option('fp_feedburner')) { ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="http://feeds.feedburner.com/<?php echo get_option('fp_feedburner'); ?>" />
<?php } else { ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
<?php } ?>
   
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('', get_bloginfo('template_directory'). '/js/scripts.js'); ?>
<?php wp_head(); ?>

</head>

<body <?php body_class($class); ?>>
<div class="topbg"></div>
	<div id="navigation-wrapper">
		
		<div id="navigation">
		
			<div id="search-wrapper">
			</div>
		
			<ul>
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary-menu' ) ); ?>
			</ul>
			
		</div>
		
	</div>
	
	<div id="wrapper">
	
		<div id="header">
		
			<div id="logo">
				<?php if(get_option('fp_logo')) { ?>
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('fp_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<?php } else { ?>
					<?php if(get_option('fp_skin') == 'dark') { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_dark.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php } else { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php } ?>
				<?php } ?>
			</div>
			
			<?php if(get_option('fp_header_banner')) { ?>
			<div id="banner">
				<?php echo get_option('fp_header_banner'); ?>
			</div>
			<?php } ?>
			
		</div>
	