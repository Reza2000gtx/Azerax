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
						<h3 class="box-title">Expire Product </h3>
						<!-- <a class="btn btn-primary pull-right" href="<?php echo base_url();?>Admin/add-product">Add  Product</a> -->
						
					</div>
   
          
          <div id="showdel"></div>
					<div class="box-body">
					
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>Device ID</th>
									<th>Device model</th>
									<th>Device brand</th>
									<th>Owner</th>
									<th>Product Image</th>
									<th>Date listed</th>
									<th>Expiry Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($expire_devices as $row){ 
                 $user = $this->db->query("SELECT * from users where user_id = '".$row['user_id']."'")->row_array();
									?>
								<tr class="delete_mem<?php echo $row['id']; ?>">
									<td><?php echo $row['id']; ?></td>
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
										<td><?php echo $row['approve_date']; ?></td>
										<td><?php echo $row['expiry_date']; ?></td>
									<td>

										<a href="<?php echo base_url(); ?>Admin/edit-product/<?php echo $row['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>

									</td>
								</tr>
							
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