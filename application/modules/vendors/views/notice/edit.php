<style>
.uploadimgs-show{
    float: right;
    margin-top: -71px;	
}
</style>
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
		foreach($data1 as $value){
			
		
		}?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Notice</span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'vendors/notice_title/edit/'.ID_encode($value->id),array('class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'notice_form')); ?>
								
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												
												<!--/row-->
												<div class="row">
                                                  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Notice  Title<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="notice_title" 
																name="notice_title" placeholder="Notice Title" value="<?php echo set_value('notice_title',$value->notice_title); ?>">
																<?php echo form_error('notice_title');?>
																 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Description<span class="star">*</span> :</label>
															<div class="col-md-8">
																<textarea class="form-control"  id="notice_description" name="notice_description" placeholder="Notice Description" value=""><?php echo set_value('notice_description',$value->notice_description); ?></textarea>
																<?php echo form_error('notice_description');?>
																 
															</div>
														</div>
													</div>
													</div>
												<div class="row">
                                  
												<?php $date = $value->start_date; //pr($date);
													$date1 =  date("d-M-Y",strtotime($date));//pr($date1);die;?>	
											<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Start Date<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="datepicker" name="start_date" placeholder="Start Of Date" value="<?php echo set_value('start_date',$date1); ?>">
																<?php echo form_error('start_date');?>
																 
															</div>
														</div>
													</div>
										 	
											<?php $date = $value->end_date; //pr($date);
													$date1 =  date("d-M-Y",strtotime($date));//pr($date1);die;?>
											
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">End Date<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="datepicker1" name="end_date" placeholder="End of Date" value="<?php echo set_value('end_date',$date1); ?>">
																<?php echo form_error('end_date');?>
																 
															</div>
														</div>
													</div>
													</div>
													<div class="row">
    					             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4"> Status<span class="star">*</span> :</label>
													<div class="col-md-8">
														<?php if($value->notice_status == '1')
																{
																	$status = 'active';
																}
																else if($value->notice_status == '2')
																{
																	$status = 'inactive';
																}?>
														<select name="notice_status" class="form-control">
														<option value="">Select</option>
														<?php 
														$sataus=array("1"=>"active","2"=>"inactive");
														foreach ($sataus as $key =>$val){  
														 ?>
														<option value="<?php echo $key; ?>"
														<?php echo  set_select('notice_status',$key,((!empty($status) && ( $val == $status) ) ? TRUE : FALSE ));?>><?php echo $val; ?></option>
														<?php 
														} ?>
														
													</select>
													<?php echo form_error('notice_status');?>		
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
											<?php
											if(isset($value->image) && !empty($value->image)  &&file_exists('assets/upload_image/'.$value->image))
											{
											?>
											<img class="uploadimgs-show" src="<?php echo base_url().'assets/upload_image/'.$value->image;?>" height="50px"; width="50px" ;>
											<?php
											}
											else{  
											?>
											<img src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" height="50px"; width="50px";>	
										   <?php
											}
										    ?>
											
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

$("#datepicker").on("change",function(){
        var mindate = $(this).val();
        if(mindate!=''){
          $('#datepicker1').datepicker("update", mindate); 
         $('#datepicker1').datepicker('setStartDate', mindate);    
        }
});
 $( function() {
	  // alert();
      var today =new Date();
   $( "#datepicker" ).datepicker({
           startDate : today,    minDate: "", maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true,
        });  
	 $( "#datepicker1" ).datepicker({
           startDate : today,    minDate: "", maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true,
        });  	
  } );
 
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