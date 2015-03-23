<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="span12">
						<p>
						<?php if ( (of_get_option('aw_fcredit')) !='' ) { ?>
							<?php echo of_get_option('aw_fcredit', '' ); ?>
						<?php } else {?>
							<?php _e('Copyright &copy; 2013 Awesome by Minimal Themes. All rights reserved.', 'awesome'); ?>
						<?php } ?>
						</p>
					</div>
				</div>
			</div>
		</div>		
		
		
		<?php wp_footer(); ?>
		
			
	</body>
</html>