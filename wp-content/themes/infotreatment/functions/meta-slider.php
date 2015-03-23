<?php

$meta_boxes[] = array(


	'id' => 'awesome-meta-box-2',
	'title' => __('Slider Content', 'awesome'),
	'pages' => array('slide'), // multiple post types, accept custom post types
	'context' => 'normal', // normal, advanced, side (optional)
	'priority' => 'high', // high, low (optional)
	'fields' => array(
	
		array(	
			'name' => __('Secondary title', 'awesome'),
			'desc' => '',
			'id' => $prefix2 . 'stitle',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Description', 'awesome'),
			'desc' => __('Type description here.', 'awesome'),
			'id' => $prefix2 . 'textarea',
			'type' => 'textarea',
			'std' => ''
		),		
		array(
			'name' => __('Slide URL', 'awesome'),
			'id' => $prefix2 . 'surl',
			'type' => 'text',
			'std' => 'http://'
		),
		array(
			'name' => __('Slide link text', 'awesome'),
			'id' => $prefix2 . 'slink',
			'type' => 'text',
			'std' => ''
		),		
		array(
			'name' => __('Image position', 'awesome'),
			'id' => $prefix2 . 'img_align',
			'type' => 'select',
			'std' => '',
			'options' => array(
				array('name' => __('Left', 'awesome'), 'value' => 'left'),
				array('name' => __('Right', 'awesome'), 'value' => 'right')	
				),
		)		
		
	
	)


); 

?>