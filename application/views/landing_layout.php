<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type"/>
<title> <?=(@$title)? $title:"Directory ::"?>  </title>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>frontend_assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>frontend_assets/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>frontend_assets/css/owl.transitions.css">
<script>
  
	$(document).keydown(function(e)
	{
		var c = e.which;
		e.stopPropagation();
		//alert(c);// return false;
		if(c==13){
			e.preventDefault();
			$("#login-btn").trigger("click");
		}
    });
	
	
	$(document).on('click','#login-btn',function(){
    	
    	var postData	=	$("#loginForm").serialize();
    	var pass 		=	$("#password").val();
    	var username 	=	$("#username").val();
    	if(pass=='' && username=='')
    	{
			$('#error_login').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Username & Password</span>');
		    return;
		}else if(pass==''){
			$('#error_login').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Password</span>');
		    return;
		}
		else if(username==''){
			$('#error_login').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Username</span>');
		    return;
		}
    	$.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>auth/login",
                    data    :postData,
                    success: function(dat) {
                        dat = $.parseJSON(dat);
                        
                        if(dat['status'] == 'success')
                        {
                           window.location.href    ="<?=base_url()?>site/" ;
                        }else if(dat['status'] == 'error'){
							$('#error_login').html('<span style="color:red;padding-top:30px;" align="center">'+dat['error_msg']+'</span>');
		    				 setTimeout(function(){$('#error_login').html('');},7200);
		    				return;
						}
                    }
                
                
        });
    });
    
    $(document).on('click','#forget_btn',function(){
    	
    	var postData	=	$("#forgetForm").serialize();
    	var email 		=	$("#forgetEmail").val();
    	
    	if(email=='')
    	{
			$('#error_forget').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Email Address</span>');
		    return;
		}
		
    	$.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>auth/forget",
                    data    :postData,
                    success: function(dat) { //alert(dat);
                        dat = $.parseJSON(dat);
                        
                        if(dat['status'] == 'success')
                        {
                          $("#forgetEmail").val('');	
                          $('#error_forget').html('<span style="color:green;padding-top:30px;" align="center">'+dat['error_msg']+'</span>');
		    			   setTimeout(function(){$('#error_login').html('');},7200);
		    			   return;	
                        }else if(dat['status'] == 'error'){
							$('#error_forget').html('<span style="color:red;padding-top:30px;" align="center">'+dat['error_msg']+'</span>');
		    				 setTimeout(function(){$('#error_login').html('');},7200);
		    				return;
						}
                    }
                
                
        });
    });
    
     $(document).on('click','#reg_btn',function(){
    	
    	var postData	=	$("#regForm").serialize();
    	var username		=	$("#regUsername").val();
    	var firstName 		=	$("#regFirstName").val();
    	var lastName 		=	$("#regLastName").val();
    	var businessName	=	$("#regBusinessName").val();
    	var email 			=	$("#regEmail").val();
    	var password 		=	$("#regPassword").val();
    	var confirmPassword	=	$("#regConfirmPassword").val();
		$("#reg_btn").html("<i class='fa fa-spin fa-spinner'></i>&nbsp; processing.....");

    	$("#reg_btn").attr("disabled",true);
    	if(username == '' || username == null ||username == undefined)
    	{
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Username</span>');
			$("#reg_btn").attr("disabled",false);
			$("#reg_btn").html("submit");
		    return;
			
		}else if(lastName == '' || lastName == null ||lastName == undefined){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Last Name</span>');
		    $("#reg_btn").attr("disabled",false);
			$("#reg_btn").html("submit");
			return;
			
		}else if(businessName == '' || businessName == null ||businessName == undefined){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Business Name</span>');
		    $("#reg_btn").attr("disabled",false);
			$("#reg_btn").html("submit");
			return;
			
		}else if(email == '' || email == null ||email == undefined){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Email Address</span>');
		    $("#reg_btn").attr("disabled",false);
			$("#reg_btn").html("submit");
			return;
			
		}else if(!isValidEmailAddress(email)){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Valid Email Address</span>');
			$("#reg_btn").html("submit");
		    $("#reg_btn").attr("disabled",false);
			return;
			
		}
		else if(password == '' || password == null ||password == undefined){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Password</span>');
			$("#reg_btn").html("submit");
		    $("#reg_btn").attr("disabled",false);
			return;
			
		}else if(confirmPassword == '' || confirmPassword == null ||confirmPassword == undefined){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Confirm Password</span>');
		    $("#reg_btn").attr("disabled",false);
			$("#reg_btn").html("submit");
			return;
			
		}else if(password != confirmPassword){
			$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">Password and Confirm password must be same</span>');
            $("#reg_btn").attr("disabled",false);
			$("#reg_btn").html("submit");
			return;
		}
    	
    	
    	$.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>site/signup_service_provider",
                    data    :postData,
                    success: function(dat) { //alert(dat);
                        dat = $.parseJSON(dat);
                        
                        if(dat['status'] == 'success')
                        {
                          $("#reg_btn").html("submit");	
						  $("#reg_btn").attr("disabled",false);
    						$("#regUsername").val('');
    						$("#regFirstName").val('');
    						$("#regLastName").val('');
    						$("#regBusinessName").val('');
    						$("#regEmail").val('');
    						$("#regPassword").val('');
    						$("#regConfirmPassword").val('');
    						
                            $('#error_reg').html('<span style="color:green;padding-top:30px;" align="center">You have successfully registered  </span>');
		    			    setTimeout(function(){$('#error_reg').html('');},7200);
							
		    			    return;	
                        }else if(dat['status'] == 'error'){
							$("#reg_btn").html("submit");	
						  $("#reg_btn").attr("disabled",false);
							$('#error_reg').html('<span style="color:red;padding-top:30px;" align="center">'+dat['error_msg']+'</span>');
		    				 setTimeout(function(){$('#error_reg').html('');},7200);
		    				return;
						}
                    }
                
                
        });
    });
    
      $(document).on('click','#reg_btn1',function(){
    	
    	var postData	=	$("#regForm1").serialize();
    	var username		=	$("#regUsername1").val();
    	var firstName 		=	$("#regFirstName1").val();
    	var lastName 		=	$("#regLastName1").val();
    	var email 			=	$("#regEmail1").val();
    	var password 		=	$("#regPassword1").val();
    	var confirmPassword	=	$("#regConfirmPassword1").val();
    	$("#reg_btn1").html("<i class='fa fa-spin fa-spinner'></i>&nbsp; processing.....");
		$("#reg_btn1").attr("disabled",true);
    	if(username == '' || username == null ||username == undefined)
    	{
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Username</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
		}else if(lastName == '' || lastName == null ||lastName == undefined){
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Last Name</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
		}else if(email == '' || email == null ||email == undefined){
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Email Address</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
		}else if(!isValidEmailAddress(email)){
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Valid Email Address</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
		}
		else if(password == '' || password == null ||password == undefined){
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Password</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
		}else if(confirmPassword == '' || confirmPassword == null ||confirmPassword == undefined){
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Please Enter Confirm Password</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
		}else if(password != confirmPassword){
			$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">Password and Confirm password must be same</span>');
			$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
		    return;
			
		}
    	
    	
    	$.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>site/sign_up",
                    data    :postData,
                    success: function(dat) {
                        dat = $.parseJSON(dat);
                        
                        if(dat['status'] == 'success')
                        {
                          	$("#reg_btn1").html("submit");
		                    $("#reg_btn1").attr("disabled",false);
    						$("#regUsername1").val('');
    						$("#regFirstName1").val('');
    						$("#regLastName1").val('');
    						$("#regEmail1").val('');
    						$("#regPassword1").val('');
    						$("#regConfirmPassword1").val('');
    						$('#regServiceProvide1').attr('checked', false);	
                            $('#error_reg1').html('<span style="color:green;padding-top:30px;" align="center">You have successfully registered  </span>');
		    			    setTimeout(function(){$('#error_reg1').html('');},7200);
		    			    return;	
                        }else if(dat['status'] == 'error'){
							$("#reg_btn1").html("submit");
		    $("#reg_btn1").attr("disabled",false);
							$('#error_reg1').html('<span style="color:red;padding-top:30px;" align="center">'+dat['error_msg']+'</span>');
		    				 setTimeout(function(){$('#error_reg1').html('');},7200);
		    				return;
						}
                    }
                
                
        });
    });
	

