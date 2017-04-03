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
		

		<?php $city_list; 
		foreach($city_list as $val)
		{
			// pr($val);
			}?>
			
			<?php //pr($data1);
			foreach($data1 as $value)?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Area </span>
										
										</div>
									</div>
								<div class="portlet-body form">
										<!-- BEGIN FORM-->
								<?php echo form_open(base_url().'admin/area/edit/'.ID_encode($value->id),array('class'=>'form-horizontal')); ?>
										
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												
												<!--/row-->
												<div class="row">
												
												 <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">City Name<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php if(isset($city_list) && !empty($city_list)){ ?>
														<select name="city_id" class="form-control"value="<?php echo set_value('city_name',$val->city_name); ?> ">
														<option value="">Select City</option>
															
														<?php
															foreach($city_list as $val)
															{ 
															?>
														<option value="<?php echo $val->id;?>" <?php echo  set_select('city_id',  $val->id, ((!empty($data1[0]->city_id) && ( $val->id == $data1[0]->city_id) ) ? TRUE : FALSE ));?>><?php echo $val->city_name; ?></option>
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
																<input type="text" class="form-control" maxlength="55" id="area_name" name="area_name" placeholder="Area"  value="<?php echo set_value('area_name',$value->area_name); ?>">
																<?php echo form_error('area_name');?>
																 
															</div>
														</div>
													</div>
													
                                               		<?php //pr($data1[0]->status);die;?>			             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php $s = $data1[0]->status; ?>
														<select name="status" class="form-control">
														<option value="">Select Status</option>
														<?php 
														$sataus=array("active"=>"Active","inactive"=>"Inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key; ?>"<?php echo  set_select('status',  $key, ((!empty($data1[0]->status) && ( $key == $data1[0]->status) ) ? TRUE : FALSE ));?>><?php echo $val; ?></option>
														<?php 
														} ?>
														
													</select>
													<?php echo form_error('status');?>		
													</div>
												</div>
											</div>
													
											</div>
													<!--/span-->
												</div>
										
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue"> Submit</button>
																<a href="<?php echo base_url().'admin/area'; ?>" class="btn default" > Cancel</a>
														
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