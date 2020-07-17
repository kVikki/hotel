
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?php bloginfo('name'); ?>|
      <?php is_home() ? bloginfo('description') : wp_title(''); ?> 
      
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--   <meta name="keywords" content="" />
    <meta name="author" content="" /> -->
    
	<?php wp_head(); ?>
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="<?=home_url(); ?>"><?= the_field('logo_link', 'options'); ?></a></div>
          <div class="col-6 col-lg-8">

            <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <ul>
                      <?php
												wp_nav_menu( [
															'theme_location' 	=> 	'expanded',
															'container'		 		=> 'div',
															'container_class' => 'col-md-6 mx-auto',
															'menu_class'      => 'list-unstyled menu',
															'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
														] ); 
											?>
                    </ul>
                  </div>           
                </div>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->
    
    <?php get_template_part('template-parts/sections/top-section');?>
		

