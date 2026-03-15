<?php  defined('BASEPATH') OR exit('No direct script access allowed');

  class Manufacturer extends CI_Controller
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
		$data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
		$this->load->view('admin/manufacturerlist',$data);
	} 
 	
 	public function add_manufacturer(){

		$this->form_validation->set_rules('name','Manufacturer name','required');
 		
 		if($this->form_validation->run()==true){

			$insert['name'] = $this->input->post('name');
	
			$run = $this->common_model->InsertData('manufacturer',$insert);

			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Manufacturer has been added successfully .</div>');

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


 	public function edit_manufacturer(){

		$this->form_validation->set_rules('name','Manufacturer name','required');
 		
 		if($this->form_validation->run()==true){

			$update['name'] = $this->input->post('name');
			
			$manufacturer_id = $this->input->post('manufacturer_id');

			$run = $this->common_model->UpdateData('manufacturer',array('id'=>$manufacturer_id),$update);
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Manufacturer has been updated successfully .</div>');

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


    public function deletemanufacturer(){

			$id = $_REQUEST['id']; 
			$run = $this->common_model->DeleteData('manufacturer',array('id'=>$id));
            //echo $this->db->last_query();
			if($run){
				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Category has been deleted successfully.</div>');
				//redirect('Admin/manufacturerlist');
			} else {
			    $this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
			   // redirect('Admin/manufacturerlist');
			}
 	}
 	
 	public function brandlist()
 	{
 	    $brand_id = $this->uri->segment(3);
 	    $brand_name = $this->common_model->GetSingleData('manufacturer',array('id'=>$brand_id));
 	    $data['brand_info'] = $this->common_model->GetAllData('product',array('device_brand'=>$brand_name['name']));
		$this->load->view('admin/brandlist',$data);
	}
 	
 	public function empList()
 	{
 	 $this->load->model('Tablemodel');
     // POST data
     $postData = $this->input->post();
     // Get data
     $data = $this->Tablemodel->getEmployees($postData);
     echo json_encode($data);
  }
}


 ?>