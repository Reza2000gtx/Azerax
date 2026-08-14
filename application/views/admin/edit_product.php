<?php include_once 'include/header.php' ;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<?php
   $id = $_REQUEST['id'];
    ?>
<style type="text/css">
   .az-page-section {
       background: #fff;
       border: 1px solid #EBEBEB;
       border-radius: 8px;
       padding: 24px 28px;
       margin-bottom: 20px;
   }
   .az-section-device { border-left: 4px solid #14213D; }
   .az-section-io { border-left: 4px solid #FCA311; }
   .az-section-vendor { border-left: 4px solid #14213D; }
   .az-section-header {
       display: flex;
       align-items: center;
       gap: 10px;
       margin-bottom: 18px;
   }
   .az-section-header .az-section-num {
       width: 24px;
       height: 24px;
       border-radius: 50%;
       font-size: 13px;
       font-weight: 600;
       display: flex;
       align-items: center;
       justify-content: center;
       flex-shrink: 0;
   }
   .az-section-device .az-section-num, .az-section-vendor .az-section-num {
       background: #14213D;
       color: #fff;
   }
   .az-section-io .az-section-num {
       background: #FCA311;
       color: #14213D;
   }
   .az-section-header .az-section-title {
       font-family: 'Inter', sans-serif;
       font-size: 15px;
       font-weight: 600;
       color: #14213D;
   }
   .az-btn {
       width: 110px;
       height: 42px;
       box-sizing: border-box;
       display: inline-flex;
       align-items: center;
       justify-content: center;
       font-family: 'Inter', sans-serif;
       font-size: 14px;
       font-weight: 600;
       border-radius: 8px;
       border: none;
       cursor: pointer;
       text-decoration: none;
       transition: background 0.15s ease, transform 0.1s ease;
   }
   .az-btn:active { transform: scale(0.97); }
   .az-btn-submit {
       background: #FCA311;
       color: #14213D;
       box-shadow: 0 2px 6px rgba(252,163,17,0.35);
   }
   .az-btn-submit:hover { background: #e8940a; color: #14213D; }
   .az-btn-cancel {
       background: #fff;
       color: #6b6f76;
       border: 1.5px solid #DADDE1;
   }
   .az-btn-cancel:hover { background: #F5F5F5; color: #43464b; border-color: #C7CBD1; }
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
    padding: 32px 0 250px;
    min-height: calc(100vh - 220px);
}
section.add_product .form_add_product {
    overflow: visible !important;
}
#msform {
    max-width: 960px;
    margin: 0 auto;
}
.pt-pill-btn {
    padding: 6px 16px;
    border-radius: 20px;
    border: 1.5px solid #14213D;
    background: transparent;
    color: #14213D;
    font-size: 12px;
    font-weight: 500;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    display: inline-block;
    margin-right: 6px;
}
.pt-pill-btn.active {
    background: #FCA311;
    border-color: #FCA311;
    color: #14213D;
}
.input_box {
    border: 1.5px solid #EBEBEB;
    border-radius: 10px;
    background: #FAFAFA;
    padding: 16px;
    margin-bottom: 16px;
}
.select2-hidden-accessible + .select2-container + .nice-select,
.select2-hidden-accessible + .nice-select {
    display: none !important;
}
.az-cat-chips {
    margin-top: 8px;
}
#sub_cat_a + .select2-container .select2-selection__choice,
#sub_cat_b + .select2-container .select2-selection__choice,
#io_input_type + .select2-container .select2-selection__choice,
#io_input_standard + .select2-container .select2-selection__choice,
#io_input_connection_type + .select2-container .select2-selection__choice,
#io_output_type + .select2-container .select2-selection__choice,
#io_output_standard + .select2-container .select2-selection__choice,
#io_output_connection_type + .select2-container .select2-selection__choice,
#io_process_type + .select2-container .select2-selection__choice,
#io_process_standard + .select2-container .select2-selection__choice,
#io_features + .select2-container .select2-selection__choice {
    display: none !important;
}
.az-cat-chip {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #14213D;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    border-radius: 6px;
    padding: 5px 8px 5px 10px;
    margin-bottom: 6px;
}
.az-cat-chip-remove {
    cursor: pointer;
    color: #FCA311;
    font-weight: 700;
    margin-left: 8px;
    line-height: 1;
}
#mcat .row {
    display: flex;
    align-items: stretch;
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
.previous {
    background: #FCA311 !important;
    color: #14213D !important;
    font-family: 'Inter', sans-serif !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    padding: 11px 28px !important;
    border-radius: 8px !important;
    border: none !important;
    cursor: pointer !important;
    text-align: center !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    line-height: normal !important;
}
.previous:hover { background: #e8940a !important; color: #14213D !important; }
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
   /*buttons - moved to top style block, old conflicting rule removed*/
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
            <input type="hidden" name="user_id" value="<?=$product_detail['user_id']?>" >
            <input type="hidden" name="id" value="<?=$product_detail['id']?>" >
            <!-- premium step indicator -->
            <div class="az-steps-bar" style="background:#fff;border-bottom:1px solid #EBEBEB;padding:0 20px;margin-bottom:24px;">
                <div style="display:flex;align-items:center;max-width:600px;margin:0 auto;padding:20px 0;">
                    <button type="button" class="tablinks az-step active" onclick="azStepClick(event, 'section-device', 1)" data-step="1" style="display:flex;align-items:center;gap:10px;background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                        <span class="az-step-num" style="width:32px;height:32px;border-radius:50%;background:#FCA311;color:#14213D;font-family:'Inter',sans-serif;font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all 0.2s;">1</span>
                        <span class="az-step-label" style="font-family:'Inter',sans-serif;font-size:13px;font-weight:600;color:#14213D;white-space:nowrap;">Device Info</span>
                    </button>
                    <div class="az-step-connector" style="flex:1;height:2px;background:#EBEBEB;margin:0 4px;"></div>
                    <button type="button" class="tablinks az-step" onclick="azStepClick(event, 'section-io', 2)" data-step="2" style="display:flex;align-items:center;gap:10px;background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                        <span class="az-step-num" style="width:32px;height:32px;border-radius:50%;background:#E5E5E5;color:#999;font-family:'Inter',sans-serif;font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all 0.2s;">2</span>
                        <span class="az-step-label" style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#999;white-space:nowrap;">I/O & Process</span>
                    </button>
                    <div class="az-step-connector" style="flex:1;height:2px;background:#EBEBEB;margin:0 4px;"></div>
                    <button type="button" class="tablinks az-step" onclick="azStepClick(event, 'section-vendor', 3)" data-step="3" style="display:flex;align-items:center;gap:10px;background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                        <span class="az-step-num" style="width:32px;height:32px;border-radius:50%;background:#E5E5E5;color:#999;font-family:'Inter',sans-serif;font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all 0.2s;">3</span>
                        <span class="az-step-label" style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#999;white-space:nowrap;">Vendor Info</span>
                    </button>
                </div>
            </div>
            <!-- sections -->
            <div id="section-device" class="az-page-section az-section-device">
              <div class="az-section-header"><span class="az-section-num">1</span><span class="az-section-title">Device</span></div>

              <div id="ai-autofill-box" style="background:#FFF8E8;border:1.5px solid #FCA311;border-radius:10px;padding:16px 20px;margin-bottom:20px;">
                <div id="ai-autofill-toggle" style="cursor:pointer;font-family:'Inter',sans-serif;font-weight:600;color:#14213D;font-size:14px;">
                  ▸ Auto-fill with AI &nbsp;<span style="font-weight:400;color:#999;font-size:12px;">— paste a product page link or upload a brochure PDF</span>
                </div>
                <div id="ai-autofill-panel" style="display:none;margin-top:14px;">
                  <div class="form-group">
                    <label style="font-size:12px;">Product page URL</label>
                    <input type="text" id="ai_source_url" class="form-control" placeholder="https://manufacturer.com/product-page">
                  </div>
                  <div class="form-group">
                    <label style="font-size:12px;">Or upload a brochure/spec PDF (this will also be saved as your product's downloadable brochure)</label>
                    <input type="file" id="ai_source_pdf" name="device_manual_brochure" accept="application/pdf" class="form-control" style="height:auto;padding:10px 12px;line-height:normal;">
                  </div>
                  <button type="button" id="ai_extract_btn" class="btn btn-warning" style="background:#FCA311;border-color:#FCA311;color:#14213D;font-weight:600;">Extract Info</button>
                  <span id="ai_extract_status" style="margin-left:10px;font-family:'Inter',sans-serif;font-size:13px;color:#666;"></span>
                  <div style="font-size:12px;color:#999;margin-top:8px;">This only fills in the fields below for you to review — nothing is saved until you check everything and click Submit.</div>
                </div>
              </div>

              <div class="input_box" id="mcat">
                <div class="row">
                  <div class="col-md-4" id="main_cat">
                    <div class="form-group">
                      <label>Main Category</label>
                      <select id="main_cat_select" name="main_cat[]" class="form-control">
                        <option value=""></option>
                        <?php
                          $data=array();
                          $Input = $this->common_model->GetAllData('category','','','asc','','','','Cat_A');
                          foreach($Input as $InputSugg){
                            $key= explode(',',$InputSugg['Cat_A']);
                            foreach($key as $k){ if($k){ $data[] =$k; } }
                          }
                          $data=array_unique($data);
                          $existing_cat_a = !empty($product_category['cat_a']) ? $product_category['cat_a'] : '';
                          foreach($data as $k){
                            if($k){
                              $sel = ($k == $existing_cat_a) ? 'selected' : '';
                              echo '<option '.$sel.'>'.$k.'</option>';
                            }
                          }
                          $data=array();
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Sub-Category A</label>
                      <select name="sub1_cat[]" id="sub_cat_a" class="form-control" multiple="multiple">
                        <?php
                          $existing_cat_b_list = !empty($product_category['cat_b']) ? explode(',', $product_category['cat_b']) : array();
                          if(!empty($existing_cat_a)){
                            $catBOptions = $this->db->query("SELECT DISTINCT Cat_B FROM category WHERE Cat_A = ?", array($existing_cat_a))->result_array();
                            foreach($catBOptions as $opt){
                              $sel = in_array($opt['Cat_B'], $existing_cat_b_list) ? 'selected' : '';
                              echo '<option '.$sel.' value="'.$opt['Cat_B'].'">'.$opt['Cat_B'].'</option>';
                            }
                          }
                        ?>
                      </select>
                      <div id="sub_cat_a_chips" class="az-cat-chips"></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="title">Sub-Category B</label>
                      <select name="sub2_cat[]" id="sub_cat_b" class="form-control" multiple="multiple">
                        <?php
                          $existing_cat_c_list = !empty($product_category['cat_c']) ? explode(',', $product_category['cat_c']) : array();
                          if(!empty($existing_cat_a) && !empty($existing_cat_b_list)){
                            $catCOptions = $this->db->query("SELECT DISTINCT Cat_C FROM category WHERE Cat_A = ? AND Cat_B = ?", array($existing_cat_a, $existing_cat_b_list[0]))->result_array();
                            foreach($catCOptions as $opt){
                              $sel = in_array($opt['Cat_C'], $existing_cat_c_list) ? 'selected' : '';
                              echo '<option '.$sel.' value="'.$opt['Cat_C'].'">'.$opt['Cat_C'].'</option>';
                            }
                          }
                        ?>
                      </select>
                      <div id="sub_cat_b_chips" class="az-cat-chips"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="input_box" style="margin-top:8px;">
                 <div style="margin-bottom:14px;">
                   <label>Product Type: </label>
                   <?php $pt = $product_detail['product_type'] ?: 'Hardware'; ?>
                   <span class="pt-pill-btn <?php if($pt=='Hardware')echo 'active';?>" data-value="Hardware">Hardware</span><span class="pt-pill-btn <?php if($pt=='Software')echo 'active';?>" data-value="Software">Software</span><span class="pt-pill-btn <?php if($pt=='Cloud Service')echo 'active';?>" data-value="Cloud Service">Cloud Service</span><span class="pt-pill-btn <?php if($pt=='AI Tool')echo 'active';?>" data-value="AI Tool">AI Tool</span><span class="pt-pill-btn <?php if($pt=='Hybrid')echo 'active';?>" data-value="Hybrid">Hybrid</span><input type="hidden" name="product_type" id="product_type" value="<?=$pt?>">
                 </div>
                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label>Brand</label>
                          <div class="autocomplete" >
                             <input data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_brand" name="device_brand" value="<?=$product_detail['device_brand']?>">
                          </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label>Model</label>
                          <div class="autocomplete" >
                             <input data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_name" name="device_model" value="<?=$product_detail['device_model']?>" >
                          </div>
                       </div>
                    </div>
                 </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" name="description" id="short_description" maxlength="255" rows="3" placeholder="A one-line summary of this product"><?=$product_detail['description']?></textarea>
                  </div>
                </div>
              </div>

               <div id="Error"></div>
               <input type="hidden" name="user_id" value="<?=$product_detail['user_id']?>" >
               <?php $user_id = $product_detail['user_id']; ?>
            </div>
            <div id="section-io" class="az-page-section az-section-io">
              <div class="az-section-header"><span class="az-section-num">2</span><span class="az-section-title">I/O &amp; Process</span></div>

              <div class="row" id="physical-specs-box" style="display:none;">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Mechanical dimensions</label>
                    <input type="text" class="form-control" name="mechanical_demension_mounting" id="sendNewSms" value="<?=$product_detail['mechanical_demension_mounting']?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Rack Units</label>
                    <select class="form-control" name="rack_unit" id="sendNewSms1">
                      <option value="">Select</option>
                      <?php for ($i = 1; $i <= 10; $i++){ ?>
                      <option <?php if($product_detail['rack_unit']== "$i RU" ){echo 'selected';}?> value="<?php echo "$i"; ?> RU"><?php echo "$i"; ?> RU</option>
                      <?php } ?>
                      <option <?php if($product_detail['rack_unit']== "10+ RU" ){echo 'selected';}?> value="10+ RU">10+ RU</option>
                    </select>
                  </div>
                </div>
              </div>

              <div id="category-attributes-box" style="display:<?= !empty($category_attribute_values) ? 'block' : 'none' ?>;border:1.5px solid #FCA311;border-radius:10px;padding:16px 20px;background:#FFF8E8;margin-bottom:20px;">
                  <div style="font-size:13px;font-weight:600;color:#14213D;margin-bottom:2px;">Category-specific details</div>
                  <div style="font-size:12px;color:#999;margin-bottom:14px;">These fields appear automatically based on the sub-category you selected</div>
                  <div id="category-attributes-fields">
                    <?php foreach($category_attribute_values as $cav){ ?>
                    <div class="form-group">
                      <label style="font-size:12px;"><?=$cav['attribute_name']?></label>
                      <input type="text" name="category_attribute[<?=$cav['category_attribute_id']?>]" class="form-control" style="margin-bottom:10px;" value="<?=$cav['value']?>">
                    </div>
                    <?php } ?>
                  </div>
              </div>

<h3></h3>

<?php 
$i=0;
$connections = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));
?>
   <div class="row input_box">

            <div class="col-md-3 set-44">

               <!-- <div class="form-group">
                <label>Input </label>
                <input type="text" data-role="tagsinput" id="input_conn" name="input_conn[]"  placeholder="" class="typeahead inputF tm-input form-control tm-input-info"  />
                <ul id="inputSugguestion" ></ul>
              </div> -->
              <div class="form-group">
                <label>Input 1</label>
                 <select id="io_input_type" name="input_conn[0][]" class="typeahead inputF tm-input form-control " multiple="multiple" style="width:275px" class="populate placeholder">
               <?php     
                $data=array();
                $existing_input_conn = !empty($connections[0]['input_conn']) ? explode(',', $connections[0]['input_conn']) : array();
                $Input = $this->common_model->GetAllData('input_output','','input_conn','asc','','','','input_conn'); 
                foreach($Input as $InputSugg){
               $key= explode(',',$InputSugg['input_conn']);
               foreach($key as $k){
                   if($k){ }
                   $data[] =$k ;  
                  }  
                }
                $data=array_unique(array_merge($data, $existing_input_conn));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_input_conn)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  }
               $data=array(); ?>
                 </select>
