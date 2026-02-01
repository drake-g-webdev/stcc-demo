<?php
$basePath = '../';
$pageTitle = 'STCC at the UN Ocean Conference';
include '../includes/head.php';
include '../includes/header.php';
?>

    <!-- Article -->
    <article class="article-page">
        <div class="container">
            <div class="article-header">
                <a href="<?php echo $basePath; ?>news.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to News</a>
                <span class="article-category">News</span>
                <h1>STCC at the third United Nations Ocean Conference</h1>
                <span class="article-date">June 12, 2025</span>
            </div>

            <div class="article-featured-image">
                <img src="<?php echo $basePath; ?>images/news/unoc-conference.jpg" alt="STCC at UN Ocean Conference">
            </div>

            <div class="article-content">
                <p>Sea Turtle Conservation Curaçao is proud to have participated in the third United Nations Ocean Conference, representing our small island nation on the global stage in the fight to protect our oceans and marine wildlife.</p>

                <p>The conference brought together world leaders, scientists, conservationists, and stakeholders from around the globe to address the critical challenges facing our oceans. For STCC, this was an invaluable opportunity to share our work, learn from others, and strengthen international partnerships.</p>

                <h2>Why This Matters</h2>

                <p>Sea turtles are a shared resource – they migrate across international boundaries and face threats throughout their range. Protecting them requires international cooperation and coordinated efforts.</p>

                <p>At the conference, we had the opportunity to:</p>
                <ul>
                    <li>Share our research on Fibropapillomatosis and Curaçao's unique role as a global hotspot</li>
                    <li>Connect with other Caribbean conservation organizations</li>
                    <li>Learn about innovative conservation techniques being used worldwide</li>
                    <li>Advocate for stronger protections for sea turtles and marine habitats</li>
                </ul>

                <h2>Looking Forward</h2>

                <p>Participating in events like the UN Ocean Conference helps raise awareness of the conservation challenges we face in Curaçao and reinforces our commitment to being part of the global solution.</p>

                <p>We returned with new ideas, new connections, and renewed determination to protect the sea turtles that call our waters home.</p>

                <p>Thank you to all our supporters who make this work possible. Together, we can create a better future for sea turtles and our oceans.</p>
            </div>

            <div class="article-share">
                <span>Share this article:</span>
                <div class="share-buttons">
                    <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="share-btn email"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles -->
    <section class="related-articles">
        <div class="container">
            <h2>More News</h2>
            <div class="news-grid">
                <article class="news-card">
                    <a href="educational-video.php" class="news-image">
                        <img src="<?php echo $basePath; ?>images/news/educational-video.jpg" alt="Educational video">
                        <span class="news-category">Education</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">August 6, 2024</span>
                        <h3><a href="educational-video.php">Educational video about Green sea turtles</a></h3>
                    </div>
                </article>
                <article class="news-card">
                    <a href="hatchling-release.php" class="news-image">
                        <img src="<?php echo $basePath; ?>images/news/hatchling-release.jpg" alt="Hatchling release">
                        <span class="news-category">Nest</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">July 4, 2024</span>
                        <h3><a href="hatchling-release.php">Release hatchling at Blue Bay</a></h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
