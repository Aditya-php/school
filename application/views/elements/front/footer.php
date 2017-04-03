<style>
 form.myforget-f:before{
	 display:none !important;
 }
  form.myforget-f:after{
	 display:none !important;
 }
.forget-div-leftside{
    float: none !important;
margin:0px auto;
width:50% !important; 	
}
.myforget-f{
width:70% !important;	
}
.forget-div-leftside{
width:90% !important	
}
.loader-btn{
	  float: left;   width: 54px;height: 60px;margin-top: -2px;  margin-right: 70px;  margin-top: -69px;  margin-left: -60px;
}
 


 


</style>

 
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p> Copyright	<?= date("Y") ?>  &copy;  C3.All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>



<div id="myModal" class="modal fade my-model-reg" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog"> 
    <!-- Modal content-->
	<?php //echo form_open(base_url().'home/sign_up',array('id'=>'login-form'));?>
  <div id="ajx_sign_response">
     <div id="success_sign_msg" ></div>
  </div>
  </div>
</div>
<div id="loginmodel" class="modal fade my-model-reg" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog"> 
  
    <!-- Modal content-->
    <form action="<?php //echo base_url().'home/login';?>"  method="post" id="login-form" >
	<input type="hidden" id="vendor_login_id" value="">
      <div class="popup_head">
        <button type="button" class="close" onclick="close_popup_all()" data-dismiss="modal">&times;</button>
        <div class="heading">Login</div>
		    <div id="error_msg" ></div>
      </div>
	   <div class="modal-centerside">
      <div class="left">
       	<input type="text" name="email" id="email" placeholder="Email" /><?php echo form_error('email') ;?>
		
        <input type="password" name="password" id="password" placeholder="Password"/><?php echo form_error('password') ;?>
		
        <label class="forgot-line">
		<!--<a href="" data-toggle="modal" data-target="#forgotmodel" onclick="forgotPwd()">Forgot Password ?</a>-->
		<a href="" data-toggle="modal"  onclick="forgotPwd()">Forgot Password ?</a>
		
		</label>
        <input type="submit" class="btn-block" value="LOGIN"  id = "login_btn" style="  background:#d77627; color:#fff;  font-family: 'Open Sans', sans-serif; font-size:17px"><div id="loader_login"> </div>
        <label class="term-condition">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            <span class="cr"><i class="cr-icon fa fa-check"></i></span> Don't have an account Yet? <a href="#" data-toggle="modal" class="signuppopup" onclick="signUp()"><span style="text-decoration:underline; color:#333">Sign up Now</span></a></label>
        </div>
        </label>
      </div>
       <div class="right"> <a href="#" class="facebook" onclick="fblogin()"> <span><i class="fa fa-facebook" aria-hidden="true"></i></span><span class="loginby">Login with facebook </span> </a> <br />
         <a href="#" class="google-plus" onclick="loginApi()"><span><i class="fa fa-google" aria-hidden="true"></i></span> <span class="loginby">Login with Google </span></a> <br />
        <a href="#" class="in" onclick="liAuth()"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span><span class="loginby">Login with Linkedin </span> </a> </div>
		</div>
    </form>	
	 
  </div>
</div>

<div id="forgotmodel" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  modal-sm"> 

    <!-- Modal content-->
    <form action="#" id="" method="post"  class="forgot-form myforget-f" >
      <div class="popup_head">
        <button type="button" class="close" onclick="close_popup_all()" data-dismiss="modal">&times;</button>
        <div class="heading">Forgot Password</div>
		    <div id="forgot_msg" ></div>
      </div>
	    <div class="modal-centerside">
      <div class="left forget-div-leftside">
	  <span>Enter Your e-mail address below to reset your password</span>
        <input type="email" name="email" id="email" placeholder="Email" /><?php echo form_error('email') ;?>
		
        <input type="submit" value="Submit"  id="forget_btn" class="btn-block"/><div id="loader_forget"> </div>
        
      </div>
		</div>
  		</form>
	 
  </div>
</div>

<style>
#email-error{
    color: red;
    font-size: 15px;
}

#password-error{
    color: red;
    font-size: 15px;
}
#error_msg{ 
   color: red;
margin-left: 37px;
}
#forgot_msg{
	
margin-left: 37px;
}





</style>



<script src="<?php echo base_url(); ?>assets/front/js/wow.min.js"></script> 

<script src="assets/front/bootstrap/js/bootstrap.js"></script> 

