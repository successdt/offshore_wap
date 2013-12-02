<?php if ( ! defined('ABSPATH')) exit('restricted access'); 

// Class FW_Tweets to fetch latest tweets from twitter ID
class Twitter extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */ 'tweets', /* Name */ 'Twitter', array( 'description' => 'Twitter tweets' ) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		
		extract( $args );
		$title = @apply_filters( 'widget_title', $instance['twitter_title'] );
		echo $before_widget;
		if($title) echo $before_title.$title.$after_title;
		$settings = $GLOBALS['_webnukes']->get_options('sub_api_settings');
		if(kvalue($settings, 'twitter_key') != '' && kvalue($settings, 'twitter_secret') != '' ):
			
			include_once('codebird.php');
			
			Codebird::setConsumerKey(kvalue($settings, 'twitter_key'), kvalue($settings, 'twitter_secret'));
			$cb = Codebird::getInstance();
			$cb->setToken(kvalue($settings, 'twitter_token'), kvalue($settings, 'twitter_token_secret'));
			
			$params = array(
			 'screen_name' => kvalue($instance, 'twitter_id'),
			 'count' => kvalue($instance, 'tweets_num'),
			 'exclude_replies'=>0,
			 'include_rts'=>0,
			 'include_entities'=>0,
			 'trim_user'=>false,
			 'contributor_details'=>false
			);
			$reply = $cb->statuses_userTimeline($params);
			if( $reply ):
				unset($reply->httpstatus);
				echo '<ul>';
				foreach((array)$reply as $rep):?>
                      <li><a href="<?php echo 'http://www.twitter.com/'.$rep->user->screen_name; ?>">@<?php echo $rep->user->screen_name; ?></a><?php echo $rep->text;?></li>
				<?php endforeach?>	
				</ul>
            <?php endif; ?>	
		<?php endif;?>		
		<?php	echo $after_widget;
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['twitter_title'] = strip_tags($new_instance['twitter_title']);
		$instance['twitter_id'] = strip_tags($new_instance['twitter_id']);
		$instance['tweets_num'] = strip_tags($new_instance['tweets_num']);

		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance )
	{
		if ( $instance )
		{
			$twitter_title = esc_attr( $instance[ 'twitter_title' ] );
			$twitter_id = esc_attr($instance['twitter_id']);
			$tweets_num = esc_attr($instance['tweets_num']);

		}
		else
		{
			$twitter_title = _e( 'Latest Tweets', THEME_NAME );
			$twitter_id = 'wordpress';
			$tweets_num = 3;

			$follow_label = '';
		}

	?>    
            <label for="<?php echo $this->get_field_id('twitter_title'); ?>"><?php _e('Title:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_title'); ?>" name="<?php echo $this->get_field_name('twitter_title'); ?>" type="text" value="<?php echo $twitter_title; ?>" />
            <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $twitter_id; ?>" />

            <label for="<?php echo $this->get_field_id('tweets_num'); ?>"><?php _e('Number of Tweets:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('tweets_num'); ?>" name="<?php echo $this->get_field_name('tweets_num'); ?>" type="text" value="<?php echo $tweets_num; ?>" />

		</p>
	<?php 
	}
}

add_action('widgets_init', create_function('', 'register_widget("Twitter");' ) );

