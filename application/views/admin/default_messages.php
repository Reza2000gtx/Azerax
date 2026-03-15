<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Message<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Message</a></li>
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
						<h3 class="box-title">All Defalut Messages </h3>
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Message Title</th>
									<th>Message</th>
								

									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($messages as $row){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['message_title']; ?></td>

									<td><?php echo $row['message']; ?></td>
									
									<td>
										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['message_id']; ?>"><i class="fa fa-edit"></i></button>
									</td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="myModal<?php echo $row['message_id']; ?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Edit Message</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
								     <form method="post" action="<?php echo base_url();?>Admin/update_default_message">
								      <div class="modal-body">
								       <div class="form-group">
								       	<label>Message </label>
												 <textarea name="message"  class="form-control"><?php echo $row['message']; ?></textarea>
								       </div>

								    
								      <input type="hidden" name="message_id" value="<?php echo $row['message_id']; ?>">
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
