<?php 
include_once('include/header.php'); 
?>
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
<div class="content-wrapper">
    <section class="content-header">
		<h1> Payment<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#"> Payment</a></li>
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
						<h3 class="box-title">All  Payment's </h3>

						<!-- <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladd">Add  Payment</button> -->
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Item Payment.</th>
									<th>Amount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($settinginfo as $row){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['amount'].' AUD'; ?></td>
							
							
									<td>

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo html_escape($row['id']); ?>"><i class="fa fa-edit"></i></button>
									
										<!-- <a onclick="return confirm('Are you sure want to delete this manufacturer ?');" href="<?php echo base_url(); ?>Admin/Home/deletesetting/<?php echo html_escape($row['id']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
											
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo html_escape($row['id']); ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Payment</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo html_escape($row['id']); ?>"></div>
								     <form method="post" onsubmit="return editpayment(<?php echo html_escape($row['id']); ?>);" id="editpayment<?php echo html_escape($row['id']); ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
								       <div class="form-group">
								       	<label>Amount</label>
								       	<input type="text" name="amount" value="<?php echo $row['amount'].' AUD'; ?>" class="form-control">
								       </div>

							      
								      <input type="hidden" name="id" value="<?php echo html_escape($row['id']); ?>">
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
<div class="modal" id="myModaladd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Payment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" onsubmit="return addpayment();" id="addpayment">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
       <div class="form-group">
       	<label>Amount</label>
       	<input type="text" required name="amount" class="form-control">
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
	function addpayment(){ 

	$.ajax({   
	   type : 'post',
	   data : new FormData($('#addpayment')[0]),
	   url  : site_url+'Admin/Home/add_payment',
	   contentType: false,
       cache: false,    
       processData:false, 
	    beforeSend:function()
		{
			$('.btn-prop').prop('disabled',true);
			$('.btn-load').show();
		},
	   success : function(data){
	   	console.log(data);
		     $('.btn-prop').prop('disabled',false);
			 $('.btn-load').hide();
			if(data==1){   
			   window.location.href='setting';    
			}else if(data==0){
				$("#error").html('<div class="alert alert-danger">Something went wrong</div>');
				return false;
			}    
			else{
				$("#error").html(data);
		        return false;
			}  
	   } 
	});    
	 return false;
}


function editpayment(id){

	$.ajax({   
	   type : 'post',
	   data : new FormData($('#editpayment'+id)[0]),
	   url  : site_url+'Admin/Home/edit_payment',
	   contentType: false,
       cache: false,    
       processData:false, 
	    beforeSend:function()
		{
			$('.btn-prop').prop('disabled',true);
			$('.btn-load').show();
		},
	   success : function(data){
	   	console.log(data);
		     $('.btn-prop').prop('disabled',false);
			 $('.btn-load').hide();
			if(data==1){   
			   window.location.href='setting';    
			}else if(data==0){
				$("#error"+id).html('<div class="alert alert-danger">Something went wrong</div>');
				return false;
			}    
			else{
				$("#error"+id).html(data);
		        return false;
			}  
	   } 
	});    
	 return false;
}
</script>