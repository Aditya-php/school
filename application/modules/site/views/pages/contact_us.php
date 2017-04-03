<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type"/>
<title> :: Directory :: </title>
</head>
<body>

<div class="clearfix"></div>
<div class="slider inner-slide">
<div class="inner-banner">
	<img src="<?= base_url() ?>frontend_assets/img/contact-banner.jpg" class="img-responsive">
</div>
    <!--<div class="search">
    	<div class="container">
        	<div class="row">
            	<div class="slide-srch col-md-offset-1">
					<div class="bg-white">                	
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <input type="text" class="location" placeholder="Bangalore">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                        	<input type="text" class="locality" placeholder="Locality">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                        	<input type="text" class="spel" placeholder="Specialities, Doctor,Clinic,Hospitals, Labs Spas">
                        </div>
                        
                     </div>
                    <div class="btn-srch">
                    	<i aria-hidden="true" class="fa fa-search"></i>
                    </div>   
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>	
    </div>-->
</div>

<div class="clearfix"></div>

<div class="pad-50">
	
	<div class="container">
    	<div class="theeofone" style="padding:0;">
	    	<div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                	<img src="<?= base_url() ?>frontend_assets/img/supporticon.png"  alt="" />
                    <h2>Support</h2>
					<p><strong>Visit : </strong> <a href="javascript:void(0);" target="_blank"> www.directory.com </a>  <br /> or <strong>Mail us :</strong> <a href="javascript:void(0);"> info@directory.com </a> </p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
	               	<img src="<?= base_url() ?>frontend_assets/img/headoffice_icon.png"  alt="" />
                    <h2>Head office</h2>
                    <p> <strong>Address :</strong></br><?php if(!empty($result))
														{
															echo $result->content;
														}	?> </p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                	<img src="<?= base_url() ?>frontend_assets/img/sales_man.png"  alt="" />
                    <h2>Sales</h2>
                    <p> <strong>Mail:</strong> <a href="javascript:void(0);">info@directory.com</a> <br /> <strong>Telephone:</strong> +91 1234567890</p>
                    
                	
                </div>
	        </div>
        </div>
		
		<?php 
            if($this->session->flashdata('account_create')) 
                { 
          ?>
                <div class="alert bg-success display-show">
                <button class="close" data-close="alert"></button>
                <span>
                <?php
                 echo $this->session->flashdata('account_create');
                ?> 
                </span>
               </div>
  
        <?php } ?>
		<form action="add_contact" class="form-horizontal" id="c_us" method="post">
        	<div class="col-md-8 col-md-offset-2">
            	<div class="text-center">
	            	<h2 style="color:#2d2d29"> Send us an Email </h2>
                    <img src="<?= base_url() ?>frontend_assets/img/line.png" />
                </div>
		        <div class="row">
        	<div class="col-md-6 col-sm-6 col-xs-12">
            	<div class="form-group">
                	<label> Name : </label>
					<input type="text" id="name" name="name" placeholder="Name" class="form-control">
					<label for="name" generated="true" class="error" style="color:red"></label>
					<?php echo form_error('name');?>
				</div>
                <div class="form-group">
                	<label> Email: </label>
					<input type="text" id="email" name="email" placeholder="Email" class="form-control">
					<label for="email" generated="true" class="error" style="color:red"></label>
					<?php echo form_error('email');?>
				</div>
                <div class="form-group">
                	<label> Subject : </label>
					<input type="text" id="subject" name="subject" placeholder="Subject"  class="form-control">
					<label for="subject" generated="true" class="error" style="color:red"></label>
					<?php echo form_error('subject');?>
				</div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<div class="form-group" style="padding:0 5%">
                	<label> Message : </label>
					<textarea class="form-control" id="message" name="message" placeholder="Enter Your Message" style="min-height:190px">                    	
                    </textarea>
					<label for="message" generated="true" class="error" style="color:red"></label>
					<?php echo form_error('message');?>
				</div>
				<div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
			<button type="submit" class="btn btn-md  btn-warning">Send <i aria-hidden="true" class="fa fa-paper-plane"></i></button>
             </div>
        </div>	
        	</div>
			</form>
	</div>

</div>

<script type="text/javascript" src="js/owl.carousel.min.js"></script>	

</body>
</html>

<script type="text/javascript" src="<?= base_url() ?>assets/admin/pages/scripts/validate.js"></script>
<script>
$("#c_us").validate({
    ignore: [],
	  rules: 
		{
		    name: 
			{
				required: true
               
			},
            email: 
			{
				required:true,
				email: true,
            },
			subject:
			{
                required: true
            },
			message:
			{
				required:true,
			},
            
		},
		messages: 
		{
		  
				name: 
				{
					required: "Please Enter Your Name."
					
				},
				email:
				{
				required: "Please Enter a valid Email Id.",
				email:"Please Enter the valid email.",
				remote:"This Email Id Exist"
				} ,
				subject:
				{
						required: "Please Enter The Subject."
				},
				message:
				{
						required: "Please Enter the Message."
				},
				
        }
	}); 
	
</script>