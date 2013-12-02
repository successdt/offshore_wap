<?php 

// Register Custom Taxonomy
function fw_portfolio_category()  {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', THEME_NAME ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', THEME_NAME ),
		'menu_name'                  => __( 'Category', THEME_NAME ),
		'all_items'                  => __( 'All Categories', THEME_NAME ),
		'parent_item'                => __( 'Parent Category', THEME_NAME ),
		'parent_item_colon'          => __( 'Parent Category:', THEME_NAME ),
		'new_item_name'              => __( 'New Category Name', THEME_NAME ),
		'add_new_item'               => __( 'Add New Category', THEME_NAME ),
		'edit_item'                  => __( 'Edit Category', THEME_NAME ),
		'update_item'                => __( 'Update Category', THEME_NAME ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', THEME_NAME ),
		'search_items'               => __( 'Search Categories', THEME_NAME ),
		'add_or_remove_items'        => __( 'Add or remove Categories', THEME_NAME ),
		'choose_from_most_used'      => __( 'Choose from the most used Categories', THEME_NAME ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio_category',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'portfolio_category', 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'fw_portfolio_category', 0 );