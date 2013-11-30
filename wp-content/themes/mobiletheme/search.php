<?php get_header(); ?>
	<?php if (have_posts()) : ?>
	<h2 class="search">Kết quả tìm kiếm cho: "<strong><?php echo $_GET['s']; ?></strong>"</h2>
	<?php else : ?>
	<h2 class="search">Không có kết quả tìm kiếm nào cho: "<strong><?php echo $_GET['s']; ?></strong>"</h2>
	<?php endif; ?>
	<div class="entry"> 
		<div id="container">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="imgpost">
					<img src="<?php echo get_first_image(); ?>" alt="<?php the_title(); ?>" width="56" height="56"/>
				</div>
				 <div class="title">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>   
				<div class="date">
					Đăng lúc: <?php the_time('j M Y') ?>
				</div>     
				<br clear="all" />
			</div>                    
 			<?php endwhile; ?>
			<div class="navigation">
				<span class="goright"><?php next_posts_link('Xem thêm &raquo;') ?></span>
				<span class="goleft"><?php previous_posts_link('&laquo; Trang trước') ?></span>
				<div class="clear">
			</div>
			</div>
			<?php endif; ?>
		</div>
	</div> <!--entry-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>        