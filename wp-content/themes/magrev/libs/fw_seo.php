<?php 

class FW_SEO {
	
	public function page_title() {
		global $post;

		$meta = get_post_meta(get_the_ID(), 'magrev_'.kvalue( $post, 'post_type').'_settings', true);
		return kvalue( $meta, 'seo_title') ? kvalue( $meta, 'seo_title') : $post->post_title;
	}	
	
	public function post_title() {
		global $post;
		$meta = get_post_meta(get_the_ID(), 'magrev_'.kvalue( $post, 'post_type').'_settings', true);
		return kvalue( $meta, 'seo_title') ? kvalue( $meta, 'seo_title') : $post->post_title;
	}	
	
	public function blog_title() {
		global $post;
		return get_bloginfo('name');
	}
	
	public function blog_desc() {
		global $post;
		return get_bloginfo('description');
	}
	
	public function cat_title() {
		// Archive OR Category Page Title
		if(is_category()) {
			return single_cat_title("", false);
		}

		//For Single Post 
		global $post;
		$post_categories = wp_get_post_categories( $post->ID );
		
		if(!empty($post_categories)) {
			$cat = get_category( $post_categories[0] );
			return $cat->name;
		}
	}	
	
	public function cat_desc() {
		// Archive OR Category Page Description
		$cat = get_category( get_query_var('cat') );
		return $cat->description;
	}
	
	public function author_nicename() {
		global $post;
		return get_the_author_meta( 'nicename', $post->post_author );
	}
	
	public function author_firstname() {
		global $post;
		return get_the_author_meta( 'first_name', $post->post_author );
	}
	
	public function author_lastname() {
		global $post;
		return get_the_author_meta( 'first_name', $post->post_author );
	}
	
	public function archive_date() {
		return	the_time('d');
	}
	
	public function archive_month() {
		return	the_time('F');
	}
	
	public function archive_year() {
		return	the_time('Y');
	}
	
	public function tag() {
		$tag = get_tag( get_query_var('tag_id') );
		return $tag->name;
	}
	
	public function search_keyword() {
		return get_query_var('s');
	}
	
	public function requested_keyword() {
		global $wp_query;//printr($wp_query);
		return __('404 Not Found', THEME_NAME);
	}
	
	public function requested_link() {
		return $_SERVER['REQUEST_URI'];
	}
	
	public function pageno() {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		return $paged;
	}
	
	public function get_page_title($format) {
		$seo_title = new FW_SEO;

		if (preg_match_all("/%.*?%/", $format, $matches)) {
			foreach ($matches[0] as $match) {
				$func = str_replace('%','',$match);
				if(method_exists($seo_title,$func)) {
					$format = str_replace($match,$seo_title->$func(),$format);
				} 
			}
		}
		
		if( is_paged() ) {
			global $_webnukes;
			$paged = $_webnukes->get_options('sub_titles_settings','paged_format');
			$paged = str_replace('%pageno%', $seo_title->pageno(), $paged);
			$format .= " " . $paged;
		}		
		
		return $format;
	}
	
	
}

function fw_seo_title($title) {
	
	global $_webnukes, $post;
	$format = '';
	if( $_webnukes->get_options('sub_titles_settings','rewrite_titles') != 'on')
		return;

	if ( is_home() || is_front_page() ) {
		$format = $_webnukes->get_options('sub_homepage_settings','home_title');		
	} else if ( is_page() ) {
		$format = $_webnukes->get_options('sub_titles_settings','page_title_format');
	} else if ( is_single() || is_singular() ) {
		$format = $_webnukes->get_options('sub_titles_settings','post_title_format');
	} else if ( is_category() ) {
		$format = $_webnukes->get_options('sub_titles_settings','cat_title_format');
	} else if ( is_tag() ) {
		$format = $_webnukes->get_options('sub_titles_settings','tag_title_format');
	} else if ( is_archive() && is_author() ) {
		$format = $_webnukes->get_options('sub_titles_settings','author_title_format');
	} else if ( is_date() ) {
		$format = $_webnukes->get_options('sub_titles_settings','date_title_format');
	} else if( is_404() ) {
		$format = $_webnukes->get_options('sub_titles_settings','404_format');
	} else if ( is_search() ) {
		$format = $_webnukes->get_options('sub_titles_settings','search_title_format');
	}
	
	if($format != '') {
		$seo_title = new FW_SEO;
		$title = $seo_title->get_page_title($format);
	}
	
	//** Capitalizing the Titles **/
	if( $_webnukes->get_options('sub_titles_settings','capitalize_titles') == 'on')
		$title = strtoupper($title);
		
	return $title;
}

add_action('wp_title', 'fw_seo_title');

class FW_SEO_META {

	public function fw_meta() {
		global $post;
		$post_id = kvalue($post, 'ID');
		$robots = array();
		$meta_code = '';
		$meta = get_post_meta($post_id, 'magrev_'.kvalue( $post, 'post_type').'_settings', true);
		
		
		if(kvalue( $meta, 'seo_disable') == 'on')
			return;
		
		global  $_webnukes;
		$home_settings = $_webnukes->get_options('sub_homepage_settings') ;
		
		if(is_front_page()) {
			if(kvalue( $home_settings, 'home_description') != '')
				$meta_code .= '<meta name="description" content="'.kvalue( $home_settings, 'home_description') .'">';
			if(kvalue( $home_settings, 'home_keywords') != '')
				$meta_code .= '<meta name="keywords" content="'.kvalue( $home_settings, 'home_keywords') .'">';
		} else {
			/** Generating Meta Description and Meta Keywords for other pages**/
			if(kvalue( $meta, 'seo_description') != '') 
				$meta_code .= '<meta name="description" content="'.kvalue( $meta, 'seo_description').'">';
			if(kvalue( $meta, 'seo_keywords') != '') 
				$meta_code .= '<meta name="keywords" content="'.kvalue( $meta, 'seo_keywords').'">';
		}
	
		/** Generating the Robots Data **/
		if(kvalue( $meta, 'seo_noindex') == 'on')
			$robots[] = 'noindex';
		if(kvalue( $meta, 'seo_nofollow') == 'on')
			$robots[] = 'nofollow';
		if(kvalue( $meta, 'seo_noodp') == 'on')
			$robots[] = 'noodp';
		if(kvalue( $meta, 'seo_noydir') == 'on')
			$robots[] = 'nofollow';
		if(kvalue( $meta, 'seo_noydir') == 'on')
			$robots[] = 'nofollow';
			
		if(!empty($robots)) 
			$meta_code .= '<meta name="robots" content="'.implode(',',$robots).'" />';
		
		return $meta_code;
		
	}

}


?>