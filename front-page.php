<?php
/**
 * The template for Front Page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furnishop
 */

if ( 'page' == get_option( 'show_on_front' ) ) {

    get_header(); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
				
				<?php get_template_part( 'template-parts/frontpage/content', 'slider' ); ?>
				
				<section class="section container-fluid">
					<div class="theme-wrapper">
						<header class="section-heading">
							<i class="im-armchair"></i>
							<h2>Выбор мебели <br>по категориям</h2>
						</header>
						<?php get_template_part( 'template-parts/frontpage/content', 'categories' ); ?>
						<div class="section text-center">
							<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="button main">Вся мебель</a>
						</div>
					</div>
				</section>
				
				<?php get_template_part( 'template-parts/frontpage/content', 'bestselling' ); ?>
				
				<?php get_template_part( 'template-parts/frontpage/content', 'sale' ); ?>
				
				<?php get_sidebar( 'service' ); ?>

                <?php // Show the selected frontpage content.
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', 'page' );
                    endwhile;
                endif;
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    <?php
    get_footer();
} else {

	include( get_home_template() );
}