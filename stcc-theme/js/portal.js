// Volunteer Portal JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Accordion functionality
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            const isActive = item.classList.contains('active');

            // Close all accordion items
            document.querySelectorAll('.accordion-item').forEach(i => {
                i.classList.remove('active');
            });

            // Open clicked item if it wasn't already open
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    // Smooth scroll for quick links
    document.querySelectorAll('.quicklink-card').forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Interactive checklist (toggle checkboxes)
    document.querySelectorAll('.checklist li').forEach(item => {
        item.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-square')) {
                icon.classList.remove('fa-square');
                icon.classList.add('fa-check-square');
                this.style.opacity = '0.6';
                this.style.textDecoration = 'line-through';
            } else {
                icon.classList.remove('fa-check-square');
                icon.classList.add('fa-square');
                this.style.opacity = '1';
                this.style.textDecoration = 'none';
            }
        });
        item.style.cursor = 'pointer';
    });
});
