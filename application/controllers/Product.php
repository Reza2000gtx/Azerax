<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Product extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	public function check_login(){
		if(!$this->session->userdata('user_id')){
			redirect('Admin/login');
		}
	}

	public function index()
	{	

         $session_id = $this->session->userdata('user_id');
  
         $data['user'] = $this->common_model->GetSingleData('users',array('user_id' =>$session_id));
		 $data['productlist'] = $this->common_model->GetAllData('product');
         $data['manufacturerlist'] = $this->common_model->GetAllData('product','','','','','','device_model as name','device_model');

		//$data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
     	$this->load->view('site/search-listing.php',$data);
	}

	public function product_detail()
	{	
		 $product_id = $this->uri->segment(2);

        $session_id = $this->session->userdata('user_id');
  
        $data['user'] = $this->common_model->GetSingleData('users',array('user_id' =>$session_id));


  $data['product_detail'] = $this->common_model->GetSingleData('product',array('id'=>$product_id));
  $data['inputOutput'] = $this->common_model->GetAllData('input_output',array('product_id'=>$product_id));
  $data['reviews'] = $this->common_model->GetAllData('review',array('device_id'=>$product_id,'status'=>1));
     	$this->load->view('site/details',$data);
	}

	public function add_product()
	{	
	    if($this->session->userdata('user_id')){

         $session_id = $this->session->userdata('user_id');
  
  $data['user'] = $this->common_model->GetSingleData('users',array('user_id' =>$session_id));

  if($data['user']['user_type'] != 1){
      $this->session->set_flashdata('msg','<div class="alert alert-danger">This page is only available to vendor accounts.</div>');
      redirect('home');
  }

		$data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
     	$this->load->view('site/add-product.php',$data);
	    }else{
	        	redirect('login');
	    }
	}


  
	
	
	public function fav_device(){
	    $user_id = $this->session->userdata('user_id');
        $id = $this->uri->segment(2);
        		$exist = $this->common_model->GetSingleData('fav_device_list',array('user_id' =>$user_id ,'device_id'=>$this->uri->segment(2)));


            if(!$exist){
            		$insert['user_id'] = $user_id;
                    $insert['device_id'] = $this->uri->segment(2);
            		$insert['created_at'] = date('Y-m-d H:i:s');
            
                    $run = $this->common_model->InsertData('fav_device_list',$insert);

                    if($run){




			} else {


             
	}

            }

		
           redirect('details/'.$this->uri->segment(2));
          
	}


	public function remove_from_fav_device(){
					$user_id = $this->session->userdata('user_id');
					$insert['user_id'] = $user_id;
                    $insert['device_id'] = $this->uri->segment(2);

		             $run = $this->common_model->DeleteData('fav_device_list',$insert);

		             	if($run){




			} else {


             
	}
		 redirect('details/'.$this->uri->segment(2));
		 
	
	}
	
	

	public function my_product_listing()
	{	
	if(!$this->session->userdata('user_id')){
	    redirect('login');
	}
	$session_id = $this->session->userdata('user_id');
  
  $data['user'] = $this->common_model->GetSingleData('users',array('user_id' =>$session_id));

  if($data['user']['user_type'] != 1){
      $this->session->set_flashdata('msg','<div class="alert alert-danger">This page is only available to vendor accounts.</div>');
      redirect('home');
  }

		$data['productlist'] = $this->common_model->GetAllData('product',array('user_id'=>$session_id),'id','desc');
		$data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
     	$this->load->view('site/my-product-listing.php',$data);
	}

  public function my_fav_listing()
  { 
     $session_id = $this->session->userdata('user_id');
  
    $data['productlist'] = $this->common_model->GetAllData('fav_device_list',array('user_id'=>$session_id),'id','desc');
      
      $this->load->view('site/my-fav-listing.php',$data);
  }


	public function add_product_action(){


if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'addNew'){
 
  $response['status'] = 0;
  
  $session_id = $this->session->userdata('user_id');

  // Free-product grant check. A vendor with free_product_limit still NULL
  // was never given a grant at all, so behaves exactly as before (no
  // change). A vendor who WAS given one gets blocked once it's expired or
  // fully used - at that point they pay for listings like anyone else,
  // same as the plan for launch once real payment is wired up.
  $grant_user = $this->common_model->GetSingleData('users',array('user_id'=>$session_id));
  $using_free_grant = false;
  if(!empty($grant_user['free_product_limit'])){
      $limit = (int)$grant_user['free_product_limit'];
      $used = (int)$grant_user['free_product_used'];
      $expiry = $grant_user['free_product_expiry'];
      $expired = $expiry && strtotime($expiry) < strtotime(date('Y-m-d'));
      $exhausted = $used >= $limit;
      if($expired || $exhausted){
          $response['message'] = $expired
              ? 'Your free product allowance has expired. Please contact us to continue adding products.'
              : 'You have used all of your free product allowance. Please contact us to continue adding products.';
          echo json_encode($response);
          return;
      }
      $using_free_grant = true;
  }


  //// Group 1: Device ////
  $product_type = htmlentities($_REQUEST['product_type'], ENT_QUOTES);
  $device_model = htmlentities($_REQUEST['device_model'], ENT_QUOTES);
  $device_brand = htmlentities($_REQUEST['device_brand'], ENT_QUOTES);
  $description = htmlentities($_REQUEST['description'], ENT_QUOTES);
  $latest_firmware_version = htmlentities($_REQUEST['latest_firmware_version'], ENT_QUOTES);
  $mechanical_demension_mounting = htmlentities($_REQUEST['mechanical_demension_mounting'], ENT_QUOTES);
  $paymentIntent_id = $_POST['paymentIntent_id'];
  $rack_unit = $_REQUEST['rack_unit'];


  //// Group 2: IOP ////

  $input_conn1 = isset($_REQUEST['input_conn']) ? $_REQUEST['input_conn'] : array();
   $input_process_stand = isset($_REQUEST['input_process_stand']) ? $_REQUEST['input_process_stand'] : array();
   $process_connection = isset($_REQUEST['process_connection']) ? $_REQUEST['process_connection'] : array();

  $out_conn = isset($_REQUEST['out_conn']) ? $_REQUEST['out_conn'] : array();
  $out_process_stand = isset($_REQUEST['out_process_stand']) ? $_REQUEST['out_process_stand'] : array();
  $out_process_connection = isset($_REQUEST['out_process_connection']) ? $_REQUEST['out_process_connection'] : array();

  $process = isset($_REQUEST['process']) ? $_REQUEST['process'] : array();
  $process_stand = isset($_REQUEST['process_stand']) ? $_REQUEST['process_stand'] : array();
  $features = isset($_REQUEST['features']) ? $_REQUEST['features'] : array();

  // The number of I/O rows to save is based on whichever field actually has
  // data - not just input_conn specifically, since a product might have
  // Output/Process/Features filled in while Input is genuinely empty (e.g.
  // a pure output device), and that data should still save correctly.
  $input_conn = max(
      count($input_conn1), count($input_process_stand), count($process_connection),
      count($out_conn), count($out_process_stand), count($out_process_connection),
      count($process), count($process_stand), count($features)
  );

  //// Group 3: Dealer //// 
  // Retailer website / Ordering Information merged into Dealer Contact (Stage cleanup)
  $dealer_notes = htmlentities($_REQUEST['dealer_notes'], ENT_QUOTES);
  $warranty_detail = htmlentities($_REQUEST['warranty_detail'], ENT_QUOTES);
  $support_detail = htmlentities($_REQUEST['support_detail'], ENT_QUOTES);
 
  $dealer_contact = htmlentities($_REQUEST['dealer_contact'], ENT_QUOTES);
  $cdate = date('Y-m-d H:i:s');
  

    /* Image upload */
  $uploadImage = false;
  $device_manual_brochure ='';
  if($_FILES["device_manual_brochure"]['error'] == 0){
      $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['device_manual_brochure']['name'], '.'), '.');
      $target_file = "assets/pdf/".$filename;
      if(move_uploaded_file($_FILES["device_manual_brochure"]["tmp_name"], $target_file)){
        $uploadImage = true;
      }
      $device_manual_brochure = $filename;

}
       // SECURITY FIX: every value now passed through $this->db->escape()
       // instead of raw string concatenation. rack_unit and
       // paymentIntent_id previously had ZERO escaping at all.
       // Release Date / Release Notes fields removed (Stage A cleanup).
       // order_code / dealer_web_cont merged into dealer_contact (Stage cleanup).
       $sql = "INSERT INTO `product`(`approve_date`,`user_id`, `device_model`,`device_brand`,`description`,`latest_firmware_version`,`device_manual_brochure`,`mechanical_demension_mounting`,`rack_unit`,`dealer_notes`,`warranty_detail`,`support_detail`,`created_at`,`dealer_contact`,`paymentIntent_id`,`product_type`)
      VALUES(
        " .$this->db->escape($cdate) .",
        " .$this->db->escape($session_id) .",
        " .$this->db->escape($device_model) .",
        " .$this->db->escape($device_brand) .",
        " .$this->db->escape($description) .",
        " .$this->db->escape($latest_firmware_version) .",
        " .$this->db->escape($device_manual_brochure) .",
        " .$this->db->escape($mechanical_demension_mounting) .",
        " .$this->db->escape($rack_unit) .",
        " .$this->db->escape($dealer_notes) .",
        " .$this->db->escape($warranty_detail) .",
        " .$this->db->escape($support_detail) .",
        " .$this->db->escape($cdate) .",
        " .$this->db->escape($dealer_contact) .",
        " .$this->db->escape($paymentIntent_id) .",
        " .$this->db->escape($product_type) ."
      )";
  
    $run = $this->db->query($sql);

    $product_id=$this->db->insert_id();

    // Save categories
    if(!empty($_REQUEST['main_cat'])){
        $cat_a = implode(',', $_REQUEST['main_cat']);
        $cat_b = !empty($_REQUEST['sub1_cat']) ? implode(',', $_REQUEST['sub1_cat']) : '';
        $cat_c = !empty($_REQUEST['sub2_cat']) ? implode(',', $_REQUEST['sub2_cat']) : '';
        $this->db->query("INSERT INTO product_category (product_id, cat_a, cat_b, cat_c) VALUES (".$this->db->escape($product_id).", ".$this->db->escape($cat_a).", ".$this->db->escape($cat_b).", ".$this->db->escape($cat_c).")");
    }

    // Phase 3: save any flexible category attribute values submitted
    if(!empty($_REQUEST['category_attribute'])){
        foreach($_REQUEST['category_attribute'] as $attr_id => $attr_value){
            if($attr_value !== ''){
                $this->db->query("INSERT INTO product_attribute_values (product_id, category_attribute_id, value, created_at) VALUES (".$this->db->escape($product_id).", ".$this->db->escape($attr_id).", ".$this->db->escape($attr_value).", ".$this->db->escape(date('Y-m-d H:i:s')).")");
            }
        }
    }

    if($run){      

for($i=0; $i<$input_conn; $i++){
 $input_data = implode(',',$input_conn1[$i] ?? array());
$input_process_stand_data = implode(',',$input_process_stand[$i] ?? array());
$process_connection_data = implode(',',$process_connection[$i] ?? array());

$out_conn_data = implode(',',$out_conn[$i] ?? array());
$out_process_stand_data = implode(',',$out_process_stand[$i] ?? array());
$out_process_connection_data = implode(',',$out_process_connection[$i] ?? array());


$process_stand_data = implode(',',$process_stand[$i] ?? array());
$process_data = implode(',',$process[$i] ?? array());
$features_data = implode(',',$features[$i] ?? array());

$sqlInsert1="insert into input_output set product_id = ".$this->db->escape($product_id)." , input_conn = ".$this->db->escape($input_data)." , input_process_stand = ".$this->db->escape($input_process_stand_data)." , process_connection = ".$this->db->escape($process_connection_data)." , out_conn = ".$this->db->escape($out_conn_data)." , out_process_stand = ".$this->db->escape($out_process_stand_data)." , out_process_connection = ".$this->db->escape($out_process_connection_data)." , process_stand = ".$this->db->escape($process_stand_data)." , process = ".$this->db->escape($process_data)." , features = ".$this->db->escape($features_data)." ";

                   $run21 = $this->db->query($sqlInsert1);
}

      if (isset($_FILES['gallery-image-orignal']['name'])) {
                 for ($i=0; $i < count($_FILES['gallery-image-orignal']['name']) ; $i++) { 
                   $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['gallery-image-orignal']['name'][$i], '.'), '.');
                   $target_file = "assets/product_image/" .$filename;
                   if(move_uploaded_file($_FILES["gallery-image-orignal"]["tmp_name"][$i], $target_file)){
                     $uploadImage = true;
                   }
                   $fileD = $filename;
                   $sqlInsert="insert into product_gallery_image set product_id= ".$this->db->escape($product_id).",gallery_image = ".$this->db->escape($fileD)." ";
                   $run2 = $this->db->query($sqlInsert);
                  }
   
               }   
       $where =" user_id='".$session_id."' ";
       $user_type = $this->common_model->UpdateData('users',$where,array('user_type'=>1));

       if($using_free_grant){
           $this->common_model->UpdateData('users',array('user_id'=>$session_id),array('free_product_used'=>$grant_user['free_product_used']+1));
       }
       
       $response['message'] = $using_free_grant
           ? 'Success! Your item will be added shortly (used '.($grant_user['free_product_used']+1).' of '.$grant_user['free_product_limit'].' free listings).'
           : 'Payment successful! Your item will be added shortly.';
       $response['url'] = base_url().'my-product-listing';


      
      $_SESSION['success'] = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> ' .$response['message'] .'</div>';
      $response['status'] = 1;
    }else{
      $response['message'] = 'Please try again later.';
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' .$response['message'] .'</div>';
    }
  
  echo json_encode($response);
}

  }



  	public function pay_product($value=''){	
  	    
  	    $paymenttype=$this->input->post('paymentType'); 
  	    
  	    $data = $this->input->post('data');
			
    $response = array();
	
    if(!empty($data) && $data['paymentIntent']['status']=='succeeded'){
			
		 	
			 $user_id = $this->session->userdata('user_id');
			 
			$currency = 'AUD';
			$status = 1;
			$traId = md5(rand(1000,999).time());
		    
		        $insert['tr_userid'] = $user_id;
				$insert['tr_amount'] = $_POST['actual_amt'];
				$insert['tr_transactionId'] = $traId;
				$insert['paymentIntentId'] = $_POST['paymentIntent_id'];
				$insert['tr_status'] = $status;
			    $insert['tr_paid_by']= 'Stripe';
				$insert['currency']= $currency;
				$insert['tr_date']= date("Y-m-d H:i:s");
				
				$run = $this->common_model->InsertData('transactions',$insert);
				
			
			 $response = array(
				'status' => 1,
				'msg' => 'Paid Successfully'
			);
			 

			$this->session->set_flashdata('msg','<p class="alert alert-success">Your Product amount will be paid successfully. And your product will be add successfully.</p>');
			
    }
    elseif($paymenttype=='Paypal')
    {
         $user_id = $this->session->userdata('user_id');
			 
			$currency = 'AUD';
			$status = 1;
			$traId = md5(rand(1000,999).time());
		    
		        $insert['tr_userid'] = $user_id;
				$insert['tr_amount'] = $this->input->post('actual_amt');
				$insert['tr_transactionId'] = $traId;
				$insert['paymentIntentId'] = $this->input->post('paymentIntent_id');
				$insert['tr_status'] = $status;
				$insert['tr_paid_by']= 'Paypal';
				$insert['currency']= $currency;
				$insert['tr_date']= date("Y-m-d H:i:s");
				
				$run = $this->common_model->InsertData('transactions',$insert);
				
			
			 $response = array(
				'status' => 1,
				'msg' => 'Paid Successfully'
			);
			 

			$this->session->set_flashdata('msg','<p class="alert alert-success">Your Product amount will be paid successfully. And your product will be add successfully.</p>');
			
    }
    
    else {
			
      $response = array(
				'status' => 0,
				'msg' => 'Something went wrong. Please try again later.'
			);
    }

    echo json_encode($response);
  }


   public function edit_my_product(){

    if(!$this->session->userdata('user_id')){
        redirect('login');
    }

    $product_id = $this->uri->segment(2);

     $session_id = $this->session->userdata('user_id');
  
  $data['user'] = $this->common_model->GetSingleData('users',array('user_id' =>$session_id));

  if($data['user']['user_type'] != 1){
      $this->session->set_flashdata('msg','<div class="alert alert-danger">This page is only available to vendor accounts.</div>');
      redirect('home');
  }


    $data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
    $data['product_detail'] = $this->common_model->GetSingleData('product',array('id'=>$product_id));

    // Ownership check - a vendor should only be able to edit their own
    // product, never someone else's just by changing the ID in the URL.
    if(!$data['product_detail'] || $data['product_detail']['user_id'] != $session_id){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">You do not have permission to edit this product.</div>');
        redirect('my-product-listing');
    }

    // Existing category assignment (if any) - so the edit form can pre-select it
    $data['product_category'] = $this->common_model->GetSingleData('product_category',array('product_id'=>$product_id));

    // Existing category-specific attribute values (if any), joined with their definitions
    $data['category_attribute_values'] = $this->db->query("SELECT pav.category_attribute_id, pav.value, ca.attribute_name, ca.cat_c FROM product_attribute_values pav JOIN category_attributes ca ON ca.id = pav.category_attribute_id WHERE pav.product_id = ?", array($product_id))->result_array();

    $this->load->view('site/edit_my_product',$data);
  }

  public function cancel_my_product(){

	$p_id=$this->input->post('cancel_id'); 
    
    $qry = $this->db->query("SELECT * FROM product WHERE id = ".$this->db->escape($p_id))->row_array();

    if(!$qry){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">Product not found.</div>');
        redirect('my-product-listing');
        return;
    }

    // Ownership check - without this, any logged-in user could cancel and
    // refund a different vendor's listing just by passing another ID.
    if($qry['user_id'] != $this->session->userdata('user_id')){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">You do not have permission to cancel this listing.</div>');
        redirect('my-product-listing');
        return;
    }

    // Already cancelled - don't attempt a second refund on the same listing.
    if($qry['status'] == 3){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">This listing has already been cancelled.</div>');
        redirect('my-product-listing');
        return;
    }

    // 14-day cooling-off window - the frontend already hides the Cancel
    // button once this has passed, but that alone doesn't stop a direct
    // request to this endpoint after the window has closed.
    $cooling_off_end = date('Y-m-d', strtotime('+14 days', strtotime($qry['approve_date'])));
    if(date('Y-m-d') > $cooling_off_end){
        $this->session->set_flashdata('msg','<div class="alert alert-danger">The 14-day cooling-off period for this listing has ended, so it can no longer be cancelled for a refund.</div>');
        redirect('my-product-listing');
        return;
    }
	
		require_once('application/libraries/stripe-php-7.49.0/init.php');
        header('Content-Type: application/json');
        $secret_key = $this->config->item('stripe_secret');
        \Stripe\Stripe::setApiKey($secret_key);
     
        $setting = $this->common_model->GetSingleData('setting', 'id=1');
       try {
        $re = \Stripe\Refund::create([
                            'amount' => $setting['amount']*100,
                            'payment_intent' => $qry['paymentIntent_id']
                          ]);
 

$success = 1;

} catch(\Stripe\Exception\CardException $e) {
  $error1 = $e->getMessage();
} catch (\Stripe\Exception\InvalidRequestException $e) {
  $error1 = $e->getMessage();
} catch (\Stripe\Exception\AuthenticationException $e) {
  $error1 = $e->getMessage();
} catch (\Stripe\Exception\ApiConnectionException $e) {
  $error1 = $e->getMessage();
} catch (\Stripe\Exception\ApiErrorException $e) {
  $error1 = $e->getMessage();
} catch (Exception $e) {
  $error1 = $e->getMessage();
}
 
  

    if($success==1)
    {		$orderId = $qry['id'];
		$paymentIntentId = $qry['paymentIntent_id'];

		
			
			$insert['user_id'] = $this->session->userdata('user_id');
			$insert['device_id'] = $p_id;
			$insert['canceled_date'] = date('Y-m-d H:i:s');
			$insert['cancel_status'] = 1;
			$insert['refund_id'] = $re->id;
			$insert['survey'] = $this->input->post('survey');
			$insert['feedback'] = $this->input->post('feedback');
			
			$run = $this->common_model->InsertData('request',$insert);

            $insert1['status'] = 3;
			$run1 = $this->common_model->UpdateData('product',array('id'=>$p_id),$insert1);
			
			$usr=$this->session->userdata('user_id');
			$name = $this->common_model->GetSingleData('users',array('user_id'=>$usr));
			
			$email = $name['email'];

            $subject="Device Removed!";

			$body = '<p>Hello '. $name['fname'].'</p><p>We have removed '. $qry['device_model'] .' from Azerax as per your request.</p>';

			$body .= '<p>Please allow 3-5 business days for the refund to be processed.</p>';

            $body .= '<p>Thanks for using Azerax and hope to see you again!</p>';
            
			$send = $this->common_model->SendMail($email,$subject,$body);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success"><p style="margin-bottom: 0rem!important;">Your item has been successfully removed and you will receive a refund in 3-5 business days.</p></div>');
		 }	
			else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$error1.'</div>');
			}
			
		 
	redirect('my-product-listing');
     
}
  
  
  

  public function edit_product_action(){

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update_shop_product'){
 
  
  $response['status'] = 0;

  //// Group 1: Device ////
  $device_model = htmlentities($_REQUEST['device_model'], ENT_QUOTES);
  $device_brand = htmlentities($_REQUEST['device_brand'], ENT_QUOTES);
  $description = htmlentities($_REQUEST['description'], ENT_QUOTES);
  $latest_firmware_version = htmlentities($_REQUEST['latest_firmware_version'], ENT_QUOTES);
  $mechanical_demension_mounting = htmlentities($_REQUEST['mechanical_demension_mounting'], ENT_QUOTES);
  $rack_unit = $_REQUEST['rack_unit'];


  $input_conn1 = isset($_REQUEST['input_conn']) ? $_REQUEST['input_conn'] : array();
   $input_process_stand = isset($_REQUEST['input_process_stand']) ? $_REQUEST['input_process_stand'] : array();
   $process_connection = isset($_REQUEST['process_connection']) ? $_REQUEST['process_connection'] : array();

  $out_conn = isset($_REQUEST['out_conn']) ? $_REQUEST['out_conn'] : array();
  $out_process_stand = isset($_REQUEST['out_process_stand']) ? $_REQUEST['out_process_stand'] : array();
  $out_process_connection = isset($_REQUEST['out_process_connection']) ? $_REQUEST['out_process_connection'] : array();

  $process = isset($_REQUEST['process']) ? $_REQUEST['process'] : array();
  $process_stand = isset($_REQUEST['process_stand']) ? $_REQUEST['process_stand'] : array();
  $features = isset($_REQUEST['features']) ? $_REQUEST['features'] : array();

  $input_conn = max(
      count($input_conn1), count($input_process_stand), count($process_connection),
      count($out_conn), count($out_process_stand), count($out_process_connection),
      count($process), count($process_stand), count($features)
  );

  $Connection_id = $_REQUEST['Connection_id'];

  //// Group 3: Dealer //// 
  // Retailer website / Ordering Information merged into Dealer Contact (Stage cleanup)
  $dealer_notes = htmlentities($_REQUEST['dealer_notes'], ENT_QUOTES);
  $warranty_detail = htmlentities($_REQUEST['warranty_detail'], ENT_QUOTES);
  $support_detail = htmlentities($_REQUEST['support_detail'], ENT_QUOTES);
  
  $dealer_contact = htmlentities($_REQUEST['dealer_contact'], ENT_QUOTES);
  $update = date('Y-m-d H:i:s');
 
  $id= $_REQUEST['id'];
  $condition = "`id` = ".$this->db->escape($id)."";
  $product_detail = $this->common_model->GetSingleData('product', $condition);

  // Ownership check - never allow updating a product that doesn't belong
  // to the currently logged-in user, even if they craft the request
  // directly rather than going through the edit form/page.
  $session_id = $this->session->userdata('user_id');
  if(!empty($product_detail) && $product_detail[0]['user_id'] != $session_id){
      $response['status'] = 0;
      $response['msg'] = 'You do not have permission to edit this product.';
      echo json_encode($response);
      return;
  }

  if(!empty($product_detail)){
    $product_detail = $product_detail[0];
   
        // SECURITY FIX: every value escaped via $this->db->escape().
        // rack_unit previously had zero escaping.
        // Release Date / Release Notes fields removed (Stage A cleanup).
        // order_code / dealer_web_cont merged into dealer_contact (Stage cleanup).
        $sql = "UPDATE `product` SET  `device_model` = ".$this->db->escape($device_model).",`device_brand` = ".$this->db->escape($device_brand)." ,`description` = ".$this->db->escape($description)." ,`latest_firmware_version` = ".$this->db->escape($latest_firmware_version)." ,`mechanical_demension_mounting` = ".$this->db->escape($mechanical_demension_mounting)." ,`rack_unit` = ".$this->db->escape($rack_unit)." ,`manufacturer_part_no` = ".$this->db->escape($manufacturer_part_no)." ,`dealer_notes` = ".$this->db->escape($dealer_notes)." ,`warranty_detail` = ".$this->db->escape($warranty_detail)." ,`support_detail` = ".$this->db->escape($support_detail)."  ,`dealer_contact` = ".$this->db->escape($dealer_contact).",`updated_at` = ".$this->db->escape($update)." ";

        if(!empty($_FILES["product_image"]['name'])){
          $uploadImage = false;
          $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['product_image']['name'], '.'), '.');
          $target_file =  "assets/product_image/".$filename;

          if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)){
          
            $uploadImage = true;
          }
          $product_image = $filename;
           $sql .= ", `product_image` = ".$this->db->escape($product_image)."";
        } elseif(!empty($_REQUEST['main_gallery_image'])){
          // vendor selected an existing gallery image as the main product image
          $sql .= ", `product_image` = ".$this->db->escape($_REQUEST['main_gallery_image'])."";
        }
  
    
    $sql .= " WHERE `id` = " .$this->db->escape($id).";";

     

    $run = $this->db->query($sql);
 
     

    if($run){

	// Save category assignment (replace any existing one for this product)
	$this->db->query("DELETE FROM product_category WHERE product_id = ".$this->db->escape($id));
	if(!empty($_REQUEST['main_cat'])){
		$cat_a = implode(',', (array)$_REQUEST['main_cat']);
		$cat_b = !empty($_REQUEST['sub1_cat']) ? implode(',', $_REQUEST['sub1_cat']) : '';
		$cat_c = !empty($_REQUEST['sub2_cat']) ? implode(',', $_REQUEST['sub2_cat']) : '';
		$this->db->query("INSERT INTO product_category (product_id, cat_a, cat_b, cat_c) VALUES (".$this->db->escape($id).", ".$this->db->escape($cat_a).", ".$this->db->escape($cat_b).", ".$this->db->escape($cat_c).")");
	}

	// Save category-specific attribute values (replace any existing ones for this product)
	$this->db->query("DELETE FROM product_attribute_values WHERE product_id = ".$this->db->escape($id));
	if(!empty($_REQUEST['category_attribute'])){
		foreach($_REQUEST['category_attribute'] as $attr_id => $attr_value){
			if($attr_value !== ''){
				$this->db->query("INSERT INTO product_attribute_values (product_id, category_attribute_id, value, created_at) VALUES (".$this->db->escape($id).", ".$this->db->escape($attr_id).", ".$this->db->escape($attr_value).", ".$this->db->escape(date('Y-m-d H:i:s')).")");
			}
		}
	}


	$qry = $this->db->query("SELECT * FROM fav_device_list WHERE device_id = ".$this->db->escape($id)."")->row_array();
	if($qry)
	{
        $uid = $qry["user_id"];
		$qry1 = $this->db->query("SELECT * FROM users WHERE user_id = ".$this->db->escape($uid)."")->row_array();
		if($qry1)
		{
			$email = $qry1["email"];
			$subject="Your Favorite device is updated";

			$body = '<p>Hello '.$qry1["fname"].'</p>
			<p>Please be informed that your favorite device is updated.</p><br>
			<p>';

			$send = $this->common_model->SendMail($email,$subject,$body);
			if($send){
		    }
			
		}
	}
	
$input_output = " DELETE FROM `input_output` WHERE product_id=".$this->db->escape($id)."";

$run3 = $this->db->query($input_output);

for($i=0; $i<$input_conn; $i++){
 $input_data = implode(',',$input_conn1[$i] ?? array());
$input_process_stand_data = implode(',',$input_process_stand[$i] ?? array());
$process_connection_data = implode(',',$process_connection[$i] ?? array());

$out_conn_data = implode(',',$out_conn[$i] ?? array());
$out_process_stand_data = implode(',',$out_process_stand[$i] ?? array());
$out_process_connection_data = implode(',',$out_process_connection[$i] ?? array());


$process_stand_data = implode(',',$process_stand[$i] ?? array());
$process_data = implode(',',$process[$i] ?? array());
$features_data = implode(',',$features[$i] ?? array());

$sqlInsert1="insert into input_output set product_id = ".$this->db->escape($id)." , input_conn = ".$this->db->escape($input_data)." , input_process_stand = ".$this->db->escape($input_process_stand_data)." , process_connection = ".$this->db->escape($process_connection_data)." , out_conn = ".$this->db->escape($out_conn_data)." , out_process_stand = ".$this->db->escape($out_process_stand_data)." , out_process_connection = ".$this->db->escape($out_process_connection_data)." , process_stand = ".$this->db->escape($process_stand_data)." , process = ".$this->db->escape($process_data)." , features = ".$this->db->escape($features_data)." ";

                   $run21 = $this->db->query($sqlInsert1);
}



       if(isset($_REQUEST['gallery-image-id'])){
   
            $abc=implode(',', $_REQUEST['gallery-image-id']);
            if($abc==""){
              $abc_id=0;
            }else{
              $abc_id=$abc;
            }
   
             $delete="delete from product_gallery_image  where product_id=".$this->db->escape($id)." and id NOT IN ($abc_id)";
            $this->db->query($delete);
   
            
          }
            
          if (isset($_FILES['gallery-image-orignal']['name'])) {
            for ($i=0; $i < count($_FILES['gallery-image-orignal']['name']) ; $i++) { 
              $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['gallery-image-orignal']['name'][$i], '.'), '.');
              $target_file = "assets/product_image/" .$filename;
              if(move_uploaded_file($_FILES["gallery-image-orignal"]["tmp_name"][$i], $target_file)){
                $uploadImage = true;
              }
              $fileD = $filename;
              $sqlInsert="insert into product_gallery_image set product_id= ".$this->db->escape($id).",gallery_image = ".$this->db->escape($fileD)." ";
              $run2 = $this->db->query($sqlInsert);
            }
          }



      $url = base_url('');

      $response['message'] = 'Product Updated Successfully.';
        $response['url'] = $url.'my-product-listing';
      $_SESSION['success'] = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> ' .$response['message'] .'</div>';
      $response['status'] = 1;
    }else{
      $response['message'] = 'Please try again later.';
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' .$response['message'] .'</div>';
    }
  }else{
    $response['message'] = 'Record not found.';
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' .$response['message'] .'</div>';
  }
  echo json_encode($response);
}

  }


  public function deleteproduct(){

      $id=$_REQUEST['id']; 
      $run = $this->common_model->DeleteData('product',array('id'=>$id));
      if($run){

        $run3 = $this->common_model->DeleteData('product_gallery_image',array('product_id'=>$id));
        

        
      } else {
      }
  
  }
  
    public function deletefavproduct()
    {
          $id=$_REQUEST['id']; 
          $run = $this->common_model->DeleteData('fav_device_list',array('id'=>$id));
            if($run)
           {
            }
            else
            {
            }
  
  }



