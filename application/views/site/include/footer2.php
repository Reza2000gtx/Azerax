<style>
  .above-footer{
    width: 100%;
    background: #E5E5E5;
    color:black;
    padding: 10px;
    border: none;
	box-shadow: 0px 2px 5px #888888 inset;
  }

   .col-lg-12{
	  max-height: 25px;
  }
  
  .footer-area {
	background-color: #fff;
	position: relative;
	bottom: 0;
	width: 100%;
  	
  }

  .rowall{
	height:100px;
	width: 100%;
	background-color: #fff;
	
  }

  .containerbig{
	height: 45px;
	background-color: #14213D;
  }

  .lower-footer{
	padding: 8px;
	margin: 0px;
	height: 40px;
	width: 100%;
	background-color: #fff;


  }

  .row1{
	line-height: 40px;  
	text-align: center;  
	min-height: 40px;  
  }

</style>
<?php 
$product1 = $this->common_model->GetAllData('product',array('status'=>1));
$active=count($product1);
$product2 = $this->common_model->GetAllData('product',array('status'=>0));
$pending=count($product2);
$result=$active+$pending;
?>
<!--<div class="above-footer footer-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="list-devices">
         <!--<h4 style="text-align:right;">Listed Devices: <?php echo $result;?> </h4>
		 <h4 style="text-align:right;"> </h4> 
        </div>
      </div>
    </div>
  </div>
</div>-->
	<footer class="footer-area">
		<div class="containerbig">
			<div class="container">
				<div class="row1">
												
	<?php  $resultFooter = $this->common_model->GetAllData('ContentManagement');
 			foreach ($resultFooter as $valueFoo) {
	}
?> 
					<ul class="list list_foo">
                       <li><a  href="<?php echo base_url();?>about" >About</a>
                        <a href="<?php echo base_url();?>fee-charges" >Fees & Charges</a>
                        <a href="<?php echo base_url();?>privacy" >Terms Of Use</a>
                        <a href="<?php echo base_url();?>how_its_work" >How it works</a>
                    	<a href="<?php echo base_url();?>support" >Help and Support</a>
						<a href="<?php echo base_url();?>sitemap" >Sitemap</a>
                    	<a href="<?php echo base_url();?>contact-us" >Contact Us</a></li>
					</ul></li>
                        
                  </div>
			</div>
									<!-- <div class="col-lg-4 col-md-6 col-sm-6">
										<div class="single-footer-widget">
											<h6 class="footer_title">Newsletter</h6>
<?php  
$resultFooter = $this->common_model->GetAllData('ContentManagement');
foreach ($resultFooter as $valueFoo) {
echo $valueFoo["newLetter"];
}
?> 
											<div id="mc_embed_signup">
												<form target="_blank" action="" class="subscribe_form relative">
													<div class="input-group d-flex flex-row">
														<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" type="email">
														<button onclick="alert('comming soon');" class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
													</div>
													<div class="mt-10 info"></div>
												</form>
											</div>
										</div>
									</div> -->
									
									</div>
								</div>
								<!-- <style>
    									#ssl a{
        								  float:right;
  										  }
									</style>
									<div id="ssl">
									<script language="JavaScript" type="text/javascript">
									TrustLogo("https://azerax.com/sectigo_trust_seal_sm_82x32.png", "CL1", "none");
									</script>
									<a href="https://ssl.comodo.com" id="comodoTL">Comodo SSL</a>
									</div> 
								<div class="row footer-bottom d-flex justify-content-between align-items-center"> -->
								<div class="lower-footer">	
									<p class="col-lg-12 footer-text text-center">
										Copyright &copy; 2021 AzeraX, All Rights Reserved.</a>
									</p>
								</div>
							</footer>



						<script src="<?php echo base_url();?>assets/site/js/jquery-3.2.1.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/js/popper.js"></script>
						<script src="<?php echo base_url();?>assets/site/js/bootstrap.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/js/stellar.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//lightbox/simpleLightbox.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//nice-select/<?php echo base_url();?>assets/site/js/jquery.nice-select.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//isotope/imagesloaded.pkgd.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//isotope/isotope-min.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//owl-carousel/owl.carousel.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/js/jquery.ajaxchimp.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/js/mail-script.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//counter-up/jquery.waypoints.min.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//flipclock/timer.js"></script>
						<script src="<?php echo base_url();?>assets/site/vendors//counter-up/jquery.counterup.js"></script>
						<script src="<?php echo base_url();?>assets/site/js/theme.js"></script>

<script>
function myFunction() {
  alert("comming Soon");
}
</script>

	   </body>
	</html>