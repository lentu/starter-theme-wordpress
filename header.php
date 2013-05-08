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

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/formvalidation.css" />
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

<?php if ($_SERVER['SERVER_PORT'] == '8888' || WP_DEBUG): ?>
  <?php #só includado em produção, permite usar cores no console.log e deixar compatível com todos os browsers, inclusive IE ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/log.js"></script>
<?php endif ?>

<script type="text/javascript">
var _gas = _gas || [];
_gas.push(['_setAccount', 'UA-XXXXXX-X']); 
_gas.push(['_setDomainName', 'yourdomain']); 
_gas.push(['_trackPageview']);
_gas.push(['_gasTrackForms']);
_gas.push(['_gasTrackOutboundLinks']);
_gas.push(['_gasTrackDownloads']);
_gas.push(['_gasTrackYoutube', {force: true}]);
_gas.push(['_gasTrackVimeo', {force: true}]);
_gas.push(['_gasTrackMailto']);

(function() {
var ga = document.createElement('script');
ga.type = 'text/javascript';
ga.async = true;
ga.src = "<?php echo get_template_directory_uri(); ?>/js/vendors/gas.min.js";
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(ga, s);
})();
</script> 



<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
  
<div id="root">