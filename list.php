<article class="hentry"> 
<header class="entry-header"> 
<h2 class="entry-title"><a href="<?php $this->permalink() ?>" rel="bookmark"><?php $this->title() ?></a></h2> 
</header>
<!-- .entry-header --> 
<div class="entry-content"> 
<?php $this->content()?>
</div>
<!-- .entry-content --> 
<footer class="entry-footer"> 
<?php if($this->is('index')): ?>
<?php $this->sticky();?>
<?php endif;?>
<span class="posted-on"><span class="screen-reader-text">发布于 </span><a href="<?php $this->permalink() ?>" rel="bookmark"><time class="entry-date published" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年m月d日'); ?></time></a></span>
<span class="comments-link"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('发表评论', '1 条评论', '%d 条评论'); ?></a></span> 
</footer>
<!-- .entry-footer --> 
</article>