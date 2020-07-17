<section class="section testimonial-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">
              <?= the_field('testimonials_section_title','options');?>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            <!-- Заменить повторителем -->
          <?php
            $testimonials = get_posts( array(
              'post_type' => 'testimonial',
              
            ) );


            if($testimonials):  
              foreach( $testimonials as $post ):
                setup_postdata($post);?>
                 
                 <div class="testimonial text-center slider-item">
                    <div class="author-image mb-3">
                      <img src="<?= the_post_thumbnail_url();?>" alt="Image placeholder" class="rounded-circle mx-auto">
                    </div>
                    <blockquote>

                      <p>&ldquo;</p><?php the_content();?>
                    </blockquote>
                    <p><em>&mdash; <?php the_title();?></em></p>
                  </div> 
              <?php
              endforeach;
              wp_reset_postdata(); // сброс
            endif;


          ?>

          </div>
            <!-- END slider -->
        </div>

      </div>
</section>