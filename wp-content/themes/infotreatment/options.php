<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'awesome'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'awesome'),
		'two' => __('Two', 'awesome'),
		'three' => __('Three', 'awesome'),
		'four' => __('Four', 'awesome'),
		'five' => __('Five', 'awesome')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'awesome'),
		'two' => __('Pancake', 'awesome'),
		'three' => __('Omelette', 'awesome'),
		'four' => __('Crepe', 'awesome'),
		'five' => __('Waffle', 'awesome')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	
	$options = array();
			

	$options[] = array(
		'name' => __('General', 'awesome'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Select Skin', 'awesome'),
		'desc' => __('To activate it, make sure "Custom Skin" option below is clear.', 'awesome'),		
		'id' => 'select_skin',
		'std' => 'two',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'green' => 'Green',
			'orange' => 'Orange',
			'red' => 'Red',
			'blue' => 'Blue',
			'violet' => 'Violet',
			)
		);		
		
	$options[] = array(
		'name' => __('Custom Skin', 'awesome'),
		'desc' => __('Pick a color or just write a hexademical code.', 'awesome'),		
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );		
		
	$options[] = array(
		'name' => __('Google Font URL', 'awesome'),
		'desc' => __("Find <a href=\"http://www.google.com/webfonts\" target=\"_blank\">Google font URLs</a> here. <em>Example: http://fonts.googleapis.com/css?family=Metrophobic</em>", 'awesome'),		
		'id' => 'aw_gfont_url',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Google Font Family CSS Rule', 'awesome'),
		'desc' => __("Paste CSS rules to define Google font family. <em>Example: font-family: 'Metrophobic', Arial, serif;</em>", 'awesome'),				
		'id' => 'aw_gfont',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Favicon', 'awesome'),
		'desc' => __('Upload your website favicon image.', 'awesome'),
		'id' => 'aw_favicon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Logo', 'awesome'),
		'desc' => __('Upload your website logo image.', 'awesome'),
		'id' => 'aw_logo',
		'type' => 'upload');		
		
	$options[] = array(
		'name' => __('Archive Page Style', 'awesome'),
		'desc' => __('Select style.', 'awesome'),
		'id' => 'aw_archive_style',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'one-column' => 'One Column',
			'two-column' => 'Two Column')
		);		
	
		
	$options[] = array(
		'name' => __('Footer Credit', 'awesome'),
		'desc' => __('Custom footer credit.', 'awesome'),
		'id' => 'aw_fcredit',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'name' => __('About Your Company', 'awesome'),
		'type' => 'info');			
		
	$options[] = array(
		'name' => __('Company Name', 'awesome'),
		'desc' => __('Write your company name.', 'awesome'),		
		'id' => 'aw_cname',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Address', 'awesome'),
		'desc' => __('Write your company address.', 'awesome'),				
		'id' => 'aw_caddress',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Secondary Address', 'awesome'),
		'desc' => __('Write your company secondary address.', 'awesome'),			
		'id' => 'aw_secondary_caddress',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('State Name, Country Name', 'awesome'),
		'desc' => __('Write your state and country name of company address.', 'awesome'),				
		'id' => 'aw_ccountry',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Map', 'awesome'),
		'desc' => __('Paste your Google map embed codes here.', 'awesome'),		
		'id' => 'aw_map',
		'std' => '',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Tagline', 'awesome'),
		'desc' => __('Write your company tagline.', 'awesome'),				
		'id' => 'aw_ctagline',
		'std' => '',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Description', 'awesome'),
		'desc' => __('Write your company description.', 'awesome'),						
		'id' => 'aw_cdesc',
		'std' => '',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Image', 'awesome'),
		'desc' => __('Select a photo of your company.', 'awesome'),				
		'id' => 'aw_cimg',
		'type' => 'upload');			
		
	$options[] = array(
		'name' => __('Social Media', 'awesome'),
		'type' => 'info');				
		
	$options[] = array(
		'name' => __('Twitter', 'awesome'),
		'desc' => __('Twitter profile URL.', 'awesome'),
		'id' => 'aw_twitter',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook', 'awesome'),
		'desc' => __('Facebook profile URL.', 'awesome'),
		'id' => 'aw_fb',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Flickr', 'awesome'),
		'desc' => __('Flickr profile URL', 'awesome'),
		'id' => 'aw_flickr',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('RSS', 'awesome'),
		'desc' => __('RSS feed URL.', 'awesome'),
		'id' => 'aw_rss',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Built-in SEO fields', 'awesome'),
		'type' => 'info');		
		
	$options[] = array(
		'name' => __('Meta Description', 'awesome'),
		'desc' => __('Site meta description content.', 'awesome'),					
		'id' => 'aw_seodesc',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'name' => __('Meta Keywords', 'awesome'),
		'desc' => __('Site meta keywords content.', 'awesome'),				
		'id' => 'aw_seokeywords',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Tracking Codes', 'awesome'),
		'type' => 'info');				
		
	$options[] = array(
		'name' => __('Google Analytics or Other Tracking Codes', 'awesome'),
		'desc' => __('Paste your Google Analytics or other tracking code.', 'awesome'),		
		'id' => 'aw_ga',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'name' => __('Home Settings', 'awesome'),
		'type' => 'heading');	
		
	$options[] = array(
		'name' => __('Frontpage Template', 'awesome'),
		'desc' => __('Select a template for your site\'s frontpage.', 'awesome'),				
		'id' => 'aw_layout',
		'std' => 'portfolio',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'regular' => 'Regular Template',
			'portfolio' => 'Portfolio Template')
		);		
				
				
	$options[] = array(
		'name' => __('Ajax Load of Blog Post Content', 'awesome'),
		'desc' => __('Enable/disable ajax load of post content in Blog section in portfolio frontpage.', 'awesome'),				
		'id' => 'aw_blog_ajax',
		'std' => 'no',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'no' => 'No',
			'yes' => 'Yes')
		);					
		

	$options[] = array(
		'name' => __('Multi Sliders', 'awesome'),
		'type' => 'heading');	
		
	
	$options[] = array(
		'name' => __('Select Slider Type', 'awesome'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('One by One Slider', 'awesome'),
		'desc' => __('Check to activate and display setting.', 'awesome'),
		'id' => 'select_1',
		'std' => 1,
		'type' => 'checkbox');		
	
	
	$options[] = array(
		'name' => __('Flex Slider', 'awesome'),
		'desc' => __('Check to activate and display setting.', 'awesome'),
		'id' => 'select_2',
		'type' => 'checkbox');			
		
	
	$options[] = array(
		'name' => __('Slider Settings', 'awesome'),
		'type' => 'info');		
		

	$options[] = array(
		'name' => __('Enable Drag', 'awesome'),
		'desc' => __('Select "True" to enable or "False" to disable.', 'awesome'),			
		'id' => 'slide_drag',
		'type' => 'select',
		'class' => 'hidden10',
		'std' => 'true',		
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);		

	$options[] = array(
		'name' => __('Show Arrow', 'awesome'),
		'desc' => __('Select "True" to enable or "False" to disable.', 'awesome'),				
		'id' => 'slide_arrow',
		'type' => 'select',
		'class' => 'hidden10',
		'std' => 'true',
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);	

	$options[] = array(
		'name' => __('Show Button', 'awesome'),
		'desc' => __('Select "True" to show or "False" to hide slider button.', 'awesome'),					
		'id' => 'slide_btn',
		'type' => 'select',
		'class' => 'hidden10',
		'std' => 'true',
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);		

	$options[] = array(
		'name' => __('Auto Play', 'awesome'),
		'desc' => __('Select "True" to enable or "False" to disable slider items auto played.', 'awesome'),			
		'id' => 'slide_slideshow',
		'type' => 'select',
		'class' => 'hidden10',
		'std' => 'true',
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);		

	$options[] = array(
		'name' => __('Slide Delay', 'awesome'),
		'desc' => __('Set slider items delay (per milisecond).', 'awesome'),
		'id' => 'slide_delay',
		'std' => '3000',
		'class' => 'hidden10',
		'type' => 'text'
	);	

	$options[] = array(
		'name' => __('Animation', 'awesome'),
		'desc' => __('Set slider animation style. ', 'awesome'),		
		'id' => 'slide_animation',
		'type' => 'select',
		'class' => 'hidden10',
		'std' => 'Random',
		'options' => array(
			'fadeIn' => 'Fade In',
			'fadeInUp' => 'Fade In Up',
			'fadeInLeft' => 'Fade In Left',
			'fadeInRight' => 'Fade In Right',
			'bounceIn' => 'Bounce In',
			'bounceInDown' => 'Bounce In Down',
			'bounceInUp' => 'Bounce In Up',
			'bounceInLeft' => 'Bounce In Left',
			'bounceInRight' => 'Bounce In Right',
			'rotateIn' => 'RotateIn',
			'rotateDownLeft' => 'Rotate Down Left',
			'rotateInUpLeft' => 'Rotate In Up Left',
			'rotateInUpRight' => 'Rotate In Up Right',
			'random' => 'Random')	
	);		
	
		
	/* Flex Settings */

	$options[] = array(
		'name' => __('Animation', 'awesome'),
		'desc' => __('Set slider animation style. ', 'awesome'),				
		'id' => 'flex_animation',
		'type' => 'select',
		'class' => 'hidden20',
		'std' => 'slide',		
		'options' => array(
			'fade' => 'Fade',
			'slide' => 'Slide')
		);		
		
		
	$options[] = array(
		'name' => __('Auto Play', 'awesome'),
		'desc' => __('Select "True" to enable or "False" to disable slider items auto played.', 'awesome'),						
		'id' => 'flex_autoplay',
		'type' => 'select',
		'class' => 'hidden20',
		'std' => 'slide',		
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);			
		
	$options[] = array(
		'name' => __('Slideshow Speed', 'awesome'),
		'desc' => __('Set slider items delay (per milisecond).', 'awesome'),
		'id' => 'flex_slide_speed',
		'std' => '7000',
		'class' => 'hidden20',
		'type' => 'text'
	);			
		
	$options[] = array(
		'name' => __('Animation Speed', 'awesome'),
		'desc' => __('Set slider animation speed (per milisecond).', 'awesome'),
		'id' => 'flex_animation_speed',
		'std' => '700',
		'class' => 'hidden20',
		'type' => 'text'
	);			
		
	$options[] = array(
		'name' => __('Show Arrow', 'awesome'),
		'desc' => __('Select "True" to enable or "False" to disable.', 'awesome'),				
		'id' => 'flex_show_direction',
		'type' => 'select',
		'class' => 'hidden20',
		'std' => 'true',
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);	

	$options[] = array(
		'name' => __('Show Button', 'awesome'),
		'desc' => __('Select "True" to show or "False" to hide slider button.', 'awesome'),					
		'id' => 'flex_show_control',
		'type' => 'select',
		'class' => 'hidden20',
		'std' => 'true',
		'options' => array(
			'true' => 'True',
			'false' => 'False')
		);			

	$options[] = array(
		'name' => __('Contact', 'awesome'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Quick Contact', 'awesome'),
		'desc' => __('Displayed in header, in right side of main menu.', 'awesome'),
		'type' => 'info');		

	$options[] = array(
		'name' => __('Email', 'awesome'),
		'desc' => __('Write an email address which will be displayed at the top of your site.', 'awesome'),				
		'id' => 'aw_mailtop',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Phone', 'awesome'),
		'desc' => __('Write a phone number which will be displayed at the top of your site.', 'awesome'),				
		'id' => 'aw_phonetop',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('More Contact Details', 'awesome'),
		'type' => 'info');				
		
	$options[] = array(
		'name' => __('Phone number 1', 'awesome'),
		'desc' => __('Write your phone number 1 which will be displayed at the contact section.', 'awesome'),
		'id' => 'aw_pnumber',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone number 2', 'awesome'),
		'desc' => __('Write your phone number 2 which will be displayed at the contact section.', 'awesome'),
		'id' => 'aw_pnumber2',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Email address 1', 'awesome'),
		'desc' => __('Write your email address 1 which will be displayed at the contact section.', 'awesome'),
		'id' => 'aw_mail',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Email address 2', 'awesome'),
		'desc' => __('Write your email address 2 which will be displayed at the contact section.', 'awesome'),
		'id' => 'aw_mail2',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Contact Form', 'awesome'),
		'type' => 'info');				
		
	$options[] = array(
		'name' => __('Email Admin', 'awesome'),
		'desc' => __('Write your email address admin for contact form', 'awesome'),
		'id' => 'aw_mailadmin',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		

	$options[] = array(
		'name' => __('Miscellaneous', 'awesome'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Motto', 'awesome'),
		'desc' => __('Write your company motto.', 'awesome'),				
		'id' => 'aw_motto',
		'std' => '',
		'type' => 'text');			

	$options[] = array(
		'name' => __('Purchase Teaser Head', 'awesome'),
		'desc' => __('Write the purchase teaser title.', 'awesome'),				
		'id' => 'aw_purchase_hteaser',
		'std' => '',
		'type' => 'textarea');			

	$options[] = array(
		'name' => __('Purchase Teaser Content', 'awesome'),
		'desc' => __('Write the purchase teaser content.', 'awesome'),				
		'id' => 'aw_purchase_cteaser',
		'std' => '',
		'type' => 'textarea');	

	$options[] = array(
		'name' => __('Purchase Button Name', 'awesome'),
		'desc' => __('Write display name of the purchase button.', 'awesome'),				
		'id' => 'aw_purchase_btn',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');			

	$options[] = array(
		'name' => __('Purchase Button URL', 'awesome'),
		'desc' => __('URL address of the purchase button.', 'awesome'),				
		'id' => 'aw_purchase_url',
		'std' => 'http://',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Social Share Buttons', 'awesome'),
		'type' => 'info');			
		
	$options[] = array(
		'name' => __('Facebook', 'awesome'),
		'desc' => __('Check to display.', 'awesome'),
		'id' => 'aw_fb_share',
		'std' => '0',
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Twitter', 'awesome'),
		'desc' => __('Check to display.', 'awesome'),
		'id' => 'aw_twitter_share',
		'std' => '0',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Google+', 'awesome'),
		'desc' => __('Check to display.', 'awesome'),
		'id' => 'aw_googleplus_share',
		'std' => '0',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Pinterest', 'awesome'),
		'desc' => __('Check to display.', 'awesome'),
		'id' => 'aw_pinterest_share',
		'std' => '0',
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Facebook Share Options: User Account ID', 'awesome'),
		'desc' => __('Get you user account ID by going to the URL like this: http://graph.facebook.com/yourusername.', 'awesome'),
		'id' => 'aw_fb_user_id',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Facebook Share Options: Application ID', 'awesome'),
		'desc' => __('For business and/or brand sites use Insights on an App ID as to not associate it with a particular person. You can use this with or without the User ID field. Create an app and use the "App ID": <a href="https://www.facebook.com/developers/apps.php" target="_blank">Create FB App</a>.', 'awesome'),
		'id' => 'aw_fb_app_id',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Facebook Share Options: Default Thumbnail', 'awesome'),
		'desc' => __('Default image thumbnail in Facebook\'s sharer. We recommend to use 200x200 pixel image width .', 'awesome'),
		'id' => 'aw_fb_share_thumb',
		'type' => 'upload');				
		
	$options[] = array(
		'name' => __('Twitter Share Options: Via Account', 'awesome'),
		'desc' => __('Display your twiiter accout in tweet content.', 'awesome'),
		'id' => 'aw_twitter_share_via',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Twitter Share Options: Related Account', 'awesome'),
		'desc' => __('Related twitter account to follow.', 'awesome'),
		'id' => 'aw_twitter_share_related',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}