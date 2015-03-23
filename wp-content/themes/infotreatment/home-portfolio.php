<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
		<div id="<?php if(of_get_option('aw_sg_portfolio', '')) { ?><?php echo of_get_option('aw_sg_portfolio', ''); } else {?>portfolio<?php } ?>">
		
		<?php if(of_get_option('aw_sg_portfolio', '')) { ?>
			<div class="spacer-section" style="height:0;"></div>
		<?php } ?>		
		
		<?php
			//Get portfolio page
			$pageslug = of_get_option('aw_sg_portfolio', ''); 
			$pagename = $pageslug;
			global $post;
			$args = array(
				'post_type' =>'page',
				'pagename' => $pagename
			);
			$page_posts = get_posts($args);
			

			
			
		?>
		<?php if($page_posts) { ?> 
		<?php
			$count=0;
			foreach($page_posts as $post) : setup_postdata($post);
			$count++;
		?>
		
			<div class="content">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="title-content">
						<div class="container">
							<div class="row">
								<div class="span12">
									<h2><?php the_title(); ?></h2>
								</div>
							</div>
						</div>
					</div>
					<?php $p_tagline = get_post_meta($post->ID, 'pt_tagline', true); if ($p_tagline) { ?>						
					<div class="tagline-content">
						<div class="container">
							<div class="row">
								<div class="span12">
									<p><?php echo $p_tagline; ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>			
					<div class="portfolio-main">
						<div class="container">
							<div class="row">
								<div class="span12">
								
									<!-- START PORTFOLIO -->

	<?php

				rewind_posts(); 

				// Additional by me for AJAXING
				
				$count = 0;
				$id_suffix = 1;		
				$items_per_row = 4;				
				$terms = get_terms( 'portfolio_category' ); 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$my_query = new WP_Query( array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'paged'=>$paged ) );
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
										
										
										<?php while ( $my_query -> have_posts()) : $my_query -> the_post(); //query the "portfolio" custom post type for portfolio items ?>		
										
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
										
										<?php endwhile; ?>
									
									</div><!-- /.portfolio-lists -->
									
									<!-- Portfolio gallery ends here -->
									
									<!-- END OF PORTFOLIO -->
								</div>
							</div>
						</div>
					</div>
				</div><!-- /#post-<?php the_ID(); ?> -->
			</div><!-- /.content -->
		<?php endforeach;?>
		<?php } else {?>
			<div class="container">
				<div class="row">
					<div class="span8">
						<p><?php _e('No portfolio entry', 'awesome'); ?></p>
					</div>
				</div>
			</div>			
		<?php } ?>					
		</div>	<!-- /.portfolio -->		