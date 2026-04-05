<?php
$pageTitle = 'Events';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Events</h1>
            <p>Join us at our upcoming events and activities</p>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Upcoming Events</h2>
                <p>Check back regularly for new events, or follow us on social media for the latest updates</p>
            </div>
            <div class="vacancies-message">
                <i class="fas fa-calendar-alt"></i>
                <h2>No Upcoming Events</h2>
                <p>We don't have any scheduled events at the moment. Follow us on social media for announcements!</p>
            </div>
        </div>
    </section>

    <!-- Types of Events -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Types of Events We Host</h2>
            </div>
            <div class="activities-grid">
                <div class="activity-card">
                    <i class="fas fa-broom"></i>
                    <h3>Beach Cleanups</h3>
                    <p>Join us in cleaning Curaçao's beaches to protect turtle nesting sites and marine life.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>Educational Presentations</h3>
                    <p>Learn about sea turtles through our free public presentations and workshops.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-glass-cheers"></i>
                    <h3>Fundraising Events</h3>
                    <p>Special events to raise funds for our conservation programs and rehabilitation efforts.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-water"></i>
                    <h3>Snorkel Surveys</h3>
                    <p>Participate in citizen science by helping us survey sea turtle populations in Curaçao's waters.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-moon"></i>
                    <h3>Night Patrols</h3>
                    <p>During nesting season, join our night patrols to monitor nesting activity on beaches.</p>
                </div>
                <div class="activity-card">
                    <i class="fas fa-users"></i>
                    <h3>Community Days</h3>
                    <p>Special events bringing together the community to celebrate and support sea turtle conservation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stay Updated -->
    <section class="cta-section">
        <div class="container">
            <h2>Stay Updated</h2>
            <p>Follow us on social media to be the first to know about upcoming events and activities.</p>
            <div class="social-buttons" style="justify-content: center;">
                <a href="https://www.facebook.com/SeaTurtleConservationCuracao" target="_blank" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://www.instagram.com/curacaoturtles" target="_blank" class="social-btn instagram">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
