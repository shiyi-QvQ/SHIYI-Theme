<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php require_once __DIR__ . "/functions.php"; ?>
<?php $this->need('header.php'); ?>

<!-- Banner 轮播区域 -->
<div class="absolute z-10 w-full transition duration-700 overflow-hidden" id="banner-wrapper" style="top: 3.5rem; height: 40vh;">
    <div id="banner-carousel" class="relative h-full w-full">
        <ul class="carousel-list h-full w-full">
            <?php for ($i = 1; $i <= 6; $i++): ?>
            <?php $bannerLinks = get_banner_links($this->options); $hasLink = isset($bannerLinks[$i]) && !empty($bannerLinks[$i]); ?>
            <li class="carousel-item absolute inset-0 transition-all duration-500 opacity-100 scale-100" data-astro-cid-3tcy46xc>
                <?php if ($hasLink): ?><a href="<?php echo htmlspecialchars($bannerLinks[$i]); ?>" target="_blank" class="absolute inset-0 z-10"><?php endif; ?>
                <!-- 移动端 -->
                <div class="block md:hidden object-cover h-full w-full transition-transform duration-500 ease-out overflow-hidden relative">
                    <div class="transition absolute inset-0 dark:bg-black/10 bg-opacity-50 pointer-events-none"></div>
                    <img src="<?php $this->options->themeUrl('assets/mobile-banner/'.$i.'.webp'); ?>" alt="Mobile banner image <?php echo $i; ?>" class="w-full h-full object-cover" style="object-position: center" loading="<?php echo $i === 1 ? 'eager' : 'lazy'; ?>">
                </div>
                <!-- 桌面端 -->
                <div class="hidden md:block object-cover h-full w-full transition-transform duration-500 ease-out overflow-hidden relative">
                    <div class="transition absolute inset-0 dark:bg-black/10 bg-opacity-50 pointer-events-none"></div>
                    <img src="<?php $this->options->themeUrl('assets/desktop-banner/'.$i.'.webp'); ?>" alt="Desktop banner image <?php echo $i; ?>" class="w-full h-full object-cover" style="object-position: center" loading="<?php echo $i === 1 ? 'eager' : 'lazy'; ?>">
                </div>
                <?php if ($hasLink): ?></a><?php endif; ?>
            </li>
            <?php endfor; ?>
        </ul>
    </div>

    <!-- Banner 文字覆盖层 -->
    <div class="banner-text-overlay absolute inset-0 z-20 flex items-center justify-center">
        <div class="w-4/5 lg:w-3/4 text-center mb-0">
            <div class="flex flex-col">
                <h1 class="banner-title text-6xl lg:text-8xl text-white drop-shadow-lg mb-2 lg:mb-4">
                    <?php $this->options->title(); ?>
                </h1>
                <h2 class="banner-subtitle text-xl lg:text-3xl text-white/90 drop-shadow-md">
                    <span class="inline-block min-h-[1.2em]">
                        <span class="typewriter" data-text='["你好，欢迎来到我的博客","这里是我的精神角落","记录生活，分享技术"]' data-speed="100" data-delete-speed="50" data-pause-time="2000"></span>
                    </span>
                </h2>
            </div>
        </div>
    </div>

    <!-- 水波纹效果 -->
    <div class="waves absolute -bottom-[1px] h-[10vh] max-h-[9.375rem] min-h-[3.125rem] w-full md:h-[15vh]" id="header-waves" style="transform: translateZ(0); will-change: fill;">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 20 150 32" preserveAspectRatio="none" shape-rendering="auto" style="transform: translateZ(0); backface-visibility: hidden;">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v48h-352z"></path>
            </defs>
            <g class="parallax" style="transform: translateZ(0);">
                <use xlink:href="#gentle-wave" x="48" y="0" class="opacity-25 fill-[var(--page-bg)]" style="animation-delay: -2s; animation-duration: 7s; will-change: transform;"></use>
                <use xlink:href="#gentle-wave" x="48" y="3" class="opacity-50 fill-[var(--page-bg)]" style="animation-delay: -3s; animation-duration: 10s; will-change: transform;"></use>
                <use xlink:href="#gentle-wave" x="48" y="5" class="opacity-75 fill-[var(--page-bg)]" style="animation-delay: -4s; animation-duration: 13s; will-change: transform;"></use>
                <use xlink:href="#gentle-wave" x="48" y="7" class="fill-[var(--page-bg)]" style="animation-delay: -5s; animation-duration: 20s; will-change: transform;"></use>
            </g>
        </svg>
    </div>
