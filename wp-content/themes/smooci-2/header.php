<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
    <meta name="description" content="<?php bloginfo('description'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>

<body>
	<div id="topnav">
		<ul>
			<li>
				<a href="<?php bloginfo('url'); ?>">
					<?php /*<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/logo.png" />*/ ?>
				</a>
			</li>
			<li>
				<a href="#">TIN TỨC</a>
			</li>
			<li>
				<a href="#">GAME</a>
			</li>
			<li>
				<a href="#bottom-menu">MENU</a>
			</li>
		</ul>
	</div>
	<div id="wrapper_mobile">
		<?php /*
  		<div id="header_mobile">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td style="width:10px;"><img src="<?php bloginfo('template_url'); ?>/images/leftHeaderBg.png" alt="" /></td>
                    <td style="background-image:url(<?php bloginfo('template_url'); ?>/images/headerBg.png); width:100%">
                        
                        <div class="titles">
                            <h1 class="title_link">
                                <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                            </h1>
            
                            <div class="subtitle">
                                <?php bloginfo('description'); ?>
                            </div>
                        </div>  
                    </td>    
                    <td style="width:10px;"><img src="<?php bloginfo('template_url'); ?>/images/rightHeaderBg.png" alt="" /></td>
                </tr>
            </tbody>
            </table>
        </div>
		*/ ?>
		<div id="header_mobile">
			<form id="search-4" class="searchbox" action="<?php get_bloginfo('url'); ?>" method="get" role="search">
				<table>
					<tr>
						<td><input style="width: 100%;" class="s" type="text" value="" name="s" placeholder="Tìm kiếm..." autocomplete="off"/></td>
						<td style="width: 80px;"><button style="margin-left: 10px;"></button></td>
					</tr>
				</table>
			</form>
		</div>