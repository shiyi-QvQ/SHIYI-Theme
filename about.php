<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php require_once __DIR__ . '/functions.php'; ?>
<?php $this->need('header.php'); ?>

<style>
:root { --c-warm: #fdebdf; --c-warm-dark: #f5dcc8; }
.about-wrap { margin-top: 8rem; padding: 0 1rem 8rem; max-width: var(--page-width); margin-left: auto; margin-right: auto; }
.about-card { background: #fff; border-radius: 1.5rem; padding: 2rem; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
.dark .about-card { background: #1a1c1e; }
.about-avatar { width: 120px; height: 120px; border-radius: 1.5rem; object-fit: cover; margin: 0 auto 1.5rem; display: block; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
.about-name { font-size: 1.5rem; font-weight: 900; color: #8b7355; text-align: center; margin-bottom: 0.5rem; }
.about-bio { text-align: center; color: #666; font-size: 0.9rem; margin-bottom: 1rem; }
.about-section-title { font-size: 1.2rem; font-weight: 700; color: #8b7355; margin: 2rem 0 1rem; padding-bottom: 0.5rem; border-bottom: 2px solid var(--c-warm); }
.about-text { color: #555; line-height: 1.8; margin-bottom: 1rem; }
.dark .about-text { color: #ccc; }
.social-links { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1.5rem; }
.social-link { display: flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: var(--c-warm); border-radius: 2rem; color: #8b7355; text-decoration: none; font-weight: 700; transition: all 0.3s; }
.social-link:hover { background: var(--primary); color: #fff; transform: translateY(-2px); }
.sidebar-sticky { position: sticky; top: 5rem; }
</style>

<div class="about-wrap">
    <div class="grid grid-cols-1 md:grid-cols-[17.5rem_1fr] lg:grid-cols-[17.5rem_1fr_17.5rem] gap-6">

        <!-- 左侧栏 -->
        <aside class="hidden md:flex flex-col gap-6">
            <div class="sidebar-sticky flex flex-col gap-6">
                <div class="about-card text-center">
                    <img src="<?php echo isset($this->options->aboutAvatar) && $this->options->aboutAvatar ? $this->options->aboutAvatar : $this->options->themeUrl('assets/home/default-logo.png'); ?>" class="about-avatar" alt="Avatar">
                    <div class="about-name"><?php echo isset($this->options->aboutName) && $this->options->aboutName ? htmlspecialchars($this->options->aboutName) : '十一'; ?></div>
                    <div class="about-bio"><?php echo isset($this->options->aboutBio) && $this->options->aboutBio ? htmlspecialchars($this->options->aboutBio) : '这个人很懒，什么都没有写~'; ?></div>
                    
                    <?php if (!empty($this->options->githubUrl) || !empty($this->options->qqUrl) || !empty($this->options->bilibiliUrl)): ?>
                    <div class="social-links">
                        <?php if (!empty($this->options->githubUrl)): ?>
                        <a href="<?php echo htmlspecialchars($this->options->githubUrl); ?>" target="_blank" class="social-link">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            GitHub
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($this->options->qqUrl)): ?>
                        <a href="<?php echo htmlspecialchars($this->options->qqUrl); ?>" target="_blank" class="social-link">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-8c0-1.105-1.343-2-3-2s-3 .895-3 2 1.343 2 3 2 3-.895 3-2zm6 0c0-1.105-1.343-2-3-2s-3 .895-3 2 1.343 2 3 2 3-.895 3-2z"/></svg>
                            QQ
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($this->options->bilibiliUrl)): ?>
                        <a href="<?php echo htmlspecialchars($this->options->bilibiliUrl); ?>" target="_blank" class="social-link">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.813 4.653h.854c1.51.038 2.653 1.296 2.653 2.83v10.573c0 1.572-1.286 2.8-2.854 2.8H4.52c-1.612 0-2.854-1.228-2.854-2.8V7.483c0-1.534 1.144-2.792 2.653-2.83h1.506v1.706c0 .452.612.726 1.013.442l3.943-2.773c.335-.236.863-.058.863.345v1.303zM6.04 7.437v7.053l6.96-4.176 6.96 4.176V7.437l-6.96 4.903-6.96-4.903zm10.24 8.77c.893 0 1.627-.702 1.627-1.56 0-.882-.734-1.586-1.627-1.586-.868 0-1.627.704-1.627 1.586 0 .858.759 1.56 1.627 1.56zm-5.173 0c.868 0 1.627-.702 1.627-1.56 0-.882-.759-1.586-1.627-1.586-.893 0-1.627.704-1.627 1.586 0 .858.734 1.56 1.627 1.56z"/></svg>
                            Bilibili
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </aside>

        <!-- 中间关于内容 -->
        <main>
            <h1 class="text-5xl font-black mb-10 text-slate-800 dark:text-white uppercase tracking-tighter">About</h1>
            
            <div class="about-card">
                <h2 class="about-section-title">关于我</h2>
                <p class="about-text">欢迎来到我的个人网站！这是一个记录生活、分享技术的地方。</p>
                <p class="about-text">如果你觉得我的内容对你有帮助，欢迎交换友链~</p>
            </div>
            
            <div class="about-card">
                <h2 class="about-section-title">建站历程</h2>
                <p class="about-text">这个博客建于2024年，最初只是想记录一些学习笔记。</p>
                <p class="about-text">慢慢地，这里成为了我分享技术、记录生活的空间。</p>
            </div>
            
            <!-- 移动端社交链接 -->
            <div class="about-card md:hidden">
                <h2 class="about-section-title">联系方式</h2>
                <?php if (!empty($this->options->githubUrl) || !empty($this->options->qqUrl) || !empty($this->options->bilibiliUrl)): ?>
                <div class="social-links">
                    <?php if (!empty($this->options->githubUrl)): ?>
                    <a href="<?php echo htmlspecialchars($this->options->githubUrl); ?>" target="_blank" class="social-link">GitHub</a>
                    <?php endif; ?>
                    <?php if (!empty($this->options->qqUrl)): ?>
                    <a href="<?php echo htmlspecialchars($this->options->qqUrl); ?>" target="_blank" class="social-link">QQ</a>
                    <?php endif; ?>
                    <?php if (!empty($this->options->bilibiliUrl)): ?>
                    <a href="<?php echo htmlspecialchars($this->options->bilibiliUrl); ?>" target="_blank" class="social-link">Bilibili</a>
                    <?php endif; ?>
                </div>
                <?php else: ?>
                <p class="about-text text-center">暂无联系方式</p>
                <?php endif; ?>
            </div>
        </main>

        <!-- 右侧栏 -->
        <aside class="hidden lg:flex flex-col gap-6">
            <div class="sidebar-sticky flex flex-col gap-6">
                <div class="about-card">
                    <div class="font-bold text-xs mb-3 uppercase tracking-widest text-neutral-400">Categories</div>
                    <div class="flex flex-col gap-1">
                        <?php $this->widget('Widget_Metas_Category_List')->to($cats); while($cats->next()): ?>
                        <a href="<?php $cats->permalink(); ?>" class="btn-warm px-3 py-2 rounded-lg text-xs flex justify-between" style="background:var(--c-warm)!important;color:#8b7355!important;font-weight:700!important;"><?php $cats->name(); ?><span><?php $cats->count(); ?></span></a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="about-card">
                    <div class="font-bold text-xs mb-3 uppercase tracking-widest text-neutral-400">Tags</div>
                    <div class="flex flex-wrap gap-1">
                        <?php $this->widget('Widget_Metas_Tag_Cloud', 'limit=20')->to($tags); while($tags->next()): ?>
                        <a href="<?php $tags->permalink(); ?>" class="btn-warm px-2 py-1 rounded-md text-[10px]" style="background:var(--c-warm)!important;color:#8b7355!important;font-weight:700!important;">#<?php $tags->name(); ?></a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

<?php $this->need('footer.php'); ?>
