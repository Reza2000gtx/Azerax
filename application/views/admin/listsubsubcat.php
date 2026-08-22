<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Sub Sub category<small>Management</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Sub Sub category</a></li>
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
						<h3 class="box-title">All Sub Sub categories </h3>
						
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add Sub Sub category</button>
						
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
									<th>Sub Category name</th>
						
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($subsubcatlist as $row){ 
                                 $cat= $this->common_model->GetSingleData('category',array('cat_id'=>$row['cat_id']));
                                 $subcat= $this->common_model->GetSingleData('subcategory',array('sub_cat_id'=>$row['sub_cat_id']));
									?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo html_escape($row['sub_sub_name']); ?></td>
									<td><?php echo html_escape($row['sub_sub_desc']); ?></td>
									<td><?php echo $cat['cat_title']; ?></td>
									<td><?php echo $subcat['sub_name']; ?></td>
									
									<td>
									
										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo html_escape($row['subsub_cat_id']); ?>"><i class="fa fa-edit"></i></button>
										
										<form method="post" action="<?php echo base_url(); ?>Admin/SubSubcategory/deletesubsubcat/<?php echo html_escape($row['subsub_cat_id']); ?>" style="display:inline;" onsubmit="return confirm('Are you sure want to delete this subsubcategory?');">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
										<button type="submit" class="btn btn-danger btn-xs" style="border:none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
										</form>
										
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo html_escape($row['subsub_cat_id']); ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit SubSubcategory</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo html_escape($row['subsub_cat_id']); ?>"></div>
								     <form method="post" onsubmit="return editsubsubcategory(<?php echo html_escape($row['subsub_cat_id']); ?>);" id="editsubsubcategory<?php echo html_escape($row['subsub_cat_id']); ?>">
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
								       	<label>Sub Category</label>
								       	<select class="form-control" name="sub_cat_id">
								       		<option value="">Select category</option>
								       		<?php foreach ($subcatlist as $value) { ?>
								       		<option value="<?php echo $value['sub_cat_id']; ?>" <?php if($value['sub_cat_id']==$subcat['sub_cat_id']){ echo "selected";} ?>><?php echo $value['sub_name']; ?></option>
								       		<?php } ?>
								       	</select>
								       </div>

								       <div class="form-group">
								       	<label>SubSubCategory Name</label>
								       	<input type="text" name="sub_sub_name" value="<?php echo html_escape($row['sub_sub_name']); ?>" class="form-control">
								       </div>

								       <div class="form-group">
								       	<label>SubSubCategory Description</label>
								       	<textarea class="form-control" name="sub_sub_desc"><?php echo html_escape($row['sub_sub_desc']); ?></textarea> 
								       </div>
								       				
								      </div>
								      <input type="hidden" name="subsub_cat_id" value="<?php echo html_escape($row['subsub_cat_id']); ?>">
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
        <h4 class="modal-title">Add SubSubcategory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" onsubmit="return addsubsubcategory();" id="addsubsubcategory">
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
       	<label>Sub Category</label>
       	<select class="form-control" name="sub_cat_id">
       		<option value="">Select Sub category</option>
       		<?php foreach($subcatlist as $value) { ?>
       		<option value="<?php echo $value['sub_cat_id']; ?>"><?php echo $value['sub_name']; ?></option>
       		<?php } ?>
       	</select>
       </div>

       <div class="form-group">
       	<label>SubSubCategory Name</label>
       	<input type="text" name="sub_sub_name" class="form-control">
       </div>

       <div class="form-group">
       	<label>SubSubCategory Description</label>
       	<textarea class="form-control" name="sub_sub_desc"></textarea> 
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
