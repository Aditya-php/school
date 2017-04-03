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
											<span class="caption-subject font-red-sunglo bold uppercase">Add Role  </span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/role/add/',array('class'=>'form-horizontal')); ?>
										
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Role Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="name" name="name" placeholder="Role Name" value="<?php echo set_value('name'); ?>">
																<?php echo form_error('name');?>
																 
															</div>
														</div>
													</div>
                                         <div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
														<select name="status" class="form-control">
														<option value="">Select</option>
														<?php 
														$sataus=array("1"=>"Active","2"=>"Inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key;?>"<?php echo  set_select('status',$key);?>><?php echo $val; ?></option>
														<?php } ?>
														
													</select><?php echo form_error('status');?>		
													</div>
												</div>
											</div>
										</div>
									</div>
										              <div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<a href="<?php echo base_url().'admin/role'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
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