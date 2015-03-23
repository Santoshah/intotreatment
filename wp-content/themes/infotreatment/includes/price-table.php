<div class="pricing-list">

<?php
//get skill post type
	global $post;
	

	$temp_query = $wp_query;
	$args = array(
		'post_type' =>'price_table',
		'numberposts' => '4'
	);				
	$wp_query = new WP_Query($args);			

?>
<?php 
if ( $wp_query->have_posts() ) : 
while ( $wp_query->have_posts()) : $wp_query->the_post();  ?> 
<?php
	$count=0;
	$count++;
?>	
	<?php // Start price item loop ?>
	<div class="prices <?php $pricet_active = get_post_meta($post->ID, 'pricet_active', true); if ($pricet_active) { echo 'active'; }?>">
		<div class="price">
			<h5><span><?php $pricet_curency = get_post_meta($post->ID, 'pricet_curency', true); echo $pricet_curency; ?></span><?php $pricet_price = get_post_meta($post->ID, 'pricet_price', true); echo $pricet_price; ?></h5>
			<p><?php the_title(); ?><span><?php $pricet_trange = get_post_meta($post->ID, 'pricet_trange', true); echo $pricet_trange; ?></span></p>
		</div>
		<div class="price-detail">
		
<?php $pricet_desc = get_post_meta($post->ID, 'pricet_desc', true); if ($pricet_desc) { ?>		
			<p>
				<?php echo $pricet_desc; ?>
			</p>
<?php } ?>			
			<ul>
			
<?php $pricet_detail1 = get_post_meta($post->ID, 'pricet_detail1', true); if ($pricet_detail1) { ?>				
				<li><?php echo $pricet_detail1; ?></li>
<?php } ?>		
			
<?php $pricet_detail2 = get_post_meta($post->ID, 'pricet_detail2', true); if ($pricet_detail2) { ?>				
				<li><?php echo $pricet_detail2; ?></li>
<?php } ?>		
			
<?php $pricet_detail3 = get_post_meta($post->ID, 'pricet_detail3', true); if ($pricet_detail3) { ?>				
				<li><?php echo $pricet_detail3; ?></li>
<?php } ?>		
			
<?php $pricet_detail4 = get_post_meta($post->ID, 'pricet_detail4', true); if ($pricet_detail4) { ?>				
				<li><?php echo $pricet_detail4; ?></li>
<?php } ?>		
			
<?php $pricet_detail5 = get_post_meta($post->ID, 'pricet_detail5', true); if ($pricet_detail5) { ?>				
				<li><?php echo $pricet_detail5; ?></li>
<?php } ?>	
			
<?php $pricet_detail6 = get_post_meta($post->ID, 'pricet_detail6', true); if ($pricet_detail6) { ?>				
				<li><?php echo $pricet_detail6; ?></li>
<?php } ?>		
		
			</ul>
			
			<a href="<?php $pricet_surl = get_post_meta($post->ID, 'pricet_surl', true); echo $pricet_surl; ?>" class="sign-up"><?php $pricet_slink = get_post_meta($post->ID, 'pricet_slink', true); echo $pricet_slink; ?></a>
			
		</div>
	</div><?php // End of price item loop ?>
<?php endwhile; endif;  if (isset($wp_query)) {$wp_query = $temp_query;} ?>						

</div><!-- /.pricing-list -->							