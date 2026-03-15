<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Product extends CI_Controller
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
		$data['productlist'] = $this->common_model->GetAllData('product','','id','desc');
		//echo $this->db->last_query();
		$this->load->view('admin/productlist',$data);
	}
	
	public function cancel_list(){
		$data['cancellist'] = $this->common_model->GetAllData('request','','id','desc');
		//echo $this->db->last_query();
		//$this->load->view('admin/productlist',$data);
	}
	

	public function add_product(){
    $data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
		$this->load->view('admin/add_product',$data);
	} 

    public function pending_product(){ 
        $data['pending_devices'] = $this->db->query("SELECT * FROM product WHERE status = 0 ORDER BY id DESC ")->result_array();
		$this->load->view('admin/pending_productlist',$data);
	}
	
	public function expire_product(){ 
        $data['expire_devices'] = $this->db->query("SELECT * FROM product WHERE product.expiry_date >= DATE(now()) AND product.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 2 MONTH) And status = 1 ORDER BY id DESC ")->result_array();
		$this->load->view('admin/expire_productlist',$data);
	}

  public function add_product_action(){

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'addNew'){
 
  $response['status'] = 0;
  
  $session_id = $this->session->userdata('user_id');


  //// Group 1: Device ////
  $device_model = htmlentities($_REQUEST['device_model'], ENT_QUOTES);
  $device_brand = htmlentities($_REQUEST['device_brand'], ENT_QUOTES);
  $latest_firmware_version = htmlentities($_REQUEST['latest_firmware_version'], ENT_QUOTES);
  $mechanical_demension_mounting = htmlentities($_REQUEST['mechanical_demension_mounting'], ENT_QUOTES);
  $order_code = htmlentities($_REQUEST['order_code'], ENT_QUOTES);
  $date_released = $_REQUEST['date_released'];
  $rack_unit = $_REQUEST['rack_unit'];
  $date = strtotime($date_released);
  $date_released = date('Y-m-d',$date);


  //// Group 2: IOP ////

  //$input_conn = count($_REQUEST['hidden-input_conn']);
  $input_conn = count($_REQUEST['input_conn']);

  $input_conn1 = $_REQUEST['input_conn'];
   $input_process_stand = $_REQUEST['input_process_stand'];
   $process_connection = $_REQUEST['process_connection'];
//print_r($input_conn1); die;

  //$out_conn = $_REQUEST['hidden-out_conn'];
  $out_conn = $_REQUEST['out_conn'];
  $out_process_stand = $_REQUEST['out_process_stand'];
  $out_process_connection = $_REQUEST['out_process_connection'];

  $process = $_REQUEST['process'];
  $process_stand = $_REQUEST['process_stand'];

  //// Group 3: Dealer //// 
  $dealer_web_cont = htmlentities($_REQUEST['dealer_web_cont'], ENT_QUOTES);
  $dealer_notes = htmlentities($_REQUEST['dealer_notes'], ENT_QUOTES);
  $warranty_detail = htmlentities($_REQUEST['warranty_detail'], ENT_QUOTES);
  $support_detail = htmlentities($_REQUEST['support_detail'], ENT_QUOTES);
  //$out_process_stand = htmlentities(implode(',',$_REQUEST['out_process_stand']), ENT_QUOTES);
 // $input_process_stand = htmlentities(implode(',',$_REQUEST['input_process_stand']), ENT_QUOTES);
 
  $dealer_contact = htmlentities($_REQUEST['dealer_contact'], ENT_QUOTES);
  $release_version = htmlentities($_REQUEST['release_version'], ENT_QUOTES);
  //$process_connection = htmlentities(implode(',',$_REQUEST['process_connection']), ENT_QUOTES);
  //$out_process_connection = htmlentities(implode(',',$_REQUEST['out_process_connection']), ENT_QUOTES);
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
        $sql = "INSERT INTO `product`(`user_id`, `device_model`,`device_brand`,`latest_firmware_version`,`device_manual_brochure`,`mechanical_demension_mounting`,`rack_unit`,`order_code`,`date_released`,`dealer_web_cont`,`dealer_notes`,`warranty_detail`,`support_detail`,`created_at`,`dealer_contact`,`release_version`)
      VALUES(
        '" .$session_id ."',
        '" .$device_model ."',
        '" .$device_brand ."',  
        '" .$latest_firmware_version ."',
        '" .$device_manual_brochure ."',
        '" .$mechanical_demension_mounting ."',
        '". $rack_unit."',
        '" .$order_code ."',
        '" .$date_released ."',
        '" .$dealer_web_cont ."',
        '" .$dealer_notes ."',
        '" .$warranty_detail ."',
        '" .$support_detail ."',
        '" .$cdate ."' ,
        '" .$dealer_contact ."' ,
        '" .$release_version ."' 
      )";   
  
    $run = $this->db->query($sql);

    $product_id=$this->db->insert_id();

    if($run){      

for($i=0; $i<$input_conn; $i++){
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
 $input_data = implode(',',$input_conn1[$i]);
$input_process_stand_data = implode(',',$input_process_stand[$i]);
$process_connection_data = implode(',',$process_connection[$i]);

$out_conn_data = implode(',',$out_conn[$i]);
$out_process_stand_data = implode(',',$out_process_stand[$i]);
$out_process_connection_data = implode(',',$out_process_connection[$i]);


$process_stand_data = implode(',',$process_stand[$i]);
$process_data = implode(',',$process[$i]);




$sqlInsert1="insert into input_output set product_id = '".$product_id."' , input_conn = '".$input_data."' , input_process_stand = '".$input_process_stand_data."' , process_connection = '".$process_connection_data."' , out_conn = '".$out_conn_data."' , out_process_stand = '".$out_process_stand_data."' , out_process_connection = '".$out_process_connection_data."' , process_stand = '".$process_stand_data."' , process = '".$process_data."' ";

                   $run21 = $this->db->query($sqlInsert1);
//echo $this->db->last_query(); die;
}

      if (isset($_FILES['gallery-image-orignal']['name'])) {
                 for ($i=0; $i < count($_FILES['gallery-image-orignal']['name']) ; $i++) { 
                   $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['gallery-image-orignal']['name'][$i], '.'), '.');
                   $target_file = "assets/product_image/" .$filename;
                   if(move_uploaded_file($_FILES["gallery-image-orignal"]["tmp_name"][$i], $target_file)){
                     $uploadImage = true;
                   }
                   $fileD = $filename;
                   $sqlInsert="insert into product_gallery_image set product_id= '".$product_id."',gallery_image = '".$fileD."' ";
                   $run2 = $this->db->query($sqlInsert);
                  }
   
               }   
       $where =" user_id='".$session_id."' ";
       $user_type = $this->common_model->UpdateData('users',$where,array('user_type'=>1));


      $response['message'] = 'Your Product amount will be paid successfully. And your product will be add successfully.';
       $response['url'] = base_url().'Admin/productlist';


      
      $_SESSION['success'] = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> ' .$response['message'] .'</div>';
      $response['status'] = 1;
    }else{
      $response['message'] = 'Please try again later.';
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' .$response['message'] .'</div>';
    }
  
  echo json_encode($response);
}

  } 


  public function add_product_action_old(){


if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'addNew'){
 
  $response['status'] = 0;
  
  //$session_id = $this->session->userdata('user_id');


  //// Group 1: Device ////
  $device_model = htmlentities($_REQUEST['device_model'], ENT_QUOTES);
  $device_brand = htmlentities($_REQUEST['device_brand'], ENT_QUOTES);
  $latest_firmware_version = htmlentities($_REQUEST['latest_firmware_version'], ENT_QUOTES);
  $mechanical_demension_mounting = htmlentities($_REQUEST['mechanical_demension_mounting'], ENT_QUOTES);
  $rack_unit = $_REQUEST['rack_unit'];
  $order_code = htmlentities($_REQUEST['order_code'], ENT_QUOTES);
  $date_released = $_REQUEST['date_released'];
  $date = strtotime($date_released);
  $date_released = date('Y-m-d',$date);


  //// Group 2: IOP ////

  $input_conn = count($_REQUEST['hidden-input_conn']);

  $input_conn1 = $_REQUEST['hidden-input_conn'];
  $input_process_stand = $_REQUEST['hidden-input_process_stand'];
  $process_connection = $_REQUEST['hidden-process_connection'];
//print_r($input_conn1); die;

  $out_conn = $_REQUEST['hidden-out_conn'];
  $out_process_stand = $_REQUEST['hidden-out_process_stand'];
  $out_process_connection = $_REQUEST['hidden-out_process_connection'];

  $process = $_REQUEST['hidden-process'];
  $process_stand = $_REQUEST['hidden-process_stand'];
  

  //// Group 3: Dealer //// 
  $dealer_web_cont = htmlentities($_REQUEST['dealer_web_cont'], ENT_QUOTES);
  $dealer_notes = htmlentities($_REQUEST['dealer_notes'], ENT_QUOTES);
  $warranty_detail = htmlentities($_REQUEST['warranty_detail'], ENT_QUOTES);
  $support_detail = htmlentities($_REQUEST['support_detail'], ENT_QUOTES);
  //$out_process_stand = htmlentities(implode(',',$_REQUEST['out_process_stand']), ENT_QUOTES);
 // $input_process_stand = htmlentities(implode(',',$_REQUEST['input_process_stand']), ENT_QUOTES);
  //$process = htmlentities(implode(',',$_REQUEST['process']), ENT_QUOTES);
  //$process_stand = htmlentities(implode(',',$_REQUEST['process_stand']), ENT_QUOTES);
  $dealer_contact = htmlentities($_REQUEST['dealer_contact'], ENT_QUOTES);
  $release_version = htmlentities($_REQUEST['release_version'], ENT_QUOTES);
  //$process_connection = htmlentities(implode(',',$_REQUEST['process_connection']), ENT_QUOTES);
  //$out_process_connection = htmlentities(implode(',',$_REQUEST['out_process_connection']), ENT_QUOTES);
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
        $sql = "INSERT INTO `product`(`device_model`,`device_brand`,`latest_firmware_version`,`device_manual_brochure`,`mechanical_demension_mounting`,`rack_unit`,`order_code`,`date_released`, `dealer_web_cont`,`dealer_notes`,`warranty_detail`,`support_detail`,`created_at`,`dealer_contact`,`release_version`)
      VALUES(
        '" .$device_model ."',
        '" .$device_brand ."',  
        '" .$latest_firmware_version ."',
        '" .$device_manual_brochure ."',
        '" .$mechanical_demension_mounting ."',
        '". $rack_unit."',
        '" .$order_code ."',
        '" .$date_released ."',
        '" .$dealer_web_cont ."',
        '" .$dealer_notes ."',
        '" .$warranty_detail ."',
        '" .$support_detail ."',
        '" .$cdate ."' ,
        '" .$dealer_contact ."' ,
        '" .$release_version ."' 
      )";   
  
    $run = $this->db->query($sql);

    $product_id=$this->db->insert_id();

    if($run){      

for($i=0; $i<$input_conn; $i++){

//print_r($input_conn[$i]);

$input_data = $input_conn1[$i];
$input_process_stand_data = $input_process_stand[$i];
$process_connection_data = $process_connection[$i];

$out_conn_data = $out_conn[$i];
$out_process_stand_data = $out_process_stand[$i];
$out_process_connection_data = $out_process_connection[$i];


$process_stand_data = $process_stand[$i];
$process_data = $process[$i];

 // $data = array(
 //     'input_output'=>$input_conn[$i],
 //      );

//print_r($data);

$sqlInsert1="insert into input_output set product_id = '".$product_id."' , input_conn = '".$input_data."' , input_process_stand = '".$input_process_stand_data."' , process_connection = '".$process_connection_data."' , out_conn = '".$out_conn_data."' , out_process_stand = '".$out_process_stand_data."' , out_process_connection = '".$out_process_connection_data."' ,process_stand = '".$process_stand_data."' , process = '".$process_data."' ";

                   $run21 = $this->db->query($sqlInsert1);
//echo $this->db->last_query(); die;
}

      if (isset($_FILES['gallery-image-orignal']['name'])) {
                 for ($i=0; $i < count($_FILES['gallery-image-orignal']['name']) ; $i++) { 
                   $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['gallery-image-orignal']['name'][$i], '.'), '.');
                   $target_file = "assets/product_image/" .$filename;
                   if(move_uploaded_file($_FILES["gallery-image-orignal"]["tmp_name"][$i], $target_file)){
                     $uploadImage = true;
                   }
                   $fileD = $filename;
                   $sqlInsert="insert into product_gallery_image set product_id= '".$product_id."',gallery_image = '".$fileD."' ";
                   $run2 = $this->db->query($sqlInsert);
                  }
   
               }   
       $where =" user_id='".$session_id."' ";
       $user_type = $this->common_model->UpdateData('users',$where,array('user_type'=>1));


      $response['message'] = 'Your Product amount will be paid successfully. And your product will be add successfully.';
       $response['url'] = 'Admin/productlist';


      
      $_SESSION['success'] = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> ' .$response['message'] .'</div>';
      $response['status'] = 1;
    }else{
      $response['message'] = 'Please try again later.';
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' .$response['message'] .'</div>';
    }
  
  echo json_encode($response);
}

  }