</div>

<!-- 主内容区域 -->
<div class="relative z-30" style="margin-top: calc(3.5rem + 60vh);">
    <div class="relative max-w-[var(--page-width)] mx-auto px-2 md:px-4">
        <!-- 移动端布局 - 单列（包含所有组件） -->
        <div class="block md:hidden">
            <!-- 移动端侧边栏组件 -->
            <div class="mb-4">
                <!-- 头像卡片 -->
                <div class="card-base p-3 mb-4">
                    <a aria-label="Go to About Page" href="<?php $this->options->siteUrl(); ?>about" class="group block relative mx-auto mt-1 mb-3 max-w-[12rem] overflow-hidden rounded-xl active:scale-95">
                        <div class="absolute transition pointer-events-none group-hover:bg-black/30 group-active:bg-black/50 w-full h-full z-50 flex items-center justify-center">
                            <svg width="1em" height="1em" class="transition opacity-0 scale-90 group-hover:scale-100 group-hover:opacity-100 text-white text-5xl" data-icon="fa7-regular:address-card">
                                <use href="#ai:fa7-regular:address-card"></use>
                            </svg>
                        </div>
                        <div class="mx-auto h-full overflow-hidden relative">
                            <div class="transition absolute inset-0 dark:bg-black/10 bg-opacity-50 pointer-events-none"></div>
                            <img src="<?php $this->options->themeUrl('assets/home/default-logo.png'); ?>" alt="Profile Image" class="w-full h-full object-cover" loading="lazy">
                        </div>
                    </a>
                    <div class="px-2">
                        <div class="font-bold text-xl text-center mb-1 dark:text-neutral-50 transition">
                            <?php $this->options->title(); ?>
                        </div>
                        <div class="h-1 w-5 bg-[var(--primary)] mx-auto rounded-full mb-2 transition"></div>
                        <div class="text-center text-neutral-400 mb-2.5 transition">
                            <span class="typewriter inline-block" data-text='["世界很大，你要去走走"]' data-speed="80" data-delete-speed="50" data-pause-time="2000"></span>
                        </div>
                    </div>
                </div>
                
                <!-- 移动端公告 -->
                <div class="card-base pb-4 mb-4">
                    <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                        通知
                    </div>
                    <div class="px-4">
                        <div class="text-neutral-600 dark:text-neutral-300 leading-relaxed mb-3">
                            欢迎来到我的博客！这是一个示例公告。
                        </div>
                    </div>
                </div>
                
                
                <div class="card-base pb-4 mb-4">
                    <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                        分类
                    </div>
                    <div class="px-4 flex flex-wrap gap-2">
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while($category->next()): ?>
                        <a href="<?php $category->permalink(); ?>" class="btn-regular h-8 text-sm px-3 rounded-lg flex items-center justify-between">
                            <span><?php $category->name(); ?></span>
                            <span class="ml-2 text-[var(--primary)]"><?php $category->count(); ?></span>
                        </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            
            <!-- 移动端底部标签云 -->
                <div class="card-base pb-4 mb-4">
                    <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                        标签
                    </div>
                    <div class="px-4">
                        <div class="flex gap-2 flex-wrap">
                            <?php $this->widget("Widget_Metas_Tag_Cloud", "sort=count&ignoreZeroCount=0&desc=1&limit=20")->to($tags); ?>
                            <?php while($tags->next()): ?>
                            <a href="<?php $tags->permalink(); ?>" class="btn-regular h-8 text-sm px-3 rounded-lg">
                                <?php $tags->name(); ?>
                            </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                
                <!-- 移动端底部分类 -->
                <div class="card-base pb-4 mb-4">
                    <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                        分类
                    </div>
                    <div class="px-4 flex flex-wrap gap-2">
                        <?php $this->widget("Widget_Metas_Category_List")->to($category); ?>
                        <?php while($category->next()): ?>
                        <a href="<?php $category->permalink(); ?>" class="btn-regular h-8 text-sm px-3 rounded-lg flex items-center justify-between">
                            <span><?php $category->name(); ?></span>
                            <span class="ml-2 text-[var(--primary)]"><?php $category->count(); ?></span>
                        </a>
                        <?php endwhile; ?>
                    </div>
                </div>
                
                <!-- 移动端底部友链 -->
                <?php 
                $homeFriends = get_friends_list($this->options);
                if (!empty($homeFriends)): 
                ?>
                <div class="card-base pb-4 mb-4">
                    <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                        <?php echo isset($this->options->friendsTitle) && $this->options->friendsTitle ? htmlspecialchars($this->options->friendsTitle) : "友链"; ?>
                    </div>
                    <div class="px-4">
                        <?php foreach(array_slice($homeFriends, 0, 6) as $f): ?>
                        <a href="<?php echo htmlspecialchars($f["url"]); ?>" target="_blank" class="flex items-center gap-2 mb-2 p-2 rounded-lg hover:bg-[var(--btn-plain-bg-hover)] transition group">
                            <img src="<?php echo htmlspecialchars($f["logo"] ?: $this->options->themeUrl("assets/home/default-logo.png")); ?>" class="w-8 h-8 rounded-lg object-cover flex-shrink-0" alt="<?php echo htmlspecialchars($f["name"]); ?>">
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium truncate group-hover:text-[var(--primary)]"><?php echo htmlspecialchars($f["name"]); ?></div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($this->options->friendsUrl)): ?>
                    <div class="px-4 mt-2 text-center">
                        <a href="<?php echo htmlspecialchars($this->options->friendsUrl); ?>" class="text-sm" style="color: var(--primary);">申请友链 &rarr;</a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <!-- 移动端主内容区 -->
            <div id="post-list-container-mobile" class="min-h-[200px]">
                <?php if ($this->have()): ?>
                    <?php while($this->next()): ?>
                        <article class="post-item card-base mb-4">
                            <?php if ($this->fields->cover): ?>
                            <div class="post-cover overflow-hidden rounded-t-lg">
                                <img src="<?php $this->fields->cover(); ?>" alt="Cover" class="w-full h-48 object-cover" loading="lazy">
                            </div>
                            <?php endif; ?>
                            
                            <div class="p-4">
                                <h2 class="text-xl font-bold mb-2">
                                    <a href="<?php $this->permalink(); ?>" class="link-enhance text-[var(--deep-text)] dark:text-[var(--btn-content)] hover:text-[var(--primary)]">
                                        <?php $this->title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="post-meta flex items-center gap-2 text-sm text-neutral-500 dark:text-neutral-400 mb-3">
                                    <time datetime="<?php $this->date('c'); ?>"><?php $this->date('Y-m-d'); ?></time>
                                    
                                    <span><?php $this->category(','); ?></span>
                                </div>
                                
                                <div class="post-excerpt text-neutral-600 dark:text-neutral-300 leading-relaxed mb-4">
                                    <?php $this->excerpt(150, '...'); ?>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <a href="<?php $this->permalink(); ?>" class="btn-gradient btn-gradient-sm">
                                        阅读更多
                                    </a>
                                    <div class="flex gap-1">
                                        <?php $this->tags('', true, ''); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    
                    <!-- 分页 -->
                    <div class="mt-6">
                        <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;', 3, '...'); ?>
                    </div>
                <?php else: ?>
                    <div class="card-base p-8 text-center">
                        <p class="text-neutral-500">暂无文章</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- 平板和桌面端布局 - 三列 -->
        <div class="hidden md:block">
            <div id="main-grid" class="grid grid-cols-1 md:grid-cols-[17.5rem_1fr] lg:grid-cols-[17.5rem_1fr_17.5rem] gap-4">
                <!-- 左侧边栏 -->
                <div id="sidebar" class="w-full">
                    <div class="flex flex-col w-full gap-4">
                        <!-- 头像卡片 -->
                        <div class="card-base p-3">
                            <a aria-label="About" href="<?php $this->options->siteUrl(); ?>about" class="group block relative mx-auto mt-1 mb-3 max-w-[12rem] overflow-hidden rounded-xl active:scale-95">
                                <div class="absolute transition pointer-events-none group-hover:bg-black/30 group-active:bg-black/50 w-full h-full z-50 flex items-center justify-center">
                                    <svg width="1em" height="1em" class="transition opacity-0 scale-90 group-hover:scale-100 group-hover:opacity-100 text-white text-5xl" data-icon="fa7-regular:address-card">
                                        <use href="#ai:fa7-regular:address-card"></use>
                                    </svg>
                                </div>
                                <div class="mx-auto h-full overflow-hidden relative">
                                    <div class="transition absolute inset-0 dark:bg-black/10 bg-opacity-50 pointer-events-none"></div>
                                    <img src="<?php $this->options->themeUrl('assets/home/default-logo.png'); ?>" alt="Profile" class="w-full h-full object-cover" loading="lazy">
                                </div>
                            </a>
                            <div class="px-2">
                                <div class="font-bold text-xl text-center mb-1 dark:text-neutral-50 transition">
                                    <?php $this->options->title(); ?>
                                </div>
                                <div class="h-1 w-5 bg-[var(--primary)] mx-auto rounded-full mb-2 transition"></div>
                                <div class="text-center text-neutral-400 mb-2.5 transition">
                                    <span class="typewriter inline-block" data-text='["世界很大，你要去走走"]'></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 桌面端公告 -->
                        <div class="card-base pb-4">
                            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                                通知
                            </div>
                            <div class="px-4">
                                <div class="text-neutral-600 dark:text-neutral-300 leading-relaxed mb-3">
                                    欢迎来到我的博客！这是一个示例公告。
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-base pb-4">
                            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                                分类
                            </div>
                            <div class="px-4 flex flex-wrap gap-2">
                                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                                <?php while($category->next()): ?>
                                <a href="<?php $category->permalink(); ?>" class="btn-regular h-8 text-sm px-3 rounded-lg flex items-center justify-between">
                                    <span><?php $category->name(); ?></span>
                                    <span class="ml-2 text-[var(--primary)]"><?php $category->count(); ?></span>
                                </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 桌面端主内容区 -->
                <div class="relative">
                    <div id="post-list-container" class="min-h-[200px]">
                        <?php if ($this->have()): ?>
                            <?php while($this->next()): ?>
                                <article class="post-item card-base mb-4">
                                    <?php if ($this->fields->cover): ?>
                                    <div class="post-cover overflow-hidden rounded-t-lg">
                                        <img src="<?php $this->fields->cover(); ?>" alt="Cover" class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105" loading="lazy">
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="p-4">
                                        <h2 class="text-xl font-bold mb-2">
                                            <a href="<?php $this->permalink(); ?>" class="link-enhance text-[var(--deep-text)] dark:text-[var(--btn-content)] hover:text-[var(--primary)]">
                                                <?php $this->title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="post-meta flex items-center gap-2 text-sm text-neutral-500 dark:text-neutral-400 mb-3">
                                            <time datetime="<?php $this->date('c'); ?>"><?php $this->date('Y-m-d'); ?></time>
                                            <span class="inline-block w-1 h-1 bg-neutral-300 dark:bg-neutral-600 rounded-full"></span>
                                            <span><?php $this->category(','); ?></span>
                                        </div>
                                        
                                        <div class="post-excerpt text-neutral-600 dark:text-neutral-300 leading-relaxed mb-4">
                                            <?php $this->excerpt(150, '...'); ?>
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <a href="<?php $this->permalink(); ?>" class="btn-gradient btn-gradient-sm">
                                                阅读更多
                                            </a>
                                            <div class="flex gap-1">
                                                <?php $this->tags('', true, ''); ?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            
                            <!-- 分页 -->
                            <div class="mt-6">
                                <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;', 3, '...'); ?>
                            </div>
                        <?php else: ?>
                            <div class="card-base p-8 text-center">
                                <p class="text-neutral-500">暂无文章</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- 右侧边栏 -->
                <div class="hidden lg:block">
                    <!-- 桌面端标签云 -->
                        <div class="card-base pb-4">
                            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                                标签
                            </div>
                            <div class="px-4">
                                <div class="flex gap-2 flex-wrap">
                                    <?php $this->widget("Widget_Metas_Tag_Cloud", "sort=count&ignoreZeroCount=0&desc=1&limit=30")->to($tags); ?>
                                    <?php while($tags->next()): ?>
                                    <a href="<?php $tags->permalink(); ?>" class="btn-regular h-8 text-sm px-3 rounded-lg">
                                        <?php $tags->name(); ?>
                                    </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 桌面端分类 -->
                        <div class="card-base pb-4">
                            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                                分类
                            </div>
                            <div class="px-4 flex flex-wrap gap-2">
                                <?php $this->widget("Widget_Metas_Category_List")->to($category); ?>
                                <?php while($category->next()): ?>
                                <a href="<?php $category->permalink(); ?>" class="btn-regular h-8 text-sm px-3 rounded-lg flex items-center justify-between">
                                    <span><?php $category->name(); ?></span>
                                    <span class="ml-2 text-[var(--primary)]"><?php $category->count(); ?></span>
                                </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        
                        <!-- 桌面端友链 -->
                        <?php 
                        $homeFriends = get_friends_list($this->options);
                        if (!empty($homeFriends)): 
                        ?>
                        <div class="card-base pb-4">
                            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 flex items-center before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                                <?php echo isset($this->options->friendsTitle) && $this->options->friendsTitle ? htmlspecialchars($this->options->friendsTitle) : "友链"; ?>
                            </div>
                            <div class="px-4">
                                <?php foreach(array_slice($homeFriends, 0, 8) as $f): ?>
                                <a href="<?php echo htmlspecialchars($f["url"]); ?>" target="_blank" class="flex items-center gap-2 mb-2 p-2 rounded-lg hover:bg-[var(--btn-plain-bg-hover)] transition group">
                                    <img src="<?php echo htmlspecialchars($f["logo"] ?: $this->options->themeUrl("assets/home/default-logo.png")); ?>" class="w-8 h-8 rounded-lg object-cover flex-shrink-0" alt="<?php echo htmlspecialchars($f["name"]); ?>">
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium truncate group-hover:text-[var(--primary)]"><?php echo htmlspecialchars($f["name"]); ?></div>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <?php if (!empty($this->options->friendsUrl)): ?>
                            <div class="px-4 mt-2 text-center">
                                <a href="<?php echo htmlspecialchars($this->options->friendsUrl); ?>" class="text-sm" style="color: var(--primary);">申请友链 &rarr;</a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 轮播脚本 -->
<script>
(function(){
    const carouselInterval = 5;
    const container = document.getElementById('banner-carousel');
    if (!container) return;

    const items = container.querySelectorAll('.carousel-item');
    if (items.length <= 1) return;

    let currentIndex = 0;

    function updateClasses() {
        items.forEach((item, index) => {
            if (index === currentIndex) {
                item.classList.remove('opacity-0', 'scale-110');
                item.classList.add('opacity-100', 'scale-100');
            } else {
                item.classList.remove('opacity-100', 'scale-100');
                item.classList.add('opacity-0', 'scale-110');
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % items.length;
        updateClasses();
    }

    // 初始化
    updateClasses();
    setInterval(nextSlide, carouselInterval * 1000);
})();
</script>

<?php $this->need('footer.php'); ?>
