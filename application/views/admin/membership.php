<?php 
include_once('include/header.php'); 
$readonly='readonly';
$readonly1='readonly';

?>
    <!-- <link href="https://www.webwiders.com/WEB01/Buyer-Seller/assets/css/style.css" rel="stylesheet"> -->

<style>
.switch {
  display: inline-block;
  float: right;
  height: 34px;
  position: relative;
  width: 60px;
}
.switch input {
  display: none;
}
.slider.round::before {
  border-radius: 50%;
}
.slider::before {
  background-color: white;
  bottom: 4px;
  content: "";
  height: 26px;
  left: 4px;
  position: absolute;
  transition: all 0.4s ease 0s;
  width: 26px;
}
.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 0.4s ease 0s;
}
.slider.round {
  border-radius: 34px;
}
input:checked + .slider::before {
  transform: translateX(26px);
}
input.primary:checked + .slider {
  background-color: #7611ff;
}

.rado_sel {
  min-height: 34px;
  padding-right: 75px;
  position: relative;
  padding-top: 6px;
  margin-bottom: 10px;
}
.rado_sel p {
  margin: 0;
  position: absolute;
  right: 0;
  top: 0;
}
</style> 

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">

<div class="content-wrapper">
    <section class="content-header">
		<h1>Package<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Packages</a></li>
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
						<h3 class="box-title">All Packages </h3>
						<?php if($admin_permission_single && $admin_permission_single['add']=='YES') { ?>

						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladd">Add Package</button>
						<?php	} ?>
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Title</th>
									<th>Description</th>
									<th>Category</th>
									<!-- <th>Days</th> -->
									<th>Post active days</th>

									<th>Price</th>
									<th>Photos Limit</th>
									<th>Ads</th>
									<th>Notifications</th>
									<th>Post Featured</th>
									<th>Facebook/Instragram</th>

									<th>Status</th>

									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($plans as $row){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php

								$myArray = explode(',', $row['categories']);

									foreach($category as $cat) {



									if (in_array($cat['cat_id'], $myArray))
{
									
									echo $cat['cat_title'];
									echo ',';
									}
									
									}
									?></td>
									
									<!-- <td><?php
									
									// if($row['days']==0){ 
										
									// 	echo 'forever/unlimited';
										
									// }else{
									// 	echo $row['days'];	
									// }?></td> -->
									<td><?php
									
									if($row['post_active_days']==0){ 
										
										echo 'forever/unlimited';
										
									}else{
										echo $row['post_active_days'];	
									}?></td>
									<td>$<?php echo $row['price']; ?></td>
									<td><?php echo $row['post_photos']; ?></td>
									<td><?php 
									if($row['show_ads']==1){
										echo 'YES';
									}else{
										echo 'NO';
									}
									 ?></td>
<td><?php 
									if($row['notifications']==1){
										echo 'YES';
									}else{
										echo 'NO';
									}
									 ?></td>
</td>
<td><?php 
									if($row['post_featured']==1){
										echo 'YES';
									}else{
										echo 'NO';
									}
									 ?></td>
</td>
<td><?php 
									if($row['social_option']==1){
										echo 'YES';
									}else{
										echo 'NO';
									}
									 ?></td>
</td>
<td><?php 
									if($row['status']==1){
										echo 'Active';
									}else{
										echo 'Deactive';
									}
									 ?></td>
									 
									<td>
									<?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['membership_id']; ?>"><i class="fa fa-edit"></i></button>
										<?php	} ?>
										<?php 
									
										if($row['membership_id']!=1){ 
											$readonly='';
											?>
										<?php if($admin_permission_single && $admin_permission_single['delete']=='YES') { ?>

										<a onclick="return confirm('Are you sure want to delete this Package?');" href="<?php echo base_url(); ?>Admin/delete-membership/<?php echo $row['membership_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
										<?php	} ?>
										<?php if($admin_permission_single && $admin_permission_single['active_deactive']=='YES') { ?>

								<?php		if($row['status']==1){ ?>
									<a onclick="return confirm('Are you sure want to Deactivate this Package?');" href="<?php echo base_url(); ?>Admin/deactivate_membership/<?php echo $row['membership_id']; ?>" class="btn btn-danger btn-xs">Deactivate</a>
							<?php		}else{ ?>
								<a onclick="return confirm('Are you sure want to Activate this Package?');" href="<?php echo base_url(); ?>Admin/activate_membership/<?php echo $row['membership_id']; ?>" class="btn btn-success btn-xs">Activate</a>
							<?php		}							
								?>
	<?php	} ?>
									
										<?php } ?>
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo $row['membership_id']; ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Package</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo $row['membership_id']; ?>"></div>
								     <form method="post" action="<?php echo base_url();?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">Admin/edit-membership" >
								     <div class="modal-body">
       <div class="form-group">
       	<label>Title</label>
       	<input type="text" required value="<?php echo $row['title']; ?>"  name="title" class="form-control">
       </div>

       <div class="form-group">
       	<label> Description</label>
       	<textarea required class="form-control ckeditor" id="" name="desc"><?php echo $row['description']; ?>  </textarea> 
       </div>
			 <div class="form-group">
        	<label>Select Category's</label><br />
        	<select required class="form-control userlist select21" multiple="multiple" data-placeholder="Select Category" name="category[]" required >
        	    
        	    <?php $array=explode(',',$row['categories']);
								     
								    foreach($category as $row1){ 
								       	 ?>
        	    <option value="<?php echo $row1['cat_id']; ?>" <?php if(in_array($row1['cat_id'],$array)){ echo 'selected';} ?>><?php echo $row1['cat_title']; ?></option>
        	   <?php } ?>
        	</select>
					<!-- <input class="chkall1"  type="checkbox" >Select All -->

        </div>
				<div class="form-group">
       	<label>Price</label>
       $	<input required type="number"  value="<?php echo $row['price']; ?>" name="price" min="0" class="form-control">
       </div>
			 <div class="form-group">
       	<label>Post Days Active<span style="color:red"> </span></label>
       	<input required type="number" min="0"  value="<?php echo $row['post_active_days']; ?>" name="post_active_days" class="form-control">
       </div>
			 <!-- <div class="form-group">
			 <label>Package Active Days</label>
       	<input required type="number" min="0" <?php echo $readonly;?> value="<?php echo $row['days']; ?>" name="days" class="form-control">
       </div> -->

      <div class="form-group">
       	<label>Picture Upload</label>
       	<input required type="number" value="<?php echo $row['post_photos']; ?>" name="photos" min="1" max="10" class="form-control">
       </div>
			 <div class="form-group">
       	<label>Package Color</label>
       	<input type="text" required value="<?php echo $row['package_color']; ?>"  name="package_color" class="form-control">
       </div>
			 <div class="form-group">
       	<label>Upgrade Package Alert Text</label>
       	<input type="text" required value="<?php echo $row['package_alert']; ?>"  name="package_alert" class="form-control">
       </div>
	   <?php 
  $showads=1;
  if($row['show_ads']==1){
    $showads=$row['show_ads'];
  }
  $noti=1;
  if($row['notifications']==1){
    $noti=$row['notifications'];
	}
	$featured=1;
  if($row['post_featured']==1){
    $featured=$row['post_featured'];
	}
	$social_option=1;
  if($row['social_option']==1){
    $social_option=$row['social_option'];
	}
	
    ?>
	   <div class="form-group">
										<div class="rado_sel">
											Show ads <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="show_ads"<?php if($row['show_ads']==1){echo 'checked';}?> value="<?php echo $showads; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>
											
									</div>
									<div class="form-group">
										<div class="rado_sel">
											Send Notifications <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="notifications"<?php if($row['notifications']==1){echo 'checked';}?> value="<?php echo $noti; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>
										<div class="form-group">
										<div class="rado_sel">
											Post Featured <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="post_featured"<?php if($row['post_featured']==1){echo 'checked';}?> value="<?php echo $featured; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>		

											<div class="form-group">
										<div class="rado_sel">
											Facebook & Instagram <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="social_option"<?php if($row['social_option']==1){echo 'checked';}?> value="<?php echo $social_option; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>		

									</div>									
