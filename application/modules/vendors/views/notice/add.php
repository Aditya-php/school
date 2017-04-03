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
											<span class="caption-subject font-red-sunglo bold uppercase">Add Notice</span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
											<?php echo form_open(base_url().'vendors/notice_title/add',array('class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'notice_form')); ?>
								
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												
												<!--/row-->
												<div class="row">
                                                  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Notice  Title<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="notice_title" 
																name="notice_title" placeholder="Notice Title" value="<?php echo set_value('notice_title'); ?>">
																<?php echo form_error('notice_title');?>
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Description<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"  id="notice_description" name="notice_description" placeholder="Notice Description" value=""><?php echo set_value('notice_description'); ?></textarea>
																<?php echo form_error('notice_description');?>
																 
															</div>
														</div>
													</div>
													</div>
												<div class="row">
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Start Date<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="datepicker" name="start_date" placeholder="Start Of Date" value="<?php echo set_value('start_date'); ?>">
																<?php echo form_error('start_date');?>
																 
															</div>
														</div>
													</div>
                                               <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">End Date<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="datepicker1" name="end_date" placeholder="End of Date" value="<?php echo set_value('end_date'); ?>">
																<?php echo form_error('end_date');?>
																 
															</div>
														</div>
													</div>
													</div>
										
											<div class="row">
											 <div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-4">Status <span class="star">*</span> :</label>
													<div class="col-md-8">
														<select name="notice_status" class="form-control">
														<option value="">Select</option>
														<?php 
														$sataus=array("1"=>"Active","2"=>"Inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key;?>"<?php echo  set_select('notice_status',$key);?>><?php echo $val; ?></option>
														<?php } ?>
														
													</select><?php echo form_error('notice_status');?>		
													</div>
												</div>
											</div>
													<div class="col-md-6">
													<div class="form-group">
															<label class="control-label col-md-4">Upload Document</label>
															<div class="col-md-8">
														<input type="file" class="form-control upload_single_doc" id="image" name="image" 
														value="<?php //echo (isset($alldata['userinfo']->profile_image) && !empty($alldata['userinfo']->profile_image)) ? $alldata['userinfo']->profile_image : ""; ?>">
															</div>
														</div>
														</div>
											</div>
											<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																	<a href="<?php echo base_url().'vendors/notice_title/listing'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
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
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/jquery.filer.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/jquery.filer.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/custom.js" type="text/javascript"></script> 	
<style>
.error{
	color:red;
}
</style>
<script type="text/javascript">
var today =new Date();
$("#datepicker").on("change",function(){
        var mindate = $(this).val();
        if(mindate!=''){
          $('#datepicker1').datepicker("update", mindate); 
         $('#datepicker1').datepicker('setStartDate', mindate);    
        }
});
	 $( function() {
	  // alert();
    $( "#datepicker" ).datepicker({
           startDate : today,   minDate: "", maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true,
        });  
	 $( "#datepicker1" ).datepicker({
           startDate : today,   minDate: "", maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true,
        });  
  } );
  	


  </script>
  
  
  <script>


$(document).ready(function() {
				// alert();
		$("#notice_form").validate({

			rules: {
				notice_title:{
					required: true,
				},
				notice_description:{
					required: true,
				},
				notice_status:{
					required: true,
				},
				start_date	:{
					required: true,
				},
				
				end_date:{
					required: true,
				}
			},
			messages: {
				notice_title: "Please enter a Notice Title",
				notice_description: "Please enter Notice Description",
				notice_status:{
  					required: "Please Select Notice Status",
				},
				start_date	:{
  					required: "Please enter a Start Date",
				},
			
				end_date:{
  					required: "Please enter a End Date",
			
				}

			},
         
		});
});
			
	</script>