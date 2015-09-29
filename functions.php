<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

function themeInit($archive)
{
    timer_start();
    $archive->parameter->pageSize = 5;
    if ($archive->is('single')) {
        $archive->content = prettify_replace($archive->content);
        $archive->content = url_target_replace($archive->content);
    }
}

function themeConfig($form)
{
    $scripts = new Typecho_Widget_Helper_Form_Element_Textarea('scripts', null, null, _t('自定义Javascript'), _t('输入内容'));
    $form->addInput($scripts);
}

function body_class($archive)
{
    if ($archive->is('index')) {
        $class = 'home';
    }
    if ($archive->is('post')) {
        $class = 'single';
    }
    if ($archive->is('page')) {
        $class = 'page';
    }
    if ($archive->is('archive')) {
        $class = 'category';
    }
    echo $class;
}

function near_post($action, $archive)
{
    $db = Typecho_Db::get();
    if ($action == 'next') {
        $words = array('下一篇', '已经是最后一篇');
        $content = $db->fetchRow($db->select()
                ->from('table.contents')
                ->where('table.contents.created > ? AND table.contents.created < ?', $archive->created, Helper::options()->gmtTime)
                ->where('table.contents.status = ?', 'publish')
                ->where('table.contents.type = ?', $archive->type)
                ->where('table.contents.password IS NULL')
                ->order('table.contents.created', Typecho_Db::SORT_ASC)
                ->limit(1));
    } elseif ($action == 'prev') {
        $words = array('上一篇', '已经是第一篇');
        $content = $db->fetchRow($db->select()
                ->from('table.contents')
                ->where('table.contents.created < ?', $archive->created)
                ->where('table.contents.status = ?', 'publish')
                ->where('table.contents.type = ?', $archive->type)
                ->where('table.contents.password IS NULL')
                ->order('table.contents.created', Typecho_Db::SORT_DESC)
                ->limit(1));
    }
    if ($content) {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        echo '<div class="nav-' . $action . '"><a href="' . $content['permalink'] . '" rel="' . $action . '"><span class="meta-nav" aria-hidden="true">' . $words[0] . '</span><span class="screen-reader-text">' . $words[0] . '：</span><span class="post-title">' . $content['title'] . '</span></a></div>';
    } else {
        echo '';
    }
}

function prettify_replace($text)
{
    $replace = array('<pre>' => '<pre class="prettyprint linenums">');
    $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
}

function gravatar_url($mail, $size, $echo = true)
{
    $rating = Helper::options()->commentsAvatarRating;
    $Request = new Typecho_Request();
    $default = null;
    $url = Typecho_Common::gravatarUrl($mail, $size, $rating, $default, $Request->isSecure());
    if ($echo) {
        echo $url;
    } else {
        return $url;
    }
}

function url_target_replace($content)
{
    preg_match_all('/href="(.*?)"/', $content, $matches);
    if ($matches) {
        foreach ($matches[1] as $val) {
            if (strpos($val, Helper::options()->siteUrl) === false) {
                $content = str_replace("href=\"$val\"", "target=\"_blank\" href=\"" . $val . "\"", $content);
            }
        }
    }
    return $content;
}

function links($slug)
{
    $db = Typecho_Db::get();
    $Contents = Typecho_Widget::widget('Widget_Abstract_Contents');
    $value = $db->fetchRow($db->select()
            ->from('table.contents')
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.type = ?', 'page')
            ->where('table.contents.slug = ?', $slug)
            ->where('table.contents.password IS NULL')
            ->limit(1));
    $value = $Contents->filter($value);
    if (0 === strpos($value['text'], '<!--markdown-->')) {
        $value['isMarkdown'] = 0;
    } else {
        $value['isMarkdown'] = 1;
    }
    if ($value['isMarkdown'] == 1) {
        $text = substr($value['text'], 15);
        $text = $Contents->markdown($text);
    } else {
        $text = $Contents->autoP($value['text']);
    }

    $search = '/<ul>(.*?)<\/ul>/is';
    preg_match_all($search, $text, $matches);
    $result = '';
    foreach ($matches[1] as $v) {
        $result .= $v;
    }
    $result = str_replace('<li>', '', $result);
    $result = str_replace('</li>', '<br/>', $result);
    $result = rtrim($result, '<br/>');
    echo $result;
}

function timer_start()
{
    global $timestart;
    $mtime = explode(' ', microtime());
    $timestart = $mtime[1] + $mtime[0];
    return true;
}

function timer_stop($display = false, $precision = 3)
{
    global $timestart, $timeend;
    $mtime = explode(' ', microtime());
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format($timetotal, $precision);
    $r = 1000 * $r;
    if ($display) {
        echo $r . 'ms';
    }
    return $r;
}

function uptime()
{
    if (false === ($str = @file("/proc/uptime"))) {
        return false;
    }

    $str = explode(" ", implode("", $str));
    $str = trim($str[0]);
    $min = $str / 60;
    $hours = $min / 60;
    $days = floor($hours / 24);
    $hours = floor($hours - ($days * 24));
    $min = floor($min - ($days * 60 * 24) - ($hours * 60));
    if ($days !== 0) {
        $res['uptime'] = $days . "天";
    }

    if ($hours !== 0) {
        $res['uptime'] .= $hours . "小时";
    }

    $res['uptime'] .= $min . "分钟";
    return $res['uptime'];
}
