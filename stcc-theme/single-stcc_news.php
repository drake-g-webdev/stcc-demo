<?php
/**
 * Single news article template
 *
 * @package STCC
 */
get_header();

while (have_posts()) : the_post();

$categories = get_the_terms(get_the_ID(), 'news_category');
$category_name = ($categories && !is_wp_error($categories)) ? $categories[0]->name : 'News';

// Get related articles (same category, exclude current, max 2)
$related_args = [
    'post_type'      => 'stcc_news',
    'posts_per_page' => 2,
    'post__not_in'   => [get_the_ID()],
    'orderby'        => 'date',
    'order'          => 'DESC',
];
if ($categories && !is_wp_error($categories)) {
    $related_args['tax_query'] = [[
        'taxonomy' => 'news_category',
        'field'    => 'term_id',
        'terms'    => $categories[0]->term_id,
    ]];
}
$related = new WP_Query($related_args);
?>

    <!-- Article -->
    <article class="article-page">
        <div class="container">
            <div class="article-header">
                <a href="<?php echo get_post_type_archive_link('stcc_news'); ?>" class="back-link"><i class="fas fa-arrow-left"></i> Back to News</a>
                <span class="article-category"><?php echo esc_html($category_name); ?></span>
                <h1><?php the_title(); ?></h1>
                <span class="article-date"><?php echo get_the_date('F j, Y'); ?></span>
            </div>

            <?php if (has_post_thumbnail()) : ?>
            <div class="article-featured-image">
                <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
            </div>
            <?php endif; ?>

            <div class="article-content">
                <?php the_content(); ?>
            </div>

            <div class="article-share">
                <span>Share this article:</span>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                    <a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode('Check out this article: ' . get_permalink()); ?>" class="share-btn email"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </article>

<?php endwhile; ?>

<?php if ($related->have_posts()) : ?>
    <!-- Related Articles -->
    <section class="related-articles">
        <div class="container">
            <h2>More News</h2>
            <div class="news-grid">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>" class="news-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                        <?php
                        $rel_cats = get_the_terms(get_the_ID(), 'news_category');
                        if ($rel_cats && !is_wp_error($rel_cats)) :
                        ?>
                            <span class="news-category"><?php echo esc_html($rel_cats[0]->name); ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="news-content">
                        <span class="news-date"><?php echo get_the_date('F j, Y'); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
