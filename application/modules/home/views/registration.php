<style>
.error{
	color: red !important;
	font-size:15px !important;
}
 form:before{
	 display:none;
 }
  form:after{
	 display:none;
 }

 .center-or:before {
    content: 'or';
    color: #b1b1b1;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    height: 1.2em;
    width: 1.5em;
    left: -10px;
    top: -3.8em;
    z-index: 900;
    background: #fff;
    text-transform: uppercase;
    font-weight: bold;
 
    padding-bottom: 16px;
}
.center-or:after {
     content: '';
    position: absolute;
    background: rgba(128, 128, 128, 0.3);
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    height: 74%;
    width: 1px;
    left: -0.85em;
    top: -25.8em;
    -moz-box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
    -webkit-box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
    box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
}
.rightsocial-div{
margin-top:130px	
}
.loader-btn{
	  float: left;   width: 54px;height: 60px;margin-top: -2px;  margin-right: 70px;  margin-top: -69px;  margin-left: -60px;
}
</style>
	<style>

	
		</style>
       <?php
        if ($this->session->flashdata('account_create')) {
            ?>
            <div class="alert bg-success display-show" id="success">
                <button class="close" data-close="alert"></button>
                <span>
                    <?php
                    echo $this->session->flashdata('account_create');
                    ?> 
                </span>
            </div>

<?php } ?>
<form action="<?php echo base_url().'home/sign_up';?>" id="signUp-form" method="post" action="">
<div class="center-or">
 
      <div class="popup_head">
        <button type="button" class="close" onclick="close_popup_all()" data-dismiss="modal">&times;</button>
        <div class="heading">SIGN UP</div>
        <div class="text-center">
          <label style="font-family: 'Open Sans', sans-serif; font-weight: bold;">Already Registered ? <a href="#" class="close_signin" onclick="signInshow()">Sign in</a></label>
		    <div id="error_msg_signUp" ></div>
        </div>
      </div>
	   <div class="modal-centerside">
      <div class="left">
        <input type="text" name="first_name" id="first_name" placeholder="First Name"  value="<?php echo set_value('first_name'); ?>"/>
		<span><?php echo form_error('first_name') ;?></span>
		
        <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>"/>
		<span><?php echo form_error('last_name') ;?></span>
		
		<input type="text" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" />
		<span><?php echo form_error('email') ;?></span>
		
        <input type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
		<span><?php echo form_error('password') ;?></span>
		
       <input type="text" name="contact_number" id="contact_number" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" placeholder="Mobile No." value="<?php echo set_value('contact_number'); ?>"/>
	   	<span><?php echo form_error('contact_number') ;?></span>
		
        <label for="email">Location</label>
       

<div class="row">
<div class="col-md-6">
<select name="city_id" id="city" onchange="find_area(this.value)" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
<option value="">Select city</option>
<?php if(isset($city_list) && !empty($city_list)){ ?>
<?php 
foreach($city_list as $val)
{ ?>
<option  value="<?php echo $val->id; ?>" <?php echo  set_select('city_id',$val->id);?> ><?php echo $val->city_name; ?></option>
<?php 
}														?>
<?php }else{ ?> 
<option value="">No city </option>
<?php  } ?>
</select>
</div>

<?php echo form_error('city_id');?>	

<!-----------------area----------------------------->
<div class="col-md-6">
<select name="area_id" class="pull-right"  id="area" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
<option value="">Select</option>
</select>
<?php echo form_error('area_id');?>	
</div>
</div>
        <input type="text" name="address" id="address" placeholder="Address"  value="<?php echo set_value('address'); ?>"/>
		<span><?php echo form_error('address') ;?></span>
        
        <!--        <select>
            <option value="" disabled selected>Select your option</option>
            <option value="hurr">Durr</option>
		</select>-->
         <input type="submit" id="signUp_btn"  class="btn-block" value="Sign up"/>
		 <div id="loader_signup"> </div>



        <label class="term-condition">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="1" name="term" id="term">
            <span class="cr"><i class="cr-icon fa fa-check"></i></span> I agree to the <a href="">Term & Conditions</a> and <a href="">Privacy Policy </a> </label>
			<?php echo form_error('term');?>
        </div>
        </label>
      </div>
      <div class="right rightsocial-div"> <a href="#" class="facebook" onclick="fblogin()"> <span><i class="fa fa-facebook" aria-hidden="true"></i></span><span class="loginby">Login with facebook </span></a> <br />
        <a href="#" class="google-plus" onclick="loginApi()"><span><i class="fa fa-google" aria-hidden="true"></i></span> <span class="loginby">Login with Google </span></a> <br />
        <a href="#" class="in" onclick="liAuth()"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span> <span class="loginby">Login with Linkedin </span></a> </div>
		</div>
	</div>	
    </form>
	
	<style>
	.error{
		color:red;
	}
		</style>
		
