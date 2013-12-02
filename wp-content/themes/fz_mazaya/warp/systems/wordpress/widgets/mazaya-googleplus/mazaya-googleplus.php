<?php

add_action( 'widgets_init', 'google_widget_box' );
function google_widget_box() {
	register_widget( 'google_widget' );
}
class google_widget extends WP_Widget {

	function google_widget() {
		$widget_ops = array('classname' => 'google-widget','description' => __('allows you to show the visitors that you have a Google+ account'));
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'google-widget' );
        $this->WP_Widget('Mazaya_googleplus',__('Mazaya - Google Plus','warp'),$widget_ops);
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$gplus_width = $instance['gplus_width'];

		echo $before_widget;
		if ( $title )
			echo $before_title;
			echo $title ; ?>
		<?php echo $after_title; ?>
			<div class="google-box">
				<!-- Google +1 script -->
				<script type="text/javascript">
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				<!-- Link blog to Google+ page -->
				<a style='display: block; height: 0;' href="<?php echo $page_url ?>" rel="publisher">&nbsp;</a>
				<!-- Google +1 Page badge -->
				<g:plus href="<?php echo $page_url ?>" height="131" width="<?php echo $gplus_width ?>" theme="light"></g:plus>

			</div>
	<?php 
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['gplus_width'] = strip_tags( $new_instance['gplus_width'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__( 'Follow us on Google+' , 'warp') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>">Page Url : </label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" class="widefat" type="text" />
		</p>
		
		
		
			<p>
			<label for="<?php echo $this->get_field_id( 'gplus_width' ); ?>">gplus width : </label>
			<input id="<?php echo $this->get_field_id( 'gplus_width' ); ?>" name="<?php echo $this->get_field_name( 'gplus_width' ); ?>" value="<?php echo $instance['gplus_width']; ?>" class="widefat" type="text" />
		</p>


	<?php
	}
}
?>