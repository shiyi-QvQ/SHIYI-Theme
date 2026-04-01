<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php require_once __DIR__ . '/functions.php'; ?>
<?php $this->need('header.php'); ?>

<style>
:root { --c-warm: #fdebdf; --c-warm-dark: #f5dcc8; }
.archive-wrap { margin-top: 8rem; padding: 0 1rem 8rem; max-width: var(--page-width); margin-left: auto; margin-right: auto; }
.archive-year-head { font-size: 2rem; font-weight: 900; color: #8b7355; margin: 3rem 0 1.5rem; display: flex; align-items: center; gap: 1rem; }
.archive-year-head::after { content: ''; flex: 1; height: 2px; background: var(--c-warm); border-radius: 2px; }
.archive-card { background: #fff; border-radius: 1.25rem; padding: 1.25rem 1.5rem; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 1.5rem; transition: 0.2s; box-shadow: 0 2px 8px rgba(0,0,0,0.03); text-decoration: none; }
.archive-card:hover { transform: translateX(8px); background: var(--c-warm); }
.dark .archive-card { background: #1a1c1e; }
.archive-date { font-size: 0.8rem; font-weight: 700; color: #8b7355; min-width: 4rem; opacity: 0.7; }
.archive-title { font-size: 1rem; font-weight: 700; color: #334155; flex: 1; }
.dark .archive-title { color: #cbd5e1; }
.archive-cat { font-size: 0.7rem; padding: 3px 10px; background: var(--c-warm); border-radius: 8px; color: #8b7355; font-weight: 700; white-space: nowrap; }
.sidebar-sticky { position: sticky; top: 5rem; }
</style>

<div class="archive-wrap">
    <div class="grid grid-cols-1 md:grid-cols-[17.5rem_1fr] lg:grid-cols-[17.5rem_1fr_17.5rem] gap-6">

        <!-- 左侧栏 -->
        <aside class="hidden md:flex flex-col gap-6">
            <div class="sidebar-sticky flex flex-col gap-6">
                <div class="card-base p-4 text-center" style="border-radius:1.5rem;">
                    <img src="<?php echo $this->options->aboutAvatar ? $this->options->aboutAvatar : $this->options->themeUrl('assets/home/default-logo.png'); ?>" class="w-20 h-20 rounded-2xl mx-auto mb-3 object-cover shadow-sm">
                    <div class="font-bold text-lg" style="color:#8b7355;"><?php $this->options->aboutName(); ?></div>
                    <div class="text-[10px] text-neutral-400 mt-1"><?php $this->options->aboutBio(); ?></div>
                </div>
            </div>
        </aside>

        <!-- 中间归档列表 -->
        <main>
            <h1 class="text-5xl font-black mb-10 text-slate-800 dark:text-white uppercase tracking-tighter">Archives</h1>
            
            <?php
            $year = 0;
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=100')->to($post);
            while($post->next()):
                $year_tmp = date('Y', $post->created);
                if ($year != $year_tmp) {
                    if ($year > 0) echo '</div>';
                    $year = $year_tmp;
                    echo '<h2 class="archive-year-head">'.$year.'</h2><div class="flex flex-col">';
                }
            ?>
            <a href="<?php $post->permalink(); ?>" class="archive-card">
                <span class="archive-date"><?php $post->date('m-d'); ?></span>
                <span class="archive-title"><?php $post->title(); ?></span>
                <span class="archive-cat"><?php $post->category(',', false); ?></span>
            </a>
            <?php endwhile; ?>
            <?php if ($year > 0) echo '</div>'; ?>
        </main>

        <!-- 右侧栏 -->
        <aside class="hidden lg:flex flex-col gap-6">
            <div class="sidebar-sticky flex flex-col gap-6">
                <div class="card-base p-4" style="border-radius:1.5rem;">
                    <div class="font-bold text-xs mb-3 uppercase tracking-widest text-neutral-400">Categories</div>
                    <div class="flex flex-col gap-1">
                        <?php $this->widget('Widget_Metas_Category_List')->to($cats); while($cats->next()): ?>
                        <a href="<?php $cats->permalink(); ?>" class="btn-warm px-3 py-2 rounded-lg text-xs flex justify-between" style="background:var(--c-warm)!important;color:#8b7355!important;font-weight:700!important;"><?php $cats->name(); ?><span><?php $cats->count(); ?></span></a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-base p-4" style="border-radius:1.5rem;">
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
