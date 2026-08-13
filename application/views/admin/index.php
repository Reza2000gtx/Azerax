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
		<style type="text/css">
			.az-stat-card {
				background: #fff;
				border: 1px solid #EBEBEB;
				border-radius: 8px;
				padding: 12px 14px;
				margin-bottom: 16px;
				display: flex;
				align-items: center;
				gap: 12px;
				text-decoration: none;
				transition: box-shadow 0.15s ease, transform 0.1s ease;
			}
			.az-stat-card:hover {
				text-decoration: none;
				box-shadow: 0 2px 8px rgba(0,0,0,0.08);
				transform: translateY(-1px);
			}
			.az-stat-icon {
				width: 38px;
				height: 38px;
				border-radius: 8px;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-shrink: 0;
				font-size: 17px;
				color: #fff;
			}
			.az-stat-users .az-stat-icon { background: #14213D; }
			.az-stat-devices .az-stat-icon { background: #1D9E75; }
			.az-stat-pending .az-stat-icon { background: #D85A30; }
			.az-stat-expiring .az-stat-icon { background: #FCA311; }
			.az-stat-reviews .az-stat-icon { background: #534AB7; }
			.az-stat-contact .az-stat-icon { background: #185FA5; }
			.az-stat-body { min-width: 0; }
			.az-stat-number { font-size: 20px; font-weight: 600; color: #14213D; line-height: 1.1; }
			.az-stat-label { font-size: 12px; color: #6b6f76; }
		</style>
		<!-- Stat cards -->
		<div class="row">

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<a href="<?php echo base_url() ?>Admin/userlist" class="az-stat-card az-stat-users">
					<div class="az-stat-icon"><i class="ion ion-person-add"></i></div>
					<div class="az-stat-body">
						<div class="az-stat-number"><?php echo count($teachers); ?></div>
						<div class="az-stat-label">Users</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<a href="<?php echo base_url() ?>Admin/productlist" class="az-stat-card az-stat-devices">
					<div class="az-stat-icon"><i class="ion ion-checkmark"></i></div>
					<div class="az-stat-body">
						<div class="az-stat-number"><?php echo count($devices); ?></div>
						<div class="az-stat-label">Devices</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<a href="<?php echo base_url() ?>Admin/pending_productlist" class="az-stat-card az-stat-pending">
					<div class="az-stat-icon"><i class="ion ion-help"></i></div>
					<div class="az-stat-body">
						<div class="az-stat-number"><?php echo count($pending_devices); ?></div>
						<div class="az-stat-label">Pending approval</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<a href="<?php echo base_url() ?>Admin/expire_productlist" class="az-stat-card az-stat-expiring">
					<div class="az-stat-icon"><i class="ion ion-alert"></i></div>
					<div class="az-stat-body">
						<div class="az-stat-number"><?php echo count($expire_devices); ?></div>
						<div class="az-stat-label">Expiring in 2mo</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<a href="<?php echo base_url() ?>Admin/reviewlist" class="az-stat-card az-stat-reviews">
					<div class="az-stat-icon"><i class="ion ion-person-add"></i></div>
					<div class="az-stat-body">
						<div class="az-stat-number"><?php echo count($review); ?></div>
						<div class="az-stat-label">Reviews</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<a href="<?php echo base_url() ?>Admin/contact_us" class="az-stat-card az-stat-contact">
					<div class="az-stat-icon"><i class="ion ion-person-add"></i></div>
					<div class="az-stat-body">
						<div class="az-stat-number"><?php echo count($contact); ?></div>
						<div class="az-stat-label">Contact</div>
					</div>
				</a>
			</div>

		</div>
			<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('include/footer.php'); ?>
