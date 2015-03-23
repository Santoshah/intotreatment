				<div class="portfolio-main">
					<div class="container">
						<div class="row">
							<div class="span12">
							
							
							<?php

										// Additional by me for AJAXING
										
										$count = 0;
										$id_suffix = 1;		
										$items_per_row = 4;				
										$terms = get_terms( 'portfolio_category' ); 
										$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
										$temp_query = $wp_query;
										$args = array(
											'posts_per_page' => '-1', 
											'post_type' => 'portfolio', 
											'paged'=>$paged 
										);				
										$wp_query = new WP_Query($args);
										$count_terms = count( $terms ); 		



							?>

								<div id="project-wrapper"></div>
								
								<ul class="portfolio-sort">
									<li><a href="#" class="active all"><?php _e('All', 'awesome'); ?></a></li>
									
									<?php if ( $count_terms > 0 ) { ?>
									<?php foreach ( $terms as $term ) { ?>	
									<li>
										<a class="<?php echo $term->slug; ?>" href="#" title="<?php printf ( __( 'View all items filed under %s', 'awesome' ), $term->name ); ?>"><?php echo $term->name; ?></a>
									</li>
									<?php }} ?>	
									
									<div id="overlay">&nbsp;</div>
									
								</ul><!-- /.portfolio-sort -->		

								<!-- Portfolio gallery starts here -->
								
								<div class="portfolio-lists">
									
									
									<?php while ( $wp_query->have_posts()) : $wp_query->the_post(); //query the "portfolio" custom post type for portfolio items ?>		
									
									<?php
										$count=0;
										$count++;
										//get portfolio image
										$portfolio_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-thumb');	
									?>			

										<div class="portfolio-item" data-id="id-<?php echo $id_suffix; ?>" <?php $terms = get_the_terms( $post -> ID, 'portfolio_category' ); if ( !empty( $terms ) ) { echo 'data-group="'; foreach( $terms as $term ) { echo $term -> slug . ' '; } echo '"'; } ?>>
										

										<div class="project-image">   										
											
											<?php $nonce = wp_create_nonce("portfolio_item_nonce"); ?>
											
											<a class="quick-portfolio-details" href="<?php the_permalink(); ?>" data-post_id="<?php echo $post->ID; ?>" data-nonce="<?php echo $nonce; ?>">	
											
												<img src="<?php echo $portfolio_img[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $portfolio_img[1]; ?>" height="<?php echo $portfolio_img[2]; ?>" />
												
											</a>
											
											<span class="blocked-project-overlay"></span>	
											
										</div>						
										
										<a href="<?php the_permalink(); ?>" class="port-title"><?php the_title(); ?></a>
										<p><?php echo awesome_excerpt(11); ?></p>												

																			
										
									</div><!-- /.portfolio-item -->	

									<?php if( $count === $items_per_row ) { // if the current row is filled out with columns, reset the count variable ?>
										
										<?php $count = 0; ?> 
										 
									<?php } ?>
									<?php $id_suffix++; ?>				
									
									<?php endwhile; if (isset($wp_query)) {$wp_query = $temp_query;} ?>
								
								</div><!-- /.portfolio-lists -->
								
								<!-- Portfolio gallery ends here -->								
								
							</div><!-- /.span12 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.portfolio-main -->		