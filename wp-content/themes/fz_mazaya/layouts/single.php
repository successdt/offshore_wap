<div id="system">
        <?php setPostViews(get_the_ID()); ?>
	    <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'layouts/format', get_post_format() ); ?>
	
				<article class="item" data-permalink="<?php the_permalink(); ?>">
		
			
			<header>
	<h1 class="title"><?php the_title(); ?></h1>	
				
	
	
	

	
	
	


			<p class="meta">	
							
<span><?php _e( '<i class="icon-user"></i> ' , 'warp' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s',        'warp' ),      get_the_author() ) ?>"><?php echo get_the_author() ?> </a></span>				
<span><i class="icon-calendar"></i>	<?php  $date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>'; printf(__('%s. ', 'warp'), $date); ?> </span> 
<span><i class="icon-folder-open-alt"></i> <?php _e( 'Posted in' , 'warp' ); ?> <?php printf('%1$s', get_the_category_list( ', ' ) ); ?> </span>			
<span><i class="icon-eye-open"></i>	<?php echo getPostViews(get_the_ID()); ?></span>				
<span><i class="icon-comments-alt"></i>	<?php if(comments_open()) comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></span>
				</p>






			</header>

			<div class="content clearfix">
				<?php 
					$downloadLink = get_post_meta(get_the_ID(), 'download_link');
			 	?>
			 	<?php if($downloadLink): ?>
			 		<div class="download">
			 	 		<a href="<?php echo $downloadLink[0] ?>">
						 	<img src="/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
						 	Tải miễn phí
				    	</a>
					 </div>
			 	<?php endif; ?>
				<?php the_content(''); ?>
				<?php if($downloadLink): ?>
			 		<div class="download">
			 	 		<a href="<?php echo $downloadLink[0] ?>">
						 	<img src="/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
						 	Tải miễn phí
				    	</a>
					 </div>
			 	<?php endif; ?>
				
			</div>
			
			
			<div><?php the_tags('<p class="itemtag">'.__('<i class="icon-tags"></i> Tags: ', 'warp'), ' ', '</p>'); ?>
			<?php edit_post_link(__('<i class="icon-edit"></i> Edit this post.', 'warp'), '<p class="edit">','</p>'); ?>

			<?php if (pings_open()) : ?>
			<p class="trackback"><?php printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
			<?php endif; ?>


			</div>
			
			
			
			<div class="wp-link-pages"><?php wp_link_pages(); ?></div>

			<?php /* Author box begin */ if (get_the_author_meta('description')) : ?>
			<section class="author-box mod-box clearfix">
				<?php echo get_avatar(get_the_author_meta('user_email')); ?>
				
				<h3 class="name"><?php the_author(); ?></h3>
				
				<div class="description"><?php the_author_meta('description'); ?></div>
				
				
			<div class="profile-links">
 
    <ul class="social-links">
        <?php if ( get_the_author_meta( 'twitter' ) != '' )  { ?>
            <li><a class="twitter-link" href="https://twitter.com/<?php echo wp_kses( get_the_author_meta( 'twitter' ), null ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Twitter', 'warp'), get_the_author() ); ?>"><i class="icon-twitter"></i></a></li>
        <?php } ?>
 
        <?php if ( get_the_author_meta( 'facebook' ) != '' )  { ?>
            <li><a class="facebook-link" href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Facebook', 'warp'), get_the_author() ); ?>"><i class="icon-facebook"></i></a></li>
        <?php } ?>
 
        <?php if ( get_the_author_meta( 'linkedin' ) != '' )  { ?>
            <li><a class="linkedin-link" href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" title="<?php printf( esc_attr__( 'Connect with %s on LinkedIn', 'warp'), get_the_author() ); ?>"><i class="icon-linkedin"></i></a></li>
        <?php } ?>
 
        <?php if ( get_the_author_meta( 'googleplus' ) != '' )  { ?>
            <li><a class="google-link" href="<?php echo esc_url( get_the_author_meta( 'googleplus' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Google+', 'warp'), get_the_author() ); ?>"><i class="icon-google-plus"></i></a></li>
        <?php } ?>
    
        <?php if ( get_the_author_meta( 'pinterest' ) != '' )  { ?>
            <li><a class="pinterest-link" href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Pinterest', 'warp'), get_the_author() ); ?>"><i class="icon-pinterest"></i></a></li>
        <?php } ?>
        
        <?php if ( get_the_author_meta( 'dribbble' ) != '' )  { ?>
            <li><a class="dribbble-link" href="<?php echo esc_url( get_the_author_meta( 'dribbble' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Dribbble', 'warp'), get_the_author() ); ?>"><i class="icon-dribbble"></i></a></li>
        <?php } ?>
  
         <?php if ( get_the_author_meta( 'flickr' ) != '' )  { ?>
            <li><a class="flickr-link" href="<?php echo esc_url( get_the_author_meta( 'flickr' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Flickr', 'warp'), get_the_author() ); ?>"><i class="icon-flickr"></i></a></li>
        <?php } ?>

           <?php if ( get_the_author_meta( 'instagram' ) != '' )  { ?>
            <li><a class="instagram-link" href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Instagram', 'warp'), get_the_author() ); ?>"><i class="icon-instagram"></i></a></li>
        <?php } ?>
        
        <?php if ( get_the_author_meta( 'soundcloud' ) != '' )  { ?>
            <li><a class="soundcloud-link" href="<?php echo esc_url( get_the_author_meta( 'soundcloud' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Soundcloud', 'warp'), get_the_author() ); ?>"><i class="icon-cloud"></i></a></li>
        <?php } ?>
        
        
    </ul>
 
    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
        <?php printf( __( '<i class="icon-copy"></i> View all posts by %s <span class="meta-nav">&rarr;</span>', 'warp' ), get_the_author() ); ?>
    </a>
 
</div>
			</section>
			<?php  /* Author box end */ endif; ?>
		
		
		

		<!-- Related Article Begin -->
     <?php $origpost = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
    
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>3, // Number of related posts that will be shown.
    'caller_get_posts'=>1
    );
    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {

    echo '<div id="related"><div class="mod-box relatedposts"><h3>Related Posts</h3><div class="divider"></div>';
    echo '<div class="grid-block">';

    while( $my_query->have_posts() ) {
    $my_query->the_post(); ?>
    <div class="grid-box width33"><div class="small_thumb size-auto"><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'related-thumb' ); ?></a></div>
     <h3><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<p class="meta"> <span><i class="icon-calendar"></i><?php the_time('M j, Y') ?></span></p>
    </div>

    <?php }
    echo '</div></div></div>';
    }
    }
    $post = $origpost;
    wp_reset_query(); ?>




	
<?php comments_template(); ?>
		</article>

		<?php endwhile; ?>
	<?php endif; ?>

</div></div>