<?php include_once 'include/header.php' ; ?>

<style type="text/css">
p.has-error {
    color: red;
    font-weight: bold;
}
.col-md-3.set-44, .col-md-3.set-55, .col-md-3.set-22{
	align-items: flex-start;
  
}
.col-md-3.set-22 .form-group .btn {
	margin-top:4px
}
.form-group input.btn{
	width:auto !important;
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

.col-lg-2{
  display: block;
  flex: 1;
  height: 450px;
  margin-top: 10px;
  margin-left: 80px;
  margin-right: 0px;
  background:none;
}

.container-flex{
  width: 90%;
  display: flex;
  align-items: flex-start;
    
}

.container-ipo{
  position:relative;
  margin-left: 0px;

}

.filler{
  flex: auto;
  height: 38px;
  border-bottom: solid 1px #ddd;
  
}

.col-box{
  display: none;
  margin-top: 0px;
  margin-left: 5px;
  padding: 10px;
  height: max-content;
  width: 100%;
  border-radius: 6px;
  background-color: #e5e5e5;
  
}

#box2{
  margin-top: 120Px;
}

#box3{
  margin-top: 240px;
}

#box4{
  margin-top: 360px;
}
</style>

<style>
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
		    border: 1px solid #c51919 !important;
	}
.has-error .form-control {
  border-color: #f00 !important;
}
.has-error .select2-selection {
  border-color: #f00 !important;
}
.has-error .btn {
  border-color: #f00 !important;
}


.nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus{

  background-color: #14213D;
    color: #fff;
}

.nice-select .list { max-height: 300px; overflow-y: scroll !important; }


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
  float: left;
  margin-left: 26.5px;
  overflow: hidden;
  border: none;
  background-color: transparent;
  width:max-content;
  
}

/* Style the buttons inside the tab */
.tab button {
  background-color: transparent;
  border-radius: 4px 4px 0 0;
  border-bottom: 1px solid #ddd;
  width: 150px;
  float: left;
  border: solid 1px #ddd;
  cursor: pointer;
  padding: 8px 10px;
  transition: 0.1s;
  font-size: 14px;
  
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: transparent;
  font-weight: bold;
  border-top: 3px solid orange;
  border-right: 1px solid #ddd;
  border-left: solid 1px #f0f0f0;
	border-bottom: none;
  
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
  margin: 0px 30px 30px 30px;
  position: relative;
  
}
#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 3px;
  box-shadow: 0px 10px 30px 0 rgba(0, 0, 0, .07);
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
/*progressbar*/

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

.nice-select.disabled {
    border-color: #ededed !important;
    color: #999;
    pointer-events: none;
    background-color: #e9ecef;
    opacity: 1;
}
/*delete*/
.autocomplete {
  width: 100%;
}
.autocomplete-items {
  position: absolute;
  z-index: 99;
  background: #fff;
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
.btn_cus {
	width: auto;
	background: #14213D;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 7px;
	cursor: pointer;
	padding: 10px 20px;
	margin: 10px 5px;
	text-align: center;
	position: relative;
}
.btn_cus .paypal-button-container {
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: 9;
	opacity: 0.01;
}
.btn_cus:hover, 
.btn_cus:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #14213D;
} 
#navbarSupportedContent .nav.navbar-nav.menu_nav.ml-auto {
	float: right;
}
#latest_stripe_modal.modal.fade .modal-dialog {
	transform: translate(0, 15%);
}
#testmodal.modal.fade .modal-dialog {
	transform: translate(0, 40%);
}
#testmodal, #latest_stripe_modal{
	z-index: +11111;
}
#latest_stripe_modal .form-group{
    position:static;
}

.paypal-button .paypal-button-label-container {
	height: 41px;
	max-height: 41px;
	min-height: 41px;
}
.paypal-button:not(.paypal-button-card) {
	width: 100px;
}
#zoid-paypal-button-64e90f5825 > .zoid-outlet {
	width: 100px !important;
	50px !important
}
.select2-container--default .select2-selection--single {
	background-color: #fff;
	border: 1px solid #aaa;
	border-radius: 0;
	height: 35px !important;
	padding: 0 0;
}
.select2.select2-container.select2-container--default {
	margin-bottom: 0 !important;
}
.modal-backdrop.fade.show {
	opacity: 0.1;
	max-height: ;
}
.modal-backdrop {
	position: fixed !important;
}
.navbar {
	margin-bottom: 0;
}
.navbar.navbar-expand-lg.navbar-light {
	margin-bottom: 0;
}
@media (max-width:767px){
    #navbarSupportedContent .nav.navbar-nav.menu_nav.ml-auto {
	width: 100%;
}
.navbar.navbar-expand-lg.navbar-light {
	margin-bottom: 0;
}
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
	color: #444;
	line-height: 35px;
}
</style>