public function addanotherinput()
{

$classid=$_REQUEST['classid'];
$count=$_REQUEST['count'];
  ?>

   
<div class="row">

   <div class="col-md-3 set-44">

             <div class="form-group">
                <label>Input <?php echo $count; ?></label>
  <select id="" name="input_conn[<?php echo $classid;?>][]" class="typeahead inputF<?php echo $classid;?> tm-input form-control " multiple="multiple" style="width:300px" class="populate placeholder">
               <?php     

                $Input = $this->common_model->GetAllData('input_output','','input_conn','asc','','','','input_conn'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['input_conn']);
               
                foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
                 </select>                <ul id="inputSugguestion" ></ul>
              </div>

        </div>

        <div class="col-md-3 set-44">

          <div class="form-group">
                <label>Input Standard</label>
<select name="input_process_stand[<?php echo $classid;?>][]" class="typeahead instand<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','input_process_stand','asc','','','','input_process_stand'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['input_process_stand']);
               
               foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>              </div>

            </div>

            <div class="col-md-3 set-44">

              <div class="form-group">
                      <label for="title">Input Connection Type</label>
  <select name="process_connection[<?php echo $classid;?>][]" class="typeahead inprocessConnection<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','process_connection','asc','','','','process_connection');
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process_connection']);
               
              foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>                  </div>

            </div>

            <div class="col-md-3 set-22">

              <div class="form-group">
                     
                      <label for="title"></label> <br>

                     <input type="button" class="btn btn-danger RemoveInput" value="-">

                      <!-- <input type="checkbox" class="form-control" onclick="addanotherinput() ;"  > -->
                  </div>

            </div>

</div>


<script type="text/javascript" class="js-code-example-tokenizer"> 

//input scrip select

$(".inputF<?php echo $classid;?>").select2({ tags: true,tokenSeparators: [';'],separator: ";",multiple: true,});

$(".instand<?php echo $classid;?>").select2({tags: true,tokenSeparators: [','] });

$(".inprocessConnection<?php echo $classid;?>").select2({tags: true, tokenSeparators: [',', ''] });


</script>



<?php

  } 

