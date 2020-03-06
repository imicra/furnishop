<?php
/* 
 * Customize Admin area.
 * 
 * @package Furnishop
 */

/**
 * Add custom logo to the login page.
 */
function furnishop_filter_login_head() {
 
    if ( has_custom_logo() ) :
 
        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $image[0] ); ?>);
                -webkit-background-size: <?php echo absint( $image[1] )?>px;
                background-size: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
                width: <?php echo absint( $image[1] ) ?>px;
            }
        </style>
        <?php
    endif;
}
add_action( 'login_head', 'furnishop_filter_login_head', 100 );

/**
 * Change the Footer in WordPress Admin Panel.
 */
function remove_footer_admin () {
    echo 'Разработка сайта - Василий Жигалов: <a href="http://imicra.ru/" target="_blank">imicra.ru</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/**
 * Add Custom Dashboard Widgets.
 */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    
    wp_add_dashboard_widget('custom_help_widget', 'Поддержка сайта', 'custom_dashboard_help');
}

function custom_dashboard_help() {
    echo '<p>Добро пожаловать! Требуется помощь? Напишите на <a href="mailto:imicra@mail.ru">почту</a>. Все контакты на сайте: <a href="http://imicra.ru/" target="_blank">imicra.ru</a>.</p><p><b>Документация:</b> <a href="http://imicra.ru/elisey-doc/" target="_blank">на сайте</a>.</p>';
}