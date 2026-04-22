<?php
/**
 * Front page template (auto-loaded by WordPress)
 *
 * @package STCC
 */
get_header();
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1>Protecting Sea Turtles and their Habitat through Research, Conservation & Education</h1>
                    <p class="hero-description">We are a non-profit organization based on the island of Curaçao that protects sea turtles and marine wildlife by taking direct action. We focus on rescue, rehabilitation, and research activities as well as awareness creation.</p>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-primary btn-large">Take Action</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Hotline Banner -->
    <section class="emergency-banner">
        <div class="container">
            <div class="emergency-content">
                <div class="turtle-rescue-icon">
                    <img src="<?php echo stcc_image_url('turtle-emergency-icon.svg'); ?>" alt="Sea Turtle Emergency" class="turtle-icon-img">
                </div>
                <div class="emergency-text">
                    <p class="emergency-label">Sea Turtle Emergency Hotline</p>
                    <p class="emergency-instruction">When you see a Sea Turtle or nest in danger on Curaçao, call immediately:</p>
                </div>
                <a href="tel:+59996647970" class="emergency-number-large">+5999 664 7970</a>
            </div>
        </div>
    </section>

    <!-- Our Work Section -->
    <section class="focus-areas">
        <div class="container">
            <div class="section-header">
                <h2>Our Work</h2>
                <p>Our organization concentrates on three core initiatives to protect sea turtles</p>
            </div>
            <div class="focus-grid">
                <div class="focus-card">
                    <div class="focus-icon">
                        <img src="<?php echo stcc_image_url('icon-rescue.png'); ?>" alt="Rescue & Rehabilitation">
                    </div>
                    <h3>Rescue & Rehabilitation</h3>
                    <p>We rescue injured and sick sea turtles, providing them with medical care and rehabilitation until they can be released back into the ocean.</p>
                    <a href="<?php echo home_url('/rescue-rehabilitation/'); ?>" class="btn btn-outline">Learn More</a>
                </div>
                <div class="focus-card">
                    <div class="focus-icon">
                        <img src="<?php echo stcc_image_url('icon-education.png'); ?>" alt="Education">
                    </div>
                    <h3>Education</h3>
                    <p>We educate the local community and visitors about sea turtles, their importance to the ecosystem, and how everyone can help protect them.</p>
                    <a href="<?php echo home_url('/education/'); ?>" class="btn btn-outline">Learn More</a>
                </div>
                <div class="focus-card">
                    <div class="focus-icon">
                        <img src="<?php echo stcc_image_url('icon-research.png'); ?>" alt="Research">
                    </div>
                    <h3>Research</h3>
                    <p>We conduct scientific research to better understand sea turtle populations, their behavior, and the threats they face in Curaçao's waters.</p>
                    <a href="<?php echo home_url('/research/'); ?>" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <img src="<?php echo stcc_image_url('index-about.jpg'); ?>" alt="Sea turtles in Curaçao's waters">
                </div>
                <div class="about-content">
                    <h2>About Sea Turtle Conservation Curaçao</h2>
                    <p>Sea Turtle Conservation Curaçao (STCC) is a dedicated non-profit organization working tirelessly to protect the sea turtles that call the waters around Curaçao home.</p>
                    <p>Our team of passionate volunteers and experts work together to rescue injured turtles, conduct vital research, and spread awareness about the importance of marine conservation.</p>
                    <a href="<?php echo home_url('/our-mission/'); ?>" class="btn btn-primary">Learn More About Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- In The Field Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="content-grid reverse">
                <div class="content-text">
                    <h2>Conservation In Action</h2>
                    <p>From early-morning beach patrols to in-water research sessions and emergency rescues, our volunteers and staff are out in the field across Curaçao and Klein Curaçao every week.</p>
                    <p>Every patrol, every measurement, every release contributes to the long-term science behind protecting Curaçao's sea turtles.</p>
                    <a href="<?php echo home_url('/volunteer/'); ?>" class="btn btn-outline">Join the Team</a>
                </div>
                <div class="content-image">
                    <img src="<?php echo stcc_image_url('index-feature.jpg'); ?>" alt="STCC volunteers and staff in the field">
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <?php
    $latest_news = new WP_Query([
        'post_type'      => 'stcc_news',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    if ($latest_news->have_posts()) :
    ?>
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>Latest News</h2>
                <p>Stay updated with our latest conservation efforts and stories</p>
            </div>
            <div class="news-grid">
                <?php while ($latest_news->have_posts()) : $latest_news->the_post(); ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>" class="news-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                        <?php
                        $cats = get_the_terms(get_the_ID(), 'news_category');
                        if ($cats && !is_wp_error($cats)) :
                        ?>
                            <span class="news-category"><?php echo esc_html($cats[0]->name); ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="news-content">
                        <span class="news-date"><?php echo get_the_date('F j, Y'); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="news-cta">
                <a href="<?php echo get_post_type_archive_link('stcc_news'); ?>" class="btn btn-outline">View All News</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Donation Section -->
    <section class="donation-section">
        <div class="container">
            <div class="donation-content">
                <div class="donation-text">
                    <h2>Support Our Mission</h2>
                    <p>Your donation helps us continue our vital work protecting sea turtles in Curaçao. Every contribution makes a difference.</p>
                    <div class="donation-badges">
                        <img src="<?php echo stcc_image_url('global-giving-badge.png'); ?>" alt="Global Giving Certified">
                    </div>
                </div>
                <div class="donation-form-container">
                    <h3>Make a Donation</h3>
                    <div class="donate-platforms">
                        <a href="https://www.globalgiving.org/projects/help-protect-endangered-sea-turtles-in-curacao/" target="_blank" class="donate-platform-btn globalgiving">
                            <i class="fas fa-globe"></i>
                            <span class="platform-name">GlobalGiving</span>
                            <span class="platform-desc">Donate via credit card or PayPal</span>
                        </a>
                        <a href="https://www.paypal.com/donate/?hosted_button_id=GDLGZHCXGB2UL" target="_blank" class="donate-platform-btn paypal">
                            <i class="fab fa-paypal"></i>
                            <span class="platform-name">PayPal</span>
                            <span class="platform-desc">Fast and secure payment</span>
                        </a>
                    </div>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-outline" style="width: 100%; text-align: center;">More Donation Options</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Support Section -->
    <section class="contact-support-section">
        <div class="container">
            <div class="contact-support-grid">
                <div class="contact-info-box">
                    <h2>Contact</h2>
                    <div class="contact-details">
                        <p><a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a></p>
                        <p><strong>Phone:</strong> <a href="tel:+59996647970">+5999 664 7970</a></p>
                        <p><strong>Visitor Center:</strong><br>STCC at Sambil Mall (Carrefour entrance)</p>
                    </div>
                    <div class="emergency-contact-box">
                        <p><strong>If you see a sea turtle or nest in danger, call or WhatsApp:</strong></p>
                        <p>Ard: <a href="tel:+59996647970">+5999 664 7970</a></p>
                    </div>
                </div>
                <div class="support-info-box">
                    <h2>Sea Turtles <i class="fas fa-heart" style="color: var(--color-teal);"></i> Your Support</h2>
                    <p>STCC's purpose is to keep the sea turtles of Curaçao safe and healthy.</p>
                    <p>This organization is powered by volunteers – from daily tasks & beach patrols, to nest monitoring and rescue response, volunteers are involved in it all.</p>
                    <p>Relying on volunteers helps keep our costs low, but research, transportation, equipment, medical and vet expenses, maintaining a constant staff, and so much more requires funding. As a non-profit organization, we depend on support from individual donors and sponsors.</p>
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-primary">Take Action</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Donate Button -->
    <a href="<?php echo home_url('/donate/'); ?>" class="floating-donate">
        <i class="fas fa-heart"></i>
        <span>Donate</span>
    </a>

<?php get_footer(); ?>
