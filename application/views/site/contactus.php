<?php include_once 'include/header2.php' ; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<style>
/* ── CONTACT PAGE ── */
.az-contact-hero {
    background: #14213D;
    padding: 60px 40px;
    text-align: center;
}
.az-contact-hero h1 {
    font-family: 'Inter', sans-serif;
    font-size: 36px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 8px;
    letter-spacing: -0.5px;
}
.az-contact-hero p {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: rgba(255,255,255,0.5);
    margin: 0;
}

.az-contact-body {
    background: #F5F5F5;
    padding: 60px 40px;
}
.az-contact-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 48px;
    align-items: flex-start;
}

/* Left info panel */
.az-contact-info {
    background: #14213D;
    border-radius: 14px;
    padding: 36px;
    color: #fff;
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
.az-contact-item-text {
    font-family: 'Inter', sans-serif;
}
.az-contact-item-text strong {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 2px;
}
.az-contact-item-text span {
    font-size: 13px;
    color: rgba(255,255,255,0.5);
}

/* Right form panel */
.az-contact-form {
    background: #fff;
    border-radius: 14px;
    padding: 36px;
    border: 1.5px solid #EBEBEB;
}
.az-contact-form h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 24px;
}
.az-contact-form .form-group label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #666;
    margin-bottom: 6px;
    display: block;
}
.az-contact-form .form-control {
    border: 1.5px solid #EBEBEB;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #14213D;
    padding: 10px 14px;
    transition: border-color 0.15s;
}
.az-contact-form .form-control:focus {
    border-color: #FCA311;
    box-shadow: none;
    outline: none;
}
.az-contact-form textarea.form-control {
    min-height: 140px;
    resize: vertical;
}
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
.az-submit-btn:hover {
    background: #e8940a;
}
.errorMessage {
    color: #dc3545;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
    margin-top: 4px;
}

/* Submit loading state - lets the user know the message is genuinely
   being sent, since the actual email send takes a few real seconds */
.az-submit-btn:disabled {
    opacity: 0.75;
    cursor: default;
}
.az-submit-spinner {
    display: inline-block;
    width: 14px;
    height: 14px;
    border: 2px solid rgba(20,33,61,0.3);
    border-top-color: #14213D;
    border-radius: 50%;
    animation: az-spin 0.7s linear infinite;
    margin-right: 8px;
    vertical-align: -2px;
}
@keyframes az-spin {
    to { transform: rotate(360deg); }
}
@media (prefers-reduced-motion: reduce) {
    .az-submit-spinner { animation: none; }
}
</style>

<!-- Hero Band -->
<div class="az-contact-hero">
    <h1>Contact Us</h1>
    <p>Have a question or want to list your products? We'd love to hear from you.</p>
</div>

<!-- Contact Body -->
<div class="az-contact-body">
    <div class="az-contact-inner">

        <!-- Left: Contact Info -->
        <div class="az-contact-info">
            <h3>Get in touch</h3>
            <p>Whether you're a broadcast architect looking for help, or a vendor wanting to list your products — we're here.</p>

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

            <div class="az-contact-item">
                <div class="az-contact-item-icon"><i class="ti ti-building"></i></div>
                <div class="az-contact-item-text">
                    <strong>For vendors</strong>
                    <span>Want to list your products? <a href="<?php echo base_url(); ?>signup" style="color:#FCA311;">Sign up free →</a></span>
                </div>
            </div>
        </div>

        <!-- Right: Contact Form -->
        <div class="az-contact-form">
            <h3>Send us a message</h3>
            <?php echo $this->session->flashdata('msg'); ?>
            <form id="az-contact-form" action="<?php echo base_url(); ?>contact-us-action" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" required name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Your name">
                            <div class="errorMessage"><?php echo form_error('username'); ?></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" required name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Your email address">
                            <div class="errorMessage"><?php echo form_error('email'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" required name="subject" value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="What is your message about?">
                    <div class="errorMessage"><?php echo form_error('subject'); ?></div>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" required name="message" placeholder="Type your message here..."><?php echo set_value('message'); ?></textarea>
                    <div class="errorMessage"><?php echo form_error('message'); ?></div>
                </div>
                <div class="text-right">
                    <button type="submit" id="az-contact-submit" class="az-submit-btn"><span id="az-contact-submit-label">Send message →</span></button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
document.getElementById('az-contact-form').addEventListener('submit', function(){
    // Give immediate visual feedback that something is genuinely
    // happening - the actual email send takes a few real seconds, and
    // without this it can look like the click did nothing at all.
    var btn = document.getElementById('az-contact-submit');
    var label = document.getElementById('az-contact-submit-label');
    btn.disabled = true;
    label.innerHTML = '<span class="az-submit-spinner"></span>Sending...';
});
</script>

<?php include_once 'include/footer2.php' ; ?>