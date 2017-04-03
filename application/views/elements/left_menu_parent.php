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
                
                
                <li class="start <?= (uri_segment(1) == 'parents' && uri_segment(2) == '') ? 'active' : '' ?>"><a href="<?php echo base_url();?>parents"><i class="icon-home"></i><span class="title">  Dashboard</span></a></li>
				
              
			
             
                
               <!-- <li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'city') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage Ratings </span><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/city/add"> <i class="fa fa-plus"></i>  Add City</a></li>
						<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php //	echo base_url();?>admin/city"><i class="fa fa-eye"></i>  List City</a></li>
					</ul>
				</li>-->
			
			
				<!--<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'area') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title">  Manage Payment </span><span class="arrow"></span></a>
						<ul class="sub-menu">
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/area/add"> <i class="fa fa-plus"></i>  Add Area</a></li>
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/area"><i class="fa fa-eye"></i>  List Area</a></li>
						</ul>
					</li>
							-->
				<!--<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'area') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title"> Chat </span><span class="arrow"></span></a>
									<ul class="sub-menu">
										<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) == 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/area/add"> <i class="fa fa-plus"></i>  Add Area</a></li>
							<li class="<?= (uri_segment(1) == 'admin' && uri_segment(2) == 'user' && uri_segment(3) != 'add') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>admin/area"><i class="fa fa-eye"></i>  List Area</a></li>
						</ul>
					</li>
					-->
				<li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'kids') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title"> Manage kids </span><span class="arrow"></span></a>
				<ul class="sub-menu">
				<li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'kids' && uri_segment(3) == '') ? 'active' : '' ?>"><a href="<?php echo base_url();?>parents/kids"> <i class="fa fa-plus"></i>  Add Kids</a></li>
				<li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'kids' && uri_segment(3) != 'kid_listing') ? 'active' : '' ?>"><a href="<?php echo base_url();?>parents/kids/kid_listing"><i class="fa fa-eye"></i>  List Kids</a></li>
						</ul>
					</li>
					
					<!--<li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'testmonial') ? 'active' : '' ?>"><a href="javascript:;"><i class="icon-user icons"></i><span class="title"> Testimonial </span><span class="arrow"></span></a>
									<ul class="sub-menu">
										<li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'testmonial' && uri_segment(3) == '') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>parents/testmonial"> <i class="fa fa-plus"></i>  Add Testimonial</a></li>
							<li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'testmonial' && uri_segment(3) != 'listing') ? 'active' : '' ?>"><a href="<?php //echo base_url();?>parents/testmonial/listing"><i class="fa fa-eye"></i>  List Testimonial</a></li>
						</ul>
					</li>-->
			 <li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'new_appointment_list') ? 'active' : '' ?>"><a href="<?php echo base_url();?>parents/new_appointment_list"><i class="icon-user icons"></i><span class="title">  My Appointment</span></a></li>		
				
			 <li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'testmonial') ? 'active' : '' ?>"><a href="<?php echo base_url();?>parents/testmonial"><i class="icon-user icons"></i><span class="title"> Testimonial</span></a></li>
			 
				  <li class="<?= (uri_segment(1) == 'parents' && uri_segment(2) == 'parents_invoice' && uri_segment(3) != '') ? 'active' : '' ?>"><a href="<?php echo base_url();?>parents/parents_invoice/listing"><i class="icon-user icons"></i><span class="title"> Manage Payments</span></a></li>
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