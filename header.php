
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
    <!-- <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
     -->
	<?php wp_head(); ?>
  <script>
		 var theme_path = '<?=  get_template_directory_uri();?>';
	</script>	
  
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade">
            <a href="<?=home_url(); ?>"><?= the_field('logo_link', pll_current_language('slug')); ?></a>
            

          </div>
          <div class="col-6 col-lg-8">
            <div class="polylang-bar ">
              <ul class="custom-breadcrumbs">
                  <?php 
                    $args=array(
                      'show_flags'=> 1,
                      'force_home' => 0,
                      'show_names'=> 0
                    );
                    pll_the_languages($args);
                  ?>
              </ul>
            </div>
            
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
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <?php
                          wp_nav_menu( [
                                'theme_location' 	=> 	'expanded',
                                'container'		 		=> false,
                                'items_wrap'      => '%3$s'
                              ] ); 
                        ?>
                      </ul>
                    </div>
                  </div>           
                </div>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->
    <!-- Modal window for alerts -->
    <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal">
              ×
            </button>
            <h4 class="modal-title">
            
            </h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button id="close" class="btn btn-default" type="button" data-dismiss="modal">
              OK
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <?php get_template_part('template-parts/sections/top-section');?>

    
		

