    <!--
    <script src="//cdn.bootcss.com/bootstrap-material-design/0.3.0/js/material.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap-material-design/0.3.0/js/ripples.min.js"></script>
    -->

    </div>
    </div>
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <div class="pull-left copyright">Copyright &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?></div>
                <ul class="footer-nav pull-right">
                    <li>Powered by <a target="_blank" href="http://typecho.org/" rel="nofollow">Typecho)))</a></li>
                    <li>Optimized by <a target="_blank" href="http://hanc.cc">HanSon</a></li>

                    <?php if($this->options->miibeian) : ?>
                    <li><a target="_blank" href="http://www.miibeian.gov.cn" rel="nofollow"><?php echo $this->options->miibeian; ?></a></li>
                    <?php endif; ?>

                    <?php if ( !empty($this->options->footer) && in_array('ShowLoadTime', $this->options->footer) ) : ?>
                    <li>加载耗时：<?php echo timer_stop(), ' s'; ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </footer>

    <?php $this->footer(); ?>
    <button class="material-scrolltop" type="button"><span></span></button>
    <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/material.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/ripples.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/material-scrolltop.min.js'); ?>"></script>
    <script>
        $('body').materialScrollTop();
    </script>
    <script>
        $.material.init();
    </script>
    </body>
</html>
