<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Support<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Support</a></li>
			<li class="active"></li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('smsg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Support</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/Footer_content/addsupport" name="f3" id="f3">
                 	<div class="box-body">
                 		<?php foreach ($about_us as $value) {
                          ?>
                 		
						<div class="form-group">
							<label></label>
							<textarea name="support" value="" class="form-control ckeditor" required="" ><?php echo $value['support']; ?></textarea>
						</div>
					<?php	} ?>
                    <?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

<button type="submit" class="btn btn-success">Submit</button>
<?php	} ?>					</div>
                 </form>
					
				</div>
			</div>
		</div>
    </section>
</div>

<?php include_once('include/footer.php'); ?>
