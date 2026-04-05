<?php
/**
 * News archive template
 *
 * @package STCC
 */
get_header();
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>News</h1>
            <p>Latest updates from Sea Turtle Conservation Curaçao</p>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-page-section">
        <div class="container">
            <div class="news-grid-full">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>" class="news-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'news_category');
                        if ($categories && !is_wp_error($categories)) :
                        ?>
                            <span class="news-category"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="news-content">
                        <span class="news-date"><?php echo get_the_date('F j, Y'); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <?php endwhile; endif; ?>
            </div>

            <?php
            the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
            ]);
            ?>
        </div>
    </section>

    <!-- Stay Updated Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="stay-updated-box">
                <h2>Stay Updated</h2>
                <p>Follow us on social media to get the latest news and updates about our conservation work.</p>
                <div class="social-buttons">
                    <a href="https://www.facebook.com/SeaTurtleConservationCuracao" target="_blank" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://www.instagram.com/curacaoturtles" target="_blank" class="social-btn instagram">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
