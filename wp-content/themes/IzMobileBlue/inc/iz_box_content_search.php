<?php 
class Iz_Box_Content_Search extends WP_Widget
{
    function Iz_Box_Content_Search(){
			parent::WP_Widget('Iz_Box_Content_Search', 
					'Iz Box Content Search', 
            array('description' => 'Hiển thị khung tìm kiếm.'));
    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		//$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent From ' : $instance['title']);
		$title = empty($instance['title']) ? 'Tìm kiếm' : $instance['title'];
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
					<div class="iz-search">
						<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
							<input class="iz-search-input" type="text" id="s" name="s" value="" placeholder="Tìm kiếm tại đây"/>
							<input type="submit" value="" class="iz-search-submit"/>
							<div class="clear"></div>
						</form>
					</div>
	</div>
<?php
		echo $after_widget;
    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		return $instance;
    }
 
  //Creates the form for the widget in the back-end. 
    function form($instance){
		//Defaults
    $instance = wp_parse_args( (array) $instance, array('title'=>'Tiêu đề Categories', 'content'=>'') );
 
    $title = esc_attr($instance['title']);

    # Title
    echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
} // end bcdonline_fromcategorieswidget class
}
function Iz_Box_Content_SearchInit() {
  register_widget('Iz_Box_Content_Search');
}
add_action('widgets_init', 'Iz_Box_Content_SearchInit');
?>