public function getprocess(){
    $process = $this->input->post('process'); 
    $seachprocess = '%'.$process.'%';

    if(!$process){
     }else{
$process_1 = $this->db->query('SELECT * FROM `product` WHERE device_model LIKE '.$this->db->escape($seachprocess).' OR device_brand LIKE '.$this->db->escape($seachprocess).' GROUP BY device_model')->result_array();



    }

    foreach($process_1 as $process_sugg){ ?>
    <li data-value="<?php echo $process_sugg['id'];?>" ><?php echo $process_sugg['device_model'];?></li>
    <?php    }
  }

  public function device_model(){

    $device_model = $this->input->post('device_model'); 
    $device_model_1 = '%'.$device_model.'%';

    if(!$device_model){
     }else{
$device_model_2 = $this->common_model->GetAllData('product',array('device_model LIKE '=>$device_model_1),'device_model','asc','','','','device_model');
    }
    
    $c=1;
    foreach($device_model_2 as $device_model_3){ ?>
    <li tabindex="<?php echo $c; ?>" data-value="<?php echo $device_model_3['device_model'];?>" ><?php echo $device_model_3['device_model'];?></li>
    <?php $c++;   }

  }

  public function latest_firmware_version(){

    $latest_firmware_version = $this->input->post('latest_firmware_version'); 
    $latest_firmware_version_1 = '%'.$latest_firmware_version.'%';

    if(!$latest_firmware_version){
     }else{
$latest_firmware_version_2 = $this->common_model->GetAllData('product',array('latest_firmware_version LIKE '=>$latest_firmware_version_1),'latest_firmware_version','asc','','','','latest_firmware_version');
    }

    foreach($latest_firmware_version_2 as $latest_firmware_version_3){ ?>
    <li data-value="<?php echo $latest_firmware_version_3['latest_firmware_version'];?>" ><?php echo $latest_firmware_version_3['latest_firmware_version'];?></li>
    <?php    }

  }


  public function mechanical_demension_mounting(){

    $mechanical_demension_mounting = $this->input->post('mechanical_demension_mounting'); 
    $mechanical_demension_mounting_1 = '%'.$mechanical_demension_mounting.'%';

    if(!$mechanical_demension_mounting){
     }else{
$mechanical_demension_mounting_2 = $this->common_model->GetAllData('product',array('mechanical_demension_mounting LIKE '=>$mechanical_demension_mounting_1),'mechanical_demension_mounting','asc','','','','mechanical_demension_mounting');
    }

    foreach($mechanical_demension_mounting_2 as $mechanical_demension_mounting_3){ ?>
    <li data-value="<?php echo $mechanical_demension_mounting_3['mechanical_demension_mounting'];?>" ><?php echo $mechanical_demension_mounting_3['mechanical_demension_mounting'];?></li>
    <?php    }

  }

  public function device_brand(){

    $device_brand = $this->input->post('device_brand'); 
    $device_brand_1 = '%'.$device_brand.'%';

    if(!$device_brand){
     }else{
$device_brand_2 = $this->common_model->GetAllData('product',array('device_brand LIKE '=>$device_brand_1),'device_brand','asc','','','','device_brand');
    }
    
    $a=1;
    foreach($device_brand_2 as $device_brand_3){ ?>
    <li tabindex="<?php echo $a; ?>" data-value="<?php echo $device_brand_3['device_brand'];?>" ><?php echo $device_brand_3['device_brand'];?></li>
    <?php  $a++;  }

  }



  public function process(){

    $process = $this->input->post('process'); 
    $process_1 = '%'.$process.'%';

    if(!$process){
     }else{
$process_2 = $this->common_model->GetAllData('product',array('process LIKE '=>$process_1),'process','asc','','','','process');
    }

    foreach($process_2 as $process_3){ ?>
    <li data-value="<?php echo $process_3['process'];?>" ><?php echo $process_3['process'];?></li>
    <?php    }

  }


  public function process_stand(){

    $process_stand = $this->input->post('process_stand'); 
    $process_stand_1 = '%'.$process_stand.'%';

    if(!$process_stand){
     }else{
$process_stand_2 = $this->common_model->GetAllData('product',array('process_stand LIKE '=>$process_stand_1),'process_stand','asc','','','','process_stand');
    }

    foreach($process_stand_2 as $process_stand_3){ ?>
    <li data-value="<?php echo $process_stand_3['process_stand'];?>" ><?php echo $process_stand_3['process_stand'];?></li>
    <?php    }

  }



  public function get_cat_b(){
    $cat_a = $this->input->post('cat_a');
    $results = $this->db->query("SELECT DISTINCT Cat_B_ID, Cat_B FROM category WHERE Cat_A = ? ORDER BY Cat_B_ID ASC", array($cat_a))->result_array();
    echo json_encode($results);
}

