<?php
/**
 * Template Name: Volunteer
 *
 * @package STCC
 */
get_header();

// Enqueue the volunteer form script
wp_enqueue_script('stcc-volunteer-form', get_template_directory_uri() . '/js/volunteer-form.js', ['stcc-main'], STCC_VERSION, true);
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Become a Volunteer</h1>
            <p>Join our team and make a real difference for sea turtles</p>
        </div>
    </section>

    <!-- Volunteer Info Section -->
    <section class="content-section">
        <div class="container">
            <div class="volunteer-intro">
                <h2>Volunteer With Us</h2>
                <p>Sea Turtle Conservation Curaçao Volunteers form the backbone of our organization. Approximately 98% of our team is comprised of Volunteers and unpaid Interns, so without the generous donation of your time and talent, STCC could never complete its mission to protect Curaçao's turtles, to educate residents and tourists, and to collect research data that will inform conservation efforts for decades to come. We need everyone from interested islanders who are turtle-curious and ready to learn about sea turtles, to Veterinarians, to Lawyers, to Financiers. No matter what your professional talents are, if your passions lean toward sea turtles and the marine environment, we need your assistance.</p>
                <p>ALL prospective volunteers must attend our training program, and all current volunteers must attend annual refresher training. After the successful completion of training, you will earn the right to wear our distinctive STCC Patrol Team shirt and you can join us around Curaçao and on Klein Curaçao for research sessions, nest patrols, beach clean-ups, hatchings, and so much more!</p>
                <div class="training-notice">
                    <i class="fas fa-info-circle"></i>
                    <p><strong>Please note:</strong> STCC only trains new volunteers from April - November. If you apply to become a volunteer during a winter slowdown, please be patient. We will contact you with our class schedule in early spring.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Volunteer Activities</h2>
                <p>There are many ways you can contribute to our mission</p>
            </div>
            <div class="activities-grid">
                <div class="activity-card">
                    <i class="fas fa-walking"></i>
                    <h3>Beach Patrols</h3>
                    <p>Help monitor beaches for nesting activity and protect turtle nests from predators and human disturbance.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-egg"></i>
                    <h3>Nest Monitoring</h3>
                    <p>Track and document nesting sites from June through December during the nesting season.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-life-ring"></i>
                    <h3>Rescue Response</h3>
                    <p>Assist with emergency response when sea turtles are found injured or stranded.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3>Rehabilitation Care</h3>
                    <p>Help care for turtles recovering at our facilities, including feeding and tank maintenance.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>Education Outreach</h3>
                    <p>Assist with educational programs and community awareness events.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-camera"></i>
                    <h3>Photo Documentation</h3>
                    <p>Help photograph individual turtles to track population health and identify returning individuals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Volunteer Application Section -->
    <section class="content-section">
        <div class="container">
            <div class="volunteer-application">
                <h2>Volunteer Application</h2>
                <p>Ready to make a difference? Fill out the form below to apply to become a volunteer.</p>
                <form id="volunteer-form" class="application-form">
                    <input type="hidden" name="form_type" value="volunteer">
                    <?php wp_nonce_field('stcc_form_submission', 'stcc_nonce'); ?>
                    <div class="form-group">
                        <label for="volunteer-name">Name <span class="required">*</span></label>
                        <input type="text" id="volunteer-name" name="name" required placeholder="Your full name">
                    </div>
                    <div class="form-group">
                        <label for="volunteer-country">Country <span class="required">*</span></label>
                        <input type="text" id="volunteer-country" name="country" required placeholder="Your country of residence">
                    </div>
                    <div class="form-group">
                        <label for="volunteer-email">Email Address <span class="required">*</span></label>
                        <input type="email" id="volunteer-email" name="email" required placeholder="your.email@example.com">
                    </div>
                    <button type="submit" class="btn btn-primary btn-large">
                        <span class="btn-text">Submit Application</span>
                        <span class="btn-loading" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Submitting...</span>
                    </button>
                </form>
                <div id="form-success" class="form-message success" style="display: none;">
                    <i class="fas fa-check-circle"></i>
                    <h3>Thank You!</h3>
                    <p>Your volunteer application has been received. We will be in touch soon with information about our training schedule.</p>
                </div>
                <div id="form-error" class="form-message error" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3>Oops!</h3>
                    <p>Something went wrong. Please try again or contact us directly at <a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="contact-box">
                <h3>Questions?</h3>
                <p>Contact us at <a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a> or call <a href="tel:+59996647970">+5999 664 7970</a></p>
                <p><i class="fas fa-map-marker-alt"></i> Visit us at Sambil Mall (Carrefour entrance)</p>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
