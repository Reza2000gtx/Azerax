<!doctype html>
<html lang="en">

<head><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="icon" href="<?php echo base_url();?>assets/site/img/favicon.png" type="image/png"> -->
	<title>Azerax</title>

	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/vendors/linericon/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/vendors/nice-select/<?php echo base_url();?>assets/site/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/vendors/animate-<?php echo base_url();?>assets/site/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/vendors/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/style2.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/responsive.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/custom.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">

	<style type="text/css">
.img_top {
    width: 35px;
    height: 35px;
    border: 1px solid #000;
    border-radius: 50%;
    margin-right: 5px;
}
.header_area .navbar .nav .nav-item .nav-link {
    color: rgba(255,255,255,0.75) !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 14px !important;
    font-weight: 500 !important;
}
.header_area .navbar .nav .nav-item .nav-link:hover {
    color: #fff !important;
}
.header_area .navbar .nav .nav-item.active .nav-link {
    color: #fff !important;
}
</style>

	<script type="text/javascript"> 
		var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
		document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));

	</script>
</head>
<body>

	<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background:#0E1A2C !important;font-family:'Inter',sans-serif;">
            <div class="container">
                <a class="navbar-brand logo_h" href="<?php echo base_url();?>" style="display:flex;align-items:center;gap:10px;">
                    <svg width="36" height="36" viewBox="0 0 56 56" fill="none">
                        <rect width="56" height="56" rx="13" fill="#FCA311"/>
                        <rect x="11" y="11" width="9" height="9" rx="2" fill="#14213D" opacity="0.3"/>
                        <rect x="22" y="11" width="9" height="9" rx="2" fill="#14213D" opacity="0.55"/>
                        <rect x="33" y="9" width="11" height="11" rx="2.5" fill="#14213D"/>
                        <rect x="11" y="22" width="9" height="9" rx="2" fill="#14213D" opacity="0.55"/>
                        <rect x="22" y="22" width="9" height="9" rx="2" fill="#14213D" opacity="0.8"/>
                        <rect x="33" y="22" width="9" height="9" rx="2" fill="#14213D" opacity="0.55"/>
                        <rect x="9" y="33" width="11" height="11" rx="2.5" fill="#14213D"/>
                        <rect x="22" y="33" width="9" height="9" rx="2" fill="#14213D" opacity="0.55"/>
                        <rect x="33" y="33" width="9" height="9" rx="2" fill="#14213D" opacity="0.3"/>
                    </svg>
                    <span style="font-family:'Outfit',sans-serif;font-size:24px;font-weight:600;letter-spacing:-0.5px;color:#fff;">azera<span style="color:#FCA311;">X</span></span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url();?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" onclick="return alert('coming soon');" href="#">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>search-listing">Devices</a></li>
                        <li class="nav-item <?php if($page=='contact-us'){echo 'active';}?>"><a class="nav-link" href="<?php echo base_url();?>contact-us">Contact Us</a></li>

                        <?php if(!$this->session->userdata('user_id')) { ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>login">Log in</a></li>
                            <li class="nav-item"><a class="btn spance_nav" href="<?php echo base_url();?>signup" style="background:#FCA311;color:#14213D;padding:8px 20px;border-radius:6px;font-size:13px;font-weight:600;font-family:'Inter',sans-serif;text-decoration:none;margin-left:8px;">List your product</a></li>
                        <?php } else {
                            $user = $this->common_model->GetSingleData('users',array('user_id' =>$this->session->userdata('user_id')));
                        ?>
                        <li class="nav-item submenu dropdown user_login">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="img_top" <?php if(!empty($user['profile'])){ ?> src="<?php echo base_url();?>assets/profile/<?php echo $user['profile'];?>" <?php } else { ?> src="<?php echo base_url();?>assets/profile/user.png" <?php } ?>>
                                <?php echo $user['fname'];?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item main_menu_item bolde_onl">Profile</li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>profile">My Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>change-password">Change Password</a></li>
                                <li class="nav-item"><a onclick="return (confirm('Are you sure?'))" class="nav-link" href="<?php echo base_url();?>logout">Logout</a></li>
                                <li class="nav-item main_menu_item border_font">Items management</li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>add-product">Add Item</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>my-product-listing">My List</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>my-fav-listing">Favorite List</a></li>
                                <li class="nav-item main_menu_item border_font">Financials</li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>transaction">Transaction History</a></li>
                                <li class="nav-item"><a class="nav-link" onclick="return alert('coming soon');" href="#">Payment details</a></li>
                                <li class="nav-item"><a class="nav-link" onclick="return alert('coming soon');" href="#">Credit cards</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
					