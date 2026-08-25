<?php include_once 'include/header2.php' ; ?>
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

/* ── SIDEBAR REDESIGN ── */
.left_sidebar_area { background: transparent; }
.left_widgets {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 16px;
}
.left_widgets .widgets_inner { padding: 0; }
.chex_li > a {
    color: #14213D !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    padding: 0 0 12px 0 !important;
    border-bottom: none !important;
    margin-bottom: 12px;
}
.chex_li > a:hover { color: #FCA311 !important; }
.chex_li > a .lnr-chevron-down {
    font-size: 14px !important;
    color: #14213D !important;
    margin-left: auto;
}
.chex_li input[type="checkbox"] { display: none; }
/* Select2 styling */
.select2-container--default .select2-selection--multiple {
    border: 1.5px solid #EBEBEB !important;
    border-radius: 8px !important;
    min-height: 38px !important;
    height: auto !important;
}
.select2-container--default .select2-selection--multiple:hover {
    border-color: #FCA311 !important;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border-color: #FCA311 !important;
    box-shadow: none !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background: #14213D !important;
    border: none !important;
    color: #fff !important;
    border-radius: 4px !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 11px !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: rgba(255,255,255,0.7) !important;
}
</style>

<style type="text/css">
	#showSearchDiv.show_div {
	display: block;
}

.mobile-show {
    display: none !important;
}

body {
    background: #F5F5F5 !important;
}
.cat_product_area {
    background: #F5F5F5;
}

