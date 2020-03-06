<?php
/**
 * Furnishop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Furnishop
 */

if ( ! function_exists( 'furnishop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function furnishop_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Furnishop, use a find and replace
		 * to change 'furnishop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'furnishop', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		//payment logos
		add_image_size( 'furnishop-payment-logos', 9999, 64, false );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'top' => esc_html__( 'Главное меню', 'furnishop' ),
			'social' => esc_html__( 'Соц иконки', 'furnishop' ),
			'catalog' => esc_html__( 'Каталог', 'furnishop' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'furnishop_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 160,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'furnishop_setup' );

/**
 * This function allows modification of the list of image sizes that are available to administrators in the WordPress.
 *
 * @param array $sizes Array of image sizes.
 *
 * @return array
 */
function furnishop_media_uploader_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
            'furnishop-payment-logos' => esc_html__( 'Логотипы платежных систем', 'furnishop' ),
	) );
}
add_filter( 'image_size_names_choose', 'furnishop_media_uploader_custom_sizes' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function furnishop_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'furnishop_content_width', 640 );
}
add_action( 'after_setup_theme', 'furnishop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function furnishop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Модальное Окно', 'furnishop' ),
		'id'            => 'modal-widget',
		'description'   => esc_html__( 'Область Виджетов для контактной формы в модальном окне.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="modal-widget__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="modal-widget__title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Наши услуги', 'furnishop' ),
		'id'            => 'service-widget',
		'description'   => esc_html__( 'Область Виджетов для услуг на главной странице.', 'furnishop' ),
		'before_widget' => '<div id="%1$s" class="box-widget__item col-md-4 %2$s"><div class="box-inner">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="box-widget__title">',
		'after_title'   => '</h5>',
	) );

	register_sidebars( 2, array(
		/* translators: %d is widget area id */
		'name'          => esc_html__( 'Контакты Хэдера %d', 'furnishop' ),
		'id'            => 'header-widget',
		'description'   => esc_html__( 'Область для контактов в Хэдере.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="header-widget__item %2$s col-lg-6">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="header-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebars( 2, array(
		/* translators: %d is widget area id */
		'name'          => esc_html__( 'Контакты Топбара %d', 'furnishop' ),
		'id'            => 'topbar-widget',
		'description'   => esc_html__( 'Область для контактов в топбаре.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="topbar-widget__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="header-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Поиск товаров', 'furnishop' ),
		'id'            => 'search',
		'description'   => esc_html__( 'Область для поиска товаров в хэдере.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="serch-header__widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebars( 4, array(
		/* translators: %d is widget area id */
		'name' => esc_html__( 'Область Футера %d','furnishop' ),
		'id' => 'footer-widget',
		'before_widget'	=> '<section id="%1$s" class="footer-widget__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Фильтр Цены', 'furnishop' ),
		'id'            => 'shop-col-1',
		'description'   => esc_html__( 'Область для фильтра по цене.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="shop-toolbar__widget %2$s col-12">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Фильтры атрибутов', 'furnishop' ),
		'id'            => 'shop-col-2',
		'description'   => esc_html__( 'Область для фильтров по атрибутам.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="shop-toolbar__widget %2$s col-md-4">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Купить в один клик', 'furnishop' ),
		'id'            => 'by-one-click',
		'description'   => esc_html__( 'Область Виджета для контактной формы в модальном окне.', 'furnishop' ),
		'before_widget' => '<section id="%1$s" class="modal-widget__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="modal-widget__title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'furnishop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function furnishop_scripts() {
	wp_enqueue_style( 'furnishop-font', get_template_directory_uri() . '/fonts/century-gothic/css/century-gothic.css' );

	wp_enqueue_style( 'furnishop-bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.min.css' );

	wp_enqueue_style( 'furnishop-style', get_stylesheet_uri() );

	wp_enqueue_style( 'furnishop-font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'furnishop-font-theme', get_template_directory_uri() . '/fonts/furnishop/css/furnishop.css' );

	wp_enqueue_style( 'furnishop-font-rub', get_template_directory_uri() . '/fonts/b-rub_arial/stylesheet.css' );

	wp_enqueue_style( 'furnishop-swiper-css', get_template_directory_uri() . '/css/swiper.min.css' );

	wp_enqueue_style( 'furnishop-fancybox-css', get_template_directory_uri() . '/css/jquery.fancybox.css' );

	wp_enqueue_script( 'furnishop-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '1.0.0', true );

	wp_enqueue_script( 'furnishop-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'furnishop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'furnishop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'furnishop-script', 'fsAjax',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')
		)
	);
}
add_action( 'wp_enqueue_scripts', 'furnishop_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Walker Class for Nav-Social.
 */
require get_template_directory() . '/inc/social-walker-nav-menu.php';

/**
 * CPT for SLIDER.
 */
require get_template_directory() . '/inc/cpt/slider.php';

/**
 * Add Custom Fields to WooCommerce Product Category.
 */
require get_template_directory() . '/inc/woocommerce-cat.php';

/**
 * Customize Admin area.
 */
require get_template_directory() . '/inc/admin.php';

/**
 * Shortcodes.
 */
require get_template_directory() . '/inc/shortcode.php';

/**
 * By One Click Form.
 */
require get_template_directory() . '/inc/by-one-click-action.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
