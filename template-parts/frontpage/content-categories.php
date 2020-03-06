<?php
/**
 * Display Shop Categories on Front Page
 *
 * @package Furnishop
 */

$args = array(
	'taxonomy' => 'product_cat',
	'parent' => 0
);

$terms = get_terms( $args );

if ( $terms ) : ?>
	<ul class="product-cats row">
		<?php
		foreach ( $terms as $term ) :
			
			//category background color
			$product_cat_color = get_term_meta( $term->term_id, 'furnishop_meta_color', true );
			//category thumbnail
			$product_cat_image = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
			
			if ( $product_cat_image ) :
		?>
			<li class="category col-sm-6">
				<div class="block-inner" style="background-color:<?php echo esc_attr( $product_cat_color ) ? esc_attr( $product_cat_color ) : ''; ?>">
					<?php woocommerce_subcategory_thumbnail( $term ); ?>
					<h2 class="cat-title">
						<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="<?php echo $term->slug; ?>">
							<?php echo $term->name; ?>
						</a>
					</h2>
					<div class="cat-link">
						<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="button white shadow">Показать все</a>
					</div>
				</div>
			</li>
		<?php 
		endif;
		endforeach; ?>
	</ul>
<?php
endif;