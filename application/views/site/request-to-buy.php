<?php include_once 'include/header2.php' ; ?>

<style>
.rtb-wrap {
    max-width: 640px;
    margin: 0 auto;
    padding: 48px 20px;
    min-height: calc(100vh + 60px);
}
.rtb-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 14px;
    padding: 32px;
}
.rtb-title {
    font-family: 'Inter', sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 4px;
}
.rtb-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #999;
    margin-bottom: 24px;
}
.rtb-device-box {
    background: #F9F9F9;
    border-radius: 10px;
    padding: 14px 16px;
    margin-bottom: 24px;
    font-family: 'Inter', sans-serif;
}
.rtb-device-box .model {
    font-size: 15px;
    font-weight: 700;
    color: #14213D;
}
.rtb-device-box .brand {
    font-size: 13px;
    color: #999;
}
.rtb-label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #14213D;
    margin-bottom: 6px;
    display: block;
}
.rtb-form-group {
    margin-bottom: 20px;
}
.rtb-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}
.rtb-submit-btn {
    background: #FCA311;
    color: #14213D;
    border: none;
    padding: 12px 32px;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
}
</style>

<div class="rtb-wrap">
    <div class="rtb-card">
        <div class="rtb-title">Request to Buy</div>
        <div class="rtb-subtitle">Submit your request — vendors offering this device will respond with quotes.</div>

        <div class="rtb-device-box">
            <div class="model"><?php echo $product_detail['device_model']; ?></div>
            <div class="brand"><?php echo $product_detail['device_brand']; ?> <span style="color:#BCC0C4;">— Device ID: <?php echo $product_detail['device_id']; ?></span></div>
        </div>

        <form method="post" action="<?php echo base_url(); ?>PurchaseRequest/submit">
            <input type="hidden" name="product_id" value="<?php echo $product_detail['id']; ?>">
            <input type="hidden" name="device_id" value="<?php echo $product_detail['device_id']; ?>">
            <input type="hidden" name="device_model" value="<?php echo $product_detail['device_model']; ?>">
            <input type="hidden" name="device_brand" value="<?php echo $product_detail['device_brand']; ?>">

            <div class="rtb-form-group">
                <label class="rtb-label">Quantity</label>
                <input type="number" name="quantity" min="1" value="1" class="form-control" required>
            </div>

            <div class="rtb-form-group">
                <label class="rtb-label">Timeline</label>
                <select name="timeline" class="form-control" required>
                    <option value="">Select timeline</option>
                    <option value="ASAP">ASAP</option>
                    <option value="Within 1 month">Within 1 month</option>
                    <option value="Within 3 months">Within 3 months</option>
                    <option value="Just researching">Just researching</option>
                </select>
            </div>

            <div class="rtb-form-group">
                <label class="rtb-label">Additional details</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Any specific requirements, configuration, or notes for vendors..."></textarea>
            </div>

            <button type="submit" class="rtb-submit-btn">Submit Request</button>
        </form>
    </div>
</div>

<?php include_once 'include/footer2.php' ; ?>
