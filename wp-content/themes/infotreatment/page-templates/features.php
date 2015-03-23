<?php
/**
 * Template Name: Features	
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
							
								<?php // Start of Single loop ?>
								
									<?php if(have_posts()) : ?>
										<?php while(have_posts()) : the_post(); ?>
										
										<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										
											<?php 
											printf(__('<span class="date-single hide-small-screen"><p>%1$s <span>%2$s</span></p></span>', 'awesome'),
											
											get_the_date('j'),
											get_the_date('M Y')
											
											);
											?>
											
											<div class="post-head">
											
											<?php 
											printf(__('<span class="date-single-show-small-screen">%1$s %2$s</span>', 'awesome'),
											
											get_the_date('j'),
											get_the_date('M Y')
											
											);
											?>											
											
												<h1 class="post-title"><?php the_title(); ?></h1>
												<div class="meta-post">
												
													<?php 
													printf(__('<p>By: <span class="author-screen"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></p>', 'awesome'),
														esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
														esc_attr( sprintf( __( 'View all posts by %s', 'awesome' ), get_the_author() ) ), 
														get_the_author()
													);
													?>		
													<?php if (comments_open()) { echo '<p><span class="comment-count">';comments_popup_link(__( '0 Comment', 'awesome' ), __( '1 Comment', 'awesome' ), __( '% Comments', 'awesome' ) ); echo '</p></span>';  } ?>									
												
												</div><!-- /.meta -->			

											</div><!-- /.post-head -->	
											
											<div class="entry">	
												<?php
													$post_thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-single');		
												?>
												
												<?php if ( has_post_thumbnail() ) { ?>
												<img class="thumb_single" src="<?php echo $post_thumb_img[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $post_thumb_img[1]; ?>" height="<?php echo $post_thumb_img[2]; ?>" />
												<?php } ?>	
												<div class="entry">
													<?php the_content(); ?>
												</div>
												<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'awesome' ), 'after' => '</div>' ) ); ?>
											</div>					
																		
											<?php comments_template( '', true ); ?>							
										
										</div><!-- /#post-<?php the_ID(); ?> -->
										
										<?php endwhile; else: ?>
										
										<p><?php _e('No post found', 'awesome'); ?></p>
										
									<?php endif; ?>	
								<?php // End of Single loop ?>		
									
							</div><!-- /.post-single -->			

<?php get_template_part('single', 'sidebar'); ?>
								
<?php get_footer(); ?>