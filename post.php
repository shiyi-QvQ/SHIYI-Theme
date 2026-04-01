<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
:root { --c-warm: #fdebdf; --c-warm-dark: #f5dcc8; }
.tag-warm { background: var(--c-warm) !important; color: #8b7355 !important; border: none !important; font-size: 10px !important; font-weight: 700 !important; }

.post-layout-main { margin-top: 8rem; padding: 0 1rem 8rem; max-width: var(--page-width); margin-left: auto; margin-right: auto; }

.post-content-card { background: #fff; border-radius: 2rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.03); }
.dark .post-content-card { background: #1a1c1e; border: 1px solid #334155; }

.post-hero { width: 100%; height: 26rem; object-fit: cover; display: block; }

.post-text-body { padding: 4rem; line-height: 2; font-size: 1.0625rem; color: #334155; }
.dark .post-text-body { color: #cbd5e1; }

.wm-mini-card { background: var(--c-warm); border-radius: 1.25rem; padding: 1.5rem 2rem; margin: 2rem 4rem; text-align: center; position: relative; overflow: hidden; }
.wm-mini-circle { position: absolute; top: 50%; right: -20px; transform: translateY(-50%) rotate(-10deg); width: 140px; height: 140px; border: 1.5px solid var(--primary); border-radius: 50%; opacity: 0.08; }

.cp-card-box { background: var(--c-warm); border-radius: 1.25rem; padding: 1.5rem 2rem; margin: 2rem 0; font-size: 0.85rem; color: #8b7355; line-height: 1.6; }

.post-nav-links { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin: 2rem 0; }
.nav-link-item { padding: 1.25rem; background: #fff; border-radius: 1rem; transition: 0.2s; text-decoration: none; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
.nav-link-item:hover { background: var(--c-warm); transform: translateY(-2px); }
.dark .nav-link-item { background: #0f172a; }

.sidebar-post { position: sticky; top: 5rem; }

@media (max-width: 1024px) {
    .post-text-body { padding: 2rem; }
    .wm-mini-card { margin: 2rem 1rem; }
}
</style>

<div class="post-layout-main">
    <div class="grid grid-cols-1 md:grid-cols-[17.5rem_1fr] lg:grid-cols-[17.5rem_1fr_17.5rem] gap-6">
        
        <!-- 左侧栏 -->
        <aside class="hidden md:flex flex-col gap-6">
            <div class="sidebar-post flex flex-col gap-6">
                <div class="card-base p-4 text-center" style="border-radius:1.5rem;">
                    <?php $av = isset($this->options->aboutAvatar) ? $this->options->aboutAvatar : null; ?>
                    <img src="<?php echo $av ? $av : $this->options->themeUrl('assets/home/default-logo.png'); ?>" class="w-20 h-20 rounded-2xl mx-auto mb-3 object-cover">
                    <div class="font-bold text-lg" style="color:#8b7355;"><?php echo isset($this->options->aboutName) ? $this->options->aboutName : 'Admin'; ?></div>
                    <div class="text-[10px] text-neutral-400 mt-1"><?php echo isset($this->options->aboutBio) ? $this->options->aboutBio : ''; ?></div>
                </div>
                <div class="card-base p-4" style="border-radius:1.5rem;">
                    <div class="font-bold text-xs mb-2 flex items-center gap-2"><span class="w-1 h-3 bg-[var(--primary)] rounded"></span>NOTICE</div>
                    <div class="text-[11px] text-neutral-500"><?php echo isset($this->options->announcement) ? $this->options->announcement : ''; ?></div>
                </div>
            </div>
        </aside>

        <!-- 中间正文 -->
        <main>
            <article class="post-content-card">
                <?php 
                $coverUrl = '';
                if (function_exists('get_post_cover')) {
                    $coverUrl = get_post_cover($this->content);
                }
                if ($coverUrl): 
                ?>
                <img src="<?php echo $coverUrl; ?>" class="post-hero">
                <?php endif; ?>

                <div class="post-text-body">
                    <div class="flex gap-2 mb-6">
                        <span class="tag-warm px-2 py-1 rounded-lg"><?php $this->category(','); ?></span>
                        <span class="text-[10px] font-bold text-neutral-400 mt-1">
                            <?php echo function_exists('art_count') ? art_count($this->cid) : '0'; ?> WORDS
                        </span>
                    </div>
                    <h1 class="text-4xl font-black mb-8 text-slate-800 dark:text-white"><?php $this->title(); ?></h1>
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <?php $this->content(); ?>
                    </div>
                </div>

                <div class="wm-mini-card">
                    <div class="wm-mini-circle"></div>
                    <div class="relative z-10 text-xs font-bold text-amber-900/50 uppercase tracking-widest">
                        <?php echo isset($this->options->watermarkText) ? $this->options->watermarkText : 'Mizuki'; ?> · Authorized Content
                    </div>
                </div>
            </article>

            <div class="cp-card-box">
                <div class="font-bold mb-1 opacity-80">COPYRIGHT NOTICE</div>
                <?php echo isset($this->options->copyrightText) ? $this->options->copyrightText : ''; ?>
                <div class="mt-2 text-[10px] opacity-60">URL: <?php $this->permalink(); ?></div>
            </div>

            <nav class="post-nav-links">
                <?php $this->thePrev('%s','<div class="nav-link-item opacity-50"><span class="text-[10px] font-bold block opacity-40">PREV</span><span class="text-sm font-bold">EndOfLine</span></div>'); ?>
                <?php $this->theNext('%s','<div class="nav-link-item opacity-50 text-right"><span class="text-[10px] font-bold block opacity-40">下一篇</span><span class="text-sm font-bold">结尾</span></div>'); ?>
            </nav>

            <div class="mt-8">
                <?php $this->need('comments.php'); ?>
            </div>
        </main>

        <!-- 右侧栏 -->
        <aside class="hidden lg:flex flex-col gap-6">
            <div class="sidebar-post flex flex-col gap-6">
                <div class="card-base p-4" style="border-radius:1.5rem;">
                    <div class="font-bold text-xs mb-3 uppercase tracking-widest text-neutral-400">Categories</div>
                    <div class="flex flex-col gap-1">
                        <?php $this->widget('Widget_Metas_Category_List')->to($pcats); while($pcats->next()): ?>
                        <a href="<?php $pcats->permalink(); ?>" class="tag-warm px-3 py-2 rounded-lg flex justify-between"><span><?php $pcats->name(); ?></span><span><?php $pcats->count(); ?></span></a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-base p-4" style="border-radius:1.5rem;">
                    <div class="font-bold text-xs mb-3 uppercase tracking-widest text-neutral-400">Tags</div>
                    <div class="flex flex-wrap gap-2">
                        <?php $this->widget('Widget_Metas_Tag_Cloud', 'limit=15')->to($ptags); while($ptags->next()): ?>
                        <a href="<?php $ptags->permalink(); ?>" class="tag-warm px-2 py-1 rounded-md">#<?php $ptags->name(); ?></a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

<?php $this->need('footer.php'); ?>
