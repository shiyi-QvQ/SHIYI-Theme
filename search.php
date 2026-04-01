<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main>
    <?php if ($this->have()): ?>
    <?php while($this->next()): ?>
    <article>
        <h2><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
    </article>
    <?php endwhile; ?>
    <?php else: ?>
    <p>无搜索结果</p>
    <?php endif; ?>
</main>

<?php $this->need('footer.php'); ?>
