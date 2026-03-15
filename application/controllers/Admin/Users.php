<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Users extends CI_Controller
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
		$data['userlist'] = $this->common_model->GetAllData('users', '','user_id', 'DESC');
		$this->load->view('admin/user_list',$data);
	} 

	public function ipolist(){ 
		$data['ipolist'] = $this->common_model->GetAllData('input_output', '','product_id', 'DESC');
		$this->load->view('admin/ipo_listing',$data);
	} 
	
	public function addinput(){ 

    	 $this->form_validation->set_rules('input_conn','input_conn','required');
	     $this->form_validation->set_rules('input_process_stand','input_process_stand','required');
		 $this->form_validation->set_rules('process_connection','process_connection','required');
	     
		if($this->form_validation->run()){ 
     
			$insert['input_conn'] = $this->input->post('input_conn');
 	     	$insert['input_process_stand'] =  $this->input->post('input_process_stand');
			$insert['process_connection'] = $this->input->post('process_connection');
			
			$run=$this->common_model->InsertData('input_output', $insert); 
			//echo $this->db->last_query(); die();
		                 	
             	if($run){
				$output['status'] = 1;
				$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">Input has been added successfully.</div>');
				}
				else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
				}
			}
			else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}

			redirect('Admin/ipolist');
	}
	
	public function addoutput(){ 

    	 $this->form_validation->set_rules('out_conn','out_conn','required');
	     $this->form_validation->set_rules('out_process_stand','out_process_stand','required');
		 $this->form_validation->set_rules('out_process_connection','out_process_connection','required');
	     
		if($this->form_validation->run()){ 
     
			$insert['out_conn'] = $this->input->post('out_conn');
 	     	$insert['out_process_stand'] =  $this->input->post('out_process_stand');
			$insert['out_process_connection'] = $this->input->post('out_process_connection');
			
			$run=$this->common_model->InsertData('input_output', $insert); 
			//echo $this->db->last_query(); die();
		                 	
             	if($run){
				$output['status'] = 1;
				$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">Input has been added successfully.</div>');
				}
				else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
				}
			}
			else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}

			redirect('Admin/ipolist');
	}
	
	
	public function addprocess(){ 

    	 $this->form_validation->set_rules('process','process','required');
	     $this->form_validation->set_rules('process_stand','process_stand','required');
		
	     if($this->form_validation->run()){ 
     
			$insert['process'] = $this->input->post('process');
 	     	$insert['process_stand'] =  $this->input->post('process_stand');
			
			$run=$this->common_model->InsertData('input_output', $insert); 
			//echo $this->db->last_query(); die();
		                 	
             	if($run){
				$output['status'] = 1;
				$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">Input has been added successfully.</div>');
				}
				else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
				}
			}
			else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}

			redirect('Admin/ipolist');
	}
	
	public function deleteinput(){

			$id=$_REQUEST['id'];
			$run = $this->common_model->DeleteData('input_output',array('id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! Input has been deleted successfully.</div>');

				redirect('Admin/ipolist');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/ipolist');
			}

			

 	}
	
	public function deleteoutput(){

			$id=$_REQUEST['id'];
			$run = $this->common_model->DeleteData('input_output',array('id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! Output has been deleted successfully.</div>');

				redirect('Admin/ipolist');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/ipolist');
			}

	}

		public function deleteprocess(){

			$id=$_REQUEST['id'];
			$run = $this->common_model->DeleteData('input_output',array('id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! Process has been deleted successfully.</div>');

				redirect('Admin/ipolist');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/ipolist');
			}

		}	

