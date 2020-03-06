<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class( 'item-col col-6 col-sm-4 col-md-3' ); ?>>
	<div class="product-wrapper">
		<div class="product-image">
			<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );

			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 * @hooked woocommerce_template_loop_product_link_close - 20 - Replaced
			 * @hooked woocommerce_show_product_loop_sale_flash - 30
			 * @hooked furnishop_woocommerce_product_loop_quickview - 40
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</div><!-- .product-image -->
		<div class="product-detail">
			<?php
			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10 - Removed
			 * @hooked furnishop_woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5 - Removed
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5 - Removed
			 * @hooked furnishop_woocommerce_template_loop_add_to_cart_before - 9
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 * @hooked furnishop_woocommerce_template_loop_add_to_cart_after - 11
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div><!-- .product-detail -->
	</div><!-- .product-wrapper -->
</li>
