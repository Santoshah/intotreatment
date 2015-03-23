<?php


/*-----------------------------------------------------------------------------------*/
/*	Clearer
/*-----------------------------------------------------------------------------------*/

if (!function_exists('awesome_clearer')) {
	function awesome_clearer( $atts = null ) {
	   return '<div class="clear" /></div>';
	}
	add_shortcode('awesome_clearer', 'awesome_clearer');
}

/*-----------------------------------------------------------------------------------*/
/*	Horizontal Line
/*-----------------------------------------------------------------------------------*/

if (!function_exists('awesome_horizontal_line')) {
	function awesome_horizontal_line( $atts = null ) {
	   return '<hr class="awesome_hline" />';
	}
	add_shortcode('awesome_horizontal_line', 'awesome_horizontal_line');
}


/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('awesome_one_third')) {
	function awesome_one_third( $atts, $content = null ) {
	   return '<div class="grid-3">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('awesome_one_third', 'awesome_one_third');
}

if (!function_exists('awesome_one_third_last')) {
	function awesome_one_third_last( $atts, $content = null ) {
	   return '<div class="grid-3 grid-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('awesome_one_third_last', 'awesome_one_third_last');
}

if (!function_exists('awesome_one_half')) {
	function awesome_one_half( $atts, $content = null ) {
	   return '<div class="grid-2">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('awesome_one_half', 'awesome_one_half');
}

if (!function_exists('awesome_one_half_last')) {
	function awesome_one_half_last( $atts, $content = null ) {
	   return '<div class="grid-2 grid-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('awesome_one_half_last', 'awesome_one_half_last');
}

if (!function_exists('awesome_one_fourth')) {
	function awesome_one_fourth( $atts, $content = null ) {
	   return '<div class="grid-4">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('awesome_one_fourth', 'awesome_one_fourth');
}

if (!function_exists('awesomeone_fourth_last')) {
	function awesome_one_fourth_last( $atts, $content = null ) {
	   return '<div class="grid-4 grid-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('awesome_one_fourth_last', 'awesome_one_fourth_last');
}

/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('awesome_button')) {
	function awesome_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'style' => 'grey',
			'size' => 'small',
			'target' => '_blank',
			'type' => '',
	    ), $atts));
		
	   return '<a target="'.$target.'" class="button '.$size.' '.$style.' '. $type .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('awesome_button', 'awesome_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('awesome_box')) {
	function awesome_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'type'   => 'alert'
	    ), $atts));
		
	   return '<div class="box '.$type.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('awesome_box', 'awesome_box');
}


/*-----------------------------------------------------------------------------------*/
/*	Lists
/*-----------------------------------------------------------------------------------*/

if (!function_exists('awesome_lists')) {
	function awesome_lists( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'arrow'
	    ), $atts));
		
	   return '<div class="list '.$style.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('awesome_lists', 'awesome_lists');
}

/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_toggle')) {
	function zilla_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"zilla-toggle\"><span class=\"zilla-toggle-title\">". $title ."</span><div class=\"zilla-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('zilla_toggle', 'zilla_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_tabs')) {
	function zilla_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="zilla-tabs-'. $i .'" class="zilla-tabs"><div class="zilla-tab-inner">';
			$output .= '<ul class="zilla-nav zilla-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#zilla-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'zilla_tabs', 'zilla_tabs' );
}

if (!function_exists('zilla_tab')) {
	function zilla_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="zilla-tab-'. sanitize_title( $title ) .'" class="zilla-tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'zilla_tab', 'zilla_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*	Contact Form Shortcodes
/*-----------------------------------------------------------------------------------*/

function nmedia_get_the_ip() {
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		return $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
	else {
		return $_SERVER["REMOTE_ADDR"];
	}
}

// cform shortcode
function nmedia_contact_form($atts) {
	extract(shortcode_atts(array(
		"email" => of_get_option('aw_mailadmin'),
		"subject" => '',
		"label_name" => 'Your Name',
		"label_email" => 'Your E-mail Address',
		"label_subject" => 'Website',
		"label_message" => 'Your Message',
		"label_submit" => 'Submit',
		"error_empty" => 'Please fill in all the required fields.',
		"error_noemail" => 'Please enter a valid e-mail address.',
		"success" => 'Thanks for your e-mail! We\'ll get back to you as soon as we can.'
	), $atts));

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error = false;
		$required_fields = array("your_name", "email", "message");

		foreach ($_POST as $field => $value) {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			}
			$form_data[$field] = strip_tags($value);
		}

		foreach ($required_fields as $required_field) {
			$value = trim($form_data[$required_field]);
			if(empty($value)) {
				$error = true;
				$result = $error_empty;
			}
		}

		if(!is_email($form_data['email'])) {
			$error = true;
			$result = $error_noemail;
		}

		if ($error == false) {
			$email_subject = "[" . get_bloginfo('name') . "] Contact Form Submission from " . $form_data['your_name'];
			$email_message = "Name: " . $form_data['your_name'] . "\n\n Email: " . $form_data['email'] . " \n\n Comments: " . $form_data['message'] . "\n\nIP: " . nmedia_get_the_ip(); 
			$headers  = "From: ".$form_data['your_name']." <".$form_data['email'].">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			wp_mail($email, $email_subject, $email_message, $headers);
			$result = $success;
			$sent = true;
		}
	}

	if(@$result != "") {
		$info = '<div class="info">'.$result.'</div>';
	} 
	$email_form = '<div class="awesome-contact-form">
	<form action="' . esc_url( home_url( '/' ) ) . '" id="contact-form" method="post">
    <p>  <label for="contactName">Name</label>
        <input type="text" name="your_name" id="cf_name" size="50" maxlength="50" value="' .@$form_data['your_name']. '" placeholder="' . $label_name . '" />
    </p>
    <p>	<label for="email">Email</label>
        <input type="text" name="email" id="cf_email" size="50" maxlength="50" value="' .@$form_data['email']. '" placeholder="' . $label_email . '" />
    </p>
	<p>  <label for="commentsText">Comments</label>
        <textarea name="message" id="cf_message" cols="50" rows="3" placeholder="' . $label_message . '">' .@$form_data['message']. '</textarea>
    </p>
    <p>
        <input type="submit" value="' . $label_submit . '" name="send" id="cf_send" />
    </p>
	</form>
	</div>';
	
	if(@$sent == true) {
		return $info;
	} else {
		return @$info.$email_form;
	}
} 

add_shortcode('nmedia_cform', 'nmedia_contact_form');

?>