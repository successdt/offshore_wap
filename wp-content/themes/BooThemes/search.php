<?php get_header(); ?>

		<div id="main">
		
			<div class="browsing">
				<span><?php _e('Search results for', 'boothemes'); ?></span><h1><?php echo get_search_query(); ?></h1>
			</div>
			
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php if(get_post_meta($post->ID, "boothemes_video_id", true)) { ?>
				<?php $video_id = get_post_meta($post->ID, "boothemes_video_id", true); $count_id = strlen($video_id); ?>
					<?php if($count_id == 8) { ?>
						<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "boothemes_video_id", true); ?>" width="640" height="<?php echo get_post_meta($post->ID, "boothemes_video_height", true); ?>" frameborder="0"></iframe></div>
					<?php } else { ?>
						<div class="video-shortcode"><iframe title="YouTube video player" width="640" height="<?php echo get_post_meta($post->ID, "boothemes_video_height", true); ?>" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, "boothemes_video_id", true); ?>" frameborder="0" allowfullscreen></iframe></div>
					<?php } ?>
				<?php } else { ?>
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('index-thumb', array('class' => 'post-img', 'title' => get_the_title())); ?></a>
				<?php } } ?>
				
				<div class="post-content" style="width:408px;float:right;">
                <h2 class="post-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                 <div class="post-meta">
	<span><?php the_time( get_option('date_format') ); ?> | <?php _e('By', 'boothemes'); ?> <?php the_author_posts_link(); ?> | <?php _e('In', 'boothemes'); ?> <?php the_category(', ') ?></span>
				</div>
					<?php if(get_option('fp_content') == "wp_content" || get_option('fp_content') == "") { ?>
					<?php the_content(); ?>
					<?php } else { ?>
					<?php the_excerpt(); ?>
					<?php } ?>
				</div>
			
			</div>
			
			<?php endwhile; ?>
			
			<div class="pagination">
				
				<span class="prev"><?php previous_posts_link(__('Previous Page', 'boothemes')) ?></span>
				<span class="next"><?php next_posts_link(__('Next Page', 'boothemes')) ?></span>
				
			</div>
			
			<?php else : ?>
	
			<p><?php _e('Sorry but no posts were found. Try using another search term!', 'boothemes'); ?></p>
			
			<?php endif; ?>
		
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>