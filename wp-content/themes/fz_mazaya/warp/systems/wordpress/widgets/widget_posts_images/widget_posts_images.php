<?php 
global $post;
add_action('widgets_init','widget_posts_images');

function widget_posts_images() {
	register_widget('widget_posts_images');
	
	}
class widget_posts_images extends WP_Widget {
	function widget_posts_images() {
			
		$widget_ops = array('classname' => 'posts_images','description' => __('Widget display Posts order by : Recent, Popular, Random','warp'));
		$this->WP_Widget('Mazaya-Posts-Images',__('Mazaya - Posts in images','warp'),$widget_ops);
		}
		
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$orderby = $instance['orderby'];
		$count = $instance['count'];
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
?>

	<?php if($orderby == 'Popular') { ?>
    
	<div class="posts_images clearfix">
	<?php query_posts(array('showposts' => $count, "orderby" => "comment_count")); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <div class="widgetPostImage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php // the_post_thumbnail( 'posts-image-thumb' ); ?>
		<img src="<?php echo catch_that_image(get_the_content()) ?>" />
                                      
	    </a></div>
			<?php endwhile; ?>
			<?php  else:  ?>
			<!-- Else in here -->
			<?php  endif; ?>
			<?php wp_reset_query(); ?>
	</div>
<?php } elseif($orderby == 'Random') { ?>
	<div class="posts_images clearfix">
	<?php query_posts(array('showposts' => $count, "orderby" => "rand")); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	     <div class="widgetPostImage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail( 'posts-image-thumb' ); ?>
			    </a></div>

			<?php endwhile; ?>
			<?php  else:  ?>
			<!-- Else in here -->
			<?php  endif; ?>
			<?php wp_reset_query(); ?>
	</div>
		
<?php } elseif($orderby == 'Recent') { ?>
	<div class="posts_images clearfix">
	<?php query_posts(array( 'showposts' => $count )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <div class="widgetPostImage">
        
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
       <?php the_post_thumbnail( 'posts-image-thumb' ); ?>
        </a>
        </div>

			<?php endwhile; ?>
			<?php  else:  ?>
			<!-- Else in here -->
			<?php  endif; ?>
			<?php wp_reset_query(); ?>
	</div>
	
<?php } ?>
<?php 

		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = $new_instance['count'];
		$instance['orderby'] = $new_instance['orderby'];

		return $instance;
	}
	
function form( $instance ) {
		$defaults = array( 'title' => __('Recent Posts','warp'), 
			'count' => 6,
			'orderby' => 'Recent',
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','warp'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e('orderby', 'warp') ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat">
		<option <?php if ( 'Popular' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Popular</option>
		<option <?php if ( 'Random' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Random</option>
		<option <?php if ( 'Recent' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Recent</option>
		</select>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number Of Posts:','warp'); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" class="widefat" />
		</p>

   <?php 
}
	} //end class