<style>
.jFiler-input-choose-btn{    margin-left: 30px !important;}
</style>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/jquery.filer.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/jquery.filer.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/custom.js" type="text/javascript"></script>
<div class="page-content-wrapper">
		<div class="page-content">
        
        <!--Breadcrumb Start-->
        
        <ul class="page-breadcrumb breadcrumb">
						<?php  foreach($breadcum as $b_key	=>	$b_val){
							 if($b_key	!=	''){?>
								<li class=""> <a href="<?= base_url().$b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
							<?php  }else if($b_key	==	''){ ?>
									<li class="active"> <?= $b_val ?> </li>
						<?php	 }
						 } ?>
                    </ul>
		
		  	 
			 <?php //pr($city_list);?>
			  <?php //pr($result);//die; ?>
        <!--Breadcrumb End-->
								<div class="portlet light bordered">
								<div class="col-md-12" id="errorMsg">
             <?php
              if($this->session->flashdata('account_create')) 
                {
			 ?>
			<div class="alert bg-alert display-show" style="color:red;"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon red" ></i> <?php echo $this->session->flashdata('account_create');?> </div>
			 <?php  	
			   }
             ?>
            </div>
			<?php 	$alldata = $this->session->all_userdata("userinfo");//pr($alldata);   ?>
				
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Parent Profile</span>
											
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="update_profile" class="form-horizontal" id="adm_edit" method="post" enctype="multipart/form-data">
										<?php form_hidden('id', 1); ?>
											<div class="form-body">
												<!--<h3 class="form-section">Person Info</h3>-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">First Name<span class="star">*</span> :</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name',$result[0]->first_name); ?>">
															<label for="first_name" generated="true" class="error" style="color:red"></label>
															<?php echo form_error('first_name');?>	
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Last Name<span class="star">*</span> :</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name',$result[0]->last_name); ?>">
																<label for="last_name" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('last_name');?>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Id<span class="star">*</span> :</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo set_value('email',$result[0]->email); ?>">
																<label for="email" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('email');?>
															</div>
														</div>
													</div>
													
													 
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No.<span class="star">*</span> :</label>
															<div class="col-md-9">
																<input type="text" class="form-control" maxlength="10" onKeyPress="return isNumberKey(event)" id="contact_number" name="contact_number" placeholder="contact_number" value="<?php echo set_value('contact_number',$result[0]	->contact_number); ?>">
																<label for="contact_number" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('contact_number');?>
															</div>
														</div>
													</div>
												</div>	
										
<?php $area_id=(isset($result[0]->area_id) && !empty($result[0]->area_id)) ? $result[0]->area_id : 0; ?>	
												<div class="row">
                                                 <div class="col-md-6">
												   <div class="form-group">
													<label class="control-label col-md-3">City<span class="star">*</span> :</label>
													<div class="col-md-9">
													<?php if(isset($city_list) && !empty($city_list)){ ?>
														<select name="city_id" class="form-control" id="city" onchange="find_area(this.value,'<?php echo $area_id; ?>')">
														<option value="">Select</option>
															
														<?php
															foreach($city_list as $val)
															{ 
															?>
														<option value="<?php echo $val->id;?>" <?php echo  set_select('city_id',  $val->id, ((!empty($result[0]->city_id) && ( $val->id == $result[0]->city_id) ) ? TRUE : FALSE ));?>><?php echo $val->city_name; ?></option>
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
<label class="control-label col-md-3">Area<span class="star">*</span> :</label>
<div class="col-md-9">
<select name="area_id" class="form-control"  id="area">
<option value="">Select</option>
</select>
<?php echo form_error('area_id');?>	

</div>
</div>
</div>
</div>
													<div class="row">
													  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address<span class="star">*</span> :</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="address" name="address" placeholder="address" value="<?php echo set_value('address',$result[0]->address); ?>">
																<label for="address" generated="true" class="error" style="color:red"></label>
																 <?php echo form_error('address');?>
															</div>
														</div>
													</div>
										<?php  //pr($result[0]);//die;?>
														<div class="col-md-6">
														<div class="col-md-10">
													<div class="form-group">
															<label style="margin-left:-18px;" class="control-label col-md-3">My Profile </label>
																			<div class="col-md-7" style="margin-left:30px;">
											<?php
											if(!empty($result[0]->profile_image))
											{
											?>
											<img src="<?php echo base_url().'assets/upload_image/'.$result[0]->profile_image;?>" height="50px"; width="50px";>
											<?php
											}
											else{
												?>
												
											<img src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>" height="50px" width="50px">	
										   <?php	} 
											?>
														</div>
															<div class="col-md-1">
														<input type="file" class="form-control upload_single" id="image" name="image" 
														value="<?php echo (isset($result[0]->profile_image) && !empty($result[0]->profile_image)) ? $result[0]->profile_image : ""; ?>">
															</div>
														</div>
														</div>
										
													</div>
													
												</div>	
											 
												<a onclick="parent_information()">More Information</a>
										
												<div id="parent_details" style="display:none">
										<div class="row">		
											  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Father Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php echo set_value('father_name',$result[0]->father_name); ?>">
																
															</div>
														</div>
													</div>
													
													  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Job Description and company Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="father_job_desc" name="father_job_desc" placeholder="Father's Company Name" value="<?php echo set_value('father_job_desc',$result[0]->father_job_desc); ?>">
															
															</div>
														</div>
													</div>
												</div>	
													
												<div class="row">			
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Father contact no.</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="father_contact" name="father_contact"  maxlength="12" onpaste="return false" onKeyPress="return isNumberKey(event)" placeholder="Father Contact Number" value="<?php echo set_value('father_contact',$result[0]->father_contact); ?>">
															
															</div>
														</div>
													</div>
													
													  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mother Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name" value="<?php  echo set_value('mother_name',$result[0]->mother_name); ?>">

															</div>
														</div>
													</div>
												</div>	
												<div class="row">	
													  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Job Description and company Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="mother_job_desc" name="mother_job_desc" placeholder="Mothers'Company Name" value="<?php echo set_value('mother_job_desc',$result[0]->mother_job_desc); ?>">
															
															</div>
														</div>
													</div>
													  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mother contact number</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="mother_contact" name="mother_contact"  maxlength="12" onpaste="return false" onKeyPress="return isNumberKey(event)" placeholder="Mother Contact Number" value="<?php  echo set_value('mother_contact',$result[0]->mother_contact); ?>">
																
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													  <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Emergency Number</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="emergency_no" name="emergency_no"  maxlength="12" onpaste="return false" onKeyPress="return isNumberKey(event)" placeholder="Emergency Number" value="<?php echo set_value('emergency_no',$result[0]->emergency_no); ?>">
																
															</div>
														</div>
													</div>
													</div>
												</div>
											
											
											</div>
											<div class="clear" style="clear:both"></div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-8 col-md-9">
																<button type="submit" class="btn green">Submit</button>
																<button type="button" class="btn default" onclick='window.history.back()'>Cancel</button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							
		</div>
	</div>
	
	<script>
	$("#adm_edit").validate({
    ignore: [],
	  rules: 
		{
		  first_name: 
			{
				required: true
               
			},
            last_name:
			{
                required: true
            },
			
        },
		messages: 
		{
		  
				first_name: 
				{
					required: "Please Enter the First Name."
					
				},
				last_name:
				{
						required: "Please enter Last Name."
				},
				username:
				{
						required: "Please Enter the Username."
				},
			
		 }
	}); 
	</script>
	
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

<script>
function parent_information(){
$('#parent_details').toggle();
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