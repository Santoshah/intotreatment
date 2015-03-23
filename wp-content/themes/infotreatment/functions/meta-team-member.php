<?php

$meta_boxes[] = array(

	'id' => 'awesome-meta-box-3',
	'title' => __('Team Member Details', 'awesome'), 
	'pages' => array('team_member'), // multiple post types, accept custom post types
	'context' => 'normal', // normal, advanced, side (optional)
	'priority' => 'high', // high, low (optional)
	'fields' => array(
	
		array(
			'name' => __('Position', 'awesome'),
			'id' => $prefix3 . 'position',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Phone', 'awesome'),
			'id' => $prefix3 . 'phone',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Short Biography', 'awesome'),
			'desc' => __('Type description here.', 'awesome'),
			'id' => $prefix3 . 'bio',
			'type' => 'textarea',
			'std' => ''
		),				
		array(
			'name' => __('Twiter URL', 'awesome'),
			'id' => $prefix3 . 'twitter',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Facebook URL', 'awesome'),
			'id' => $prefix3 . 'fb',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Flickr URL', 'awesome'),
			'id' => $prefix3 . 'flickr',
			'type' => 'text',
			'std' => ''
		),		
		array(
			'name' => __('Email', 'awesome'),
			'id' => $prefix3 . 'email',
			'type' => 'text',
			'std' => ''
		)	
	
	)
	
);	

?>