public function addanotheroutput()
{

$classid=$_REQUEST['classid'];
$count1=$_REQUEST['count1'];
   
  ?>

   
<div class="row">

   <div class="col-md-3 set-44">

              <div class="form-group">
                <label>Output <?php echo $count1; ?></label>
<select name="out_conn[<?php echo $classid;?>][]" class="typeahead outputF<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','out_conn','asc','','','','out_conn');
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_conn']);
               
               foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>              </div>

             </div>

              <div class="col-md-3 set-44">

            <div class="form-group">
                <label>Output Standard</label>
<select name="out_process_stand[<?php echo $classid;?>][]" class="typeahead otstand<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','out_process_stand','asc','','','','out_process_stand'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_process_stand']);
               
               foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>              </div>

          </div>

           <div class="col-md-3 set-44">
            
              <div class="form-group">
                      <label for="title">Output Connection Type</label>
 <select name="out_process_connection[<?php echo $classid;?>][]" class="typeahead otprocessConnection<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','out_process_connection','asc','','','','out_process_connection'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_process_connection']);
               
               foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>                  </div>
  

            </div>  


             <div class="col-md-3 set-22">

              <div class="form-group">
                      <label for="title"></label><br>
                      <!-- <input type="checkbox" class="form-control" onclick="addanotheroutput() ;"  > -->
                      <input type="button" class="btn btn-danger RemoveOutput" value="-">
                  </div>

            </div>
</div>

<script type="text/javascript" class="js-code-example-tokenizer"> 

//output scrip select

$(".outputF<?php echo $classid;?>").select2({ tags: true, tokenSeparators: [','] });

$(".otstand<?php echo $classid;?>").select2({ tags: true, tokenSeparators: [','] });

$(".otprocessConnection<?php echo $classid;?>").select2({ tags: true, tokenSeparators: [','] });


</script>
<?php

  }

    public function addanotherprocess()
{

$classid=$_REQUEST['classid'];
$count2=$_REQUEST['count2'];
   
  ?>

   
<div class="row">

   <div class="col-md-3 set-55">

              <div class="form-group">
                <label>Process <?php echo $count2; ?></label>
 <select name="process[<?php echo $classid;?>][]" class="typeahead processsuggestion<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','process','asc','','','','process'); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process']);
               
               foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>              </div>

          </div>

           <div class="col-md-3 set-55">

            <div class="form-group">
                <label>Process Standard</label>
<select name="process_stand[<?php echo $classid;?>][]" class="typeahead processsuggestionStand<?php echo $classid;?> tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','process_stand','asc','','','','process_stand');  
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process_stand']);
               
               foreach($key as $k){
                   if($k){
                  // echo '<option>'.$k.'</option>';
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>              </div>

          </div>

           <div class="col-md-3 set-22">

              <div class="form-group">
                      <label for="title"></label><br>
                      <input type="button" class="btn btn-danger RemoveProcess" value="-">
                      <!-- <input type="checkbox" class="form-control" onclick="addanotherprocess() ;" > -->
                  </div>

            </div>
</div>
<script type="text/javascript" class="js-code-example-tokenizer"> 

//process scrip select

$(".processsuggestion<?php echo $classid;?>").select2({ tags: true, tokenSeparators: [','] });

$(".processsuggestionStand<?php echo $classid;?>").select2({ tags: true, tokenSeparators: [','] });



</script>
<?php

  }

  public function edit_product(){

    $product_id = $this->uri->segment(3);
    $data['manufacturerlist'] = $this->common_model->GetAllData('manufacturer');
    $data['product_detail'] = $this->common_model->GetSingleData('product',array('id'=>$product_id));

    $this->load->view('admin/edit_product',$data);
  }

  public function detail_product(){

    $product_id = $this->uri->segment(3);
    $data['inputOutput'] = $this->common_model->GetAllData('input_output',array('product_id'=>$product_id));
    $data['product_detail'] = $this->common_model->GetSingleData('product',array('id'=>$product_id));

    $this->load->view('admin/detail_product',$data);
  }


 public function edit_product_action(){

  if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update_shop_product'){
  $response['status'] = 0;
  $device_model = htmlentities($_REQUEST['device_model'], ENT_QUOTES);
  $device_brand = htmlentities($_REQUEST['device_brand'], ENT_QUOTES);
  $latest_firmware_version = htmlentities($_REQUEST['latest_firmware_version'], ENT_QUOTES);
  $mechanical_demension_mounting = htmlentities($_REQUEST['mechanical_demension_mounting'], ENT_QUOTES);
  $order_code = htmlentities($_REQUEST['order_code'], ENT_QUOTES);
  $rack_unit = $_REQUEST['rack_unit'];
  $date_released = $_REQUEST['date_released'];
  $date = strtotime($date_released);
  $date_released = date('Y-m-d',$date);;
  $input_conn = count($_REQUEST['input_conn']);

  $input_conn1 = $_REQUEST['input_conn'];
   $input_process_stand = $_REQUEST['input_process_stand'];
   $process_connection = $_REQUEST['process_connection'];
//print_r($input_conn1); die;

  //$out_conn = $_REQUEST['hidden-out_conn'];
  $out_conn = $_REQUEST['out_conn'];
  $out_process_stand = $_REQUEST['out_process_stand'];
  $out_process_connection = $_REQUEST['out_process_connection'];

  $process = $_REQUEST['process'];
  $process_stand = $_REQUEST['process_stand'];

  $Connection_id = $_REQUEST['Connection_id'];
  $dealer_web_cont = htmlentities($_REQUEST['dealer_web_cont'], ENT_QUOTES);
  $dealer_notes = htmlentities($_REQUEST['dealer_notes'], ENT_QUOTES);
  $warranty_detail = htmlentities($_REQUEST['warranty_detail'], ENT_QUOTES);
  $support_detail = htmlentities($_REQUEST['support_detail'], ENT_QUOTES);
  $dealer_contact = htmlentities($_REQUEST['dealer_contact'], ENT_QUOTES);
  $release_version = htmlentities($_REQUEST['release_version'], ENT_QUOTES);
  $update = date('Y-m-d H:i:s');
  $id= $_REQUEST['id'];
  $condition = "`id` = '" .$id ."'";
  $product_detail = $this->common_model->GetSingleData('product', $condition);
  if(!empty($product_detail)){
    $product_detail = $product_detail[0];
   
        $sql = "UPDATE `product` SET  `device_model` = '" .$device_model ."',`device_brand` = '" .$device_brand ."' ,`latest_firmware_version` = '" .$latest_firmware_version ."' ,`mechanical_demension_mounting` = '" .$mechanical_demension_mounting ."' ,`rack_unit` = '" .$rack_unit ."' ,`manufacturer_part_no` = '" .$manufacturer_part_no ."' ,`order_code` = '" .$order_code ."' ,`date_released` = '" .$date_released ."' ,`dealer_web_cont` = '" .$dealer_web_cont ."' ,`dealer_notes` = '" .$dealer_notes ."' ,`warranty_detail` = '" .$warranty_detail ."' ,`support_detail` = '" .$support_detail ."'  ,`dealer_contact` = '" .$dealer_contact ."' ,`release_version` = '" .$release_version ."',`updated_at` = '" .$update ."' ";
        if(!empty($_FILES["product_image"]['name'])){
          $uploadImage = false;
          $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['product_image']['name'], '.'), '.');
          $target_file =  "assets/product_image/".$filename;

          if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)){
          
            $uploadImage = true;
          }
          $product_image = $filename;
           $sql .= ", `product_image` = '" .$product_image ."'";
        }
  $sql .= " WHERE `id` = " .$id .";";
  $run = $this->db->query($sql);
