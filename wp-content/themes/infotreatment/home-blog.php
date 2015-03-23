<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php
	//Get blog page
	$pageslug = of_get_option('aw_sg_blog', ''); 	
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
		<div id="<?php if(of_get_option('aw_sg_blog', '')) { ?><?php echo of_get_option('aw_sg_blog', ''); } else {?>blog<?php } ?>">
		
		<?php if(of_get_option('aw_sg_blog', '')) { ?>
			<div class="spacer-section" style="height:0;"></div>
		<?php } ?>				
		
			<div class="content">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="title-content">
						<div class="container">
							<div class="row">
								<div class="span12">
									<h2><?php _e('Blog', 'awesome'); ?></h2>
								</div>
							</div>
						</div>
					</div>
		<?php 
			$p_tagline = get_post_meta($post->ID, 'pt_tagline', true); if ($p_tagline) {
		?>					
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
					<div class="main">
						<div class="container">
							<div class="row">

								<?php get_template_part('home', 'blog-loop'); ?>
								<?php get_template_part('home', 'sidebar'); ?>

							</div>
						</div>
					</div><!-- /.main -->
				</div><!-- /#post-<?php the_ID(); ?> -->
			</div><!-- /.content -->
		</div><!-- /#blog -->
<?php endforeach; ?>									
<?php } ?>				