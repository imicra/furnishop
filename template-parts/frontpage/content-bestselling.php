<?php
/**
 * Display Best selling products slider on Front Page
 *
 * @package Furnishop
 */

$query_args = array(
    'posts_per_page'    => 8,
    'post_status'       => 'publish',
    'post_type'         => 'product',
	'meta_key'          => 'total_sales',
	'orderby'           => 'meta_value_num',
    'meta_query'        => WC()->query->get_meta_query()
);
$products = new WP_Query( $query_args );

if ( $products->have_posts() ):
?>
<section class="section container-fluid">
	<div class="theme-wrapper">
		<header class="section-heading">
			<i class="im-three-stars"></i>
			<h2>Популярные <br>товары</h2>
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
	</div>
</section>
<?php 
endif; 
wp_reset_postdata();