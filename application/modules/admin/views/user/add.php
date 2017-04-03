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
		<?php //pr($role_name);
// foreach($role_name as $roles)
// {
	// pr($roles);
// }		
// die;?>
		
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add User  </span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add" class="form-horizontal" id=" " method="post">
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">First Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="first_name" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name'); ?>">
															<label for="first_name" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('first_name');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Last Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>">
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
															<label class="control-label col-md-4">Email Address<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
																<label for="email" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('email');?>
															</div>
														</div>
													</div>
											<div class="col-md-6">
															<div class="form-group">
															<label class="control-label col-md-4">Mobile No.<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control"  id="contact_number" name="contact_number" placeholder="Mobile number" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" value="<?php echo set_value('contact_number'); ?>">
															<label for="contact_number" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('contact_number');?>	
															</div>
														</div>
													</div>
												
													</div>
													
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Birth</label>
															<div class="col-md-9">
																<input type="text" id="dob" name="dob" class="form-control" placeholder="dd/mm/yyyy">
															</div>
														</div>
													</div>
													<!--/span-->
												<!--/div-->
												<!--/row-->
												<div class="row">
												
														 <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Role<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php if(isset($role_name) && !empty($role_name)){ ?>
														<select name="role_id" class="form-control">
														<option value="">Select Role</option>
															
														<?php
															foreach($role_name as $val)
															{ ?>
														<option value="<?php echo $val->id;?>"<?php echo  set_select('role_id',$val->id);?>><?php echo $val->name; ?></option>
														<?php 
															}														?>
														
													</select>
													<?php }else{ echo "Please enter roles first"; } ?>
													<label for="role_id" generated="true" class="error" style="color:red"></label>
													<?php echo form_error('role_id');?>		
													</div>
												</div>
											</div>
														
													             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php //$s = $data1[0]->status; ?>
														<select name="status" class="form-control">
														<option value="">Select Status</option>
														<?php 
														$sataus=array("1"=>"active","2"=>"inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key; ?>"<?php echo  set_select('status',$key);?> ><?php echo $val; ?></option>
														<?php 
														} ?>
														
													</select>
														<label for="status" generated="true" class="error" style="color:red"></label>
													<?php echo form_error('status');?>		
													</div>
												</div>
											</div>
													</div>
													<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Password<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
															<label id="cur_pass-error1" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('password');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
											
												<!--/row-->
											
												
												   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Confirm Password<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Confirm Password" value="<?php echo set_value('new_pass'); ?>">
																<label id="new_pass-error2" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('new_pass');?>
															</div>
														</div>
													</div>
												   
												</div>
													
											</div>
											<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<a href="<?php echo base_url().'admin/user'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
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

function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
</script>

<script type="text/javascript">
$("#app_user").validate({
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
            email: 
			{
                required: true
            },
            
            contact_number: 
			{
				required:true,
				maxlength: 10,
                 minlength:	10		
            },
			role_id:
			{
				required:true,
			},
            status: 
			{
                    required:true,
					// equalTo: "#password",
            }

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
				email:
				{
						required: "Please Enter the Email."
				},
				contact_number:
				{
				required: "Please Enter Mobile Number."
				maxlength: "mobile number required maxlength 10 characters a long",
                 minlength:	"mobile number required minlength 10 characters a long"		
				} ,
				role_id:
				{
						required: "Please Enter the role."
				},
				status: 
				{
						required: "Please Enter the status."
				},
        }
	}); 
	</script>