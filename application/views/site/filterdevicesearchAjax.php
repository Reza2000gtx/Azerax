<?php include_once 'include/header.php' ; ?>
<style type="text/css">
	.banner_name_page{
		width: 100%;
		background-image: url('img/banner222.jpg');
		background-color: rgba(0,0,0,.6);
		box-sizing: border-box;
		background-size: 100%;
		border-radius: 15px;
		background-position: top;
	}
	.cat_product_area.p_80 {
	padding: 50px 0;
}
.pagination a[rel=prev],
.pagination a[rel=next]{
    color: #fff !important;
    font-size: 18px;
    padding: 3px 1px 2px 10px;
    line-height: 1.3;
    margin: 4px;
    border: 1px solid #0a66c2;
    
}
.pagination a[rel=prev]:before{
    font-family: FontAwesome;
    content: "\f100";
    color: #000 !important;
}
.pagination a[rel=next]:before{
    font-family: FontAwesome;
    content: "\f101";
    color: #000 !important;
}
.pagination > a,
.pagination > strong{
    color: #111;
    font-size: 18px;
    padding: 3px 10px 0 10px;
    line-height: 1.3;
    margin: 4px;
    border: 1px solid #0a66c2;
}
.pagination > strong{
        background-color: #0a66c2;
    color: #fff;
}
</style>

<style type="text/css">
	#showSearchDiv.show_div {
	display: block;
}
</style>

<section class="cat_product_area p_120" >
	<div class="container-fluid">
		<div class="row flex-row-reverse Search_list_page">
			<div class="col-lg-2">
				<div class="google_ad">
					<img src="<?php echo base_url();?>assets/site/img/google_ad.png">
				</div>
			</div>
			<div class="col-lg-7">
				<div class="product_top_bar">
					<div class="left_dorp">

				<form method="get" action="" id="myform">
					<div class="item_drop1">
					<label>Sort By:</label>
						<select class="sorting" name="sortby" id="lang">							
							<option value="0">Reviews</option>
				<!--	<option value="1" <?php //if($_REQUEST['sortby']==1) { echo 'selected'; } ?> selected>Order DESC</option>
				  <option value="2" <?php //if($_REQUEST['sortby']==2) { echo 'selected'; } ?>>Order ASE</option>-->

                  <option value="1" <?php if($_REQUEST['sortby']==1) { echo 'selected'; } ?>>Most relevant</option>
                    
				  <option value="2" <?php if($_REQUEST['sortby']==2) { echo 'selected'; } ?>>Release date</option>

				  


				</select>
			</div>

				<div class="item_drop2">
				<label>Items Per Page:</label>
				  <select class="sorting" name="perpage" id="perpage">	
				  <option value="">Per page</option>		
				  <option value="10" <?php if($_REQUEST['perpage']==10 || $_REQUEST['perpage']=='') { echo 'selected'; } ?>>10</option>
			      <option value="25" <?php if($_REQUEST['perpage']==25) { echo 'selected'; } ?>>25</option>
			      <option value="50" <?php if($_REQUEST['perpage']==50) { echo 'selected'; } ?>>50</option>
			      <option value="100" <?php if($_REQUEST['perpage']==100) { echo 'selected'; } ?>>100</option>
                </select>
					</div>
			

						<!-- <select class="show">
							<option value="1">Show 12</option>
							<option value="2">Show 14</option>
							<option value="4">Show 16</option>
						</select> -->

					</div>
				  <div class="pagination" style="text-align : center;"><?php echo $links; ?></div>				
				</div>

				<div class="latest_product_inner row"> 

