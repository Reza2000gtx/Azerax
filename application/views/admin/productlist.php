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
		<h1> Product<small>Manage</small></h1>

		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#"> Product</a></li>
			<li class="active">List</li>
		</ol>
    </section>
    <div class="alert alert-success print-success-msg" style="display:none">
          <ul></ul>
          </div>
    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<?php
      if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
    ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All  Product </h3>
						<a class="btn btn-primary pull-right" href="<?php echo base_url();?>Admin/add-product">Add  Product</a>
						
					</div>
   
          
          <div id="showdel"></div>
					<div class="box-body">
					
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Device ID</th>
									<th>Model</th>
									<th>Brand</th>
									<th>Owner</th>
									<th>Product Image</th>
									<th>Date listed</th>
									<th style="min-width:170px;">Expiry Date</th>
									<th style="width:110px;">Product Status</th>

									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($productlist as $row){ 
                 $user = $this->db->query("SELECT * from users where user_id = ".$this->db->escape($row['user_id']))->row_array();
									?>
								<tr class="delete_mem<?php echo html_escape($row['id']); ?>">
									<td><?php echo html_escape($row['id']); ?></td>
									<td><?php echo substr($row['device_model'],0,50); ?></td>
									<td><?php echo substr($row['device_brand'],0,50); ?></td>
									<td><?php echo $user['fname']; ?></td>
									<td>
<?php

$image = $this->common_model->GetSingleData('product_gallery_image',array('product_id'=>$row["id"]));

?>
										
										
										<?php if($image['gallery_image']){ ?>
								<img class="img_table1" src="<?php echo base_url(); ?>assets/product_image/<?php echo $image['gallery_image'];?>">
								<?php } else { ?>
								
								<img class="img_table1"  src="<?php echo base_url(); ?>assets/product_image/no.jpg">
								<?php } ?>
										
										</td>	
										<td><?php
if($row['approve_date'] && $row['approve_date'] !='0000-00-00'){

										echo html_escape($row['approve_date']); 

									}?></td>
										<td>
<?php
if($row['status'] != 0){
?>
<div style="display:flex;align-items:center;gap:8px;white-space:nowrap;">
<?php
if($row['expiry_date'] && $row['expiry_date'] !='0000-00-00'){

										echo html_escape($row['expiry_date']); 

									}?>
<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo html_escape($row['id']); ?>"> Change Expiry
								</a>
</div>
<?php } ?>

							</td>
							<td>
								 <?php 
                              if($row['status']==0){
                              	echo 'Pending Approval';
                              }
                              elseif($row['status']==1){
                              	echo 'Active';
                              }
                              elseif($row['status']==2){
                              	echo 'Expired';
                              }
							  elseif($row['status']==3){
                              	echo 'Cancelled';
							?>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  View Reason
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><b>Feedback</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
			$res = $this->db->query("SELECT * from request where device_id = ".$this->db->escape($row['id']))->row_array();
		?>	
			<textarea   rows="3" maxlength="3000" class="form-control"><?php echo $res['survey'];?></textarea>
			<textarea   rows="3" maxlength="3000" class="form-control"><?php echo $res['feedback'];?></textarea>
			
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
														<?php  
							}
							  else{
                              	 echo 'Deactive';

                              } ?>
							</td>
									<td>

										<a class="btn btn-primary btn-xs" href="<?php echo base_url();?>Admin/edit-product/<?php echo html_escape($row['id']); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>


					       <?php if($row['status']==1){ ?>
                           <a class="btn btn-danger btn-xs refund" data-pid="<?php echo $row["paymentIntent_id"]; ?>"  href="<?php echo base_url().'Admin/Product/changestatus/'.$row['id'].'/0'?>" onclick="return confirm('Are you sure you want to Deactivate this Product?')">Deactivate</a>
                           <?php }else{ ?>
                           <a class="btn btn-success btn-xs" href="<?php echo base_url().'Admin/Product/changestatus/'.$row['id'].'/1'?>" onclick="return confirm('Are you sure you want to Activate this Product?')">Activate</a>

                           <?php
                              }
                        
                              ?> 

										<a onclick="confirm('Are you sure want to delete this Product ?'); deleteproduct(<?php echo html_escape($row['id']); ?>);" href="javascript:void(0)" class="btn btn-xs" style="background:#DC2626;color:#fff;margin-left:4px;"><i class="fa fa-trash" aria-hidden="true"></i></a>

									</td>
								</tr>
								
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo html_escape($row['id']); ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Expiry Date</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								      <div id="error<?php echo html_escape($row['id']); ?>"></div>
								     <form method="post" action="<?php echo base_url(); ?>Admin/edit_expiry_date/<?php echo html_escape($row['id']);?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								      <div class="modal-body">
								       <div class="form-group">
								       	<label>Expiry Date</label>
								       	<input type="date" name="expiry_date" value="<?php echo html_escape($row['expiry_date']);?>" class="form-control">
								       </div>

							      
								      <input type="hidden" name="product_id" value="<?php echo html_escape($row['id']); ?>">
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

<?php include_once('include/footer.php'); ?>
<script type="text/javascript">
// The site-wide DataTables default sorts ascending by whichever column
// comes first (Device ID here), showing oldest devices first. Re-init
// this specific table sorted by Device ID descending instead, so newest
// listings show at the top.
$(document).ready(function(){
    if($.fn.DataTable.isDataTable('#bootstrap-data-table')){
        $('#bootstrap-data-table').DataTable().destroy();
    }
    $('#bootstrap-data-table').DataTable({
        "order": [[0, "desc"]],
        "stateSave": true,
        "initComplete": function(){
            var scrollKey = 'az-scroll-' + window.location.pathname;
            var saved = sessionStorage.getItem(scrollKey);
            if(saved !== null){
                window.scrollTo(0, parseInt(saved, 10));
                sessionStorage.removeItem(scrollKey);
            }
        }
    });
});
</script>
<script type="text/javascript">
	function deleteproduct(id){  

	$.ajax({
        type: 'POST',   
        url: "<?php echo base_url(); ?>Admin/Product/deleteproduct?id="+id,
        beforeSend:function()
    {
      
     // $('.btn-load-addMoreSpecilities').show();

    },
    success:function(html)
    {
      
        $(".delete_mem" + id).fadeOut('slow');
        $(".print-success-msg").find("ul").html('');
        $(".print-success-msg").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").find("ul").append('Success! Product has been deleted successfully.');
        return false;
    }
    });    
	 
}
</script>

<!--<script type="text/javascript">-->
<!--	$(document).on('click','.refund' ,function(){-->
		 	<!--event.preventDefault();-->
<!--           var order_id = $(this).data('orderid');-->
<!--		   var refund = parseInt($(this).data('refund'));-->
<!--           var payment_id = $(this).data('pid');-->
<!--           $('#order_id').val(order_id);-->
<!--           $('#refund_amt').val(refund);-->
<!--           $('#payment_id').val(payment_id);-->
<!--           $('#refundmodal').modal('show');-->
		  <!--console.log(order_id,refund,payment_id);-->
<!--		 });-->

<!--  </script>-->
  
<!--  <script type="text/javascript">-->

<!-- 	$(document).on('click','#refund' ,function(){-->
<!--        e.preventDefault();-->
<!--         var order_id = $(this).data('orderid');-->
<!--   	     var refund = parseInt($(this).data('refund'));-->
<!--         var payment_id = $(this).data('pid');-->
<!--         if(confirm("Are you sure to refund Amount?"))-->
<!--        {-->
<!--         $.ajax({-->
<!--                url: '<?php  echo base_url();?>Checkout/refund',-->
<!--                type: 'post',-->
<!--                data: dataString,-->
<!--                success: function(response){ -->
                <!--console.log(response);-->
<!--                if(response.status=='succeeded')-->
<!--                {-->
<!--                $("#result").html('Successfully Refund to Customer!'); -->
<!--                $("#result").addClass("alert alert-success");-->
<!--                console.log(response);-->
               <!--  alert(response.status);-->
<!--                }-->
<!--                else-->
<!--                {-->
<!--                console.log('Something went wrong');-->
                <!--alert('Something went wrong');-->
<!--                }-->

<!--            }-->
 
<!--            });-->
<!--     }-->
<!--    });-->
 
<!--});-->
<!--</script>-->




 