public function get_cat_c(){
    $cat_b = $this->input->post('cat_b');
    $cat_a = $this->input->post('cat_a');
    $results = $this->db->query("SELECT DISTINCT Cat_C_ID, Cat_C FROM category WHERE Cat_B = ? AND Cat_A = ? ORDER BY Cat_C_ID ASC", array($cat_b, $cat_a))->result_array();
    echo json_encode($results);
}

// Phase 3: flexible category attributes - returns the admin-defined
// extra spec fields for a given Cat_C sub-category, if any exist.
public function get_category_attributes(){
    $cat_c = $this->input->post('cat_c');
    $results = $this->db->query("SELECT id, attribute_name, field_type FROM category_attributes WHERE cat_c = ? ORDER BY display_order ASC", array($cat_c))->result_array();
    echo json_encode($results);
}

  public function devicefilter()
  {
    
    $data['input_name_set'] = $_REQUEST['input_name'];
    $data['input_stand_set'] = $_REQUEST['input_stand'];
    $data['input_conn_set'] = $_REQUEST['input_conn'];
    $data['out_conn_set'] = $_REQUEST['out_conn'];
    $data['out_process_stand_set'] = $_REQUEST['out_process_stand'];
    $data['out_process_connection_set'] = $_REQUEST['out_process_connection'];
    $data['process_set'] = $_REQUEST['process'];
    $data['process_stand_set'] = $_REQUEST['process_stand'];
    

    $device_name = $this->input->post('device_name'); 
    // status 1 = active, 2 = expired. Expired listings still appear in
    // search (masked in the view) rather than disappearing entirely - only
    // fully removed/rejected listings (any other status) are excluded here.
    $where =  " where product.status in (1,2) ";
    
    $whereorder ='ORDER by product.device_model ASC';
    //keyword///
    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!='' ){
      $kw = $this->db->escape_like_str($_REQUEST['keyword']);
      $where.=" and (
        product.device_model LIKE '".$kw."%' OR product.device_model LIKE '%".$kw."' OR product.device_model LIKE '%".$kw."%'
        OR product.device_brand LIKE '".$kw."%' OR product.device_brand LIKE '%".$kw."' OR product.device_brand LIKE '%".$kw."%'
      )  ";

          $whereorder ='ORDER by product.device_model DESC';

    }

      $where1='';
      $where2='';
      $where3='';
      
