<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
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
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="shop_attributes">
	<?php foreach ( $attributes as $attribute ) : ?>
		
			<span class="att_label"><?php echo wc_attribute_label( $attribute->get_name() ); ?>: <span class="att_value">
			<?php
				$values = array();

				if ( $attribute->is_taxonomy() ) {
					$attribute_taxonomy = $attribute->get_taxonomy_object();
					$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

					foreach ( $attribute_values as $attribute_value ) {
						$value_name = esc_html( $attribute_value->name );
						$value_color = get_term_meta( $attribute_value->term_id, 'furnishop_tag_color', true );

						if ( $attribute_taxonomy->attribute_public ) {
							if ( $value_color ) {
								$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag"><div style="width:30px; height:30px; background-color:' . esc_attr( $value_color ) . '" title="' . $value_name . '"></div></a>';
							} else {
								$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
							}
						} else {
							if ( $value_color ) {
								$values[] = '<div style="width:30px; height:30px; background-color:' . esc_attr( $value_color ) . '" title="' . $value_name . '"></div>';
							} else {
								$values[] = $value_name;
							}
						}
					}
				} else {
					$values = $attribute->get_options();

					foreach ( $values as &$value ) {
						$value = make_clickable( esc_html( $value ) );
					}
				}

				echo apply_filters( 'woocommerce_attribute', wptexturize( implode( ', ', $values ) ), $attribute, $values );
			?></span></span>
		
	<?php endforeach; ?>
</div>
