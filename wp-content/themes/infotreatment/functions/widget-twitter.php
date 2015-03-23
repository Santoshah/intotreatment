<?php

add_action( 'widgets_init', 'aw_twitter_widget' );


function aw_twitter_widget() {
	register_widget( 'Awesome_Twitter_Widget' );
}


class Awesome_Twitter_Widget extends WP_Widget {







	function Awesome_Twitter_Widget() {
		$widget_ops = array( 'classname' => 'twitter_widget', 'description' => __('Display latest tweets widget in the sidebar.', 'awesome') );
		
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'twitter-widget' );
		
		$this->WP_Widget( 'twitter-widget', __('Awesome: Latest Tweets', 'awesome'), $widget_ops, $control_ops );
	}

	
	
	
	/* Output */
	function widget( $args, $instance ) {
		extract( $args );		
		
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$twitter_username = $instance['twitter_username'];
		$twitter_number = $instance['twitter_number'];
		
		
		/* Output */
		
		echo $before_widget;		
		
			// Display the widget title 
			if ( $title )
				echo '<h2 class="widgettitle">'.$title.'</h2>';
				


			$username = $twitter_username;	
			$number = $twitter_number;
			
			if( $username || $number ) {
					
			$rss = file_get_contents("http://api.twitter.com/1/statuses/user_timeline.rss?screen_name={$username}&count={$number}");
			$xml = new simpleXMLElement($rss);
			$items = $xml->channel->item;
			echo '<ul>';
			foreach($items as $item) { 
			$parts = explode(' ',$item->description);
			$twit = str_replace($parts[0], "", $item->description);
			echo "<li>".ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" rel=\"nofollow\">\\0</a>", $twit) ."</li>"; 
			}	
			echo '</ul>';
			
			} else {
				echo _e('Cannot display tweets. The Twitter username is not specified.','awesome');
			}	



echo $after_widget;		
		
		
		
	}	
	
	
	
	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and text to remove HTML 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter_username'] = strip_tags($new_instance['twitter_username']);
		$instance['twitter_number'] = strip_tags($new_instance['twitter_number']);
		
		return $instance;
	}
	
	
	
	
	
	// Form
	
	
	
	function form( $instance ) {
	
	
		//Set up some default widget settings.
		$defaults = array( 
			'title' => __('Latest Tweets', 'awesome'), 
			'twitter_username' => __('', null),
			'twitter_number' => __('', null),
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	

		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'awesome'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" />
		</p>		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e('Twitter User Name:', 'awesome'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" value="<?php echo $instance['twitter_username']; ?>" type="text" />
		</p>			
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_number' ); ?>"><?php _e('Number of Tweets:', 'awesome'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_number' ); ?>" name="<?php echo $this->get_field_name( 'twitter_number' ); ?>" value="<?php echo $instance['twitter_number']; ?>" type="text" />
		</p>		
		
		
	
	<?php }
	
	
	




}






?>