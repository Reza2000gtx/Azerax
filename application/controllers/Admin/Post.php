<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Post extends CI_Controller
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
	public function update_post_package(){
		
	 $id = $this->input->post('post_id');
	$pkg_id=$this->input->post('package_id');
	$packgedata=$this->common_model->GetSingleData('membership',array('membership_id' =>$pkg_id ));
	$insert['post_status']=0;
	$insert['package_id']= $this->input->post('package_id');
	$insert['post_active_days']= $packgedata['post_active_days'];
	$insert['post_expired_on']=date('Y-m-d H:i:s', strtotime('+'.$packgedata['post_active_days'].' days'));
	$insert['post_featured']=$packgedata['post_featured'];
	$insert['post_expired_sent_mail']=0;
	$insert['ad_free_sent_mail']=0;
	
	
	
	$run = $this->common_model->UpdateData('post',array('id' =>$id),$insert);
	 $this->db->last_query();
	
	
	if($run){
	   $this->session->set_flashdata('msgs','<div class="alert alert-success">Post has been renewed successfully</div>');
		//echo $this->session->userdata('admin_id');
	   redirect('Admin/posts');
	   
	} 
	}
	public function index(){

			if($this->uri->segment(4)){

				$where=" user_id=".$this->uri->segment(4);
						$data['posts'] = $this->common_model->GetAllData('post',$where,'id','desc');

}else{

			$data['posts'] = $this->common_model->GetAllData('post','','id','desc');

}
		$this->load->view('admin/post_list',$data);
	} 
 	
 	public function changestatus(){

			$update['status']=$this->uri->segment(5);
			$id = $this->uri->segment(4);
		    if($this->uri->segment(5)==1){
		    	$status = 'deactivated';
		    }else{
		    	$status = 'activated';
		    }
			$run = $this->common_model->UpdateData('users',array('user_id'=>$id),$update);

			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! The User '.$status.' successfully .</div>');

				redirect('Admin/userlist');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/userlist');
			}

			

 	}
public function de_activate(){

			$id = $this->uri->segment(4);
		   	$update['post_status']=1;

			$run = $this->common_model->UpdateData('post',array('id'=>$id),$update);

			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! The Post Deactivated successfully .</div>');

				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			}
			if($this->uri->segment(5)){
				redirect('Admin/user/listing/'.$this->uri->segment(5));
			}else{
								redirect('Admin/posts');

			}

			

 	}
 	public function activate(){

			$id = $this->uri->segment(4);
		   	$update['post_status']=0;

			$run = $this->common_model->UpdateData('post',array('id'=>$id),$update);

			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! The Post Activated successfully .</div>');

				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			}
if($this->uri->segment(5)){
				redirect('Admin/user/listing/'.$this->uri->segment(5));
			}else{
								redirect('Admin/posts');

			}

			

 	}
 	public function delete(){

			$id = $this->uri->segment(4);
		   	$update['post_status']=0;

			$run = $this->common_model->DeleteData('post',array('id'=>$id));

			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! The Post Deleted successfully .</div>');

				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			}
if($this->uri->segment(5)){
				redirect('Admin/user/listing/'.$this->uri->segment(5));
			}else{
								redirect('Admin/posts');

			}
			

 	}
}


 ?>