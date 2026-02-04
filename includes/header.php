<?php
/**
 * Header section - Top bar, logo, navigation
 *
 * Uses $basePath variable set before inclusion
 * Uses $currentPage variable for active nav highlighting (optional)
 */
$basePath = isset($basePath) ? $basePath : '';
?>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="hotline-badge">
                    <img src="<?php echo $basePath; ?>images/turtle-emergency-icon.svg" alt="Sea Turtle Emergency" class="turtle-emergency-icon-img">
                    <span>Sea Turtle Emergency Hotline: <a href="tel:+59996647970">+5999 664 7970</a></span>
                </div>
                <div class="social-links">
                    <a href="https://www.facebook.com/curacaoturtles" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/curacaoturtles" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo $basePath; ?>index.php" class="logo">
                    <img src="<?php echo $basePath; ?>images/logo-stcc-color.png" alt="Sea Turtle Conservation Curaçao">
                </a>
                <nav class="main-nav">
                    <ul class="nav-menu">
                        <li><a href="<?php echo $basePath; ?>index.php">Home</a></li>
                        <li class="has-dropdown">
                            <a href="#">About Us</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $basePath; ?>our-team.php">Our Team</a></li>
                                <li><a href="<?php echo $basePath; ?>our-mission.php">Our Mission</a></li>
                                <li><a href="<?php echo $basePath; ?>our-allies.php">Our Allies</a></li>
                                <li><a href="<?php echo $basePath; ?>committees.php">Committees</a></li>
                                <li><a href="<?php echo $basePath; ?>financial-disclosure.php">Financial Disclosure</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Our Work</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $basePath; ?>rescue-rehabilitation.php">Rescue & Rehabilitation</a></li>
                                <li><a href="<?php echo $basePath; ?>education.php">Education</a></li>
                                <li><a href="<?php echo $basePath; ?>research.php">Research</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Get Involved</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $basePath; ?>volunteer.php">Volunteer</a></li>
                                <li><a href="<?php echo $basePath; ?>internships.php">Internships</a></li>
                                <li><a href="<?php echo $basePath; ?>events.php">Events</a></li>
                                <li><a href="<?php echo $basePath; ?>patrol-klein-curacao.php">Patrol Klein Curaçao</a></li>
                                <li><a href="<?php echo $basePath; ?>vacancies.php">Vacancies</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Explore</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $basePath; ?>sea-turtles.php">Sea Turtles of Curaçao</a></li>
                                <li><a href="<?php echo $basePath; ?>fibropapillomatosis.php">Fibropapillomatosis</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $basePath; ?>news.php">News</a></li>
                    </ul>
                </nav>
                <div class="header-buttons">
                    <a href="<?php echo $basePath; ?>donate.php" class="btn btn-donate">Donate</a>
                    <a href="<?php echo $basePath; ?>volunteer-login.php" class="btn btn-login"><i class="fas fa-user"></i> Volunteer Portal</a>
                </div>
                <button class="mobile-menu-toggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
