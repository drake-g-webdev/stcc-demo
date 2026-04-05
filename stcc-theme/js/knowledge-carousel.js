/**
 * Sea Turtle Knowledge Carousel
 */
document.addEventListener('DOMContentLoaded', function() {
    var track = document.querySelector('.carousel-track');
    var slides = document.querySelectorAll('.carousel-slide');
    var prevBtn = document.querySelector('.carousel-prev');
    var nextBtn = document.querySelector('.carousel-next');
    var dots = document.querySelectorAll('.carousel-dot');
    var navItems = document.querySelectorAll('.knowledge-nav-item');
    var currentIndex = 0;

    if (!track || slides.length === 0) return;

    function goToSlide(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;
        currentIndex = index;

        slides.forEach(function(slide) { slide.classList.remove('active'); });
        slides[currentIndex].classList.add('active');

        dots.forEach(function(dot) { dot.classList.remove('active'); });
        if (dots[currentIndex]) dots[currentIndex].classList.add('active');

        navItems.forEach(function(item) { item.classList.remove('active'); });
        if (navItems[currentIndex]) navItems[currentIndex].classList.add('active');

        track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';
    }

    prevBtn.addEventListener('click', function() { goToSlide(currentIndex - 1); });
    nextBtn.addEventListener('click', function() { goToSlide(currentIndex + 1); });

    dots.forEach(function(dot) {
        dot.addEventListener('click', function() {
            goToSlide(parseInt(this.dataset.slide));
        });
    });

    navItems.forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            goToSlide(parseInt(this.dataset.slide));
        });
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') goToSlide(currentIndex - 1);
        if (e.key === 'ArrowRight') goToSlide(currentIndex + 1);
    });

    // Touch/swipe support
    var touchStartX = 0;
    var touchEndX = 0;
    var container = document.querySelector('.carousel-track-container');

    container.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    container.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        var diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) goToSlide(currentIndex + 1);
            else goToSlide(currentIndex - 1);
        }
    });
});
