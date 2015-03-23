jQuery(document).ready(function($) {
		
		jQuery('.ajax-load-link').click(function(e) {
		
				 $('html, body').animate({
					 scrollTop: $("#ajaxBlog").offset().top
				 }, 600);
				 
				 jQuery("#ajax_post_container").slideUp(200);
				
				jQuery("#loading-animation").show();
				
				var post_id = jQuery(this).attr("id");
				var ajaxURL = MyAjax.ajaxurl;

				jQuery.ajax({
				type: 'POST',
				url: ajaxURL,
				data: {action: "aw_load_ajax_content", post_id: post_id },
				success: function(response) {
				
					jQuery("#ajax_post_container").html(response);
					jQuery("#ajax_post_container").hide();
					jQuery("#loading-animation").hide();
					
					return false;
					
				},
				
				
				complete: function() {
						
						
					jQuery("#ajax_post_container").slideDown(900);
					jQuery("#ajax_post_container").fadeIn(900);
					jQuery(".remove").click(function(){
						jQuery("#ajax_post_container").slideUp();
						return false;
					});
					
					
				}				
				
			
			});				
				
			return false; 
		
				
		});

});