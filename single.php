<?php
get_header();
?>

<?php
  $post_type=get_post_type();
  if($post_type=='event'):
    $post_title=get_field('event_title');
    $post_field_1=get_field('event_date');                        
  elseif ($post_type=='room'):
    /* $post_title=the_title(); */
    $post_field_1= get_field('price_value');
    $post_field_2 = get_field('price_currency');
  endif;
?>

<section class="section">
      <div class="container" id="next">
        
        <div class="row justify-content-center text-center mb-5">
          <h1 class="heading mb-4">
            <!-- Heading needed --> 
            <?php            
              if($post_type=='post' || $post_type=='room'):
                the_title();
              elseif($post_type=='event'): echo $post_title;              
              endif;
            ?>
          </h1>
          <?php            
            if (have_posts()):
              while( have_posts() ):
                the_post();
                
                $thumb_id = get_post_thumbnail_id();
                $large_src = wp_get_attachment_image_src( $thumb_id, 'large');
                ?>

                <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                  <a href="<?= esc_url($large_src[0]); ?>" class="image d-block bg-image-2" data-fancybox="images" data-caption="Caption for this image">
                    <img src="<?= esc_url($large_src[0]); ?>" class="img-fluid">
                  </a>                
               
                  <div class="text">
                    
                    <span class="display-4 text-primary">
                      <?= $post_field_1;       ?>
                    </span>
                    
                    <span class="text-uppercase letter-spacing-1">
                      <?= $post_field_2;?>                      
                    </span>

                    <?php the_content(); ?>

                  </div>
                </div>
                
              <?php
              endwhile;
            endif;
          ?>
        </div>
      </div>
</section>

<?php
get_footer();
?>