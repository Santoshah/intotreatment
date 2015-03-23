<div id="home">

	<div class="content">
		<?php if(is_home()) { get_template_part('home', 'slider'); } ?>
		
<?php
	//Get skill post type
	global $post;
	$args = array(
		'post_type' =>'skill',
		'post_status' => 'publish',		
		'numberposts' => '-1'
	);
	$skill_posts = get_posts($args);
?>
<?php if($skill_posts) { ?> 				
				<div class="skill">
					<div class="container">
						<div class="row">
							<div class="span12">
							
								<ul class="skill-lists">
									<?php
										$count=0;
										foreach($skill_posts as $post) : setup_postdata($post);
										$count++;
										//Get skill image
										$get_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-size');
									?>													
									
									<li>
										<div class="skill-image">
											<?php if ( has_post_thumbnail() ) { ?>
												<img src="<?php echo $get_img[0]; ?>" alt="<?php the_title(); ?>" />
											<?php } ?>	
										</div>
										<p><?php the_title(); ?></p>
									</li>
									
									<?php endforeach; ?>																	
									
								</ul>
								
								<div class="motto">
									<h3>
										<?php echo of_get_option('aw_motto'); ?> 
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.skill -->				
				
		<?php if ( of_get_option('aw_purchase_hteaser') || of_get_option('aw_purchase_cteaser') ) { ?>			
				<div class="purchase">
					<div class="container">
						<div class="row">
							<div class="span12">
								<div class="purchase-teaser">
									<h3><?php echo of_get_option('aw_purchase_hteaser'); ?></h3>
									<p><?php echo of_get_option('aw_purchase_cteaser'); ?></p>
								</div>
								<?php if ( of_get_option('aw_purchase_url') && of_get_option('aw_purchase_btn') ) { ?>							
								<a class="purchase-btn" href="<?php echo of_get_option('aw_purchase_url'); ?>"><?php echo of_get_option('aw_purchase_btn'); ?></a>
								<?php } ?>						
								
							</div>
						</div>
					</div>
				</div><!-- /.purchase -->
		<?php } ?>		
				
<?php } ?>			

<?php
	//Get application post type
	global $post;
	$args = array(
		'post_type' =>'application',
		'post_status' => 'publish',				
		'numberposts' => '-1'
	);
	$application_posts = get_posts($args);
?>
<?php if($application_posts) { ?> 	
				<div class="application">
					<div class="container">
						<div class="row">
							<div class="span12">
								<ul class="apps-list">
									<?php
										$count=0;
										foreach($application_posts as $post) : setup_postdata($post);
										$count++;
										//Get application image
										$get_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-size');
									?>
								
									<li id="post-<?php the_ID(); ?>">
										<div class="app-detail">
											<h4><?php the_title(); ?></h4>
											<p><?php the_content('',FALSE,''); ?></p>
										</div>
											<?php if ( has_post_thumbnail() ) { ?>
												<img src="<?php echo $get_img[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $get_img[1]; ?>" height="<?php echo $get_img[2]; ?>" />
											<?php } ?>	
									</li>
									<?php endforeach; ?>																			
									
								</ul>
							</div>
						</div>
					</div>
				</div><!-- /.application -->
				
<?php } ?>	

	
	</div><!-- /.content -->

</div><!-- /#home -->

<?php // Custom selected pages starts here ?>
<?php
// WP Query
$args = array(
	'post_type' => 'page',
	'posts_per_page'	=> '-1',
	'orderby'		=> 'menu_order',
	'order'			=> 'ASC',
	'meta_key'		=> 'pt_portfolio_frontpage',
	'meta_value'	=> 'yes'	
);
$query = new WP_Query( $args );
query_posts( $args );


?>
<?php /* Start the Loop */ ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
<?php $template_name = get_post_meta( $post->ID, '_wp_page_template', true ); ?>
	
		<div class="spacer-section" style="height:160px;"></div>
	
<?php global $post; ?>	
		
		<?php 
		// Sticky ID for ajax post enabled
			if(of_get_option('aw_blog_ajax') == 'yes'){  
				$ajaxID = "ajaxBlog";
				echo '<div id="'.$ajaxID.'"></div>';
			}
		?>
		
		<div id="<?php echo $post->post_name; ?>" class="content">
		
		<div class="portfolio-template">
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="title-content">
					<div class="container">
						<div class="row">
							<div class="span12">
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
					</div>
				</div><!-- /.title-content -->		
				<?php $p_tagline = get_post_meta($post->ID, 'pt_tagline', true); if ($p_tagline) { ?>						
				<div class="tagline-content">
					<div class="container">
						<div class="row">
							<div class="span12">
								<p><?php echo $p_tagline; ?>
							</div>
						</div>
					</div>
				</div><!-- /.tagline-content -->
				<?php } ?>	
				
		<?php
		// Regular template
		if($template_name == 'default' ) { ?>
				
				<div class="main">
					<div class="container">
						<div class="row">
							
							<div class="span12">
							
								<div class="entry">
									<?php the_content(); ?>
								</div>
							
							</div>
							
						</div><!-- /.row -->
					</div>
				</div><!-- /.main -->		


		<?php } // End of regular template ?>	
		
		<?php
		// About template
		if($template_name == 'page-templates/about.php' ) { ?>		
		
			<?php get_template_part('home-templates/about'); ?>
		
		<?php } // End of about template ?>
		
		
		<?php
		// Portfolio template
		if($template_name == 'page-templates/portfolio.php' ) { ?>		
		
			<?php get_template_part('home-templates/portfolio'); ?>
		
		<?php } // End of portfolio template ?>
		
		
		<?php
		// Services template
		if($template_name == 'page-templates/services.php' ) { ?>		
		
			<?php get_template_part('home-templates/services'); ?>
		
		<?php } // End of services template ?>
		
		
		<?php
		// Blog template
		if($template_name == 'page-templates/blog.php' ) { ?>		
		
			<?php get_template_part('home-templates/blog'); ?>
		
		<?php } // End of blog template ?>		
		
		<?php
		// Contact template
		if($template_name == 'page-templates/contact.php' ) { ?>
		
			<?php get_template_part('home-templates/contact'); ?>
		
		<?php } // End of contact template ?>

		<?php
		// Features template
		if($template_name == 'page-templates/features.php' ) { ?>		
		
			<?php get_template_part('home-templates/features'); ?>
		
		<?php } // End of features template ?>		

				
			</div><!-- /#post-<?php the_ID(); ?> -->
			
		</div><!-- /.portfolio-template -->	
		</div><!-- /#<?php echo $post->post_name; ?> .content -->
	


<?php endwhile; // End of loop ?>	