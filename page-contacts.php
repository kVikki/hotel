<?php
 /* Template Name: contact page */  
 ?>


<?php
get_header();
?>
    
<!-- Form contacts -->
<section class="section contact-section" id="next">
  <div class="container">
    <div class="row">

      <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
        
        <form id="contact-form" action="<?= admin_url('admin-ajax.php?action=send_mail')?>" method="post"
          class="bg-white p-md-5 p-4 mb-5 border"
          data-requider="<?=get_field('required_field','options'); ?>">
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">
                <?= the_field('name_label','options');?>
              </label>
              <input type="text" id="name" name="name"class="form-control form-control-required">
            </div>
            <div class="col-md-6 form-group">
              <label for="phone">
                <?= the_field('phone_label','options');?>
              </label>
              <input type="text" id="phone" name="phone" class="form-control form-control-required">
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email"> 
                <?= the_field('email_label','options');?>
              </label>
              <input type="email" name="email" id="email" class="form-control form-control-required">
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-md-12 form-group">
              <label for="message">
                <?= the_field('message_label','options');?>
              </label>
              <textarea name="message" id="message" class="form-control form-control-required " cols="30" rows="8"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="submit"  value="<?= the_field('send_message_btn','options');?>" class="btn btn-primary text-white font-weight-bold form-control-required">
            </div>
          </div>
        </form>

      </div>

      <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
          <?php get_template_part('template-parts/parts/contacts');?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- People says -->
<?php get_template_part('template-parts/sections/testimonials');?>


<?php
get_footer();
?>