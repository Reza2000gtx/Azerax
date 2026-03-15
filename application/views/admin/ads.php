<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Advertisement<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Advertisement</a></li>
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
						<h3 class="box-title">All Advertisement </h3>
						<?php if($admin_permission_single && $admin_permission_single['add']=='YES') { ?>

						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add Advertisement</button>
						<?php	} ?>
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Image</th>
									<th>Page</th>
									<th>Category</th>
									<th>Subcategory</th>
									<th>Status</th>

									<th>Action</th>
								</tr>
							</thead>
							<tbody class="row_position">
								<?php 
								$i=1;
								foreach($ads as $row){ ?>
								<tr id="<?php echo $row['ads_id'] ?>">
									<td><?php echo $i; ?></td>
									<td><img src="<?php echo base_url();  ?>/assets/admin/ads/<?php echo $row['ads_image']; ?>" style=" width: 800px;"></td>
									<td>
									<?php
									if($row['category']==0){
										echo "Home Page";
									}else{

										echo "Category Page";

									}

									?>	
									</td>	
									<td>
									<?php
									if($row['category']==0){
										echo "-";
									}else{

										$selectCatquery = $this->common_model->GetSingleData('category',array('cat_id' =>$row['category']));
										echo $selectCatquery['cat_title'];
									}

									?>	
									</td>
									<td>
									<?php
									if($row['subcategory']==0){
										echo "-";
									}else{

										$selectSubCatquery = $this->common_model->GetSingleData('subcategory',array('id' =>$row['subcategory']));
										echo $selectSubCatquery['sub_name'];
									}

									?>	
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

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['ads_id']; ?>"><i class="fa fa-edit"></i></button>
										<?php	} ?>
										<?php if($admin_permission_single && $admin_permission_single['delete']=='YES') { ?>

										<a onclick="return confirm('Are you sure want to delete this Advertisement?');" href="<?php echo base_url(); ?>Admin/delete_advertisement/<?php echo $row['ads_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
										<?php	} ?>
										<?php if($admin_permission_single && $admin_permission_single['active_deactive']=='YES') { ?>

									
										<?php		if($row['status']==1){ ?>
									<a onclick="return confirm('Are you sure want to Deactivate this Advertisement?');" href="<?php echo base_url(); ?>Admin/deactivate_advertisement/<?php echo $row['ads_id']; ?>" class="btn btn-danger btn-xs">Deactivate</a>
							<?php		}else{ ?>
								<a onclick="return confirm('Are you sure want to Activate this Advertisement?');" href="<?php echo base_url(); ?>Admin/activate_advertisement/<?php echo $row['ads_id']; ?>" class="btn btn-success btn-xs">Activate</a>
							<?php		}							
								?>
								<?php	} ?>
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo $row['ads_id']; ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Advertisement</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
											<form method="post" action="<?php echo base_url();?>Admin/update_advertisement" enctype='multipart/form-data'>
								      <div class="modal-body">

								       <div class="form-group">

								       	<label>Advertisement Image<br/><span style="color:red;"> Note: Image size should be 1140*140</span></label>
								       	<input type="file" name="ads_image" accept="image/*" style="margin-bottom: 10px;">
								       	<img src="<?php echo base_url();  ?>/assets/admin/ads/<?php echo $row['ads_image']; ?>" height="50" width="50">
								       </div>

								       <div class="form-group">
										 <label>Select Category</label>
							       	     <select class="form-control" name="category" onchange="openSubCategoryedit(this.value,<?=$row['ads_id']?>);">
							       	     	<option value="0">Select Option</option>
							       	     	<?php 
							       	     	$selectAllCatquery = $this->common_model->GetAllData('category');
							       	     	
							       	     	foreach ($selectAllCatquery as  $category) {
							       	     		?>
							       	     		<option <?php if($row['category']==$category['cat_id']){echo 'selected';}?> value="<?=$category['cat_id']?>"><?=$category['cat_title']?></option>
							       	     		<?php
							       	     	}
							       	     	
							       	     	
							       	     	?>
							       	     	
							       	     </select>
							         </div>
							         <div class="form-group" id="subcatdiv<?php echo $row['ads_id']; ?>">
							         	
							         		<label>Select Subcategory</label>
									       	<select class="form-control" name="subcategory" required id="subcatoption<?php echo $row['ads_id']; ?>">
									       	     	<option value="0">Select Option</option>
									       	     	<?php 
									       	     	$selectAllSubCatquery = $this->common_model->GetAllData('subcategory',array('cat_id'=>$row['category']));
									       	     	
									       	     	foreach ($selectAllSubCatquery as  $subcategory) {
									       	     		?>
									       	     		<option <?php if($row['subcategory']==$subcategory['id']){echo 'selected';}?> value="<?=$subcategory['id']?>"><?=$subcategory['sub_name']?></option>
									       	     		<?php
									       	     	}
									       	     	
									       	     	
									       	     	?>
									       	     	
									       	</select>
							         		
							         	
							       	
							         </div>

								      <input type="hidden" name="ads_id" value="<?php echo $row['ads_id']; ?>">
								      <!-- Modal footer -->
											</div>
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
        <h4 class="modal-title">Add Advertisement</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>Admin/add_advertisement" enctype='multipart/form-data'>
      <div class="modal-body">
       
       <div class="form-group">
			 <label>Advertisement Image<span style="color:red;"> <br/>Note: Image size should be 1140*140</span></label>
       	<input type="file" name="ads_image" required accept="image/*">
       </div>
       <div class="form-group">
			 <label>Select Category</label>
       	     <select class="form-control" name="category" onchange="openSubCategory(this.value);">
       	     	<option value="0">Select Option</option>
       	     	<?php 
       	     	$selectAllCatquery = $this->common_model->GetAllData('category');
       	     	
       	     	foreach ($selectAllCatquery as  $category) {
       	     		?>
       	     		<option value="<?=$category['cat_id']?>"><?=$category['cat_title']?></option>
       	     		<?php
       	     	}
       	     	
       	     	
       	     	?>
       	     	
       	     </select>
       </div>
       <div class="form-group" id="subcatdiv">

       	
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
<script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        $.ajax({
            url:"<?php echo base_url();?>Admin/update_position",
            type:'post',
            data:{position:data},
            success:function(){
                alert('your change successfully saved');
            }
        })
    }

    function openSubCategory(cat_id){
    	
    	$('#subcatdiv').html('');
    	if(cat_id!=0){

    		$.ajax({
            url:"<?php echo base_url();?>Admin/Getsubcat",
            type:'post',
            data:{cat_id:cat_id},
            success:function(responce){
                $('#subcatdiv').html(responce);
            }
          })
        
    	}else{
    		$('#subcatdiv').html('');
    	}
    }

    

    function openSubCategoryedit(cat_id,div_id){
	    	$('#subcatoption'+div_id).html('');
	    	if(cat_id!=0){

	    		$.ajax({
	            url:"<?php echo base_url();?>Admin/Getsubcatedit",
	            type:'post',
	            data:{cat_id:cat_id},
	            success:function(responce){
	                $('#subcatoption'+div_id).html(responce);
	            }
	          })
	        
	    	}else{
	    		$('#subcatdiv'+div_id).html('');
	    	}

	    }
</script>