<div id="io_input_type_chips" class="az-cat-chips"></div>
              </div>
        </div>
      

        <div class="col-md-3 set-44">

              <!-- <div class="form-group">
                <label>Input Standard</label>
                <input type="text"  data-role="tagsinput" name="input_process_stand[]"  placeholder="" class="typeahead instand tm-input form-control tm-input-info">
              </div> -->
            <div class="form-group">
                <label>Input Standard</label>

        <select id="io_input_standard" name="input_process_stand[0][]" class="typeahead instand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
                $existing_input_stand = !empty($connections[0]['input_process_stand']) ? explode(',', $connections[0]['input_process_stand']) : array();
                $Input = $this->common_model->GetAllData('input_output','','input_process_stand','asc','','','','input_process_stand'); 
                foreach($Input as $InputSugg){
               $key= explode(',',$InputSugg['input_process_stand']);
                foreach($key as $k){
                   if($k){
                   }
                 $data[] =$k ;  
               }  
                }
                $data=array_unique(array_merge($data, $existing_input_stand));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_input_stand)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
<div id="io_input_standard_chips" class="az-cat-chips"></div>
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
               <select id="io_input_connection_type" name="process_connection[0][]" class="typeahead inprocessConnection tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
                $existing_input_conn_type = !empty($connections[0]['process_connection']) ? explode(',', $connections[0]['process_connection']) : array();
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
                $data=array_unique(array_merge($data, $existing_input_conn_type));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_input_conn_type)) ? 'selected' : ''; echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
             </select>
