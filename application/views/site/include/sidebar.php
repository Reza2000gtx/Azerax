
<?php
if($user['profile']){
$profile=base_url().'assets/profile/'.$user['profile'];

	}else{$profile='https://sjcsadar.org/uploads/teacher_image/37.jpg';
}

$page=$this->uri->segment(1);
									 ?>
<style type="text/css">
.ul_set .active  {
    background: rgba(10,102,194,0.1);
    color: #0a66c2;
}
</style>
<div class="left_side">
   <div class="username_ge">
      <div data-toggle="modal" data-target="#editprofile<?php echo $user['user_id'] ; ?>" class="user_img">
         <img src="<?php echo $profile;?>">
      </div>
      <h4><?php echo $user['fname'];?></h4>
      <p><?php echo $user['email'];?></p>
   </div>
  
 
   <ul class="ul_set sider_barr">
	  <li ><a class=" <?php if($page=='profile'){ echo 'active';}?> " href="<?php echo base_url();?>profile"><i  class="lnr lnr-user" ></i> Profile</a></li>    
	  <li><a class=" <?php if($page=='change-password'){ echo 'active';}?> "  href="<?php echo base_url();?>change-password"><i class="lnr lnr-lock"></i> Change Password</a></li>    
     <li><a  class=" <?php if($page=='add-product'){ echo 'active';}?> "  href="<?php echo base_url();?>add-product"><i class="lnr lnr-lock"></i> Add an Item</a></li>
      <li><a  class=" <?php if($page=='add-product'){ echo 'active';}?> "  href="<?php echo base_url();?>my-product-listing"><i class="lnr lnr-lock"></i> My Item Listing</a></li>    
   </ul>
	</div>



  <!-- Post cmment Modal -->
<div id="editprofile<?php echo $user['user_id'] ; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
 <div class="content">
                                <div class="seeting-form inline-form">


  <form id="my-form" action="<?php echo base_url(); ?>edit-image-profile-action" method="post" enctype='multipart/form-data'>


 <input type="hidden"  name="user_id" value="<?php echo $user['user_id'] ; ?>" />

    
          <div class="user_img">
            <img src="<?php echo $profile;?>">
          </div>

          <div class="form-group">
              <input type="file" value="<?php echo $user['profile'] ; ?>" name="profile" id="file-upload"   accept="image/*"  />
          </div>

         
                    <div class="form-group">
                           <button  id="btn-submit" type="submit" class="btn btn-default edit-btn" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Profile Image <i style="display:none;" class="fa fa-spinner submit_process_loading" id="btn-load"></i></button>
                    </div>
                    
                </form> 

                    </div>
                            </div>
                        </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-default edit-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
  </div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <script type="text/javascript">

   

    $(document).ready(function () {

    

        $("#my-form").submit(function (e) {

   

            $("#btn-submit").attr("disabled", true);

            $('.submit_process_loading').show();

            return true;

    

        });

    });

    

</script>