/* ── PRODUCT CARDS ── */
.boder_image {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    padding: 16px !important;
    margin-bottom: 16px;
    display: flex !important;
    flex-direction: row !important;
    gap: 20px;
    align-items: center;
    transition: border-color 0.2s;
    position: static !important;
    padding-left: 16px !important;
    min-height: auto !important;
}
.boder_image:hover {
    border-color: #FCA311;
}
.boder_image .f_p_img {
    width: 160px !important;
    height: 120px !important;
    flex-shrink: 0 !important;
    position: static !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: #F5F5F5;
    border-radius: 8px;
    overflow: hidden;
    margin-left: 3px;
    box-shadow: 3px 3px 12px rgba(0,0,0,0.18);
}
.boder_image .f_p_img img {
    max-width: 100% !important;
    max-height: 100% !important;
    object-fit: contain !important;
    width: auto !important;
    height: auto !important;
}
.boder_image .contt {
    flex: 1 !important;
    min-width: 0 !important;
    overflow: hidden !important;
    padding: 0 !important;
    padding-left: 0 !important;
}
.boder_image .contt h4 {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}
.boder_image .contt h4 a {
    color: #14213D !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    text-decoration: none !important;
}
.boder_image .contt h4 a:hover { color: #FCA311 !important; }
.contt h4 a:hover { color: #FCA311 !important; }
.az-product-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
}
.badge-hw { background: #E8F0FE; color: #1A56DB; }
.badge-sw { background: #E3FCEF; color: #057A55; }
.badge-ai { background: #FDF6EC; color: #C27803; }
.card-label {
    color: #999;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
}
.card-value {
    color: #14213D;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
}
.az-view-btn {
    background: #FCA311 !important;
    color: #14213D !important;
    border: none !important;
    padding: 8px 20px !important;
    border-radius: 6px !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    font-family: 'Inter', sans-serif !important;
    text-decoration: none !important;
    display: inline-block !important;
    margin-top: 12px !important;
    transition: background 0.15s !important;
}
.az-view-btn:hover {
    background: #e8940a !important;
    color: #14213D !important;
}

.lnr-chevron-down {
    transition: transform 0.2s ease;
}

/* ── SORT BAR ── */
.product_top_bar {
    background: #fff !important;
    border: 1.5px solid #EBEBEB !important;
    border-radius: 12px !important;
    padding: 12px 20px !important;
    display: flex !important;
    align-items: center !important;
    margin-bottom: 16px !important;
}
.left_dorp {
    display: flex;
    align-items: center;
    gap: 20px;
    flex: 1;
}
.left_dorp form {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: nowrap;
}
.item_drop1, .item_drop2 {
    display: flex;
    align-items: center;
    gap: 8px;
}
.item_drop1 label, .item_drop2 label {
    color: #666;
    font-size: 13px;
    font-family: 'Inter', sans-serif;
    white-space: nowrap;
    margin: 0;
}
.item_drop1 .sorting, .item_drop2 .sorting {
    border: 1.5px solid #EBEBEB !important;
    border-radius: 6px !important;
    padding: 6px 12px !important;
    font-size: 13px !important;
    font-family: 'Inter', sans-serif !important;
    color: #14213D !important;
    background: #fff !important;
    cursor: pointer;
}
.item_drop1 .sorting:focus, .item_drop2 .sorting:focus {
    border-color: #FCA311 !important;
    outline: none !important;
}
/* Pagination */
.pagination {
    display: flex;
    align-items: center;
    gap: 4px;
    margin: 0 0 0 auto !important;
}
.pagination a, .pagination strong {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 6px !important;
    border: 1.5px solid #EBEBEB !important;
    color: #14213D !important;
    font-size: 13px !important;
    font-family: 'Inter', sans-serif !important;
    text-decoration: none !important;
    background: #fff !important;
    transition: all 0.15s;
}
.pagination strong {
    background: #FCA311 !important;
    border-color: #FCA311 !important;
    color: #14213D !important;
    font-weight: 700 !important;
}
.pagination a:hover {
    border-color: #FCA311 !important;
    color: #FCA311 !important;
}

.latest_product_inner {
    display: block !important;
}


</style>

<section class="cat_product_area p_120" >
	<div class="container-fluid">
		<div class="row flex-row-reverse Search_list_page">
			<div class="col-lg-9">
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
						<div class="boder_image" style="display:flex;flex-direction:row;align-items:center;gap:20px;">
							<div class="f_p_img" style="flex-shrink:0;">
								<a href="<?php echo base_url();?>details/<?=$row['id']?>">
								<?php if($imageFirst['gallery_image']){ ?>
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
								<?php } else { ?>
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="">
								<?php } ?>
								</a>
							</div>
							<div class="contt" style="flex:1;min-width:0;overflow:hidden;">
								<!-- ?php $manufacturer = $this->common_model->GetSingleData('manufacturer',array('id'=>$row['manufacturer_id']));  ?> -->
							<!-- <h4><a href="<?php echo base_url();?>details/<?=$row['id']?>"><?=$manufacturer['name']?></a></h4> -->
							<h4>
								<?php if($row['status']==2){ ?>
								<span style="color:#999;">Details hidden - listing expired</span>
								<?php } else { ?>
								<a href="<?php echo base_url();?>details/<?=$row['id']?>"><?=$row['device_model']?></a>
								<?php } ?>
								
							</h4>
							<div class="setseardata">
							<div class="row">
							    	<div class="col-sm-4">
									<?php if($row['status']==2){ ?>
									<span class="card-label">Brand: </span><span class="card-value" style="color:#999;">Hidden</span>
									<?php } else { ?>
									<?php echo '<span class="card-label">Brand: </span><span class="card-value">'. $row['device_brand'].'</span>' ; ?>
									<?php } ?>
								</div>
								<div class="col-sm-4">
									<?php if($row['status']==2){ ?>
									<span class="card-label">Model: </span><span class="card-value" style="color:#999;">Hidden</span>
									<?php } else { ?>
									<?php echo '<span class="card-label">Model: </span><span class="card-value">'. $row['device_model'].'</span>' ; ?>
									<?php } ?>
								</div>
								<div class="col-sm-4">										
									<?php echo '<span class="card-label">Release Date: </span><span class="card-value">'. $row['date_released'].'</span>' ;?>
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
								<?php if(!empty($row['dealer_notes'])){ ?>
								<p style="color:#666;font-size:13px;font-family:'Inter',sans-serif;line-height:1.6;margin:8px 0 0 0;"><?=substr($row['dealer_notes'],0,120)?>...</p>
								<?php } ?>
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
						<li class="chex_li">
							<input type="checkbox" name="by_output" value=1 <?php if($_GET['by_output'] == 1) { echo 'checked' ; } ?> >
							<a href="javascript:void(0);" class="listClick2" onclick="toggleClose('list2','listClick2')">By Output<span class="lnr lnr-chevron-down"></span></a>
							
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
						<li class="chex_li"><input type="checkbox" name="by_process" value=1 <?php if($_GET['by_process'] == 1) { echo 'checked' ; } ?>>
							<a href="javascript:void(0);" class="listClick3" onclick="toggleClose('list3','listClick3')">By Process<span class="lnr lnr-chevron-down"></span></a>
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
        $('.'+listClick).find('.lnr-chevron-down').css('transform','rotate(0deg)');
    }

function toggleOpen(classid,listClick) {
        $('.'+classid).slideDown(200);
        $('.'+listClick).attr('onclick','toggleClose("'+classid+'","'+listClick+'")');
        $('.'+listClick).find('.lnr-chevron-down').css('transform','rotate(180deg)');
    }
</script>

<script>
$(document).ready(function(){
    $('.listClick1, .listClick2, .listClick3').find('.lnr-chevron-down').css('transform','rotate(180deg)');
    $(".catA").select2({placeholder: "Main Category", tags: true, width: '100%'});
    $(".catB").select2({placeholder: "Sub-Category A", tags: true, width: '100%'});
    $(".catC").select2({placeholder: "Sub-Category B", tags: true, width: '100%'});
    $(".inputF").select2({placeholder: "Input Type", tags: true, width: '100%'});
    $(".instand").select2({placeholder: "Input Standard", tags: true, width: '100%'});
    $(".inprocessConnection").select2({placeholder: "Input Connection Type", tags: true, width: '100%'});
    $(".outputF").select2({placeholder: "Output Type", tags: true, width: '100%'});
    $(".otstand").select2({placeholder: "Output Standard", tags: true, width: '100%'});
    $(".otprocessConnection").select2({placeholder: "Output Connection Type", tags: true, width: '100%'});
    $(".processsuggestion").select2({placeholder: "Process Type", tags: true, width: '100%'});
    $(".processsuggestionStand").select2({placeholder: "Process Standard", tags: true, width: '100%'});
});
</script>
