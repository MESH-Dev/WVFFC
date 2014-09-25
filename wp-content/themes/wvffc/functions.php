<?php

  include_once('functions/footer-widgets.php');

  //enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
  function WPS_scripts() {
  	wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
  	wp_enqueue_style( 'wvffc-style', get_stylesheet_uri() );
    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

    wp_enqueue_script( 'wvffc-script', get_template_directory_uri().'/assets/prod/wvffc.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('typekit','//use.typekit.net/bde6gkq.js');

    wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/libs/font-awesome-4.1.0/css/font-awesome.min.css');
  }
  add_action( 'wp_enqueue_scripts', 'WPS_scripts' );

  function the_breadcrumb() {
      global $post;
      echo '<ul id="breadcrumbs">';
      if (!is_home()) {
          echo '<li><a href="';
          echo get_option('home');
          echo '">';
          echo 'Home';
          echo '</a></li><li class="separator"> / </li>';
          if (is_category() || is_single()) {
              echo '<li>';
              the_category(' </li><li class="separator"> / </li><li> ');
              if (is_single()) {
                  echo '</li><li class="separator"> / </li><li>';
                  the_title();
                  echo '</li>';
              }
          } elseif (is_page()) {
              if($post->post_parent){
                  $anc = get_post_ancestors( $post->ID );
                  $title = get_the_title();
                  foreach ( $anc as $ancestor ) {
                      $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                  }
                  echo $output;
                  echo '<li><strong title="'.$title.'"> '.$title.'</strong></li>';
              } else {
                  echo '<li><strong> '.get_the_title().'</strong></li>';
              }
          }
      }
      elseif (is_tag()) {single_tag_title();}
      elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
      elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
      elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
      elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
      elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
      elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
      echo '</ul>';
  };

  //theme supports
  add_theme_support('post-thumbnails');
  $defaults = array(
    'flex-height'   => true,
    'flex-width'    => true,
    'height'        => 100,
    'width'         => 200,
    'default-image' => get_template_directory_uri() . '/assets/img/logo.gif',
    'header-text'   => false
  );
  add_theme_support('custom-header', $defaults);
  add_theme_support('custom-background');
  add_theme_support('html5');
  add_theme_support('automatic-feed-links');

  //menus
  register_nav_menus(array(
  	'main_nav' => 'Header and breadcrumb trail heirarchy',
  	'social_nav' => 'Social menu used throughout'
  ));

  //widgets
  register_sidebar(array(
	   'name'          => __( 'Footer' ),
	   'id'            => 'footer-widgets',
	   'description'   => '',
     'class'         => '',
	   'before_widget' => '',
	   'after_widget'  => '',
	   'before_title'  => '',
	   'after_title'   => '' ));

  //editor style
  add_editor_style('assets/wp-admin/custom-editor-style.css');

  //login page style
  function WPS_loginCSS() {
	   echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/img/wp-login.css"/>';
  } add_action('login_head', 'WPS_loginCSS');

  //footer attribution
  function WPS_footer_admin () {
	   echo 'Theme developed by <a href="http://pateason.com">Pat Eason</a>.';
  } add_filter('admin_footer_text', 'WPS_footer_admin');

  function custom_excerpt_length( $length ) {
  	return 11;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

  function new_excerpt_more( $more ) {
  	// return '... <br/><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
    return '... <br/><a class="read-more" href="'. get_permalink( get_the_ID() ) . '"><img src="'.get_bloginfo("template_directory").'/assets/img/arrow_icon_blue.png" /></a>';
  }
  add_filter( 'excerpt_more', 'new_excerpt_more' );

  //disable code editors
  define('DISALLOW_FILE_EDIT', true);

?>
