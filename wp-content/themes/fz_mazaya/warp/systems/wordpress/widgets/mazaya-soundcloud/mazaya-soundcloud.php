<?php
add_action( 'widgets_init', 'mazaya_soundcloud_widget' );
function mazaya_soundcloud_widget() {
	register_widget( 'mazaya_soundcloud' );
}
class mazaya_soundcloud extends WP_Widget {

	function mazaya_soundcloud() {	
		$widget_ops = array('classname' => 'mazayae-soundcloud','description' => __('allows you to integrate a player widget from SoundCloud into your WordPress'));
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'mazaya-soundcloud-widget' );
			$this->WP_Widget('mazaya-soundcloud-widget',__('Mazaya - SoundCloud','warp'),$widget_ops);

	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['text_html_title'] );
		$url = $instance['url'];
		$autoplay = $instance['autoplay'];
		
		$play = 'false';
		if( !empty( $autoplay )) $play = 'true';


		
			echo $before_widget;
			echo $before_title;
			echo $title ; 
			echo $after_title;
			echo mazaya_soundcloud( $url , $play );
			echo $after_widget;
				
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['text_html_title'] = strip_tags( $new_instance['text_html_title'] );
		$instance['url'] = $new_instance['url'] ;
		$instance['autoplay'] = strip_tags( $new_instance['autoplay'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'text_html_title' => 'SoundCloud'  );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'text_html_title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'text_html_title' ); ?>" name="<?php echo $this->get_field_name( 'text_html_title' ); ?>" value="<?php echo $instance['text_html_title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">URL :</label>
			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" type="text" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>">Autoplay :</label>
			<input id="<?php echo $this->get_field_id( 'autoplay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay' ); ?>" value="true" <?php if( $instance['autoplay'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>


	<?php
	}
}
?>