<section class="banner_area add_product_img">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Add Item </h2>
				<div class="page_link">
					<a href="<?php echo base_url();?>">Home</a>
					<a href="<?php echo base_url();?>add-product">Add Item</a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="Progress">
  <div class= "container">
    <div class="container-flex">
      <div class="tab" id="progressbar">
      <button class="tablinks t1 active" onclick="openCity(event, 'menu1')">Device</button>
      <button class="tablinks t2" onclick="openCity(event, 'menu2')">I.P.O</nutton>
      <button class="tablinks t3" onclick="openCity(event, 'menu3')">Vendor </button>
   </div>
  <div class="filler"></div>
 </div> 
</div>
</section>
    

<section class="add_product">
 <div class="container-flex">
  <div class="col-lg-2 ">
   <div class="col-box" id="box1">
    <p><strong>Device Category</strong></p>
    <p>Select best describing categories for the device</p>
    <p>This Selection is Optional</p>
  </div>
   <div class="col-box" id="box2">
   <p><strong>Physical Inputs</strong></p>
    <p>Select the Input Type, Industry Standard and Connection Type for each input.</p>
    <p>Click on "+" to add more Inputs.</p>
   </div>
   <div class="col-box" id="box3">
   <p><strong>Physical Outputs</strong></p>
    <p>Select the Output Type, Industry Standard and Connection Type for each output.</p>
    <p>Click on "+" to add more Outputs.</p>
   </div>
   <div class="col-box" id="box4">
   <p><strong>Internal Process</strong></p>
    <p>Select the Type and Standard on the Process within the box.</p>
    <p>Click on "+" to add as many processes as required.</p>
   </div>
  </div>
  <div class="container-ipo">
    <div class="container">
     <div class="form_add_product contact_form"> 
	<!-- multistep form -->
   <form id="msform" action="#" name="myForm">
    <input type="hidden" id="paymentIntent_id" name="paymentIntent_id" value="0">
  <!-- fieldsets -->
  <fieldset id="menu1" class="display_block" style="display: block;">
   <h3></h3>
    <div class="row">
     <div class="col-sm-6">
      <div class="form-group">
        <label>Device Model</label>
            <div class="autocomplete" >
              <input type="text" required data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input sets_hidden1"  autocomplete="off" placeholder="" id="device_name" name="device_model" >                        
               <div id="responsemenu1"></div>
            </div>
        </div>

    <div class="form-group">
     <label for="title">Mechanical dimensions
      <span style="float:right;">( Software Only <input type="checkbox" value="1" name="latest_firmware_version" id="checkme" style="width:auto !important" /> )</span></label> 
       <input type="text"class="form-control sets_hidden1" name="mechanical_demension_mounting"  id="sendNewSms">
       <!-- <input type="text"  class="form-control" name="mechanical_demension_mounting" autocomplete="off" onkeyup="getprocess_mechanical_demension_mounting()" id="mechanical_demension_mounting"> -->
       <!-- <input type="hidden" name="mechanical_demension_mountingid" id="mechanical_demension_mountingid" /> 
       <ul id="mechanical_demension_mountingSugguestion" ></ul>  -->
    </div>


    <div class="form-group">
     <label for="title">Rack Units</label>
      <select required class="form-control sets_hidden1" name="rack_unit" style="height: calc(3.25rem + 2px);" >
       <option value="">Select</option>
    
       <?php 
        for ($i = 1; $i <= 50; $i++){
        $selected='';
        if($i==1){
        $selected='selected';
        }
        ?>
                                   
       <option value="<?php echo "$i"; ?> RU" ><?php echo "$i"; ?> RU</option> 

        <?php    };

        ?>
      </select>
    </div>

    

</script>

</script>
 <div class="form-group">
  <label for="title">Manual/Brochure (PDF)</label>
   <div style="border: 1px solid #C2C2C2;height: 35px;display: flex;align-items: center;justify-content: flex-start;padding-left: 5px;">
    <input required type="file" accept="application/pdf" class="sets_hidden1"  name="device_manual_brochure">
   </div>
 </div>
</div>

 <div class="col-sm-6">
 	<div class="form-group">
   <label>Device Brand</label>
    <div class="autocomplete" >
     <input required type="text" data-toggle="#hidden1" class="form-control sets_hidden1 rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_brand" name="device_brand" >                        
    </div>
  </div>


  <div class="form-group">
   <label for="title">Release Date</label>
   <!-- <input type="date" class="form-control" name="date_released" > -->
    <div class='right-inner-addon' data-date-format="yyyy-mm-dd">
     <input type="date"    min="<?php echo date('2010-01-01');?>"   name="date_released" placeholder="" class="form-control sets_hidden1">
    </div>
  </div>

  <div class="form-group">
   <label for="title">Release notes</label>
    <input type="text"  class="form-control sets_hidden1" name="release_version" autocomplete="off" onkeyup="getprocess_release_version()" id="release_version">
    <!--  <input type="hidden" name="release_versionid" id="release_versionid" /> 
    <ul id="release_versionSugguestion" ></ul> -->
  </div>

  <div class="form-group">
   <label for="title">Ordering Information</label>
    <input type="text"  class="form-control sets_hidden1" name="order_code" autocomplete="off" onkeyup="getprocess_order_code()" id="order_code" >
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

<div class="Error1"></div>
 <div id="Error"></div>