if($run){
	
	$qry = $this->db->query("SELECT * FROM fav_device_list WHERE device_id = '".$id."'")->row_array();
	if($qry)
	{
        $uid = $qry["user_id"];
		$qry1 = $this->db->query("SELECT * FROM users WHERE user_id = '".$uid."'")->row_array();
		if($qry1)
		{
			$email = $qry1["email"];
			$subject="Your Favorite device is updated";

			$body = '<p>Hello '.$qry1["fname"].'</p>
			<p>Please be informed that your favorite device is updated.</p><br>
			<p>';

			//$body .='To avoid losing a listing please renew registration via: <b>Items Management/My List/Renew</b>.';

			$send = $this->common_model->SendMail($email,$subject,$body);
			if($send){
				   //$update['monthly_mail'] = 1;
				   //$this->common_model->UpdateData('product',array('id'=>$product_id),$update);
		    }
			
		}
	}
	
	
$input_output = " DELETE FROM `input_output` WHERE product_id='".$id."' ";
$run3 = $this->db->query($input_output);

for($i=0; $i<$input_conn; $i++){
// echo '<pre>';
// print_r($process_connection);
// echo '</pre>';

 $input_data = implode(',',$input_conn1[$i]);
 $input_process_stand_data = implode(',',$input_process_stand[$i]);
 $process_connection_data = implode(',',$process_connection[$i]);

$out_conn_data = implode(',',$out_conn[$i]);
$out_process_stand_data = implode(',',$out_process_stand[$i]);
$out_process_connection_data = implode(',',$out_process_connection[$i]);


$process_stand_data = implode(',',$process_stand[$i]);
$process_data = implode(',',$process[$i]);




$sqlInsert1="insert into input_output set product_id = '".$id."' , input_conn = '".$input_data."' , input_process_stand = '".$input_process_stand_data."' , process_connection = '".$process_connection_data."' , out_conn = '".$out_conn_data."' , out_process_stand = '".$out_process_stand_data."' , out_process_connection = '".$out_process_connection_data."' , process_stand = '".$process_stand_data."' , process = '".$process_data."' ";

                   $run21 = $this->db->query($sqlInsert1);
//echo $this->db->last_query(); die;
}

if(isset($_REQUEST['gallery-image-id'])){
    $abc=implode(',', $_REQUEST['gallery-image-id']);
    if($abc==""){
      $abc_id=0;
    }else{
      $abc_id=$abc;
    }
     $delete="delete from product_gallery_image  where product_id='".$id."' and id NOT IN ($abc_id)";
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
      $sqlInsert="insert into product_gallery_image set product_id= '".$id."',gallery_image = '".$fileD."' ";
      $run2 = $this->db->query($sqlInsert);
    }
  }
    $url = base_url('');
    $response['message'] = 'Product Updated Successfully.';
      $response['url'] = $url.'Admin/productlist';
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

  public function edit_product_action_old(){

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update_shop_product'){
 
  
  $response['status'] = 0;

  /*$title = htmlentities($_REQUEST['title'],ENT_QUOTES);
  $description = htmlentities($_REQUEST['description'], ENT_QUOTES);
  $price = htmlentities($_REQUEST['price'],ENT_QUOTES);
  $manufacturer_id = htmlentities($_REQUEST['manufacturer_id'],ENT_QUOTES);
  $manufacturer_part_no = htmlentities($_REQUEST['manufacturer_part_no'],ENT_QUOTES);
  $order_code = htmlentities($_REQUEST['order_code'],ENT_QUOTES);
  $product_range = htmlentities($_REQUEST['product_range'],ENT_QUOTES);
  $input_voltage_max = htmlentities($_REQUEST['input_voltage_max'],ENT_QUOTES);
  $availability = htmlentities($_REQUEST['availability'],ENT_QUOTES);
  $update = date('Y-m-d H:i:s');*/


  //// Group 1: Device ////
  $device_model = htmlentities($_REQUEST['device_model'], ENT_QUOTES);
  $device_brand = htmlentities($_REQUEST['device_brand'], ENT_QUOTES);
  $latest_firmware_version = htmlentities($_REQUEST['latest_firmware_version'], ENT_QUOTES);
  $mechanical_demension_mounting = htmlentities($_REQUEST['mechanical_demension_mounting'], ENT_QUOTES);
  $rack_unit = $_REQUEST['rack_unit'];
  $order_code = htmlentities($_REQUEST['order_code'], ENT_QUOTES);
  $date_released = $_REQUEST['date_released'];
  $date = strtotime($date_released);
  $date_released = date('Y-m-d',$date);


  $input_conn = count($_REQUEST['hidden-input_conn']);

  $input_conn1 = $_REQUEST['hidden-input_conn'];
  $input_process_stand = $_REQUEST['hidden-input_process_stand'];
  $process_connection = $_REQUEST['hidden-process_connection'];
//print_r($input_conn1); die;

  $out_conn = $_REQUEST['hidden-out_conn'];
  $out_process_stand = $_REQUEST['hidden-out_process_stand'];
  $out_process_connection = $_REQUEST['hidden-out_process_connection'];

  $process_stand = $_REQUEST['hidden-process_stand'];
  $process = $_REQUEST['hidden-process'];

  //// Group 2: IOP ////

  //$input_conn = htmlentities(implode(',',$_REQUEST['input_conn']), ENT_QUOTES);
  //$out_conn = htmlentities(implode(',',$_REQUEST['out_conn']), ENT_QUOTES);
  //$process_stand = htmlentities(implode(',',$_REQUEST['process_stand']), ENT_QUOTES);



  //$input_conn = count($_REQUEST['input_conn']);
  //$input_conn1 = $_REQUEST['input_conn'];
  //$input_process_stand = $_REQUEST['input_process_stand'];
  //$process_connection = $_REQUEST['process_connection'];
  $Connection_id = $_REQUEST['Connection_id'];

  //// Group 3: Dealer //// 
  $dealer_web_cont = htmlentities($_REQUEST['dealer_web_cont'], ENT_QUOTES);
  $dealer_notes = htmlentities($_REQUEST['dealer_notes'], ENT_QUOTES);
  $warranty_detail = htmlentities($_REQUEST['warranty_detail'], ENT_QUOTES);
  $support_detail = htmlentities($_REQUEST['support_detail'], ENT_QUOTES);
  //$out_process_stand = htmlentities(implode(',',$_REQUEST['out_process_stand']), ENT_QUOTES);
 // $input_process_stand = htmlentities(implode(',',$_REQUEST['input_process_stand']), ENT_QUOTES);
  //$process = htmlentities(implode(',',$_REQUEST['process']), ENT_QUOTES);
  $dealer_contact = htmlentities($_REQUEST['dealer_contact'], ENT_QUOTES);
  $release_version = htmlentities($_REQUEST['release_version'], ENT_QUOTES);
 // $process_connection = htmlentities(implode(',',$_REQUEST['process_connection']), ENT_QUOTES);
  //$out_process_connection = htmlentities(implode(',',$_REQUEST['out_process_connection']), ENT_QUOTES);
  $update = date('Y-m-d H:i:s');
 
  
  $id= $_REQUEST['id'];
  
  $condition = "`id` = '" .$id ."'";
  $product_detail = $this->common_model->GetSingleData('product', $condition);

  if(!empty($product_detail)){
    $product_detail = $product_detail[0];
   
        $sql = "UPDATE `product` SET  `device_model` = '" .$device_model ."',`device_brand` = '" .$device_brand ."' ,`latest_firmware_version` = '" .$latest_firmware_version ."' ,`mechanical_demension_mounting` = '" .$mechanical_demension_mounting ."' , `rack_unit` = '" .$rack_unit ."' , `manufacturer_part_no` = '" .$manufacturer_part_no ."' ,`order_code` = '" .$order_code ."' ,`date_released` = '" .$date_released ."' ,`dealer_web_cont` = '" .$dealer_web_cont ."' ,`dealer_notes` = '" .$dealer_notes ."' ,`warranty_detail` = '" .$warranty_detail ."' ,`support_detail` = '" .$support_detail ."'  ,`dealer_contact` = '" .$dealer_contact ."' ,`release_version` = '" .$release_version ."',`updated_at` = '" .$update ."' ";

        //print_r($_FILES);

        if(!empty($_FILES["product_image"]['name'])){
          $uploadImage = false;
          $filename = rand(100, 500) .time() .rand(100, 500) ."." .ltrim(strstr($_FILES['product_image']['name'], '.'), '.');
          $target_file =  "assets/product_image/".$filename;

          if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)){
          
            $uploadImage = true;
          }
          $product_image = $filename;
           $sql .= ", `product_image` = '" .$product_image ."'";
        }
  
    
    $sql .= " WHERE `id` = " .$id .";";

     

    $run = $this->db->query($sql);
 
     
