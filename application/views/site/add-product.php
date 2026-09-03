<?php include_once 'include/header2.php' ; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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

/* ══════════════════════════════════════════
   PREMIUM ADD PRODUCT DESIGN
   ══════════════════════════════════════════ */

/* Step progress bar */
.az-steps-bar {
    background: #fff;
    border-bottom: 1px solid #EBEBEB;
    padding: 0 40px;
    z-index: 500;
    position: fixed;
    left: 0;
    width: 100%;
}
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
.az-steps-inner {
    display: flex;
    align-items: center;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px 0;
}
.az-step {
    display: flex !important;
    align-items: center;
    gap: 10px;
    background: transparent !important;
    border: none !important;
    cursor: pointer;
    padding: 8px 12px !important;
    border-radius: 8px;
    transition: all 0.2s;
    width: auto !important;
    float: none !important;
}
.az-step-num {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #E5E5E5;
    color: #999;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.2s;
}
.az-step-label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #999;
    transition: all 0.2s;
    white-space: nowrap;
}
.az-step.active .az-step-num {
    background: #FCA311;
    color: #14213D;
}
.az-step.active .az-step-label {
    color: #14213D;
    font-weight: 600;
}
.az-step.completed .az-step-num {
    background: #14213D;
    color: #fff;
}
.az-step.completed .az-step-label {
    color: #14213D;
}
.az-step-connector {
    flex: 1;
    height: 2px;
    background: #EBEBEB;
    margin: 0 4px;
    transition: background 0.2s;
}
.az-step-connector.active {
    background: #14213D;
}

/* Override old tab styles */
section.Progress {
    padding: 0 !important;
    margin: 0 !important;
}
.tab { display: none !important; }
.filler { display: none !important; }

/* Layout */
section.add_product {
    background: #F5F5F5;
}
.container-flex {
    display: flex;
    align-items: flex-start;
    min-height: calc(100vh - 220px);
}

/* Dark navy sidebar */
.col-lg-2 {
    width: 280px !important;
    min-width: 280px;
    height: auto !important;
    margin: 0 !important;
    margin-top: 32px !important;
    background: #14213D;
    min-height: calc(100vh - 220px);
    padding: 32px 24px;
    position: sticky;
    top: 32px;
    border-radius: 16px !important;
}
.col-box {
    display: none;
    background: transparent !important;
    border-radius: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    height: auto !important;
}
.col-box.active-box { display: block; }
.col-box p:first-child strong {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #fff;
    display: block;
    margin-bottom: 12px;
}
.col-box p {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: rgba(255,255,255,0.55);
    line-height: 1.7;
    margin-bottom: 8px;
}

/* Sidebar step mini indicators */
.az-sidebar-steps {
    margin-top: 40px;
    border-top: 1px solid rgba(255,255,255,0.1);
    padding-top: 24px;
}
.az-sidebar-step {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    opacity: 0.4;
}
.az-sidebar-step.active { opacity: 1; }
.az-sidebar-step.done { opacity: 0.7; }
.az-sidebar-step-dot {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.5);
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.az-sidebar-step.active .az-sidebar-step-dot {
    background: #FCA311;
    color: #14213D;
}
.az-sidebar-step.done .az-sidebar-step-dot {
    background: rgba(255,255,255,0.3);
    color: #fff;
}
.az-sidebar-step-label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: rgba(255,255,255,0.6);
}
.az-sidebar-step.active .az-sidebar-step-label {
    color: #fff;
    font-weight: 600;
}

/* Form area */
.container-ipo {
    flex: 1;
    margin: 0 !important;
    padding: 32px 40px;
}
#msform fieldset {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    padding: 32px;
}

/* Form labels */
.form-group label {
    font-family: 'Inter', sans-serif !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    color: #555 !important;
}

/* Action buttons */
#msform .action-button {
    background: #14213D;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    border-radius: 8px;
    padding: 11px 28px;
    font-size: 14px;
    color: #fff;
}
#msform .action-button.next {
    background: #FCA311 !important;
    color: #14213D !important;
}
#msform .action-button.next:hover {
    background: #e8940a !important;
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
.actionButtonSubmit {
    background: #dc3545 !important;
    color: #fff !important;
    font-family: 'Inter', sans-serif !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    padding: 11px 28px !important;
    border-radius: 8px !important;
    border: none !important;
    display: inline-block !important;
    text-decoration: none !important;
    cursor: pointer !important;
}
.actionButtonSubmit:hover {
    background: #b02a37 !important;
    color: #fff !important;
}
.next {
    background: #FCA311 !important;
    color: #14213D !important;
    font-family: 'Inter', sans-serif !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    padding: 11px 28px !important;
    border-radius: 8px !important;
    border: none !important;
    cursor: pointer !important;
}
.next:hover { background: #e8940a !important; color: #14213D !important; }
.next:hover { background: #e8940a !important; }

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

/* Input type label in I.P.O */
.input_box {
    border: 1.5px solid #EBEBEB !important;
    border-radius: 10px !important;
    background: #FAFAFA !important;
    padding: 16px !important;
    margin-bottom: 16px !important;
}

.container-ipo {
    background: #F5F5F5;
}

section.add_product #msform fieldset#menu1,
section.add_product #msform fieldset#menu2,
section.add_product #msform fieldset#menu3 {
    border-radius: 16px !important;
}

.header_area .navbar .nav .nav-item .nav-link:hover {
    background: transparent !important;
}

/* Extract Info button - the payoff moment of the AI tool */
.az-extract-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    background: #FCA311;
    color: #14213D;
    border: none;
    border-radius: 6px;
    padding: 11px 26px;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.01em;
    line-height: 1;
    cursor: pointer;
    overflow: hidden;
    box-shadow: 0 0 0 0 rgba(20,33,61,0.35);
    animation: az-extract-idle-glow 2.6s ease-in-out infinite;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}
.az-extract-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(252,163,17,0.35), 0 0 0 3px rgba(20,33,61,0.15);
    animation: none;
}
.az-extract-btn:active:not(:disabled) {
    transform: translateY(0) scale(0.97);
}
.az-extract-btn:disabled {
    opacity: 0.85;
    cursor: default;
    animation: none;
}
/* Signal sweep - a diagonal light band that crosses the button on hover,
   evoking a broadcast signal scan (this is the signature element) */
