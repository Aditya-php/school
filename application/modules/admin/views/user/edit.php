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
            <div class="alert bg-success display-show" id="success">
                <button class="close" data-close="alert"></button>
                <span>
                    <?php
                    echo $this->session->flashdata('account_create');
                    ?> 
                </span>
            </div>

<?php } ?>
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit User </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/user/edit/'.ID_encode($data1[0]->id),
										array('class'=>'form-horizontal',
										'id'=>'res_if')); ?>
										<?php //form_hidden('id', '$result->id'); ?>
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">First Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="first_name" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name',$data1[0]->first_name); ?>">
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
																<input type="text" class="form-control" maxlength="55" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name',$data1[0]->last_name); ?>">
																<label for="last_name" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('last_name');?>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Email Address<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="email" name="email" placeholder="Email" value="<?php echo set_value('email',$data1[0]->email	); ?>">
																<label for="email" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('email');?>
															</div>
														</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
															<label class="control-label col-md-4">Mobile No.<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control"  id="contact_number" name="contact_number" placeholder="Mobile number" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" value="<?php echo set_value('contact_number',$data1[0]->contact_number	); ?>">
															<label for="contact_number" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('contact_number');?>	
															</div>
														</div>
													</div>
													</div>
													
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
														<option value="<?php echo $val->id;?>"<?php echo  set_select('role_id',  $val->id, ((!empty($data1[0]->role_id) && ( $val->id == $data1[0]->role_id) ) ? TRUE : FALSE ));?>><?php echo $val->name; ?></option>
														<?php 
															}														?>
														
													</select>
													<?php }else{ echo "Please enter roles first"; } ?>
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
														<option value="<?php echo $key; ?>"<?php echo  set_select('status',  $key, ((!empty($data1[0]->status) && ( $val == $data1[0]->status) ) ? TRUE : FALSE ));?>><?php echo $val; ?></option>
														<?php 
														} ?>
														
													</select>
														<label for="status" generated="true" class="error" style="color:red"></label>
													<?php echo form_error('status');?>		
													</div>
												</div>
											</div>
												 
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
									
											 
												<!--/row-->
												
												
												   <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">New Password<span class="star">*</span> :</label>
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
															<label class="control-label col-md-4">Confirm Password<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="password" class="form-control" id="con_pass" name="con_pass" placeholder="Confirm Password" value="<?php echo set_value('con_pass'); ?>">
																<label id="con_pass-error3" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('con_pass');?>
															</div>
														</div>
													</div>
													</div>
													
												</div>
													</div>
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue res_pass">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<a href="<?php echo base_url().'admin/user'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
														
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
                                            												</div>
											</div>

										<?php form_close();?>
										<!-- END FORM-->
									</div>
								</div>
							
		</div>
	</div>
	
