<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Category extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->check_login();
	}

	public function check_login(){
		/*if(!$this->session->userdata('admin_id')){
			redirect('Admin/login');
		}*/
	}

	public function index(){
		$data['catlist'] = $this->common_model->GetAllData('category');
		$this->load->view('admin/listcat',$data);
	} 
 	
 	public function add_category(){

		$this->form_validation->set_rules('cat_title','Category name','required');
 		
 		if($this->form_validation->run()==true){

			$insert['name'] = $this->input->post('cat_title');
	
			$run = $this->common_model->InsertData('category',$insert);

			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Category has been added successfully .</div>');

				//redirect('Admin/listcat');
				echo "1";
			} else {
			//$this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
				echo "0";
			}

			
		} else {
			echo '<div class="alert alert-danger">'.validation_errors().'</div>';
		}

 	}


 	public function edit_category(){

		$this->form_validation->set_rules('cat_title','Category name','required');
 		
 		if($this->form_validation->run()==true){

			$update['name'] = $this->input->post('cat_title');
			
			$cat_id = $this->input->post('cat_id');

			$run = $this->common_model->UpdateData('category',array('id'=>$cat_id),$update);
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Category has been updated successfully .</div>');

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


    public function deletecat(){

			$id = $this->uri->segment(4);
			$run = $this->common_model->DeleteData('category',array('id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Category has been deleted successfully.</div>');

				redirect('Admin/categorylist');
				
			} else {
			    $this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/categorylist');
			}
	
 	}
 	
}


 ?>