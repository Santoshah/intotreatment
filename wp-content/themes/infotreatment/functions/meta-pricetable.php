<?php

$meta_boxes[] = array(

	'id' => 'awesome-meta-box-4',
	'title' => __('Details', 'awesome'),
	'pages' => array('price_table'), // multiple post types, accept custom post types
	'context' => 'normal', // normal, advanced, side (optional)
	'priority' => 'high', // high, low (optional)
	'fields' => array(
	
		array(
			'name' => __('Currency', 'awesome'),
			'id' => $prefix4 . 'curency',
			'type' => 'text',
			'std' => ''
		),	
		array(
			'name' => __('Price', 'awesome'),
			'id' => $prefix4 . 'price',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Time Range', 'awesome'),
			'id' => $prefix4 . 'trange',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Description', 'awesome'),
			'desc' => __('Type description here.', 'awesome'),
			'id' => $prefix4 . 'desc',
			'type' => 'textarea',
			'std' => ''
		),		
		array(
			'name' => __('Button URL', 'awesome'),
			'id' => $prefix4 . 'surl',
			'type' => 'text',
			'std' => 'http://'
		),		
		array(
			'name' => __('More details', 'awesome'),
			'id' => $prefix4 . 'slink',
			'type' => 'text',
			'std' => ''
		),		
		array(
			'name' => __('Highlight', 'awesome'),
			'id' => $prefix4 . 'active',
			'type' => 'checkbox',
		),	
		array(
			'name' => __('Detail 1', 'awesome'),
			'id' => $prefix4 . 'detail1',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Detail 2', 'awesome'),
			'id' => $prefix4 . 'detail2',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Detail 3', 'awesome'),
			'id' => $prefix4 . 'detail3',
			'type' => 'text',
			'std' => ''
		),			
		array(
			'name' => __('Detail 4', 'awesome'),
			'id' => $prefix4 . 'detail4',
			'type' => 'text',
			'std' => ''
		),		
		array(
			'name' => __('Detail 5', 'awesome'),
			'id' => $prefix4 . 'detail5',
			'type' => 'text',
			'std' => ''
		),	
		array(
			'name' => __('Detail 6', 'awesome'),
			'id' => $prefix4 . 'detail6',
			'type' => 'text',
			'std' => ''
		)		
	
	)
);	

?>