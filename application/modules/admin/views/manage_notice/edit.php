<script>var currentUrl= '<?php echo base_url() ;?>';</script>
<div class="page-content-wrapper">
		<div class="page-content">
        
        <!--Breadcrumb Start-->
        
         <!--<ul class="page-breadcrumb breadcrumb">
						<?php// foreach($breadcum as $b_key	=>	$b_val){
							 //if($b_key	!=	''){?>
								<li class=""> <a href="<?= base_url().$b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
							<?php  //}else if($b_key	==	''){ ?>
									<li class="active"> <?= $b_val ?> </li>
						<?php	 //}
						// } ?>
                    </ul>-->
		
		<?php $data1 ;
		foreach($data1 as $val){
			// pr($val);
			$id = $val->id;
			// pr($id);//die;
		}?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit User </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/admin_testmonial/edit/'.ID_encode($id),array('class'=>'form-horizontal')); ?>
										
										
											

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Description<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control" maxlength="55" id="description" name="description" placeholder="description" value="<?php echo set_value('description'); ?>"></textarea>
																<?php echo form_error('description');?>
																 
															</div>
														</div>
													</div>
											
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<button type="button" class="btn default" onclick='window.history.back()'>  <i aria-hidden="true" class="fa fa-times"></i>  Cancel</button>
														
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

