<?php $this->need('header.php'); ?>

<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <div class=“breadcrumb”>
      <div class="post-chip">
        <span class="mdl-chip">
          <span class="mdl-chip__contact"><i class="material-icons chip-icon">location</i></span>
          <span class="mdl-chip__text">
            您正在查看:
            <?php $this->archiveTitle(array(
              'category'  =>  _t(' %s 分类下的文章'),
              'search'    =>  _t('包含关键字 %s 的文章'),
              'tag'       =>  _t('标签 %s 下的文章'),
              'author'    =>  _t('%s 发布的文章')
            ), '', ''); ?>
          </span>
        </span>
      </div>
    </div>
    <?php while($this->next()): ?>
      <div class="mdl-card mdl-shadow--4dp">
        <div class="mdl-card__title">
          <h3><a class="article-title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
        </div>
        <div class="date mdl-color-text--grey"><?php $this->date('F j, Y'); ?></div>
        <div class="mdl-card__supporting-text">
          <?php $this->content('<div class="read-more">继续阅读...</div>'); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <div class="pagenav prev-page">
    <?php $this->pageLink('<div class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect"><i class="material-icons">prev</i></div>'); ?>
  </div>
  <div class="pagenav next-page">
    <?php $this->pageLink('<div class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect"><i class="material-icons">next</i></div>','next'); ?>
  </div>
</div>

<?php $this->need('footer.php'); ?>
