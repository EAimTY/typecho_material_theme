<?php

/**
 * Typecho Material Theme
 * 
 * @package Typecho Material Theme 
 * @author HanSon & EAimTY
 * @version 1.0.0
*/

$this->need('header.php');
?>

<section class="billboard">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="intro animate fadeIn">
					<h2><?php $this->options->slogan() ?></h2>
					<p class="lead"></p>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row">

		<div class="col-md-9">
		    <?php while($this->next()): ?>
		    <div class="panel panel-default">
			    <div class="panel-body">
			        <h3 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
			        <div class="post-meta">
			        	<span>时间：<?php $this->date('Y-m-d'); ?> | </span>
			        	<span>分类：<?php $this->category(','); ?></span>
			        </div>
			        <div class="post-content"><?php $this->excerpt(350, '...'); ?></div>
			    </div>
		    </div>
		    <?php endwhile; ?>
		    <?php $this->pageNav('<< 上一页', '下一页 >>'); ?>
		</div>

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
