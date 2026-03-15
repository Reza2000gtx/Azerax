<?php include_once 'include/header.php'; ?>
<section class="login_box_area p_120">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="<?php echo base_url();?>assets/site/img/login.jpg" alt="">
					<div class="hover">
						<h4>New to Azerax?</h4>
						<a class="main_btn" href="<?php echo base_url();?>signup">Create an Account</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h4>Great to see you again!</h4>
									<?php echo $this->session->flashdata('msg'); ?>

					<form class="row login_form" action="<?php echo base_url();?>do-login"  method="post" id="contactForm" >
						<div class="col-md-12 form-group">
							<input type="text" required name="email" placeholder="Email"  class="form-control" id="name" >
						<div class="errorMessage" id="email_error" ><?php echo form_error('email'); ?></div>

						</div>
						<div class="col-md-12 form-group">
								<input type="password" required name="password" placeholder="Password" class="form-control">
								<div class="errorMessage" id="password_error" ><?php echo form_error('password'); ?></div>

						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="btn submit_btn">Log In</button>
									<a href="<?php echo base_url();?>forgot-password">Forget Password?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once 'include/footer2.php'; ?>