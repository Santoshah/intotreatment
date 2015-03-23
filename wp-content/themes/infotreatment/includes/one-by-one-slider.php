<div id="slider">
							
							
								<?php
								//get slide post type
									global $post;
									$args = array(
										'post_type' =>'slide',
										'numberposts' => '-1'
									);
									$slider_posts = get_posts($args);
								?>
								<?php if($slider_posts) { ?> 
								
								<?php
										$count=0;
										foreach($slider_posts as $post) : setup_postdata($post);
										$count++;
										//get slide image
										$feat_img_home = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider-image');
								?>	
								
								<div id="overlay-<?php the_ID(); ?>" class="oneByOne_item">
									
										
								<?php $feat_img_align = get_post_meta($post->ID, 'sm_img_align', true); if ($feat_img_align == 'left') { ?>

										<?php if ( has_post_thumbnail() ) : ?>
											<img class="slider-thumbnail left" src="<?php echo $feat_img_home[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $feat_img_home[1]; ?>" height="<?php echo $feat_img_home[2]; ?>" />
										<?php else : ?>
											<img class="slider-thumbnail left" src="<?php echo get_template_directory_uri(); ?>/images/home-2_bg.jpg"  alt="<?php the_title(); ?>" width="580" height="362" />												
										<?php endif; ?>	
										
										<h2 class="teaser right teaser-title"><?php $s_stitle = get_post_meta($post->ID, 'sm_stitle', true); echo $s_stitle; ?><span><?php the_title(); ?></span></h2>
										
										<p class="teaser right teaser-desc">
											<?php $s_desc = get_post_meta($post->ID, 'sm_textarea', true); echo $s_desc; ?>
										</p>
										
										<?php 
											$s_surl = get_post_meta($post->ID, 'sm_surl', true);
											$s_slink = get_post_meta($post->ID, 'sm_slink', true);
											if ($s_surl && $s_slink) {
										?>
											<a class="view-portfolio right" href="<?php echo $s_surl; ?>"><span class="inner"><?php echo $s_slink; ?></span></a>
										<?php } ?>											

							<?php } else { ?>		

										<h2 class="teaser teaser-title"><?php $s_stitle = get_post_meta($post->ID, 'sm_stitle', true); echo $s_stitle; ?><span><?php the_title(); ?></span></h2>
										
										<p class="teaser teaser-desc">
											<?php $s_desc = get_post_meta($post->ID, 'sm_textarea', true); echo $s_desc; ?>
										</p>
										
										<?php 
											$s_surl = get_post_meta($post->ID, 'sm_surl', true);
											$s_slink = get_post_meta($post->ID, 'sm_slink', true);
											if ($s_surl && $s_slink) {
										?>
											<a class="view-portfolio" href="<?php echo $s_surl; ?>"><span class="inner"><?php echo $s_slink; ?></span></a>
										<?php } ?>										

										<?php if ( has_post_thumbnail() ) : ?>
											<img class="slider-thumbnail" src="<?php echo $feat_img_home[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $feat_img_home[1]; ?>" height="<?php echo $feat_img_home[2]; ?>" />
										<?php else : ?>
											<img class="slider-thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/home-2_bg.jpg"  alt="<?php the_title(); ?>" width="580" height="362" />												
										<?php endif; ?>	
										
								<?php } ?>										

								</div><!-- /.oneByOne_item -->

								<?php endforeach; ?>									
								<?php } ?>								
							
							</div>