<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Admin extends CI_Controller
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
		$data['adminlist'] = $this->common_model->GetAllData('admin',array('admin_type'=>2),'id', 'DESC');
		$this->load->view('admin/admin_list',$data);
	} 
	
	
		public function add(){

		$this->form_validation->set_rules('admin_name','Admin Name','required');
		$this->form_validation->set_rules('admin_email','Admin Email','required');
		$this->form_validation->set_rules('admin_passwprd','Admin Password','required');
		
			$insert['admin_name'] = $this->input->post('admin_name');
			$insert['admin_email'] = $this->input->post('admin_email');
			$insert['admin_passwprd'] = $this->input->post('admin_passwprd');

			$run = $this->common_model->InsertData('admin',$insert);

			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Admin has been added successfully .</div>');

			    redirect('Admin/adminlist');
				echo "1";
			} else {
			$this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
			redirect('Admin/adminlist');
		}

			
		

 	}
}
?>