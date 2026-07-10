<?php include_once 'include/header2.php'; ?>

<style>
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
.az-trans-body {
    background: #F5F5F5;
    padding: 40px;
    min-height: calc(100vh - 280px);
}
.az-trans-body {
    flex: 1;
}
body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.az-trans-inner {
    max-width: 1100px;
    margin: 0 auto;
}
.az-trans-table {
    width: 100%;
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 12px;
    overflow: hidden;
    border-collapse: collapse;
}
.az-trans-table th {
    background: #14213D;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 16px;
    text-align: left;
}
.az-trans-table td {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #14213D;
    padding: 12px 16px;
    border-bottom: 1px solid #F0F0F0;
}
.az-trans-table tr:last-child td { border-bottom: none; }
.az-trans-table tr:hover td { background: #FFFBF0; }
.badge-ok {
    background: #E3FCEF;
    color: #057A55;
    padding: 3px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
}
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>Transaction History</h1>
    <p>Your payment and billing history</p>
</div>

<!-- Body -->
<div class="az-trans-body">
    <div class="az-trans-inner">

        <?php if(!empty($transactdata)): ?>
        <table class="az-trans-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Device</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Transaction ID</th>
                    <th>Paid By</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($transactdata as $tdata):
                    $product = $this->common_model->GetSingleData('product', array('id' => $tdata['tr_productid']));
                ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td>
                        <?php if($product): ?>
                        <a href="<?php echo base_url(); ?>details/<?php echo $product['id']; ?>" style="color:#14213D;font-weight:500;text-decoration:none;font-family:'Inter',sans-serif;font-size:13px;"><?php echo $product['device_model']; ?></a>
                        <span style="color:#999;font-size:11px;display:block;">ID: <?php echo $product['id']; ?></span>
                        <?php else: ?>
                        <span style="color:#999;font-size:12px;">N/A</span>
                        <?php endif; ?>
                    </td>
                    <td>$<?php echo $tdata['tr_amount']; ?></td>
                    <td><?php echo $tdata['currency']; ?></td>
                    <td style="color:#999;font-size:11px;"><?php echo $tdata['tr_transactionId']; ?></td>
                    <td><?php echo $tdata['tr_paid_by']; ?></td>
                    <td><?php if($tdata['tr_status'] == 1): ?><span class="badge-ok">Paid</span><?php endif; ?></td>
                    <td><?php echo date('d M Y', strtotime($tdata['tr_date'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div style="text-align:center;padding:60px 0;">
            <p style="font-family:'Inter',sans-serif;font-size:16px;color:#999;">No transactions yet.</p>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include_once 'include/footer2.php'; ?>