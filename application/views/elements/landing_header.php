<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?= base_url() ?>frontend_assets/js/jquery_min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>frontend_assets/css/design.css" media="screen"  />
<link rel="stylesheet" href="<?= base_url() ?>frontend_assets/css/bootstrap.min.css" media="screen"  />
<link rel="stylesheet" href="<?= base_url() ?>frontend_assets/css/font-awesome.min.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>frontend_assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>frontend_assets/css/jquery.fancybox.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

<header>
<div class="top_nav">
	<div class="container">
		<div class="row">	
        	<div class="col-md-6 col-sm-6  col-xs-6 visible-lg visible-sm visible-md">
			<?php  @$social_media = social_media_link();  
				@$ids = array('0' => 1,'1' =>2,'2' => 3,'3' => 4,'4'=>5,'5'=>6,'6'=>7,'7'=>8,'8'=>9);		
			?>
            	<ul class="social">
                    <?php if(in_array(@$ids[0],@$social_media)) { ?>
			<li><a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                    <?php } if(in_array(@$ids[1],@$social_media)) { ?>
                        <li><a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                    <?php } if(in_array(@$ids[2],@$social_media)) { ?>
                        <li><a href="#"><i aria-hidden="true" class="fa fa-linkedin"></i></a></li>
                    <?php } if(in_array(@$ids[3],@$social_media)) { ?>
                        <li><a href="#"><i aria-hidden="true" class="fa fa-youtube"></i></a></li>
                    <?php } if(in_array(@$ids[4],@$social_media)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-google-plus"></i></a></li>
                    <?php } if(in_array(@$ids[5],@$social_media)) { ?>
                            <li><a href=""><i aria-hidden="true" class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                </ul>	
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<ul class="user-details">
            	    <?php 
            	    if(empty(currentuserinfo()->user_type)){

            	    ?>
                	<li><a class="fancybox" id="log_in" href="#login">Login</a></li>
                	<li><a class="fancybox" id="newuser" href="#sign_up2">Sign Up</a></li>
                	<li><a class="fancybox" id="business" href="#list_business" >List your Business</a></li>
                	<?php }else{?>
                    <li>
                    	<div class="dropdown user profile-img"><?=ucfirst(@currentuserinfo()->first_name).' '.ucfirst(@currentuserinfo()->last_name)?>
  							<a id="dLabel" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                            	
                            	<span class="user user-circle">
                              	
                    <?php
                     $profileImg =profile_image(currentuserinfo()->id) ;
                  	if(empty($profileImg))
                  	{
				  		$img	=	base_url().'assets/upload_image/user-placeholder.png' ;
				  	}else{
				  		$img	=	base_url().'assets/upload_image/'.$profileImg;
				  	}
                    
                ?>
                    <img src="<?=$img?>" class="user-image"/>
                                </span>    
                                <span class="caret"></span>
                            </a>
                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                          <?php
                             if(currentuserinfo()->user_type == '2')
                             {
						  ?> 
						        <li><a href="<?= base_url()?>site/user/profile"> User Profile </a></li>
						        <li><a href="<?= base_url()?>site/user/reset_password"> Reset Password </a></li>
						        <li><a href="<?= base_url() ?>site/articles/my_articles"> My Articles</a></li>
                                <li><a href="<?= base_url() ?>site/events/my_events"> My Events</a></li>
								<li><a href="<?= base_url() ?>site/service/my_services"> My Services</a></li>
                                <li><a href="<?=base_url()?>auth/logout">  Logout </a></li>
						  <?php	 	
							 }
							 else if(currentuserinfo()->user_type == '3')
							 {
						  ?>
						        
						        <li><a href="<?=base_url()?>site/user/profile"> User Profile </a></li>
						        <li><a href="<?=base_url()?>site/user/reset_password"> Reset Password </a></li>
								 <li><a href="<?=base_url()?>site/user/feedback"> My Feedback </a></li>
                                <li><a href="<?=base_url()?>admin/auth/logout">  Logout </a></li>
						  <?php	 	
							 } 
                          ?>
                           
                           
                          </ul>
                        </div>
                    </li>
                    <?php }?>
                    
                  
               	</ul>
                
                	
            </div>
		</div>
	</div>
</div>

<div class="main_nav">
	<div class="container">
    	<div class="row">
        	<div class="col-md-3 col-sm-3 col-xs-12">
            	<div class="logo">	
	            	<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/front/images/logo1.png" class="img-responsive" alt="Directory" /></a>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 position-xs-sm">
               	<div class='toggle'>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <div class="navigation">
                    <ul>
                        <li class="<?= (uri_segment(1) == '')?"active":"" ?>"><a  href='<?= base_url() ?>'>Home</a></li>
                        <li  class="<?= (uri_segment(2) == 'pages' && uri_segment(3) == 'view')?"active":"" ?>" ><a href="<?= base_url() ?>site/pages/view?id=<?php echo ID_encode(1) ;?>">About us</a></li>
                        <li class="<?= (uri_segment(2) == 'categories')?"active":"" ?>"> <a  href="<?= base_url() ?>site/categories">Categories</a></li>
                        <li class="<?= (uri_segment(2) == 'events')?"active":"" ?>" > <a  href="<?= base_url() ?>site/events">Events</a></li>
                        <li class="<?= (uri_segment(2) == 'articles')?"active":"" ?>"><a  href="<?= base_url() ?>site/articles">Articles</a></li>
                        <li class="<?= (uri_segment(2) == 'membershipplans')?"active":"" ?>"><a  href="<?= base_url() ?>site/membershipplans">Membership Plans</a></li>
                        <li class="<?= (uri_segment(2) == 'pages' && uri_segment(3) == 'contactus')?"active":"" ?>" > <a href="<?= base_url() ?>site/pages/contactus?id=<?php echo ID_encode(4) ;?>">Contact Us</a></li>
                    </ul>
                    </div>
            </div>
        </div>
    </div>
</div>

</header>
<?php
    $username  =   '';
    $password  =   '';
    $remember  =   '';
    if(get_cookie('username',FALSE) !=  NULL)
    {
        $username   =   get_cookie('username',FALSE);
    }

    if(get_cookie('password',FALSE) !=  NULL)
    {
	$password   =   get_cookie('password',FALSE);
    }
    if(get_cookie('username',FALSE) !=  NULL)
    {
       $remember    =   get_cookie('remember',FALSE);
    }
    $username_decr=custom_encryption($username,'ak!@#s$on!','decrypt');
    $password_decr=custom_encryption($password,'ak!@#s$on!','decrypt');
	//echo $username_decr;
	//echo $password_decr ;
	
?>
<div id="login" class="col-md-12" >
        <div  id="login-form">
		<?php echo form_open('',array('class'=>'login-form','id'=>'loginForm'));?>
			<fieldset>
				<h2 class="heading" style="padding-top:30px;">Login</h2>
				
				
				
				<hr class="colorgraph">
				<div class="form-group" id="error_login">
                   
				</div>
				<div class="form-group">
                    <input type="text" name="username" id="username" maxlength="50" value="<?php if($remember && $username_decr !== ''){echo $username_decr;}?>" class="form-control " placeholder="Username">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" maxlength="50" value="<?php if($remember && $password_decr !== ''){echo $password_decr;}?>" class="form-control" placeholder="Password">
				</div>
				<span class="button-checkbox">
				 
					<button type="button" class="btn" data-color="info" style="">Remember Me</button>
                   <input type="checkbox" name="remember" id="remember_me" value="1" <?php if($remember){echo "checked";}?> class="my_checkbox">
					<a  class="btn btn-link pull-right" id="frgt">Forgot Password?</a>
				</span>
				<hr class="colorgraph">
				<div class="row btn-grp" >
					<div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="button" id="login-btn" class="btn  btn-primary btn-block" value="Log In">
					</div>
					
                    <?php //echo '<div class="col-xs-12 col-sm-6 col-md-6"><button type="button"  class="btn  btn-success btn-block" id="register_1"> Register </button></div>';?>

					
				</div>
			</fieldset>
		<?php echo form_close(); ?>
        </div>
        <div class="forget-password" id="forget_form">
            <?php echo form_open('',array('class'=>'login-form','id'=>'forgetForm'));?>
        	<fieldset>
            	<h2 class="heading "> Forgot Password </h2>
                <hr class="colorgraph">
                 <div class="form-group" id="error_forget">
                   
				</div>
				<div class="form-group">
                    <input type="email" name="email" id="forgetEmail" maxlength="50" class="form-control " placeholder="Email Address">
				</div>
				<div class="row btn-grp">
					<div class="col-xs-6 col-sm-6 col-md-6" >
                        <input type="button" id="forget_btn" class="btn  btn-primary btn-block" value="Submit">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<input type="submit" class="btn  btn-warning btn-block" value="Back" id="Back">
					</div>
				</div>
			</fieldset>
			<?php echo form_close(); ?>
        </div>
        
        <div class="new_user" id="sign_up">
             <?php //echo form_open('',array('class'=>'login-form','id'=>'regForm'));?>
        	<?php /*echo '<fieldset>
            	<h2 class="heading"> Sign Up</h2>
                <hr class="colorgraph">
                <div class="form-group" id="error_reg">
                   
				</div>
				 <div class="form-group">
                    <input type="text" name="user_name" id="regUsername" class="form-control " placeholder="Username">
				</div>
                <div class="form-group">
                    <input type="text" name="first_name" id="regFirstName" class="form-control " placeholder="First Name">
				</div>
                
                <div class="form-group">
                   <input type="text"  name="last_name" id="regLastName" class="form-control " placeholder="Last Name">
				</div>
                <div class="form-group">
                    <input type="email" name="email" id="regEmail" class="form-control " placeholder="Email Address" required />
				</div>
				<div class="form-group">
                    <input type="password" name="password"  id="regPassword" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
                    <input type="password" name="confirm_password" id="regConfirmPassword" class="form-control" placeholder="Confirm Password">
				</div>
				
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Service Provider</button>
                    <input type="checkbox" name="is_service_provider" id="regServiceProvide" value="1"  class="hidden">
					
				</span>
				<hr class="colorgraph">
				<div class="row btn-grp">
					<div class="col-xs-12 col-sm-6 col-md-6" >
                        <input type="button" id="reg_btn" class="btn  btn-primary btn-block reg-btn" value="Submit">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
                    	<a class="btn btn-warning btn-block" id="Return"> Back </a>
						<button type="button"  class="btn  btn-success btn-block" id="Back2"> Register </button>
					</div>
				</div>
			</fieldset>';*/?>
			<?php //echo form_close(); ?>
        </div>
        
</div>

<div class="clearfix"></div>

<div class="col-md-12" id="sign_up2">
        	<?php echo form_open('',array('class'=>'login-form','id'=>'regForm1'));?>
        	<fieldset>
            	<h2 class="heading"> Sign Up</h2>
                <hr class="colorgraph">
                <div class="form-group" id="error_reg1">
                   
				</div>
                <div class="form-group">
                    <input type="text" name="user_name" id="regUsername1" maxlength="50" class="form-control " placeholder="Username">
				</div>
                <div class="form-group">
                    <input type="text" name="first_name" id="regFirstName1" maxlength="50" class="form-control " placeholder="First Name">
				</div>
                
                <div class="form-group">
                   <input type="text"  name="last_name" id="regLastName1" maxlength="50" class="form-control " placeholder="Last Name">
				</div>
                <div class="form-group">
                    <input type="email" name="email" id="regEmail1" maxlength="50" class="form-control " placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password"  id="regPassword1" maxlength="50" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
                    <input type="password" name="confirm_password"  id="regConfirmPassword1" maxlength="50" class="form-control" placeholder="Confirm Password">
				</div>
				<hr class="colorgraph">
				<div class="row btn-grp">
					<div class="col-xs-12 col-sm-12 col-md-12" >
                        <button type="button" id="reg_btn1" class="btn  btn-primary btn-block reg-btn1">SUBMIT</button>
					</div>
					
				</div>
			</fieldset>
			<?php echo form_close(); ?>

        </div>
        
<div class="clearfix"></div>        
<div class="col-md-12" id="list_business">
             <?php echo form_open('',array('class'=>'login-form','id'=>'regForm'));?>
        	<fieldset>
            	<h2 class="heading text-center" style="margin-bottom:15px; margin-top:10px;"> List Your Business </h2>
                <hr class="colorgraph">
                <div class="form-group" id="error_reg">
                   
				</div>
				 <div class="form-group">
                    <input type="text" name="user_name" id="regUsername" maxlength="50" class="form-control " placeholder="Username">
				</div>
                <div class="form-group">
                    <input type="text" name="first_name" id="regFirstName" maxlength="50" class="form-control " placeholder="First Name">
				</div>
                
                <div class="form-group">
                   <input type="text"  name="last_name" id="regLastName" maxlength="50" class="form-control " placeholder="Last Name">
				</div>
				 <div class="form-group">
                   <input type="text" name="business_name" id="regBusinessName" maxlength="50" class="form-control " placeholder="Business Name">
				</div>
                <div class="form-group">
                    <input type="email" name="email" id="regEmail" class="form-control " placeholder="Email Address" >
				</div>
				<div class="form-group">
                    <input type="password" name="password"  id="regPassword" maxlength="50" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
                    <input type="password" name="confirm_password" maxlength="50" id="regConfirmPassword" class="form-control" placeholder="Confirm Password">
				</div>
				
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12" >
                        <button type="button" id="reg_btn" class="btn btn-primary btn-block" >SUBMIT</button>
					</div>
					<?php //echo '<div class="col-xs-6 col-sm-6 col-md-6"><a class="btn btn-warning btn-block" id="Return"> Back </a><button type="button"  class="btn  btn-success btn-block" id="Back2"> Register </button></div>'?>
				</div>
			</fieldset>
			<?php echo form_close(); ?>
        </div>
		
	<!----popup for feedback -->
	<script src="<?=base_url();?>frontend_assets/js/jquery.min1.js"></script> 
	 <script src="<?=base_url();?>frontend_assets/js/jRate.min.js"></script>
	 <script src="<?=base_url();?>frontend_assets/js/toolitup-jrate.min.js"></script>   
	<div class="col-md-12" id="list_business_2">
		  <?php echo form_open('',array('class'=>'login-form','id'=>'list_feedback'));?>
        	<fieldset>
            	<h2 class="heading text-left" style="margin-bottom:15px; margin-top:10px;"> Feedback </h2>
				<div class="fdbck_cnt">
				<input type="hidden" name="service_id" id="service_id">
				<input type="hidden" id="ratings" name="ratings"/> 
				<span class="error" id="error_fed" style="color:red"></span>
				
               <div class="row ">
	               	<div class="col-md-12">
					  <p class="heading">Your overall experience<span class="star">*</span></p>
						<div id="rating" class="rating">
                         </div>
                        <!--<div id="stars" class="starrr"></div>
    	                <p>You gave a rating of <span id="count">0</span> star(s)</p>-->
					</div>  
				 </div>
                <div class="row">
                	<div  class="col-md-12">
					<p class="heading"> How was your experience <span class="star">*</span></p>
						<textarea placeholder="Give Your Feedback" id="message" maxlength="300" name="message" class="form-control" > </textarea>
					</div>
				</div>
               </div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12" >
                        <input type="button" id="fed_bck"  class="btn  btn-primary btn-block" value="Submit">
					</div>
				</div>
			</fieldset>
			<?php echo form_close(); ?>
        </div>
		
      
    <script>
		$("#rating").jRate({rating:0,width: "30",height:"40px",startColor: '#f36f02',endColor: '#f36f02',shapeGap: '5px',marginbottom: '10' ,backgroundColor: '#E5E5E5',fontsize:'50px',readOnly:false,onSet: function(rating) {
			  $('#ratings').val(rating);
		  }});
    </script>  