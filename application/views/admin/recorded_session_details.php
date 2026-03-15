<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">

   <h1>Recorded Session<small>Management</small></h1>

</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
         <div class="box box-primary">
                <div class="box-body">   
                
         <div class="box-header">
            <h3 class="box-title"> Recorded Session Details</h3>

         <?php  //print_r($recorded_session);
          $teacherdata = $this->common_model->GetSingleData('users',array('user_id'=>$recorded_session['user_id'])); 

      $cat_name = $this->common_model->GetSingleData('category',array('cat_id'=>$recorded_session['speciality_cat']));

      $subcat_name = $this->common_model->GetSingleData('subcategory',array('sub_cat_id'=>$recorded_session['speciality_subcat']));

      $subsubcat_name = $this->common_model->GetSingleData('subsubcategory',array('subsub_cat_id'=>$recorded_session['speciality_subsubcat']));

      $subchapter_data = $this->common_model->GetAllData('recorded_subchapters',array('session_id'=>$recorded_session['id']));

      
      foreach ($subchapter_data as  $value){
         $value['title'];
         $value['video']; 
      } ?>
 
       </div>               
        
               <div class="container">
                  <form class="form-horizontal">
                       <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Profile:</label>
                      <div class="col-md-10">          
                         <?php if($recorded_session['session_picture']!='') { ?>
                  <img style="border-radius: 100px;width: 100px;" src="<?php echo base_url();?>assets/session_images/<?php echo $recorded_session['session_picture'];?>">
                           <?php } else { ?>
                          <img src="<?php echo base_url();  ?>assets/site/images/default.jpg" style="border-radius: 100px;width: 100px;" >
                           <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Full Name:</label>
                      <div class="col-md-6">          
                        <input type="text" readonly class="form-control" value="<?php echo $teacherdata['fname'].' '.$teacherdata['lname'] ;?>">
                      </div>
                    </div>
                                      
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $teacherdata['email'];?>">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Phone Number:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="+<?php echo $teacherdata['phonecode'];?>-<?php echo $teacherdata['phone'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">price:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $recorded_session['price'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">description:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $recorded_session['description'];?>">
                      </div>
                    </div> 
           

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Category:</label>
                      <div class="col-md-6">
            <input type="text" readonly class="form-control" value="<?php echo $cat_name['cat_title'];?>">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Sub Category:</label>
                      <div class="col-md-6">
            <input type="text" readonly class="form-control" value="<?php echo $subcat_name['sub_name'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Sub Sub Category:</label>
                      <div class="col-md-6">
            <input type="text" readonly class="form-control" value="<?php echo $subsubcat_name['sub_sub_name'];?>">
                      </div>
                    </div>
                 
                  </form>
                </div>
                </div>
                </div>
                
                
               
               </div>
                    </div>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $singlelist['fname'].' '.$singlelist['lname'] ;?> </h4>
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

        <button type="submit" name="submit" class="btn btn-warning submit_process_btn" onclick="send_sms()" >Send
        <i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load submit_process_loading" id="btn-load"> </i></button>
      </div>


    </div>
  </div>
</div>


</div>
<script type="text/javascript">
function send_sms() {
var msg=$('#msg').val();
var phonecode='<?php echo $singlelist['phonecode']; ?>';
var phone='<?php echo $singlelist['phone']; ?>';

  $.ajax({
    url:"<?php echo base_url(); ?>Admin/user/send_sms",
    type:"POST",
    data: {msg:msg,phonecode:phonecode,phone:phone},
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