<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

  <div class="media media-custom d-block mb-4 h-100">
    <a href="<?php the_permalink()?>" class="mb-4 d-block">
      <?php the_post_thumbnail('event_thumb', array('class'=>'img-fluid'));?>
      <!-- <img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid"> -->
    </a>
    <div class="media-body">
      <span class="meta-post"><?php the_field('event_date');?></span>
      <h2 class="mt-0 mb-3">
        <a href="<?php the_permalink();?>">
          <?php the_field('event_title');?>
        </a>
      </h2>
       <?php the_content();?>
    </div>
  </div>
  
</div>