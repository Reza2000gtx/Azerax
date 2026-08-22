<?php 
include_once('include/header.php'); 
		   $AdminType = $this->common_model->GetSingleData('admin',array('id'=>$_SESSION['admin_id']),'id','desc')['type'];

//print_r($_SESSION);
?>
<style>
	input[type=checkbox], input[type=radio] {
    margin: 10px 5px 10px;
    line-height: normal;
}
	</style>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Admin<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Admin</a></li>
			<li class="active">List</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
					    
						<h3 class="box-title">All Admin </h3>
						
						<?php if($AdminType==1) { ?>
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_create">Add Admin</button>
						<?php  }?>
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Profile </th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($admins as $row){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
									<?php
                              if($row['admin_image']!='')
                              {
                              	?>
                           <img style="width: 50px;" src="<?php echo base_url();?>assets/admin_profiles/<?php echo html_escape($row['admin_image']);?>">
                           <?php
                              }else{
                              	?>
                          <img src="<?php echo base_url();  ?>assets/profile/user.png" height="50" width="50">
                           <?php
                              }
                              ?>									
									</td>

									<td><?php echo html_escape($row['admin_name']); ?></td>
									<td><?php echo html_escape($row['admin_email']); ?></td>

									<td>
									<!--<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalpermission<?php echo html_escape($row['id']); ?>"><i class="fa fa-lock"></i></button>-->

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo html_escape($row['id']); ?>"><i class="fa fa-edit"></i></button>
										<form method="post" action="<?php echo base_url(); ?>Admin/delete/<?php echo html_escape($row['id']); ?>" style="display:inline;" onsubmit="return confirm('Are you sure want to delete this admin?');">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
										<button type="submit" class="btn btn-danger btn-xs" style="border:none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
										</form>
									</td>
								</tr>

																
								 <div class="modal" id="myModal<?php echo html_escape($row['id']); ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								     
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Admin</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      
								      <div id="error<?php echo html_escape($row['id']); ?>"></div>
											<form method="post" action="<?php echo base_url();?>Admin/update" id="addadmin" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
								       <div class="form-group">
								       	<label>Admin Name</label>
								       	<input type="text" required name="admin_name" value="<?php echo html_escape($row['admin_name']); ?>" class="form-control">
								       </div>

								       <div class="form-group">
								       	<label>Admin Email</label>
								       	<input type="email" required name="admin_email" value="<?php echo html_escape($row['admin_email']); ?>" class="form-control">
								       </div>

								      <div class="form-group">
								       	<label>Admin Password</label>
								       	<input type="password" name="admin_password" placeholder="Leave blank to keep current password" class="form-control">
								       </div>

								       <div class="form-group">
								       	<label>Admin Image</label>
								       	<input type="file" name="admin_image" accept="image/*" style="margin-bottom: 10px;">
												 <?php
                              if($row['admin_image']!='')
                              {
                              	?>
                           <img style="width: 50px;" src="<?php echo base_url();?>assets/admin_profiles/<?php echo html_escape($row['admin_image']);?>">
                           <?php
                              }else{
                              	?>
                          <img src="<?php echo base_url();  ?>assets/profile/user.png" height="50" width="50">
                           <?php
                              }
                              ?>								       </div>
								      </div>
								      <input type="hidden" name="admin_id" value="<?php echo html_escape($row['id']); ?>">
								    
								      <div class="modal-footer">
								      	  <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Update</button>
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
<div class="modal" id="myModal_create">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>Admin/create" id="addadmin" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
       	<label>Admin Name</label>
       	<input type="text" name="admin_name" required class="form-control">
       </div>
			 <div class="form-group">
       	<label>Admin Email</label>
       	<input type="email" name="admin_email" required class="form-control">
       </div>
			 <div class="form-group">
       	<label>Admin Passoword</label>
       	<input type="password" name="admin_password" required class="form-control">
       </div>
      
       <div class="form-group">
       	<label>Admin Profile Image</label>
       	<input type="file" name="admin_image" accept="image/*">
       </div>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
      	  <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php include_once('include/footer.php'); ?>
