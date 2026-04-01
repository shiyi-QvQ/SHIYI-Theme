<?php
/**
 * 404 页面
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main id="main-grid">
    <div class="error-404 card-base">
        <h2>404 - 页面未找到</h2>
        <p>抱歉，您访问的页面不存在。</p>
        <a href="<?php $this->options->siteUrl(); ?>" class="btn-back">返回首页</a>
    </div>
</main>

<?php $this->need('footer.php'); ?>
