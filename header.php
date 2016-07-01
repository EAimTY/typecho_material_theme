<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
        <meta charset="<?php $this->options->charset(); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="theme-color" content="#009688" />
        <?php $this->header(); ?>
        <?php if($this->options->siteIcon): ?>
            <link rel="Shortcut Icon" href="<?php $this->options->siteIcon(); ?>" />
            <link rel="Bootmark" href="<?php $this->options->siteIcon(); ?>" />
        <?php endif; ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/material-scrolltop.min.css'); ?>" />
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/material.min.css'); ?>" />
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/ripples.min.css'); ?>" />
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/customs.min.css'); ?>" />
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/roboto.min.css'); ?>" />
    </head>

    <header>
        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li<?php if($this->is('index')): ?> class="active"<?php endif; ?>>
                            <a href="<?php $this->options->siteUrl(); ?>"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <?php $this->options->title() ?></a>
                        </li>
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                            <?php while($category->next()): ?>
                                <?php if(count($category->children)):?>
                                    <li class="dropdown">
                                        <a href="<?php $category->permalink(); ?>" data-target="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <?php echo $category->name; ?><span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo $category->permalink(); ?>"><?php echo $category->name; ?></a></li>
                                            <?php foreach($category->children as $k=>$v): ?>
                                            <li><a href="<?php echo $v['permalink']; ?>"><?php echo $v['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <?php if($category->levels == 0): ?>
                                        <li<?php if ($this->is('category', $category->slug)): ?> class="active"<?php endif; ?> style="<?php print_r($category->children); ?>">
                                            <a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>">
                                                <?php $category->name(); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>

                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                            <?php while($pages->next()): ?>
                                <li<?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if($this->options->GitHubName): ?>
                            <li><a href="https://github.com/<?php $this->options->GitHubName(); ?>" target="_blank">GitHub</a></li>
                        <?php endif; ?>
                        <?php if($this->options->weibolink): ?>
                            <li><a href="<?php $this->options->weibolink(); ?>" target="_blank">微博</a></li>
                        <?php endif; ?>
                        <?php if(!empty($this->options->header) && in_array('ShowRSS',$this->options->header)): ?>
                            <li class="dropdown">
                                <a data-target="#" class="dropdown-toggle" data-toggle="dropdown">RSS<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a target="_blank" href="<?php $this->options->feedUrl(); ?>">文章RSS</a></li>
                                    <li><a target="_blank" href="<?php $this->options->commentsFeedUrl(); ?>">评论RSS</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty($this->options->header) && in_array('ShowLogin',$this->options->header)): ?>
                            <?php if($this->user->hasLogin()): ?>
                                <li><a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a></li>
                                <li><a href="<?php $this->options->logoutUrl(); ?>">退出</a></li>
                            <?php else: ?>
                                <li><a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
