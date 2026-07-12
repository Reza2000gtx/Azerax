<?php include_once 'include/header2.php';?><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<?php if($this->session->userdata('user_id') && $this->session->userdata('email_verified') == 0): ?>
<div style="background:#FFF3D6;border-bottom:2px solid #FCA311;padding:10px 40px;text-align:center;font-family:'Inter',sans-serif;font-size:13px;color:#14213D;">
    ⚠️ Please verify your email address to access all features. 
    <a href="<?php echo base_url(); ?>resend-verification" style="color:#FCA311;font-weight:600;text-decoration:none;margin-left:8px;">Resend verification email →</a>
</div>
<?php endif; ?>
<style type="text/css">
	#showSearchDiv.show_div {
	display: block;
}
.select2-search.select2-search--inline {
	width: 100% !important;
}
.select2-search__field {
	width: 100% !important;
}

.autocomplete {
	width: 100%;
  
}


.autocomplete-items {
    position: absolute;
    z-index: 10000;
    background: #e5e5e5;
    width: 100%;
    max-height: 250px;
    overflow-y: auto;
    overflow-x: hidden;
    border-radius: 0 0 32px 32px;
    margin-top: 0;
}

.autocomplete-items > div {
	width: 100%;
	color: #666;
	padding: 6px 15px 6px 52px;
	cursor: pointer;
	text-align: left;
}
.autocomplete-items > div strong{
	color: #333;
}
.autocomplete-items > div:hover {
    background: #c8c8c8;
    color: #14213D;
}
.autocomplete-items > div:hover strong {
	color: #14213D;
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

.search-form{
  
  position: relative;
 
}

.search-channel-container {
   width: 100%;

}

#inps {
    border-radius: 32px !important;
    box-shadow: 0 4px 32px rgba(0,0,0,0.25) !important;
    position: relative !important;
    height: 64px !important;
}

#inps.open {
    border-radius: 32px 32px 0 0 !important;
}

#inps .rui-input {
    height: 50px !important;
    font-size: 16px !important;
    border-radius: 32px !important;
    padding: 18px 52px !important;
    border: none !important;
    outline: none !important;
    width: 100% !important;
    background: #fff !important;
}
#inps.open .rui-input {
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}



.space {
  position: relative;
  min-height: 230px;
  background-color: #fff;
  width: 100%;
  display: grid;
  place-items: center;
  overflow: visible;
}

 @keyframes SlideIn {
   0% {left: -1000px;
  }
  100% {left: 0px;
  }
  
}

 .anim{
  position: relative;
  animation-name: SlideIn;
  animation-duration: 1s;
  animation-iteration-count: 1;
  animation-timing-function: ease;
  animation-fill-mode: none;
  
 }

#inps .lnr-magnifier {
    position: absolute !important;
    top: 40% !important;
    left: 20px !important;
    transform: translateY(-50%) !important;
    font-size: 20px !important;
    color: #999 !important;
    z-index: 2 !important;
}

.home_banner_area {
    padding-top: 80px !important;
}

#advSearchPanel ul.list {
    list-style: none;
    padding: 0;
    width: 100%;
}
#advSearchPanel li {
    display: flex;
    align-items: center;
    width: 100%;
    margin-bottom: 6px !important;
    gap: 8px;
    padding-left: 0 !important;
}
#advSearchPanel .btn_usch {
    width: calc(20% - 3px);
    flex-shrink: 0;
    margin-bottom: 0;
}
#advSearchPanel .loop_inp {
    width: 80%;
    flex: 1;
    margin-left: 16px;
}
#advSearchPanel .loop_inp .col-sm-4 {
    width: 33.333% !important;
    max-width: 33.333% !important;
    flex: 0 0 33.333% !important;
    padding: 0 4px;
    margin-bottom: 0 !important;
}
#advSearchPanel .search_new_des2 {
    width: 100% !important;
}
#advSearchPanel .select2-container--default .select2-selection--multiple {
    min-height: 34px !important;
    height: auto !important;
}
#advSearchPanel .select2-container--default .select2-selection--multiple .select2-selection__rendered {
    padding: 0 8px !important;
    line-height: 22px !important;
}

