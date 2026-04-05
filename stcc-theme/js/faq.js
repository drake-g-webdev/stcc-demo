/**
 * FAQ Accordion
 */
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-question').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var item = this.closest('.faq-item');
            var isOpen = item.classList.contains('open');

            // Close all others
            document.querySelectorAll('.faq-item.open').forEach(function(openItem) {
                openItem.classList.remove('open');
            });

            // Toggle current
            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });
});
