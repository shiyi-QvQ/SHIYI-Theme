<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
.page-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem 1rem 8rem;
}

/* 关于我专用卡片 - 仿 Mizuki 侧栏 */
.about-hero-card {
    background: #fff;
    border-radius: 2rem;
    padding: 4rem 2rem;
    text-align: center;
    box-shadow: 0 30px 60px rgba(0,0,0,0.06);
    margin-bottom: 3rem;
}

.dark .about-hero-card { background: #1a1c1e; }

.about-hero-avatar {
    width: 120px;
    height: 120px;
    border-radius: 2rem;
    margin: 0 auto 2rem;
    object-fit: cover;
    border: 5px solid #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.about-hero-name {
    font-size: 2.25rem;
    font-weight: 900;
    color: #1e293b;
    margin-bottom: 0.75rem;
}

.dark .about-hero-name { color: #f1f5f9; }

.about-hero-bio {
    font-size: 1.1rem;
    color: #94a3b8;
    max-width: 600px;
    margin: 0 auto 2.5rem;
    line-height: 1.7;
}

.about-hero-social {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.about-hero-social a {
    padding: 10px 24px;
    background: #f1f5f9;
    border-radius: 12px;
    font-size: 0.875rem;
    font-weight: 700;
    color: #475569;
    text-decoration: none;
    transition: all 0.2s;
}

.dark .about-hero-social a { background: #334155; color: #cbd5e1; }
.about-hero-social a:hover { background: var(--primary); color: white; transform: translateY(-3px); }

/* 通用页面样式 */
.page-article {
    background: #fff;
    border-radius: 2rem;
    padding: 4rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.04);
}

.dark .page-article { background: #1a1c1e; }

.page-title {
    font-size: 2.5rem;
    font-weight: 900;
    color: #1e293b;
    margin-bottom: 2.5rem;
    padding-bottom: 1.25rem;
    border-bottom: 3px solid var(--primary);
}

.dark .page-title { color: #f1f5f9; }

.page-content-rich {
    font-size: 1.0625rem;
    line-height: 2;
    color: #334155;
}

.dark .page-content-rich { color: #cbd5e1; }

.page-content-rich h1,
.page-content-rich h2,
.page-content-rich h3 {
    color: #1e293b;
    margin: 1.5em 0 0.5em;
    font-weight: 800;
}

.dark .page-content-rich h1,
.dark .page-content-rich h2,
.dark .page-content-rich h3 { color: #f1f5f9; }
</style>

<main class="page-container">
    <?php if ($this->slug == 'about'): ?>
    <!-- 关于我专用视图 -->
    <div class="about-hero-card">
        <?php if($this->options->aboutAvatar): ?>
            <img src="<?php $this->options->aboutAvatar(); ?>" class="about-hero-avatar" alt="Avatar">
        <?php endif; ?>
        
        <h1 class="about-hero-name"><?php $this->options->aboutName(); ?></h1>
        <p class="about-hero-bio"><?php $this->options->aboutBio(); ?></p>
        
        <div class="about-hero-social">
            <?php 
            $links = explode("\n", $this->options->socialLinks);
            foreach($links as $link) {
                $parts = explode(":", $link, 2);
                if(count($parts) == 2) {
                    echo '<a href="'.trim($parts[1]).'" target="_blank">'.trim($parts[0]).'</a>';
                }
            }
            ?>
        </div>
    </div>
    
    <div class="page-article">
        <div class="page-content-rich">
            <?php $this->content(); ?>
        </div>
    </div>
    
    <?php else: ?>
    <!-- 通用页面视图 -->
    <article class="page-article">
        <h1 class="page-title"><?php $this->title(); ?></h1>
        <div class="page-content-rich">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php endif; ?>

    <!-- 评论区 -->
    <div class="mt-12">
        <?php $this->need('comments.php'); ?>
    </div>
</main>

<?php $this->need('footer.php'); ?>
