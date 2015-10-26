<?php get_header(); ?>

<?php

  $resources_page = 14;

?>

<div class="container resource-content">

  <ul id="breadcrumbs">
    <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
    <li class="separator"> > </li>
    <li>Free Library</li>
  </ul>

  <div class="row">
    <div class="twelve columns">
      <h1><?php echo get_the_title($resources_page); ?></h1>
      <p><?php echo get_field('introduction', $resources_page); ?></p>
    </div>
  </div>

  <div class="row">
    <div class="four columns">
      <a class="resource-btn cat" href="#">For Farmers</a>
    </div>
    <div class="four columns">
      <a class="resource-btn cat" href="#">For Food Businesses</a>
    </div>
    <div class="four columns">
      <a class="resource-btn cat" href="#">For Advocates & Getting Involved</a>
    </div>
  </div>

  <div class="row">
    <div class="four columns">
      <a class="resource-btn cat" href="#">Studies</a>
    </div>
    <div class="four columns">
      <a class="resource-btn cat" href="#">Finding Local Farms</a>
    </div>
    <div class="four columns">
      <a class="resource-btn cat active-cat" href="#">Show All</a>
    </div>
  </div>

  <div class="row">
    <div class="four columns">
      <select class="turnintodropdown">
        <option>All Regions</option>
        <option>All Regions</option>

        <?php
          //GET regions for each post and add region to each block
          $terms = get_terms( 'region' );

          if ( $terms && ! is_wp_error( $terms ) ) :
            foreach ( $terms as $term ) {
              $t = strtolower(str_replace(" ", "-", $term->name));
              echo '<option value="' . $t . '">' . $term->name . '</option>';
            }
          endif;
        ?>

  		</select>
    </div>
    <div class="eight columns">
      <div class="checkboxFive">
    		<input type="checkbox" value="1" id="c1" />
  	  	<label for="c1"></label>
    	</div>
      <div class="cb">PDF's</div>
      <div class="checkboxFive">
        <input type="checkbox" value="1" id="c2" />
        <label for="c2"></label>
      </div>
      <div class="cb">External Links</div>
      <div class="checkboxFive">
        <input type="checkbox" value="1" id="c3" />
        <label for="c3"></label>
      </div>
      <div class="cb">Documents</div>
      <div class="checkboxFive">
        <input type="checkbox" value="1" id="c4" />
        <label for="c4"></label>
      </div>
      <div class="cb">Useful Contacts</div>
      <!-- <div class="checkboxFive">
        <input type="checkbox" value="1" id="c5" />
        <label for="c5"></label>
      </div>
      <div class="cb">All</div> -->
    </div>
  </div>

  <div class="four columns resource-right">
    <div class="resource-right-textbox">
      <?php echo get_field('contact', $resources_page) ?>
    </div>
  </div>

  <div id="resources">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <?php
        //GET regions for each post and add region to each block
        $terms = get_the_terms( $post->ID, 'region' );
        $regions = '';

        if ( $terms && ! is_wp_error( $terms ) ) :
          foreach ( $terms as $term ) {
            $t = strtolower(str_replace(" ", "-", $term->name));
            $regions  = $regions . $t . ' ';
          }
        endif;
      ?>

      <?php
        //GET file types for each post and add file types to each block
        $terms = get_the_terms( $post->ID, 'filetype' );
        $file_types = '';

        if ( $terms && ! is_wp_error( $terms ) ) :
          foreach ( $terms as $term ) {
            $f = strtolower(str_replace(" ", "-", $term->name));
            $file_types  = $file_types . $f . ' ';
          }
        endif;
      ?>

      <?php
        //GET categories for each post and add category to each block
        $terms = get_the_category( $post->ID );
        $categories = '';

        if ( $terms && ! is_wp_error( $terms ) ) :
          foreach ( $terms as $term ) {
            $f = strtolower(str_replace(" ", "-", $term->name));
            $categories  = $categories . $f . ' ';
          }
        endif;
      ?>


      <div class="two columns content-block <?php echo $regions; ?> <?php echo $file_types; ?> <?php echo $categories; ?>">

         <?php
           if (get_field('resource_image')) {
               echo '<div class="content-block-image"><img src="'.get_field('resource_image').'" /></div>';
           }
         ?>

         <a href="<?php echo get_permalink( $post->ID ); ?>"><h4><?php the_title(); ?></h4></a>
         <?php the_excerpt(); ?>

      </div>

    <?php endwhile; ?>
  </div>

</div></div><!-- End of Container -->

<?php get_footer(); ?>
