<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Brand extends CI_Controller
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
		$data['brandlist'] = $this->common_model->GetAllData('brand');
		$data['catlist'] = $this->common_model->GetAllData('category');
		$this->load->view('admin/listbrand',$data);
	} 
 	
 	public function add_brand(){

		$this->form_validation->set_rules('brand_name','Brand name','required');
		if($_FILES['brand_image']['name']){

			$config['upload_path']="assets/admin/brand_img";
			$config['allowed_types'] = 'jpeg|gif|jpg|png';
			$config['encrypt_name']=true;
			$this->load->library("upload",$config);
			if ($this->upload->do_upload('brand_image')) {
			$u_profile=$this->upload->data("file_name");
			$insert['brand_image'] = $u_profile;


			} else {
			echo '<div class="alert alert-danger">'. $this->upload->display_errors() .'</div>';
			}
			}
			$insert['brand_name'] = $this->input->post('brand_name');

			$run = $this->common_model->InsertData('brand',$insert);

			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Brand has been added successfully .</div>');

			    redirect('Admin/listbrand');
				echo "1";
			} else {
			$this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
			redirect('Admin/listbrand');
		}

			
		

 	}


 	public function edit_brand(){

		$this->form_validation->set_rules('brand_name','Brand name','required');
        $this->form_validation->set_rules('cat_id','category name','required');

			$update['brand_name'] = $this->input->post('brand_name');
			$brand_id = $this->input->post('brand_id');

			if($_FILES['brand_image']['name']){

				$config['upload_path']="assets/admin/brand_img";
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['encrypt_name']=true;
				$this->load->library("upload",$config);
				if ($this->upload->do_upload('brand_image')) {
				$u_profile=$this->upload->data("file_name");
				$update['brand_image'] = $u_profile;
	
	
				} else {
				echo '<div class="alert alert-danger">'. $this->upload->display_errors() .'</div>';
				}
				}
		
			$run = $this->common_model->UpdateData('brand',array('brand_id'=>$brand_id),$update);
           // echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Brand has been updated successfully .</div>');

				redirect('Admin/listbrand');

			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
				redirect('Admin/listbrand');

			}

	

 	}

 	 /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/jpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['cat_image']['name']);
        if(isset($_FILES['cat_image']['name']) && $_FILES['cat_image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function deletebrand(){

			$id = $this->uri->segment(4);
			$run = $this->common_model->DeleteData('brand',array('brand_id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Brand has been deleted successfully .</div>');

				redirect('Admin/listbrand');
				
			} else {
			    $this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/listbrand');
			}

			

 	}
 	
}


 ?>