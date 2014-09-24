<?php get_header(); ?>

<?php

  $resources_page = 14;

?>

<div class="container page-content">

  <ul id="breadcrumbs">
    <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
    <li class="separator"> / </li>
    <li><strong>Free Library</strong></li>
  </ul>

  <div class="row">
    <div class="twelve columns">
      <h1>A Free Library at Your Finger Tips</h1>
      <p>Ut non enim eleifend felis pretium feugiat. Maecenas egestas arcu quis ligula mattis placerat. Proin pretium, leo ac pellentesque mollis, felis nunc ultrices eros, sed gravida augue augue mollis justo. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.</p>
    </div>
  </div>

  <?php

  $i = 1;
  $r = 1;

  ?>

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php

      if ($r < 3) {
          if ($i % 4 == 1) {
            if ($i == 1) {
              echo '<div class="row"><div class="resource-left">';
            }
            echo '<div class="row">';
          }
      }
      elseif ($r == 3) {
          echo '<div class="row">';
          $i = 1;
          $r = $r + 1;
      }
      else {
          if ($i % 6 == 1) {
            echo '<div class="row">';
          }
      }

    ?>

     <div class="two columns content-block">

       <?php

        if (get_field('resource_image')) {
            echo '<div class="content-block-image"><img src="'.get_field('resource_image').'" /></div>';
        }

        ?>

        <h4><?php the_title(); ?></h4>
        <?php the_excerpt(); ?>

     </div>

     <?php

        if($r < 3) {
            if ($i % 4 == 0) {
              echo '</div>';
              $r = $r + 1;
              if ($i == 8) {
                echo '</div>';
                echo '<div class="resource-right"><div class="four columns"><div class="resource-right-textbox">'.get_field('contact', $resources_page).'</div></div></div></div>';
              }
            }
        }
        else {
            if ($i % 6 == 0) {
              echo '</div>';
            }
        }

       $i = $i + 1;

     ?>

  <?php endwhile; ?>

</div><!-- End of Container -->

<?php get_footer(); ?>
