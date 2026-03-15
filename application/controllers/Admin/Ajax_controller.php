<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
class Ajax_controller extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		//$this->check_login();
	}

	public function check_login(){
		if(!$this->session->userdata('admin_id')){
			redirect('Admin/login');
		}
	}

	public function index(){
		//echo $this->input->post('cat_id');
		$subcatlist = $this->common_model->GetAllData('subcategory',array('cat_id'=>$this->input->post('cat_id')));
		?> <option value="">Select Subcategory</option> <?php 
		foreach ($subcatlist as $value) { ?>
		<option value="<?php echo $value['id']; ?>"><?php echo $value['sub_name']; ?></option>	 
	<?php 	}
	
	} 

	public function Getsubcat(){
		//echo $this->input->post('cat_id');
		$subcatlist = $this->common_model->GetAllData('subcategory',array('cat_id'=>$this->input->post('cat_id')));
		?>
   <select class="form-control" name="subcat_id">
	<?php 

		foreach ($subcatlist as $value) { ?>
		<option value="<?php echo $value['id']; ?>" ><?php echo $value['sub_name']; ?></option> 
	<?php 	} ?> 
	
	<?php } 
 	
}


 ?>