<?php /* Template Name: Home Page */ get_header(); 

$GLOBALS['_webnukes']->load('layout_class');
$settings = get_post_meta(get_the_ID(), 'page_builder_data', true);//printr($settings);
$page_settings = get_post_meta(get_the_ID(), 'magrev_page_settings', true);//printr($page_settings);
$lay = kvalue( $settings, 'structure' );?>


<!-- NEWS SLIDER -->
 <div class="span12">
     <div class="news-scrol">
         <span>popoular titles</span>
         <ul id="scroller">
             <?php 
             
                $p_type = $_webnukes->get_options('sub_popular_titles','type');
                $p_num = $_webnukes->get_options('sub_popular_titles','post_num');
                if($p_type == 'category') {
                    $p_cat = $_webnukes->get_options('sub_popular_titles','category');
                    $args = array(
                            'posts_per_page'   => $p_num,
                            'category'         => $p_cat
                            ); 
                } else {
                    $args = array(
                            'posts_per_page'   => $p_num,
                            'category'         => $p_cat,
                            'orderby'=>'comment_count',
                            'order'=>'DESC'
                            ); 
                }
             
             query_posts($args);
             while (have_posts()) : the_post(); 
             ?>
             <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
             <?php 	
             endwhile; 
             wp_reset_query();
             ?>
         </ul>
     </div>
 </div>
<!-- NEWS SLIDER -->

<!-- Main Content -->
<?php $GLOBALS['_webnukes']->layout->sidebar( $settings, 'left' ); ?>

<?php if( $lay == 'col-full' ) $content_span = 'span12';
elseif( $lay == 'col-left2' || $lay == 'col-right2' || $lay == 'col-both' ) $content_span = 'span6';
else $content_span = 'span9'; ?>

<div class="<?php echo $content_span; ?>"> 
    
    
    <?php while ( have_posts() ) : the_post(); ?>
    
    <!-- Single Post -->
    <div class="wp-single-post">
        
        <?php the_content();
		
		if( $settings ) $GLOBALS['_webnukes']->layout->build_page($settings); ?>
        
        
    </div>
    <!-- Single Post -->
    
    <?php endwhile; ?>

    
</div>

<?php $GLOBALS['_webnukes']->layout->sidebar( $settings, 'right' ); ?>
<!-- Main Content -->

<?php get_footer(); ?>
