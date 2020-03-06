<?php
/*
 * By One Click Form.
 *
 * @package Furnishop
 */

function by_one_click_form() {

    $post_title = get_the_title( intval( $_POST['post_id'] ) );
    $tel  = trim($_POST["tel"]);
    $name = trim($_POST["name"]);
	
	$sitename = "wordpress@business-proj";
	
	remove_all_filters( 'wp_mail_from' );
	remove_all_filters( 'wp_mail_from_name' );
	
	$to = "imicra@mail.ru";
	$subject = "Новая заявка с сайта \"$sitename\"";
	$message = "Купить в один клик<br><b>$post_title</b><br><b>Телефон:</b> $tel <br><b>Имя:</b> $name";
	$headers = array(
		'From: Сайт <wordpress@business-proj>',
		'content-type: text/html',
	);

    wp_mail( $to, $subject, $message, $headers );

}
if( wp_doing_ajax() ) {
	add_action('wp_ajax_by_one_click_form', 'by_one_click_form');
	add_action('wp_ajax_nopriv_by_one_click_form', 'by_one_click_form');
}