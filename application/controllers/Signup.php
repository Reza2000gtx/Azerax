<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Signup extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	// public function check_login(){
	// 	if(!$this->session->userdata('admin_id')){
	// 		redirect('Admin/login');
	// 	}
	// }
	public function index(){

		$this->load->view('site/signup');
	}



public function signup_action(){

				 $this->form_validation->set_rules('username','Name','required');
		         $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
				 $this->form_validation->set_rules('password','Password','required|min_length[6]');
		         $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
		         $this->form_validation->set_message('is_unique', ' Already exist');
               $this->form_validation->set_rules('address','address','required');


 		if($this->form_validation->run()==false){




		$this->load->view('site/signup',$data);



	}else{

		
 	     	$insert['fname'] = $this->input->post('username');
 	     	$insert['email'] =  $this->input->post('email');
			$insert['password'] = md5($this->input->post('password'));
			$insert['view_password'] =  $this->input->post('password');
			$insert['status'] = 1;
			$insert['email_verified'] = 0;
			$insert['created_at'] = date('Y-m-d H:i:s');
			$insert['address'] = $this->input->post('address');
     	    $user = $this->common_model->InsertData('users',$insert);
			if($user)
					{
			 $email = $this->input->post('email');


			$subject="Account created !";

					

			  $body = '<p>Hello '. $insert['fname'].'</p><p> Congratulation! This is an email to inform you that your account has been created successfully.</p>';

			   $body .= '<p>Please <a href="'.base_url().'verify-email/'.$user.'">click here </a> to verify your account</p>';

					 

					$send = $this->common_model->SendMail($email,$subject,$body);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Congratulations! Your account has been successfully created. We have sent you a verification link to '.$email.', please check it and verify your account.It may be in your Spam/Bulk/Junk folder.</div>');
					redirect('login');
					//echo 1;
					}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something Went Wrong.</div>');
				redirect('signup');
					//	echo 0;
					}		
	
    	}

}

		public function signup(){

		 $this->custom->getCurrencyByIP();
		


		 $data['countries'] = $this->common_model->GetAllData('countries','','id','asc');
		 $data['nationality'] = $this->common_model->GetAllData('settingsNationalities','','NationalityID','asc');
		 $data['phonecodes'] = $this->common_model->GetAllData('countries','','phonecode','asc','','','','phonecode');
		$this->load->view('site/signup-student',$data);

    	}
    	
    	public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}

    	

public function signup_action_payment($userdata){
		 //print_r($userdata);

		 //$userdata=(array)(json_decode($_POST['userData']));
		  	$userdata=$userdata;
		 	$insert['user_type'] = 2;
 	     	$insert['fname'] = $userdata['fname'];
 	     	$insert['lname'] =  $userdata['lname'];
 	     	$insert['email'] =  $userdata['email'];
			$insert['password'] = md5($userdata['password']);
			$insert['view_password'] =  $userdata['password'];
			$insert['phonecode'] =  $userdata['phonecode'];

			$insert['phone'] =  $userdata['phone'];
			$insert['dob'] =  $userdata['dob'];
			$insert['lang'] = $userdata['language'];
			$insert['default_currency'] = $this->custom->getCurrencyByIP();

			
			// $insert['address'] = $userdata['address'];
			// $insert['address_1'] = $userdata['address1'];
			// $insert['country'] = $userdata['country'];
			// $insert['state'] = $userdata['state'];
			// $insert['city'] = $userdata['city'];
			// $insert['zipcode'] = $userdata['zipcode'];
			$insert['nationality'] =$userdata['nationality'];
			/*$insert['speciality'] = implode(',',$userdata['speciality']);*/
			//$insert['speciality'] =$userdata['speciality'];
			$insert['email_verified'] = 0;
			$insert['status'] = 1;
			$insert['created_at'] = date('Y-m-d H:i:s');
			$insert['plan_id'] = 0; // $this->input->post('planid');
			$insert['plan_purchase_date'] =date('Y-m-d');
			$insert['plan_expiry_date'] = date('Y-m-d', strtotime(" +1 months"));
			$insert['payment'] = 0; // $this->input->post('payment');
			$insert['payment_type'] = ''; //$this->input->post('paymentType');
			$insert['profile'] = $userdata['profile'];
			$insert['gender'] = $userdata['gender'];
			$insert['email_verified'] = 1;

              

		     $user = $this->common_model->InsertData('users',$insert);

		    

					if( $user)
					{
						 $email = $userdata['email'];


				$subject="Account created !";

					

				$body = '<p>Hello '. $userdata['fname'].'</p><p> Congratulation! This is an email to inform you that your account has been created successfully.</p>';

			   /* $body .= '<p>Please <a href="'.base_url().'verify-email/'.$user.'">click here </a> to verify your account</p>';*/

					 

					$send = $this->common_model->SendMail($email,$subject,$body);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Congratulations! Your account has been successfully created.</div>');
					redirect('signup-student-success');
					//echo 1;
					}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success">Your account has been created successfully. Now you can login your account.</div>');
				redirect('signup-student-success');
					//	echo 0;
					}

    	}

