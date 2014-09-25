<?php get_header(); ?>

<?php if(have_posts()){while(have_posts()){the_post(); ?>

<div class="container">
  <div class="row">
      <div class="home-callout">
        <div class="home-callout-text">
          <span><?php the_field('homepage_statement'); ?></span>
        </div>
      </div>

      <div class="home-image">
        <img src="<?php the_field('homepage_image') ?>" />
        <?php get_template_part( 'partials/home', 'slideouts' ); ?>
      </div>
  </div>
  <div class="row last">
    <div class="four columns">
      <div class="home-excerpt">
        <h2><?php the_field('column_1_headline'); ?></h2>
        <p><?php the_field('column_1_excerpt'); ?></p>
        <h5><a href="<?php the_field('column_1_link'); ?>"><?php the_field('column_1_link_text'); ?> »</a></h5>
      </div>
    </div>
    <div class="four columns">
      <div class="home-excerpt">
        <h2><?php the_field('column_2_headline'); ?></h2>
        <p><?php the_field('column_2_excerpt'); ?></p>
        <h5><a href="<?php the_field('column_2_link'); ?>"><?php the_field('column_2_link_text'); ?> »</a></h5>
      </div>
    </div>
    <div class="four columns">
      <div class="home-excerpt">
        <h2><?php the_field('column_3_headline'); ?></h2>
        <p><?php the_field('column_3_excerpt'); ?></p>
        <h5><a href="<?php the_field('column_3_link'); ?>"><?php the_field('column_3_link_text'); ?> »</a></h5>
      </div>
    </div>
  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>
