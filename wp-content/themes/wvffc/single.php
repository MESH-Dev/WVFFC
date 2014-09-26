<?php get_header(); ?>

<div class="container resource-content">

<ul id="breadcrumbs">
  <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
  <li class="separator"> > </li>
  <li><a href="<?php echo get_bloginfo('url') ?>/resources">Free Library</a></li>
  <li class="separator"> > </li>
  <li><?php the_title(); ?></li>
</ul>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

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
