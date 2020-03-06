<?php
/**
 * Product single product sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

if( $product->is_on_sale() && $product->is_type( 'variable' ) ) :
    
    $available_variations = $product->get_available_variations();
    for ( $i = 0; $i < count( $available_variations ); ++$i ) {
        $variation_id=$available_variations[$i]['variation_id'];
        $variation= new WC_Product_Variation( $variation_id );
        $regular_price = $variation ->get_regular_price();
        $sale_price = $variation ->get_sale_price();
    }

    $sale = ceil( ( ($regular_price - $sale_price) / $regular_price ) * 100 );

    ?>
    <?php if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) : ?>

        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">-' . $sale . '%</span>', $post, $product ); ?>

    <?php endif;

elseif( $product->is_on_sale() && $product->is_type( 'simple' ) ) :
    
    $sale_price = method_exists( $product, 'get_sale_price' ) ? $product->get_sale_price() : $product->sale_price;
    $regular_price = method_exists( $product, 'get_regular_price' ) ? $product->get_regular_price() : $product->regular_price;

    $sale = ceil( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );

    ?>
    <?php if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) : ?>

        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">-' . $sale . '%</span>', $post, $product ); ?>

    <?php endif;

endif;