<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div>
<!-- .site-content --> 
<footer id="colophon" class="site-footer" role="contentinfo"> 
<div class="site-info"> 
Powered by <a href="http://typecho.org">Typecho)))</a>. <?php timer_stop(true)?>. <?php echo uptime()?>. 
</div>
<!-- .site-info --> 
</footer>
<!-- .site-footer --> 
</div>
<!-- .site --> 
<script type='text/javascript'>
/* <![CDATA[ */
var screenReaderText = {"expand":"<span class=\"screen-reader-text\">\u5c55\u5f00\u5b50\u83dc\u5355<\/span>","collapse":"<span class=\"screen-reader-text\">\u6298\u53e0\u5b50\u83dc\u5355<\/span>"};
/* ]]> */
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('public/twentyfifteen.js')?>"></script>
<script type="text/javascript" id="custom-scripts">
<?php echo $this->options->scripts;?>
</script>
<?php $this->footer(); ?>
</body>
</html>