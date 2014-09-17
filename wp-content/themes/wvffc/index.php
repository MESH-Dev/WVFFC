<?php get_header(); ?>

<?php if(have_posts()){while(have_posts()){the_post(); ?>
	<div class="post-entry">
    <div class="gutter">
      <h3><?php the_title(); ?></h3>
      <div class="post-meta">

      </div>
      <div class="post-excerpt">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>
<?php } } ?>

<?php get_footer(); ?>
