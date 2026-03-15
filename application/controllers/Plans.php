<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Plans extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		// $this->check_login();

	}

	public function check_login(){
		if($this->session->userdata('user_id')){
			redirect('home');
		}
	}
	
	public function index(){
		$data['plans']=$this->common_model->GetAllData('plans');

		$this->load->view('site/plans-list',$data);
	}
	
}

?>