#advSearchPanel .btn_serch_bo1 .btn {
    background:#FCA311;
    color:#14213D;
    border:none;
    padding:8px 28px;
    border-radius:6px;
    font-weight:600;
    font-size:14px;
    font-family:'Inter',sans-serif;
    cursor:pointer;
    transition:background 0.15s;
}
#advSearchPanel .btn_serch_bo1 .btn:hover {
    background:#e8940a;
}

/* Ensure select2 dropdowns always appear above other elements */
.select2-dropdown {
  z-index: 9999 !important;
}


/* ── QUICK FILTER CHIPS ── */
#quickChips {
    margin-top: 14px;
}
.qchip {
    display: inline-block;
    padding: 4px 14px;
    border-radius: 20px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.15);
    color: rgba(255,255,255,0.65);
    font-size: 12px;
    font-weight: 500;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    transition: all 0.15s;
    user-select: none;
}
.qchip:hover {
    background: rgba(252,163,17,0.15);
    border-color: #FCA311;
    color: #FCA311;
}
.qchip.active {
    background: rgba(252,163,17,0.2);
    border-color: #FCA311;
    color: #FCA311;
}

/* ── ADVANCED SEARCH GLOW ── */
.adv-search-wrap {
    position: relative;
    display: inline-block;
    margin-top: 6px;
}
.adv-search-wrap::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 120px;
    background: radial-gradient(ellipse at center, rgba(252,163,17,0.08) 0%, transparent 70%);
    pointer-events: none;
    border-radius: 50%;
    z-index: 0;
    animation: advGlow 2.5s ease-in-out infinite;
}
#advSearchToggle {
    position: relative;
    z-index: 0;
    border: none !important;
}
@keyframes advGlow {
    0%   { opacity: 0.5; transform: translate(-50%, -50%) scale(1);    }
    50%  { opacity: 1;   transform: translate(-50%, -50%) scale(1.12); }
    100% { opacity: 0.5; transform: translate(-50%, -50%) scale(1);    }
}

/* ── FEATURE CARDS ── */
.az-fcard {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 14px;
    padding: 28px;
    transition: border-color 0.2s, transform 0.2s;
}
.az-fcard:hover {
    border-color: #FCA311;
    transform: translateY(-2px);
}
.az-fcard-icon {
    width: 48px;
    height: 48px;
    background: #FFF3D6;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 18px;
    color: #FCA311;
    font-size: 24px;
}
.az-fcard h3 {
    color: #14213D;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
    font-family: 'Inter', sans-serif;
}
.az-fcard p {
    color: #666;
    font-size: 14px;
    line-height: 1.65;
    font-family: 'Inter', sans-serif;
    margin: 0;
}
.az-fcard-tags {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    margin-top: 16px;
}
.az-ftag {
    background: #F0F0F0;
    color: #555;
    font-size: 11px;
    padding: 3px 10px;
    border-radius: 4px;
    font-weight: 500;
    font-family: 'Inter', sans-serif;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(6px); }
}

/* ── HOW IT WORKS STEPS ── */
.az-step {
    text-align: center;
    padding: 32px 24px;
}
.az-step-num {
    width: 52px;
    height: 52px;
    background: #FCA311;
    color: #14213D;
    font-size: 22px;
    font-weight: 700;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-family: 'Inter', sans-serif;
}
.az-step h3 {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
    font-family: 'Inter', sans-serif;
}
.az-step p {
    color: #9AAFC4;
    font-size: 14px;
    line-height: 1.65;
    font-family: 'Inter', sans-serif;
}

/* ── VENDOR PILLS ── */
.az-vendor-pill {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    color: #14213D;
    padding: 11px 26px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    transition: border-color 0.15s, color 0.15s;
    font-family: 'Inter', sans-serif;
}
.az-vendor-pill:hover {
    border-color: #FCA311;
    color: #FCA311;
}

/* ── CTA BUTTONS ── */
.az-cta-btn-dark {
    background: #14213D;
    color: #fff;
    border: none;
    padding: 14px 36px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    font-family: 'Inter', sans-serif;
    transition: background 0.15s;
    text-decoration: none;
    display: inline-block;
}
.az-cta-btn-dark:hover {
    background: #0D1929;
    color: #fff;
}
.az-cta-btn-outline {
    background: transparent;
    color: #14213D;
    border: 2px solid #14213D;
    padding: 14px 36px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    transition: background 0.15s;
    text-decoration: none;
    display: inline-block;
}
.az-cta-btn-outline:hover {
    background: rgba(20,33,61,0.08);
    color: #14213D;
}

