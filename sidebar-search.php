<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */

if ( ! is_active_sidebar( 'search' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'search' ); ?>
