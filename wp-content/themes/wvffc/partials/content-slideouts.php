<?php

$slides = get_field('content_slideouts');
if($slides){
  foreach($slides as $slide){ ?>
    <div class="slide">

        <h2><?php echo $slide['slide_title']; ?></h2>
        <?php echo $slide['slide_content'];
        if($slide['page_link'] !=''){ ?>
          <a href="<?php echo $slide['page_link']; ?>" class="readmore"><?php echo $slide['link_text']; ?> »</a>
        <?php } ?>

    </div>
<?php
  }
}

?>
