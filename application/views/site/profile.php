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

        <?php
        if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']); }
        if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']); }
        ?>

        <form action="<?php echo base_url(); ?>edit-profile-action" method="post" enctype="multipart/form-data">

            <?php if(!empty($user['profile'])): ?>
            <div class="form-group" style="text-align:center;">
                <img src="<?php echo base_url(); ?>assets/profile/<?php echo $user['profile']; ?>" class="az-profile-avatar" alt="Profile image">
                <input type="hidden" name="oldprofile" value="<?php echo $user['profile']; ?>">
            </div>
            <?php endif; ?>

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
                <label>Job Title</label>
                <input type="text" name="job_title" value="<?php echo $user['job_title']; ?>" placeholder="e.g. Broadcast Engineer, Systems Architect" class="form-control">
            </div>

            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" value="<?php echo $user['country']; ?>" placeholder="e.g. Australia, United Kingdom" class="form-control">
            </div>

            <div class="form-group">
                <label>Profile Photo</label>
                <input type="file" name="profile" id="file-upload" accept="image/*" class="form-control" style="padding:8px;">
            </div>

            <div class="form-group" style="margin-top:8px;">
                <button class="az-submit-btn">Update Profile</button>
            </div>

        </form>
    </div>
</div>

<?php include_once 'include/footer2.php'; ?>