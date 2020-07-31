<?php
  if (is_front_page()):
    $data_aos = 'fade-up';
  else: $data_aos = 'fade';
  endif;

  if(is_single()):
    $top_bg_img = get_the_post_thumbnail_url();
  else:
    $top_bg_img = get_field('top_section_bg', 'options');
  endif;

  $post_type=get_post_type();
  
  if(is_single()):
    $section_title = get_field($post_type.'_section_title','options');  
  else:
     $section_title = wp_title('', false); 
  endif; 
?>

<section class="site-hero overlay" style="background-image: url(<?= $top_bg_img;?>)" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      
      <div class="col-md-10 text-center" data-aos="<?= $data_aos?>">
        <?php    
          if (is_front_page()):?>
            <span class="custom-caption text-uppercase text-white d-block  mb-3">
              <?= the_field('introduce', 'options'); ?>
             
            </span>
            <h1 class="heading"><?= the_field('heading', 'options'); ?></h1>  
            <?php
          else: ?>            
            <h1 class="heading mb-3">
              <?php 
                if($post_type=='post'):
                  the_title();
                else: echo   $section_title;           
                endif;
              ?>
            </h1>
            <ul class="custom-breadcrumbs mb-4">
              <li>
                <a href="<?=home_url(); ?>">
                  <?= the_field('home_link', 'options'); ?>
                </a>
              </li>
              <li>&bullet;</li>
              <li>
                 <?php
                 if($post_type=='post'):
                    the_title();
                  else: echo   $section_title;           
                  endif;?> 
              </li>
            </ul>

          <?php
          endif;
        ?>
      </div>
    </div>
  </div>

  <a class="mouse smoothscroll" href="#next">
    <div class="mouse-icon">
      <span class="mouse-wheel"></span>
    </div>
  </a>
</section>

