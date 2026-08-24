<?php 
$page=$this->uri->segment(2);
 ?>

<aside class="main-sidebar">
	<section class="sidebar" style="height: auto;">
		
		<!-- Flat menu - every page is a direct link, no click-to-expand needed -->
		<ul class="sidebar-menu">

			<li class="<?php if($page=='home'){echo 'active';}?>">
				<a href="<?php echo base_url().'Admin/home';?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>

			<li class="<?php if($page=='adminlist'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/adminlist">
					<i class="fa fa-user-circle-o"></i> <span>Admin List</span>
				</a>
			</li>

			<li class="<?php if($page=='userlist'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/userlist">
					<i class="fa fa-users"></i> <span>User List</span>
				</a>
			</li>

			<li class="<?php if($page=='productlist' || $page=='add-product' || $page=='edit-product' || $page=='detail-product'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/productlist">
					<i class="fa fa-cube"></i> <span>Product List</span>
				</a>
			</li>

			<li class="<?php if($page=='manufacturerlist'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/manufacturerlist">
					<i class="fa fa-industry"></i> <span>Manufacturer List</span>
				</a>
			</li>

			<li class="<?php if($page=='categorylist' || $page=='listcat' || $page=='listsubcat' || $page=='listsubsubcat'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/categorylist">
					<i class="fa fa-sitemap"></i> <span>Categories</span>
				</a>
			</li>

			<li class="<?php if($page=='about'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/about">
					<i class="fa fa-file-text-o"></i> <span>About</span>
				</a>
			</li>

			<li class="<?php if($page=='ipolist'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/ipolist">
					<i class="fa fa-list-alt"></i> <span>IPO List</span>
				</a>
			</li>

			<li class="<?php if($page=='reviewlist'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/reviewlist">
					<i class="fa fa-star-o"></i> <span>Review List</span>
				</a>
			</li>

			<li class="<?php if($page=='contact-us'){echo 'active';}?>">
				<a href="<?php echo base_url().'Admin/contact-us';?>">
					<i class="fa fa-envelope-o"></i> <span>Contact Us Listing</span>
				</a>
			</li>

			<li class="<?php if($page=='advertisement'){echo 'active';}?>">
				<a href="<?php echo base_url(); ?>Admin/advertisement">
					<i class="fa fa-bullhorn"></i> <span>Advertisement</span>
				</a>
			</li>

			<li class="<?php if($page=='setting'){echo 'active';}?>">
				<a href="<?php echo base_url().'Admin/setting';?>">
					<i class="fa fa-cog"></i> <span>Setting</span>
				</a>
			</li>

		</ul>
	</section>
</aside>
