<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary" role="complementary">
    <section class="widget">
        <h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <section class="widget">
        <h3 class="widget-title"><?php _e('分类'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapTag=ul&wrapClass=widget-list'); ?>
        </ul>
    </section>
</div>
