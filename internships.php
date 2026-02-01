<?php
$pageTitle = 'Internships';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Internships</h1>
            <p>Gain hands-on experience in marine conservation</p>
        </div>
    </section>

    <!-- Intro -->
    <section class="content-section">
        <div class="container">
            <div class="intern-intro">
                <h2>Intern With STCC</h2>
                <p>Are you passionate about marine conservation and looking for hands-on experience? Our internship program offers a unique opportunity to work directly with sea turtles in the beautiful Caribbean island of Curaçao.</p>
                <p>Interns work alongside our field coordinator and staff, gaining practical experience in wildlife rescue, rehabilitation, and research methodologies. This program is ideal for students in marine biology, environmental science, veterinary studies, or related fields.</p>
                <div class="intern-status-notice">
                    <i class="fas fa-users"></i>
                    <p>STCC has four active interns on staff now. We are not seeking interns for the summer session until late spring. Please check back. Thanks for your interest!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Intern Activities Gallery -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>What Our Interns Do</h2>
                <p>Hands-on conservation work in the field and beyond</p>
            </div>
            <div class="intern-gallery">
                <div class="intern-gallery-item">
                    <img src="images/team/interns/interns.jpeg" alt="STCC Interns">
                </div>
                <div class="intern-gallery-item">
                    <img src="images/team/interns/WhatsApp Image 2026-01-31 at 08.01.33.jpeg" alt="STCC Intern in the field">
                </div>
                <div class="intern-gallery-item">
                    <img src="images/team/interns/WhatsApp Image 2026-01-31 at 08.01.35.jpeg" alt="STCC Intern working with sea turtles">
                </div>
                <div class="intern-gallery-item">
                    <img src="images/team/interns/WhatsApp Image 2026-01-31 at 08.03.23.jpeg" alt="STCC Intern on patrol">
                </div>
                <div class="intern-gallery-item">
                    <img src="images/team/interns/fs2026-01-31 at 08.03.23.jpeg" alt="STCC Intern fieldwork">
                </div>
            </div>
        </div>
    </section>

    <!-- What You'll Learn -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>What You'll Learn</h2>
                <p>Our comprehensive internship program covers multiple aspects of sea turtle conservation</p>
            </div>
            <div class="learn-grid">
                <div class="learn-card">
                    <i class="fas fa-heartbeat"></i>
                    <h3>Rescue & Rehab</h3>
                    <p>Learn proper techniques for rescuing injured sea turtles and providing rehabilitation care.</p>
                </div>
                <div class="learn-card">
                    <i class="fas fa-microscope"></i>
                    <h3>Research Methods</h3>
                    <p>Participate in scientific research including photo-identification and population monitoring.</p>
                </div>
                <div class="learn-card">
                    <i class="fas fa-water"></i>
                    <h3>In-Water Skills</h3>
                    <p>Develop snorkeling skills and learn to safely observe and document sea turtles in their habitat.</p>
                </div>
                <div class="learn-card">
                    <i class="fas fa-clipboard-list"></i>
                    <h3>Data Collection</h3>
                    <p>Gain experience in systematic data collection, documentation, and database management.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements -->
    <section class="content-section">
        <div class="container">
            <div class="requirements-box">
                <h2>Program Requirements</h2>
                <ul class="requirements-list">
                    <li><i class="fas fa-check"></i> Passion for marine conservation and wildlife</li>
                    <li><i class="fas fa-check"></i> Ability to swim and comfort in the water</li>
                    <li><i class="fas fa-check"></i> Minimum commitment of 4 weeks (longer preferred)</li>
                    <li><i class="fas fa-check"></i> Flexibility to work various hours including early mornings</li>
                    <li><i class="fas fa-check"></i> Physical fitness for beach patrols and fieldwork</li>
                    <li><i class="fas fa-check"></i> Positive attitude and willingness to learn</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Apply -->
    <section class="content-section">
        <div class="container">
            <div class="intern-application">
                <h2>Internship Application</h2>
                <button id="intern-apply-btn" class="btn btn-primary btn-large">
                    <i class="fas fa-file-alt"></i> Intern Application
                </button>

                <div class="intern-interest-form">
                    <p>If you are interested in interning with STCC, please send us your name, country, university affiliation, current degree or active degree program, and your email address.</p>
                    <form id="intern-form" class="application-form">
                        <div class="form-group">
                            <label for="intern-name">Name <span class="required">*</span></label>
                            <input type="text" id="intern-name" name="name" required placeholder="Your full name">
                        </div>
                        <div class="form-group">
                            <label for="intern-country">Country <span class="required">*</span></label>
                            <input type="text" id="intern-country" name="country" required placeholder="Your country of residence">
                        </div>
                        <div class="form-group">
                            <label for="intern-university">University Affiliation <span class="required">*</span></label>
                            <input type="text" id="intern-university" name="university" required placeholder="Your university or institution">
                        </div>
                        <div class="form-group">
                            <label for="intern-degree">Current Degree / Active Degree Program <span class="required">*</span></label>
                            <input type="text" id="intern-degree" name="degree" required placeholder="e.g., B.S. Marine Biology, M.S. Environmental Science">
                        </div>
                        <div class="form-group">
                            <label for="intern-email">Email Address <span class="required">*</span></label>
                            <input type="email" id="intern-email" name="email" required placeholder="your.email@university.edu">
                        </div>
                        <button type="submit" class="btn btn-primary btn-large">
                            <span class="btn-text">Submit Interest</span>
                            <span class="btn-loading" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Submitting...</span>
                        </button>
                    </form>
                    <div id="intern-form-success" class="form-message success" style="display: none;">
                        <i class="fas fa-check-circle"></i>
                        <h3>Thank You!</h3>
                        <p>We have received your information. We will be in touch when internship positions become available.</p>
                    </div>
                    <div id="intern-form-error" class="form-message error" style="display: none;">
                        <i class="fas fa-exclamation-circle"></i>
                        <h3>Oops!</h3>
                        <p>Something went wrong. Please try again or contact us directly at <a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Closed Applications -->
    <div id="intern-modal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button class="modal-close" aria-label="Close modal">&times;</button>
            <div class="modal-icon">
                <i class="fas fa-calendar-times"></i>
            </div>
            <h3>Internship Applications Are Currently Closed</h3>
            <p>We are not accepting formal applications at this time. However, you can submit your information below and we will contact you when positions become available.</p>
            <button class="btn btn-primary modal-dismiss">Got It</button>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="contact-box">
                <h3>Questions About Internships?</h3>
                <p>Contact us at <a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a> or call <a href="tel:+59996647970">+5999 664 7970</a></p>
            </div>
        </div>
    </section>

<?php
$extraScripts = ['js/intern-form.js'];
include 'includes/footer.php';
?>
