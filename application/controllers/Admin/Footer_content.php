<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
 error_reporting(0);

class Footer_content extends CI_Controller
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
 	
 	public function about_us(){

		$this->form_validation->set_rules('about_us','About us','trim|required');
 		

 		if($this->form_validation->run()==true){

			$about_us = $this->input->post('about_us');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('about_us' =>$about_us ));

			if($run){

				$this->session->set_flashdata('amsg','<div class="alert alert-success">Success! about us data has  Updated successfully .</div>');

				redirect('Admin/about_us');
			} else {
				$this->session->set_flashdata('amsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/about_us');
			}

			
		} else {
			$this->session->set_flashdata('amsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/about_us');
		}

 	}
 	
 	public function index(){
 		$data['about_us'] = $this->common_model->GetAllData('footer_content');
		$this->load->view('admin/about_us',$data);

		
	} 

	public function terms_condition(){
       $data['about_us'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/terms_condition',$data);

 	}

 	public function addterms() {
 		$this->form_validation->set_rules('term_condition','About us','trim|required');
 		

 		if($this->form_validation->run()==true){

			$term_condition = $this->input->post('term_condition');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('term_condition' =>$term_condition ));

			if($run){

				$this->session->set_flashdata('tmsg','<div class="alert alert-success">Success! Terms & condition data has  Updated successfully .</div>');

				redirect('Admin/terms-condition');
			} else {
				$this->session->set_flashdata('tmsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/terms-condition');
			}
			
		} else {
			$this->session->set_flashdata('tmsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/terms-condition');
		}
 	}

 	public function how_it_works(){
       $data['about_us'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/how_it_works',$data);

 	}

 	public function addhow_it_works() {
 		$this->form_validation->set_rules('how_it_works','About us','trim|required');
 		

 		if($this->form_validation->run()==true){

			$how_it_works = $this->input->post('how_it_works');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('how_it_works' =>$how_it_works ));

			if($run){

				$this->session->set_flashdata('hmsg','<div class="alert alert-success">Success! How it works data has  Updated successfully .</div>');

				redirect('Admin/how_it_works');
			} else {
				$this->session->set_flashdata('hmsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/how_it_works');
			}

			
		} else {
			$this->session->set_flashdata('hmsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/how_it_works');
		}
 	}

 	public function privacy_policy(){
       $data['about_us'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/privacy_policy',$data);

 	}

 	public function addpolicy() {
 		$this->form_validation->set_rules('privacy_policy','About us','trim|required');
 		

 		if($this->form_validation->run()==true){

			$privacy_policy = $this->input->post('privacy_policy');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('privacy_policy' =>$privacy_policy ));

			if($run){

				$this->session->set_flashdata('pmsg','<div class="alert alert-success">Success! Privacy Policy data has  Updated successfully .</div>');

				redirect('Admin/privacy-policy');
			} else {
				$this->session->set_flashdata('pmsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/privacy-policy');
			}

			
		} else {
			$this->session->set_flashdata('pmsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/privacy-policy');
		}
 	}

  public function support(){
       $data['about_us'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/support',$data);

 	}

 	public function addsupport() {
 		$this->form_validation->set_rules('support','Support','trim|required');
 		

 		if($this->form_validation->run()==true){

			$support = $this->input->post('support');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('support' =>$support ));

			if($run){

				$this->session->set_flashdata('smsg','<div class="alert alert-success">Success! Support data has  Updated successfully .</div>');

				redirect('Admin/support');
			} else {
				$this->session->set_flashdata('smsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/support');
			}

			
		} else {
			$this->session->set_flashdata('smsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/support');
		}
 	}


 	public function careers(){
       $data['careers'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/careers',$data);

 	}

 	public function addcareers() {
 		$this->form_validation->set_rules('careers','careers','trim|required');
 		

 		if($this->form_validation->run()==true){

			$careers = $this->input->post('careers');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('careers' =>$careers ));

			if($run){

				$this->session->set_flashdata('smsg','<div class="alert alert-success">Success! careers data has  Updated successfully .</div>');

				redirect('Admin/careers');
			} else {
				$this->session->set_flashdata('smsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/careers');
			}

			
		} else {
			$this->session->set_flashdata('smsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/support');
		}
 	}

   public function contact_us(){

   		$update['read_contact']=1;
		$run = $this->common_model->UpdateData('contact_us','',$update);	
       $data['contact'] = $this->common_model->GetAllData('contact_us','','id','desc');
	   $this->load->view('admin/contact_us',$data);

 	}
	 public function subscribe_us(){
		$data['contact'] = $this->common_model->GetAllData('contact_us',array('type'=>'subscriber'),'id','desc');
		$this->load->view('admin/subscribe_us',$data);
 
	  }
   
   public function replyrequest(){
    
    if(isset($_POST)){
       $this->form_validation->set_rules('reply','reply ','trim|required');
       
        $this->form_validation->set_error_delimiters('<div class="validation-msg">', '</div>');

    if($this->form_validation->run()==true){

       $idd= $this->input->post('id');
     // echo  count($idd);
   for($i=0;$i<=count($idd);$i++) {
           // echo $idd[$i];
    if($idd[$i]!=null){
    	$user= $this->common_model->GetSingleData('users',array('email' =>$idd[$i] ));
            //$email = $idd[$i];
    	      $email = $idd[$i];
				$subject="Reply";
					
				$body = '<p>Hello '.$user['fname'].'</p><p>Your contact request reply by admin </p><p><b>'.$this->input->post('reply').'</b></p>';
					 
					$send = $this->common_model->SendMail($email,$subject,$body);

        }
}
      
            //echo $this->db->last_query(); 
      if($send){
        $this->session->set_flashdata('reply','<div class="alert alert-success hide-it">Reply has been send successfully.</div>');
           redirect('Admin/contact_us');
      
        
      } else {
        $this->session->set_flashdata('reply','<div class="alert alert-danger hide-it">Something went wrong.</div>');
        redirect('Admin/contact_us');
        
         }

        } else {
        	$this->session->set_flashdata('reply','<div class="alert alert-danger hide-it">Message field is required.</div>');
          redirect('contact_us');
        } 
  
        }
    
  }


  public function social_media(){
       $data['social_media'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/social_media',$data);

 	}

 	public function addsocial_media() {
 		$this->form_validation->set_rules('facebook_link','facebook_link','trim|required');
 		

 		if($this->form_validation->run()==true){

			$facebook_link = $this->input->post('facebook_link');
			$instagram_link = $this->input->post('instagram_link');
			$twitter_link = $this->input->post('twitter_link');
			$youtube_link = $this->input->post('youtube_link');
			$google_link = $this->input->post('google_link');

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('facebook_link' =>$facebook_link , 'instagram_link' =>$instagram_link ,'twitter_link' =>$twitter_link ,'youtube_link' =>$youtube_link ,'google_link' =>$google_link ));

			if($run){

				$this->session->set_flashdata('tmsg','<div class="alert alert-success">Success!  Social Media data has  Updated successfully .</div>');

				redirect('Admin/social-media');
			} else {
				$this->session->set_flashdata('tmsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/social-media');
			}

			
		} else {
			$this->session->set_flashdata('tmsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/social-media');
		}
 	}

 	 public function footer_text(){
       $data['footer_text'] = $this->common_model->GetAllData('footer_content');
	   $this->load->view('admin/footer-text',$data);

 	}

 	public function addfooter_text() {
 		$this->form_validation->set_rules('footer_text','footer_text','trim|required');
 		

 		if($this->form_validation->run()==true){

			$footer_text = $this->input->post('footer_text');
			$address = $this->input->post('address');
			$phone_no = $this->input->post('phone_no');
			
			if(isset($_POST['status'])){
				$status = 1;
			}
			else{
				$status = 0;
			}
			

			$run = $this->common_model->UpdateData('footer_content',array('id' =>1),array('footer_text' =>$footer_text ,'address' =>$address ,'phone_no' =>$phone_no ,'status' =>$status ));

			if($run){

				$this->session->set_flashdata('tmsg','<div class="alert alert-success">Success!  Footer Text data has  Updated successfully .</div>');

				redirect('Admin/footer-text');
			} else {
				$this->session->set_flashdata('tmsg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/footer-text');
			}

			
		} else {
			$this->session->set_flashdata('tmsg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/footer-text');
		}
 	}
}


 ?>