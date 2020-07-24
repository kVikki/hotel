<?php
  switch($section):
    case 'event':
          $section_class='blog-post-entry bg-light';
          $white_style = '';
         /*  $text = 'text'; */
          $data_aos='fade-up';
          $data_aos_delay= '';
          break;
    case 'room':
          $data_aos='fade';
          $text='text text' ;
          $data_aos_delay= 100;
          break;
    case 'great-offer':
          $section_class='bg-light'; 
         /*  $text='rooms text' ; */
          $data_aos='fade';
           $data_aos_delay= '';
          break;
    case 'photos':
          $section_class='slider-section bg-light'; 
         /*  $text='photos text' ; */
          $data_aos='fade-up';
          $data_aos_delay= 100;
          break;
    case  'menu':
          $section_class='bg-image overlay';
          $id = 'menu';
          $bg_style='background-image:url('. get_field('menu_bg').')';
          $white_style = 'text-white';
          /* $text='menu' ; */
          $data_aos='fade';
          $data_aos_delay= 100;
          break;    
  endswitch;

  $post_types = get_post_types();
  $the_title=get_field($section.'_section_title','options');
  $text=get_field($section.'_section_text','options');
  
?>

 
<section class="section <?= $section_class;?>" style="<?=$bg_style;?>" id="<?= $id?>">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading <?= $white_style?>" data-aos="<?= $data_aos?>">
          <?= $the_title; ?>
        </h2>
        <p class="<?=$white_style;?>" data-aos="<?= $data_aos?>"  data-aos-delay="<?=$data_aos_delay;?>">
          <?= $text;?>
        </p>
      </div>
    </div>

    <?php
      if($section!='menu'):?>
        <div class="row">
        <?php
      endif;

        /*Проверяем, совпадает ли секция с произвольным типом записи  */
        if(in_array($section,$post_types)): 
          /* Если совпадает, выводит архив типа данных, */

          global $post;
          $parts=get_posts( array(
            'post_type' => $section,
          ) );
        
          foreach( $parts as $post ):
            setup_postdata( $post );
            get_template_part('template-parts/parts/'.$section);
          endforeach;
          wp_reset_postdata(); 

        else: /*в противном случае будем выводить конкретную секцию*/
          get_template_part('template-parts/parts/'.$section); 
        endif; 
        
      if($section!='menu'):?>
        <div >
      <?php endif;
    ?>  
    
  </div>
</section>