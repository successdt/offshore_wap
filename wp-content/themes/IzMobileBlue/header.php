<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xml:lang="vi" xmlns="http://www.w3.org/1999/xhtml">
  <head>
	<title><?php echo strip_shortcodes(wp_title(' ',false)); ?> <?php if(is_home() || is_tag()){ bloginfo('name').'| Tải game hot cho điện thoại'; } else { echo " | IzPlay - Tải game hot cho điện thoại";} ?> <?php if ( is_single() ) { ?> <?php } ?> </title>
	<meta http-equiv="Content-Type"	content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta content="tai game mien phi, wap tai game s40, wap game s40, tai ung dung hot cho nokia s40, tai phan mem mien phi cho di dong" name="keywords">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-144-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-114-precomposed.png"/>
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-72-precomposed.png"/>
                    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-57-precomposed.png"/>
                                   <link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
	<?php wp_head();?>
<meta name="google-site-verification" content="utwzUrss8wTSs9Sizy22dhsZl9oJFLskChu9nsk26bg" />
  </head>
  	<body>
		<div class="iz-container">
			<div class="iz-header">
				<div class="iz-topmenu">
					<ul class="iz-menu-ul">
						<li><a href="/">Home</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/game-offline/">Game offline</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/game-online/">Game online</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/sms-kute/">SMS Kute</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/ung-dung/">Ứng dụng</a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="iz-category">
						<form action="<?php bloginfo('url'); ?>/" method="get">
							<div >
							<?php
								$args = array(
									'show_option_all'    => '',
									'show_option_none'   => 'Chọn chuyên mục',
									'orderby'            => 'ID', 
									'order'              => 'ASC',
									'show_count'         => 1,
									'hide_empty'         => 1, 
									'child_of'           => 0,
									'exclude'            => '',
									'echo'               => 0,
									'selected'           => 0,
									'hierarchical'       => 1, 
									'name'               => 'cat',
									'id'                 => '',
									'class'              => 'postform',
									'depth'              => 0,
									'tab_index'          => 0,
									'taxonomy'           => 'category',
									'hide_if_empty'      => false
								);
							$select = wp_dropdown_categories($args);
							$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
							$select = str_replace('id','class',$select);
							echo $select;
							?>
							<noscript><input type="submit" value="Xem" /></noscript>
							</div>
						</form>
				</div>
			</div>
	<div class="iz-body">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-content') ) : ?>
		<?php endif; ?>