/* ── PRODUCT TYPE BUTTONS ── */
.pt-btn {
    padding: 6px 16px;
    border-radius: 20px;
    border: 1.5px solid #14213D;
    background: transparent;
    color: #14213D;
    font-size: 12px;
    font-weight: 500;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    transition: all 0.15s;
}
.pt-btn.active {
    background: #FCA311;
    border-color: #FCA311;
    color: #14213D;
}
.pt-btn:hover {
    border-color: #FCA311;
}

/* ── ADVANCED SEARCH LABEL ICONS ── */
#advSearchPanel .btn_usch {
    position: relative !important;
    background: transparent !important;
    clip-path: none !important;
    width: 110px !important;
    padding-left: 0 !important;
    margin-left: 0 !important;
}
#advSearchPanel .btn_usch::after {
    display: none !important;
    border: none !important;
    content: none !important;
}
#advSearchPanel .btn_usch > div {
    background: transparent !important;
    color: #14213D !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
    padding: 0 !important;
    white-space: nowrap;
    justify-content: flex-start !important;
}

#advSearchPanel .select2-results__option {
    padding: 6px 12px !important;
}
 </style>

 

      <section class="home_banner_area" style="background:#14213D;position:relative;min-height:100vh;padding:70px 20px 0;display:flex;flex-direction:column;align-items:center;justify-content:center;">
				<div class="container" style="text-align:center;margin-top:-240px;">
			<div style="display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
    <span style="font-family:'Outfit',sans-serif;font-size:62px;font-weight:600;letter-spacing:-2px;color:#fff;line-height:1;display:flex;align-items:center;"><span style="color:#FCA311;">a</span>zera<span style="color:#FCA311;">X</span></span>
