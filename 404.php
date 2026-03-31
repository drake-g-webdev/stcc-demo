<?php
http_response_code(404);
$pageTitle = 'Page Not Found';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- 404 Section -->
    <section class="page-header">
        <div class="container">
            <h1>Page Not Found</h1>
            <p>Sorry, the page you're looking for doesn't exist or has been moved.</p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="intro-text" style="text-align: center;">
                <i class="fas fa-turtle" style="font-size: 4rem; color: #2d7d9e; margin-bottom: 1rem; display: block;"></i>
                <h2>Looks like this turtle swam away</h2>
                <p>The page you requested could not be found. It may have been removed, renamed, or never existed.</p>
                <div class="cta-buttons" style="margin-top: 2rem;">
                    <a href="index.php" class="btn btn-primary">Back to Home</a>
                    <a href="news.php" class="btn btn-outline">Latest News</a>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
