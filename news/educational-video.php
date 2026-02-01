<?php
$basePath = '../';
$pageTitle = 'Educational Video About Green Sea Turtles';
include '../includes/head.php';
include '../includes/header.php';
?>

    <!-- Article -->
    <article class="article-page">
        <div class="container">
            <div class="article-header">
                <a href="<?php echo $basePath; ?>news.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to News</a>
                <span class="article-category">Education</span>
                <h1>Educational video about Green sea turtles</h1>
                <span class="article-date">August 6, 2024</span>
            </div>

            <div class="article-featured-image">
                <img src="<?php echo $basePath; ?>images/news/educational-video.jpg" alt="Educational video about Green sea turtles">
            </div>

            <div class="article-content">
                <p>We're excited to announce the release of our new educational video about Green sea turtles! This video is part of our ongoing mission to spread awareness about sea turtle conservation and inspire people to protect these incredible creatures.</p>

                <h2>About the Video</h2>

                <p>The video covers everything you need to know about Green sea turtles, including:</p>
                <ul>
                    <li>Physical characteristics and how to identify them</li>
                    <li>Diet and feeding behavior</li>
                    <li>Life cycle from egg to adult</li>
                    <li>Habitat and migration patterns</li>
                    <li>Threats they face in Curaçao and worldwide</li>
                    <li>How everyone can help protect them</li>
                </ul>

                <h2>Why Green Sea Turtles?</h2>

                <p>Green sea turtles are the most commonly seen species in Curaçao's waters, making them an excellent starting point for learning about sea turtle conservation. Despite their name, Green turtles are actually named for the green color of their body fat, not their shells!</p>

                <p>As adults, Green sea turtles are primarily herbivores, feeding on seagrasses and algae. This makes them important "gardeners" of the sea – their grazing helps keep seagrass beds healthy, which in turn provides habitat for countless other marine species.</p>

                <h2>Education is Key</h2>

                <p>At STCC, we believe that education is fundamental to conservation. When people understand the amazing lives of sea turtles and the challenges they face, they're more likely to take action to protect them.</p>

                <p>This video is designed for viewers of all ages and can be used in schools, community groups, and at home. We encourage teachers and parents to share it widely!</p>

                <h2>Watch and Share</h2>

                <p>The video is available on our social media channels. Please watch, like, and share it with your friends and family. Every view helps spread the message of sea turtle conservation!</p>

                <p>Follow us on <a href="https://www.instagram.com/curacaoturtles" target="_blank">Instagram</a> and <a href="https://www.facebook.com/curacaoturtles" target="_blank">Facebook</a> to watch the video and stay updated on our latest educational content.</p>
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
                    <a href="unoc-conference.php" class="news-image">
                        <img src="<?php echo $basePath; ?>images/news/unoc-conference.jpg" alt="UN Ocean Conference">
                        <span class="news-category">News</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">June 12, 2025</span>
                        <h3><a href="unoc-conference.php">STCC at the third United Nations Ocean Conference</a></h3>
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
