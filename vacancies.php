<?php
$pageTitle = 'Vacancies';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Vacancies</h1>
            <p>Career opportunities at Sea Turtle Conservation Curaçao</p>
        </div>
    </section>

    <!-- Vacancies Content -->
    <section class="content-section">
        <div class="container">
            <div class="vacancies-message">
                <i class="fas fa-clipboard-check"></i>
                <h2>No Current Openings</h2>
                <p>We have no vacancies at this time. Please check back!</p>
            </div>
        </div>
    </section>

    <!-- Alternative Ways -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Other Ways to Get Involved</h2>
                <p>While we don't have paid positions available, there are many ways you can contribute</p>
            </div>
            <div class="ways-grid">
                <div class="way-card">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Volunteer</h3>
                    <p>Join our volunteer team and make a direct impact on sea turtle conservation.</p>
                    <a href="volunteer.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="way-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Internships</h3>
                    <p>Gain hands-on experience in marine conservation through our internship program.</p>
                    <a href="internships.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="way-card">
                    <i class="fas fa-heart"></i>
                    <h3>Donate</h3>
                    <p>Support our mission financially to help us continue our vital conservation work.</p>
                    <a href="donate.php" class="btn btn-outline">Donate Now</a>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
