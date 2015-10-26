<?php /*
* Template Name: Newsletter
*/
?>

<?php get_header(); ?>

<div class="container page-content">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php the_breadcrumb(); ?>

    <div class="eight columns">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>

    <div class="four columns">

      <?php if( have_rows('periods') ): ?>

        <div id="periods">
          <?php

          // loop through rows (parent repeater)
          while( have_rows('periods') ): the_row(); ?>

          <div class="period">

            <h3><?php the_sub_field('period_title'); ?></h3>

            <?php

            // check for rows (sub repeater)
            if( have_rows('archives') ): ?>
            <ul>

              <?php while( have_rows('archives') ): the_row(); ?>

                <li><a href="<?php the_sub_field('archive_link') ?>" target="_blank"><?php the_sub_field('archive_title'); ?></a></li>

              <?php endwhile; ?>
            </ul>
        <?php endif; //if( get_sub_field('items') ): ?>
        </div>

      <?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
      </div>
    <?php endif; // if( get_field('to-do_lists') ): ?>


    </div>

  <?php endwhile; ?>

</div><!-- End of Container -->

<?php get_footer(); ?>
