<?php include_once 'include/header.php'; ?>
<style type="text/css">

.Chng_pass{
	height: 820px;
}
</style>
<Section class="Chng_pass">
	<div class="commn_dasboard p_120">
		<div class="container">
			<div class="row">
			<!-- <div class="col-sm-3">
				

<?php //include_once 'include/sidebar.php';?>

			</div> -->
			<div class="col-sm-6 mx-auto">
				<div class="right_box">
					<div class="heddding_1">
						<h4>Change Password</h4>
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
							<form action="<?php echo base_url(); ?>change-password-action" method="post">

					<div class="form-group">
						<label>Current password </label>
                                <input required type="password"  name="user_password" placeholder="Enter your old password here" class="form-control">
								<div class="errorMessage">  <?php echo form_error('user_password');?> </div>					</div>
					<div class="form-group">
						<label>New Password</label>
								<input required type="password"  name="New_Password"  placeholder="Enter new password" class="form-control">
								<div class="errorMessage">  <?php echo form_error('New_Password');?> </div>					</div>
					<div class="form-group">
						<label>Confirm Password </label>
								<input required type="password"  name="Confirm_Password" placeholder="Enter password" class="form-control">
								<div class="errorMessage">  <?php echo form_error('Confirm_Password');?> </div>						</div>
					<div class="form-group">
						<button class="btn submit_btn">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</Section>
<?php include_once 'include/footer2.php'; ?>