public function editinput(){ 

    	 $this->form_validation->set_rules('input_conn','input_conn','required');
	     $this->form_validation->set_rules('input_process_stand','input_process_stand','required');
	     $this->form_validation->set_rules('process_connection','process_connection','required');

	     if($this->form_validation->run()){ 
      
            $id = $this->input->post('user_id');
			$update['input_conn'] = $this->input->post('input_conn');
 	     	$update['input_process_stand'] =  $this->input->post('input_process_stand');
			$update['process_connection'] =  $this->input->post('process_connection');

			$run=$this->common_model->UpdateData('input_output',array('id'=>$id),$update); 
		                 	
            if($run){

             $output['status'] = 1;
			$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">Input has been updated successfully.</div>');

			}
			else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
			}
		}
		else {
			$output['status'] = 0;
			$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
		}

	    redirect('Admin/ipolist');

    }
	
	
	public function editoutput(){ 

    	 $this->form_validation->set_rules('out_conn','out_conn','required');
	     $this->form_validation->set_rules('out_process_stand','out_process_stand','required');
	     $this->form_validation->set_rules('out_process_connection','out_process_connection','required');

	     if($this->form_validation->run()){ 
      
            $id = $this->input->post('user_id');
			$update['out_conn'] = $this->input->post('out_conn');
 	     	$update['out_process_stand'] =  $this->input->post('out_process_stand');
			$update['out_process_connection'] =  $this->input->post('out_process_connection');

			$run=$this->common_model->UpdateData('input_output',array('id'=>$id),$update); 
		                 	
            if($run){

             $output['status'] = 1;
			$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">Output has been updated successfully.</div>');

			}
			else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
			}
		}
		else {
			$output['status'] = 0;
			$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
		}

	    redirect('Admin/ipolist');

    }
	
	public function editprocess(){ 

    	 $this->form_validation->set_rules('process','process','required');
	     $this->form_validation->set_rules('process_stand','process_stand','required');
	     
	     if($this->form_validation->run()){ 
      
            $id = $this->input->post('user_id');
			$update['process'] = $this->input->post('process');
 	     	$update['process_stand'] =  $this->input->post('process_stand');
			

			$run=$this->common_model->UpdateData('input_output',array('id'=>$id),$update); 
		                 	
            if($run){

             $output['status'] = 1;
			$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">Process has been updated successfully.</div>');

			}
			else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
			}
		}
		else {
			$output['status'] = 0;
			$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
		}

	    redirect('Admin/ipolist');

    }
	
	

	public function studentlist()
	{
		$type=2;
		$data['studentlist'] = $this->common_model->GetAllData('users',array('user_type'=>$type),'user_id','desc');
		$this->load->view('admin/student_list',$data);
	} 

	public function sessionlist()
	{
		$data['session_list'] = $this->common_model->GetAllData('session','','session_id','desc');
	   $this->load->view('admin/session_list', $data);
	}

	public function single_live_session_details()
	{
		//echo 'yes'; die;
		 $id = $this->uri->segment(3);
		//die;
		$data['live_session'] = $this->common_model->GetSingleData('session',array('session_id'=>$id));
    	$this->load->view('admin/live_seesion_details', $data);
    }
	

	public function recorded_session_list()
	{
		// $data['session_list'] = $this->common_model->GetAllData('session','','session_id','desc');

		$data['session_list'] = $this->common_model->GetAllData('recorded_session','','id','desc');

	   $this->load->view('admin/recorded_session', $data);
	}

	public function single_recorded_session_details()
	{
		//echo 'yes'; die;
		 $id = $this->uri->segment(3);
		//die;
		$data['recorded_session'] = $this->common_model->GetSingleData('recorded_session',array('id'=>$id));
    	$this->load->view('admin/recorded_session_details', $data);
    }
	


 	
 	public function changestatus(){

			$update['status']=$this->uri->segment(5);
			$id = $this->uri->segment(4);
		    if($this->uri->segment(5)==1){
		    	$status = 'activated';
			
		    }else{
		 
		    	$status = 'deactivated';
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

 	public function changetype(){

			$update['user_type']=$this->uri->segment(5);
			$id = $this->uri->segment(4);
		    if($this->uri->segment(5)==1){
		    	$status = 'deligate';
			
		    }else{
		 
		    	$status = 'free';
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
 	
 	
 	
 	public function delete_users(){

			$id=$_REQUEST['id'];
			$run = $this->common_model->DeleteData('users',array('user_id'=>$id));
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! User has been deleted successfully.</div>');

				//redirect('Admin/userlist');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    //redirect('Admin/userlist');
			}

			

 	}


 	public function studentchangestatus(){

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

				redirect('Admin/studentlist');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/studentlist');
			}


 	}
 	
 	
 		public function WithdrawalRequest(){
		$data['rows'] = $this->common_model->GetAllData('withdrawal_request');
		$this->load->view('admin/WithdrawalRequest',$data);
	} 
 	
 		public function requestchangestatus(){

			$update['status']=$this->uri->segment(4);
			$id = $this->uri->segment(3);
		    if($this->uri->segment(4)==1){
		    	$status = 'Approved';
			$update1['status']=1;

		    $run = $this->common_model->UpdateData('withdrawal_request',array('request_id'=>$id),$update1);
	
		    }else{
		    	$update1['status']=0;
		    	 $run = $this->common_model->UpdateData('withdrawal_request',array('request_id'=>$id),$update1);


		    	$status = 'Reject';
		    }

			if($run){

				$this->session->set_flashdata('msgs','<div class="alert alert-success">Success! The Request has been '.$status.' successfully .</div>');

				redirect('Admin/WithdrawalRequest');
				
			} else {
			    $this->session->set_flashdata('msgs','<div class="alert alert-danger">Something is Worng.</div>');
			    redirect('Admin/WithdrawalRequest');
			}

			

 	}



 		public function singleview(){
 	   $id = $this->uri->segment(3);
 	   
 	   $data['singlelist'] = $this->common_model->GetSingleData('users',array('user_id'=>$id));
 	   $data['categorys'] = $this->common_model->GetAllData('category','','cat_id','asc');
		$data['subcategory'] = $this->common_model->GetAllData('subcategory');
		$data['subsubcategory'] = $this->common_model->GetAllData('subsubcategory');

 	   $this->load->view('admin/singleview',$data);
 	}

 	public function send_sms(){


 	$this->load->library('sendsms');

		//update user login status


		$phoneCode=$_POST['phonecode'];
		$phoneNumber=$_POST['phone'];
		$msg=$_POST['msg'];
		$send= $this->sendsms->send($phoneCode,$phoneNumber,$msg);
		//$send=1;
		if($send){

$array=array('status'=>1,'msg'=>'<span style="color:green;font-size: 15px;
    font-weight: bold;">Success! SMS sent.</span>');
		}else{
$array=array('status'=>1,'msg'=>'Sent');

		}
		echo json_encode($array);

 	}

 	public function send_sms_all(){


 	$this->load->library('sendsms');

	$binding=array();

 $users=$this->common_model->GetAllData('users',array('user_type'=>$_POST['type'],'phone_verified'=>1));
foreach ($users as $key => $user) {

	$phone_array[]='+'.$user['phonecode'].$user['phone'];
    $binding[] = '{"binding_type":"sms", "address":"+'.$user['phonecode'].$user['phone'].'"}'; // +1 is used for US country code. You should use your own country code.
		$send= $this->sendsms->send($user['phonecode'],$user['phone'],$_POST['msg']);
}
	//$send= $this->sendsms->bulk_send($binding,$msg);
			if($send)
			{

			$array=array('status'=>1,'msg'=>'<span style="color:green;font-size: 15px;
			    font-weight: bold;">Success! SMS sent.</span>');

			}else{

			$array=array('status'=>1,'msg'=>'Sent');

			}
		echo json_encode($array);

}

    
    public function adduser(){ 

    	 $this->form_validation->set_rules('name','Name','trim|required');
	     $this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]');
		 $this->form_validation->set_rules('password','Password','required|min_length[6]');
	     $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
	    // $this->form_validation->set_rules('address','Address','required');

	     if($this->form_validation->run()){

			$insert['fname'] = $this->input->post('name');
 	     	$insert['email'] =  $this->input->post('email');
			$insert['password'] = md5($this->input->post('password'));
			$insert['view_password'] =  $this->input->post('password');
			$insert['address'] =  $this->input->post('address');
			$insert['status'] = 1;
			$insert['email_verified'] = 0;
			$insert['created_at'] = date('Y-m-d H:i:s');

			if($_FILES['image']['name']){

                $config['upload_path']="assets/admin/user/";
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['encrypt_name']=true;
                $this->load->library("upload",$config);
                if ($this->upload->do_upload('image')) {
                $u_profile=$this->upload->data("file_name");
                $insert['profile'] = $u_profile;


                } else {
                $check = false;
            $output['status'] = 0;
            $output['message'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';   
                }
                }


			
            $run=$this->common_model->InsertData('users', $insert); 
			
             	if($run){

             	$email = $this->input->post('email');


				$subject="Account created !";

					

				$body = '<p>Hello '. $insert['fname'].'</p><p> Congratulation! This is an email to inform you that your account has been created successfully.</p>';

			   $body .= '<p>Please <a href="'.base_url().'verify-email/'.$run.'">click here </a> to verify your account</p>';

					 

					$send = $this->common_model->SendMail($email,$subject,$body);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Congratulations! Your account has been successfully created. We have sent you a verification link to '.$email.', please check it and verify your account.It may be in your Spam/Bulk/Junk folder.</div>');
				
				$output['status'] = 1;
				$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">User has been added successfully.</div>');

				}
				else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
				}

			}
			else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
				
				$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$output['message'].'</div>');

			}

			redirect('Admin/userlist');

    }


	public function edituser(){ 

    	 $this->form_validation->set_rules('name','Name','required');
	     $this->form_validation->set_rules('email','Email','required');
	     $this->form_validation->set_rules('address','Address','required');

	     if($this->form_validation->run()){ 
      
            $id = $this->input->post('user_id');
			$update['fname'] = $this->input->post('name');
 	     	$update['email'] =  $this->input->post('email');
			$update['address'] =  $this->input->post('address');

			if($_FILES['image']['name']){

                $config['upload_path']="assets/admin/user/";
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['encrypt_name']=true;
                $this->load->library("upload",$config);
                if ($this->upload->do_upload('image')) {
                $u_profile=$this->upload->data("file_name");
                $update['profile'] = $u_profile;


                } else {
                $check = false;
            $output['status'] = 0;
            $output['message'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';   
                }
                }


			
            $run=$this->common_model->UpdateData('users',array('user_id'=>$id),$update); 
		                 	
             	if($run){

             	$email = $this->input->post('email');


				$subject="Account updated !";

					

				$body = '<p>Hello '. $update['fname'].'</p><p> Congratulation! This is an email to inform you that your account has been updated successfully.</p>';

					 

					$send = $this->common_model->SendMail($email,$subject,$body);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Congratulations! Your account has been updated successfully. We have sent you a verification link to '.$email.', please check it and verify your account.It may be in your Spam/Bulk/Junk folder.</div>');
				
				$output['status'] = 1;
				$this->session->set_flashdata('msgsSuccess','<div class="alert alert-success">User has been added successfully.</div>');

				}
				else {
			$output['status'] = 0;
			$output['message'] ='<div class="alert alert-danger">Something went Wrong!</div>';	
				}

			}
			else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}

	     
			redirect('Admin/userlist');

    }

    public function viewuser(){

    $user_id = $this->uri->segment(3);
    $data['user_detail'] = $this->common_model->GetSingleData('users',array('user_id'=>$user_id));
    
    $data['transaction_detail'] = $this->db->query("SELECT * from transactions where tr_userid = '".$user_id."'")->result();

    $this->load->view('admin/user_profile',$data);
  }


}
 ?>