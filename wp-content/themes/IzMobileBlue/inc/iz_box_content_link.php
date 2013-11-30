<?php 
class Iz_Box_Content_Link extends WP_Widget
{
    function Iz_Box_Content_Link(){
			parent::WP_Widget('Iz_Box_Content_Link', 
					'Iz Box Content Link', 
            array('description' => 'Hiển thị liên kết.'));
    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent From ' : $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '' : (int) $instance['posts_number'];
		$blog_category = empty($instance['blog_category']) ? '' : (int) $instance['blog_category'];

		echo $before_widget;
		if(file_exists(get_template_directory_uri().'/images/'.get_cat_slug($blog_category).'.png'))
			$file_img=get_template_directory_uri().'/images/'.get_cat_slug($blog_category).'.png';
		else
			$file_img=get_template_directory_uri().'/images/default.png';
		if ( $title )
			echo $before_title .'<img src="'.$file_img.'" alt="'.get_bloginfo("name").'"/>'. $title . $after_title;
			echo '<div class="iz-content">';
		?>
			<?
			$bookmarks = get_links(-1,"|","","","",FALSE,FALSE);
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
    $blog_category = (int) $instance['blog_category'];
 
    # Title
    echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
    # Number Of Posts
    echo '<p><label for="' . $this->get_field_id('posts_number') . '">' . 'Số lượng hiển thị:' . '</label><input class="widefat" id="' . $this->get_field_id('posts_number') . '" name="' . $this->get_field_name('posts_number') . '" type="text" value="' . $posts_number . '" /></p>';
    # Category ?>
    <?php 
			$args = array(
				'echo'               => 0,
				'hierarchical'       => 1, 
				'taxonomy'           => 'category',
			);
		$cats_array = get_categories($args);
    ?>
    <p>
        <label for="<?php echo $this->get_field_id('blog_category'); ?>">Category</label>
        <select name="<?php echo $this->get_field_name('blog_category'); ?>" id="<?php echo $this->get_field_id('blog_category'); ?>" class="widefat">
            <?php foreach( $cats_array as $category ) { ?>
                <option value="<?php echo $category->cat_ID; ?>"<?php selected( $instance['blog_category'], $category->cat_ID ); ?>><?php echo $category->cat_name; ?></option>
            <?php } ?>
        </select>
    </p> 
    <?php
    }
 
} // end bcdonline_fromcategorieswidget class
 
function Iz_Box_Content_LinkInit() {
  register_widget('Iz_Box_Content_Link');
}
add_action('widgets_init', 'Iz_Box_Content_LinkInit');
?>