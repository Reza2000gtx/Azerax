<?php 
include_once('include/header.php'); 
?>
 <?php if($admin_permission_single && $admin_permission_single['edit']=='NO') { ?>
						
						<style>

						.btn-success {
display:none;
}
</style> 

						<?php	} ?>
<div class="content-wrapper">
    <section class="content-header">
		<h1>Mail Setting<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Mail settings Option</a></li>
			<li class="active">us</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php echo $this->session->flashdata('msg'); ?>
		<div class="row">
        <div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Ad Free Mail  Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_mail_settings_option" name="f3" id="f3">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Mail sent after hour</label>
								<input type="number" min="1" name="ad_free_mail_after_hour" id="ad_free_mail_after_hour" value="<?php echo $admin[0]['ad_free_mail_after_hour'];?>" class="form-control valid" aria-invalid="false">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Subject</label>
								<input type="text" name="ad_free_mail_subject" id="ad_free_mail_subject" value="<?php echo $admin[0]['ad_free_mail_subject'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Mail content</label>
                                <textarea name="ad_free_mail_content" value="" class="form-control ckeditor" required="" ><?php echo $admin[0]['ad_free_mail_content']; ?></textarea>
							</div>
                       
                            <input type="hidden" name="ad_free_mail_option" value="ad_free_mail_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
			


 <div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Post Expired Mail Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_mail_settings_option" name="f3" id="f3">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Mail sent before days</label>
								<input type="number" min="1" name="before_expire_hour_day" id="before_expire_hour_day" value="<?php echo $admin[0]['before_expire_hour_day'];?>" class="form-control valid" aria-invalid="false">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Subject</label>
								<input type="text" name="post_expire_subject" id="post_expire_subject" value="<?php echo $admin[0]['post_expire_subject'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Mail content</label>
                                <textarea name="post_expire_content" value="" class="form-control ckeditor" required="" ><?php echo $admin[0]['post_expire_content']; ?></textarea>
							</div>
                       
                            <input type="hidden" name="post_expired_mail_option" value="post_expired_mail_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
			

		</div>
    </section>
</div>

<?php include_once('include/footer.php'); ?>
<script>
 $(document).ready(function(){

            $("#f3").validate(
            {
                ignore: [],
              debug: false,
                rules: { 

                    about_us:{
                         required: function() 
                        {
                         CKEDITOR.instances.about_us.updateElement();
                        },

                         minlength:10
                    }
                },
                messages:
                    {

                    about_us:{
                        required:"Please enter Text",
                        minlength:"Please enter 10 characters"


                    }
                }
            });
        });

</script>