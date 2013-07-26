<?php get_header(); ?>
			<div id="slogan">
				<div id="sloganh1"><h1><?php echo get_option('fp_sloganh1'); ?></h1></div>
                <div id="slogansloganspan"> <?php echo get_option('fp_sloganspan'); ?></div>
			</div>
		
        
        <?php if(get_option('fp_slider_tags')) { 
			
			$featured_posts = new WP_Query(array(
			'showposts' => ''.get_option('fp_number').'',
			'tag' => ''.get_option('fp_slider_tags').''
			));
			
		?>
		<div id="featured-wrapper">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js'></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>	
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/js/jquery.aviaSlider.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/js/custom.min.js'></script>
     
		        <ul class='aviaslider' id="frontpage-slider">
                <?php while($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
					<li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo get_post_meta($post->ID, 'featured', true);?>" alt="<?php the_title_attribute(); ?> :: <?php the_content_rss('', TRUE, '', 20); ?>" /></a></li>
                 <?php endwhile; ?>
			     <?php wp_reset_query(); ?>
				</ul>

		</div>
		<?php } ?>
        
        
        
		<div id="main">
		
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
			
			<?php endif; ?>
		
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>