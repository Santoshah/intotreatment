<div class="flexslider">
  <ul class="slides">
  
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
  
  <li>
  
  
	<?php $feat_img_align = get_post_meta($post->ID, 'sm_img_align', true); if ($feat_img_align == 'left') { ?>
		<img src="<?php echo $feat_img_home[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $feat_img_home[1]; ?>" height="<?php echo $feat_img_home[2]; ?>" />
		<div class="flex-caption-wrap teaser">
			<h2 class="flex-caption slide-title"><?php $s_stitle = get_post_meta($post->ID, 'sm_stitle', true); echo $s_stitle; ?><span><?php the_title(); ?></span></h2>
			<p class="flex-caption"><?php $s_desc = get_post_meta($post->ID, 'sm_textarea', true); echo $s_desc; ?></p>		
			<?php 
				$s_surl = get_post_meta($post->ID, 'sm_surl', true);
				$s_slink = get_post_meta($post->ID, 'sm_slink', true);
				if ($s_surl && $s_slink) {
			?>			
			<a class="flex-caption slide-link view-portfolio" href="<?php echo $s_surl; ?>"><span class="inner"><?php echo $s_slink; ?></span></a>
			<?php } ?>
		</div>
	<?php } else { ?>	
		
		
		<img class="img-right" src="<?php echo $feat_img_home[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $feat_img_home[1]; ?>" height="<?php echo $feat_img_home[2]; ?>" />
		<div class="flex-caption-wrap teaser img-right">
			<h2 class="flex-caption slide-title"><?php $s_stitle = get_post_meta($post->ID, 'sm_stitle', true); echo $s_stitle; ?><span><?php the_title(); ?></span></h2>
			<p class="flex-caption"><?php $s_desc = get_post_meta($post->ID, 'sm_textarea', true); echo $s_desc; ?></p>		
			<?php 
				$s_surl = get_post_meta($post->ID, 'sm_surl', true);
				$s_slink = get_post_meta($post->ID, 'sm_slink', true);
				if ($s_surl && $s_slink) {
			?>			
			<a class="flex-caption slide-link view-portfolio" href="<?php echo $s_surl; ?>"><span class="inner"><?php echo $s_slink; ?></span></a>
			<?php } ?>
		</div>
		
		
	<?php  }?>	
  </li>
  
<?php endforeach; ?>									
<?php } ?>	  
  
</div>