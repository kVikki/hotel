<?php
 /* Template Name: reservation page */  
?>

<?php
get_header();
?>

    
<!--Form reservations-->
<section class="section contact-section" id="next">
  <div class="container">
    
    <div class="row">      

      <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
        
        <form id="reservation" action="<?= admin_url('admin-ajax.php?action=reservation')?>"
          method="post" class="bg-white p-md-5 p-4 mb-5 border"
          data-requider="<?=get_field('required_field','options'); ?>">
          <div class="row">
          <!-- Name -->
            <div class="col-md-6 form-group">
              <label class="text-black font-weight-bold" for="name">
                <?= the_field('name_label','options');?>
              </label>
              <input type="text" id="name" name="name"class="form-control form-control-required">
            </div>
            <!-- Phone  -->
            <div class="col-md-6 form-group">
              <label class="text-black font-weight-bold" for="phone">
                <?= the_field('phone_label','options');?>
              </label>
              <input type="text" id="phone" name="phone"class="form-control form-control-required">
            </div>
          </div>
          <!-- email -->
          <div class="row">
            <div class="col-md-12 form-group">
              <label class="text-black font-weight-bold" for="email">
                <?= the_field('email_label','options');?>
              </label>
              <input type="email" id="email" name="email" class="form-control form-control-required">
            </div>
          </div>
          
          <div class="row">
            <!-- Checkin -->
            <div class="col-md-6 form-group">
              <label class="text-black font-weight-bold" for="checkin_date">
                <?= the_field('checkin_date_label','options');?>
              </label>
              <input type="text" id="checkin_date" name="checkin_date" class="form-control form-control-required" >
            </div>
            <!-- Checkout -->
            <div class="col-md-6 form-group">
              <label class="text-black font-weight-bold" for="checkout_date">
                <?= the_field('checkout_date_label','options');?>
              </label>
              <input type="text" id="checkout_date" name="checkout_date" class="form-control form-control-required">
            </div>
          </div>

          <div class="row">
             <!-- Adults --> 
            <div class="col-md-6 form-group">
              <label for="adults" class="font-weight-bold text-black">
                <?= the_field('adults_label','options');?>
              </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="adults" id="adults" class="form-control form-control-required" >
                  <?php                     
                    $adults = get_field('adults','options');
                    if($adults):
                      foreach($adults as $row):?>
                        <option value="<?= $row['adults_number']?>">
                          <?= $row['adults_number']?>
                        </option>
                      <?php
                      endforeach;
                    endif
                  ?>                 
                </select>
              </div>
            </div>
            <!-- Children -->         
            <div class="col-md-6 form-group">
              <label for="children" class="font-weight-bold text-black">
                <?= the_field('children_label','options');?>
              </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="children" id="children" class="form-control" >
                  <?php                     
                    $children = get_field('children','options');
                    if($children):
                      foreach($children as $row):?>
                        <option value="<?= $row['children_number']?>">
                          <?= $row['children_number']?>
                        </option>
                      <?php
                      endforeach;
                    endif
                  ?>     
                </select>
              </div>
            </div>
          </div>          
          <!-- Message -->
          <div class="row mb-4">
            <div class="col-md-12 form-group">
              <label class="text-black font-weight-bold" for="message">
                <?= the_field('notes_label','options');?>
              </label>
              <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
            </div>
          </div>
          <!-- Button -->
          <div class="row">
            <div class="col-md-6 form-group">
              <button type="submit" value="<?= the_field('reserve_now_btn','options');?>" name="reserve" id="reserve" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
               <?= the_field('reserve_now_btn','options');?>
              </button>
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
