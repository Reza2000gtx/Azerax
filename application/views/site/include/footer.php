
<script  async  src="https://js.stripe.com/v3/"  ></script>
<style>
  .above-footer{
    width: 100%;
    background: #000;
    color:#fff;
    padding: 10px;
    border: ;
  }

</style>
<?php 
$product1 = $this->common_model->GetAllData('product',array('status'=>1));
$active=count($product1);
$product2 = $this->common_model->GetAllData('product',array('status'=>0));
$pending=count($product2);
$result=$active+$pending;
?>
<div class="above-footer footer-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="list-devices">
          <h4 style="text-align:right;">Listed Devices: <?php echo $result;?> </h4>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<footer class="footer-area">
							<div class="container">
								<div class="row">
									<div class="col-lg-3  col-md-6 col-sm-6">
										<div class="single-footer-widget">
											<h6 class="footer_title">About</h6>
											<p style="text-align: justify;">
<?php  
$resultFooter = $this->common_model->GetAllData('ContentManagement');
 foreach ($resultFooter as $valueFoo) {
//echo $valueFoo["aboutFooter"];
}
?>      
<ul class="list list_foo">
                        <li><a  href="<?php echo base_url();?>about" >About</a></li>
                        <li><a href="<?php echo base_url();?>fee-charges" >Fees & Charges</a></li>
                        <li><a href="<?php echo base_url();?>privacy" >Privacy Policy</a></li>
                        <li><a href="<?php echo base_url();?>terms-condition" >Terms and Conditions</a></li>
                        <li><a href="<?php echo base_url();?>sitemap" >Sitemap</a></li>

                        </ul>                  
                      </p>
										</div>
									</div>
								<!-- 	<div class="col-lg-4 col-md-6 col-sm-6">
										<div class="single-footer-widget">
											<h6 class="footer_title">Newsletter</h6>
											<p>
<?php  
$resultFooter = $this->common_model->GetAllData('ContentManagement');
 foreach ($resultFooter as $valueFoo) {
echo $valueFoo["newLetter"];
}
?> 
                      </p>
											<div id="mc_embed_signup">
												<form target="_blank" action="" class="subscribe_form relative">
													<div class="input-group d-flex flex-row">
														<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" type="email">
														<button class="btn sub-btn" onclick="alert('comming soon');" ><span class="lnr lnr-arrow-right"></span></button>
													</div>
													<div class="mt-10 info"></div>
												</form>
											</div>
										</div>
									</div> -->
									<div class="col-lg-3 col-md-6 col-sm-6">
										<div class="single-footer-widget instafeed">
											<h6 class="footer_title">Quick Links</h6>
											<ul class="list list_foo">
											<ul class="list list_foo">
                        <li><a href="<?php echo base_url();?>how_its_work" >How it works</a></li>
                        <li><a href="<?php echo base_url();?>support" >Help and Support</a></li>
                        <li><a href="<?php echo base_url();?>contact-us" >Contact US</a></li>
                      </ul>
												
										
											</ul>
										</div>
									</div>
									<!-- <div class="col-lg-2 col-md-6 col-sm-6">
										<div class="single-footer-widget f_social_wd">
											<h6 class="footer_title">Follow Us</h6>
											<p>Let us be social</p>
											<div class="f_social">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-dribbble"></i></a>
												<a href="#"><i class="fa fa-behance"></i></a>
											</div>
										</div>
									</div> -->
								</div>
								<div class="row footer-bottom d-flex justify-content-between align-items-center">
					<p class="col-lg-12 footer-text text-center">
										Copyright &copy; 2021 All Rights Reserved.</a>
									</p>
								</div>
							</div>
						</footer>



						
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
    

//console.log(card1);

        cardCvc.on("change", function (event) {
            // Disable the Pay button if there are no card details in the Element
            $("#latest-stipe-submit").prop('disabled',false);
            console.log('sdfd---'+event.error);
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



var payWithCard = function(actual_amt,stripe, card, clientSecret, customerID,onSuccess,onError,onCancel,id) {
  loading(true);
  stripe.confirmCardPayment(clientSecret, {
        payment_method: {
            card: card
        },
    }).then(function(result) {
        console.log('result--'+result);
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
            data:{data:result,customerID:customerID,actual_amt:actual_amt,paymentIntent_id:'0'},
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
function toggleClose(classid,listClick) {
    
    
        $('.'+classid).slideUp(200);
        $('.'+listClick).attr('onclick','toggleOpen("'+classid+'","'+listClick+'")');
        
         return false;
    }

function toggleOpen(classid,listClick) {
    
    
        $('.'+classid).slideDown(200);
        $('.'+listClick).attr('onclick','toggleClose("'+classid+'","'+listClick+'")');
        
        return false;
    }
</script>






<?php } ?>
<style>
    #ssl a{
        
        float:right;
    }
</style>
<div id="ssl">

<script language="JavaScript" type="text/javascript">
TrustLogo("https://azerax.com/sectigo_trust_seal_sm_82x32.png", "CL1", "none");
</script>
<a href="https://ssl.comodo.com" id="comodoTL">Comodo SSL</a>

</div>
	   </body>

	</html>

	   </body>

	</html>	
<!--<script>-->
<!--$(document).ready(function(){-->
<!--	$(".filter-show .btn").click(function(){-->
<!--	$(".left_sidebar_area").addClass("show-filterdiv");-->
<!--	$("body").addClass("hiddenover");-->
<!--});-->
<!--$(".close-filter").click(function(){-->
<!--	$(".left_sidebar_area").removeClass("show-filterdiv");-->
<!--	$("body").removeClass("hiddenover");-->
<!--});-->
<!--});-->
<!--</script>-->
