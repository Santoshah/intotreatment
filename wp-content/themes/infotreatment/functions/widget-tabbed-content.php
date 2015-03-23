<?php


add_action( 'widgets_init', 'aw_tabbed_widget' );


function aw_tabbed_widget() {
	register_widget( 'Awesome_Tabbed_Widget' );
}


class Awesome_Tabbed_Widget extends WP_Widget {







	function Awesome_Tabbed_Widget() {
		$widget_ops = array( 'classname' => 'cs', 'description' => __('Display tabbed contents in the sidebar.', 'awesome') );
		
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'tabbed-widget' );
		
		$this->WP_Widget( 'tabbed-widget', __('Awesome: Tabbed Contents', 'awesome'), $widget_ops, $control_ops );
	}

	
	
	
	/* Output */
	function widget( $args, $instance ) {
		extract( $args );		
		
		//Our variables from the widget settings.

		$popular_tab = $instance['popular_tab'];
		$recent_tab = $instance['recent_tab'];
		$comments_tab = $instance['comments_tab'];
		$tags_tab = $instance['tags_tab'];

?>				
			
				
			
				
	
<div id="tabwidget"> 
  <ul id="tabnav"> 
  
	<?php if($popular_tab !='') { ?> 
    <li><a href="#tab1" class="selected"><?php _e('Popular', 'awesome'); ?></a></li>
	<?php } ?>
	<?php if($recent_tab !='') { ?> 
    <li><a href="#tab2"><?php _e('Recent', 'awesome'); ?></a></li>
	<?php } ?>	
	<?php if($comments_tab !='') { ?> 
    <li><a href="#tab3"><?php _e('Comments', 'awesome'); ?></a></li>
	<?php } ?>
	<?php if($tags_tab !='') { ?> 
    <li><a href="#tab4"><?php _e('Tags', 'awesome'); ?></a></li> 
	<?php } ?>

	
  </ul> 
  
	<div id="tab-content">
	
	<?php if($popular_tab !='') { ?> 
		  <div id="tab1" style="display: block; ">
		  
			<ul class="recent-tab">
				<?php 
				
				$limit = $popular_tab;
				
				$temp_query = $wp_query;
				
				$args = array( 
					'posts_per_page' => $limit, 
					'meta_key' => 'wpb_post_views_count', 
					'orderby' => 'wpb_post_views_count', 
					'order' => 'DESC' 
				);
				
				$wp_query = new WP_Query($args);
				
				while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				
					<li>
						<?php if ( has_post_thumbnail() ) { ?>
						<?php $get_img_mini = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumb-mini');	?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $get_img_mini[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $get_img_mini[1]; ?>" height="<?php echo $get_img_mini[2]; ?>" /></a>
						<?php } ?>							
						<a href="<?php the_permalink() ?>" title="Permanent Link to: <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <br />
						<span class="side-meta">	

						<?php 
						printf(__('<span class="aside-date"><span>%1$s </span><span>%2$s</span></span>', 'awesome'),
							get_the_date( 'j' ),
							get_the_date( 'M Y' )
						);
						?>							
							
						
						</span>					
						
						<?php wpb_get_post_views(get_the_ID()); ?>
					</li>
						
				<?php endwhile; ?>
				<?php if (isset($wp_query)) {$wp_query = $temp_query;} ?>
			</ul>
			<!-- End most viewed post -->		  
		  
		  </div><!-- /#tab1 -->
	<?php } ?>	  

	<?php if($recent_tab !='') { ?> 
		  <div id="tab2" style="display: none; ">	
			
			<?php 
			
			$limit = $recent_tab;
			$temp_query = $wp_query;
			
			$args = array( 
				'posts_per_page' => $limit
			);
			
			$wp_query = new WP_Query($args);
			
			?>
			
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>									
				
			<ul class="recent-tab">
			
			<li>
				<?php if ( has_post_thumbnail() ) { ?>
				<?php $get_img_mini = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumb-mini');	?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $get_img_mini[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $get_img_mini[1]; ?>" height="<?php echo $get_img_mini[2]; ?>" /></a>
				<?php } ?>			
				<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br />
				
					<span class="side-meta">	

					<?php 
					printf(__('<span class="aside-date"><span>%1$s </span><span>%2$s</span></span>', 'awesome'),
						get_the_date( 'j' ),
						get_the_date( 'M Y' )
					);
					?>							
					
					</span>				
					
			</li>
			<?php endwhile; 
			if (isset($wp_query)) {$wp_query = $temp_query;} // restore loop?>			
		  
		  </ul> 
		  
		 </div><!-- /#tab2 --> 
	<?php } ?>	  
	  	
	<?php if($comments_tab !='') { ?>  
		  <div id="tab3" style="display: none; ">
		  
				<?php
				global $wpdb;
				$limit = $comments_tab;
				$pre_HTML = null;
				$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
				comment_post_ID, comment_author, comment_date_gmt, comment_approved,
				comment_type,comment_author_url,
				SUBSTRING(comment_content,1,30) AS com_excerpt
				FROM $wpdb->comments
				LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
				$wpdb->posts.ID)
				WHERE comment_approved = '1' AND comment_type = '' AND
				post_password = ''
				ORDER BY comment_date_gmt DESC
				LIMIT $limit";
				$comments = $wpdb->get_results($sql);
				$output = $pre_HTML;
				$output .= "\n<ul>";
				foreach ($comments as $comment) {
				$output .= "\n<li><span class=\"author\">".strip_tags($comment->comment_author)
				."</span> on " . "<a href=\"" . get_permalink($comment->ID) .
				"#comment-" . $comment->comment_ID . "\" title=\" View comment \">" . strip_tags($comment->com_excerpt)
				."</a></li>";
				}
				$post_HTML = null;
				$output .= "\n</ul>";
				$output .= $post_HTML;
				echo $output;?>
		  
		  </div><!-- /#tab2 --> 
	<?php } ?>		
		  
		  
	<?php if($tags_tab !='') { ?>  
		  <div id="tab4" style="display: none; ">		  
			
		<?php if ( function_exists('wp_tag_cloud') ) : ?>		  
			<div class="tag-clouds-tab">
			<?php 
			  $limit = $tags_tab;
			  $args = array(
				'taxonomy'  => array('post_tag'), 
				'smallest'  => 10,
				'largest'  => 10,
				'format' => 'flat',		
				'number' => $limit
			   ); 
			   
			  wp_tag_cloud($args);
			?>
			</div>
		<?php endif; ?>			
		  
		  </div><!-- /#tab3 -->   
	<?php } ?>	  
		  
		  
	</div><!-- /#tab-content -->
 
