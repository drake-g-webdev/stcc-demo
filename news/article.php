<?php
$basePath = '../';

// Read the news data
$jsonData = file_get_contents($basePath . 'data/news.json');
$articles = json_decode($jsonData, true);

// Get the slug from URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Find the matching article
$article = null;
$articleIndex = -1;
foreach ($articles as $i => $a) {
    if ($a['slug'] === $slug) {
        $article = $a;
        $articleIndex = $i;
        break;
    }
}

// If no article found, redirect to news page
if (!$article) {
    header('Location: ' . $basePath . 'news.php');
    exit;
}

// Format the date
$dateObj = new DateTime($article['date']);
$formattedDate = $dateObj->format('F j, Y');

$pageTitle = $article['title'];
include '../includes/head.php';
include '../includes/header.php';

// Get related articles (all others, max 2)
$related = [];
foreach ($articles as $i => $a) {
    if ($i !== $articleIndex) {
        $related[] = $a;
    }
    if (count($related) >= 2) break;
}
?>

    <!-- Article -->
    <article class="article-page">
        <div class="container">
            <div class="article-header">
                <a href="<?php echo $basePath; ?>news.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to News</a>
                <span class="article-category"><?php echo htmlspecialchars($article['category']); ?></span>
                <h1><?php echo htmlspecialchars($article['title']); ?></h1>
                <span class="article-date"><?php echo $formattedDate; ?></span>
            </div>

            <div class="article-featured-image">
                <img src="<?php echo $basePath . htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
            </div>

            <div class="article-content">
                <?php echo $article['body']; ?>
            </div>

            <div class="article-share">
                <span>Share this article:</span>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($article['title']); ?>" target="_blank" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                    <a href="mailto:?subject=<?php echo rawurlencode($article['title']); ?>&body=<?php echo rawurlencode('Check out this article: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" class="share-btn email"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </article>

<?php if (!empty($related)): ?>
    <!-- Related Articles -->
    <section class="related-articles">
        <div class="container">
            <h2>More News</h2>
            <div class="news-grid">
                <?php foreach ($related as $rel):
                    $relDate = new DateTime($rel['date']);
                ?>
                <article class="news-card">
                    <a href="article.php?slug=<?php echo urlencode($rel['slug']); ?>" class="news-image">
                        <img src="<?php echo $basePath . htmlspecialchars($rel['image']); ?>" alt="<?php echo htmlspecialchars($rel['title']); ?>">
                        <span class="news-category"><?php echo htmlspecialchars($rel['category']); ?></span>
                    </a>
                    <div class="news-content">
                        <span class="news-date"><?php echo $relDate->format('F j, Y'); ?></span>
                        <h3><a href="article.php?slug=<?php echo urlencode($rel['slug']); ?>"><?php echo htmlspecialchars($rel['title']); ?></a></h3>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>
