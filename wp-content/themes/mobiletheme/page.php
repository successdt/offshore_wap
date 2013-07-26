<?php get_header(); ?>
	<div class="entry"> 
		<div id="container">
			<?php if(have_posts()) : ?>
				<div class="post-wrapper">
					<?php while(have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
							<div class="content"><?php the_content(); ?></div>
						</div>    
						<br clear="all" />
					</div>                    
					<?php endwhile; ?>
					<div class="navigation">
						<?php posts_nav_link(' &#124; ','&#171; previous','next &#187;'); ?>
					</div>
				</div>  
			<?php else : ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><?php _e('No posts are added.'); ?></h2>
				</div>
			<?php endif; ?>
		</div>
	</div> <!--entry-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>