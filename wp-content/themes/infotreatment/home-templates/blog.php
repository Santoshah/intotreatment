<div class="main">
						<div class="container">
							<div class="row">	
								
								<?php					
									if(of_get_option('aw_blog_ajax') == 'yes'){  
										echo '<div id="loading-animation" style="display: none;">loading..</div>';
										echo '<div id="ajax_post_container"></div>';										
										get_template_part('home', 'blog-loop-ajax'); 
									} else {
										get_template_part('home', 'blog-loop');
									}
								?>
								
								<?php get_template_part('home', 'sidebar'); ?>
							
							</div><!-- /.row -->
						</div><!-- /.container -->
					</div><!-- /.main -->	