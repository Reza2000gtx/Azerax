<?php include_once 'include/header2.php';?>
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
	z-index: 99;
	background: #e5e5e5;
	width: 100%;
	max-height: 250px;
	overflow-y: auto;
	overflow-x: hidden;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  
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

.search-form{
  
  position: relative;
 
}

.search-channel-container {
   width: 100%;

}
.space {
  position:relative;
  min-height: 230px;
  background-color: #fff;
  width: 100%;
  display: grid;
  place-items: center;
 
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

 </style>


      <section class="home_banner_area">
       	<div class="banner_inner d-flex align-items-center">
					<!--<div class="container">-->
						<div class="search-form-container">
             <div class="container">
              <form method="get" class="search-form" action="<?php echo base_url();?>search-listing">
					   		<h1 id="search-form-title">search for devices, components, services</h1>
                 	<div class="search-container">
										<div class="search-inner-container" style="z-index: 1;">
											<div class="search-inner-container" style="z-index: 1;">
												<div class="search-input-container" id="inps">
												 <i class="lnr lnr-magnifier"></i>
                        <div class="autocomplete">
  											<input data-toggle="#hidden1" class="rui-input rui-location-box rui-auto-complete-input"   autocomplete="off" placeholder="" id="device_name" name="keyword" />												
                        </div>

                        <!--<div class="clear-text-container">
                        <a class="rui-icon rui-icon-cross" title="Clear text"></a>
                        </div>-->
                        <button type="submit" hidden id="submit" class="btn main_btn signup_btn"><!-- rui-search-button -->
                        <span class="rui-visually">Search</span>
                        </button>
                        <div class="focus-border" style="display: none;"></div>
                      </div>
												
                      <input type="hidden" name="productid" id="productid" />
                      <div class="hidden" id="hidden1" style="display: none;" data-hidden="true">
                      <ul style="color: white;" id="processSugguestion" ></ul>
                    </div>  
                  </div>
                      <center>
						        	<input type="button"  class="btn main_btn signup_btn spance_nav" value="Advanced Search" id="btnShowHide" style="margin-top:30px;"/>
					          	</center>  
    
                      </div>
								    </div>
								  <div class="rui-clearfix"></div>
								<!--</form>-->
							</div>
						</div>
					</div>
        </section>

        
         <div class="space"> 
					<!--<nav class="search-channel-container">-->
					   <div class="search_new_des2" id="divShowHide" style="display: none; ">
							 <div class="anim">
					  		 	<ul class="list">
                     <li class="">
  								 			<div class="btn_usch" >
									 				<div class="" >
	    										 	<!--<input type="checkbox" name="by_input" value=1>-->
											 			By Category
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
		<div class="" >
	     <!--<input type="checkbox" name="by_input" value=1>-->
				By Input
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
		  	 <!--<input type="checkbox" name="by_output" value=1 > -->
				By output
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
					<!--<input type="checkbox" name="by_process" value=1 >-->
					By process
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
					<button class="btn main_btn signup_btn">Search</button>
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

   <div class="spacer"></div>
              

   <?php include_once 'include/footer2.php' ; ?> 
   <script type="text/javascript">
		$(document).ready(function(){
         $("#btnShowHide").click(function(){
		    	$("#divShowHide").toggle();
        });
			});
	</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 
$(".catA").select2({placeholder: "Main Category",tags: true, tokenSeparators: [';'], separator: ";", multiple: true,});
$(".catB").select2({tags: true,placeholder: "Sub-Category A", tokenSeparators: [','] });
$(".catC").select2({tags: true,placeholder: "Sub-Category B", tokenSeparators: [',', ''] });
</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 
$(".inputF").select2({placeholder: "Input Type",tags: true, tokenSeparators: [';'], separator: ";", multiple: true,});
$(".instand").select2({tags: true,placeholder: "Input Standard", tokenSeparators: [','] });
$(".inprocessConnection").select2({ tags: true,placeholder: "Input Connection Type", tokenSeparators: [',', ''] });
</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 
$(".outputF").select2({tags: true,placeholder: "Output Type", tokenSeparators: [',', ' '] });
$(".otstand").select2({tags: true, placeholder: "Output Standard",tokenSeparators: [',', ' '] });
$(".otprocessConnection").select2({ tags: true, placeholder: "Output Connection Type",tokenSeparators: [',', ' '] });
</script>

<script type="text/javascript" class="js-code-example-tokenizer"> 
$(".processsuggestion").select2({tags: true,placeholder: "Process Type", tokenSeparators: [',', ' '] });
$(".processsuggestionStand").select2({tags: true,placeholder: "Process Standard", tokenSeparators: [',', ' '] });
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