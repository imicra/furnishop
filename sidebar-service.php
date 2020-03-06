<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */

if ( ! is_active_sidebar( 'service-widget' ) ) {
	return;
}
?>

<section class="section container-fluid">
	<div class="theme-wrapper row">
		<div class="col-12">
			<div class="row our-service-inner">
				<?php dynamic_sidebar( 'service-widget' ); ?>
			</div>
		</div>
	</div>
</section>
