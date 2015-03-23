<?php 


/*-----------------------------------------------------------------------------------*/
/* Footer Custom Scripts
/*-----------------------------------------------------------------------------------*/
add_action('wp_footer', 'aw_custom_footer_scripts', 100);
function aw_custom_footer_scripts() { 

	$drag = of_get_option('slide_drag', 'true');
	$arrow = of_get_option('slide_arrow', 'true');
	$btn = of_get_option('slide_btn', 'true');
	$slideshow = of_get_option('slide_slideshow', 'true');
	$delay = of_get_option('slide_delay', '3000');
	$animation = of_get_option('slide_animation', 'random');
	if ( (of_get_option('aw_ga')) !='' ) { echo of_get_option('aw_ga', '' ); } 	
?>

<script type="text/javascript" charset="utf-8">	

/* Popup window */
function addEvent(elm, evType, fn, useCapture){if(elm.addEventListener){elm.addEventListener(evType, fn, useCapture);return true;}else if (elm.attachEvent){var r = elm.attachEvent('on' + evType, fn);return r;}else{elm['on' + evType] = fn;}}
			var newWindow = null;

			function closeWin(){
				if (newWindow != null){
					if(!newWindow.closed)
						newWindow.close();
				}
			}

			function popUpWin(url, type, strWidth, strHeight){

				closeWin();

				type = type.toLowerCase();

				if (type == "fullscreen"){
					strWidth = screen.availWidth;
					strHeight = screen.availHeight;
				}
				var tools="";
				if (type == "standard") tools = "resizable,toolbar=yes,location=yes,scrollbars=yes,menubar=yes,width="+strWidth+",height="+strHeight+",top=0,left=0";
				if (type == "console" || type == "fullscreen") tools = "resizable,toolbar=no,location=no,scrollbars=no,width="+strWidth+",height="+strHeight+",left=0,top=0";
				newWindow = window.open(url, "newWin", tools);
				newWindow.focus();
			}

			function doPopUp(e)
			{
			//set defaults - if nothing in rel attrib, these will be used
			var t = "standard";
			var w = "780";
			var h = "580";
			//look for parameters
			attribs = this.rel.split(" ");
			if (attribs[1]!=null) {t = attribs[1];}
			if (attribs[2]!=null) {w = attribs[2];}
			if (attribs[3]!=null) {h = attribs[3];}
			//call the popup script
			popUpWin(this.href,t,w,h);
			//cancel the default link action if pop-up activated
			if (window.event) 
				{
				window.event.returnValue = false;
				window.event.cancelBubble = true;
				} 
			else if (e) 
				{
				e.stopPropagation();
				e.preventDefault();
				}
			}

			function findPopUps()
			{
			var popups = document.getElementsByTagName("a");
			for (i=0;i<popups.length;i++)
				{
				if (popups[i].rel.indexOf("popup")!=-1)
					{
					// attach popup behaviour
					popups[i].onclick = doPopUp;
					// add popup indicator
					if (popups[i].rel.indexOf("noicon")==-1)
						{
						popups[i].style.backgroundImage = "url(pop-up.gif)";
						popups[i].style.backgroundPosition = "0 center";
						popups[i].style.backgroundRepeat = "no-repeat";
						popups[i].style.paddingLeft = "0";
						}
					// add info to title attribute to alert fact that it's a pop-up window
					popups[i].title = popups[i].title;
					}
				}
			}

			addEvent(window, "load", findPopUps, false);
			
/* End of popup window */

</script>

<script type="text/javascript" charset="utf-8">
	
<?php if( is_home() && of_get_option('select_2') !=0 ) {  ?>
jQuery(document).ready(function($) {

	$(window).load(function() {
		$('.flexslider').flexslider({
			namespace: "flex-",     
			selector: ".slides > li",  
			animation: "<?php echo of_get_option('flex_animation', 'slide'); ?>",
			slideshow: <?php echo of_get_option('flex_autoplay', 'true'); ?>,                
			slideshowSpeed: <?php echo of_get_option('flex_slide_speed', 'slide'); ?>,          
			animationSpeed: <?php echo of_get_option('flex_animation_speed', 'slide'); ?>,          
			controlNav: <?php echo of_get_option('flex_show_control', 'true'); ?>,   
			directionNav: <?php echo of_get_option('flex_show_direction', 'true'); ?>,           	
			easing: "swing", 		
		});
	});	
	
});
<?php } ?>

</script>
	
<?php if( is_home() && of_get_option('select_1') !=0 ) {  ?>



<script type="text/javascript" charset="utf-8">	

jQuery(document).ready(function($) {

$(".contact-maps").fitMaps( {w: '100%', h:'250px'} );

$('#slider').oneByOne({
	className: 'oneByOne1',	   
	responsive: true,	
	easeType: '<?php echo $animation; ?>',
	slideShow: <?php echo $slideshow; ?>,
	enableDrag: <?php echo $drag; ?>,
	showArrow: <?php echo $arrow; ?>,
	showButton: <?php echo $btn; ?>,
	slideShowDelay: <?php echo $delay; ?>
});  	

$("#slider").addClass('visible');

});	
</script>

<?php } // End of is_home ?>

<?php
	if(!is_home()) { 
	$homeurl = esc_url( home_url( '/' ) );
?>
<script type="text/javascript" charset="utf-8">	

jQuery(document).ready(function($) {
    
	$('a[href*="#"]').attr('href', function(i,href) {
		   // return a version of the href that replaces "www." with "accounts."
		return href.replace('#', '<?php echo $homeurl; ?>#');
	});
	
	
});


</script>
	

<?php } }


