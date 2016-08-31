<!DOCTYPE html>
<html>
  <head>
    <title><?php $this->archiveTitle(array(
      'category'  =>  _t('分类 %s 下的文章'),
      'search'    =>  _t('包含关键字 %s 的文章'),
      'tag'       =>  _t('标签 %s 下的文章'),
      'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/material.min.css'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.min.css'); ?>" />
    <?php if ($this->options->avatar): ?>
      <link rel="Shortcut Icon" href="<?php $this->options->avatar() ?>" />
      <link rel="Bootmark" href="<?php $this->options->avatar() ?>" />
    <?php endif; ?>
    <?php $this->header(); ?>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <a class="site-title" href="<?php $this->options->siteUrl(); ?>"><span class="mdl-layout-title mdl-color-text--white"><?php $this->options->title() ?></span></a>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <form method="post" action="">
                <input class="mdl-textfield__input submit" type="text" name="s" id="fixed-header-drawer-exp" />
              </form>
            </div>
          </div>
        </div>
      </header>
      <div class="mdl-layout__drawer drawer-background">
        <span class="mdl-layout-title billboard">
          <?php if ($this->options->avatar): ?>
            <a href="<?php $this->options->siteUrl(); ?>"><img alt="Avatar" class="drawer-avatar" src="<?php $this->options->avatar; ?>" /></a>
          <?php endif; ?>
          <a class="drawer-title" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        </span>
        <nav class="mdl-navigation">
          <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
          <?php while ($category->next()): ?>
            <a href="<?php $category->permalink(); ?>" class="mdl-navigation__link"><div class="material-icons drawer-icon">category</div><?php $category->name(); ?></a>
          <?php endwhile; ?>
          <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
          <?php while ($pages->next()): ?>
            <a href="<?php $pages->permalink(); ?>" class="mdl-navigation__link"><div class="material-icons drawer-icon">page</div><?php $pages->title(); ?></a>
          <?php endwhile; ?>
          <?php if ($this->options->drawer && in_array('showrss', $this->options->drawer)): ?>
            <hr />
            <a class="mdl-navigation__link" onclick="$('.rss_feed').slideToggle()" href="javascript:;"><div class="material-icons drawer-icon">rss</div>RSS<i class="material-icons">arrow_drop_down</i></a>
            <div class="dropdown-menu rss_feed">
              <a href="<?php $this->options->feedUrl(); ?>" class="mdl-navigation__link"><div class="dropdown-item">文章RSS</div></a>
              <a href="<?php $this->options->commentsFeedUrl(); ?>" class="mdl-navigation__link"><div class="dropdown-item">评论RSS</div></a>
            </div>
          <?php endif; ?>
          <?php if ($this->options->drawer && in_array('showposts', $this->options->drawer)): ?>
            <hr />
            <a class="mdl-navigation__link" onclick="$('.latest_posts').slideToggle()" href="javascript:;"><div class="material-icons drawer-icon">article</div>最新文章<i class="material-icons">arrow_drop_down</i></a>
            <div class="dropdown-menu latest_posts">
              <?php $this->widget('Widget_Contents_Post_Recent')->parse('<a href="{permalink}" class="mdl-navigation__link"><div class="dropdown-item">{title}</div></a>'); ?>
            </div>
          <?php endif; ?>
          <?php if ($this->options->drawer && in_array('showcomments', $this->options->drawer)): ?>
            <hr />
            <a class="mdl-navigation__link" onclick="$('.latest_comments').slideToggle()" href="javascript:;"><div class="material-icons drawer-icon">comment</div>最新评论<i class="material-icons">arrow_drop_down</i></a>
            <div class="dropdown-menu latest_comments">
              <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
              <?php while ($comments->next()): ?>
                <a href="<?php $comments->permalink(); ?>" class="mdl-navigation__link"><div class="dropdown-item"><?php $comments->author(false); ?>: <?php $comments->excerpt(20, '...'); ?></div></a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <?php if ($this->options->drawer && in_array('showarchives', $this->options->drawer)): ?>
            <hr />
            <a class="mdl-navigation__link" onclick="$('.archives').slideToggle()" href="javascript:;"><div class="material-icons drawer-icon">archive</div>按月归档<i class="material-icons">arrow_drop_down</i></a>
            <div class="dropdown-menu archives">
              <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<a href="{permalink}" class="mdl-navigation__link"><div class="dropdown-item">{date}</div></a>'); ?>
            </div>
          <?php endif; ?>
          <?php if ($this->options->drawer && in_array('showtags', $this->options->drawer)): ?>
            <hr />
            <a class="mdl-navigation__link" onclick="$('.tags_box').slideToggle()" href="javascript:;"><div class="material-icons drawer-icon">tag</div>常用标签<i class="material-icons">arrow_drop_down</i></a>
            <div class="dropdown-menu tags_box">
              <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=5')->to($tags); ?>
              <?php if ($tags->have()): ?>
                <?php while ($tags->next()): ?>
                  <a href="<?php $tags->permalink(); ?>" class="mdl-navigation__link" title="<?php $tags->count(); ?> 个话题"><div class="dropdown-item"><?php $tags->name(); ?><span class="mdl-badge" data-badge="<?php $tags->count(); ?>"></span></div></a>
                <?php endwhile; ?>
              <?php else: ?>
                <a class="mdl-navigation__link"><div class="dropdown-item">没有任何标签</div></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ($this->options->drawer && in_array('showlinks', $this->options->drawer)): ?>
            <hr />
            <a class="mdl-navigation__link" onclick="$('.links').slideToggle()" href="javascript:;"><div class="material-icons drawer-icon">link</div>友情链接<i class="material-icons">arrow_drop_down</i></a>
            <div class="dropdown-menu links">
              <?php $this->options->links(); ?>
            </div>
          <?php endif; ?>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div id="top">
