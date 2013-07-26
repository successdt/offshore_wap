<?php get_header(); ?>
	<div class="entry"> 
		<div id="container">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="title">
					<div class="date">
						Đăng lúc <?php the_time('j M Y') ?>
					</div>
						<div class="content">
							<br/>
							<div align="center">
								<div class="download">
									<a href="<?php echo getDownloadLink() ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Tải miễn phí
									</a>								
								</div>							
							</div>

							<?php the_content(); ?>
							
							<div align="center">
								<div class="download">
									<a href="<?php echo getDownloadLink() ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Tải miễn phí
									</a>								
								</div>							
							</div>

						</div>
					</div>
					<br clear="all" />
					<?php comments_template(); ?>
				</div>                    
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div><!--entry-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>        