<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Plans extends CI_Controller
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
		$data['planlist'] = $this->common_model->GetAllData('plans');
		$this->load->view('admin/plan_list',$data);
	} 



 		public function edit_plan(){
 	    $id = $this->uri->segment(3);
 	   
 	   $data['planview'] = $this->common_model->GetSingleData('plans',array('plan_id'=>$id));
 	   
 	   $this->load->view('admin/edit_plan',$data);
 	}
 	


 	public function edit_plan_action(){

		$user_id = $this->session->userdata('user_id');
			$id = $this->input->post('plan_id');
		

// 				$this->form_validation->set_rules('title','','required');
// 				$this->form_validation->set_rules('description','','required');
// 				$this->form_validation->set_rules('price','','required');
                


// 		if($this->form_validation->run()==false){
			
// redirect('Admin/edit-plan/'.$id);
// 	}else{
	    
	  
			$update['title'] = $this->input->post('title');
			$update['description'] = $this->input->post('description');
			$update['price'] = $this->input->post('price');

			
			if(isset($_POST['responsive_display'])){
				$update['responsive_display'] = 1;
			}
			else{
				$update['responsive_display'] = 0;
			}


			if(isset($_POST['user_friendly'])){
				$update['user_friendly'] = 1;
			}
			else{
				$update['user_friendly'] = 0;
			}


			if(isset($_POST['fully_customizable'])){
				$update['fully_customizable'] = 1;
			}
			else{
				$update['fully_customizable'] = 0;
			}

			if(isset($_POST['deeply_customizable'])){
				$update['deeply_customizable'] = 1;
			}
			else{
				$update['deeply_customizable'] = 0;
			}

			if(isset($_POST['smooth'])){
				$update['smooth'] = 1;
			}
			else{
				$update['smooth'] = 0;
			}

			if(isset($_POST['support'])){
				$update['support'] = 1;
			}
			else{
				$update['support'] = 0;
			}


			
            			
			$run = $this->common_model->UpdateData('plans',array('plan_id'=>$id),$update);
			
			if($run){

             
				$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Plan updated successfully!</p></div>');



			} else {

				 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
             
	// }
	//      

		
	// }

	 }
  
 /*redirect('Admin/edit-plan/'.$id);*/
 redirect('Admin/planlist');

 	
}

}


 ?>