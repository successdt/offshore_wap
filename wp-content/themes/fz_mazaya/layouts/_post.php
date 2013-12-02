<?php $warp = Warp::getInstance(); ?>
<div <?php post_class(); ?>>
<?php if($warp["config"]->get("posts-layout", 1)) : ?>

<!-- This is Grid Layout Begin -->

<article id="item-<?php the_ID(); ?>" class="item" data-permalink="<?php the_permalink(); ?>" >
<header>
<h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
</header>

	<?php if($warp["config"]->get("blog_view_featured_image", 1)) : ?>
		<?php if (has_post_thumbnail()) : ?>
			<?php
			$width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
			$height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
			?>

			<?php if($warp["config"]->get("featured_spotlight", 1)) : ?>
				<a class="featured-image featured-spotlight" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">		
					<?php the_post_thumbnail('medium', array('class' => 'size-auto')); ?>
					

					
					<div class="overlay"></div>
				</a>
			<?php else: ?>
				<a class="featured-image" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array($width, $height), array('class' => 'size-auto')); ?></a>
				
			<?php endif; ?>
			
				<div class="post-type"><span class="<?php echo get_post_format()?>"> </span></div>
		<?php else: ?>
			<a class="featured-image" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
				<img src="<?php echo catch_that_image(get_the_content()); ?>" alt="" />
			</a>
		<?php endif; ?>
	<?php endif; ?>
	
	
	
	

		<?php if($warp["config"]->get("blog_view_meta", 1)) : ?>
		<header>
			<p class="meta">
				<?php 
					$date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
					printf(__('<span><i class="icon-user"></i> %s </span> <span><i class="icon-calendar"></i> %s</span>', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
				?>		
				<span><i class="icon-eye-open"></i>	<?php echo getPostViews(get_the_ID()); ?></span>		
			</p>
			</header>
		<?php endif; ?>
	
	




<?php if($warp["config"]->get("strip-html", 1)) : ?>

	<div class="content clearfix post-text">
	
		<?php ob_start();
		echo get_the_excerpt();
		$old_content = ob_get_clean();
		$new_content = strip_tags($old_content);
	 	echo $new_content;
	 	$post_categories = wp_get_post_categories(get_the_ID());
	 	$cat = array();
		if($post_categories) {
			$term = get_category($post_categories[0]);
			$cat = array(
				'name' => $term->name,
				'link' => get_category_link($post_categories[0])
			);
		}
		?>


	</div>
	
	<?php else: ?>
	
	
	<div class="content clearfix post-text">
		<?php the_excerpt(''); ?>
	</div>
	
		<?php endif; ?>
	
	
<?php if($warp["config"]->get("item-links", 1)) : ?>
<div class="item-footer">
<p class="links">
	<?php if($cat): ?>
		<span class="item-footer-cat">
			<i class="icon-folder-open-alt"></i>
			<a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['name'] ?>">
				<?php echo $cat['name'] ?>
			</a>
		</span>
	<?php endif; ?>
	<span class="more"><i class="icon-double-angle-down"></i><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a></span>
	</p>
</div>

<?php endif; ?>





</article>
   <!-- This is Grid Layout End -->
   
   <?php else: ?>
					
			
	<!-- This is List Layout Begin -->		

	<div class="list-layout">		
	<article id="item-<?php the_ID(); ?>" class="item" data-permalink="<?php the_permalink(); ?>" >
	
	
	
	

	<?php if($warp["config"]->get("blog_view_featured_image", 1)) : ?>
		<?php if (has_post_thumbnail()) : ?>
			<?php
			$width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
			$height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
			?>
			<?php if($warp["config"]->get("featured_spotlight", 1)) : ?>
				<a class="featured-image" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'mazaya-thumb', array('class' => 'size-auto')); ?>	
					<div class="post-type"><span class="<?php echo get_post_format()?>"> </span></div>		
				</a>
				
				

			<?php else: ?>
			
				<a class="featured-image" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'mazaya-thumb' ); ?></a>
			<?php endif; ?>
								

		<?php endif; ?>
	<?php endif; ?>
	
	<header>
		<h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		
		<?php if($warp["config"]->get("blog_view_meta", 1)) : ?>
			<p class="meta">
				<?php 
					$date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
					printf(__('<span><i class="icon-user"></i> %s </span> <span><i class="icon-calendar"></i> %s</span>', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
				?>
				<span><i class="icon-eye-open"></i>	<?php echo getPostViews(get_the_ID()); ?></span>

			</p>
		<?php endif; ?>
	</header>
	
	<?php if($warp["config"]->get("strip-html", 1)) : ?>
	
	<div class="content clearfix post-text">

		 <?php echo string_limit_words(get_the_excerpt(), 20); ?>

		<?php else: ?>
	
	
	<div class="content clearfix post-text">
		<?php the_content(''); ?>

	
		<?php endif; ?>
		
		        		<span class="more"><i class="icon-double-angle-down"></i><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a></span>

		
		
		
		
	

	</div>



</article>
</div>	



<!-- This is List Layout End -->
<?php endif; ?>
</div>