<script>
	var URL_BASE = "<?php echo get_template_directory_uri(); ?>/";
	var ROOT_URL = "<?php bloginfo('url'); ?>/index.php/";
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/vendors/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vendors/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/default.js"></script>

<?php global $js; ?>
<?php if (isset($js)): ?>
  <?php foreach ($js as $script) {
    if (file_exists(get_dir_path() . '/js/' . $script . '.js')){ ?>
        <script src="<?php bloginfo('template_directory'); ?>/js/<?php echo $script; ?>.js"></script>
        <?php 
    }
  } ?>
<?php endif ?>

<?php get_scripts(); ?>

<!--[if IE 6]>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
    <style>
     .chromeFrameInstallDefaultStyle {
       width: 800px;
       border: 0px;
       z-index:10000;
       top:400px;
     }
    </style>
    <script>
     window.attachEvent("onload", function() {
       CFInstall.check({
         mode: "inline", // the default
         node: "prompt"
       });
     });
    </script>
<![endif]-->

  <script type="text/javascript">
    window.___gcfg = {lang: 'pt-BR'};

    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>

  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  <!--  facebook -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=261547217237282";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


</body>
</html>