//echo $this->db->last_query(); die;

    if($run){

$input_output = " DELETE FROM `input_output` WHERE product_id='".$id."' ";

$run3 = $this->db->query($input_output);

for($i=0; $i<$input_conn; $i++){

//print_r($input_conn[$i]);

$input_data = $input_conn1[$i];
$input_process_stand_data = $input_process_stand[$i];
$process_connection_data = $process_connection[$i];

$out_conn_data = $out_conn[$i];
$out_process_stand_data = $out_process_stand[$i];
$out_process_connection_data = $out_process_connection[$i];

$process_stand_data = $process_stand[$i];
$process_data = $process[$i];

 // $data = array(
 //     'input_output'=>$input_conn[$i],
 //      );

//print_r($data);



$sqlInsert1="insert into input_output set product_id = '".$id."' , input_conn = '".$input_data."' , input_process_stand = '".$input_process_stand_data."' , process_connection = '".$process_connection_data."' , out_conn = '".$out_conn_data."' , out_process_stand = '".$out_process_stand_data."' , out_process_connection = '".$out_process_connection_data."' ,process_stand = '".$process_stand_data."' , process = '".$process_data."' ";

                   $run21 = $this->db->query($sqlInsert1);
//echo $this->db->last_query(); die;
}



       if(isset($_REQUEST['gallery-image-id'])){
   
            $abc=implode(',', $_REQUEST['gallery-image-id']);
            if($abc==""){
              $abc_id=0;
            }else{
              $abc_id=$abc;
            }
   
             $delete="delete from product_gallery_image  where product_id='".$id."' and id NOT IN ($abc_id)";
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
              $sqlInsert="insert into product_gallery_image set product_id= '".$id."',gallery_image = '".$fileD."' ";
              $run2 = $this->db->query($sqlInsert);
            }
          }



      $url = base_url('');

      $response['message'] = 'Product Updated Successfully.';
        $response['url'] = $url.'Admin/productlist';
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


  public function deleteproduct(){

      $id= $_REQUEST['id'];  
      $run = $this->common_model->DeleteData('product',array('id'=>$id));
            //echo $this->db->last_query();
      if($run){

        $run2 = $this->common_model->DeleteData('input_output',array('product_id'=>$id));

        $run3 = $this->common_model->DeleteData('product_gallery_image',array('product_id'=>$id));

        $this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Product has been deleted successfully.</div>');

        redirect('Admin/productlist');
        
      } else {
          $this->session->set_flashdata('msgf','<div class="alert alert-danger">Something is Worng.</div>');
          redirect('Admin/productlist');
      }
  
  }


  public function changestatus()
  {
      $update['approve_date']= Date('Y-m-d');
      $update['expiry_date']=Date('Y-m-d', strtotime('+365 days'));
      $update['status']=$this->uri->segment(5);   
      $id = $this->uri->segment(4);
      $userdata = $this->common_model->GetSingleData('product',array('id'=>$id));
      if($this->uri->segment(5)==1)
      {
           $status = 'active';  
           $this->activeMail($userdata); 

      }
      else
      {     
      $status = 'pending';
      $this->refund($userdata); 
      }       

      $run = $this->common_model->UpdateData('product',array('id'=>$id),$update);
      if($run)
      {
        //$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Status updated successfully .</div>');
        redirect('Admin/productlist');      
      }
      else 
      {
        $this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Wrong.</div>');
        redirect('Admin/productlist');
      }
  }

    public function refund($data)
    { 
        
        $success=0;
    //     echo '<pre>' ;
  //   print_r($data);
  //  die ;
    

    	require_once('application/libraries/stripe-php-7.49.0/init.php');
    //	require_once(APPPATH . 'libraries/Stripe/lib/Charge.php');
        header('Content-Type: application/json');
        $secret_key = $this->config->item('stripe_secret');
      \Stripe\Stripe::setApiKey($secret_key);
     
    $setting = $this->common_model->GetSingleData('setting', 'id=1');    
    
    try {
   $re = \Stripe\Refund::create([
                              'amount' => $setting['amount']*100,
                              'payment_intent' => $data['paymentIntent_id'],
                            ]);
$success = 1;

} catch(Stripe_CardError $e) {
  $error1 = $e->getMessage();
} catch (Stripe_InvalidRequestError $e) {
  // Invalid parameters were supplied to Stripe's API
  $error1 = $e->getMessage();
} catch (Stripe_AuthenticationError $e) {
  // Authentication with Stripe's API failed
  $error1 = $e->getMessage();
} catch (Stripe_ApiConnectionError $e) {
  // Network communication with Stripe failed
  $error1 = $e->getMessage();
} catch (Stripe_Error $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
  $error1 = $e->getMessage();
} catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
  $error1 = $e->getMessage();
}

  
  
   
    if($success==1)
    {
      //  print_r('succeeded');
//          $insert['user_id'] = $data['user_id'];
// 			$insert['device_id'] = $data['id'];
// 			$insert['canceled_date'] = date('Y-m-d H:i:s');
// 			$insert['cancel_status'] = 1;
// 			$insert['refund_id'] = $re->id;
		//	$insert['survey'] = $this->input->post('survey');
		//	$insert['feedback'] = $this->input->post('feedback');
			
		//	$run = $this->common_model->InsertData('request',$insert);
// 		if($run){

         //   $insert1['status'] = 3;
		//	$run1 = $this->common_model->UpdateData('product',array('id'=>$p_id),$insert1);
			
			$usr=$data['user_id'];
			$name = $this->common_model->GetSingleData('users',array('user_id'=>$usr));
			
			$email = $name['email'];

            $subject="Device Deactivated!";
            $email = 'ekta.webwiders@gmail.com';
			$body = '<p>Hello '. $name['fname'].'</p><p>We have removed '. $qry['device_model'] .' from Azerax as per your request.</p>';

			$body .= '<p>Please allow 3-5 business days for the refund to be processed.</p>';

            $body .= '<p>Thanks for using Azerax and hope to see you again!</p>';
            
			$send = $this->common_model->SendMail($email,$subject,$body);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success"><p style="margin-bottom: 0rem!important;">Your item has been successfully removed and you’ll receive a refund in 3-5 business days.</p></div>');
			}
			else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong.'.$error1.'</div>');
			}
      return true;
  }

