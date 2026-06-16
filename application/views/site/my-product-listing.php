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
  .modal-dialog {
  width: 60% !important;
  max-width: 100%;
  padding: 30px;
}  
/*.modal-content {*/
/*  background-color: #ADADAD;*/
/*  padding: 20px;*/
/*}*/
form input {
  margin-right: 10px !important;
  margin-top: 0 !important;
}
form label{
  margin-bottom: 20px;
}
.btn.btn-info.btn-prop {
  background: #14213D;
  border: none;
}
.close {
  float: right;
  font-size: 30px;
  font-weight: 700;
  line-height: 1;
  color: #000 !important;
  text-shadow: 0 1px 0 #fff;
  filter: alpha(opacity=20);
  opacity: 1 !important;
}
.btn.btn-secondary {
  background: #000;
}
.close span{
  color: #000 !important;
}
.modal-title {
  font-size: 20px;
  font-weight: bold;
  color: #14213D;
}
@media only screen and (max-width: 767px){
   .modal-dialog {
  width: 100% !important;
  max-width: 100%;
  padding: 30px;
  max-height: 90vh;
  overflow-y: scroll;
  margin-left: 0 !important;
}  
form label {
  margin-bottom: 20px;
  position: relative;
  top: -20px;
  left: 26px;
}
.others {
  top: 0;
  left: 0;
}
}

.fa-exclamation-triangle {
  position: relative;
  display: inline-block;
  //border-bottom: 1px dotted black;
}

.fa-exclamation-triangle .tooltiptext {
  visibility: hidden;
  width: 125px;
  //height: 50px;
  font-size:15px;
  background-color: #14213d;
  color: #fff;
  text-align: center;
   border-radius: 6px;

  padding: 5px;

  /* Position the tooltip */
  position: absolute;
  z-index: 0;
}

.fa-exclamation-triangle:hover .tooltiptext {
  visibility: visible;
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
.btn_cus #paypal-button-container {
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
	margin-bottom: 0;cer
}
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
	color: #444;
	line-height: 35px;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/site/js/bootstrap.min.js"></script>
<section class="banner_area add_product_img">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>My Product Listing </h2>
				<div class="page_link">
					<a href="<?php echo base_url();?>">Home</a>
					<a href="<?php echo base_url();?>my-product-listing">My Product Listing</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cat_product_area">
	<?php echo $this->session->flashdata('msg'); ?>
		<?php
      if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
    ?>
	<div class="alert alert-success print-success-msg" style="display:none">
          <ul></ul>
          </div>
	<div class="container-fluid">
		<div class="row flex-row-reverse">
			
			<div class="col-lg-12">
				
				<div class="latest_product_inner row">

<?php foreach ($productlist as $row) {

$imageFirst = $this->common_model->GetSingleData('product_gallery_image',array('product_id'=>$row['id']));

	
 ?>
					<div class="col-sm-12 list_page<?php echo $row['id']; ?>">
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
								<span>
									<?=$row['device_brand']?><br>
									<?=substr($row['dealer_notes'],0,200)?>...<br>
								</span>
							</h4>
							<?php
								$date = $row['approve_date']; 
								$date1 = date('Y-m-d',strtotime('+14 days',strtotime($date)));
								$date2 = date('Y-m-d'); 
								
								?>
							<a  class="btn main_btn signup_btn btn-samesize" href="<?php echo base_url();?>edit-my-product/<?php echo $row['id']; ?>">Edit</a> 
								<?php
								if($date2 > $date1 && $row['status']!=3)
								{
								    
								    ?>
								<a class="btn main_btn signup_btn btn-samesize" onclick="confirm('Are you sure want to delete this product?') ? deleteproduct(<?php echo $row['id'] ?>): ''" href="javascript:void(0)"  >Delete</a>

<?php } 
								if($row['status']==3) { ?>

							<button class="btn btn-success btn-sm" target="<?php echo $row['id']; ?>" onclick="paymentOption(<?php echo $row['id'];?>)" >Relist</button>
				
								
								<?php	}
								if($date2 <= $date1 && $row['status']!=3)
								{
							?>

								 <button type="button" class="btn btn-cancel btn-sm btn-samesize" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>">Cancel</button>
									
									
									<div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <form action ="<?php echo base_url();?>Product/cancel_my_product" method="POST">
										  <div class="modal-dialog cancel-btn" role="document" class="cancel-model">
											<div class="modal-content">
											  <div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel<?php echo $row['id']; ?>">We’re sorry to see you go! In order to improve our services, would you please tell us which of the following explains your reasons for terminating your listing:</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
											  </div>
											  <div class="modal-body">
												
													<input type="hidden" name="cancel_id" value="<?php echo $row['id']; ?>">
													<input type="radio" id="html" name="survey" required="required" value="Device is discontinued, no longer supported or no longer sold at our company">
													<label for="html">Device is discontinued, no longer supported or no longer sold at our company</label><br>
													<input type="radio" id="css" name="survey" required="required" value="There is a newer version of the device from the same manufacturer">
													<label for="css">There is a newer version of the device from the same manufacturer</label><br>
													<input type="radio" id="javascript" name="survey" required="required" value="There is a better option with similar functionality from another brand">
													<label for="javascript">There is a better option with similar functionality from another brand</label><br>
													<input type="radio" id="javascript" name="survey" required="required" value="Azerax does not adequately cover the system features">
													<label for="javascript">Azerax does not adequately cover the system features</label><br>
													<input type="radio" id="javascript" name="survey" required="required" value="Other">
													<label for="javascript" class="others">Other</label><br>
													<h4 style="color:#14213D;">Please tell us more:</h4><br>
													<textarea name="feedback"  rows="3" maxlength="3000" class="form-control"></textarea>
													
												
											</div>
											  <div class="modal-footer">
											    <button type="submit" class="btn btn-info btn-prop save-btn" ><i style="display:none;" class="fa fa-spinner fa-spin fa-fw btn-load" id="btn-load"> </i>Save</button>
												<button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
											</div>
											</div>
										  </div>
										  </form>
									</div>
									<?
								}
								else
								{
									
								}
						   //if($row['monthly_mail']==1){
                              ?>
								<!--<button class="btn btn-success btn-sm btn-samesize" onclick="renewProduct(<?php echo $row['id']; ?>)">Renew</button>-->

                           
                              
						    <?php 
                             // } 
                              if($row['status']==1){
                              ?>
                            <button type="button" class="btn btn-active btn-sm btn-samesize">Active</button>
						   
						   
                           <?php
                              }
                              elseif($row['status']==2){
                              ?>
                              <span style="color:red"  >Expired</span> 
								<button class="btn btn-success btn-sm btn-samesize" onclick="paymentOption(<?php echo $row['id']; ?>)">Renew</button>

                           <?php
                              } 
                              elseif($row['status']==3){
                              ?><button class="btn btn-cancelled btn-sm btn-samesize">Cancelled</button>

								<!--<button class="btn btn-success btn-sm" onclick="renewProduct(<?php echo $row['id']; ?>)">RePay</button>-->

                           <?php
                              } else if($row['status']==0){ ?>

                             <!-- 	<span style="color:blue"  >Pending/Deactivated</span>-->
                             <!--<a class="btn btn-success btn-sm" href="#">Pending</a>    -->
                             
                             <i class="fa fa-exclamation-triangle " style="color:red;font-size:30px;vertical-align:middle;">
                                 <span class="tooltiptext">Pending Approval</span>
                             </i><!--<span style="color:red;padding: 15px;">Pending Approval!</span>-->
                             <?php } ?> 

							</div>
						</div>
						
					</div>
					
	
					
					
<?php } ?>
					
				</div>
			</div>

		
		</div>
	</div>
