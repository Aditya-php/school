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
		
		<?php $data1;

	// pr($value);
	// if($value->status == '1')
	// {
		// $status = 'Active';
	// }else if($value->status == '2'){
		// $status = 'Inactive';
	// }
	// pr($status);
		?>
		
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Role </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/role/edit/'.ID_encode($data1[0]->id),array('class'=>'form-horizontal')); ?>
										<!--<form action="" class="form-horizontal" id="app_user_edit" method="post">
										<?php //form_hidden('id', '$result->id'); ?>-->
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Role Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="name" name="name" placeholder="Role Name" value="<?php echo set_value('name',$data1[0]->name); ?>">
															<label for="city_name" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('name');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													<?php //pr($data1[0]->status);?>
                                      				
                                               					             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
												
												<?php //pr($data1[0]->status);?>
														<select name="status" class="form-control">
														<option value="">Select</option>
														<?php 
														$sataus=array("1"=>"Active","2"=>"Inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key; ?>"
														<?php echo  set_select('status',$key,((!empty($data1[0]->status) && ( $key == $data1[0]->status)) ? TRUE : FALSE ));?>><?php echo $val; ?></option>
														<?php 
														} ?>
														
													</select>
													<?php echo form_error('status');?>		
													</div>
												</div>
											</div>
													<!--/span-->
												</div>
										
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<a href="<?php echo base_url().'admin/role'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
														
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