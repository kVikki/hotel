<?php
get_header();
?>
    
		<!-- Booking -->
    <?php get_template_part('template-parts/sections/checking');?>

		<!-- Welcome -->
    <?php  get_template_part('template-parts/sections/welcome');    ?>  
      
		
		<!-- Rooms & suites  -->
    <?php
      $section = 'room';
      require (locate_template('template-parts/content-section.php')); 
    ?>  
      
    
    <!-- Photos -->
    <?php
       $section = 'photos';
       require (locate_template('template-parts/content-section.php'));
    ?> 
    <!-- END section -->
		
		<!-- Menu -->
    <?php
       $section = 'menu';
       require (locate_template('template-parts/content-section.php'));  
    ?> 
		<!-- END section -->
		
		<!-- People says -->
    <?php get_template_part('template-parts/sections/testimonials');?>
    
    <!-- Events -->
    
    <?php
      $section = 'event';
      require (locate_template('template-parts/content-section.php')); 
    ?>

<?php
get_footer();
?>