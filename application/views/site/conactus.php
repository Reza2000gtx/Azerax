<?php include_once 'include/header2.php' ; ?>

<style type="text/css">


</style>

<section class="banner_area map_area">
	<div class="contact_banner">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<!--<h2>Contact Us</h2>-->
						<div class="page_link">
							<br>
							<br>
						<a href="<?php echo base_url();?>">Home</a>
						<a href="<?php echo base_url();?>contact-us">Contact Us</a>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="contact_area p_80">
	<div class="container">
		
		<div class="row">
			<!-- <div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6>NW Lorem ipsum, United States</h6>
						<p>lorem ipsum bullevard</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6><a href="#">00 (121) 000 211</a></h6>
						<p>Mon to Fri 9am to 6 pm</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="#"><span class="__cf_email__" data-cfemail="4a393f3a3a25383e0a292526253826232864292527">info@gmail.com</span></a></h6>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div> -->
			<div class="col-lg-12">
			<?php echo $this->session->flashdata('msg'); ?>

				<form action="<?php echo base_url();?>contact-us-action" method="post">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Name</label>
							<input type="text" required name="username"  value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Name">
										    <div class="errorMessage"><?php echo form_error('username'); ?></div>

						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" required name="email"  value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
										    <div class="errorMessage"><?php echo form_error('email'); ?></div>

						</div>
					</div>
					<!--<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<input type="text" required name="address"  value=" <?php echo set_value('address'); ?>" class="form-control" placeholder="Address">
										    <div class="errorMessage"><?php echo form_error('address'); ?></div>

						</div>
					</div>-->
				</div>	
				<!--<div class="row">
					
					<div class="col-sm-6">
						<div class="form-group">
							<label>Phone</label>
							<input type="text" required name="phone"  value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Enter Your Phone Number">
										    <div class="errorMessage"><?php echo form_error('phone'); ?></div>

						</div>
					</div>
					
				</div>-->	

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Subject</label>
							<input type="text" required name="subject"  value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="Subject">
										    <div class="errorMessage"><?php echo form_error('subject'); ?></div>

						</div>
					</div>
					
				</div>

				<div class="form-group">
				<label>Message</label>
				<textarea class="form-control" required name="message" placeholder="Type your message here..."> <?php echo set_value('message'); ?></textarea>
							    <div class="errorMessage"><?php echo form_error('message'); ?></div>

			</div>		

			
		
			<div class="col-md-12 text-right">
						<button type="submit" value="submit" class="btn submit_btn">Send</button>
					</div>
			
			</form>
			</div>
		</div>

		<!-- <div class="gmap mt-25">
			<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6681407.9469527!2d-101.08512130475837!3d35.14648845428606!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1613459273851!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div> -->


	</div>
	
</section>

<?php include_once 'include/footer2.php' ; ?>