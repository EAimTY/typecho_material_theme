<div class="col-md-3">

    <?php if(!empty($this->options->sidebar) && in_array('ShowSearchForm',$this->options->sidebar)): ?>
        <form method="post" action="">
            <div class="label-floating">
                <div class="input-group">
                    <input type="text" name="s" class="form-control" placeholder="搜索" />
                    <span class="input-group-btn btn-group-sm">
                        <button class="btn btn-primary btn-fab" value="" type="submit"><small><span class="glyphicon glyphicon-search" aria-hidden="true"></span></small></button>
                    </span>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <?php if(!empty($this->options->sidebar) && in_array('ShowPosts',$this->options->sidebar)): ?>
        <div class="panel panel-primary">
            <a class="panel-heading" onclick="$('.recent_posts_box').slideToggle()" href="javascript:;">
                <h3 class="panel-title">最新文章</h3>
            </a>
            <div class="recent_posts_box">
                <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<a href="{permalink}" class="item">{title}</a>'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($this->options->sidebar) && in_array('ShowComments',$this->options->sidebar)): ?>
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <div class="panel panel-primary">
            <a class="panel-heading" onclick="$('.comments_box').slideToggle()" href="javascript:;">
                <h3 class="panel-title">最新评论</h3>
            </a>
            <div class="comments_box">
                <?php while($comments->next()): ?>
                    <a href="<?php $comments->permalink(); ?>" class="item"><?php $comments->author(false); ?>: <?php $comments->excerpt(30, '...'); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($this->options->sidebar) && in_array('ShowTags',$this->options->sidebar)): ?>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=5')->to($tags); ?>
        <div class="panel panel-primary">
            <a class="panel-heading" onclick="$('.tags_box').slideToggle()" href="javascript:;">
                <h3 class="panel-title">标签</h3>
            </a>
            <div class="tags_box">
                <?php if($tags->have()): ?>
                    <?php while ($tags->next()): ?>
                        <a href="<?php $tags->permalink(); ?>" rel="tag" class="item size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?><span class="badge pull-right"> <?php $tags->count(); ?></span></a>
                    <?php endwhile; ?>
                <?php else: ?>
                    <a class="item"><?php _e('没有任何标签'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($this->options->sidebar) && in_array('ShowArchives',$this->options->sidebar)): ?>
        <div class="panel panel-primary">
            <a class="panel-heading" onclick="$('.article_cate_box').slideToggle()" href="javascript:;">
                <h3 class="panel-title">归档</h3>
            </a>
            <div class="article_cate_box">
                <?php $this->widget('Widget_Contents_Post_Date','type=month&format=F Y')
                ->parse('<a href="{permalink}" class="item">{date}</a>'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($this->options->sidebar) && in_array('ShowLinks',$this->options->sidebar)): ?>
        <div class="panel panel-primary">
            <a class="panel-heading" onclick="$('.link_box').slideToggle()" href="javascript:;">
                <h3 class="panel-title">友情链接</h3>
            </a>
            <div class="link_box">
                <?php $this->options->Links(); ?>
            </div>
        </div>
    <?php endif; ?>

    </div>
</div>
