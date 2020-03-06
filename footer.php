<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furnishop
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-content container-fluid">
			<div class="theme-wrapper row">
				<?php
				if ( is_active_sidebar( 'footer-widget' ) ) {  ?>
					<div class="footer-branding footer-widget col-md-6 col-lg-3">
						<?php
						dynamic_sidebar( 'footer-widget' ); ?>
					</div>
				<?php
				}
				if ( is_active_sidebar( 'footer-widget-2' ) ) {  ?>
					<div class="footer-nav footer-widget col-md-6 col-lg-3">
						<?php
						dynamic_sidebar( 'footer-widget-2' ); ?>
					</div>
				<?php
				}
				if ( is_active_sidebar( 'footer-widget-3' ) ) {  ?>
					<div class="footer-nav footer-widget col-md-6 col-lg-3">
						<?php
						dynamic_sidebar( 'footer-widget-3' ); ?>
					</div>
				<?php
				}
				if ( is_active_sidebar( 'footer-widget-4' ) ) {  ?>
					<div class="footer-contacts footer-widget col-md-6 col-lg-3">
						<?php
						dynamic_sidebar( 'footer-widget-4' ); ?>
					</div>
				<?php
				} ?>
			</div>
		</div><!-- .footer-content -->
		<div class="footer-bottom container-fluid">
			<div class="theme-wrapper row">
				<div class="rights copyrights col-md-6">
					&copy; 
					<?php 
					echo date( 'Y' );
					printf( esc_html__( ' Дом мебели Елисей в г. Сыктывкар.', 'furnishop' ) );
					?>
				</div>
				<div class="rights dev-info col-md-6">
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Разработка сайта %s', 'furnishop' ), '<a href="http://imicra.ru/" target="_blank">imicra.ru</a>' );
					?>
				</div>
			</div>
		</div><!-- .footer-bottom -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_sidebar( 'modal' ); ?>

<?php wp_footer(); ?>

</body>
</html>
