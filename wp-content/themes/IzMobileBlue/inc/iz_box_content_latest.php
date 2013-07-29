<?php 
class Iz_Box_Content_Latest extends WP_Widget
{
    function Iz_Box_Content_Latest(){
			parent::WP_Widget('Iz_Box_Content_Latest', 
					'Iz Box Content Latest', 
            array('description' => 'Hiển thị bài viết mới nhất.'));
    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = empty($instance['title']) ? '1Bài viết mới nhất' : $instance['title'];
		//$title = apply_filters('widget_title', empty($instance['title']) ? '1Bài viết mới nhất' : $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '' : (int) $instance['posts_number'];
	 
		echo $before_widget;
		$file_img_list=get_template_directory_uri().'/images/default-list.png';
		$file_img=get_template_directory_uri().'/images/default.png';
		if ( $title )
			echo $before_title .'<img src="'.$file_img.'" alt="'.get_bloginfo("name").'"/>'. $title . $after_title;
		$args1 = array( 'numberposts' => $posts_number,
						'post_status' => 'publish, future');
		$recent_posts = wp_get_recent_posts( $args1 );
		echo "<div class='iz-content'>";
		foreach( $recent_posts as $recent ){
		?>
		<div class="iz-label">
					<h3 class="iz-label-title-h2">
						<img src="<?php echo $file_img_list;?>" alt="<?php echo strip_shortcodes(the_title()); ?>"/>
						<a title="<?php echo strip_shortcodes($recent["post_title"]); ?>" href="<?=get_permalink($recent["ID"]);?>"><?php echo strip_shortcodes($recent["post_title"]); ?></a>
					</h3>
				<div class="clear"></div>
		</div>
		<?php
		}
		echo "</div>";
		echo $after_widget;
    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['posts_number'] = (int) $new_instance['posts_number'];
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
 
function Iz_Box_ContentLatestInit() {
  register_widget('Iz_Box_Content_Latest');
}
add_action('widgets_init', 'Iz_Box_ContentLatestInit');
?>