</div>

  <input required type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>" >
  <!--<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 
   <?php $user_id = $this->session->userdata('user_id'); ?> -->
    <div class="btnNxtEmail"></div>
      <input type="button" id="btnNxtEmail" name="next" class="next action-button next1 reg-next-button" value="Next" />

</fieldset>


<fieldset id="menu2" class="display_block" style="display: none;">
 <!--Reza-->
 
 <div class="row input_box" id="mcat">
  <div class="col-md-3 set-44" id="main_cat">
   <div class="form-group">
    <label>Main Category</label>
    <!--<input type="text"   id="input_conn" name="input_conn[]"  placeholder="" class="typeahead inputF tm-input form-control "  />-->
      <select id="e2_2" required name="Cat_A[0][]" id="Cat_A" required="" class="typeahead inputF tm-input form-control sets_hidden2" multiple="multiple" style="width:300px" class="populate placeholder">
       <div id="responsemenu2"></div>

      <?php     
        $data=array();
        $Input = $this->common_model->GetAllData('category','','','asc','','','','Cat_A'); 
        foreach($Input as $InputSugg){
        $key= explode(',',$InputSugg['Cat_A']);
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

    <!--<ul id="inputSugguestion" ></ul>-->
   </div>
  </div>


  <div class="col-md-3 set-44">
   <div class="form-group">
    <label>Sub-Category A</label>
     <select required name="Cat_B[0][]" class="typeahead instand tm-input form-control sets_hidden2" style="width:300px" multiple="multiple" class="populate placeholder">
       <?php     
         $Input = $this->common_model->GetAllData('category','','','asc','','','','Cat_B'); 
         foreach($Input as $InputSugg){
         $key= explode(',',$InputSugg['Cat_B']);
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

<!-- <input type="text" value="" data-role="tagsinput" placeholder="Add tags" /> -->


  <div class="col-md-3  set-44">
   <div class="form-group">
    <label for="title">Sub-Category B</label>
     <select required name="Cat_C[0][]" class="sets_hidden2 typeahead inprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
       <?php     
        $Input = $this->common_model->GetAllData('category','','','asc','','','','Cat_C');
        foreach($Input as $InputSugg){
        $key= explode(',',$InputSugg['Cat_C']);
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
</div> 

<h3></h3>
<!-- <fieldset> -->
  <div class="row input_box" id="inps">
   <div class="col-md-3 set-44">
    <div class="form-group">
     <label>Input 1</label>
     <!--<input type="text"   id="input_conn" name="input_conn[]"  placeholder="" class="typeahead inputF tm-input form-control "  />-->
       <select id="e2_2" required name="input_conn[0][]" id="input_conn" required="" class="typeahead inputF tm-input form-control sets_hidden2" multiple="multiple" style="width:300px" class="populate placeholder">
        <div id="responsemenu2"></div>
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
          foreach($data as $k){
          if($k){
          echo '<option>'.$k.'</option>';
          }
           }
          $data=array();

           ?>
       </select>
       <!--<ul id="inputSugguestion" ></ul>-->
    </div>
	</div>

  <div class="col-md-3 set-44">
   <div class="form-group">
    <label>Input Standard</label>
     <select required name="input_process_stand[0][]" class="typeahead instand tm-input form-control sets_hidden2" style="width:300px" multiple="multiple" class="populate placeholder">
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
   </select>
  </div>
 </div>

<!-- <input type="text" value="" data-role="tagsinput" placeholder="Add tags" /> -->

  <div class="col-md-3  set-44">
   <div class="form-group">
    <label for="title">Input Connection Type</label>
     <select required name="process_connection[0][]" class="sets_hidden2 typeahead inprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
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
      <button type="button" class="btn btn-success addmore" onclick="addanotherinput()">+ </button>
      <!--  <input type="checkbox" class="form-control" onclick="addanotherinput() ;"  > -->
   </div>
  </div>

  <div class="addanotherinputResponse col-sm-12"></div>
</div>
<!-- </fieldset> -->
  <div class="row input_box" id="outs">
   <div class="col-md-3 set-44">
     <div class="form-group">
       <label>Output 1</label>
        <select required name="out_conn[0][]" class="typeahead outputF tm-input form-control sets_hidden2" style="width:300px" multiple="multiple" class="populate placeholder">
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
   <div class="form-group">
    <label>Output Standard</label>
     <select required name="out_process_stand[0][]" class="typeahead otstand tm-input form-control sets_hidden2 " style="width:300px" multiple="multiple" class="populate placeholder">
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
   <div class="form-group">
    <label for="title">Output Connection Type</label>
     <select required name="out_process_connection[0][]" class="sets_hidden2 typeahead otprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
      <?php     
       $Input = $this->common_model->GetAllData('input_output','','out_process_connection','asc','','','','out_process_connection'); 
       foreach($Input as $InputSugg)
       {
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
      <button type="button" class="btn btn-success addmore" onclick="addanotheroutput()">+ </button>
      <!-- <input type="checkbox" class="form-control" onclick="addanotheroutput() ;"  > -->
    </div>
   </div>

  <div class="addanotheroutputResponse col-sm-12"></div>
</div>

  <div class="row input_box" id="proc">
   <div class="col-md-3 set-44">
    <div class="form-group">
     <label>Process 1</label>
      <select required  name="process[0][]" class="sets_hidden2 typeahead processsuggestion tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
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
      <!--  <input type="hidden" name="processid" id="processid" />  -->
      <!-- <ul id="processSugguestion" ></ul> -->
     </div>
    </div>

  <div class="col-md-3 set-44">
   <div class="form-group">
    <label>Process Standard</label>
     <select required name="process_stand[0][]" class="sets_hidden2 typeahead processsuggestionStand tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
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
    <!-- <input type="hidden" name="process_standid" id="process_standid" />  -->
    <!--  <ul id="process_standSugguestion" ></ul> -->
   </div>
  </div>
  <div class="col-md-3 set-44"></div>
  <div class="col-md-3 set-22">
   <div class="form-group">
    <label for="title"></label><br>
     <button type="button" class="btn btn-success addmore" onclick="addanotherprocess()">+  </button>
     <!-- <input type="checkbox" class="form-control" onclick="addanotherprocess() ;" > -->
    </div>
   </div>
            
  <div class="addanotherprocessResponse col-sm-12"></div>

  <div id="Error"></div>

 </div>

<!--<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 

          <?php $user_id = $this->session->userdata('user_id'); ?>
 -->

    <div class="btnNxtEmail1"></div>

    <input type="button" name="previous" class="previous prev2 action-button" value="Previous"/>
    <input type="button" name="next" id="btnNxtEmail1" class="next next2 action-button" value="Next" />
    <div class="Error2"></div>

  </fieldset>


  <fieldset id="menu3" class="display_block" style="display: none;">

 <h3></h3>

          <div class="row">

            <div class="col-sm-12">

              <div class="form-group">
                <label>Retailer website</label>
                <input type="text" required="required"  name="dealer_web_cont"  autocomplete="off" onkeyup="getprocess_dealer_web_cont()" id="dealer_web_cont"  class="form-control sets_hidden3">

               

                     <!--  <input type="hidden" name="dealer_web_contid" id="dealer_web_contid" /> 
                    <ul id="dealer_web_contSugguestion" ></ul> -->

              </div>
              <div class="form-group">
                <label>Dealer Contact</label>
                <input type="text" required  name="dealer_contact"  autocomplete="off" onkeyup="getprocess_dealer_contact()" id="dealer_contact"   class="form-control sets_hidden3">

                 <!-- <input type="hidden" name="dealer_contactid" id="dealer_contactid" /> 
                    <ul id="dealer_contactSugguestion" ></ul> -->
              </div>

              <div class="form-group">
                <label for="title">Dealer notes</label>
                <textarea  class="form-control sets_hidden3"  name="dealer_notes " ></textarea>
                <!-- <input type="text" class="form-control" name="dealer_notes" > -->
              </div>
              
              <div class="form-group">
                <label for="title">Warranty Details</label>
                <textarea  class="form-control sets_hidden3" name="warranty_detail"  ></textarea>
                <!-- <input type="text" class="form-control" name="warranty_detail" > -->
              </div>

              <div class="form-group">
                <label for="title">Support Details</label>
                <textarea  class="form-control sets_hidden3" name="support_detail" ></textarea>
                <!-- <input type="text" class="form-control" name="support_detail" > -->
              </div>

                 
          
              <div class="form-group">
                      
                        <label>Gallery</label><br>

                      <div class="upload-btn-wrapper">
                         <button type="button" class="btn" id="upBtn"><i class="fa fa-upload"></i> Upload a file</button>
                         <input  required type="file"  name="gallery-image[]" id="gallery-image" accept="image/*" onchange="ValidateSingleInput(this)" class="form-control sets_hidden3 imageUpload" >
                      </div>

                      <div  id="preview" class="row gallaryimg">
                      </div>

                    </div>


            </div>

            
             <div class="Error3"></div>
             <div id="Error"></div>

          </div>
<!-- 
<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 

          <?php $user_id = $this->session->userdata('user_id'); ?>
 -->

 </form>


<div class="btnNxtEmail2"></div>
 <input type="button" name="previous" class="previous prev3 action-button " value="Previous" />
  <input type="button" name="next" id="btnNxtEmail2" class="next next3 action-button" value="Submit" />
  <!--<a onclick="show_payment_option()" class="submit action-button " value="Submit" >Submit</a>-->
   <a onclick="return (confirm('Are you sure?'))" href="<?php echo base_url();?>add-product" class="submit action-button actionButtonSubmit " value="Submit" >Cancel</a>
   <?php
    $setting = $this->common_model->GetSingleData('setting','id=1');
    $amt=$setting['actual_amount'];
   ?>
   <input type="hidden" id="actual_amt" name="actual_amt" value="<?php echo $setting['actual_amount']; ?>">

      </fieldset>
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>

    <div id="testmodal" class="modal fade">
     
    <div class="modal-dialog" >
         
        <div class="modal-content">
             <form id="addform">
            <div class="modal-header">
                <?php
                $seing = $this->common_model->GetSingleData('setting','id=1');
                $amtt=$seing['actual_amount'];
                ?>
                <h3 class="text"></i> Total: <span> $<?php echo $amtt;?></span> </h3>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
                <div class="modal-body" style="text-align: center;">
                    
                <div class="form-group">
                <span id="paypal-button-container"></span>
               </div> 
                <div class="form-group">
                <button type="submit" name="submit" class="" value="" 
                
                
                style="
   height: 45px;
    width: 75%;
    overflow: hidden;
    min-width: 34px;
    color: #fff;
    background: #000;
    border: #000;
    border-radius: 5px;
" >Debit or Credit Card</button>




               </div> 
               
            </div>
            <!--<div class="modal-footer">
            </div>-->
             </form>
        </div>
      </div>
    </div>





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

<script>
   $("#Error").hide();

   function add_function(){

  //alert('hhhh');
    //e.preventDefault();
    //let file = document.getElementById('product_image').files[0];
    let form = $('#msform')[0];
    let formData = new FormData(form);
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>Product/add_product_action?action=addNew",
      data: formData,
      dataType: 'JSON',
      mimeType: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {
        /*$(".submitBtn").html('<i class="fa fa-spinner"></i> Processing...');*/
        $(".submitBtn").prop('disabled', true);
        $("#Error").getelementbyhide();
      }
    })
    .fail(function(response) {
      alert( "Try again later." );
    })
    .done(function(response) {
      if(response.status == 2){
        $("#Error").html(response.message);
        $("#Error").show();
      }
      if(response.status == 1 || response.status == 0) location.href=response.url;
    })
    .always(function() {
      $(".submitBtn").html('Submit');
      $(".submitBtn").prop('disabled', false);
    });
  }
   
  jQuery(function() {
      jQuery(document).on("change","#gallery-image", function()
      {
        
       var total_file=document.getElementById("gallery-image").files.length;
         var divimage=jQuery("#preview img").length;
         
         for(var i=0;i<total_file;i++){
             k=divimage+1;
              $('#preview').append('<div class="col-md-2 " id="cancel'+k+'"><div class="img_div" ><span style="cursor:pointer" class="cancel_cls" onclick="removeImg('+k+')"><i class="fa fa-times"></i></span><img  style="height: 100px;" src='+URL.createObjectURL(event.target.files[i])+'><br><input type="file" name="gallery-image-orignal[]" class="form-control imageUpload" id="gallery-image-orignal'+k+'" accept="image/*" style="display:none;"></div></div>');
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

<script type="text/javascript">

  var el_1 = document.getElementById('mcat');
  var hiddenDiv1 = document.getElementById('box1');
  
  el_1.addEventListener('mouseover', function handleMouseOver() {
  hiddenDiv1.style.display = 'block';
  //alert('fuck!!');

});

  el_1.addEventListener('mouseout', function handleMouseOut() {
  hiddenDiv1.style.display = 'none';

});
 </script>
 
 <script type="text/javascript">

var el_2 = document.getElementById('inps');
var hiddenDiv2 = document.getElementById('box2');

el_2.addEventListener('mouseover', function handleMouseOver() {
hiddenDiv2.style.display = 'block';
//alert('fuck!!');

});

el_2.addEventListener('mouseout', function handleMouseOut() {
hiddenDiv2.style.display = 'none';

});
</script>

<script type="text/javascript">

  var el_3 = document.getElementById('outs');
  var hiddenDiv3 = document.getElementById('box3');
  
  el_3.addEventListener('mouseover', function handleMouseOver() {
  hiddenDiv3.style.display = 'block';
  //alert('fuck!!');

});

  el_3.addEventListener('mouseout', function handleMouseOut() {
  hiddenDiv3.style.display = 'none';

});
 </script>

<script type="text/javascript">

  var el_4 = document.getElementById('proc');
  var hiddenDiv4 = document.getElementById('box4');
  
  el_4.addEventListener('mouseover', function handleMouseOver() {
  hiddenDiv4.style.display = 'block';
  //alert('fuck!!');

});

  el_4.addEventListener('mouseout', function handleMouseOut() {
  hiddenDiv4.style.display = 'none';

});
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

 var _validFileExtensions1 = [".pdf"];    
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


<!--  <script>
// function openCity(evt, cityName) {
//   var i, display_block, tablinks;
//   display_block = document.getElementsByClassName("display_block");
//   for (i = 0; i < display_block.length; i++) {
//     display_block[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//   document.getElementById(cityName).style.display = "block";
//   evt.currentTarget.className += " active";
// }
// </script> -->


<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/redmond/jquery-ui.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
 

<!--<script> -->
<!--     $(document).ready(function() { -->
        	
<!--            $(function() { -->
<!--                $( "#my_date_picker" ).datepicker({-->
<!--                    changeMonth: true,-->
<!--    changeYear: true,-->
<!--    yearRange: '-115:+10',-->

<!--                } 	);-->

<!--            }); -->
            
<!--            var min = new Date(),-->
<!--  strMin = $.datepicker.formatDate("mm/dd/yy", min);-->
<!--min.setHours(min.getHours()+1);-->

            
<!--           $('#theTime').timepicker({-->
<!--  'step': 15,-->
   <!--'minTime': formatTime(min),-->

<!--  'forceRoundTime': true,-->
<!--  'timeFormat': 'H:i',-->
<!--});-->
<!--$('#theTime').timepicker('setTime', min);-->


<!--function formatTime(dt) {-->
<!--  return dt.getHours() + ': 00 ' + (dt.getHours() >= 12 ? 'pm' : 'am')-->
<!--}-->

<!--        });-->
<!--</script> -->
<script type="text/javascript">
  
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var menu2
var menu3
// $(".next").click(function(e){
    
//     var v=0;
// //console.log(this);
// var stepId=this.id;
// $("."+stepId).html(' ');

//   var curStep = $(this).closest("fieldset"),
//             curStepBtn = curStep.attr("id"),
//             nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
//             curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='file'],input[type='search']");
//           // console.log(curInputs);
//             isValid = true;
//         $(".form-group").removeClass("has-error");
//         for (var i = 0; i < curInputs.length; i++) {
            
//              console.log(curInputs);
//             if (!curInputs[i].validity.valid) {
//             isValid = false;
//             $(curInputs[i]).closest(".form-group").addClass("has-erro1r");

//         $("."+stepId).html("<p class='has-error'> Require at least one field in a group to be filled.</p>");
//           v--;
//             }else{
//                 console.log(v);
//                  isValid =true;
//                  v++;
//             }
//         }
//             console.log(v);
            
//          //   return isValid;
//       //  alert(isValid);
//         if(v>0){
//             if(stepId=='btnNxtEmail'){
                
//                  $("#menu1 input").removeAttr('required');
//             }
//       else if(stepId=='btnNxtEmail1'){
//                  $("#menu2 input").removeAttr('required');
//             }
//      else if(stepId=='btnNxtEmail2'){
//                  $("#menu3 input").removeAttr('required');
//             }   
            
//          }
//         console.log('dsf'+isValid);
//         if(!isValid)
//         {
            
            
//           animating=false;
//           return false;
//         }
//   if(animating) return false;
//   animating = true;

//   current_fs = $(this).parent();
//   next_fs = $(this).parent().next();
  
//   //activate next step on progressbar using the index of next_fs
//   $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
//   //show the next fieldset
//   next_fs.show(); 
//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale current_fs down to 80%
//       scale = 1 - (1 - now) * 0.2;
//       //2. bring next_fs from the right(50%)
//       left = (now * 50)+"%";
//       //3. increase opacity of next_fs to 1 as it moves in
//       //opacity = 1 - now;
//       current_fs.css({
//         'transform': 'scale('+scale+')',
//         'position': 'absolute'
//       });
//       next_fs.css({'left': left,});
//     }, 
//     duration: 0, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });
  
//   if(stepId=='btnNxtEmail2'){
      
//      show_payment_option();
//   }
  
//       // }
// });

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar button").eq($("fieldset").index(current_fs)).removeClass("active");
  $("#progressbar button").eq($("fieldset").index(previous_fs)).addClass("active");
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
  if(document.getElementById('menu2').attr('hidden')){
  $('#menu1').show();
  $('#menu2').hide();
  }
});

$(".submit").click(function(){
  //return false;
})

</script>



<script type="text/javascript">
  var count = 2;
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
          i++;
        return false;
    
    }
    
  });
count++;

}
// $(document).on('keyup', ".bootstrap-tagsinput", function(e) {
//   var input_conn = $(".bootstrap-tagsinput").val();
// $.ajax({
//     url:"<?php echo base_url(); ?>Product/inputSugguestion",
//     type:"POST",
//     data: {input_conn:input_conn},
//     success:function(data)
//     {
//         $('#inputSugguestion').html(data);
//         $("#inputSugguestion").css("display", "block");
//         return false;
//     }
    
//   });
//   e.preventDefault();
// });

$(document).on('click','#inputSugguestion li',function(){
  var inpName = $(this).html();
  alert(inpName);
  $(".bootstrap-tagsinput").val(inpName); 
  $("#inputSugguestion").css("display", "none");
});


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
    url:"<?php echo base_url(); ?>addanotherprocess",
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

	<!--<script src="<?php echo base_url();?>assets/site/select/jquery-1.7.1.min.js"></script>-->
	<!--<script src="https://cdn.jsdelivr.net/select2/3.4.8/select2.js"></script>-->
<script type="text/javascript" class="js-code-example-tokenizer"> 

//input scrip select

$(".inputF").select2({ tags: true, tokenSeparators: [';'],
                            separator: ";",     multiple: true,
});

$(".instand").select2({ tags: true, tokenSeparators: [','] });

$(".inprocessConnection").select2({ tags: true, tokenSeparators: [',', ''] });


</script>

 
<script type="text/javascript" class="js-code-example-tokenizer"> 

//output scrip select

$(".outputF").select2({ tags: true, tokenSeparators: [','] });

$(".otstand").select2({ tags: true, tokenSeparators: [','] });

$(".otprocessConnection").select2({ tags: true, tokenSeparators: [','] });


</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 

//process scrip select

$(".processsuggestion").select2({ tags: true, tokenSeparators: [','] });

$(".processsuggestionStand").select2({ tags: true, tokenSeparators: [','] });



</script>
<script type="text/javascript">
  $(document).ready(function() {
      
      //input tags 
      
//     var tags = $(".inputF").tagsManager();
//     $(".inputF ").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/inputSugguestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       change :function (data){
//         tags.tagsManager("pushTag", data);
//       },
//   focus :function (data){
//         tags.tagsManager("pushTag", data);
//       },
//       afterSelect :function (data){
//         tags.tagsManager("pushTag", data);
//       }
//     });
    
//     var tags1 = $(".instand").tagsManager();
//     jQuery(".instand").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/inputProcessSatndardSugguestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tags1.tagsManager("pushTag", item);
//       }
//     });
    
    
//     var tags2 = $(".inprocessConnection").tagsManager();
//     jQuery(".inprocessConnection").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/inputconnectionTypeSugguestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tags2.tagsManager("pushTag", item);
//       }
//     });
  
  
  
//   //output connecttion
  
//   var tagsO = $(".outputF").tagsManager();
//     jQuery(".outputF ").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/outputSugguestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tagsO.tagsManager("pushTag", item);
//       }
//     });
    
//     var tagsO1 = $(".otstand").tagsManager();
//     jQuery(".otstand").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/outputProcessSatndardSugguestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tagsO1.tagsManager("pushTag", item);
//       }
//     });
    
    
//     var tagsO2 = $(".otprocessConnection").tagsManager();
//     jQuery(".otprocessConnection").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/outputconnectionTypeSugguestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tagsO2.tagsManager("pushTag", item);
//       }
//     });
    
    
//     //process 
    
//     var tagsP = $(".processsuggestion").tagsManager();
//     jQuery(".processsuggestion").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/processsuggestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tagsP.tagsManager("pushTag", item);
//       }
//     });
    
    
//     var tagsPS = $(".processsuggestionStand").tagsManager();
//     jQuery(".processsuggestionStand").typeahead({
//       source: function (query, process) {
//         return $.get('<?php echo base_url(); ?>Product/processStandardsuggestion', { query: query }, function (data) {
//           data = $.parseJSON(data);
//           return process(data);
//         });
//       },
//       afterSelect :function (item){
//         tagsPS.tagsManager("pushTag", item);
//       }
//     });
    
   });
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
                
                <h4 class="modal-title">Pay with card  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="latest-stipe-from">
                <div class="modal-body">
                    <div class="latest_stripe_err"></div>
                    <div class="man_box_walt">
                        <div class="wollt1"> 
                            <h3 class="text"></i> Total: <span> $<span class="latest-strip-deposit-amount"></span>.00</span> </h3>
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
<!--                            <img id="mpbutton" src="https://src.mastercard.com/assets/img/acc/global/src_mark_hor_blk.svg?locale=en_us&paymentmethod={acceptedCardBrands}&checkoutid={checkoutId}"/>                        </div>
-->                        </div> 
                   </div> 
                </div>  
            </form>
        </div>
        <div class="modal-footer">
<img src="<?php echo base_url();?>assets/secure.png" style="width: 300px;">
            
        </div>
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
    //ev.preventDefault();
    
     $('#testmodal').modal('hide');
   show_lates_stripe_popup(<?php echo $paymentinfo['amount'];?>,<?php echo $paymentinfo['amount']; ?>,<?php echo $user_id;?>,<?php echo $user_id;?>,<?php echo $user_id;?>,'purchasesession<?php echo $user_id;?>',''); 

    return false;
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
		
			console.log(data);
			console.log(data.paymentIntent_id);
			$("#paymentIntent_id").val(data.paymentIntent_id);
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
			
			
            payWithCard(actual_amt,stripe, card, data.clientSecret, data.customerID, data.paymentIntent_id,onError,onCancel,id);
        });
    });
    
}



