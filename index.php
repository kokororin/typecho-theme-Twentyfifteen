<?php
/**
 * twentyfifteen
 * 
 * @package Typecho twentyfifteen Theme 
 * @author Kokororin
 * @version 1.0
 * @link https://return.moe
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div id="primary" class="content-area"> 
<main id="main" class="site-main" role="main"> 
<?php while($this->next()): ?>
<?php $this->need('list.php')?>
<!-- #post-## --> 
<?php endwhile; ?>

<nav class="navigation pagination" role="navigation">
<h2 class="screen-reader-text">文章导航</h2>
<div class="nav-links">
	<?php $this->pageNav('上一页', '下一页','2','...', array('wrapTag' => 'div','itemTag' => '')) ?>
</div>
	</nav>
     
     
     </main>
     <!-- .site-main --> 
    </div>
    <!-- .content-area --> 

<?php $this->need('footer.php'); ?>
