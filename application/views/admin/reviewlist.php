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

		<h1> Review<small>Manage</small></h1>

		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#"> Review</a></li>

			<li class="active">List</li>

		</ol>

    </section>



    <div class="alert alert-success print-success-msg" style="display:none">

          <ul></ul>

          </div>

    <!-- Main content -->

    <section class="content">

		<?php echo $this->session->flashdata('msgf'); ?>

		<div class="row">

			<div class="col-xs-12">

				<div class="box">

					<div class="box-header">

						<h3 class="box-title">All  Review </h3>



					

					</div>

   

					<div class="box-body">

					<div class="table-responsive">

						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">

							<thead>

								<tr>

									<th>S.No.</th>

									<th>Name</th>

									<th>Email</th>

									<th>Device Name</th>

									<th>Messsage</th>

									<th>Status</th>

									<th>Action</th>

								</tr>

							</thead>

							<tbody>

								<?php $i=1;	foreach($reviewlist as $row){ ?>

								<tr class="delete_mem<?php echo $row['id']; ?>">

								

									<td class="row-index"><?php echo $i++; ?></td>

									<td><?php echo $row['name']; ?></td>

									<td><?php echo $row['email']; ?></td>

									<td><?php 
									$device = $this->common_model->GetDataById('product',$row['device_id']);
									
									echo $device['device_model']; 
									?> <span style="color:#999;font-size:12px;">(ID: <?php echo $row['device_id']; ?>)</span></td>

									<td>
									<?php
									$full_message = htmlspecialchars($row['message']);
									$preview = strlen($row['message']) > 60 ? htmlspecialchars(substr($row['message'], 0, 60)) . '...' : $full_message;
									?>
									<?php echo $preview; ?>
									<?php if(strlen($row['message']) > 60){ ?>
									<br><a href="#" data-toggle="modal" data-target="#messageModal<?php echo $row['id']; ?>" style="font-size:12px;">View full message</a>
									<?php } ?>
									</td>

									<td>

                                      <?php if($row['status']==1) { ?>

                                      <form method="post" action="<?php echo base_url();?>Admin/Review/editstatus" style="display:inline;" onsubmit="return confirm('Change this review to Inactive?');">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                      <input type="hidden" name="review_id" value="<?php echo $row['id']; ?>">
                                      <input type="hidden" name="status" value="0">
                                      <button type="submit" class="btn btn-sm" style="background:#14213D;color:#fff;">Active</button>
                                      </form>

                                      <?php } else { ?>

                                      <form method="post" action="<?php echo base_url();?>Admin/Review/editstatus" style="display:inline;" onsubmit="return confirm('Change this review to Active?');">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                      <input type="hidden" name="review_id" value="<?php echo $row['id']; ?>">
                                      <input type="hidden" name="status" value="1">
                                      <button type="submit" class="btn btn-sm" style="background:#EAB308;color:#fff;">Inactive</button>
                                      </form>

                                      <?php }?>

                                    </td> 

									

									<td><a href="javascript:void(0)" data-deleteid="<?php echo $row['id']; ?>" data-nid="<?php echo $i; ?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

									</td>

									</tr>

								<!-- Full message modal -->
								<div class="modal" id="messageModal<?php echo $row['id']; ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h4 class="modal-title">Review Message</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>
								      <div class="modal-body">
								        <p style="white-space:pre-wrap;"><?php echo $full_message; ?></p>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								      </div>
								    </div>
								  </div>
								</div>

								<?php } ?>

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

$(document).ready(function(){

    $(document).on("click",".delete",function(e){

        var deleteId = $(this).data('deleteid');

        if (confirm("Are you sure you want to delete?")) {

                $.ajax({

                url: '<?php  echo base_url('Admin/Review/deletereview');  ?>',

                type: 'post',

                dataType: 'JSON',

                data: {deleteId: deleteId},

                success: function(response){ 

                console.log(response);

                location.reload(true);

                }

            });

        }

    });

});

</script>

