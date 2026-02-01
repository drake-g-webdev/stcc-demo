/* ===================================
   Sea Turtle Conservation Curaçao
   Main JavaScript
   =================================== */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (mobileMenuToggle && navMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            this.classList.toggle('active');
        });
    }

    // Scroll to Top Button
    const scrollTopBtn = document.querySelector('.scroll-top');

    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Floating Donate Button
    const floatingDonate = document.querySelector('.floating-donate');

    if (floatingDonate) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 800) {
                floatingDonate.classList.add('visible');
            } else {
                floatingDonate.classList.remove('visible');
            }
        });
    }

    // Donation Form - Custom Amount Toggle
    const amountOptions = document.querySelectorAll('.amount-option input');
    const customAmountField = document.querySelector('.custom-amount');

    if (amountOptions.length && customAmountField) {
        amountOptions.forEach(function(option) {
            option.addEventListener('change', function() {
                if (this.value === 'custom') {
                    customAmountField.style.display = 'block';
                } else {
                    customAmountField.style.display = 'none';
                }
            });
        });
    }

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Header Scroll Effect
    const header = document.querySelector('.main-header');
    let lastScroll = 0;

    if (header) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.scrollY;

            if (currentScroll > 100) {
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
            } else {
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            }

            lastScroll = currentScroll;
        });
    }

    // Dropdown Menu Touch Support for Mobile
    const hasDropdown = document.querySelectorAll('.has-dropdown');

    hasDropdown.forEach(function(item) {
        item.addEventListener('touchstart', function(e) {
            if (window.innerWidth <= 768) {
                const dropdown = this.querySelector('.dropdown');
                if (dropdown) {
                    dropdown.classList.toggle('show');
                }
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (navMenu && navMenu.classList.contains('active')) {
            if (!navMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                navMenu.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            }
        }
    });

    // Animate elements on scroll (simple fade-in effect)
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.focus-card, .news-card, .team-card');

        elements.forEach(function(element) {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (elementTop < windowHeight - 100) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };

    // Set initial state for animation
    const animatedElements = document.querySelectorAll('.focus-card, .news-card, .team-card');
    animatedElements.forEach(function(element) {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run on page load
});