<script src="assets/front/js/wow.min.js"></script> 
<script src="<?php  echo base_url().'frontend_assets/js/jquery.datetimepicker.full.js';?>"></script> 
<script type="text/javascript">
 new WOW().init();
</script>
<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key: 819aolm553aj61
    onLoad: onLinkedInLoad
</script>
</body></html>

<script src="<?php echo base_url(); ?>assets/front/js/jquery.validate.js"></script>
<script>

function loginshow()
{
		$("#forgotmodel").modal('hide');
		$("#loginmodel").modal('show');
}
function loginModal()
{
		$("#loginmodel").modal('show');
		$("#forgotmodel").modal('hide');
   	
}
function signUpshow()
{
$("#loginmodel").modal('hide');	
$("#myModal").modal('show');
}
</script>
<script>
	function signUp()
	{
			     $.ajax({
					url:"<?php echo base_url('home/sign_ajax'); ?>",
					type: "POST",
					data: {},
					success: function(res) {
					$('#ajx_sign_response').html(res);
					$('#myModal').modal('show');
						}
					});
 
	}
	/*function submit_regs_form(){
		
		
	}*/
	
	function forgotPwd(){
		// alert();
		$("#loginmodel").modal('hide');
		$("#forgotmodel").modal('show');
         }
	
	</script>

<script>
function close_popup_all(){
	location.reload();
}
function signInshow()
{
//alert();	
$("#myModal").modal('hide');	
$("#loginmodel").modal('show');
$("#myModal").hide();	
$("#loginmodel").show();
}
$(document).ready(function() {

		$("#login-form").validate({
			
			rules: {
				
				email:{
					required: true,
					email: true
				},
			   password: {
					required: true,
					minlength: 5
					}
			},
			messages: {
				
				email: "Please enter a valid email address",
                password: {
					required: "Please provide a valid password",
					minlength: "Your password must be at least 5 characters long",
				}
            	
			},
            submitHandler: function(form) {
			 var formdata=$("#login-form").serialize();
			 
			 var vendor_id=$("#vendor_login_id").val();//alert(vendor_id);
               $.ajax({
          	         type: "POST",
                     url: '<?php echo base_url(); ?>'+'home/login',
                     data: formdata,
					 beforeSend : function(){
						    $("#login_btn").prop("disabled",true);  
                            $('#loader_login').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
                    },

                     success:function(response)
                	 {
					  //console.log(response); return false;
						$("#login_btn").prop("disabled",false);
                        $('#loader_login').html('');	
						var res=$.parseJSON(response);

					if(res.status == 'success')
					{
						// alert("Login Sucessfull!!");
						if(vendor_id!=''){
							document.location.href ='<?php echo base_url(); ?>'+'home/services/'+vendor_id; 
						}else{
						 location.reload();	
						}
						
					}else if(res.status == 'error'){
						// $("#error_msg").show();
						$("#error_msg").html(res.error_msg);
					}
					else{
						
					}	
                	
                     }
              });
          
			}		  
		});
});
</script>

<script>


$(document).ready(function() {
		
		$(".forgot-form").validate({
			
			rules: {
				
				email:{
					required: true,
					email: true
				},
				
			},
			messages: {
				
				email: "Please enter a valid email address",
                
            	
			},
            submitHandler: function(form) {
			 var formdata=$(".forgot-form").serialize();
               $.ajax({
          	         type: "POST",
                     url: '<?php echo base_url(); ?>'+'home/forget',
                     data: formdata,
					 		 beforeSend : function(){
						    $("#forget_btn").prop("disabled",true);  
                            $('#loader_forget').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
                    },

                     success:function(response)
                	 {
				$("#forget_btn").prop("disabled",false);
                        $('#loader_forget').html('');
					var res=$.parseJSON(response);
						
					if(res.valid)
					{
					
					 $("#forgot_msg").html("Mail has been sent to your registered email address,please check");
					  $("#forgot_msg").css('color','green');
                       setTimeout(function() 
					  { 
					  location.reload();
					  }, 5000);
				     }
					else{
		           	$("#forgot_msg").html(res.error_msg);
					$("#forgot_msg").css('color','red');
					}	
					
					}
					 
              });
          
			}		  
		});
});
</script>


 	<script>
