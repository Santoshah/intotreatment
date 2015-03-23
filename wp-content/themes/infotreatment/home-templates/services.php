				<div class="about-main">
					<div class="container">
						<div class="row">
							<div class="span12">
								<ul class="apps-list">

									<?php
										//Get service post type
										global $post;
										$args = array(
											'post_type' =>'service',
											'numberposts' => '-1'
										);
										$service_posts = get_posts($args);
									?>
									<?php if($service_posts) { ?> 
									<?php
										$count=0;
										foreach($service_posts as $post) : setup_postdata($post);
										$count++;
										//Get service image
										$get_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-size');	
									?>									
									<li id="post-<?php the_ID(); ?>">
										<div class="app-detail">
											<h4><?php the_title(); ?></h4>
											<?php the_content(); ?>
										</div>
										<?php if ( has_post_thumbnail() ) { ?>
											<img src="<?php echo $get_img[0]; ?>" alt="<?php the_title(); ?>" />
										<?php } ?>	
									</li>
									<?php endforeach; ?>
									<?php } ?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>