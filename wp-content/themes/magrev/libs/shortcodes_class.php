<?php if ( ! defined('ABSPATH')) exit('restricted access'); /*stop direct script access */

/**
 * Class for Wordpress Shortcodes
 * @package WordPress
 * @subpackage WelCare
 * @author	WP Nukes Developers Team (Allan)
 * @link	http://www.wpnukes.com
 * @since	Version 1.0
 */

class FW_Shortcodes
{
	private $_webnukes = array();
	var $_codes = array();
	
	function __construct()
	{
		$this->_webnukes = $GLOBALS['_webnukes'];
	}
	
	/** Add the shortcodes by including shorcodes_array.php */
	function add_shortcode()
	{
		global $options;
		$options = array();
		get_template_part('libs/shortcodes_array');

		foreach($options as $k=>$v)
		{
			add_shortcode('fw_'.$k, array($this, $k));
		}
	}
	
	

	function gallery( $atts, $content = null )
	{
		wp_enqueue_script(array('modernizer-script','prettyphoto-script','elastslide-script','rs-plugin-plugin','rs-plugin-rev'));
		extract( shortcode_atts( array(
			  'title' => __('Gallery', THEME_NAME),
			  'number' => -1,
		 ), $atts ) );
		 
		$args = array('post_type'=>'wpnukes_galleries', 'showposts'=>$number);
		 
		$output = '<div class="carousel"><h2>'.$title.'</h2><ul id="carousel1" class="elastislide-list clearfix">';
		query_posts($args); $n=0;
		while (have_posts()) : the_post(); 
			$output .= '<li class="clearfix"><a href="'.get_permalink(get_the_id()).'">';
			if(has_post_thumbnail())
				$output .= get_the_post_thumbnail(get_the_id(),array(270,202));
			$imgs = wp_get_attachment_image_src( get_post_thumbnail_id() , 'large' );
			$output.= '</a><div class="overlay-colm"><a class="zoom" href="'.$imgs[0].'"></a><a class="pls" href="'.get_permalink(get_the_id()).'"></a></div></li>';
		endwhile;
		
		$output .= '</ul></div>';
		wp_reset_query();
		return $output;
	}
	
	
	function three_col_posts($atts) {
		extract( shortcode_atts( array(
			'cat1' => 1,
			'cat2' => 2,
			'cat3' => 3,
		), $atts ) );

		$cats = array($cat1,$cat2,$cat3);
		/** Featured Post Shorcode along two more postss **/
		$output = '<div class="clearfix">';
		$count=0;
		foreach ($cats as $c) {
			$count++;
			$last = ($count == 3) ? 'last' : ''; 
			$args = array(
				'posts_per_page'   => 3,
				'cat'         => $c
				);
		
			$cat = get_category($c);
		
			$output .=	'<div class="post-diff '.$last.'"><h2>';
			if(is_object($cat)) 
				 $output .=	$cat->name;
			$output .=	'</h2>';
						
			query_posts($args); $n=0;
			while (have_posts()) : the_post(); 
				if ($n==0) :	
					if(has_post_thumbnail()) :
						$output .= '<figure><a href="'.get_permalink( get_the_id() ).'">';
						$output .= get_the_post_thumbnail(get_the_id(),array(270,202)); 
						$output .= '</a></figure>';
					endif;
					$output .= '<h4><a href="'. get_permalink( get_the_id() ) .'">'. get_the_title() .'</a></h4>
								<div class="line"><span></span></div>
								<p>'.character_limiter(get_the_excerpt(), 133, $end_char = ' ').'</p>
								<p class="post-meta"><span class="eye"><a href="#">'. fw_get_post_views(get_the_id()) .'</a></span><span class="time">'. get_the_time('h:iA') .'</span><span class="talk"><a href="#">'. get_comments_number( '0', '1', '%' ).'</a></span></p>';
				else : 
					$output .= '<div class="bottom-section clearfix">';
					
					if(has_post_thumbnail()) :
						$output .= '<figure><a href="'.get_permalink( get_the_id() ).'">';
						$output.= get_the_post_thumbnail(get_the_id(),array(44,44)); 
						$output .= '</a></figure>';
					endif;
					
					$output .= '<p><a href="'. get_permalink( get_the_id() ).'">'. get_the_title() .'</a></p></div>';
				endif;
				
				$n++; 
			endwhile;
			wp_reset_query();
		
			$output .= '</div>';
		
		} 
			
			$output .= '</div><div class="clearfix"></div>';
		
		return $output;
	}
	