<input type="hidden" value="<?php echo $row['membership_id']; ?>" name="membership_id">      <!-- Modal footer -->
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
<div class="modal" id="myModaladd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Package</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">Admin/add-membership" >
      <div class="modal-body">
       <div class="form-group">
       	<label>Title</label>
       	<input required type="text" name="title" class="form-control">
       </div>

       <div class="form-group">
       	<label> Description</label>
       	<textarea required class="form-control ckeditor" name="desc"></textarea> 
       </div>
			 <div class="form-group">
        	<label>Select Category's</label><br />
        	<select required class="form-control userlist select2" multiple="multiple" data-placeholder="Select Category" name="category[]" id="userlist" required >
        	    
        	    <?php 

								       $i=1;
								    foreach($category as $row){ 
								       	 ?>
        	    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>
        	   <?php } ?>
        	</select>
            <input id="chkall" type="checkbox" >Select All
        </div>
				<div class="form-group">
       	<label>Price</label>
       $	<input required type="number"  value="0" name="price" min="0" class="form-control">
       </div>
			 <div class="form-group">
       	<label>Post Days Active<span style="color:red"> </span></label>
       	<input required type="number" min="0"  value="0" name="post_active_days" class="form-control">
       </div>
			 <!-- <div class="form-group">
       	<label>Package Active Days</label>
       	<input required type="number"  min="0" value="1" name="days" class="form-control">
       </div> -->

      <div class="form-group">
       	<label>Picture Upload</label>
       	<input required type="number" value="1" name="photos" min="1" max="10" class="form-control">
       </div>
			 <div class="form-group">
       	<label>Package Color</label>
       	<input type="text" required value=""  name="package_color" class="form-control">
       </div>
			 <div class="form-group">
       	<label>Upgrade Package Alert Text</label>
       	<input type="text" required value=""  name="package_alert" class="form-control">
       </div>
	   <div class="form-group">
										<div class="rado_sel">
											Show ads <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="show_ads" value="1">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>
											
									</div>
									<div class="form-group">
										<div class="rado_sel">
											Send Notifications <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="notifications"  value="<?php echo 1; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>
										<div class="form-group">
										<div class="rado_sel">
											Post Featured <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="post_featured"  value="<?php echo 1; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>		
										<div class="form-group">
										<div class="rado_sel">
											Facebook & Instagram <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="social_option"  value="<?php echo 1; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
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
<script>
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
	$('.select21').select2();

     $("#chkall").click(function(){
        if($("#chkall").is(':checked')){
            $("#userlist > option").prop("selected", "selected");
            $("#userlist").trigger("change");
        } else {
            $("#userlist > option").removeAttr("selected");
            $("#userlist").trigger("change");
        }
    });
 });
    




</script>

<script src="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<style>
.select2-selection__rendered
{
    width: 567px !important;
    
}
.select21-selection__rendered
{
    width: 567px !important;
    
}
</style>