</div>

				

					<div style="font-family:'Inter',sans-serif;font-size:13px;font-weight:600;letter-spacing:3px;color:rgba(255,255,255,0.45);text-transform:uppercase;margin-bottom:36px;">Find it.&nbsp;&nbsp;Spec it.&nbsp;&nbsp;Build it.</div>

					<form method="get" class="search-form" action="<?php echo base_url();?>search-listing">
						<div class="search-container" style="max-width:780px;margin:0 auto;">
							<div class="search-inner-container" style="z-index: 1;">
								<div class="search-inner-container" style="z-index: 1;">
									<div class="search-input-container" id="inps">
									 <i class="lnr lnr-magnifier"></i>
										<div class="autocomplete">
											<input data-toggle="#hidden1" class="rui-input rui-location-box rui-auto-complete-input" autocomplete="off" placeholder="Search broadcast devices, platforms, AI tools…" id="device_name" name="keyword" style="width:100% !important;" />
										</div>
										<button type="submit" hidden id="submit" class="btn main_btn signup_btn">
										<span class="rui-visually">Search</span>
										</button>
										<div class="focus-border" style="display: none;"></div>
									</div>

									<input type="hidden" name="productid" id="productid" />
									<div class="hidden" id="hidden1" style="display: none;" data-hidden="true">
										<ul style="color: white;" id="processSugguestion" ></ul>
									</div>
								</div>
							</div>
						</div>
					</form>

					<div style="margin-top:24px;position:relative;">
						<div class="adv-search-wrap"><a href="javascript:void(0);" id="advSearchToggle" onclick="var p=document.getElementById('advSearchPanel'); var d=document.getElementById('divShowHide'); if(p.style.display==='none'){p.style.display='block';d.style.display='block';}else{p.style.display='none';d.style.display='none';} return false;" style="display:inline-block;margin-top:2px;padding:8px 22px;border:1.5px solid #FCA311;border-radius:20px;color:#FCA311;font-size:13px;font-weight:500;text-decoration:none;font-family:'Inter',sans-serif;letter-spacing:0.3px;">
					
					Advanced Search — filter by I/O type, standards, connectors and more →
						</a></div>

                        <!-- QUICK FILTER CHIPS -->
                        <div id="quickChips" style="display:flex;flex-wrap:wrap;justify-content:center;gap:8px;margin-top:14px;max-width:700px;margin-left:auto;margin-right:auto;">
                            <span class="qchip" data-type="product_type" data-value="Hardware">Hardware</span>
                            <span class="qchip" data-type="product_type" data-value="Software">Software</span>
                            <span class="qchip" data-type="product_type" data-value="Cloud Service">Cloud Service</span>
                            <span class="qchip" data-type="product_type" data-value="AI Tool">AI Tool</span>
                            <span class="qchip" data-type="input_stand" data-value="SMPTE ST 2110">SMPTE ST 2110</span>
                            <span class="qchip" data-type="input_stand" data-value="AES67">AES67</span>
                            <span class="qchip" data-type="input_stand" data-value="DVB">DVB</span>
                            <span class="qchip" data-type="input_stand" data-value="OTT">OTT</span>
                        </div>

					</div>

				</div>
	     <div style="position:absolute;bottom:32px;left:50%;transform:translateX(-50%);color:rgba(255,255,255,0.25);font-size:12px;display:flex;flex-direction:column;align-items:center;gap:6px;font-family:'Inter',sans-serif;">
            <span>Scroll to explore</span>
            <i class="ti ti-chevron-down" style="font-size:18px;animation:bounce 2s infinite;"></i>
        </div>
	     </section>

        
         <div class="space" id="advSearchPanel" style="display:none;position:fixed;top:400px;left:50%;transform:translateX(-50%);z-index:9999;width:80%;max-width:900px;overflow:visible;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,0.5);background:#E5E5E5;">
          <div style="margin:5px;border:2px solid #14213D;border-radius:12px;padding:24px;position:relative;width:calc(100% - 10px);">
          <a href="javascript:void(0);" onclick="document.getElementById('advSearchPanel').style.display='none';document.getElementById('divShowHide').style.display='none';" style="position:absolute;top:1px;right:9px;color:#14213D;font-size:22px;font-weight:700;text-decoration:none;line-height:1;">×</a>
					<!--<nav class="search-channel-container">-->
					   <form method="get" action="<?php echo base_url();?>search-listing">
              <form method="get" action="<?php echo base_url();?>search-listing">
              <div class="search_new_des2" id="divShowHide" style="display:block;">
							 <div class="anim">
					  		 	<ul class="list">
                     <li class="">
                        <div class="btn_usch">
                            <div class="">
                                <i class="ti ti-layout-grid"></i> Product Type
                            </div>
                        </div>
                        <div class="loop_inp" style="margin-left:50px;">
                            <div class="pt-btns" style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
                                <button type="button" class="pt-btn" data-value="Hardware">Hardware</button>
                                <button type="button" class="pt-btn" data-value="Software">Software</button>
                                <button type="button" class="pt-btn" data-value="Cloud Service">Cloud Service</button>
                                <button type="button" class="pt-btn" data-value="AI Tool">AI Tool</button>
                                <button type="button" class="pt-btn" data-value="Hybrid">Hybrid</button>
                            </div>
                            <!-- hidden inputs to carry selected values to form submit -->
                            <div id="pt-hidden-inputs"></div>
                        </div>
                    </li>

                    <li class="">
                        <li class="">
                        <div class="btn_usch">
                            <div class="">
                                <i class="ti ti-folder"></i> Category
                            </div>
                        </div>
          <div class="loop_inp">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <!-- <input type="text" data-role="tagsinput" name="input_name" placeholder="Input Type" class="form-control"> -->

                  <select name="main_cat[]" class="catA form-control" multiple="multiple">
                    <?php     
                      $data = array();
                      $Input = $this->common_model->GetAllData('category','','Cat_A','asc'); 
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
                </div>
               </div>

          <div class="col-sm-4">
            <div class="form-group">
              <!-- <input type="text" data-role="tagsinput" name="input_stand" placeholder="Input Standard" class="form-control"> -->
              <select name="sub1_cat[]" class="catB form-control" multiple="multiple">
                <?php     
                $Input = $this->common_model->GetAllData('category','','Cat_B','asc'); 
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
      <div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" data-role="tagsinput" name="input_conn" placeholder="Input Connection Type" class="form-control"> -->
					<select name="sub2_cat[]" class="catC form-control" multiple="multiple">

             <?php     

                $Input = $this->common_model->GetAllData('category','','Cat_C','asc');
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