.az-extract-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -60%;
    width: 40%;
    height: 100%;
    background: linear-gradient(115deg, transparent, rgba(255,255,255,0.65), transparent);
    transform: skewX(-20deg);
    transition: left 0.55s ease;
}
.az-extract-btn:hover:not(:disabled)::before {
    left: 130%;
}
@keyframes az-extract-idle-glow {
    0%, 100% { box-shadow: 0 0 0 0 rgba(20,33,61,0.35); }
    50% { box-shadow: 0 0 0 6px rgba(20,33,61,0); }
}
.az-extract-icon {
    display: block;
    width: 16px;
    height: 16px;
    flex-shrink: 0;
}
.az-extract-icon .az-spark {
    transition: opacity 0.15s ease;
}
.az-extract-btn.az-is-loading .az-spark {
    animation: az-extract-spin 0.9s linear infinite;
    transform-origin: center;
}
@keyframes az-extract-spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
@media (prefers-reduced-motion: reduce) {
    .az-extract-btn, .az-extract-btn::before, .az-extract-icon .az-spark {
        animation: none !important;
        transition: none !important;
    }
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

body {
    overflow-x: hidden;
}
section.add_product {
    min-height: calc(100vh - 280px) !important;
    padding-bottom: 40px;
    padding-top: 20px;
}
section.Progress {
    padding-top: 40px;
}
section.add_product {
    min-height: calc(100vh - 320px) !important;
    padding-bottom: 10px;
    padding-top: 20px;
}

.header_area {
    margin-bottom: 0 !important;
}

/* Match Main Category's select2 corners to Sub-Category A/B's rounded style
   (a shared stylesheet flattens single-select corners to 0, which only
   affects Main Category since it's a single-select, not multi) */
#main_cat_select + .select2-container .select2-selection--single {
    border-radius: 4px !important;
}

/* Sub-Category A/B: hide select2's default chips-inside-the-box rendering
   (only for these two specific selects, since .instand/.inprocessConnection
   classes are shared with unrelated multi-selects elsewhere on this page).
   Selected items instead render in a custom list below, so the input box
   itself never stretches. */
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
.az-cat-chips {
    margin-top: 8px;
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
/* Keep Category row columns equal height regardless of how many chips
   any one of them grows to hold */
#mcat .row {
    display: flex;
    align-items: stretch;
}

