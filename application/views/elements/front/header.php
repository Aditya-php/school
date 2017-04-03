<!DOCTYPE html>

<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Credence child care</title>
	<script src="<?php echo base_url(); ?>assets/front/js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url().'frontend_assets/css/jquery.datetimepicker.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/front/bootstrap/css/bootstrap.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/front/bootstrap/css/bootstrap-theme.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/front/css/style.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/front/css/registercss.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/front/css/animate.css';?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/front/common.js'; ?>"></script>
	<script>
     $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/front/bootstrap/js/bootstrap.js"></script>
	 
	 

	</head>
	<body>
<nav class="navbar">
      <div class="top-header">
    <div class="container">
          <div id="navbar" class="collapse navbar-collapse">
        <?php 	$alldata = $this->session->all_userdata("userinfo");//pr($alldata); die;
	?>
        <?php 
	  if ($this->session->userdata('isLogin') === 'yes')
        { ?>
        <ul class="nav navbar-nav userpro navbar-right">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <span> <?php echo  ucwords($alldata['userinfo']->first_name);?> </span>
                <?php
				if(!empty($alldata['userinfo']->profile_image))
				{
				?>
                <img class="mypic" src="<?php echo base_url().'assets/upload_image/'.($alldata['userinfo']->profile_image);?>">
                <?php
				}
				else{
					?>
                <img class="mypic" src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" >
                <?php
			   } 
				?>
                </a>
            <ul class="dropdown-menu" style="display: none;">
                  <li><a href="<?php echo base_url().'parents/account/update_profile';?>">My Profile</a></li>
                  <li class="divider"></li>
                  <?php  if(isset($alldata['userinfo']->user_type) && !empty($alldata['userinfo']->user_type) && $alldata['userinfo']->user_type == '3')
			{
			?>
                  <li><a href="<?php echo base_url().'parents';?>">Go to Dashboard</a></li>
                  <li class="divider"></li>
                  <?php }	?>
                  <li><a href="#">My Account</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php  echo base_url(); ?>home/schedule_appintment"> Wishlist (<span id="wishlistCount">
                  <?php if($this->session->userdata("vendor_arr")){ echo count($this->session->userdata("vendor_arr")); } else{ echo "0"; } ?>
                  </span>) </a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url()."home/logout";?>">Logout</a></li>
                </ul>
          </li>
            </ul>
        <?php } else{ ?>
        <ul class="nav navbar-nav topnav-li navbar-right">
              <!--<li class="active loginus"><a href="#" data-toggle="modal" data-target="#loginmodel">Login &nbsp |</a></li>-->
              <li class="active loginus"><a href="#" data-toggle="modal" onclick="loginModal();">Login &nbsp |</a></li>
              <li><a href="#" data-toggle="modal"  onclick="signUp()">Sign Up</a></li>
            </ul>
        <?php } ?>
      </div>
        </div>
  </div>
      <div class="container">
    <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="<?php  echo base_url() ;?>"><img src="<?php echo base_url().'assets/front/images/logo1.png';?>"></a> </div>
    <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav childcare navbar-right">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="# ">About Us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="# ">Our Story</a></li>
        <li><a href="# ">Contact us</a></li>
      </ul>
        </div>
    <!--/.nav-collapse --> 
  </div>
    </nav>
</script>
<style>
.nav > li > a > img {
    max-width: none;
    width: 33px;
    border-radius: 50%;
    height: 33px;
}
</style>
