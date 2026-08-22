<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Site Meta<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Meta</a></li>
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
						<h3 class="box-title">All Meta </h3>
						<!-- <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add Category</button> -->
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Page Name</th>
									<th>Page Url</th>
									<th>Page Title</th>
									<th>Meta Keywords Attribute</th>
									<th>Meta Description Attribute</th>
									<th>Meta Robots Attribute 	</th>

									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($meta as $row){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo html_escape($row['page_title']); ?></td>
									<td><?php echo base_url().$row['page_url']; ?></td>
									<td><?php echo html_escape($row['site_title']); ?></td>
									<td><?php echo html_escape($row['meta_key_attribute']); ?></td>
									<td><?php echo html_escape($row['meta_description_attribute']); ?></td> 
									<td><?php echo html_escape($row['meta_robots_attribute']); ?></td> 

									<td>
									<?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo html_escape($row['meta_id']); ?>"><i class="fa fa-edit"></i></button>
								
										<?php	} ?>
											</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo html_escape($row['meta_id']); ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Category</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo html_escape($row['meta_id']); ?>"></div>
								     <form method="post" action="<?php echo base_url();?>Admin/update_site_meta">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
								       <div class="form-group">
								       	<label>Page Title</label>
								       	<input type="text" name="site_title" value="<?php echo html_escape($row['site_title']); ?>" class="form-control">
								       </div>

								       <div class="form-group">
								       	<label>Meta Keywords Attribute</label>
								       	<textarea class="form-control" name="meta_key_attribute"><?php echo html_escape($row['meta_key_attribute']); ?></textarea> 
								       </div>
											 <div class="form-group">
								       	<label>Meta Description Attribute</label>
								       	<textarea class="form-control" name="meta_description_attribute"><?php echo html_escape($row['meta_description_attribute']); ?></textarea> 
								       </div>
											 <div class="form-group">
								       	<label>Meta Robots  Attribute</label>
								       	<textarea class="form-control" name="meta_robots_attribute"><?php echo html_escape($row['meta_robots_attribute']); ?></textarea> 
								       </div>      

								      </div>
								      <input type="hidden" name="meta_id" value="<?php echo html_escape($row['meta_id']); ?>">
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
        <h4 class="modal-title">Edit Meta</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" onsubmit="return addcategory();" id="addcategory">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
       	<label>Category Name</label>
       	<input type="text" name="cat_title" class="form-control">
       </div>

       <div class="form-group">
       	<label>Category Description</label>
       	<textarea class="form-control" name="cat_desc"></textarea> 
       </div>

       <div class="form-group">
       	<label>Choose package</label><br>
       	<label class="radio-inline"><input type="radio" name="package" value="1">Prime</label>
       	<label class="radio-inline"><input type="radio" name="package" value="0">NonPrime</label>
       	<label class="radio-inline"><input type="radio" name="package" value="2">Both</label>
       </div>

       <div class="form-group">
       	<label>Category Image</label>
       	<input type="file" name="cat_image" accept="image/*">
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
