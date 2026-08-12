<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>SiteMap<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">SiteMap</a></li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
					<p>
			Download sitemap.xml 
					</p>
						<a href="<?php echo base_url();?>sitemap.xml" download type="button" class="btn btn-primary" >Download</a>
					</div>
					<div class="box-body">

					<form method="post" action="<?php echo base_url() ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">Admin/update_site_map" name="f3" id="f3" enctype='multipart/form-data'>

					<div class="form-group">
								<label class=" form-control-label">Upload new xml file</label>
								<input type="file" name="site_map" accept="text/xml">
								<br/>
							</div>
							<?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

							<button type="submit" class="btn btn-success">Submit</button>
							<?php	} ?>
							</form>
							</div>

  </div>
</div>
</div>
</div>
<?php include_once('include/footer.php'); ?>
