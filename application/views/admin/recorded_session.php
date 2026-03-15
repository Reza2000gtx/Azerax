<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
   <h1>Recorded Session <small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Recorded Sessions</h3>
            
 <!-- <a class="btn btn-warning" data-toggle="modal" data-target="#SendSMS" style="margin-top: 15px;float: right;" >Send SMS to all</a> -->

                           
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Teacher Name</th>
                        <th>Teacher Phone</th>
                        <th>Teacher Email</th>
                        <th>Create Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                   
                        $i=1;
						      foreach($session_list as $row)
                  { 
          $teacherdata = $this->common_model->GetSingleData('users',array('user_id'=>$row['user_id']));              
          ?>

                     <tr>
                        <td><?php echo $i;?></td>
                        <td>

                           <?php if($row['session_picture']!='') { ?>
                           <img style="width: 50px;" src="<?php echo base_url();?>assets/session_images/<?php echo $row['session_picture'];?>">
                           <?php }else{ ?>
                          <img src="<?php echo base_url();  ?>/assets/site/images/default.jpg" height="50" width="50">
                           <?php } ?>

                        </td>  
                        <td><?php echo $row['price'] ; //echo $row['currency'];?></td>  
                        <td><?php echo $teacherdata['fname'];?> <?php echo $teacherdata['lname'];?></td>
                        <td><?php echo '+'.$teacherdata['phonecode'].$teacherdata['phone'];?></td>
                        <td><?php echo $teacherdata['email'];?></td>
                      <td><?php echo date("d-m-Y g:i A", strtotime($row['created_at']));?></td><td><a class="btn btn-warning btn-xs"  href="<?php echo site_url().'Admin/recorded_sessions_details/'.$row['id'].''?>">View Detail</a> </td> 
                     </tr>
                     <?php $i++; } ?>
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


<!-- send Sms phone -->
<!-- Modal -->
<div class="modal fade" id="SendSMS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send SMS  </h4>
      </div>
      <div class="modal-body">
        
     

          <i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load btn-load-otp" id="btn-load-otp"> </i>
          <div class="msg-response" style="margin: 10px;"></div>

    <div class="col-md-8 offset-md-2 otp_screen" style="display: block;text-align: center;">
      <form class="text-center">
        <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Text:</label>
                      <div class="col-sm-10">
                        <textarea  type="text"  id="msg"  class="form-control" value="Enter Text to be send..."></textarea>
                      </div>
                   

        </div>
      </form>
    </div>
   
   </div>
 
      <div class="modal-footer">
        <div class="response_results_pre"></div>

        <button disabled type="submit" name="submit" class="btn btn-warning submit_process_btn" onclick="send_sms()" >Send
        <i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load submit_process_loading" id="btn-load"> </i></button>
      </div>


    </div>
  </div>
</div>


</div>
<script type="text/javascript">

     $('#msg').on('keyup keypress', function(e) {

      $('.submit_process_btn').prop('disabled',false);
   
});
function send_sms() {
var msg=$('#msg').val();

  $.ajax({
    url:"<?php echo base_url(); ?>Admin/user/send_sms_all",
    type:"POST",
    data: {msg:msg,type:2},
    dataType:'json',
    beforeSend:function()
    {
    $('.submit_process_loading').show();

    },
    success:function(data)
    {
        if(data.status==1){
      $('.submit_process_loading').hide();
      $('.msg-response').html(data.msg);
     setTimeout(function () { location.reload(1); }, 2000);

          return false;
    }else{

          $('.msg-response').html(data.msg);
          return false;
  
    }
    }
    
  });
}
</script>