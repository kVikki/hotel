<?php
 /* Template Name: about page */  
?>

<?php
get_header();

  $the_leadership_title = get_field('leadership_section_title','options');
  $members=get_field('leadership');
 
  $the_history_title = get_field('history_section_title','options');
  $events=get_field('history');
 
?>
    		
		<!-- Welcome -->
    <?php
       get_template_part('template-parts/sections/welcome'); 
    ?>  
     		
		<!-- Leadership -->
    <div class="container section">

      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7 mb-5">
          <h2 class="heading" data-aos="fade-up">
            <?= $the_leadership_title;?>
          </h2>
        </div>
      </div>

      <div class="row">
        <?php 
          if($members):
            foreach($members as $member):
              $name=$member['name'];
              $position=$member['position'];
              $quote=$member['quote'];
              $photo=$member['photo'];
              ?>

              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="block-2">
                  <div class="flipper">
                    <div class="front" style="background-image: url(<?= $photo;?>);">
                      <div class="box">
                        <h2><?= $name;?></h2>
                        <p><?= $position;?></p>
                      </div>
                    </div>
                    <div class="back">
                      <!-- back content -->
                      <blockquote>
                        <p> <?= $quote;?></p>
                      </blockquote>
                      <div class="author d-flex">
                        <div class="image mr-3 align-self-center">
                          <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">
                          <?= $name;?>
                          <span class="position"><?= $position;?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- .flip-container -->
              </div>         
          
              <?php
            endforeach;
          endif;
        ?>        
      </div>
      
    </div>
    <!-- END .block-2 -->

         
    <!-- Photos -->
    <?php
      $section = 'photos';
      require (locate_template('template-parts/content-section.php')); 
    ?> 
    <!-- END section -->
		
    <!-- History -->
    <div class="section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7 mb-5">
            <h2 class="heading" data-aos="fade">
              <?=$the_history_title;?>
            </h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8">
            <?php
              if($events):
                foreach($events as $event):
                  $year= $event['year'];
                  $year_title= $event['year_title'];
                  $year_content= $event['year_content'];
                  ?>
                  <div class="timeline-item" date-is='<?= $year;?>' data-aos="fade">
                    <h3><?= $year_title;?></h3>
                    <p> <?= $year_content;?></p>
                  </div>
              
                  <?php
                endforeach;
              endif;
            ?>
          </div>
        </div>        

      </div>
    </div>

<?php
get_footer();
?>