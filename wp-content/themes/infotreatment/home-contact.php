<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php
	//Get contact page
	$pageslug = of_get_option('aw_sg_contact', ''); 	
	$pagename = $pageslug;
	global $post;
	$args = array(
		'post_type' =>'page',
		'post_status' => 'publish',		
		'pagename' => $pagename
	);
	$page_posts = get_posts($args);
?>
<?php if($page_posts) { ?> 

		<div id="<?php if(of_get_option('aw_sg_contact', '')) { ?><?php echo of_get_option('aw_sg_contact', ''); } else {?>contact<?php } ?>" class="contact-section">
		
		<?php if(of_get_option('aw_sg_contact', '')) { ?>
			<div class="spacer-section" style="height:0;"></div>
		<?php } ?>	
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
									<p><?php echo $p_tagline; ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="main">
						<div class="container">
							<div class="row">
								<div class="contact-information">
									<div class="span8">
										<div class="contact-main">
											<h3><?php _e('Contact Details', 'awesome'); ?></h3>
											
											<?php the_content(); ?>
											
											<?php if ( of_get_option('aw_cname') || of_get_option('aw_caddress') || of_get_option('aw_secondary_caddress') || of_get_option('aw_ccountry') ) { ?>
											<div class="company-address">
												<?php if ( (of_get_option('aw_cname')) !='' ) { ?>	
												<h4><?php echo of_get_option('aw_cname', '' ); ?></h4>
												<?php } ?>
												<?php if ( (of_get_option('aw_caddress')) !='' ) { ?>	
												<p><?php echo of_get_option('aw_caddress', '' ); ?></p>
												<?php } ?>
												<?php if ( (of_get_option('aw_secondary_caddress')) !='' ) { ?>	
												<p><?php echo of_get_option('aw_secondary_caddress', '' ); ?></p>
												<?php } ?>
												<?php if ( (of_get_option('aw_ccountry')) !='' ) { ?>	
												<p><?php echo of_get_option('aw_ccountry', '' ); ?></p>
												<?php } ?>
											</div>
											<?php }?>
											
										</div>
										<div class="contact-info">
											
											<?php if ( of_get_option('aw_pnumber') || of_get_option('aw_pnumber2') ) { ?>
											<div class="contact-number">
												<?php if ( (of_get_option('aw_pnumber')) !='' ) { ?>	
												<p><?php echo of_get_option('aw_pnumber', '' ); ?></p>
												<?php } ?>
												<?php if ( (of_get_option('aw_pnumber2')) !='' ) { ?>	
												<p><?php echo of_get_option('aw_pnumber2', '' ); ?></p>
												<?php } ?>
											</div>
											<?php } ?>
											
											<?php if ( of_get_option('aw_mail') || of_get_option('aw_mail2') ) { ?>
											<div class="contact-email">
												<?php if ( (of_get_option('aw_mail')) !='' ) { ?>
												<p><?php echo of_get_option('aw_mail', '' ); ?></p>
												<?php } ?>
												<?php if ( (of_get_option('aw_mail2')) !='' ) { ?>
												<p><?php echo of_get_option('aw_mail2', '' ); ?></p>
												<?php } ?>
											</div>
											<?php } ?>
											
										</div>
									</div>
									<?php if ( (of_get_option('aw_map')) !='' ) { ?>
									<div class="span4">
										<div class="contact-maps">
											<?php echo of_get_option('aw_map', '' ); ?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="row">
								<div class="span12">
								
									<div class="quick-contact">
										<h3><?php _e('Quick Contact', 'awesome'); ?></h3>
										
										<?php get_template_part('includes/contact', 'form'); ?>
										
									</div><!-- /.quick-contact -->
									
								</div>
							</div>
						</div>
					</div>
				</div><!-- /#post-<?php the_ID(); ?> -->
			</div><!-- /.content -->
			<?php endforeach; ?>										
		</div><!-- /#contact -->
<?php } // End of contact page ?>			