if($_REQUEST['input_name']){
    $input_name_where='';
        $str_input_name =$_REQUEST['input_name'];
        
        $i=1;
        foreach($str_input_name as $row){

            $input_name_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.input_conn) ";
            if(count($str_input_name)>1 && $i<count($str_input_name)){
            $input_name_where.=" or ";
            }
            
            $i++;
            }
            $where1.=" ".$input_name_where." ";
        
}

if($_REQUEST['input_stand']){
$input_stand_where='';

        $str_input_stand =$_REQUEST['input_stand'];
        
        $i=1;
        foreach($str_input_stand as $row){

            $input_stand_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.input_process_stand) ";
            if(count($str_input_stand)>1 && $i<count($str_input_stand)){
            $input_stand_where.=' or';
            }
            
            $i++;
            } 
            if(!empty($_REQUEST['input_name'])){
              $where1.=" or ".$input_stand_where."  ";
            }
            else {
              $where1.=" ".$input_stand_where."  ";
            }
            
        

}

if($_REQUEST['input_conn']){
    $input_conn_where='';

        $str_input_conn =$_REQUEST['input_conn'];
        
        $i=1;
        foreach($str_input_conn as $row){

            $input_conn_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.process_connection) ";
            if(count($str_input_conn)>1 && $i<count($str_input_conn)){
            $input_conn_where.=' or';
            }
            
            $i++;
            }
            if(!empty($_REQUEST['input_name']) || !empty($_REQUEST['input_stand'])){
              $where1.=" or ".$input_conn_where."  ";
            }
            else {
              $where1.=" ".$input_conn_where."  ";
            }
        
        
        
}