<li class="">
  <div class="btn_usch" >
		<div class="">
     <i class="ti ti-arrow-bar-to-right"></i> Input
    </div>
	</div>
  <div class="loop_inp">
		<div class="row">
      <div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" data-role="tagsinput" name="input_name" placeholder="Input Type" class="form-control"> -->

	          <select name="input_name[]" class="inputF  form-control" multiple="multiple" >
               <?php     
                $data = array();
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
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" data-role="tagsinput" name="input_stand" placeholder="Input Standard" class="form-control"> -->

					<select name="input_stand[]" class="typeahead instand tm-input form-control " style="width:300px" multiple="multiple" >

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
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" data-role="tagsinput" name="input_conn" placeholder="Input Connection Type" class="form-control"> -->
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
	</div>
</li> 

	<li class="">
	  <div class="btn_usch">
		<div class="">
     <i class="ti ti-arrow-bar-right"></i> Output
    </div>
		</div>

<div class="loop_inp">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" name="out_conn" data-role="tagsinput" placeholder="Output Type" class="form-control"> -->
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
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" name="out_process_stand" data-role="tagsinput" placeholder="Output Standard" class="form-control"> -->
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
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" name="out_process_connection" data-role="tagsinput" placeholder="Output Connection Type" class="form-control"> -->
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
	</div>											 			
</li>

	    <li class="">
	      <div class="btn_usch">
				<div class="">
         <i class="ti ti-settings"></i> Process
        </div>
				</div>

<div class="loop_inp">
		<div class="row justify-content-end">
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" data-role="tagsinput" name="process" placeholder="Process Type" class="form-control"> -->

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
			<div class="col-sm-4">
				<div class="form-group">
					<!-- <input type="text" data-role="tagsinput" name="process_stand" placeholder="Process Standard" class="form-control"> -->
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
			<div class="col-sm-4">
				<div class="form-group btn_serch_bo1">
					<button type="submit" class="btn signup_btn">Search</button>
				</div>
			</div>
		</div>
	</div>
											 		</li>
											 		</ul>
											 	</div>
											 </aside>
											</nav>
                    </div>
                  </div>
								<!--</div>
								</div>
								<div class="rui-clearfix"></div>-->
								</form>
							<!--</div>
						</div>
					</div>
	 </section>-->
</div>
  
     
  


<script>
window.addEventListener('load', function(){
    var lastSelect2Click = 0;
   $(document).on('select2:unselect', function(){
       lastSelect2Click = Date.now();
   });

   $(document).off('click').on('click', function(e){
        var panel = document.getElementById('advSearchPanel');
        var openBtn = document.getElementById('advSearchToggle');
        if(panel && panel.style.display !== 'none'){
            if(!panel.contains(e.target) && !openBtn.contains(e.target)){
                if(Date.now() - lastSelect2Click > 300){
                    panel.style.setProperty('display', 'none', 'important');
                    document.getElementById('divShowHide').style.setProperty('display', 'none', 'important');
                }
            }
        }
    });
});

// Product type toggle buttons
    document.querySelectorAll('.pt-btn').forEach(function(btn){
        btn.addEventListener('click', function(){
            btn.classList.toggle('active');
            // rebuild hidden inputs
            var container = document.getElementById('pt-hidden-inputs');
            container.innerHTML = '';
            document.querySelectorAll('.pt-btn.active').forEach(function(active){
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'product_type[]';
                input.value = active.getAttribute('data-value');
                container.appendChild(input);
            });
        });
    });
</script>

<!-- ══════════════════════════════════════════════════════════
     HOMEPAGE SECTIONS
     ══════════════════════════════════════════════════════════ -->

