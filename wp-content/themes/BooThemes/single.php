<?php get_header(); ?>

		<div id="main">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post single">
			
				<h2 class="post-title"><?php the_title(); ?></h2>
				
				<?php if(get_post_meta($post->ID, "boothemes_video_id", true)) { ?>
				<?php $video_id = get_post_meta($post->ID, "boothemes_video_id", true); $count_id = strlen($video_id); ?>
					<?php if($count_id == 8) { ?>
						<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "boothemes_video_id", true); ?>" width="640" height="<?php echo get_post_meta($post->ID, "boothemes_video_height", true); ?>" frameborder="0"></iframe></div>
					<?php } else { ?>
						<div class="video-shortcode"><iframe title="YouTube video player" width="640" height="<?php echo get_post_meta($post->ID, "boothemes_video_height", true); ?>" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, "boothemes_video_id", true); ?>" frameborder="0" allowfullscreen></iframe></div>
					<?php } ?>
				<?php } else { ?>
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('big-thumb', array('class' => 'post-imgs', 'title' => get_the_title())); ?></a>
				<?php } } ?>
				
				<div class="post-metas">
					<span><?php the_time( get_option('date_format') ); ?></span>
					<span><?php _e('By', 'boothemes'); ?> <?php the_author_posts_link(); ?></span>
					<span><?php _e('In', 'boothemes'); ?> <?php the_category(', ') ?></span>
					
					<?php if(get_option('fp_share_buttons') == "false" || get_option('fp_share_buttons') == "") { ?>
					<div class="post-share">
						<span><iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe></span>
						<span><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink($post->ID); ?>" data-text="Check out this article: <?php echo get_the_title(); ?>">Tweet</a></span>
						<span><g:plusone size="small" href="<?php echo get_permalink($post->ID); ?>"></g:plusone></span>
					</div>
					<?php } ?>
					
				</div>
				
				<div class="post-content">
					<?php the_content(); ?>
					<?php wp_link_pages('before=<p>Pages: &after=</p>'); ?>
				</div>
				
				<div class="post-tags">
					<?php the_tags('', ''); ?> 
				</div>
			
			</div>
				
			<?php if(get_option('fp_related_posts') == "false" || get_option('fp_related_posts') == "") { ?>
			<?php $tags = get_the_tags(); ?>
			<?php if($tags): ?>
			<?php $related = get_related_posts($post->ID, $tags); ?>
			<?php if($related->have_posts()) : ?>
			<div class="related-posts">
			
				<h5><?php _e('Related Posts', 'boothemes'); ?></h5>
				
				<ul>
				<?php while($related->have_posts()): $related->the_post(); ?>
				
					<li>
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('thumb-160'); ?></a>
						<?php } ?>
					</li>
					
				<?php endwhile; ?>
				</ul>
			
			</div>
			<?php endif; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			<?php } ?>
			
			<div class="comments">
				
				<?php comments_template(); ?>
			
			</div>

		<?php endwhile; endif; ?>
		
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>