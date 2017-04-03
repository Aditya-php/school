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
                
                
                <li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == '') ? 'active' : '' ?>"><a href="<?php echo base_url();?>vendors"><i class="icon-home"></i><span class="title">  Dashboard</span></a></li>
				
              
			
               <!-- <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  My Profile </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/user/add"> <i class="fa fa-plus"></i>  Add User</a></li>
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/user"><i class="fa fa-eye"></i>  List Users</a></li>
					</ul>
				</li>-->
                
              <li  class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'kids') ? 'active' : '' ?>"><a href="<?php echo base_url();?>vendors/kids/listing"><i class="icon-user icons"></i><span class="title">  Manage Kids </span><span class="arrow"></span></a>
				</li>
			
			    <li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'invoice') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage Invoice </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'invoice' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>vendors/invoice/add"> <i class="fa fa-plus"></i>  Add Invoice</a></li>
						<li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'invoice' && uri_segment(3) != 'listing') ? 'active' : '' ?>"><a href="<?php echo base_url();?>vendors/invoice/listing"><i class="fa fa-eye"></i>  List Invoice</a></li>
					</ul>
				</li>
				
				

					<li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'notice_title') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage Notice </span><span class="arrow"></span></a>
						<ul class="sub-menu">
							<li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'notice_title' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php echo base_url();?>vendors/notice_title/add"> <i class="fa fa-plus"></i>  Add Notice</a></li>
							
							<li class="<?= (uri_segment(1) == 'vendors' && uri_segment(2) == 'notice_title' && uri_segment(3) != 'listing') ? 'active' : '' ?>"><a href="<?php echo base_url();?>vendors/notice_title/listing"><i class="fa fa-eye"></i>  List Notice</a></li>
						</ul>
					</li>
					

				<!--contact detail--->
                
				
                    <!--<li>
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title"> Manage Tickets</span>
					</a>
                    </li>
                    
                    
                     <li class=""><a href="javascript:;"><i class="icon-settings"></i><span class="title"> Master </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li>
							<a href=""> Manage Trade </a>
						</li>
						<li>
							<a href=""> Manage Trade Sub-Catagory </a>
						</li>
						<li>
							<a href=""> Manage Job Nature </a>
						</li>
						<li>
							<a href=""> Manage Degree of Difficulty</a>
						</li>
                      
					</ul>
				</li>
                 <li class="start  "><a href="index.php"><i class="fa fa-rupee"></i><span class="title"> Painting Cost Master </span></a></li>
                  <li class="start  "><a href="index.php"><i class="fa fa-file"></i><span class="title"> General Estimation </span></a></li>-->
			
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->