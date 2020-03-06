<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furnishop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid' ); ?>>
	<div class="theme-wrapper row">
		<?php if ( is_front_page() ) {
			$order = ' order-md-1';
		} else {
			$order = '';
		}
		?>
		<header class="entry-header col-12<?php if ( ! empty( $order ) ) echo esc_attr( $order ); ?>">
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
		<?php
		if ( ! is_front_page() ) :
			furnishop_post_thumbnail(); 
		 endif;
		?>
		
		<?php if ( is_front_page() && has_post_thumbnail() ) {
			$col = 'col-md-9 order-md-last';
		} else {
			$col = 'col-12';
		}
		?>
		<div class="entry-content <?php echo esc_attr( $col ); ?>">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'furnishop' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'furnishop' ),
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
		<?php if ( is_front_page() && has_post_thumbnail() ) : ?>
			<div class="col-md-3 order-md-2">
				<?php furnishop_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
	</div><!-- .theme-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
