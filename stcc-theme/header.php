<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="hotline-badge">
                    <img src="<?php echo stcc_image_url('turtle-emergency-icon.svg'); ?>" alt="Sea Turtle Emergency" class="turtle-emergency-icon-img">
                    <span>Sea Turtle Emergency Hotline: <a href="tel:+59996647970">+5999 664 7970</a></span>
                </div>
                <div class="social-links">
                    <a href="https://www.facebook.com/SeaTurtleConservationCuracao" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/curacaoturtles" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCRUNdWbRZ5odDvW0BZDZfwQ" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/sea-turtle-conservation-cura-ao/" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo home_url('/'); ?>" class="logo">
                    <img src="<?php echo stcc_image_url('logo-stcc-color.png'); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
                <nav class="main-nav">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'nav-menu',
                            'walker'         => new STCC_Nav_Walker(),
                        ]);
                    }
                    ?>
                </nav>
                <div class="header-buttons">
                    <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-donate">Donate</a>
                    <a href="<?php echo home_url('/volunteer-portal/'); ?>" class="btn btn-login"><i class="fas fa-user"></i> Volunteer Portal</a>
                </div>
                <button class="mobile-menu-toggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
