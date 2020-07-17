
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              
              <?php 
                $images = get_field('img_gallery', 'options');
                if( $images ): ?>
                  <?php
                    foreach( $images as $image ): ?>
                      <div class="slider-item">
                        <a href="<?= esc_url($image['url']); ?>" data-fancybox="images" data-caption="Caption for this image">
                          <img src="<?= esc_url($image['sizes']['slider_thumb']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
                        </a>
                      </div>
                        
                      <?php
                    endforeach;
                  endif;
              ?>
            
            </div>
            <!-- END slider -->
          </div>
       