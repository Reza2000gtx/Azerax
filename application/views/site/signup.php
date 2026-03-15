<?php include_once 'include/header.php'; ?>
<style>
    #g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -70px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}

</style>
<section class="login_box_area p_120">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="<?php echo base_url();?>assets/site/img/login.jpg" alt="">
					<div class="hover">
						<h4>Already have an account?</h4>
						<a class="main_btn" href="<?php echo base_url();?>login">Login Here</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner reg_form">
					<h3>Create an Account</h3>
				<?php echo $this->session->flashdata('msg'); ?>

					<form class="row login_form" action="<?php echo base_url();?>signup-action" method="post" id="contactForm">
						<div class="col-md-12 form-group">
							<input type="text" required class="form-control" id="username" name="username" value="<?php echo set_value('username');?>" placeholder="Username">
							<div class="errorMessage" id="username_error" ><?php echo form_error('username'); ?></div>

						</div>
						<div class="col-md-12 form-group">
							<input type="email" required class="form-control" id="email" name="email" value="<?php echo set_value('email');?>" placeholder="Email Address">
								<div class="errorMessage" id="email_error" ><?php echo form_error('email'); ?></div>

						</div>
						<div class="col-md-12 form-group">
							<input type="password" required class="form-control" id="password" name="password"  value="<?php echo set_value('password');?>" placeholder="Password">
							<div class="errorMessage" id="password_error" ><?php echo form_error('password'); ?></div>

						</div>
						<div class="col-md-12 form-group">
							<input type="password" required class="form-control" id="pass" value="<?php echo set_value('cpassword');?>" name="cpassword"  placeholder="Confirm password">
							<div class="errorMessage" id="cpassword_error" ><?php echo form_error('cpassword'); ?></div>

						</div>
						
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div>
						<div class="col-md-12 form-group">

					    <div  class="g-recaptcha"  data-sitekey="6Ld_hmMcAAAAALWvQHDKgi4urWqvkk1I3qkue8y6">
					    
					    </div>
					    </div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="btn submit_btn">Register</button>
						</div>
						
						
                      </form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once 'include/footer2.php'; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    
window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};

</script>