<div id="io_input_connection_type_chips" class="az-cat-chips"></div>
              </div>
            </div>

</div>

   <?php 
$i=0;

$out_connections = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));
?>
<div class="row input_box">
           <div class="col-md-3 set-44">

             <!--  <div class="form-group">
                <label>Output</label>
                <input type="text"   data-role="tagsinput" name="out_conn[]"  placeholder="" class="typeahead outputF tm-input form-control tm-input-info">
              </div> -->

               <div class="form-group">
                <label>Output 1</label>
               <select id="io_output_type" name="out_conn[0][]" class="typeahead outputF tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">
             <?php     
                $existing_out_conn = !empty($out_connections[0]['out_conn']) ? explode(',', $out_connections[0]['out_conn']) : array();
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
                $data=array_unique(array_merge($data, $existing_out_conn));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_out_conn)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
             </select>
<div id="io_output_type_chips" class="az-cat-chips"></div>
              </div>

             </div>

              <div class="col-md-3 set-44">

              <!-- <div class="form-group">
                <label>Output Standard</label>
               <input type="text"   data-role="tagsinput"  name="out_process_stand[]"  placeholder="" class="typeahead  otstand tm-input form-control tm-input-info">
              </div> -->

              <div class="form-group">
                <label>Output Standard</label>

              <select id="io_output_standard" name="out_process_stand[0][]" class="typeahead otstand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
                $existing_out_stand = !empty($out_connections[0]['out_process_stand']) ? explode(',', $out_connections[0]['out_process_stand']) : array();
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
                $data=array_unique(array_merge($data, $existing_out_stand));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_out_stand)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
