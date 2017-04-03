<?php
$email	=	'';
$password	=	'';
$remember	=	'';
if(get_cookie('email',FALSE)!=NULL)
{
	$email	=	get_cookie('email',FALSE);
}

if(get_cookie('password',FALSE)!=NULL)
{
	$password	=	get_cookie('password',FALSE);
}

if(get_cookie('email',FALSE)!=NULL)
{
	$remember	=	get_cookie('remember',FALSE);
}
	
$email_decr	=	custom_encryption($email,'ak!@#s$on!','decrypt');
$password_decr	=	custom_encryption($password,'ak!@#s$on!','decrypt');


?>



<form action="<?= base_url() ?>admin/auth/login" method="post" accept-charset="utf-8" class="login-form">
    <h3 class="form-title"></h3>
    <?php 	
	if(@$this->session->flashdata('error') != '' && @$show != "forget"){
            echo '<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> '.$this->session->flashdata("error").'</div>';
	}else if(@$this->session->flashdata('success') != ''){
            echo '<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>'.$this->session->flashdata("success").'</div>';	
	}else{ ?>
	<div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Enter email and password</span>
	</div>
	<?php } ?>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email </label>
        <input   id="email" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="<?php if($remember && $email_decr!=''){echo $email_decr;}?>"/>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input  id="password"     class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="<?php if($remember && $password_decr!=''){echo $password_decr;}?>" /><i onclick="show_password()" class="fa fa-eye show-passwords"></i> 
     	 <a href="<?= base_url() ?>admin/auth/forget" class="forget-password"  style="margin-right: 82px;"> Forget your Password ? </a>
    </div>
	<br><br>
    <div class="form-group">
        <label class="rememberme check" style="    margin-left: 14px;
    margin-top: -5px;">
            <input type="checkbox" class="checkboxes group-checkable fcy_checkbox" <?php if($remember){echo "checked";}?> name="remember" id="remember" value="1">  &nbsp; Remember Me
            <address class="checkbox"><span class="highlight"></span></address>
        </label>
     
    </div>
<center><button type="submit" class="btn btn-success uppercase" style="width: 213px;     margin-top: -63px;">Login</button></center>
</form>	

<script>

	function show_password(){
		// alert($("#password").attr('type'));
		var field_type=$("#password").attr('type');
		if(field_type=='password'){
		$("#password").prop('type','text');
		}else{
		 $("#password").prop('type','password');	
		}	
	}

// 
</script>

<style>
.show-passwords{
    float: right;
    right: 7px;
    margin-right: 11px;
    margin-top: -29px;
}
</style>