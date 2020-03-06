<?php
/**
 * The sidebar containing the Topbat widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */

if ( ! is_active_sidebar( 'header-widget' ) ) {
	return;
}
?>

<?php
if ( is_active_sidebar( 'header-widget' ) ) { ?>
	<?php dynamic_sidebar( 'header-widget' ); ?>
<?php }
if ( is_active_sidebar( 'header-widget-2' ) ) {  ?>
	<?php dynamic_sidebar( 'header-widget-2' ); ?>
<?php } ?>