<?php
/**
 * @package WordPress
 * @subpackage Awesome
 */
?>
<?php if(has_nav_menu('primary')) { 
wp_nav_menu( array(
	'container' => false,
	'theme_location' => 'primary',
	'sort_column' => 'menu_order',
	'menu_class' => 'nav-menu',
	'fallback_cb' => 'default_menu'
)); 

} else { ?>
<ul class="nav-menu">
	<li><a href="<?php echo admin_url(); ?>nav-menus.php"><?php echo __('Set up your custom menu.', 'awesome'); ?></a></li>
</ul>
<?php } ?>