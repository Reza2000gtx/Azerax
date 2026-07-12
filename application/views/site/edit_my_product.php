<?php include_once 'include/header2.php' ;
   $id = $_REQUEST['id'];
    ?>
<style type="text/css">
   .right-inner-addon i {
   position: absolute;
   right: 5px;
   top: 10px;
   pointer-events: none;
   font-size: 1.5em;
   }
   .right-inner-addon {
   position: relative;
   }
   .form-control:focus{
   border: 1px solid #c51919 !important;
   }
   .has-error .form-control {
   border-color: #f00 !important;
   }

/* ── EDIT PRODUCT BRAND STYLING ── */
section.add_product {
    background: #F5F5F5;
    padding: 32px 0;
    min-height: calc(100vh - 220px);
}
section.add_product .form_add_product {
    overflow: visible !important;
}
#msform {
    max-width: 960px;
    margin: 0 auto;
}
section.add_product #msform fieldset#menu1,
section.add_product #msform fieldset#menu2,
section.add_product #msform fieldset#menu3 {
    background: #fff;
    border-radius: 16px !important;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    padding: 32px;
}
.form-group label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #555;
}
.form-control:focus {
    border-color: #FCA311 !important;
    box-shadow: none !important;
}
/* Action buttons */
#msform .action-button {
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    border-radius: 8px;
    padding: 11px 28px;
    font-size: 14px;
    color: #fff;
    background: #14213D;
    border: none;
    cursor: pointer;
}
#msform .action-button.next {
    background: #FCA311 !important;
    color: #14213D !important;
}
#msform .action-button.next:hover { background: #e8940a !important; }
#msform .action-button.actionButtonSubmit { background: #dc3545; }
/* Fix nav hover on this page */
.header_area .navbar .nav .nav-item .nav-link:hover {
    background: transparent !important;
}
/* Old progressbar hidden - using new one */
#progressbar { display: none !important; }
</style>
<style type="text/css">
   .upload-btn-wrapper {
   position: relative;
   overflow: hidden;
   display: inline-block;
   }
   .upload-btn-wrapper input[type=file] {
   font-size: 100px;
   position: absolute;
   left: 0;
   top: 0;
   opacity: 0.01;
   }
   .tab {
   overflow: hidden;
   border: 1px solid #ccc;
   background-color: #f1f1f1;
   }
   /* Style the buttons inside the tab */
   .tab button {
   background-color: inherit;
   float: left;
   border: none;
   outline: none;
   cursor: pointer;
   padding: 14px 16px;
   transition: 0.3s;
   font-size: 17px;
   }
   /* Change background color of buttons on hover */
   .tab button:hover {
   background-color: #ddd;
   }
   /* Create an active/current tablink class */
   .tab button.active {
   background-color: #ccc;
   }
   /* Style the tab content */
   .tabcontent {
   display: none;
   padding: 6px 12px;
   border: 1px solid #ccc;
   border-top: none;
   }
   /*delete*/
   .form_add_product.contact_form{
   overflow:hidden;
   }
   /*form styles*/
   #msform {
   max-width: 1000px;
   width: 100%;
   margin: 50px auto;
   position: relative;
   }
   #msform fieldset {
   background: white;
   border: 0 none;
   border-radius: 3px;
   box-shadow: 0 10px 30px 0 rgba(0, 0, 0, .07);
   padding: 20px 30px;
   box-sizing: border-box;
   width: 100%;
   margin: 0 auto;
   opacity: 1!important;
   /*stacking fieldsets above each other*/
   position: relative;
   }
   /*Hide all except first fieldset*/
   #msform fieldset:not(:first-of-type) {
   display: none;
   }
   /*inputs*/
   /*buttons*/
   #msform .action-button {
   width: 100px;
   background: #14213D;
   font-weight: bold;
   color: white;
   border: 0 none;
   border-radius: 1px;
   cursor: pointer;
   padding: 10px 5px;
   margin: 10px 5px;
   text-align: center;
   }
   #msform .action-button:hover, #msform .action-button:focus {
   box-shadow: 0 0 0 2px white, 0 0 0 3px #14213D;
   }
   /*headings*/
   .fs-title {
   font-size: 15px;
   text-transform: uppercase;
   color: #2C3E50;
   margin-bottom: 10px;
   }
   .fs-subtitle {
   font-weight: normal;
   font-size: 13px;
   color: #666;
   margin-bottom: 20px;
   }
   /*progressbar*/
   #progressbar {
   margin-bottom: 30px;
   overflow: hidden;
   /*CSS counters to number the steps*/
   counter-reset: step;
   }
   #progressbar li {
   list-style-type: none;
   color: #333;
   text-transform: uppercase;
   font-size: 14px;
   width: 33.33%;
   float: left;
   position: relative;
   text-align: center;
   }
   #progressbar li:before {
   content: counter(step);
   counter-increment: step;
   width: 30px;
   line-height: 30px;
   display: block;
   font-size: 14px;
   color: #000000;
   background: #c2c2c2;
   border-radius: 3px;
   margin: 0 auto 5px auto;
   text-align: center;
   cursor: pointer;
   }
   /*progressbar connectors*/
   #progressbar li:after {
   content: '';
   width: 100%;
   height: 2px;
   background: #c2c2c2;
   position: absolute;
   left: -50%;
   top: 15px;
   z-index: -1; /*put it behind the numbers*/
   }
   #progressbar li:first-child:after {
   /*connector not needed before the first step*/
   content: none; 
   }
   /*marking active/completed steps green*/
   /*The number of the step and the connector before it = green*/
   #progressbar li.active:before,
   #progressbar li:hover:before
   {
   background: #FCA311;
   color: white;
   }
   #msform fieldset {
   position: relative !important;
   transform: inherit !important;
   top: 0 !important;
   left: 0 !important;
   }
   .next,
   .submit
   {
   float: right;
   }
   .display_block {
   display: none;
   }
   span.select2.select2-container.select2-container--default {
   width: 100% !important;
   }
   .select2-container--default .select2-selection--multiple .select2-selection__choice {
   background-color: #14213D !important;
   border: none !important;
   color: white !important;
   }
   .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
   color: #525252 !important;
   cursor: pointer;
   display: inline-block;
   font-weight: bold;
   margin-right: 2px;
   background: #FCA311 !important;
   margin: 4px 2px !important;
   border-radius: 48px;
   height: 11px !important;
   width: 11px !important;
   line-height: 12px;
   margin-top: 0 !important;
   text-align: center !important;
   font-size: 14px !important;
   }
   .select2-container--default .select2-results__option--highlighted[aria-selected] {
   background-color: #14213D !important;
   color: white;
   }


   .autocomplete {
  width: 100%;
}
.autocomplete-items {
  position: absolute;
  z-index: 99;
  background: #f9f9f9;
  width: 100%;
  max-height: 150px;
  overflow-y: auto;
  overflow-x: hidden;
}
.autocomplete-items > div {
  width: 100%;
  color: #666;
  padding: 6px 15px;
  cursor: pointer;
}
.autocomplete-items > div strong{
  color: #333;
}
.autocomplete-items > div:hover {
  background: #14213d;
  color: #ccc;
}
.autocomplete-items > div:hover strong {
  color: #fff;
}
#processSugguestion {
  display: none;
}

.autocomplete-items .autocomplete-active{
  background-color: #14213d; 
  color: #ccc; 
}
.autocomplete-items .autocomplete-active strong{
  color: #fff; 
}

.nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus{

  background-color: #14213D;
    color: #fff;
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 0;
    height: 40px;
    padding: 4px 0;
}
#checkme {
	width: auto !important;
}
.select2-container--default .select2-selection--single {
	background-color: #fff;
	border: 1px solid #aaa;
	border-radius: 0;
	height: 34px;
	padding: 2px 0;
}
.form-control {
	color: #000000;
	border: 1px solid #c2c2c2 !important;
	height: 34px;
}
   /*delete*/
</style>
<div style="background:#14213D;padding:40px;text-align:center;margin-top:-20px;">
    <h1 style="font-family:'Inter',sans-serif;font-size:30px;font-weight:700;color:#fff;margin-bottom:6px;">Edit Product</h1>
    <p style="font-family:'Inter',sans-serif;font-size:14px;color:rgba(255,255,255,0.5);margin:0;">Update your broadcast product listing on azera<span style="color:#FCA311;">X</span></p>
</div>
<section class="add_product">
   <div class="container">
      <div class="form_add_product contact_form">
         <!-- multistep form -->
         <form method="post" name="editForm" id="msform" onsubmit="return edit_function(event);">
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>" >
            <input type="hidden" name="id" value="<?=$product_detail['id']?>" >
            <!-- premium step indicator -->
            <div class="az-steps-bar" style="background:#fff;border-bottom:1px solid #EBEBEB;padding:0 20px;margin-bottom:24px;">
                <div style="display:flex;align-items:center;max-width:600px;margin:0 auto;padding:20px 0;">
                    <button type="button" class="tablinks az-step active" onclick="openCity(event, 'menu1')" data-step="1" style="display:flex;align-items:center;gap:10px;background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                        <span class="az-step-num" style="width:32px;height:32px;border-radius:50%;background:#FCA311;color:#14213D;font-family:'Inter',sans-serif;font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all 0.2s;">1</span>
                        <span class="az-step-label" style="font-family:'Inter',sans-serif;font-size:13px;font-weight:600;color:#14213D;white-space:nowrap;">Device Info</span>
                    </button>
                    <div class="az-step-connector" style="flex:1;height:2px;background:#EBEBEB;margin:0 4px;"></div>
                    <button type="button" class="tablinks az-step" onclick="openCity(event, 'menu2')" data-step="2" style="display:flex;align-items:center;gap:10px;background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                        <span class="az-step-num" style="width:32px;height:32px;border-radius:50%;background:#E5E5E5;color:#999;font-family:'Inter',sans-serif;font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all 0.2s;">2</span>
                        <span class="az-step-label" style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#999;white-space:nowrap;">I/O & Process</span>
                    </button>
                    <div class="az-step-connector" style="flex:1;height:2px;background:#EBEBEB;margin:0 4px;"></div>
                    <button type="button" class="tablinks az-step" onclick="openCity(event, 'menu3')" data-step="3" style="display:flex;align-items:center;gap:10px;background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                        <span class="az-step-num" style="width:32px;height:32px;border-radius:50%;background:#E5E5E5;color:#999;font-family:'Inter',sans-serif;font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all 0.2s;">3</span>
                        <span class="az-step-label" style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#999;white-space:nowrap;">Dealer Info</span>
                    </button>
                </div>
            </div>
            <!-- fieldsets -->
            <fieldset id="menu1" class="display_block" style="display: block;">
               <h3></h3>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Device Model</label>
                      


 <div class="autocomplete" >

                          <input data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_name" name="device_model" value="<?=$product_detail['device_model']?>" >                        
</div>

                     </div>
                 
                     <div class="form-group">
                        <label for="title">Mechanical dimensions
                        <span style="float:right;"> Software only <?php 
                           if($product_detail['latest_firmware_version']==0) { 
                           echo '<input  id="checkme" type="checkbox" value="0" name="latest_firmware_version" style="width: auto !important;">';
                           }else{
                           echo '<input checked id="checkme" type="checkbox" value="1" name="latest_firmware_version" >';
                           }?>
                        </span></label>
                        <input type="text" class="form-control" <?php 
                           if($product_detail['latest_firmware_version']==1) { 
                           echo 'disabled';
                           }else{
                           echo '';
                           }?> name="mechanical_demension_mounting"   id="sendNewSms" value="<?=$product_detail['mechanical_demension_mounting']?>" >
                     </div>
                     <div class="form-group" style="margin-bottom:0 !important;">
                        <label for="title">Rack Units</label>
                        <select class="form-control" <?php 
                           if($product_detail['latest_firmware_version']==1) { 
                           echo 'disabled';
                           }else{
                           echo '';
                           } ?> name="rack_unit" id="sendNewSms1">
                           <option value="">Select</option>
                           <?php 
                              for ($i = 1; $i <= 60; $i++){ ?>
                           <option <?php if($product_detail['rack_unit']== $i ){echo 'selected';}?> value="<?php echo "$i"; ?> RU"><?php echo "$i"; ?> RU</option>
                           <?php    };
                              ?>
                        </select>
                     </div>
                     <script type="text/javascript">

                                $("#sendNewSms1").select2();

                        var checker = document.getElementById('checkme');
                        var sendbtn = document.getElementById('sendNewSms');
                        var sendbtn1 = document.getElementById('sendNewSms1');
                        checker.onchange = function() {
                        
                        
                          sendbtn.disabled = !!this.checked;
                          sendbtn1.disabled = !!this.checked;
                        };
                     </script>
                     <div class="form-group">
                        <label for="title">Manual/Brochure (PDF)</label>
                         <div style="border: 1px solid #C2C2C2;height: 35px;display: flex;align-items: center;justify-content: flex-start;padding-left: 5px;">
                        <input type="file" accept="application/pdf"  name="device_manual_brochure" value="<?=$product_detail['device_manual_brochure']?>" >
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Device Brand</label>
                       


                           <div class="autocomplete" >

                          <input data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_brand" name="device_brand" value="<?=$product_detail['device_brand']?>">                        
</div>



                     </div>
                     <div class="form-group">
                        <label for="title">Date released</label>
                        <!-- <input type="date" class="form-control" name="date_released" > -->
                        <div class='' data-date-format="yyyy-mm-dd">
                           <input   type="date"  id="" value="<?=$product_detail['date_released']?>"  name="date_released" placeholder="" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="title">Release notes</label>
                        <input type="text"  class="form-control" name="release_version" autocomplete="off" onkeyup="getprocess_release_version()" id="release_version" value="<?=$product_detail['release_version']?>">
                        <!-- <input type="hidden" name="release_versionid" id="release_versionid" /> 
                           <ul id="release_versionSugguestion" ></ul> -->
                     </div>
                     <div class="form-group">
                        <label for="title">Ordering Information</label>
                        <input type="text"  class="form-control" autocomplete="off" onkeyup="getprocess_order_code()" id="order_code" name="order_code" value="<?=$product_detail['order_code']?>">
                     </div>
                  </div>
                  <div id="Error"></div>
               </div>
               <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>" >
               <?php $user_id = $this->session->userdata('user_id'); ?>
               <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>
            <fieldset id="menu2" class="display_block" style="display: none;">
    
<h3></h3>