<div id="io_output_standard_chips" class="az-cat-chips"></div>
              
              </div>

          </div>

           <div class="col-md-3 set-44">
            
             <!--  <div class="form-group">
                      <label for="title">Output Connection Type</label>
                       <input type="text"   data-role="tagsinput"  class="typeahead  otprocessConnection  tm-input form-control tm-input-info" name="out_process_connection[]" >
                  </div> -->
                  <div class="form-group">
                      <label for="title">Output Connection Type</label>

                <select id="io_output_connection_type" name="out_process_connection[0][]" class="typeahead otprocessConnection tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
                $existing_out_conn_type = !empty($out_connections[0]['out_process_connection']) ? explode(',', $out_connections[0]['out_process_connection']) : array();
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
                $data=array_unique(array_merge($data, $existing_out_conn_type));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_out_conn_type)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
<div id="io_output_connection_type_chips" class="az-cat-chips"></div>
                
                  </div>
  

            </div>  

           



</div>

<?php 
$i=0;


$process_conn = $this->common_model->GetAllData('input_output',array('product_id' =>$product_detail['id']));

?>

<div class="row input_box">
  

          <div class="col-md-3 set-55">

             <!--  <div class="form-group">
                <label>Process </label>
                 <input type="text"   name="process[]"  autocomplete="off"   class="typeahead  processsuggestion  tm-input form-control tm-input-info ">
              </div> -->

               <div class="form-group">
                <label>Process 1</label>

                <select id="io_process_type" name="process[0][]" class="typeahead processsuggestion tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
                $existing_process_type = !empty($process_conn[0]['process']) ? explode(',', $process_conn[0]['process']) : array();
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
                $data=array_unique(array_merge($data, $existing_process_type));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_process_type)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               ?>
              
             </select>
<div id="io_process_type_chips" class="az-cat-chips"></div>
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
<select id="io_process_standard" name="process_stand[0][]" class="typeahead processsuggestionStand tm-input form-control " style="width:275px" multiple="multiple" class="populate placeholder">

             <?php     
                $existing_process_standard = !empty($process_conn[0]['process_stand']) ? explode(',', $process_conn[0]['process_stand']) : array();
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
                $data=array_unique(array_merge($data, $existing_process_standard));
               foreach($data as $k){
                   if($k){
                   $sel = in_array(trim($k), array_map('trim', $existing_process_standard)) ? 'selected' : '';
                   echo '<option '.$sel.'>'.$k.'</option>';
                   }
                  
               }
               $data=array();
               
               ?>
              
             
             </select>
