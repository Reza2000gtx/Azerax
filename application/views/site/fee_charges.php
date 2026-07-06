<?php $azerax_brand = 'azera<span style="color:#FCA311;">X</span>'; ?>
<?php include_once 'include/header2.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<?php
// Load fees content from database
$content = $this->common_model->GetSingleData('ContentManagement', array('id' => 1));

$vendor_price      = !empty($content['fees_vendor_price'])      ? $content['fees_vendor_price']      : 'TBC';
$vendor_price_note = !empty($content['fees_vendor_price_note']) ? $content['fees_vendor_price_note'] : '';
$founding_offer    = !empty($content['fees_founding_offer'])    ? $content['fees_founding_offer']    : '';

// Parse pipe-separated feature lists
$architect_features = !empty($content['fees_architect_features']) ? explode('|', $content['fees_architect_features']) : [];
$vendor_features    = !empty($content['fees_vendor_features'])    ? explode('|', $content['fees_vendor_features'])    : [];

// Parse FAQ: items separated by ~~, question/answer separated by ||
$faqs = [];
if(!empty($content['fees_faq'])){
    $faq_items = explode('~~', $content['fees_faq']);
    foreach($faq_items as $item){
        $parts = explode('||', $item);
        if(count($parts) == 2){
            $faqs[] = ['q' => trim($parts[0]), 'a' => trim($parts[1])];
        }
    }
}
?>

<style>
/* ── FEES PAGE ── */
.az-page-hero {
    background: #14213D;
    padding: 60px 40px;
    text-align: center;
}
.az-page-hero h1 {
    font-family: 'Inter', sans-serif;
    font-size: 36px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 8px;
    letter-spacing: -0.5px;
}
.az-page-hero p {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: rgba(255,255,255,0.5);
    margin: 0;
}
.az-fees-body {
    background: #F5F5F5;
    padding: 60px 40px;
}
.az-fees-inner {
    max-width: 1000px;
    margin: 0 auto;
}
.az-pricing-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 48px;
}
.az-pricing-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 14px;
    padding: 36px;
    position: relative;
}
.az-pricing-card.featured {
    border-color: #FCA311;
    border-width: 2px;
}
.az-pricing-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: #FCA311;
    color: #14213D;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 4px 14px;
    border-radius: 20px;
    white-space: nowrap;
}
.az-pricing-card h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 8px;
}
.az-price {
    font-family: 'Inter', sans-serif;
    font-size: 40px;
    font-weight: 700;
    color: #14213D;
    line-height: 1;
    margin-bottom: 4px;
}
.az-price span {
    font-size: 16px;
    font-weight: 400;
    color: #999;
}
.az-price-note {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
    margin-bottom: 24px;
}
.az-pricing-features {
    list-style: none;
    padding: 0;
    margin: 0 0 28px 0;
}
.az-pricing-features li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #555;
    padding: 8px 0;
    border-bottom: 1px solid #F5F5F5;
}
.az-pricing-features li:last-child { border-bottom: none; }
.az-pricing-features li i {
    color: #FCA311;
    font-size: 16px;
    flex-shrink: 0;
    margin-top: 1px;
}
.az-pricing-btn {
    display: block;
    text-align: center;
    padding: 12px;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.15s;
}
.az-pricing-btn.primary { background: #FCA311; color: #14213D; }
.az-pricing-btn.primary:hover { background: #e8940a; color: #14213D; }
.az-pricing-btn.secondary { background: transparent; color: #14213D; border: 1.5px solid #14213D; }
.az-pricing-btn.secondary:hover { background: #14213D; color: #fff; }
.az-founding-note {
    background: #14213D;
    border-radius: 14px;
    padding: 32px 36px;
    display: flex;
    align-items: center;
    gap: 24px;
    margin-bottom: 48px;
}
.az-founding-note-icon {
    width: 56px;
    height: 56px;
    background: rgba(252,163,17,0.15);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FCA311;
    font-size: 28px;
    flex-shrink: 0;
}
.az-founding-note-text h4 {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 6px;
}
.az-founding-note-text p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: rgba(255,255,255,0.55);
    margin: 0;
    line-height: 1.65;
}
.az-faq-section h2 {
    font-family: 'Inter', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 24px;
}
.az-faq-item {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 10px;
    padding: 20px 24px;
    margin-bottom: 12px;
}
.az-faq-item h4 {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    color: #14213D;
    margin-bottom: 8px;
}
.az-faq-item p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    line-height: 1.7;
    margin: 0;
}
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>Fees &amp; Charges</h1>
    <p>Transparent pricing. Architects always search free. Vendors pay to list.</p>
</div>

<!-- Body -->
<div class="az-fees-body">
    <div class="az-fees-inner">

        <!-- Pricing Cards -->
        <div class="az-pricing-grid">

            <!-- Architects -->
            <div class="az-pricing-card">
                <h3>For Architects</h3>
                <div class="az-price">Free</div>
                <div class="az-price-note">Always free. No credit card required.</div>
                <ul class="az-pricing-features">
                    <?php foreach($architect_features as $feature){ ?>
                    <li><i class="ti ti-check"></i> <?php echo htmlspecialchars(trim($feature)); ?></li>
                    <?php } ?>
                </ul>
                <a href="<?php echo base_url(); ?>signup" class="az-pricing-btn secondary">Create free account</a>
            </div>

            <!-- Vendors -->
            <div class="az-pricing-card featured">
                <div class="az-pricing-badge">Most popular</div>
                <h3>For Vendors</h3>
                <div class="az-price"><?php echo htmlspecialchars($vendor_price); ?> <span>/ year</span></div>
                <div class="az-price-note"><?php echo htmlspecialchars($vendor_price_note); ?></div>
                <ul class="az-pricing-features">
                    <?php foreach($vendor_features as $feature){ ?>
                    <li><i class="ti ti-check"></i> <?php echo htmlspecialchars(trim($feature)); ?></li>
                    <?php } ?>
                </ul>
                <a href="<?php echo base_url(); ?>signup" class="az-pricing-btn primary">List your products</a>
            </div>

        </div>

        <!-- Founding Vendor Note -->
        <?php if($founding_offer){ ?>
        <div class="az-founding-note">
            <div class="az-founding-note-icon"><i class="ti ti-star"></i></div>
            <div class="az-founding-note-text">
                <h4>Founding Vendor Offer</h4>
                <p><?php echo htmlspecialchars($founding_offer); ?></p>
            </div>
        </div>
        <?php } ?>

        <!-- FAQ -->
        <?php if(!empty($faqs)){ ?>
        <div class="az-faq-section">
            <h2>Frequently asked questions</h2>
            <?php foreach($faqs as $faq){ ?>
            <div class="az-faq-item">
                <h4><?php echo htmlspecialchars($faq['q']); ?></h4>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </div>
            <?php } ?>
        </div>
        <?php } ?>

    </div>
</div>

<?php include_once 'include/footer2.php'; ?>