<?php
$pageTitle = 'Rescue & Rehabilitation';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Rescue & Rehabilitation</h1>
            <p>Saving sea turtles one rescue at a time</p>
        </div>
    </section>

    <!-- Emergency Section -->
    <section class="emergency-banner">
        <div class="container">
            <div class="emergency-content">
                <i class="fas fa-exclamation-triangle"></i>
                <p>Found a sea turtle in distress? Call immediately:</p>
                <a href="tel:+59996647970" class="emergency-number">+5999 664 7970</a>
            </div>
        </div>
    </section>

    <!-- Rescue Info Section -->
    <section class="content-section">
        <div class="container">
            <div class="content-grid">
                <div class="content-text">
                    <h2>Our Rescue Operations</h2>
                    <p>Sea Turtle Conservation Curaçao operates a 24/7 emergency response service for sea turtles found in distress around the island. When we receive a call about an injured, stranded, or entangled turtle, our team springs into action.</p>
                    <p>Our field coordinator and trained volunteers are equipped to handle various emergency situations, from turtles caught in fishing lines to those suffering from boat strikes or illness.</p>
                    <p>Every rescued turtle receives immediate assessment and appropriate care, whether that means on-site first aid, transport to our rehabilitation facilities, or coordination with veterinary specialists.</p>
                </div>
                <div class="content-image">
                    <img src="images/icon-rescue.png" alt="Sea turtle rescue">
                </div>
            </div>
        </div>
    </section>

    <!-- Rehabilitation Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="content-grid reverse">
                <div class="content-text">
                    <h2>Rehabilitation Care</h2>
                    <p>Once rescued, injured sea turtles enter our rehabilitation program where they receive ongoing care until they're healthy enough to return to the ocean.</p>
                    <p>Our rehabilitation process includes:</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Medical assessment and treatment</li>
                        <li><i class="fas fa-check"></i> Wound care and monitoring</li>
                        <li><i class="fas fa-check"></i> Nutritional support and feeding</li>
                        <li><i class="fas fa-check"></i> Physical therapy when needed</li>
                        <li><i class="fas fa-check"></i> Recovery in safe tank environments</li>
                    </ul>
                    <p>Our goal is always to release recovered turtles back into the wild when they are fully healed.</p>
                </div>
                <div class="content-image">
                    <img src="images/turtle-underwater.jpg" alt="Sea turtle rehabilitation">
                </div>
            </div>
        </div>
    </section>

    <!-- Common Issues Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Common Issues We Treat</h2>
                <p>Our team handles a variety of health issues affecting sea turtles</p>
            </div>
            <div class="issues-grid">
                <div class="issue-card">
                    <i class="fas fa-virus"></i>
                    <h3>Fibropapillomatosis</h3>
                    <p>A tumor-causing disease that affects sea turtles worldwide. Curaçao is one of four global hotspots for this condition.</p>
                </div>
                <div class="issue-card">
                    <i class="fas fa-anchor"></i>
                    <h3>Entanglement</h3>
                    <p>Turtles caught in fishing lines, nets, or marine debris that can cause serious injury or drowning.</p>
                </div>
                <div class="issue-card">
                    <i class="fas fa-ship"></i>
                    <h3>Boat Strikes</h3>
                    <p>Injuries from propeller cuts or collision with watercraft, which can cause shell damage and internal injuries.</p>
                </div>
                <div class="issue-card">
                    <i class="fas fa-trash"></i>
                    <h3>Plastic Ingestion</h3>
                    <p>Turtles that have swallowed plastic debris, leading to digestive blockages and malnutrition.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Help Us Save More Turtles</h2>
            <p>Your support enables us to continue our rescue and rehabilitation operations.</p>
            <div class="cta-buttons">
                <a href="donate.php" class="btn btn-primary">Donate Now</a>
                <a href="volunteer.php" class="btn btn-outline-white">Volunteer</a>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
