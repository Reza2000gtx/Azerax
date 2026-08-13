<?php 
include_once('include/header.php'); 
?>
<style>
.switch {
  display: inline-block;
  float: right;
  height: 34px;
  position: relative;
  width: 60px;
}
.switch input {
  display: none;
}
.slider.round::before {
  border-radius: 50%;
}
.slider::before {
  background-color: white;
  bottom: 4px;
  content: "";
  height: 26px;
  left: 4px;
  position: absolute;
  transition: all 0.4s ease 0s;
  width: 26px;
}
.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 0.4s ease 0s;
}
.slider.round {
  border-radius: 34px;
}
input:checked + .slider::before {
  transform: translateX(26px);
}
input.primary:checked + .slider {
  background-color: #7611ff;
}

.rado_sel {
  min-height: 34px;
  padding-right: 75px;
  position: relative;
  padding-top: 6px;
  margin-bottom: 10px;
}
.rado_sel p {
  margin: 0;
  position: absolute;
  right: 0;
  top: 0;
}
</style>
 
                    <?php if($admin_permission_single && $admin_permission_single['edit']=='NO') { ?>
						
						<style>

						.btn-success {
display:none;
}
</style> 

						<?php	} ?>			

<div class="content-wrapper">
    <section class="content-header">
		<h1>settings<small>Manage</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">settings Option</a></li>
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
						<h3 class="box-title">Mail Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Mail From Title</label>
								<input type="text" name="mail_from_title" id="mail_from_title" value="<?php echo $admin[0]['mail_from_title'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Mail From Email</label>
								<input type="text" name="mail_from_email" id="mail_from_email" value="<?php echo $admin[0]['mail_from_email'];?>" class="form-control valid" aria-invalid="false">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Mail signature/disclaimer</label>
								<input type="text" name="mail_signature" id="mail_signature" value="<?php echo $admin[0]['mail_signature'];?>" class="form-control valid" aria-invalid="false">
							</div>
							
                            <input type="hidden" name="mail_option" value="mail_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>


			 <div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Website Logo Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Logo</label>
								<input type="file" name="website_logo" accept="image/*">
								<br/>
                                <img src="<?php echo base_url();  ?>assets/img/<?php echo $admin[0]['website_logo']; ?>" width="200" height="50">
							</div>
                            
                       
                            <input type="hidden" name="website_logo_option" value="website_logo_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Banner Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Banner Image</label>
                                <input type="file" name="home_page_banner" accept="image/*">
                                <img src="<?php echo base_url();  ?>/assets/admin/<?php echo $admin[0]['home_page_banner']; ?>" height="200" width="500">


							</div>
                            <div class="form-group">
								<label class=" form-control-label">Banner Heading</label>
								<input type="text" name="home_page_description" id="home_page_description" value="<?php echo $admin[0]['home_page_description'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Banner URL</label>
                            <input type="text" name="home_banner_url" id="home_banner_url" value="<?php echo $admin[0]['home_banner_url'];?>" class="form-control valid" aria-invalid="false">
							</div>
							

			<input type="hidden" name="home_page_banner_option" value="home_page_banner_option">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>

			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Post section option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
				 <div class="form-group">
								<label class=" form-control-label">Post Section Heading</label>
                            <input type="text" name="post_section_heading" id="post_section_heading" value="<?php echo $admin[0]['post_section_heading'];?>" class="form-control valid" aria-invalid="false">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Post Section Content</label>
                                <textarea name="post_section_content" value="" class="form-control " required="" ><?php echo $admin[0]['post_section_content']; ?></textarea>
	
                            </div>
                            <input type="hidden" name="home_page_post_option" value="home_page_post_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Featured Post section option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
				 <div class="form-group">
								<label class=" form-control-label">Featured Post Section Heading</label>
                            <input type="text" name="featured_post_section_heading" id="featured_post_section_heading" value="<?php echo $admin[0]['featured_post_section_heading'];?>" class="form-control valid" aria-invalid="false">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Featured Post Section Content</label>
                                <textarea name="featured_post_section_content"  class="form-control " required="" ><?php echo $admin[0]['featured_post_section_content']; ?></textarea>
	
                            </div>
                            <input type="hidden" name="home_page_featured_post_option" value="home_page_featured_post_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Best Selling section option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
				 <div class="form-group">
								<label class=" form-control-label">Best Selling Section Heading</label>
                            <input type="text" name="best_selling_section_heading" id="best_selling_section_heading" value="<?php echo $admin[0]['best_selling_section_heading'];?>" class="form-control valid" aria-invalid="false">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Best Selling Section Content</label>
                                <textarea name="best_selling_section_content"  class="form-control " required="" ><?php echo $admin[0]['best_selling_section_content']; ?></textarea>
	
                            </div>
                            <input type="hidden" name="home_page_best_selling_option" value="home_page_best_selling_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div> 
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Our Categories section option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
				 <div class="form-group">
								<label class=" form-control-label">Our Categories Section Heading</label>
                            <input type="text" name="our_category_section_heading" id="our_category_section_heading" value="<?php echo $admin[0]['our_category_section_heading'];?>" class="form-control valid" aria-invalid="false">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Our Categories Section Content</label>
                                <textarea name="our_category_section_content"  class="form-control " required="" ><?php echo $admin[0]['our_category_section_content']; ?></textarea>
	
                            </div>
                            <input type="hidden" name="home_page_our_category_option" value="home_page_our_category_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div> 
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Subcriber section option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">

				  <div class="form-group">
								<label class=" form-control-label">Banner Image</label>
                                <input type="file" name="subcriber_background_image" accept="image/*">
                                <img src="<?php echo base_url();  ?>/assets/admin/<?php echo $admin[0]['subcriber_background_image']; ?>" height="200" width="500">


							</div>
				 <div class="form-group">
								<label class=" form-control-label"> Section Heading</label>
                            <input type="text" name="subcriber_section_title" id="subcriber_section_title" value="<?php echo $admin[0]['subcriber_section_title'];?>" class="form-control valid" aria-invalid="false">
							</div>

							<div class="form-group">
								<label class=" form-control-label"> Section Content</label>
                                <textarea name="subcriber_section_description"  class="form-control " required="" ><?php echo $admin[0]['subcriber_section_description']; ?></textarea>
	
                            </div>
                            <input type="hidden" name="subcriber_section_option" value="subcriber_section_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div> 
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Home Page Our Brands section option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
				 <div class="form-group">
								<label class=" form-control-label">Our Brands Section Heading</label>
                            <input type="text" name="our_brand_section_heading" id="our_brand_section_heading" value="<?php echo $admin[0]['our_brand_section_heading'];?>" class="form-control valid" aria-invalid="false">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Our Brands Section Content</label>
                                <textarea name="our_brand_section_content"  class="form-control " required="" ><?php echo $admin[0]['our_brand_section_content']; ?></textarea>
	
                            </div>
                            <input type="hidden" name="home_page_our_brand_option" value="home_page_our_brand_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>  
            <div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Best Seller Banner Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				 <?php 
  $showads=1;
  if($admin[0]['best_selling_section_display']==1){
    $showads=$admin[0]['best_selling_section_display'];
  }
  ?>
	   
				 <div class="box-body">
                 <!-- <div class="form-group">
								<label class=" form-control-label">Upper Banner Heading</label>
                                <textarea name="best_seller_upper_heading" value="" class="form-control " required="" ><?php echo $admin[0]['best_seller_upper_heading']; ?></textarea>
	
                            </div> -->
							<div class="form-group">
										<div class="rado_sel">
											Display <p>
												<label class="switch ">
				          <input class="primary" type="checkbox" name="best_selling_section_display"<?php if($admin[0]['best_selling_section_display']==1){echo 'checked';}?> value="<?php echo $showads; ?>">
				          <span class="slider round"></span>
				        </label>
											</p>
										</div>
											
									</div>
                 <div class="form-group">
								<label class=" form-control-label">Banner Image</label>
                                <input type="file" name="best_seller_banner" accept="image/*">
                                <img src="<?php echo base_url();  ?>/assets/admin/<?php echo $admin[0]['best_seller_banner']; ?>" height="200" width="500">


							</div>
                            <div class="form-group">
								<label class=" form-control-label">Banner Heading</label>
								<input type="text" name="best_seller_heading" id="best_seller_heading" value="<?php echo $admin[0]['best_seller_heading'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Banner Description</label>
                                <textarea name="best_seller_description" value="" class="form-control " required="" ><?php echo $admin[0]['best_seller_description']; ?></textarea>
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Button Name</label>
								<input type="text" name="best_seller_btn_name" id="best_seller_btn_name" value="<?php echo $admin[0]['best_seller_btn_name'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Button URL</label>
                            <input type="text" name="best_seller_btn_url" id="best_seller_btn_url" value="<?php echo $admin[0]['best_seller_btn_url'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <input type="hidden" name="best_seller_option" value="best_seller_option">

						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>           
            <div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Footer Content Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Logo Image</label>
                                <input type="file" name="footer_logo" accept="image/*">
                                <img src="<?php echo base_url();  ?>/assets/admin/<?php echo $admin[0]['footer_logo']; ?>" height="50" width="50">


							</div>
                            <div class="form-group">
								<label class=" form-control-label">Footer Content</label>
                                <textarea name="footer_content" value="" class="form-control ckeditor" required="" ><?php echo $admin[0]['footer_content']; ?></textarea>

							</div>
                          
			<input type="hidden" name="footer_content_option" value="footer_content_option">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
            
            <div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Social Links Option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
                 <div class="form-group">
								<label class=" form-control-label">Facebook</label>
								<input type="text" name="facebook_link" id="facebook_link" value="<?php echo $admin[0]['facebook_link'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Twitter</label>
								<input type="text" name="twitter_link" id="twitter_link" value="<?php echo $admin[0]['twitter_link'];?>" class="form-control valid" aria-invalid="false">
							</div>
                            <div class="form-group">
								<label class=" form-control-label">Instagram</label>
								<input type="text" name="instagram_link" id="instagram_link" value="<?php echo $admin[0]['instagram_link'];?>" class="form-control valid" aria-invalid="false">
							</div>
                           
                            <div class="form-group">
								<label class=" form-control-label">Linkedin</label>
								<input type="text" name="linkedin_link" id="linkedin_link" value="<?php echo $admin[0]['linkedin_link'];?>" class="form-control valid" aria-invalid="false">
							</div>         
			<input type="hidden" name="social_link" value="social_link">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
                 </form>
					
				</div>
			</div>
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Additional Script option</h3>
						
					</div>
                 <form method="post" action="<?php echo base_url() ?>Admin/update_settings_option" name="f3" id="f3" enctype='multipart/form-data'>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                 <div class="box-body">
                
                 <div class="form-group">
								<label class=" form-control-label">Home Page Google Adsense Script </label>
								<textarea name="home_ads_script" value="" class="form-control " required="" ><?php echo $admin[0]['home_ads_script']; ?></textarea>



							</div>
                            <div class="form-group">
								<label class=" form-control-label">Single Post Google Adsense Script </label>
                                <textarea name="single_post_ads_script" value="" class="form-control " required="" ><?php echo $admin[0]['single_post_ads_script']; ?></textarea>

							</div>
							<div class="form-group">
								<label class=" form-control-label">Google Analytics Script  </label>
                                <textarea name="google_analytics_script" value="" class="form-control " required="" ><?php echo $admin[0]['google_analytics_script']; ?></textarea>

							</div>
							<div class="form-group">
								<label class=" form-control-label">Facebook Pixcel Script </label>
                                <textarea name="facebook_pixcel_script" value="" class="form-control " required="" ><?php echo $admin[0]['facebook_pixcel_script']; ?></textarea>

							</div>
                          
			<input type="hidden" name="google_adsense_option" value="footer_content_option">
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