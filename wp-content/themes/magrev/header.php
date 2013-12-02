<?php global $_webnukes; 
$header_settings = $_webnukes->get_options('sub_header_settings'); ?>
<!doctype html>
<!--[if IE 7]>    <html class="ie7" > <![endif]-->
<!--[if IE 8]>    <html class="ie8" > <![endif]-->
<!--[if IE 9]>    <html class="ie9" > <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html  <?php language_attributes(); ?>> <!--<![endif]-->
<head>

    <!-- META TAGS -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width" />
    
    <!-- Title -->
    <title> <?php wp_title(); ?></title>
    

		<link href='http://fonts.googleapis.com/css?family=Philosopher:400,700' rel='stylesheet' type='text/css'>   
    
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo kvalue( $header_settings, 'favicon') ? kvalue( $header_settings, 'favicon') : THEME_URL.'/images/favicon.jpg'; ?>">
    
    <?php wp_head(); ?> 
    <!--[if lt IE 9]>
		<script src="<?php echo THEME_URL; ?>/js/html5shiv.js"></script>
    <![endif]-->
    
</head>
<body <?php body_class(); ?>>				
	<!-- HEADER -->
    <div class="container">
        <div class="row wrapper">

            <!-- HEADER BAR -->
            <div class="header-bar">

				<?php // Top Bar Menu
                wp_nav_menu( array( 
                    'theme_location' => 'top-bar',
                    'container'		 => false,
                    'items_wrap'     => '<ul class="clearfix">%3$s</ul>',
                    'fallback_cb'	 => false
                ) ); ?>
                
            </div>
            <!-- HEADER BAR -->

            <div class="span4">
                <div class="logo">
					<?php $logo_url = $_webnukes->get_options('sub_logo','logo');
                    $logo_url = ($logo_url) ? $logo_url :  THEME_URL. '/images/logo.png';?>
                        
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo_url; ?>" alt="<?php bloginfo('name'); ?>"></a>
                </div>
            </div>

            <div class="span8">
            	<?php 
				if( kvalue( $header_settings, 'banner_status' ) == 'on' ) echo kvalue( $header_settings, 'banner_code'); ?>
            </div>

            <!-- NAV -->
            <div class="span12">
                <nav>
                    <?php // Nav Bar Menu
					wp_nav_menu( array( 
						'theme_location' => 'nav-menu',
						'container'		 => false,
						'items_wrap'     => '<ul class="clearfix">%3$s</ul>',
						'fallback_cb'	 => false
					) ); ?>
                </nav>

                <div class="responsive">
                    <ul>
                        <li>
                            <a class="open" href="#"><?php _e('Home', THEME_NAME); ?></a>
                            <?php // Responisive Menu 
							wp_nav_menu( array( 
								'theme_location' => 'nav-menu',
								'container'		 => false,
								'items_wrap'     => '<ul>%3$s</ul>',
								'fallback_cb'	 => false,
								'depth'			 => 1,
							) ); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- NAV -->
<!-- HEADER -->
