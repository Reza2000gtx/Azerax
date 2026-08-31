<?php include_once 'include/header2.php' ; ?>
<?php
// Vendor Contact & Ordering Info: the Add/Edit Product form now saves this as
// one combined field (dealer_contact). Older listings may still only have the
// separate legacy fields populated - combine whatever exists so nothing is lost.
$vendor_contact_parts = array();
if(!empty($product_detail['dealer_contact'])){
    $vendor_contact_parts[] = $product_detail['dealer_contact'];
}
if(!empty($product_detail['dealer_web_cont'])){
    $vendor_contact_parts[] = $product_detail['dealer_web_cont'];
}
if(!empty($product_detail['order_code'])){
    $vendor_contact_parts[] = $product_detail['order_code'];
}
$vendor_contact_combined = implode("\n", $vendor_contact_parts);
?>
<?php if($this->session->userdata('user_id')){ ?>
<div style="background:#F5F5F5;padding:10px 40px;border-bottom:1px solid #EBEBEB;">
    <a href="<?php echo base_url(); ?>my-product-listing" style="font-family:'Inter',sans-serif;font-size:13px;color:#14213D;text-decoration:none;">← Back to My Products</a>
</div>
<?php } ?>

<style>
/* ── CAROUSEL ── */
.carousel-indicators {
    position: relative;
    bottom: auto;
    margin: 10px 0 0 0;
    display: flex;
    gap: 8px;
    justify-content: flex-start;
    flex-wrap: wrap;
}
.carousel-indicators li {
    width: 60px !important;
    height: 60px !important;
    text-indent: 0 !important;
    background: #F5F5F5;
    border-radius: 6px;
    overflow: hidden;
    opacity: 0.6;
    cursor: pointer;
    flex-shrink: 0;
}
.carousel-indicators li.active {
    opacity: 1;
    border: 2px solid #FCA311;
}
.carousel-indicators li img {
    width: 100% !important;
    height: 100% !important;
    object-fit: contain;
}
.carousel-item img {
    max-height: 350px;
    object-fit: contain;
    background: #F5F5F5;
    border-radius: 12px;
}

/* ── ICONS ── */
.icon_btn {
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    padding: 0 !important;
    color: #ccc;
    font-size: 20px;
    text-decoration: none;
}
.icon_btn:hover { color: #dc3545; }
.icon_btn .fa-heart { color: #dc3545; }

/* ── DETAIL INFO PANEL ── */
.az-detail-info { padding: 10px 0; }
.az-detail-model {
    font-family: 'Inter', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 4px;
    letter-spacing: -0.5px;
}
.az-detail-brand {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #999;
    margin-bottom: 20px;
    font-weight: 500;
}
.az-detail-grid {
    border: 1.5px solid #EBEBEB;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
}
.az-detail-row {
    display: flex;
    align-items: flex-start;
    border-bottom: 1px solid #F0F0F0;
    padding: 10px 16px;
}
.az-detail-row:last-child { border-bottom: none; }
.az-detail-label {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: #999;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    width: 160px;
    flex-shrink: 0;
}
.az-detail-value {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #14213D;
    flex: 1;
}
.az-detail-notes {
    background: #F9F9F9;
    border-radius: 10px;
    padding: 16px;
    margin-bottom: 20px;
}
.az-detail-notes p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #555;
    line-height: 1.75;
    margin: 0;
}

/* ── TABS ── */
.az-tabs-section {
    background: #F5F5F5;
    padding: 40px 0;
}
#myTab {
    background: transparent;
    border-bottom: 2px solid #EBEBEB;
    gap: 4px;
}
#myTab .nav-item .nav-link {
    color: #666 !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    padding: 12px 24px !important;
    border: none !important;
    border-bottom: 2px solid transparent !important;
    border-radius: 0 !important;
    background: transparent !important;
    margin-bottom: -2px;
    transition: all 0.15s;
}
#myTab .nav-item .nav-link:hover {
    color: #14213D !important;
    border-bottom-color: #14213D !important;
}
#myTab .nav-item .nav-link.active {
    color: #14213D !important;
    font-weight: 600 !important;
    border-bottom: 2px solid #FCA311 !important;
    background: transparent !important;
}
.tab-content {
    background: #fff;
    border-radius: 0 0 12px 12px;
    padding: 24px;
    border: 1.5px solid #EBEBEB;
    border-top: none;
}
.tab-content table h5 {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #14213D;
    margin: 0;
}
.tab-content table td {
    padding: 10px 16px;
    border-bottom: 1px solid #F0F0F0;
    vertical-align: top;
}
.tab-content table tr:has(td h5:empty) {
    display: none;
}
.tab-content table td:first-child {
    color: #999;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    width: 200px;
}
/* No horizontal scrolling - the table must stay within its container's
   width, growing taller (wrapping long lines) rather than wider. */
