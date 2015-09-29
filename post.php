<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="primary" class="content-area"> 
<main id="main" class="site-main" role="main"> 
<article class="hentry"> 
<header class="entry-header"> 
<h1 class="entry-title"><?php $this->title()?></h1> 
</header>
<!-- .entry-header --> 
<div class="entry-content"> 
<?php $this->content()?>
</div>
<!-- .entry-content --> 
<?php if($this->is('post')):?>
<footer class="entry-footer"> 
<span class="posted-on"><span class="screen-reader-text">发布于 </span><a href="<?php $this->permalink() ?>" rel="bookmark"><time class="entry-date published updated" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年m月d日'); ?></time></a></span>
<span class="cat-links"><span class="screen-reader-text">分类 </span><?php $this->category(','); ?></span>
<span class="tags-links"><span class="screen-reader-text">标签 </span><?php $this->tags('、', true, 'none'); ?></span> 
</footer>
<?php endif;?>
<!-- .entry-footer --> 
</article>
<!-- #post-## --> 
     
<?php $this->need('comments.php')?>
<!-- .comments-area --> 

<?php if($this->is('post')):?>
<nav class="navigation post-navigation" role="navigation"> 
<h2 class="screen-reader-text">文章导航</h2> 
<div class="nav-links">
<?php near_post('prev',$this);?>
<?php near_post('next',$this);?>
</div> 
</nav> 
<?php endif;?>

</main>
<!-- .site-main --> 
</div>
<!-- .content-area --> 

<?php $this->need('footer.php'); ?>
