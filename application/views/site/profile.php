<?php include_once 'include/header.php';

?>
<div class="commn_dasboard p_120">
	<div class="container">
		<div class="row">
			<!-- <div class="col-sm-3">
				

<?php //include_once 'include/sidebar.php';?>
			</div> -->
						

			<div class="col-sm-6 mx-auto">
				<div class="right_box">
					<div class="heddding_1">
						<h4>Profile</h4>
			<!-- <?php //echo $this->session->flashdata('msg'); ?> -->

		<?php
      if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
    ?>

					</div>
<form action="<?php echo base_url(); ?>edit-profile-action" method="post" enctype='multipart/form-data'>

					<div class="form-group">
						<label>Username Name</label>
						<input type="text" required value="<?php echo $user['fname'];?>" name="username" placeholder="Username Name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" required name="email" value="<?php echo $user['email'];?>"  readonly placeholder="Email" class="form-control">
					</div>
					<!-- <div class="form-group">
						<label>Address</label>
						<input type="text" value="<?php echo $user['address'];?>"   name="address" placeholder="Address" class="form-control">
					</div> -->
					
				   <?php if(!empty($user['profile'])) { ?>
				   	<label> Current Image</label>
				    <div class="form-group">
                	
                        <img src="<?php echo base_url();?>assets/profile/<?php echo $user['profile'];?>" class="img-thumbnail" alt="logo" width="150" height="150">
                        <input type="hidden" name="oldprofile" value="<?php echo $user['profile'];?>">
                    </div>
                    <?php } ?>
                		
					<div class="form-group">
					   <label ><i class="fa fa-upload" aria-hidden="true"></i> New image</label>  
      			      <input type="file" name="profile" id="file-upload"   accept="image/*"  />
					</div> 
				
					<div class="form-group">
						<button class="btn submit_btn">Update</button>
					</div>
				</div>

					</form>
			</div>


	
		</div>
	</div>
</div>
<?php include_once 'include/footer2.php'; ?>