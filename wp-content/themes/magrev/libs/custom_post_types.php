<?php 

function magrev_post_types() {
	register_post_type( 'slides',  
        array(  
            'labels' => array(  
                'name' => __( 'Slides', THEME_NAME ),  
                'singular_name' => __( 'Slide', THEME_NAME ) ,
				'add_new' => __( 'Add New Slide', THEME_NAME ),
                'add_new_item' => __( 'Add New Slide', THEME_NAME ),
                'edit_item' => __( 'Edit Slide', THEME_NAME ),
                'new_item' => __( 'Add New Slide', THEME_NAME ),
                'view_item' => __( 'View Slide', THEME_NAME ),
                'search_items' => __( 'Search Slide', THEME_NAME ),
                'not_found' => __( 'No Slide found', THEME_NAME ),
                'not_found_in_trash' => __( 'No Slide found in trash', THEME_NAME)				
            ),  
        'public' => true, 
		'menu_position' => 5,  
        'rewrite' => array('slug' => 'slides')  ,
		'supports' => array('title','editor' ,'author','thumbnail' ,'excerpt')
        )  
    );  
	
	
	register_post_type( 'portfolio',  
        array(  
            'labels' => array(  
                'name' => __( 'Portfolios', THEME_NAME ),  
                'singular_name' => __( 'Portfolio', THEME_NAME ) ,
				'add_new' => __( 'Add New Portfolio', THEME_NAME ),
                'add_new_item' => __( 'Add New Portfolio', THEME_NAME ),
                'edit_item' => __( 'Edit Portfolio', THEME_NAME ),
                'new_item' => __( 'Add New Portfolio', THEME_NAME ),
                'view_item' => __( 'View Portfolio', THEME_NAME ),
                'search_items' => __( 'Search Portfolio', THEME_NAME ),
                'not_found' => __( 'No Portfolio found', THEME_NAME ),
                'not_found_in_trash' => __( 'No Portfolio found in trash', THEME_NAME)				
            ),  
			'public' => true, 
			'menu_position' => 5,  
			'rewrite' => array('slug' => 'portfolio')  ,
			'supports' => array('title','editor' ,'author','thumbnail')
        )  
    );
	
}

add_action('init', 'magrev_post_types');
?>