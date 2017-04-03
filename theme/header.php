<link rel="stylesheet" href="css/design.css" media="screen"  />
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen"  />
<link rel="stylesheet" href="css/font-awesome.min.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

<header>
<div class="top_nav">
	<div class="container">
		<div class="row">	
        	<div class="col-md-6 col-sm-6  col-xs-6 visible-lg visible-sm visible-md">
            	<ul class="social">
                	<li><a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i aria-hidden="true" class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i aria-hidden="true" class="fa fa-spinner"></i></a></li>
                </ul>	
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<ul class="user-details">
                	<li><a class="fancybox" id="log_in" href="#login">Login</a></li>
                    <li><a class="fancybox" id="newuser" href="#sign_up2">Sign Up</a></li>
                    <li>
                    	<div class="dropdown user">
  							<a id="dLabel" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                            	<span class="user-circle">
                                	<i aria-hidden="true" class="fa fa-user"></i>	
                                </span>    
                                <span class="caret"></span>
                            </a>
                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href=""> Dashboard</a></li>
                            <li><a href="user_profile.php"> User Profile </a></li>
                            <li><a href=""> Settings </a></li>
                            <li><a href="">  Logout </a></li>
                          </ul>
                        </div>
                    </li>
                    <li><a class="fancybox" id="business" href="#list_business" >List your Business</a></li>
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
	            	<a href="index.php"><img src="img/logo.png" class="img-responsive" alt="Directory" /></a>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div id='cssmenu'>
                    <ul>
                       <li><a class="active" href='#'>Home</a></li>
                       <li><a href="#">About us</a></li>
                       <li class=""><a href="catagories.php">Catagories</a>
                       		<!--<ul>
                                 <li><a href="#">Browse directory</a></li>
                                 <li><a href="#">Browse by category</a></li>
                                 <li><a href="#">Browse by area</a></li>
                                 <li><a href="#">Add my business</a></li>        
         					</ul>-->
                       </li>	
                       <li><a href="#">Events</a></li>
                       <li><a href="#">Articles</a></li>
                       <li><a href="#">Membership Plans</a></li>
                       <li><a href="contact_us.php">Contact Us</a></li>
                    </ul>
                    </div>
            </div>
        </div>
    </div>
</div>

</header>


<div id="login" class="col-md-12">
		<form role="form" id="login-form">
			<fieldset>
				<h2 class="heading" style="padding-top:30px;">Login</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
				</div>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Remember Me</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
					<a  class="btn btn-link pull-right" id="frgt">Forgot Password?</a>
				</span>
				<hr class="colorgraph">
				<div class="row btn-grp" >
					<div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="submit" class="btn  btn-primary btn-block" value="Log In">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
                    <button type="button"  class="btn  btn-success btn-block" id="register_1"> Register </button>

					</div>
				</div>
			</fieldset>
		</form>
        
        <div class="forget-password">
        	<fieldset>
            	<h2 class="heading "> Forget Password </h2>
                <hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Email Address">
				</div>
				<div class="row btn-grp">
					<div class="col-xs-6 col-sm-6 col-md-6" >
                        <input type="submit" class="btn  btn-primary btn-block" value="Submit">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<input type="submit" class="btn  btn-warning btn-block" value="Back" id="Back">
					</div>
				</div>
			</fieldset>
        </div>
        
        <div class="new_user" id="sign_up">
        	<fieldset>
            	<h2 class="heading"> Sign Up</h2>
                <hr class="colorgraph">
                <div class="form-group">
                    <input type="text" class="form-control " placeholder="First Name">
				</div>
                
                <div class="form-group">
                   <input type="text" class="form-control " placeholder="Last Name">
				</div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Confirm Password">
				</div>
				<div class="row btn-grp">
					<div class="col-xs-12 col-sm-6 col-md-6" >
                        <input type="submit" class="btn  btn-primary btn-block" value="Submit">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
                    	<a class="btn btn-warning btn-block" id="Return"> Back </a>
						<!--<button type="button"  class="btn  btn-success btn-block" id="Back2"> Register </button>-->
					</div>
				</div>
			</fieldset>
        </div>
        
</div>

<div class="clearfix"></div>

<div class="col-md-12" id="sign_up2">
        	<fieldset>
            	<h2 class="heading text-center">  Sign Up </h2>
                <hr class="colorgraph">
                <div class="form-group">
                    <input type="text" class="form-control " placeholder="First Name">
				</div>
                
                <div class="form-group">
                   <input type="text" class="form-control " placeholder="Last Name">
				</div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Confirm Password">
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                        <input type="submit" class="btn  btn-primary btn-block" value="Submit">
					</div>
					<!--<div class="col-xs-6 col-sm-6 col-md-6">
                    	<a class="btn btn-warning btn-block" id="Return"> Back </a>
						<button type="button"  class="btn  btn-success btn-block" id="Back2"> Register </button>
					</div>-->
				</div>
			</fieldset>
        </div>
        
<div class="clearfix"></div>        
<div class="col-md-12" id="list_business">
        	<fieldset>
            	<h2 class="heading text-center" style="margin-bottom:15px; margin-top:10px;"> List Your Business </h2>
                <div class="form-group">
                    <input type="text" class="form-control " placeholder="First Name">
				</div>
                
                <div class="form-group">
                   <input type="text" class="form-control " placeholder="Last Name">
				</div>
                
                <div class="form-group">
                   <input type="text" class="form-control " placeholder="Business Name">
				</div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Confirm Password">
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12" >
                        <input type="submit" class="btn  btn-primary btn-block" value="Submit">
					</div>
					<!--<div class="col-xs-6 col-sm-6 col-md-6">
                    	<a class="btn btn-warning btn-block" id="Return"> Back </a>
						<button type="button"  class="btn  btn-success btn-block" id="Back2"> Register </button>
					</div>-->
				</div>
			</fieldset>
        </div>
        
        <div class="col-md-12" id="list_business_2">
        	<fieldset>
            	<h2 class="heading text-left" style="margin-bottom:15px; margin-top:10px;"> Give Your Feedback </h2>
                <hr class="colorgraph">
                <div class="fdbck_cnt">
               <div class="row ">
	               	<div class="col-md-12">
                    	<p class="heading">Your overall experience <span class="star">*</span> </p>
        	            <div id="stars" class="starrr"></div>
    	                <p>You gave a rating of <span id="count">0</span> star(s)</p>
            	    </div>  
                </div>
                <div class="row">
                	<div  class="col-md-12">
                    	<p class="heading"> How was your experience <span class="star">*</span> </p>
                        <textarea placeholder="Give Your Feedback" class="form-control" > </textarea>
                        
                    </div>
                </div>
               </div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12" >
                        <input type="submit" class="btn  btn-primary btn-block" value="Submit">
					</div>
				</div>
			</fieldset>
        </div>
        
        
    