if($_REQUEST['input_conn'] || $_REQUEST['input_stand'] ||$_REQUEST['input_name']){

$where.=" and ($where1) ";
$whereorder ='ORDER by product.device_model DESC';

}

if($_REQUEST['out_conn']){
    $out_conn_where='';
        $str_out_conn =$_REQUEST['out_conn'];
        
        $j=1;
        foreach($str_out_conn as $row){

            $out_conn_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.out_conn) ";
            if(count($str_out_conn)>1 && $j<count($str_out_conn)){
            $out_conn_where.=' or';
            }
            
            $j++;
            }
            $where2 .=$out_conn_where;
        
}

if($_REQUEST['out_process_stand']){
$out_process_stand_where='';

        $str_out_process_stand =$_REQUEST['out_process_stand'];
        
        $i=1;
        foreach($str_out_process_stand as $row){

            $out_process_stand_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.out_process_stand) ";
            if(count($str_out_process_stand)>1 && $i<count($str_out_process_stand)){
            $out_process_stand_where.=' or';
            }
            
            $i++;
            }
            if(!empty($_REQUEST['out_conn'])){
              $where2.=" or ".$out_process_stand_where."  ";
            }
            else {
              $where2.=" ".$out_process_stand_where."  ";
            }

}

if($_REQUEST['out_process_connection']){
    $out_process_connection_where='';

        $str_out_process_connection =$_REQUEST['out_process_connection'];
        
        $i=1;
        foreach($str_out_process_connection as $row){

            $out_process_connection_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.out_process_connection) ";
            if(count($str_out_process_connection)>1 && $i<count($str_out_process_connection)){
            $out_process_connection_where.=' or';
            }
            
            $i++;
            }
            if(!empty($_REQUEST['out_conn']) || !empty($_REQUEST['out_process_stand'])){
              $where2.=" or ".$out_process_connection_where."  ";
            }
            else {
              $where2.=" ".$out_process_connection_where."  ";
            }
        
}
if($_REQUEST['out_conn'] || $_REQUEST['out_process_stand'] || $_REQUEST['out_process_connection']){

$where.=" and ($where2) ";
$whereorder ='ORDER by product.device_model DESC';
}

if($_REQUEST['process']){
    $process_where='';
        $str_process =$_REQUEST['process'];
        
        $i=1;
        foreach($str_process as $row){

            $process_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.process) ";
            if(count($str_process)>1 && $i<count($str_process)){
            $process_where.=' or';
            }
            
            $i++;
            }
        $where3 .=$process_where;
        
}

