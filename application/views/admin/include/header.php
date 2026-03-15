<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reeza</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
	
   
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/custom/style.css">
	
	<style type="text/css">
		.skin-blue .main-header .logo {
			background-color: #ae9435   !important; 
		}
	</style>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/site/img/logo.png">

	<script type="text/javascript">var site_url = '<?php echo base_url(); ?>'</script>


	 <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
$admin_id = $this->session->userdata('admin_id');
$admindata= $this->common_model->GetSingleData('admin',array('id'=>$admin_id));

 ?>
	<div class="wrapper">
		<header class="main-header" style="background-color: blue!important;">
			<!-- Logo -->
			<a href="<?php echo base_url();?>Admin/home" class="logo" style="background-color: #fca311!important;">
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img src="<?php echo base_url();?>assets/site/img/logo.png" height="30px" width="auto"  alt="User Image"></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" style="background-color: #fca311!important;">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								
								<span class="hidden-xs"><?php echo $admindata['admin_name'] ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- Menu Footer-->
								<li class="user-footer">
									<a href="<?php echo base_url().'Admin/profile';?>" class="nav-link">Profile</a>
								</li>
								<li class="user-footer">
									<a href="<?php echo base_url().'Admin/home/logout';?>" class="nav-link">Sign out</a>
								</li>

								<!-- <li>
									<div class="pull-left">
										<a href="<?php echo base_url().'Admin/profile';?>" class="nav-link">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url().'Admin/home/logout';?>" class="nav-link">Sign out</a>
									</div>
								</li> -->
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
<?php include_once('sidebar.php');?>	 
<style type="text/css">
	.dropdown.user.user-menu:hover .dropdown-menu {
	display: block;
}
</style>