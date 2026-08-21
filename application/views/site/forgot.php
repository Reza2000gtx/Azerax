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
.az-form-body {
    background: #F5F5F5;
    padding: 40px;
    min-height: calc(100vh - 280px);
    display: flex;
    align-items: flex-start;
    justify-content: center;
}
.az-form-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 14px;
    padding: 36px;
    width: 100%;
    max-width: 480px;
}
.az-form-card h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 6px;
}
.az-form-card .az-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
    margin-bottom: 24px;
}
.az-form-card .form-group label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #666;
    margin-bottom: 6px;
    display: block;
}
.az-form-card .form-control {
    border: 1.5px solid #EBEBEB;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #14213D;
    padding: 10px 14px;
    transition: border-color 0.15s;
    width: 100%;
}
.az-form-card .form-control:focus {
    border-color: #FCA311;
    box-shadow: none;
    outline: none;
}
.errorMessage {
    color: #dc3545;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
    margin-top: 4px;
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
    width: 100%;
}
.az-submit-btn:hover { background: #e8940a; }
.az-back-link {
    display: block;
    text-align: center;
    margin-top: 18px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
    text-decoration: none;
}
.az-back-link:hover { color: #14213D; }

body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.az-form-body {
    flex: 1;
}
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>Forgot Password</h1>
    <p>We'll send you a link to reset it</p>
</div>

<!-- Body -->
<div class="az-form-body">
    <div class="az-form-card">
        <h3>Reset your password</h3>
        <p class="az-subtitle">Enter the email address on your account and we'll send you a reset link.</p>
        <?php echo $this->session->flashdata('msg'); ?>

        <form method="post" action="<?php echo base_url();?>send-password-mail">
            <div class="form-group">
                <label>Email Address</label>
                <input required type="email" class="form-control" name="email" placeholder="your@email.com">
                <div class="errorMessage" id="email_error"><?php echo form_error('email'); ?></div>
            </div>
            <div class="form-group" style="margin-top:8px;">
                <button type="submit" class="az-submit-btn">Send Reset Link</button>
            </div>
        </form>

        <a href="<?php echo base_url();?>login" class="az-back-link">&larr; Back to Sign In</a>
    </div>
</div>

<?php include_once 'include/footer2.php'; ?>
