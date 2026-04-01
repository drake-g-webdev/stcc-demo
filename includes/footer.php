<?php
/**
 * Footer section - Links, social, copyright
 *
 * Uses $basePath variable set before inclusion
 * Set $extraScripts array for page-specific scripts
 */
$basePath = isset($basePath) ? $basePath : '';
?>
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="<?php echo $basePath; ?>images/logo-stcc-white.png" alt="Sea Turtle Conservation Curaçao">
                    <p>Protecting Sea Turtles and their Habitat through Research, Conservation & Education</p>
                </div>
                <div class="footer-links">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="<?php echo $basePath; ?>our-team.php">Our Team</a></li>
                        <li><a href="<?php echo $basePath; ?>our-mission.php">Our Mission</a></li>
                        <li><a href="<?php echo $basePath; ?>our-allies.php">Partners & Supporters</a></li>
                        <li><a href="<?php echo $basePath; ?>committees.php">Committees</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Our Work</h4>
                    <ul>
                        <li><a href="<?php echo $basePath; ?>rescue-rehabilitation.php">Rescue & Rehabilitation</a></li>
                        <li><a href="<?php echo $basePath; ?>education.php">Education</a></li>
                        <li><a href="<?php echo $basePath; ?>research.php">Research</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Get Involved</h4>
                    <ul>
                        <li><a href="<?php echo $basePath; ?>volunteer.php">Volunteer</a></li>
                        <li><a href="<?php echo $basePath; ?>internships.php">Internships</a></li>
                        <li><a href="<?php echo $basePath; ?>donate.php">Donate</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/curacaoturtles" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/curacaoturtles" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Sea Turtle Conservation Curaçao. All rights reserved.</p>
                <p class="site-credit">Web Services Provided By OpenSky Custom Development</p>
            </div>
        </div>
    </footer>

    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="<?php echo $basePath; ?>js/main.js"></script>
<?php
// Include any extra scripts defined by the page
if (isset($extraScripts) && is_array($extraScripts)) {
    foreach ($extraScripts as $script) {
        echo '    <script src="' . $basePath . $script . '"></script>' . "\n";
    }
}
?>
</body>
</html>