div[style*="background:#14213D"] {
    margin-top: -20px;
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

select.form-control {
    height: 38px !important;
    line-height: 38px !important;
}
</style>



<div style="background:#14213D;padding:40px;text-align:center;">
    <h1 style="font-family:'Inter',sans-serif;font-size:30px;font-weight:700;color:#fff;margin-bottom:6px;">Add Product</h1>
    <p style="font-family:'Inter',sans-serif;font-size:14px;color:rgba(255,255,255,0.5);margin:0;">List your broadcast product on azera<span style="color:#FCA311;">X</span></p>
</div>

<script type="text/javascript">
// Scrolls to a section, automatically accounting for any sticky/fixed header
// currently on screen (measured live, not hardcoded) so the section's own
// top - not some point behind the header - ends up at the top of the view.
function azScrollToSection(sectionId){
    var el = document.getElementById(sectionId);
    if(!el) return;
    var stepBar = document.querySelector('.az-steps-bar');
    var stepBarHeight = stepBar ? stepBar.getBoundingClientRect().height : 0;
    var realHeaderHeight = 90; // the site's own fixed navbar
    var offset = realHeaderHeight + stepBarHeight;
    var targetY = el.getBoundingClientRect().top + window.pageYOffset - offset - 16;
    window.scrollTo({ top: targetY, behavior: 'smooth' });
}
// At the very top of the page: normal position, no fixing.
// As soon as the user scrolls down at all: pin below the header.
// Back at the top: return to original position.
document.addEventListener('DOMContentLoaded', function(){
    var stepBar = document.querySelector('.az-steps-bar');
    var progressSection = document.querySelector('section.Progress');
    if(!stepBar || !progressSection) return;

    var PINNED_TOP = 90;

    function getScrollY(){
        return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
    }

    // Measure where the step bar would naturally sit (relative to the
    // document) if it had never been taken out of normal flow. Measured
    // from progressSection - not stepBar itself - since stepBar is always
    // position:fixed now and can't be measured this way directly.
    function getNaturalOffset(){
        var rect = progressSection.getBoundingClientRect();
        return rect.top + getScrollY();
    }

    var naturalOffset = getNaturalOffset();

    function reserveSpace(){
        progressSection.style.setProperty('padding', '0', 'important');
        progressSection.style.setProperty('margin', '0', 'important');
        progressSection.style.setProperty('border', 'none', 'important');
        progressSection.style.height = stepBar.getBoundingClientRect().height + 'px';
    }

    function update(){
        // Continuously tracks scroll position with no lag, right up until
        // it reaches the pinned spot - unlike toggling position modes
        // outright, this has no abrupt jump since only a number (top) is
        // changing, not the positioning mode itself.
        var top = Math.max(PINNED_TOP, naturalOffset - getScrollY());
        stepBar.style.top = top + 'px';
        reserveSpace();
    }

    update();
    window.addEventListener('load', function(){
        naturalOffset = getNaturalOffset();
        update();
    });
    window.addEventListener('resize', function(){
        naturalOffset = getNaturalOffset();
        update();
    });
    window.addEventListener('scroll', update, { passive: true });
    document.addEventListener('scroll', update, { passive: true, capture: true });
    setInterval(update, 300);
});
</script>
<section class="Progress">
  <div class="az-steps-bar">
    <div class="az-steps-inner">
      <button class="tablinks t1 az-step active" onclick="azScrollToSection('section-device')" data-step="1">
        <span class="az-step-num">1</span>
        <span class="az-step-label">Device</span>
      </button>
      <div class="az-step-connector"></div>
      <button class="tablinks t2 az-step" onclick="azScrollToSection('section-io')" data-step="2">
        <span class="az-step-num">2</span>
        <span class="az-step-label">I/O &amp; Process</span>
      </button>
      <div class="az-step-connector"></div>
      <button class="tablinks t3 az-step" onclick="azScrollToSection('section-vendor')" data-step="3">
        <span class="az-step-num">3</span>
        <span class="az-step-label">Vendor Info</span>
      </button>
    </div>
  </div>
</section>
    

<section class="add_product">
 <div class="container-flex">
  <div class="col-lg-2">
    <!-- Step 1 help -->
    <div class="col-box active-box" id="box1">
        <p><strong>Device Details</strong></p>
        <p>Enter the core information about your broadcast device — model, brand, dimensions and release date.</p>
        <p>The more detail you provide, the easier architects can find your product.</p>
    </div>
    <!-- Step 2 help -->
    <div class="col-box" id="box2">
        <p><strong>Inputs, Outputs &amp; Process</strong></p>
        <p>Specify the technical I/O capabilities of your device — input types, standards, connector types, outputs and internal processing.</p>
        <p>Click <strong style="color:#FCA311;">+</strong> to add multiple inputs or outputs.</p>
    </div>
    <!-- Step 3 help -->
    <div class="col-box" id="box3">
        <p><strong>Vendor Information</strong></p>
        <p>Add your contact details, warranty information, support notes and product images.</p>
        <p>This information will appear on your product page for architects to view.</p>
    </div>
    <div class="col-box" id="box4" style="display:none;"></div>

    <!-- Mini step tracker in sidebar -->
    <div class="az-sidebar-steps">
        <div class="az-sidebar-step active" id="sidebar-step1">
            <div class="az-sidebar-step-dot">1</div>
            <div class="az-sidebar-step-label">Device Details</div>
        </div>
        <div class="az-sidebar-step" id="sidebar-step2">
            <div class="az-sidebar-step-dot">2</div>
            <div class="az-sidebar-step-label">I/O &amp; Process</div>
        </div>
        <div class="az-sidebar-step" id="sidebar-step3">
            <div class="az-sidebar-step-dot">3</div>
            <div class="az-sidebar-step-label">Vendor Info</div>
        </div>
    </div>
  </div>
  <div class="container-ipo">
    <div class="container">
     <div class="form_add_product contact_form"> 
	<!-- multistep form -->
   <form id="msform" action="#" name="myForm">
    <input type="hidden" id="paymentIntent_id" name="paymentIntent_id" value="0">
  <!-- Section 1: Device -->
  <div id="section-device" class="az-page-section az-section-device">
   <div class="az-section-header"><span class="az-section-num">1</span><span class="az-section-title">Device</span></div>
   <h3></h3>
    <div class="row">
     <div class="col-sm-12">
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
          <button type="button" id="ai_extract_btn" class="az-extract-btn">
            <svg class="az-extract-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="az-spark" d="M12 2L14.2 9.2L21.5 11.5L14.2 13.8L12 21L9.8 13.8L2.5 11.5L9.8 9.2L12 2Z" fill="#14213D"/>
            </svg>
            <span class="az-extract-label">Extract Info</span>
          </button>
          <span id="ai_extract_status" style="margin-left:10px;font-family:'Inter',sans-serif;font-size:13px;color:#666;"></span>
          <div style="font-size:12px;color:#999;margin-top:8px;">This only fills in the fields below for you to review — nothing is submitted until you check everything and click Submit.</div>
        </div>
      </div>
     </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){

        $('#ai-autofill-toggle').on('click', function(){
            $('#ai-autofill-panel').slideToggle(200);
        });

        function setSelect2Value(selector, value){
            if(!value) return;
            var $el = $(selector);
            if($el.length === 0) return;

            // select2's own "tags: true" runtime behavior can independently
            // create a duplicate <option> for a value that was already
            // added below - and it can happen at an unpredictable delay,
            // not immediately. Rather than guess at timing, watch this
            // field continuously and remove any true duplicate (same
            // value) the instant one appears, from any source.
            if(!$el.data('azDedupeObserverAttached')){
                var dedupeObserver = new MutationObserver(function(){
                    var seen = {};
                    var removedAny = false;
                    $el.find('option').each(function(){
                        var v = $(this).val();
                        if(!v) return;
                        if(seen[v]){
                            $(this).remove();
                            removedAny = true;
                        } else {
                            seen[v] = true;
                        }
                    });
                    if(removedAny){
                        $el.trigger('change');
                    }
                });
                dedupeObserver.observe($el[0], { childList: true });
                $el.data('azDedupeObserverAttached', true);
            }
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

            // Defensive cleanup: select2's own "tags: true" behavior can
            // sometimes create its own duplicate <option> for a value that
            // was already set programmatically above, rather than
            // recognizing the existing one. Remove any true duplicates
            // (same value), keeping only the first, regardless of how they
            // got created.
            setTimeout(function(){
                var seen = {};
                $el.find('option').each(function(){
                    var v = $(this).val();
                    if(!v) return;
                    if(seen[v]){
                        $(this).remove();
                    } else {
                        seen[v] = true;
                    }
                });
                $el.trigger('change.select2');
            }, 0);
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
            if(pdfFile){
                formData.append('source_pdf', pdfFile);
            }

            $('#ai_extract_status').text('Reading and extracting... this can take a few seconds.').css('color','#666');
            $('#ai_extract_btn').prop('disabled', true).addClass('az-is-loading');
            $('#ai_extract_btn .az-extract-label').text('Extracting...');

            $.ajax({
                url: '<?php echo base_url(); ?>Product/ai_extract',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(res){
                    $('#ai_extract_btn').prop('disabled', false).removeClass('az-is-loading');
                    $('#ai_extract_btn .az-extract-label').text('Extract Info');
                    if(res.status == 1){
                        var d = res.data;
                        if(d.product_type) $('#product_type').val(d.product_type).trigger('change');
                        if(d.main_category !== undefined) $('#main_cat_select').val(d.main_category).trigger('change');
                        if(d.device_model) $('#device_name').val(d.device_model);
                        if(d.device_brand) $('#device_brand').val(d.device_brand);
                        if(d.mechanical_demension_mounting) $('#sendNewSms').val(d.mechanical_demension_mounting);
                        if(d.order_code) $('#dealer_contact').val(d.order_code);
                        if(d.rack_unit){
                            $('select[name="rack_unit"]').val(d.rack_unit).trigger('change');
                        }
                        if(d.power_consumption) $('input[name="power_consumption"]').val(d.power_consumption);
                        // note: this field's name has a pre-existing trailing space in the HTML
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

                        $('#ai_extract_status').text('Done - please review every field below before submitting.').css('color','#28a745');
                    } else {
                        $('#ai_extract_status').text(res.message || 'Something went wrong.').css('color','#dc3545');
                    }
                },
                error: function(){
                    $('#ai_extract_btn').prop('disabled', false).removeClass('az-is-loading');
                    $('#ai_extract_btn .az-extract-label').text('Extract Info');
                    $('#ai_extract_status').text('Request failed. Please try again.').css('color','#dc3545');
                }
            });
        });

    });
    </script>

 <div class="input_box" id="mcat">
  <div class="row">
  <div class="col-md-4" id="main_cat">
   <div class="form-group">
    <label>Main Category</label>
      <select id="main_cat_select" required name="main_cat[]" class="typeahead tm-input form-control sets_hidden1" style="width:300px">
       <option value=""></option>

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
   </div>
  </div>

  <div class="col-md-4">
   <div class="form-group">
    <label>Sub-Category A</label>
     <select required name="sub1_cat[]" id="sub_cat_a" class="typeahead instand tm-input form-control sets_hidden1" style="width:300px" multiple="multiple">
    <option value="">-- Select Sub-Category A --</option>
   </select>
   <div id="sub_cat_a_chips" class="az-cat-chips"></div>
 </div>
