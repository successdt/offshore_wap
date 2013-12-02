<?php get_header(); ?>
<!-- Main Content -->
<?php  global $post; $settings = get_post_meta( $post->ID , 'magrev_post_settings', true ); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('span9'); ?>> 
    
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
        <h4><?php the_title(); ?></h4>
        
        <div class="line"><span></span></div>
        
		<?php the_content(); ?>
        <?php wp_link_pages( array(
								'before'           => '<div class="pagination pagination-left">' . __('Pages:'),
								'after'            => '</div>',
								'link_before'      => '<span>',
								'link_after'       => '</span>',
								'pagelink'         => '%',
								'echo'             => 1
								)); ?>
        <p class="post-meta">
        	
            <span class="eye">
            	<a href="#"><?php fw_set_post_views(get_the_id()); echo fw_get_post_views(get_the_id()); ?></a>
            </span>
            
            <span class="time"><?php the_time('h:iA'); ?></span>
            <span class="talk"><a href="#"><?php comments_number( '0', '1', '%' ); ?></a></span>
            <?php the_category(', '); ?>
            <?php the_tags(); ?>
		</p>
        
        <div class="clearfix"></div>
    </div>
    <!-- Single Post -->
    
    <?php endwhile; ?>
    <!-- Comments -->
    <?php comments_template( '', true ); ?>
    
    <!-- Comments --> 
    
</div>

<div class="span3">
    <div class="sidebar"> <?php dynamic_sidebar( kvalue( $settings, 'sidebar' ) ); ?> </div>
</div>
<!-- Main Content -->

<?php get_footer(); ?>
