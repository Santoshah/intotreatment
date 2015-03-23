<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php get_header(); ?>

		<div id="single">
			<div class="content">
				<div class="main">
					<div class="container">
						<div class="row">						
						
							<div class="span8 post-single">
							
							<?php
													
							$arvhice_style = of_get_option('aw_archive_style', '');  
							if($arvhice_style == 'one-column' ) { 

							?>								
								
									<?php if ( have_posts() ) : ?>

										<?php
											/* Queue the first post, that way we know
											 * what author we're dealing with (if that is the case).
											 *
											 * We reset this later so we can run the loop
											 * properly with a call to rewind_posts().
											 */
											the_post();
										?>
									
										<h2 class="archive-title">
											<?php printf( __( 'Author Archivesss: %s', 'awesome' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?>	
										</h2>									
									
										<?php
											rewind_posts();
										?>											
									
										<?php /* Start the Loop */ ?>
										<?php while ( have_posts() ) : the_post(); ?>
										
										<div class="archive-loop">
										
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<?php 
											
											printf(__('<span class="date-single"><p>%1$s <span>%2$s</span></p></span>', 'awesome'),
											
											get_the_date('j'),
											get_the_date('M Y')
											
											);
											?>
											
											<div class="post-head">
											
												<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
												<div class="meta-post">
												<?php 
												printf(__('<p><span class="author-screen"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></p><p><span class="category">%4$s</span></p>', 'awesome'),
													esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
													esc_attr( sprintf( __( 'View all posts by %s', 'awesome' ), get_the_author() ) ), 
													get_the_author(), 
													get_the_category_list( ', ' )
												);
												?>				
												<?php if (comments_open()) { echo '<p><span>';comments_popup_link(__( '0 Comment', 'awesome' ), __( '1 Comment', 'awesome' ), __( '% Comments', 'awesome' ) ); echo '</p></span>';  } ?>										

												</div><!--/.meta-post-->	

											</div><!-- /.post-head -->	
											
											<div class="entry">	
												<?php
													$post_thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'archive-thumb');		
												?>
												
												<?php if ( has_post_thumbnail() ) { ?>
												<a href="<?php the_permalink(); ?>"><img class="thumb_single" src="<?php echo $post_thumb_img[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $post_thumb_img[1]; ?>" height="<?php echo $post_thumb_img[2]; ?>" /></a>
												<?php } ?>	
											
												<p>
													<?php echo awesome_excerpt(100); ?> <a href="<?php the_permalink(); ?>" class="more"><?php _e('more...', 'awesome'); ?></a>
												</p>	
											
											</div>		
											
											</div><!-- /#post-<?php the_ID(); ?> -->
										</div><!-- /.archive-loop -->
										
										<?php endwhile; ?>
										
										<div class="pagination clearfix">
											<p>
												<span class="older-post"><?php next_posts_link( __('<span>&laquo;</span> Older Entries', 'awesome' ) ); ?></span>
												<span class="newer-post"><?php previous_posts_link( __( 'Newer Entries <span>&raquo;</span>', 'awesome' ) ); ?></span>
											</p>	
										</div>											
										
										<?php else : ?>
										
										<p><?php _e('No post found', 'awesome'); ?></p>
										
									<?php endif; ?>	
									
							<?php } else { ?>

									<?php if ( have_posts() ) : ?>

										<?php
											/* Queue the first post, that way we know
											 * what author we're dealing with (if that is the case).
											 *
											 * We reset this later so we can run the loop
											 * properly with a call to rewind_posts().
											 */
											the_post();
										?>
									
										<h2 class="archive-title">
											<?php printf( __( 'Author Archives: %s', 'awesome' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>	
										</h2>										
							
										<?php
											/* Since we called the_post() above, we need to
											 * rewind the loop back to the beginning that way
											 * we can run the loop properly, in full.
											 */
											rewind_posts();
										?>											
									
										<?php /* Start the Loop */ ?>
										<?php while ( have_posts() ) : the_post(); ?>

								<div class="mini post">
									
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									
										<?php 
										printf(__('<div class="date"><p>%1$s<span>%2$s</span></p></div>', 'awesome'),
											get_the_date( 'j' ),
											get_the_date( 'M Y' )
										);
										?>									
										
										<?php
											$post_thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumb-grid');		
										?>
										
										<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $post_thumb_img[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $post_thumb_img[1]; ?>" height="<?php echo $post_thumb_img[2]; ?>" /></a>
										<?php } else {?>
										
										<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/blogPostImage1.jpg" alt="<?php the_title(); ?>" width="<?php echo $post_thumb_img[1]; ?>" height="<?php echo $post_thumb_img[2]; ?>" /></a>
										
										<?php } ?>	
										
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										
										<div class="meta-post">
										<?php 
										printf(__('<p><span class="author-screen"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></p><p><span class="category">%4$s</span></p>', 'awesome'),
											esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
											esc_attr( sprintf( __( 'View all posts by %s', 'awesome' ), get_the_author() ) ), 
											get_the_author(), 
											get_the_category_list( ', ' )
										);
										?>				
										<?php if (comments_open()) { echo '<p><span>';comments_popup_link(__( '0 Comment', 'awesome' ), __( '1 Comment', 'awesome' ), __( '% Comments', 'awesome' ) ); echo '</p></span>';  } ?>										

										</div><!--/.meta-post-->
										
										<p>
											<?php echo awesome_excerpt(15); ?> <a href="<?php the_permalink(); ?>" class="more"><?php _e('more...', 'awesome'); ?></a>
										</p>
									
									</div><!-- post-<?php the_ID(); ?> -->
									
								</div><!-- /.mini-post -->			

								<?php endwhile; ?>
								
								<div class="pagination clearfix">
									<p>
										<span class="older-post"><?php next_posts_link( __('<span>&laquo;</span> Older Entries', 'awesome' ) ); ?></span>
										<span class="newer-post"><?php previous_posts_link( __( 'Newer Entries <span>&raquo;</span>', 'awesome' ) ); ?></span>
									</p>	
								</div>											
								
								<?php else: ?>
								
								<p><?php _e('No post found', 'awesome'); ?></p>
								
							<?php endif; ?>									

							<?php } ?>											
									
							</div><!-- /.post-single -->								
							

<?php get_template_part('single', 'sidebar'); ?>
								
<?php get_footer(); ?>