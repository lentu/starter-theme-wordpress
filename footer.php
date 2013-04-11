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

<?php wp_footer(); ?>
</body>
</html>