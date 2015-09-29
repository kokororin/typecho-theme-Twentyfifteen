<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
  //$depth = $comments->levels + 1;
?>
<li id="<?php $comments->theId(); ?>" class="comment"> 
<article id="div-<?php $comments->theId(); ?>" class="comment-body"> 
<footer class="comment-meta"> 
<div class="comment-author vcard"> 
<img alt="" src="<?php gravatar_url($comments->mail,56)?>" class="avatar avatar-56 photo" height="56" width="56" /> 
<b class="fn"><?php $comments->author(); ?></b>
<span class="says">说道：</span> 
</div>
<!-- .comment-author --> 
<div class="comment-metadata"> 
<a href="<?php $comments->permalink(); ?>"> <time datetime="<?php $comments->date('c')?>"> <?php $comments->date('Y年m月d日 H:i')?> </time> </a> 
</div>
<!-- .comment-metadata --> 
</footer>
<!-- .comment-meta --> 
<div class="comment-content"> 
<?php $comments->content()?>
</div>
<!-- .comment-content --> 
<div class="reply">
<?php $comments->reply()?>
</div> 
</article>
<!-- .comment-body --> 
<?php if ($comments->children):?>
<ol class="children">
<?php $comments->threadedComments($options); ?>
</ol>
<?php endif;?>
<!-- .children --> 
</li>

<?php } ?>

<div id="comments" class="comments-area"> 
<h2 class="comments-title"> <?php $this->commentsNum( '《' .$this->title .'》有0个想法', '《' .$this->title .'》有1个想法', '《' .$this->title .'》有%d个想法'); ?> </h2> 
<ol class="comment-list"> 
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<?php $comments->listComments(array('before' => '', 'after' => '')); ?>

<?php if (intval($this->commentsNum / $this->options->commentsListSize) > 1):?>
<nav class="navigation pagination " role="navigation">
<h2 class="screen-reader-text">文章导航</h2>
<div class="nav-links">
<?php $comments->pageNav('上一页', '下一页','2','...', array('wrapTag' => 'div','itemTag' => '')) ?>
</div>
</nav>
<?php endif;?>
<?php endif; // have_comments() ?>
</ol>
<!-- .comment-list --> 
<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="comment-respond"> 
<h3 id="reply-title" class="comment-reply-title">发表评论 <small><?php $comments->cancelReply(); ?></small></h3> 
<form action="<?php $this->commentUrl() ?>" method="post" id="commentform" class="comment-form" novalidate=""> 
<?php if($this->user->hasLogin()): ?>
<p class="logged-in-as">以<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>的身份登录。<a href="<?php $this->options->logoutUrl(); ?>" title="登出此帐户">登出？</a></p>
<?php elseif($this->remember('author',true) != '' && $this->remember('mail',true) != ''):?>
<p class="logged-in-as">欢迎回来：<?php $this->remember('author'); ?> <a id="edit-author" href="javascript:;">编辑 &raquo;</a></p>
<div id="author-info" style="display:none;">
<?php else:?>
<div id="author-info">
<?php endif;?>
<?php if(!$this->user->hasLogin()): ?>
<p class="comment-notes">
<span id="email-notes">电子邮件地址不会被公开。</span>
 必填项已用<span class="required">*</span>标注
</p> 

<p class="comment-form-author">
<label for="author">姓名 <span class="required">*</span></label> 
<input id="author" name="author" type="text" value="<?php $this->remember('author'); ?>" size="30" aria-required="true" required="required" />
</p> 

<p class="comment-form-email">
<label for="email">电子邮件 <span class="required">*</span></label> 
<input id="mail" name="mail" type="email" value="<?php $this->remember('mail'); ?>" size="30" aria-describedby="email-notes" aria-required="true" required="required" />
</p> 

<p class="comment-form-url">
<label for="url">站点</label> 
<input id="url" name="url" type="url" value="<?php $this->remember('url'); ?>" size="30" />
</p> 

</div><!-- end of author-info -->
<?php endif;?>
<p class="comment-form-comment">
<label for="comment">评论</label> 
<textarea id="text" name="text" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" required="required" placeholder="说点什么吧OAQ"></textarea>
</p> 

<p class="form-submit">
<input name="submit" type="submit" id="submit" class="submit" value="发表评论" /> 
</p> 

</form> 
</div>
<!-- #respond -->
<?php else: //allow_comment?>
<p class="no-comments">评论已关闭</p>
<?php endif;?>
</div>
