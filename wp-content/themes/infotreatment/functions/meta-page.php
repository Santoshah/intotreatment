<?php

$meta_boxes[] = array(

	'id' => 'awesome-meta-box-5',
	'title' => __('Page Extra Informations', 'awesome'),
	'pages' => array('page'), // multiple post types, accept custom post types
	'context' => 'normal', // normal, advanced, side (optional)
	'priority' => 'high', // high, low (optional)
	'fields' => array(
	
		array(
			'name' => __('Tagline', 'awesome'),
			'desc' => __('Type tagline here.', 'awesome'),
			'id' => $prefix5 . 'tagline',
			'type' => 'textarea',
			'std' => ''
		),	
		array(
			'name' => __('Display in portolio frontpage', 'awesome'),
			'desc' => __('Type tagline here.', 'awesome'),
			'id' => $prefix5 . 'portfolio_frontpage',
			'type' => 'select',
			'std' => 'no',
			'options' => array(	
				array('name' => __('No', 'awesome'), 'value' => 'no'),
				array('name' => __('Yes', 'awesome'), 'value' => 'yes')	
				),				
		)			
	
	)

);

?>