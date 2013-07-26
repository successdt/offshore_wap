<?php

	/* Template Name: Full Width Page */

?>
<?php get_header(); ?>

		
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post full">
			
				<h2 class="post-title"><?php the_title(); ?></h2>
				
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('big-thumb', array('class' => 'post-img')); ?></a>
				<?php } ?>
				
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			
			</div>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>