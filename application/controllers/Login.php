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
			$password = $this->input->post('password');
			$run = $this->common_model->GetSingleData('users',array('email' =>$email));
		if($run){
    		$isMD5 = strlen($run['password']) === 32;
    	if($isMD5){
        if(md5($password) !== $run['password']){
            $run = false;
        } else {
            // upgrade to bcrypt automatically
            $newHash = password_hash($password, PASSWORD_BCRYPT);
            $this->common_model->UpdateData('users', array('user_id'=>$run['user_id']), array('password'=>$newHash,'view_password'=>''));
        }
    } else {
        if(!password_verify($password, $run['password'])){
            $run = false;
        }
    }
}
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

        if($run){
        
            // generate a secure random token
            $token = bin2hex(random_bytes(32));
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // save token and expiry to the user record
            $this->common_model->UpdateData('users', array('user_id'=>$run['user_id']), array(
                'reset_token' => $token,
                'reset_expiry' => $expiry
            ));

            $reset_link = base_url().'reset-password/'.$token;
            
            $subject = "Password Reset Request";
            $body = '<p>Hello '.$run['fname'].',</p>';
            $body .= '<p>We received a request to reset your password. Click the link below to reset it:</p>';
            $body .= '<p><a href="'.$reset_link.'">'.$reset_link.'</a></p>';
            $body .= '<p>This link will expire in 1 hour.</p>';
            $body .= '<p>If you did not request this, please ignore this email.</p>';
            
            $this->common_model->SendMail($email,$subject,$body);
            $this->session->set_flashdata('msg','<div class="alert alert-success">Success! A password reset link has been sent to your email address.</div>');
            redirect('forgot-password');
        
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger">Error! This email does not exist in our system.</div>');
            redirect('forgot-password');	
        }

    } else {
        $this->load->view('site/forgot');
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
public function reset_password(){

    $token = $this->uri->segment(2);

    if(empty($token)){
        redirect('forgot-password');
    }

    // check token exists and hasn't expired
    $run = $this->common_model->GetSingleData('users', array('reset_token'=>$token));

    if(!$run || strtotime($run['reset_expiry']) < time()){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">Error! This reset link is invalid or has expired. Please try again.</div>');
        redirect('forgot-password');
    }

    $data['token'] = $token;
    $this->load->view('site/reset-password', $data);
}

public function reset_password_action(){

    $token = $this->input->post('token');
    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');

    if($new_password !== $confirm_password){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">Error! Passwords do not match.</div>');
        redirect('reset-password/'.$token);
    }

    $run = $this->common_model->GetSingleData('users', array('reset_token'=>$token));

    if(!$run || strtotime($run['reset_expiry']) < time()){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">Error! This reset link is invalid or has expired.</div>');
        redirect('forgot-password');
    }

    // save new password and clear the token
    $this->common_model->UpdateData('users', array('user_id'=>$run['user_id']), array(
        'password'     => password_hash($new_password, PASSWORD_BCRYPT),
        'view_password'=> '',
        'reset_token'  => NULL,
        'reset_expiry' => NULL
    ));

    $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your password has been reset. Please login.</div>');
    redirect('login');
}
}


?>