<?php
/**
 * Default page template
 *
 * @package STCC
 */
get_header();
?>

    <section class="page-header">
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
