<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Social<small>Media</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Social</a></li>
			<li class="active">Media</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('tmsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Social Media</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/Footer_content/addsocial_media" name="f3" id="f3">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 	<div class="box-body">
                 		<?php foreach ($social_media as $value) {
                          ?>
                 		
						<div class="form-group">
							
							<div class="col-md-6">
								<label>Facebook Link</label>
								<input type="" name="facebook_link" class="form-control" value="<?php echo $value['facebook_link']; ?>">
							</div>

							<div class="col-md-6">
								<label>Instagram Link</label>
								<input type="" name="instagram_link" class="form-control" value="<?php echo $value['instagram_link']; ?>">
							</div>

							<div class="col-md-6">
								<label>Twitter Link</label>
								<input type="" name="twitter_link" class="form-control" value="<?php echo $value['twitter_link']; ?>">
							</div>

							<div class="col-md-6">
								<label>Youtube Link</label>
								<input type="" name="youtube_link" class="form-control" value="<?php echo $value['youtube_link']; ?>">
							</div>

							<div class="col-md-6">
								<label>Google Link</label>
								<input type="" name="google_link" class="form-control" value="<?php echo $value['google_link']; ?>">
							</div>
							
							
						</div>
					<?php	} ?>
                    

				</div><center><button type="submit" class="btn btn-success">Submit</button></center>
			<br>
                 </form>
					
				</div>
			</div>
		</div>
    </section>
</div>

<?php include_once('include/footer.php'); ?>