function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
        } else if (response.status === 'not_authorized') {
        } else {
        }
    }

    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }
 function fblogin()
    {
        checkLoginState();
        FB.login(function (response) {
            if (response.authResponse) {
                FB.api('/me', {fields: 'id,first_name,last_name,email,gender'},function (response) {
					fbook =  response.id;
						console.log(response); 
					 // console.log(JSON.stringify(response),fbook);
					console.log(response.first_name,response.gender,response.email);
					$.ajax({
					type : 'POST',
					data : {first_name:response.first_name,last_name:response.last_name,gender:response.gender,email:response.email}, //all data 
					url : '<?php echo base_url("home/fb_login_front");?>',
                    success: function (resdata) {
                       var response=$.parseJSON(resdata);
					   console.log(response);
                       if(response.status=="error"){
                    alert('Your account has been inactive,please contact to admin..!!');
                            // if(response.error_msg != 'undefined')
                            // {
                               // alert('undefined');
                            // }
                       }
                       else if(response.status=="success"){
                          // window.location.href = response.link;
						  location.reload();
						 // alert('user login successfully');
                       }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
				});
			 });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        }, { scope: 'email' });
    }
//localhost  : 170731233422186
//server : 1694332397524781 
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1694332397524781',
            xfbml: true,
            version: 'v2.4'
        });

        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                console.log(response.authResponse.accessToken);
            }
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>

function loginApi() 
{
  var myParams = {
    'clientid' : '879415586724-7b20asnil6dl2mpqg2qtrt6n5n8dur5u.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'loginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}
 
function loginCallback(result)
{
    if(result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (resp)
        {
//console.log(resp['name'].familyName);return false;           
		   var email = '';
            if(resp['emails'])
            {
                for(i = 0; i < resp['emails'].length; i++)
                {
                    if(resp['emails'][i]['type'] == 'account')
                    {
                        email = resp['emails'][i]['value'];
                    }
                }
            }
 
 
			
				$.ajax({
					type : 'POST',
					data : {first_name:resp['name'].givenName,last_name:resp['name'].familyName,email:email}, //all data 
					url : '<?php echo base_url("home/gp_login_front");?>',
                    success: function (resdata) {
						console.log(resdata);//return false;
                       var response=$.parseJSON(resdata);
					   
                      if(response.status=="error"){
                          alert('Your account has been inactive,please contact to admin..!!');
                            // if(response.error_msg != 'undefined')
                            // {
                               // alert('undefined');
                            // }
                       }
                       else if(response.status=="success"){
                          // window.location.href = response.link;
						  location.reload();
						 // alert('user login successfully');
                       }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
				});
			
            document.getElementById("profile").innerHTML = str;
			
        });
 
    }
 
}
function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyBlpxiFzHccwkUbkgk0sH1jRPQrnoYHa2U');
    gapi.client.load('plus', 'v1',function(){});
}
 
    </script>
 
<script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
</script>
<script>


/* $(document).ready(function() {
		
		$("#vendorForm").validate({
			
			rules: {
				
				v_city:{
					required: true,
				},
			   v_area_id: {
					required: true,
			   },
			   v_service_id: {
					required: true,
			   }
			},
			messages: {
            	
			},
            submitHandler: function(form) {
			 var formdata=$("#vendorForm").serialize();
               $.ajax({
          	         type: "GET",
                     url: '<?php echo base_url(); ?>'+'home/search',
                     data: formdata,

                     success:function(response)
                	 {	
						return true;
                     }
              });
          
			}		  
		});
}); */
</script>


 <script type="text/javascript">
	$(document).ready(function(){
	   var time_arr=[];
	   var now     = new Date(); 
       var curr_hour=parseInt(now.getHours())+1;
       for(i=curr_hour;i<=24;){
            if(i!=24){
               new_str= (Number.isInteger(i)) ? (i+":00") : (i-parseFloat(0.5)+":30"); 
            }
            else{
               new_str= (i-parseInt(1)+":59"); 
            }
          time_arr.push(new_str);
          i=i+parseFloat(0.5);
       }
		setTimeout(function(){
		$(".mysqldate").each(function(){
			$(this).trigger('click');
		});
	});
		$(".mysqldate").click(function(){
			var text = $(this).parent().next().find('input');
			var th = $(this);
			if( $(this).hasClass('hasDatepicker') === false )  {
				$(this).datetimepicker({
					minDate : new Date(),
                    minDateTime: new Date(),
                    //minTime: new Date(),                    
					allowTimes: [
					  '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30',
					  '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30', '08:00', '08:30',
					  '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
					  '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30',
					  '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00',
					  '21:30', '22:00', '22:30', '23:00', '23:30', '23:59'
					 ],
					 onSelectTime: function (collectionDateSelected) {
						var selid=th.attr('id');
						var seldate=th.attr('value');
						var currentdate = new Date();
						//var cuurdatetime =currentdate.getFullYear()+"/"+(currentdate.getMonth()+1)+"/"+currentdate.getDate()+" "+(currentdate.getHours())+":"+currentdate.getMinutes();
						//alert(seldate);
						text.attr('value',seldate);
						
					 }
				});
			}
		});
	});
  
