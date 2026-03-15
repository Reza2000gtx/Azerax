<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		

	}

	public function check_login(){
		if($this->session->userdata('user_id')){
			redirect('home');
		}
	}
	
	public function index(){
		 $this->check_login();
		$this->load->view('site/login');
	}
	public function do_login(){

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==true){

			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$run = $this->common_model->GetSingleData('users',array('email' =>$email ,'password'=>$password));
            // echo $this->db->last_query();
			if($run){

				if($run['email_verified']==0) {
					
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Email verification is pending.</div>');
					redirect('login');
				
				} else if($run['status']==0){

					$this->session->set_flashdata('msg','<div class="alert alert-danger">Administrator has been blocked your account.For more info please contact to admin.</div>');
					
					redirect('login');
				
				} else {
					$this->session->set_userdata('user_id',$run['user_id']);
					$this->session->set_userdata('email',$run['email']);
					$this->session->set_userdata('username',$run['fname']);   
					$this->session->set_flashdata('msg','<div class="alert alert-success">Welcome back <br>'.$run['fname'].'</div>');

					// $update['last_logged_in_time']=date('Y-m-d H:i:s');
					// $update['logged_in_status']='1';

					// $update = $this->common_model->UpdateData('users',array('user_id'=>$run['user_id']),$update);


                    	//redirect('success');
                    	redirect('home');
                    
					
				}
			

			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Incorrect email or password.</div>');
				
				redirect('login');	
			}
		} else {
			//$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
			
		$this->load->view('site/login');
		}
	}

    public function forgot_password(){
		$this->load->view('site/forgot');
	}

	public function send_password_on_mail(){

		$this->form_validation->set_rules('email','Email','required|valid_email');
		
		if($this->form_validation->run()==true){

			$email = $this->input->post('email');
			
			$run = $this->common_model->GetSingleData('users',array('email' =>$email));
            // echo $this->db->last_query();
			if($run){
			
				$subject="Forgotten password";
				$body = '<p style="text-align: left;color: black">Hello! '.$run['fname'].' '.$run['lname'].',</p>';
				
				$body .= '<p style="text-align: left;color: black">This is an automatic message . If you did not start the Forgot Password process recently, please ignore this email.</p>';
				
				$body .= '<p style="text-align: left;color: black">
You indicated that you forgot your login password. We can generate a temporary password for you to log in, then once you are logged in, you can change your password to whatever you want.</p>';
				
				$body .= '<p style="text-align: left;color: black">
Your password is '.$run['view_password'].'</p><br><br>';
					
					$this->common_model->SendMail($email,$subject,$body);
					$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your password has been sent to your email address.</div>');
					redirect('forgot-password');
				
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Error! This email id does not exists in this system.</div>');
				
				redirect('forgot-password');	
			}
		} else {
					$this->load->view('site/forgot');

			
			//redirect('forgot-password');
		}
	}
public function logout()
	{
		
		/*$this->session->unset_userdata('user_id');
		
		session_destroy();
		redirect();*/

		 $user_id = $this->session->userdata('user_id');
	 $logout_id = session_destroy();
		
     $update['logged_in_status']='0';

    //  $user = $this->common_model->GetSingleData('users',array('user_id'=>$user_id ,'logged_in_status'=>'1'));
    
    // if($user){
    //         $run = $this->common_model->UpdateData('users',array('user_id'=>$user['user_id']),$update);
    //     }
        
		redirect('');
	


	}
	

	public function send_sms_for_verification()
	{
		$this->load->library('sendsms');

		//update user login status
		$user_id = $this->session->userdata('user_id');

		$user = $this->common_model->GetSingleData('users',array('user_id' =>$user_id));

		 $phoneCode=$user['phonecode'];
		 $phoneNumber=$user['phone'];
		$otp=$this->generatePIN();
		$msg=$otp.' is your Edudiem code. Do not share the otp with anyone.https://www.webwiders.com/WEB01/Edudiem/';
		$send= $this->sendsms->send($phoneCode,$phoneNumber,$msg);
		//$send=1;
		if($send){
		$update['phone_verified']='0';

		$update['otp']=$otp;

		$run = $this->common_model->UpdateData('users',array('user_id'=>$user_id),$update);

		$array=array('status'=>1,'msg'=>'Sent');
		}else{
		$array=array('status'=>1,'msg'=>'Sent');

		}
		echo json_encode($array);

	}

	public function verify_phone_number()
	{
		
		$user_id = $this->session->userdata('user_id');

		$otp = $this->input->post('otp');

		$user = $this->common_model->GetSingleData('users',array('user_id' =>$user_id,'otp'=>$otp));
if($user){
		$update['phone_verified']='1';

		$run = $this->common_model->UpdateData('users',array('user_id'=>$user_id),$update);

$array=array('status'=>1,'msg'=>'<span style="color:green">Success! Your Phone number has been verified.</span>');
		}else{
$array=array('status'=>0,'msg'=>'<span style="color:red">Error! Invalid Otp</span>');

		}
		echo json_encode($array);

	}

//Our custom function.
public function generatePIN($digits = 4){
$pin =random_string('numeric', $digits);


    return $pin;
}

}


?>