<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Brand<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Brand</a></li>
			<li class="active">List</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msgf'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Brands </h3>
						<?php if($admin_permission_single && $admin_permission_single['add']=='YES') { ?>

						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add brand</button>
						<?php	} ?>
					
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Brand Name</th>
									<th>Brand Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($brandlist as $row){ 
									?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['brand_name']; ?></td>
									<td><img src="<?php echo base_url();  ?>/assets/admin/brand_img/<?php echo $row['brand_image']; ?>" ></td>
								<td>
								<?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['brand_id']; ?>"><i class="fa fa-edit"></i></button>
										<?php	} ?>
										<?php if($admin_permission_single && $admin_permission_single['delete']=='YES') { ?>

										<a onclick="return confirm('Are you sure want to delete this brand?');" href="<?php echo base_url(); ?>Admin/Brand/deletebrand/<?php echo $row['brand_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
								
										<?php	} ?>	</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo $row['brand_id']; ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Brand</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo $row['brand_id']; ?>"></div>
								     <form method="post" enctype='multipart/form-data' action="<?php echo base_url();?>Admin/Brand/edit_brand">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
								      	 
								       <div class="form-group">
								       	<label>Brand Name</label>
								       	<input type="text" name="brand_name" required value="<?php echo $row['brand_name']; ?>" class="form-control">
								       </div>
											 <div class="form-group">
								       	<label>Brand Image</label>
								       	<input type="file" name="brand_image" accept="image/*" style="margin-bottom: 10px;">
								       	<img src="<?php echo base_url();  ?>/assets/admin/brand_img/<?php echo $row['brand_image']; ?>" height="50" width="50">
								       </div>
								      </div>
								      <input type="hidden" name="brand_id" value="<?php echo $row['brand_id']; ?>">
								      <!-- Modal footer -->
								      <div class="modal-footer">
								      	  <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								      </div>
								    </form>
								    </div>
								  </div>
								</div>
								<?php $i++;} ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Brand</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post"  enctype='multipart/form-data' action="<?php echo base_url();?>Admin/Brand/add_brand" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
      	
       <div class="form-group">
       	<label>Brand Name</label>
       	<input type="text" name="brand_name" required class="form-control">
       </div>
			 <div class="form-group">
								       	<label>Brand Image</label>
								       	<input type="file"required name="brand_image" accept="image/*" style="margin-bottom: 10px;">
								       </div>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
      	  <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php include_once('include/footer.php'); ?>