<!-- SECTION 2 — WHAT YOU CAN SEARCH -->
<section style="padding:72px 60px;background:#F5F5F5;" id="what">
  <div style="text-align:center;">
    <div style="color:#FCA311;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:12px;font-family:'Inter',sans-serif;">What you can search</div>
    <div style="width:48px;height:3px;background:#FCA311;border-radius:2px;margin:0 auto 24px;"></div>
    <h2 style="color:#14213D;font-size:32px;font-weight:700;letter-spacing:-0.6px;line-height:1.2;margin-bottom:12px;font-family:'Inter',sans-serif;">Everything broadcast. In one place.</h2>
    <p style="color:#666;font-size:15px;line-height:1.75;max-width:540px;margin:0 auto 40px;font-family:'Inter',sans-serif;">Hardware, software, cloud platforms, and AI tools — all searchable by real technical criteria, maintained directly by the vendors themselves.</p>
  </div>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:40px;">
    <div class="az-fcard">
      <div class="az-fcard-icon"><i class="ti ti-cpu"></i></div>
      <h3>Hardware devices</h3>
      <p>Routers, encoders, frame synchronisers, multiviewers, audio processors and more — searchable by I/O type, connector, rack units and broadcast standards.</p>
      <div class="az-fcard-tags">
        <span class="az-ftag">SDI</span>
        <span class="az-ftag">ST 2110</span>
        <span class="az-ftag">AES67</span>
        <span class="az-ftag">BNC / SFP</span>
      </div>
    </div>
    <div class="az-fcard">
      <div class="az-fcard-icon"><i class="ti ti-cloud"></i></div>
      <h3>Software &amp; cloud platforms</h3>
      <p>SaaS tools, virtualised systems, and cloud-native broadcast platforms — searchable by deployment model, API type, and integration protocols.</p>
      <div class="az-fcard-tags">
        <span class="az-ftag">SaaS</span>
        <span class="az-ftag">On-premise</span>
        <span class="az-ftag">REST API</span>
        <span class="az-ftag">NDI / SRT</span>
      </div>
    </div>
    <div class="az-fcard">
      <div class="az-fcard-icon"><i class="ti ti-brain"></i></div>
      <h3>AI tools</h3>
      <p>Captioning, transcription, upscaling, content moderation, automated QC and more — searchable by capability, processing mode and language support.</p>
      <div class="az-fcard-tags">
        <span class="az-ftag">Real-time</span>
        <span class="az-ftag">Batch</span>
        <span class="az-ftag">Captioning</span>
        <span class="az-ftag">QC</span>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 3 — HOW IT WORKS -->
<section style="padding:72px 60px;background:#14213D;" id="how">
  <div style="text-align:center;">
    <div style="color:#FCA311;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:12px;font-family:'Inter',sans-serif;">How it works</div>
    <div style="width:48px;height:3px;background:#FCA311;border-radius:2px;margin:0 auto 24px;"></div>
    <h2 style="color:#fff;font-size:32px;font-weight:700;letter-spacing:-0.6px;line-height:1.2;margin-bottom:12px;font-family:'Inter',sans-serif;">From search to specification in seconds</h2>
    <p style="color:#9AAFC4;font-size:15px;line-height:1.75;max-width:540px;margin:0 auto 40px;font-family:'Inter',sans-serif;">No more trawling vendor websites. No more outdated PDFs. Just accurate, searchable product intelligence — exactly when you need it.</p>
  </div>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:32px;margin-top:8px;">
    <div class="az-step">
      <div class="az-step-num">1</div>
      <h3>Search by what matters</h3>
      <p>Filter by standards, I/O type, product category, connector type and more — in any combination you need.</p>
    </div>
    <div class="az-step">
      <div class="az-step-num">2</div>
      <h3>Compare real products</h3>
      <p>View accurate, vendor-maintained specs side by side. Multiple vendors, multiple prices, one screen.</p>
    </div>
    <div class="az-step">
      <div class="az-step-num">3</div>
      <h3>Build your system</h3>
      <p>Save favourites, generate BOMs, and archive your design documents — all in one place.</p>
    </div>
  </div>
</section>

