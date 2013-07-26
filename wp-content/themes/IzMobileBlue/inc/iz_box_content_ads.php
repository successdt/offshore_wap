<?php 
class Iz_Box_Content_Ads extends WP_Widget
{
    function Iz_Box_Content_Ads(){
			parent::WP_Widget('Iz_Box_Content_Ads', 
					'Iz Box Content Ads', 
            array('description' => 'Hiển thị quảng cáo.'));
    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent From ' : $instance['title']);
		$content = empty($instance['content']) ? '' : $instance['content'];

		echo $before_widget;
		if(file_exists(get_template_directory_uri().'/images/'.get_cat_slug($blog_category).'.png'))
			$file_img=get_template_directory_uri().'/images/'.get_cat_slug($blog_category).'.png';
		else
			$file_img=get_template_directory_uri().'/images/default.png';
		if ( $title )
			echo $before_title .'<img src="'.$file_img.'" alt="'.get_bloginfo("name").'"/>'. $title . $after_title;
	?>
		<div class="iz-content">
			<?php echo $content; ?>
		</div>
	<?php
		echo $after_widget;
    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		return $instance;
    }
 
  //Creates the form for the widget in the back-end. 
    function form($instance){
		//Defaults
    $instance = wp_parse_args( (array) $instance, array('title'=>'Tiêu đề Categories', 'content'=>'') );
 
    $title = esc_attr($instance['title']);
    $content = $instance['content'];

    # Title
    echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
    # Number Of Posts
    echo '<p><label for="' . $this->get_field_id('content') . '">' . 'Nội dung hiển thị:' . '</label><textarea class="widefat" id="content" name="' . $this->get_field_name('content') . '" rows="16" cols="20">' . $content . '</textarea></p>';
} // end bcdonline_fromcategorieswidget class
}
function Iz_Box_Content_AdsInit() {
  register_widget('Iz_Box_Content_Ads');
}
add_action('widgets_init', 'Iz_Box_Content_AdsInit');
?>