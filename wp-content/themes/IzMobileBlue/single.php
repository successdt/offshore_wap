<?php get_header(); ?>
	<div class="iz-box">
		<div class="iz-title">
			<h1>
				<?php seobreadcrumbs(); ?>
			</h1>
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="iz-content-meta"> Đăng ngày: <?php the_time('d/m/Y'); ?> bởi <b><?php the_author(); ?></b></div>
		<div class="iz-content" itemtype="http://schema.org/BlogPosting" itemscope="itemscope">
			<h2 itemprop="name" class="iz-post-title">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h2>
			<div class="iz-content-body" itemprop="articleBody">
					<?php if (function_exists('wp_pagenavi')) wp_pagenavi( array( 'type' => 'multipart' ) ); ?>
					<div class="messageContent">
						<?php the_content();?>
					</div>
					<?php if (function_exists('wp_pagenavi')) wp_pagenavi( array( 'type' => 'multipart' ) ); ?>
				<div><?php edit_post_link('>> Edit This Post <<', '<p>', '</p>'); ?></div>
				<div class="tags">
					Tags:<?php the_tags('', ', ', ''); ?>
				</div>
			</div>
		</div>
		<?php endwhile;endif;?>
	</div>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-single') ) : ?>
	<?php endif; ?>
<?php get_footer(); ?>