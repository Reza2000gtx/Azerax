<!DOCTYPE html>
<html>
<head>
    <title>Reset Password - Azerax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="max-width: 500px; margin-top: 100px;">
    <h2>Reset Your Password</h2>
    <hr>
    <?php if($this->session->flashdata('msg')) echo $this->session->flashdata('msg'); ?>
    <form action="<?php echo base_url(); ?>reset-password-action" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>
</body>
</html>