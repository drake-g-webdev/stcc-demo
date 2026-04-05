<?php
$pageTitle = 'Sea Turtle Knowledge';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Sea Turtle Knowledge</h1>
            <p>Learn about the sea turtles of Curaçao</p>
        </div>
    </section>

    <!-- Topic Navigation -->
    <section class="content-section">
        <div class="container">
            <div class="knowledge-nav">
                <a href="#" class="knowledge-nav-item active" data-slide="0">Know Your Sea Turtles</a>
                <a href="#" class="knowledge-nav-item" data-slide="1">Green Sea Turtle</a>
                <a href="#" class="knowledge-nav-item" data-slide="2">Hawksbill Sea Turtle</a>
                <a href="#" class="knowledge-nav-item" data-slide="3">Loggerhead Sea Turtle</a>
                <a href="#" class="knowledge-nav-item" data-slide="4">Sea Turtle Anatomy</a>
                <a href="#" class="knowledge-nav-item" data-slide="5">Life Cycle & Threats</a>
                <a href="#" class="knowledge-nav-item" data-slide="6">Ecological Importance</a>
            </div>
        </div>
    </section>

    <!-- Image Carousel -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="knowledge-carousel">
                <button class="carousel-btn carousel-prev" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
                <div class="carousel-track-container">
                    <div class="carousel-track">
                        <div class="carousel-slide active">
                            <img src="images/sea-turtle-knowledge/sign-1.jpg" alt="Know Your Sea Turtles" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="images/sea-turtle-knowledge/sign-2.jpg" alt="Green Sea Turtle" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="images/sea-turtle-knowledge/sign-3.jpg" alt="Hawksbill Sea Turtle" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="images/sea-turtle-knowledge/sign-4.jpg" alt="Loggerhead Sea Turtle" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="images/sea-turtle-knowledge/sign-5.jpg" alt="Sea Turtle Anatomy" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="images/sea-turtle-knowledge/sign-6.jpg" alt="Life Cycle & Threats" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="images/sea-turtle-knowledge/sign-7.jpg" alt="Ecological Importance" loading="lazy">
                        </div>
                    </div>
                </div>
                <button class="carousel-btn carousel-next" aria-label="Next"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="carousel-indicators">
                <span class="carousel-dot active" data-slide="0"></span>
                <span class="carousel-dot" data-slide="1"></span>
                <span class="carousel-dot" data-slide="2"></span>
                <span class="carousel-dot" data-slide="3"></span>
                <span class="carousel-dot" data-slide="4"></span>
                <span class="carousel-dot" data-slide="5"></span>
                <span class="carousel-dot" data-slide="6"></span>
            </div>
            <div class="knowledge-download">
                <a href="images/sea-turtle-knowledge/SIGNS-STCC_Final.pdf" download class="btn btn-primary btn-large">
                    <i class="fas fa-download"></i> Download All Pages (PDF)
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Help Protect Sea Turtles</h2>
            <p>Now that you know more about sea turtles, join us in our mission to protect them.</p>
            <div class="cta-buttons">
                <a href="donate.php" class="btn btn-primary">Donate Now</a>
                <a href="volunteer.php" class="btn btn-outline-white">Volunteer</a>
            </div>
        </div>
    </section>

<?php
$extraScripts = ['js/knowledge-carousel.js'];
include 'includes/footer.php';
?>
