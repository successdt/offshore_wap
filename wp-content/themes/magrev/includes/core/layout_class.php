<?php if( ! defined('ABSPATH')) exit('restricted access');

class fw_layout_class
{
	protected $_webnukes;
	protected $_spans;
	
	function __construct()
	{
		$this->_webnukes = $GLOBALS['_webnukes']; /** Clone the fw_base_class object */
		$this->_spans = array('1' => 'span3', '2' => 'span6', '3' => 'span9', '4' => 'span12');
	}
	
	function meta_box()
	{
		require_once(BASEPATH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'layout.php');
		
		$sidebars = '';
		foreach($GLOBALS['wp_registered_sidebars'] as $k=>$v)
		{
			$sidebars[$k] = $v['name'];//'<option value="'.$k.'">'.$v['name'].'</option>';
		}
		
		$this->_webnukes->html->layout('layout/index', array('fields'=>$options, 'default_settings'=>$default_settings, 'sidebars'=> $sidebars)); /** Load the side links **/
		echo $GLOBALS['_webnukes']->html->build();
	}
	
	private function html_settings($fields, $settings)
	{
		$data = array();
		foreach($fields as $k=>$v)
		{
			$section = (!empty($v['settings']['section'])) ? $v['settings']['section'] : 'general';
			//$tab = (!empty($v['settings']['tab'])) ? $v['settings']['tab'] : 'default';
			
			if($k == 'DYNAMIC')
			{
				$first = key((array)$v);
				$section = ( ! empty($v[$first]['settings']['section'])) ? $v[$first]['settings']['section'] : 'general';
				//$data[$section][$tab][$k] = $this->_dynamic_fields($v); /** Call another function to bypass 100 times recusive function limitation */
				$data[$section][$k] = $this->_dynamic_fields($v); /** Call another function to bypass 100 times recusive function limitation */

				$data[$section]['DYNAMIC_SAMPLE_DATA'] = $this->_dynamic_fields($v, true);
			}
			else
				//$data[$section][$tab][$k] = $this->_webnukes->html->generator($k, $v, $settings);
				$data[$section][$k] = $this->_webnukes->html->generator($k, $v, $settings);
		}

		return $data;
	}
	
	function publish_page($post_id)
	{
		global $post;
		
		//printr($_POST);
		$layout = kvalue($_POST, 'layout');
		//printr($layout);
		if( $layout ) update_post_meta($post_id, 'page_builder_data', $layout);
	}
	
	
	/** Page bulder front end output methods */
	
	function sidebar( $settings, $position = 'left' )
	{
		//$builder = (kvalue( $meta, 'page_builder') == 'on') ? true : false;
		
		if( ! $settings ) return ;
		
		//$struct = kvalue( $settings, 'structure' );
		$sidebars = kvalue( $settings, 'sidebars');
		
		$sidebar1 = kvalue( $sidebars, 'left');
		$sidebar2 = kvalue( $sidebars, 'right');
		
		$pos = kvalue( $settings, 'structure' );

				
		if( $pos == 'col-full' ) return;
		
		switch( $position )
		{
			case 'left':
				if( $pos == 'col-left' ) $this->aside( $sidebar1);
				elseif( $pos == 'col-both' ) $this->aside( $sidebar1, 'span3' );
				elseif( $pos == 'col-left2' ){
					$this->aside( $sidebar1, '' );
					$this->aside( $sidebar2, 'span3' );
				}
			break;
			
			case 'right':
				if( $pos == 'col-right' ) $this->aside( $sidebar2 );
				elseif( $pos == 'col-both' ) $this->aside( $sidebar2, 'span3' );
				elseif( $pos == 'col-right2' ){
					$this->aside( $sidebar1, 'span3' );
					$this->aside( $sidebar2, 'span3' );
				}
			break;
		}
	}
	
	function aside( $sidebar, $span = 'span3' )
	{ ?>
		<div class="<?php echo $span; ?>">
		   <?php dynamic_sidebar( $sidebar ); ?> 
        </div>
	<?php
    }
	
	
	function set_cols( $vals )
	{
		$cols = (kvalue($vals, 'cols')) ? kvalue($vals, 'cols') : 1;

		if( isset( $this->_spans[$cols] ) ) return $this->_spans[$cols];
	}
	
	function build_page($settings)
	{
		//printr($settings);
		if( is_array( $settings ) )
		{
			if( isset( $settings['structure'] ) ) unset( $settings['structure'] );
			if( isset( $settings['sidebars'] ) ) unset( $settings['sidebars'] );
			
				
			foreach( $settings as  $array ){
				
				$name = kvalue( $array, 'id' );
				//echo $name.'<br>';
				//if( method_exists($this, $name ) ) {?>
					<div class="row-fluid">
						<section class="<?php echo ($name != 'heading') ? $this->set_cols($array) : '';?>">
							<?php $shortcode = '[fw_'.kvalue($array, 'id').$this->generate_shortcode(kvalue($array, 'data')).']';//echo $shortcode;exit;
							echo apply_filters( 'the_content', $shortcode );?>
						</section>
					</div>
					<?php
				//}
			}
				
			
		}
	}
	
