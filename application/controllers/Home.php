<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	public function check_login(){
		if(!$this->session->userdata('admin_id')){
			redirect('Admin/login');
		}
	}

	public function index()
	{
	  /*if(!$this->session->userdata('user_id'))
			{
			redirect('login');
		     }
		     $user = $this->session->userdata('user_id');
	  $data['user'] = $this->common_model->GetSingleData('users',array('user_id'=>$user));*/	
      $this->load->view('site/index',$data);
	}


	public function signup(){

		$this->load->view('site/signup');
	}
	public function get_states(){

	   $countryID=$_POST['countryID'];
       $states = $this->common_model->GetAllData('states',array('country_id'=>$countryID),'id','asc');



	foreach($states as $state){ ?>

    <option value="<?php echo $state['id'];?>"><?php echo $state['name'];?></option>
    
    <?php 	 }	} 

	public function get_cities(){

	    $stateID=$_POST['stateID'];

	   $cities = $this->common_model->GetAllData('cities',array('state_id'=>$stateID),'id','asc');



	foreach($cities as $city){ ?>

	<option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>

      <?php  } 
  }
public function about(){

		$data['help_support'] = '';

		$this->load->view('site/aboutus',$data);
	}


public function services(){

		$data['help_support'] = '';

		$this->load->view('site/services',$data);
	}
	public function contactUs(){

		$data['help_support'] = '';

		$this->load->view('site/conactus',$data);
	}
	public function support(){

		$data['help_support'] = '';

		$this->load->view('site/support',$data);
	}
	public function legal(){

		$data['help_support'] = '';

		$this->load->view('site/legal',$data);
	}
	public function help_support(){

		$data['help_support'] = $this->common_model->GetAllData('footer_content');

		$this->load->view('site/help-support',$data);
	}

	public function careers(){

		$data['careers'] = $this->common_model->GetAllData('footer_content');

		$this->load->view('site/careers',$data);
	}

	public function terms_condition(){


		$this->load->view('site/term');
	}

	public function privacy_policy(){

		$data['privacy_policy'] = '';

		$this->load->view('site/privacy',$data);
	}

public function fee_charges(){


		$this->load->view('site/fee_charges');
	}
	public function sitemap(){


		$this->load->view('site/sitemap');
	}


	public function how_its_work(){

		$data['how_it_work'] = '';

		$this->load->view('site/howitwork');
	}


	public function createPaymentIntent($amount,$type=null){
		
		require_once('application/libraries/stripe-php-7.49.0/init.php');
		
    header('Content-Type: application/json');
		$secret_key = $this->config->item('stripe_secret');
		$email = $this->session->userdata('email');
		$name = $this->session->userdata('fname');
		$address = $this->session->userdata('address');
		
		$statement_descriptor = 'Diposit in wallet';
		
		if($type==2){
			$statement_descriptor = 'Subscription renewed';
		} else if($type==9){
			$statement_descriptor = 'Buy addon';
		}
		
		\Stripe\Stripe::setApiKey($secret_key);
		try {
		
		
			 $customer = \Stripe\Customer::create(array(
				'name' => $name,
				'description' => 'Software development services',
				'email' => $email,
				'address' => ["city" => 'indore', "country" => 'india', "line1" => 'navlkha', "line2" => "", "postal_code" => '452001', "state" => 'mp'],
				//'description' => 'test description'
			));
		 
		
			
		
			
				
		
			$paymentIntent = \Stripe\PaymentIntent::create([
				'amount' => $amount*1*100,
				'currency' => 'AUD',
				'customer' => $customer->id,
				'description' => $statement_descriptor,
				'setup_future_usage' => 'off_session',
				'payment_method_types'=>['card'],
				/*'payment_method_options' => [
					"card" => [
						"request_three_d_secure" => "any"
					]
				 ]*/
			]);
			
			
			
			$output = array(
					'status' => 1, 
					'customerID' => $customer->id,
					'clientSecret' => $paymentIntent->client_secret,
					'paymentIntent_id'=>$paymentIntent->id
				);
			
		} catch (Error $e) {
			
			$output = array(
				'status' => 0, 
				'msg' => $e->getMessage()
			);
			
		}
		
		echo json_encode($output);
		
  }

	
   public function contact_us()
   {
	$this->load->view('site/conactus');
   }
	public function contact_us_action()
	{
      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
    //$this->form_validation->set_rules('phone','Phone','required|numeric');
      $this->form_validation->set_rules('subject','Subject','required');
      $this->form_validation->set_rules('message','Message','required');
	
	 if($this->form_validation->run()==true)
	 {
		$email = $this->input->post('email');
		$name = $this->input->post('username');
		$subject = $this->input->post('subject');
		//$phone = $this->input->post('phone');
		//$address = $this->input->post('address');
		$msg = $this->input->post('message');

		$run = $this->common_model->InsertData('contact_us',array('name'=>$name,'email'=>$email,'subject'=>$subject,'msg'=>$msg,'read_contact'=>0,'created_at'=>date('Y-m-d H:i:s')));

		if($run)
		{
			$subject="Contact request";
			$emails = 'admin@azerax.com';	
			$body = '<p>Hello Administrator</p><p>You have recived a new contact request.</p><p>Contact Detail:</p><p><b>Name:</b> '.$name.' <br><b>Email:</b>'.$email.'<br><b>Phone:</b>'.$phone.'<br><b>Address:</b>'.$address.'<br><b>Subject:</b> '.$subject.' <br> Message: '.$msg.'</p>';
			 
			$send = $this->common_model->SendMail($emails,$subject,$body,'',$email); 
			$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Contact request has been send successfully.</div>');
			redirect('contact-us');
		   }
		   else
		   {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
			redirect('contact-us');
		   }

	}
		else
		{
			$this->load->view('site/contactus');
		}
	}
	
	public function about_us_action()
	{
      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
    //$this->form_validation->set_rules('phone','Phone','required|numeric');
      $this->form_validation->set_rules('subject','Subject','required');
      $this->form_validation->set_rules('message','Message','required');
	
	 if($this->form_validation->run()==true)
	 {
		$email = $this->input->post('email');
		$name = $this->input->post('username');
		$subject = $this->input->post('subject');
		//$phone = $this->input->post('phone');
		//$address = $this->input->post('address');
		$msg = $this->input->post('message');

		$run = $this->common_model->InsertData('contact_us',array('name'=>$name,'email'=>$email,'subject'=>$subject,'msg'=>$msg,'read_contact'=>0,'created_at'=>date('Y-m-d H:i:s')));

		if($run)
		{
			$subject="Contact request";
			$emails = 'info@azerax.com,ekta.webwiders@gmail.com';	
			$body = '<p>Hello Administrator</p><p>You have received a new contact request.</p><p>Contact Detail:</p><p><b>Name:</b> '.$name.' <br><b>Email:</b>'.$email.'<br><b>Phone:</b>'.$phone.'<br><b>Address:</b>'.$address.'<br><b>Subject:</b> '.$subject.' <br> Message: '.$msg.'</p>';
			 
			$send = $this->common_model->SendMail($emails,$subject,$body,'',$email); 
			$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Your request has been send successfully.</div>');
		}
		else  $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
		
     	redirect('about?success=1');
	 }
	  else  $this->load->view('site/aboutus');
	
	}

}
