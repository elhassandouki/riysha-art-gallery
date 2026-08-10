<?php
/**
 * Footer Template
 */
?>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
                    <p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e( 'روابط مهمة', 'riysha-art-gallery' ); ?></h3>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => function() {
                            echo '<ul class="footer-menu">';
                            echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'الرئيسية', 'riysha-art-gallery' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/shop' ) ) . '">' . esc_html__( 'المتجر', 'riysha-art-gallery' ) . '</a></li>';
                            echo '<li><a href="#">' . esc_html__( 'عن الموقع', 'riysha-art-gallery' ) . '</a></li>';
                            echo '<li><a href="#">' . esc_html__( 'سياسة الخصوصية', 'riysha-art-gallery' ) . '</a></li>';
                            echo '</ul>';
                        }
                    ) );
                    ?>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e( 'تواصل معنا', 'riysha-art-gallery' ); ?></h3>
                    <p>+966 50 123 4567</p>
                    <p>info@reysha-art.com</p>
                    <p><?php esc_html_e( 'المملكة العربية السعودية', 'riysha-art-gallery' ); ?></p>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e( 'تابعنا', 'riysha-art-gallery' ); ?></h3>
                    <div class="social-links">
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. 
                <?php esc_html_e( 'جميع الحقوق محفوظة', 'riysha-art-gallery' ); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
