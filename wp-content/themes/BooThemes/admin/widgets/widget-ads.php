<?php
/**
 * Plugin Name: Ads
 */

add_action( 'widgets_init', 'fp_ads_load_widgets' );

function fp_ads_load_widgets() {
	register_widget( 'fp_ads_widget' );
}

class fp_ads_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function fp_ads_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'fp_ads_widget', 'description' => __('A widget for 125x125 ads', 'fp_ads_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'fp_ads_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'fp_ads_widget', __('boothemes: 125x125 ads', 'fp_ads_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$ad1 = $instance['ad1'];
		$ad2 = $instance['ad2'];
		$ad3 = $instance['ad3'];
		$ad4 = $instance['ad4'];
		$ad5 = $instance['ad5'];
		$ad6 = $instance['ad6'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		
			<ul class="banners">
				<?php if($ad1) { ?><li><?php echo $ad1; ?></li><?php } ?>
				<?php if($ad2) { ?><li class="last"><?php echo $ad2; ?></li><?php } ?>
				<?php if($ad3) { ?><li><?php echo $ad3; ?></li><?php } ?>
				<?php if($ad4) { ?><li class="last"><?php echo $ad4; ?></li><?php } ?>
				<?php if($ad5) { ?><li><?php echo $ad5; ?></li><?php } ?>
				<?php if($ad6) { ?><li class="last"><?php echo $ad6; ?></li><?php } ?>
			</ul>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ad1'] = $new_instance['ad1'];
		$instance['ad2'] = $new_instance['ad2'];
		$instance['ad3'] = $new_instance['ad3'];
		$instance['ad4'] = $new_instance['ad4'];
		$instance['ad5'] = $new_instance['ad5'];
		$instance['ad6'] = $new_instance['ad6'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Ads', 'boothemes'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
		
		<p><small>With this widget you can have up to six 125x125 ads</small></p>
		
		<!-- ad1 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad1' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'ad1' ); ?>" name="<?php echo $this->get_field_name( 'ad1' ); ?>" style="width:95%;"/><?php echo $instance['ad1']; ?></textarea>
		</p>
		
		<!-- ad2 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad2' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'ad2' ); ?>" name="<?php echo $this->get_field_name( 'ad2' ); ?>" style="width:95%;"/><?php echo $instance['ad2']; ?></textarea>
		</p>
		
		<!-- ad3 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad3' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'ad3' ); ?>" name="<?php echo $this->get_field_name( 'ad3' ); ?>" style="width:95%;"/><?php echo $instance['ad3']; ?></textarea>
		</p>
		
		<!-- ad4 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad4' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'ad4' ); ?>" name="<?php echo $this->get_field_name( 'ad4' ); ?>" style="width:95%;"/><?php echo $instance['ad4']; ?></textarea>
		</p>
		
		<!-- ad5 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad5' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'a5' ); ?>" name="<?php echo $this->get_field_name( 'ad5' ); ?>" style="width:95%;"/><?php echo $instance['ad5']; ?></textarea>
		</p>
		
		<!-- ad6 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad6' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'ad6' ); ?>" name="<?php echo $this->get_field_name( 'ad6' ); ?>" style="width:95%;"/><?php echo $instance['ad6']; ?></textarea>
		</p>
		


	<?php
	}
}

?>