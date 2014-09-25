<?php get_header(); ?>

<div class="container page-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   <div class="eight columns">
       <h1><?php the_title(); ?></h1>
       <?php the_excerpt(); ?>

   </div>

   <hr/>

<?php endwhile; ?>

</div><!-- End of Container -->

<?php get_footer(); ?>
