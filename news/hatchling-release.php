<?php
$basePath = '../';
$pageTitle = 'Release Hatchling at Blue Bay';
include '../includes/head.php';
include '../includes/header.php';
?>

    <!-- Article -->
    <article class="article-page">
        <div class="container">
            <div class="article-header">
                <a href="<?php echo $basePath; ?>news.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to News</a>
                <span class="article-category">Nest</span>
                <h1>Release hatchling at Blue Bay</h1>
                <span class="article-date">July 4, 2024</span>
            </div>

            <div class="article-featured-image">
                <img src="<?php echo $basePath; ?>images/news/hatchling-release.jpg" alt="Hatchling release at Blue Bay">
            </div>

            <div class="article-content">
                <p>What a magical morning at Blue Bay! We had the privilege of releasing sea turtle hatchlings into the ocean, watching as these tiny creatures began their incredible journey into the Caribbean Sea.</p>

                <h2>The Moment of Release</h2>

                <p>There's nothing quite like watching baby sea turtles make their first steps toward the ocean. These tiny hatchlings, each no bigger than the palm of your hand, instinctively know to head toward the water, guided by the light reflecting off the sea.</p>

                <p>As they scrambled across the sand and entered the waves, we were reminded why we do this work. Each hatchling represents hope for the future of sea turtles in Curaçao.</p>

                <h2>Why Hatchling Releases Matter</h2>

                <p>Sea turtle hatchlings face incredible odds. It's estimated that only about 1 in 1,000 hatchlings will survive to adulthood. They face threats from predators, plastic pollution, and many other dangers during their "lost years" in the open ocean.</p>

                <p>By monitoring nests and ensuring hatchlings have a safe path to the sea, we help give them the best possible start in life. Every hatchling that makes it to the water is a small victory for conservation.</p>

                <h2>Nesting Season in Curaçao</h2>

                <p>Nesting season in Curaçao runs from approximately June through December. During this time, female sea turtles come ashore at night to lay their eggs in nests dug in the sand. After about 60 days of incubation, the hatchlings emerge – usually at night – and make their way to the sea.</p>

                <p>Our volunteers monitor known nesting beaches during this season, documenting nesting activity and protecting nests from disturbance. When hatchlings emerge, we sometimes assist with releases to ensure they reach the water safely.</p>

                <h2>Thank You</h2>

                <p>Thank you to everyone who supports our work. Moments like these remind us why sea turtle conservation matters. These hatchlings are now out there in the ocean, and hopefully, some of them will one day return to Curaçao's beaches to nest – continuing the cycle of life that has existed for millions of years.</p>

                <p>Want to help protect sea turtle nests? Consider <a href="<?php echo $basePath; ?>volunteer.php">volunteering</a> with us during nesting season!</p>
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
                    <a href="educational-video.php" class="news-image">
                        <img src="<?php echo $basePath; ?>images/news/educational-video.jpg" alt="Educational video">
                        <span class="news-category">Education</span>
                    </a>
                    <div class="news-content">
                        <span class="news-date">August 6, 2024</span>
                        <h3><a href="educational-video.php">Educational video about Green sea turtles</a></h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
