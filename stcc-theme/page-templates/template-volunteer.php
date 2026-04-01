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

    <!-- Intro Section -->
    <section class="content-section">
        <div class="container">
            <div class="volunteer-intro">
                <h2>Volunteer With Us</h2>
                <p>Sea Turtle Conservation Curaçao Volunteers form the backbone of our organization. Approximately 98% of our team is comprised of Volunteers and unpaid Interns, so without the generous donation of your time and talent, STCC could never complete its mission to protect Curaçao's turtles, to educate residents and tourists, and to collect research data that will inform conservation efforts for decades to come.</p>
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

    <!-- Requirements Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Before You Apply</h2>
                <p>Please review the following requirements and considerations</p>
            </div>
            <div class="requirements-grid">
                <div class="requirements-box">
                    <h3><i class="fas fa-clipboard-check"></i> Requirements</h3>
                    <ul class="requirements-list">
                        <li><i class="fas fa-check"></i> Must be able to communicate in English (fluency not required)</li>
                        <li><i class="fas fa-check"></i> Minimum age of 18</li>
                        <li><i class="fas fa-check"></i> A driver license B</li>
                        <li><i class="fas fa-check"></i> Own transportation to and from volunteer sites</li>
                    </ul>
                </div>
                <div class="requirements-box">
                    <h3><i class="fas fa-plane-arrival"></i> Not Living in Curaçao?</h3>
                    <ul class="requirements-list">
                        <li><i class="fas fa-home"></i> You must arrange your own accommodation</li>
                        <li><i class="fas fa-car"></i> It is highly recommended to rent a car</li>
                        <li><i class="fas fa-passport"></i> Staying longer than 3 months? A visa is mandatory if you are not a citizen of Curaçao or The Netherlands. Arranging a visa takes a minimum of 4 months — apply early!</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Volunteer Application Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="volunteer-application">
                <h2>Volunteer Application</h2>
                <p>Ready to make a difference? Fill out the form below to apply to become a volunteer.</p>
                <form id="volunteer-form" class="application-form">
                    <input type="hidden" name="form_type" value="volunteer">
                    <?php wp_nonce_field('stcc_form_submission', 'stcc_nonce'); ?>
                    <div class="form-group">
                        <label>Gender <span class="required">*</span></label>
                        <div class="radio-group">
                            <label class="radio-label"><input type="radio" name="gender" value="Male" required> Male</label>
                            <label class="radio-label"><input type="radio" name="gender" value="Female"> Female</label>
                            <label class="radio-label"><input type="radio" name="gender" value="Other"> Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="volunteer-name">Name <span class="required">*</span></label>
                        <input type="text" id="volunteer-name" name="name" required placeholder="First Last">
                    </div>
                    <div class="form-group">
                        <label for="volunteer-dob">Date of Birth <span class="required">*</span></label>
                        <input type="date" id="volunteer-dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="volunteer-phone">Phone <span class="required">*</span></label>
                        <input type="tel" id="volunteer-phone" name="phone" required placeholder="Your phone number">
                    </div>
                    <div class="form-group">
                        <label for="volunteer-country">Country of Residence <span class="required">*</span></label>
                        <input type="text" id="volunteer-country" name="country" required placeholder="Your country of residence">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="volunteer-email">Email Address <span class="required">*</span></label>
                            <input type="email" id="volunteer-email" name="email" required placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="volunteer-email-confirm">Confirm Email <span class="required">*</span></label>
                            <input type="email" id="volunteer-email-confirm" name="email_confirm" required placeholder="Confirm Email">
                        </div>
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
