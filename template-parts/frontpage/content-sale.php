<?php
/**
 * Display Sale products slider on Front Page
 *
 * @package Furnishop
 */

$query_args = array(
    'posts_per_page'    => 6,
    'no_found_rows'     => 1,
    'post_status'       => 'publish',
    'post_type'         => 'product',
    'meta_query'        => WC()->query->get_meta_query(),
	'order'             => 'DESC',
    'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
);
$products = new WP_Query( $query_args );

if ( $products->have_posts() ):
?>
<section class="section container-fluid">
	<div class="theme-wrapper">
		<header class="section-heading">
			<i class="im-discount"></i>
			<h2>Распродажа <br>мебели</h2>
		</header>
		<div class="woocommerce columns-4">
			<ul class="products row">
				<div class="carousel swiper-container__carousel">
					<div class="swiper-wrapper">
						<?php while ( $products->have_posts() ) : $products->the_post(); ?>

							<?php wc_get_template_part( 'content', 'carousel' ); ?>

						<?php endwhile; // end of the loop. ?>
		
					</div>
					<div class="carousel-button button-prev"></div>
					<div class="carousel-button button-next"></div>
				</div>
			</ul>
		</div>
		<div class="section text-center">
			<a href="<?php echo esc_url( home_url( '/sale/' ) ); ?>" class="button main">Вся распродажа</a>
		</div>
	</div>
</section>
<?php 
endif; 
wp_reset_postdata();