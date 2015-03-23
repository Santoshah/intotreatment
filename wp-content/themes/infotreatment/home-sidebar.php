<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<div class="span4">
								<div class="sidebar">

									<?php
									if ( is_active_sidebar('home-sidebar') ) { ?>
									
										<?php dynamic_sidebar( 'home-sidebar' ); ?>
										
									<?php } else { ?>
									
										<div class="widget">
										
											 <?php the_widget('WP_Widget_Search'); ?> 
										
										</div><!-- /.widget -->
										
										<div class="widget">
										
											<?php the_widget('WP_Widget_Recent_Posts'); ?> 
										
										</div><!-- /.widget -->
										
										<div class="widget">
											<?php the_widget('WP_Widget_Recent_Comments'); ?> 
										</div><!-- /.widget -->
									
										<div class="widget">
										
											<h2 class="widgettitle"><?php _e('Archives', 'awesome'); ?></h4>
											<ul class="widget_archives">
												<?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => true ) ); ?>
											</ul>
										
										</div><!-- /.widget -->
										
										<div class="widget">
											
											<h2 class="widgettitle"><?php _e('Categories', 'awesome'); ?></h4>
											<ul class="widget_categories">
											<?php wp_list_categories('show_count=0&title_li=&show_last_update=1&use_desc_for_title=1');?>
											</ul>
											
										</div><!-- /.widget -->
										
										<div class="widget">
											<?php the_widget( 'WP_Widget_Tag_Cloud'); ?> 
										</div><!-- /.widget -->

										<div class="widget">
										
											<h2 class="widgettitle"><?php _e('Calendar', 'awesome'); ?></h4>
											<?php the_widget('WP_Widget_Calendar'); ?> 
											
										</div><!-- /.widget -->	
										
										<div class="widget">

											<?php the_widget('WP_Widget_Pages'); ?> 
											
										</div><!-- /.widget -->
										
										
										<div class="widget">
										
											<?php the_widget('WP_Widget_Meta'); ?> 
											
										</div><!-- /.widget" -->												
										
									<?php }; ?>							

							
							</div><!-- /#sidebar -->							
									
						</div><!-- /.span4 -->