if($_REQUEST['process_stand']){
$process_stand_where='';

        $str_process_stand =$_REQUEST['process_stand'];
        
        $i=1;
        foreach($str_process_stand as $row){

            $process_stand_where.=" FIND_IN_SET(".$this->db->escape($row).",input_output.process_stand) ";
            if(count($str_process_stand)>1 && $i<count($str_process_stand)){
            $process_stand_where.=' or';
            }
            
            $i++;
            }
            if(!empty($_REQUEST['process'])){
              $where3.=" or ".$process_stand_where."  ";
            }
            else {
              $where3.=" ".$process_stand_where."  ";
            }

}


if($_REQUEST['process'] || $_REQUEST['process_stand']){

$where.=" and (".$where3.")";
$whereorder ='ORDER by product.device_model DESC';
}

if(isset($_REQUEST['product_type']) && !empty($_REQUEST['product_type'])){
    $product_type_where = '';
    $str_product_type = $_REQUEST['product_type'];
    $i = 1;
    foreach($str_product_type as $row){
        $product_type_where .= " product.product_type = ".$this->db->escape($row)." ";
        if(count($str_product_type) > 1 && $i < count($str_product_type)){
            $product_type_where .= ' or';
        }
        $i++;
    }
    $where .= " and (".$product_type_where.")";
    $whereorder = 'ORDER by product.device_model DESC';
}

// Category filter
if(!empty($_REQUEST['main_cat']) || !empty($_REQUEST['sub1_cat']) || !empty($_REQUEST['sub2_cat'])){
    $cat_where = '';
    if(!empty($_REQUEST['main_cat'])){
        $cat_where .= " AND (";
        $cat_parts = [];
        foreach($_REQUEST['main_cat'] as $cat){
            $cat_parts[] = "FIND_IN_SET(".$this->db->escape($cat).",product_category.cat_a)";
        }
        $cat_where .= implode(' OR ', $cat_parts) . ")";
    }
    if(!empty($_REQUEST['sub1_cat'])){
        $cat_where .= " AND (";
        $cat_parts = [];
        foreach($_REQUEST['sub1_cat'] as $cat){
            $cat_parts[] = "FIND_IN_SET(".$this->db->escape($cat).",product_category.cat_b)";
        }
        $cat_where .= implode(' OR ', $cat_parts) . ")";
    }
    if(!empty($_REQUEST['sub2_cat'])){
        $cat_where .= " AND (";
        $cat_parts = [];
        foreach($_REQUEST['sub2_cat'] as $cat){
            $cat_parts[] = "FIND_IN_SET(".$this->db->escape($cat).",product_category.cat_c)";
        }
        $cat_where .= implode(' OR ', $cat_parts) . ")";
    }
    $where .= $cat_where;
}

if(isset($_REQUEST['sortby']) && $_REQUEST['sortby']==1){
    $where.='ORDER by product.id DESC';
  }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby']==2){
     $where.='ORDER by date(product.date_released) desc';
  }else{
       $where.=$whereorder;
  }
  
  $perpage   = 10;
  if(isset($_REQUEST['perpage']) && !empty($_REQUEST['perpage'])){

    $perpage = $_REQUEST['perpage'];

   }
        $this->load->library("pagination");
        $data['nav_class']='trasnparent';
        $config = array();
        $config["base_url"] = base_url()."search-listing";       
        $config["total_rows"] = count($this->db->query('SELECT DISTINCT product.id , product.* FROM `product` left JOIN `input_output` ON `product`.`id`= `input_output`.`product_id` LEFT JOIN `product_category` ON `product`.`id`= `product_category`.`product_id`' .$where)->result_array());
        $config["per_page"] = $perpage;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['productlist'] = $this->db->query('SELECT DISTINCT product.id , product.* FROM `product` left JOIN `input_output` ON `product`.`id`= `input_output`.`product_id` LEFT JOIN `product_category` ON `product`.`id`= `product_category`.`product_id`' .$where.' Limit '.$page.','.$config["per_page"])->result_array();
 
  $this->load->view('site/filterdevicesearchAjax',$data);
  } 






            public function inputSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('input_conn LIKE '=>$searchInp),'input_conn','asc','','','','input_conn'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['input_conn']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
     $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
	
 public function inputProcessSatndardSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('input_process_stand LIKE '=>$searchInp),'input_process_stand','asc','','','','input_process_stand'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['input_process_stand']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
       $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
            
            public function inputconnectionTypeSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('process_connection LIKE '=>$searchInp),'process_connection','asc','','','','process_connection');
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process_connection']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
       $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
            
            
            
//output

public function outputSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('out_conn LIKE '=>$searchInp),'out_conn','asc','','','','out_conn');
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_conn']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
	
 public function outputProcessSatndardSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('out_process_stand LIKE '=>$searchInp),'out_process_stand','asc','','','','out_process_stand'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_process_stand']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
            
            public function outputconnectionTypeSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('out_process_connection LIKE '=>$searchInp),'out_process_connection','asc','','','','out_process_connection'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_process_connection']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
        $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
            


//process 



