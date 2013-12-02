<?php get_header(); ?>
	<div class="entry"> 
		<div id="container">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="title">
					<h1><?php echo get_the_title() ?></h1> 
					<div class="date">
						Đăng lúc <?php the_time('j M Y') ?>
					</div>
						<div class="content">
							<br/>
							<?php
							$downloadLink = get_post_meta(get_the_ID(), 'download_link');
							if(getDownloadLink()): ?>
							<div align="center">
								<div class="download">
									<a href="<?php echo getDownloadLink() ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Download miễn phí
									</a>								
								</div>							
							</div>
							<?php elseif($downloadLink): ?>
								<div align="center">
									<div class="download">
										<a href="<?php echo $downloadLink[0] ?>">
											<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
											Download miễn phí
										</a>								
									</div>							
								</div>							
							<?php endif ?>
							<?php the_content(); ?>
							
							<?php
							$downloadLink = get_post_meta(get_the_ID(), 'download_link');
							if(getDownloadLink()): ?>
							<div align="center">
								<div class="download">
									<a href="<?php echo getDownloadLink() ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Download miễn phí
									</a>								
								</div>							
							</div>
							<?php elseif($downloadLink): ?>
								<div align="center">
									<div class="download">
										<a href="<?php echo $downloadLink[0] ?>">
											<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
											Download miễn phí
										</a>								
									</div>							
								</div>							
							<?php endif ?>

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