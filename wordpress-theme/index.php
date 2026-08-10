<?php
/**
 * Main Template
 */
get_header();
?>

<div class="container" style="padding: 40px 0;">
    <div class="content">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <article <?php post_class(); ?>>
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div class="post-meta">
                            <span class="post-date">
                                <?php esc_html_e( 'نشر في: ', 'riysha-art-gallery' ); ?>
                                <?php echo esc_html( get_the_date() ); ?>
                            </span>
                        </div>
                    </header>
                    
                    <div class="post-content">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'large' );
                        }
                        the_content();
                        ?>
                    </div>
                </article>
                <?php
            }
        } else {
            ?>
            <div class="no-content">
                <h2><?php esc_html_e( 'لم يتم العثور على محتوى', 'riysha-art-gallery' ); ?></h2>
                <p><?php esc_html_e( 'عذراً، لم نتمكن من العثور على الصفحة المطلوبة', 'riysha-art-gallery' ); ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
