<?php 
class Iz_Box_Content_Game extends WP_Widget
{
    function Iz_Box_Content_Game(){
			parent::WP_Widget('Iz_Box_Content_Game', 
					'Iz Box Content Top Game', 
            array('description' => 'Hiển thị số bài có lượt view cao nhất.'));
    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent From ' : $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '' : (int) $instance['posts_number'];
	 
		echo $before_widget;
		$file_img_list=get_template_directory_uri().'/images/default-list.png';
		$file_img=get_template_directory_uri().'/images/default.png';
		if ( $title )
			echo $before_title .'<img src="'.$file_img.'" alt="'.get_bloginfo("name").'"/>'. $title . $after_title;
			?>
			<div class="iz-content">
			<?php
				if(have_posts()):
					$game_page = max( 1, $_GET['game-page']);
					$args1 = array(
							'posts_per_page' => 7,
							'paged' => $game_page,
							'orderby' =>'meta_value_num',
							'meta_key' => 'views',
							'order' => 'DESC',
							'meta_query' => array(
								'relation' =>'AND',
								array(
								'key' => 'top-game-hot',
								'value' => 'on',
								'compare' => '='
								)
							)
					);
					$my_query = new WP_Query($args1);
					while ($my_query->have_posts()): 
						$my_query->the_post();
						$do_not_duplicate = $post->ID;
				?>
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
								preg_match ('/'.$regex_pattern.'/s', get_the_content(), $regex_matches);
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
										<a class="iz-download-link" title="Bấm vào để tải về máy" href="<?=add_query_arg( 'post_id',get_the_ID(), $url );?>">
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
					wp_reset_query();
					echo '<div class ="page_nav">';
						paging('game',$my_query);
					echo '</div>';
				endif;
				?>
			</div>
			<?php
		echo $after_widget;
    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['posts_number'] = (int) $new_instance['posts_number'];
		$instance['blog_category'] = (int) $new_instance['blog_category'];
		return $instance;
    }
 
  //Creates the form for the widget in the back-end. 
    function form($instance){
		//Defaults
    $instance = wp_parse_args( (array) $instance, array('title'=>'Tiêu đề Categories', 'posts_number'=>'5', 'blog_category'=>'') );
 
    $title = esc_attr($instance['title']);
    $posts_number = (int) $instance['posts_number'];
 
    # Title
    echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
    # Number Of Posts
    echo '<p><label for="' . $this->get_field_id('posts_number') . '">' . 'Số lượng hiển thị:' . '</label><input class="widefat" id="' . $this->get_field_id('posts_number') . '" name="' . $this->get_field_name('posts_number') . '" type="text" value="' . $posts_number . '" /></p>';
    # Category ?>
    <?php
    }
 
} // end bcdonline_fromcategorieswidget class
 
function Iz_Box_Content_GameInit() {
  register_widget('Iz_Box_Content_Game');
}
add_action('widgets_init', 'Iz_Box_Content_GameInit');
?>