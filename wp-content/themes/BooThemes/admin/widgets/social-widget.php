<?php
/**
 * Plugin Name: Social widget
 */

add_action( 'widgets_init', 'fp_social_load_widgets' );

function fp_social_load_widgets() {
	register_widget( 'fp_social_widget' );
}

class fp_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function fp_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'fp_social_widget', 'description' => __('A social media widget and about the site', 'fp_social_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'fp_social_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'fp_social_widget', __('boothemes: Social Media widget', 'fp_social_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$text = $instance['text'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$rss = $instance['rss'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		
				<?php echo $text; ?>
				
				<?php if($facebook) { ?><span class="social face"><a href="http://www.facebook.com/<?php echo get_option('fp_facebook'); ?>">Facebook</a></span><?php } ?>
				<?php if($twitter) { ?><span class="social twitter"><a href="http://www.twitter.com/<?php echo get_option('fp_twitter'); ?>">Twitter</a></span><?php } ?>
				<?php if (get_option('fp_feedburner')) { ?><span class="social rss"><a href="http://feeds.feedburner.com/<?php echo get_option('fp_feedburner'); ?>">RSS</a></span><?php } else { ?>
				<span class="social rss"><a href="<?php bloginfo( 'rss2_url' ); ?>">RSS</a></span>
				<?php } ?>
				
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
		$instance['text'] = $new_instance['text'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['rss'] = $new_instance['rss'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Subscribe & Follow', 'boothemes'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- About text -->
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>">About text:</label>
			<textarea id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" style="width:96%;" rows="6"><?php echo $instance['text']; ?></textarea>
			<small>Note: Wrap your text in &lt;p&gt;&lt;/p&gt; tags</small>
		</p>
		
		<!-- include twitter -->
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Include Twitter icon:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		
		<!-- include facebook -->
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Include Facebook icon:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		
		<!-- include rss -->
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Include RSS icon:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>


	<?php
	}
}

?>