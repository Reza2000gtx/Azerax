<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/

class ServiceManagement extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->check_login();
	}

	public function check_login(){
		/*if(!$this->session->userdata('admin_id')){
			redirect('Admin/login');
		}*/
	}

	public function index(){
		//$data['about'] = $this->common_model->GetAllData('ContentManagement');
		$this->load->view('admin/services');
	} 
 	
 	public function showServices(){
		$result = $this->common_model->GetAllData('service');
		$x=1;
		$output= "
	<table id='bootstrap-data-table' class='table table-striped table-bordered DataTable' >
	<thead>
    	<tr>
    		<th>Sl. No.</th>
    		<th>Name</th>
    		<th>Description</th>
    		<th>Image</th>
    		<th>Created on</th>
    		<th>Updated on</th>
    		<th>Action</th>
    	</tr>
    	</thead>
		<tbody>";
 foreach ($result as $value) {

    	$output .="<tr>
			<td>".$x++."</td>
			<td>".$value["product"]."</td>
			<td>".$value["description"]."</td>
			<td><img height='50px' width='50px'src='".base_url().'application/views/admin/ServiceImages/'.$value["image"]."'/></td>
			<td>".$value["created_on"]."</td>
			<td>".$value["Update_on"]."</td>
			<td>
<button type='button' class='btn btn-danger btn-xs' data-id='".$value["id"]."' id='DeleteServices' ><i class='fa fa-trash' aria-hidden='true'></i></button>
<button type='button' class='btn btn-info btn-xs' data-id='".$value["id"]."' id='EditServices' ><i class='fa fa-edit' aria-hidden='true'></i></button>
			</td>
		</tr>"; 	

	}
		$output.="
		</tbody>
		 </table>
<script>
  $(function () {
    $('.DataTable').DataTable();
  })
</script>		 
	";
	echo $output;

	}

	public function AddServices(){

		$this->form_validation->set_rules('product','Product name','alpha_numeric_spaces|required');
		$this->form_validation->set_rules('description','Description name','alpha_numeric_spaces|required');
						$config['upload_path']="application/views/admin/ServiceImages";
						$config['allowed_types'] = 'jpeg|gif|jpg|png';
						$config['encrypt_name']=true;
						$this->load->library("upload",$config);

						if($this->form_validation->run()){

						$insert['product'] = $this->input->post('product');
						$insert['description'] = $this->input->post('description');

						if ($this->upload->do_upload('image')) {
						$u_profile=$this->upload->data("file_name");
						$insert['image'] = $u_profile; 
							$run = $this->common_model->InsertData('service',$insert);

							if($run){
							$output['status'] = 1;
							$output['message'] = '<div class="alert alert-success">Service uploaded successfully.</div>';
							}
							else {
							$output['status'] = 0;
							$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
							}
							
						
																	}
								 }	
			else {
					$output['status'] = 0;
					$output['message'] = '<div class="alert alert-danger">Something went wrong.</div>';
					$output['messageProduct'] = form_error('product', '<p class="text-danger">', '</p>');	
					$output['messageDesc'] = form_error('description', '<p class="text-danger">', '</p>');
					}	
					echo json_encode($output);				 
	}
 	
 	public function EditProduct(){
 		$Id=$this->input->post('ID');
		$result = $this->common_model->GetAllData('service', array('id'=>$Id));
		$output= "
		<form id='UpdateProduct' onsubmit='return UpdateProduct();'  enctype='multipart/form-data'>
         ";
 foreach ($result as $value) {

    	$output .="
	<div class='form-group'>
            <label >Product:</label>
            <input type='text' class='form-control' id='product' placeholder='Enter Name' name='product' required value='".$value["product"]."'/>
            <div id='ProdErrEdit'></div>
          </div>
        <div class='form-group'>
            <label >Description</label>
            <textarea rows='3' class='form-control' id='description' placeholder='Enter description' name='description' required>".$value["description"]."</textarea>
            <div id='DescripErrEdit'></div>
          </div>
        <div class='form-group'>
            <label >Image:</label>
<span style='color:red; font-size:10px'>Only .jpeg, .jpg, .png, .gif formats are allowed.</span>           
<input type='file' name='image' accept='image/*' class='form-control' id='imgInp".$value["id"]."' />

          <div class='form-group'>
		<img height='100px' width='100px'src='".base_url().'application/views/admin/ServiceImages/'.$value["image"]."'/>   
		<div class='img_view'>
		<span id='UpdateImgMsg".$value["id"]."'></span>
        <img id='blah".$value["id"]."' src='#' height='100px' width='100px' style='display: none' />

          </div>       
			</div> 
			<input type='hidden' value='".$value["id"]."' name='UpdateId'/>
          <button type='submit' class='btn btn-primary' id='updateProductbtn'>Submit<i style='display:none' class='spinner fa fa-spinner fa-spin fa-fw btn-loadUpdate'></i></button>
 <script>
    $('#imgInp".$value["id"]."').change(function() {

              var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert('Only .jpeg, .jpg, .png, .gif formats are allowed.');
                    $('#imgInp".$value["id"]."').val('');
                    $('#UpdateImgMsg".$value["id"]."').html('');
                    $('#blah".$value["id"]."').css('display', 'none');
                }
                else {
                  readURL(this,'blah".$value["id"]."', 'UpdateImgMsg".$value["id"]."');
                }
  
});
</script>          
    	"; 	

	}
		$output.="
		 </form>
	";
	echo $output;

	}
    public function deleteProduct(){

			$Id=$this->input->post('ID');
			$run=$this->common_model->DeleteData('service', array('id'=>$Id));
			if ($run) {
				$output['status'] = 1;
				$output['message'] = '<div class="alert alert-success">Record deleted successfully.</div>';
				}
				else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
				}
				echo json_encode($output);	
	
 	}

 	public function UpdateServices(){
 		
	$Id=$this->input->post('UpdateId');

	$this->form_validation->set_rules('product','Product name','alpha_numeric_spaces|required');
	$this->form_validation->set_rules('description','Description name','alpha_numeric_spaces|required');

 			$update['product'] = $this->input->post('product');
			$update['description'] = $this->input->post('description');
		
			if($this->form_validation->run()==true){
				
						//$data['catlist'] = $this->common_model->GetAllData('category_table');
						//$data['popup_add']=true;
						//$this->load->view('admin/categoryTable',$data);	

						if($_FILES['image']['name']){

						$config['upload_path']="application/views/admin/ServiceImages";
						$config['allowed_types'] = 'jpeg|gif|jpg|png';
						$config['encrypt_name']=true;
						$this->load->library("upload",$config);

						if ($this->upload->do_upload('image')) {
						$u_profile=$this->upload->data("file_name");
						$update['image'] = $u_profile;

							$run = $this->common_model->UpdateData('service',array('id'=>$Id),$update);

							if ($run) {
				$output['status'] = 1;
				$output['message'] = '<div class="alert alert-success">Record updated successfully.</div>';
				}
				else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
				}

						}
						 else {
				$output['status'] = 0;
				$output['message'] = '<div class="alert alert-danger">Image Error, try again later.</div>';

							}	
			}
			else {
					$run = $this->common_model->UpdateData('service',array('id'=>$Id),$update);				
					if ($run) {
					$output['status'] = 1;
					$output['message'] = '<div class="alert alert-success">Record updated successfully.</div>';
					}
					else {
					$output['status'] = 0;
					$output['message'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';	
					}
				}
 		}//end if form validation
 		else {
					$output['status'] = 0;
					$output['message'] = '<div class="alert alert-danger">Something went wrong.</div>';
					$output['messageProduct'] = form_error('product', '<p class="text-danger">', '</p>');	
					$output['messageDesc'] = form_error('description', '<p class="text-danger">', '</p>');
					}
					echo json_encode($output);	

 }//end update funtion
 	
}


 ?>