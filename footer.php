          <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer--left-section footer-item">
              <ul class="mdl-mini-footer__link-list">
                <?php if ($this->options->email): ?>
                  <a href="mailto:<?php $this->options->email(); ?>" target="_blank"><button id="email" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">email</i></button></a>
                  <div class="mdl-tooltip mdl-tooltip--top" for="email">给 <i><?php $this->options->email(); ?></i> 发送邮件</div>
                <?php endif; ?>
                <?php if ($this->options->github): ?>
                  <a href="https://github.com/<?php $this->options->github(); ?>" target="_blank"><button id="github" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">github</i></button></a>
                  <div class="mdl-tooltip mdl-tooltip--top" for="github">GitHub</div>
                <?php endif; ?>
                <?php if ($this->options->twitter): ?>
                  <a href="https://twitter.com/<?php $this->options->twitter(); ?>" target="_blank"><button id="twitter" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">twitter</i></button></a>
                  <div class="mdl-tooltip mdl-tooltip--top" for="twitter">Twitter</div>
                <?php endif; ?>
                <?php if ($this->options->weibo): ?>
                  <a href="<?php $this->options->weibo(); ?>" target="_blank"><button id="weibo" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">weibo</i></button></a>
                  <div class="mdl-tooltip mdl-tooltip--top" for="weibo">新浪微博</div>
                <?php endif; ?>
              </ul>
            </div>
            <div class="copyright footer-item">Copyright &copy; <?php echo date("Y"); ?> <?php $this->options->title(); ?></div>
            <div class="mdl-mini-footer--right-section footer-item">
              <div class="blog-info">
                <div>Powered by <a href="http://typecho.org" target="_blank">Typecho)))</a></div>
                <div>Optimized by <a href="https://www.eaimty.xyz/" target="_blank">EAimTY</a></div>
                <?php if ($this->options->miibeian): ?>
                  <div><a href="http://www.miibeian.gov.cn/" target="_blank"><?php $this->options->miibeian(); ?></a></div>
                <?php endif; ?>
              </div>
            </div>
            <div class="scrolltop">
              <a href="#top">
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp">
                  <i class="material-icons top mdl-color-text--white">scrolltop</i>
                </button>
              </a>
            </div>
          </footer>
        </div>
      </main>
    </div>
  </body>
  <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/material.min.js'); ?>"></script>
</html>