/*-----------------------------------------------------------------------------------*/
/* Ajax
/*-----------------------------------------------------------------------------------*/

add_action( "wp_ajax_aw_get_ajax_project", "aw_get_ajax_project" );
add_action( "wp_ajax_nopriv_aw_get_ajax_project", "aw_get_ajax_project" );

function aw_get_ajax_project() {

    if ( !wp_verify_nonce( $_REQUEST['nonce'], "portfolio_item_nonce" ) ) {
    	exit("No naughty business please");
    }     
	
	$grid_classes = 'grid_9 alpha';
	$quality = 90;
	$desired_width = 700;
	$desired_height = 500;
	$current_post_id = $_REQUEST['post_id'];
	$terms = get_the_terms( $_REQUEST['post_id'] , 'portfolio_category', 'string' );
	$content_post = get_post( $_REQUEST['post_id'] );
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	$post = get_post( $current_post_id ); 
	$client = get_post_meta( $current_post_id, 'pm_client', true );	
	$clienturl = get_post_meta( $current_post_id, 'pm_clienturl', true );	
	$img_align = get_post_meta( $current_post_id, 'pm_img_align', true );	
	$portfolio_images = aw_get_the_portfolio_images( $_REQUEST['post_id'] );	
	
	ob_start();
	
?>

<!-- START #portfolio-details -->

<div id="portfolio-details">	

<!-- The scripts should go here -->

	<div class="slideshow clearfix">
	
	
	<!-- START Image -->
	<div id="<?php if ($img_align == 'right') { ?>single-item-right<?php }  else { ?>img-left single-item <?php } ?>" class="slideshowImage left <?php echo $grid_classes; ?> <?php if ($img_align == 'Left') { echo ' slideshowleft'; } ?>">
	
	<!-- Start carousel -->
<div id="any_id" class="barousel">	
	<div>		
		
		
	<?php
		// Get attachments
		$thumb_ID = get_post_thumbnail_id( $post->ID );
		$args = array(
			'post_type' => 'attachment',
			'post_parent' => $post->ID, // current post only
			'numberposts' => -1,
			'exclude' => $thumb_ID,
			'post_status' => NULL
		);
		$attachs = get_posts($args);
	?>	
	
	<?php if (!empty($attachs)) { ?>	
		<div id="slideshow-wrapper">	
	<?php } ?>
	
		<?php if( count( $portfolio_images ) === 1 ) {		

		$portfolio_img_url = $portfolio_images[0];

		$image_details = wp_get_attachment_image_src( aw_get_attachment_id_from_src( $portfolio_img_url ), 'portfolio-large');
		$image_full_width = $image_details[1];
		$image_full_height = $image_details[2];	

		?>
			
			<?php foreach ( $portfolio_images as $portfolio_img_url ) { ?>

				<?php echo $portfolio_img_url; ?>
			
			<?php } ?>

		<?php } ?>
		
		
<?php if (!empty($attachs)) { ?>
<style>
#slideshow {
    margin: 2em auto;
    width: 520px;
	max-width: 100%;
    overflow: hidden;
	position: relative;
}

#slideshow-wrapper {
    height: 348px;
    width: 520px;
	max-width: 100%;
}

.show-me{
	visibility: visible;
}

#slideshow-wrapper img {
     position: absolute;
	 max-height: 348px;
	 max-width: 94%;
    opacity: 0;
    -moz-transition: all 800ms ease-in;
    -webkit-transition: all 800ms ease-in;
    -o-transition: all 800ms ease-in;
    -ms-transition: all 800ms ease-in;
     transition: all 800ms ease-in;
	 opacity: 0;
	 z-index: 9;
	 margin: 0 !important;
}

