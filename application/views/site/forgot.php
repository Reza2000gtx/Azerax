<?php include_once 'include/header.php'; ?>
<section class="login_box_area p_120">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="<?php echo base_url();?>assets/site/img/login.jpg" alt="">
					<div class="hover">
						<h4>New to our website?</h4>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
						<a class="main_btn" href="<?php echo base_url();?>signup">Create an Account</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Forgot Password</h3>
					<?php echo $this->session->flashdata('msg'); ?>

					<form class="row login_form"  method="post" id="contactForm"  action="<?php echo base_url();?>send-password-mail">
						<div class="col-md-12 form-group">
							<input required type="email" class="form-control" id="name" name="email" placeholder="info@gmail.com">
							<div class="errorMessage" id="email_error" ><?php echo form_error('email'); ?></div>
						</div>
						<!-- <div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Password">
						</div> -->
						<!-- <div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div> -->
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="btn submit_btn">Forgot Password</button>
							<!-- <a href="#">Forgot Password?</a> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once 'include/footer.php'; ?>