var payWithCard = function(actual_amt,stripe, card, clientSecret, customerID ,paymentIntent_id,onError=null,onCancel=null,id) {
  loading(true);
  var onSuccess;
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
            orderComplete(actual_amt,result,customerID,paymentIntent_id,onError,onCancel,id);
        }
    });
};

var orderComplete = function(actual_amt,result,customerID,paymentIntent_id,onError=null,onCancel=null,id) {
  
   
        $.ajax({
            type:'post',
            url:'Product/pay_product',
            dataType:'JSON',
            data:{data:result,customerID:customerID,actual_amt:actual_amt,paymentIntent_id:paymentIntent_id},
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

<script type="text/javascript">
window.onkeydown = function(e) {
    return !(e.keyCode == 32 && (e.target.type != 'text' && e.target.type != 'textarea'));
};
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
//echo $this->db->last_query();
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





/*
const button = document.getElementById('mpbutton');

button.addEventListener('click', (ev) =>
  masterpass.checkout({
    checkoutId: '{{MASTERPASS_CHECKOUT_ID}}',
    allowedCardTypes: ['master', 'amex', 'visa'],
    amount: '10.00',
    currency: 'USD',
    cartId: '{{UNIQUE_ID}}',
    callbackUrl: '{{CALLBACK_URL}}'
  }));*/


</script>
<!-- device brand script -->


<!--PayPal Script-->

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<?php

//for sandbox
    $paypal_status=0;
   // for live
    $paypal_status=1;
    
    if($paypal_status==0){
    
    $paypal_type='sandbox';
    
    }else{

    $paypal_type='production';

    }

    $paypal_sandbox_key='AbFUHHDTEQG4EteC3ZRMK7DoKryECW8hzEWHiLd8d0DODYLo3DyZ8GI81pjXiHjTB23X8juloXOIV3BQ';

    $paypal_live_key='ASyCXreF_KPKY40QGH_x4isffV60_oL5rbv7XIStPu1fbht871k4uih8BmA06OVe37OQhxxCeJsJpHOp';
?>
<script>

    var paypalActions;

    // Render the PayPal button
    
    
    

    paypal.Button.render({

    commit: true, // Show Pay Now button

    style: {

        size: 'large',
        
       // color: 'black',
        
        shape: 'rect',
        
        tagline: 'false',
        
        label:   'paypal'
        
        
        
        //fundingicons :'true',

    },
  
    

    env: '<?php echo $paypal_type;?>',

// PayPal Client IDs - replace with your own

// Create a PayPal app: https://developer.paypal.com/developer/applications/create

client: {

sandbox: '<?php echo $paypal_sandbox_key;?>',

production: '<?php echo $paypal_live_key;?>'

},

// Buyer clicked the PayPal button.

payment: function(data, actions) {

 console.log('payment called');

  return actions.payment.create({

	payment: {

	  transactions: [{

		amount: {

		  total: $("#actual_amt").val(),

		  currency: 'AUD'

		}

	  }]

	}

  });

},

// Buyer logged in and authorized the payment

onAuthorize: function(data, actions) {


    console.log('onAuthorize called');

    return actions.payment.execute().then(function() {

	window.alert('Payment Complete!');
	
	var actual_amt = $("#actual_amt").val();
	
	var paymentType = 'Paypal';
	
	var paymentIntent_id = '';
    
    payment_process_paypal(paymentType,actual_amt,paymentIntent_id);

    });

},

}, '#paypal-button-container');



function payment_process_paypal(paymentType,actual_amt,paymentIntent_id){

// var planid=$('#selectedPanId').val();

// var payment=$('#total_amount').val();




//var userData='<?php echo json_encode($userData);?>';


//console.log(userData);


    $.ajax({
		url:"<?php echo base_url(); ?>Product/pay_product",
		type:"POST",
		dataType:'json',
    data:  {paymentType:paymentType,actual_amt:actual_amt,paymentIntent_id:paymentIntent_id},
		beforeSend:function()
	   	{
			$('.btn-load-payment').show();
		},
		success:function(data)
		{
    add_function();
		$('.btn-load-payment').hide();
		console.log(data);
  	 }

	});

}
</script>
<!--END-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
<script type="text/javascript">
            function show_payment_option(){
    jQuery.noConflict(); 

      $('#testmodal').modal('show');
}
</script>


<script type="text/javascript">
   $('#menu1').show();
   $('#menu2').hide();
   
</script>


<script type="text/javascript">
   $(document).on('click','.next1',function(){
   var counter1=0; 
     $('.sets_hidden1').each(function(){
      if($(this).val())
      {
        counter1=1;
        return false ;
       }
   });
   if(counter1)
   { 
  //alert('Success'); 
   $('#menu1').hide();
   $('#menu2').show();
   $('.t2').addClass('active');
   $('.t1').removeClass('active');
   $(".Error1").html('');
   }
   else
   {
      $(".Error1").html("<p class='has-error'> Requires at least one field in a group to be filled!</p>");  
   }

  });

   $(document).on('click','.next2',function(){
   var counter2=0; 
     $('.sets_hidden2').each(function(){
      if($(this).val())
      {
        console.log($(this).val());  
        counter2=1;
        return false ;
      }
   });
   if(counter2)
   { 
  // alert('Success 2'); 
   $('#menu1').hide();
   $('#menu2').hide();
   $('#menu3').show();
   $('.t3').addClass('active');
   $('.t2').removeClass('active');
   $(".Error2").html('');
   } 
    else
   {
      $(".Error2").html("<p class='has-error'> Requires at least one field in a group to be filled!</p>");  
   }

  });
  
   $(document).on('click','.next3',function(){
   var counter3=0; 
     $('.sets_hidden3').each(function(){
      if($(this).val())
      {
        counter3=1;
        return false ;
       }
   });
   if(counter3)
   { 
  // alert('Success 3'); 
   $('#menu1').hide();
   $('#menu2').hide();
   $(".Error3").html('');
   show_payment_option();
  // $('#menu2').show();
   }
    else
   {
    $(".Error3").html("<p class='has-error'> Requires at least one field in a group to be filled!</p>");  
   }

  }); 
</script>
