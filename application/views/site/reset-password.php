<?php include_once 'include/header2.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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

body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.az-form-body {
    flex: 1;
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

<!-- Hero -->
<div class="az-page-hero">
    <h1>Reset Password</h1>
    <p>Choose a new password for your account</p>
</div>

<!-- Body -->
<div class="az-form-body">
    <div class="az-form-card">
        <h3>Set a new password</h3>
        <?php echo $this->session->flashdata('msg'); ?>

        <form action="<?php echo base_url(); ?>reset-password-action" method="post">
            <input type="hidden" name="token" value="<?php echo $token; ?>">

            <div class="form-group">
                <label>New Password</label>
                <div class="az-password-wrap">
                    <input type="password" name="new_password" id="reset-new-password" class="form-control" placeholder="Enter new password" required>
                    <button type="button" class="az-password-toggle ti ti-eye" data-target="reset-new-password" aria-label="Show password"></button>
                </div>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <div class="az-password-wrap">
                    <input type="password" name="confirm_password" id="reset-confirm-password" class="form-control" placeholder="Confirm new password" required>
                    <button type="button" class="az-password-toggle ti ti-eye" data-target="reset-confirm-password" aria-label="Show password"></button>
                </div>
            </div>
            <div class="form-group" style="margin-top:8px;">
                <button type="submit" class="az-submit-btn">Reset Password</button>
            </div>
        </form>
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
</script>

<?php include_once 'include/footer2.php'; ?>
