<?php
$pageTitle = 'Volunteer';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Become a Volunteer</h1>
            <p>Join our team and make a real difference for sea turtles</p>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="content-section">
        <div class="container">
            <div class="volunteer-intro">
                <h2>Volunteer With Us</h2>
                <p>Sea Turtle Conservation Curaçao Volunteers form the backbone of our organization. Approximately 98% of our team is comprised of Volunteers and unpaid Interns, so without the generous donation of your time and talent, STCC could never complete its mission to protect Curaçao's turtles, to educate residents and tourists, and to collect research data that will inform conservation efforts for decades to come.</p>
                <p>Before applying to become a volunteer with Sea Turtle Conservation Curaçao, ensure you meet these requirements:</p>
                <div class="requirements-box">
                    <ul class="requirements-list">
                        <li><i class="fas fa-check"></i> English is the main language used within the organization; fluency isn't required, but you must be able to communicate in English</li>
                        <li><i class="fas fa-check"></i> Minimum age for volunteers is 18</li>
                        <li><i class="fas fa-check"></i> A driver license B</li>
                        <li><i class="fas fa-check"></i> Transportation to and from volunteer sites is your responsibility</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Non-Resident Considerations -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="volunteer-intro">
                <h2>Not Living in Curaçao?</h2>
                <p>If you are not living in Curaçao, here are some additional considerations:</p>
                <div class="requirements-box">
                    <ul class="requirements-list">
                        <li><i class="fas fa-home"></i> You must arrange your own accommodation</li>
                        <li><i class="fas fa-car"></i> It is highly recommended to rent a car in Curaçao</li>
                        <li><i class="fas fa-passport"></i> If you plan to stay for longer than 3 months, a visa is mandatory if you are not a citizen of Curaçao or The Netherlands. Please keep in mind that arranging a visa takes a minimum of 4 months. Check the requirements of your country of citizenship and ensure you apply in time to avoid disappointment!</li>
                    </ul>
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

<?php
$extraScripts = ['js/volunteer-form.js'];
include 'includes/footer.php';
?>
