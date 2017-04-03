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
		 <?php
        if ($this->session->flashdata('account_create')) {
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
		<div id="c_pass"></div>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Reset Your password</span>
											<span class="caption-helper"></span>
										</div>
									</div>
									
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" class="form-horizontal" id="res_if" method="post">
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Current Password</label>
															<div class="col-md-8">
																<input type="password" class="form-control" id="cur_pass" name="cur_pass" placeholder="Current Password" value="<?php echo set_value('cur_pass'); ?>">
															<label id="cur_pass-error1" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('cur_pass');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
												
												   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">New Password</label>
															<div class="col-md-8">
																<input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="New Password" value="<?php echo set_value('new_pass'); ?>">
																<label id="new_pass-error2" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('new_pass');?>
															</div>
														</div>
													</div>
												   
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Confirm Password</label>
															<div class="col-md-8">
																<input type="password" class="form-control" id="con_pass" name="con_pass" placeholder="Confirm Password" value="<?php echo set_value('con_pass'); ?>">
																<label id="con_pass-error3" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('con_pass');?>
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
															<div class="col-md-offset-3 col-md-9">
																<div id="loader_signup"> </div>	
																<button type="button"  class="btn green res_pass" id="signUp_btn"><i aria-hidden="true" class="fa fa-check"></i>   
																   Submit</button>
																
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
	
 <script type="text/javascript">

	$(".res_pass").click(function()
   {
		var cur_pass =  $('#cur_pass').val();
		var new_pass =  $('#new_pass').val();
		var con_pass =  $('#con_pass').val();
		
        var error=0;
		
        if(!cur_pass)
		{
			$("#cur_pass").addClass('required');
			$("#cur_pass-error1").html('Please Enter Current Password.');
			error++;
		}
		else
		{
			$("#cur_pass-error1").html('');
		}
		
        if(!new_pass)
		{
			$("#new_pass" ).addClass('required');
			$("#new_pass-error2").html('Please Enter New Password.');
			error++;
		}
		else
		{
			$("#new_pass-error2").html('');
		}
		
		if(!con_pass)
		{
			$("#con_pass").addClass('required');
			$("#con_pass-error3").html('Please Enter Confirm Password.');
			error++;
		}
		else
		{
			if (new_pass != con_pass)
			{ 
				$("#con_pass-error3").html('New Password and Confirm Password does not match!');
				return false;
			}
			else
			{
			   $("#con_pass-error3").html('');
			}
		}

		if(error>0)
		{
		return false;
		}

		var value =$("#res_if").serialize() ;
	    //alert(value); return false;
		$.ajax({
			url:site_url+"admin/account/resetpassword",
			type:'post',
			data:value,
			 beforeSend : function(){
			$("#signUp_btn").prop("disabled",true);  
                            $('#loader_signup').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
			 },
			success:function(result)
			{
				        $("#signUp_btn").prop("disabled",false);
                        $('#loader_signup').html('');
				if(result == 1)
				{
					//('#c_pass').html('Successfully Changed!!! Changed Password Sent To Your Email-id');
					alert('Successfully Changed password!!! .');
					window.location.href = site_url+'admin/dashboard';
				}
				else if(result == 2)
				{
					//alert('jhgkjhgg');
					alert('Current Password Not Correct');
					location.reload();
				}
			}
		}); 
   });
  
  
	</script>
	
		<style>
	.loader-btn{
	  float: left;   width: 54px;height: 60px;  margin-right: 70px;   margin-left: -23px;
}
</style>