// service id
 function popups1(val)
{
   // var service_id      = $('#business_2').attr('data-rel');
		$('#service_id').val(val);
}	
	
	
// function for feedback form	
	
	$(document).on('click','#fed_bck',function(){
    
    	var postData	=	$("#list_feedback").serialize();
    	var message1    =	$("#message").val();
		var ratings     = $('#ratings').val();
    	
    	
		if(ratings == '')
		{
			$('#error_fed').html('Please Give Rating And Feedback.');
			return;
		}
		
		if(message1 == '')
    	{
			$('#error_fed').html('Please Give Your Feedback');
			return;
		}
		
		//return false;
		//alert(postData); 
    	$.ajax({
                    type    :'POST',
                    url     :"<?=base_url()?>site/feedback/add",
                    data    :postData,
                    success: function(dat) {
                        dat = $.parseJSON(dat);
                        
                        if(dat['status'] == 'success')
                        {
                          	
    						$("#message").val('');
    						$('#error_fed').html('<span style="color:green;padding-top:30px;" align="center">Your Feedback successfully submitted </span>');
		    			    setTimeout(function(){$('#error_fed').html('');},7200);
							//location.reload();
		    			    return;	
                        }else if(dat['status'] == 'error'){
							$('#error_fed').html('<span style="color:red;padding-top:30px;" align="center">'+dat['error_msg']+'</span>');
		    				 setTimeout(function(){$('#error_fed').html('');},7200);
		    				return;
						}
                    }
                
                
        });
	});
  
</script>    	
</head>
<body>
<?php $this->load->view('elements/landing_header'); ?>

<?php $this->load->view($page);?>
<?php $this->load->view('elements/landing_footer'); ?>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/owl.carousel.min.js"></script>

</body>
</html>
