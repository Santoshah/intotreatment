<?php

/*-----------------------------------------------------------------------------------*/
/* Content in site's header
/*-----------------------------------------------------------------------------------*/
add_action('wp_head', 'aw_header_functions', 100);
function aw_header_functions() {  

	echo "\n"; 
	if ( is_single() ) {
		$ogp_type = 'article';
	} else {
		$ogp_type = 'website';
	}	
	
	if(of_get_option('aw_fb_share_thumb') !=''){
		$image = of_get_option('aw_fb_share_thumb');
	}else{
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
	}}
	
	
?>

	
<!-- Facebook Opengraph -->
<meta property="fb:admins" content="<?php if(of_get_option('aw_fb_user_id') !=''){echo of_get_option('aw_fb_user_id');}else{echo'663867876';} ?>"/>
<?php if(of_get_option('aw_fb_app_id') !=''){ ?>
<meta property="fb:app_id" content="<?php echo of_get_option('aw_fb_app_id'); ?>"/>
<?php } ?>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:title" content="<?php the_title(); ?>"/>
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>"/>
<meta property="og:type" content="<?php echo $ogp_type; ?>"/>
<meta property="og:image" content="<?php echo $image; ?>"/>
<meta property="og:locale" content="en_us"/>
<!-- // end of Facebook Opengraph -->	
	
	
<?php	echo "\n"; ?> 

<?php } ?>