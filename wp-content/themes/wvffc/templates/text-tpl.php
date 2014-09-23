 <?php /*
 * Template Name: Text
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <div class="container page-content">

    <?php the_breadcrumb(); ?>

    <div class="eight columns">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>

    <div class="four columns">
        <?php the_field('sidebar_content'); ?>
    </div>

  </div><!-- End of Container -->

<?php endwhile; ?>


<?php get_footer(); ?>