	function two_cols_posts($atts) {
		extract( shortcode_atts( array(
			'cat1' => 1,
			'cat2' => 2
		), $atts ) );

		$cats = array($cat1,$cat2);
		$output = '<div class="clearfix"></div>';
		$count=0;
		foreach ($cats as $c) {
			$count++;
			$last = ($count == 2) ? 'last' : ''; 
			$args = array(
						'posts_per_page'   => 1,
						'cat'         => $c
					);
					
			$cat = get_category($c);
			$output .=	'<div class="small-post clearfix '.$last.'"><h2>';
			if(is_object($cat)) 
				 $output .=	$cat->name;
			$output .=	'</h2>';
			
			query_posts($args);
			while (have_posts()) : the_post(); 
				
			if(has_post_thumbnail()) :
				$output .= '<figure><a href="'.get_permalink( get_the_id() ).'">';
				$output.= get_the_post_thumbnail(get_the_id(),array(130,144)); 
				$output .= '</a></figure>';
			endif;
			
			$output .= '<div >
						 <h4><a href="'. get_permalink( get_the_id() ) .'">'. get_the_title() .'</a></h4>
						 <div class="line"><span></span></div>
						 <p>'. character_limiter(get_the_excerpt(), 133, $end_char = ' ') .'</p>
						 <p class="post-meta"><span class="eye"><a href="#">'. fw_get_post_views(get_the_id()) .'</a></span><span class="time">'. get_the_time('h:iA') .'</span><span class="talk"><a href="#">'. get_comments_number( '0', '1', '%' ) .'</a></span></p>
						</div>';
						
			endwhile; 
			wp_reset_query();
			$output .=	'</div>';
		}
		return $output;
	}
	
	function one_col_post($atts) {
	
		extract( shortcode_atts( array(
				'cat' => 1,
			), $atts ) );
		
		$args = array(
				'posts_per_page'   => 1,
				'cat'         => $cat
				);
		
		$output = '<div class="clearfix"></div>';
		
		$cat = get_category($cat);
		
		$output .=	'<div class="big-post clearfix"><h2>';
		if(is_object($cat)) 
				 $output .=	$cat->name;
		$output .=	'</h2>';
		
		query_posts($args);
		while (have_posts()) : the_post(); 
		
			if(has_post_thumbnail()) :
					$output .= '<figure><a href="'.get_permalink( get_the_id() ).'">';
					$output.= get_the_post_thumbnail(get_the_id(),array(382,249)); 
					$output .= '</a></figure>';
			endif;
			
			$output .= '<div>
					   <h4><a href="'. get_permalink( get_the_id() ) .'">'. get_the_title() .'</a></h4>
					   <div class="line"><span></span></div>
					   <p>'. character_limiter(get_the_content(), 736, $end_char = ' ') .'</p>
					   <p class="post-meta"><span class="eye"><a href="#">'. fw_get_post_views(get_the_id()) .'</a></span>
					   <span class="time">'. get_the_time('h:iA') .'</span>
					   <span class="talk"><a href="#">'. get_comments_number( '0', '1', '%' ) .'</a></span></p>
					   <div class="rating" data-rate="'.get_post_meta(get_the_id() , 'fw_average_rating',true).'" post-id="'.get_the_id().'"></div>
					   </div>';
		endwhile;
		wp_reset_query();
		$output .= '</div><div class="clearfix"></div>';
		return $output;
	}

