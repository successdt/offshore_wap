<?php get_header(); ?>
	<div class="entry">
		<div id="container">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<div class="post-wrapper">
				<?php while (have_posts()) : the_post(); ?>
					
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="imgpost">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo get_first_image(); ?>" alt="<?php the_title(); ?>" width="56" height="56"/>
							</a>
						</div>
						<div class="title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<h2><?php the_title(); ?></h2>
							</a>
						</div>
						<div class="description">
							<?php echo getTheDescription();?>
						</div>                    
                        <div class="date" style="display: inline;">
                            <?php // the_time('j M Y') ?>
                            <?php if(getDownloadLink()) : ?>
								<a href="<?php echo getDownloadLink() ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Download miễn phí
								</a>                            	
                            <?php endif ?>
                        </div>
					</div>
				<?php endwhile; ?>
				<div class="navigation post">
					<span class="goright"><?php next_posts_link('Xem thêm &raquo;') ?></span>
					<span class="goleft"><?php previous_posts_link('&laquo; Trang trước') ?></span>
					<div class="clear"></div>
				</div>
			</div>        
		<?php else : ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php _e('Không tìm thấy bài viết nào!'); ?></h2>
			</div>
		<?php endif; ?>
		</div>
	</div><!--entry-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>