<?php
  switch($section):
    case 'event':
          $section_class='blog-post-entry bg-light';
          $white_style = '';
          $data_aos='fade-up';
          $data_aos_delay= '';
          $numberposts = 3;
          break;
    case 'room':
          $data_aos='fade';
          $text='text text' ;
          $data_aos_delay= 100;
          $numberposts = 3;
          break;
    case 'great-offer':
          $section_class='bg-light'; 
          $data_aos='fade';
          $data_aos_delay= '';
          break;
    case 'photos':
          $section_class='slider-section bg-light'; 
          $data_aos='fade-up';
          $data_aos_delay= 100;
          break;
    case  'menu':
          $section_class='bg-image overlay';
          $id = 'menu';
          $bg_style='background-image:url('. get_field('menu_bg').')';
          $white_style = 'text-white';
          $data_aos='fade';
          $data_aos_delay= 100;
          break;    
  endswitch;

  $post_types = get_post_types();
  $the_title=get_field($section.'_section_title',pll_current_language('slug'));
  $text=get_field($section.'_section_text', pll_current_language('slug'));
  
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
      if($section!='menu' && $section!='great-offer'):?>
        <div class="row">
        <?php
      endif;

        /*Проверяем, совпадает ли секция с произвольным типом записи  */
        if(in_array($section,$post_types)): 
          /* Если совпадает, выводит архив типа данных, */

          global $post;
          if (is_front_page() && $section =='event'  ):
            $parts=get_posts( array(
              'post_type' => $section,
              'meta_key'  => 'event_date',
              'orderby'   => 'meta_value_num',
              'order'     => 'DESC',
              'numberposts' => $numberposts,
            ) );
          elseif (is_front_page() && $section =='room' ):
            $parts=get_posts( array(
              'post_type' => $section,              
              'numberposts' => $numberposts,
            ) );
          else:
            $parts=get_posts( array(
              'post_type' => $section,
            ) );
          endif;
        
          foreach( $parts as $post ):
            setup_postdata( $post );
            get_template_part('template-parts/parts/'.$section);
          endforeach;
          wp_reset_postdata(); 

        else: /*в противном случае будем выводить конкретную секцию*/
          get_template_part('template-parts/parts/'.$section); 
        endif; 
        
      if($section!='menu' && $section!='great-offer' ):?>
        <div >
      <?php endif;
    ?>  
    
  </div>
</section>