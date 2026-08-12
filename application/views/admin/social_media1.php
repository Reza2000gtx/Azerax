<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>Social<small>Media</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">More Information</h3>
					</div>
					<!-- /.box-header -->
						<?php 
						$socialdata = $this->common_model->GetSingleData('admin_social_link');
						// print_r($socialdata);
						 ?>
					<!-- form start -->
					<form role="form" method="post" id="profile_form" action="<?php echo site_url().'Admin/Social_media/social_link'; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<div class="box-body">
							<div class="form-group">
								<label class=" form-control-label">Facebook</label>
								<input type="url" name="facebook"  value="<?php echo $socialdata['facebook'] ?>" class="form-control" >
								<input type="hidden" name="id" value="<?php echo $socialdata['id'] ?>">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Twitter</label>
								<input type="url" name="twitter"  value="<?php echo $socialdata['twitter'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Google Plus</label>
								<input type="url" name="google_plus"  value="<?php echo $socialdata['google_plus'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Youtube</label>
								<input type="url" name="youtube"  value="<?php echo $socialdata['youtube'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Linkedin</label>
								<input type="url" name="linkedin"  value="<?php echo $socialdata['linkedin'] ?>" class="form-control" >
							</div>
						</div>
						<div class="box-footer">
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>
    </section>
</div>
 
<?php include_once('include/footer.php'); ?>
