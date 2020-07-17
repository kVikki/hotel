<?php
  if(!is_single()):
    $thumb_size='event_thumb';
    $figure_class='img-wrap';
  else:
    $thumb_size='large';
    $figure_class='image';
  endif;
?>




<div class="col-md-6 col-lg-4" data-aos="fade-up">
  <a href="<?php the_permalink()?>" class="room">
    <figure class="<?=$figure_class;?> ">
     <?php

        the_post_thumbnail($thumb_size, array('class'=>'img-fluid mb-3'));
      ?>
    </figure>
    <div class="p-3 text-center room-info">
      <h2>
        <?php the_title();?>
      </h2>

      <!-- Price -->
      <span class="text-uppercase letter-spacing-1">
        <?php
        the_field('price_value');
        the_field('price_currency');
        ?>
      </span>
    </div>
  </a>
  <!-- Discription -->
  <div class="p-3 text-center room-info">
    <?php
      if(is_single()):
        the_content();
      endif;
    ?>
  </div>
</div>