<?php include_once 'include/header2.php'; ?>

<style>
/* ── MY PRODUCT LISTING ── */
.az-page-hero {
    background: #14213D;
    padding: 40px;
    text-align: center;
    margin-top: -20px;
}
.az-page-hero h1 {
    font-family: 'Inter', sans-serif;
    font-size: 30px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 6px;
}
.az-page-hero p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: rgba(255,255,255,0.5);
    margin: 0;
}

/* Product cards */
.az-listing-body {
    background: #F5F5F5;
    padding: 32px 40px;
    min-height: calc(100vh - 280px);
}
.az-listing-inner {
    max-width: 1100px;
    margin: 0 auto;
}
.boder_image {
    display: flex !important;
    flex-direction: row !important;
    position: static !important;
    padding: 16px !important;
    padding-left: 16px !important;
    min-height: auto !important;
    gap: 20px;
    align-items: center;
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    margin-bottom: 16px;
    transition: border-color 0.2s;
}
.boder_image:hover { border-color: #FCA311; }
.f_p_img {
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
}
.f_p_img img {
    max-width: 100% !important;
    max-height: 100% !important;
    object-fit: contain !important;
    width: auto !important;
    height: auto !important;
}
.contt {
    flex: 1 !important;
    min-width: 0 !important;
    padding: 0 !important;
}
.contt h4 a {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #14213D;
    text-decoration: none;
}
.contt h4 a:hover { color: #FCA311; }
.contt h4 span {
    display: block;
    font-size: 13px;
    color: #999;
    font-weight: 400;
    margin-top: 4px;
}
.contt h4 { margin-bottom: 12px; }

/* Action buttons */
.btn-edit {
    background: #14213D;
    color: #fff;
    border: none;
    padding: 7px 16px;
    border-radius: 6px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    display: inline-block;
    margin-right: 6px;
    cursor: pointer;
}
.btn-edit:hover { background: #0D1929; color: #fff; }
.btn-delete {
    background: #dc3545;
    color: #fff;
    border: none;
    padding: 7px 16px;
    border-radius: 6px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    margin-right: 6px;
}
.btn-delete:hover { background: #b02a37; }
.btn-cancel-listing {
    background: #FCA311;
    color: #14213D;
    border: none;
    padding: 7px 16px;
    border-radius: 6px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    margin-right: 6px;
}
.btn-active { background: #198754; color: #fff; border: none; padding: 7px 16px; border-radius: 6px; font-family: 'Inter', sans-serif; font-size: 13px; font-weight: 500; }
.btn-cancelled { background: #6c757d; color: #fff; border: none; padding: 7px 16px; border-radius: 6px; font-family: 'Inter', sans-serif; font-size: 13px; font-weight: 500; }
.btn-relist { background: #0d6efd; color: #fff; border: none; padding: 7px 16px; border-radius: 6px; font-family: 'Inter', sans-serif; font-size: 13px; font-weight: 500; cursor: pointer; }

/* Flash messages */
.print-success-msg { display: none; }

/* Modal */
.modal-dialog { width: 60% !important; max-width: 100%; }
.close { float: right; font-size: 30px; font-weight: 700; color: #000 !important; opacity: 1 !important; }

/* Payment */
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
.btn_cus:hover, .btn_cus:focus { box-shadow: 0 0 0 2px white, 0 0 0 3px #14213D; }
#latest_stripe_modal.modal.fade .modal-dialog { transform: translate(0, 15%); }
#testmodal.modal.fade .modal-dialog { transform: translate(0, 40%); }
#testmodal, #latest_stripe_modal { z-index: +11111; }
#latest_stripe_modal .form-group { position: static; }
.modal-backdrop { position: fixed !important; }
.modal-backdrop.fade.show { opacity: 0.1; }
.paypal-button:not(.paypal-button-card) { width: 100px; }
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>My Products</h1>
    <p>Manage your listed broadcast products</p>
</div>

<!-- Body -->
<div class="az-listing-body">
    <div class="az-listing-inner">

        <?php echo $this->session->flashdata('msg'); ?>
        <?php
        if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']); }
        if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']); }
        ?>
        <div class="alert alert-success print-success-msg"><ul></ul></div>

        <?php if(!empty($productlist)): ?>
        <?php foreach ($productlist as $row):
            $imageFirst = $this->common_model->GetSingleData('product_gallery_image', array('product_id' => $row['id']));
            $date = $row['approve_date'];
            $date1 = date('Y-m-d', strtotime('+14 days', strtotime($date)));
            $date2 = date('Y-m-d');
        ?>
        <div class="col-sm-12 list_page<?php echo $row['id']; ?>" style="padding:0;">
            <div class="boder_image">
                <div class="f_p_img">
                    <?php if($imageFirst['gallery_image']): ?>
                    <img src="<?php echo base_url(); ?>assets/product_image/<?=$imageFirst['gallery_image']?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="">
                    <?php endif; ?>
                </div>
                <div class="contt">
                    <h4>
                        <a href="<?php echo base_url(); ?>details/<?=$row['id']?>"><?=$row['device_model']?></a>
                        <span><?=$row['device_brand']?></span>
                        <span style="color:#BCC0C4;font-size:11px;font-weight:500;letter-spacing:0.5px;">ID: <?=$row['id']?></span>
                    </h4>

                    <!-- Edit button -->
                    <a class="btn-edit" href="<?php echo base_url(); ?>edit-my-product/<?php echo $row['id']; ?>">Edit</a>

                    <!-- Delete (only after 14 days and not cancelled) -->
                    <?php if($date2 > $date1 && $row['status'] != 3): ?>
                    <button class="btn-delete" onclick="confirm('Are you sure want to delete this product?') ? deleteproduct(<?php echo $row['id'] ?>) : ''">Delete</button>
                    <?php endif; ?>

                    <!-- Relist (cancelled) -->
                    <?php if($row['status'] == 3): ?>
                    <button class="btn-relist" onclick="paymentOption(<?php echo $row['id']; ?>)">Relist</button>
                    <?php endif; ?>

                    <!-- Cancel (within 14 days and not cancelled) -->
                    <?php if($date2 <= $date1 && $row['status'] != 3): ?>
                    <button type="button" class="btn-cancel-listing" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>">Cancel</button>

                    <!-- Cancel Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <form action="<?php echo base_url(); ?>Product/cancel_my_product" method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">We're sorry to see you go! Please tell us why you're cancelling:</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="cancel_id" value="<?php echo $row['id']; ?>">
                                    <input type="radio" name="survey" required value="Device is discontinued, no longer supported or no longer sold at our company">
                                    <label>Device is discontinued, no longer supported or no longer sold at our company</label><br>
                                    <input type="radio" name="survey" required value="There is a newer version of the device from the same manufacturer">
                                    <label>There is a newer version of the device from the same manufacturer</label><br>
                                    <input type="radio" name="survey" required value="There is a better option with similar functionality from another brand">
                                    <label>There is a better option with similar functionality from another brand</label><br>
                                    <input type="radio" name="survey" required value="Azerax does not adequately cover the system features">
                                    <label>AzeraX does not adequately cover the system features</label><br>
                                    <input type="radio" name="survey" required value="Other">
                                    <label>Other</label><br>
                                    <h4 style="color:#14213D;margin-top:12px;">Please tell us more:</h4>
                                    <textarea name="feedback" rows="3" maxlength="3000" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <?php endif; ?>

                    <!-- Status badges -->
                    <?php if($row['status'] == 1): ?>
                    <button class="btn-active" disabled>Active</button>
                    <?php elseif($row['status'] == 2): ?>
                    <span style="color:red;font-family:'Inter',sans-serif;font-size:13px;">Expired</span>
                    <button class="btn-relist" onclick="paymentOption(<?php echo $row['id']; ?>)">Renew</button>
                    <?php elseif($row['status'] == 3): ?>
                    <button class="btn-cancelled" disabled>Cancelled</button>
                    <?php elseif($row['status'] == 0): ?>
                    <i class="fa fa-exclamation-triangle" style="color:#FCA311;font-size:20px;vertical-align:middle;" title="Pending Approval"></i>
                    <span style="font-family:'Inter',sans-serif;font-size:13px;color:#999;margin-left:6px;">Pending Approval</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div style="text-align:center;padding:60px 0;">
            <p style="font-family:'Inter',sans-serif;font-size:16px;color:#999;">You have no products listed yet.</p>
            <a href="<?php echo base_url(); ?>add-product" style="background:#FCA311;color:#14213D;padding:12px 28px;border-radius:8px;font-family:'Inter',sans-serif;font-weight:600;text-decoration:none;">Add your first product</a>
        </div>
        <?php endif; ?>

    </div>
</div>

<input type="hidden" id="productRenewId" value="0">

<?php
$paymentinfo = $this->db->query("SELECT * FROM `setting`")->row_array();
$user_id = $this->session->userdata('user_id');
?>

<script>
function paymentOption(pID){
    $('#paymentOption').modal('show');
    $('#relistProdId').val(pID);
}

function renewProduct(pID=0){
    var pID = $('#relistProdId').val();
    $('#productRenewId').val(pID);
    $('#paymentOption').modal('hide');
    show_lates_stripe_popup1(<?php echo $paymentinfo['amount']; ?>, <?php echo $paymentinfo['amount']; ?>, <?php echo $user_id; ?>, <?php echo $user_id; ?>, <?php echo $user_id; ?>, 'purchasesession<?php echo $user_id; ?>', '');
}

function add_function(){
    var pID = $('#relistProdId').val();
    $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Product/renew_product_action?action=renew",
        data: {pID: pID},
        dataType: 'JSON',
        beforeSend: function(){ $(".submitBtn").prop('disabled', true); },
        fail: function(){ alert("Try again later."); },
        done: function(response){
            if(response.status == 2){ $("#Error").html(response.message).show(); }
            if(response.status == 1 || response.status == 0) location.href = response.url;
        },
        always: function(){ $(".submitBtn").prop('disabled', false); }
    });
}

function show_lates_stripe_popup1(amount, actual_amt, onSuccess=null, onError=null, onCancel=null, popupId=null, id){
    var stripe = Stripe('<?php echo $this->config->item('stripe_key'); ?>');
    $('.latest-strip-deposit-amount').html(actual_amt);
    $('#latest_stripe_modal').modal({ backdrop: 'static', keyboard: true });
    $("#latest-stipe-submit").prop('disabled', true);
    $('#card-element').show();
    fetch("home/createPaymentIntent/" + actual_amt, {
        method: "POST",
        headers: { "Content-Type": "application/json" }
    }).then(function(result){ return result.json(); }).then(function(data){
        var elements = stripe.elements();
        var elementStyles = {
            base: { color: '#32325D', fontWeight: 500, fontFamily: 'Source Code Pro, Consolas, Menlo, monospace', fontSize: '16px', fontSmoothing: 'antialiased', '::placeholder': { color: '#CFD7DF' }, ':-webkit-autofill': { color: '#e39f48' } },
            invalid: { color: '#E25950', '::placeholder': { color: '#FFCCA5' } }
        };
        var elementClasses = { focus: 'focused', empty: 'empty', invalid: 'invalid' };
        var cardNumber = elements.create('cardNumber', { style: elementStyles, classes: elementClasses });
        cardNumber.mount('#card-element-card-number');
        var cardExpiry = elements.create('cardExpiry', { style: elementStyles, classes: elementClasses });
        cardExpiry.mount('#card-element-card-expiry');
        var cardCvc = elements.create('cardCvc', { style: elementStyles, classes: elementClasses });
        cardCvc.mount('#card-element-card-cvc');
        var card = cardCvc;
        cardCvc.on("change", function(event){
            $("#latest-stipe-submit").prop('disabled', false);
            $("#latest-stripe-card-error").html(event.error ? event.error.message : "");
        });
        var form = document.getElementById("latest-stipe-from");
        form.addEventListener("submit", function(event){
            event.preventDefault();
            payWithCard(actual_amt, stripe, card, data.clientSecret, data.customerID, onSuccess, onError, onCancel, id);
        });
    });
}

var payWithCard = function(actual_amt, stripe, card, clientSecret, customerID, onSuccess=null, onError=null, onCancel=null, id){
    loading(true);
    stripe.confirmCardPayment(clientSecret, { payment_method: { card: card } }).then(function(result){
        if(result.error){ showError(result.error.message, result, onSuccess, onError, onCancel); }
        else { orderComplete(actual_amt, result, customerID, onSuccess, onError, onCancel, id); }
    });
};

var orderComplete = function(actual_amt, result, customerID, onSuccess=null, onError=null, onCancel=null, id){
    $.ajax({
        type: 'post', url: 'Product/pay_product', dataType: 'JSON',
        data: { data: result, customerID: customerID, actual_amt: actual_amt },
        success: function(res){
            if(res.status == 1){ add_function(id); }
            else { loading(false); swal('Some problem occurred, please try again.'); }
        }
    });
};

var showError = function(errorMsgText, result, onSuccess=null, onError=null, onCancel=null){
    loading(false);
    $("#latest-stripe-card-error").show().html(errorMsgText);
};

var loading = function(isLoading){
    if(isLoading){ $('#latest-stipe-submit').prop('disabled', true); $('#latest-stipe-spinner').show(); $('#button-text').hide(); }
    else { $('#latest-stipe-submit').prop('disabled', false); $('#latest-stipe-spinner').hide(); $('#button-text').show(); }
};
</script>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<?php
$paypal_status = 1;
$paypal_type = ($paypal_status == 0) ? 'sandbox' : 'production';
$paypal_sandbox_key = 'AbFUHHDTEQG4EteC3ZRMK7DoKryECW8hzEWHiLd8d0DODYLo3DyZ8GI81pjXiHjTB23X8juloXOIV3BQ';
$paypal_live_key = 'ASyCXreF_KPKY40QGH_x4isffV60_oL5rbv7XIStPu1fbht871k4uih8BmA06OVe37OQhxxCeJsJpHOp';
?>
<script>
paypal.Button.render({
    commit: true,
    style: { size: 'large', shape: 'rect', tagline: 'false', label: 'paypal' },
    env: '<?php echo $paypal_type; ?>',
    client: { sandbox: '<?php echo $paypal_sandbox_key; ?>', production: '<?php echo $paypal_live_key; ?>' },
    payment: function(data, actions){
        return actions.payment.create({ payment: { transactions: [{ amount: { total: <?php echo $paymentinfo['amount']; ?>, currency: 'AUD' } }] } });
    },
    onAuthorize: function(data, actions){
        return actions.payment.execute().then(function(){
            window.alert('Payment Complete!');
            var actual_amt = $("#actual_amt").val();
            var id = <?php echo $user_id; ?>;
            add_function(id);
        });
    }
}, '#paypal-button-container');
</script>

<?php include_once 'include/footer2.php'; ?>

<script>
function deleteproduct(id){
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>Product/deleteproduct?id=" + id,
        success: function(html){
            $(".list_page" + id).fadeOut('slow');
            $(".print-success-msg").find("ul").html('').append('Product deleted successfully.');
            $('.print-success-msg').css('display', 'block').delay(4000).fadeOut();
        }
    });
}
</script>

<!-- Payment Option Modal -->
<div id="paymentOption" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addform">
            <div class="modal-header">
                <?php
                $seing = $this->common_model->GetSingleData('setting', 'id=1');
                $amtt = $seing['actual_amount'];
                ?>
                <h3 style="color:#000;">Total: <span>$<?php echo $amtt; ?></span></h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="form-group">
                    <span class="relist-paypal" id="paypal-button-container"></span>
                    <input type="hidden" id="relistProdId" value="">
                </div>
                <div class="form-group">
                    <button type="button" onclick="renewProduct()" style="height:45px;max-width:350px;color:#fff;background:#000;border:#000;width:100%;display:inline-block;">Debit or Credit Card</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>