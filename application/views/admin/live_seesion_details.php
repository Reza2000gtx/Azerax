<?php 
include_once('include/header.php'); 
  ?>  <div class="content-wrapper">
<section class="content-header">

   <h1>Live Session<small>Management</small></h1>

</section>
<!-- Main content -->
<section class="content">
   <?php echo $this->session->flashdata('msgs'); ?>
   <div class="row">
   <div class="col-xs-12">
         <div class="box box-primary">
                <div class="box-body">   
                
         <div class="box-header">
            <h3 class="box-title"> Live Session Details</h3>

         <?php  //print_r($live_session);

          $teacherdata = $this->common_model->GetSingleData('users',array('user_id'=>$live_session['teacher_id'])); ?>
 
       </div>               
          <?php 

    // $city = $this->common_model->GetSingleData('cities',array('id'=>$singlelist['city']));
    // $state = $this->common_model->GetSingleData('states',array('id'=>$singlelist['state']));
    // $country = $this->common_model->GetSingleData('countries',array('id'=>$singlelist['country']));
  //   $nationality = $this->common_model->GetSingleData('settingsNationalities',array('NationalityID'=>$singlelist['nationality']));

                 ?>
                      
               <div class="container">
                  <form class="form-horizontal">
                       <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Profile:</label>
                      <div class="col-md-10">          
                         <?php if($live_session['image']!='') { ?>
                  <img style="border-radius: 100px;width: 100px;" src="<?php echo base_url();?>assets/session_images/<?php echo $live_session['image'];?>">
                           <?php } else { ?>
                          <img src="<?php echo base_url();  ?>assets/site/images/default.jpg" style="border-radius: 100px;width: 100px;" >
                           <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Session Name:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $live_session['session_name'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <?php if($live_session['type']==1){
                              $type = 'Private Classroom';
                            }if($live_session['type']==2){
                              $type =  'Small Classroom';
                            }if($live_session['type']==3){
                              $type = 'Breakout Class';
                            }if($live_session['type']==4){
                              $type = 'Lecture Hall';
                            }?>
                      <label class="control-label col-sm-2" for="email">Session type:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $type ;?>">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Session Date&Time:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $live_session['session_date'].' '.$live_session['session_time'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Session Description:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $live_session['session_description'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">price:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $live_session['currency'].''.$live_session['session_price'];?>">
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
                      <label class="control-label col-sm-2" for="email">Number of student:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="<?php echo $live_session['number_of_students'];?>">
                      </div>
                    </div>
                        <div class="form-group">
                      <label class="control-label col-sm-2" for="email">session_date:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="+<?php echo $live_session['session_date'];?>">
                      </div>
                    </div>
                        <div class="form-group">
                      <label class="control-label col-sm-2" for="email">session_duration:</label>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" value="+<?php echo $live_session['session_duration'];?>">
                      </div>
                    </div>                    
                  
           <?php 
      $cat_name = $this->common_model->GetSingleData('category',array('cat_id'=>$live_session['speciality_cat']));

      $subcat_name = $this->common_model->GetSingleData('subcategory',array('sub_cat_id'=>$live_session['speciality_subcat']));

      $subsubcat_name = $this->common_model->GetSingleData('subsubcategory',array('subsub_cat_id'=>$live_session['speciality_subsubcat']));
      ?>

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