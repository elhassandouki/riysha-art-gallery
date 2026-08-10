<?php
/**
 * Riysha Art Gallery - WordPress Theme Functions
 * 
 * @package Riysha Art Gallery
 * @since 1.0.0
 */

// منع الوصول المباشر
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// تعريف الثوابت
define( 'RIYSHA_VERSION', '1.0.0' );
define( 'RIYSHA_DIR', get_template_directory() );
define( 'RIYSHA_URI', get_template_directory_uri() );

/**
 * إضافة الـ Stylesheets و Scripts
 */
function riysha_enqueue_assets() {
    // الـ CSS الرئيسي
    wp_enqueue_style(
        'riysha-style',
        RIYSHA_URI . '/style.css',
        array(),
        RIYSHA_VERSION
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // JavaScript
    wp_enqueue_script(
        'riysha-script',
        RIYSHA_URI . '/js/script.js',
        array( 'jquery' ),
        RIYSHA_VERSION,
        true
    );

    // Localize script
    wp_localize_script(
        'riysha-script',
        'riysha',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'riysha-nonce' )
        )
    );
}
add_action( 'wp_enqueue_scripts', 'riysha_enqueue_assets' );

/**
 * Setup Theme
 */
function riysha_setup() {
    // دعم RTL
    add_theme_support( 'rtl-languages' );

    // دعم المسميات
    load_theme_textdomain( 'riysha-art-gallery', RIYSHA_DIR . '/languages' );

    // دعم الصور المميزة
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true );
    add_image_size( 'product-medium', 400, 400, true );
    add_image_size( 'product-large', 600, 600, true );

    // دعم Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'القائمة الرئيسية', 'riysha-art-gallery' ),
        'footer'  => esc_html__( 'قائمة التذييل', 'riysha-art-gallery' ),
    ) );

    // دعم WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // دعم Custom Logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // دعم Title Tag
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'riysha_setup' );

/**
 * تسجيل Sidebars
 */
function riysha_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'الشريط الجانبي الرئيسي', 'riysha-art-gallery' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'الشريط الجانبي الرئيسي', 'riysha-art-gallery' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'riysha_widgets_init' );

/**
 * إضافة body classes
 */
function riysha_body_classes( $classes ) {
    if ( is_rtl() ) {
        $classes[] = 'rtl-mode';
    }
    if ( is_single() ) {
        $classes[] = 'single-post';
    }
    if ( is_front_page() ) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter( 'body_class', 'riysha_body_classes' );

/**
 * عدد المنتجات في الصفحة
 */
add_filter( 'loop_shop_per_page', function() {
    return 5;
} );

/**
 * إزالة الـ Breadcrumb الافتراضي
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/**
 * Custom WooCommerce Template Functions
 */
if ( ! function_exists( 'riysha_get_product_image' ) ) {
    function riysha_get_product_image( $product_id = 0, $size = 'medium' ) {
        $product_id = $product_id ? $product_id : get_the_ID();
        $image_id   = get_post_thumbnail_id( $product_id );
        
        if ( $image_id ) {
            return wp_get_attachment_image( $image_id, $size );
        }
        return '';
    }
}

if ( ! function_exists( 'riysha_get_product_price' ) ) {
    function riysha_get_product_price( $product_id = 0 ) {
        $product_id = $product_id ? $product_id : get_the_ID();
        $product    = wc_get_product( $product_id );
        
        if ( $product ) {
            return $product->get_price_html();
        }
        return '';
    }
}

/**
 * AJAX Add to Cart
 */
add_action( 'wp_ajax_riysha_add_to_cart', 'riysha_add_to_cart_ajax' );
add_action( 'wp_ajax_nopriv_riysha_add_to_cart', 'riysha_add_to_cart_ajax' );

function riysha_add_to_cart_ajax() {
    check_ajax_referer( 'riysha-nonce', 'nonce' );

    $product_id = intval( $_POST['product_id'] );
    $quantity   = intval( $_POST['quantity'] ) ?: 1;

    if ( WC()->cart->add_to_cart( $product_id, $quantity ) ) {
        wp_send_json_success( array(
            'message'    => esc_html__( 'تمت إضافة المنتج إلى السلة', 'riysha-art-gallery' ),
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'cart_total' => WC()->cart->get_cart_total(),
        ) );
    } else {
        wp_send_json_error( array(
            'message' => esc_html__( 'فشلت إضافة المنتج', 'riysha-art-gallery' ),
        ) );
    }
    wp_die();
}

/**
 * Customize Register
 */
function riysha_customize_register( $wp_customize ) {
    // Hero Section Settings
    $wp_customize->add_section( 'riysha_hero_section', array(
        'title'       => esc_html__( 'قسم البداية', 'riysha-art-gallery' ),
        'description' => esc_html__( 'إعدادات قسم البداية', 'riysha-art-gallery' ),
    ) );

    $wp_customize->add_setting( 'riysha_hero_title', array(
        'default'           => esc_html__( 'فعبّر عن الجمال بلوحة فريدة', 'riysha-art-gallery' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'riysha_hero_title', array(
        'label'   => esc_html__( 'عنوان البداية', 'riysha-art-gallery' ),
        'section' => 'riysha_hero_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'riysha_hero_description', array(
        'default'           => esc_html__( 'اكتشف مجموعة من اللوحات الفنية الأصلية', 'riysha-art-gallery' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'riysha_hero_description', array(
        'label'   => esc_html__( 'وصف البداية', 'riysha-art-gallery' ),
        'section' => 'riysha_hero_section',
        'type'    => 'textarea',
    ) );

    // Theme Colors
    $wp_customize->add_section( 'riysha_colors', array(
        'title'       => esc_html__( 'الألوان', 'riysha-art-gallery' ),
        'description' => esc_html__( 'تخصيص ألوان الموقع', 'riysha-art-gallery' ),
    ) );

    $wp_customize->add_setting( 'riysha_primary_color', array(
        'default'           => '#8B6F47',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'riysha_primary_color', array(
        'label'   => esc_html__( 'اللون الأساسي', 'riysha-art-gallery' ),
        'section' => 'riysha_colors',
    ) ) );
}
add_action( 'customize_register', 'riysha_customize_register' );

?>
