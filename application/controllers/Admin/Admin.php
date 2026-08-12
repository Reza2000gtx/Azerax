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

		// Only a super-admin (admin_type = 1) can create new admin accounts.
		// NOTE: this assumes admin_type 1 is the super-admin role based on
		// index() filtering type=2 for the managed list - please confirm
		// this matches your actual permission model.
		$current_admin = $this->common_model->GetSingleData('admin',array('id'=>$this->session->userdata('admin_id')));
		if(!$current_admin || $current_admin['admin_type'] != 1){
			$this->session->set_flashdata('msgf','<div class="alert alert-danger">You do not have permission to add new admins.</div>');
			redirect('Admin/adminlist');
			return;
		}

		$this->form_validation->set_rules('admin_name','Admin Name','required');
		$this->form_validation->set_rules('admin_email','Admin Email','required|valid_email|is_unique[admin.admin_email]');
		$this->form_validation->set_rules('admin_passwprd','Admin Password','required|min_length[8]');

		if($this->form_validation->run()==true){

			$insert['admin_name'] = $this->input->post('admin_name');
			$insert['admin_email'] = $this->input->post('admin_email');
			// Hashed with bcrypt, matching Login.php's password_verify() check.
			// Column name kept as admin_password (not the old "admin_passwprd"
			// typo) so this actually matches what Login.php reads.
			$insert['admin_password'] = password_hash($this->input->post('admin_passwprd'), PASSWORD_DEFAULT);
			$insert['admin_type'] = 2;

			$run = $this->common_model->InsertData('admin',$insert);

			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Admin has been added successfully .</div>');

			    redirect('Admin/adminlist');
			} else {
				$this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/adminlist');
			}

		} else {
			$this->session->set_flashdata('msgf','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/adminlist');
		}

 	}
}
?>
