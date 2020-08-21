<?php
  if(is_front_page()):
    $section_class= "bg-light pb-0";
  else: 
    $section_class= "pb-4";
  endif;

  $check=rand(0,1);
 
  
?>


<section class="section <?= $section_class;?>"  >
  <div class="container" id="next">
    
    <div class="row check-availabilty" >
      <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

        <form id="check" name="check" action="<?= admin_url('admin-ajax.php?action=checking')?>"  method="post">
          <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkin_date" class="font-weight-bold text-black ">
                <?= the_field('checkin_date_label',pll_current_language('slug'));?>
              </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="text" name="checkin_date" id="checkin_date" class="form-control form-control-required">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkout_date" class="font-weight-bold text-black ">
                <?= the_field('checkout_date_label',pll_current_language('slug'));?>
              </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="text" name="checkout_date" id="checkout_date" class="form-control form-control-required">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="adults" class="font-weight-bold text-black ">
                    <?= the_field('adults_label',pll_current_language('slug'));?>
                  </label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="adults" id="adults" class="form-control" >
                      <?php                     
                        $adults = get_field('adults',pll_current_language('slug'));
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
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="children" class="font-weight-bold text-black">
                    <?= the_field('children_label',pll_current_language('slug'));?>
                  </label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="children" id="children" class="form-control">
                      <?php                     
                        $children = get_field('children',pll_current_language('slug'));
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
                  <!-- hidden field for availability check imitation -->
                  <input type="hidden" name="available" id="available" value="<?= $check?>">                 
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 align-self-end">
              <button type="submit" class="btn btn-primary btn-block text-white" name="checking" id="checking">
                <?= the_field('check_availability_btn',pll_current_language('slug'));?>
              </button>
            </div>
          </div>
        </form>
      </div>


    </div>
  </div>
</section>




