<?php

	if (function_exists('register_sidebar'))
    	register_sidebar();
	
	function timeAgo($time){
		$today = time();    
		$createdday= strtotime($time); //mysql timestamp of when post was created  
		$datediff = abs($today - $createdday);  
		$difftext="";  
		$years = floor($datediff / (365*60*60*24));  
		$months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
		$days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
		$hours= floor($datediff/3600);  
		$minutes= floor($datediff/60);  
		$seconds= floor($datediff);  
		//year checker  
		if($difftext=="")  
		{  
			if($years>1)  
				$difftext=$years." năm trước";  
		elseif($years==1)  
			$difftext=$years." năm trước";  
		}  
		//month checker  
		if($difftext=="")  
		{  
			if($months>1)  
				$difftext=$months." tháng trước";  
		elseif($months==1)  
			$difftext=$months." tháng trước";  
		}  
		//month checker  
		if($difftext=="")  
		{  
			if($days>1)  
				$difftext=$days." ngày trước";  
		elseif($days==1)  
			$difftext=$days." ngày trước";  
		}  
		//hour checker  
		if($difftext=="")  
		{  
			if($hours>1)  
				$difftext=$hours." giờ trước";  
		elseif($hours==1)  
			$difftext=$hours." giờ trước";  
		}  
		//minutes checker  
		if($difftext=="")  
		{  
			if($minutes>1)  
				$difftext=$minutes." phút trước";  
		elseif($minutes==1)  
			$difftext=$minutes." phút trước";  
		}  
		//seconds checker  
		if($difftext=="")  
		{  
			if($seconds>1)  
				$difftext=$seconds." giây trước";  
		elseif($seconds==1)  
			$difftext=$seconds." giây trước";  
		}  
		
		return $difftext; 
	}
	
	function catch_that_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		if(has_post_thumbnail($post->ID))
			return wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches[1][0];
		
		if(empty($first_img)){ //Defines a default image
			$first_img = "/images/default.jpg";
		}
		return $first_img;
	}

	add_action( 'edit_category_form_fields', 'my_category_custom_fields' );
	add_action( 'edit_category', 'save_my_category_custom_fields' );
	
	function my_category_custom_fields( $tag ) {
	    // your custom field HTML will go here
	    // the $tag variable is a taxonomy term object with properties like $tag->name, $tag->term_id etc...
	
	    // we need to know the values of our existing entries if any
	    $category_layout = get_option( 'category_layout_' . $tag->term_id );
	    ?>
	    <tr class="form-field">
	        <th scope="row" valign="top"><label for="category-title"><?php _e("Kiểu layout"); ?></label></th>
	        <td>
	            <input id="category-title" type="text" name="category_layout" value="<?php if ( isset( $category_layout) ) esc_attr_e( $category_layout ); ?>" />
	            <br />
	            <span class="description"><?php _e('Nhập kiểu layout, ví dụ: news, game,...'); ?></span>
	        </td>
	    </tr>
	    <!-- rinse & repeat for other fields you need -->
	    <?php
	}
	
	function save_my_category_custom_fields() {
	    if ( isset( $_POST['category_layout'] ) && !update_option('category_layout_' . $_POST['tag_ID'], $_POST['category_layout']) )
	        add_option('category_layout_' . $_POST['tag_ID'], $_POST['category_layout']);
	}
?>