<div id="io_process_standard_chips" class="az-cat-chips"></div>
              
              </div>

          </div>

           

            
             

             <div id="Error"></div>

<div class="row input_box" id="feats" style="display:none;">
   <div class="col-md-6 set-44">
    <div class="form-group">
     <label>Features</label>
      <select id="io_features" name="features[0][]" class="typeahead tm-input form-control" multiple="multiple" style="width:300px">
       <?php     
        $Input = $this->common_model->GetAllData('input_output','','features','asc','','','','features'); 
        foreach($Input as $InputSugg){
        if(empty($InputSugg['features'])) continue;
        $key= explode(',',$InputSugg['features']);
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
<div id="io_features_chips" class="az-cat-chips"></div>
     </div>
    </div>
 </div>

          </div>

  </div>
            <div id="section-vendor" class="az-page-section az-section-vendor">
              <div class="az-section-header"><span class="az-section-num">3</span><span class="az-section-title">Vendor Info</span></div>
               <h3></h3>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>Vendor Contact &amp; Ordering Info</label>
                        <?php
                           $vendor_contact_parts = array();
                           if(!empty($product_detail['dealer_contact'])) $vendor_contact_parts[] = $product_detail['dealer_contact'];
                           if(!empty($product_detail['dealer_web_cont'])) $vendor_contact_parts[] = $product_detail['dealer_web_cont'];
                           if(!empty($product_detail['order_code'])) $vendor_contact_parts[] = $product_detail['order_code'];
                           $vendor_contact_combined = implode("\n", $vendor_contact_parts);
                        ?>
                        <textarea class="form-control" name="dealer_contact" id="dealer_contact" rows="3" placeholder="How can a buyer reach and order from you? e.g. website, phone, email, ordering process, lead times..."><?=$vendor_contact_combined?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="title">Vendor notes</label>
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
                           <button type="button" class="btn" id="upBtn"><i class="fa fa-upload"></i> Upload an image</button>
                           <input type="file" onchange="ValidateSingleInput(this);" name="gallery-image[]" id="gallery-image" accept="image/*" class="form-control imageUpload" value="Upload Photo" >
                        </div>
                        <div id="galleryPasteZone" tabindex="0" style="margin-top:8px;border:1.5px dashed #ccc;border-radius:6px;padding:10px 14px;font-size:12px;color:#999;cursor:text;">
                          Or click here and paste an image (Ctrl+V / Cmd+V)
                        </div>
                        <div style="font-size:12px;color:#999;margin:6px 0;">Select which image should be shown as the main product image:</div>
                        <div  id="preview" class="ddd__uus row gallaryimg">
                           <?php
                              $product_gallery = $this->common_model->GetAllData('product_gallery_image',array('product_id'=>$product_detail['id']));
                              //print_r($product_gallery);
                              
                                                   foreach ($product_gallery as $key => $gallery) {
                                                     $is_main = ($gallery['gallery_image'] == $product_detail['product_image']);
                                                     ?>
                           <div class="col-md-2" id="cancel<?=$key?>">
                              <div class="img_div" style="position:relative;<?php if($is_main){ echo 'border:3px solid #FCA311;border-radius:6px;padding:2px;'; } ?>">
                                 <span style="cursor:pointer;position:absolute;top:4px;right:4px;background:rgba(0,0,0,0.6);color:#fff;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;z-index:2;" class="cancel_cls" onclick="removeImg(<?=$key?>)">X</span>
                                 <img style="width:100%;height:100px;object-fit:cover;border-radius:4px;" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image'];?>">
                                 <label style="font-size:11px;font-weight:normal;display:block;margin-top:4px;">
                                   <input type="radio" name="main_gallery_image" value="<?=$gallery['gallery_image']?>" <?php if($is_main){ echo 'checked'; } ?>> Main image
                                 </label>
                                 <input type="hidden"  value="<?=$gallery['id']?>" name="gallery-image-id[]">
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
                  
                            <?php $user_id = $product_detail['user_id']; ?>
                   -->
            </div>
            <div style="display:flex;justify-content:center;align-items:center;gap:14px;padding:28px 0;">
               <button type="submit" name="submit" class="submitBtn az-btn az-btn-submit">Update</button>
               <a  onclick="return (confirm('Are you sure?'))" href="<?php echo base_url();?>edit-my-product/<?php echo $product_detail['id'] ?>" class="az-btn az-btn-cancel">Cancel</a>
            </div>
         </form>
      </div>
   </div>
</section>
<?php include_once 'include/footer.php' ; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
              <script type="text/javascript">
              $(document).ready(function(){
                  $('#ai-autofill-toggle').on('click', function(){
                      $('#ai-autofill-panel').slideToggle(200);
                  });
                  function setSelect2Value(selector, value){
                      if(!value) return;
                      var $el = $(selector);
                      if($el.length === 0) return;
                      // AI often returns multiple items as one comma-separated string
                      // (e.g. "AES67, RAVENNA, ST2110-30") - split into individual,
                      // separately-selectable/removable items instead of one big blob
                      var items = value.split(',').map(function(v){ return v.trim(); }).filter(function(v){ return v.length > 0; });
                      var existing = $el.val() || [];
                      $.each(items, function(i, item){
                          if($el.find("option[value='"+item.replace(/'/g,"\\'")+"']").length === 0){
                              $el.append(new Option(item, item, false, false));
                          }
                          if(existing.indexOf(item) === -1){
                              existing.push(item);
                          }
                      });
                      $el.val(existing);
                      $el.trigger('change');
                  }
                  $('#ai_extract_btn').on('click', function(){
                      var url = $('#ai_source_url').val();
                      var pdfFile = $('#ai_source_pdf')[0].files[0];
                      if(!url && !pdfFile){
                          $('#ai_extract_status').text('Please enter a URL or choose a PDF first.').css('color','#dc3545');
                          return;
                      }
                      var formData = new FormData();
                      formData.append('source_url', url);
                      if(pdfFile){ formData.append('source_pdf', pdfFile); }
                      $('#ai_extract_status').text('Reading and extracting... this can take a few seconds.').css('color','#666');
                      $('#ai_extract_btn').prop('disabled', true);
                      $.ajax({
                          url: '<?php echo base_url(); ?>Product/ai_extract',
                          type: 'POST', data: formData, processData: false, contentType: false, dataType: 'json',
                          success: function(res){
                              $('#ai_extract_btn').prop('disabled', false);
                              if(res.status == 1){
                                  var d = res.data;
                                  if(d.product_type){
                                      $('.pt-pill-btn').removeClass('active');
                                      $('.pt-pill-btn[data-value="'+d.product_type+'"]').addClass('active');
                                      $('#product_type').val(d.product_type);
                                  }
                                  if(d.main_category) $('#main_cat_select').val(d.main_category).trigger('change');
                                  if(d.device_model) $('#device_name').val(d.device_model);
                                  if(d.device_brand) $('#device_brand').val(d.device_brand);
                                  if(d.mechanical_demension_mounting) $('#sendNewSms').val(d.mechanical_demension_mounting);
                                  if(d.order_code) $('#dealer_contact').val(d.order_code);
                                  if(d.rack_unit) $('#sendNewSms1').val(d.rack_unit).trigger('change');
                                  if(d.short_description) $('#short_description').val(d.short_description);
                                  if(d.dealer_notes) $('textarea[name="dealer_notes "]').val(d.dealer_notes);
                                  if(d.warranty_detail) $('textarea[name="warranty_detail"]').val(d.warranty_detail);
                                  if(d.support_detail) $('textarea[name="support_detail"]').val(d.support_detail);
                                  setSelect2Value('select[name="input_conn[0][]"]', d.input_type);
                                  setSelect2Value('select[name="input_process_stand[0][]"]', d.input_standard);
                                  setSelect2Value('select[name="process_connection[0][]"]', d.input_connection_type);
                                  setSelect2Value('select[name="out_conn[0][]"]', d.output_type);
                                  setSelect2Value('select[name="out_process_stand[0][]"]', d.output_standard);
                                  setSelect2Value('select[name="out_process_connection[0][]"]', d.output_connection_type);
                                  setSelect2Value('select[name="process[0][]"]', d.process_type);
                                  setSelect2Value('select[name="process_stand[0][]"]', d.process_standard);
                                  setSelect2Value('select[name="features[0][]"]', d.features);
                                  $('#ai_extract_status').text('Done - please review every field before submitting.').css('color','#28a745');
                              } else {
                                  $('#ai_extract_status').text(res.message || 'Something went wrong.').css('color','#dc3545');
                              }
                          },
                          error: function(){
                              $('#ai_extract_btn').prop('disabled', false);
                              $('#ai_extract_status').text('Request failed. Please try again.').css('color','#dc3545');
                          }
                      });
                  });
              });
              </script>
              <script type="text/javascript">
              $(document).ready(function(){
                  function initRackUnits(){
                      if($("#sendNewSms1").hasClass('select2-hidden-accessible')){
                          return; // already initialized
                      }
                      $("#sendNewSms1").select2({ width: '100%' });
                  }
                  function togglePhysicalSpecs(){
                      var pt = $('#product_type').val();
                      var physical = (pt === 'Hardware' || pt === 'Hybrid');
                      $('#physical-specs-box').toggle(physical);
                      if(physical){
                          initRackUnits();
                      }
                      $('#feats').toggle(pt !== '');
                  }
                  $(document).on('change', '#product_type', togglePhysicalSpecs);
                  // product_type is a hidden input updated by pill-button clicks, so also
                  // re-check whenever a pill is clicked
                  $(document).on('click', '.pt-pill-btn', function(){
                      setTimeout(togglePhysicalSpecs, 0);
                  });
                  togglePhysicalSpecs();
              });
              </script>
              <script type="text/javascript">
              $('#sub_cat_b').on('change', function(){
                  var selected = $(this).val();
                  if(!selected || selected.length === 0){
                      $('#category-attributes-box').hide();
                      $('#category-attributes-fields').html('');
                      return;
                  }
                  var cat_c = selected[0];
                  $.ajax({
                      url: '<?php echo base_url(); ?>get-category-attributes',
                      method: 'POST',
                      data: {cat_c: cat_c},
                      dataType: 'json',
                      success: function(data){
                          if(!data || data.length === 0){
                              $('#category-attributes-box').hide();
                              $('#category-attributes-fields').html('');
                              return;
                          }
                          var html = '';
                          $.each(data, function(i, attr){
                              html += '<div class="form-group">';
                              html += '<label style="font-size:12px;">' + attr.attribute_name + '</label>';
                              html += '<input type="text" name="category_attribute[' + attr.id + ']" class="form-control" style="margin-bottom:10px;">';
                              html += '</div>';
                          });
                          $('#category-attributes-fields').html(html);
                          $('#category-attributes-box').show();
                      }
                  });
              });
              </script>
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
      url: "<?php echo base_url(); ?>Admin/Product/edit_product_action?action=update_shop_product",
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
              $('#preview').append('<div class="col-md-2" id="cancel'+k+'"><div class="img_div" style="position:relative"><span style="cursor:pointer;position:absolute;top:4px;right:4px;background:rgba(0,0,0,0.6);color:#fff;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;z-index:2;" class="cancel_cls" onclick="removeImg('+k+')">X</span><img style="width:100%;height:100px;object-fit:cover;border-radius:4px;" src='+URL.createObjectURL(event.target.files[i])+'><input type="file" name="gallery-image-orignal[]" class="form-control imageUpload" id="gallery-image-orignal'+k+'" accept="image/*" style="display:none;"></div></div>');
               document.querySelector("#gallery-image-orignal"+k).files = document.querySelector("#gallery-image").files;
        }
         
      jQuery('#upBtn').html('<i class="fa fa-upload"></i> Add New');
      });

      // Paste an image directly from the clipboard (e.g. a screenshot) instead
      // of having to save it to disk first and use the file picker.
      jQuery(document).on("paste", "#galleryPasteZone", function(e){
          var clipboardItems = (e.originalEvent.clipboardData || e.clipboardData).items;
          if(!clipboardItems) return;
          var foundImage = false;
          for(var idx = 0; idx < clipboardItems.length; idx++){
              var item = clipboardItems[idx];
              if(item.type && item.type.indexOf('image/') === 0){
                  foundImage = true;
                  var file = item.getAsFile();
                  var divimage = jQuery("#preview img").length;
                  k = divimage + 1;
                  $('#preview').append('<div class="col-md-2" id="cancel'+k+'"><div class="img_div" style="position:relative"><span style="cursor:pointer;position:absolute;top:4px;right:4px;background:rgba(0,0,0,0.6);color:#fff;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;z-index:2;" class="cancel_cls" onclick="removeImg('+k+')">X</span><img style="width:100%;height:100px;object-fit:cover;border-radius:4px;" src='+URL.createObjectURL(file)+'><input type="file" name="gallery-image-orignal[]" class="form-control imageUpload" id="gallery-image-orignal'+k+'" accept="image/*" style="display:none;"></div></div>');
                  var dt = new DataTransfer();
                  dt.items.add(file);
                  document.querySelector("#gallery-image-orignal"+k).files = dt.files;
                  jQuery('#upBtn').html('<i class="fa fa-upload"></i> Add New');
              }
          }
          if(foundImage){
              $('#galleryPasteZone').css('color', '#28a745').text('Image pasted! Paste another, or click Upload a file to add more.');
              setTimeout(function(){
                  $('#galleryPasteZone').css('color', '#999').text('Or click here and paste an image (Ctrl+V / Cmd+V)');
              }, 2500);
          }
      });
   });
   
   function removeImg(i){
    var divimage=jQuery("#preview img").length;
    
    if(divimage <= 1){
      jQuery('#upBtn').html('<i class="fa fa-upload"></i> Upload an image');
    }
   jQuery('#cancel'+i).remove();
    
   }
   
    
