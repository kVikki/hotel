	  <section class="section bg-image overlay" style="background-image: url('<?= the_field('reservation_bg', pll_current_language('slug'))?>');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">
								<?= the_field('footer_reserve_text', pll_current_language('slug'))?>
							</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="<?=get_field('reservation_link',pll_current_language('slug'))?>" class="btn btn-outline-white-primary py-3 text-white px-5">
								 <?= the_field('reservation_btn', pll_current_language('slug'))?>
							</a>
            </div>
          </div>
        </div>
    </section>
			
		<footer class="section footer-section">
			<div class="container">
				<div class="row mb-4">
					<div class="col-md-6 mb-5" style='columns: 2'>
						
							<?php
								wp_nav_menu( [
											'theme_location' 	=> 'footer',
											'container'		 		=> false,
											'menu_class'      => 'list-unstyled link',
											'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
										] ); 
							?>
							
					</div>

					<!-- Contacts -->
					<?php
						$footer = 'footer';
						require (locate_template('template-parts/parts/contacts.php'));
					?>

					<!-- News send subscription -->
					<div class="col-md-3 mb-5">
						<p>
						<?= get_field('news_title',pll_current_language('slug'));?>
						<!-- 	Sign up for our newsletter -->
						</p>
						<form novalidate id="newsletters" action="<?= admin_url('admin-ajax.php?action=newsletters')?>"
							 class="footer-newsletter" 	method="post">
							
							<div class="form-group">
								<input type="email" id="email_newsletters" name="email_newsletters" class="form-control validates-as-required" placeholder="<?= get_field('news_placeholder',pll_current_language('slug'));?>">
								<button type="submit" class="btn" id="submit">
									<span class="fa fa-<?= get_field('send_icon',pll_current_language('slug'));?>"></span>
								</button>
							</div>
						</form>
					</div>	

				</div>

				<div class="row pt-5">
					
					<!-- Copyright -->
					<p class="col-md-6 text-left">
						<?php
							the_field('copy_text',pll_current_language('slug'));
							the_time('Y ');
							the_field('copy_rights',pll_current_language('slug'));
							the_field('copy_template',pll_current_language('slug'));
						?>
						<a href="<?= the_field('author_url',pll_current_language('slug'));?>" target="_blank" > 
							<?php	the_field('author_name',pll_current_language('slug'));?>
						</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>

						<!-- Social buttons -->
					<p class="col-md-6 text-right social">
						<?php 
							$social_nets = get_field('social_buttons', pll_current_language('slug'));
							if( $social_nets):
								foreach( $social_nets as $social_net ):?>
									<a href="<?=$social_net['social_url']?>">
										<span class="<?='fa fa-'.$social_net['social_net_name']?>">	</span>
									</a>
								<?php
								endforeach;
							endif;			
						?>
					</p>
				</div>
			</div>
		</footer>
			
	<?php wp_footer(); ?>

	</body>
</html>
