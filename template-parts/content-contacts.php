<?php
/**
 * Template part for displaying page content in content-contacts.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furnishop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid' ); ?>>
	<div class="theme-wrapper row">
		<header class="entry-header col-12">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="col-12">
			<?php
			/**
			 * Hook: furnishop_woocommerce_heading.
			 *
			 * @hooked woocommerce_breadcrumb - 10
			 */
			do_action( 'furnishop_woocommerce_heading' );
			?>
		</div>

		<?php furnishop_post_thumbnail(); ?>

		<div class="entry-content col-12">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'komtech' ),
					'after'  => '</div>',
				) );
			?>
			<div class="map-wrapper">
				<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A19a8b987b616a545bb9edc3d82695f2d26047efca6fa33366a18dad1bd776494&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
			</div>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'komtech' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div><!-- .theme-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
