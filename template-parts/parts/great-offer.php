<!--  Great Offers -->

<?php
  $great_offers = get_field('great_offer', pll_current_language('slug') );
   
  if( $great_offers ):  
    foreach ( $great_offers as $key => $post ):
      setup_postdata($post);      
      if ($key % 2 != 0 ):
        $class_img = 'order-2';
        $class_text = 'order-1';
      endif;   
     
      $thumb_id = get_post_thumbnail_id();
      $large_url = wp_get_attachment_image_url($thumb_id, 'large'); ?>
      <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
        <a href="<?=the_permalink( $great_offer->ID );?>"
          class="image d-block bg-image-2 <?=$class_img;?>"
          style="background-image: url('<?=$large_url ?>');">
        </a>
        
        <div class="text <?=$class_text;?>">
          <span class="d-block mb-4">
            <span class="display-4 text-primary">  <?=get_field('price_value');?> </span>
            <span class="text-uppercase letter-spacing-2"><?= get_field('price_currency') ?></span>
          </span>
          <h2 class="mb-4"><?=the_title();?></h2>
            <?= the_content();?>
          
          <p>            
            <a href="<?=get_field('reservation_link',pll_current_language('slug'))?>" class="btn btn-primary text-white">
              <?=get_field('book_btn',pll_current_language('slug') )?>
            </a>
          </p>
        </div>
      </div>
      <?php
    endforeach; 
    wp_reset_postdata();
  endif;

?>