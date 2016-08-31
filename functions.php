<?php
function themeConfig($form) {
  $avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('头像及站点LOGO'), _t('输入侧边栏头像及站点LOGO图片链接，不显示则留空'));
  $form->addInput($avatar);
  $email = new Typecho_Widget_Helper_Form_Element_Text('email', NULL, NULL, _t('邮箱'), _t('输入联系邮箱，不显示则留空'));
  $form->addInput($email);
  $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('GitHub'), _t('输入GitHub用户名，不显示则留空'));
  $form->addInput($github);
  $twitter = new Typecho_Widget_Helper_Form_Element_Text('twitter', NULL, NULL, _t('Twitter'), _t('输入Twitter用户名，不显示则留空'));
  $form->addInput($twitter);
  $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('新浪微博'), _t('输入微博链接地址，不显示则留空'));
  $form->addInput($weibo);
  $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, NULL, _t('备案号'), _t('输入备案号，不显示则留空'));
  $form->addInput($miibeian);
  $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, NULL, _t('友情链接代码'), _t('按照 <i>&lt;a target="_blank" href="友情链接URL" class="mdl-navigation__link"&gt;&lt;div class="dropdown-item"&gt;友情链接名称&lt;/div&gt;&lt;/a&gt;</i> 的格式输入友情链接，一条一行'));
  $form->addInput($links);
  $drawer = new Typecho_Widget_Helper_Form_Element_Checkbox('drawer', array(
    'showrss' => _t('显示RSS'),
    'showposts' => _t('显示最新文章'),
    'showcomments' => _t('显示最新评论'),
    'showarchives' => _t('显示按月归档'),
    'showtags' => _t('显示常用标签'),
    'showlinks' => _t('显示友情链接'),
  ),
  array('showrss', 'showposts', 'showcomments', 'showarchives', 'showtags', 'showlinks'), _t('Drawer选项'));
  $form->addInput($drawer->multiMode());
}
