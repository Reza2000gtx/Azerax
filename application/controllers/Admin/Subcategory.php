<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Subcategory extends CI_Controller
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
		$data['subcatlist'] = $this->common_model->GetAllData('subcategory');
		$data['catlist'] = $this->common_model->GetAllData('category');
		$this->load->view('admin/listsubcat',$data);
	} 
 	
 	public function add_subcategory(){

		$this->form_validation->set_rules('cat_id','Category name','required');
 		$this->form_validation->set_rules('sub_name','Subcategory name','required');
 		$this->form_validation->set_rules('sub_desc','Subcategory description','required');

 		if($this->form_validation->run()==true){

			$insert['cat_id'] = $this->input->post('cat_id');
			$insert['sub_name'] = $this->input->post('sub_name');
			$insert['sub_desc'] = $this->input->post('sub_desc');
			
		
			$run = $this->common_model->InsertData('subcategory',$insert);

			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! Subcategory has been added successfully .</div>');

				//redirect('Admin/listcat');
				echo "1";
			} else {
			//$this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
				echo "0";
			}

			
		} else {
			//$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
			echo '<div class="alert alert-danger">'.validation_errors().'</div>';
		}

 	}


 	public function edit_subcategory(){

		$this->form_validation->set_rules('cat_id','Category name','required');
 		$this->form_validation->set_rules('sub_name','Subcategory name','required');
 		$this->form_validation->set_rules('sub_desc','Subcategory description','required');

 		if($this->form_validation->run()==true){

			$update['cat_id'] = $this->input->post('cat_id');
			$update['sub_name'] = $this->input->post('sub_name');
			$update['sub_desc'] = $this->input->post('sub_desc');
			
			$id = $this->input->post('sub_cat_id');
		
			$run = $this->common_model->UpdateData('subcategory',array('sub_cat_id'=>$id),$update);
           // echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! Subcategory has been updated successfully .</div>');

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

 	

    public function deletesubcat(){

			$id = $this->uri->segment(4);
			$run = $this->common_model->DeleteData('subcategory',array('sub_cat_id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! Subcategory has been deleted successfully .</div>');

				redirect('Admin/listsubcat');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/listsubcat');
			}

			

 	}
 	
}


 ?>