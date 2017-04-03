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
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Area  Master</span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/area/add/',array('class'=>'form-horizontal')); ?>
										
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												
												<!--/row-->
												<div class="row">
												
												 <div class="col-md-6">
												   <div class="form-group ">
													<label class="control-label col-md-4">City Name<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php if(isset($city_list) && !empty($city_list)){ ?>
														<select name="city_id" class="form-control menu">
														<option value="">Select City</option>
															
														<?php
															foreach($city_list as $val)
															{ ?>
														<option value="<?php echo $val->id;?>"<?php echo  set_select('city_id',$val->id);?>><?php echo $val->city_name; ?></option>
														<?php 
															}														?>
														
													</select>
													<?php }else{ echo "Please enter city first"; } ?>
													<?php echo form_error('city_id');?>		
													</div>
												</div>
											</div>
											
											
											
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Area<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="area_name" name="area_name" placeholder="Area" value="<?php echo set_value('area_name'); ?>">
																<?php echo form_error('area_name');?>
																 
															</div>
														</div>
													</div>
													
													<div class="clear"></div> 
													
                                                 <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
														<select name="status" class="form-control">
														<option value="<?php echo set_select('status',set_value('status')); ?>">Select Status</option>
														<?php 
														$sataus=array("1"=>"Active","2"=>"Inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key; ?>"<?php echo  set_select('status',$key);?>><?php echo $val; ?></option>
														<?php } ?>
														
													</select>
													<?php echo form_error('status');?>		
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
												</div>
												<!--/row-->
										
													
											</div>
											<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue"> Submit</button>
																<a href="<?php echo base_url().'admin/area'; ?>" class="btn default" >Cancel</a>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										<?php echo  form_close(); ?>
										<!-- END FORM-->
									</div>
								</div>
							
		</div>
	</div>