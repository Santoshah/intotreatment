<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php get_header(); ?>

		<?php					
		$frontpage_layout = of_get_option('aw_layout', '');  
		if($frontpage_layout == 'portfolio' ) { 
		?>	
		
			<?php get_template_part('portfolio', 'frontpage'); ?>
		
		<?php } else { ?>
		
			<?php get_template_part('regular', 'frontpage'); ?>
			
		<?php } ?>
		
		
		
<?php get_footer(); ?>