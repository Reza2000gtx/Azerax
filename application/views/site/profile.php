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
.az-profile-body {
    background: #F5F5F5;
    padding: 40px;
    min-height: calc(100vh - 280px);
    display: flex;
    align-items: flex-start;
    justify-content: center;
}
.az-profile-card {
    background: #fff;
    border: 1.5px solid #EBEBEB;
    border-radius: 14px;
    padding: 36px;
    width: 100%;
    max-width: 520px;
}
.az-profile-card h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #14213D;
    margin-bottom: 24px;
}
.az-profile-card .form-group label {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #666;
    margin-bottom: 6px;
    display: block;
}
.az-profile-card .form-control {
    border: 1.5px solid #EBEBEB;
    border-radius: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #14213D;
    padding: 10px 14px;
    transition: border-color 0.15s;
}
.az-profile-card .form-control:focus {
    border-color: #FCA311;
    box-shadow: none;
}
.az-profile-card .form-control[readonly] {
    background: #F9F9F9;
    color: #999;
}
.az-profile-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #EBEBEB;
    margin-bottom: 12px;
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
</style>

<!-- Hero -->
<div class="az-page-hero">
    <h1>My Profile</h1>
    <p>Manage your account details</p>
</div>

<!-- Body -->
<div class="az-profile-body">
    <div class="az-profile-card">
        <h3>Account Details</h3>

        <?php echo $this->session->flashdata('msg'); ?>
        <?php
        if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']); }
        if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']); }
        ?>

        <form action="<?php echo base_url(); ?>edit-profile-action" method="post" enctype="multipart/form-data">

            <div class="form-group" style="text-align:center;position:relative;display:inline-block;margin-bottom:20px;width:100%;">
                <?php if(!empty($user['profile'])): ?>
                <img src="<?php echo base_url(); ?>assets/profile/<?php echo $user['profile']; ?>" class="az-profile-avatar" alt="Profile image">
                <input type="hidden" name="oldprofile" value="<?php echo $user['profile']; ?>">
                <?php else: ?>
                <div style="width:80px;height:80px;border-radius:50%;background:#E5E5E5;display:inline-flex;align-items:center;justify-content:center;margin-bottom:12px;">
                    <i class="fa fa-user" style="font-size:32px;color:#999;"></i>
                </div>
                <?php endif; ?>
                <label for="file-upload" style="position:absolute;bottom:8px;left:calc(50% + 24px);width:28px;height:28px;background:#FCA311;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 2px 6px rgba(0,0,0,0.2);">
                    <i class="fa fa-camera" style="font-size:12px;color:#14213D;"></i>
                </label>
                <input type="file" name="profile" id="file-upload" accept="image/*" style="display:none;">
            </div>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" required value="<?php echo $user['fname']; ?>" name="username" placeholder="Your name" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $user['email']; ?>" readonly class="form-control">
            </div>

            <div class="form-group">
                <label>Company / Organisation</label>
                <input type="text" name="company" value="<?php echo $user['company']; ?>" placeholder="e.g. BBC, ITV, Grass Valley" class="form-control">
            </div>

            <div class="form-group">
                <label>Company Logo</label>
                <div style="display:flex;align-items:center;gap:14px;">
                    <?php if(!empty($user['company_logo'])): ?>
                    <img id="company-logo-preview" src="<?php echo base_url(); ?>assets/profile/<?php echo $user['company_logo']; ?>" style="height:48px;max-width:140px;object-fit:contain;border:1.5px solid #EBEBEB;border-radius:8px;padding:6px;background:#fff;" alt="Company logo">
                    <input type="hidden" name="oldcompanylogo" value="<?php echo $user['company_logo']; ?>">
                    <?php else: ?>
                    <div id="company-logo-placeholder" style="height:48px;width:80px;border:1.5px dashed #EBEBEB;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                        <i class="fa fa-image" style="font-size:18px;color:#999;"></i>
                    </div>
                    <img id="company-logo-preview" style="display:none;height:48px;max-width:140px;object-fit:contain;border:1.5px solid #EBEBEB;border-radius:8px;padding:6px;background:#fff;" alt="Company logo">
                    <?php endif; ?>
                    <label for="company-logo-upload" style="border:1.5px solid #EBEBEB;border-radius:8px;padding:8px 16px;font-family:'Inter',sans-serif;font-size:13px;font-weight:500;color:#14213D;cursor:pointer;">Choose file</label>
                    <input type="file" name="company_logo" id="company-logo-upload" accept="image/*" style="display:none;">
                </div>
                <p style="font-family:'Inter',sans-serif;font-size:12px;color:#999;margin:6px 0 0;">Shown next to your listings in search results. Optional.</p>
                <script>
                document.getElementById('company-logo-upload').addEventListener('change', function(e){
                    var file = e.target.files[0];
                    if(!file) return;
                    var reader = new FileReader();
                    reader.onload = function(evt){
                        var preview = document.getElementById('company-logo-preview');
                        preview.src = evt.target.result;
                        preview.style.display = 'block';
                        var placeholder = document.getElementById('company-logo-placeholder');
                        if(placeholder) placeholder.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                });
                </script>
            </div>

            <div class="form-group">
                <label>Job Title</label>
                <input type="text" name="job_title" value="<?php echo $user['job_title']; ?>" placeholder="e.g. Broadcast Engineer, Systems Architect" class="form-control">
            </div>

            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" value="<?php echo $user['country']; ?>" placeholder="e.g. Australia, United Kingdom" class="form-control">
            </div>

           		 <div class="form-group" style="margin-top:8px;">
                <button class="az-submit-btn">Update Profile</button>
            </div>

        </form>
    </div>
</div>

<?php include_once 'include/footer2.php'; ?>