public function signup_success(){

		$this->load->view('site/signup-success');

    	}

    	public function verify_email(){

            

		$id = $this->uri->segment(2);

	   //echo $code; 

		$update['email_verified']='1';

		//$update['code']='0';

		$user = $this->common_model->GetSingleData('users',array('user_id'=>$id,'email_verified'=>'0'));

	//	print_r($user);

		

	

		if($user){

		$run = $this->common_model->UpdateData('users',array('user_id'=>$user['user_id']),$update);

		



	   if($run){

		  

		   $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your email has been verified successfully,Now you can login your account.</div>');

		   //$this->session->set_userdata('user_id',$run);

		  

			 redirect('login');

		

	   } else {

		   $this->session->set_flashdata('msg','<div class="alert alert-danger col-md-6">This link has been expired.</div>');

			 redirect('already-verified');

	   }

   } else {

		   $this->session->set_flashdata('msg','<div class="alert alert-danger col-md-6">This link has been expired.</div>');

			 redirect('already-verified');

   }





}
		public function profile()
		{
  	    if(!$this->session->userdata('user_id'))
		{
		  redirect('login');
		}	
		$user = $this->session->userdata('user_id');
		$data['user'] = $this->common_model->GetSingleData('users',array('user_id'=>$user));
		$this->load->view('site/profile',$data);
    	}
    	
    	
    	public function transaction_list()
		{
  	    if(!$this->session->userdata('user_id'))
		{
		  redirect('login');
		}	
		$user = $this->session->userdata('user_id');
		$data['transactdata'] = $this->common_model->GetAllData('transactions',array('tr_userid'=>$user));
		$this->load->view('site/transaction-list',$data);
    	}

    	public function success()
		{
		 $user = $this->session->userdata('user_id');
		 $data['user'] = $this->common_model->GetSingleData('users',array('user_id'=>$user));
   		 $this->load->view('site/success',$data);
    	}


		public function edit_profile_action()
		{
        $user = $this->session->userdata('user_id');
		$data['user'] = $this->common_model->GetSingleData('users',array('user_id' =>$user ));
   	    $this->form_validation->set_rules('username','First Name','required');
		if($this->form_validation->run()==false){
		$this->load->view('site/profile',$data);
	   } 
	   else
	   {
	    if($_FILES['profile']['name'])
	    {
           $query_get_image=   $this->common_model->GetSingleData('users',array('user_id'=>$user));
            $image_path="./assets/profile/" ;
            foreach ($query_get_image as $record)
            {
             $filename = $image_path . $record['profile']; 
             if (file_exists($filename)) unlink($filename); 
            }   
	        
  		$config['upload_path']="assets/profile";
		$config['allowed_types'] = '*';
		$config['encrypt_name']=true;
		$this->load->library("upload",$config);
				
		if ($this->upload->do_upload('profile'))
		{
		$u_profile=$this->upload->data("file_name");
		$update['profile'] = $u_profile;
		
		} 
  	   }
  	   else
  	   {
            $update['profile']= $this->input->post('oldprofile');
        }
  	   
			$update['fname'] = $this->input->post('username');
            $update['email'] = $this->input->post('email');
            $update['address'] = $this->input->post('address');

   		$run = $this->common_model->UpdateData('users',array('user_id'=>$user),$update);
	    if($run)
		$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Profile updated successfully!</p></div>');
		else 
		$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
        
	    redirect('profile');
    	}
	}



	public function edit_image_profile_action(){
			//alert();

		$id = $this->input->post('user_id');
		
				 if($_FILES['profile']['name']){

				$config['upload_path']="assets/profile";

				$config['allowed_types'] = '*';

				$config['encrypt_name']=true;

				$this->load->library("upload",$config);
				


				if ($this->upload->do_upload('profile')) {

				$u_profile=$this->upload->data("file_name");

				$profile = $u_profile;

				$update['profile'] = $profile ;

				} 

				}
				

   		$run = $this->common_model->UpdateData('users',array('user_id'=>$id),$update);
			
			if($run){

             
				$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Profile Image updated successfully!</p></div>');



			} else {

				 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
             
	}
	       redirect('profile');

		
	
	}



	public function professional_update(){

/*SELECT * FROM `professional_details` WHERE `user_id` = '4' AND `subtitle` !=''*/

			$user = $this->session->userdata('user_id');

			$where = ' subtitle !="" AND user_id = "'.$user.'" ';
			$data['subtitle'] = $this->common_model->GetAllData('professional_details',$where);

			$where1 = ' experience_title !="" AND experience_description !="" AND user_id = "'.$user.'" ';
			$data['experience'] = $this->common_model->GetAllData('professional_details',$where1);

			$where2 = ' degree !="" AND university !="" AND user_id = "'.$user.'" ';
			$data['education'] = $this->common_model->GetAllData('professional_details',$where2);

			$where3 = ' certification_title !="" AND certification_university !="" AND certification_description !="" AND user_id = "'.$user.'" ';
			$data['certification'] = $this->common_model->GetAllData('professional_details',$where3);
		
			$data['singlesubtitle'] = $this->common_model->GetSingleData('users',array('user_id'=>$user));

			$this->load->view('site/student-professional',$data);

		}

	public function add_professional_subtitle_action(){
		$user = $this->session->userdata('user_id');
		
		$this->form_validation->set_rules('subtitle','Subtitle','required');

		if($this->form_validation->run()==false){
			
		$this->load->view('site/student-professional');
	}else{
	    
	  
			$insert['user_id'] = $user;
			
			$insert['subtitle'] = $this->input->post('subtitle');
			 				
			$run = $this->common_model->InsertData('professional_details',$insert);
			
			if($run){

             
				$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Add Subtitle successfully!</p></div>');



			} else {

				 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
             
	}
	       redirect('student-professional');

		
	}
	}


	public function edit_professional_subtitle_action(){
		$id = $this->uri->segment(2);
		$user = $this->session->userdata('user_id');

        $this->form_validation->set_rules('subtitle','Subtitle','required');
           if($this->form_validation->run()==false){
			
		   $this->load->view('site/student-professional');
	     }else{

					$update['subtitle'] = $this->input->post('subtitle');

					/*$update['updated_at'] = date('Y-m-d H:i:s');*/

		             $run = $this->common_model->UpdateData('users',array('user_id'=>$user),$update);
					
			if($run){

             
				$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Subtitle updated successfully!</p></div>');


			} else {

				 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
             
	}
	       redirect('student-professional');
	
		}
	}
	


	 public function delete_subtitle(){
		$id = $this->uri->segment(2);
   

	   $run = $this->common_model->DeleteData('professional_details',array('id' =>$id ));
	   if($run){

		   $this->session->set_flashdata('msg','<div class="alert alert-success">Sub Title has been Deleted successfully</div>');
		   
	   } else {
		   $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong</div>');
		   
	   }	
	   redirect('student-professional');

   }



	public function add_professional_education_action(){
		$user = $this->session->userdata('user_id');
		
		$this->form_validation->set_rules('degree','Degree','required');

		if($this->form_validation->run()==false){
			
		$this->load->view('site/student-professional');
	}else{
	    
	  
			$insert['user_id'] = $user;
			
			$insert['degree'] = $this->input->post('degree');
			$insert['university'] = $this->input->post('university');
            				
			$run = $this->common_model->InsertData('professional_details',$insert);
			
			if($run){

             
				$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Add Education successfully!</p></div>');



			} else {

				 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
             
	}
	       redirect('student-professional');

		
	}
	}


	public function edit_professional_education_action(){
		$id = $this->uri->segment(2);
		
        $this->form_validation->set_rules('degree','Degree','required');
           if($this->form_validation->run()==false){
			
		   $this->load->view('site/student-professional');
	     }else{

					$update['degree'] = $this->input->post('degree');
					$update['university'] = $this->input->post('university');

					/*$update['updated_at'] = date('Y-m-d H:i:s');*/

		             $run = $this->common_model->UpdateData('professional_details',array('id'=>$id),$update);
					
			if($run){

             
				$this->session->set_flashdata('msg','<div class="alert alert-success"><p>Education updated successfully!</p></div>');


			} else {

				 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
             
	}
	       redirect('student-professional');
	
		}
	}

	public function delete_education(){
		$id = $this->uri->segment(2);
   

	   $run = $this->common_model->DeleteData('professional_details',array('id' =>$id ));
	   if($run){

		   $this->session->set_flashdata('msg','<div class="alert alert-success">Education has been Deleted successfully</div>');
		   
	   } else {
		   $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong</div>');
		   
	   }	
	   redirect('student-professional');

   }




	 public function change_password(){
       $user = $this->session->userdata('user_id');

			$data['user'] = $this->common_model->GetSingleData('users',array('user_id'=>$user));		$this->load->view('site/change-password',$data);
	}

	public function change_password_action(){

 	 $user_id = $this->session->userdata('user_id');
	$userdata= $this->common_model->GetSingleData('users',array('user_id'=>$user_id));
		

 		  $this->form_validation->set_rules('user_password','Current password','required');

		  $this->form_validation->set_rules('New_Password','New password','required|min_length[6]');
		  $this->form_validation->set_rules('Confirm_Password','Confirm password','required|matches[New_Password]');
 
		  if($this->form_validation->run()==true){
 
			 $user_pass =$this->input->post('user_password');
			 $New_Password = $this->input->post('New_Password');
			 $Confirm_Password = $this->input->post('Confirm_Password');
 
			  if($userdata['view_password'] == $user_pass){
 
				  $run = $this->common_model->UpdateData('users',array('user_id' =>$user_id),array('password' =>md5($New_Password),'view_password' =>$New_Password));
 
				  if($run){

					 $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your  password has been changed successfully .</div>');
					 redirect('change-password');
 
				 }else {
					 $this->session->set_flashdata('msg','<div class="alert alert-danger">Error! Something went to wrong.</div>');
					 redirect('change-password');
					}
			  }
			  else{
 
				  $this->session->set_flashdata('msg','<div class="alert alert-danger">Error! Current Password does not matched the data in our Database.</div>');
					 redirect('change-password');
				}
		  }
		  else{
			$this->load->view('site/change-password');
		}
 	}
 	
 	public function ticket(){
 	    $user_id = $this->session->userdata('user_id');
        $data['ticket'] = $this->common_model->GetAllData('ticket',array('user_id'=>$user_id),'','','','','','ticket_id');
 	    $this->load->view('site/ticket',$data);
	}
	
	public function ticket_action()
	{
	    
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('subject','Subject','required');
        $this->form_validation->set_rules('message','Message','required');
	
		if($this->form_validation->run()==true){
		    
		     $user_id = $this->session->userdata('user_id');
	         $userdata= $this->common_model->GetSingleData('users',array('user_id'=>$user_id));
	         $email=$userdata['email'];

			$name = $this->input->post('username');
			$subject = $this->input->post('subject');
			$msg = $this->input->post('message');
			$ticketid=rand(10,10000);
            
            $run = $this->common_model->InsertData('ticket',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$msg,'user_id'=>$user_id,'ticket_id'=>$ticketid,'read_user'=>1,'created_at'=>date('Y-m-d H:i:s')));

			if($run){
         
			    $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Ticket request has been send successfully.</div>');
				redirect('ticket');
			   } else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
				redirect('ticket');
			   }

		} else {
			$this->load->view('site/ticket');
		}
	}
	
	public function chat_box(){
	    $ticket_id=$_GET['ticket_id'];
 	    $update['read_admin'] =2;
        $run = $this->common_model->UpdateData('ticket',array('ticket_id'=>$ticket_id),$update);
 	    $this->load->view('site/chat_box');
	}
	
	public function reply_action()
	{
	    
      $this->form_validation->set_rules('message','Message','required');
	
	 if($this->form_validation->run()==true){
		    
		     $user_id =$this->input->post('user_id');
	         $email=$this->input->post('email');
             $name = $this->input->post('name');
			 $subject = $this->input->post('subject');
			 $msg = $this->input->post('message');
			 $ticketid=$this->input->post('ticket_id');
            
            $run = $this->common_model->InsertData('ticket',array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$msg,'user_id'=>$user_id,'ticket_id'=>$ticketid,'read_user'=>1,'created_at'=>date('Y-m-d H:i:s')));

			if($run){
         
			    $this->session->set_flashdata('msg','<div class="alert alert-success">Success! Reply has been send successfully.</div>');
				redirect('ticket');
			   } else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
				redirect('ticket');
			   }

		} else {
			$this->load->view('site/ticket');
		}
	}
	
	
  



}

?>