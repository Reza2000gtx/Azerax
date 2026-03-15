<?php 
$page=$this->uri->segment(2);
 ?>

<aside class="main-sidebar">
	<section class="sidebar" style="height: auto;">
		
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			

			<li class="<?php if($page=='home'){echo 'active';}?>">
				<a href="<?php echo base_url().'Admin/home';?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>

			 <li class="treeview <?php if($page=='adminlist'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>Admin Managment</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='adminlist'){echo 'active';}?>">
					<li class="<?=(current_url()==base_url('Admin/adminlist')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/adminlist">Admin List</a></li>
				</ul>
			</li>
			
           <li class="treeview <?php if($page=='userlist'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>User Managment</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='userlist'){echo 'active';}?>">
					<li class="<?=(current_url()==base_url('Admin/userlist')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/userlist">User List</a></li>
				</ul>
			</li>
			
			<!--<li class="treeview <?php if($page=='categorylist'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span> Category Managment</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='categorylist'){echo 'active';}?>">
					<li  class="<?=(current_url()==base_url('Admin/categorylist')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/categorylist">Category List</a></li>
				</ul>
			</li>-->
			
			
			<li class="treeview <?php if($page=='productlist' || $page=='add-product' || $page=='edit-product' || $page=='detail-product' ){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span> Product Managment</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='productlist' || $page=='add-product' || $page=='edit-product' || $page=='detail-product'  ){echo 'active';}?>">
					<li  class="<?=(current_url()==base_url('Admin/productlist') || $page=='add-product' || $page=='edit-product' || $page=='detail-product'  ) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/productlist">Product List</a></li>
					
				</ul>
			</li> 


		<li class="treeview <?php if($page=='manufacturerlist'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span> Manufacturer Management</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='manufacturerlist'){echo 'active';}?>">
					<li  class="<?=(current_url()==base_url('Admin/manufacturerlist')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/manufacturerlist">Manufacturer List</a></li>
				</ul>
			</li> 
		<li class="treeview <?php if($page=='contentManagement'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span> Content Management</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='contentManagement'){echo 'active';}?>">
					<li  class="<?=(current_url()==base_url('Admin/about')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/about">About</a></li>
					<li  class="<?=(current_url()==base_url('Admin/services')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/services">Services</a></li>
				</ul>
			</li> 
			<li class="treeview <?php if($page=='ipoManagement'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span> IPO Management</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='ipolist'){echo 'active';}?>">
					<li class="<?=(current_url()==base_url('Admin/ipolist')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/ipolist">IPO List</a></li>
				</ul>
			</li> 
			
			
				<li class="treeview <?php if($page=='reviewlist'){echo 'active';}?>">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span> Review Management</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu <?php if($page=='reviewlist'){echo 'active';}?>">
					<li class="<?=(current_url()==base_url('Admin/reviewlist')) ? 'active':''?>"><a href="<?php echo base_url(); ?>Admin/reviewlist">Review List</a></li>
				</ul>
			</li> 
			
			<li class="<?php if($page=='contact-us'){echo 'active';}?>">
				<a href="<?php echo base_url().'Admin/contact-us';?>">
					<i class="fa fa-cog"></i> <span>Contact Us Listing</span>
				</a>
			</li>	
			<!--	<li class="<?php if($page=='ticket'){echo 'active';}?>">-->
			<!--	<a href="<?php echo base_url().'Admin/ticket';?>">-->
			<!--		<i class="fa fa-cog"></i> <span>Ticket Listing</span>-->
			<!--	</a>-->
			<!--</li>-->
			<li class="<?php if($page=='home'){echo 'active';}?>">
				<a href="<?php echo base_url().'Admin/setting';?>">
					<i class="fa fa-cog"></i> <span>Setting</span>
				</a>
			</li>			
		
			 
		</ul>
	</section>
</aside>