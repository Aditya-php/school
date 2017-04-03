<script>var currentUrl= '<?php echo base_url() ;?>';</script>
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
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Parent </span>
										
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<?php echo form_open(base_url().'admin/parents/edit/'.ID_encode($data1[0]->id),array('class'=>'form-horizontal')); ?>
										
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">First Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="first_name" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name',$data1[0]->first_name); ?>">
															<label for="first_name" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('first_name');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Last Name<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name',$data1[0]->last_name); ?>">
																<label for="last_name" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('last_name');?>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
															<div class="form-group">
															<label class="control-label col-md-4">Email Address<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="email" name="email" placeholder="Email" value="<?php echo set_value('email',$data1[0]->email); ?>">
															<label for="email" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('email');?>	
															</div>
														</div>
													</div>
												 
													<div class="col-md-6">
															<div class="form-group">
															<label class="control-label col-md-4">Address<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control" maxlength="55" id="address" name="address" placeholder="Address" value="<?php echo set_value('address',$data1[0]->address); ?>">
															<label for="address" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('address');?>	
															</div>
														</div>
													</div>
													
													</div>
													
														<div class="row">
													<div class="col-md-6">
															<div class="form-group">
															<label class="control-label col-md-4">Mobile No.<span class="star">*</span> :</label>
															<div class="col-md-8">
																<input type="text" class="form-control"  id="contact_number" name="contact_number" placeholder="Mobile number" maxlength="10" onpaste="return false" onKeyPress="return isNumberKey(event)" value="<?php echo set_value('contact_number',$data1[0]->contact_number	); ?>">
															<label for="contact_number" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('contact_number');?>	
															</div>
														</div>
													</div>
													
											
											
													
															
													             <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">Status<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php //$s = $data1[0]->status; ?>
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
										</div>

<?php $area_id=(isset($data1[0]->area_id) && !empty($data1[0]->area_id)) ? $data1[0]->area_id : 0; ?>	

                                                 <div class="row">
												 <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-4">City<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php if(isset($city_list) && !empty($city_list)){ ?>
														<select name="city_id" class="form-control" id="city" onchange="find_area(this.value,'<?php echo $area_id; ?>')">
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
<!-----------------area----------------------------->
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-4">Area<span class="star">*</span> :</label>
<div class="col-md-8">
<select name="area_id" class="form-control"  id="area">
<option value="">Select Area</option>
</select>
<?php echo form_error('area_id');?>	

</div>
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

<script>
$(document).ready(function() {  
 var area_id='<?php echo $area_id; ?>'
 var cityid=$("#city").val();
 if(cityid!='')
 {
		find_area(cityid,area_id);
 }
});  
function find_area(city_id,area_id){
	if(city_id!='')
	{
		url = '<?php echo base_url() ;?>'+'home/find_area_list';			  
		$.post(url,{id:city_id,area_id:area_id },function (e){
		$("#area").html(e);                        
		}); 
	}
}


</script>
<script type="text/javascript">
function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
</script>