@media only screen and (max-width: 370px){

	#slideshow-wrapper img {
		 max-width: 85%;
	}	

}

#slideshow-wrapper > img:first-child {
    opacity: 1;
}

#slideshow-wrapper .show {
    opacity: 1;
}

#slideshow-wrapper .hide {
    opacity: 0;
}

#slideshow-nav {
    height: 32px;
    margin: 10px 0;
    text-align: center;
	z-index: 99;
}

#slideshow-nav a {
    display: inline-block;
    line-height: 22px;
    text-decoration: none;
	text-indent: -9999px;
	width: 10px;
	height: 10px;
	border-radius: 10px 10px 10px 10px;
	background: none repeat scroll 0% 0% rgb(235, 235, 235);
	box-shadow: 0px 1px 1px rgb(255, 255, 255) inset, 0px 0px 1px 1px rgb(139, 151, 154);
	margin: 0px 4px;
	cursor: pointer;
	outline: none;
}

#slideshow-nav a:hover,
#slideshow-nav a.active {
	background: none repeat scroll 0% 0% rgb(215, 215, 215);
	box-shadow: 0px 1px 1px rgb(245, 245, 245) inset, 0px 0px 1px 1px rgb(139, 151, 154);
}

</style>		
		
		
	<?php foreach ($attachs as $att) {
		?>
			<?php echo wp_get_attachment_image($att->ID, 'portfolio-large'); ?>
		<?php
		}
	} 
?>			

	<?php if (!empty($attachs)) { ?>	
	<script type="text/javascript">
	// Slideshow for multiple images portfolio
	var Slideshow={Utils:{siblings:function(e){var t=e.parentNode,n=t.childNodes,r=[],i=n.length,s;for(s=0;s<i;s++){var o=n[s];if(o.nodeType==1&&o.tagName.toLowerCase()=="img"&&o!==e){r.push(o)}}return r},hideAll:function(e){var t=e.length,n;for(n=0;n<t;n++){var r=e[n];r.className="hide"}},show:function(e){e.className="show"}},core:{displayNavigation:function(){var e=document.getElementById("slideshow-wrapper").getElementsByTagName("img"),t=e.length,n,r=document.getElementById("slideshow-nav"),i="";for(n=0;n<t;n++){i+='<a href="#" data-img="'+n+'">'+(n+1)+"</a>"}r.innerHTML=i},navigate:function(){var e=document.getElementById("slideshow-nav").getElementsByTagName("a"),t=e.length,n;for(n=0;n<t;n++){var r=e[n];r.onclick=function(){var e=this.getAttribute("data-img");var t=document.getElementById("slideshow-wrapper").getElementsByTagName("img")[e];Slideshow.Utils.show(t);var n=Slideshow.Utils.siblings(t);Slideshow.Utils.hideAll(n);return false}}}},init:function(){for(var e in this.core){if(typeof this.core[e]==="function"){this.core[e]()}}}};Slideshow.init();jQuery(document).ready(function(e){e("#slideshow-wrapper img").hide();e("#slideshow-wrapper img").delay(1700).fadeIn(900);e("a.close-current-post, a.prev-portfolio-post, a.next-portfolio-post").click(function(){e("#slideshow-wrapper img, #slideshow-nav").remove()})})

	jQuery(document).ready(function($){

		$('#slideshow-nav a:first').addClass('active');
		
		$('#slideshow-nav a').click(function(){
			 $('a.active').removeClass('active');
			 $(this).addClass('active');	
		});
		
	});

	</script>		
		</div><!-- /#slideshow-wrapper -->
		<div id="slideshow-nav"></div>
	<?php } ?>	
	</div>
