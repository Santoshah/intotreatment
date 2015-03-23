<?php 

// Enqueue styles
function awesome_styles() {

	/* Google Fonts */
	wp_enqueue_style( 'droid-serif-400-italic', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic', array(), null); 
	wp_enqueue_style( 'droid-serif-400-700', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700', array(), null); 
	wp_enqueue_style( 'ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu', array(), null); 
	wp_enqueue_style( 'raleway', 'http://fonts.googleapis.com/css?family=Raleway', array(), null); 
	
	/* Hand-picked google font */
	if ( (of_get_option('aw_gfont_url')) !='' ) { 
		$google_font_uri = of_get_option('aw_gfont_url');
		wp_enqueue_style( 'custom-google-font', $google_font_uri, array(), null); 	
	}
	
	
	
	
	/* One by One Slider */
	if( is_home() && of_get_option('select_1') !=0 ) { 
		wp_enqueue_style('onebyone-slider', get_stylesheet_directory_uri() . '/stylesheets/jquery.onebyone.css', array(), null ); 
		wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/stylesheets/animate.css', array(), null ); 
	}	
	/* End of One by One Slider */	
	
	
	
	
	/* Flex Slider */	
	if( is_home() && of_get_option('select_2') !=0 ) {
		wp_enqueue_style('flex-slider', get_stylesheet_directory_uri() . '/stylesheets/flexslider.css', array(), null ); 
	}		
	/* End of Flex Slider */
	
	
	
	
	/* Ajax Post */	
	if(of_get_option('aw_blog_ajax') == 'yes'){ 
		wp_enqueue_style('post-ajax', get_stylesheet_directory_uri() . '/stylesheets/post-ajax.css', array(), null ); 
	}		
	/* End of Ajax Post */
	
	
	wp_enqueue_style('meanmenu', get_stylesheet_directory_uri() . '/stylesheets/meanmenu.css', array(), null ); 
	wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/stylesheets/responsive.css', array(), null ); 
	
}
add_action( 'wp_enqueue_scripts', 'awesome_styles');

function aw_add_modernizr() {

    wp_register_script( 'modernizr', get_template_directory_uri() . '/includes/js/modernizr.custom.js', false, '2.0.8', true );
    wp_enqueue_script( 'modernizr' );

}	


function aw_add_scrollto() {

    wp_register_script( 'scrollto', get_template_directory_uri() . '/includes/js/jquery.scrollTo.js', array( 'jquery' ), false, true );
	
	$frontpage_layout = of_get_option('aw_layout', '');  
	if($frontpage_layout == 'portfolio' & is_home() ) { 		
		wp_enqueue_script( 'scrollto' );
	}	

}


function aw_add_nav() {

	wp_register_script( 'nav', get_template_directory_uri() . '/includes/js/jquery.nav.js', array( 'jquery' ), '0.9', true );
	
	$frontpage_layout = of_get_option('aw_layout', '');  
	if($frontpage_layout == 'portfolio' & is_home() )  { 	
		wp_enqueue_script( 'nav' );	
	}
	
}	


function aw_add_ajax() {
	
	wp_enqueue_script( 'ajax', get_template_directory_uri() . '/includes/js/ajax.js', array( 'jquery' ) );
	wp_localize_script( 'ajax', 'headJS', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'templateurl' => get_template_directory_uri(), 'themePath' => get_template_directory_uri(), 'prevPost' => __( 'Go to the previous post', 'awesome' ), 'nextPost' => __( 'Go to the next post', 'awesome' ) ) );	
		
} 


function aw_add_jquery_easing() {
	
    wp_register_script( 'easing', get_template_directory_uri() . '/includes/js/jquery.easing.1.3.js', array( 'jquery' ), true );
    wp_enqueue_script( 'easing' );
	
} 
	

function aw_add_quicksand() {
	
	$number_of_projects_per_row = 4;
	wp_register_script( 'quicksand', get_template_directory_uri() . '/includes/js/jquery.quicksand.js', array( 'jquery' ), '1.2.2', true );
	
	if(is_home()) {
		wp_enqueue_script( 'quicksand' );
	}
		
	wp_register_script( 'quicksand-filter', get_template_directory_uri() . '/includes/js/jquery.quicksand.filter.js', array( 'jquery', 'quicksand' ), false, true );

	if(is_home()) {	
		wp_enqueue_script( 'quicksand-filter' );		
	}
	
}	
	
			
function aw_add_runonload() {

	wp_register_script( 'runonload', get_template_directory_uri() . '/includes/js/runonload.js', array( 'jquery'), '1.4.2', true );

	if(is_home()) { 	
		wp_enqueue_script( 'runonload' );
	}
	
}	


function aw_add_cform() {
	
	wp_register_script( 'cform', get_template_directory_uri() . '/includes/js/awesome-cform.js', array( 'jquery' ), '1.4.2', true );	
	
	if(is_home()) { 	
		wp_enqueue_script( 'cform' );
	}
	
}	

	
function aw_add_onebyone() {

	wp_register_script( 'onebyone', get_template_directory_uri() . '/includes/js/jquery.onebyone.min.js', array( 'jquery'), '1.4.2', true );
	
	if( is_home() && of_get_option('select_1') !=0 ) { 	
		wp_enqueue_script( 'onebyone' );		
	}
	
}	

	
function aw_add_touchwipe() {

	wp_register_script( 'touchwipe', get_template_directory_uri() . '/includes/js/jquery.touchwipe.min.js', array( 'jquery'), '1.4.2', true );
	
	if( is_home() && of_get_option('select_1') !=0 ) {  		
		wp_enqueue_script( 'touchwipe' );		
	}
	
}	
														

function aw_add_flexslider() {

	wp_register_script( 'flexslider', get_template_directory_uri() . '/includes/js/jquery.flexslider.js', array( 'jquery'), '1.4.2', true );
	
	if( is_home() && of_get_option('select_2') !=0 ) {  		
		wp_enqueue_script( 'flexslider' );		
	}
	
}									
														


function aw_add_idtabs() {

	wp_register_script( 'idtabs', get_template_directory_uri() . '/includes/js/jquery.idTabs.min.js', array( 'jquery'), '1.4.2', true );
	wp_enqueue_script( 'idtabs' );		
	
}	


function aw_add_fitmap() {

	if(is_home()) { 
		wp_register_script( 'fitmap', get_template_directory_uri() . '/includes/js/fitmap.js', array( 'jquery'), '1.4.2', true );
		wp_enqueue_script( 'fitmap' );		
	}
	
}	

function aw_add_mobilemenu() {

	wp_register_script( 'mobilemenu', get_template_directory_uri() . '/includes/js/jquery.meanmenu.js', array( 'jquery'), '1.3', true );
	wp_enqueue_script( 'mobilemenu' );		
	
}	

function aw_add_onepagenav() {

	wp_register_script( 'onepagenav', get_template_directory_uri() . '/includes/js/onepagenav.js', array( 'jquery'), '', true );
	
	$frontpage_layout = of_get_option('aw_layout', '');  
	
	if(is_home() && $frontpage_layout == 'portfolio') { 
		wp_enqueue_script( 'onepagenav' );		
	}
	
}	

function aw_add_fluidvids() {

	wp_register_script( 'fluidvids', get_template_directory_uri() . '/includes/js/fluidvids.min.js', null, '1.0.0', true ); 
	wp_enqueue_script( 'fluidvids' );

}

		
function aw_add_custom() {

	wp_register_script( 'custom', get_template_directory_uri() . '/includes/js/custom.js', array( 'jquery' ), '1.4.2', true ); 
	wp_enqueue_script( 'custom' );
	
}

	
function aw_add_customheader() {

	wp_register_script( 'customheader', get_template_directory_uri() . '/includes/js/jquery.header.custom.js', array( 'jquery'), '1.4.2', true );
	wp_enqueue_script( 'customheader' );		
	
}	


// Enqueue awesome scripts in site admin
function awesome_admin_register() {

	wp_register_style( 'awesome-admin-style', get_template_directory_uri().'/stylesheets/admin-styles.css', array(), '20120208', 'all' ); 	
	wp_enqueue_style( 'awesome-admin-style' );

}

// Enqueue comment reply script
function awesome_enqueue_comment_reply_script() {
	if ( comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action('wp_enqueue_scripts', 'aw_add_modernizr', 1);	
add_action('wp_enqueue_scripts', 'aw_add_scrollto', 2);	
add_action('wp_enqueue_scripts', 'aw_add_nav', 3);
add_action('wp_enqueue_scripts', 'aw_add_onepagenav', 4);
add_action('wp_enqueue_scripts', 'aw_add_ajax', 5);	
add_action('wp_enqueue_scripts', 'aw_add_jquery_easing', 6);	
add_action('wp_enqueue_scripts', 'aw_add_quicksand', 7);	
add_action('wp_enqueue_scripts', 'aw_add_runonload', 8);
add_action('wp_enqueue_scripts', 'aw_add_cform', 9);	
add_action('wp_enqueue_scripts', 'aw_add_onebyone', 10);
add_action('wp_enqueue_scripts', 'aw_add_touchwipe', 11);
add_action('wp_enqueue_scripts', 'aw_add_flexslider', 11);
add_action('wp_enqueue_scripts', 'aw_add_fitmap', 12);	
add_action('wp_enqueue_scripts', 'aw_add_customheader', 13);
add_action('wp_enqueue_scripts', 'aw_add_idtabs', 14);	
add_action('wp_enqueue_scripts', 'aw_add_mobilemenu', 15);	
add_action('wp_enqueue_scripts', 'aw_add_fluidvids', 16);	
add_action('wp_enqueue_scripts', 'aw_add_custom', 17);
add_action( 'admin_enqueue_scripts', 'awesome_admin_register' ); 
add_action( 'comment_form_before', 'awesome_enqueue_comment_reply_script' );

?>