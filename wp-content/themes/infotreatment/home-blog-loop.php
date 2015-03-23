<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<div class="span8">

<?php
$first=0;
?>

<?php

    $temp_query = $wp_query;  // store it
	$args = array(
	'paged' => $paged, // paginates
	'post_type'=>'post',
	'order' => 'DESC'
	);
	$wp_query = new WP_Query($args);
	if ($wp_query->have_posts()) :
	while ($wp_query->have_posts()) : $wp_query->the_post();$first++;

?>
<?php if ( 1 == $first && is_home() && !is_paged() ) { ?>
  
								<div class="featured post">
								
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									
										<div class="meta-post visible-desktop">
										
											<?php 
											printf(__('<div class="date"><p>%1$s<span>%2$s</span></p></div><p>By: <span class="author-screen"><a class="url fn n" href="%3$s" title="%4$s" rel="author">%5$s</a></span></p><p>Category: <span class="category-meta">%6$s</span></p>', 'awesome'),
												get_the_date( 'j' ),
												get_the_date( 'M Y' ),
												esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
												esc_attr( sprintf( __( 'View all posts by %s', 'awesome' ), get_the_author() ) ), 
												get_the_author(), 
												get_the_category_list( ', ' )
											);
											?>		
											<?php if (comments_open()) { echo '<p><span>';comments_popup_link(__( '0 Comment', 'awesome' ), __( '1 Comment', 'awesome' ), __( '% Comments', 'awesome' ) ); echo '</p></span>';  } ?>									

										</div><!-- /.meta-post -->						
										
										<?php
											$post_thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-image');		
										?>
										
										<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $post_thumb_img[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $post_thumb_img[1]; ?>" height="<?php echo $post_thumb_img[2]; ?>" /></a>
										<?php } ?>										

										
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										
										<div class="meta-post hidden-desktop clearfix">	
										<?php 
										printf(__('<p><span class="author-screen">%1$s</span></p><p><span class="category">%2$s</span></p>', 'awesome'),
											get_the_author(),
											get_the_category_list( ', ' )
										);
										?>				
										<?php if (comments_open()) { echo '<p><span>';comments_popup_link(__( '0 Comment', 'awesome' ), __( '1 Comment', 'awesome' ), __( '% Comments', 'awesome' ) ); echo '</p></span>';  } ?>		
										</div>
										
					
										<div>
											<?php echo awesome_excerpt(54); ?>
										</div>	
										
										<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read more', 'awesome'); ?></a>
									
									</div><!-- post-<?php the_ID(); ?> -->
									
								</div><!-- /.featured -->

<?php } else { ?>  								
					
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
										
										<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/blogPostImage1.jpg" alt="<?php the_title(); ?>" /></a>
										
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

<?php } ?>
<?php endwhile; ?>

								<div class="pagination clearfix">
									<p>
										<span class="older-post"><?php next_posts_link( __('<span>&laquo;</span> Older Entries', 'awesome' ) ); ?></span>
										<span class="newer-post"><?php previous_posts_link( __( 'Newer Entries <span>&raquo;</span>', 'awesome' ) ); ?></span>
									</p>	
								</div>											
								
								<?php else: ?>
								
								<p><?php echo _e('No post found', 'awesome'); ?></p>

<?php endif; ?>
<?php if (isset($wp_query)) {$wp_query = $temp_query;} // restore loop ?>
								
							</div><!-- /.span8 -->