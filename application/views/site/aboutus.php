<?php include_once 'include/header2.php'; ?>
<style type="text/css">
	/*.about-area .text-heading.title_color {
	font-size: 35px;
	text-align: center;
	color: #0a66c2;
}*/
/*.about-area .sample-text {
	font-size: 18px;
	line-height: 35px !important;
	color: #333;
	text-align: center;
	width: 70%;
	margin: 0 auto;
}
*/
.home_banner_area.home_banner_area_about {
	background: #fff;
}
.img_right_side img {
	width: 100%;
	box-shadow: 0 10px 29px rgba(0, 0, 0, 0.09);
	height: 300px;
	object-fit: cover;
	border-radius: 30px;
}
.sample-text-area p {
	color: #777;
}
/*.sample-text-area.about-area {
	background: #e8f0f2;
}*/
.clients_logo_area .clients_logo_area_about_area  {
	background: #fff;
	padding: 70px 0;
}
.right_img img {
	width: 100%;
	margin-top: 20px;
	border-radius: 25px;
}
.sample-text-area.about-area.about_values {
	background: #fff;
}
.sample-text-area.about-area.about_values p {
	line-height: 20px;
	font-size: 15px;
	color: #777;
} 
.sample-text-area.about-area.about_values h4 {
	font-size: 16px;
	color: #000;
}
.clients_logo_area.clients_logo_area_about_area.animated.fadeIn {
	/*background-image: url('img/banner222.jpg') !important;*/
	background: #e5ecee !important;
	background: #fff;
	padding-top: 50px;
	padding-bottom: 50px;
}
.sample-text-area.about-area .title_color {
	color: #14213D;
font-size: 30px;
}
</style>
<!--section class="home_banner_area banner_services">
	<div class="banner_inner d-flex align-items-center" style="padding-bottom: 30px;">
		<div class="container">
			<div class="banner_content row">
				 <div class="col-lg-6">
					<div class="halemet_img">
						<img src="<?php echo base_url();?>assets/site/img/about.png" alt="">
					</div>
				</div> 
				<div class="col-lg-5">
					<h3>About</h3>
					<p style="text-align: justify;">
<?php  
/*$resultFooter = $this->common_model->GetAllData('ContentManagement');
 foreach ($resultFooter as $valueFoo) {
echo $valueFoo["about"];
}*/
?> 						

					</p>
					<!--<a class="main_btn" href="#">Read More</a>
				</div>
				<div class="col-lg-1"></div>
				
			</div>
		</div>
	</div>
</section>-->

<section class="sample-text-area about-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3 class="text-heading title_color">Why Azerax?</h3>
				<p class="sample-text" style="text-align: justify;">
<?php  
$resultFooter = $this->common_model->GetAllData('ContentManagement');
 foreach ($resultFooter as $valueFoo) {
echo $valueFoo["who_we_are"];
}
?>					
				</p>
			</div>
			<div class="col-lg-6">
				<div class="img_right_side">
						<img src="<?php echo base_url();?>assets/site/img/about_us.png" alt="">
					</div>
			</div>
		</div>
		
	</div>
</section>

<section class="sample-text-area about-area about_values">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="right_img">
						<img src="<?php echo base_url();?>assets/site/img/Wide_Broadcast.jpg" alt="">
					</div>
			</div>

			<div class="col-lg-6">
				<h3 class="text-heading title_color">Our Servises</h3>
				<h4>For Professionals</h4>
				<p class="sample-text" style="text-align: justify;">
					Azerax provides a smart search mechanism that helps professionals find the exact match for the search criteria.
				</p>
				<br>

				<h4>For Suppliers</h4>
				<p class="sample-text" style="text-align: justify;">
					Thanks to the powerful search mechanism, listing devices with Azerax makes them discoverable faster and easier.
				</p>
				<br>

				<h4>For Broadcasters</h4>
				<p class="sample-text" style="text-align: justify;">
					Designing an E2E solution with Azerax is easy!
				</p>
			</div>
			
		</div>
		
	</div>
</section>

<!--<section class="clients_logo_area clients_logo_area_about_area animated fadeIn">-->
<!--	<div class="container">-->
<!--		<div class="main_title">-->
<!--			<h2 class="no-marg">Top Brands</h2>-->
<!--			<p >Who are in extremely love with eco friendly system.</p>-->
<!--		</div>-->
<!--		<div class="clients_slider owl-carousel">-->
<!--			<div class="item">-->
<!--				<img src="<?php echo base_url();?>assets/site/img/clients-logo/c-logo-1.png" alt="">-->
<!--			</div>-->
<!--			<div class="item">-->
<!--				<img src="<?php echo base_url();?>assets/site/img/clients-logo/c-logo-2.png" alt="">-->
<!--			</div>-->
<!--			<div class="item">-->
<!--				<img src="<?php echo base_url();?>assets/site/img/clients-logo/c-logo-3.png" alt="">-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->

<section class="contact_area p_80" id="contactRequestFormDiv">
	<div class="container">
		
		<div class="row">
			<div class="col-lg-3">
				<div class="contact_info">
					
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="#"><span class="__cf_email__" data-cfemail="4a393f3a3a25383e0a292526253826232864292527">info@azerax.com</span></a></h6>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
		
			<?php echo $this->session->flashdata('msg'); ?>

				<form action="<?php echo base_url();?>about-us-action" method="post">
			     <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" required name="username"  value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Your Name">
    					    <div class="errorMessage"><?php echo form_error('username'); ?></div>
						</div>
						<div class="form-group">
						    <input type="email" required name="email"  value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email address">
							<div class="errorMessage"><?php echo form_error('email'); ?></div>
						</div>
						<div class="form-group">
						 <input type="text" required name="subject"  value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="Subject">
						 <div class="errorMessage"><?php echo form_error('subject'); ?></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
				   	      <textarea class="form-control" required name="message" style="margin-top: 0px; margin-bottom: 0px; height: 147px;" placeholder="Tell us something here..."><?php echo set_value('message'); ?></textarea>
			              <div class="errorMessage"><?php echo form_error('message'); ?></div>
						</div>
					</div>
				  </div>	
					
					<div class="col-md-12 text-right">
						<button type="submit" value="submit" class="btn submit_btn">Send</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</section>
<div class="spacer"></div>








<?php include_once 'include/footer2.php'; ?>
<?php if($_REQUEST['success']==1) {?>
<script>
$(document).ready(function(){
        $('html, body').animate({
      scrollTop: $("#contactRequestFormDiv").offset().top
    }, 1000)

  
});
</script>

<?php  }?>
