<?php
/**
 * File posts-testimonials.php.
 * 
 * Custom Post Type for Testimonials.
 * 
 * @package Furnishop
 */

function furnishop_slider_posttypes() {
    
    $labels = array(
        'name'               => 'Слайдер',
        'singular_name'      => 'Слайдер',
        'menu_name'          => 'Слайдер',
        'name_admin_bar'     => 'Слайдер',
        'add_new'            => 'Добавить Слайд',
        'add_new_item'       => 'Добавить Новый Слайд',
        'new_item'           => 'Новый Слайд',
        'edit_item'          => 'Редактировать Слайд',
        'view_item'          => 'Смотреть Слайд',
        'all_items'          => 'Все Слайды',
        'search_items'       => 'Искать Слайды',
        'parent_item_colon'  => 'Родительский Слайд:',
        'not_found'          => 'Не найдено Слайдов.',
        'not_found_in_trash' => 'Не найдено Слайдов в корзине.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
		'show_in_nav_menus'  => false,
        'menu_icon'          => 'dashicons-slides',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
    );
    register_post_type( 'slider', $args );
}
add_action( 'init', 'furnishop_slider_posttypes' );

