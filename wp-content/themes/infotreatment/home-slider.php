<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<div class="container slider-section">
					<div class="row" style="height:auto !important;">
						<div class="span12">

							<?php
							if (of_get_option('select_1') !=0) {
								require_once('includes/one-by-one-slider.php'); 
							} ?>

							<?php
							if (of_get_option('select_2') !=0) {
								require_once('includes/flex-slider.php'); 
							} ?>
						
						</div>
					</div><!-- /.row -->
				</div><!-- /.container -->