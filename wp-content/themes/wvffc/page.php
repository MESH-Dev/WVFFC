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

       <?php if(get_field('posts_by_tag')) {

         ?>

         <div class="tagged-posts">

         <h2>Related Posts</h2>

         <?php

         $tag = get_field('posts_by_tag');

         $args=array(
         'tag_id' => $tag[0],
         'showposts'=>3,
         'caller_get_posts'=>1
         );

         $my_query = new WP_Query($args);
         if( $my_query->have_posts() ) {

           ?>

           <ul>

             <?php

             while ($my_query->have_posts()) : $my_query->the_post(); ?>
             <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></li>
             <?php
             endwhile;

             ?>

           </ul>

           <?php

         } //if ($my_query)



       wp_reset_query();  // Restore global post data stomped by the_post().

        ?>

        </div>

        <?php

       } ?>
   </div>

<?php endwhile; ?>

</div><!-- End of Container -->

<?php get_footer(); ?>
