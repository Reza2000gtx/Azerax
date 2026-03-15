<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Session extends CI_Controller
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
		echo 'yes';
		die;
		$type=1;
		$data['userlist'] = $this->common_model->GetAllData('users',array('user_type'=>$type),'user_id','desc');
		$this->load->view('admin/user_list',$data);
	} 


	public function studentlist()
	{
		$type=2;
		$data['studentlist'] = $this->common_model->GetAllData('users',array('user_type'=>$type),'user_id','desc');
		$this->load->view('admin/student_list',$data);
	} 
 	
 	public function singleview()
 	{
 	   $id = $this->uri->segment(3); 	   
 	   $data['singlelist'] = $this->common_model->GetSingleData('users',array('user_id'=>$id));
 	   $data['categorys'] = $this->common_model->GetAllData('category','','cat_id','asc');
	   $data['subcategory'] = $this->common_model->GetAllData('subcategory');
	   $data['subsubcategory'] = $this->common_model->GetAllData('subsubcategory');
 	   $this->load->view('admin/singleview',$data);
 	}

 	
}
 ?>