<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('functions.php'); ?>
<?php $this->need('header.php'); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<section class="error-404 not-found">
<header class="page-header">
<h1 class="page-title">什么都没找到呢</h1>
</header><!-- .page-header -->

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
</section><!-- .error-404 -->

</main><!-- .site-main -->
</div><!-- .content-area -->

<?php $this->need('footer.php'); ?>
