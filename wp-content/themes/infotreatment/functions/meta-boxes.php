<?php 
/**
 * Display the metabox
 */
function url_custom_metabox() {
	global $post;
	$urllink = get_post_meta( $post->ID, 'urllink', true );
	$urldesc = get_post_meta( $post->ID, 'urldesc', true );

	if ( !preg_match( "/http(s?):\/\//", $urllink )) {
		$errors = 'Url not valid';
		$urllink = 'http://';
	} 

	// output invlid url message and add the http:// to the input field
	if( $errors ) { echo $errors; } ?>

	<div class="awesome_meta_boxes">
	<p><label for="siteurl"><?php echo _e('URL:', 'awesome'); ?><br />
		<input id="siteurl" size="37" name="siteurl" value="<?php if( $urllink ) { echo $urllink; } ?>" /></label></p>
	<p><label for="urldesc"><?php echo _e('Link Text:', 'awesome'); ?><br />
		<input id="urldesc" size="37" name="urldesc" value="<?php if( $urldesc ) { echo $urldesc; } ?>" /></label></p>
	</div>	
<?php
}

/**
 * Process the custom metabox fields
 */
function save_custom_url( $post_id ) {
	global $post;	

	if( $_POST ) {
		update_post_meta( $post->ID, 'urllink', $_POST['siteurl'] );
		update_post_meta( $post->ID, 'urldesc', $_POST['urldesc'] );
	}
}

// Add action hooks. Without these we are lost
add_action( 'admin_init', 'add_custom_metabox' );
add_action( 'save_post', 'save_custom_url' );

/**
 * Add meta box
 */
function add_custom_metabox() {
	add_meta_box( 'custom-metabox', __( 'Sider Link', 'awesome' ), 'url_custom_metabox', 'slide', 'normal', 'high' );
}


/**
 * Get and return the values for the URL and description
 */
function get_url_desc_box() {
	global $post;
	$urllink = get_post_meta( $post->ID, 'urllink', true );
	$urldesc = get_post_meta( $post->ID, 'urldesc', true );

	return array( $urllink, $urldesc );
}

// get the array of data
$urlbox = get_url_desc_box();

echo $urlbox[0]; // echo out the url of a post
echo $urlbox[1]; // echo out the url description of a post
