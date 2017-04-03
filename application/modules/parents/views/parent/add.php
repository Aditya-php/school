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
		<?php //pr($data1[0]->description) ;
		?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Testimonial  </span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'parents/testmonial',array('class'=>'form-horizontal')); ?>
										
												
													<div class="col-md-10">
														<div class="form-group">
															<label class="control-label col-md-3">Description<span class="star">*</span> :</label>
															<div class="col-md-9">
																<textarea rows="10" cols="20" class="form-control" id="description" name="description" placeholder="Description" value=""><?php if(isset($data1[0]->description) && !empty($data1[0]->description)){echo set_value('description',$data1[0]->description);}else{ echo set_value('description');}?></textarea>
																<?php echo form_error('description');?>
																 
															</div>
														</div>
													</div>
													
                                                
													
											</div>
											<?php if(isset($data1[0]->description) && $data1[0]->description !=""){?>
											<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
											<a href="<?php echo base_url().'parents'; ?>" class="btn default" > Cancel</a>
											</div>	</div>	</div>
											<?php
											}else{
												?>
													<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue">    Submit</button>
																<a href="<?php echo base_url().'parents/testmonial'; ?>" class="btn default" >Cancel</a>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
												<?php
											}
											?>
											
									
											
										<?php echo  form_close(); ?>
										<!-- END FORM-->
									</div>
								</div>
							
		</div>
	</div>