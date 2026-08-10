<?php
/**
 * Front Page Template
 */
get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1><?php echo esc_html( get_theme_mod( 'riysha_hero_title', 'فعبّر عن الجمال بلوحة فريدة' ) ); ?></h1>
                <p><?php echo esc_html( get_theme_mod( 'riysha_hero_description', 'اكتشف مجموعة من اللوحات الفنية الأصلية' ) ); ?></p>
                <?php 
                $shop_url = home_url( '/shop' );
                if ( function_exists( 'wc_get_shop_url' ) ) {
                    $shop_url = wc_get_shop_url();
                }
                ?>
                <a href="<?php echo esc_url( $shop_url ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'تسوق الآن', 'riysha-art-gallery' ); ?>
                </a>
            </div>
            <div class="hero-image">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'large' );
                } else {
                    echo '<img src="' . esc_url( RIYSHA_URI . '/images/hero-default.jpg' ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3><?php esc_html_e( 'دفع آمن', 'riysha-art-gallery' ); ?></h3>
                <p><?php esc_html_e( 'ادفع بطريقة آمنة وموثوقة', 'riysha-art-gallery' ); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3><?php esc_html_e( 'ضمان براقات', 'riysha-art-gallery' ); ?></h3>
                <p><?php esc_html_e( 'ضمان شامل على جميع الأيام', 'riysha-art-gallery' ); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h3><?php esc_html_e( 'توصيل سريع وآمن', 'riysha-art-gallery' ); ?></h3>
                <p><?php esc_html_e( 'توصيل لوحاتك بسرعة وأمان إلى مكان إقامتك', 'riysha-art-gallery' ); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3><?php esc_html_e( '100% أصلية وموثوقة', 'riysha-art-gallery' ); ?></h3>
                <p><?php esc_html_e( 'كل لوحة أصلية بشهادة موثوقة', 'riysha-art-gallery' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Products -->
<section class="products">
    <div class="container">
        <h2><?php esc_html_e( 'أحدث اللوحات', 'riysha-art-gallery' ); ?></h2>
        <div class="woocommerce-wrapper">
            <?php
            // Check if WooCommerce is active
            if ( post_type_exists( 'product' ) && function_exists( 'wc_get_product' ) ) {
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 5,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                $loop = new WP_Query( $args );
                
                if ( $loop->have_posts() ) {
                    echo '<ul class="products">';
                    while ( $loop->have_posts() ) {
                        $loop->the_post();
                        $product = wc_get_product( get_the_ID() );
                        ?>
                        <li class="product">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium' );
                                }
                                ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <div class="price">
                                <?php echo wp_kses_post( $product->get_price_html() ); ?>
                            </div>
                            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="button add_to_cart_button">
                                <?php esc_html_e( 'أضف للسلة', 'riysha-art-gallery' ); ?>
                            </a>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                    wp_reset_postdata();
                } else {
                    echo '<p>' . esc_html__( 'لا توجد منتجات', 'riysha-art-gallery' ) . '</p>';
                }
            } else {
                // WooCommerce not active
                echo '<div style="text-align: center; padding: 40px;">';
                echo '<p>' . esc_html__( 'يرجى تثبيت WooCommerce لعرض المنتجات', 'riysha-art-gallery' ) . '</p>';
                echo '<a href="' . esc_url( admin_url( 'plugin-install.php?s=woocommerce&tab=search&type=term' ) ) . '" class="button">';
                echo esc_html__( 'تثبيت WooCommerce', 'riysha-art-gallery' );
                echo '</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
