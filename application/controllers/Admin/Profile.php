<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Profile extends CI_Controller
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
 	
 	public function change_name_email(){

		$this->form_validation->set_rules('admin_name','Name','required');
 		$this->form_validation->set_rules('admin_email','Email','required|valid_email');

 		if($this->form_validation->run()==true){

			$admin_name = $this->input->post('admin_name');
			$admin_email = $this->input->post('admin_email');

			$admin_id = $this->session->userdata('admin_id');


			$run = $this->common_model->UpdateData('admin',array('id' =>$admin_id),array('admin_email' =>$admin_email ,'admin_name'=>$admin_name));

			if($run){

				$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your Profile Update successfully .</div>');

				redirect('Admin/profile');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/profile');
			}

			
		} else {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/profile');
		}

 	}
 	public function change_password(){

 		$admin_id = $this->session->userdata('admin_id');
		$admindata= $this->common_model->GetSingleData('admin',array('id'=>$admin_id));
 		// echo "<pre>";
 		// print_r($admindata);
 		// echo "</pre>";

 		$this->form_validation->set_rules('admin_password','Current password','required');
 		$this->form_validation->set_rules('New_Password','New password','required|min_length[8]');
 		$this->form_validation->set_rules('Confirm_Password','Confirm password','required|matches[New_Password]');

 		if($this->form_validation->run()==true){

			$admin_pass = $this->input->post('admin_password');
			$New_Password = $this->input->post('New_Password');
			$Confirm_Password = $this->input->post('Confirm_Password');

 			// FIXED: the stored password is a bcrypt hash (Login.php uses
 			// password_verify() to check it) - comparing it with == against
 			// the raw input would always fail. password_verify() is the
 			// correct check here.
 			if(password_verify($admin_pass, $admindata['admin_password'])){

 				// FIXED: the new password is now hashed before storage,
 				// instead of being saved in plaintext.
 				$run = $this->common_model->UpdateData('admin',array('id' =>$admin_id),array('admin_password' =>password_hash($New_Password, PASSWORD_DEFAULT)));

 				if($run){

					$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your Password has been Updated successfully .</div>');
					redirect('Admin/profile');

				}else {
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Error! Something went wrong.</div>');
					redirect('Admin/profile');
				}
 			}
 			else{

 				$this->session->set_flashdata('msg','<div class="alert alert-danger">Error! Current Password is not matched.</div>');
				redirect('Admin/profile');
 			}
 		}
 		else{
 			$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/profile');
 		}
 	}
 	public function index(){
		$this->load->view('admin/profile');
	} 


}


 ?>
