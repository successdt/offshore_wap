<?php get_header(); ?>
<div class="iz-box">
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url">
					
					<h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Thể Loại <?php single_cat_title(); ?></h2>
				</a>
			</span>
		</div>		
	<?php /* If this is a tag archive */ } elseif(is_tag()) { ?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url"><h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Tương Thích <?php single_tag_title(); ?></h2></a>
			</span>
		</div>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url"><h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Ngày <?php the_time('d/m/Y'); ?></h2></a>
			</span>
		</div>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url"><h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Tháng <?php the_time('m/Y'); ?></h2></a>
			</span>
		</div>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url"><h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Năm <?php the_time('Y'); ?></h2></a>
			</span>
		</div>
	<?php /* If this is an author archive */ } elseif (is_author()) {?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url"><h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Của <?php the_author(); ?></h2></a>
			</span>
		</div>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<div class="iz-title" xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="<?php echo get_category_link( get_cat_ID( single_cat_title( '', false )) );?>" property="v:title" rel="v:url"><h2><img src="<?=get_template_directory_uri().'/images/default.png';?>"/>Lưu Trữ</h2></a>
			</span>
		</div>
	<?php } ?>
	<div class="iz-content">
	<?php 
		//$current_tag = ""; 
		$tags_id="";
		$strSQL = 'cat='.get_cat_ID( single_cat_title( '', false )) . '&paged=' . $paged . '&showposts='. $posts_per_page;
		if(is_tag()){
			$tags_id = get_query_var('tag_id');
			//$current_tag = single_tag_title("", false); 
			$strSQL .='&tag_id='.$tags_id;
			
		}
		$my_query = new WP_Query($strSQL);
		while ($my_query->have_posts()): 
		$my_query->the_post();
		$do_not_duplicate = $post->ID;
		?>
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($the_post->ID) ); ?>
					<div class="iz-label">
						<a class="iz-label-img"href="<?php the_permalink() ?>" title ="<?php echo strip_shortcodes($post->post_title); ?>">
							<?php if (has_post_thumbnail()) : ?> 
								<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $feat_image; ?>&amp;w=32&amp;h=32&amp;q=100" alt="<?php  echo strip_shortcodes($post->post_title); ?> " />
							<?php else : ?>
								<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_url'); ?>/images/no-image.jpg&amp;w=32&amp;h=32&amp;q=100" alt="<?php  echo strip_shortcodes($post->post_title); ?> "/>
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
											//echo trim($output, $separator);
											}
											?>
										<em class="iz-download-a"> »</em><?php echo trim($output, $separator); //the_category(' | '); ?>
										<span class="iz-download-views"><em class="iz-download-spes"> | </em><?php if(function_exists('the_views')) { the_views(); } ?></span>
									</div>
									<?php endif;?>
		<div class="clear"></div>
	</div>
<?php
	endwhile;
echo '<div class="page_nav">';
	if (function_exists('wp_pagenavi')) wp_pagenavi();
echo '</div>';
endif;
?>
</div>
</div>
<?php get_footer(); ?>
