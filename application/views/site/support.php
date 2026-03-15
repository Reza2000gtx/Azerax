<?php include_once 'include/header.php'; ?>
<style type="text/css">
.home_banner_area.home_banner_area_about {
  background: #fff;
}
.img_right_side img {
  width: 100%;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
  height: 220px;
  object-fit: cover;
  border-radius: 10px;
  object-position: left center;
}
.sample-text-area p {
  line-height: 28px;
  width: 100%;
  font-size: 16px;
}
.clients_logo_area .clients_logo_area_about_area  {
  background: #fff;
  padding: 70px 0;
}
.right_img img {
  width: 100%;
}
.sample-text-area.about-area.about_values {
  background: #fff;
}
.sample-text-area.about-area.about_values p {
  line-height: 20px;
  width: 100%;
  font-size: 15px;
  color: #333;
} 
.sample-text-area.about-area.about_values h4 {
  font-size: 18px;
  color: #000;
}
.clients_logo_area.clients_logo_area_about_area.animated.fadeIn {
  background: #e5ecee !important;
  background: #fff;
  padding-top: 50px;
  padding-bottom: 50px;
}
.sample-text-area.about-area .title_color {
  color: #0a66c2;
  margin-bottom: 10px;
}
</style>

<section class="home_banner_area banner_services user_support">
  <div class="banner_inner d-flex align-items-center" style="padding-bottom: 30px;">
    <div class="container">
      <div class="banner_content row">
        <!-- <div class="col-lg-6">
          <div class="halemet_img">
            <img src="img/instruction.png" alt="">
          </div>
        </div> -->
         <div class="col-lg-5">
          <h3>Help & Support</h3>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
       <!--    <a class="main_btn" href="#">Read More</a> -->
        </div>
        <div class="col-lg-1"></div>
        
       
        
      </div>
    </div>
  </div>
</section>

<section class="faq_section">

  <div class="container">
  	<div class="row">
  		<div class="col-lg-8">
<?php  
$resultFooter = $this->common_model->GetAllData('ContentManagement');
 foreach ($resultFooter as $valueFoo) {

?> 
  		<aside class="left_widgets cat_widgets side_bar_nw left_widgets_help">
  		<div class="widgets_inner">
  			<ul class="list list_help">
  				<li>
  					<a href="#" class="heading_help">Help & Support<span class="lnr lnr-chevron-down"></span></a>
  					<ul class="list" style="display: block;">
  						<li class="d-flex justify-content-between align-items-center">
  							<?php echo $valueFoo["helpAndSupport"]; ?>
  						</li>
  					</ul>
  				</li>
  			</ul>
  		</div>
  	</aside>
<?php } ?>

  		</div>
  		<div class="col-lg-4">
  			<div class="google_ad">
					<img src="<?php echo base_url();?>assets/site/img/google_ad.png">
				</div>
  		</div>
  	</div>
  	
  </div>
  
</section>

<?php include_once 'include/footer.php'; ?>