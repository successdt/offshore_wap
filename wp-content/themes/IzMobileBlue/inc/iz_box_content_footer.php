<?php 
class Iz_Box_Content_Footer extends WP_Widget
{
    function Iz_Box_Content_Footer(){
			parent::WP_Widget('Iz_Box_Content_Footer', 
					'Iz Box Content Footer', 
            array('description' => 'Hiển thị quảng cáo.'));
    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$content = empty($instance['content']) ? '' : $instance['content'];

		echo $before_widget;
	?>
		<div class="iz-content">
			<div class="iz-footer">
				<div class="bloginfo">
				<?php echo $content; ?>
				</div>
			</div>
		</div>
	<?php
		echo $after_widget;
    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['content'] = $new_instance['content'];
		return $instance;
    }
 
  //Creates the form for the widget in the back-end. 
    function form($instance){
		//Defaults
    $instance = wp_parse_args( (array) $instance, array( 'content'=>'') );
 
    $content = $instance['content'];

    # Number Of Posts
    echo '<p><label for="' . $this->get_field_id('content') . '">' . 'Nội dung hiển thị:' . '</label><textarea class="widefat" id="content" name="' . $this->get_field_name('content') . '" rows="16" cols="20">' . $content . '</textarea></p>';
} // end bcdonline_fromcategorieswidget class
}
function Iz_Box_Content_FooterInit() {
  register_widget('Iz_Box_Content_Footer');
}
add_action('widgets_init', 'Iz_Box_Content_FooterInit');
?>