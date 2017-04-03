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
			// pr($val->description);
			$id = $val->id;
			// pr($id);//die;
		}?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Testimonial </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'parents/testmonial/edit/'.ID_encode($id),array('class'=>'form-horizontal')); ?>
										
										
											

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Description<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"id="description" name="description" placeholder="description" value=""><?php echo set_value('description',$val->description);?></textarea>
																<?php echo form_error('description');?>
																 
															</div>
														</div>
													</div>
											
											
											<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
																<button type="submit" class="btn blue">   Submit</button>
																<a href="<?php echo base_url().'parents/testmonial/listing'; ?>" class="btn default" > Cancel</a>
														
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

