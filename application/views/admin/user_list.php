<?php 
include_once('include/header.php'); 
	?>	<div class="content-wrapper">
<section class="content-header">
   <h1>Users<small>Management</small></h1>
</section>
<!-- Main content -->
<section class="content">
  
   <div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">All Users</h3>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModaladd">Add  User</button>
                        
         </div>

         <?php echo $this->session->flashdata('msg'); ?>
         <div class="box-body">
            <div class="table-responsive">
               <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                  <thead>
                     <tr>
                        <th>UserID.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Profile</th>
                        <th>User Type</th>
                        <th>Create Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
						      foreach($userlist as $row){
                    ?>
                     <tr class="delete_mem<?php echo $row['user_id']; ?>">
                        <td><?php echo $i;?></td>
                        
                        <td><a href="<?php echo base_url(); ?>Admin/user-profile/<?php echo $row['user_id']; ?>"><?php echo $row['fname'];?></a></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td>
                           <?php
                              if($row['profile']!='')
                              {
                                ?>
                           <img height="50" width="50" src="<?php echo base_url();?>assets/profile/<?php echo $row['profile'];?>">
                           <?php
                              }else{
                                ?>
                          <img src="<?php echo base_url();  ?>assets/profile/user.png" height="50" width="50">
                           <?php
                              }
                              ?>
                        </td>
                        <td>
                        <?php 
                              if($row['user_type']==0){
                              ?>
                           <a class="btn btn-danger btn-xs"  href="<?php echo site_url().'Admin/Users/changetype/'.$row['user_id'].'/1'?>" onclick="return confirm('Are you sure you want to Deligate this user?')">Free</a>
                           <?php
                              }else{
                              ?>
                           <a class="btn btn-success btn-xs" href="<?php echo site_url().'Admin/Users/changetype/'.$row['user_id'].'/0'?>" onclick="return confirm('Are you sure you want to Free this user?')">Deligate</a>

                           <?php
                              }
                        
                              ?> 
                           <!-- <?php 
                              if($row['user_type']==0){
                              ?>
                              <p>Free</p>
                              <?php
                              }else{
                              ?>
                              <p>Deligate</p>
                               <?php
                              }

                            ?> --></td>
                        
                         
                        <td><?php echo date("d-m-Y g:i A", strtotime($row['created_at']));?></td>

                        <td>

                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalEdit<?php echo $row['user_id']; ?>"><i class="fa fa-edit"></i></button>

                           

                         <?php 
                              if($row['status']==1){
                              ?>
                           <a class="btn btn-danger btn-xs"  href="<?php echo site_url().'Admin/Users/changestatus/'.$row['user_id'].'/0'?>" onclick="return confirm('Are you sure you want to deactivate this user?')">Deactivate</a>
                           <?php
                              }else{
                              ?>
                           <a class="btn btn-success btn-xs" href="<?php echo site_url().'Admin/Users/changestatus/'.$row['user_id'].'/1'?>" onclick="return confirm('Are you sure you want to activate this user?')">Activate</a>

                           <?php
                              }

                            ?>

                         <a onclick="confirm('Are you sure want to delete this user?'); deleteuser(<?php echo $row['user_id']; ?>);" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      
                           
                        </td>
                       

                     </tr>

                     <!-- The Modal -->
                        <div class="modal" id="myModalEdit<?php echo $row['user_id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Edit User</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div id="error<?php echo $row['user_id']; ?>"></div>
                             <form method="post" action="<?php echo base_url();?>Admin/edit-user" enctype="multipart/form-data">
                              <div class="modal-body">
                               <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" required name="name" class="form-control" value="<?php echo $row['fname']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" required name="email" class="form-control" value="<?php echo $row['email']; ?>">
                               </div>

                               <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" name="address" id="address"><?php echo $row['address']; ?></textarea>
                               </div>

                               <div class="form-group">
                                 <label>Profile</label>
                                 <input type="file" name="image" accept="image/*" class="form-control" id="fileUpload"/>
                                 <img height="100" width="100" src="<?php echo base_url();?>assets/profile/<?php echo $row['profile'];?>">
                               </div>

                           
                              <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>

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
<!-- The Modal -->
<div class="modal" id="myModaladd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="error"></div>
     <form method="post" action="<?php echo base_url();?>Admin/add-user" id="addmanufacturer" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
         <label>Name</label>
         <input type="text" required name="name" class="form-control">
       </div>

       <div class="form-group">
         <label>Email</label>
         <input type="email" required name="email" class="form-control">
       </div>

       <div class="form-group">
         <label>Password</label>
         <input type="password" required name="password" class="form-control">
       </div>

       <div class="form-group">
         <label>Confirm Password</label>
         <input type="password" required name="cpassword" class="form-control">
       </div>

       <div class="form-group">
         <label>Address</label>
         <textarea class="form-control" name="address" id="address"></textarea>
       </div>

       <div class="form-group">
          <label>Image</label>
          <input type="file" name="image" accept="image/*" class="form-control"  id="fileUpload"/>
          <img class="imgUploadImgMsg" id="output" height="100px" width="100px" style="display:none"/>
        </div>
       </div>

      <!-- Modal footer -->
      <div class="modal-footer">
           <button type="submit" class="btn btn-info btn-prop" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
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
var msg=$('#msg').val();

if(msg != '')
  {
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
  else
  {
     $('#display-error').fadeIn().delay(3000).fadeOut();    
     $('.submit_process_btn').prop('disabled',false);
  }



}
</script>
<script type="text/javascript">
   $('#fileUpload').on("change",function () {

                var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    // alert("Only '.jpeg','.jpg' formats are allowed.");
                    alert("Only .jpeg, .jpg, .png, .gif formats are allowed.");
                    $('#fileUpload').val("");
                    $(".imgUploadImgMsg").css("display", "none");
                }
                else {
                    function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#output').attr('src', e.target.result);
                  $('.imgUploadImgMsg').css("display", "block");
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
              }
            }
            readURL(this);
                }
                
 });

   function deleteuser(id){  

    $.ajax({
        type: 'POST',   
        url: "<?php echo base_url(); ?>Admin/Users/delete_users?id="+id,
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
        $(".print-success-msg").find("ul").append('Success! User has been deleted successfully.');
        return false;
    }
    });    
     
}
</script>