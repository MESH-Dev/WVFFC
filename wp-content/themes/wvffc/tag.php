<?php get_header(); ?>

<div class="container page-content">

  <div class="row">
    <div class="twelve columns">
      <h1>Tag: <?php single_tag_title(); ?></h1>
    </div>
  </div>

<?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>

  <div class="twelve columns">
      <h2><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>
      <div class="date"><?php the_date(); ?> &nbsp; <span class="green"><?php the_tags('Tags: ',' • ','<br />'); ?></span></div>
      <?php the_excerpt(); ?>

      <hr/>

  </div>

<?php endwhile; ?>

<?php } else { ?>

  <div class="eight columns">
      <p>No search results found!</p>
  </div>

<?php } ?>

</div><!-- End of Container -->

<?php get_footer(); ?>
