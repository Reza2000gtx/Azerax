<?php include_once 'include/header2.php'; ?>

<style>
body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    background: #F5F5F5;
}
.az-login-body {
    flex: 1;
    display: flex;
    align-items: stretch;
    min-height: calc(100vh - 130px);
}

/* Left panel */
.az-login-left {
    background: #14213D;
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 48px;
    position: relative;
    overflow: hidden;
}
.az-login-left::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 400px;
    height: 400px;
    background: radial-gradient(ellipse, rgba(252,163,17,0.12) 0%, transparent 70%);
    border-radius: 50%;
}
.az-login-left h2 {
    font-family: 'Inter', sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 12px;
    letter-spacing: -0.5px;
    line-height: 1.2;
    text-align: center;
}
.az-login-left p {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: rgba(255,255,255,0.55);
    margin-bottom: 32px;
    text-align: center;
    line-height: 1.7;
}
.az-login-left-btn {
    display: inline-block;
    padding: 12px 32px;
    border: 2px solid #FCA311;
    border-radius: 8px;
    color: #FCA311;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.15s;
}
.az-login-left-btn:hover {
    background: #FCA311;
    color: #14213D;
}
.az-login-features {
    margin-top: 48px;
    width: 100%;
}
.az-login-feature {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}
.az-login-feature i {
    color: #FCA311;
    font-size: 18px;
    width: 20px;
    flex-shrink: 0;
}
.az-login-feature span {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: rgba(255,255,255,0.6);
}

/* Right panel */
.az-login-right {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 48px;
    background: #fff;
}
.az-login-form {
    width: 100%;
    max-width: 400px;
}
.az-login-form h3 {
    font-family: 'Inter', sans-serif;
    font-size: 26px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 6px;
    letter-spacing: -0.5px;
}
.az-login-form .az-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #999;
    margin-bottom: 28px;
}
.az-login-form .form-group label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #555;
    margin-bottom: 6px;
    display: block;
}
.az-login-form .form-control {
    border: 1.5px solid #EBEBEB;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #14213D;
    padding: 11px 14px;
    transition: border-color 0.15s;
    width: 100%;
}
.az-login-form .form-control:focus {
    border-color: #FCA311;
    box-shadow: none;
    outline: none;
}
.az-login-submit {
    background: #FCA311;
    color: #14213D;
    border: none;
    padding: 13px;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s;
    width: 100%;
    margin-top: 8px;
}
.az-login-submit:hover { background: #e8940a; }
.az-keep-logged {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 12px 0;
}
.az-keep-logged label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #666;
    margin: 0;
    cursor: pointer;
}
.az-forgot {
    display: block;
    text-align: center;
    margin-top: 16px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #999;
    text-decoration: none;
}
.az-forgot:hover { color: #FCA311; }
.errorMessage {
    color: #dc3545;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
    margin-top: 4px;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<div class="az-login-body">

    <!-- Left Panel -->
    <div class="az-login-left">
        <h2>Welcome to azera<span style="color:#FCA311;">X</span></h2>
        <p>The broadcast intelligence platform for architects and vendors.</p>
        <a href="<?php echo base_url(); ?>signup" class="az-login-left-btn">Create a free account →</a>

        <div class="az-login-features">
            <div class="az-login-feature">
                <i class="ti ti-search"></i>
                <span>Search broadcast devices by standards, I/O and connectors</span>
            </div>
            <div class="az-login-feature">
                <i class="ti ti-heart"></i>
                <span>Save favourite products for future reference</span>
            </div>
            <div class="az-login-feature">
                <i class="ti ti-star"></i>
                <span>Leave reviews and help the broadcast community</span>
            </div>
            <div class="az-login-feature">
                <i class="ti ti-building-store"></i>
                <span>Vendors — list your products and reach architects worldwide</span>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="az-login-right">
        <div class="az-login-form">
            <h3>Sign in</h3>
            <p class="az-subtitle">Welcome back — good to see you again.</p>

            <?php echo $this->session->flashdata('msg'); ?>

            <form action="<?php echo base_url(); ?>do-login" method="post">
                <input type="hidden" name="redirect_url" value="<?php echo $this->session->userdata('redirect_after_login'); ?>">

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" placeholder="your@email.com" class="form-control">
                    <div class="errorMessage"><?php echo form_error('email'); ?></div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" required name="password" placeholder="Your password" class="form-control">
                    <div class="errorMessage"><?php echo form_error('password'); ?></div>
                </div>

                <div class="az-keep-logged">
                    <input type="checkbox" id="keep-logged" name="selector">
                    <label for="keep-logged">Keep me logged in</label>
                </div>

                <button type="submit" class="az-login-submit">Sign in</button>
                <a href="<?php echo base_url(); ?>forgot-password" class="az-forgot">Forgot your password?</a>
            </form>
        </div>
    </div>

</div>

<?php include_once 'include/footer2.php'; ?>