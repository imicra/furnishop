<?php
/**
 * The sidebar containing the Header Image widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package komtech
 */

if ( ! is_active_sidebar( 'modal-widget' ) ) {
	return;
}

if ( is_active_sidebar( 'modal-widget' ) ) :
?>
    <div id="contact_form_modal" class="modal-widget" style="display: none;">
        <?php dynamic_sidebar( 'modal-widget' ); ?>
    </div>
<?php
endif;

if ( is_active_sidebar( 'by-one-click' ) ) :
?>
    <div id="by_one_click_modal" class="modal-widget" style="display: none;">
        <?php dynamic_sidebar( 'by-one-click' ); ?>
    </div>
<?php
endif;
