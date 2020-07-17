	  <section class="section bg-image overlay" style="background-image: url('<?= the_field('reservation_bg', 'options')?>');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">
								<?= the_field('footer_reserve_text', 'options')?>
							</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">
								 <?= the_field('reservation_btn', 'options')?>
							</a>
            </div>
          </div>
        </div>
    </section>
			
			<footer class="section footer-section">
				<div class="container">
					<div class="row mb-4">
						<div class="col-md-3 mb-5">
							<ul class="list-unstyled link">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Rooms</a></li>
							</ul>
						</div>
						<div class="col-md-3 mb-5">
							<ul class="list-unstyled link">
								<li><a href="#">The Rooms &amp; Suites</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Restaurant</a></li>
							</ul>
						</div>

						<!-- Contacts -->
						<div class="col-md-3 mb-5 pr-md-5 contact-info">
							<?php 
								$contacts = get_field('contacts_menu', 'options');
								if( $contacts):
									foreach( $contacts as $contact ):?>
										<p>
											<span class="d-block">
												<span class="<?= 'ion-ios-'.$contact['contact_icon'];?> h5 mr-3 text-primary"></span>
													<?=$contact['contact_name']?>
												</span>
											<span>
												<?=$contact['contact_info']?>
											</span>
										</p>
										<?php
									endforeach;
								endif;			
							?>
						</div>

						<!-- News send subscription -->
						<div class="col-md-3 mb-5">
							<p>Sign up for our newsletter</p>
							<form action="#" class="footer-newsletter">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email...">
									<button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
								</div>
							</form>
						</div>

					</div>

					<div class="row pt-5">
						
						<!-- Copyright -->
						<p class="col-md-6 text-left">
							<?php
								the_field('copy_text','options');
								the_time('Y ');
								the_field('copy_rights','options');
								the_field('copy_template','options');
							?>
							<a href="<?= the_field('author_url','options');?>" target="_blank" > 
								<?php	the_field('author_name','options');?>
							</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>

							<!-- Social buttons -->
						<p class="col-md-6 text-right social">
							<?php 
								$social_nets = get_field('social_buttons', 'options');
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