<!-- SECTION 4 — TRUSTED VENDORS -->
<section style="padding:72px 60px;background:#F5F5F5;text-align:center;" id="vendors">
  <div style="color:#FCA311;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:12px;font-family:'Inter',sans-serif;">Founding vendors</div>
  <div style="width:48px;height:3px;background:#FCA311;border-radius:2px;margin:0 auto 24px;"></div>
  <h2 style="color:#14213D;font-size:32px;font-weight:700;letter-spacing:-0.6px;line-height:1.2;margin-bottom:12px;font-family:'Inter',sans-serif;">Trusted by broadcast industry leaders</h2>
  <p style="color:#666;font-size:15px;line-height:1.75;max-width:540px;margin:0 auto 8px;font-family:'Inter',sans-serif;">Leading manufacturers list their products directly on AzeraX — so architects always get specs straight from the source.</p>
  <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;justify-content:center;margin-top:32px;">
    <div class="az-vendor-pill">AJA Video</div>
    <div class="az-vendor-pill">Tektronix</div>
    <div class="az-vendor-pill">Blackmagic Design</div>
    <div class="az-vendor-pill">Lawo</div>
    <div class="az-vendor-pill">Ross Video</div>
    <div class="az-vendor-pill">Matrox</div>
    <div class="az-vendor-pill">Ateme</div>
    <div class="az-vendor-pill">TVU Networks</div>
  </div>
  <p style="color:#999;font-size:13px;margin-top:28px;font-family:'Inter',sans-serif;">Are you a broadcast vendor? <a href="<?php echo base_url(); ?>signup" style="color:#FCA311;text-decoration:none;font-weight:500;">List your products free for one year &rarr;</a></p>
</section>

<!-- SECTION 5 — CTA AMBER -->
<section style="padding:72px 60px;background:#FCA311;text-align:center;">
  <div style="color:rgba(20,33,61,0.55);font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:12px;font-family:'Inter',sans-serif;">Get started</div>
  <h2 style="color:#14213D;font-size:32px;font-weight:700;letter-spacing:-0.6px;line-height:1.2;margin-bottom:12px;font-family:'Inter',sans-serif;">Ready to find your next broadcast solution?</h2>
  <p style="color:rgba(20,33,61,0.65);font-size:15px;line-height:1.75;max-width:540px;margin:0 auto 32px;font-family:'Inter',sans-serif;">Search free. List your products and reach broadcast architects worldwide.</p>
  <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
    <a href="<?php echo base_url(); ?>search-listing" class="az-cta-btn-dark">Search devices now</a>
    <a href="<?php echo base_url(); ?>signup" class="az-cta-btn-outline">List your product &rarr;</a>
  </div>
</section>

