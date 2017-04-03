<?php
$username	=	'';
$password	=	'';
$remember	=	'';
if(get_cookie('username',FALSE)!=NULL)
{
	$username	=	get_cookie('username',FALSE);
}

if(get_cookie('password',FALSE)!=NULL)
{
	$password	=	get_cookie('password',FALSE);
}

if(get_cookie('username',FALSE)!=NULL)
{
	$remember	=	get_cookie('remember',FALSE);
}
	
$username_decr	=	custom_encryption($username,'ak!@#s$on!','decrypt');
$password_decr	=	custom_encryption($password,'ak!@#s$on!','decrypt');

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?= (@$title)?@$title:"LMS" ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.png"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?=SITE_PATH?>admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=SITE_PATH?>global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=SITE_PATH?>admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=SITE_PATH?>admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?php echo site_url();  ?>">
	<img src="<?=SITE_PATH?>admin/layout4/img/logo-light.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content content-2">
	<!-- BEGIN LOGIN FORM -->
	<?php echo form_open('auth/superadmin_login',array('class'=>'login-form'));?>
	<h3 class="form-title"><?php echo $this->lang->line('sign_in');  ?></h3>
	<?php 	
	if(@$this->session->flashdata('error') != '' && @$show != "forget"){
		echo '<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> '.$this->session->flashdata("error").'</div>';
	}else if(@$this->session->flashdata('success') != ''){
		echo '<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>'.$this->session->flashdata("success").'</div>';	
	}else{ ?>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
		<span><?php echo $this->lang->line('enter_username_and_password');  ?></span>
	</div>
	<?php } ?>
        
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('username');  ?></label>
		<input   id="username" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?php if($remember && $username_decr!=''){echo $username_decr;}?>"/>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('password');  ?></label>
		<input  id="password"     class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo $this->lang->line('password');  ?>" name="password" value="<?php if($remember && $password_decr!=''){echo $password_decr;}?>"/>
		<input type="hidden" name="login_type" value="spadmin">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success uppercase"><?php echo $this->lang->line('login');  ?></button>
		<label class="rememberme check">
		<input   id="remember"    type="checkbox" name="remember" value="1" <?php if($remember){echo "checked";}?>/><?php echo $this->lang->line('remember');  ?> </label>
		<a href="javascript:;" class="forget-password" id="forget-password"><?php echo $this->lang->line('forgot_password');  ?>?</a>
	</div>
	
	<?php echo form_close();?>
	
    <!-- END LOGIN FORM -->
    
    <!-- BEGIN FORGOT PASSWORD FORM -->
	<?=form_open('auth/forget', array('id' => '','class' => 'form-vertical forget-form'));?>
	<?php
		 $getcaptcha			=	getcaptchacode();
		 $session_datacaptcha	=	$this->session->userdata('codecaptcha');
    ?>
	<h3 class="form-title"><?php echo $this->lang->line('request_new_password');  ?></h3>
	<?php
		if(@$this->session->flashdata('error') !== '' && $show === 'forget'){
			echo '<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> '.$this->session->flashdata("error").'</div>';
		}
	?>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
		<span><?php echo $this->lang->line('enter_your_email_address');  ?></span>
	</div> 
	<p class="rememberme check"><?php echo $this->lang->line('enter_your_email_address_below');  ?></p>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('email_address');  ?></label>
		<input class="form-control " type="email"  placeholder="E-mail Address" name="email" />
	</div>
	<div class="form-group">
		<p class="rememberme check">Captcha</p>
		<div class="controls">
			<input type="text" class="form-control captcha m-wrap span7" name="captcha" id="captcha" style="float:left;"/>
			<input type="hidden" id="session_datacaptcha" name="session_datacaptcha" value="<?=$session_datacaptcha;?>" />         
			<div class="span1 pull">&nbsp;</div>
			<div class="span4" id="capImgHeader">
				<?=$getcaptcha['image']?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:refreshCaptcha(1);"><i class="icon-refresh"></i></a>
			</div>
			<span id="error_captcha" style="color: red;"></span>
		</div>
	</div>
		   
	<div class="control-group">
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success uppercase">
		<?php echo $this->lang->line('request_new_password');  ?> <i class="m-icon-swapright m-icon-white"></i>
		</button>
		<a href="javascript:;" class="forget-password" id="back-btn" >
		<?php echo $this->lang->line('return_to_login');  ?>
		</a>          
	</div>
	<?=form_close()?>
	<!-- END FORGOT PASSWORD FORM -->
	
</div>

<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=SITE_PATH?>global/plugins/respond.min.js"></script>
<script src="<?=SITE_PATH?>global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=SITE_PATH?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=SITE_PATH?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=SITE_PATH?>global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>admin/pages/scripts/login.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});


function refreshCaptcha(comingFrm)
{
  $.ajax({
			type : 'get',
			url : "<?=base_url()?>auth/refreshCaptcha",	//set url for sent request for generate captcha image
			async : false,
			data : '',
			success : function(res, status){ 
				if(res)
				{
					var obj = eval('('+res+')');
					
					if(parseInt(comingFrm) === 1)//for header
					{
						$('#session_datacaptcha').val(obj.word);	//set Captcha word
						$('#capImgHeader').html(obj.image+'&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:refreshCaptcha(1);"><i class="icon-refresh"></i></a>');	// set captcha image
					}
				}
			}
		});	
}
</script>
<script>
<?php
  if($show === "forget")
  {
 ?>
 jQuery('.login-form').hide();
 jQuery('.forget-form').show();
 <?php 	
  }else{
  ?>
  <?php	
  jQuery('.login-form').show();
 jQuery('.forget-form').hide();
  }
?>	
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>