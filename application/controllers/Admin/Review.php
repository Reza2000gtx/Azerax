<?php  defined('BASEPATH') OR exit('No direct script access allowed');



  class Review extends CI_Controller

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

		$update['read_review']=1;
		$run = $this->common_model->UpdateData('review','',$update);
		$data['reviewlist'] = $this->common_model->GetAllData('review','','created_at','desc');

		$this->load->view('admin/reviewlist',$data);

	} 

 	







 	public function editstatus()

 	{

	

			$update['status'] = $this->input->post('status');

			$review_id = $this->input->post('review_id');

        	$run = $this->common_model->UpdateData('review',array('id'=>$review_id),$update);

          	if($run){

   		    $this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Review status updated .</div>');

			redirect('Admin/Review');

			} else {

				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');

				redirect('Admin/Review');

			}



		} 





    public function deletereview()

    {

  		$id = $this->input->post('deleteId');

			$run = $this->common_model->DeleteData('review',array('id'=>$id));

        	if($run)

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Review has been deleted successfully.</div>');

		    else

			    $this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');

			 echo 'true' ;

 	}



 

 

}





 ?>