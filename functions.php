<?php
/**
* Define a constant path to our single template folder
*/

// This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // This theme uses post thumbnails
  add_theme_support( 'post-thumbnails' );

  if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
  if ( function_exists( 'add_image_size' ) ) {  
    add_image_size( 'post', 140, 140, true );
    add_image_size( 'equipe', 221, 297, true );
    add_image_size( 'thumb-video', 168, 116, true );
    add_image_size( 'publicacoes', 166, 800, false );
    }
    
function rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
    $content = '<p>' . get_the_post_thumbnail($post->ID) .
    '</p>' . get_the_content();
    }
    return $content;
}
/**
* Filter the single_template with our custom function
*/
remove_action('wp_head', 'wp_generator');
/**
* Single template function which will choose our template
*/

function content_navigation( $nav_id ) {
    global $wp_query;

    if ( function_exists( 'wp_paginate' ) ) {
        wp_paginate();
    }
    else {
        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo $nav_id; ?>">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
            </nav><!-- #nav-above -->
        <?php endif;
    }
}

function detect_mobile()
{
    $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
 
    $mobile_browser = '0';
 
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
        $mobile_browser++;
 
    if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))
        $mobile_browser++;
 
    if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
        $mobile_browser++;
 
    if(isset($_SERVER['HTTP_PROFILE']))
        $mobile_browser++;
 
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array(
                        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                        'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                        'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                        'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                        'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
                        'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                        'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                        'wapr','webc','winw','winw','xda','xda-'
                        );
 
    if(in_array($mobile_ua, $mobile_agents))
        $mobile_browser++;
 
    if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
        $mobile_browser++;
 
    // Pre-final check to reset everything if the user is on Windows
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
        $mobile_browser=0;
 
    // But WP7 is also Windows, with a slightly different characteristic
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
        $mobile_browser++;
 
    if($mobile_browser>0)
        return true;
    else
        return false;
}

function get_permalink_by_name($post_name) {
     global $post;
     global $wpdb;
     $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$post_name."'");
     return get_permalink($id);
}
function debug($value=''){
  echo '<pre style="background:yellow;">';
    print_r($value);
  echo '</pre>';
}

function truncate($text, $length, $ending = '...', $exact = true) {
    if (strlen($text) <= $length) {
        return $text;
    } else {
        $truncate = substr($text, 0, $length - strlen($ending));
        if (!$exact) {
             $spacepos = strrpos($truncate, ' ');
             if (isset($spacepos)) {
                  return substr($truncate, 0, $spacepos) . $ending;
             }
        }    
        return $truncate . $ending;
    }
}


function wordpressapi_comments($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>

  <li <?php comment_class(); ?> class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="comment-39">
    <div id="div-comment-39" class="comment-body">
      <div class="comment-top">
        <?php echo get_avatar($comment,$size='59',$default='<path_to_url>' ); ?>
        <p><?php comment_text() ?></p>
      </div>
      <div class="comment-bottom">
        Por <cite class="fn"><?php $user_name_str = substr(get_comment_author(),0, 20); ?><?php printf(__('<cite><b>%s</b></cite>'), $user_name_str) ?></cite> | <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>| <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link(__('(Edit)'),' | ','') ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
       <?php endif; ?>
  </li>
<?php }


function videos($canal = 'google')
{
    $feedURL = 'http://gdata.youtube.com/feeds/api/users/' . $canal . '/uploads';
    $sxml = simplexml_load_file($feedURL);
    $videos = null;
    foreach ($sxml->entry as $entry) :
        $video_id = end(explode('/', $entry->id));
        
        $media = $entry->children('http://search.yahoo.com/mrss/');
        // get title
        
        $attrs = $media->group->player->attributes();
        $watch = $attrs['url'];
        // get video thumbnail
        $attrs = $media->group->thumbnail[0]->attributes();
        $thumbnail = $attrs['url'];
        
        $videos[] = array(
            'id' => $video_id,
            'title' => $media->group->title,
            'description' => $media->group->description,
            'url' => $watch,
            'thumbnail' => $thumbnail
        );
    endforeach;
    return $videos;
}
function get_dir_path(){
  return dirname(__FILE__).'/';
}

function discover_section(){
  wp_reset_query();
  $pagename = get_query_var('pagename');
  $term = get_query_var('term');

  if (is_category()) {
    $pagename = strtolower(single_cat_title('', false));
    if (!file_exists(get_dir_path() . '/css/' . $pagename . '.css') && file_exists(get_dir_path() . '/css/blog.css')){
      $pagename = 'blog';
    }
  }
  if (is_single() || is_search() || is_tag()) {
    $pagename = 'blog';
  }
  if (is_attachment()) {
   $pagename = 'attachment'; 
  }
  if (is_front_page()) {
    $pagename = 'home';
  }
  return $pagename;
}

if (!is_admin()) {
  add_filter('show_admin_bar', '__return_false');
}



function create_table_mailing ($name) {
  global $wpdb;
  $table_name = $wpdb->prefix . $name; 
  $sql = "CREATE TABLE IF NOT EXISTS $table_name(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
  return $table_name;
}
function wp_mailing($table_sufix){
  $table_name = create_table_mailing($table_sufix);
  if (isset($_POST['email']) && !empty($_POST['email'])) {
    global $wpdb;
    if (validEmail($_POST['email'])) {
      $data['email'] = $_POST['email'];
      if (!verify_mail($_POST['email'], $table_name)) {
        $result = $wpdb->insert($table_name, $wpdb->escape($data));
        $mailingSuccess = "Cadastro efetuado com sucesso!";
        echo '<div class="message"><p class="mailing-message success"><strong>'. $mailingSuccess .'</strong></p></div>';
      }else{
        $mailingError = 'Email já cadastrado!';
        echo '<div class="message"><p class="mailing-message error"><strong>'. $mailingError .'</strong></p></div>';
      }
    }else{
      $mailingError = "Email inválido!";
      echo '<div class="message"><p class="mailing-message error"><strong>'. $mailingError .'</strong></p></div>';
    }
  }else{
    if (isset($_POST['email']) && $_POST['email'] == '') {
      $mailingError = "E-mail não pode ser vazio!";
      echo '<div class="message"><p class="mailing-message error"><strong>'. $mailingError .'</strong></p></div>';      
    }
  } 
}

function validEmail($email=null) {
  if( preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
      return true;
  } else {
      return false;
  }
}

function verify_mail($mail, $table_name){
    global $wpdb;   
    $myrows = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE email='" . $mail . "'", 'ARRAY_N');
    if (count($myrows) < 1) {
      return false;
    }else{
      return true;
    };
}


function get_scripts(){
  #pega automaticamente o js da view
  $pagename = discover_section();

  if (file_exists(get_dir_path() . '/js/' . $pagename . '.js')){ ?>
      <script src="<?php bloginfo('template_directory'); ?>/js/<?php echo $pagename; ?>.js"></script>
      <?php 
  }
}
function get_stylesheets(){
  #pega automaticamente o css da view
  
  $pagename = discover_section();
  
  if (file_exists(get_dir_path() . '/css/' . $pagename . '.css')){ ?>
      <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/<?php echo $pagename; ?>.css" /><?php 
  }
}
?>