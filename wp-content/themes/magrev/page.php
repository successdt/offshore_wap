<?php get_header(); 
$GLOBALS['_webnukes']->load('layout_class');
$settings = get_post_meta(get_the_ID(), 'page_builder_data', true);//printr($settings);
$page_settings = get_post_meta(get_the_ID(), 'magrev_page_settings', true);//printr($page_settings);
$lay = kvalue( $settings, 'structure' );?>

<!-- Main Content -->
<?php $GLOBALS['_webnukes']->layout->sidebar( $settings, 'left' ); ?>

<?php if( $lay == 'col-full' ) $content_span = 'span12';
elseif( $lay == 'col-left2' || $lay == 'col-right2' || $lay == 'col-both' ) $content_span = 'span6';
else $content_span = (is_page('contact')) ? 'span9' : 'span8'; ?>

<div class="<?php echo $content_span; ?>"> 
    
    <!-- Title bar -->
    <div class="title-bar"> <span><?php global $post; echo $post->post_title; ?></span>
       <?php echo  get_the_breadcrumb(); ?>
    </div>
    <!-- Title bar -->
    
    <?php while ( have_posts() ) : the_post(); ?>
    
    <!-- Single Post -->
    <div class="wp-single-post">
        <?php if(has_post_thumbnail()) : ?>
        <figure>
            <?php  the_post_thumbnail(array(870,400)); ?>
        </figure>
        <?php endif; ?>
        <h4>
            <?php the_title(); ?>
        </h4>
        <div class="line"><span></span></div>
        <?php the_content();
		
		if( $settings ) $GLOBALS['_webnukes']->layout->build_page($settings); ?>
        
        <?php if( kvalue( $page_settings, 'enable_meta') == 'on' ): ?>
            <p class="post-meta">
                <span class="eye">
                    <a href="#"><?php fw_set_post_views(get_the_id()); echo fw_get_post_views(get_the_id()); ?></a>
                </span>
                <span class="time">
                    <?php the_time('h:iA'); ?>
                </span>
                <span class="talk">
                    <a href="#"><?php comments_number( '0', '1', '%' ); ?></a>
                </span>
            </p>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
    <!-- Single Post -->
    
    <?php endwhile; ?>
    
    <?php if( comments_open() ): ?>
        <!-- Comments -->
        <?php comments_template( '', true ); ?>
        <!-- Comments --> 
    <?php endif; ?>  

    
</div>

<?php $GLOBALS['_webnukes']->layout->sidebar( $settings, 'right' ); ?>
<!-- Main Content -->

<?php get_footer(); ?>
