<?php get_header(); ?>

<section id="content">
  <div class="container cf">
    <div class="gutter cf">

      <section id="contentPrimary">
        <?php if(have_posts()){while(have_posts()){the_post(); ?>
          <?php the_content(); ?>
        <?php } } ?>
      </section>

      <section id="contentSecondary">
        <div class="gutter">
          <?php dynamic_sidebar('blog-sidebar'); ?>
        </div>
      </section>

    </div>
  </div>
</section>


<?php get_footer(); ?>
