<?php get_header(); ?>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

  <div id="content">
    <div class="container page-content">

      <?php the_breadcrumb(); ?>

      <?php the_content(); ?>

    </div>
  </div>

<?php } } ?>

<?php get_footer(); ?>
