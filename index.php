<?php
$pageTitle = 'Protecting Sea Turtles and their Habitat';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1>Protecting Sea Turtles and their Habitat through Research, Conservation & Education</h1>
                    <p class="hero-description">We are a non-profit organization based on the island of Curaçao that protects sea turtles and marine wildlife by taking direct action. We focus on rescue, rehabilitation, and research activities as well as awareness creation.</p>
                    <a href="donate.php" class="btn btn-primary btn-large">Take Action</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Hotline Banner -->
    <section class="emergency-banner">
        <div class="container">
            <div class="emergency-content">
                <div class="turtle-rescue-icon">
                    <svg class="turtle-icon" viewBox="0 0 100 100" width="60" height="60">
                        <ellipse cx="50" cy="50" rx="30" ry="22" fill="#2d7d9e"/>
                        <circle cx="50" cy="50" r="18" fill="#052d67"/>
                        <rect x="44" y="38" width="12" height="24" fill="#dc3545" rx="2"/>
                        <rect x="38" y="44" width="24" height="12" fill="#dc3545" rx="2"/>
                        <ellipse cx="25" cy="40" rx="8" ry="5" fill="#2d7d9e"/>
                        <ellipse cx="75" cy="40" rx="8" ry="5" fill="#2d7d9e"/>
                        <ellipse cx="25" cy="60" rx="8" ry="5" fill="#2d7d9e"/>
                        <ellipse cx="75" cy="60" rx="8" ry="5" fill="#2d7d9e"/>
                        <ellipse cx="50" cy="25" rx="6" ry="8" fill="#2d7d9e"/>
                    </svg>
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
                        <img src="images/icon-rescue.png" alt="Rescue & Rehabilitation">
                    </div>
                    <h3>Rescue & Rehabilitation</h3>
                    <p>We rescue injured and sick sea turtles, providing them with medical care and rehabilitation until they can be released back into the ocean.</p>
                    <a href="rescue-rehabilitation.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="focus-card">
                    <div class="focus-icon">
                        <img src="images/icon-education.png" alt="Education">
                    </div>
                    <h3>Education</h3>
                    <p>We educate the local community and visitors about sea turtles, their importance to the ecosystem, and how everyone can help protect them.</p>
                    <a href="education.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="focus-card">
                    <div class="focus-icon">
                        <img src="images/icon-research.png" alt="Research">
                    </div>
                    <h3>Research</h3>
                    <p>We conduct scientific research to better understand sea turtle populations, their behavior, and the threats they face in Curaçao's waters.</p>
                    <a href="research.php" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <img src="images/turtle-underwater.jpg" alt="Sea turtle swimming underwater">
                </div>
                <div class="about-content">
                    <h2>About Sea Turtle Conservation Curaçao</h2>
                    <p>Sea Turtle Conservation Curaçao (STCC) is a dedicated non-profit organization working tirelessly to protect the sea turtles that call the waters around Curaçao home.</p>
                    <p>Our team of passionate volunteers and experts work together to rescue injured turtles, conduct vital research, and spread awareness about the importance of marine conservation.</p>
                    <a href="who-we-are.php" class="btn btn-primary">Learn More About Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>Latest News</h2>
                <p>Stay updated with our latest conservation efforts and stories</p>
            </div>
            <div class="news-grid">
                <article class="news-card">
                    <a href="news/unoc-conference.php" class="news-image">
                        <img src="images/news/unoc-conference.jpg" alt="STCC at UN Ocean Conference">
                        <span class="news-category">News</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">June 12, 2025</span>
                        <h3><a href="news/unoc-conference.php">STCC at the third United Nations Ocean Conference</a></h3>
                        <p>Sea Turtle Conservation Curaçao participated in the third United Nations Ocean Conference, sharing our conservation efforts on the global stage.</p>
                        <a href="news/unoc-conference.php" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <article class="news-card">
                    <a href="news/educational-video.php" class="news-image">
                        <img src="images/news/educational-video.jpg" alt="Educational video about Green sea turtles">
                        <span class="news-category">Education</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">August 6, 2024</span>
                        <h3><a href="news/educational-video.php">Educational video about Green sea turtles</a></h3>
                        <p>We're excited to share our new educational video about Green sea turtles, designed to help people learn about these amazing creatures.</p>
                        <a href="news/educational-video.php" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <article class="news-card">
                    <a href="news/hatchling-release.php" class="news-image">
                        <img src="images/news/hatchling-release.jpg" alt="Release hatchling at Blue Bay">
                        <span class="news-category">Nest</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">July 4, 2024</span>
                        <h3><a href="news/hatchling-release.php">Release hatchling at Blue Bay</a></h3>
                        <p>A wonderful moment as we released hatchlings at Blue Bay. These tiny turtles are now on their journey in the ocean.</p>
                        <a href="news/hatchling-release.php" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            <div class="news-cta">
                <a href="news.php" class="btn btn-outline">View All News</a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <h2>Meet Our Team</h2>
                <p>The dedicated people behind Sea Turtle Conservation Curaçao</p>
            </div>
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="images/team/placeholder.svg" alt="Patricia DeHart - Chairwoman of the Board">
                    </div>
                    <div class="team-content">
                        <h3>Patricia DeHart</h3>
                        <span class="team-role">Chairwoman of the Board</span>
                        <p>Leading Sea Turtle Conservation Curaçao with dedication and vision, Patricia provides strategic direction to ensure our organization continues to protect and preserve the sea turtles that call Curaçao's waters home.</p>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">
                        <img src="images/team/ard.jpg" alt="Ard - Field Coordinator">
                    </div>
                    <div class="team-content">
                        <h3>Ard</h3>
                        <span class="team-role">Field Coordinator</span>
                        <p>Born in the Netherlands and grew up in Curaçao. A lecturer in social studies with 8 years of conservation experience across multiple countries. Oversees daily operations, turtle rehabilitation care, volunteer coaching, and in-water rescue operations. Philosophy: "Let's explore together and make connections, curiosity is key!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Section -->
    <section class="donation-section">
        <div class="container">
            <div class="donation-content">
                <div class="donation-text">
                    <h2>Support Our Mission</h2>
                    <p>Your donation helps us continue our vital work protecting sea turtles in Curaçao. Every contribution makes a difference.</p>
                    <div class="donation-badges">
                        <img src="images/global-giving-badge.png" alt="Global Giving Certified">
                    </div>
                </div>
                <div class="donation-form-container">
                    <form class="donation-form">
                        <h3>Make a Donation</h3>
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
                            <label class="amount-option custom">
                                <input type="radio" name="amount" value="custom">
                                <span>Other</span>
                            </label>
                        </div>
                        <div class="custom-amount" style="display: none;">
                            <input type="number" placeholder="Enter amount" min="1">
                        </div>
                        <a href="donate.php" class="btn btn-donate btn-large">Donate Now</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Contact Us</h2>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:info@curacaoturtles.org">info@curacaoturtles.org</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:+59996647970">+5999 664 7970</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Location</h4>
                            <p>STCC at Sambil Mall (Carrefour entrance)<br>Curaçao</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info field-coordinator">
                    <h3>Field Coordinator</h3>
                    <p class="coordinator-name">Ard</p>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <a href="tel:+59996447970">+5999 644 7970</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <a href="mailto:ard.d.vreugdenhil@gmail.com">ard.d.vreugdenhil@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-instagram"></i>
                        <div>
                            <a href="https://instagram.com/Ardvreugdenhil" target="_blank">@Ardvreugdenhil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Donate Button -->
    <a href="donate.php" class="floating-donate">
        <i class="fas fa-heart"></i>
        <span>Donate</span>
    </a>

<?php include 'includes/footer.php'; ?>
