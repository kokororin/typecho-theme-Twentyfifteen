<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
/**
 * navigation
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>

<div id="primary" class="content-area"> 
<main id="main" class="site-main" role="main"> 
<article class="hentry"> 
<header class="entry-header"> 
<h1 class="entry-title"><?php $this->title()?></h1> 
</header>
<!-- .entry-header --> 
<div class="entry-content"> 
<h3>标签云</h3>
<?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
<?php if($tags->have()): ?>
    <?php while ($tags->next()): ?>
    <a class="tag-cloud" href="<?php $tags->permalink();?>" title="<?php $tags->split(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99); ?>次"><?php $tags->name(); ?></a>
    <?php endwhile; ?>
<?php endif; ?>
<h3>分类目录</h3>
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while ($category->next()): ?>
<a class="tag-cloud" href="<?php $category->permalink();?>"><?php $category->name(); ?></a>
<?php endwhile; ?>
<h3>归档文章</h3>
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year = 0; $mon = 0; $i = 0; $j = 0;   
    $output = '<div id="archives">';   
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y = $year; $m = $mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        if ($year != $year_tmp) {   
            $year = $year_tmp;   
            $output .= '<span class="al_year" style="font-size:150%;font-weight:bold;">'. $year .' 年</span><ul class="al_mon_list">'; //输出年份   
        }   
        if ($mon != $mon_tmp) {   
            $mon = $mon_tmp;   
            $output .= '<span class="al_mon" style="font-weight:bold">'. $mon .' 月</span><ul class="al_post_list">'; //输出月份   
        }   
        $output .= '<li>'.date('d日: ',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a> <em>('. $archives->commentsNum.')</em></li>'; //输出文章日期和标题   
    endwhile;   
    $output .= '</ul></ul></div>';   
    echo $output;   
?>  
</div>
</article>

<?php $this->need('comments.php'); ?>

</main>
<!-- .site-main --> 
</div>
<!-- .content-area --> 

<?php $this->need('footer.php'); ?>