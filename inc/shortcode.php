<?php
/*
 * Shortcodes.
 *
 * @package Furnishop
 */

/*
 * FontAwesome.
 */
function icon_fa( $atts ) {
	extract( shortcode_atts( array(
		'icon' => ''
	), $atts ) );

	return '<i class="fa fa-' . $icon . '"></i>';
}
add_shortcode( 'font-awesome', 'icon_fa' );

/*
 * FontFurnishop.
 */
function icon_im( $atts ) {
	extract( shortcode_atts( array(
		'icon' => ''
	), $atts ) );

	return '<i class="im-' . $icon . '"></i>';
}
add_shortcode( 'font-furnishop', 'icon_im' );

/*
 * Button for modal.
 */
function furnishop_btn_modal( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	return '<a class="button fancyboxModal ' . $class . '" href="#contact_form_modal">' . do_shortcode( $content ) . '</a>';
}
add_shortcode( 'btn-modal', 'furnishop_btn_modal' );

/*
 * Button.
 */
function furnishop_btn( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
		'link' => ''
	), $atts ) );

	return '<a class="button ' . $class . '" href="' . $link . '">' . do_shortcode( $content ) . '</a>';
}
add_shortcode( 'btn-furnishop', 'furnishop_btn' );

/*
 * Form By One Click.
 */
function furnishop_by_one_click_form() {
	$output = '<form>';
	$output .= '<div class="form-group">';
	$output .= '<input type="tel" name="your-tel" value="" size="40" class="tel" required placeholder="Ваш телефон *">';
	$output .= '</div>';
	$output .= '<div class="form-group">';
	$output .= '<input type="text" name="your-name" value="" size="40" class="name" required placeholder="Ваше имя *">';
	$output .= '</div>';
	$output .= '<div class="form-group no-margin">';
	$output .= '<input type="submit" value="Отправить">';
	$output .= '</div>';
	$output .= '</form>';

	return $output;
}
add_shortcode( 'by-one-click', 'furnishop_by_one_click_form' );
