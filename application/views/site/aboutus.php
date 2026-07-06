<?php include_once 'include/header2.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<style>
/* ── ABOUT PAGE ── */
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

/* Sections */
.az-about-section {
    padding: 72px 40px;
}
.az-about-section.grey { background: #F5F5F5; }
.az-about-section.white { background: #fff; }
.az-about-section.navy { background: #14213D; }

.az-about-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}
.az-about-inner.reverse { direction: rtl; }
.az-about-inner.reverse > * { direction: ltr; }

.az-about-text h2 {
    font-family: 'Inter', sans-serif;
    font-size: 30px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 16px;
    letter-spacing: -0.5px;
    line-height: 1.2;
}
.az-about-section.navy .az-about-text h2 { color: #fff; }
.az-about-text p {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    line-height: 1.8;
    margin-bottom: 16px;
}
.az-about-section.navy .az-about-text p { color: #9AAFC4; }

.az-about-divider {
    width: 48px;
    height: 3px;
    background: #FCA311;
    border-radius: 2px;
    margin-bottom: 24px;
}

.az-about-img img {
    width: 100%;
    border-radius: 14px;
    object-fit: cover;
    height: 320px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

/* Services cards */
.az-services-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 24px;
    max-width: 1100px;
    margin: 0 auto;
}
.az-service-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 14px;
    padding: 28px;
    transition: border-color 0.2s, transform 0.2s;
}
.az-service-card:hover {
    border-color: #FCA311;
    transform: translateY(-2px);
}
.az-service-icon {
    width: 48px;
    height: 48px;
    background: #FFF3D6;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FCA311;
    font-size: 24px;
    margin-bottom: 16px;
}
.az-service-card h4 {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #14213D;
    margin-bottom: 10px;
}
.az-service-card p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    line-height: 1.65;
    margin: 0;
}

/* Section label */
.az-section-label {
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #FCA311;
    margin-bottom: 12px;
    text-align: center;
}
.az-section-centered {
    text-align: center;
    max-width: 1100px;
    margin: 0 auto 40px;
}
.az-section-centered h2 {
    font-family: 'Inter', sans-serif;
    font-size: 30px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 12px;
    letter-spacing: -0.5px;
}
.az-section-centered p {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    line-height: 1.75;
    max-width: 600px;
    margin: 0 auto;
}

/* Contact form */
.az-contact-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 48px;
    align-items: flex-start;
}
.az-contact-info {
    background: #14213D;
    border-radius: 14px;
    padding: 36px;
}
.az-contact-info h3 {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 8px;
}
.az-contact-info p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: rgba(255,255,255,0.55);
    line-height: 1.7;
    margin-bottom: 32px;
}
.az-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 24px;
}
.az-contact-item-icon {
    width: 40px;
    height: 40px;
    background: rgba(252,163,17,0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FCA311;
    font-size: 18px;
    flex-shrink: 0;
}
.az-contact-item-text strong {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 2px;
    font-family: 'Inter', sans-serif;
}
.az-contact-item-text span {
    font-size: 13px;
    color: rgba(255,255,255,0.5);
    font-family: 'Inter', sans-serif;
}
.az-contact-form-panel {
    background: #fff;
    border-radius: 14px;
    padding: 36px;
    border: 1.5px solid #EBEBEB;
}
.az-contact-form-panel h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 24px;
}
.az-contact-form-panel .form-control {
    border: 1.5px solid #EBEBEB;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #14213D;
    padding: 10px 14px;
    transition: border-color 0.15s;
}
.az-contact-form-panel .form-control:focus {
    border-color: #FCA311;
    box-shadow: none;
}
.az-contact-form-panel textarea.form-control { min-height: 140px; resize: vertical; }
.az-submit-btn {
    background: #FCA311;
    color: #14213D;
    border: none;
    padding: 12px 36px;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s;
}
.az-submit-btn:hover { background: #e8940a; }
.errorMessage {
    color: #dc3545;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
    margin-top: 4px;
}
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>About azera<span style="color:#FCA311;">X</span></h1>
    <p>Broadcast-native product intelligence — built by architects, for architects.</p>
</div>

<!-- Section 1: Why Azerax -->
<div class="az-about-section white">
    <div class="az-about-inner">
        <div class="az-about-text">
            <div class="az-about-divider"></div>
            <h2>Why <?php echo $azerax_brand; ?>?</h2>
            <?php
            $resultFooter = $this->common_model->GetAllData('ContentManagement');
            foreach ($resultFooter as $valueFoo) {
                echo $valueFoo["who_we_are"];
            }
            ?>
        </div>
        <div class="az-about-img">
            <img src="<?php echo base_url(); ?>assets/site/img/mcr.jpg" alt="About AzeraX">
        </div>
    </div>
</div>

<!-- Section 2: Our Services -->
<div class="az-about-section grey">
    <div class="az-section-label">What we offer</div>
    <div class="az-section-centered">
        <h2>Built for broadcast professionals</h2>
        <p>AzeraX serves every stakeholder in the broadcast ecosystem — from architects specifying systems to vendors listing their products.</p>
    </div>
    <div class="az-services-grid">
        <div class="az-service-card">
            <div class="az-service-icon"><i class="ti ti-search"></i></div>
            <h4>For Architects</h4>
            <p>A smart search mechanism that helps broadcast architects find the exact product match for their technical criteria — standards, I/O, connectors and more.</p>
        </div>
        <div class="az-service-card">
            <div class="az-service-icon"><i class="ti ti-building-store"></i></div>
            <h4>For Vendors</h4>
            <p>List your broadcast products directly on AzeraX and make them discoverable to architects worldwide. Vendor-maintained specs mean accurate data, always.</p>
        </div>
        <div class="az-service-card">
            <div class="az-service-icon"><i class="ti ti-device-tv"></i></div>
            <h4>For Broadcasters</h4>
            <p>Designing an end-to-end broadcast solution is easier when you can search, compare and spec products across hardware, software and AI tools in one place.</p>
        </div>
    </div>
</div>

<!-- Section 3: Contact -->
<div class="az-about-section white" id="contactRequestFormDiv">
    <div class="az-contact-inner">
        <div class="az-contact-info">
            <h3>Get in touch</h3>
            <p>Have a question about AzeraX or want to list your products? We'd love to hear from you.</p>
            <div class="az-contact-item">
                <div class="az-contact-item-icon"><i class="ti ti-mail"></i></div>
                <div class="az-contact-item-text">
                    <strong>Email</strong>
                    <span>info@azerax.com</span>
                </div>
            </div>
            <div class="az-contact-item">
                <div class="az-contact-item-icon"><i class="ti ti-clock"></i></div>
                <div class="az-contact-item-text">
                    <strong>Response time</strong>
                    <span>We aim to respond within 24 hours</span>
                </div>
            </div>
        </div>
        <div class="az-contact-form-panel">
            <h3>Send us a message</h3>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo base_url(); ?>about-us-action" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" required name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Your name">
                            <div class="errorMessage"><?php echo form_error('username'); ?></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="email" required name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email address">
                            <div class="errorMessage"><?php echo form_error('email'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" required name="subject" value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="Subject">
                    <div class="errorMessage"><?php echo form_error('subject'); ?></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" required name="message" placeholder="Tell us something here..."><?php echo set_value('message'); ?></textarea>
                    <div class="errorMessage"><?php echo form_error('message'); ?></div>
                </div>
                <div class="text-right">
                    <button type="submit" class="az-submit-btn">Send message →</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'include/footer2.php'; ?>

<?php if(isset($_REQUEST['success']) && $_REQUEST['success']==1) { ?>
<script>
$(document).ready(function(){
    $('html, body').animate({
        scrollTop: $("#contactRequestFormDiv").offset().top
    }, 1000);
});
</script>
<?php } ?>