</script>
<script>
   function azUpdateStepStyling(stepNum){
    document.querySelectorAll('.az-step').forEach(function(btn){
        var s = btn.getAttribute('data-step');
        var numEl = btn.querySelector('.az-step-num');
        var labelEl = btn.querySelector('.az-step-label');
        if(parseInt(s) < parseInt(stepNum)){
            numEl.style.background = '#14213D';
            numEl.style.color = '#fff';
            labelEl.style.color = '#14213D';
            labelEl.style.fontWeight = '600';
        } else if(s === String(stepNum)){
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
    document.querySelectorAll('.az-step').forEach(function(btn){
        btn.classList.toggle('active', btn.getAttribute('data-step') === String(stepNum));
    });
   }

   function azScrollToSection(sectionId){
       var el = document.getElementById(sectionId);
       if(!el) return;
       var stepBar = document.querySelector('.az-steps-bar');
       var offset = stepBar ? stepBar.getBoundingClientRect().height : 0;
       var targetY = el.getBoundingClientRect().top + window.pageYOffset - offset - 16;
       window.scrollTo({ top: targetY, behavior: 'smooth' });
   }

   function azStepClick(evt, sectionId, stepNum){
       azUpdateStepStyling(stepNum);
       azScrollToSection(sectionId);
   }

   // Scrollspy: highlight the correct step as the user scrolls, not just on click
   (function(){
       var sections = [
           { id: 'section-device', step: 1 },
           { id: 'section-io', step: 2 },
           { id: 'section-vendor', step: 3 }
       ];
       if(!('IntersectionObserver' in window)) return;
       var observer = new IntersectionObserver(function(entries){
           entries.forEach(function(entry){
               if(entry.isIntersecting){
                   var match = sections.find(function(s){ return s.id === entry.target.id; });
                   if(match) azUpdateStepStyling(match.step);
               }
           });
       }, { rootMargin: '-40% 0px -40% 0px' });
       sections.forEach(function(s){
           var el = document.getElementById(s.id);
           if(el) observer.observe(el);
       });
   })();
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

        document.querySelectorAll('.pt-pill-btn').forEach(function(btn){
            btn.addEventListener('click', function(){
                document.querySelectorAll('.pt-pill-btn').forEach(function(b){ b.classList.remove('active'); });
                btn.classList.add('active');
                document.getElementById('product_type').value = btn.getAttribute('data-value');
            });
        });

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
   $("#io_features").select2({ tags: true, tokenSeparators: [','], placeholder: 'e.g. Multi-tenant support, SSO integration, Auto-scaling', width: '100%' });
   
   
   // ── Category fields ──
   $('#main_cat_select').select2({ placeholder: 'Select Main Category', allowClear: true, width: '100%' });
   $('#sub_cat_a').select2({ placeholder: 'Sub-Category A', multiple: true, width: '100%' });
   $('#sub_cat_b').select2({ placeholder: 'Sub-Category B', multiple: true, width: '100%' });

   function renderEditCatChips(selectId, containerId){
       var $select = $('#' + selectId);
       var $container = $('#' + containerId);
       var selected = $select.val() || [];
       var html = '';
       $select.find('option').each(function(){
           var val = $(this).val();
           if(val && selected.indexOf(val) > -1){
               html += '<div class="az-cat-chip" data-value="' + val.replace(/"/g,'&quot;') + '">';
               html += '<span>' + val + '</span>';
               html += '<span class="az-cat-chip-remove" data-select="' + selectId + '">&times;</span>';
               html += '</div>';
           }
       });
       $container.html(html);
   }
   $('#sub_cat_a').on('change', function(){ renderEditCatChips('sub_cat_a', 'sub_cat_a_chips'); });
   $('#sub_cat_b').on('change', function(){ renderEditCatChips('sub_cat_b', 'sub_cat_b_chips'); });
   // render on page load too, since these may be pre-filled from the existing product
   renderEditCatChips('sub_cat_a', 'sub_cat_a_chips');
   renderEditCatChips('sub_cat_b', 'sub_cat_b_chips');

   var ioChipFields = [
       ['io_input_type', 'io_input_type_chips'],
       ['io_input_standard', 'io_input_standard_chips'],
       ['io_input_connection_type', 'io_input_connection_type_chips'],
       ['io_output_type', 'io_output_type_chips'],
       ['io_output_standard', 'io_output_standard_chips'],
       ['io_output_connection_type', 'io_output_connection_type_chips'],
       ['io_process_type', 'io_process_type_chips'],
       ['io_process_standard', 'io_process_standard_chips'],
       ['io_features', 'io_features_chips']
   ];
   $.each(ioChipFields, function(i, pair){
       $('#' + pair[0]).on('change', function(){ renderEditCatChips(pair[0], pair[1]); });
       renderEditCatChips(pair[0], pair[1]);
   });

   // A separate widget (nice-select) sometimes also attaches to these same
   // fields and duplicates the selected items. CSS hiding proved unreliable
   // since its position in the DOM isn't consistent, so remove it directly.
   function removeCompetingNiceSelect(selectId){
       $('#' + selectId).siblings('.nice-select').remove();
   }
   var allChipFieldIds = ['main_cat_select', 'sub_cat_a', 'sub_cat_b'];
   $.each(ioChipFields, function(i, pair){ allChipFieldIds.push(pair[0]); });
   function cleanupNiceSelects(){
       $.each(allChipFieldIds, function(i, id){ removeCompetingNiceSelect(id); });
   }
   cleanupNiceSelects();
   setTimeout(cleanupNiceSelects, 500);

   $(document).on('click', '.az-cat-chip-remove', function(e){
       e.stopPropagation();
       e.stopImmediatePropagation();
       var selectId = $(this).data('select');
       var value = $(this).closest('.az-cat-chip').data('value');
       var $select = $('#' + selectId);
       var current = $select.val() || [];
       var updated = current.filter(function(v){ return v !== value; });
       $select.val(updated).trigger('change');
   });

   $('#main_cat_select').on('change', function(){
       var cat_a = $(this).val();
       $('#sub_cat_b').val(null).trigger('change');
       if(cat_a){
           $.ajax({
               url: '<?php echo base_url(); ?>get-cat-b',
               method: 'POST',
               data: {cat_a: cat_a},
               dataType: 'json',
               success: function(data){
                   var opts = '';
                   $.each(data, function(i, item){
                       opts += '<option value="'+item.Cat_B+'">'+item.Cat_B+'</option>';
                   });
                   $('#sub_cat_a').html(opts).trigger('change');
               }
           });
       } else {
           $('#sub_cat_a').html('').trigger('change');
       }
   });

   $('#sub_cat_a').on('change', function(){
       var cat_b = $(this).val();
       var cat_a = $('#main_cat_select').val();
       if(cat_b && cat_b.length > 0 && cat_a){
           cat_b = cat_b[0];
           $.ajax({
               url: '<?php echo base_url(); ?>get-cat-c',
               method: 'POST',
               data: {cat_a: cat_a, cat_b: cat_b},
               dataType: 'json',
               success: function(data){
                   var opts = '';
                   $.each(data, function(i, item){
                       opts += '<option value="'+item.Cat_C+'">'+item.Cat_C+'</option>';
                   });
                   $('#sub_cat_b').html(opts).trigger('change');
               }
           });
       }
   });
   
</script>
<script  async  src="https://js.stripe.com/v3/"  ></script>
	<?php  include_once 'include/footer.php' ; ?>


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
      show_lates_stripe_popup(<?php echo $paymentinfo['amount']; ?>,<?php echo $paymentinfo['amount']; ?>,<?php echo $user_id;?>,<?php echo $user_id;?>,<?php echo $user_id;?>,'purchasesession<?php echo $user_id;?>',''); 
   
       
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