<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html class="no-js">
<head> 
<meta charset="<?php $this->options->charset(); ?>"/>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Cache-Control" content="no-siteapp">
<!--  Site Tool Validate-->
<meta name="baidu-site-verification" content="MLPPUvZCyW" />
<meta name="google-site-verification" content="bp5lGDibZiR7j_IKtSV7O2C6QBwitwzZRjth5DVDnrw" />
<!--  Android 5 Chrome Color-->
<meta name="theme-color" content="#EE6E73">
<meta name="msapplication-TileColor" content="#EE6E73">
<!--[if lt IE 9]>
<script src="<?php $this->options->themeUrl('public/html5.js')?>"></script>
<![endif]--> 
<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script> 
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="stylesheet" id="twentyfifteen-fonts-css" href="https://fonts.geekzu.org/css?family=Inconsolata%3A400%2C700&amp;subset=latin%2Clatin-ext" type="text/css" media="all" />
<link rel="stylesheet" id="genericons-css" href="<?php $this->options->themeUrl('public/genericons.css')?>" type="text/css" media="all" /> 
<link rel="stylesheet" id="twentyfifteen-style-css" href="<?php $this->options->themeUrl('public/twentyfifteen.css')?>" type="text/css" media="all" />
<link rel="stylesheet" id="twentyfifteen-style-custom-css" href="<?php $this->options->themeUrl('public/custom.css')?>" type="text/css" media="all" />
<!--[if lt IE 9]>
<link rel="stylesheet" id="twentyfifteen-ie-css" href="<?php $this->options->themeUrl('public/ie.css')?>" type="text/css" media="all" />
<![endif]--> 
<!--[if lt IE 8]>
<link rel="stylesheet" id="twentyfifteen-ie7-css" href="<?php $this->options->themeUrl('public/ie7.css')?>" type="text/css" media="all" />
<![endif]--> 
<!--  Icons-->
<link rel="shortcut icon" href="<?php $this->options->siteUrl('favicon.ico')?>?ver=150920" />
<link rel="icon" href="<?php $this->options->siteUrl('favicon.ico')?>?ver=150920" />
<?php $this->header('generator=&template='); ?>

</head>

<body>
<div id="page" class="hfeed site"> 
<a class="skip-link screen-reader-text" href="#content">跳至内容</a> 
<div id="sidebar" class="sidebar"> 
<header id="masthead" class="site-header" role="banner"> 
<div class="site-branding"> 
<h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>" rel="home"><?php $this->options->title() ?></a></h1> 
<p class="site-description"><?php $this->options->description() ?></p> 
<button class="secondary-toggle">﻿菜单和挂件</button> 
</div>
<!-- .site-branding --> 
</header>
<!-- .site-header --> 
<div id="secondary" class="secondary"> 
<div id="widget-area" class="widget-area" role="complementary"> 
<aside class="widget widget_search">
<form role="search" method="get" class="search-form" action="<?php $this->options->siteUrl(); ?>"> 
<label> <span class="screen-reader-text">搜索:</span> <input type="search" class="search-field" placeholder="搜索 …" value="" name="s" title="搜索:" /> </label> 
<input type="submit" class="search-submit screen-reader-text" value="搜索" /> 
</form>
</aside>


<aside class="widget widget_hitokoto">
<!--<h2 class="widget-title">一言</h2> -->
<div class="widget-plain">
<a id="hitokoto" href="javascript:;">少女祈祷中...</a>
</div>
</aside>

<aside class="widget widget_pages">
<h2 class="widget-title">页面</h2> 
<ul>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>
</ul> 
</aside>

<aside class="widget widget_links">
<h2 class="widget-title">友情链接</h2> 
<div class="widget-plain">
<?php links('links');?>
</div>
</aside>

<?php /*
<aside class="widget widget_categories">
<h2 class="widget-title">分类目录</h2> 
<ul>
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while($category->next()): ?>
<li><a href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a></li>
<?php endwhile; ?>
</ul> 
</aside>
*/?>

<?php /*
<aside class="widget widget_recent_comments">
<h2 class="widget-title">近期评论</h2>
<ul id="recentcomments">
<?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
<?php while($comments->next()): ?>
<li class="recentcomments"><span class="comment-author-link"><?php $comments->author(); ?></span>发表在《<a href="<?php $comments->permalink(); ?>"><?php $comments->title(); ?></a>》</li>
<?php endwhile; ?>
</ul>
</aside>
*/?>


</div>
<!-- .widget-area --> 
</div>
<!-- .secondary --> 
</div>
<!-- .sidebar --> 
<div id="content" class="site-content">