</div>

  <div class="col-md-4">
   <div class="form-group">
    <label for="title">Sub-Category B</label>
     <select required name="sub2_cat[]" id="sub_cat_b" class="sets_hidden1 typeahead inprocessConnection tm-input form-control" style="width:300px" multiple="multiple">
    <option value="">-- Select Sub-Category B --</option>
</select>
   <div id="sub_cat_b_chips" class="az-cat-chips"></div>
  </div>
 </div>
  </div>
</div>

<div class="input_box" style="margin-top:8px;">
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
        <label>Product</label>
          <select required class="form-control" name="product_type" id="product_type">
          <option value="Hardware" selected>Hardware</option>
          <option value="Software">Software / Application</option>
          <option value="Cloud Service">Cloud Service (SaaS)</option>
          <option value="AI Tool">AI Tool</option>
          <option value="Hybrid">Hybrid (Hardware + Software)</option>
        </select>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
   <label>Brand</label>
    <div class="autocomplete" >
     <input required type="text" data-toggle="#hidden1" class="form-control sets_hidden1 rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_brand" name="device_brand" >                        
    </div>
  </div>

</script>

</script>
</div>

 <div class="col-md-4">
 	<div class="form-group">
        <label>Model</label>
            <div class="autocomplete" >
              <input type="text" required data-toggle="#hidden1" class="form-control rui-input rui-location-box rui-auto-complete-input sets_hidden1"  autocomplete="off" placeholder="" id="device_name" name="device_model" >                        
               <div id="responsemenu1"></div>
            </div>
        </div>

</div>
</div>
</div>

<div class="row">
 <div class="col-sm-12">
  <div class="form-group">
   <label>Short Description</label>
   <textarea class="form-control sets_hidden1" name="description" id="short_description" maxlength="255" rows="3" placeholder="A one-line summary of this product"></textarea>
  </div>
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

  <input required type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>" >
  <!--<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 
   <?php $user_id = $this->session->userdata('user_id'); ?> -->
  </div>
  <!-- Section 2: I/O & Process -->
  <div id="section-io" class="az-page-section az-section-io">
   <div class="az-section-header"><span class="az-section-num">2</span><span class="az-section-title">I/O &amp; Process</span></div>
 <!--Reza-->

 <div class="row" id="physical-specs-box" style="display:none;">
  <div class="col-md-6 set-44">
   <div class="form-group">
    <label for="title">Mechanical dimensions</label>
    <input type="text" class="form-control" name="mechanical_demension_mounting" id="sendNewSms">
   </div>
  </div>
  <div class="col-md-6 set-44">
   <div class="form-group">
    <label for="title">Rack Units</label>
    <select class="form-control" name="rack_unit" style="height: calc(3.25rem + 2px);">
     <option value="">Select</option>
     <?php for ($i = 1; $i <= 10; $i++){ ?>
     <option value="<?php echo "$i"; ?> RU"><?php echo "$i"; ?> RU</option>
     <?php } ?>
     <option value="10+ RU">10+ RU</option>
    </select>
   </div>
  </div>
  <div class="col-md-6 set-44">
   <div class="form-group">
    <label for="title">Power Consumption</label>
    <input type="text" class="form-control" name="power_consumption" placeholder="e.g. 45W typical, 65W max">
   </div>
  </div>
 </div>
 <script type="text/javascript">
 $(document).ready(function(){
     function togglePhysicalSpecs(){
         var pt = $('#product_type').val();
         var physical = (pt === 'Hardware' || pt === 'Hybrid');
         $('#physical-specs-box').toggle(physical);

         // Hardware/Hybrid: I/O always shown, no checkbox needed.
         // Software/Cloud Service/AI Tool: I/O hidden by default, shown via checkbox.
         var softwareLike = (pt === 'Software' || pt === 'Cloud Service' || pt === 'AI Tool');
         $('#io-toggle-wrapper').toggle(softwareLike);
         if(physical){
             $('#io-input-output-box').show();
         } else if(softwareLike){
             $('#io-input-output-box').toggle($('#io_toggle_checkbox').is(':checked'));
         } else {
             $('#io-input-output-box').hide();
         }

         // Features: shown for everything except pure Hardware
         // (Hybrid, Software, Cloud Service, AI Tool all get it).
         $('#feats').toggle(pt !== '');
     }
     $('#product_type').on('change', togglePhysicalSpecs);
     $('#io_toggle_checkbox').on('change', togglePhysicalSpecs);
     togglePhysicalSpecs();
 });
 </script>

