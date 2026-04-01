// Banner 轮播
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.banner-item');
        if (!items.length || items.length <= 1) return;

        let current = 0;
        setInterval(function() {
            items[current].classList.remove('active');
            current = (current + 1) % items.length;
            items[current].classList.add('active');
        }, 5000);
    });
})();