<?php 
$i=0;
$connections = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));
   if($connections){ ?>   
<div class="row input_box">
<?php 
$count=count($input_process_stand)+1;
foreach($connections as $connection) {  ?>
<input type="hidden" value="<?php echo $connection['id'];?>" name="Connection_id">  
            
              <div class="col-md-3 set-44">
<!--               <div class="form-group">
                <label>Input </label>
                <input type="text" data-role="tagsinput" name="input_conn[]"  value="<?php echo $connection['input_conn'];?>" placeholder="" class="typeahead inputF tm-input form-control tm-input-info">
                <ul id="inputSugguestion" ></ul>
              </div> -->
             <div class="form-group">
                <label>Input <?php echo $i+1; ?></label>
                 <select id="e2_2" name="input_conn[<?php echo $i;?>][]" class="typeahead inputF tm-input form-control " multiple="multiple" style="width:275px" class="populate placeholder">
               <?php     
               
               $inputRes=explode(',',$connection['input_conn']);
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
              
               foreach($data as $k){
                   if($k){
                         $selected='';
                       if(in_array($k,$inputRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               ?>
                 </select>
              </div>


                

              </div>

              <div class="col-md-3 set-44">

              
  <?php //echo $input_process_stand[$key];?>
                    <!-- <div class="form-group">
                        <label>Input Standard</label>
                        <input type="text" data-role="tagsinput" name="input_process_stand[]"  value="<?php echo $connection['input_process_stand'];?>" placeholder="" class="typeahead instand tm-input form-control tm-input-info">
                    </div> -->
              
              <div class="form-group">
                <label>Input Standard</label>

        <select name="input_process_stand[<?php echo $i;?>][]" class="typeahead instand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
        $input_process_standRes=explode(',',$connection['input_process_stand']);
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
                       $selected='';
                       if(in_array($k,$input_process_standRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
              </div>
              
              </div>

              <div class="col-md-3 set-44">

                  <!-- <div class="form-group">
                      <label for="title">Input Connection Type</label>
                      <input type="text" data-role="tagsinput" class="typeahead inprocessConnection tm-input form-control tm-input-info" value="<?php echo $connection['process_connection'];?>" name="process_connection[]" >
                  </div> -->
                  
              <div class="form-group">
                <label for="title">Input Connection Type</label>
               <select name="process_connection[<?php echo $i;?>][]" class="typeahead inprocessConnection tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

            <?php     
        $process_connectionRes=explode(',',$connection['process_connection']);

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
                       
                       $selected='';
                       if(in_array($k,$process_connectionRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>   
              </div>
          

              </div>
            

              <div class="col-md-3 set-22" >


               <div class="form-group">
                  <label title="for"></label><br>
                  <?php if($i==0){?>
                    <button type="button" class="btn btn-success btn-add" onclick="addanotherinput()">+
                    </button>

                  <?php  }else{?>

          <!-- <button type="button" class="btn btn-danger btn-remove" onclick="removeMoreSpecilities(<?php echo $i;?>)">- -->

            <input type="button" class="btn btn-danger RemoveInput" value="-">

                  <?php }?>


                  </div>

                </div>
                
   <?php $i++; } ?><div class="addanotherinputResponse col-sm-12"></div></div> <?php } else { ?>
   <div class="row input_box">

            <div class="col-md-3 set-44">

               <!-- <div class="form-group">
                <label>Input </label>
                <input type="text" data-role="tagsinput" id="input_conn" name="input_conn[]"  placeholder="" class="typeahead inputF tm-input form-control tm-input-info"  />
                <ul id="inputSugguestion" ></ul>
              </div> -->
              <div class="form-group">
                <label>Input 1</label>
                 <select id="e2_2" name="input_conn[0][]" class="typeahead inputF tm-input form-control " multiple="multiple" style="width:275px" class="populate placeholder">
               <?php     
                $data=array();
                $Input = $this->common_model->GetAllData('input_output','','input_conn','asc','','','','input_conn'); 
                foreach($Input as $InputSugg){
               $key= explode(',',$InputSugg['input_conn']);
               foreach($key as $k){
                   if($k){ }
                   $data[] =$k ;  
                  }  
                }
                $data=array_unique($data);
               foreach($data as $k){
                   if($k){
                   echo '<option>'.$k.'</option>';
                   }
                  }
               $data=array(); ?>
                 </select>
              </div>
        </div>
      

        <div class="col-md-3 set-44">

              <!-- <div class="form-group">
                <label>Input Standard</label>
                <input type="text"  data-role="tagsinput" name="input_process_stand[]"  placeholder="" class="typeahead instand tm-input form-control tm-input-info">
              </div> -->
            <div class="form-group">
                <label>Input Standard</label>

        <select name="input_process_stand[0][]" class="typeahead instand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     

                $Input = $this->common_model->GetAllData('input_output','','input_process_stand','asc','','','','input_process_stand'); 
                foreach($Input as $InputSugg){
               $key= explode(',',$InputSugg['input_process_stand']);
                foreach($key as $k){
                   if($k){
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
              
             
             </select>
              </div>
        </div>

<!-- <input type="text" value="" data-role="tagsinput" placeholder="Add tags" /> -->


            <div class="col-md-3  set-44">

                 <!--  <div class="form-group">
                      <label for="title">Input Connection Type</label>
                      <input type="text"  data-role="tagsinput" class="typeahead inprocessConnection tm-input form-control tm-input-info " name="process_connection[]" >
                  </div> -->
              <div class="form-group">
                <label for="title">Input Connection Type</label>
               <select name="process_connection[0][]" class="typeahead inprocessConnection tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

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
             </select>
              </div>
            </div>

            <div class="col-md-3  set-22">

              <div class="form-group">
                     
                      <label for="title"></label><br>

                      <button type="button" class="btn btn-success" onclick="addanotherinput()">+
                    </button>

                     <!--  <input type="checkbox" class="form-control" onclick="addanotherinput() ;"  > -->
                  </div>

            </div>

             <div class="addanotherinputResponse col-sm-12"></div>
</div>
   <?php } ?>

   <?php 
$i=0;

$out_connections = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));
if($out_connections){ ?>
<div class="row input_box">
<?php $count=count($out_process_stand)+1;

foreach($out_connections as $out_connection) {

 ?>  

        
<div class="col-md-3 set-44">

              <!-- <div class="form-group">
                <label>Output </label>
                <input type="text" data-role="tagsinput" name="out_conn[]"  value="<?php echo $out_connection['out_conn'];?>" placeholder="" class="typeahead outputF tm-input form-control tm-input-info">
              </div> -->

                <div class="form-group">
                <label>Output <?php echo $i+1; ?></label>
               <select name="out_conn[<?php echo $i;?>][]" class="typeahead outputF tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">
                <?php     
        $out_connRes=explode(',',$out_connection['out_conn']);

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
                    $selected='';
                      if($k){
                       if(in_array($k,$out_connRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
               }
               
               $data=array();
               
               ?>
              
             
             </select>  
              </div>

              </div>


              <div class="col-md-3 set-44">
                    <!-- <div class="form-group">
                        <label>Output Standard</label>
                        <input type="text" data-role="tagsinput" name="out_process_stand[]"  value="<?php echo $out_connection['out_process_stand'];?>" placeholder="" class="typeahead  otstand tm-input form-control tm-input-info">
                    </div> -->

                    <div class="form-group">
                <label>Output Standard</label>

              <select name="out_process_stand[<?php echo $i;?>][]" class="typeahead otstand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

                 <?php     
        $out_process_standRes=explode(',',$out_connection['out_process_stand']);

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
                    $selected='';
                      if($k){
                       if(in_array($k,$out_process_standRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
               }
               
               $data=array();
               
               ?>
              
             
             </select>    
              
              </div>
              
              
              
              </div>

              <div class="col-md-3 set-44">

              


<?php //echo $process_connection[$key];?>
              <!-- <div class="form-group">
                      <label for="title">Output Connection Type</label>
                      <input type="text" data-role="tagsinput" class="typeahead  otprocessConnection  tm-input form-control tm-input-info" value="<?php echo $out_connection['out_process_connection'];?>" name="out_process_connection[]" >
                  </div> -->

             <div class="form-group">
                      <label for="title">Output Connection Type</label>

                <select name="out_process_connection[<?php echo $i;?>][]" class="typeahead otprocessConnection tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

            <?php     
        $out_process_connectionRes=explode(',',$out_connection['out_process_connection']);

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
                    $selected='';
                      if($k){
                       if(in_array($k,$out_process_connectionRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
               }
               
               $data=array();
               
               ?>
              
             
             </select>  
                
                  </div>

             

                 
                
              

              </div>
            

              <div class="col-md-3 set-22" >


                <span class="form-group">
                <label title="for"></label><br>

<?php if($i==0){?>
                    <button type="button" class="btn btn-success btn-add" onclick="addanotheroutput()">+
                    </button>

                  <?php  }else{?>

          <!-- <button type="button" class="btn btn-danger btn-remove" onclick="removeMoreSpecilities(<?php echo $i;?>)">- -->

            <input type="button" class="btn btn-danger RemoveOutput" value="-">
                  <?php }?>


                  </span>

                </div>
            
 

<?php
$i++;

 }?>

<div class="addanotheroutputResponse col-sm-12"></div></div><?php } else { ?>
<div class="row input_box">
           <div class="col-md-3 set-44">

             <!--  <div class="form-group">
                <label>Output</label>
                <input type="text"   data-role="tagsinput" name="out_conn[]"  placeholder="" class="typeahead outputF tm-input form-control tm-input-info">
              </div> -->

               <div class="form-group">
                <label>Output 1</label>
               <select name="out_conn[0][]" class="typeahead outputF tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">
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
             </select>
              </div>

             </div>

              <div class="col-md-3 set-44">

              <!-- <div class="form-group">
                <label>Output Standard</label>
               <input type="text"   data-role="tagsinput"  name="out_process_stand[]"  placeholder="" class="typeahead  otstand tm-input form-control tm-input-info">
              </div> -->

              <div class="form-group">
                <label>Output Standard</label>

              <select name="out_process_stand[0][]" class="typeahead otstand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

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
              
             
             </select>
              
              </div>

          </div>

           <div class="col-md-3 set-44">
            
             <!--  <div class="form-group">
                      <label for="title">Output Connection Type</label>
                       <input type="text"   data-role="tagsinput"  class="typeahead  otprocessConnection  tm-input form-control tm-input-info" name="out_process_connection[]" >
                  </div> -->
                  <div class="form-group">
                      <label for="title">Output Connection Type</label>

                <select name="out_process_connection[0][]" class="typeahead otprocessConnection tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

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
              
             
             </select>
                
                  </div>
  

            </div>  

           



              <div class="col-md-3 set-22">

              <div class="form-group">
                      <label for="title"></label><br>

                       <button type="button" class="btn btn-success" onclick="addanotheroutput()">+
                    </button>

                      <!-- <input type="checkbox" class="form-control" onclick="addanotheroutput() ;"  > -->
                  </div>

            </div>

            <div class="addanotheroutputResponse col-sm-12"></div>
</div>
<?php } ?>

<?php 
$i=0;


$process_conn = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));


if($process_conn){ ?>
<div class="row input_box">
<?php $count=count($process_stand)+1;

foreach($process_conn as $process_con) {

   

      ?>  

              
              <div class="col-md-3 set-44">



              <!-- <div class="form-group">
                <label>Process </label>
                <input type="text" data-role="tagsinput" name="process[]"  value="<?php echo $process_con['process'];?>" placeholder="" class="typeahead  processsuggestion  tm-input form-control tm-input-info ">
              </div> -->

              <div class="form-group">
                <label>Process <?php echo $i+1; ?></label>

                <select name="process[<?php echo $i;?>][]" class="typeahead processsuggestion tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

              <?php     
        $processRes=explode(',',$process_con['process']);

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
                    $selected='';
                      if($k){
                       if(in_array($k,$processRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
               }
               
               $data=array();
               
               ?>
              
             
             </select>  
              </div>

                

              </div>

              <div class="col-md-3 set-44">

                    <!-- <div class="form-group">
                        <label>Process Standard</label>
                        <input type="text" data-role="tagsinput" name="process_stand[]"  value="<?php echo $process_con['process_stand'];?>" placeholder="" class="typeahead  processsuggestionStand  tm-input form-control tm-input-info">
                    </div> -->

                    <div class="form-group">
                <label>Process Standard</label>
<select name="process_stand[<?php echo $i;?>][]" class="typeahead processsuggestionStand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

            <?php     
        $process_standRes=explode(',',$process_con['process_stand']);

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
                    $selected='';
                      if($k){
                       if(in_array($k,$process_standRes)){
                           $selected='selected';
                       }
                   echo '<option '.$selected.'>'.$k.'</option>';
                   }
               }
               
               $data=array();
               
               ?>
              
             
             </select>    
              
              </div>
              
              
              
              </div>


                <div class="col-md-3 set-44">
             

                <span class="form-group">
                <label title="for"></label><br>

                  <?php if($i==0){?>
                    <button type="button" class="btn btn-success btn-add" onclick="addanotherprocess()">+
                    </button>

                  <?php  }else{?>

         

            <input type="button" class="btn btn-danger RemoveProcess" value="-">
                  <?php }?>


                  </span>

                </div>

            




<?php
$i++;

 } ?>

<div class="addanotherprocessResponse col-sm-12"></div></div><?php } else { ?>
<div class="row input_box">
  

          <div class="col-md-3 set-55">

             <!--  <div class="form-group">
                <label>Process </label>
                 <input type="text"   name="process[]"  autocomplete="off"   class="typeahead  processsuggestion  tm-input form-control tm-input-info ">
              </div> -->

               <div class="form-group">
                <label>Process 1</label>

                <select name="process[0][]" class="typeahead processsuggestion tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

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
              
             </select>
              </div>

          </div>

           <div class="col-md-3 set-55">

            <!--  <div class="form-group">
                <label>Process Standard</label>
               <input type="text"   name="process_stand[]"  autocomplete="off"  id="process_stand"  class="typeahead  processsuggestionStand  tm-input form-control tm-input-info">
                     <input type="hidden" name="process_standid" id="process_standid" /> 
                    <ul id="process_standSugguestion" ></ul>

              </div> -->
               <div class="form-group">
                <label>Process Standard</label>
<select name="process_stand[0][]" class="typeahead processsuggestionStand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

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
              
             
             </select>
              
              </div>

          </div>

           <div class="col-md-3 set-22">

              <div class="form-group">
                      <label for="title"></label><br>

                        <button type="button" class="btn btn-success" onclick="addanotherprocess()">+
                    </button>

                      <!-- <input type="checkbox" class="form-control" onclick="addanotherprocess() ;" > -->
                  </div>

            </div>
            
             <div class="addanotherprocessResponse col-sm-12"></div>


             <div id="Error"></div>

          </div>
<?php } ?>

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
            <fieldset id="menu3" class="display_block" style="display: none;">
               <h3></h3>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>Dealer website</label>
                        <input type="text" name="dealer_web_cont"  autocomplete="off" onkeyup="getprocess_dealer_web_cont()" id="dealer_web_cont" placeholder="" class="form-control" value="<?=$product_detail['dealer_web_cont']?>">
                        <!-- <input type="hidden" name="dealer_web_contid" id="dealer_web_contid" /> 
                           <ul id="dealer_web_contSugguestion" ></ul> -->
                     </div>
                     <div class="form-group">
                        <label>Dealer Contact</label>
                        <input type="text" name="dealer_contact"  autocomplete="off" onkeyup="getprocess_dealer_contact()" id="dealer_contact"  placeholder="" class="form-control" value="<?=$product_detail['dealer_contact']?>">
                        <!-- <input type="hidden" name="dealer_contactid" id="dealer_contactid" /> 
                           <ul id="dealer_contactSugguestion" ></ul> -->
                     </div>
                     <div class="form-group">
                        <label for="title">Dealer notes</label>
                        <textarea class="form-control"  name="dealer_notes" ><?=$product_detail['dealer_notes']?></textarea>
                        <!-- <input type="text" class="form-control" name="dealer_notes" > -->
                     </div>
                     <div class="form-group">
                        <label for="title">Warranty Details</label>
                        <textarea class="form-control"  name="warranty_detail"  ><?=$product_detail['warranty_detail']?></textarea>
                        <!-- <input type="text" class="form-control" name="warranty_detail" > -->
                     </div>
                     <div class="form-group">
                        <label for="title">Support Details</label>
                        <textarea class="form-control"  name="support_detail" ><?=$product_detail['support_detail']?></textarea>
                        <!-- <input type="text" class="form-control" name="support_detail" > -->
                     </div>
                     <div class="form-group">
                        <label>Gallery</label><br>
                        <div class="upload-btn-wrapper">
                           <button type="button" class="btn" id="upBtn"><i class="fa fa-upload"></i> Upload a file</button>
                           <input type="file" onchange="ValidateSingleInput(this);" name="gallery-image[]" id="gallery-image" accept="image/*" class="form-control imageUpload" value="Upload Photo" >
                        </div>
                        <div  id="preview" class="ddd__uus row gallaryimg">
                           <?php
                              $product_gallery = $this->common_model->GetAllData('product_gallery_image',array('product_id'=>$product_detail['id']));
                              //print_r($product_gallery);
                              
                                                   foreach ($product_gallery as $key => $gallery) {
                                                     ?>
                           <div class="col-md-2" id="cancel<?=$key?>">
                              <div class="img_div">
                                 <img style="height: 100px;" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image'];?>"><br>
                                 <input type="hidden"  value="<?=$gallery['id']?>" name="gallery-image-id[]">
                                 <span style="cursor:pointer"  class="cancel_cls" onclick="removeImg(<?=$key?>)">X</span>
                              </div>
                           </div>
                           <?php  
                              }
                              ?>
                        </div>
                     </div>
                  </div>
                  <div id="Error"></div>
               </div>
               <!-- 
                  <button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 
                  
                            <?php $user_id = $this->session->userdata('user_id'); ?>
                   -->
               <input type="button" name="previous" class="previous action-button" value="Previous" />
               <button type="submit" name="submit" class="submit action-button submitBtn" value="Update" >Update</button>
               <a  onclick="return (confirm('Are you sure?'))" href="<?php echo base_url();?>edit-my-product/<?php echo $product_detail['id'] ?>" class="submit action-button actionButtonSubmit "  >Cancel</a>
            </fieldset>
         </form>
      </div>
   </div>
</section>
<?php include_once 'include/footer2.php' ; ?>
<script>
   $("#Error").hide();
   
     function edit_function(){
   //e.preventDefault();
   // alert();
    //let file = document.getElementById('product_image2').files[0];
    
    let form = $('#msform')[0];
    let formData = new FormData(form);
    $.ajax({
      method: "POST",
      url: "<?php echo base_url(); ?>Product/edit_product_action?action=update_shop_product",
      data: formData,
      dataType: "JSON",
      mimeType: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {
        /*$(".submitBtn").html('<i class="fa fa-spinner"></i> Processing...');*/
        $(".submitBtn").prop('disabled', true);
        $("#editError").hide();
      }
    })
    .fail(function(response) {
      alert( "Try again later." );
    })
    .done(function(response) {
      if(response.status == 2){
        $("#editError").html(response.message);
        $("#editError").show();
      }
      if(response.status == 1) location.href=response.url;
    })
    .always(function() {
      $(".submitBtn").html('Update');
      $(".submitBtn").prop('disabled', false);
    });
   return false;  
   }
   
   
    jQuery(function() {
      jQuery(document).on("change","#gallery-image", function()
      {
        
         var total_file=document.getElementById("gallery-image").files.length;
         var divimage=jQuery("#preview img").length;
         
         for(var i=0;i<total_file;i++){
             k=divimage++;
              $('#preview').append('<div class="col-md-2" id="cancel'+k+'"><div class="img_div"><img style="height: 100px;" src='+URL.createObjectURL(event.target.files[i])+'><br><input type="file" name="gallery-image-orignal[]" class="form-control imageUpload" id="gallery-image-orignal'+k+'" accept="image/*" style="display:none;"><span style="cursor:pointer" class="cancel_cls" onclick="removeImg('+k+')">X</span></div></div>');
               document.querySelector("#gallery-image-orignal"+k).files = document.querySelector("#gallery-image").files;
        }
         
      jQuery('#upBtn').html('<i class="fa fa-upload"></i> Add New');
      });
   });
   
   function removeImg(i){
    var divimage=jQuery("#preview img").length;
    
    if(divimage <= 1){
      jQuery('#upBtn').html('<i class="fa fa-upload"></i> Upload a file');
    }
   jQuery('#cancel'+i).remove();
    
   }
   
    
</script>
<script>
   function openCity(evt, cityName) {
    var stepNum = cityName.replace('menu','');
    document.querySelectorAll('.az-step').forEach(function(btn){
        var s = btn.getAttribute('data-step');
        var numEl = btn.querySelector('.az-step-num');
        var labelEl = btn.querySelector('.az-step-label');
        if(parseInt(s) < parseInt(stepNum)){
            numEl.style.background = '#14213D';
            numEl.style.color = '#fff';
            labelEl.style.color = '#14213D';
            labelEl.style.fontWeight = '600';
        } else if(s === stepNum){
            numEl.style.background = '#FCA311';
            numEl.style.color = '#14213D';
            labelEl.style.color = '#14213D';
            labelEl.style.fontWeight = '600';
        } else {
            numEl.style.background = '#E5E5E5';
            numEl.style.color = '#999';
            labelEl.style.color = '#999';
            labelEl.style.fontWeight = '500';
        }
    });
    document.querySelectorAll('.az-step-connector').forEach(function(c,i){
        c.style.background = i < parseInt(stepNum)-1 ? '#14213D' : '#EBEBEB';
    });

     var i, display_block, tablinks;
     display_block = document.getElementsByClassName("display_block");
     for (i = 0; i < display_block.length; i++) {
       display_block[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(cityName).style.display = "block";
     evt.currentTarget.className += " active";
   }
</script>
<script type="text/javascript">
   var _validFileExtensions = [".jpg", ".png",".jpeg"];    
   function ValidateSingleInput(oInput) {
     if (oInput.type == "file") {
         var sFileName = oInput.value;
          if (sFileName.length > 0) {
             var blnValid = false;
             for (var j = 0; j < _validFileExtensions.length; j++) {
                 var sCurExtension = _validFileExtensions[j];
                 if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                     blnValid = true;
                     break;
                 }
             }
              
             if (!blnValid) {
                 alert("Sorry, This file is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                 oInput.value = "";
                 return false;
             }
         }
     }
     return true;
   }
   
   var _validFileExtensions = [".jpg", ".png",".jpeg"];    
   function preview_image(oInput) {
     if (oInput.type == "file") {
         var sFileName = oInput.value;
          if (sFileName.length > 0) {
             var blnValid = false;
             for (var j = 0; j < _validFileExtensions.length; j++) {
                 var sCurExtension = _validFileExtensions[j];
                 if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                     blnValid = true;
                     break;
                 }
             }
              
             if (!blnValid) {
                 alert("Sorry, This file is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                 oInput.value = "";
                 return false;
             }
         }
     }
     return true;
   }
</script>
<script type="text/javascript">
   //jQuery time
   var current_fs, next_fs, previous_fs; //fieldsets
   var left, opacity, scale; //fieldset properties which we will animate
   var animating; //flag to prevent quick multi-click glitches
   
   $(".next").click(function(){
   
     var curStep = $(this).closest("fieldset"),
               curStepBtn = curStep.attr("id"),
               nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
               curInputs = curStep.find("input[type='text'],input[type='url']"),
               isValid = true;
           $(".form-group").removeClass("has-error");
           for (var i = 0; i < curInputs.length; i++) {
               if (!curInputs[i].validity.valid) {
                   isValid = false;
                   $(curInputs[i]).closest(".form-group").addClass("has-error");
               }
           }
           if(!isValid)
           {
             animating=false;
             return false;
           }
     if(animating) return false;
     animating = true;
     
     current_fs = $(this).parent();
     next_fs = $(this).parent().next();
     
      //activate next step on progressbar using the index of next_fs
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
      // Update premium step indicators
      var nextStepNum = $("fieldset").index(next_fs) + 1;
      updateAzSteps(nextStepNum);
     
     //show the next fieldset
     next_fs.show(); 
     //hide the current fieldset with style
     current_fs.animate({opacity: 0}, {
       step: function(now, mx) {
         //as the opacity of current_fs reduces to 0 - stored in "now"
         //1. scale current_fs down to 80%
         scale = 1 - (1 - now) * 0.2;
         //2. bring next_fs from the right(50%)
         left = (now * 50)+"%";
         //3. increase opacity of next_fs to 1 as it moves in
         //opacity = 1 - now;
         current_fs.css({
           'transform': 'scale('+scale+')',
           'position': 'absolute'
         });
         next_fs.css({'left': left,});
       }, 
       duration: 0, 
       complete: function(){
         current_fs.hide();
         animating = false;
       }, 
       //this comes from the custom easing plugin
       easing: 'easeInOutBack'
     });
   });
   
   $(".previous").click(function(){
     if(animating) return false;
     animating = true;
     
     current_fs = $(this).parent();
     previous_fs = $(this).parent().prev();
     
     //de-activate current step on progressbar
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
      $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
      // Update premium step indicators
      var prevStepNum = $("fieldset").index(previous_fs) + 1;
      updateAzSteps(prevStepNum);
     //show the previous fieldset
     previous_fs.show(); 
     //hide the current fieldset with style
     current_fs.animate({opacity: 1}, {
       step: function(now, mx) {
         //as the opacity of current_fs reduces to 0 - stored in "now"
         //1. scale previous_fs from 80% to 100%
         scale = 0.8 + (1 - now) * 0.2;
         //2. take current_fs to the right(50%) - from 0%
         left = ((1-now) * 50)+"%";
         //3. increase opacity of previous_fs to 1 as it moves in
         //opacity = 1 - now;
         //current_fs.css({'left': left});
         previous_fs.css({'transform': 'scale('+scale+')'});
       }, 
       duration: 0, 
       complete: function(){
         current_fs.hide();
         animating = false;
       }, 
       //this comes from the custom easing plugin
       easing: 'easeInOutBack'
     });
   });
   
   $(".submit").click(function(){
     //return false;
   })

   function updateAzSteps(activeStep){
    document.querySelectorAll('.az-step').forEach(function(btn){
        var s = parseInt(btn.getAttribute('data-step'));
        var numEl = btn.querySelector('.az-step-num');
        var labelEl = btn.querySelector('.az-step-label');
        if(s < activeStep){
            numEl.style.background = '#14213D';
            numEl.style.color = '#fff';
            labelEl.style.color = '#14213D';
            labelEl.style.fontWeight = '600';
        } else if(s === activeStep){
            numEl.style.background = '#FCA311';
            numEl.style.color = '#14213D';
            labelEl.style.color = '#14213D';
            labelEl.style.fontWeight = '600';
        } else {
            numEl.style.background = '#E5E5E5';
            numEl.style.color = '#999';
            labelEl.style.color = '#999';
            labelEl.style.fontWeight = '500';
        }
    });
    document.querySelectorAll('.az-step-connector').forEach(function(c, i){
        c.style.background = i < activeStep - 1 ? '#14213D' : '#EBEBEB';
    });
}
</script>
<script> 
//$.noConflict();
   $(document).ready(function() { 
        
          $(function() { 
              $( "#my_date_picker" ).datepicker({
                  changeMonth: true,
   changeYear: true,
   yearRange: '-115:+10',
   
              }   );
   
          }); 
          
          var min = new Date(),
   strMin = $.datepicker.formatDate("mm/dd/yy", min);
   min.setHours(min.getHours()+1);
   
          
         $('#theTime').timepicker({
   'step': 15,
   // 'minTime': formatTime(min),
   
   'forceRoundTime': true,
   'timeFormat': 'H:i',
   });
   $('#theTime').timepicker('setTime', min);
   
   
   function formatTime(dt) {
   return dt.getHours() + ': 00 ' + (dt.getHours() >= 12 ? 'pm' : 'am')
   }
   
      });
</script> 
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/redmond/jquery-ui.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.11/jquery.timepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.11/jquery.timepicker.js"></script>

<?php
$countpro=2;
$connections = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));
if($connections){
 $countpro=count($connections)+1;

}
?>
<script type="text/javascript">
   var count = '<?php echo $countpro;?>';
   function addanotherinput() {  
   
   //alert();
   
     var i=1;
   $.ajax({
     url:"<?php echo base_url(); ?>addanotherinput",
     type:"POST",
     data:{classid:i,count:count},
     beforeSend:function()
     {
     
       $('.btn-load-addMoreSpecilities').show();
   
     },
     success:function(data)
     {
       
         $('.addanotherinputResponse').append(data);
         $('.btn-load-addMoreSpecilities').hide();
              /*$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();*/
         return false;
     
     }
     
   });
   
   count++;

   }
   
   var count1 = '<?php echo $countpro;?>';
   function addanotheroutput() { 
   
   //alert();
   
     var j=1;
   $.ajax({
     url:"<?php echo base_url(); ?>addanotheroutput",
     type:"POST",
     data:{classid:j,count1:count1},
     beforeSend:function()
     {
     
       $('.btn-load-addMoreSpecilities').show();
   
     },
     success:function(data)
     {
       
         $('.addanotheroutputResponse').append(data);
         $('.btn-load-addMoreSpecilities').hide();
              /*$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();*/
         return false;
     
     }
     
   });
   count1++;
   
   }
   
   
   $(document).on("click", ".RemoveInput", function(){
   $(this).closest(".row").remove();
   });
   
   $(document).on("click", ".RemoveOutput", function(){
   $(this).closest(".row").remove();
   });
   
   $(document).on("click", ".RemoveProcess", function(){
   $(this).closest(".row").remove();
   });
   
   
   var count2 = '<?php echo $countpro;?>';
   function addanotherprocess() {  
   
   //alert();
   
     var k=1;
   
   $.ajax({
     url:"<?php echo base_url(); ?>addanotherprocess?classid="+k,
     type:"POST",
     data:{classid:k,count2:count2},
     beforeSend:function()
     {
     
       $('.btn-load-addMoreSpecilities').show();
   
     },
     success:function(data)
     {
       
         $('.addanotherprocessResponse').append(data);
         $('.btn-load-addMoreSpecilities').hide();
           
         return false;
     
     }
     
   });
   
   count2++;

   }
   
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script> -->
<!-- <script type="text/javascript">
   // bootstrap-tagsinput.js file - add in local
   $(function() {
     $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
   });
   </script> -->
<script>
   function getprocess_device_model() {
   
   var device_model = $("#device_model").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/device_model",
     type:"POST",
     data: {device_model:device_model},
     success:function(data)
     {
         $('#device_modelSugguestion').html(data);
         $("#device_modelSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   $(document).on('click','#device_modelSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#device_modelid").val(ID);
   $("#device_model").val(processName); 
   $("#device_modelSugguestion").css("display", "none");
   });
   
   
   function getprocess_latest_firmware_version() {
   
   
   var latest_firmware_version = $("#latest_firmware_version").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/latest_firmware_version",
     type:"POST",
     data: {latest_firmware_version:latest_firmware_version},
     success:function(data)
     {
   
         $('#latest_firmware_versionSugguestion').html(data);
         $("#latest_firmware_versionSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#latest_firmware_versionSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#latest_firmware_versionid").val(ID);
   $("#latest_firmware_version").val(processName); 
   $("#latest_firmware_versionSugguestion").css("display", "none");
   });
   
   
   function getprocess_mechanical_demension_mounting() {
   
   
   var mechanical_demension_mounting = $("#mechanical_demension_mounting").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/mechanical_demension_mounting",
     type:"POST",
     data: {mechanical_demension_mounting:mechanical_demension_mounting},
     success:function(data)
     {
   
         $('#mechanical_demension_mountingSugguestion').html(data);
         $("#mechanical_demension_mountingSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#mechanical_demension_mountingSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#mechanical_demension_mountingid").val(ID);
   $("#mechanical_demension_mounting").val(processName); 
   $("#mechanical_demension_mountingSugguestion").css("display", "none");
   });
   
   
   
   function getprocess_device_brand() {
   
   
   var device_brand = $("#device_brand").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/device_brand",
     type:"POST",
     data: {device_brand:device_brand},
     success:function(data)
     {
   
         $('#device_brandSugguestion').html(data);
         $("#device_brandSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#device_brandSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#device_brandid").val(ID);
   $("#device_brand").val(processName); 
   $("#device_brandSugguestion").css("display", "none");
   });
   
   
   function getprocess_release_version() {
   
   
   var release_version = $("#release_version").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/release_version",
     type:"POST",
     data: {release_version:release_version},
     success:function(data)
     {
   
         $('#release_versionSugguestion').html(data);
         $("#release_versionSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#release_versionSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#release_versionid").val(ID);
   $("#release_version").val(processName); 
   $("#release_versionSugguestion").css("display", "none");
   });
   
   
   function getprocess_order_code() {
   
   
   var order_code = $("#order_code").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/order_code",
     type:"POST",
     data: {order_code:order_code},
     success:function(data)
     {
   
         $('#order_codeSugguestion').html(data);
         $("#order_codeSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#order_codeSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#order_codeid").val(ID);
   $("#order_code").val(processName); 
   $("#order_codeSugguestion").css("display", "none");
   });
   
   
   function getprocess_dealer_contact() {
   
   
   var dealer_contact = $("#dealer_contact").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/dealer_contact",
     type:"POST",
     data: {dealer_contact:dealer_contact},
     success:function(data)
     {
   
         $('#dealer_contactSugguestion').html(data);
         $("#dealer_contactSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#dealer_contactSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#dealer_contactid").val(ID);
   $("#dealer_contact").val(processName); 
   $("#dealer_contactSugguestion").css("display", "none");
   });
   
   
   function getprocess_dealer_web_cont() {
   
   
   var dealer_web_cont = $("#dealer_web_cont").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/dealer_web_cont",
     type:"POST",
     data: {dealer_web_cont:dealer_web_cont},
     success:function(data)
     {
   
         $('#dealer_web_contSugguestion').html(data);
         $("#dealer_web_contSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#dealer_web_contSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#dealer_web_contid").val(ID);
   $("#dealer_web_cont").val(processName); 
   $("#dealer_web_contSugguestion").css("display", "none");
   });
   
   
   
   function getprocess_process() {
   
   
   var process = $("#process").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/process",
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
   $("#processid").val(ID);
   $("#process").val(processName); 
   $("#processSugguestion").css("display", "none");
   });
   
   
   
   
   function getprocess_process_stand() {
   
   
   var process_stand = $("#process_stand").val();
   
   $.ajax({
     url:"<?php echo base_url(); ?>/Product/process_stand",
     type:"POST",
     data: {process_stand:process_stand},
     success:function(data)
     {
   
         $('#process_standSugguestion').html(data);
         $("#process_standSugguestion").css("display", "block");
   
         return false;
     }
     
   });
   }
   
   
   $(document).on('click','#process_standSugguestion li',function(){
   var processName = $(this).html();
   var ID = $(this).attr('data-value');
   $("#process_standid").val(ID);
   $("#process_stand").val(processName); 
   $("#process_standSugguestion").css("display", "none");
   });
   
   
   
   
</script>
<script type="text/javascript" class="js-code-example-tokenizer"> 
   //input scrip select
   
   $(".inputF").select2({ tags: true, tokenSeparators: [';'],
                               separator: ";",     multiple: true,
   });
   
   $(".instand").select2({ tags: true, tokenSeparators: [',', ''] });
   
   $(".inprocessConnection").select2({ tags: true, tokenSeparators: [',', ''] });
   
   
</script>
<script type="text/javascript" class="js-code-example-tokenizer"> 
   //output scrip select
   
   $(".outputF").select2({ tags: true, tokenSeparators: [',', ''] });
   
   $(".otstand").select2({ tags: true, tokenSeparators: [',', ''] });
   
   $(".otprocessConnection").select2({ tags: true, tokenSeparators: [',', ''] });
   
   
</script>
<script type="text/javascript" class="js-code-example-tokenizer"> 
   //process scrip select
   
   $(".processsuggestion").select2({ tags: true, tokenSeparators: [',', ''] });
   
   $(".processsuggestionStand").select2({ tags: true, tokenSeparators: [',', ''] });
   
   
   
</script>
<script  async  src="https://js.stripe.com/v3/"  ></script>
	<?php  include_once 'include/footer2.php' ; ?>


<script src="<?php echo base_url();?>assets/site/js/popper.js"></script>
<script src="<?php echo base_url();?>assets/site/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/site/js/stellar.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors//isotope/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors//isotope/isotope-min.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors//owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url();?>assets/site/js/mail-script.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors//counter-up/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors//flipclock/timer.js"></script>
<script src="<?php echo base_url();?>assets/site/vendors//counter-up/jquery.counterup.js"></script>
<script src="<?php echo base_url();?>assets/site/js/theme.js"></script>
<?php if($this->session->userdata('user_id')){ ?>
<div class="modal fade" id="latest_stripe_modal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content stripe">
         <div class="modal-header">
            <h4 class="modal-title">Pay with card</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <form id="latest-stipe-from">
            <div class="modal-body">
               <div class="latest_stripe_err"></div>
               <div class="man_box_walt">
                  <div class="wollt1">
                     <h3 class="text"></i> Amount <span> AUD <span class="latest-strip-deposit-amount"></span></span> </h3>
                     <div id="card-element-card-number" class="margin-bottom20 col-md-12 form-control" style="
                        margin: 10px;
                        width: 45%;
                        " ></div>
                     <div id="card-element-card-expiry" class="margin-bottom20 col-md-6 form-control" style="width:45%;margin: 10px;" ></div>
                     <div id="card-element-card-cvc"    class="margin-bottom20 col-md-6 form-control" style="width:45%;margin: 10px;" ></div>
                     <p id="latest-stripe-card-error" class="text-danger" role="alert"></p>
                     <div class="form-group">
                        <button class="btn submit_btn btn-block btn-lg" id="latest-stipe-submit">
                        <span class="fa fa-spin fa-spinner" style="display:none;" id="latest-stipe-spinner"></span>
                        <span id="button-text">Pay</span>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<style>
   .InputElement {
   width: 100%;
   display: block;
   line-height: 1.42857143;
   transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
   padding: .438rem 1rem;
   background-clip: padding-box;
   border: 1px solid #d8d6de;
   border-radius: .357rem;
   height: 40px;
   font-size: 14px;
   }
</style>
<?php 
$paymentinfo = $this->db->query("SELECT * FROM `setting` ")->row_array();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
   $('#addform').on('submit', function(ev) {
       //alert();
       ev.preventDefault();
      show_lates_stripe_popup(<?php echo $paymentinfo['amount']; ?>,<?php $paymentinfo['amount']; ?>,<?php echo $user_id;?>,<?php echo $user_id;?>,<?php echo $user_id;?>,'purchasesession<?php echo $user_id;?>',''); 
   
       
   });
   
   
   function show_lates_stripe_popup(amount,actual_amt,onSuccess=null,onError=null,onCancel=null,popupId=null,id){
       
   var stripe = Stripe('<?php echo $this->config->item('stripe_key'); ?>');
       //$("#"+popupId).dialog('close');
       $('.latest-strip-deposit-amount').html(actual_amt);
       
       $('#latest_stripe_modal').modal({
       backdrop: 'static',
       keyboard: true
       });
       
       $("#latest-stipe-submit").prop('disabled',true);
   
       $('#card-element').show();
       
       
       
       fetch("home/createPaymentIntent/"+actual_amt, {
           method: "POST",
           headers: {
               "Content-Type": "application/json"
           }
       }).then(function(result) {
               return result.json();
       }).then(function(data) {
           var elements = stripe.elements();
           
           var elementStyles = {
       base: {
         color: '#32325D',
         fontWeight: 500,
         fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
         fontSize: '16px',
         fontSmoothing: 'antialiased',
   
         '::placeholder': {
           color: '#CFD7DF',
         },
         ':-webkit-autofill': {
           color: '#e39f48',
         },
       },
       invalid: {
         color: '#E25950',
   
         '::placeholder': {
           color: '#FFCCA5',
         },
       },
     };
          
          var elementClasses = {
       focus: 'focused',
       empty: 'empty',
       invalid: 'invalid',
     };
   
     var cardNumber = elements.create('cardNumber', {
       style: elementStyles,
       classes: elementClasses,
     });
     cardNumber.mount('#card-element-card-number');
   
     var cardExpiry = elements.create('cardExpiry', {
       style: elementStyles,
       classes: elementClasses,
     });
     cardExpiry.mount('#card-element-card-expiry');
   
     var cardCvc = elements.create('cardCvc', {
       style: elementStyles,
       classes: elementClasses,
     });
     cardCvc.mount('#card-element-card-cvc');
   
          var card= cardCvc;
       
   console.log(card);
   //console.log(card1);
   
           cardCvc.on("change", function (event) {
               // Disable the Pay button if there are no card details in the Element
               $("#latest-stipe-submit").prop('disabled',false);
               
               $("#latest-stripe-card-error").html(event.error ? event.error.message : "");
           });
           
           var form = document.getElementById("latest-stipe-from");
           form.addEventListener("submit", function(event) {
               event.preventDefault();
               
               // Complete payment when the submit button is clicked
               payWithCard(actual_amt,stripe, card, data.clientSecret, data.customerID,onSuccess,onError,onCancel,id);
           });
       });
       
   }
   
   
   
   var payWithCard = function(actual_amt,stripe, card, clientSecret, customerID,onSuccess=null,onError=null,onCancel=null,id) {
     loading(true);
     stripe.confirmCardPayment(clientSecret, {
           payment_method: {
               card: card
           },
       }).then(function(result) {
           if (result.error) {
               // Show error to your customer
               showError(result.error.message,result,onSuccess,onError,onCancel);
           } else {
               // The payment succeeded!
               orderComplete(actual_amt,result,customerID,onSuccess,onError,onCancel,id);
           }
       });
   };
   
   var orderComplete = function(actual_amt,result,customerID,onSuccess=null,onError=null,onCancel=null,id) {
     
      
           $.ajax({
               type:'post',
               url:'Product/pay_product',
               dataType:'JSON',
               data:{data:result,customerID:customerID,actual_amt:actual_amt},
               success:function(res){
                   if(res.status == 1){
                   
                   
                    add_function(id);
   
                    //window.location.href="<?php echo base_url();?>profile";
                  //  location.reload();
                   } else {
                       loading(false);
                       swal('Some problem occurred, please try again.');
                   }
               }
           });
           
        
   };
   
   var showError = function(errorMsgText,result,onSuccess=null,onError=null,onCancel=null) {
     loading(false); 
   
       $("#latest-stripe-card-error").show();
       $("#latest-stripe-card-error").html(errorMsgText);
       
   };
   
   // Show a spinner on payment submission
   var loading = function(isLoading) {
     if (isLoading) {
       // Disable the button and show a spinner
           $('#latest-stipe-submit').prop('disabled',true);
           $('#latest-stipe-spinner').show();
           $('#button-text').hide();
           
     } else {
           $('#latest-stipe-submit').prop('disabled',false);
           $('#latest-stipe-spinner').hide();
       $('#button-text').show();
     }
   };
   
   
</script>
<script>
   function myFunction() {
     alert("comming Soon");
   }
</script>
<?php } ?>
</body>
</html> 
<script>
   $(document).ready(function(){
    $(".filter-show .btn").click(function(){
    $(".left_sidebar_area").addClass("show-filterdiv");
    $("body").addClass("hiddenover");
   });
   $(".close-filter").click(function(){
    $(".left_sidebar_area").removeClass("show-filterdiv");
    $("body").removeClass("hiddenover");
   });
   });
</script>

<!-- device model script -->
 <?php 

$process_1 = $this->db->query('SELECT device_model FROM `product`  GROUP BY device_model')->result_array();
   $array=array();

   foreach($process_1 as $process_sugg){ 
$array[]=$process_sugg['device_model'];

    }

$deviceModelJson=json_encode($array);
?>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = <?php echo $deviceModelJson;?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("device_name"), countries);
</script>


<!-- device model script -->




<!-- device brand script -->
 <?php 

$process_12= $this->db->query('SELECT device_brand FROM `product`  GROUP BY device_brand')->result_array();
   $array_brand=array();
   foreach($process_12 as $process_brand){ 
   $array_brand[]=$process_brand['device_brand'];

    }

$devicebrandJson=json_encode($array_brand);
?>

<script>
function autocompleteForBrand(inp, arr){

  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
 }

/*An array containing all the country names in the world:*/
var brands = <?php echo $devicebrandJson;?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocompleteForBrand(document.getElementById("device_brand"), brands);
</script>


<!-- device brand script -->