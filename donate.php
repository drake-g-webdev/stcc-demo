<?php
$pageTitle = 'Donate';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Make a Donation</h1>
            <p>Your support helps us protect sea turtles in Curaçao</p>
        </div>
    </section>

    <!-- Donation Section -->
    <section class="donate-page-section">
        <div class="container">
            <div class="donate-grid">
                <div class="donate-info">
                    <h2>Why Your Donation Matters</h2>
                    <p>STCC's purpose is to keep the sea turtles of Curaçao safe and healthy. As a non-profit organization, we depend on support from individual donors and sponsors to continue our vital work.</p>

                    <p>While relying on volunteers helps keep our costs low, many aspects of our work require funding:</p>

                    <ul class="donation-uses">
                        <li><i class="fas fa-check"></i> Scientific research and monitoring equipment</li>
                        <li><i class="fas fa-check"></i> Transportation for rescue operations</li>
                        <li><i class="fas fa-check"></i> Medical and veterinary expenses</li>
                        <li><i class="fas fa-check"></i> Rehabilitation facility maintenance</li>
                        <li><i class="fas fa-check"></i> Educational materials and outreach programs</li>
                        <li><i class="fas fa-check"></i> Staff to coordinate daily operations</li>
                    </ul>

                    <div class="donation-badges">
                        <img src="images/global-giving-badge.png" alt="Global Giving Certified Organization">
                    </div>
                </div>

                <div class="donate-form-wrapper">
                    <div class="donation-form-container">
                        <form class="donation-form">
                            <h3>Select Donation Amount</h3>
                            <div class="donation-amounts">
                                <label class="amount-option">
                                    <input type="radio" name="amount" value="25">
                                    <span>$25</span>
                                </label>
                                <label class="amount-option">
                                    <input type="radio" name="amount" value="50" checked>
                                    <span>$50</span>
                                </label>
                                <label class="amount-option">
                                    <input type="radio" name="amount" value="75">
                                    <span>$75</span>
                                </label>
                                <label class="amount-option">
                                    <input type="radio" name="amount" value="100">
                                    <span>$100</span>
                                </label>
                            </div>
                            <div class="custom-amount-field">
                                <label for="custom-amount">Or enter a custom amount:</label>
                                <div class="input-group">
                                    <span class="currency">$</span>
                                    <input type="number" id="custom-amount" placeholder="Enter amount" min="10">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-donate btn-large">Donate Now</button>
                            <p class="secure-note"><i class="fas fa-lock"></i> Secure payment processing</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Ways Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Other Ways to Help</h2>
                <p>Financial donations aren't the only way to support our mission</p>
            </div>
            <div class="ways-grid">
                <div class="way-card">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Volunteer</h3>
                    <p>Join our team of dedicated volunteers and directly contribute to sea turtle conservation efforts.</p>
                    <a href="volunteer.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="way-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Intern</h3>
                    <p>Gain hands-on experience in marine conservation through our internship program.</p>
                    <a href="internships.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="way-card">
                    <i class="fas fa-share-alt"></i>
                    <h3>Spread the Word</h3>
                    <p>Follow us on social media and share our mission with your friends and family.</p>
                    <a href="social-media.php" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="content-section">
        <div class="container">
            <div class="contact-box">
                <h3>Questions About Donating?</h3>
                <p>Contact us at <a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a> or call <a href="tel:+59996647970">+5999 664 7970</a></p>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
