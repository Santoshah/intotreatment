<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="custom-pages">
	<div class="spacer-section" style="height:0;"></div>
	
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
								
								<div class="span12">
								
									<?php the_content(); ?>
								
								</div>
								
							</div><!-- /.row -->
						</div>
					</div>
				</div><!-- /.content -->	
	
</div><!-- /#custom-pages -->	
<?php endwhile; ?>	