<?php 
	if(!empty($productlist))
	{
  foreach ($productlist as $row) {
  $imageFirst = $this->common_model->GetSingleData('product_gallery_image',array('product_id'=>$row['id']));
 //echo $this->db->last_query();  ?>
				 <!--<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="f_p_item">
							<div class="f_p_img">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
							</div>
							<!- <?php $manufacturer = $this->common_model->GetSingleData('manufacturer',array('id'=>$row['manufacturer_id']));  ?>
							<a href="<?php echo base_url();?>details/<?=$row['id']?>"><h4><?=$manufacturer['name']?></h4></a> -->
 							
							<!---<a href="<?php echo base_url();?>details/<?=$row['product_id']?>"><?=$row['device_model']?></a><br>								
								<?=$row['device_brand']?><br>
								<?=substr($row['dealer_notes'],0,200)?>...<br>						
 						</div>
					</div> -->
					
					
						<div class="col-sm-12">
						<div class="boder_image">
							<div class="f_p_img">
								<?php if($imageFirst['gallery_image']){ ?>
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
								<?php } else { ?>
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="">
								<?php } ?>
							</div>
							<div class="contt">
								<!-- ?php $manufacturer = $this->common_model->GetSingleData('manufacturer',array('id'=>$row['manufacturer_id']));  ?> -->
							<!-- <h4><a href="<?php echo base_url();?>details/<?=$row['id']?>"><?=$manufacturer['name']?></a></h4> -->
							<h4>
								<a href="<?php echo base_url();?>details/<?=$row['id']?>"><?=$row['device_model']?></a>
								<!--<span>Brand :-->
								<!--	<?=$row['device_brand']?><br>-->
									<!--<?=substr($row['dealer_notes'],0,200)?>...<br>-->
								<!--</span>-->
							</h4>
							<div class="setseardata">
							<div class="row">
							    	<div class="col-sm-4">
									<?php echo '<span>Brand</span>'. $row['device_brand'] ; ?>
								</div>
								<div class="col-sm-4">
									<?php echo '<span>Model</span>'. $row['device_model'] ; ?>
								</div>
								<div class="col-sm-4">										
									<?php echo '<span>Release Date</span>'. $row['date_released'] ;?>
								</div>
							
							</div>
							
								<div class="row" >
								    <?php  if($_GET['input_name']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'input_conn','asc','','','','input_conn'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Input Type</span>'. $InputType['input_conn'] ; ?>
								   

                                    </div>
                                    	<?php } ?>
                 <?php  if($_GET['input_stand']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'input_process_stand','asc','','','','input_process_stand'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Input Standard</span>'. $InputType['input_process_stand'] ; ?>
								   

                                    </div>
                                    	<?php } ?>    
                                    	
                                    	 <?php  if($_GET['input_conn']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'process_connection','asc','','','','process_connection'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Input Connection Type</span>'. $InputType['process_connection'] ; ?>
								   

                                    </div>
                                    	<?php } ?>    
                                    	
                            <?php  if($_GET['out_conn']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'out_conn','asc','','','','out_conn'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Output Type</span>'. $InputType['out_conn'] ; ?>
								   

                                    </div>
                                    	<?php } ?>    
                                    	
                                    	
                                    	
                                    	<?php  if($_GET['out_process_stand']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'out_process_stand','asc','','','','out_process_stand'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Output Standard</span>'. $InputType['out_process_stand'] ; ?>
								   

                                    </div>
                                    	<?php } ?>    
                                    	
                                    	
                                    	
                                    	<?php  if($_GET['out_process_connection']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'out_process_connection','asc','','','','out_process_connection'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Output Connection Type</span>'. $InputType['out_process_connection'] ; ?>
								   

                                    </div>
                                    	<?php } ?>    
                                    	
                     <?php  if($_GET['process']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'process','asc','','','','process'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Process Type</span>'. $InputType['process'] ; ?>
								   

                                    </div>
                                    	<?php } ?>   
                                    	
                                    	<?php  if($_GET['process_stand']){   
							 $InputType = $this->common_model->GetSingleData('input_output',array('product_id'=>$row['id']),'process_stand','asc','','','','process_stand'); 

							
							?>
								    	<div class="col-sm-4">
								    	    	<?php echo '<span>Process Standard</span>'. $InputType['process_stand'] ; ?>
								   

                                    </div>
                                    	<?php } ?>   
                                    	
								</div>
								
							
							<div class="row" style="display:none">
								<div class="col-sm-4">								
									<?php echo '<span>Release Version</span>'. $row['release_version'] ;?>
								</div>
								<div class="col-sm-4">								
									<?php echo '<span>Dealer Contact</span> '. $row['dealer_contact'] ; ?>
								</div>
							</div>
							<div class="row" style="display:none">
								<div class="col-sm-4">								
									<?php echo '<span>Mechanical Demension</span>'. $row['mechanical_demension_mounting'] ;?>
								</div>
								<div class="col-sm-4">								
									<?php echo '<span>Rack Units</span> '. $row['rack_unit'] ; ?>
								</div>
							</div>
							</div>
							<p class="nomargin">
								<a href="<?php echo base_url();?>details/<?=$row['id']?>" class="btn main_btn signup_btn ">View Details</a>
							</p>
							</div>
						</div>
						
					</div>
<?php } } else {  ?>
<center><img src="<?php echo base_url(); ?>assets/site/img/no_data.png" style="width:550px;"></center>
<?php } ?>

