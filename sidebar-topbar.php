<?php
/**
 * The sidebar containing the Topbat widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */

if ( ! is_active_sidebar( 'topbar-widget' ) ) {
	return;
}
?>

<?php
if ( is_active_sidebar( 'topbar-widget' ) ) { ?>
	<?php dynamic_sidebar( 'topbar-widget' ); ?>
<?php }
if ( is_active_sidebar( 'topbar-widget-2' ) ) {  ?>
	<?php dynamic_sidebar( 'topbar-widget-2' ); ?>
<?php } ?>