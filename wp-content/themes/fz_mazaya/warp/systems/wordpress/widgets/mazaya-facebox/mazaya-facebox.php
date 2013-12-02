<?php

add_action( 'widgets_init', 'Facebook_widget_box' );
function Facebook_widget_box() {
	register_widget( 'facebook_widget' );
}
class facebook_widget extends WP_Widget {

	function facebook_widget() {
		$widget_ops = array('classname' => 'facebook-widget','description' => __('Like Box enables users to like your Facebook Page'));
		$this->WP_Widget('Mazaya_facbook',__('Mazaya - Facebook Like Box','warp'),$widget_ops);
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];

		echo $before_widget;
		if ( $title )
			echo $before_title;
			echo $title ; ?>
		<?php echo $after_title; ?>
			<div class="facebook-box">	
				<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $page_url ?>&amp;width=292&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false&amp;appId=190873334317131" style="border:none; overflow:hidden; width:292px; height:258px;"></iframe>
				
			</div>
	<?php 
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__( 'Find us on Facebook' , 'warp') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>">Page Url : </label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" class="widefat" type="text" />
		</p>


	<?php
	}
}
?>