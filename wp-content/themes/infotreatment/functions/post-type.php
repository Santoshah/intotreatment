<?php

add_action( 'init', 'awesome_post_types' );
function awesome_post_types() {

	// Slide post type
	register_post_type( 'slide',
		array(
		  'labels' => array(
			'name' => __( 'Slides', 'awesome' ),
			'singular_name' => __( 'Slide', 'awesome' ),		
			'add_new' => _x( 'Add New', 'Slide', 'awesome' ),
			'add_new_item' => __( 'Add New Slide', 'awesome' ),
			'edit_item' => __( 'Edit Slide', 'awesome' ),
			'new_item' => __( 'New Slide', 'awesome' ),
			'view_item' => __( 'View Slide', 'awesome' ),
			'search_items' => __( 'Search Slides', 'awesome' ),
			'not_found' =>  __( 'No Slides found', 'awesome' ),
			'not_found_in_trash' => __( 'No Slides found in Trash', 'awesome' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'slide' ),
		)
	  );
	  

	// Skill post type
	register_post_type( 'skill',
		array(
		  'labels' => array(
			'name' => __( 'Skills', 'awesome' ),
			'singular_name' => __( 'Skill', 'awesome' ),		
			'add_new' => __( 'Add New', 'Skill', 'awesome' ),
			'add_new_item' => __( 'Add New Skill', 'awesome' ),
			'edit_item' => __( 'Edit Skill', 'awesome' ),
			'new_item' => __( 'New Skill', 'awesome' ),
			'view_item' => __( 'View Skill', 'awesome' ),
			'search_items' => __( 'Search Skill', 'awesome' ),
			'not_found' =>  __( 'No Skills found', 'awesome' ),
			'not_found_in_trash' => __( 'No Skill found in Trash', 'awesome' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'skill' ),
		)
	  );	  
	  

	// Application post type
	register_post_type( 'application',
		array(
		  'labels' => array(
			'name' => __( 'Applications', 'awesome' ),
			'singular_name' => __( 'Application', 'awesome' ),		
			'add_new' => __( 'Add New', 'Application', 'awesome' ),
			'add_new_item' => __( 'Add New Application', 'awesome' ),
			'edit_item' => __( 'Edit Application', 'awesome' ),
			'new_item' => __( 'New Application', 'awesome' ),
			'view_item' => __( 'View Application', 'awesome' ),
			'search_items' => __( 'Search Application', 'awesome' ),
			'not_found' =>  __( 'No Applications found', 'awesome' ),
			'not_found_in_trash' => __( 'No Applications found in Trash', 'awesome' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'application' ),
		)
	  );	  
	  
	// Team post type
	register_post_type( 'team_member',
		array(
		  'labels' => array(
			'name' => __( 'Teams', 'awesome' ),
			'singular_name' => __( 'Team', 'awesome' ),		
			'add_new' => __( 'Add New', 'Application', 'awesome' ),
			'add_new_item' => __( 'Add New Team', 'awesome' ),
			'edit_item' => __( 'Edit Team', 'awesome' ),
			'new_item' => __( 'New Team', 'awesome' ),
			'view_item' => __( 'View Team', 'awesome' ),
			'search_items' => __( 'Search Teams', 'awesome' ),
			'not_found' =>  __( 'No Teams found', 'awesome' ),
			'not_found_in_trash' => __( 'No Teams found in Trash', 'awesome' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'team_member' ),
		)
	  );
	  

	// Portfolio post type
	register_post_type( 'portfolio',
		array(
		  'labels' => array(
			'name' => __( 'Portfolios', 'awesome' ),
			'singular_name' => __( 'Portfolio', 'awesome' ),		
			'add_new' => __( 'Add New', 'Portfolio', 'awesome' ),
			'add_new_item' => __( 'Add New Portfolio', 'awesome' ),
			'edit_item' => __( 'Edit Portfolio', 'awesome' ),
			'new_item' => __( 'New Portfolio', 'awesome' ),
			'view_item' => __( 'View Portfolio', 'awesome' ),
			'search_items' => __( 'Search Portfolio', 'awesome' ),
			'not_found' =>  __( 'No Portfolios found', 'awesome' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash', 'awesome' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'portfolio' ),
		)
	  );	  
	  
}

	// Service post type
	register_post_type( 'service',
		array(
		  'labels' => array(
			'name' => __( 'Services', 'awesome' ),
			'singular_name' => __( 'Service', 'awesome' ),		
			'add_new' => __( 'Add New', 'Service', 'awesome' ),
			'add_new_item' => __( 'Add New Service', 'awesome' ),
			'edit_item' => __( 'Edit Service', 'awesome' ),
			'new_item' => __( 'New Service', 'awesome' ),
			'view_item' => __( 'View Service', 'awesome' ),
			'search_items' => __( 'Search Service', 'awesome' ),
			'not_found' =>  __( 'No Services found', 'awesome' ),
			'not_found_in_trash' => __( 'No Services found in Trash', 'awesome' ),
			'parent_item_colon' => ''
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'service' ),
		)
	  );	 

	// Price table post type
	register_post_type( 'price_table',
		array(
		  'labels' => array(
			'name' => __( 'Price Tables', 'awesome' ),
			'singular_name' => __( 'Price Table', 'awesome' ),		
			'add_new' => __( 'Add New', 'Price Table', 'awesome' ),
			'add_new_item' => __( 'Add New Price Table', 'awesome' ),
			'edit_item' => __( 'Edit Price Table', 'awesome' ),
			'new_item' => __( 'New Price Table', 'awesome' ),
			'view_item' => __( 'View Price Table', 'awesome' ),
			'search_items' => __( 'Search Price Table', 'awesome' ),
			'not_found' =>  __( 'No Price Tables found', 'awesome' ),
			'not_found_in_trash' => __( 'No Price Tables found in Trash', 'awesome' ),
			'parent_item_colon' => ''
		  ),
		  'public' => true,
		  'supports' => array('title'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'price_table' ),
		)
	  );	  	  

/** Build Taxonomies **/
add_action( 'init', 'awesome_taxonomies' );
function awesome_taxonomies() {

		register_taxonomy('portfolio_category',array('portfolio'),
		 array(
			'labels' => array(
				'name' => __( 'Portfolio Categories', 'awesomee' ),
				'singular_name' => __( 'Portfolio Category', 'awesomee' ),
				'search_items' => __( 'Search Portfolio Categories', 'awesomee' ),
				'popular_items' => __( 'Popular Portfolio Categories', 'awesomee' ),
				'all_items' => __( 'All Portfolio Categories', 'awesomee' ),
				'parent_item' => __( 'Parent Portfolio Category', 'awesomee' ),
				'parent_item_colon' => __( 'Parent Portfolio Category:', 'awesomee' ),
				'edit_item' => __( 'Edit Portfolio Category', 'awesomee' ),
				'update_item' => __( 'Update Portfolio Category', 'awesomee' ),
				'add_new_item' => __( 'Add New Portfolio Category', 'awesomee' ),
				'new_item_name' => __( 'New Portfolio Category Name', 'awesomee' ),
				'separate_items_with_commas' => __( 'Separate portfolio categories with commas', 'awesomee' ),
				'add_or_remove_items' => __( 'Add or remove portfolio categories', 'awesomee' ),
				'choose_from_most_used' => __( 'Choose from the most used portfolio categories', 'awesomee' ),
				'menu_name' => __( 'Portfolio Categories', 'awesomee' )
		),
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'portfolio_category' ),
			'query_var' => true		 
		)
		);
	  
}	  

/** Build featured image column in post **/
add_filter('manage_post_posts_columns', 'post_posts_columns_head', 5);
add_action('manage_post_posts_custom_column', 'post_posts_custom_columns_content', 5, 2);
function post_posts_columns_head($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'awesome');
    return $defaults;
}
function post_posts_custom_columns_content($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}

/** Build custom colum for portfolio post type **/
add_filter('manage_portfolio_posts_columns', 'portfolio_posts_columns_head', 5);
add_action('manage_portfolio_posts_custom_column', 'portfolio_posts_custom_columns_content', 5, 2);
function portfolio_posts_columns_head($defaults){
    $defaults = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => (__('Title', 'awesome')),
		"category" => (__('Portfolio Category', 'awesome')),		
		"thumbs" => (__('Thumbs', 'awesome')),
		"date" => (__('Date', 'awesome')),
	);
    return $defaults;
}
function portfolio_posts_custom_columns_content($column_name, $id){
	global $post;
	switch ($column_name) {	
		case "thumbs":
			echo the_post_thumbnail( 'small-thumb' );
			break;
		case "category":
			echo get_the_term_list($post->ID, 'portfolio_category', '', ', ','');
			break;		
	}
}

/** Build featured image column in price table post type **/
add_filter('manage_price_table_posts_columns', 'price_table_posts_columns_head', 5);
add_action('manage_price_table_posts_custom_column', 'price_table_posts_custom_columns_content', 5, 2);
function price_table_posts_columns_head($defaults){

    $defaults = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Product Title",	
		"price" => (__('Price', 'awesome')),
		"date" => (__('Date', 'awesome')),
	);
	
    return $defaults;
}
function price_table_posts_custom_columns_content($column_name, $id){
	global $post;
	switch ($column_name) {	
		case "price":
			echo get_post_meta($post->ID, 'pricet_curency', true);
			echo " ";
			echo get_post_meta($post->ID, 'pricet_price', true); 
			break;
	}
}

/** Build featured image column in slides post type **/
add_filter('manage_slide_posts_columns', 'slide_posts_columns_head', 5);
add_action('manage_slide_posts_custom_column', 'slide_posts_custom_columns_content', 5, 2);
function slide_posts_columns_head($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'awesome');
    return $defaults;
}
function slide_posts_custom_columns_content($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}

/** Build featured image column in service post type **/
add_filter('manage_service_posts_columns', 'service_posts_columns_head', 5);
add_action('manage_service_posts_custom_column', 'service_posts_custom_columns_content', 5, 2);
function service_posts_columns_head($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'awesome');
    return $defaults;
}
function service_posts_custom_columns_content($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}

/** Build featured image column in skill post type **/
add_filter('manage_skill_posts_columns', 'skill_posts_columns_head', 5);
add_action('manage_skill_posts_custom_column', 'skill_posts_custom_columns_content', 5, 2);
function skill_posts_columns_head($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'awesome');
    return $defaults;
}
function skill_posts_custom_columns_content($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}

/** Build featured image column in application post type **/
add_filter('manage_application_posts_columns', 'application_posts_columns_head', 5);
add_action('manage_application_posts_custom_column', 'application_posts_custom_columns_content', 5, 2);
function application_posts_columns_head($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'awesome');
    return $defaults;
}
function application_posts_custom_columns_content($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}

?>