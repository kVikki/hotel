<?php
get_header();
?>

<section class="section">
      <div class="container" id="next">
        
        <div class="row justify-content-center text-center mb-5">
          <h1 class="heading mb-3">
            <!-- Heading needed -->
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
                  <?php
                   $post_type=get_post_type();
                    if($post_type=='event'):
                      $post_title='';
                      $post_field='';
                    elseif ($post_type=='room'):
                      $post_title=the_title();
                      $post_field='';
                    endif;
                  ?>
                   
                    
                    <h1 class="heading mb-4">
                      <?php $post_title; ?>
                    </h1>
                    <span class="text-uppercase letter-spacing-1">
                      <?php
                      the_field('price_value');
                      the_field('price_currency');?>
                      
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