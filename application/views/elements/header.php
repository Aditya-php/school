<title> <?= $title ?> </title>
<script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link href="<?= base_url() ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>assets/admin/layout/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?= base_url() ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url() ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link href="<?= base_url() ?>assets/global/plugins/select2/select2.css"/>
<link href="<?= base_url() ?>assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
<link href="<?= base_url() ?>assets/global/css/fancySelect.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL PLUGINS -->
 


<link href="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>

<link href="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"/>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/pages/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/pages/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/common_functions.js"></script>

 



<style>  input[type=checkbox] {
    margin: 0px 0px 0px 0px !important;
}</style>
<script> 
	var site_url	=	"<?php echo base_url();?>";
	//alert(site_url);

	</script>
<link rel="shortcut icon" href="favicon.ico"/>

<div class="page-header navbar">

    <div class="page-header-inner">

        <div class="page-logo">
            <div class="menu-toggler sidebar-toggler">

            </div>
            <a href="#">
                <img src="<?= base_url() ?>assets/front/images/logo.png" alt="Repairwala" style="width:105px;" class="logo-default img-responsive"/>

            </a>
<?php 	$alldata = $this->session->all_userdata("userinfo");//pr($alldata); die;
// pr($alldata['userinfo']->user_type);?>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>

        <div class="page-top">
	 <?php 
			 
	  if ($this->session->userdata('isLogin') === 'yes')
        { 
	 ?> 
	
	   
	
            <div class="top-menu">
		
	
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide">
                    </li>

                 
					<?php 
					$alldata = (($this->session->all_userdata("userinfo") && !empty($this->session->all_userdata("userinfo"))) ? $this->session->all_userdata("userinfo") : "");
					if(isset($alldata) && !empty($alldata)){ ?>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						    <?php 
							     @$data1['admin_image'] = admin_profile_image(currentuserinfo()->id);
								 
								$pimg = "";
								if(@$data1['admin_image']!='' && file_exists('assets/upload_image/'.$data1['admin_image']))
								{
									$pimg     = base_url()."assets/upload_image/".''.@$data1['admin_image'];
								}else
								{
									$pimg	  = base_url()."assets/admin/layout/img/".'avatar1.jpg';
								}
							?>
						
                            <span class="username username-hide-on-mobile">
							<?= ucwords($alldata['userinfo']->first_name); ?></span>
							<img alt="" class="img-circle"  style="height:40px; max-height:40px; max-width:40px;" src="<?= $pimg ;?>"/>	
							
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
<?php 	 

$usertype = ((($alldata['userinfo']->user_type) && !empty($alldata['userinfo']->user_type)) ? $alldata['userinfo']->user_type : "") ;
?>
	  	  <?php 
		  $controller_name='admin';
		  if($usertype == '3'){
			  $controller_name='parents';
			  
		  }  if($usertype == '2'){
			  $controller_name='admin';
			  
		  }else if($usertype == '4'){
			   $controller_name='vendors';
			   $vendorID  = (ID_encode($alldata['userinfo']->id)) ? ID_encode($alldata['userinfo']->id) : "" ;
		  }
		  ?>
		
	                <li>
						<?php if($usertype == '4')
						{?>
					<a href="<?php echo base_url().$controller_name;?>/account/update_profile/<?php echo $vendorID; ?>">					
							<i class="icon-user icons"></i> My Profile
						</a>
						<?php }else {
							?>
							<a href="<?php echo base_url().$controller_name;?>/account/update_profile"><i class="icon-user icons"></i> My Profile 
						</a>
							<?php
						} ?>
					</li>
				     <?php 
					 if(isset($alldata['userinfo']->user_type) && !empty($alldata['userinfo']->user_type) && $alldata['userinfo']->user_type == '3')
						{
					    ?>
		              <li>
						 <a href="<?php echo base_url();?>">	
							<i class="icon-user icons"></i> Go to Home
						</a>
					  </li>
			         <?php }?>
							<li>
                                <a href="<?php echo base_url().$controller_name.'/account/resetpassword'?>">
                                    <i class="icon-lock-open icons"></i> Reset Password
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>auth/logout"><i class="icon-logout icons"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
					<?php } ?>


                </ul>
		
            </div>
<?php } ?>
        </div>
     </div>

</div>
