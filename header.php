<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html class="bg-[var(--page-bg)] text-[14px] md:text-[16px]" data-overlayscrollbars-initialize="" lang="zh-CN" style="--configHue: 60;--page-width: 90rem;--bannerOffset: 15vh;--banner-height-home: 65vh;--banner-height: 35vh;">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle(' - ', '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="description" content="<?php $this->options->description(); ?>">
    <meta name="author" content="十一">

    <!-- Favicons -->
    <link rel="icon" href="<?php $this->options->themeUrl('favicon/favicon.ico'); ?>" media="(prefers-color-scheme: light)" rel="icon" sizes="64x64">
    <link rel="icon" href="<?php $this->options->themeUrl('favicon/favicon.ico'); ?>" media="(prefers-color-scheme: dark)" rel="icon" sizes="64x64">

    <!-- 全局本地字体 + 强制毛玻璃导航 -->
    <style>
    @font-face {
        font-family: 'LoliFont';
        src: url('<?php $this->options->themeUrl('assets/font/loli.ttf'); ?>') format('truetype');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }
    * {
        font-family: 'LoliFont', 'ZenMaruGothic-Medium', 'MgenPlus', 'Noto Sans JP', 'Mplus 1p', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    }
    /* 强制毛玻璃导航 */
    #navbar,
    #navbar[data-transparent-mode="semifull"],
    #navbar[data-transparent-mode="full"],
    #navbar[data-transparent-mode="none"] {
        background: rgba(255, 255, 255, 0.1) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
    }
    .dark #navbar,
    .dark #navbar[data-transparent-mode="semifull"],
    .dark #navbar[data-transparent-mode="full"],
    .dark #navbar[data-transparent-mode="none"] {
        background: rgba(0, 0, 0, 0.1) !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
    }
    /* 搜索模态框 */
    .search-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(8px);
        z-index: 9999;
        display: none;
        align-items: flex-start;
        justify-content: center;
        padding-top: 15vh;
    }
    .search-overlay.show {
        display: flex;
    }
    .search-box {
        width: 90%;
        max-width: 600px;
        background: var(--card-bg);
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }
    .search-input-wrap {
        display: flex;
        align-items: center;
        padding: 16px 20px;
        border-bottom: 1px solid var(--border-color);
    }
    .search-input-wrap svg {
        width: 24px;
        height: 24px;
        color: var(--text-muted);
        flex-shrink: 0;
    }
    .search-input {
        flex: 1;
        border: none;
        background: transparent;
        font-size: 18px;
        padding: 8px 16px;
        color: var(--text-color);
        outline: none;
    }
    .search-input::placeholder {
        color: var(--text-muted);
    }
    .search-results {
        max-height: 60vh;
        overflow-y: auto;
    }
    .search-result-item {
        display: block;
        padding: 16px 20px;
        text-decoration: none;
        border-bottom: 1px solid var(--border-color);
        transition: background 0.2s;
    }
    .search-result-item:hover {
        background: var(--btn-plain-bg-hover);
    }
    .search-result-item:last-child {
        border-bottom: none;
    }
    .search-result-title {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 4px;
    }
    .search-result-excerpt {
        font-size: 14px;
        color: var(--text-muted);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .search-result-meta {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 4px;
    }
    .search-empty {
        padding: 40px 20px;
        text-align: center;
        color: var(--text-muted);
    }
    .search-hint {
        padding: 12px 20px;
        font-size: 13px;
        color: var(--text-muted);
        background: var(--page-bg);
    }
    </style>

    <!-- Global CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/variables.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/main.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/layout.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/banner.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/markdown.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/markdown-extend.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/katex.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/fancybox.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/encrypted.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/mobile.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/widget.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_astro/mobile-fix.css'); ?>">

    <?php $this->header(); ?>

    <script src="<?php $this->options->themeUrl('assets/_astro/page.DkEKxRZq.js'); ?>" type="module"></script>
</head>
<body class="min-h-screen lg:is-home enable-banner" data-overlayscrollbars-initialize="">

<!-- 顶部渐变 -->
<div class="top-gradient-highlight" style="--configHue: 60;--page-width: 90rem;--bannerOffset: 15vh;--banner-height-home: 65vh;--banner-height: 35vh;"></div>

<!-- 毛玻璃导航栏 -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" data-transparent-mode="semifull">
    <div class="max-w-[var(--page-width)] mx-auto px-4 h-14 flex items-center justify-between">
        <a href="<?php $this->options->siteUrl(); ?>" class="text-xl font-bold text-[var(--primary)]">
            <?php $this->options->title(); ?>
        </a>
        <div class="flex items-center gap-3">
            <button class="p-2 rounded-lg hover:bg-[var(--btn-plain-bg-hover)] transition-transform hover:scale-110" aria-label="搜索" id="search-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- 搜索模态框 -->
<div class="search-overlay" id="search-overlay">
    <div class="search-box">
        <div class="search-input-wrap">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" class="search-input" id="search-input" placeholder="搜索文章，按回车确认..." autocomplete="off">
        </div>
        <div class="search-results" id="search-results">
            <div class="search-hint">输入关键词搜索文章，按回车键确认...</div>
        </div>
    </div>
</div>

<!-- 全局配置携带者 -->
<div data-hide-code-blocks-during-transition="true" data-hue="60" id="config-carrier"></div>

<!-- 主题切换脚本 -->
<script>
var SITE_URL = '<?php $this->options->siteUrl(); ?>';
</script>

<script>
(function(){
    const DEFAULT_THEME = "light";
    const LIGHT_MODE = "light";
    const DARK_MODE = "dark";
    const BANNER_HEIGHT = 35;
    const pageScaling = {"enable":true,"targetWidth":2000};

    const theme = localStorage.getItem("theme") || DEFAULT_THEME;
    let isDark = false;
    switch(theme) {
        case LIGHT_MODE:
            document.documentElement.classList.remove("dark");
            isDark = false;
            break;
        case DARK_MODE:
            document.documentElement.classList.add("dark");
            isDark = true;
            break;
    }

    const hue = localStorage.getItem("hue") || 60;
    document.documentElement.style.setProperty("--hue", hue);

    // 自动缩放
    (function() {
        if (pageScaling && pageScaling.enable) {
            function adjustPageScale() {
                const isTouch = (window.matchMedia && (window.matchMedia("(pointer:coarse)").matches || window.matchMedia("(hover: none)").matches)) || ("ontouchstart" in window);
                const isPortrait = window.matchMedia && window.matchMedia("(orientation: portrait)").matches;
                const isTabletLike = isTouch || window.innerWidth <= 1280;
                if (isTabletLike || isPortrait) {
                    document.documentElement.style.fontSize = "";
                    return;
                }
                const targetWidth = pageScaling.targetWidth || 2000;
                const currentWidth = document.documentElement.clientWidth;
                let scale = currentWidth / targetWidth;
                if (scale > 1) {scale = 1;}
                if (scale < 0.85) {scale = 0.85;}
                document.documentElement.style.fontSize = scale * 100 + '%';
            }
            adjustPageScale();
            window.addEventListener('resize', adjustPageScale);
        }
    })();
})();

// 搜索功能
(function() {
    var searchBtn = document.getElementById('search-btn');
    var searchOverlay = document.getElementById('search-overlay');
    var searchInput = document.getElementById('search-input');
    var searchResults = document.getElementById('search-results');

    if (searchBtn && searchOverlay) {
        searchBtn.addEventListener('click', function() {
            searchOverlay.classList.add('show');
            setTimeout(function() { searchInput.focus(); }, 100);
        });

        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                searchOverlay.classList.remove('show');
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                searchOverlay.classList.remove('show');
            }
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchOverlay.classList.add('show');
                setTimeout(function() { searchInput.focus(); }, 100);
            }
        });
    }

    // 搜索请求
    if (searchInput) {
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                var q = this.value.trim();
                if (q.length < 2) {
                    searchResults.innerHTML = '<div class="search-hint">请输入至少2个字符...</div>';
                    return;
                }
                
                searchResults.innerHTML = '<div class="search-empty">搜索中...</div>';
                
                var xhr = new XMLHttpRequest();
                xhr.open('GET', SITE_URL + 'index.php/search?q=' + encodeURIComponent(q), true);
                xhr.timeout = 10000;
                
                xhr.onload = function() {
                    if (xhr.status === 200 || xhr.status === 0) {
                        try {
                            var parser = new DOMParser();
                            var doc = parser.parseFromString(xhr.responseText, 'text/html');
                            var results = doc.querySelectorAll('.post-item');
                            
                            if (results.length > 0) {
                                var html = '';
                                results.forEach(function(item) {
                                    var linkEl = item.querySelector('a');
                                    var titleEl = item.querySelector('h2, h1');
                                    var timeEl = item.querySelector('time, .post-meta');
                                    
                                    if (linkEl && titleEl) {
                                        var link = linkEl.href || '#';
                                        var title = titleEl.textContent.trim() || '无标题';
                                        var meta = timeEl ? timeEl.textContent.trim().substring(0, 50) : '';
                                        
                                        html += '<a href="' + link + '" class="search-result-item" onclick="document.getElementById(\'search-overlay\').classList.remove(\'show\')">';
                                        html += '<div class="search-result-title">' + title + '</div>';
                                        if (meta) html += '<div class="search-result-meta">' + meta + '</div>';
                                        html += '</a>';
                                    }
                                });
                                searchResults.innerHTML = html || '<div class="search-empty">未找到相关文章</div>';
                            } else {
                                searchResults.innerHTML = '<div class="search-empty">未找到相关文章</div>';
                            }
                        } catch(e) {
                            console.error('Search error:', e);
                            searchResults.innerHTML = '<div class="search-empty">搜索失败，请稍后重试</div>';
                        }
                    } else {
                        searchResults.innerHTML = '<div class="search-empty">搜索请求失败</div>';
                    }
                };
                
                xhr.onerror = function() {
                    searchResults.innerHTML = '<div class="search-empty">网络错误，请检查网络连接</div>';
                };
                
                xhr.ontimeout = function() {
                    searchResults.innerHTML = '<div class="search-empty">搜索超时，请重试</div>';
                };
                
                xhr.send();
            }
        });
    }
})();

