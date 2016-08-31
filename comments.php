    <?php function threadedComments($comments, $options) {
      $commentClass = '';
      if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
          $commentClass .= ' comment-by-author';
        } else {
          $commentClass .= ' comment-by-user';
        }
      }
      $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>
      <div id="li-<?php $comments->theId(); ?>" class="mdl-card mdl-shadow--4dp<?php if ($comments->levels > 0) { echo ' comment-child'; $comments->levelsAlt(' comment-level-odd', ' comment-level-even'); } else { echo ' comment-parent'; } $comments->alt(' comment-odd', ' comment-even'); echo $commentClass; ?>">
        <div id="<?php $comments->theId(); ?>">
          <div class="mdl-card__title">
            <div class="comment-author">
              <?php $comments->gravatar('40', ''); ?>
              <cite class="fn"><?php $comments->author(); ?></cite>
            </div>
          </div>
          <div class="date mdl-color-text--grey"><?php $comments->date('Y-m-d H:i'); ?></div>
          <div class="mdl-card__supporting-text">
            <?php $comments->content(); ?>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <?php $comments->reply('<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"><div class="mdl-color-text--white">回复</div></div>'); ?>
          </div>
        </div>
        <?php if ($comments->children) { ?>
          <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
    <div id="comments">
      <?php $this->comments()->to($comments); ?>
      <div class="post-chip">
        <span class="mdl-chip">
          <span class="mdl-chip__contact"><i class="material-icons chip-icon">comment</i></span>
          <span class="mdl-chip__text"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>
        </span>
      </div>
      <?php if ($comments->have()): ?>
        <?php $comments->listComments(); ?>
      <?php endif; ?>
      <?php if($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title">
            <h4>添加新评论</h4>
          </div>
          <div class="mdl-card__supporting-text">
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
              <?php if($this->user->hasLogin()): ?>
                <span class="mdl-chip">
                  <span class="mdl-chip__text">登录身份: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp;&nbsp;<a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出</a></span>
                </span>
              <?php else: ?>
                <div class="comment-column">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="author" id="author" class="mdl-textfield__input" type="text" value="<?php $this->remember('author'); ?>" />
                    <label class="mdl-textfield__label" for="author">称呼</label>
                  </div>
                </div>
                <div class="comment-column">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="mail" id="mail" class="mdl-textfield__input" type="email" value="<?php $this->remember('mail'); ?>" />
                    <label class="mdl-textfield__label" for="mail">Email</label>
                  </div>
                </div>
                <div class="comment-column">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="url" id="url" class="mdl-textfield__input" type="url" value="<?php $this->remember('url'); ?>" />
                    <label class="mdl-textfield__label" for="url">网站</label>
                  </div>
                </div>
              <?php endif; ?>
              <?php $comments->cancelReply('<span class="mdl-chip"><span class="mdl-chip__text">取消回复</span></span>'); ?>
              <div class="comment-column">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <textarea name="text" id="textarea" class="mdl-textfield__input" type="text" rows="8"><?php $this->remember('text'); ?></textarea>
                  <label class="mdl-textfield__label" for="textarea">内容</label>
                </div>
              </div>
              <div class="comment-column">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color-text--white">提交评论</button>
              </div>
            </form>
          </div>
        </div>
      <?php else: ?>
        <div class="post-chip">
          <span class="mdl-chip">
            <span class="mdl-chip__contact"><i class="material-icons chip-icon">comment</i></span>
            <span class="mdl-chip__text">评论已关闭</span>
          </span>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
