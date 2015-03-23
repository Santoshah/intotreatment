<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<?php echo _e('You must be', 'awesome'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to="><?php echo _e('logged in', 'awesome'); ?></a> <?php echo _e('to post a comment.', 'awesome'); ?>
<pre><?php else : ?></pre>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform"></form>

<?php if ( $user_ID ) : ?>

<?php echo _e('Logged in as', 'awesome'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"></a>. <a title="Log out of this account" href="<?php echo wp_logout_url(get_permalink()); ?>"><?php echo _e('Log out', 'awesome'); ?></a>

<?php else : ?>

<input id="author" name="author" type="text" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php echo _e('Name', 'awesome'); ?> <?php if ($req) echo "(required)"; ?></small></label>

<input id="email" name="email" type="text" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php echp _e('Mail (will not be published)', 'awesome'); ?> <?php if ($req) echo "(required)"; ?></small></label>

<input name="url" type="text" id="url" value="" size="22" tabindex="3" />
<label for="url"><small><?php echo _e('Website', 'awesome'); ?></small></label>

<?php endif; ?>

<!--<small><strong>XHTML:</strong> You can use these tags: <code></code></small>

-->

<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4">

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo _e('Submit Comment', 'awesome'); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>

</div>
