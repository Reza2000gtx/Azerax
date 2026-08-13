<?php 
include_once('include/header.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Subscriber <small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Subscribers </a></li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('reply'); ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Subscriber List</h3>

						 <!-- <a  href="javascript:void(0);" style="float: right;"  onclick="return OpenModel();" class="btn btn-info">Reply</a> -->
						
					</div>
   
					<div class="box-body">
					<div class="table-responsive">
						<table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
							<thead>
								<tr>
									<th>S.No.</th>
									<!-- <th><input type="checkbox" id="checkAll"> Select All</th> -->
									<th>Email</th>

									<th>Created date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								foreach($contact as $row){ 
                                
									?>
								<tr>
									<td><?php echo $i; ?></td>
									 <!-- <td>   
                                      <input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row['email']; ?>" >
                                     </td> -->
									<td><?php echo $row['email']; ?></td>
                                    <td><?php echo date('d-m-Y H:i a', strtotime($row['created_at'])); ?></td>
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