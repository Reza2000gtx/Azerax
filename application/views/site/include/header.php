<!doctype html>
<html lang="en">

<head>

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
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/style.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/responsive.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/custom.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
	<script src="<?php echo base_url();?>assets/site/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/site/vendors/jquery-ui/jquery-ui.js"></script>

	<!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 <!--   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>-->
 <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->

	<script type="text/javascript">var site_url = '<?php echo base_url(); ?>'</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" /> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<script type="text/javascript"> //<![CDATA[
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
</head>
<body>

	<header class="header_area">
	
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">

					<a class="navbar-brand logo_h" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/site/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
						 <ul class="nav navbar-nav menu_nav ml-auto mobile_only">
							<li class="nav-item submenu dropdown user_login">
							<a href="conactus.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">


								<img class="img_top" src="<?php echo base_url();?>/assets/site/img/pro1.jpg">

								<?php echo $user['fname'];?>

							</a>

							 <ul class="dropdown-menu">

							 	<li class="nav-item main_menu_item bolde_onl">Profile</li>
							 	
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>profile">My Profile</a></li>

								<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>change-password">Change Password</a></li>

								<li class="nav-item"><a class="nav-link"  onclick="return alert('comming soon');" href="#">Change Photo</a></li>

								<li class="nav-item main_menu_item border_font">Items management</li>

								<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>add-product">Add an Item</a></li>

								<li class="nav-item"><a class="nav-link" onclick="return alert('comming soon');" href="#">Delete an Item</a></li>

								<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>my-product-listing">Listing</a></li>

								<li class="nav-item main_menu_item border_font">Financials </li>

								<li class="nav-item"><a class="nav-link" onclick="return alert('comming soon');" href="#">Transaction History</a></li>
								<li class="nav-item"><a class="nav-link" onclick="return alert('comming soon');" href="#">Payment details</a></li>
								<li class="nav-item"><a class="nav-link" onclick="return alert('comming soon');" href="#">Credit cards</a></li>

								<li class="nav-item main_menu_item border_font">Help and Support</li>

								<li class="nav-item"><a onclick="return alert('comming soon');" class="nav-link" href="#">Contact Us</a></li>



							<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>logout">Logout</a></li>
						</ul> 
					</li>
				\</ul> 
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item <?php if($page=='home'){echo 'active';}?>"><a class="nav-link" href="<?php echo base_url();?>">Home</a></li>
<!-- 							<li class="nav-item <?php if($page=='about'){echo 'active';}?>"><a class="nav-link" onclick="return alert('comming soon');"  href="#">About</a></li>
 -->							<li class="nav-item <?php if($page=='services'){echo 'active';}?>"><a class="nav-link" onclick="return alert('comming soon');"  href="#">Services</a></li>
							<li class="nav-item <?php if($page=='search-listing'){echo 'active';}?>"><a class="nav-link" href="<?php echo base_url();?>search-listing">Devices</a></li>
							<li class="nav-item <?php if($page=='contact-us'){echo 'active';}?>"><a class="nav-link" href="<?php echo base_url();?>contact-us">Contact Us</a></li>
							
							<!-- <li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
							 <ul class="dropdown-menu">
							
							<li class="nav-item"><a class="nav-link" href="#">List Products</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Products</a></li>

							</ul> 
						</li> -->

						

						<!--<li class="nav-item submenu dropdown">
							<a href="conactus.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us</a>
							 <ul class="dropdown-menu">
								
								<li class="nav-item"><a class="nav-link" href="#">Product Category 1</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Product Category 2</a></li>

							</ul> 
						</li>-->

						<?php if(!$this->session->userdata('user_id')) { ?>
						
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>login">Login</a></li>
							<li class="nav-item"><a class="btn main_btn signup_btn spance_nav" href="<?php echo base_url();?>signup">Sign Up</a></li>
						
<?php } else{ 
 
  $user = $this->common_model->GetSingleData('users',array('user_id' =>$this->session->userdata('user_id')));

?>


<li class="nav-item" style="margin-right: 20px"><a class="btn main_btn signup_btn spance_nav" href="<?php echo base_url();?>add-product">Add Item</a></li>


	<li class="nav-item submenu dropdown user_login dessk_only">
							<a href="conactus.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

								<!-- <i class="lnr lnr-user"></i> -->

								<img class="img_top" <?php if(!empty($user['profile'])){ ?>  src="<?php echo base_url();?>assets/profile/<?php echo $user['profile'];?>" <?php } else { ?> src="<?php echo base_url();?>assets/profile/user.png"   <?php } ?> >

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
 
								 <li class="nav-item main_menu_item border_font">Financials </li>
 
								 <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>transaction">Transaction History</a></li>
 
								 <li class="nav-item"><a class="nav-link" onclick="return alert('comming soon');" href="#">Payment details</a></li>
 
								 <li class="nav-item"><a class="nav-link" onclick="return alert('comming soon');" href="#">Credit cards</a></li>
								 
							</ul> 
						</li>
								

<?php } ?>
						</ul>


					<!-- 	<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><i class="lnr lnr lnr-cart"></i></a></li>
							<li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
						</ul> -->


										</div>
									</div>
								</nav>
							</div>
						</header>

						<style type="text/css">
	.form-control:focus{
		    border: 1px solid #c51919 !important;
	}

	.errorMessage p{
	    color: red;
    font-weight: bold;
	}

</style>