<script>

</script>
<script type="text/javascript">
function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
</script>
<script>
$(document).ready(function() {  
 var cityid=$("#city").val();
 if(cityid!='')
 {
		find_area(cityid);
 }
});  
function find_area(city_id){
	if(city_id!='')
	{
		url = '<?php echo base_url() ;?>'+'home/find_area_list';			  
		$.post(url,{id:city_id},function (e){
		$("#area").html(e);                        
		}); 
	}
}


</script>

<script>


$(document).ready(function() {
				// alert("url  ="+window.location.href);
				// alert("Url  ="+document.location);
// alert("PathName  ="+ window.location.pathname);
		$("#signUp-form").validate({

			rules: {
				first_name:{
					required: true,
				},
				last_name:{
					required: true,
				},
				contact_number:{
					required: true,
					maxlength: 10,
					minlength: 10
				},
				city_id:{
					required: true,
				},
				area_id:{
					required: true,
				},
				status:{
					required: true,
				},
				address:{
					required: true,
				},
				term:{
					required: true,
				},
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
				
			
				first_name: "Please enter a First Name",
				last_name: "Please enter a Last Name",
				contact_number:{
  					required: "Please enter a Mobile Number",
					maxlength: "Your mobile number required minimum 10 characters long",
					minlength: "Your mobile number required maximum 10 characters long",
				},
				city_id:{
  					required: "Please enter a City",
				},
				area_id:{
  					required: "Please enter a Area",
				},
				status:{
  					required: "Please enter a Status",
				},
				address:{
  					required: "Please enter a Address",
				},
				term:{
					required: "Please select a Term & COndition",
				},
				email: "Please enter a valid email address",
                password: {
					required: "Please provide a valid password",
					minlength: "Your password must be at least 5 characters long",
				}

			},
            submitHandler: function(form) {
			 var formdata=$("#signUp-form").serialize();
             $.ajax({
          	         type: "POST",
                     url: '<?php echo base_url(); ?>'+'home/sign_up',
                     data: formdata,
					 beforeSend : function(){
						    $("#signUp_btn").prop("disabled",true);  
                            $('#loader_signup').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
                    },
                     success:function(response)
                	 {
						
						 $("#signUp_btn").prop("disabled",false);
                         $('#loader_signup').html('');	
						  if(response == '1') //means user registered and redirect to panel
					      {
    							 var curr_url=window.location.pathname;
    						     var srch = curr_url.indexOf("search");
    							 if(srch=='-1'){
    								document.location.href ='<?php echo base_url(); ?>'+'parents'; 
    							 }	
    							 else{
    								document.location.href =curr_url;  
    							 }
							
                          }
                          else if(response == 'error'){  //means user is not entered in database
        						alert("Some database error,please try again!!"); 
        				  }
                          else{  //some form validation error occur
                             $("#ajx_sign_response").html('');
                             $("#ajx_sign_response").html(response);
                             $("#myModal").modal('show');
                          }
					 
                     }
             });
          
			}
				  
		});
});
			

			</script>

 
<!-- 
879415586724-7b20asnil6dl2mpqg2qtrt6n5n8dur5u.apps.googleusercontent.com
gqUzxMvSp-mD60jfpC71q65T
localhost :790451260628-p1dm2b824utj1tdlq6q5624te1i2mf4k.apps.googleusercontent.com
     server :879415586724-m9470n26pr51r3tql04btmfqe1bk8f4k.apps.googleusercontent.com -->
 