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
	background-color: #0E1A2C;
	position: relative;
	bottom: 0;
	width: 100%;
  }

  .row1{
	line-height: 40px;  
	text-align: center;  
	min-height: 40px;  
  }


.list_foo {
    list-style: none;
    padding: 0;
    flex: 0 1 auto;
    margin: 0;
    width: auto !important;
}
.footer-area .list_foo {
    width: auto !important;
}
.list_foo li {
    display: inline-block;
}
.list_foo a {
    color: rgba(255,255,255,0.5);
    font-size: 12px;
    text-decoration: none;
    font-family: 'Inter', sans-serif;
    transition: color 0.15s;
    white-space: nowrap;
}
.list_foo a:hover {
    color: rgba(255,255,255,0.85);
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
		<div style="display:flex;align-items:center;justify-content:space-between;padding:24px 40px;flex-wrap:nowrap;gap:24px;max-width:100%;">
			<a href="<?php echo base_url();?>" style="font-family:'Outfit',sans-serif;font-size:18px;font-weight:600;color:#fff;text-decoration:none;">azera<span style="color:#FCA311;">X</span></a>

			<ul class="list list_foo" style="display:flex;gap:14px;flex-wrap:nowrap;margin:0;flex:0 1 auto;min-width:0;">
				<li><a href="<?php echo base_url();?>about">About</a></li>
				<li><a href="<?php echo base_url();?>fee-charges">Fees & charges</a></li>
				<li><a href="<?php echo base_url();?>privacy">Terms of use</a></li>
				<li><a href="<?php echo base_url();?>privacy">Privacy</a></li>
				<li><a href="<?php echo base_url();?>contact-us">Contact</a></li>
			</ul>

			<p style="margin:0;color:rgba(255,255,255,0.3);font-size:12px;white-space:nowrap;">
				&copy; <?php echo date('Y'); ?> AzeraX. All rights reserved.
			</p>
		</div>
	</footer>



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