public function activeMail($data)
    { 
   
			
			$usr=$data['user_id'];
			$name = $this->common_model->GetSingleData('users',array('user_id'=>$usr));
			
			$email = $name['email'];
			$email = 'ekta.webwiders@gmail.com';

            $subject="Device Activated!";

			$body = '<p>Hello '. $name['fname'].'</p><p>Device '. $qry['device_model'] .' Activated.</p>';

			//$body .= '<p>Please allow 3-5 business days for the refund to be processed.</p>';

            $body .= '<p>Thanks for using Azerax and hope to see you again!</p>';
            
			$send = $this->common_model->SendMail($email,$subject,$body);
			
		$this->session->set_flashdata('msg','<div class="alert alert-success">Success! Product Activated Successfully .</div>');
  

}
  public function inputSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('input_conn LIKE '=>$searchInp)); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['input_conn']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
  
 public function inputProcessSatndardSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('input_process_stand LIKE '=>$searchInp)); 
                //echo $this->db->last_query();
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['input_process_stand']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
            
            public function inputconnectionTypeSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('process_connection LIKE '=>$searchInp)); 
                //echo $this->db->last_query();
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process_connection']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
            
            
            
//output

public function outputSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('out_conn LIKE '=>$searchInp)); 
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_conn']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
  
 public function outputProcessSatndardSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('out_process_stand LIKE '=>$searchInp)); 
                //echo $this->db->last_query();
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_process_stand']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
            
            public function outputconnectionTypeSugguestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('input_output',array('out_process_connection LIKE '=>$searchInp)); 
                //echo $this->db->last_query();
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['out_process_connection']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
            


