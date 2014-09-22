 <?php /*
 * Template Name: Text
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <div class="container page-content">

    <div class="eight columns">
        <?php the_breadcrumb(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>

    <div class="four columns">

    </div>

  </div><!-- End of Container -->

<?php endwhile; ?>


<?php get_footer(); ?>