<div class="product_top_bar">
    <div class="pagination" style="text-align : center;"><?php echo $links; ?></div>
</div>
				</div>


			</div>



			<div class="col-lg-3">
				<div class="filter-show mobile-show">
					 <a href="javascript:void(0)" class="btn btn-primary">Filter</a>
				</div>
				<div class="left_sidebar_area">
				<div class="close-filter mobile-show">
					<span>Filter</span> <i class="fa fa-times-circle"></i>
				</div>

					<aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
					<input data-toggle="#hidden1" class="form-control" value="<?php if($_GET['keyword']){ echo $_GET['keyword']; } ?>" 
					name="keyword" id="process"  autocomplete="off" onkeyup="getprocess()" placeholder="Search for devices" >

					  <input type="hidden" name="productid" id="productid" />
					  <div class="hidden" id="hidden1" style="display: none;" data-hidden="true">
						<ul id="processSugguestion" ></ul>
						</div>


						</div>
					</aside>


					<aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<ul class="list">
						<li class="chex_li"><input type="checkbox" name="by_input" value=1 <?php if($_GET['by_input'] == 1) { echo 'checked'; } ?>> 
							<a href="javascript:void(0);" class="listClick1" onclick="toggleClose('list1','listClick1')">							
							 
							By Input
						   <span class="lnr lnr-chevron-down"></span></a>
                           <ul class="list list1" style="display: block;">

		<li class="d-flex justify-content-between align-items-center">
									

			<select id="e2_2" name="input_name[]" class=" inputF  form-control" multiple="multiple" style="width:300px">
               <?php     
                $data=array();
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
                $selected = ''; 
               foreach($data as $k){
                if($k){
                
                  if(in_array($k, $input_name_set))
                  {
                    $selected = 'selected';
                  }

                    echo '<option '.$selected.'>'.$k.'</option>';
                    $selected = '';
                   }
                  
               }
               $data=array();
               ?>
                 </select>

				  </li>

					<li class="d-flex justify-content-between align-items-center">
									
					<!-- <input value="<?php if($_GET['input_stand']) { echo $_GET['input_stand'];}   ?>" type="text" data-role="tagsinput" name="input_stand" placeholder="Input Standard" class="form-control"> -->
			<select name="input_stand[]" class="typeahead instand tm-input form-control " style="width:300px" multiple="multiple">

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
                $selected = '';
                $data=array_unique($data);
               foreach($data as $k){

               	if(in_array($k, $input_stand_set))
                  {
                    $selected = 'selected';
                  }

                   if($k){
                      echo '<option '.$selected.'>'.$k.'</option>';
                      $selected = '';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
					
					</li>


					<li class="d-flex justify-content-between align-items-center">									
				<!-- <input value="<?php  if($_GET['input_conn']){ echo $_GET['input_conn']; }   ?>" type="text" data-role="tagsinput" name="input_conn" placeholder="Input Connection Type" class="form-control"> -->
				<select name="input_conn[]" class="typeahead inprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

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
                $selected = '';
               foreach($data as $k){

               	if(in_array($k, $input_conn_set))
                  {
                    $selected = 'selected';
                  }

                   if($k){
                     echo '<option '.$selected.'>'.$k.'</option>';
                     $selected = '';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
					</li>

							</ul>
						</li>
					</ul>
						</div>
					</aside>

					<aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<ul class="list">
						<li>
							<input type="checkbox" name="by_output" value=1 <?php if($_GET['by_output'] == 1) { echo 'checked' ; } ?> >
							<a href="javascript:void(0);" class="listClick2" onclick="toggleClose('list2','listClick2')"> By Output  <span class="lnr lnr-chevron-down"></span></a>
							
                           <ul class="list list2" style="display: block;">

								<li class="d-flex justify-content-between align-items-center">
									
		<!-- 	<input value="<?php  if($_GET['out_conn']){ echo $_GET['out_conn'];
}   ?>" type="text" name="out_conn" data-role="tagsinput" placeholder="Output Type" class="form-control"> -->

<select name="out_conn[]" class="typeahead outputF tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

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
                $selected = '';
                $data=array_unique($data);
               foreach($data as $k){

               	if(in_array($k, $out_conn_set))
                  {
                    $selected = 'selected';
                  }

                 if($k){
                    echo '<option '.$selected.'>'.$k.'</option>';
                    $selected = '';
                 }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>


								</li>

						<li class="d-flex justify-content-between align-items-center">
								
			<!-- <input value="<?php  if($_GET['out_process_stand']){ echo $_GET['out_process_stand']; }   ?>" type="text" name="out_process_stand" data-role="tagsinput" placeholder="Output Standard" class="form-control"> -->
          <select name="out_process_stand[]" class="typeahead otstand tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

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
                $selected = '';
               foreach($data as $k){
               	if(in_array($k, $out_process_stand_set))
                  {
                    $selected = 'selected';
                  }
                   if($k){
	                   echo '<option '.$selected.'>'.$k.'</option>';
	                   $selected = '';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
		</li>

		<li class="d-flex justify-content-between align-items-center">
									
			<!-- <input value="<?php if($_GET['out_process_connection']) { echo $_GET['out_process_connection']; }  ?>" type="text" name="out_process_connection" data-role="tagsinput" placeholder="Output Connection Type" class="form-control"> -->

			<select name="out_process_connection[]" class="typeahead otprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

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
                $selected = '';
               foreach($data as $k){
                  
               	if(in_array($k, $out_process_connection_set))
                  {
                    $selected = 'selected';
                  }

                if($k){
                   echo '<option '.$selected.'>'.$k.'</option>';
                   $selected = '';
                }
                 
               }
               $data=array();
               
               ?>
              
             
             </select>

						</li>

							</ul>
						</li>
					</ul>
						</div>
					</aside>

					<aside class="left_widgets cat_widgets side_bar_nw">
						<div class="widgets_inner">
							<ul class="list">
						<li><input type="checkbox" name="by_process" value=1 <?php if($_GET['by_process'] == 1) { echo 'checked' ; } ?>>
							<a href="javascript:void(0);" class="listClick3" onclick="toggleClose('list3','listClick3')"> By Process  <span class="lnr lnr-chevron-down"></span></a>
                           <ul class="list list3" style="display: block;">

							<li class="d-flex justify-content-between align-items-center">
									
						<!-- <input value="<?php  if($_GET['process']) { echo $_GET['process']; }  ?>" type="text" data-role="tagsinput"  name="process" placeholder="Process Type" class="form-control"> -->

		    <select name="process[]" class="typeahead processsuggestion tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

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
                $selected = '';
               foreach($data as $k){

               	if(in_array($k, $process_set))
                  {
                    $selected = 'selected';
                  }

                   if($k){
                     echo '<option '.$selected.'>'.$k.'</option>';
                     $selected = '';
                   }
                  
               }
               $data=array();
               ?>
              
             
             </select>

						

    
							</li>

						  <li class="d-flex justify-content-between align-items-center">
									
						<!-- <input value="<?php  if($_GET['process_stand']){ echo $_GET['process_stand']; }  ?>" type="text" data-role="tagsinput" name="process_stand" placeholder="Process Standard" class="form-control"> -->

						<select name="process_stand[]" class="typeahead processsuggestionStand tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">

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
                $selected = '';
               foreach($data as $k){

               	if(in_array($k, $process_stand_set))
                  {
                    $selected = 'selected';
                  }

                if($k){
                   echo '<option '.$selected.'>'.$k.'</option>';
                   $selected = '';
                }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>

						  </li>
								
							</ul>
						</li>
					</ul>
						</div>
					</aside>


					<aside class="left_widgets cat_widgets side_bar_nw">		

					<center>
						 <a  class="btn main_btn signup_btn spance_nav" href="<?php echo base_url(); ?>search-listing">
				<i style="display: none;" class="spinner fa fa-spinner fa-spin fa-fw btn-load-filter"></i>Reset</a>

						<button type="submit" class="btn main_btn signup_btn spance_nav">
						<i style="display: none;" class="spinner fa fa-spinner fa-spin fa-fw btn-load-filter"></i>Search
					</button></center>
					</aside>

					</form>

				</div>
			</div>


		</div>
	</div>
</section>
<script type="text/javascript" class="js-code-example-tokenizer"> 

//input scrip select

$(".inputF").select2({     placeholder: "Input Type",
tags: true, tokenSeparators: [';'],
                            separator: ";",     multiple: true,
});

$(".instand").select2({ tags: true,placeholder: "Input Standard", tokenSeparators: [','] });

$(".inprocessConnection").select2({ tags: true,placeholder: "Input Connection Type", tokenSeparators: [',', ''] });


</script>
<script type="text/javascript" class="js-code-example-tokenizer"> 

//output scrip select

$(".outputF").select2({ tags: true,placeholder: "Output Type", tokenSeparators: [',', ' '] });

$(".otstand").select2({ tags: true, placeholder: "Output Standard",tokenSeparators: [',', ' '] });

$(".otprocessConnection").select2({ tags: true, placeholder: "Output Connection Type",tokenSeparators: [',', ' '] });


</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 

//process scrip select

$(".processsuggestion").select2({ tags: true,placeholder: "Process Type", tokenSeparators: [',', ' '] });

$(".processsuggestionStand").select2({ tags: true,placeholder: "Process Standard", tokenSeparators: [',', ' '] });



</script>
<?php include_once 'include/footer2.php' ; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>


<script type="text/javascript">
	
$(document).ready(function()
{
	//alert('yes');
	
  $('#lang').change(function(){
      
    var value= $('#lang').val();
    if(value==0){
        alert('Coming Soon!');
        return false;
    }
    // Call submit() method on <form id='myform'>
    $('#myform').submit();
  });

   $('#perpage').change(function(){
      
    var value = $('#perpage').val();
    
    // Call submit() method on <form id='myform'>
    $('#myform').submit();
  });



});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>




<script>
	function getprocess() {
	var process = $("#process").val();
$.ajax({
		url:"<?php echo base_url(); ?>/Product/getprocess",
		type:"POST",
		data: {process:process},
		success:function(data)
		{
				$('#processSugguestion').html(data);
				$("#processSugguestion").css("display", "block");
				return false;
		}
		
	});
}
$(document).on('click','#processSugguestion li',function(){
	var processName = $(this).html();
	var ID = $(this).attr('data-value');
	$("#productid").val(ID);
	$("#process").val(processName); 
	$("#processSugguestion").css("display", "none");
});
</script>

<script>
//     (function () {
//     "use strict";
//     var hiddenItems = document.getElementsByClassName('hidden'), hidden;
//     document.addEventListener('click', function (e) {
//         for (var i = 0; hidden = hiddenItems[i]; i++) {
//             if (!hidden.contains(e.target) && hidden.style.display != 'none')
//                 hidden.style.display = 'none';
//         }
//         if (e.target.getAttribute('data-toggle')) {
//             var toggle = document.querySelector(e.target.getAttribute('data-toggle'));
//             toggle.style.display = toggle.style.display == 'none' ? 'block' : 'none';
//         }
//     }, false);
// })();
</script>
<script>
function myFunction() {
  alert("comming Soon");
}
function toggleClose(classid,listClick) {
    
    
        $('.'+classid).slideUp(200);
        $('.'+listClick).attr('onclick','toggleOpen("'+classid+'","'+listClick+'")');
        
        
    }

function toggleOpen(classid,listClick) {
    
    
        $('.'+classid).slideDown(200);
        $('.'+listClick).attr('onclick','toggleClose("'+classid+'","'+listClick+'")');
        
        
    }
</script>