//process 



public function processsuggestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('product',array('process LIKE '=>$searchInp)); 
                //echo $this->db->last_query();
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
            
            public function processStandardsuggestion()
            {
                
                    $data = [];

                $input_conn = $_REQUEST['query']; 
                $searchInp = '%'.$input_conn.'%';
                $Input = $this->common_model->GetAllData('product',array('process_stand LIKE '=>$searchInp)); 
                //echo $this->db->last_query();
                foreach($Input as $InputSugg){
                
                
               $key= explode(',',$InputSugg['process_stand']);
               
               foreach($key as $k){
                 $data[] =$k ;  
               }
                 
    }
    
    
        echo json_encode($data);

            }
            
           
		   
		   public function edit_expiry_date(){
               
               $id = $this->uri->segment(3);
			   
               $update['expiry_date'] = $this->input->post('expiry_date');
			   $date = date('Y-m-d');
			   if($update['expiry_date'] > $date)
			   {
				   $update['status']=1;
			   }
			   else
			   {
				   $update['status']=2;
			   }
			  $run = $this->common_model->UpdateData('product',array('id'=>$id),$update);
            //echo $this->db->last_query();
			if($run){

				$this->session->set_flashdata('msgf','<div class="alert alert-success">Success! Expiry date has been updated successfully .</div>');

				
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something is Worng.</div>');
			}
              redirect('Admin/productlist'); 
           }

  
}

?>