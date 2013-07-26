<?php get_header(); ?>
	<div class="iz-box">
		<div class="iz-title">
			<h1>Kết Quả Cho "<?php echo get_search_query(); ?>"</h1>
		</div>
	<div class="iz-content">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
					<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($the_post->ID) ); ?>
					<div class="iz-label">
						<a class="iz-label-img"href="<?php the_permalink() ?>" title ="<?php echo strip_shortcodes(the_title()); ?>">
							<?php if (has_post_thumbnail()) : ?> 
								<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $feat_image; ?>&amp;w=32&amp;h=32&amp;q=100" alt="<?php  echo strip_shortcodes(the_title()); ?> " />
							<?php else : ?>
								<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_url'); ?>/images/no-image.jpg&amp;w=32&amp;h=32&amp;q=100" alt="<?php  echo strip_shortcodes(the_title()); ?> "/>
							<?php endif; ?>
						</a>
						<h3 class="iz-label-title">
							<a title="<?=esc_attr(the_title());?>" href="<?php the_permalink() ?>"><?=the_title(); ?></a>
						</h3>
						<?php 
								$downloadID =0;
								$categoryID = 1;
								$regex_pattern = get_shortcode_regex();
								preg_match ('/'.$regex_pattern.'/s', $post->post_content, $regex_matches);
								if ($regex_matches[2] == 'download') :
									//  Found a download file find out what ID
									//  Turn the attributes into a URL parm string
									$attribureStr = str_replace (" ", "&", trim ($regex_matches[3]));
									$attribureStr = str_replace ('"', '', $attribureStr);
									//  Parse the attributes
									$defaults = array (
										'category' => '1',
									);
									$attributes = wp_parse_args ($attribureStr, $defaults);
									if (isset ($attributes["id"])) :
										$downloadID = $attributes["id"];
									endif;
									if (isset($attributes["category"])) :
										$categoryID = $attributes["category"];
									endif;
								endif;
								if($downloadID !=0):
										$url = site_url(). '/download/';
									?>
									<div class="iz-download">
										<a class="iz-download-link" title="Bấm vào để tải về máy" href="<?=add_query_arg( 'post_id', $post->ID, $url );?>">
										<img alt="Bấm vào để tải về máy" src="<?=get_template_directory_uri().'/images/download.png'?>"/>
										Tải về máy </a>
										<em class="iz-download-spes">|</em>
										<span class="iz-download-views"><?php if(function_exists('the_views')) { the_views(); } ?></span>
									</div>
									<?php else:?>
										<div class="iz-download">
										<?php
											$categories = get_the_category();
											$separator = ' | ';
											$output = '';
											if($categories){
												foreach($categories as $category) {
												if( strip_shortcodes($category->name ) !='Featured'){
													$output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), strip_shortcodes($category->name )) ) . '">'.strip_shortcodes($category->cat_name).'</a>'.$separator;
												}
												}
			
											}
											?>
										<em class="iz-download-a"> »</em><?php echo trim($output, $separator); //the_category(' | '); ?>
										<span class="iz-download-views"><em class="iz-download-spes"> | </em><?php if(function_exists('the_views')) { the_views(); } ?></span>
									</div>
									<?php endif;?>
						<div class="clear"></div>
					</div>
		<?php endwhile; ?>
		<div class="navigation">
			<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); ?>
		</div>
	<?php else : ?>
		<h1>Không tìm thấy</h1>
		<div class="entry">
			Không tìm thấy game nào phù hợp. Hãy thử lại với từ khóa khác...
		</div
	<?php endif; ?>
	</div>
<?php get_footer(); ?>