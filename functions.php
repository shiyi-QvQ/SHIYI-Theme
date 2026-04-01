<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    // 主题信息（只读）
    $info = new Typecho_Widget_Helper_Form_Element_Textarea('themeInfo', NULL, '主题名称：SHIYI主题\n作者：十一（228326485）\n简介：仿mizuki主题，后续更新更多内容', _t('主题信息'), _t('主题基本信息'));
    $form->addInput($info);

    // 基础
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon'), _t('URL'));
    $form->addInput($favicon);

    // 关于我
    $aboutAvatar = new Typecho_Widget_Helper_Form_Element_Text('aboutAvatar', NULL, NULL, _t('头像URL'));
    $form->addInput($aboutAvatar);
    $aboutName = new Typecho_Widget_Helper_Form_Element_Text('aboutName', NULL, '十一', _t('昵称'));
    $form->addInput($aboutName);
    $aboutBio = new Typecho_Widget_Helper_Form_Element_Textarea('aboutBio', NULL, '这个人很懒，什么都没有写~', _t('简介'));
    $form->addInput($aboutBio);

    // 社交图标链接
    $githubUrl = new Typecho_Widget_Helper_Form_Element_Text('githubUrl', NULL, '', _t('GitHub 链接'), _t('留空不显示'));
    $form->addInput($githubUrl);
    $qqUrl = new Typecho_Widget_Helper_Form_Element_Text('qqUrl', NULL, '', _t('QQ 链接'), _t('留空不显示'));
    $form->addInput($qqUrl);
    $bilibiliUrl = new Typecho_Widget_Helper_Form_Element_Text('bilibiliUrl', NULL, '', _t('Bilibili 链接'), _t('留空不显示'));
    $form->addInput($bilibiliUrl);

    // 首页/Banner
    $bannerTitle = new Typecho_Widget_Helper_Form_Element_Text('bannerTitle', NULL, NULL, _t('Banner标题'));
    $form->addInput($bannerTitle);
    $bannerSubtitle = new Typecho_Widget_Helper_Form_Element_Textarea('bannerSubtitle', NULL, '["你好，欢迎来到我的博客","这里是我的精神角落","记录生活，分享技术"]', _t('打字机JSON'));
    $form->addInput($bannerSubtitle);
    $announcement = new Typecho_Widget_Helper_Form_Element_Textarea('announcement', NULL, '欢迎访问！', _t('首页公告'));
    $form->addInput($announcement);

    // Banner链接（每行一个，对应1-6张轮播图）
    $bannerLinks = new Typecho_Widget_Helper_Form_Element_Textarea('bannerLinks', NULL, '', _t('Banner图片链接'), _t('每行一个，对应1-6张轮播图，格式：链接或 #（无链接）'));
    $form->addInput($bannerLinks);

    // 友链设置
    $friendsUrl = new Typecho_Widget_Helper_Form_Element_Text('friendsUrl', NULL, '', _t('申请友链跳转链接'), _t('填写申请友链的页面URL'));
    $form->addInput($friendsUrl);
    $friendsTitle = new Typecho_Widget_Helper_Form_Element_Text('friendsTitle', NULL, '友链', _t('友链显示标题'));
    $form->addInput($friendsTitle);
    $friendsList = new Typecho_Widget_Helper_Form_Element_Textarea('friendsList', NULL, '', _t('友链列表'), _t('每行一个，格式：图标URL|网站名称|链接|简介'));
    $form->addInput($friendsList);

    // 版权与水印
    $copyrightText = new Typecho_Widget_Helper_Form_Element_Textarea('copyrightText', NULL, '本文采用 CC BY-NC-SA 4.0 许可协议', _t('版权声明文字'));
    $form->addInput($copyrightText);
    $watermarkText = new Typecho_Widget_Helper_Form_Element_Text('watermarkText', NULL, 'Mizuki', _t('水印文字'));
    $form->addInput($watermarkText);
}

function art_count($cid){
    $db=Typecho_Db::get();
    $rs=$db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?',$cid)->limit(1));
    return mb_strlen($rs['text'] ?? '', 'UTF-8');
}

function get_post_cover($content) {
    preg_match_all('/<img.*?src="(.*?)".*?>/i', $content, $matches);
    return isset($matches[1][0]) ? $matches[1][0] : false;
}

function get_friends_list($options) {
    $friends = [];
    $list = isset($options->friendsList) ? trim($options->friendsList) : '';
    if (empty($list)) return $friends;
    
    $lines = explode("\n", $list);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line)) continue;
        $parts = explode('|', $line);
        if (count($parts) >= 3) {
            $friends[] = [
                'logo' => isset($parts[0]) ? trim($parts[0]) : '',
                'name' => isset($parts[1]) ? trim($parts[1]) : '',
                'url' => isset($parts[2]) ? trim($parts[2]) : '#',
                'description' => isset($parts[3]) ? trim($parts[3]) : ''
            ];
        }
    }
    return $friends;
}

function get_banner_links($options) {
    $links = [];
    $text = isset($options->bannerLinks) ? trim($options->bannerLinks) : '';
    if (empty($text)) return $links;
    
    $lines = explode("\n", $text);
    foreach ($lines as $i => $line) {
        $line = trim($line);
        if (!empty($line) && $line !== '#') {
            $links[$i + 1] = $line;
        }
    }
    return $links;
}
