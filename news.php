<?php
$pageTitle = 'News';
include 'includes/head.php';
include 'includes/header.php';

// Read news data from JSON
$jsonData = file_get_contents('data/news.json');
$articles = json_decode($jsonData, true);
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>News</h1>
            <p>Latest updates from Sea Turtle Conservation Curaçao</p>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-page-section">
        <div class="container">
            <div class="news-grid-full">
                <?php foreach ($articles as $article):
                    $dateObj = new DateTime($article['date']);
                    $formattedDate = $dateObj->format('F j, Y');
                ?>
                <article class="news-card">
                    <a href="news/article.php?slug=<?php echo urlencode($article['slug']); ?>" class="news-image">
                        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                        <span class="news-category"><?php echo htmlspecialchars($article['category']); ?></span>
                    </a>
                    <div class="news-content">
                        <span class="news-date"><?php echo $formattedDate; ?></span>
                        <h3><a href="news/article.php?slug=<?php echo urlencode($article['slug']); ?>"><?php echo htmlspecialchars($article['title']); ?></a></h3>
                        <p><?php echo htmlspecialchars($article['summary']); ?></p>
                        <a href="news/article.php?slug=<?php echo urlencode($article['slug']); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Stay Updated Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="stay-updated-box">
                <h2>Stay Updated</h2>
                <p>Follow us on social media to get the latest news and updates about our conservation work.</p>
                <div class="social-buttons">
                    <a href="https://www.facebook.com/SeaTurtleConservationCuracao" target="_blank" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://www.instagram.com/curacaoturtles" target="_blank" class="social-btn instagram">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