</div>		
		<!-- End carousel -->	
		
	</div><!-- /.slideshowImage -->
	<!-- END Image -->
	
	<!-- START #portfolio-item-meta -->	
	<div id="<?php if ($img_align == 'right') { ?>portfolio-item-meta-right<?php }  else { ?> portfolio-item-meta<?php } ?>" class="slideshowText">
		
		<h2><?php echo get_the_title( $current_post_id ); ?></h2>
		
		<?php if ( $terms ) { 
					
			// Portfolio category		
			foreach ( $terms as $term ) {
				echo '<p class="jobDesc">' . $term -> name . '</p>';
			}
				
		} ?>		
		
			
			<p class="client"><span><?php _e( 'Client: ', 'awesome' ); ?></span> <?php if( $client ) {  echo $client; }?></p>
			
		
		<?php echo $content; ?>
				
		<?php if( $clienturl ) { ?>			
		<a class="read-more" href="<?php echo $clienturl; ?>" target="_blank"><?php _e('Visit Website', 'awesome'); ?></a>						
		<?php } ?>
		
		<?php
			
		$nonce_prev = wp_create_nonce("portfolio_item_nonce");
		$nonce_next = wp_create_nonce("portfolio_item_nonce");	
		
		?>	

		<div class="slideNav clearfix">
		<?php if ( $_REQUEST['prev_post_id'] && $_REQUEST['next_post_id'] ) { ?>			
			<a class="prev prev-portfolio-post" href="#" rel="prev" href="#" data-post_id="<?php echo $_REQUEST['prev_post_id']; ?>" data-nonce="<?php echo $nonce_prev; ?>">Prev</a>
			<a class="next next-portfolio-post" href="#" rel="next" href="#" data-post_id="<?php echo $_REQUEST['next_post_id']; ?>" data-nonce="<?php echo $nonce_next; ?>">Next</a>
		<?php } else if ( $_REQUEST['prev_post_id'] ) { ?>	
			<a class="prev prev-portfolio-post" href="#" rel="prev" href="#" data-post_id="<?php echo $_REQUEST['prev_post_id']; ?>" data-nonce="<?php echo $nonce_prev; ?>">Prev</a>	
		<?php } else if ( $_REQUEST['next_post_id'] ) { ?>
			<a class="next next-portfolio-post" href="#" rel="next" href="#" data-post_id="<?php echo $_REQUEST['next_post_id']; ?>" data-nonce="<?php echo $nonce_next; ?>"><?php _e('Next', 'awesome'); ?></a>
		<?php } ?>	
			<a class="exit close-current-post"><?php _e('Close', 'awesome'); ?></a>
		</div><!-- /.slideNav -->		
					
	</div>
	<!-- END #portfolio-item-meta -->		
	
	
	
	<div class="portfolio-border grid_12 alpha omega group">&nbsp;</div>
	
	
	</div><!-- /.slideshow -->
	
</div>
<!-- END #portfolio-details -->	

<?php

 	$result['html'] = ob_get_clean();

   	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      	$result = json_encode($result);
      	echo $result;
   	}
   	else {
      	header("Location: ".$_SERVER["HTTP_REFERER"]);
   	}

   	die();

} // End of aw_get_ajax_project


/*-----------------------------------------------------------------------------------*/
/* Get the id of the attachment by providing the source of the image. Needed for
 * finding the image's meta info, such as its width and height.
/*-----------------------------------------------------------------------------------*/

function aw_get_attachment_id_from_src( $image_src ) {
	
	global $wpdb;
	
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	
	return $id;
	
}


/*-----------------------------------------------------------------------------------*/
/* General Settings */
/*-----------------------------------------------------------------------------------*/

/* Output the URL of the current page */

function aw_the_current_page_url() {
	
	$page_url = 'http';
	
	if ( $_SERVER["HTTPS"] == "on" ) {
		$page_url .= "s";
	}
	
	$page_url .= "://";
		
	if ( $_SERVER["SERVER_PORT"] != "80" ) {
		$page_url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} 
	else {
		$page_url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	
	return $page_url;
	
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Meta Box Values */
/*-----------------------------------------------------------------------------------*/

function aw_get_the_preview_img_url() {
	
	global $post;
	$preview_img = get_post_meta( $post->ID, 'portfolio-preview-img', true );
	
	return $preview_img;
	
}


function aw_get_the_portfolio_images( $post_id ) {
		
	$img1 = get_the_post_thumbnail($post_id, 'portfolio-large' ); /* siniii */
	
	$meta_fields = array( $img1 );
	$image_urls = array();
	
	foreach($meta_fields as $meta_field) {
		if( $meta_field ) {
			$image_urls[] = $meta_field;
		}
	}
	
	return $image_urls;
	
}

add_filter( 'the_content_more_link', 'aw_more_link', 10, 2 );

function aw_more_link( $more_link, $more_link_text ) {
	//return str_replace( $more_link_text, 'Continue reading &rarr;', $more_link );
	return '';
}

add_action( 'wp_head', 'aws_custom_css_hook' );
function aws_custom_css_hook( ) {
	echo '<style type="text/css" >';
	echo "\n";
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		echo '.awesome-contact-form { display:none; }';
	}
	
	echo "\n";
	echo '</style>';
	echo "\n";
}



?>