<?php include_once 'include/footer2.php' ; ?>

   <script type="text/javascript">
		$(document).ready(function(){
    var panel = document.getElementById('advSearchPanel');

    function lockScroll(){
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';
    }
    function unlockScroll(){
        document.body.style.overflow = '';
        document.documentElement.style.overflow = '';
    }

    // Button class is advSearchToggle (not btnShowHide)
    $(document).on('click', '.advSearchToggle', function(){
        panel.style.display = 'block';
        lockScroll();
    });

    // Close button
    $(document).on('click', '[onclick*="advSearchPanel"]', function(){
        unlockScroll();
    });

    // Escape key closes and unlocks
    document.addEventListener('keydown', function(e){
        if(e.key === 'Escape'){
            panel.style.display = 'none';
            unlockScroll();
        }
  });

    // Pulse glow on Advanced Search button
    var advBtn = document.getElementById('advSearchToggle');
    var glowUp = true;
    var glowVal = 0;
    setInterval(function(){
        if(glowUp){ glowVal += 2; if(glowVal >= 18) glowUp = false; }
        else { glowVal -= 2; if(glowVal <= 0) glowUp = true; }
        advBtn.style.boxShadow = '0 0 ' + glowVal + 'px rgba(252,163,17,' + (glowVal/36) + ')';
    }, 50);

});
</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 
$(".catA").select2({placeholder: "Main Category", tags: true, tokenSeparators: [';'], separator: ";", multiple: true, width: '100%', dropdownParent: $('#advSearchPanel')});
$(".catB").select2({tags: true, placeholder: "Sub-Category A", tokenSeparators: [','], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".catC").select2({tags: true, placeholder: "Sub-Category B", tokenSeparators: [',', ''], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".inputF").select2({placeholder: "Input Type", tags: true, tokenSeparators: [';'], separator: ";", multiple: true, width: '100%', dropdownParent: $('#advSearchPanel')});
$(".instand").select2({tags: true, placeholder: "Input Standard", tokenSeparators: [','], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".inprocessConnection").select2({tags: true, placeholder: "Input Connection Type", tokenSeparators: [',', ''], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".outputF").select2({tags: true, placeholder: "Output Type", tokenSeparators: [',', ' '], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".otstand").select2({tags: true, placeholder: "Output Standard", tokenSeparators: [',', ' '], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".otprocessConnection").select2({tags: true, placeholder: "Output Connection Type", tokenSeparators: [',', ' '], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".processsuggestion").select2({tags: true, placeholder: "Process Type", tokenSeparators: [',', ' '], width: '100%', dropdownParent: $('#advSearchPanel')});
$(".processsuggestionStand").select2({tags: true, placeholder: "Process Standard", tokenSeparators: [',', ' '], width: '100%', dropdownParent: $('#advSearchPanel')});
</script> 

<script type="text/javascript">
  $(document).ready(function() {
  $("#device_name").keyup(function() {
	var x = document.getElementById('showSearchDiv');
	if($(this).val() == "") {
	// x.style.display = 'none';
	$("#showSearchDiv").removeClass("show_div");
	  } else {
	// x.style.display = 'block';
  $("#showSearchDiv").addClass("show_div");
    }
  });
});
	</script>

	<script type="text/javascript">
			$(".main_btn").click(function() {
      $("#showSearchDiv").toggleClass("show_div");
});
	</script>
	
	<script type="text/javascript">
		$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

<script type="text/javascript">
  // bootstrap-tagsinput.js file - add in local
$(function() {
    $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
  });
</script>

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
    (function () {
    "use strict";
    var hiddenItems = document.getElementsByClassName('hidden'), hidden;
    document.addEventListener('click', function (e) {
        for (var i = 0; hidden = hiddenItems[i]; i++) {
            if (!hidden.contains(e.target) && hidden.style.display != 'none')
                hidden.style.display = 'none';
        }
        if (e.target.getAttribute('data-toggle')) {
            var toggle = document.querySelector(e.target.getAttribute('data-toggle'));
            toggle.style.display = toggle.style.display == 'none' ? 'block' : 'none';
        }
    }, false);
})();

/* ── ADVANCED SEARCH BUTTON GLOW ── */
.adv-search-wrap {
    position: relative;
    display: inline-block;
    margin-top: 6px;
}
.adv-search-wrap::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 340px;
    height: 80px;
    background: radial-gradient(ellipse at center, rgba(252,163,17,0.18) 0%, transparent 70%);
    pointer-events: none;
    border-radius: 50%;
    animation: advGlow 2.5s ease-in-out infinite;
}
@keyframes advGlow {
    0%   { opacity: 0.6; transform: translate(-50%, -50%) scale(1);   }
    50%  { opacity: 1;   transform: translate(-50%, -50%) scale(1.08);}
    100% { opacity: 0.6; transform: translate(-50%, -50%) scale(1);   }
}
.adv-search-wrap {
    animation: btnPulse 2.5s ease-in-out infinite;
}
@keyframes btnPulse {
    0%   { filter: drop-shadow(0 0 0px rgba(252,163,17,0));    }
    50%  { filter: drop-shadow(0 0 12px rgba(252,163,17,0.7));}
    100% { filter: drop-shadow(0 0 0px rgba(252,163,17,0));    }
}
@keyframes btnPulse {
    0%   { box-shadow: 0 0 0px rgba(252,163,17,0);    }
    50%  { box-shadow: 0 0 18px rgba(252,163,17,0.45);}
    100% { box-shadow: 0 0 0px rgba(252,163,17,0);    }
}

</script>

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
      if (!val) { 
        const searchWrap  = document.querySelector('#inps');
        searchWrap.classList.remove('open');
        return false;
      }
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
          const searchWrap  = document.querySelector('#inps');
          searchWrap.classList.add('open');
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
              document.getElementById("submit").click();
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
        /*If the ENTER key is pressed, prevent the form from being submitted */
        if (currentFocus == -1){
        e.preventDefault();}
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
      const searchWrap  = document.querySelector('#inps');
      searchWrap.classList.remove('open');
  });
  
}

/*An array containing all the Device names in Azerax:*/
var alldata = <?php echo $deviceModelJson;?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("device_name"), alldata);
</script>