<?php get_header(); ?>

<div class="container page-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   <?php the_breadcrumb(); ?>

   <div class="eight columns">
       <h1><?php the_title(); ?></h1>
       <?php the_content(); ?>
   </div>

   <div class="four columns">
       <?php the_field('sidebar_content'); ?>
   </div>

<?php endwhile; ?>

</div><!-- End of Container -->

<?php get_footer(); ?>
