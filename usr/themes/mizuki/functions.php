<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    // 网站标题
    $bannerTitle = new Typecho_Widget_Helper_Form_Element_Text('bannerTitle', NULL, 'Mizuki', _t('Banner大标题'), _t('显示在轮播图上的大字'));
    $form->addInput($bannerTitle);
    
    // 轮播图配置
    $bannerImages = new Typecho_Widget_Helper_Form_Element_Text('bannerImages', NULL, '1,2,3,4,5,6', _t('轮播图配置'), _t('填写数字，用逗号分隔，如 1,2,3,4,5,6'));
    $form->addInput($bannerImages);
    
    // 打字机效果文字
    $typewriterText = new Typecho_Widget_Helper_Form_Element_Textarea('typewriterText', NULL, '["你好，欢迎来到我的博客","这里是我的精神角落","记录生活，分享技术"]', _t('打字机效果文字'), _t('JSON数组格式，每行一个文字'));
    $form->addInput($typewriterText);
    
    // 首页公告
    $announcement = new Typecho_Widget_Helper_Form_Element_Textarea('announcement', NULL, '', _t('首页公告内容'), _t('显示在首页的公告，支持HTML'));
    $form->addInput($announcement);
    
    // 每页文章数
    $pageSize = new Typecho_Widget_Helper_Form_Element_Text('pageSize', NULL, '10', _t('每页文章数'), _t('首页显示的文章数量'));
    $form->addInput($pageSize);
}
