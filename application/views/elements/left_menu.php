<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
                
                <li class="profile_bg hide">
				<a>
				<img class="img-circle img-responsive profile_pic" src="<?php echo base_url();?>assets/admin/layout/img/avatar1.jpg"/>
				
				Welcome </a>
				</li>
                
                
                <!--<li class="start <?= (uri_segment(1) == 'admin' && uri_segment(2) == 'dashboard') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/dashboard"><i class="icon-home"></i><span class="title">  Dashboard</span></a></li>-->
				
               <li class="<?= (uri_segment(1) == 'admin' && (uri_segment(2) == 'user' || uri_segment(2) == 'city' || uri_segment(2) == 'area' || uri_segment(2) == 'role' || uri_segment(2) == 'socialmedia_sites')) ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Master Setup </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'city') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/city"> Manage City</a></li>
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'area') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/area">Manage  Area</a></li>
                        <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'role') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/role">Manage Role</a></li>
                        <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/user">Manage  User</a></li>
                        <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'socialmedia_sites') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/socialmedia_sites"><span class="title">  Social Media Links </span></a></li>
					</ul>
				</li>
                
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'vendor') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/vendor"><i class="icon-user icons"></i><span class="title"> Manage Vendors</span></a></li>
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'parents') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/parents"><i class="icon-user icons"></i><span class="title"> Manage Parents</span></a></li>
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'appointment') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/appointment"><i class="icon-user icons"></i><span class="title"> Appointment Schedule</span></a></li>                
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'admin_invoice') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/admin_invoice/listing"><i class="icon-user icons"></i><span class="title"> Manage Invoice</span></a></li>
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'admin_notice') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/admin_notice/listing"><i class="icon-user icons"></i><span class="title"> Manage Notice</span></a></li>
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'change_request') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/change_request"><i class="icon-user icons"></i><span class="title"> Vendor Change Request</span></a></li>
                <li class="<?php // (uri_segment(1) == 'admin' && uri_segment(2) == 'change_request') ? 'active' : '' ?>"><a href="#"><i class="icon-user icons"></i><span class="title"> Manage Ratings</span></a></li>
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'admin_testmonial') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/admin_testmonial"><i class="icon-user icons"></i><span class="title"> Manage Testimonial</span></a></li>
                <li class="<?php //(uri_segment(1) == 'admin' && uri_segment(2) == 'admin_testmonial') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/admin_testmonial"><i class="icon-user icons"></i><span class="title"> Chat</span></a></li>
                
                
                
                <!--hili class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage User </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/user/add"> <i class="fa fa-plus"></i>  Add User</a></li>
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/user"><i class="fa fa-eye"></i>  List Users</a></li>
					</ul>
				</li>
                
                <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'city') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage City </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/city/add"> <i class="fa fa-plus"></i>  Add City</a></li>
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/city"><i class="fa fa-eye"></i>  List City</a></li>
					</ul>
				</li>
			
			
				<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'area') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage Area </span><span class="arrow"></span></a>
						<ul class="sub-menu">
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/area/add"> <i class="fa fa-plus"></i>  Add Area</a></li>
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/area"><i class="fa fa-eye"></i>  List Area</a></li>
						</ul>
					</li>
				
				    <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'role') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage Role </span><span class="arrow"></span></a>
						<ul class="sub-menu">
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'role' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/role/add"> <i class="fa fa-plus"></i>  Add Role</a></li>
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'role' && uri_segment(3) != 'edit') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/role"><i class="fa fa-eye"></i>  List Role</a></li>
						</ul>
					</li>
					
				<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'socialmedia_sites') ? 'active' : '' ?>"><a href="<?php echo base_url();?>admin/socialmedia_sites"><i class="icon-social-facebook icons"></i><span class="title">  Social Media Links </span></a></li>-->
				<!--contact detail--->
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->