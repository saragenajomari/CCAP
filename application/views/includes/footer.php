<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<img src="<?php echo base_url(); ?>assets/img/logo.png">
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
        			<h5>About Us</h5>
					<p>
            		Cebu Cars and Parts is a company that helps the community to sell, trade, or look for an automobile or the parts and components
            		the people need within Cebu. 
          			</p>
					<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
					</div>
					</hr>
					</div>	
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
        			<h5>Links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="<?php echo site_url('pages/index'); ?>"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="<?php echo site_url('pages/home'); ?>"><i class="fa fa-angle-double-right"></i>Products</a></li>
						<?php
							if(isset($_SESSION['type'])){
								echo '<li><a href="'.site_url('dbProcess/logout').'"><i class="fa fa-angle-double-right"></i>Logout</a></li>';
							}else{
								echo '<li><a href="'.site_url('pages/login').'"><i class="fa fa-angle-double-right"></i>Login</a></li>';
							}
						?>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQs</a></li>
					</ul>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="<?php echo base_url(); ?>">Cebu Cars and Parts</a></u> | University of San Carlos Talamban Campus | Address: Nasipit Talamban, Cebu City 6000 | Contact: CebuCebuandParts_support@gmail.com</p>
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="<?php echo base_url(); ?>" target="_blank"> Cebu Cars and Parts Inc.</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
  </body>
  </html>