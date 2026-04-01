// Mizuki Theme JavaScript

(function() {
    'use strict';
    
    // ==================== Theme Toggle ====================
    function getSavedTheme() {
        return localStorage.getItem('mizuki-theme') || 'light';
    }
    
    function applyTheme(theme) {
        document.body.setAttribute('data-theme', theme);
        localStorage.setItem('mizuki-theme', theme);
        
        var icon = document.getElementById('theme-icon');
        if (icon) {
            icon.textContent = theme === 'dark' ? 'dark_mode' : 'light_mode';
        }
    }
    
    window.toggleTheme = function() {
        var current = document.body.getAttribute('data-theme') || 'light';
        var next = current === 'dark' ? 'light' : 'dark';
        applyTheme(next);
    };
    
    // 初始化主题
    document.addEventListener('DOMContentLoaded', function() {
        applyTheme(getSavedTheme());
    });
    
    // ==================== Search Toggle ====================
    window.toggleSearch = function() {
        var panel = document.getElementById('search-panel');
        if (!panel) return;
        
        var isHidden = panel.style.display === 'none' || panel.style.display === '';
        panel.style.display = isHidden ? 'block' : 'none';
        
        if (isHidden) {
            var input = panel.querySelector('input');
            if (input) {
                input.focus();
                document.body.classList.add('is-searching');
            }
        } else {
            document.body.classList.remove('is-searching');
        }
    };
    
    // 点击外部关闭搜索
    document.addEventListener('click', function(e) {
        var panel = document.getElementById('search-panel');
        var container = document.getElementById('search-container');
        if (panel && container && !container.contains(e.target)) {
            panel.style.display = 'none';
            document.body.classList.remove('is-searching');
        }
    });
    
    // ==================== Mobile Menu Toggle ====================
    window.toggleMenu = function() {
        var panel = document.getElementById('mobile-menu-panel');
        if (!panel) return;
        
        var isClosed = panel.classList.contains('float-panel-closed');
        
        if (isClosed) {
            panel.style.display = 'block';
            // 强制重绘
            panel.offsetHeight;
            panel.style.transform = 'translateX(0)';
            panel.classList.remove('float-panel-closed');
        } else {
            panel.style.transform = 'translateX(100%)';
            panel.classList.add('float-panel-closed');
            setTimeout(function() {
                panel.style.display = 'none';
            }, 300);
        }
    };
    
    // ==================== Layout Toggle ====================
    window.toggleLayout = function() {
        var main = document.getElementById('main');
        if (!main) return;
        
        var isGrid = main.classList.contains('posts-grid');
        var newLayout = isGrid ? 'list' : 'grid';
        
        // 切换类名
        main.classList.toggle('posts-grid', !isGrid);
        main.classList.toggle('posts-list', isGrid);
        
        // 保存选择
        localStorage.setItem('mizuki-post-layout', newLayout);
        
        // 更新按钮图标
        var btn = document.querySelector('.btn-layout .material-symbols-rounded');
        if (btn) {
            btn.textContent = 'view_' + newLayout;
        }
    };
    
    // 初始化布局
    document.addEventListener('DOMContentLoaded', function() {
        var savedLayout = localStorage.getItem('mizuki-post-layout') || 'grid';
        var main = document.getElementById('main');
        
        if (main) {
            main.classList.remove('posts-grid', 'posts-list');
            main.classList.add('posts-' + savedLayout);
            
            // 更新按钮
            var btn = document.querySelector('.btn-layout .material-symbols-rounded');
            if (btn) {
                btn.textContent = 'view_' + savedLayout;
            }
        }
    });
    
    // ==================== Navbar Scroll Effect ====================
    function initNavbarScroll() {
        var navbar = document.getElementById('navbar');
        if (!navbar || !navbar.classList.contains('enable-banner')) return;
        
        var ticking = false;
        
        function update() {
            var scrollTop = window.scrollY || document.documentElement.scrollTop;
            if (scrollTop > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            ticking = false;
        }
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(update);
                ticking = true;
            }
        });
        
        // 初始检查
        update();
    }
    
    // ==================== Banner Carousel ====================
    function initBannerCarousel() {
        var items = document.querySelectorAll('.banner-item');
        if (!items.length || items.length <= 1) return;
        
        var current = 0;
        setInterval(function() {
            items[current].classList.remove('active');
            current = (current + 1) % items.length;
            items[current].classList.add('active');
        }, 5000);
    }
    
    // ==================== Initialize All ====================
    document.addEventListener('DOMContentLoaded', function() {
        initNavbarScroll();
        initBannerCarousel();
    });
    
})();
