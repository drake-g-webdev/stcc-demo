<?php
/**
 * 404 error page
 *
 * @package STCC
 */
get_header();
?>

    <section class="page-header">
        <div class="container">
            <h1>Page Not Found</h1>
        </div>
    </section>

    <section class="error-404-section" style="padding: 80px 0; text-align: center;">
        <div class="container">
            <div style="max-width: 600px; margin: 0 auto;">
                <i class="fas fa-water" style="font-size: 4rem; color: var(--color-teal); margin-bottom: 20px;"></i>
                <h2>This page seems to have swum away</h2>
                <p style="font-size: 1.1rem; color: var(--color-gray); margin: 20px 0 30px;">The page you're looking for doesn't exist or has been moved.</p>
                <div class="cta-buttons">
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">Return Home</a>
                    <a href="<?php echo home_url('/news/'); ?>" class="btn btn-outline">Latest News</a>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