</div><!-- /#usual1 --> 
	
				
				
				
				
				
				
				
				
				
			
<?php
		
		
		
	}	
	
	
	
	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and text to remove HTML 
		
		$instance['popular_tab'] = strip_tags($new_instance['popular_tab']);
		$instance['recent_tab'] = strip_tags($new_instance['recent_tab']);
		$instance['comments_tab'] = strip_tags($new_instance['comments_tab']);
		$instance['tags_tab'] = strip_tags($new_instance['tags_tab']);
		
		return $instance;
	}
	
	
	
	
	
	// Form
	
	
	
	function form( $instance ) {
	
	
		//Set up some default widget settings.
		$defaults = array( 
			'popular_tab' => __(5, null),
			'recent_tab' => __(5, null),
			'comments_tab' => __(5, null),
			'tags_tab' => __(5, null)
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
		
		<p class="description"><?php echo _e('Specify number of items to display or leave blank to hide.', 'awesome'); ?></p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'popular_tab' ); ?>"><?php _e('Popular Posts:', 'awesome'); ?></label>
			<input id="<?php echo $this->get_field_id( 'popular_tab' ); ?>" name="<?php echo $this->get_field_name( 'popular_tab' ); ?>" value="<?php echo $instance['popular_tab']; ?>" size="3" type="text" />
		</p>	

		
		<p>
			<label for="<?php echo $this->get_field_id( 'recent_tab' ); ?>"><?php _e('Recent Posts:', 'awesome'); ?></label>
			<input id="<?php echo $this->get_field_id( 'recent_tab' ); ?>" name="<?php echo $this->get_field_name( 'recent_tab' ); ?>" value="<?php echo $instance['recent_tab']; ?>" size="3" type="text" />
		</p>	

		
		<p>
			<label for="<?php echo $this->get_field_id( 'comments_tab' ); ?>"><?php _e('Comments:', 'awesome'); ?></label>
			<input id="<?php echo $this->get_field_id( 'comments_tab' ); ?>" name="<?php echo $this->get_field_name( 'comments_tab' ); ?>" value="<?php echo $instance['comments_tab']; ?>" size="3" type="text">			
		</p>	

		
		<p>
			<label for="<?php echo $this->get_field_id( 'tags_tab' ); ?>"><?php _e('Tags:', 'awesome'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tags_tab' ); ?>" name="<?php echo $this->get_field_name( 'tags_tab' ); ?>" value="<?php echo $instance['tags_tab']; ?>" size="3" type="text">
		</p>			
		
		
		
	
	
	<?php }
	
	
	




}






?>