class POST_ACCORDION extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */ 'pacord', /* Name */ 'Post Accordion', array( 'description' => 'Display Posts in Accordions' ) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		
		extract( $args );
		echo $before_widget;
		?>
				
          <div id="accordion">
           <?php for($i=1; $i<4; $i++) { ?>  
			 <h5><a href="#"><?php echo $instance['ac_title'.$i]; ?></a></h5>
              <div>
                  <ul>
                 <?php 	
	
				if($instance['order_by'.$i] == 'comment_count') {
					$args = array(
								'posts_per_page'   => $instance['posts_num'.$i],
								'orderby'=> 'comment_count',
								'order'=>'DESC'
								); 
				} else if($instance['order_by'.$i] == 'by_views') {
					$args = array(
								'posts_per_page'   => $instance['posts_num'.$i],
								'meta_key' => 'fw_post_views_count',
								'orderby' => 'meta_value_num',
								'order'=>'DESC'
								); 
				} else if($instance['order_by'.$i] == 'by_rating')  {
						$args = array(
								'posts_per_page'   => $instance['posts_num'.$i],
								'meta_key' => 'fw_average_rating',
								'orderby' => 'meta_value_num',
								'order'=>'DESC'
								); 
				} else {
						$args = array(
							'posts_per_page'   => $instance['posts_num'.$i],
							'order'=>'DESC'
							); 	
				}				
								
				 query_posts($args);
				 while (have_posts()) : the_post();
				 ?>
                      <li class="clearfix">
                          <figure>
                              <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) : the_post_thumbnail(array(44,44)); endif; ?></a>
                          </figure>
                          <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                      </li>
				<?php endwhile; wp_reset_query();?>
                  </ul>
              </div>
			<?php } ?>
          </div>		
		  
		<?php	echo $after_widget;
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['ac_title1']	= strip_tags($new_instance['ac_title1']);
		$instance['ac_title2']  = strip_tags($new_instance['ac_title2']);
		$instance['ac_title3']  = strip_tags($new_instance['ac_title3']);
		$instance['order_by1']  = strip_tags($new_instance['order_by1']);
		$instance['order_by2']  = strip_tags($new_instance['order_by2']);
		$instance['order_by3']  = strip_tags($new_instance['order_by3']);
		$instance['posts_num1'] = strip_tags($new_instance['posts_num1']);
		$instance['posts_num2'] = strip_tags($new_instance['posts_num2']);
		$instance['posts_num3'] = strip_tags($new_instance['posts_num3']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance )
	{
		if ( $instance )
		{
			$ac_title1 = esc_attr($instance['ac_title1']);
			$ac_title2 = esc_attr($instance['ac_title2']);
			$ac_title3 = esc_attr($instance['ac_title3']);
			$order_by1 = esc_attr($instance['order_by1']);
			$order_by2 = esc_attr($instance['order_by2']);
			$order_by3 = esc_attr($instance['order_by3']);
			$posts_num1 = esc_attr($instance['posts_num1']);
			$posts_num2 = esc_attr($instance['posts_num2']);
			$posts_num3 = esc_attr($instance['posts_num3']);

		}
		else
		{
			$ac_title1 = "Accordion Title 1";
			$ac_title2 = "Accordion Title 2";
			$ac_title3 = "Accordion Title 3";
			$order_by1 = "comment_count";
			$order_by2 = "comment_count";
			$order_by3 = "comment_count";
			$posts_num1 = 1;
			$posts_num2 = 1;
			$posts_num3 = 1;
		}

		$pb_opts = array('comment_count' => 'Comments', 'by_views' => 'Most Viewed', 'by_rating' => 'Rating', 'recent_posts' => 'Recent Posts');
		foreach ($pb_opts as $k=>$op) : 		
			$optz_ob =  '<option value="'.$k.'">'.$op.'</option>';
		endforeach;
	?>    
            <label for="<?php echo $this->get_field_id('ac_title1'); ?>"><?php _e('Accordion 1 Title:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('ac_title1'); ?>" name="<?php echo $this->get_field_name('ac_title1'); ?>" type="text" value="<?php echo $ac_title1; ?>" />
			
			<label for="<?php echo $this->get_field_id('posts_num1'); ?>"><?php _e('Number of Posts:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('posts_num1'); ?>" name="<?php echo $this->get_field_name('posts_num1'); ?>" type="text" value="<?php echo $posts_num1; ?>" />
			
			<label for="<?php echo $this->get_field_id('order_by1'); ?>"><?php _e('Order By:', THEME_NAME); ?></label> 
            <select class="widefat" id="<?php echo $this->get_field_id('order_by1'); ?>" name="<?php echo $this->get_field_name('order_by1'); ?>" >
			<?php foreach ($pb_opts as $k=>$op) : 	
					$selected = ($order_by1 == $k) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
			
			<br/><br style="height: 20px;"/>
			
			<label for="<?php echo $this->get_field_id('ac_title2'); ?>"><?php _e('Accordion 2 Title:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('ac_title2'); ?>" name="<?php echo $this->get_field_name('ac_title2'); ?>" type="text" value="<?php echo $ac_title2; ?>" />
			
			<label for="<?php echo $this->get_field_id('posts_num2'); ?>"><?php _e('Number of Posts:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('posts_num2'); ?>" name="<?php echo $this->get_field_name('posts_num2'); ?>" type="text" value="<?php echo $posts_num2; ?>" />
			
			<label for="<?php echo $this->get_field_id('order_by2'); ?>"><?php _e('Order By:', THEME_NAME); ?></label> 
            <select class="widefat" id="<?php echo $this->get_field_id('order_by2'); ?>" name="<?php echo $this->get_field_name('order_by2'); ?>" >
			<?php foreach ($pb_opts as $k=>$op) : 	
					$selected = ($order_by2 == $k) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
			
			<br/><br style="height: 20px;"/>
			
			<label for="<?php echo $this->get_field_id('ac_title3'); ?>"><?php _e('Accordion 3 Title:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('ac_title3'); ?>" name="<?php echo $this->get_field_name('ac_title3'); ?>" type="text" value="<?php echo $ac_title3; ?>" />
            
			<label for="<?php echo $this->get_field_id('posts_num3'); ?>"><?php _e('Number of Posts:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('posts_num3'); ?>" name="<?php echo $this->get_field_name('posts_num3'); ?>" type="text" value="<?php echo $posts_num3; ?>" />
			
			<label for="<?php echo $this->get_field_id('order_by3'); ?>"><?php _e('Order By:', THEME_NAME); ?></label> 
            <select class="widefat" id="<?php echo $this->get_field_id('order_by3'); ?>" name="<?php echo $this->get_field_name('order_by3'); ?>" >
			<?php foreach ($pb_opts as $k=>$op) : 	
					$selected = ($order_by3 == $k) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
	<?php 
	}
}

add_action('widgets_init', create_function('', 'register_widget("POST_ACCORDION");' ) );



class FW_contact_us extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */ 'FW_contact_us', /* Name */ 'Contact Us', array( 'description' => 'Show the contact us form' ) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		
		extract( $args );
		echo $before_widget;
		
		$title = @apply_filters( 'widget_title', $instance['title'] );
		echo $before_title.$title.$after_title;?>
        
        <form class="contact-usfrm" method="post" action="<?php echo admin_url('admin-ajax.php?action=_ajax_callback&type=fw_contact_form_submit'); ?>" id="fw_contact_form">
            <div class="ajax-msg"></div>
            <fieldset>
                <input type="text" placeholder="<?php _e('Name', THEME_NAME); ?>" name="contact_name">
            </fieldset>
            <fieldset class="last">
                <input type="text" placeholder="<?php _e('E-mail', THEME_NAME); ?>" name="contact_email">
            </fieldset>
            <textarea placeholder="<?php _e('Message', THEME_NAME); ?>" rows="5" cols="5" name="contact_message"> </textarea>
            
            <input type="submit" value="<?php _e('Send', THEME_NAME); ?>">
        </form>

		  
		<?php	echo $after_widget;
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']	= strip_tags($new_instance['title']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance )
	{
		if ( $instance ) $title = esc_attr($instance['title']);
		else $title = __("Contact Us", THEME_NAME);?>
            
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', THEME_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		<?php 
	}
}

add_action('widgets_init', create_function('', 'register_widget("FW_contact_us");' ) );

class FW_TABS_WIDGET extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */ 'FW_TABS_WIDGET', /* Name */ 'Tabs Widget', array( 'description' => 'Show the Tabs' ) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		
		extract( $args );
		echo $before_widget;
		
		?>
        
       <div id="product_tabs">
	       <ul class="clearfix">
                <li><a href="#tabs-1" class="one"></a></li>
                <li><a href="#tabs-2" class="two"></a></li>
                <li><a href="#tabs-3" class="three"></a></li>
            </ul>
                                            
			<div class="border"></div>

			<div id="tabs-1" class="tab">
				<ul>
					
					<?php 
					$args = array(
								'posts_per_page'   => 3
								); 
					 query_posts($args);
					while (have_posts()) : the_post();?>
                    <li class="clearfix">
                        <figure>
                            <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) : the_post_thumbnail(array(44,44)); endif; ?></a>
                        </figure>
                          <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    </li>
					<?php endwhile; 
					wp_reset_query();?>
				</ul>
			</div>

			<div id="tabs-2" class="tab" >
				<ul>
					<?php 
					$args = array(
								'posts_per_page'   => 3,
								'meta_key' => 'fw_post_views_count',
								'orderby' => 'meta_value_num',
								'order'=>'DESC'
								); 
					 query_posts($args);
					while (have_posts()) : the_post();?>
                    <li class="clearfix">
                        <figure>
                            <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) : the_post_thumbnail(array(44,44)); endif; ?></a>
                        </figure>
                          <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    </li>
					<?php endwhile; 
					wp_reset_query();?>
				</ul>
			</div>

			<div id="tabs-3" class="tab" >
				<ul>
					<?php 
					$all_comments=get_comments( array('status' => 'approve', 'number'=>3) );

					foreach($all_comments as $k => $c)
					{
						 $post = $c->comment_post_ID;
						 $post_url = get_permalink($post);
						 echo '<li class="clearfix">';
						 
						if(has_post_thumbnail($post)) :
							echo '<figure><a href="'.$post_url.'/#comment-'.$c->comment_ID.'">'.get_the_post_thumbnail($post,array(44,44)).'</a></figure>';
						endif; 
						echo '<p><a href="'.$post_url.'/#comment-'.$c->comment_ID.'">'.character_limiter($c->comment_content, 60, '...').'</a></p></li>';
					}
					
					?>
				</ul>
			</div>

		</div>
		  
		<?php	echo $after_widget;
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance )
	{
		    
  
	}
}

add_action('widgets_init', create_function('', 'register_widget("FW_TABS_WIDGET");' ) );






