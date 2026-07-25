<?php include_once 'include/header2.php' ; ?>

<style>
.vr-wrap {
    max-width: 900px;
    margin: 0 auto;
    padding: 48px 20px;
    min-height: calc(100vh + 60px);
}
.vr-title {
    font-family: 'Inter', sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 24px;
}
.vr-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 20px;
}
.vr-device {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #14213D;
}
.vr-meta {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
    margin-top: 4px;
    margin-bottom: 12px;
}
.vr-desc {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #555;
    background: #F9F9F9;
    border-radius: 8px;
    padding: 12px 14px;
    margin-bottom: 16px;
}
.vr-quote-row {
    display: grid;
    grid-template-columns: 1fr 2fr auto;
    gap: 12px;
    align-items: end;
}
.vr-label {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: #14213D;
    margin-bottom: 6px;
    display: block;
}
.vr-submit-btn {
    background: #FCA311;
    color: #14213D;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    white-space: nowrap;
}
.vr-already-quoted {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #28a745;
    font-weight: 600;
}
.vr-empty {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #999;
}
</style>

<div class="vr-wrap">
    <div class="vr-title">Purchase Requests</div>

    <?php if (empty($requests)) { ?>
    <p class="vr-empty">No open purchase requests for your listed devices right now.</p>
    <?php } else { ?>
        <?php foreach ($requests as $req) { ?>
        <div class="vr-card">
            <div class="vr-device"><?php echo $req['device_model']; ?> — <?php echo $req['device_brand']; ?> <span style="color:#BCC0C4;font-size:13px;font-weight:500;">(Device ID: <?php echo $req['device_id']; ?>)</span></div>
            <div class="vr-meta">
                Qty: <?php echo $req['quantity']; ?> &nbsp;•&nbsp;
                Timeline: <?php echo $req['timeline']; ?> &nbsp;•&nbsp;
                Requested: <?php echo date('d M Y', strtotime($req['created_at'])); ?>
            </div>
            <?php if ($req['description']) { ?>
            <div class="vr-desc"><?php echo $req['description']; ?></div>
            <?php } ?>

            <?php if ($req['my_quote']) { ?>
            <div class="vr-already-quoted">✓ You responded on <?php echo date('d M Y', strtotime($req['my_quote']['created_at'])); ?></div>
            <?php } else { ?>
            <form method="post" action="<?php echo base_url(); ?>PurchaseRequest/submit_quote">
                <input type="hidden" name="request_id" value="<?php echo $req['id']; ?>">
                <div class="vr-quote-row">
                    <div>
                        <label class="vr-label">Lead time</label>
                        <input type="text" name="lead_time" class="form-control" placeholder="e.g. 2 weeks">
                    </div>
                    <div>
                        <label class="vr-label">Notes</label>
                        <input type="text" name="notes" class="form-control" placeholder="Optional">
                    </div>
                    <button type="submit" class="vr-submit-btn">Respond</button>
                </div>
            </form>
            <?php } ?>
        </div>
        <?php } ?>
    <?php } ?>
</div>

<?php include_once 'include/footer2.php' ; ?>
