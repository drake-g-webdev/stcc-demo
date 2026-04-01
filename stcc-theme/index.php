<?php
/**
 * Default template fallback
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

    <section class="content-section">
        <div class="container">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </section>

<?php get_footer(); ?>
