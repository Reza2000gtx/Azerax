<?php include_once 'include/header2.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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
.az-login-left-btn:hover { background: #FCA311; color: #14213D; }
.az-login-features { margin-top: 48px; width: 100%; }
.az-login-feature {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}
.az-login-feature i { color: #FCA311; font-size: 18px; width: 20px; flex-shrink: 0; }
.az-login-feature span { font-family: 'Inter', sans-serif; font-size: 13px; color: rgba(255,255,255,0.6); }
.az-login-right {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 48px;
    background: #fff;
}
.az-login-form { width: 100%; max-width: 400px; }
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
.errorMessage {
    color: #dc3545;
    font-size: 12px;
    font-family: 'Inter', sans-serif;
    margin-top: 4px;
}
.az-terms {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #999;
    text-align: center;
    margin-top: 16px;
}
.az-terms a { color: #FCA311; text-decoration: none; }

/* Account type selection - two clickable cards, radio-based */
.az-account-type {
    display: flex;
    gap: 12px;
    margin-bottom: 22px;
}
.az-account-type input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}
.az-account-type-card {
    flex: 1;
    display: block;
    border: 1.5px solid #EBEBEB;
    border-radius: 8px;
    padding: 14px 12px;
    cursor: pointer;
    text-align: center;
    transition: border-color 0.15s, background 0.15s;
}
.az-account-type-card i {
    font-size: 20px;
    color: #999;
    display: block;
    margin-bottom: 6px;
    transition: color 0.15s;
}
.az-account-type-card .az-account-type-label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #14213D;
    display: block;
}
.az-account-type-card .az-account-type-sub {
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    color: #999;
    display: block;
    margin-top: 2px;
}
.az-account-type input[type="radio"]:checked + .az-account-type-card {
    border-color: #FCA311;
    background: #FFF8E8;
}
.az-account-type input[type="radio"]:checked + .az-account-type-card i {
    color: #FCA311;
}
.az-account-type input[type="radio"]:focus-visible + .az-account-type-card {
    outline: 2px solid #FCA311;
    outline-offset: 2px;
}

/* Show/hide password toggle */
.az-password-wrap {
    position: relative;
}
.az-password-wrap input {
    padding-right: 42px;
}
.az-password-toggle {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    padding: 4px;
    cursor: pointer;
    color: #999;
    font-size: 17px;
    line-height: 1;
}
.az-password-toggle:hover { color: #14213D; }
</style>

<div class="az-login-body">

    <!-- Left Panel -->
    <div class="az-login-left">
        <h2>Join azera<span style="color:#FCA311;">X</span></h2>
        <p>The broadcast intelligence platform for architects and vendors. Free to join.</p>
        <a href="<?php echo base_url(); ?>login" class="az-login-left-btn">Already have an account? Sign in →</a>

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
                <i class="ti ti-building-store"></i>
                <span>Vendors — list your products free for the first year</span>
            </div>
            <div class="az-login-feature">
                <i class="ti ti-star"></i>
                <span>Leave reviews and help the broadcast community</span>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="az-login-right">
        <div class="az-login-form">
            <h3>Create account</h3>
            <p class="az-subtitle">Free to join for everyone.</p>

            <?php echo $this->session->flashdata('msg'); ?>

            <form action="<?php echo base_url(); ?>signup-action" method="post">

                <div class="form-group">
                    <label>I am joining as a...</label>
                    <div class="az-account-type">
                        <label style="position:relative;flex:1;margin:0;">
                            <input type="radio" name="user_type" value="0" checked>
                            <span class="az-account-type-card">
                                <i class="ti ti-user"></i>
                                <span class="az-account-type-label">Buyer</span>
                                <span class="az-account-type-sub">Browse &amp; request quotes</span>
                            </span>
                        </label>
                        <label style="position:relative;flex:1;margin:0;">
                            <input type="radio" name="user_type" value="1">
                            <span class="az-account-type-card">
                                <i class="ti ti-building-store"></i>
                                <span class="az-account-type-label">Vendor</span>
                                <span class="az-account-type-sub">List &amp; manage products</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" required class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Your full name">
                    <div class="errorMessage" id="err-username"><?php echo form_error('username'); ?></div>
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" required class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="your@email.com">
                    <div class="errorMessage" id="err-email"><?php echo form_error('email'); ?></div>
                </div>

                <div class="form-group">
                    <label>Password <span style="color:#999;font-weight:400;">(min. 6 characters, with upper &amp; lowercase, a number and a special character)</span></label>
                    <div class="az-password-wrap">
                        <input type="password" required class="form-control" name="password" id="signup-password" placeholder="Choose a password">
                        <button type="button" class="az-password-toggle ti ti-eye" data-target="signup-password" aria-label="Show password"></button>
                    </div>
                    <div class="errorMessage" id="err-password"><?php echo form_error('password'); ?></div>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="az-password-wrap">
                        <input type="password" required class="form-control" name="cpassword" id="signup-cpassword" placeholder="Confirm your password">
                        <button type="button" class="az-password-toggle ti ti-eye" data-target="signup-cpassword" aria-label="Show password"></button>
                    </div>
                    <div class="errorMessage" id="err-cpassword"><?php echo form_error('cpassword'); ?></div>
                </div>

                <div class="az-keep-logged">
                    <input type="checkbox" id="keep-logged" name="selector">
                    <label for="keep-logged">Keep me logged in</label>
                </div>

                <!-- Honeypot - hidden from real users, bots will fill this -->
                <div style="display:none;">
                    <input type="text" name="website" value="" tabindex="-1" autocomplete="off">
                </div>

                <button type="submit" class="az-login-submit">Create account</button>

                <p class="az-terms">By creating an account you agree to our <a href="<?php echo base_url(); ?>privacy">Terms of Use</a> and <a href="<?php echo base_url(); ?>privacy">Privacy Policy</a>.</p>

            </form>
        </div>
    </div>

</div>

<script>
document.querySelectorAll('.az-password-toggle').forEach(function(btn){
    btn.addEventListener('click', function(){
        var input = document.getElementById(btn.getAttribute('data-target'));
        if(!input) return;
        var isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        btn.classList.toggle('ti-eye', !isHidden);
        btn.classList.toggle('ti-eye-off', isHidden);
        btn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
    });
});

// Clear a field's error message as soon as the user edits it, rather than
// leaving a stale error (e.g. "email already exists") sitting there after
// they've already typed a different, valid value - it only actually
// re-validates on the next full submit either way.
[
    ['username', 'err-username'],
    ['email', 'err-email'],
    ['password', 'err-password'],
    ['cpassword', 'err-cpassword']
].forEach(function(pair){
    var input = document.querySelector('[name="' + pair[0] + '"]');
    var errorEl = document.getElementById(pair[1]);
    if(!input || !errorEl) return;
    input.addEventListener('input', function(){
        errorEl.textContent = '';
    });
});
</script>
<?php include_once 'include/footer2.php'; ?>