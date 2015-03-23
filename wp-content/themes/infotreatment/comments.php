<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'Comment (1)', 'Comments (%1$s)', get_comments_number(), 'twentytwelve' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'awesome_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'awesome' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'awesome' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'awesome' ) ); ?></div>
		</div>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'awesome' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

<?php 


$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? "aria-required='true'" : '' );
$fields =  array(

    'author' => '<p class="input_field"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . __('Name', 'awesome') . '" /> <label class="required" for="author">' . __('* required field', 'awesome') . '</label></p>',
		
    'email'  => '<p class="input_field"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . __('Email', 'awesome') . '"  /> <label class="required" for="email">' . __('* required field', 'awesome') . '</label></p>',
		
	'url' => '',	
	
);
$comments_args = array(
    'fields' =>  $fields,
    'title_reply'=>__('Add Your Comment', 'awesome'),
    'label_submit' => __('Post Comment', 'awesome'),
	'comment_field' => '<p class="comment-form-comment"><label class="comment_field" for="comment">' . __( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . __('Message', 'awesome') . '"></textarea></p>',
	'comment_notes_after'  => '',	
);
comment_form($comments_args);

?>

</div><!-- #comments .comments-area -->