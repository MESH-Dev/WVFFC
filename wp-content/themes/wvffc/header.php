<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="google-site-verification" content="bvmae0G9g3NTExAASSP_wScc_b2sly9vUBUJBmDc3nU" />

  <title><?php wp_title(''); ?> | <?php bloginfo('name') ?></title>
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<header>
  <div class="container main-nav">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div id="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/WVFFC_Logo.png" />
        </div>
      </a>
      <div id="mainNav">
        <?php if(has_nav_menu('main_nav')){
            $defaults = array(
            	'theme_location'  => 'main_nav',
            	'menu'            => 'main_nav',
            	'container'       => false,
            	'container_class' => '',
            	'container_id'    => '',
            	'menu_class'      => 'menu',
            	'menu_id'         => '',
            	'echo'            => true,
            	'fallback_cb'     => 'wp_page_menu',
            	'before'          => '',
            	'after'           => '',
            	'link_before'     => '',
            	'link_after'      => '',
            	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            	'depth'           => 0,
            	'walker'          => ''
            ); wp_nav_menu( $defaults );
          }else{
            echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
          } ?>
          <div id="search">
            <i class="fa fa-search"></i>
          </div>
          <div id="search-box">
              <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
              <div class="search-box-input">
                <input type="text" placeholder="Search" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
              </div>
              <div class="search-box-button">
                <input type="submit" id="searchsubmit" value="Go »" class="btn" />
              </div>
              </form>
          </div>
      </div>
      <div id="donate">
        <span><a href="http://ktdgu.exnhm.servertrust.com" target="_blank">Donate</a></span>
        <!-- https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TTG6V6TWXJVV4 -->
      </div>
    </div>

</header>
