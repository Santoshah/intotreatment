<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" value="" name="s" id="s" placeholder="<?php echo _e('Search', 'awesome'); ?>" />
        <input type="submit" id="searchsubmit" value="<?php echo _e('Search', 'awesome'); ?>" />
    </div>
</form>