	protected function generate_shortcode( $vals )
	{
		$return = ' ';
		if( is_array( $vals ) )
		{
			foreach( $vals as $k => $v )
			{
				$return .= $k.'="'.$v.'" ';
			}
		}
		return $return;
	}
	
	protected function slider($vals)
	{
		//printr($vals);
		$args = array();
		if( $ids = kvalue( $vals, 'ids') ) $args['post__in'] = explode( ',', $ids );
		if( $show = kvalue( $vals, 'number') ) $args['showposts'] = (int)$show;
		fw_slider($args);
	}
	
	protected function gallery($vals)
	{
		$ids = kvalue( $vals, 'ids');
		$shortcode = '';
		$cols = is_int(kvalue($vals, 'columns')) ? kvalue($vals, 'columns') : 3;
		if( $ids ) {
			$shortcode = '[gallery ids="'.$ids.'" columns="'.$cols.'" ]';
		}
		echo '<div class="blog-box">'.apply_filters( 'the_content', $shortcode ).'</div>';

	}
	
	protected function content($vals)
	{
		if( $content = kvalue( $vals, 'content') )
		echo '<div class="blog-box">'.apply_filters( 'the_content', $content ).'</div>';
	}
	
	
	protected function playlist($vals)
	{

		
		$args = array();
		if( $title = kvalue( $vals, 'title') ) $args['title'] = $title;
		
		if( kvalue( $vals, 'post' )  == 'rand' ) {
			$posts = get_posts( array('post_type'=>'fw_audio', 'orderby'=>'rand', 'post_status'=>'publish', 'posts_per_page'=>1 ) );
			$post_parent = kvalue( current( (array)$posts ), 'ID');
		}else $post_parent = kvalue( $vals, 'post');

        $q_args = array('post_parent'=>$post_parent,'post_type'=>'attachment', 'post_status'=>'inherit', 'post_mime_type'=>array('audio'));
		
		if( kvalue( $vals, 'number' ) ) $q_args['showposts'] = kvalue( $vals, 'number' );
		$audios = get_children( $q_args ); //printr($audios);
		$args['no-margin'] = true;
        fw_audio_playlist( $audios, $args );


	}
	
	protected function singers( $vals )
	{
		global $wp_query;
		$q_args = array('post_type'=>'fw_singer' );
		if( kvalue( $vals, 'number' ) ) $q_args['showposts'] = kvalue( $vals, 'number');
		$wp_query = new WP_Query( $q_args );?>
		
        <ul class="albums clearfix">
			 <?php fw_audio_listing(true); ?>
        </ul>
        
		<?php wp_reset_query();
	}
	
	protected function events( $vals )
	{
		$q_args = array('post_type'=>'fw_event', 'meta_key' =>'fw_event_start_time', 'meta_query' => array(array('key' => 'fw_event_start_time', 'value' => date('d-m-Y h:i:s'), 'type' => 'date', 'compare' => '>='	)), 'orderby'=>'meta_value', 'order'=>'ASC');
		if( kvalue( $vals, 'number' ) ) $q_args['showposts'] = kvalue( $vals, 'number' );
		
		$query = new WP_Query($q_args);//printr($query);
		fw_upcoming_events( $query );
		wp_reset_query();
	}
	
	
	protected function albums($vals)
	{
		global $wp_query;

		$args = array('post_type'=>'fw_audio');
		
		if( $number = kvalue( $vals, 'number' )) $args['showposts'] = $number;
		
		$query = new WP_Query($args);?>
        
        <ul class="albums clearfix">
			 <?php fw_audio_listing(false, false, $query); ?>
        </ul>
		<?php wp_reset_query();
	}
	
	protected function contactus($vals)
	{
		$settings = $GLOBALS['_webnukes']->get_options('sub_contact_page_settings');
        fw_contact_form($settings);

	}
	
	protected function blog($vals)
	{
		global $wp_query;
		$args = array('post_type'=>'post');
		if( $cat = kvalue($vals, 'category')) $args['category__in'] = $cat;
		if( $num = kvalue($vals, 'number')) $args['showposts'] = $num;
		$wp_query = new WP_Query($args);
		fw_blog_listing();
		wp_reset_query();
		
	}
	
	protected function heading($vals)
	{
		//$vals = kvalue( $vals, 'data');
		$heading = kvalue( $vals, 'heading');
		$tag = kvalue($vals, 'tag', '2');
		
		if( $heading ) echo '<h'.$tag.' class="'.$this->set_cols($vals).'">'.$heading.'</h'.$tag.'>';
	}
}