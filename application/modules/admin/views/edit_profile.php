<style>
.jFiler-input-choose-btn{    margin-left: 30px !important;}
</style>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/jquery.filer.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/jquery.filer.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/custom.js" type="text/javascript"></script>
<div class="page-content-wrapper">
		<div class="page-content">
        
        <!--Breadcrumb Start-->
        
        <ul class="page-breadcrumb breadcrumb">
						<?php foreach($breadcum as $b_key	=>	$b_val){
							 if($b_key	!=	''){?>
								<li class=""> <a href="<?= base_url().$b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
							<?php  }else if($b_key	==	''){ ?>
									<li class="active"> <?= $b_val ?> </li>
						<?php	 }
						 } ?>
                    </ul>
		
		  
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
								<div class="col-md-12" id="errorMsg">
             <?php
              if($this->session->flashdata('account_create')) 
                {
			 ?>
			<div class="alert bg-alert display-show" style="color:red;"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon red" ></i> <?php echo $this->session->flashdata('account_create');?> </div>
			 <?php  	
			   }
             ?>
            </div>
			
			
           <?php 	$alldata = $this->session->all_userdata("userinfo");//pr($result);   
			// $image = $alldata['userinfo']->profile_image; pr($image);?>
		
			
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">My Profile</span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="update_profile" class="form-horizontal" id="adm_edit" method="post" enctype="multipart/form-data">
										<?php form_hidden('id', 1); ?>
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">First Name:</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name',$result->first_name); ?>">
															<label for="first_name" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('first_name');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Last Name:</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name',$result->last_name); ?>">
																<label for="last_name" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('last_name');?>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Id:</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo set_value('email',$result->email); ?>">
																<label for="email" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('email');?>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
															<div class="form-group">
															<label class="control-label col-md-3">Mobile No:</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  id="contact_number" name="contact_number" placeholder="Mobile number" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" value="<?php echo set_value('contact_number',$result->contact_number); ?>">
															<label for="contact_number" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('contact_number');?>	
															</div>
														</div>
													</div>
													
											
										
													
														  
												</div>
												<!--/row-->
												<div class="row">
															<div class="col-md-6">
														<div class="col-md-10">
													<div class="form-group">
															<label class="control-label col-md-3" style="    margin-left: -13px;">Profile Pic:</label>
																			<div class="col-md-6" style="    margin-left:28px;">
											<?php
											if(isset($result->profile_image) && !empty($result->profile_image))
											{
											?>
											<img src="<?php echo base_url().'assets/upload_image/'.$result->profile_image;?>" height="50px"; width="50px";>
											<?php
											}
											else{
												?>
												
											<img src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" height="50px"; width="50px";>	
										   <?php	} 
											?>
														</div>
															<div class="col-md-2">
														<input type="file" class="form-control upload_single" id="image" name="image" 
														value="<?php echo (isset($result->profile_image) && !empty($result->profile_image)) ? $result->profile_image : ""; ?>">
															</div>
														</div>
														</div>
										
													</div>
													</div>
												</div>
												<!--<h3 class="form-section">Password</h3>-->
												<!--/row-->
												<div class="row">
												
												</div>
												
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-9 col-md-9">
																<button type="submit" class="btn green"><i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<button type="button" class="btn default" onclick='window.history.back()'><i aria-hidden="true" class="fa fa-times"></i>  Cancel</button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							
		</div>
	</div>
	
	<script>
	$("#adm_edit").validate({
    ignore: [],
	  rules: 
		{
		  first_name: 
			{
				required: true
               
			},
            last_name:
			{
                required: true
            },
			
        },
		messages: 
		{
		  
				first_name: 
				{
					required: "Please Enter the First Name."
					
				},
				last_name:
				{
						required: "Please enter Last Name."
				},
				username:
				{
						required: "Please Enter the Username."
				},
			
		 }
	}); 
	</script>