<div id="category-attributes-box" style="display:none;border:1.5px solid #FCA311;border-radius:10px;padding:16px 20px;background:#FFF8E8;margin-bottom:20px;">
    <div style="font-size:13px;font-weight:600;color:#14213D;margin-bottom:2px;">Category-specific details</div>
    <div style="font-size:12px;color:#999;margin-bottom:14px;">These fields appear automatically based on the sub-category you selected above</div>
    <div id="category-attributes-fields"></div>
</div>
<script type="text/javascript">
$('#sub_cat_b').on('change', function(){
    var selected = $(this).val();
    if(!selected || selected.length === 0){
        $('#category-attributes-box').hide();
        $('#category-attributes-fields').html('');
        return;
    }
    var cat_c = selected[0]; // Phase 3: uses the first selected sub-category
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

<h3></h3>
<!-- <fieldset> -->

<div class="form-group" id="io-toggle-wrapper" style="display:none;">
  <label style="display:flex;align-items:center;gap:8px;font-weight:500;cursor:pointer;">
    <input type="checkbox" id="io_toggle_checkbox" style="width:16px;height:16px;">
    This software also processes live input/output streams (e.g. an encoder)
  </label>
</div>

<div id="io-input-output-box" style="display:block;">
  <div class="row input_box" id="inps">
   <div class="col-md-3 set-44">
    <div class="form-group">
     <label>Input Type</label>
     <!--<input type="text"   id="input_conn" name="input_conn[]"  placeholder="" class="typeahead inputF tm-input form-control "  />-->
       <select id="io_input_type" required name="input_conn[0][]" class="typeahead inputF tm-input form-control sets_hidden2" multiple="multiple" style="width:300px" class="populate placeholder">
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
          $k = trim($k);
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
<div id="io_input_type_chips" class="az-cat-chips"></div>
       <!--<ul id="inputSugguestion" ></ul>-->
    </div>
	</div>

  <div class="col-md-3 set-44">
   <div class="form-group">
    <label>Input Standard</label>
     <select id="io_input_standard" required name="input_process_stand[0][]" class="typeahead instand tm-input form-control sets_hidden2" style="width:300px" multiple="multiple" class="populate placeholder">
      <?php     
       $Input = $this->common_model->GetAllData('input_output','','input_process_stand','asc','','','','input_process_stand'); 
       foreach($Input as $InputSugg){
       $key= explode(',',$InputSugg['input_process_stand']);
       foreach($key as $k){
       if($k){
       // echo '<option>'.$k.'</option>';
       }
       $k = trim($k);
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
<div id="io_input_standard_chips" class="az-cat-chips"></div>
  </div>
 </div>

<!-- <input type="text" value="" data-role="tagsinput" placeholder="Add tags" /> -->

  <div class="col-md-3  set-44">
   <div class="form-group">
    <label for="title">Input Connection Type</label>
     <select id="io_input_connection_type" required name="process_connection[0][]" class="sets_hidden2 typeahead inprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
      <?php     
       $Input = $this->common_model->GetAllData('input_output','','process_connection','asc','','','','process_connection');
       foreach($Input as $InputSugg){
       $key= explode(',',$InputSugg['process_connection']);
       foreach($key as $k){
       if($k){
       // echo '<option>'.$k.'</option>';
       }
       $k = trim($k);
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
<div id="io_input_connection_type_chips" class="az-cat-chips"></div>
   </div>
  </div>

</div>
<!-- </fieldset> -->
  <div class="row input_box" id="outs">
   <div class="col-md-3 set-44">
     <div class="form-group">
       <label>Output Type</label>
        <select id="io_output_type" required name="out_conn[0][]" class="typeahead outputF tm-input form-control sets_hidden2" style="width:300px" multiple="multiple" class="populate placeholder">
         <?php     
          $Input = $this->common_model->GetAllData('input_output','','out_conn','asc','','','','out_conn');
          foreach($Input as $InputSugg){
          $key= explode(',',$InputSugg['out_conn']);
          foreach($key as $k){
          if($k){
          // echo '<option>'.$k.'</option>';
          }
          $k = trim($k);
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
<div id="io_output_type_chips" class="az-cat-chips"></div>
       </div>
      </div>

  <div class="col-md-3 set-44">
   <div class="form-group">
    <label>Output Standard</label>
     <select id="io_output_standard" required name="out_process_stand[0][]" class="typeahead otstand tm-input form-control sets_hidden2 " style="width:300px" multiple="multiple" class="populate placeholder">
      <?php    
       $Input = $this->common_model->GetAllData('input_output','','out_process_stand','asc','','','','out_process_stand'); 
       foreach($Input as $InputSugg){
       $key= explode(',',$InputSugg['out_process_stand']);
       foreach($key as $k){
       if($k){
       // echo '<option>'.$k.'</option>';
       }
       $k = trim($k);
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
<div id="io_output_standard_chips" class="az-cat-chips"></div>
   </div>
  </div>

  <div class="col-md-3 set-44">
   <div class="form-group">
    <label for="title">Output Connection Type</label>
     <select id="io_output_connection_type" required name="out_process_connection[0][]" class="sets_hidden2 typeahead otprocessConnection tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
      <?php     
       $Input = $this->common_model->GetAllData('input_output','','out_process_connection','asc','','','','out_process_connection'); 
       foreach($Input as $InputSugg)
       {
       $key= explode(',',$InputSugg['out_process_connection']);
       foreach($key as $k){
       if($k){
       // echo '<option>'.$k.'</option>';
       }
       $k = trim($k);
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
<div id="io_output_connection_type_chips" class="az-cat-chips"></div>
    </div>
   </div>  

           
</div>
</div>

  <div class="row input_box" id="proc">
   <div class="col-md-3 set-44">
    <div class="form-group">
     <label>Process Type</label>
      <select id="io_process_type" required  name="process[0][]" class="sets_hidden2 typeahead processsuggestion tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
       <?php     
        $Input = $this->common_model->GetAllData('input_output','','process','asc','','','','process'); 
        foreach($Input as $InputSugg){
        $key= explode(',',$InputSugg['process']);
        foreach($key as $k){
        if($k){
        // echo '<option>'.$k.'</option>';
        }
        $k = trim($k);
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
<div id="io_process_type_chips" class="az-cat-chips"></div>
      <!--  <input type="hidden" name="processid" id="processid" />  -->
      <!-- <ul id="processSugguestion" ></ul> -->
     </div>
    </div>

  <div class="col-md-3 set-44">
   <div class="form-group">
    <label>Process Standard</label>
     <select id="io_process_standard" required name="process_stand[0][]" class="sets_hidden2 typeahead processsuggestionStand tm-input form-control " style="width:300px" multiple="multiple" class="populate placeholder">
      <?php     
       $Input = $this->common_model->GetAllData('input_output','','process_stand','asc','','','','process_stand');  
       foreach($Input as $InputSugg){
       $key= explode(',',$InputSugg['process_stand']);
       foreach($key as $k){
       if($k){
       // echo '<option>'.$k.'</option>';
       }
       $k = trim($k);
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
<div id="io_process_standard_chips" class="az-cat-chips"></div>
    <!-- <input type="hidden" name="process_standid" id="process_standid" />  -->
    <!--  <ul id="process_standSugguestion" ></ul> -->
   </div>
  </div>
            
  <div id="Error"></div>

 </div>

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
        $k = trim($k);
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

<!--<button type="submit"  data-toggle="modal"  value="submit" class="btn submit_btn submitBtn">Submit</button> 

          <?php $user_id = $this->session->userdata('user_id'); ?>
 -->

    <div class="Error2"></div>

  </div>
  <!-- Section 3: Vendor Info -->
  <div id="section-vendor" class="az-page-section az-section-vendor">
   <div class="az-section-header"><span class="az-section-num">3</span><span class="az-section-title">Vendor Info</span></div>

 <h3></h3>

          <div class="row">

            <div class="col-sm-12">

              <div class="form-group">
                <label>Vendor Contact &amp; Ordering Info</label>
                <textarea class="form-control sets_hidden3" name="dealer_contact" id="dealer_contact" rows="3" placeholder="How can a buyer reach and order from you? e.g. website, phone, email, ordering process, lead times..."></textarea>
              </div>

              <div class="form-group">
                <label for="title">Vendor notes</label>
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
                      <div id="galleryPasteZone" tabindex="0" style="margin-top:8px;border:1.5px dashed #ccc;border-radius:6px;padding:10px 14px;font-size:12px;color:#999;cursor:text;">
                        Or click here and paste an image (Ctrl+V / Cmd+V)
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

      </div>
      <!-- Submit/Cancel sit outside the colored sections, in their own neutral area -->
      <div style="display:flex;justify-content:center;align-items:center;gap:14px;padding:28px 0;">
<div class="btnNxtEmail2"></div>
  <button type="button" name="next" id="btnNxtEmail2" class="next3 az-btn az-btn-submit">Submit</button>
   <a onclick="return (confirm('Are you sure?'))" href="<?php echo base_url();?>add-product" class="az-btn az-btn-cancel">Cancel</a>
   <?php
    $setting = $this->common_model->GetSingleData('setting','id=1');
    $amt=$setting['actual_amount'];
   ?>
   <input type="hidden" id="actual_amt" name="actual_amt" value="<?php echo $setting['actual_amount']; ?>">
      </div>

      </div>
     </div>
    </div>
   </div>
  </div>
 </section>

    <div id="testmodal" class="modal fade">

    <div class="modal-dialog" >

        <div class="modal-content" style="border-radius:14px;border:none;overflow:hidden;font-family:'Inter',sans-serif;">
             <form id="addform">
            <div style="background:#14213D;padding:28px 32px;">
                <?php
                $seing = $this->common_model->GetSingleData('setting','id=1');
                $amtt=$seing['actual_amount'];
                ?>
                <div style="display:flex;justify-content:space-between;align-items:flex-start;">
                    <div>
                        <div style="font-size:13px;color:rgba(255,255,255,0.6);font-weight:500;margin-bottom:4px;">Listing fee</div>
                        <div style="font-size:32px;font-weight:700;color:#fff;">$<?php echo $amtt;?></div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;opacity:0.7;font-size:24px;">&times;</button>
                </div>
                <div style="margin-top:20px;padding-top:16px;border-top:1px solid rgba(255,255,255,0.15);">
                    <div style="display:flex;justify-content:space-between;font-size:13px;color:rgba(255,255,255,0.6);margin-bottom:6px;">
                        <span>Device</span>
                        <span id="az-pay-summary-device" style="color:#fff;font-weight:600;text-align:right;max-width:220px;">-</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:13px;color:rgba(255,255,255,0.6);">
                        <span>Listed until</span>
                        <span id="az-pay-summary-expiry" style="color:#fff;font-weight:600;">-</span>
                    </div>
                </div>
            </div>
                <div class="modal-body" style="padding:32px;text-align:center;background:#fff;">
                    <div style="font-size:13px;font-weight:600;color:#666;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:16px;">Choose a payment method</div>

                <div style="max-width:350px;margin:0 auto;">

                <div class="form-group" style="margin-bottom:16px;">
                <span id="paypal-button-container" style="display:block;width:100%;"></span>
               </div>

                <div style="display:flex;align-items:center;gap:12px;margin:20px 0;color:#999;font-size:12px;font-weight:600;">
                    <div style="flex:1;height:1px;background:#EBEBEB;"></div>
                    OR
                    <div style="flex:1;height:1px;background:#EBEBEB;"></div>
                </div>

                <div class="form-group" style="margin-bottom:0;">
                <button type="submit" name="submit" value=""
                style="height:48px;width:100%;color:#14213D;background:#FCA311;border:none;border-radius:10px;font-family:'Inter',sans-serif;font-weight:600;font-size:15px;cursor:pointer;transition:background 0.15s;" onmouseover="this.style.background='#e8940a'" onmouseout="this.style.background='#FCA311'">Pay with Debit or Credit Card</button>
               </div>

                </div>

                <div style="margin-top:24px;display:flex;align-items:center;justify-content:center;gap:6px;color:#999;font-size:12px;">
                    <i class="ti ti-lock" style="font-size:14px;"></i>
                    <span>Secure, encrypted payment</span>
                </div>
                <div style="margin-top:10px;display:flex;align-items:center;justify-content:center;gap:6px;">
                    <svg width="34" height="22" viewBox="0 0 34 22"><rect width="34" height="22" rx="4" fill="#EBEBEB"/><text x="17" y="15" text-anchor="middle" font-family="Arial,sans-serif" font-size="9" font-weight="700" font-style="italic" fill="#1A1F71">VISA</text></svg>
                    <svg width="34" height="22" viewBox="0 0 34 22"><rect width="34" height="22" rx="4" fill="#EBEBEB"/><circle cx="14" cy="11" r="6" fill="#EB001B"/><circle cx="20" cy="11" r="6" fill="#F79E1B" opacity="0.85"/></svg>
                    <svg width="34" height="22" viewBox="0 0 34 22"><rect width="34" height="22" rx="4" fill="#2E77BC"/><text x="17" y="15" text-anchor="middle" font-family="Arial,sans-serif" font-size="7.5" font-weight="700" fill="#fff">AMEX</text></svg>
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
        $("#Error").hide();
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
                  $('#preview').append('<div class="col-md-2 " id="cancel'+k+'"><div class="img_div" ><span style="cursor:pointer" class="cancel_cls" onclick="removeImg('+k+')"><i class="fa fa-times"></i></span><img  style="height: 100px;" src='+URL.createObjectURL(file)+'><br><input type="file" name="gallery-image-orignal[]" class="form-control imageUpload" id="gallery-image-orignal'+k+'" accept="image/*" style="display:none;"></div></div>');
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
      jQuery('#upBtn').html('<i class="fa fa-upload"></i> Upload a file');
    }
   jQuery('#cancel'+i).remove();
    
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
    // Update progress bar and sidebar steps
    var stepNum = cityName.replace('menu','');
    // Update top progress bar
    document.querySelectorAll('.az-step').forEach(function(btn){
        var s = btn.getAttribute('data-step');
        btn.classList.remove('active','completed');
        if(parseInt(s) < parseInt(stepNum)) btn.classList.add('completed');
        if(s === stepNum) btn.classList.add('active');
    });
    // Update connectors
    document.querySelectorAll('.az-step-connector').forEach(function(c,i){
        c.classList.remove('active');
        if(i < parseInt(stepNum)-1) c.classList.add('active');
    });
    // Update sidebar help boxes
    document.querySelectorAll('.col-box').forEach(function(b){ b.classList.remove('active-box'); });
    var activeBox = document.getElementById('box' + stepNum);
    if(activeBox) activeBox.classList.add('active-box');
    // Update sidebar step indicators
    document.querySelectorAll('[id^="sidebar-step"]').forEach(function(s){
        s.classList.remove('active','done');
        var sNum = s.id.replace('sidebar-step','');
        if(parseInt(sNum) < parseInt(stepNum)) s.classList.add('done');
        if(sNum === stepNum) s.classList.add('active');
    });

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

$(".submit").click(function(){
  //return false;
})

</script>



<script type="text/javascript">
$(document).on('click','#inputSugguestion li',function(){
  var inpName = $(this).html();
  alert(inpName);
  $(".bootstrap-tagsinput").val(inpName); 
  $("#inputSugguestion").css("display", "none");
});

</script>

	<!--<script src="<?php echo base_url();?>assets/site/select/jquery-1.7.1.min.js"></script>-->
	<!--<script src="https://cdn.jsdelivr.net/select2/3.4.8/select2.js"></script>-->
<script type="text/javascript" class="js-code-example-tokenizer"> 

//input scrip select

$(".inputF").select2({ tags: true, tokenSeparators: [';'],
                            separator: ";",     multiple: true,
});

$('#main_cat_select').select2({ placeholder: 'Select Main Category', allowClear: true, width: '100%' });

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
$("#io_features").select2({ tags: true, tokenSeparators: [','], placeholder: 'e.g. Multi-tenant support, SSO integration, Auto-scaling', width: '100%' });



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
    
   // Cascading category dropdowns
$('#main_cat_select').on('change', function(){
    var cat_a = $(this).val();
    if(cat_a){
        $.ajax({
            url: '<?php echo base_url(); ?>get-cat-b',
            method: 'POST',
            data: {cat_a: cat_a},
            dataType: 'json',
            success: function(data){
                var opts = '<option value="">-- Select Sub-Category A --</option>';
                $.each(data, function(i, item){
                    opts += '<option value="'+item.Cat_B+'">'+item.Cat_B+'</option>';
                });
                $('#sub_cat_a').html(opts).trigger('change');
                $('#sub_cat_b').html('<option value="">-- Select Sub-Category B --</option>').trigger('change');
            }
        });
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
                var opts = '<option value="">-- Select Sub-Category B --</option>';
                $.each(data, function(i, item){
                    opts += '<option value="'+item.Cat_C+'">'+item.Cat_C+'</option>';
                });
                $('#sub_cat_b').html(opts);
            }
        });
    }
});

  // Custom chip list for Sub-Category A/B - keeps the input box itself
  // fixed-height, showing selections in a list below instead
  function renderCatChips(selectId, containerId){
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

  $('#sub_cat_a').on('change', function(){ renderCatChips('sub_cat_a', 'sub_cat_a_chips'); });
  $('#sub_cat_b').on('change', function(){ renderCatChips('sub_cat_b', 'sub_cat_b_chips'); });

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
      $('#' + pair[0]).on('change', function(){ renderCatChips(pair[0], pair[1]); });
  });

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

  // A separate widget (nice-select) sometimes also attaches to select2-managed
  // fields and duplicates the selected items inside the box itself. Remove it
  // directly rather than relying on CSS, since its DOM position isn't consistent.
  function removeCompetingNiceSelect(selectId){
      $('#' + selectId).siblings('.nice-select').remove();
  }
  var allChipFieldIds = ['sub_cat_a', 'sub_cat_b'];
  $.each(ioChipFields, function(i, pair){ allChipFieldIds.push(pair[0]); });
  function cleanupNiceSelects(){
      $.each(allChipFieldIds, function(i, id){ removeCompetingNiceSelect(id); });
  }
  cleanupNiceSelects();
  setTimeout(cleanupNiceSelects, 500);

  });
</script>

<script  async  src="https://js.stripe.com/v3/"  ></script>
	<?php  include_once 'include/footer2.php' ; ?>
<script>
$(document).ready(function(){
    $('.nice-select').each(function(){
        var $select = $(this).prev('select');
        $(this).remove();
        $select.show();
    });
    $('select[name="rack_unit"]').select2({placeholder: "Select", width: '100%'});
});
</script>

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
        <div class="modal-content stripe" style="border-radius:14px;border:none;overflow:hidden;font-family:'Inter',sans-serif;">
            <div style="background:#14213D;padding:24px 32px;display:flex;justify-content:space-between;align-items:center;">
                <h4 class="modal-title" style="color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:18px;margin:0;">Pay with Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:0.7;">
            <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="latest-stipe-from">
                <div class="modal-body" style="padding:32px;background:#fff;">
                    <div class="latest_stripe_err"></div>
                    <div class="man_box_walt">
                        <div class="wollt1">
                            <div style="text-align:center;margin-bottom:24px;">
                                <div style="font-size:13px;color:#999;font-weight:500;margin-bottom:4px;">Total</div>
                                <div style="font-size:28px;font-weight:700;color:#14213D;">$<span class="latest-strip-deposit-amount"></span>.00</div>
                            </div>

                            <label style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#666;display:block;margin-bottom:6px;">Card number</label>
                            <div id="card-element-card-number" class="form-control" style="border:1.5px solid #EBEBEB;border-radius:8px;padding:11px 14px;margin-bottom:14px;"></div>

                            <div style="display:flex;gap:12px;margin-bottom:6px;">
                                <div style="flex:1;">
                                    <label style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#666;display:block;margin-bottom:6px;">Expiry</label>
                                    <div id="card-element-card-expiry" class="form-control" style="border:1.5px solid #EBEBEB;border-radius:8px;padding:11px 14px;"></div>
                                </div>
                                <div style="flex:1;">
                                    <label style="font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#666;display:block;margin-bottom:6px;">CVC</label>
                                    <div id="card-element-card-cvc" class="form-control" style="border:1.5px solid #EBEBEB;border-radius:8px;padding:11px 14px;"></div>
                                </div>
                            </div>
                        <p id="latest-stripe-card-error" class="text-danger" role="alert" style="font-family:'Inter',sans-serif;font-size:13px;margin-top:10px;"></p>
                        <div class="form-group" style="margin-top:18px;margin-bottom:0;">
                            <button class="btn submit_btn btn-block btn-lg" id="latest-stipe-submit" style="background:#FCA311;color:#14213D;border:none;border-radius:8px;font-family:'Inter',sans-serif;font-weight:600;font-size:15px;height:48px;">
                                <span class="fa fa-spin fa-spinner" style="display:none;" id="latest-stipe-spinner"></span>
                                <span id="button-text">Pay</span>
                            </button>
                        </div> 
                   </div> 
                </div>  
            </form>

        <div class="modal-footer" style="border-top:1px solid #F0F0F0;padding:16px 32px;text-align:center;">
<img src="<?php echo base_url();?>assets/secure.png" style="width: 220px;">
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
        /*check if the item CONTAINS the typed text anywhere (not just at the start):*/
        var idx = arr[i].toUpperCase().indexOf(val.toUpperCase());
        if (idx > -1) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold, wherever they actually occur:*/
          b.innerHTML = arr[i].substr(0, idx);
          b.innerHTML += "<strong>" + arr[i].substr(idx, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(idx + val.length);
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
        /*check if the item CONTAINS the typed text anywhere (not just at the start):*/
        var idx = arr[i].toUpperCase().indexOf(val.toUpperCase());
        if (idx > -1) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold, wherever they actually occur:*/
          b.innerHTML = arr[i].substr(0, idx);
          b.innerHTML += "<strong>" + arr[i].substr(idx, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(idx + val.length);
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
    //$paypal_status=1;
    
    if($paypal_status==0){
    
    $paypal_type='sandbox';
    
    }else{

    $paypal_type='production';

    }

    $paypal_sandbox_key='AevHD51QH5gWvGly6z0OH3pj0duo6jvYnvLXUDJx7btRx6UIZwbizP-vvC1vHzC3xRV2z4cw_ohJxUnV';

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
      var deviceName = $('#device_name').val();
      $('#az-pay-summary-device').text(deviceName ? deviceName : 'Untitled device');

      var expiry = new Date();
      expiry.setFullYear(expiry.getFullYear() + 1);
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      $('#az-pay-summary-expiry').text(months[expiry.getMonth()] + ' ' + expiry.getDate() + ', ' + expiry.getFullYear());

      $('#testmodal').modal('show');
}
</script>


<script type="text/javascript">
   $('#menu1').show();
   $('#menu2').hide();
   
</script>


<script type="text/javascript">
   $(document).on('click','.next3',function(){
   $(".Error3").html('');
   show_payment_option();
  }); 

  // Scrollspy: since this is now a single scrolling page (not separate tabs),
  // highlight the current step number and update the sidebar help text based
  // on which section is actually in view, rather than on a tab click.
  (function(){
      var sections = [
          { id: 'section-device', step: '.t1', box: 'box1' },
          { id: 'section-io', step: '.t2', box: 'box2' },
          { id: 'section-vendor', step: '.t3', box: 'box3' }
      ];
      if(!('IntersectionObserver' in window)) return;
      var observer = new IntersectionObserver(function(entries){
          entries.forEach(function(entry){
              if(entry.isIntersecting){
                  var match = sections.find(function(s){ return s.id === entry.target.id; });
                  if(!match) return;
                  $('.az-step').removeClass('active');
                  $(match.step).addClass('active');
                  $('.col-box').removeClass('active-box');
                  $('#' + match.box).addClass('active-box');
              }
          });
      }, { rootMargin: '-40% 0px -40% 0px' });
      sections.forEach(function(s){
          var el = document.getElementById(s.id);
          if(el) observer.observe(el);
      });
  })();
</script>