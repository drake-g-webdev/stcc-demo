    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="<?php echo stcc_image_url('logo-stcc-white.png'); ?>" alt="<?php bloginfo('name'); ?>">
                    <p>Protecting Sea Turtles and their Habitat through Research, Conservation & Education</p>
                </div>
                <div class="footer-links">
                    <h4>About Us</h4>
                    <?php
                    if (has_nav_menu('footer-about')) {
                        wp_nav_menu([
                            'theme_location' => 'footer-about',
                            'container'      => false,
                            'depth'          => 1,
                            'items_wrap'     => '<ul>%3$s</ul>',
                        ]);
                    } else {
                    ?>
                    <ul>
                        <li><a href="<?php echo home_url('/our-team/'); ?>">Our Team</a></li>
                        <li><a href="<?php echo home_url('/our-mission/'); ?>">Our Mission</a></li>
                        <li><a href="<?php echo home_url('/our-allies/'); ?>">Our Allies</a></li>
                        <li><a href="<?php echo home_url('/committees/'); ?>">Committees</a></li>
                    </ul>
                    <?php } ?>
                </div>
                <div class="footer-links">
                    <h4>Our Work</h4>
                    <?php
                    if (has_nav_menu('footer-work')) {
                        wp_nav_menu([
                            'theme_location' => 'footer-work',
                            'container'      => false,
                            'depth'          => 1,
                            'items_wrap'     => '<ul>%3$s</ul>',
                        ]);
                    } else {
                    ?>
                    <ul>
                        <li><a href="<?php echo home_url('/rescue-rehabilitation/'); ?>">Rescue & Rehabilitation</a></li>
                        <li><a href="<?php echo home_url('/education/'); ?>">Education</a></li>
                        <li><a href="<?php echo home_url('/research/'); ?>">Research</a></li>
                    </ul>
                    <?php } ?>
                </div>
                <div class="footer-links">
                    <h4>Get Involved</h4>
                    <?php
                    if (has_nav_menu('footer-involved')) {
                        wp_nav_menu([
                            'theme_location' => 'footer-involved',
                            'container'      => false,
                            'depth'          => 1,
                            'items_wrap'     => '<ul>%3$s</ul>',
                        ]);
                    } else {
                    ?>
                    <ul>
                        <li><a href="<?php echo home_url('/volunteer/'); ?>">Volunteer</a></li>
                        <li><a href="<?php echo home_url('/internships/'); ?>">Internships</a></li>
                        <li><a href="<?php echo home_url('/donate/'); ?>">Donate</a></li>
                    </ul>
                    <?php } ?>
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
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                <p class="site-credit">Web Services Provided By OpenSky Custom Development</p>
            </div>
        </div>
    </footer>

    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <?php wp_footer(); ?>
</body>
</html>
