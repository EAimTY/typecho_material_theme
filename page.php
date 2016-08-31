<?php $this->need('header.php'); ?>

<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <div class="mdl-card mdl-shadow--4dp article-card">
      <div class="mdl-card__title">
        <h3><a class="article-title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
      </div>
      <div class="date mdl-color-text--grey"><?php $this->date('F j, Y'); ?></div>
      <div class="mdl-card__supporting-text">
        <?php $this->content('<div class="read-more">继续阅读...</div>'); ?>
      </div>
    </div>

<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
