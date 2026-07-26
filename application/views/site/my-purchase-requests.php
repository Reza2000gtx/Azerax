<?php include_once 'include/header2.php' ; ?>

<style>
.mpr-wrap {
    max-width: 900px;
    margin: 0 auto;
    padding: 48px 20px;
    min-height: calc(100vh + 60px);
}
.mpr-title {
    font-family: 'Inter', sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 24px;
}
.mpr-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 20px;
}
.mpr-device {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #14213D;
}
.mpr-meta {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
    margin-top: 4px;
    margin-bottom: 4px;
}
.mpr-status {
    display: inline-block;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 3px 10px;
    border-radius: 12px;
    margin-bottom: 16px;
}
.mpr-status.open { background: #FFF3D6; color: #FCA311; }
.mpr-status.closed { background: #E8F5E9; color: #28a745; }
.mpr-status.cancelled { background: #F0F0F0; color: #999; }
.mpr-quotes-title {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #14213D;
    margin-bottom: 10px;
}
.mpr-quote-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #F0F0F0;
    padding: 12px 0;
}
.mpr-quote-price {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #14213D;
}
.mpr-quote-detail {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
}
.mpr-accept-btn {
    background: #FCA311;
    color: #14213D;
    border: none;
    padding: 8px 18px;
    border-radius: 6px;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}
.mpr-accepted-badge {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #28a745;
    font-weight: 600;
}
.mpr-no-quotes {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
}
.mpr-empty {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #999;
}
</style>

<div class="mpr-wrap">
    <div class="mpr-title">My Purchase Requests</div>

    <?php if ($this->session->flashdata('msg')) { echo $this->session->flashdata('msg'); } ?>

    <?php if (empty($requests)) { ?>
    <p class="mpr-empty">You haven't submitted any purchase requests yet.</p>
    <?php } else { ?>
        <?php foreach ($requests as $req) { ?>
        <div class="mpr-card">
            <div class="mpr-device"><?php echo $req['device_model']; ?> — <?php echo $req['device_brand']; ?> <span style="color:#BCC0C4;font-size:12px;font-weight:500;">(Device ID: <?php echo $req['device_id']; ?>)</span></div>
            <div class="mpr-meta">
                Qty: <?php echo $req['quantity']; ?> &nbsp;•&nbsp;
                Timeline: <?php echo $req['timeline']; ?> &nbsp;•&nbsp;
                Requested: <?php echo date('d M Y', strtotime($req['created_at'])); ?>
            </div>
            <span class="mpr-status <?php echo $req['status']; ?>"><?php echo $req['status']; ?></span>

            <?php if ($req['status'] == 'open') { ?>
                <?php $age = time() - strtotime($req['created_at']); ?>
                <?php if ($age >= 3600) { ?>
                <a href="<?php echo base_url(); ?>cancel-purchase-request/<?php echo $req['id']; ?>" style="float:right;font-family:'Inter',sans-serif;font-size:13px;color:#dc3545;" onclick="return confirm('Cancel this request?');">Cancel Request</a>
                <?php } else { ?>
                <span style="float:right;font-family:'Inter',sans-serif;font-size:12px;color:#999;">Can be cancelled after 1 hour</span>
                <?php } ?>
            <?php } elseif ($req['status'] == 'cancelled') { ?>
                <div style="float:right;display:flex;gap:16px;">
                    <a href="<?php echo base_url(); ?>reopen-purchase-request/<?php echo $req['id']; ?>" style="font-family:'Inter',sans-serif;font-size:13px;color:#FCA311;font-weight:600;" onclick="return confirm('Reopen this request?');">Purchase Again</a>
                    <a href="<?php echo base_url(); ?>delete-purchase-request/<?php echo $req['id']; ?>" style="font-family:'Inter',sans-serif;font-size:13px;color:#dc3545;" onclick="return confirm('Permanently delete this request?');">Delete</a>
                </div>
            <?php } ?>

            <div class="mpr-quotes-title">Quotes received (<?php echo count($req['quotes']); ?>)</div>

            <?php if (empty($req['quotes'])) { ?>
            <div class="mpr-no-quotes">No quotes yet — vendors offering this device will respond here.</div>
            <?php } else { ?>
                <?php
                    $visible_quotes = $req['quotes'];
                    $locked_count = 0;
                    if (count($req['quotes']) > 1 && !$req['unlocked']) {
                        $visible_quotes = array(reset($req['quotes']));
                        $locked_count = count($req['quotes']) - 1;
                    }
                ?>
                <?php foreach ($visible_quotes as $quote) { ?>
                <div class="mpr-quote-row">
                    <div>
                        <div style="font-family:'Inter',sans-serif;font-size:14px;font-weight:700;color:#14213D;margin-bottom:4px;"><?php echo $quote['vendor_name']; ?></div>
                        <div class="mpr-quote-detail">
                            <?php if ($quote['lead_time']) { echo '<strong>Lead time:</strong> ' . $quote['lead_time']; } ?>
                        </div>
                    </div>
                    <div>
                        <?php if ($quote['status'] == 'accepted') { ?>
                        <span class="mpr-accepted-badge">✓ Accepted</span>
                        <?php } else { ?>
                        <button type="button" class="mpr-accept-btn" style="border:none;cursor:pointer;" onclick="document.getElementById('quoteModal<?php echo $quote['id']; ?>').style.display='flex';">View</button>
                        <?php } ?>
                    </div>
                </div>

                <!-- Quote detail modal -->
                <div id="quoteModal<?php echo $quote['id']; ?>" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:99999;align-items:center;justify-content:center;">
                    <div style="background:#fff;border-radius:14px;padding:32px;max-width:420px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.3);font-family:'Inter',sans-serif;">
                        <div style="font-size:18px;font-weight:700;color:#14213D;margin-bottom:4px;"><?php echo $quote['vendor_name']; ?></div>
                        <?php if ($quote['vendor_contact_name'] && $quote['vendor_contact_name'] != $quote['vendor_name']) { ?>
                        <div style="font-size:13px;color:#999;margin-bottom:16px;">Contact: <?php echo $quote['vendor_contact_name']; ?></div>
                        <?php } else { ?>
                        <div style="margin-bottom:16px;"></div>
                        <?php } ?>

                        <?php if ($quote['lead_time']) { ?>
                        <div style="margin-bottom:12px;">
                            <div style="font-size:11px;font-weight:700;color:#999;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:2px;">Lead Time</div>
                            <div style="font-size:14px;color:#14213D;"><?php echo $quote['lead_time']; ?></div>
                        </div>
                        <?php } ?>
                        <?php if ($quote['notes']) { ?>
                        <div style="margin-bottom:20px;">
                            <div style="font-size:11px;font-weight:700;color:#999;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:2px;">Notes</div>
                            <div style="font-size:14px;color:#14213D;line-height:1.6;"><?php echo $quote['notes']; ?></div>
                        </div>
                        <?php } ?>

                        <div style="display:flex;gap:12px;">
                            <button type="button" onclick="document.getElementById('quoteModal<?php echo $quote['id']; ?>').style.display='none';" style="flex:1;padding:11px;border-radius:8px;border:1.5px solid #EBEBEB;background:#fff;font-family:'Inter',sans-serif;font-size:14px;font-weight:500;color:#14213D;cursor:pointer;">Close</button>
                            <?php if ($req['status'] == 'open') { ?>
                            <a href="<?php echo base_url(); ?>accept-quote/<?php echo $quote['id']; ?>" onclick="return confirm('Accept this response? This will close your request.');" style="flex:1;padding:11px;border-radius:8px;background:#FCA311;color:#14213D;font-family:'Inter',sans-serif;font-weight:600;font-size:14px;text-decoration:none;text-align:center;">Accept Quote</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if ($locked_count > 0) { ?>
                <div style="border-top:1px solid #F0F0F0;padding:14px 0;display:flex;align-items:center;justify-content:space-between;">
                    <span style="font-family:'Inter',sans-serif;font-size:13px;color:#999;">🔒 <?php echo $locked_count; ?> more response<?php echo $locked_count > 1 ? 's' : ''; ?> available</span>
                    <a href="<?php echo base_url(); ?>unlock-purchase-request/<?php echo $req['id']; ?>" style="background:#FCA311;color:#14213D;padding:8px 18px;border-radius:6px;font-family:'Inter',sans-serif;font-weight:600;font-size:13px;text-decoration:none;">Unlock All — $<?php echo $unlock_price; ?></a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>
    <?php } ?>
</div>

<?php include_once 'include/footer2.php' ; ?>
