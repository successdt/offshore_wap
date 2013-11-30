<?php get_header(); ?>

		<div id="main">
		
			<div class="browsing">
				<?php if (have_posts()) : ?>
	
				<?php /* Get author data */
				if(get_query_var('author_name')) :
				$curauth = get_userdatabylogin(get_query_var('author_name'));
				else :
				$curauth = get_userdata(get_query_var('author'));
				endif;
				?>

				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				<?php /* If this is a category archive */ if (is_category()) { ?>
				<span><?php _e('Browsing Category', 'marisa'); ?></span><h1><?php single_cat_title(); ?></h1>
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<span><?php _e('Browsing Tag', 'marisa'); ?></span><h1><?php single_tag_title(); ?></h1>
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<span><?php _e('Browsing Archive', 'marisa'); ?></span><h1><?php the_time('F jS, Y'); ?></h1>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<span><?php _e('Browsing Archive', 'marisa'); ?></span><h1><?php the_time('F, Y'); ?></h1>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<span><?php _e('Browsing Archive', 'marisa'); ?></span><h1><?php the_time('Y'); ?></h1>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<span><?php _e('Browsing All Posts By', 'marisa'); ?></span><h1><?php echo $curauth->display_name; ?></h1>
				
				<?php } ?>
			</div>
			
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
				
				<span class="prev"><?php previous_posts_link(__('Previous Page', 'marisa')) ?></span>
				<span class="next"><?php next_posts_link(__('Next Page', 'marisa')) ?></span>
				
			</div>
			
			<?php else : ?>
			
				<span><?php _e('Sorry', 'marisa'); ?></span>
				<h1><?php _e('No posts in this category yet', 'marisa'); ?></h1>
			
			</div>
			
			<?php endif; ?>
		
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>