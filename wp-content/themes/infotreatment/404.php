<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php get_header(); ?>

		<div id="single">
			<div class="content">
				<div class="main">
					<div class="container">
						<div class="row">
						
							<div class="span8 post-single">
							
								<h1 class="post-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'awesome' ); ?></h1>
								
								<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'awesome' ); ?></p>			

								<?php get_search_form(); ?>

								<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>								
									
							</div><!-- /.post-single -->			

<?php get_template_part('single', 'sidebar'); ?>
								
<?php get_footer(); ?>