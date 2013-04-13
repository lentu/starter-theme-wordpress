<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt_BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt_BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt_BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt_BR"> <!--<![endif]-->
<head>
<meta charset="utf-8">	
<title><?php wp_title(''); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php site_url(); ?>/feed/">
<meta name="viewport" content="initial-scale=1">

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/polyfills/html5.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/polyfills/selectivizr-min.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style.css" />
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/js/vendors/fancybox/jquery.fancybox.css" />


<?php get_stylesheets(); ?>

<?php global $css; ?>
<?php if (isset($css)): ?>
  <?php foreach ($css as $style) {
      if (file_exists(get_dir_path() . '/css/' . $style . '.css')){ ?>
      <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/<?php echo $style; ?>.css" />
      <?php }
    } ?>  
<?php endif; ?>


<script>
  var _gaq=[['_setAccount','UA-XXXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
  <!-- esta na functions.php essa função
  automaticamente é criada uma tabela (se não existir) com o prefixo definido no wp-config.php e o parâmetro passado como string
  já existe validação de email e de duplicidade na functions também
  mensagens de erro printadas em modal, adapte se precisar
   -->
  <?php wp_mailing('mailing'); ?>
  
<div id="root">