<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

class Warp_Breadcrumbs extends WP_Widget {

	function Warp_Breadcrumbs() {
		$widget_ops = array('description' => 'Display your sites breadcrumb navigation');
		parent::WP_Widget(false, 'Warp - Breadcrumbs', $widget_ops);      
	}

	function widget($args, $instance) {  
		
		global $wp_query;
		
		extract($args);

		$title = $instance['title'];
		$home_title = trim($instance['home_title']);
		
		if (empty($home_title)) {
			$home_title = 'Home';
		}
		echo $before_widget;
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		
		if (!is_home() && !is_front_page()) {
			$output = '<ul id="breadcrumbs-system">';
			
			$output .= '<li><span><a href="'.home_url().'">';
			$output .= $home_title;
			$output .= '</a></span><span class="arrow"></span></li>';

			if (is_single()) {
				$cats = get_the_category();
				$cat = $cats[0];
				if (is_object($cat)) {
					if ($cat->parent != 0) {
					
					
					$output .= '<li><span class="breadcrumbs-cat">';
						$output .= get_category_parents($cat->term_id, true, " ");
						$output .= '</span><span class="arrow"></span></li>';	
					} else {
						$output .= '<li><span><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></span><span class="arrow"></span></li>';
					}
				}
			}
			if (is_category()) {

				$cat_obj = $wp_query->get_queried_object();
				$cats = explode("@@@", get_category_parents($cat_obj->term_id, TRUE, '@@@'));
				unset($cats[count($cats)-1]);
				$cats[count($cats)-1] = '<span>'.strip_tags($cats[count($cats)-1]).'</span>';
$output .= '<li class="unique-cat">';
				$output .= implode("", $cats);$output .= '</li>';
			} elseif (is_tag()) {

			} elseif (is_date()) {
				$output .= '<li><span>'.single_month_title(' ',false).'</span><span class="arrow"></span></li>';
			} elseif (is_author()) {
				$user = !empty($wp_query->query_vars['author_name']) ? get_userdatabylogin($wp_query->query_vars['author']) : get_user_by("id", ((int) $_GET['author']));
				
				$output .= '<li><span>'.$user->display_name.'</span><span class="arrow"></span></li>';
			} elseif (is_search()) {
				$output .= '<li><span>'.stripslashes(strip_tags(get_search_query())).'</span><span class="arrow"></span></li>';
			} else if (is_tax()) {
				$taxonomy = get_taxonomy (get_query_var('taxonomy'));
				$term = get_query_var('term');
				$output .= '<li><span>'.$taxonomy->label .': '.$term.'</span><span class="arrow"></span></li>';
			} else {
				$output .= '<li class="lastlink">'.get_the_title().'</li>';
			}
			$output .= '</ul>';
		} else {
			$output = '<ul id="breadcrumbs-system">';
			$output .= '<li><span>'.$home_title.'</span><span class="arrow"></span></li>';
			$output .= '</ul>';

		}
		
		echo $output;

		echo $after_widget;

	}
	function update($new_instance, $old_instance) {                
		return $new_instance;
	}
	function form($instance) {        
		$title = esc_attr($instance['title']);
		$home_title = esc_attr($instance['home_title']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','warp'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('home_title'); ?>"><?php _e('Home title:','warp'); ?></label>
			<input type="text" placeholder="Home" name="<?php echo $this->get_field_name('home_title'); ?>"  value="<?php echo $home_title; ?>" class="widefat" id="<?php echo $this->get_field_id('home_title'); ?>" />
		</p>
<?php
	}
} 
register_widget('Warp_Breadcrumbs');