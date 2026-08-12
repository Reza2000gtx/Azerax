<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Contact us<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Contact </a></li>
			<li class="active">us</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('reply'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Contact us</h3>
            <?php if($admin_permission_single && $admin_permission_single['edit']=='YES') { ?>

						 <a  href="javascript:void(0);" style="float: right;"  onclick="return OpenModel();" class="btn btn-info">Reply</a>
            <?php	} ?>
						
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Name</th>
									<!--<th>Phone</th>-->
									<th>Email</th>
                 <!-- <th>Address</th>-->

									<th>Message</th>
                                    <th>Reply</th>
									<th>Created date</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($contact as $row){ 
                                
									?>
								<tr>
									<td><?php echo $i; ?></td>
									
									<td><?php echo $row['name']; ?></td>
									<!--<td><?php //echo $row['phone']; ?></td>-->
									<td><?php echo $row['email']; ?></td>
                  <!--<td><?php //echo $row['address']; ?></td>-->

									<td><?php echo $row['msg']; ?></td>
										<td><?php echo $row['reply']; ?></td>
                                    <td><?php echo date('d-m-Y H:i a', strtotime($row['created_at'])); ?></td>
                                    <td>
                                        <?php
                                            if($row['reply']=='')
                                            {
                                        ?>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#replyModal<?php echo $row['id']; ?>">Send Reply</button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                         <button type="button" class="btn btn-success btn-sm">Reply Sent</button>
                                        <?php
                                            }
                                        ?>
                                    </td>
								</tr>
								
                                <div class="modal fade" id="replyModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action ="<?php echo base_url();?>Admin/Home/update_contact" method="POST">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="modal-dialog cancel-btn" role="document" class="cancel-model">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="replyModal><?php echo $row['id']; ?>"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                        <div class="modal-body">
                                            <h4 style="color:#14213D;">Write Your Reply</h4><br>
                                                <textarea name="reply"  rows="3" maxlength="3000" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-prop save-btn" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
                                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

<div class="modal" id="assign">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reply </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post" id="f3" action="<?php echo base_url(); ?>Admin/Footer_content/replyrequest">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="modal-body">
         <input type="hidden" id="arrayid" value="" name="id[]">
        <div class="form-group">
         <label for="">Reply</label>
         <textarea name="reply" class="from-control ckeditor" ></textarea>
        <div id="error1"></div>
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary" >submit</button>
      </div>
   </form>
    </div>
  </div>
</div>

<?php include_once('include/footer.php'); ?>
<script type="text/javascript">
  function OpenModel(){
       var id = [];
   $(':checkbox:checked').each(function(i){
     id[i] = $(this).val();
    });
     if(id.length === 0) //tell you if the array is empty
    {
     alert("Please Select atleast one contact request.");
    } else {
       $('#assign').modal('show');
       $('#arrayid').attr('value',id);
        return false;
   }
   }
</script>
<script>
 $(document).ready(function(){

            $("#f3").validate(
            {
                ignore: [],
              debug: false,
                rules: { 

                    reply:{
                         required: function() 
                        {
                         CKEDITOR.instances.reply.updateElement();
                        },

                         minlength:10
                    }
                },
                messages:
                    {

                    reply:{
                        required:"Please enter Text",
                        minlength:"Please enter 10 characters"


                    }
                }
            });
        });
        $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
</script>