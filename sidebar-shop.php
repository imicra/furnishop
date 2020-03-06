<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */
?>

<div class="toolbar-widgets row">
	<div class="col-md-3">
		<?php dynamic_sidebar( 'shop-col-1' ); ?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<?php dynamic_sidebar( 'shop-col-2' ); ?>
		</div>
	</div>
</div>
