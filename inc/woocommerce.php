<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Furnishop
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function furnishop_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'furnishop_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function furnishop_woocommerce_scripts() {
	wp_enqueue_style( 'furnishop-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'furnishop-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'furnishop_woocommerce_scripts' );

/**
 * Change Currency Simbol to Custom.
 */
function furnishop_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = 'Р'; break;
     }
     return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'furnishop_currency_symbol', 10, 2);

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function furnishop_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'furnishop_woocommerce_active_body_class' );

/**
 * Add size for Subcategory thumbnails on Front page.
 */
function furnishop_woocommerce_subcategory_thumbnail() {
    return array( 570, 250, true );
}
add_filter( 'subcategory_archive_thumbnail_size', 'furnishop_woocommerce_subcategory_thumbnail' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function furnishop_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'furnishop_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function furnishop_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'furnishop_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function furnishop_woocommerce_loop_columns() {
	return 4;
}
add_filter( 'loop_shop_columns', 'furnishop_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function furnishop_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'furnishop_woocommerce_related_products_args' );

if ( ! function_exists( 'furnishop_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function furnishop_woocommerce_product_columns_wrapper() {
		$columns = furnishop_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
//add_action( 'woocommerce_before_shop_loop', 'furnishop_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'furnishop_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function furnishop_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'furnishop_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Customize WooCommerce archive-product.
 *
 */
/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'furnishop_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function furnishop_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area container-fluid theme-wrapper">
			<main id="main" class="site-main row" role="main">
				<div class="col">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'furnishop_woocommerce_wrapper_before' );

if ( ! function_exists( 'furnishop_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function furnishop_woocommerce_wrapper_after() {
			?>
				</div><!-- .col -->
			</main><!-- #main .row -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'furnishop_woocommerce_wrapper_after' );

/**
 * Sidebar top.
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'furnishop_woocommerce_sidebar_top', 'woocommerce_catalog_ordering', 30 );
add_action( 'furnishop_woocommerce_sidebar_top', 'woocommerce_result_count', 20 );

/**
 * Replace breadcrumbs.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'furnishop_woocommerce_heading', 'woocommerce_breadcrumb', 10 );

/**
 * Remove Notices.
 */
function remove_added_to_cart_notice() {
    $notices = WC()->session->get('wc_notices', array());

    foreach( $notices['notices'] as $key => &$notice){
        if( strpos( $notice, 'success' ) !== false){
            $added_to_cart_key = $key;
            break;
        }
    }
    unset( $notices['notices'][$added_to_cart_key] );

    WC()->session->set('wc_notices', $notices);
}
add_action( 'woocommerce_shortcode_before_product_cat_loop', 'remove_added_to_cart_notice', 1 );
//add_action( 'woocommerce_before_shop_loop', 'remove_added_to_cart_notice', 1 );
//add_action( 'woocommerce_before_single_product', 'remove_added_to_cart_notice', 1 );

remove_action( 'woocommerce_shortcode_before_product_cat_loop', 'wc_print_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10);

/**
 * Catalog ordering.
 */
if ( ! function_exists( 'furnishop_woocommerce_catalog_ordering' ) ) {

    function furnishop_woocommerce_catalog_ordering() {
        return array(
                'menu_order' => __( 'Сортировать', 'woocommerce' ),
                'price'      => __( 'Сначала дешевые', 'woocommerce' ),
                'price-desc' => __( 'Сначала дорогие', 'woocommerce' ),
                'date'       => __( 'Новинки', 'woocommerce' ),
                'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        );
    }
}
add_filter( 'woocommerce_catalog_orderby', 'furnishop_woocommerce_catalog_ordering' );

/**
 * Customize WooCommerce content-product.
 *
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 30 );

if ( ! function_exists( 'furnishop_woocommerce_product_loop_quickview' ) ) {

	/**
	 * Get quickview for the loop.
	 */
	function furnishop_woocommerce_product_loop_quickview() {
		wc_get_template( 'loop/quickview.php' );
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'furnishop_woocommerce_product_loop_quickview', 40 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'furnishop_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Product title for the loop.
	 */
	function furnishop_woocommerce_template_loop_product_title() {
		?>
			<h2 class="woocommerce-loop-product__title">
				<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		<?php
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'furnishop_woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'furnishop_woocommerce_template_loop_add_to_cart_before' ) ) {
	/**
	 * Before Add to cart button.
	 *
	 * Wrapper start for Add to cart button.
	 *
	 * @return void
	 */
	function furnishop_woocommerce_template_loop_add_to_cart_before() {
		?>
			<div class="actions">
		<?php
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'furnishop_woocommerce_template_loop_add_to_cart_before', 9 );

if ( ! function_exists( 'furnishop_woocommerce_template_loop_add_to_cart_after' ) ) {
	/**
	 * After Add to cart button.
	 *
	 * Wrapper end for Add to cart button.
	 *
	 * @return void
	 */
	function furnishop_woocommerce_template_loop_add_to_cart_after() {
		?>
			</div><!-- .actions -->
		<?php
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'furnishop_woocommerce_template_loop_add_to_cart_after', 11 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/**
 * Customize WooCommerce content-single-product.
 *
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

add_action( 'furnishop_woocommerce_product_sale_flash', 'woocommerce_show_product_sale_flash', 10 );

if ( ! function_exists( 'furnishop_woocommerce_template_single_attributes' ) ) {
	/**
	 * Show attributes after summary in product single view
	 */
	function furnishop_woocommerce_template_single_attributes($product) {
		global $product;
		wc_display_product_attributes( $product );
	}
}
add_action( 'woocommerce_single_product_summary', 'furnishop_woocommerce_template_single_attributes', 45 );


if ( ! function_exists( 'furnishop_woocommerce_remove_product_tabs' ) ) {
	/**
	 * Removing Tabs
	 */
	function furnishop_woocommerce_remove_product_tabs($tabs) {
		unset( $tabs['additional_information'] );

		return $tabs;
	}
}
add_action( 'woocommerce_product_tabs', 'furnishop_woocommerce_remove_product_tabs', 98 );

if ( ! function_exists( 'furnishop_by_one_click_button' ) ) {

	/**
	 * Add button "By One Click".
	 */
	function furnishop_by_one_click_button() {
		?>
			<a href="#by_one_click_modal" data-post_id="<?php echo esc_attr( get_the_ID() ); ?>" class="by_one_click fancyboxModal">Купить в один клик</a>
		<?php
	}
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'furnishop_by_one_click_button', 10 );

/**
* Output price for variable product
*/
function furnishop_variable_price_format( $price, $product ) {

    $prefix = sprintf('<span class="variation-price-from">%s: </span>', __('От', 'furnishop'));

    $min_price_regular = $product->get_variation_regular_price( 'min', true );
    $min_price_sale    = $product->get_variation_sale_price( 'min', true );
    $max_price = $product->get_variation_price( 'max', true );
    $min_price = $product->get_variation_price( 'min', true );

    $price = ( $min_price_sale == $min_price_regular ) ?
        wc_price( $min_price_regular ) :
        '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';

    return ( $min_price == $max_price ) ?
        $price :
        sprintf('%s%s', $prefix, $price);

}
add_filter( 'woocommerce_variable_sale_price_html', 'furnishop_variable_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'furnishop_variable_price_format', 10, 2 );

/**
 * Customize Cart & Checkout pages.
 *
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 1 );

//Remove Checkout Login Form.
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );

if ( ! function_exists( 'furnishop_override_checkout_fields' ) ) {
	function furnishop_override_checkout_fields($fields) {
		//Remove country field in checkout page.
		//unset( $fields['billing']['billing_country'] );
		unset( $fields['billing']['billing_state'] );

		//Patronymic field in checkout page.
		$fields['billing']['billing_patronymic'] = array(
			'label'     => __('Отчество', 'woocommerce'),
			'required'  => true,
			'class'     => array('form-row-patronymic'),
			'clear'     => true,
			'priority'  => 21
		);

//		$fields['billing']['billing_last_name']['priority'] = 10;
//		$fields['billing']['billing_first_name']['priority'] = 20;
//		$fields['billing']['billing_patronymic']['priority'] = 30;
//		$fields['billing']['billing_company']['priority'] = 40;
//		$fields['billing']['billing_address_1']['priority'] = 50;
//		$fields['billing']['billing_address_2']['priority'] = 60;
//		$fields['billing']['billing_city']['priority'] = 70;
//		$fields['billing']['billing_postcode']['priority'] = 90;
//		$fields['billing']['billing_phone']['priority'] = 100;
		$fields['billing']['billing_email']['required'] = false;

		return $fields;
	}
}
add_action( 'woocommerce_checkout_fields', 'furnishop_override_checkout_fields' );

//function furnishop_override_address_fields($address_fields) {
//	$address_fields['billing']['billing_last_name']['priority'] = 10;
//	$address_fields['billing']['billing_first_name']['priority'] = 20;
//	$address_fields['billing']['billing_patronymic']['priority'] = 30;
//	$address_fields['billing']['billing_company']['priority'] = 40;
//	$address_fields['billing']['billing_address_1']['priority'] = 50;
//	$address_fields['billing']['billing_address_2']['priority'] = 60;
//	$address_fields['billing']['billing_city']['priority'] = 70;
//	$address_fields['billing']['billing_state']['priority'] = 80;
//	$address_fields['billing']['billing_postcode']['priority'] = 90;
//	$address_fields['billing']['billing_phone']['priority'] = 100;
//	$address_fields['billing']['billing_email']['priority'] = 110;
//
//	return $address_fields;
//}
//add_action( 'woocommerce_default_address_fields', 'furnishop_override_address_fields' );

//function wc_imod_billing_fields( $fields ) {
//	$fields['billing_patronymic']['label'] = 'Отчество';
//    $fields['billing_patronymic']['required'] = true;
//    $fields['billing_patronymic']['priority'] = 8;
//	$fields['billing_patronymic']['class'] = array( 'form-row-wide' );
//
//    return $fields;
//}
//add_filter( 'woocommerce_billing_fields', 'wc_imod_billing_fields' );

/**
 * Display Patronymic field value on the order edit page.
 */
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'furnishop_checkout_field_display_admin_order_meta', 10, 1 );

function furnishop_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Отчество из формы оплаты').':</strong> ' . get_post_meta( $order->get_id(), '_billing_patronymic', true ) . '</p>';
}

/**
 * Display thankyou notice.
 */
if ( ! function_exists( 'furnishop_woocommerce_thankyou_order_received_text' ) ) {
	function furnishop_woocommerce_thankyou_order_received_text() {
		echo 'Спасибо. Ваш заказ принят в обработку. Мы свяжемся с Вами по указанному в заказе телефону для уточнения всех условий оплаты и доставки.';
	}
}
add_filter( 'woocommerce_thankyou_order_received_text', 'furnishop_woocommerce_thankyou_order_received_text' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'furnishop_woocommerce_header_cart' ) ) {
			furnishop_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'furnishop_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function furnishop_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		furnishop_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'furnishop_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'furnishop_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function furnishop_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Посмотреть корзину', 'furnishop' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d Товар', '%d Товаров', WC()->cart->get_cart_contents_count(), 'furnishop' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<i class="fa fa-shopping-basket">
				<span class="cart-quantity">
					<?php echo WC()->cart->get_cart_contents_count(); ?>
				</span>
			</i>
			<span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'furnishop_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function furnishop_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = 'shopping-bag-item';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php furnishop_woocommerce_cart_link(); ?>
			</li>
			<li class="cart-title"><b>Корзина</b></li>
			<li>
				<?php the_widget( 'WC_Widget_Cart' ); ?>
			</li>
		</ul>
		<?php
	}
}

/**
 * Woocommerce shop manager role.
 */
function furnishop_remove_manager_menus(){

    // If the current user is not an admin
    if ( !current_user_can('manage_options') ) {

        //remove_menu_page( 'woocommerce' ); // WooCommerce admin menu slug
		remove_menu_page( 'edit.php' );                   //Posts
		remove_menu_page( 'upload.php' );                 //Media
		remove_menu_page( 'edit.php?post_type=page' );    //Pages
		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page( 'edit.php?post_type=slider' );  //Slider
		remove_menu_page( 'wpcf7' );                      //Contact Form 7
		remove_menu_page( 'tools.php' );                  //Media

    }
}
add_action( 'admin_menu', 'furnishop_remove_manager_menus' );

function furnishop_remove_manager_submenu() {

	$remove = array( 'wc-settings', 'wc-status', 'wc-addons', );

	foreach ( $remove as $submenu_slug ) {
		if ( ! current_user_can( 'update_core' ) ) {
			remove_submenu_page( 'woocommerce', $submenu_slug );
		}
	}

}
add_action( 'admin_menu', 'furnishop_remove_manager_submenu', 99, 0 );
