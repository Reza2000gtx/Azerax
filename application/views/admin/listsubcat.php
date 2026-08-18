<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Sub category<small>Management</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Sub category</a></li>
			<li class="active">List</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msgs'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Sub categories </h3>
						<?php if($admin_permission_single && $admin_permission_single['add']=='YES') { ?>

						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add Sub category</button>
						<?php	} ?>
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Name</th>
									<th>Description</th>
									<th>Category name</th>
						
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($subcatlist as $row){ 
                                 $cat= $this->common_model->GetSingleData('category',array('cat_id'=>$row['cat_id']));
									?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['sub_name']; ?></td>
									<td><?php echo $row['sub_desc']; ?></td>
									<td><?php echo $cat['cat_title']; ?></td>
									
									<td>
									<?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['sub_cat_id']; ?>"><i class="fa fa-edit"></i></button>
										<?php	} ?>
										<?php if($admin_permission_single && $admin_permission_single['delete']=='YES') { ?>
										<a onclick="return confirm('Are you sure want to delete this subcategory?');" href="<?php echo base_url(); ?>Admin/Subcategory/deletesubcat/<?php echo $row['sub_cat_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
										<?php	} ?>
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo $row['sub_cat_id']; ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Subcategory</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo $row['cat_id']; ?>"></div>
								     <form method="post" onsubmit="return editsubcategory(<?php echo $row['sub_cat_id']; ?>);" id="editsubcategory<?php echo $row['sub_cat_id']; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
									  <div class="form-group">
								       	<label>Category</label>
								       	<select class="form-control" name="cat_id">
								       		<option value="">Select category</option>
								       		<?php foreach ($catlist as $value) { ?>
								       		<option value="<?php echo $value['cat_id']; ?>" <?php if($value['cat_id']==$cat['cat_id']){ echo "selected";} ?>><?php echo $value['cat_title']; ?></option>
								       		<?php } ?>
								       	</select>
								       </div>

								       <div class="form-group">
								       	<label>SubCategory Name</label>
								       	<input type="text" name="sub_name" value="<?php echo $row['sub_name']; ?>" class="form-control">
								       </div>

								       <div class="form-group">
								       	<label>SubCategory Description</label>
								       	<textarea class="form-control" name="sub_desc"><?php echo $row['sub_desc']; ?></textarea> 
								       </div>
								       				
								      </div>
								      <input type="hidden" name="sub_cat_id" value="<?php echo $row['sub_cat_id']; ?>">
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
        <h4 class="modal-title">Add Subcategory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" onsubmit="return addsubcategory();" id="addsubcategory">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">

      <div class="form-group">
       	<label>Category</label>
       	<select class="form-control" name="cat_id">
       		<option value="">Select category</option>
       		<?php foreach($catlist as $value) { ?>
       		<option value="<?php echo $value['cat_id']; ?>"><?php echo $value['cat_title']; ?></option>
       		<?php } ?>
       	</select>
       </div>

       <div class="form-group">
       	<label>SubCategory Name</label>
       	<input type="text" name="sub_name" class="form-control">
       </div>

       <div class="form-group">
       	<label>SubCategory Description</label>
       	<textarea class="form-control" name="sub_desc"></textarea> 
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
