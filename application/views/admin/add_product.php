<?php 
   include_once('include/header.php');
   
   ?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" /> -->


   <style type="text/css">
  /* bootstrap-tagsinput.css file - add in local */

.bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  display: inline-block;
  padding: 4px 6px;
  color: #555;
  vertical-align: middle;
  border-radius: 4px;
  max-width: 100%;
  line-height: 22px;
  cursor: text;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  padding: 0 6px;
  margin: 0;
  width: auto;
  max-width: inherit;
}
.bootstrap-tagsinput.form-control input::-moz-placeholder {
  color: #777;
  opacity: 1;
}
.bootstrap-tagsinput.form-control input:-ms-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput input:focus {
  border: none;
  box-shadow: none;
}
.bootstrap-tagsinput .tag {
  margin-right: 2px;
  color: blue;
}
.bootstrap-tagsinput .tag [data-role="remove"] {
  margin-left: 8px;
  cursor: pointer;
}
.bootstrap-tagsinput .tag [data-role="remove"]:after {
  content: "x";
  padding: 0px 2px;
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}



.nice-select.disabled {
    border-color: #ededed !important;
    color: #999;
    pointer-events: none;
    background-color: #e9ecef;
    opacity: 1;
}
.addmore {
    color: #fff;
    background-color: #14213D;
    border-color: #14213D;
}
.addmore:hover {
    color: #fff;
    background-color: #14213D;
    border-color: #14213D;
}
.addmore:focus {
    color: #fff;
    background-color: #14213D;
    border-color: #14213D;
}
.btn-danger {
    color: #fff;
    background-color: #FCA311;
    border-color: #FCA311;
}
.btn-danger:hover {
    color: #fff;
    background-color: #FCA311;
    border-color: #FCA311;
}
.input_box {
    border: 1px solid #c2c2c2;
    margin-bottom: 15px;
    padding-top: 16px;
    border-radius: 5px;
}
</style>




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
   border: 1px solid #C51919 !important;
   }
   .has-error .form-control {
   border-color: #f00 !important;
   }
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
   background-color: #F1F1F1;
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
   /*stacking fieldsets above each other*/
   position: relative;
   opacity: 1 !important;
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
   color: #333;
   background: #F1F1F1;
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
   background: #E1E1E1;
   position: absolute;
   left: -50%;
   top: 15px;
   z-index: -1; /*put it behind the numbers*/
   }
   
   #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #e1e1e1;
    position: absolute;
    left: -50%;
    top: 15px;
    z-index: 1;
}

   #progressbar li:first-child:after {
   /*connector not needed before the first step*/
   content: none;
   }
   /*marking active/completed steps green*/
   /*The number of the step and the connector before it = green*/
   #progressbar li.active:before/*,  #progressbar li.active:after*/
   ,#progressbar li:hover:before
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
   .form-group label {
    display: block;
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

.activedevice{
    background-color:gray;    
}
.activedevice1{
    background-color:gray;    
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

.list {
  max-height: 32`100px; // or whatever the height you want
  overflow-y: scroll !important;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 0;
    height: 40px;
    padding: 4px 0;
}
</style>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Product <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="productlist"><i class="fa fa-dashboard"></i> Product </a></li>
         <li class="active"><a href="#">Add Product </a></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div id="Error"></div>
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Product Detail</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <section class="add_product">
                  <div class="container">
                     <div class="form_add_product contact_form">
                        <!-- multistep form -->
<form id="msform" onsubmit="return add_function()">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="tablinks active" onclick="openCity(event, 'menu1')">Device Info</li>
    <li class="tablinks" onclick="openCity(event, 'menu2')">IPO Info</li>
   <li class="tablinks" onclick="openCity(event, 'menu3')">Dealer Info</li>
  </ul>
  <!-- fieldsets -->
  <fieldset id="menu1" class="display_block" style="display: block;">
    <h3></h3>
    <div class="row">

            <div class="col-sm-6">

              <div class="form-group">
                <label>Device Model</label>
              <div class="autocomplete" >

                          <input data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_name" name="device_model" >                        
</div>



              </div>

               



             <div class="form-group">
                      <label for="title">Mechanical dimensions 
                    <span style="float:right;">( Software Only <input type="checkbox" value="1" name="latest_firmware_version" id="checkme" style="width:auto !important" /> )</span></label> 

                      <input type="text"  class="form-control" name="mechanical_demension_mounting"  id="sendNewSms">

                      <!-- <input type="text"  class="form-control" name="mechanical_demension_mounting" autocomplete="off" onkeyup="getprocess_mechanical_demension_mounting()" id="mechanical_demension_mounting"> -->

                       <!-- <input type="hidden" name="mechanical_demension_mountingid" id="mechanical_demension_mountingid" /> 
                          <ul id="mechanical_demension_mountingSugguestion" ></ul>  -->

                  </div>


                   <div class="form-group">
                      <label for="title">Rack Units</label>
                     
                      <select class="form-control" name="rack_unit" id="sendNewSms1">
                        <option value="">Select</option>
                        
                         <?php 
                                for ($i = 1; $i <= 60; $i++){ ?>
                                   
                                    <option value="<?php echo "$i"; ?> RU"><?php echo "$i"; ?> RU</option> 

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
  //sendbtn1.disabled = !!this.checked;
  if(!this.checked){
        $('#sendNewSms1').prop('disabled', false);


  }else{
        $('#sendNewSms1').prop('disabled', true);




  }

  
  
};
</script>

 <div class="form-group">
                    <label for="title">Manual/Brochure (PDF)</label>
                    <input type="file"  class="form-control" accept="application/pdf"  name="device_manual_brochure" >
                  </div>


            </div>

            <div class="col-sm-6">

            
             <div class="form-group">
                <label>Device Brand</label>
              
<div class="autocomplete" >

                          <input data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_brand" name="device_brand" >                        
</div>
              </div>


                  <div class="form-group">
                    <label for="title">Date released</label>
                    <!-- <input type="date" class="form-control" name="date_released" > -->
                      <div class='right-inner-addon  date datepicker' data-date-format="yyyy-mm-dd">
                                    <input   type="text"  id="my_date_picker"  min="<?php echo date('Y-m-d');?>"   name="date_released" placeholder="" class="form-control">
                                        <i class="fa fa-calendar"></i>
                                </div>
                  </div>

  <div class="form-group">
                      <label for="title">Release notes</label>
                      <input  type="text" class="form-control" autocomplete="off" onkeyup="getprocess_release_version()" id="release_version" name="release_version" >

                        <!-- <input type="hidden" name="release_versionid" id="release_versionid" /> 
                    <ul id="release_versionSugguestion" ></ul> -->
                  </div>
                  <div class="form-group">
                    <label for="title">Ordering Information</label>
                    <input  type="text" class="form-control" autocomplete="off" onkeyup="getprocess_order_code()" id="order_code"  name="order_code" >

                    <!-- <input type="hidden" name="order_codeid" id="order_codeid" /> 
                    <ul id="order_codeSugguestion" ></ul> -->
                  </div>
                 

                  

          
            </div>
                      <!--   <div class="col-sm-6">

              <div class="form-group">
                    <label for="title">Manual/Brochure (PDF)</label>
                    <input type="file" class="form-control" accept="application/pdf"  name="device_manual_brochure" >
                  </div>
                </div> -->

             <div id="Error"></div>

          </div>
          <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>" >


    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset id="menu2" class="display_block" style="display: none;">
    
<h3></h3>
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

                      <button type="button" class="btn addmore" onclick="addanotherinput()">+
                    </button>

                     <!--  <input type="checkbox" class="form-control" onclick="addanotherinput() ;"  > -->
                  </div>

            </div>

             <div class="addanotherinputResponse col-sm-12"></div>
</div>
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

                       <button type="button" class="btn addmore" onclick="addanotheroutput()">+
                    </button>

                      <!-- <input type="checkbox" class="form-control" onclick="addanotheroutput() ;"  > -->
                  </div>

            </div>

            <div class="addanotheroutputResponse col-sm-12"></div>
</div>

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

             
              
             
             </select><?php     

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
              
              </div>

          </div>

           <div class="col-md-3 set-22">

              <div class="form-group">
                      <label for="title"></label><br>

                        <button type="button" class="btn addmore" onclick="addanotherprocess()">+
                    </button>

                      <!-- <input type="checkbox" class="form-control" onclick="addanotherprocess() ;" > -->
                  </div>

            </div>
            
             <div class="addanotherprocessResponse col-sm-12"></div>


             <div id="Error"></div>

          </div>
<!-- 
<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 

          <?php $user_id = $this->session->userdata('user_id'); ?>
 -->


    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset id="menu3" class="display_block" style="display: none;">

 <h3></h3>

          <div class="row">

            <div class="col-sm-12">

              <div class="form-group">
                <label>Dealer website</label>
                <input type="text"  name="dealer_web_cont"  autocomplete="off" onkeyup="getprocess_dealer_web_cont()" id="dealer_web_cont"  class="form-control">

               

                     <!--  <input type="hidden" name="dealer_web_contid" id="dealer_web_contid" /> 
                    <ul id="dealer_web_contSugguestion" ></ul> -->

              </div>
  <div class="form-group">
                <label>Dealer Contact</label>
                <input type="text"  name="dealer_contact"  autocomplete="off" onkeyup="getprocess_dealer_contact()" id="dealer_contact"   class="form-control">

                 <!-- <input type="hidden" name="dealer_contactid" id="dealer_contactid" /> 
                    <ul id="dealer_contactSugguestion" ></ul> -->

              </div>
              <div class="form-group">
                      <label for="title">Dealer notes</label>
                      <textarea class="form-control"  name="dealer_notes" ></textarea>
                      <!-- <input type="text" class="form-control" name="dealer_notes" > -->
                  </div>
              

              <div class="form-group">
                      <label for="title">Warranty Details</label>
                      <textarea class="form-control" name="warranty_detail"  ></textarea>
                      <!-- <input type="text" class="form-control" name="warranty_detail" > -->
                  </div>

                  <div class="form-group">
                      <label for="title">Support Details</label>
                      <textarea  class="form-control" name="support_detail" ></textarea>
                      <!-- <input type="text" class="form-control" name="support_detail" > -->
                  </div>

                 
          
              <div class="form-group">
                      
                        <label>Gallery</label><br>

                      <div class="upload-btn-wrapper">
                         <button type="button" class="btn" id="upBtn"><i class="fa fa-upload"></i> Upload a file</button>
                         <input  type="file"  name="gallery-image[]" id="gallery-image" accept="image/*" onchange="ValidateSingleInput(this)" class="form-control imageUpload" >
                      </div>

                      <div  id="preview" class="row gallaryimg">
                      </div>

                    </div>


            </div>

            

             <div id="Error"></div>

          </div>
<!-- 
<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 

          <?php $user_id = $this->session->userdata('user_id'); ?>
 -->

      <input type="button" name="previous" class="previous action-button " value="Previous" />
   

    

 <button type="submit" name="submit" class="submit action-button actionButtonSubmit submitBtn" value="Submit" >Submit</button>

    <a onclick="return (confirm('Are you sure?'))" href="<?php echo base_url();?>Admin/add-product" class="submit action-button actionButtonSubmit" value="Submit" >Cancel</a>
 </form>

  </fieldset>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </section>
</div>


<?php include_once('include/footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function() {
      
  $(".inputF").select2({ tags: true,tokenSeparators: [';'],separator: ";",multiple: true,});
  $(".instand").select2({tags: true,tokenSeparators: [','] });
  $(".inprocessConnection").select2({tags: true, tokenSeparators: [',', ''] });
  $(".outputF").select2({tags: true,tokenSeparators: [','] });
  $(".otstand").select2({tags: true,tokenSeparators: [','] });
  $(".otprocessConnection").select2({tags: true,tokenSeparators: [','] });
  $(".processsuggestion").select2({tags: true,tokenSeparators: [','] });
  $(".processsuggestionStand").select2({tags: true,tokenSeparators: [','] });
      
    // var tags = $(".inputF").tagsManager();
    // jQuery(".inputF ").typeahead({
    //   source: function (query, process) {
    //     return $.get('<?php echo base_url(); ?>Admin/Product/inputSugguestion', { query: query }, function (data) {
    //       data = $.parseJSON(data);
    //       return process(data);
    //     });
    //   },
    //   afterSelect :function (item){
    //     tags.tagsManager("pushTag", item);
    //   }
    // });
    
    // var tags1 = $(".instand").tagsManager();
    // jQuery(".instand").typeahead({
    //   source: function (query, process) {
    //     return $.get('<?php echo base_url(); ?>Product/inputProcessSatndardSugguestion', { query: query }, function (data) {
    //       data = $.parseJSON(data);
    //       return process(data);
    //     });
    //   },
    //   afterSelect :function (item){
    //     tags1.tagsManager("pushTag", item);
    //   }
    // });
    
    
    // var tags2 = $(".inprocessConnection").tagsManager();
    // jQuery(".inprocessConnection").typeahead({
    //   source: function (query, process) {
    //     return $.get('<?php echo base_url(); ?>Product/inputconnectionTypeSugguestion', { query: query }, function (data) {
    //       data = $.parseJSON(data);
    //       return process(data);
    //     });
    //   },
    //   afterSelect :function (item){
    //     tags2.tagsManager("pushTag", item);
    //   }
    // });
  
  
  
  //output connecttion
  
  // var tagsO = $(".outputF").tagsManager();
  //   jQuery(".outputF ").typeahead({
  //     source: function (query, process) {
  //       return $.get('<?php echo base_url(); ?>Product/outputSugguestion', { query: query }, function (data) {
  //         data = $.parseJSON(data);
  //         return process(data);
  //       });
  //     },
  //     afterSelect :function (item){
  //       tagsO.tagsManager("pushTag", item);
  //     }
  //   });
    
  //   var tagsO1 = $(".otstand").tagsManager();
  //   jQuery(".otstand").typeahead({
  //     source: function (query, process) {
  //       return $.get('<?php echo base_url(); ?>Product/outputProcessSatndardSugguestion', { query: query }, function (data) {
  //         data = $.parseJSON(data);
  //         return process(data);
  //       });
  //     },
  //     afterSelect :function (item){
  //       tagsO1.tagsManager("pushTag", item);
  //     }
  //   });
    
    
  //   var tagsO2 = $(".otprocessConnection").tagsManager();
  //   jQuery(".otprocessConnection").typeahead({
  //     source: function (query, process) {
  //       return $.get('<?php echo base_url(); ?>Product/outputconnectionTypeSugguestion', { query: query }, function (data) {
  //         data = $.parseJSON(data);
  //         return process(data);
  //       });
  //     },
  //     afterSelect :function (item){
  //       tagsO2.tagsManager("pushTag", item);
  //     }
  //   });
    
    
    //process 
    
    // var tagsP = $(".processsuggestion").tagsManager();
    // jQuery(".processsuggestion").typeahead({
    //   source: function (query, process) {
    //     return $.get('<?php echo base_url(); ?>Product/processsuggestion', { query: query }, function (data) {
    //       data = $.parseJSON(data);
    //       return process(data);
    //     });
    //   },
    //   afterSelect :function (item){
    //     tagsP.tagsManager("pushTag", item);
    //   }
    // });
    
    
    // var tagsPS = $(".processsuggestionStand").tagsManager();
    // jQuery(".processsuggestionStand").typeahead({
    //   source: function (query, process) {
    //     return $.get('<?php echo base_url(); ?>Product/processStandardsuggestion', { query: query }, function (data) {
    //       data = $.parseJSON(data);
    //       return process(data);
    //     });
    //   },
    //   afterSelect :function (item){
    //     tagsPS.tagsManager("pushTag", item);
    //   }
    // });
    
  });
</script>


<script>
   $("#Error").hide();
   function add_function(){
    //alert();
   // e.preventDefault();
    //let file = document.getElementById('product_image').files[0];
    let form = $('#msform')[0];
    let formData = new FormData(form);
    $.ajax({
      method: "POST",
      url: "Product/add_product_action?action=addNew",
      data: formData,
      dataType: 'JSON',
      mimeType: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {
        /*$(".actionButtonSubmit").html('<i class="fa fa-spinner"></i> Processing...');*/
        $(".actionButtonSubmit").prop('disabled', true);
        $("#Error").hide();
      }
    })
    .done(function(response) {
      if(response.status == 2){
        $("#Error").html(response.message);
        $("#Error").show();
      }
      if(response.status == 1 || response.status == 0) 
      { window.location.href='productlist'; }
    })
    .always(function() {
      $(".submitBtn").html('Submit');
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
             k=divimage+1;
              $('#preview').append('<div class="col-md-2" id="cancel'+k+'"><div class="img_div" ><span style="cursor:pointer" class="cancel_cls" onclick="removeImg('+k+')"><i class="fa fa-times"></i></span><img  style="height: 100px;" src='+URL.createObjectURL(event.target.files[i])+'><br><input type="file" name="gallery-image-orignal[]" class="form-control imageUpload" id="gallery-image-orignal'+k+'" accept="image/*" style="display:none;"></div></div>');
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
   
   /*$(document).on("click",".AppendInput", function(){
     $(this).is(':checked')
     if ($(this).is(':checked')) {
     var htmls='<div class="col-md-3 set-22"> <div class="form-group"> <label>Input </label><input type="text" name="input_conn"  placeholder="" class="form-control"></div></div><div class="col-md-3"<div class="form-group"> <label>Input Standard</label> <input type="text" name="input_process_stand"  placeholder="" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="title">Input Connection Type</label><input type="text" class="form-control" name="process_connection" ></div></div><div class="col-md-3"><div class="form-group"> <label for="title">Add Another Input</label><input type="checkbox" class="AppendInput"></div></div>';
       $(this).closest(".InputAppend").find(".AppendHere").append(htmls);
       }
     else {
       $(this).closest(".InputAppend").find(".AppendHere").remove();
     }  
   })*/
   
/*$(document).on("click", ".AddInput", function(){
      
    $.ajax({
       url:"<?php echo base_url(); ?>Admin/Product/addanotherinput",
       type:"POST",
       beforeSend:function()
       {
       
         $('.btn-load-addMoreSpecilities').show();
       },
       success:function(data)
       {
         
           $('.addanotherinputResponse').append(data);
           $('.btn-load-addMoreSpecilities').hide();
             $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
           return false;
       
       }
       
     });
   })

$(document).on("click", ".addanotheroutput", function(){
    
 $.ajax({
    url:"<?php echo base_url(); ?>Admin/Product/addanotheroutput",
    type:"POST",
    beforeSend:function()
    {
    
      $('.btn-load-addMoreOutput').show();

    },
    success:function(data)
    {
      
        $('.addanotheroutputResponse').append(data);
        $('.btn-load-addMoreOutput').hide();
          $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        return false;
    
    }
    
  });

});

$(document).on("click", ".RemoveOutput", function(){
$(this).closest(".row").remove();
});

$(document).on("click", ".RemoveInput", function(){
$(this).closest(".row").remove();
});


$(document).on("click", ".RemoveProcess", function(){
$(this).closest(".row").remove();
});


$(document).on("click", ".AnotherProcess", function(){
 $.ajax({
    url:"<?php echo base_url(); ?>Admin/Product/addanotherprocess",
    type:"POST",
    beforeSend:function()
    {
    
      $('.btn-load-addMoreProcess').show();

    },
    success:function(data)
    {
      
        $('.addanotherprocessResponse').append(data);
        $('.btn-load-addMoreProcess').hide();
          
        return false;
    
    }
    
  });
});*/



        $(document).ready(function() { 
             
               $(function() { 
                   $( "#my_date_picker" ).datepicker({
                       changeMonth: true,
                       changeYear: true,
                       yearRange: '-115:+10',
                       dateFormat: 'yy-dd-mm',
   
                   }   );
   
               }); 
               
               var min = new Date(),
     strMin = $.datepicker.formatDate("yy-mm-dd", min);
   min.setHours(min.getHours()+1);
   
   
   
   function formatTime(dt) {
     return dt.getHours() + ': 00 ' + (dt.getHours() >= 12 ? 'pm' : 'am')
   }
   
           });
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

<script type="text/javascript">
  // bootstrap-tagsinput.js file - add in local
$(function() {
    $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
  });
</script> -->


<script type="text/javascript">
  var count = 2;
  function addanotherinput() {  

//alert();

    var i=1;
 $.ajax({
    url:"<?php echo base_url(); ?>Admin/Product/addanotherinput",
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
          i++;
        return false;
    
    }
    
  });

count++;
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


var count1 = 2;
function addanotheroutput() { 

//alert();

    var j=1;
 $.ajax({
    url:"<?php echo base_url(); ?>Admin/Product/addanotheroutput",
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
          j++;
        return false;
    
    }
    
  });

count1++;
}

var count2 = 2;
function addanotherprocess() {  

//alert();

    var k=1;

 $.ajax({
    url:"<?php echo base_url(); ?>Admin/Product/addanotherprocess",
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
          k++;
        return false;
    
    }
    
  });

count2++;
}

</script>


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

$('div.containerdevice1').on('focus', 'li', function() { 
    $this = $(this);
    $this.addClass('activedevice1').siblings().removeClass();
    $this.closest('div.containerdevice1').scrollTop($this.index() * $this.outerHeight());
}).on('keydown', 'li', function(e) {
    $this = $(this);
    if (e.keyCode == 40) {       
        $this.next().focus();
        return false;
    } else if (e.keyCode == 38) {        
        $this.prev().focus();
        return false;
    }
}).find('li').first().focus();

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

$('div.containerdevice').on('focus', 'li', function() { 
    $this = $(this);
    $this.addClass('activedevice').siblings().removeClass();
    $this.closest('div.containerdevice').scrollTop($this.index() * $this.outerHeight());
}).on('keydown', 'li', function(e) {
    $this = $(this);
    if (e.keyCode == 40) {       
        $this.next().focus();
        return false;
    } else if (e.keyCode == 38) {        
  
      $this.prev().focus();
        return false;
    }
}).find('li').first().focus();



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


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">

<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>


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
echo $this->db->last_query();
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