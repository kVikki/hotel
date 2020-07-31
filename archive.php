<?php
get_header();
?>

<!-- Checking -->
<?php 
  $post_type=get_post_type();
  if($post_type =='room'): ?>
    
    <?php get_template_part('template-parts/sections/checking');?>

    <?php
  else:  $archive_class='blog-post-entry bg-light';
  endif;
?>

  <section class="section <?= $archive_class;?>">
    <div class="container" id="next">
      <div class="row" >

        <?php
          if (have_posts()  ):
              while ( have_posts() ) : 
                the_post();
                get_template_part('template-parts/parts/'.get_post_type());
              endwhile?>
            <?php
          endif; 
        ?>          

      </div>

       <!-- pagination -->
   <div class="row" data-aos="fade">
    <div class="col-12">
      <div class="custom-pagination"> 
        <ul class="list-unstyled" >      
          <? 
            $args = array(
              'show_all'     => false, // показаны все страницы участвующие в пагинации
              'end_size'     => 2,     // количество страниц на концах
              'mid_size'     => 2,     // количество страниц вокруг текущей
              'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
              'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
              'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
            );
            the_posts_pagination($args);
          ?>	
        </ul>
      </div>
    </div>
  </div>

    </div>
  </section>

  
    
  <!-- /* Great Offers */ -->
  <?php 
    if($post_type =='room'): 
      $section = 'great-offer';
      require (locate_template('template-parts/content-section.php'));
    endif;
  ?>

 
 
<?php
get_footer();
?>
