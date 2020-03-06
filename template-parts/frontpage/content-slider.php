<?php
/**
 * Display Slider on Front Page
 *
 * @package Furnishop
 */

/* 
* Display Slides
*/
$args = array( 
	'post_type' => 'slider',
	'orderby' => array( 'menu_order' => 'ASC' ),
	'posts_per_page' => -1
);

$slides = new WP_Query( $args );

if ( $slides->have_posts() ):
?>
	<div class="mainbanner">
		<div class="container-fluid">
			<div class="theme-wrapper row">
				<div class="col-lg-9 offset-lg-3">
					<div class="slider-container swiper-container__slider">
						<div class="tp-loader spinner4">
							<div class="dot1"></div>
							<div class="dot2"></div>
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>
						<div class="swiper-wrapper">
							<?php 
							while ( $slides->have_posts() ) : $slides->the_post(); 

							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							?>
								<div class="slider-slide swiper-slide">
									<div class="slider-bgimg" style="background-image: url(<?php echo $thumbnail[0]; ?>);"></div>
									<article class="slider-content">
										<header>
											<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
										</header>
										<div class="entry-content">
											<?php the_content(); ?>
										</div>
									</article>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="slider-pagination"></div>
						<div class="slider-button button-prev"></div>
						<div class="slider-button button-next"></div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .mainbanner -->
<?php 
endif; 
wp_reset_postdata();