<?php } ?>
	</div>
	</div>
	</div>
	</div>
</section><input type="hidden" id="productRenewId" value="0">


<?php 
$paymentinfo = $this->db->query("SELECT * FROM `setting` ")->row_array();

$user_id=$this->session->userdata('user_id');
?>
<script>
function paymentOption(pID){   
    

$('#paymentOption').modal('show');
$('#relistProdId').val(pID);


}

function renewProduct(pID=0){    
var pID=$('#relistProdId').val();

$('#productRenewId').val(pID);

$('#paymentOption').modal('hide');

show_lates_stripe_popup1(<?php echo $paymentinfo['amount'];?>,<?php echo $paymentinfo['amount']; ?>,<?php echo $user_id;?>,<?php echo $user_id;?>,<?php echo $user_id;?>,'purchasesession<?php echo $user_id;?>',''); 
}
</script>
<script>
function add_function(){
	//alert('hhh');
var pID= $('#relistProdId').val();
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>Product/renew_product_action?action=renew",
      data: {pID:pID},
      dataType: 'JSON',
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
        console.log(response);
       // return false;
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



  function show_lates_stripe_popup1(amount,actual_amt,onSuccess=null,onError=null,onCancel=null,popupId=null,id){
    
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

		  total: <?php echo $paymentinfo['amount'];?>,

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
    var id=<?php echo $user_id;?>
   // payment_process_paypal(paymentType,actual_amt,paymentIntent_id);
    add_function(id);

    });

},

}, '#paypal-button-container');

</script>




<?php include_once 'include/footer.php' ; ?>

<script type="text/javascript">
	function deleteproduct(id){  

	$.ajax({
        type: 'POST', 
        url: "<?php echo base_url(); ?>Product/deleteproduct?id="+id,
        beforeSend:function()
    {
      
     // $('.btn-load-addMoreSpecilities').show();

    },
    success:function(html)
    { 
        $(".list_page" + id).fadeOut('slow');         
        $(".print-success-msg").find("ul").html('');
        $(".print-success-msg").css('display','block');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").find("ul").append('Success! Product has been deleted successfully.');
        $('.print-success-msg').fadeIn('slow', function(){
               $('.print-success-msg').delay(4000).fadeOut(); 
            });
       
        return false;
    }
    });    
}

</script>

<!--payment option selection-->
	
	 <div id="paymentOption" class="modal fade">
     
    <div class="modal-dialog" >
        <div class="modal-content">
             <form id="addform">
            <div class="modal-header ">
                <?php
                $seing = $this->common_model->GetSingleData('setting','id=1');
                $amtt=$seing['actual_amount'];
                ?>
                <h3 class="text" style="color: #000;"> Total: <span> $<?php echo $amtt;?></span> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
                <div class="modal-body " style="text-align: center;">
                    
                <div class="form-group ">
                <span  class="relist-paypal " id="paypal-button-container"></span>
                <input type="hidden" id="relistProdId" value="" >
               </div> 
                <div class="form-group">
                <button type="button" onclick=renewProduct() style=" height: 45px; max-width: 350px; overflow: hidden; color: #fff; background: #000; border: #000;   width: 100%;   display: inline-block;">Debit or Credit Card</button>
               </div> 
           </div>
         <!--<div class="modal-footer">
        </div>-->
      </form>
     </div>
   </div>
</div>
	<!--payment option selection end here-->
