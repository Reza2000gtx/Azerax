<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->check_login();
	}

	public function check_login(){
		if(!$this->session->userdata('admin_id')){
			redirect('Admin/login');
		}
	}

	public function index(){
	
		$data['teachers'] = $this->common_model->GetAllData('users');
		$data['devices'] = $this->common_model->GetAllData('product');
		$data['pending_devices'] = $this->common_model->GetAllData('product',array('status'=>0));
		$data['expire_devices'] = $this->db->query("SELECT * FROM product WHERE product.expiry_date >= DATE(now()) AND product.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 2 MONTH) And status = 1 ")->result_array();
		$data['review'] = $this->common_model->GetAllData('review',array('read_review'=>0));
		$data['contact'] = $this->common_model->GetAllData('contact_us',array('read_contact'=>0));	
		
		$this->load->view('admin/index',$data);
	}
	public function advertisement(){
		$data['ads'] = $this->common_model->GetAllData('advertisement','','position_order','ASC');

		$this->load->view('admin/ads',$data);
	}
		public function orders(){
		$data['rows'] = $this->common_model->GetAllData('order','','order_id','desc');

	
		$this->load->view('admin/orders',$data);
	}

	public function add_advertisement(){



		
        if($_FILES['ads_image']['name']){

			$config['upload_path']="assets/admin/ads";
			$config['allowed_types'] = 'jpeg|gif|jpg|png';
			$config['encrypt_name']=true;
			$this->load->library("upload",$config);
			 if(!$this->upload->do_upload('ads_image')){
			    $this->session->set_flashdata('msg','<div class="alert alert-danger">Error uploading image: '.$this->upload->display_errors('','').'</div>');
			    redirect('Admin/advertisement');
			    return;
			 }
			$u_profile=$this->upload->data("file_name");
		    $insert['ads_image'] = $u_profile;
		    
		    if($_POST['category']!=0){
		    $insert['category'] = $_POST['category'];
		    $insert['subcategory'] = $_POST['subcategory'];	
		    }
		    
//die;
			$run = $this->common_model->InsertData('advertisement',$insert);

		
			



			if($run){

				$this->session->set_flashdata('msg','<div class="alert alert-success">Success! advertisement has been added successfully .</div>');

			} else {
		$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
			}

			
		
				redirect('Admin/advertisement');
			} else {
			    $this->session->set_flashdata('msg','<div class="alert alert-danger">Please choose an image to upload.</div>');
			    redirect('Admin/advertisement');
			}

	 }
	 public function update_position(){

		$position = $_POST['position'];


		$i=1;
		foreach($position as $k=>$v){
			$insert['position_order'] =$i;

$run = $this->common_model->UpdateData('advertisement',array('ads_id'=>$v),$insert);

		
		
		
			$i++;
		}
	 }
	 public function Getsubcat(){

		$cat_id = $_POST['cat_id'];
		?>
		<label>Select Subcategory</label>
       	<select class="form-control" name="subcategory" required>
       	     	<option value="0">Select Option</option>
       	     	<?php 
       	     	$selectAllSubCatquery = $this->common_model->GetAllData('subcategory',array('cat_id'=>$cat_id));
       	     	
       	     	foreach ($selectAllSubCatquery as  $subcategory) {
       	     		?>
       	     		<option value="<?=$subcategory['id']?>"><?=html_escape($subcategory['sub_name'])?></option>
       	     		<?php
       	     	}
       	     	
       	     	
       	     	?>
       	     	
       	</select>
		<?php


		
	 }
	 public function Getsubcatedit(){

		$cat_id = $_POST['cat_id'];
		?>
		
       	     	<option value="0">Select Option</option>
       	     	<?php 
       	     	$selectAllSubCatquery = $this->common_model->GetAllData('subcategory',array('cat_id'=>$cat_id));
       	     	
       	     	foreach ($selectAllSubCatquery as  $subcategory) {
       	     		?>
       	     		<option value="<?=$subcategory['id']?>"><?=html_escape($subcategory['sub_name'])?></option>
       	     		<?php
       	     	}
       	     	
       	     	
       	     	?>
       	     	
       	
		<?php


		
	 }
	 public function update_advertisement(){



		
            if($_FILES['ads_image']['name']){

			$config['upload_path']="assets/admin/ads";
			$config['allowed_types'] = 'jpeg|gif|jpg|png';
			$config['encrypt_name']=true;
			$this->load->library("upload",$config);
			 if(!$this->upload->do_upload('ads_image')){
			    $this->session->set_flashdata('msg','<div class="alert alert-danger">Error uploading image: '.$this->upload->display_errors('','').'</div>');
			    redirect('Admin/advertisement');
			    return;
			 }
			$u_profile=$this->upload->data("file_name");
		    $insert['ads_image'] = $u_profile;

		    }
		    if($_POST['category']==0){
		    $insert['category'] = 0;
		    $insert['subcategory'] = 0;	
		    }else{
		    $insert['category'] = $_POST['category'];
		    $insert['subcategory'] = $_POST['subcategory'];	
		    }
//die;
			$run = $this->common_model->UpdateData('advertisement',array('ads_id'=>$this->input->post('ads_id')),$insert);

		    if($run){

				$this->session->set_flashdata('msg','<div class="alert alert-success">Success! advertisement has been added successfully .</div>');

			} else {
		        $this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
			}
			redirect('Admin/advertisement');

 	}
	 public function delete_advertisement(){
		$id = $this->uri->segment(3);
   

	   $run2 = $this->common_model->DeleteData('advertisement',array('ads_id' =>$id ));
	   if($run2){
		   $this->session->set_flashdata('msg','<div class="alert alert-success">Advertisement has been Deleted successfully</div>');
			//echo $this->session->userdata('admin_id');
		   
	   } else {
		   $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong</div>');
		   
	   }	
	   redirect('Admin/advertisement');

   }
	
   public function activate_ads(){
	$id = $this->uri->segment(3);
	$insert['status'] =1;

   $run2 = $this->common_model->UpdateData('advertisement',array('ads_id' =>$id ),$insert);
   if($run2){
	   $this->session->set_flashdata('msg','<div class="alert alert-success">Advertisement has been Activated successfully</div>');
		//echo $this->session->userdata('admin_id');
	   
   } else {
	   $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong</div>');
	   
   }	
   redirect('Admin/advertisement');

}
public function deactivate_ads(){
$id = $this->uri->segment(3);
$insert['status'] =0;

$run2 = $this->common_model->UpdateData('advertisement',array('ads_id' =>$id ),$insert);
if($run2){
   $this->session->set_flashdata('msg','<div class="alert alert-success">Advertisement has been Deactivated successfully</div>');
	//echo $this->session->userdata('admin_id');
   
} else {
   $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong</div>');
   
}	
redirect('Admin/advertisement');

}
	public function logout(){
		session_destroy();
		redirect('Admin/login');
	}

	public function payment_option(){
		$data['admin'] = $this->common_model->GetAllData('admin');
		//print_r($data['admin']);
		$this->load->view('admin/payment_option',$data);
 
	  }
	  public function update_payment_option(){
		$insert['stripe_amount'] = $this->input->post('stripe_amount');
		$insert['PI_amount'] = $this->input->post('PI_amount');
$insert['commission'] = $this->input->post('commission');
		$run = $this->common_model->UpdateData('admin',array('id'=>1),$insert);

		if($run){

			$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Payment has been updated successfully .</div>');

		} else {
	$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
		}

		
	
			redirect('Admin/payment-option');
		}
 
	  
	  	public function settings(){
		$data['admin'] = $this->common_model->GetAllData('admin');
		//print_r($data['admin']);
		$this->load->view('admin/settings',$data);
 
	  }
	  public function resizeImage($filename)
	 {
  
		$source_path = './assets/img/'. $filename;
		$target_path =  './assets/img/';
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'create_thumb' => TRUE,
			'thumb_marker' => '200*50',
			'width' => 210,
			'height' => 50
		);
  
  
		$this->load->library('image_lib', $config_manip);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
  
 
		$this->image_lib->clear();
	 }
