	<!--
	<script src="//cdn.bootcss.com/bootstrap-material-design/0.3.0/js/material.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap-material-design/0.3.0/js/ripples.min.js"></script>
	-->
	</div>
	</div>
	<footer>
		<div class="footer-bottom">
			<div class="container">
				<div class="pull-left copyright">本站原创内容遵循<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" rel="nofollow">CC BY-NC-SA 4.0协议</a></div>
				<ul class="footer-nav pull-right">
					<li>Powered by <a href="http://typecho.org/" target="_blank" rel="nofollow">Typecho</a></li>
					<li>Theme by <a href="https://github.com/Hanccc/typecho-material-theme" target="_blank">Hanccc</a></li>

					<?php if($this->options->miibeian) : ?>
					<li><a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow"><?php echo $this->options->miibeian; ?></a></li>
					<?php endif; ?>
					<?php if ( !empty($this->options->misc) && in_array('ShowLoadTime', $this->options->misc) ) : ?>
					<li>加载耗时：<?php echo timer_stop(), ' s'; ?></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</footer>
	<?php $this->footer(); ?>

	<script src="<?php $this->options->themeUrl('js/jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/material.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/ripples.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/material-scrolltop.js'); ?>"></script>
	<script>
            $.material.init();
        </script>
        <button class="material-scrolltop" type="button"><span></span></button>
        <script>
            $('body').materialScrollTop();
        </script>
	</body>
</html>