.tab-content .table-responsive {
    overflow-x: hidden;
}
.tab-content table {
    table-layout: fixed;
    width: 100%;
}
.tab-content table td:last-child {
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal;
}

.carousel-item img {
    max-height: 350px;
    max-width: 100%;
    object-fit: contain;
    background: #F5F5F5;
    border-radius: 12px;
}
#carouselExampleIndicators {
    max-width: 500px;
}

#myTab {
    display: inline-flex !important;
}

.tab-content table tr:first-child td {
    border-top: none;
}
.tab-content table {
    border-collapse: collapse;
}
.tab-content table tbody tr:first-child td {
    border-top: none !important;
}
/* Spec table label column - fixed width so it doesn't shift around, but
   long labels like "Vendor Contact & Ordering Info" wrap onto a second
   line within that width rather than overflowing into the value column
   next to it. */
.tab-content table tbody tr td:first-child {
    width: 240px;
    white-space: normal;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #14213D;
    vertical-align: middle;
}
</style>

<div style="background:#fff;padding:40px 0;">
    <div class="container-fluid" style="padding:0 40px;max-width:1400px;margin:0 auto;">
        <div class="row">

            <!-- LEFT COL: Image + Specs Grid -->
            <div class="col-lg-6">
                <?php $product_gallery = $this->common_model->GetAllData('product_gallery_image', array('product_id' => $product_detail['id'])); ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="<?php echo (count($product_gallery) > 1) ? 'carousel' : 'false'; ?>">
                    <div class="carousel-inner">
                        <?php
                        $j = 1;
                        if(empty($product_gallery)){
                        ?>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php echo base_url(); ?>assets/product_image/no.jpg" alt="<?php echo $product_detail['device_model']; ?>">
                        </div>
                        <?php
                        } else {
                        foreach ($product_gallery as $key => $gallery) {
                            $active1 = '';
                            if ($j == 1 || count($product_gallery) == 1) { $active1 = 'active'; }
                        ?>
                        <div class="carousel-item <?php echo $active1; ?>">
                            <img class="d-block w-100" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image']; ?>" alt="<?php echo $product_detail['device_model']; ?>">
                        </div>
                        <?php $j++; } } ?>
                    </div>
                    <?php if (count($product_gallery) > 1) { ?>
                    <ol class="carousel-indicators">
                        <?php $i = 1;
                        foreach ($product_gallery as $key => $gallery) {
                            $active = '';
                            if ($i == 1) { $active = 'active'; }
                        ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i - 1; ?>" class="<?php echo $active; ?>">
                            <img src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image']; ?>" alt="">
                        </li>
                        <?php $i++; } ?>
                    </ol>
                    <?php } ?>
                </div>

                <!-- Specs Grid below image -->
                <div class="az-detail-grid" style="margin-top:24px;">
                    <?php if ($product_detail['latest_firmware_version']) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Latest Firmware</div>
                        <div class="az-detail-value"><?php echo $product_detail['latest_firmware_version']; ?></div>
                    </div>
                    <?php } ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Manual / Brochure</div>
                        <div class="az-detail-value">
                            <?php if ($product_detail['device_manual_brochure']) { ?>
                            <a href="<?php echo base_url(); ?>assets/pdf/<?php echo $product_detail['device_manual_brochure']; ?>" download style="color:#FCA311;font-weight:500;">Download</a>
                            <?php } else { echo '<span style="color:#999;">Not available</span>'; } ?>
                        </div>
                    </div>
                    <?php if ($vendor_contact_combined) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Vendor Contact &amp; Ordering Info</div>
                        <div class="az-detail-value" style="white-space:pre-line;"><?php echo htmlspecialchars($vendor_contact_combined); ?></div>
                    </div>
                    <?php } ?>
                    <?php if ($product_detail['mechanical_demension_mounting']) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Dimensions</div>
                        <div class="az-detail-value"><?php echo $product_detail['mechanical_demension_mounting']; ?></div>
                    </div>
                    <?php } ?>
                    <?php if ($product_detail['rack_unit']) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Rack Units</div>
                        <div class="az-detail-value"><?php echo $product_detail['rack_unit']; ?></div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($product_detail['power_consumption'])) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Power Consumption</div>
                        <div class="az-detail-value"><?php echo $product_detail['power_consumption']; ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- RIGHT COL: Name, Brand, Description, Favourites -->
            <div class="col-lg-6">
                <div class="az-detail-info">
                    <?php if ($product_detail['status'] == 2) { ?>
                    <h2 class="az-detail-model" style="color:#999;">Details hidden - listing expired</h2>
                    <div class="az-detail-brand" style="color:#999;">This vendor's listing for this device has expired. <span style="color:#BCC0C4;font-size:11px;font-weight:500;letter-spacing:0.5px;margin-left:8px;">ID: <?php echo $product_detail['id']; ?></span></div>
                    <?php } else { ?>
                    <h2 class="az-detail-model"><?php echo $product_detail['device_model']; ?></h2>
                    <div class="az-detail-brand"><?php echo $product_detail['device_brand']; ?> <span style="color:#BCC0C4;font-size:11px;font-weight:500;letter-spacing:0.5px;margin-left:8px;">ID: <?php echo $product_detail['id']; ?></span></div>
                    <?php } ?>

                    <?php if ($product_detail['status'] != 2 && $product_detail['dealer_notes']) { ?>
                    <div class="az-detail-notes">
                        <div class="az-detail-label" style="margin-bottom:8px;">Description</div>
                        <p><?php echo $product_detail['dealer_notes']; ?></p>
                    </div>
                    <?php } ?>

                    <div style="margin-top:20px;">
                        <?php if ($this->session->userdata('user_id')) { ?>
                        <?php
                        $is_like = $this->common_model->GetSingleData('fav_device_list', array('device_id' => $product_detail['id'], 'user_id' => $this->session->userdata('user_id')));
                        ?>
                        <?php if ($is_like) { ?>
                        <a class="icon_btn" href="<?php echo base_url(); ?>fav-device-remove/<?php echo $product_detail['id']; ?>" style="display:inline-flex;align-items:center;gap:6px;font-family:'Inter',sans-serif;font-size:13px;color:#dc3545;text-decoration:none;"><i class="fa fa-heart"></i> Remove from favourites</a>
                        <?php } else { ?>
                        <a class="icon_btn" href="<?php echo base_url(); ?>fav-device/<?php echo $product_detail['id']; ?>" style="display:inline-flex;align-items:center;gap:6px;font-family:'Inter',sans-serif;font-size:13px;color:#999;text-decoration:none;"><i class="lnr lnr lnr-heart"></i> Add to favourites</a>
                        <?php } ?>
                        <?php } ?>
                    </div>

                    <div style="margin-top:16px;">
                        <?php if ($product_detail['status'] == 2) { ?>
                        <p style="font-family:'Inter',sans-serif;font-size:13px;color:#999;">This listing has expired and can no longer be requested.</p>
                        <?php } elseif (!$this->session->userdata('user_id')) { ?>
                        <p style="font-family:'Inter',sans-serif;font-size:13px;color:#999;">Please <a href="<?php echo base_url(); ?>login" style="color:#FCA311;font-weight:500;">log in</a> to request a purchase.</p>
                        <?php } elseif (!$this->session->userdata('email_verified')) { ?>
                        <p style="font-family:'Inter',sans-serif;font-size:13px;color:#999;">Please verify your email address to request a purchase.</p>
                        <?php } else { ?>
                        <a href="<?php echo base_url(); ?>request-to-buy/<?php echo $product_detail['id']; ?>" style="display:inline-block;background:#FCA311;color:#14213D;padding:11px 28px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;text-decoration:none;">Request to Buy</a>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- TABS SECTION -->
<div class="az-tabs-section">
    <div class="container-fluid" style="padding:0 40px;max-width:1400px;margin:0 auto;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

           <!-- Specification Tab -->
            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    <?php if ($product_detail['status'] == 2) { ?>
    <tr><td>Model</td><td><h5 style="color:#999;">Hidden - listing expired</h5></td></tr>
    <tr><td>Brand</td><td><h5 style="color:#999;">Hidden - listing expired</h5></td></tr>
    <?php } else { ?>
    <tr><td>Model</td><td><h5><?php echo $product_detail['device_model']; ?></h5></td></tr>
    <tr><td>Brand</td><td><h5><?php echo $product_detail['device_brand']; ?></h5></td></tr>
    <?php } ?>
    <?php if($product_detail['latest_firmware_version']){ ?>
    <tr><td>Latest Firmware</td><td><h5><?php echo $product_detail['latest_firmware_version']; ?></h5></td></tr>
    <?php } ?>
    <?php if($product_detail['mechanical_demension_mounting']){ ?>
    <tr><td>Dimensions</td><td><h5><?php echo $product_detail['mechanical_demension_mounting']; ?></h5></td></tr>
    <?php } ?>
    <?php if($product_detail['rack_unit']){ ?>
    <tr><td>Rack Units</td><td><h5><?php echo $product_detail['rack_unit']; ?></h5></td></tr>
    <?php } ?>
    <?php if(!empty($product_detail['power_consumption'])){ ?>
    <tr><td>Power Consumption</td><td><h5><?php echo $product_detail['power_consumption']; ?></h5></td></tr>
    <?php } ?>
    <?php if($vendor_contact_combined){ ?>
    <tr><td>Vendor Contact &amp; Ordering Info</td><td><h5 style="white-space:pre-line;"><?php echo htmlspecialchars($vendor_contact_combined); ?></h5></td></tr>
    <?php } ?>
    <?php if($product_detail['warranty_detail']){ ?>
    <tr><td>Warranty</td><td><h5><?php echo $product_detail['warranty_detail']; ?></h5></td></tr>
    <?php } ?>
    <?php if($product_detail['support_detail']){ ?>
    <tr><td>Support</td><td><h5><?php echo $product_detail['support_detail']; ?></h5></td></tr>
    <?php } ?>
    <?php
    $process_stand = array_filter(array_map('trim', explode(",", $product_detail['process_stand'])));
    if(!empty($process_stand)){ ?>
    <tr><td>Process Standard</td><td><h5><?php foreach($process_stand as $s){ echo $s."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $process = array_filter(array_map('trim', explode(",", $product_detail['process'])));
    if(!empty($process)){ ?>
    <tr><td>Process</td><td><h5><?php foreach($process as $p){ echo $p."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $input_conn = array_filter(array_map('trim', explode(",", implode(",", array_column($inputOutput, 'input_conn')))));
    if(!empty($input_conn)){ ?>
    <tr><td>Input Details</td><td><h5><?php foreach($input_conn as $v){ echo $v."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $input_stand = array_filter(array_map('trim', explode(",", implode(",", array_column($inputOutput, 'input_process_stand')))));
    if(!empty($input_stand)){ ?>
    <tr><td>Input Standard</td><td><h5><?php foreach($input_stand as $v){ echo $v."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $input_conn_type = array_filter(array_map('trim', explode(",", implode(",", array_column($inputOutput, 'process_connection')))));
    if(!empty($input_conn_type)){ ?>
    <tr><td>Input Connection Type</td><td><h5><?php foreach($input_conn_type as $v){ echo $v."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $out_conn = array_filter(array_map('trim', explode(",", implode(",", array_column($inputOutput, 'out_conn')))));
    if(!empty($out_conn)){ ?>
    <tr><td>Output Details</td><td><h5><?php foreach($out_conn as $v){ echo $v."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $out_stand = array_filter(array_map('trim', explode(",", implode(",", array_column($inputOutput, 'out_process_stand')))));
    if(!empty($out_stand)){ ?>
    <tr><td>Output Standard</td><td><h5><?php foreach($out_stand as $v){ echo $v."<br>"; } ?></h5></td></tr>
    <?php } ?>
    <?php
    $out_conn_type = array_filter(array_map('trim', explode(",", implode(",", array_column($inputOutput, 'out_process_connection')))));
    if(!empty($out_conn_type)){ ?>
    <tr><td>Output Connection Type</td><td><h5><?php foreach($out_conn_type as $v){ echo $v."<br>"; } ?></h5></td></tr>
    <?php } ?>
</tbody>
                    </table>
                </div>
            </div>
 <!-- Reviews Tab -->
            <div class="tab-pane fade" id="review" role="tabpanel">
                <?php if(!empty($reviews)){
                    $total = count($reviews);
                    $sum = 0;
                    foreach($reviews as $r){ $sum += $r['rating']; }
                    $avg = round($sum / $total, 1);
                    $avgRounded = round($avg);
                ?>
                <div style="display:flex;align-items:center;gap:16px;padding:16px 0;border-bottom:2px solid #EBEBEB;margin-bottom:16px;">
                    <div style="font-family:'Inter',sans-serif;font-size:48px;font-weight:700;color:#14213D;line-height:1;"><?php echo $avg; ?></div>
                    <div style="flex:1;">
                        <div style="color:#FCA311;font-size:24px;"><?php echo str_repeat('★', $avgRounded) . str_repeat('☆', 5 - $avgRounded); ?></div>
                        <div style="font-family:'Inter',sans-serif;font-size:13px;color:#999;">Based on <?php echo $total; ?> review<?php echo $total > 1 ? 's' : ''; ?></div>
                    </div>
                    <button type="button" id="az-toggle-reviews" style="background:#fff;color:#14213D;border:1.5px solid #EBEBEB;padding:9px 20px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:13px;cursor:pointer;white-space:nowrap;">Show all reviews</button>
                </div>
                <div id="az-reviews-list" style="display:none;padding:20px 0;">
                    <?php foreach($reviews as $review){ ?>
                    <div style="border-bottom:1px solid #F0F0F0;padding:16px 0;">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
                            <div style="font-family:'Inter',sans-serif;font-size:14px;font-weight:600;color:#14213D;"><?php echo htmlspecialchars($review['name']); ?></div>
                            <div style="color:#FCA311;"><?php echo str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']); ?></div>
                        </div>
                        <p style="font-family:'Inter',sans-serif;font-size:14px;color:#555;line-height:1.7;margin:0;"><?php echo htmlspecialchars($review['message']); ?></p>
                    </div>
                    <?php } ?>
                </div>
                <?php } else { ?>
                <p style="font-family:'Inter',sans-serif;font-size:14px;color:#999;padding:20px 0;">No reviews yet — be the first to review this product.</p>
                <?php } ?>
                <!-- Add Review Form -->
                <div style="margin-top:24px;padding-top:24px;">
                    <h4 style="font-family:'Inter',sans-serif;font-size:16px;font-weight:600;color:#14213D;margin-bottom:16px;">Add a Review</h4>
                    <?php $review_msg = $this->session->flashdata('msg'); ?>
                    <?php if($review_msg){ ?>
                    <div id="az-review-msg"><?php echo $review_msg; ?></div>
                    <?php } ?>
                    <?php if(!$this->session->userdata('user_id')){ ?>
                    <p style="font-family:'Inter',sans-serif;font-size:14px;color:#999;">Please <a href="<?php echo base_url(); ?>login" style="color:#FCA311;font-weight:500;">log in</a> to leave a review.</p>
                    <?php } else { ?>
                    <form method="post" action="<?php echo base_url(); ?>Product/add_review/<?php echo $product_detail['id']; ?>">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;align-items:start;">
                            <input type="text" name="name" placeholder="Your name" class="form-control">
                            <div>
                            <input type="email" id="az-review-email" name="email" placeholder="Email address" class="form-control" required>
                            <div id="az-review-email-error" style="display:none;color:#dc3545;font-size:12px;font-family:'Inter',sans-serif;margin-top:4px;">A review for this product has been submitted from this email address.</div>
                            </div>
                        </div>
                        <div style="margin-bottom:16px;">
                            <select name="rating" class="form-control" style="max-width:200px;" required>
                                <option value="">Select rating</option>
                                <option value="5">★★★★★ Excellent</option>
                                <option value="4">★★★★☆ Good</option>
                                <option value="3">★★★☆☆ Average</option>
                                <option value="2">★★☆☆☆ Poor</option>
                                <option value="1">★☆☆☆☆ Terrible</option>
                            </select>
                        </div>
                        <div style="margin-bottom:16px;">
                            <textarea name="message" placeholder="Write your review..." class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" id="az-review-submit" style="background:#FCA311;color:#14213D;border:none;padding:10px 28px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;cursor:pointer;">Submit Review</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($review_msg) && $review_msg){ ?>
<script>
// A review submission redirects back to this page, but the Reviews tab
// isn't active by default - without this, the success/error message would
// be sitting in an inactive tab the person has no reason to click into.
document.addEventListener('DOMContentLoaded', function(){
    var tabEl = document.getElementById('review-tab');
    if(tabEl && typeof $ !== 'undefined'){
        $(tabEl).tab('show');
    }
    var msgEl = document.getElementById('az-review-msg');
    if(msgEl){
        msgEl.scrollIntoView({behavior: 'smooth', block: 'center'});
    }
});
</script>
<?php } ?>

<script>
// Checks for a duplicate review as soon as the person leaves the email
// field, rather than only after they submit and get redirected back.
(function(){
    var emailField = document.getElementById('az-review-email');
    var errorEl = document.getElementById('az-review-email-error');
    var submitBtn = document.getElementById('az-review-submit');
    if(!emailField || typeof $ === 'undefined') return;

    var deviceId = <?php echo json_encode($product_detail['id']); ?>;

    function checkEmail(){
        var email = emailField.value.trim();
        if(!email){
            errorEl.style.display = 'none';
            if(submitBtn) submitBtn.disabled = false;
            return;
        }
        $.ajax({
            url: "<?php echo base_url(); ?>Product/check_review_email",
            type: 'post',
            data: {email: email, device_id: deviceId},
            dataType: 'json',
            success: function(response){
                if(response.duplicate){
                    errorEl.style.display = 'block';
                    if(submitBtn) submitBtn.disabled = true;
                } else {
                    errorEl.style.display = 'none';
                    if(submitBtn) submitBtn.disabled = false;
                }
            }
        });
    }

    emailField.addEventListener('blur', checkEmail);
})();
</script>

<script>
(function(){
    var toggleBtn = document.getElementById('az-toggle-reviews');
    var reviewsList = document.getElementById('az-reviews-list');
    if(!toggleBtn || !reviewsList) return;

    toggleBtn.addEventListener('click', function(){
        var isHidden = reviewsList.style.display === 'none';
        reviewsList.style.display = isHidden ? 'block' : 'none';
        toggleBtn.textContent = isHidden ? 'Hide reviews' : 'Show all reviews';
    });
})();
</script>

<?php include_once 'include/footer2.php' ; ?>