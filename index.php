<?php
/**
 * 这是基于<a href="https://github.com/google/material-design-lite">Google Material Design Lite</a>开发的Typecho模板
 *
 * @package Typecho Material Theme
 * @author EAimTY
 * @version 0.0.2
 * @link https://www.eaimty.com/
 */

  $this->need('header.php');
?>

<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
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
    <?php $this->pageLink('<div class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect"><i class="material-icons">keyboard_arrow_left</i></div>'); ?>
  </div>
  <div class="pagenav next-page">
    <?php $this->pageLink('<div class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect"><i class="material-icons">keyboard_arrow_right</i></div>','next'); ?>
  </div>
</div>

<?php $this->need('footer.php'); ?>
