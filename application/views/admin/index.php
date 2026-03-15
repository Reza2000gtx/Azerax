<?php include_once('include/header.php'); ?> 
<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard<small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
   </section>
   
   <!-- Main content -->
   <section class="content">
		<?php
		echo $this->session->flashdata('msg');
		?>
		<!-- Small boxes (Stat box) -->
		<div class="row">
			
			<div class="col-lg-3 col-xs-6">
			<!-- small box -->

				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo count($teachers); ?></h3>
						<p>Users</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?php echo base_url() ?>Admin/userlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
			<!-- small box -->

				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo count($devices); ?></h3>
						<p>Devices</p>
					</div>
					<div class="icon">
						<i class="ion ion-checkmark"></i>
					</div>
					<a href="<?php echo base_url() ?>Admin/productlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
			<!-- small box -->

				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo count($pending_devices); ?></h3>
						<p>Devices pending for approval</p>
					</div>
					<div class="icon">
						<i class="ion ion-help"></i>
					</div>
					<a href="<?php echo base_url() ?>Admin/pending_productlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
			<!-- small box -->

				<div class="small-box bg-teal">
					<div class="inner">
						<h3><?php echo count($expire_devices); ?></h3>
						<p>Devices that expire in 2 months</p>
					</div>
					<div class="icon">
						<i class="ion ion-alert"></i>
					</div>
					<a href="<?php echo base_url() ?>Admin/expire_productlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
			<!-- small box -->

				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo count($review); ?></h3>
						<p>Reviews</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?php echo base_url() ?>Admin/reviewlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
			<!-- small box -->

				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo count($contact); ?></h3>
						<p>Contact</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?php echo base_url() ?>Admin/contact_us" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<!--</div>
			<div class="row">
			<h2>Site Visitors</h2>

			<div class="col-lg-3 col-xs-6">
			<!-- small box -->
				<!--<div class="small-box" style="background-color: #419c87 !important;    color: #fff !important;">
					<div class="inner">
						<h3>0</h3>
						<p>Current Date Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>-->
					<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
				<!--</div>
			</div>-->
			<!-- ./col -->
			<!-- ./col -->
			<!--<div class="col-lg-3 col-xs-6">-->
			<!-- small box -->

			<!--	<div class="small-box" style="background-color: #9c4195 !important;    color: #fff !important;">
					<div class="inner">
						<h3>0</h3>
						<p>Current Month Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
			<!--	</div>
			</div>-->
			<!-- ./col -->
		<!--	<div class="col-lg-3 col-xs-6">-->
			<!-- small box -->

			<!--	<div class="small-box" style="background-color: #27367f !important;    color: #fff !important;">
					<div class="inner">
						<h3>0</h3>
						<p>Current Week Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
			<!--	</div>
			</div>-->
			<!-- ./col -->
			<!-- ./col -->
			<!--<div class="col-lg-3 col-xs-6">-->
			<!-- small box -->

			<!--	<div class="small-box" style="background-color: #ae9435 !important;    color: #fff !important;">
					<div class="inner">
						<h3>0<h3>
						<p>Current Year Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>-->
					<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
				<!--</div>
			</div>-->
			<!-- ./col -->
			<!-- ./col -->
		</div>
			<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('include/footer.php'); ?>