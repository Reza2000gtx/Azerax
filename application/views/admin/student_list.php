<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
   <h1>Students<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Students</h3>
             <a class="btn btn-warning" data-toggle="modal" data-target="#SendSMS" style="margin-top: 15px;float: right;" >Send SMS to all</a>

         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Profile</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Last Online</th>
                        <th>Status</th>
                        <th>Total registered sessions</th>
                        <th>Total Payment Amount</th>
                        <th>Current Balance</th>
                        <th>Create Date</th>
                        <th>Email Verified</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($studentlist as $row){
                    ?>
                     <tr>
                        <td><?php echo $i;?></td>
                        <td>
                           <?php
                              if($row['profile']!='')
                              {
                              	?>
                           <img style="width: 50px;" src="<?php echo base_url();?>assets/profile/<?php echo $row['profile'];?>">
                           <?php
                              }else{
                              	?>
                          <img src="<?php echo base_url();  ?>/assets/site/images/default.jpg" height="50" width="50">
                           <?php
                              }
                              ?>
                        </td>
                        <td><?php echo $row['fname'].' '.$row['lname'] ;?></td>
                        <td><?php echo $row['email'];?></td>
                        <td>+<?php echo $row['phone'];?></td>
                         <td><?php echo date("d-m-Y g:i A", strtotime($row['last_logged_in_time']));?></td>
                         <td>
                           <?php 
                              if($row['logged_in_status']==1){
                              ?>
                              <p style="color:green">Online</p>
                           <?php
                              }else{
                              ?>
                                                          <p style="color:orange">Offline</p>

                           <?php
                              }
                              ?>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td><?php echo date("d-m-Y g:i A", strtotime($row['created_at']));?></td>
                        
                        <td>
                           

                           <?php 
                              if($row['email_verified']==1){
                              ?>
                              <p>Verified</p>
                           <?php
                              }else{
                              ?>
                                                          <p>Pending</p>

                           <?php
                              }
                              ?> </td>

                        <td>

                           <a class="btn btn-warning btn-xs"  href="<?php echo site_url().'Admin/single-view/'.$row['user_id'].''?>">View Detail</a>

                           

                         <?php 
                              if($row['status']==1){
                              ?>
                           <a class="btn btn-danger btn-xs"  href="<?php echo site_url().'Admin/Users/studentchangestatus/'.$row['user_id'].'/0'?>" onclick="return confirm('Are you sure you want to activate this user?')">Deactivate</a>
                           <?php
                              }else{
                              ?>
                           <a class="btn btn-success btn-xs" href="<?php echo site_url().'Admin/Users/studentchangestatus/'.$row['user_id'].'/1'?>" onclick="return confirm('Are you sure you want to deactivate this user?')">Activate</a>

                           <?php
                              }
                        
                              ?> 
                        </td>
                       

                     </tr>
                     <?php
                        $i++;
                        }
                        
                        ?>
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
          <div id="display-error" style="color: red; display: none;">Message field can not be empty</div>
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
var msg =$('#msg').val();

  if(msg != '')
  {

        $.ajax({
        url:"<?php echo base_url(); ?>Admin/user/send_sms_all",
        type:"POST",
        data: {msg:msg,type:1},
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
  else
  {
     $('#display-error').fadeIn().delay(3000).fadeOut();    
     $('.submit_process_btn').prop('disabled',false);
  }
  
}
</script>