<?php include_once 'include/header2.php' ; ?>

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
.tab-content table td:first-child {
    color: #999;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    width: 200px;
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
</style>

<div style="background:#fff;padding:40px 0;">
    <div class="container-fluid" style="padding:0 40px;">
        <div class="row">

            <!-- LEFT COL: Image + Specs Grid -->
            <div class="col-lg-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $j = 1;
                        $product_gallery = $this->common_model->GetAllData('product_gallery_image', array('product_id' => $product_detail['id']));
                        foreach ($product_gallery as $key => $gallery) {
                            $active1 = '';
                            if ($j == 1 || count($product_gallery) == 1) { $active1 = 'active'; }
                        ?>
                        <div class="carousel-item <?php echo $active1; ?>">
                            <img class="d-block w-100" src="<?php echo base_url(); ?>assets/product_image/<?php echo $gallery['gallery_image']; ?>" alt="<?php echo $product_detail['device_model']; ?>">
                        </div>
                        <?php $j++; } ?>
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
                    <?php if ($product_detail['order_code']) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Order Code</div>
                        <div class="az-detail-value"><?php echo $product_detail['order_code']; ?></div>
                    </div>
                    <?php } ?>
                    <?php if ($product_detail['release_version']) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Release Notes</div>
                        <div class="az-detail-value"><?php echo $product_detail['release_version']; ?></div>
                    </div>
                    <?php } ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Released Date</div>
                        <div class="az-detail-value"><?php echo date('d-m-Y', strtotime($product_detail['date_released'])); ?></div>
                    </div>
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
                    <?php if ($product_detail['dealer_contact']) { ?>
                    <div class="az-detail-row">
                        <div class="az-detail-label">Vendor Contact</div>
                        <div class="az-detail-value"><a href="<?php echo $product_detail['dealer_contact']; ?>" target="_blank" style="color:#FCA311;word-break:break-all;"><?php echo $product_detail['dealer_contact']; ?></a></div>
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
                </div>
            </div>

            <!-- RIGHT COL: Name, Brand, Description, Favourites -->
            <div class="col-lg-6">
                <div class="az-detail-info">
                    <h2 class="az-detail-model"><?php echo $product_detail['device_model']; ?></h2>
                    <div class="az-detail-brand"><?php echo $product_detail['device_brand']; ?></div>

                    <?php if ($product_detail['dealer_notes']) { ?>
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
                </div>
            </div>

        </div>
    </div>
</div>

<!-- TABS SECTION -->
<div class="az-tabs-section">
    <div class="container-fluid" style="padding:0 40px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <!-- Description Tab -->
            <div class="tab-pane fade" id="home" role="tabpanel">
                <?php if ($product_detail['warranty_detail']) { ?>
                <p style="font-family:'Inter',sans-serif;font-size:14px;color:#555;margin-bottom:8px;"><strong>Warranty:</strong> <?php echo $product_detail['warranty_detail']; ?></p>
                <?php } ?>
                <?php if ($product_detail['support_detail']) { ?>
                <p style="font-family:'Inter',sans-serif;font-size:14px;color:#555;"><strong>Support:</strong> <?php echo $product_detail['support_detail']; ?></p>
                <?php } ?>
            </div>

            <!-- Specification Tab -->
            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr><td>Ordering Information</td><td><h5><?php echo $product_detail['order_code']; ?></h5></td></tr>
                            <tr><td>Release Notes</td><td><h5><?php echo $product_detail['release_version']; ?></h5></td></tr>
                            <tr><td>Device Model</td><td><h5><?php echo $product_detail['device_model']; ?></h5></td></tr>
                            <tr><td>Device Brand</td><td><h5><?php echo $product_detail['device_brand']; ?></h5></td></tr>
                            <tr><td>Latest Firmware</td><td><h5><?php echo $product_detail['latest_firmware_version']; ?></h5></td></tr>
                            <tr><td>Dimensions</td><td><h5><?php echo $product_detail['mechanical_demension_mounting']; ?></h5></td></tr>
                            <tr><td>Rack Units</td><td><h5><?php echo $product_detail['rack_unit']; ?></h5></td></tr>
                            <tr><td>Dealer Website</td><td><h5><?php if($product_detail['dealer_web_cont']){ ?><a href="<?php echo $product_detail['dealer_web_cont']; ?>" target="_blank" style="color:#FCA311;">Visit</a><?php } ?></h5></td></tr>
                            <tr><td>Dealer Contact</td><td><h5><?php echo $product_detail['dealer_contact']; ?></h5></td></tr>
                            <tr><td>Dealer Notes</td><td><h5><?php echo $product_detail['dealer_notes']; ?></h5></td></tr>
                            <tr>
                                <td>Process Standard</td>
                                <td><h5><?php $process_stand = explode(",", $product_detail['process_stand']); foreach ($process_stand as $stand) { echo htmlspecialchars(trim($stand))."<br>"; } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Process</td>
                                <td><h5><?php $parts = explode(",", $product_detail['process']); foreach ($parts as $process) { echo htmlspecialchars(trim($process))."<br>"; } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Input Details</td>
                                <td><h5><?php foreach ($inputOutput as $Input) { $parts = explode(",", $Input["input_conn"]); foreach ($parts as $value) { echo htmlspecialchars(trim($value))."<br>"; } } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Input Standard</td>
                                <td><h5><?php foreach ($inputOutput as $Input) { $parts = explode(",", $Input["input_process_stand"]); foreach ($parts as $value) { echo htmlspecialchars(trim($value))."<br>"; } } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Input Connection Type</td>
                                <td><h5><?php foreach ($inputOutput as $Input) { $parts = explode(",", $Input["process_connection"]); foreach ($parts as $value) { echo htmlspecialchars(trim($value))."<br>"; } } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Output Details</td>
                                <td><h5><?php foreach ($inputOutput as $Input) { $parts = explode(",", $Input["out_conn"]); foreach ($parts as $value) { echo htmlspecialchars(trim($value))."<br>"; } } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Output Standard</td>
                                <td><h5><?php foreach ($inputOutput as $Input) { $parts = explode(",", $Input["out_process_stand"]); foreach ($parts as $value) { echo htmlspecialchars(trim($value))."<br>"; } } ?></h5></td>
                            </tr>
                            <tr>
                                <td>Output Connection Type</td>
                                <td><h5><?php foreach ($inputOutput as $Input) { $parts = explode(",", $Input["out_process_connection"]); foreach ($parts as $value) { echo htmlspecialchars(trim($value))."<br>"; } } ?></h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
 <!-- Reviews Tab -->
            <div class="tab-pane fade" id="review" role="tabpanel">
                <?php if(!empty($reviews)){ ?>
                <div style="padding:20px 0;">
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
                <div style="margin-top:24px;padding-top:24px;border-top:2px solid #EBEBEB;">
                    <h4 style="font-family:'Inter',sans-serif;font-size:16px;font-weight:600;color:#14213D;margin-bottom:16px;">Add a Review</h4>
                    <form method="post" action="<?php echo base_url(); ?>Product/add_review/<?php echo $product_detail['id']; ?>">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
                            <input type="text" name="name" placeholder="Your name" class="form-control">
                            <input type="email" name="email" placeholder="Email address" class="form-control" required>
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
                        <button type="submit" style="background:#FCA311;color:#14213D;border:none;padding:10px 28px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;cursor:pointer;">Submit Review</button>
                    </form>
                </div>
            </div>

            <!-- Comments Tab -->
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <p style="font-family:'Inter',sans-serif;font-size:14px;color:#999;padding:20px 0;">Comments functionality coming soon.</p>
            </div>

        </div>
    </div>
</div>

<?php include_once 'include/footer2.php' ; ?>