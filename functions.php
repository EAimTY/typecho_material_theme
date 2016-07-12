<?php

function themeConfig($form) {
    $slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', NULL, NULL, _t('首页标语文字'), _t('输入首页标语文字，不显示则留空'));
    $form->addInput($slogan);

    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL, NULL, _t('标题栏与书签栏图标'), _t('输入标题栏与书签栏图标URL地址，不显示则留空'));
    $form->addInput($siteIcon);

    $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, NULL, _t('备案号'), _t('输入备案号，不显示则留空'));
    $form->addInput($miibeian);

    $GitHubName = new Typecho_Widget_Helper_Form_Element_Text('GitHubName', NULL, NULL, _t('GitHub账号'), _t('输入GitHub用户名，不显示则留空'));
    $form->addInput($GitHubName);

    $weibolink = new Typecho_Widget_Helper_Form_Element_Text('weibolink', NULL, NULL, _t('微博链接'), _t('输入微博链接地址，不显示则留空'));
    $form->addInput($weibolink);

    $Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, _t('<a target="_blank" href="https://www.eaimty.xyz/" class="item">EAimTY的博客</a>'), _t('友情链接代码'), _t('按照 <i>&lt;a target="_blank" href="<b>友情链接URL</b>" class="item"&gt;<b>友情链接名称</b>&lt;/a&gt;</i> 的格式输入友情链接，一条一行'));
    $form->addInput($Links);

    $header = new Typecho_Widget_Helper_Form_Element_Checkbox('header', array(
        'ShowLogin' => _t('显示登录入口'),
        'ShowRSS' => _t('显示RSS下拉菜单')
        ),
    array('ShowLogin','ShowRSS'), _t('顶栏选项'));
    $form->addInput($header->multiMode());

    $sidebar = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebar', array(
        'ShowPosts' => _t('显示最新文章'),
        'ShowComments' => _t('显示最新评论'),
        'ShowTags' => _t('显示标签'),
        'ShowArchives' => _t('显示归档'),
        'ShowLinks' => _t('显示友情链接'),
        ),
    array('ShowPosts','ShowComments','ShowTags','ShowArchives','ShowLinks'), _t('侧边栏选项'));
    $form->addInput($sidebar->multiMode());

    $footer = new Typecho_Widget_Helper_Form_Element_Checkbox('footer', array(
        'ShowLoadTime' => _t('页脚显示加载耗时')
        ),
    array('ShowLoadTime'), _t('页脚选项'));
    $form->addInput($footer->multiMode());

}

function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format( $timetotal, $precision );
    if ( $display )
    echo $r;
    return $r;
}
