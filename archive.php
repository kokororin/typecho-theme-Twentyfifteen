<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<header class="page-header">
<h1 class="page-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h1>
</header>
<!-- .page-header -->   

<?php if ($this->have()): ?>
<?php while($this->next()): ?>
<?php $this->need('list.php')?>
<?php endwhile; ?>
<nav class="navigation pagination" role="navigation">
<h2 class="screen-reader-text">文章导航</h2>
<div class="nav-links">
<?php $this->pageNav('上一页', '下一页','2','...', array('wrapTag' => 'div','itemTag' => '')) ?></div>
</nav>
<?php else: ?>


<div class="page-content">
<p>这儿似乎什么都没有，试试搜索？</p>

<form role="search" method="get" class="search-form" action="<?php $this->options->siteUrl()?>">
<label>
<span class="screen-reader-text">搜索：</span>
<input type="search" class="search-field" placeholder="搜索&hellip;" value="" name="s" title="搜索：" />
</label>
<input type="submit" class="search-submit screen-reader-text" value="搜索" />
</form>

</div><!-- .page-content -->

<?php endif;?>


</main><!-- .site-main -->
</section>


	<?php $this->need('footer.php'); ?>
