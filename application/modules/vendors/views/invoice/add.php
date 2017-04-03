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
	<?php  //pr($data1);
	///foreach($data1 as $val)
	// pr($val);

	?>		<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add Invoice</span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
											<?php echo form_open(base_url().'vendors/invoice/add',array('class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'invoice_form')); ?>
								
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												
												<!--/row-->
												<div class="row">
                                                  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Kid Details<span class="star">*</span> :</label>
															<div class="col-md-8">
													<?php if(isset($data1) && !empty($data1)){ ?>
														<select name="kid_detail" class="form-control" >
														<option value="">Select</option>
															
														<?php
															foreach($data1 as $val)
															{ 
															?>
														<option value="<?php echo $val->id."_".$val->parent_id;?>" <?php  echo  set_select('kid_detail',$val->id."_".$val->parent_id);?>><?php echo ucwords($val->kid_name)."(".$val->id.")--".ucwords($val->parent_name)."(".$val->parent_id.")"; ?></option>
														<?php 
															}														?>
														
													</select>
													<?php }else{ echo "Please enter kid And Parents first"; } ?>
													<?php echo form_error('kid_detail');?>		
													</div>
												    </div>
													</div>
													<div class="col-md-6">
													
													<div class="form-group">
															<label class="control-label col-md-4">Invoice Image</label>
															<div class="col-md-8">
														<input type="file" class="form-control upload_single_doc" id="image" name="image" placeholder="Invoice Image"
														value="<?php //echo (isset($alldata['userinfo']->profile_image) && !empty($alldata['userinfo']->profile_image)) ? $alldata['userinfo']->profile_image : ""; ?>">
															</div>
														</div>
														
													</div>
													</div>
												<div class="row">
                                               	<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Amount<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control"  onpaste="return false" onKeyPress="return isNumberKey(event)"  id="amount" name="amount" placeholder="Amount" value="<?php echo set_value('amount'); ?>">
																<?php echo form_error('amount');?>
																 
															</div>
														</div>
													</div>
													
											<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Invoice Date<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="datepicker" name="invoice_date" placeholder="Invoice Date" value="<?php echo set_value('invoice_date'); ?>">
																<?php echo form_error('invoice_date');?>
																 
															</div>
														</div>
													</div>
										 	</div>
											<div class="row">
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Due Date<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="datepicker1" name="due_date" placeholder="Due Date" value="<?php echo set_value('due_date'); ?>">
																<?php echo form_error('due_date');?>
																 
															</div>
														</div>
													</div>
													
												
											</div>
											<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																	<a href="<?php echo base_url().'vendors/invoice/listing'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
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
 $( function() {
	  // alert();
      var today =new Date();
     $( "#datepicker" ).datepicker({
           startDate : "",   minDate: "", maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true
        });  
	 $( "#datepicker1" ).datepicker({
           startDate : "",   minDate: "", maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true
        });  
  } );
  
  
  
  </script>
  <script type="text/javascript">
function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
</script>

<script>


$(document).ready(function() {
				// alert();
		$("#invoice_form").validate({

			rules: {
				kid_detail:{
					required: true,
				},
				amount:{
					required: true,
				},
			
				due_date:{
					required: true,
				},
				invoice_date:{
					required: true,
				}
			},
			messages: {
				kid_detail: "Please select a kid Name",
				amount: "Please enter your Amount",
				
				due_date:{
  					required: "Please enter a Due Date",
				},
				invoice_date:{
  					required: "Please enter a Invoice Date",
			
				}

			},
         
		});
});
			
	</script>