public function processsuggestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('product',array('process LIKE '=>$searchInp),'process','asc','','','','process'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
       $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
            
            public function processStandardsuggestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('product',array('process_stand LIKE '=>$searchInp),'process_stand','asc','','','','process_stand');  
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process_stand']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
       $data1=array_values(array_unique($data));
        echo json_encode($data1);

            }
            
    
    function get_month_expiry()
    {
		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM product WHERE monthly_mail = 0 AND product.expiry_date >= DATE(now()) AND product.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 2 MONTH) And status = 1 ");
		
		if($query->num_rows()>0){

			 $get_user = $query->result_array();
			 if(!empty($get_user)){
			     
			 foreach($get_user as $row){
			    
			 echo   $product_id = $row['id'];
				$user_id = $row['user_id']; 
               $query2 = $this->db->query("SELECT * FROM users WHERE user_id = ".$this->db->escape($user_id)." and status = 1 ")->row_array();
                if($query2){
                $email = $query2["email"];
                $subject="Your Product Expire in Two Month";

				$body = '<p>Hello '.$query2["fname"].'</p>
				<p>Please be informed that your listing will expire in <b>'.$row["expiry_date"].'</b> and the device will become inactive and no longer available for search.</p><br>
				<p>';

				$body .='To avoid losing a listing please renew registration via: <b>Items Management/My List/Renew</b>.';

				$send = $this->common_model->SendMail($email,$subject,$body);
				if($send){
				    $update['monthly_mail'] = 1;
				    $this->common_model->UpdateData('product',array('id'=>$product_id),$update);
				}
			}
		} 
			 }
			
		}

    $this->get_week_expiry();
    $this->get_day_expiry();
    $this->expired_product();
    }
    
    function get_week_expiry()
    {

		$query = $this->db->query("SELECT * FROM product WHERE weekly_mail = 0 And product.expiry_date >= DATE(now()) AND product.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 1 WEEk) And status = 1 ");
		
		if($query->num_rows()>0){

			 $get_user = $query->result_array();
			 if(!empty($get_user)){
			     
			    foreach($get_user as $row){
			        
			    $product_id = $row['id'];
				$user_id = $row['user_id'];
                $query2 = $this->db->query("SELECT * FROM users WHERE user_id = ".$this->db->escape($user_id)." and status = 1 ")->row_array();
                $email = $query2["email"];

                $subject="Your Product Expire in One Week";

				$body = '<p>Hello '.$query2["fname"].'</p>
				<p>Please be informed that your listing will expire in <b>'.$row["expiry_date"].'</b> and the device will become inactive and no longer available for search.</p><br>
				<p>';

				$body .='To avoid losing a listing please renew registration via: <b>Items Management/My List/Renew</b>.';

				$send = $this->common_model->SendMail($email,$subject,$body);
				if($send){
				    $update['weekly_mail'] = 1;
				    $this->common_model->UpdateData('product',array('id'=>$product_id),$update);
				}
			}
			 
			 }
			
		}
    }
    
    function get_day_expiry()
    {
		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM product WHERE daily_mail = 0 AND product.expiry_date >= DATE(now()) AND product.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 1 DAY) And status = 1 ");
		
		if($query->num_rows()>0){

			 $get_user = $query->result_array();
			 if(!empty($get_user)){
			     
			 foreach($get_user as $row){
			         
			    $product_id = $row['id'];    
				$user_id = $row['user_id'];
                $query2 = $this->db->query("SELECT * FROM users WHERE user_id = ".$this->db->escape($user_id)." and status = 1 ")->row_array();
                $email = $query2["email"];
                $subject="Your Product Expire in One Day";

				$body = '<p>Hello '.$query2["fname"].'</p>
				<p>Please be informed that your listing will expire in <b>'.$row["expiry_date"].'</b> and the device will become inactive and no longer available for search.</p><br>
				<p>';

				$body .='To avoid losing a listing please renew registration via: <b>Items Management/My List/Renew</b>.';

				$send = $this->common_model->SendMail($email,$subject,$body);
				if($send){
				    $update['daily_mail'] = 1;
				    $this->common_model->UpdateData('product',array('id'=>$product_id),$update);
				}
			}
			 
			 }
			
		}
    }
    
    function expired_product()
    {
        $query2 = $this->db->query("SELECT * FROM product WHERE  status = 1 ")->result_array();
        if($query2){
            
            foreach($query2 as $row){


              $expiry_date=$row['expiry_date'];
              $currentDate=date('Y-m-d');
              if($currentDate>=$expiry_date){
              $product_id = $row['id'];
              $update['status'] = 2;
			        $this->common_model->UpdateData('product',array('id'=>$product_id),$update);
        }  
                
                
            }
        }
    }
    function renew_product_action()
    {

            $product_id=$_REQUEST['pID'];
            $update['status'] = 1;
            $update['daily_mail'] = 0;
            $update['weekly_mail'] = 0;
            $update['monthly_mail'] = 0;
            // approve_date is intentionally left untouched here - it stays
            // as the original listing date, so the 14-day cooling-off
            // window (calculated from this field) doesn't restart on
            // relist/renewal. The vendor already had their cooling-off
            // chance the first time; there's no new "buyer's remorse" risk
            // on a listing they've already had before.
            $update['expiry_date'] = '';
            // Save the NEW charge from this relist/renewal payment. Without
            // this, cancelling later would try to refund the old, original
            // charge again - which Stripe correctly rejects since it was
            // already refunded the first time this listing was cancelled.
            if(!empty($_REQUEST['paymentIntent_id'])){
                $update['paymentIntent_id'] = $_REQUEST['paymentIntent_id'];
            }
            $update= $this->common_model->UpdateData('product',array('id'=>$product_id),$update);

        if($update){
 		$response['url'] = base_url().'my-product-listing';
      	$response['message'] = 'The payment was successful, your product is now relisted!';


      
      $_SESSION['success'] = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> ' .$response['message'] .'</div>';
      $response['status'] = 1;
    }else{
      $response['message'] = 'Please try again later.';
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' .$response['message'] .'</div>';
    }
  
  echo json_encode($response);
  }
  
  
    // Called via AJAX as the person fills the review form, so they see
    // the duplicate-email message immediately rather than only after
    // submitting and being redirected back.
    public function check_review_email(){
        $email = $this->input->post('email');
        $device_id = $this->input->post('device_id');

        if(empty($email) || empty($device_id)){
            echo json_encode(array('duplicate' => false));
            return;
        }

        $existing_review = $this->common_model->GetSingleData('review',array('email'=>$email,'device_id'=>$device_id));

        if($existing_review){
            echo json_encode(array('duplicate' => true));
        } else {
            echo json_encode(array('duplicate' => false));
        }
    }

    public function add_review(){
	    
		$this->form_validation->set_rules('email','email','required|valid_email');
        $this->form_validation->set_rules('rating','Rating','trim|required');
        $this->form_validation->set_rules('name','Name','trim|strip_tags');
        $this->form_validation->set_rules('message','Message','trim|strip_tags');
       
       	if($this->form_validation->run()==true)
    	{
    	    
		$user_id = $this->session->userdata('user_id');
        $id = $this->uri->segment(3);

        $existing_review = $this->common_model->GetSingleData('review',array('email'=>$this->input->post('email'),'device_id'=>$id));
        if($existing_review){
            $this->session->set_flashdata('msg','<div class="alert alert-danger">A review for this product has been submitted from this email address.</div>');
            redirect('details/'.$this->uri->segment(3));
            return;
        }
        
        if(!empty($this->input->post('name')))
    	$insert['name'] = $this->input->post('name');
    	
		$insert['email'] = $this->input->post('email');
		 if(!empty($this->input->post('name')))
		$insert['message'] = $this->input->post('message');
		
		
		$insert['rating'] = $this->input->post('rating');
        $insert['device_id'] = $this->uri->segment(3);
		$insert['user_id'] = $user_id;
		$insert['status'] = 0;
        $insert['created_at'] = date('Y-m-d H:i:s');
            
        $run = $this->common_model->InsertData('review',$insert);
		if($run){
			 $this->session->set_flashdata('msg','<div class="alert alert-success">Thanks for sharing your opinion with us! Your review will be shown after admin approval.</div>');
			 redirect('details/'.$this->uri->segment(3));
			 }
			 else {
         	 $this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.</div>');
			 redirect('details/'.$this->uri->segment(3));
		  }
		}
		else {
		 $this->session->set_flashdata('msg','<div class="alert alert-danger">Fill all required field.Please try again</div>');	
		redirect('details/'.$this->uri->segment(3));
		}
      }
  

  // ── AI AUTO-FILL: extracts product info from a URL and/or PDF ──
  // Nothing gets saved here - this only returns suggested field values
  // for the vendor to review/edit before they hit the real Submit button.
  public function ai_extract(){

    if(!$this->session->userdata('user_id')){
        echo json_encode(array('status' => 0, 'message' => 'Please log in first.'));
        return;
    }

    $source_url = trim($this->input->post('source_url'));
    $content_blocks = array();
    $has_source = false;

    // If a URL was given, fetch it server-side and strip to plain text
    if(!empty($source_url)){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $source_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        // NOTE: SSL verification disabled because this local XAMPP install
        // doesn't have a configured CA certificate bundle, causing every
        // HTTPS fetch to fail with "unable to get local issuer certificate".
        // This is fine for local development (fetching public product pages,
        // no sensitive data involved) but should be re-enabled - with a
        // proper cacert.pem configured in php.ini - before this ever runs
        // on a production server.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'Accept-Language: en-US,en;q=0.9',
        ));
        $html = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if($html === false || $html === ''){
            echo json_encode(array('status' => 0, 'message' => 'Could not fetch that URL. '.$curl_error));
            return;
        }

        if($http_status >= 400){
            echo json_encode(array('status' => 0, 'message' => 'That site blocked automatic access (HTTP '.$http_status.'). This happens with some manufacturer sites that have bot protection. Please try uploading a PDF brochure/datasheet instead.'));
            return;
        }

        // The "URL" sometimes points directly at a PDF file (not a webpage) -
        // detect that via Content-Type (or a .pdf extension as a fallback) and
        // send it to Claude as a proper document, not HTML text to strip.
        $is_pdf = (stripos($content_type, 'application/pdf') !== false) || (stripos($source_url, '.pdf') !== false);

        if($is_pdf){
            $pdf_base64 = base64_encode($html);
            $content_blocks[] = array(
                'type' => 'document',
                'source' => array(
                    'type' => 'base64',
                    'media_type' => 'application/pdf',
                    'data' => $pdf_base64,
                )
            );
            $has_source = true;
        } else {

        // Remove script/style, then use DOMDocument to strip out nav/header/footer
        // boilerplate (common source of noise that was drowning out real content)
        // and prefer <main>/<article> if the page has one.
        $html = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $html);
        $html = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $html);

        $text = '';
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        if($dom->loadHTML('<?xml encoding="utf-8" ?>' . $html)){
            $xpath = new DOMXPath($dom);
            // strip out nav/header/footer/aside noise entirely
            foreach(array('nav','header','footer','aside') as $tag){
                $nodes = $dom->getElementsByTagName($tag);
                for($i = $nodes->length - 1; $i >= 0; $i--){
                    $node = $nodes->item($i);
                    if($node->parentNode) $node->parentNode->removeChild($node);
                }
            }
            // prefer <main> or <article> content if present
            $main = $dom->getElementsByTagName('main');
            if($main->length > 0){
                $text = $main->item(0)->textContent;
            } else {
                $article = $dom->getElementsByTagName('article');
                if($article->length > 0){
                    $text = $article->item(0)->textContent;
                } else {
                    $body = $dom->getElementsByTagName('body');
                    if($body->length > 0){
                        $text = $body->item(0)->textContent;
                    }
                }
            }
        }
        libxml_clear_errors();

        if(empty($text)){
            // fallback: plain strip_tags on the whole page
            $text = html_entity_decode(strip_tags($html), ENT_QUOTES, 'UTF-8');
        }

        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        // cap length to keep token cost sane (raised from 15k - nav removal
        // means more of this is now real content)
        $text = substr($text, 0, 40000);

        if(strlen($text) < 50){
            echo json_encode(array('status' => 0, 'message' => 'That page did not have enough readable text to extract from.'));
            return;
        }

        $content_blocks[] = array('type' => 'text', 'text' => "Content from product page (".$source_url."):\n\n".$text);
        $has_source = true;
        } // end else (not a direct PDF URL)
    }

    // If a PDF was uploaded, send it directly to Claude - it reads PDFs natively
    if(!empty($_FILES['source_pdf']['tmp_name']) && $_FILES['source_pdf']['error'] == 0){
        $pdf_data = file_get_contents($_FILES['source_pdf']['tmp_name']);
        $pdf_base64 = base64_encode($pdf_data);
        $content_blocks[] = array(
            'type' => 'document',
            'source' => array(
                'type' => 'base64',
                'media_type' => 'application/pdf',
                'data' => $pdf_base64,
            )
        );
        $has_source = true;
    }

    if(!$has_source){
        echo json_encode(array('status' => 0, 'message' => 'Please provide a URL or upload a PDF.'));
        return;
    }

    $content_blocks[] = array(
        'type' => 'text',
        'text' => 'IMPORTANT FIRST CHECK: does the content above describe ONE specific product in detail, or does it list/mention MULTIPLE different products (a catalog page, category listing, "shop all" page, or search results)? If it lists multiple distinct products rather than describing one in depth, respond with EXACTLY this and nothing else: {"error": "multiple_products"}

Otherwise, extract broadcast/media industry product information from the above. This may be physical hardware, software, a cloud/SaaS service, or a hybrid product - it does NOT need to be physical equipment. Return ONLY a valid JSON object (no markdown fencing, no explanation) with exactly these keys - use an empty string "" for anything not found:
{
  "product_type": "",
  "main_category": "",
  "device_model": "",
  "device_brand": "",
  "mechanical_demension_mounting": "",
  "rack_unit": "",
  "order_code": "",
  "short_description": "",
  "dealer_notes": "",
  "warranty_detail": "",
  "support_detail": "",
  "input_type": "",
  "input_standard": "",
  "input_connection_type": "",
  "output_type": "",
  "output_standard": "",
  "output_connection_type": "",
  "process_type": "",
  "process_standard": "",
  "features": ""
}
Field meanings (apply to ANY product type - hardware, software, or cloud service):
- For any field that can hold multiple comma-separated values (input_type, input_standard, input_connection_type, output_type, output_standard, output_connection_type, process_type, process_standard, features): never repeat the same value twice within that field, even if the source page mentions it more than once. Each distinct value should appear only once.
- product_type: must be EXACTLY one of these 5 values (no others): "Hardware", "Software", "Cloud Service", "AI Tool", "Hybrid". Choose "Hardware" for physical equipment, "Software" for installed applications, "Cloud Service" for browser-based/SaaS platforms, "AI Tool" if AI/ML is the core feature, "Hybrid" if it combines physical hardware with software/cloud components. If genuinely unclear, use "Hardware" as the default.
- main_category: must be EXACTLY one of these 8 values (no others), or empty string "" if genuinely none fit: "Connect" (routing, switching, transport, transmission), "Consume" (playback, viewing, streaming to end users), "Create" (cameras, production, editing, graphics), "Manage" (asset management, workflow, MAM/traffic systems), "Monetize" (ad insertion, monetization, analytics), "Publish" (playout, distribution, CDN delivery), "Support" (monitoring, testing, support tools), "Store" (storage, archive, backup). Pick the single best fit based on what the product is mainly used for.
- device_model: the product or service name itself (e.g. "Streamcake", "AMPP Edge Live", "EDIUS 11") - always fill this in if a clear product name is mentioned, even for software/cloud products.
- device_brand: the company or vendor name behind the product (e.g. "Layercake", "Grass Valley") - always fill this in if the company name is findable, even for software/cloud products.
- mechanical_demension_mounting and rack_unit: ONLY applicable to physical hardware - leave empty for pure software/cloud products.
- rack_unit should be a plain number like "1" or "2" if a rack unit height is mentioned, otherwise empty string.
- dealer_notes should be a short product description/summary in your own words, not copied verbatim.
- short_description: a single, concise one-line summary of the product (max ~120 characters) - shorter and punchier than dealer_notes, suitable for display in a list view.
- input_type / output_type: the BROAD signal category only. In almost all cases this should be one of: "Audio", "Video", or "Data/Control" (Data/Control covers things like SCTE-35 triggers/cues, GPI/GPIO, tally, timecode, genlock - control and metadata signals that are not audio or video content themselves). Do NOT put a specific named standard here (e.g. do not put "SDI" or "AES67" here - those belong in the standard field below).
- input_standard / output_standard: the SPECIFIC, NAMED technical standard or protocol that carries that signal - e.g. for Audio: AES67, Dante, MADI. For Video: SDI, ST2110, NDI. For Data/Control: SCTE-35, GPI/GPIO, LTC, genlock. Use this test: if the term references one specific, official technical spec (something with a governing body, version number, or formal definition), it belongs here, not in type.
- input_connection_type / output_connection_type: ONLY the physical connector itself (hardware only) - e.g. BNC, RJ45, XLR. Leave empty for software/cloud products, since there is no physical connector.
- process_type: the function or action being performed - what the product actually DOES with the signal or data as it passes through. Examples: Switching, Encoding, Mixing, Multiplexing, Graphics insertion, Playback control. This is open-ended (not restricted to a short fixed list like the input/output types above), since what a product does varies widely by category.
- process_standard: the specific named technology, codec, or protocol that enables that function. Examples: for Encoding - H.264, HEVC, AV1. For an integration or control-type process - REST API, gRPC, ONVIF. Use the same test as input/output standard: does this reference one specific, official named technology, rather than a generic description of the action itself.
- features: high-level capabilities/benefits that are NOT about signal flow at all - this is a separate concept from input/output/process. Examples: "High availability", "Auto-scaling", "REST API integration", "Multi-tenant support", "Automatic failover", "Remote monitoring". The test: if a term describes how signal enters or leaves the device, it is input/output. If it describes what the device does to that signal, it is process. If it is a broader capability that exists independent of any specific signal, it is a feature. This applies to ANY product type, including hardware, whenever the source genuinely lists capability-style features distinct from its technical specifications (e.g. a hardware product with an explicit "Features" or "Benefits" section on its page). Leave empty if the source only has raw specs with nothing capability-level to extract, or if this field would just duplicate what belongs in process_type/process_standard.'
    );

    $api_key = $this->config->item('anthropic_api_key');
    if(empty($api_key)){
        echo json_encode(array('status' => 0, 'message' => 'AI extraction is not configured yet (missing API key).'));
        return;
    }

    $payload = array(
        'model' => 'claude-haiku-4-5-20251001',
        'max_tokens' => 4096,
        'messages' => array(
            array('role' => 'user', 'content' => $content_blocks)
        )
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.anthropic.com/v1/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    // Same local-XAMPP CA bundle issue as the page-fetch call above.
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: '.$api_key,
        'anthropic-version: 2023-06-01',
        'content-type: application/json',
    ));
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close($ch);

    if($response === false){
        echo json_encode(array('status' => 0, 'message' => 'Could not reach the AI service. '.$curl_error));
        return;
    }

    $result = json_decode($response, true);

    if($http_code != 200){
        $err_msg = isset($result['error']['message']) ? $result['error']['message'] : 'Unknown error from AI service.';
        echo json_encode(array('status' => 0, 'message' => $err_msg));
        return;
    }

    $ai_text = '';
    if(!empty($result['content']) && is_array($result['content'])){
        foreach($result['content'] as $block){
            if($block['type'] == 'text'){
                $ai_text .= $block['text'];
            }
        }
    }

    // strip any accidental markdown fencing before decoding
    $ai_text = trim($ai_text);
    $ai_text = preg_replace('/^```json\s*/i', '', $ai_text);
    $ai_text = preg_replace('/^```\s*/', '', $ai_text);
    $ai_text = preg_replace('/```\s*$/', '', $ai_text);

    $extracted = json_decode($ai_text, true);

    if(!is_array($extracted)){
        // If the response was cut off for hitting max_tokens, say so
        // specifically - this is a genuinely different, actionable problem
        // (the source document was too detailed) rather than a generic
        // parse failure that gives no clue what actually went wrong.
        if(isset($result['stop_reason']) && $result['stop_reason'] == 'max_tokens'){
            echo json_encode(array('status' => 0, 'message' => 'The product information was too detailed to process in one go. Please try again, or fill the form manually.'));
        } else {
            echo json_encode(array('status' => 0, 'message' => 'AI response could not be understood. Please try again or fill the form manually.'));
        }
        return;
    }

    if(isset($extracted['error']) && $extracted['error'] === 'multiple_products'){
        echo json_encode(array('status' => 0, 'message' => 'This page lists multiple different products (a catalog or category page), not one specific product. Please find and paste the link for the individual product page instead.'));
        return;
    }

    echo json_encode(array('status' => 1, 'data' => $extracted));
  }

}


?>
