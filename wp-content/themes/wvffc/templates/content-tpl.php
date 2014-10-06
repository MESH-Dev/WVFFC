 <?php /*
 * Template Name: Content
 */
?>

<?php get_header(); ?>

<div class="container page-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div class="row">
        <div class="content-callout">
          <div class="content-callout-text">
            <span><?php the_field('content_header_statement'); ?></span>
          </div>
        </div>

        <div class="content-image">
          <img src="<?php the_field('content_header_image') ?>" />
          <?php get_template_part( 'partials/content', 'slideouts' ); ?>
        </div>
    </div>

    <?php

    // check if the repeater field has rows of data
    if( have_rows('content') ):

        $i = 1;

     	// loop through the rows of data
        while ( have_rows('content') ) : the_row();

            // display a sub field value

            if ($i % 3 == 1) {
              echo '<div class="row">';
            }

            echo '<div class="four columns page-content-block">';

              if (get_sub_field('content_image')) {
                  echo '<div class="page-content-block-image">';
                  echo '<img src="'.get_sub_field('content_image').'" />';
                  echo '</div>';
              }

              echo '<h2>'.get_sub_field('content_headline').'</h2>';
              the_sub_field('content_body');
              echo '<h5><a href="'.get_sub_field('content_link').'">'.get_sub_field('content_link_text').' »</a></h5>';

            echo '</div>';

            if ($i % 3 == 0) {
              echo '</div>';
            }

            $i = $i + 1;

        endwhile;

    else :

        // no rows found

    endif;

    ?>

<?php endwhile; ?>

</div></div><!-- End of Container -->

<?php get_footer(); ?>
