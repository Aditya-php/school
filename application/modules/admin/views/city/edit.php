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
		
		<?php //pr($data1);
foreach($data1 as $value){
	//pr($diedie);
}		?>
		
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit City </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/city/edit/'.ID_encode($value->id),array('class'=>'form-horizontal')); ?>
										<!--<form action="" class="form-horizontal" id="app_user_edit" method="post">
										<?php //form_hidden('id', '$result->id'); ?>-->
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">City Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="city_name" name="city_name" placeholder="City Name" value="<?php echo set_value('city_name',$value->city_name); ?>">
															<label for="city_name" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('city_name');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													<?php //pr($data1[0]->status);?>
                                      					             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php $s = $data1[0]->status; ?>
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
													<?php echo form_error('status');?>		
													</div>
												</div>
											</div>
													<!--/span-->
												</div>
										
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue"> Submit</button>
																<a href="<?php echo base_url().'admin/city'; ?>" class="btn default" >Cancel</a>
														
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