public function update_settings_option(){
	if($this->input->post('website_logo_option')){
		if($_FILES['website_logo']['name']){

			$config['upload_path']="assets/img";
			$config['allowed_types'] = 'jpeg|gif|jpg|png';
			$config['encrypt_name']=true;
			$this->load->library("upload",$config);
			 $this->upload->do_upload('website_logo');
			$website_logo=$this->upload->data("file_name");
			$this->resizeImage($website_logo);
			$exts=explode(".",$website_logo);
		// $insert['website_logo'] =  $exts[0]."200*50.".$exts[1];
		 $insert['website_logo'] =  $website_logo;
		}

	}
	if($this->input->post('mail_option')){
		$insert['mail_from_title'] = $this->input->post('mail_from_title');
		$insert['mail_from_email'] = $this->input->post('mail_from_email');
		$insert['mail_signature'] = $this->input->post('mail_signature');

	}
	if($this->input->post('home_page_banner_option')){

		$insert['home_page_description'] = $this->input->post('home_page_description');
		$insert['home_banner_url'] = $this->input->post('home_banner_url');
		

		if($_FILES['home_page_banner']['name']){

			$config['upload_path']="assets/admin";
			$config['allowed_types'] = 'jpeg|gif|jpg|png';
			$config['encrypt_name']=true;
			$this->load->library("upload",$config);
			 $this->upload->do_upload('home_page_banner');
			$home_page_banner=$this->upload->data("file_name");
		 $insert['home_page_banner'] = $home_page_banner;
		}
	}


		if($this->input->post('home_page_post_option')){
			$insert['post_section_heading'] = $this->input->post('post_section_heading');
			$insert['post_section_content'] = $this->input->post('post_section_content');
		}

		if($this->input->post('home_page_featured_post_option')){
			$insert['featured_post_section_heading'] = $this->input->post('featured_post_section_heading');
			$insert['featured_post_section_content'] = $this->input->post('featured_post_section_content');
		}

		if($this->input->post('home_page_best_selling_option')){
			$insert['best_selling_section_heading'] = $this->input->post('best_selling_section_heading');
			$insert['best_selling_section_content'] = $this->input->post('best_selling_section_content');
		}

		if($this->input->post('home_page_our_category_option')){
			$insert['our_category_section_heading'] = $this->input->post('our_category_section_heading');
			$insert['our_category_section_content'] = $this->input->post('our_category_section_content');
		}
		if($this->input->post('home_page_our_brand_option')){
			$insert['our_brand_section_heading'] = $this->input->post('our_brand_section_heading');
			$insert['our_brand_section_content'] = $this->input->post('our_brand_section_content');
		}
		if($this->input->post('subcriber_section_option')){

			$insert['subcriber_section_description'] = $this->input->post('subcriber_section_description');
			$insert['subcriber_section_title'] = $this->input->post('subcriber_section_title');
			
	
			if($_FILES['subcriber_background_image']['name']){
	
				$config['upload_path']="assets/admin";
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['encrypt_name']=true;
				$this->load->library("upload",$config);
				 $this->upload->do_upload('subcriber_background_image');
				$subcriber_background_image=$this->upload->data("file_name");
			 $insert['subcriber_background_image'] = $subcriber_background_image;
			}
		}
	
		if($this->input->post('best_seller_option')){

			$insert['best_seller_description'] = $this->input->post('best_seller_description');
			$insert['best_seller_heading'] = $this->input->post('best_seller_heading');
			$insert['best_seller_btn_url'] = $this->input->post('best_seller_btn_url');
			$insert['best_seller_upper_heading'] = $this->input->post('best_seller_upper_heading');
			$insert['best_seller_btn_name'] = $this->input->post('best_seller_btn_name');
			$insert['best_selling_section_display'] = $this->input->post('best_selling_section_display');

			if($_FILES['best_seller_banner']['name']){
	
				$config['upload_path']="assets/admin";
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['encrypt_name']=true;
				$this->load->library("upload",$config);
				 $this->upload->do_upload('best_seller_banner');
				$best_seller_banner=$this->upload->data("file_name");
			 $insert['best_seller_banner'] = $best_seller_banner;
			}

		}

		if($this->input->post('footer_content_option')){

			$insert['footer_content'] = $this->input->post('footer_content');
	
			if($_FILES['footer_logo']['name']){
	
				$config['upload_path']="assets/admin";
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['encrypt_name']=true;
				$this->load->library("upload",$config);
				 $this->upload->do_upload('footer_logo');
				$footer_logo=$this->upload->data("file_name");
			 $insert['footer_logo'] = $footer_logo;
			}
		}
		if($this->input->post('social_link')){

			$insert['facebook_link'] = $this->input->post('facebook_link');
			$insert['twitter_link'] = $this->input->post('twitter_link');
			$insert['instagram_link'] = $this->input->post('instagram_link');
			$insert['linkedin_link'] = $this->input->post('linkedin_link');
		}
		if($this->input->post('google_adsense_option')){

			$insert['single_post_ads_script'] = $this->input->post('single_post_ads_script');
			$insert['home_ads_script'] = $this->input->post('home_ads_script');
			$insert['google_analytics_script'] = $this->input->post('google_analytics_script');
			$insert['facebook_pixcel_script'] = $this->input->post('facebook_pixcel_script');

		}
		$run = $this->common_model->UpdateData('admin',array('id'=>1),$insert);

		if($run){

			$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Basic Settings has been updated successfully .</div>');

		} else {
	$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
		}

		
	
			redirect('Admin/settings');
		}


		public function mail_setting(){
			$data['admin'] = $this->common_model->GetAllData('admin');
			//print_r($data['admin']);
			$this->load->view('admin/mail_contents',$data);
	 
		  }
		  public function update_mail_settings_option(){

			
			if($this->input->post('ad_free_mail_option')){
				$insert['ad_free_mail_after_hour'] = $this->input->post('ad_free_mail_after_hour');
				$insert['ad_free_mail_subject'] = $this->input->post('ad_free_mail_subject');
				$insert['ad_free_mail_content'] = $this->input->post('ad_free_mail_content');

			}
			if($this->input->post('post_expired_mail_option')){
				$insert['before_expire_hour_day'] = $this->input->post('before_expire_hour_day');
				$insert['post_expire_subject'] = $this->input->post('post_expire_subject');
				$insert['post_expire_content'] = $this->input->post('post_expire_content');

			}
			$run = $this->common_model->UpdateData('admin',array('id'=>1),$insert);

			if($run){
	
				$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Mail Settings has been updated successfully .</div>');
	
			} else {
		$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
			}
	
			
		
				redirect('Admin/mail_settings');
		}
		public function default_messages(){
			$data['messages'] = $this->common_model->GetAllData('default_website_messages');
			//print_r($data['admin']);
			$this->load->view('admin/default_messages',$data);
	 
		  }
		  public function update_default_message(){

			
			
				$insert['message'] = $this->input->post('message');

		
			$run = $this->common_model->UpdateData('default_website_messages',array('message_id'=>$this->input->post('message_id')),$insert);

			if($run){
	
				$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Messages  has been updated successfully .</div>');
	
			} else {
		$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
			}
	
			
		
				redirect('Admin/default_messages');
		}

		public function notifications(){
			 $type_alert=$this->uri->segment(3);
			if($type_alert=='new_user'){
				$type_alert='New user';
			}else
			if($type_alert=='new_ad'){
				$type_alert='New ad';
			}

			$data['title'] =$type_alert;
			$data['notifications'] = $this->common_model->GetAllData('notification_alerts',array('type_alert'=>$type_alert),'id','desc');
			$this->load->view('admin/notifications',$data);
	 
		  }
		  public function admin_list(){
			$type=2;
		   

		   $data['admins'] = $this->common_model->GetAllData('admin',array('type'=>$type),'id','asc');
		   $this->load->view('admin/admin_list',$data);
	
		 }
		 public function admin_create(){
		 $insert['admin_name'] = $this->input->post('admin_name');
		 $insert['admin_email'] = $this->input->post('admin_email');
		 $insert['admin_password'] = password_hash($this->input->post('admin_password'), PASSWORD_DEFAULT);
		 $insert['type'] = 2;

			if($_FILES['admin_image']['name']){
	
				$config['upload_path']="assets/admin_profiles";
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['encrypt_name']=true;
				$this->load->library("upload",$config);
				 $this->upload->do_upload('admin_image');
				$admin_image=$this->upload->data("file_name");
			 $insert['admin_image'] = $admin_image;
			}
			 $run = $this->common_model->InsertData('admin',$insert);
			 $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Admin  has been added successfully .</div>');

			 redirect('Admin/admin_list');


			}
			public function admin_delete(){
				$id=$this->uri->segment(3);

					$run = $this->common_model->DeleteData('admin',array('id'=>$id));
					$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Admin  has been deleted successfully .</div>');
	   
					redirect('Admin/admin_list');
	   
	   
				   }
				   public function permission_update(){

					$id=$this->input->post('admin_id');
					$run = $this->common_model->DeleteData('admin_permission',array('admin_id'=>$id));

					$permission=$this->input->post('permission');
					$add=$this->input->post('add_userlist');

				//	print_r($permission);
					$insert=array();
					//print_r($_POST);
					foreach($permission as $per)
					{
						$insert['module'] =$per;
						$per1=$per.'_add';
						if($this->input->post($per1)){
							$insert['add'] =$this->input->post($per1);
						}else{
							$insert['add'] ='NO';

						}
						$per2=$per.'_edit';

						if($this->input->post($per2)){
							$insert['edit'] =$this->input->post($per2);
						}else{
							$insert['edit'] ='NO';

						}
						$per3=$per.'_delete';

						if($this->input->post($per3)){
							$insert['delete'] =$this->input->post($per3);
						}else{
							$insert['delete'] ='NO';

						}
						$per4=$per.'_active_deactive';

						if($this->input->post($per4)){
							$insert['active_deactive'] =$this->input->post($per4);
						}else{
							$insert['active_deactive'] ='NO';

						}
						$insert['admin_id'] =$id;

						//print_r($insert);
						$run = $this->common_model->InsertData('admin_permission',$insert);

					}

					$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Admin  has been  Permissions updated successfully .</div>');
		   
						redirect('Admin/admin_list');


				   }
				   public function admin_update(){
					$id=$this->input->post('admin_id');
					$insert['admin_name'] = $this->input->post('admin_name');
					$insert['admin_email'] = $this->input->post('admin_email');
					if($this->input->post('admin_password')){ $insert['admin_password'] = password_hash($this->input->post('admin_password'), PASSWORD_DEFAULT); }
		   
					   if($_FILES['admin_image']['name']){
			   
						   $config['upload_path']="assets/img/admin_profiles";
						   $config['allowed_types'] = 'jpeg|gif|jpg|png';
						   $config['encrypt_name']=true;
						   $this->load->library("upload",$config);
							$this->upload->do_upload('admin_image');
						   $admin_image=$this->upload->data("file_name");
						$insert['admin_image'] = $admin_image;
					   }
						$run = $this->common_model->UpdateData('admin',array('id'=>$id),$insert);
						$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Admin  has been updated successfully .</div>');
		   
						redirect('Admin/admin_list');
		   
		   
					   }
					   public function alert_emails(){
						$data['emails'] = $this->common_model->GetAllData('staff_alert_emails');
						//print_r($data['admin']);
						$this->load->view('admin/alert_emails',$data);
				 
					  }
					  public function add_alert_emails(){
						$insert['email'] =$this->input->post('email');

						//print_r($insert);
						$run = $this->common_model->InsertData('staff_alert_emails',$insert);
						$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Email Address  has been added successfully .</div>');

						redirect('Admin/alert_emails');

					  }
					  public function alert_emails_delete(){
						$id=$this->uri->segment(3);
												$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Email Address  has been added successfully .</div>');

						$run = $this->common_model->DeleteData('staff_alert_emails',array('id'=>$id));
						$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Email Address  has been deleted successfully .</div>');

						redirect('Admin/alert_emails');

					  }

					  public function settinglist(){
							$data['settinginfo'] = $this->common_model->GetAllData('setting');
							$this->load->view('admin/settinglist',$data);
						}

					  public function add_payment(){ 

							$this->form_validation->set_rules('amount','Amount','required');
					 		
					 		if($this->form_validation->run()==true){

								$insert['amount'] = $this->input->post('amount');
                        $insert['actual_amount'] = $this->input->post('amount');
								$insert['status'] = 1;
								$insert['added_by'] = $this->session->userdata('admin_id');
								$insert['created_on'] = date('Y-m-d H:i:s');
						
								$run = $this->common_model->InsertData('setting',$insert);

								if($run){

									$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Payment has been added successfully .</div>');

									echo "1";
								} else {
								//$this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
									echo "0";
								}

								
							} else {
								echo '<div class="alert alert-danger">'.validation_errors().'</div>';
							}

					 	}

					 	public function edit_payment(){

							$this->form_validation->set_rules('amount','Amount','required');
					 		
					 		if($this->form_validation->run()==true){

								$update['amount'] = $this->input->post('amount');
								
								$id = $this->input->post('id');

								$run = $this->common_model->UpdateData('setting',array('id'=>$id),$update);
					            //echo $this->db->last_query();
								if($run){

									$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Payment has been updated successfully .</div>');

									//redirect('Admin/listcat');
									echo "1";
								} else {
									//$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
									echo "0";
								}

								
							} else {
								//$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
								echo '<div class="alert alert-danger">'.validation_errors().'</div>';
							}

					 	}

		public function contact_us(){
		$data['contact'] = $this->common_model->GetAllData('contact_us','','id','desc');
		//print_r($data['admin']);
		
	$data['contact'] = $this->common_model->GetAllData('contact_us','','id','desc');

		$this->load->view('admin/contact_us',$data);
 
	  }

	  public function update_contact(){

		$id=$this->input->post('id'); 
		$email=$this->input->post('email');
		$name=$this->input->post('name');
		$reply=$this->input->post('reply'); 
		
		$insert['reply']=$reply;
		
		$run = $this->common_model->UpdateData('contact_us',array('id'=>$id),$insert);
		
		if($run)
		{
			   $subject = "Contact Reply by Admin";
				
				$body = '<p>Hello, '.$name.'</p>';
				$body .= '<p>'.$reply.'</p>';
				
				$send = $this->common_model->SendMail($email,$subject,$body);
				
				$this->session->set_flashdata('msgs','<div class="alert alert-success"><p>Reply Added successfully!</p></div>');
				redirect('Admin/contact_us');
		}
		else
		{
			$this->session->set_flashdata('msgs','<div class="alert alert-danger">Something went wrong.</div>');
			redirect('Admin/contact_us');
		}
		
	}
	
	public function ticket(){
		 $data['ticket'] = $this->common_model->GetAllData('ticket','','','','','','','ticket_id');
	    $this->load->view('admin/ticket_listing',$data);
    }
    
    public function chat_box(){
 	    $ticket_id=$_GET['ticket_id'];
 	    $update['read_user'] =2;
        $run = $this->common_model->UpdateData('ticket',array('ticket_id'=>$ticket_id),$update);
 	    $this->load->view('admin/chat_box');
	}
	
		public function reply_action()
	{
	    
      $this->form_validation->set_rules('message','Message','required');
	
	 if($this->form_validation->run()==true){
		    
		     $user_id =$this->input->post('user_id');
	         $email=$this->input->post('email');
             $name = $this->input->post('name');
			 $subject = $this->input->post('subject');
			 $msg = $this->input->post('message');
			 $ticketid=$this->input->post('ticket_id');
            
            $run = $this->common_model->InsertData('ticket',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$msg,'user_id'=>$user_id,'ticket_id'=>$ticketid,'read_admin'=>1,'created_at'=>date('Y-m-d H:i:s')));

			if($run){
         
			    $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Reply has been send successfully.</div>');
				redirect('Admin/ticket');
			   } else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
				redirect('Admin/ticket');
			   }

		} else {
			$this->load->view('admin/ticket_listing');
		}
	}

}

?>