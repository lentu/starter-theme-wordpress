<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt_BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt_BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt_BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt_BR"> <!--<![endif]-->
<head>
<?php define('BLOG_TEMPLATE', get_bloginfo('template_directory')) ?>
<?php define('BLOG_IMAGES', get_bloginfo('template_directory') . '/images') ?>
<?php define('BLOG_URL', get_bloginfo('url')) ?>
  
<meta charset="utf-8">  
<title><?php wp_title(''); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php site_url(); ?>/feed/">
<meta name="viewport" content="initial-scale=1">

<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/polyfills/html5.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/polyfills/selectivizr-min.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/formvalidation.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/js/vendors/fancybox/jquery.fancybox.css" />

<?php get_stylesheets(); ?>

<?php global $css; ?>
<?php if (isset($css)): ?>
  <?php foreach ($css as $style) {
      if ($style[0] == '/') {
        $filepath = get_dir_path() . $style . '.css';
        $fileURL = BLOG_TEMPLATE . $style . '.css';
      }else{
        $filepath = get_dir_path() . '/css/' . $style . '.css';
        $fileURL = BLOG_TEMPLATE . '/css/' . $style . '.css';
      }

      if (file_exists($filepath)){ ?>
        <link rel="stylesheet" media="all" href="<?php echo $fileURL; ?>" />
      <?php }
    } ?>  
<?php endif; ?>

<?php if ($_SERVER['SERVER_PORT'] == '8888' || WP_DEBUG): ?>
  <?php #só includado em produção, permite usar cores no console.log e deixar compatível com todos os browsers, inclusive IE ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/log.js"></script>
<?php endif ?>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXXXX-X', 'dominio.com.br');
  ga('send', 'pageview');
</script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  
  
<div id="root">