	function slider($atts) {
		wp_enqueue_script(array('flexslider-script'));
		extract( shortcode_atts( array(
				'orderby' => 'comment_count',
				'order' => 'ASC',
				'slides' => 3
			), $atts ) );
			
		$output = '<div class="flexslider"><ul class="slides">';   
		$args = array(
				'posts_per_page'   => $slides,
				'orderby'   => $orderby,
				'post_type' => 'slides',
				'order'		=> $order
				);
		query_posts($args);
		while (have_posts()) : the_post(); 

		$output .= '<li><a href="#">';
		if(has_post_thumbnail()) 
			$output .= get_the_post_thumbnail(get_the_id(),array(870,400)); 
		$output .= '</a><div class="flex-caption"><h3>'. get_the_title() .'</h3></div></li>';
		
		endwhile; 
		wp_reset_query();
		   
		$output .= '</ul><div class="line"></div></div>';
		return $output;
	}
	
	function contact_form( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'title' => __('Send us an e-mail', THEME_NAME),
		), $atts ) );
		ob_start();?>
        
		<div class="comment-form">
            <h5><?php echo $title; ?></h5>
            <div class="ajax-msg"></div>
            <form class="clearfix" action="<?php echo admin_url('admin-ajax.php?action=_ajax_callback&type=fw_contact_form_submit'); ?>" method="post" id="fw_contact_form">
                <fieldset>
                    <input type="text" placeholder="<?php _e('Name', THEME_NAME); ?>" name="contact_name">
                    <input type="text" placeholder="<?php _e('Email', THEME_NAME); ?>" name="contact_email">
                    <input type="text" placeholder="<?php _e('Website', THEME_NAME); ?>" name="contact_url">
                </fieldset>
                <textarea placeholder="<?php _e('Message', THEME_NAME); ?>" name="contact_message"></textarea>
                <input type="submit" value="<?php _e('Send Message', THEME_NAME); ?>">
            </form>
        </div>
		<?php $output = ob_get_contents();
		ob_end_clean();
		return $output;
    }
	
	function portfolio( $atts, $content = null )
	{
		wp_enqueue_script(array('modernizer-script','isotope-script','cycleall-script','prettyphoto-script'));
		extract( shortcode_atts( array(
			'layout' => '',
			'show' => 5,
			'category' => ''
		), $atts ) );
		
		$output = '<div class="portfolio-wrap '.$layout.' clearfix">
        			<div class="container">
           			<div class=" row clearfix" id="project-container">';
                
		$args = array(
						'post_type'   => 'portfolio',
						'posts_per_page'   => $show,
						); 
						
		if($category != '')
			$args['tax_query'] =  array(
									  array(
									   'taxonomy' => 'portfolio_category',
									   'field' => 'id',
									   'terms' => $category
									  )
								   );
										
		query_posts($args); 
		while ( have_posts() ) : the_post(); 
			$post_terms = get_the_terms( get_the_id(), 'portfolio_category' ); 
			$terms_class = '';
			if(!empty($post_terms)) {
				foreach($post_terms as $term)
					$terms_class .= ' '. $term->slug;
			} 
			
			if ($layout == 'two-colm') 
				$span = 'span4';
			else if ($layout == 'three-colm') 
				$span = 'span3';
			else 
				$span = 'span6';
			
			$output .= '<div class="'.$span.' protfolio '.$terms_class.'">';
			
			if ($layout == 'two-colm') 
				$size = array(374,248);
			else if ($layout == 'three-colm') 
				$size = array(260,180);
			else 
				$size = array(575,282);
				
			if(has_post_thumbnail()) :
			
				$output .= '<figure><a href="#">'.get_the_post_thumbnail(get_the_id(),$size).'</a>
							<div class="overlay">
							<h4>'.get_the_title().'</h4>
							<p>'.get_the_excerpt().'</p>';
							
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'large' );
				$thumb_url = $thumb['0'];
				
				$output .= '<a class="zoom" href="'.$thumb_url.'"></a><a class="pls" href="#"></a>
							</div>
							</figure>';
			endif;
				
			$output .= '</div>';
		
		endwhile;
		wp_reset_query();
		$output  .= '</div></div></div>';
                      
		return $output;
    }


}