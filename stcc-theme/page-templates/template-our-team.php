<?php
/**
 * Template Name: Our Team
 *
 * Displays staff (team_member CPT with 'staff' role) and board members ('board' role).
 *
 * @package STCC
 */
get_header();

$staff = new WP_Query([
    'post_type'      => 'stcc_team',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'tax_query'      => [[
        'taxonomy' => 'team_role',
        'field'    => 'slug',
        'terms'    => 'staff',
    ]],
]);

$board = new WP_Query([
    'post_type'      => 'stcc_team',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'tax_query'      => [[
        'taxonomy' => 'team_role',
        'field'    => 'slug',
        'terms'    => 'board',
    ]],
]);
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Our Team</h1>
            <p>Meet the dedicated people behind Sea Turtle Conservation Curaçao</p>
        </div>
    </section>

    <!-- Staff Section -->
    <section class="team-section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Staff</h2>
                <p>Our dedicated staff work tirelessly to protect Curaçao's sea turtles</p>
            </div>
            <div class="staff-grid">
                <?php while ($staff->have_posts()) : $staff->the_post(); ?>
                <div class="staff-card">
                    <div class="staff-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                    </div>
                    <div class="staff-content">
                        <h3><?php the_title(); ?></h3>
                        <span class="staff-role"><?php echo esc_html(get_post_meta(get_the_ID(), '_stcc_job_title', true)); ?></span>
                        <?php the_content(); ?>
                        <?php
                        $philosophy = get_post_meta(get_the_ID(), '_stcc_philosophy', true);
                        if ($philosophy) : ?>
                            <p class="staff-philosophy">"<?php echo esc_html($philosophy); ?>"</p>
                        <?php endif; ?>
                        <?php
                        $phone = get_post_meta(get_the_ID(), '_stcc_phone', true);
                        $email = get_post_meta(get_the_ID(), '_stcc_email', true);
                        $instagram = get_post_meta(get_the_ID(), '_stcc_instagram', true);
                        if ($phone || $email || $instagram) :
                        ?>
                        <div class="staff-contact">
                            <?php if ($phone) : ?>
                                <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><i class="fas fa-phone"></i> <?php echo esc_html($phone); ?></a>
                            <?php endif; ?>
                            <?php if ($email) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><i class="fas fa-envelope"></i> Email</a>
                            <?php endif; ?>
                            <?php if ($instagram) : ?>
                                <a href="https://instagram.com/<?php echo esc_attr(ltrim($instagram, '@')); ?>" target="_blank"><i class="fab fa-instagram"></i> @<?php echo esc_html(ltrim($instagram, '@')); ?></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Board Section -->
    <section class="board-section">
        <div class="container">
            <div class="section-header">
                <h2>Board of Directors</h2>
                <p>Our dedicated board provides strategic guidance and oversight</p>
            </div>
            <div class="board-grid-expanded">
                <?php while ($board->have_posts()) : $board->the_post(); ?>
                <div class="board-card-expanded">
                    <div class="board-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                    </div>
                    <div class="board-content">
                        <h3><?php the_title(); ?></h3>
                        <span class="board-role"><?php echo esc_html(get_post_meta(get_the_ID(), '_stcc_job_title', true)); ?></span>
                        <div class="board-bio-wrapper">
                            <div class="board-bio"><?php the_content(); ?></div>
                        </div>
                        <button class="board-read-more">Read More <i class="fas fa-chevron-down"></i></button>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Join Our Mission</h2>
            <p>Whether you want to volunteer, donate, or simply learn more, there are many ways to support sea turtle conservation in Curaçao.</p>
            <div class="cta-buttons">
                <a href="<?php echo home_url('/volunteer/'); ?>" class="btn btn-primary">Become a Volunteer</a>
                <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-outline-white">Make a Donation</a>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
