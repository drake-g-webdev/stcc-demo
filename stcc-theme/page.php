<?php
/**
 * Default page template
 *
 * @package STCC
 */
get_header();
?>

    <?php $page_slug = get_post_field('post_name', get_post()); ?>
    <section class="page-header page-header-<?php echo esc_attr($page_slug); ?>">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="content-section" style="padding: 60px 0;">
        <div class="container">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>

<?php get_footer(); ?>