</script>
	
<script>
$(document).ready(function(){
	/* var count = 0;
    $(".check-box").click(function(){ alert()
		alert($(this).parent().next().children().attr('class'));
		if($(this).is(':checked')){
				count++;
				$(this).parent().next().children().find('input').each(function(){
					$(this).prop('disabled',false);
			});
		}
		else{
			count = count-1;
			$(this).parent().next().children().find('input').each(function(){
				$(this).prop('disabled',true);
			});
		}		
		if(count <= 3){
			$(this).parent().next().children().toggle('slow');
		}
		else{
			count = count-1;
			alert("Do not appointment vendor more than three.");
			return false;
		}
    }); */
});
</script>
 <script>
 $(document).ready(function(){
    $('input[name="radio-btn"]').wrap('<div class="radio-btn"><i></i></div>');
	$(".radio-btn").on('click', function () {
		var _this = $(this),
			block = _this.parent().parent();
		block.find('input:radio').attr('checked', false);
		block.find(".radio-btn").removeClass('checkedRadio');
		_this.addClass('checkedRadio');
		_this.find('input:radio').attr('checked', true);
	});
	
	$('input[type="checkbox"]').wrap('<div class="check-box"><i></i></div>');
	$.fn.toggleCheckbox = function () {
		this.attr('checked', !this.attr('checked'));
	}
	var count = 0;
	$('.check-box').on('click', function () { 
		$(this).find(':checkbox').toggleCheckbox();
		
		if($(this).find(':checkbox').is(':checked')){ 
			count++;
			$(this).parent().next().children().find('input').each(function(){
				if($(this).attr('name') == 'datetime[]'){
					$(this).addClass('requiredTime');
				}
				$(this).prop('disabled',false);
				
			});
		}
		else{
			count = count-1;
			$(this).parent().next().children().find('input').each(function(){
				if($(this).attr('name') == 'datetime[]'){
					$(this).removeClass('requiredTime');
				}
				$(this).prop('disabled',true);
			});
		}
		
		if(count <= 3){ 
			$(this).toggleClass('checkedBox');
			$(this).parent().next().children().toggle('slow');
		}
		else{
			$(this).find(':checkbox').toggleCheckbox();
			
			alert("Do not appointment vendor more than three.");
			$(this).toggleClass('checkedBox',false);
			count = count-1;
			return false;
		}
		
	});
});
$(document).ready(function(){
    $(".signuppopup").click(function(){
       $("#loginmodel").hide();
    }); 
	 
});	


$(document).ready(function(){
	$(".cr-icon").css('display','none');
    $(".cr").click(function(){
	   $(".cr-icon").toggle();
    }); 
	 
});
</script>

<script type="text/javascript">
/*=======================Login with Linkdin Javascript start==================================*/ 
    function liAuth(){
        IN.User.authorize(function(){
        });
    }
    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }

    // Handle the successful return from the API call
    function onSuccess(data) {
        console.log(data);
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }

    // Use the API call wrapper to request the member's basic profile data
    function getProfileData() {
        IN.API.Profile("me").fields("id","first-name", "last-name", "email-address").result(displayProfiles);
    }
    function displayProfiles(profiles) {
    member = profiles.values[0];
   if(member!=''){
      $.ajax({
					type : 'POST',
					data : {first_name:member.firstName,last_name:member.lastName,email:member.emailAddress}, //all data 
					url : '<?php echo base_url("home/linkdin_login");?>',
                    success: function (resdata) {
						console.log(resdata);//return false;
                       var response=$.parseJSON(resdata);
					   
                      if(response.status=="error"){
                          alert('Your account has been inactive,please contact to admin..!!');
                            // if(response.error_msg != 'undefined')
                            // {
                               // alert('undefined');
                            // }
                       }
                       else if(response.status=="success"){
                          // window.location.href = response.link;
						  location.reload();
						 // alert('user login successfully');
                       }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
		});
        }
      
   }
/*=======================Login with Linkdin Javascript close==================================*/ 
</script>


