<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Career<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Career</a></li>
			<li class="active">Career</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('smsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Career</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">Admin/Footer_content/addcareers" name="f3" id="f3">
                 	<div class="box-body">
                 		<?php foreach ($careers as $value) {
                          ?>
                 		
						<div class="form-group">
							<label></label>
							<textarea name="careers" id="careers" class="form-control ckeditor" required="" ><?php echo $value['careers']; ?></textarea>
						</div>
					<?php	} ?>
                    
<button type="submit" class="btn btn-success">Submit</button>
				</div>
                 </form>
					
				</div>
			</div>
		</div>
    </section>
</div>

<?php include_once('include/footer.php'); ?>
