<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class ContentManagement extends CI_Controller
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

	public function aboutUs(){
		$data['about'] = $this->common_model->GetAllData('ContentManagement');
		$this->load->view('admin/about', $data);
	} 
 	
 	public function UpdateAbout(){

	$update['about'] = $this->input->post('about');
	$ID = $this->input->post('Id');

	$run=$this->common_model->UpdateData('ContentManagement', array('id'=>$ID), $update);

			if ($run) {
				$output['status'] = 1;
				$output['message'] = '<div class="alert alert-success">About page content updated successfully.</div>';
				}
				else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
				}
				echo json_encode($output);

 	}

 	public function UpdateAboutFooter(){

	$update['aboutFooter'] = $this->input->post('aboutFooter');
	$ID = $this->input->post('Id');

	$run=$this->common_model->UpdateData('ContentManagement', array('id'=>$ID), $update);

			if ($run) {
				$output['status'] = 1;
				$output['message'] = '<div class="alert alert-success">About footer content updated successfully.</div>';
				}
				else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
				}
				echo json_encode($output);

 	}

 	public function UpdateNewsletter(){

	$update['newLetter'] = $this->input->post('newLetter');
	$ID = $this->input->post('Id');

	$run=$this->common_model->UpdateData('ContentManagement', array('id'=>$ID), $update);

			if ($run) {
				$output['status'] = 1;
				$output['message'] = '<div class="alert alert-success">News Letter content updated successfully.</div>';
				}
				else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
				}
				echo json_encode($output);

 	}

 	 	public function UpdateHelp(){

		$update['helpAndSupport'] = $this->input->post('helpAndSupport');
		$ID = $this->input->post('Id');

		$run=$this->common_model->UpdateData('ContentManagement', array('id'=>$ID), $update);

				if ($run) {
					$output['status'] = 1;
					$output['message'] = '<div class="alert alert-success">Help & support updated successfully.</div>';
					}
					else {
					$output['status'] = 0;
					$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
					}
					echo json_encode($output);

 	}

 	 public function UpdateWhoWeAre(){

	$update['who_we_are'] = $this->input->post('who_we_are');
	$ID = $this->input->post('Id');

	$run=$this->common_model->UpdateData('ContentManagement', array('id'=>$ID), $update);

			if ($run) {
				$output['status'] = 1;
				$output['message'] = '<div class="alert alert-success">Who we are updated successfully.</div>';
				}
				else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
				}
				echo json_encode($output);

 	}

 	public function GetAbout(){
 		$data= $this->common_model->GetAllData('ContentManagement');
 		$output= "";
 foreach ($data as $value) {
    	$output .="
    	<form method='post' id='AboutAdd'>
      		<div class='form-group'>
            <textarea id='aboutContent' class='form-control ckeditor' required placeholder='About content' >".$value["about"]."</textarea>
            </div>
            <button type='button' class='btn btn-success' id='addAbout'>Update</button>
      	";
	}
		$output.="
		 </form>
	";
	echo $output;
 	}
}


 ?>