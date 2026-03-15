<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		 $this->check_login();
	}

	public function check_login(){
		if($this->session->userdata('admin_id')){
			redirect('Admin/home');
		}
	}

	public function index(){
		$this->load->view('admin/login');
	}

	public function do_login(){
		$this->form_validation->set_rules('admin_email','Email','required|valid_email');
		$this->form_validation->set_rules('admin_password','Password','required');

		if($this->form_validation->run()==true){

			$admin_email = $this->input->post('admin_email');
			$admin_pass = $this->input->post('admin_password');

			$run = $this->common_model->GetSingleData('admin',array('admin_email' =>$admin_email ,'admin_password'=>$admin_pass));

			if($run){

				$this->session->set_userdata('admin_id',$run['id']);

				$this->session->set_flashdata('msg','<div class="alert alert-success">Welcome '.$run['admin_name'].'</div>');
                 //echo $this->session->userdata('admin_id');
				redirect('Admin/home');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Email or Password is incorrect.</div>');
				redirect('Admin/login');
			}

			
		} else {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/login');
		}


	}
	
}

?>