// JS 兜底：每100ms强制修正导航栏样式，防止被主题JS覆盖
setInterval(() => {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;
    const isDark = document.documentElement.classList.contains('dark');
    if (isDark) {
        navbar.style.background = 'rgba(0, 0, 0, 0.1)';
        navbar.style.borderBottom = '1px solid rgba(0, 0, 0, 0.1)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.1)';
        navbar.style.borderBottom = '1px solid rgba(255, 255, 255, 0.2)';
    }
    navbar.style.backdropFilter = 'blur(16px)';
    navbar.style.webkitBackdropFilter = 'blur(16px)';
}, 100);
</script>

</body>
</html>
<style>
/* 文章内标签样式 */
.post-item .tags a, .post-item .tags span, article .tags a {
    background: var(--c-warm, #fdebdf) !important;
    color: #8b7355 !important;
    border: none !important;
    font-size: 12px !important;
    padding: 4px 10px !important;
    border-radius: 8px !important;
    margin-right: 4px !important;
    margin-bottom: 4px !important;
    display: inline-block !important;
    height: auto !important;
}
/* 文章元数据标签样式 */
.post-item .post-meta time,
.post-item .post-meta span {
    background: var(--c-warm, #fdebdf) !important;
    color: #8b7355 !important;
    border-radius: 8px !important;
    padding: 4px 10px !important;
    font-size: 12px !important;
    height: auto !important;
}
</style>
