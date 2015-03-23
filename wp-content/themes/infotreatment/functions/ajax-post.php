<?php

/* Enqueue ajax scripts */

function aw_post_ajax_scripts() {
	
	wp_enqueue_script( 'my-ajax-request', get_stylesheet_directory_uri(). '/includes/js/ajax-post.js', array( 'jquery' ) );
	wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}

add_action('wp_enqueue_scripts', 'aw_post_ajax_scripts'); 




/* Load the content */


add_action( 'wp_ajax_aw_load_ajax_content', 'aw_load_ajax_content'); 
add_action ( 'wp_ajax_nopriv_aw_load_ajax_content', 'aw_load_ajax_content' );

    function aw_load_ajax_content() {
	
        $post_id = $_REQUEST[ 'post_id' ];

        $post = get_post( $post_id, OBJECT);
        $response = apply_filters( 'the_content', $post->post_content );
	
?>	

		<div class="post-content-ajax span12 clearfix">
		
			<a class="remove" href="#"><?php echo _e('close', 'awesome'); ?></a>
				<div class="post-single">
					<?php echo '<h2 class="post-title">'. get_the_title($post_id) . '</h2>'; ?>
					
					<div class="entry">	
						<?php echo $response; ?>
					</div>	
				</div>	


<?php /* Responsive video embed script */ ?>		
		
<script type="text/javascript">
/*
	FluidVids.js - Fluid and Responsive YouTube/Vimeo Videos v1.0.0
	by Todd Motto: http://www.toddmotto.com
	Latest version: https://github.com/toddmotto/fluidvids
	
	Copyright 2013 Todd Motto
	Licensed under the MIT license
	http://www.opensource.org/licenses/mit-license.php

	A raw JavaScript alternative to FitVids.js, fluid width video embeds
*/
(function(){var e=document.getElementsByTagName("iframe");for(var t=0;t<e.length;t++){var n=e[t];var r=/www.youtube.com|player.vimeo.com/;if(n.src.search(r)!==-1){var i=n.height/n.width*100;n.style.position="absolute";n.style.top="0";n.style.left="0";n.width="100%";n.height="100%";var s=document.createElement("div");s.className="video-wrap";s.style.width="100%";s.style.position="relative";s.style.paddingTop=i+"%";var o=n.parentNode;o.insertBefore(s,n);s.appendChild(n)}}})();
</script>		
		
		</div><!--/.post-content-->
		
<?php

		
		die();

}
