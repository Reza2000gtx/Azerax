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

/* Status badges - informational only, never clickable */
.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 500;
    padding: 4px 10px;
    border-radius: 20px;
    width: 130px;
    flex-shrink: 0;
    white-space: nowrap;
}
.status-badge.is-active { background: #EAF3DE; color: #27500A; }
.status-badge.is-pending { background: #FAEEDA; color: #633806; }
.status-badge.is-cancelled { background: #FCEBEB; color: #791F1F; }
.status-badge.is-expired { background: #F1EFE8; color: #444441; }
.status-badge i { font-size: 13px; }

/* Action buttons - consistent shape, color tied to meaning */
.btn-edit, .btn-delete, .btn-relist, .btn-cancel-listing {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    padding: 7px 16px;
    border-radius: 6px;
    border: none;
    text-decoration: none;
    display: inline-block;
    margin-right: 6px;
    cursor: pointer;
    width: 90px;
    text-align: center;
    box-sizing: border-box;
}
.btn-edit { background: #14213D; color: #fff; }
.btn-edit:hover { background: #0D1929; color: #fff; }
.btn-delete { background: #A32D2D; color: #fff; }
.btn-delete:hover { background: #791F1F; }
.btn-cancel-listing { background: transparent; color: #854F0B; border: 1px solid #EF9F27; }
.btn-cancel-listing:hover { background: #FAEEDA; }
.btn-relist { background: #FCA311; color: #14213D; }
.btn-relist:hover { background: #e8940a; }

/* Flash messages */
.print-success-msg { display: none; }

/* Modal */
.modal-dialog { width: 60% !important; max-width: 100%; }
#paymentOption .modal-dialog, #latest_stripe_modal .modal-dialog { width: 480px !important; }
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
#paymentOption.modal.fade .modal-dialog { transform: translate(0, 40%); }
#paymentOption, #latest_stripe_modal { z-index: +11111; }
#latest_stripe_modal .form-group { position: static; }
.modal-backdrop { position: fixed !important; }
.modal-backdrop.fade.show { opacity: 0.1; }
.paypal-button:not(.paypal-button-card) { width: 100px; }

/* Cancel-listing submit button loading state */
.az-cancel-submit-btn:disabled { opacity: 0.75; cursor: default; }
.az-cancel-spinner {
    display: inline-block;
    width: 14px;
    height: 14px;
    border: 2px solid rgba(20,33,61,0.3);
    border-top-color: #14213D;
    border-radius: 50%;
    animation: az-cancel-spin 0.7s linear infinite;
    margin-right: 8px;
    vertical-align: -2px;
}
@keyframes az-cancel-spin { to { transform: rotate(360deg); } }
@media (prefers-reduced-motion: reduce) { .az-cancel-spinner { animation: none; } }
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

        <!-- Filter tabs -->
        <div class="az-listing-filters" style="display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;">
            <button type="button" class="az-filter-btn active" data-filter="all">All</button>
            <button type="button" class="az-filter-btn" data-filter="active">Active</button>
            <button type="button" class="az-filter-btn" data-filter="pending">Pending Approval</button>
            <button type="button" class="az-filter-btn" data-filter="expiring">Expiring Soon</button>
        </div>
        <style>
        .az-filter-btn { background:#fff; color:#14213D; border:1.5px solid #EBEBEB; padding:8px 18px; border-radius:6px; font-family:'Inter',sans-serif; font-weight:600; font-size:13px; cursor:pointer; }
        .az-filter-btn.active { background:#14213D; color:#fff; border-color:#14213D; }
        .az-expiry-countdown { display:inline-flex !important; width:auto !important; max-width:max-content !important; flex:0 0 auto !important; font-family:'Inter',sans-serif; font-size:12px; font-weight:600; color:#dc3545; background:#FCEBEB; padding:2px 10px; border-radius:12px; margin-left:6px; white-space:nowrap; }
        </style>

        <?php foreach ($productlist as $row):
            // Show the vendor's chosen main image if one is set; otherwise
            // fall back to whatever gallery image happens to exist first.
            if(!empty($row['product_image'])){
                $thumbnailImage = $row['product_image'];
            } else {
                $imageFirst = $this->common_model->GetSingleData('product_gallery_image', array('product_id' => $row['id']));
                $thumbnailImage = !empty($imageFirst['gallery_image']) ? $imageFirst['gallery_image'] : '';
            }
            $date = $row['approve_date'];
            $date1 = date('Y-m-d', strtotime('+14 days', strtotime($date)));
            $date2 = date('Y-m-d');

            // Expiring Soon: active listing whose expiry falls within the
            // next 2 months, matching the same window the existing expiry
            // email system already warns at.
            $days_to_expiry = null;
            $is_expiring_soon = false;
            if($row['status'] == 1 && !empty($row['expiry_date'])){
                $days_to_expiry = ceil((strtotime($row['expiry_date']) - strtotime($date2)) / 86400);
                if($days_to_expiry >= 0 && $days_to_expiry <= 60){
                    $is_expiring_soon = true;
                }
            }

            $filter_group = 'all';
            if($row['status'] == 0) $filter_group = 'pending';
            elseif($is_expiring_soon) $filter_group = 'expiring';
            elseif($row['status'] == 1) $filter_group = 'active';
        ?>
        <div class="col-sm-12 list_page<?php echo $row['id']; ?>" style="padding:0;" data-az-filter-group="<?php echo $filter_group; ?>">
            <div class="boder_image">
                <div class="f_p_img">
                    <?php if($thumbnailImage): ?>
                    <img src="<?php echo base_url(); ?>assets/product_image/<?=$thumbnailImage?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="">
                    <?php endif; ?>
                </div>
                <div class="contt">
                    <h4>
                        <?php if($row['status'] == 1): ?>
                        <span style="display:flex;align-items:center;white-space:nowrap;margin-bottom:8px;">
                        <span class="status-badge is-active"><i class="fa fa-check-circle" aria-hidden="true"></i>Active</span>
                        <?php if($is_expiring_soon): ?>
                        <span class="az-expiry-countdown"><?= $days_to_expiry ?> day<?= $days_to_expiry == 1 ? '' : 's' ?> until expiry</span>
                        <?php endif; ?>
                        </span>
                        <?php
                        if($date2 <= $date1){
                            $days_left = ceil((strtotime($date1) - strtotime($date2)) / 86400);
                            if($days_left > 0){
                        ?>
                        <span style="font-family:'Inter',sans-serif;font-size:12px;color:#854F0B;margin-left:6px;"><?= $days_left ?> day<?= $days_left == 1 ? '' : 's' ?> remaining in cooling-off period</span>
                        <?php } } ?>
                        <?php elseif($row['status'] == 2): ?>
                        <span class="status-badge is-expired"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>Expired</span>
                        <?php elseif($row['status'] == 3): ?>
                        <span class="status-badge is-cancelled"><i class="fa fa-minus-circle" aria-hidden="true"></i>Cancelled</span>
                        <?php elseif($row['status'] == 0): ?>
                        <span class="status-badge is-pending"><i class="fa fa-clock-o" aria-hidden="true"></i>Pending approval</span>
                        <?php endif; ?>
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

                    <!-- Relist (cancelled) / Renew (expired) -->
                    <?php if($row['status'] == 3): ?>
                    <button class="btn-relist" onclick="paymentOption(<?php echo $row['id']; ?>)">Relist</button>
                    <?php elseif($row['status'] == 2): ?>
                    <button class="btn-relist" onclick="paymentOption(<?php echo $row['id']; ?>)">Renew</button>
                    <?php endif; ?>

                    <!-- Cancel (within 14 days and not cancelled) -->
                    <?php if($date2 <= $date1 && $row['status'] != 3): ?>
                    <button type="button" class="btn-cancel-listing" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>">Cancel</button>

                    <!-- Cancel Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <form class="az-cancel-form" action="<?php echo base_url(); ?>Product/cancel_my_product" method="POST">
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
                                    <button type="submit" class="az-cancel-submit-btn" style="background:#FCA311;color:#14213D;border:none;padding:10px 24px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;cursor:pointer;">
                                        <span class="az-cancel-spinner" style="display:none;"></span><span class="az-cancel-btn-label">Submit</span>
                                    </button>
                                    <button type="button" class="btn" data-dismiss="modal" style="background:#fff;color:#14213D;border:1.5px solid #EBEBEB;padding:10px 24px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
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
    // Wait for #paymentOption to genuinely finish closing (including its
    // backdrop) before showing the next modal - showing one immediately
    // while the other is still mid-transition can leave a stale backdrop
    // that visually blocks the new modal even though it's technically open.
    $('#paymentOption').one('hidden.bs.modal', function(){
        show_lates_stripe_popup1(<?php echo $paymentinfo['amount']; ?>, <?php echo $paymentinfo['amount']; ?>, <?php echo $user_id; ?>, <?php echo $user_id; ?>, <?php echo $user_id; ?>, 'purchasesession<?php echo $user_id; ?>', '');
    });
    $('#paymentOption').modal('hide');
}

function add_function(id, paymentIntent_id){
    var pID = $('#relistProdId').val();
    $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Product/renew_product_action?action=renew",
        data: {pID: pID, paymentIntent_id: paymentIntent_id},
        dataType: 'JSON',
        beforeSend: function(){ $(".submitBtn").prop('disabled', true); },
        error: function(){ alert("Try again later."); },
        success: function(response){
            if(response.status == 2){ $("#Error").html(response.message).show(); }
            if(response.status == 1 || response.status == 0) location.href = response.url;
        },
        complete: function(){ $(".submitBtn").prop('disabled', false); }
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
        // Clear these first - if the modal was opened before in this same
        // page session, they'd still contain the previous mount's content,
        // which is what Stripe's "contains child nodes" warning is about.
        $('#card-element-card-number, #card-element-card-expiry, #card-element-card-cvc').empty();
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
            payWithCard(actual_amt, stripe, card, data.clientSecret, data.customerID, data.paymentIntent_id, onSuccess, onError, onCancel, id);
        });
    });
}

var payWithCard = function(actual_amt, stripe, card, clientSecret, customerID, paymentIntent_id, onSuccess=null, onError=null, onCancel=null, id){
    loading(true);
    stripe.confirmCardPayment(clientSecret, { payment_method: { card: card } }).then(function(result){
        if(result.error){ showError(result.error.message, result, onSuccess, onError, onCancel); }
        else { orderComplete(actual_amt, result, customerID, paymentIntent_id, onSuccess, onError, onCancel, id); }
    }).catch(function(err){
        // Without this, an unexpected rejection (rather than a normal
        // result.error) left the Pay button stuck indefinitely with no
        // feedback at all.
        showError('Something went wrong processing your card. Please try again.', err, onSuccess, onError, onCancel);
    });
};

var orderComplete = function(actual_amt, result, customerID, paymentIntent_id, onSuccess=null, onError=null, onCancel=null, id){
    $.ajax({
        type: 'post', url: 'Product/pay_product', dataType: 'JSON',
        data: { data: result, customerID: customerID, actual_amt: actual_amt, paymentIntent_id: paymentIntent_id },
        success: function(res){
            if(res.status == 1){ add_function(id, paymentIntent_id); }
            else { showError('Some problem occurred, please try again.', res, onSuccess, onError, onCancel); }
        },
        error: function(){
            showError('Some problem occurred recording your payment. Please try again.', null, onSuccess, onError, onCancel);
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
<script async src="https://js.stripe.com/v3/"></script>
<?php
$paypal_status = 0;
$paypal_type = ($paypal_status == 0) ? 'sandbox' : 'production';
$paypal_sandbox_key = 'AevHD51QH5gWvGly6z0OH3pj0duo6jvYnvLXUDJx7btRx6UIZwbizP-vvC1vHzC3xRV2z4cw_ohJxUnV';
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

<script>
document.querySelectorAll('.az-filter-btn').forEach(function(btn){
    btn.addEventListener('click', function(){
        document.querySelectorAll('.az-filter-btn').forEach(function(b){ b.classList.remove('active'); });
        btn.classList.add('active');
        var filter = btn.getAttribute('data-filter');
        document.querySelectorAll('[data-az-filter-group]').forEach(function(card){
            var group = card.getAttribute('data-az-filter-group');
            card.style.display = (filter === 'all' || group === filter) ? '' : 'none';
        });
    });
});
</script>

<!-- Payment Option Modal -->
<div id="paymentOption" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:14px;border:none;overflow:hidden;font-family:'Inter',sans-serif;">
            <form id="addform">
            <div style="background:#14213D;padding:28px 32px;">
                <?php
                $seing = $this->common_model->GetSingleData('setting', 'id=1');
                $amtt = $seing['actual_amount'];
                ?>
                <div style="display:flex;justify-content:space-between;align-items:flex-start;">
                    <div>
                        <div style="font-size:13px;color:rgba(255,255,255,0.6);font-weight:500;margin-bottom:4px;">Relisting fee</div>
                        <div style="font-size:32px;font-weight:700;color:#fff;">$<?php echo $amtt; ?></div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" style="color:#fff !important;opacity:0.7 !important;font-size:24px;">&times;</button>
                </div>
            </div>
            <div class="modal-body" style="padding:32px;text-align:center;background:#fff;">
                <div style="font-size:13px;font-weight:600;color:#666;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:16px;">Choose a payment method</div>

                <div class="form-group" style="margin-bottom:16px;">
                    <span class="relist-paypal" id="paypal-button-container"></span>
                    <input type="hidden" id="relistProdId" value="">
                </div>

                <div style="display:flex;align-items:center;gap:12px;margin:20px 0;color:#999;font-size:12px;font-weight:600;">
                    <div style="flex:1;height:1px;background:#EBEBEB;"></div>
                    OR
                    <div style="flex:1;height:1px;background:#EBEBEB;"></div>
                </div>

                <div class="form-group" style="margin-bottom:0;">
                    <button type="button" onclick="renewProduct()" style="height:48px;width:100%;color:#14213D;background:#FCA311;border:none;border-radius:8px;font-family:'Inter',sans-serif;font-weight:600;font-size:15px;cursor:pointer;" onmouseover="this.style.background='#e8940a'" onmouseout="this.style.background='#FCA311'">Pay with Debit or Credit Card</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Stripe card-entry modal - this was entirely missing before, even
     though the CSS and JS on this page already referenced it. That's why
     clicking "Debit or Credit Card" did nothing: it tried to open a modal
     that didn't exist. -->
<div class="modal fade" id="latest_stripe_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content stripe" style="border-radius:14px;border:none;overflow:hidden;font-family:'Inter',sans-serif;">
            <div style="background:#14213D;padding:24px 32px;display:flex;justify-content:space-between;align-items:center;">
                <h4 class="modal-title" style="color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:18px;margin:0;">Pay with Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff !important;opacity:0.7 !important;">
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
</div>

<script>
// Each product row has its own cancel form/modal, all sharing this class -
// wiring this once covers all of them.
document.querySelectorAll('.az-cancel-form').forEach(function(form){
    form.addEventListener('submit', function(){
        var btn = form.querySelector('.az-cancel-submit-btn');
        var spinner = form.querySelector('.az-cancel-spinner');
        var label = form.querySelector('.az-cancel-btn-label');
        if(btn) btn.disabled = true;
        if(spinner) spinner.style.display = 'inline-block';
        if(label) label.textContent = 'Submitting...';
    });
});
</script>