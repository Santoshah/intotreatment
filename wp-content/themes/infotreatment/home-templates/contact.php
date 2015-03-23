				<div class="main">
					<div class="container">
						<div class="row">
							
								<div class="contact-information">
									<div class="span8">
										<div class="contact-main">
											<h3><?php _e('Contact Details', 'awesome'); ?></h3>
											
											<div class="entry">
												<?php the_content(); ?>
											</div>
											
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
								</div><!-- /.contact-information -->
							
						</div><!-- /.row -->
						
							<div class="row">
								<div class="span12">
								
									<div class="quick-contact">
										<h3><?php _e('Quick Contact', 'awesome'); ?></h3>
										
										<?php get_template_part('includes/contact', 'form'); ?>
										
									</div><!-- /.quick-contact -->
									
								</div>
							</div>						
						
						
					</div>
				</div><!-- /.main -->	