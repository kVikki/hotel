<?php

/* animation options */
  if (is_front_page()):
    $data_aos = 'fade-up';
  else: $data_aos = 'fade';
  endif;
/* back-ground options */
  if(is_single()):
    $top_bg_img = get_the_post_thumbnail_url();
  elseif(is_404()):
    $top_bg_img = get_field('404_bg', pll_current_language('slug'));
  else:
    $top_bg_img = get_field('top_section_bg', pll_current_language('slug'));
  endif;

  $post_type=get_post_type();
 /* Heading options */ 
  if(is_single()):
    $section_title = get_field($post_type.'_section_title',pll_current_language('slug')); 
  elseif(is_front_page()):
      $section_title = get_field('heading', pll_current_language('slug')); 
  elseif(is_404()):
    $section_title = get_field('404_heading', pll_current_language('slug'));
  else:
    $section_title = wp_title('', false); 
  endif; 

/* text options */
  if(is_front_page()):
      $introduce = get_field('introduce', pll_current_language('slug')); 
  elseif(is_404()):
      $introduce  = get_field('404_introduce', pll_current_language('slug'));  
  endif; 

?>

<section class="site-hero overlay" style="background-image: url(<?= $top_bg_img;?>)" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      
      <div class="col-md-10 text-center" data-aos="<?= $data_aos?>">
        <?php    
          if (is_front_page()):?>
            <span class="custom-caption text-uppercase text-white d-block  mb-3">
              <?= $introduce; ?>             
            </span>
            <h1 class="heading">
              <?= $section_title ?>
            </h1>  
            <?php 
          else: 
            if (is_404()):?>
              <span class="custom-caption text-uppercase text-white d-block  mb-3">
                <?= $introduce; ?>             
              </span>
              <?php
            endif;?>            
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
                  <?= the_field('home_link', pll_current_language('slug')); ?>
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

