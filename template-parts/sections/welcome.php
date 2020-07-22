<?php

  $big_img= get_field('welcome_img_big','options');
  $small_img= get_field('welcome_img_small','options');
  $the_title = get_field('welcome_section_title','options');

  $text_between = get_field('text_between','options');
  $welcome_text = get_field('welcome_text','options');


  $learn_more = get_field('btn_learn_more','options');
  if( $learn_more ):
    $btn_text = $learn_more['btn_text'];
    $btn_url = $learn_moreo['btn_url'];
  endif;

  $welcome_video = get_field('welcome_video','options');
  if( $welcome_video ):
    $video_text = $welcome_video['video_text'];
    $video_url = $welcome_video['video_url'];
  endif;

?>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center" id="next">
      
      <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
        <figure class="img-absolute">
          <img src="<?= $small_img; ?>" alt="Image" class="img-fluid">
        </figure>
        <img src="<?= $big_img; ?>" alt="Image" class="img-fluid rounded">
      </div>
      <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
        <h2 class="heading">
          <?= $the_title; ?>
        </h2>
        <p class="mb-4">
          <?= $welcome_text; ?>
        </p>
        <p>
          <a href="<?= $btn_url; ?>" class="btn btn-primary text-white py-2 mr-3">
            <?= $btn_text; ?>
          </a> 
          <span class="mr-3 font-family-serif">
            <em><?= $text_between; ?></em>
          </span> 
          <a href="<?= $video_url; ?>" data-fancybox class="text-uppercase letter-spacing-1">
            <?= $video_text; ?>
          </a>
        </p>
      </div>
      
    </div>
  </div>
</section>