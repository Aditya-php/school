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

		<?php //pr($data1) ;
		foreach($data1 as $val){
			$id = $val->id;
		}?>
		
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">View Testimonial  </span>
											
										</div>
									</div><div class="row">
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
								<?php echo form_open(base_url().'admin/admin_testmonial/view/'.ID_encode($id),array('class'=>'form-horizontal')); ?>
								
										<div class="col-md-4">
										<div class="img-div">
                                            <?php
											if(isset($data1[0]->profile_image) && !empty($data1[0]->profile_image) && file_exists('assets/upload_image/'.$data1[0]->profile_image))
											{
											?>
											<img src="<?php echo base_url().'assets/upload_image/'.$data1[0]->profile_image;?>" height="139px"; width="170px";>
											<?php
											}
											else{
										    ?>
											<img src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" height="139px"; width="170px";>	
										   <?php	} 
											?>
                                        </div>
										<b><?php echo $data1[0]->id."|".ucwords($data1[0]->first_name."   ".$data1[0]->last_name);?>	
										</b></div>
										 
												
													<div class="col-md-8" style="margin-top:30px">
														<div class="form-group">
															<label class="control-label col-md-3" style="font-weight:bold">Description</label>
															    <div class="col-md-9">
													<div class="description-div"><?php echo set_value('description',$val->description);?> </div>
																<?php echo form_error('description');?>
																 
															</div>
																	 <?php 
												if($data1[0]->status == 1)
												{
													$status = "Pending";
												}else if($data1[0]->status == 2)
												{
													$status = "Disapprove";
												}else if($data1[0]->status == 3){
													$status = "Approve";
												}?>
												<div class="clear" style="clear:both"></div>
															 
														<div class="form-group">
<label class="control-label col-md-3" style="margin-top:25px;padding-left:30px;"><b>Status</b></label>
<div class="col-md-9"><div style="margin-top:33px;margin-left:14px;"><?php echo $status ?>
																</div>		
															</div>
														</div>
													 </div>
													</div>	 
											    </div>
											<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
					
			
				
			<?php	
			if($data1[0]->status == 1)
			{
			$approve= '<a class="btn btn-info btn-sm" title="Edit" href="'.base_url().'admin/admin_testmonial/approve/'.ID_encode($id).'/3" data-toggle="tooltip" data-placement="top">Approve</a>&nbsp;&nbsp;&nbsp;' ;
			echo $approve;
			$disapprove= '<a class="btn btn-info btn-sm" title="Edit" href="'.base_url().'admin/admin_testmonial/approve/'.ID_encode($id).'/2" data-toggle="tooltip" data-placement="top">Disapprove</a>&nbsp;&nbsp;&nbsp;' ;
			echo $disapprove;
			}else if($data1[0]->status == 2)
			{
			 $approve= '<a class="btn btn-info btn-sm" title="Edit" href="'.base_url().'admin/admin_testmonial/approve/'.ID_encode($id).'/3" data-toggle="tooltip" data-placement="top">Approve</a>&nbsp;&nbsp;&nbsp;' ;
			 echo $approve; 
			}else if($data1[0]->status == 3){
	 	    $disapprove= '<a class="btn btn-info btn-sm" title="Edit" href="'.base_url().'admin/admin_testmonial/approve/'.ID_encode($id).'/2" data-toggle="tooltip" data-placement="top">Disapprove</a>&nbsp;&nbsp;&nbsp;' ;
			echo $disapprove;
	         } ?>		
					  <button type="button" class="btn default" onclick='window.history.back()'>  <i aria-hidden="true" class="fa fa-times"></i> Cancel</button>
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
	
<style>
.description-div{
width:100%;
padding:15px;
border:2px solid #eee	
}
</style>	