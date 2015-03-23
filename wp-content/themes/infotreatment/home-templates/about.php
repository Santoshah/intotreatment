				<div class="about">
					<div class="container">
						<div class="row">
							<div class="span8 clearfix">
							
								<div class="about-post clearfix">
									<?php the_content(); ?>
								</div>
								
								<?php if ( (of_get_option('aw_ctagline')) !='' ) { ?>
								<h3 class="about-title">
									<?php echo of_get_option('aw_ctagline'); ?>
								</h3>
								<?php } ?>
								<div class="about-more">
									<img src="<?php if ( (of_get_option('aw_cimg')) !='' ) { echo of_get_option('aw_cimg'); ?>" alt="<?php bloginfo('name'); } ?>" />
									
									<?php if ( (of_get_option('aw_cdesc')) !='' ) { ?>
									<p>
										<?php echo of_get_option('aw_cdesc'); ?>
									</p>
									<?php } ?>
									
									<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more', 'awesome'); ?></a>
								</div>
								
							</div>
							<div class="span4 clearfix">
								<div class="member-list clearfix">
								
								
									
									
								<?php
									//Get team member post type
									global $post;
									$args = array(
										'post_type' =>'team_member',
										'post_status' => 'publish',		
										'numberposts' => '-1'
									);
									$skill_posts = get_posts($args);
								?>
								<?php if($skill_posts) { ?> 	
								
									<div class="title-member"><?php printf(__('Our <span>Team</span>', 'awesome')); ?></div>
								
									<?php
										$count=0;
										foreach($skill_posts as $post) : setup_postdata($post);
										$count++;
										//Get skill image
										$get_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'team-member');
									?>								
									
									<div class="member">

										<div class="member-desc">
										
											<?php if ( has_post_thumbnail() ) { ?>
												<img src="<?php echo $get_img[0]; ?>" width="<?php echo $get_img[1]; ?>" height="<?php echo $get_img[2]; ?>" alt="<?php the_title(); ?>" />
											<?php } ?>	
											
											<h3><?php the_title(); ?></h3>
											<p class="member-roles"><?php echo get_post_meta($post->ID, 'team_position', true); ?> <span><?php echo get_post_meta($post->ID, 'team_phone', true); ?></span></p>
											<p><?php echo get_post_meta($post->ID, 'team_bio', true); ?></p>
												
										</div>
										<div class="member-links">
											<?php 
												$team_twitter = get_post_meta($post->ID, 'team_twitter', true);
												$team_fb = get_post_meta($post->ID, 'team_fb', true);
												$team_flickr = get_post_meta($post->ID, 'team_flickr', true);
												$team_email = get_post_meta($post->ID, 'team_email', true);
												
												if ( !empty ( $team_twitter ) || !empty ( $team_fb ) || !empty ( $team_flickr ) ) {
													echo '<span>';
													echo _e('Follow Me', 'awesome');
													echo '</span>';
												}
											
												if ( !empty ( $team_twitter ) ) { 
													echo '<a href="' . $team_twitter . '" class="tw" target="_blank">';
													echo _e('Twitter', 'awesome');
													echo '</a>';
												} 
												
												if ( !empty ( $team_fb ) ) { 
													echo '<a href="' . $team_fb . '" class="fb" target="_blank">';
													echo _e('Facebook', 'awesome');
													echo '</a>';
												} 

												if ( !empty ( $team_flickr ) ) { 
													echo '<a href="' . $team_flickr . '" class="sc3" target="_blank">';
													echo _e('Flickr', 'awesome');
													echo '</a>';
												} 
												
												if ( !empty ( $team_email ) ) {
													echo '<a href="mailto:' . $team_email . '" class="te">';
													echo _e('Email', 'awesome');
													echo '</a>';
												} ?>
												
										</div>
									</div><!-- /.member -->
									
									<?php endforeach; ?>
									
									<?php } ?>
									
									
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.about-main -->	