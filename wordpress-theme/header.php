<?php
/**
 * Header Template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<i class="fas fa-palette"></i>';
                        echo '<span>' . get_bloginfo( 'name' ) . '</span>';
                    }
                    ?>
                </div>

                <!-- Navigation -->
                <nav class="nav">
                    <?php
                    // Safe shop URL detection
                    $shop_url = home_url( '/shop' );
                    if ( function_exists( 'wc_get_shop_url' ) ) {
                        $shop_url = wc_get_shop_url();
                    } elseif ( class_exists( 'WooCommerce' ) ) {
                        $shop_url = get_permalink( wc_get_page_id( 'shop' ) );
                    }
                    
                    wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'menu_class'      => 'nav-menu',
                        'fallback_cb'     => function() use ( $shop_url ) {
                            echo '<ul class="nav-menu">';
                            echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">الرئيسية</a></li>';
                            echo '<li><a href="' . esc_url( $shop_url ) . '">المتجر</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">اتصل بنا</a></li>';
                            echo '</ul>';
                        },
                        'depth'           => 2
                    ) );
                    ?>
                </nav>

                <!-- Icons -->
                <div class="header-icons">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                    <?php 
                    $cart_url = '#';
                    $cart_count = 0;
                    
                    // تحقق من WooCommerce
                    if ( function_exists( 'WC' ) ) {
                        $cart_url = WC()->cart->get_cart_url();
                        $cart_count = WC()->cart->get_cart_contents_count();
                    } elseif ( function_exists( 'wc_get_cart_url' ) ) {
                        $cart_url = wc_get_cart_url();
                        if ( function_exists( 'wc_get_cart_contents_count' ) ) {
                            $cart_count = wc_get_cart_contents_count();
                        }
                    }
                    ?>
                    <a href="<?php echo esc_url( $cart_url ); ?>" class="cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
