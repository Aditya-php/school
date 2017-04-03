<style>  input[type=radio] {
    margin: 0px 0px 0px 0px !important;
}
span.help-inline-error {color:red !important;} 
.addsubmit:hover {
    color: #fff;
}
    
    </style>

    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/jquery-filer.css"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/jquery.filer-dragdropbox-theme.css">
<script src="<?php echo base_url(); ?>assets/global/scripts/jquery.filer.js"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/custom.js"></script>-->
 
<div class="page-content-wrapper">
		<div class="page-content ">
        
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
		<div class="portlet light bordered taballs" >
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users" aria-hidden="true"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Add Vendor Basic Details  </span>
					
				</div>
			</div>
			<div class="portlet-body form ">
			<?=get_flashmsg()?>							 							 
		 <?php echo validation_errors(); ?>

        <ul class="nav nav-tabs" id="createNotTab">
          <li class="active"><a href="#theory" data-toggle="tab">Basic Detail</a></li>
          <li><a href="#aim" data-toggle>Full Detail</a></li>
        
        </ul>
        <div id="myTabContent" class="tab-content">
        	
			  <div class="tab-pane active in" id="theory">
				<form action="<?php echo base_url(); ?>admin/vendor/add" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="BasicDeatailsForm">
				<div class="col-md-6">
					<div class="form-group">
					 <label class="control-label adminlabel col-md-4">Nature Of Vendor<span style="color:red;">*</span>:</label>
						 <div class="col-md-8">
						  <select class="detailfields" name="nature_of_vendor">
							<option value="">Select </option>
							<option value="Day Care" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['nature_of_vendor'] == 'Day Care'){ echo "selected"; } ?>>Day Care </option>
							<option value="Pre School" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['nature_of_vendor'] == 'Pre School'){ echo "selected"; } ?>>Pre School </option>
							<option value="School" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['nature_of_vendor'] == 'School'){ echo "selected"; } ?>>School </option>
							<option value="Hobby Classes" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['nature_of_vendor'] == 'Hobby Classes'){ echo "selected"; } ?>>Hobby Classes </option>
							<option value="Other" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['nature_of_vendor'] == 'Other'){ echo "selected"; } ?>> Other</option>
						   </select>	
					 </div>
					 </div>
					 
					 
					 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Vendor Name<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	<input type="text" class="detailfields" name="vendor_name" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['vendor_name']:''?>">
						</div>
					 </div>
                     
					  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Email<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	<input type="email" class="detailfields" name="email" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['email']:''?>">
						</div>
					 </div>
					 
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Mobile Number<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" maxlength ="10"  onKeyPress="return isNumberKey(event)" class="detailfields" name="moblie_1" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['moblie_1']:''?>">
						</div>
					 </div>

					 <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Landline Number<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" maxlength ="10" class="detailfields" name="landline" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['landline']:''?>">
						</div>
					 </div>
					 
					 <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Vendor SPOC<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" class="detailfields" name="vendor_spoc" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['vendor_spoc']:''?>">
						</div>
					 </div>
					 <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Mobile Number<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" maxlength ="10"  onKeyPress="return isNumberKey(event)" class="detailfields" name="moblie_2" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['moblie_2']:''?>">
						</div>
					 </div>
					  <?php 
					  if(!empty($this->session->userdata("vendorData")['location_vendor'])){ 
					  $locationView = json_decode($this->session->userdata("vendorData")['location_vendor'],true);
					  $j = count($locationView['city']);
					  for($i =0;$i < count($locationView['city']);$i++){
					  ?>	
					  <div class="location-div">
						<div class="col-md-6">
							<h2>Location 1</h2>
						</div>
						<div class="col-md-6">
						<i class="fa fa-plus-circle addmore-divs" aria-hidden="true"></i>
						</div>
						<div class="clear"></div>
						<div class="form-group">
						<label class="control-label adminlabel col-md-4"> City<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	    <select name="city[]" id="city1" class="detailfields"   onchange="fetchArea();">
			                      <option value="">Select City</option>
			                      <?php  foreach($location as $city): ?>
			                        <option value="<?php echo @$city->id; ?>" <?php if($locationView['city'][$i] == @$city->id){ echo "selected"; } ?>><?php echo @$city->city_name; ?></option>
			                      <?php endforeach;  ?>  
			                    </select>
						</div>
					  </div>
					  <div class="clear"></div>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Area<span style="color:red;">*</span>: </label>
						 <div class="col-md-8"> 
						 		<select name="area_id[]" id="area_id1" class="detailfields">
			                      <option value="<?php echo $locationView['area_id'][$i]; ?>" <?php if($locationView['area_id'][$i] == @get_area($locationView['area_id'][$i])->id){ echo "selected"; } ?>><?php echo @get_area($locationView['area_id'][$i])->area_name; ?></option>
			                    </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Address: </label>
						 <div class="col-md-8">
						 	 <div id="locationField">
						      <input type="text" class="detailfields" name="address[]" id="autocomplete"  onFocus="geolocate()" value="<?php if($locationView['address'][$i]){ echo @$locationView['address'][$i]; } ?>"></input>
						    </div>
						   	<!-- <input type="text" class="detailfields" name="address[]"> -->
						</div>
					  </div>
					   <div class="clear"></div>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Pincode: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="pin_code[]" value="<?php if($locationView['address'][$i]){ echo @$locationView['pin_code'][$i]; } ?>">
						</div>
					  </div>
					  
					   <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Nature of Location: </label>
						 <div class="col-md-8">
						   <select class="detailfields" id="myselect1" name="nature_of_location[]">
							  <option value=""> Select Location</option>
							  <option value="owned_commercial" <?php if($locationView['nature_of_location'][$i] == 'owned_commercial'){ echo "selected";} ?>> Owned Commercial</option>
							  <option value="rented_commercial" <?php if($locationView['nature_of_location'][$i] == 'rented_commercial'){ echo "selected";} ?>>Rented Commercial</option>
							  <option value="owned_non_commercial" <?php if($locationView['nature_of_location'][$i] == 'owned_non_commercial'){ echo "selected";} ?>>Owned Non Commercial </option>
							  <option value="rented_commercial" <?php if($locationView['nature_of_location'][$i] == 'rented_commercial'){ echo "selected";} ?>> Rented Non Commercial</option>
							  <option value="other" <?php if($locationView['nature_of_location'][$i] == 'other'){ echo "selected";} ?>> Other</option>
						   </select>
							<input type="text" class="show-secondoption1 detailfields" name="location_other[]" value="<?php if(@$locationView['location_other'][$i]){ echo @$locationView['location_other'][$i]; } ?>">
						</div>
					  </div>
					  					 
					 </div>
					  <?php if($i == 0){ break;} }  ?>
					  
					 <div class="location-div" id="location-divshow" style="<?php if($j-1 ==1){ echo "display:block !important;";} ?>">
						
						<div class="col-md-6">
							<h2>Location 2</h2>
						</div>
						<div class="col-md-6">
						<i class="fa fa-times-circle closediv" aria-hidden="true"></i>
						</div>
						<div class="clear"></div>
						<div class="form-group">
						<label class="control-label adminlabel col-md-4"> City<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	    <select name="city[]" id="city2" class="detailfields"   onchange="fetchArea2();">
			                      <option value="">Select City</option>
			                      <?php  foreach($location as $city): ?>
			                        <option value="<?php echo @$city->id; ?>" <?php if($locationView['city'][$j-1] == @$city->id){ echo "selected"; } ?>><?php echo @$city->city_name; ?></option>
			                      <?php endforeach;  ?>  
			                    </select>
						</div>
					  </div>
					  <div class="clear"></div>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Area<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						 		<select name="area_id[]" id="area_id2" class="detailfields">
			                      <option value="<?php echo $locationView['area_id'][$j-1]; ?>" <?php if($locationView['area_id'][$i] == @get_area($locationView['area_id'][$i])->id){ echo "selected"; } ?>>Select Area</option>
			                    </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Address: </label>
						 <div class="col-md-8">
						 <div id="locationField1">
						      <input type="text" class="detailfields" name="address[]" id="autocomplete1"  onFocus="geolocate1()" value="<?php if($locationView['address'][$j-1]){ echo @$locationView['address'][$j-1]; } ?>"></input>
						    </div>
						   	<!-- <input type="text" class="detailfields" name="address[]"> -->
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Pincode: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="pin_code[]" value="<?php if($locationView['address'][$j-1]){ echo @$locationView['pin_code'][$j-1]; } ?>">
						</div>
					  </div>
					  
					   <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Nature of Location: </label>
						 <div class="col-md-8">
						   <select class="detailfields" id="myselect2" name="nature_of_location[]">
							  <option value=""> Select Location</option>
							  <option value="owned_commercial" <?php if($locationView['nature_of_location'][$j-1] == 'owned_commercial'){ echo "selected";} ?>> Owned Commercial</option>
							  <option value="rented_commercial" <?php if($locationView['nature_of_location'][$j-1] == 'rented_commercial'){ echo "selected";} ?>>Rented Commercial</option>
							  <option value="owned_non_commercial" <?php if($locationView['nature_of_location'][$j-1] == 'owned_non_commercial'){ echo "selected";} ?>>Owned Non Commercial </option>
							  <option value="rented_commercial" <?php if($locationView['nature_of_location'][$j-1] == 'rented_commercial'){ echo "selected";} ?>> Rented Non Commercial</option>
							  <option value="other" <?php if($locationView['nature_of_location'][$i] == 'other'){ echo "selected";} ?>> Other</option>
						   </select>
							<input type="text" class="show-secondoption1 show-secondoption2 detailfields" name="location_other[]" value="<?php if(@$locationView['location_other'][$j-1]){ echo @$locationView['location_other'][$j-1]; } ?>">
						</div>
					  </div>			 
					 </div>
					  <?php   } else{ ?>
					   <div class="location-div">
						<div class="col-md-6">
							<h2>Location 1</h2>
						</div>
						<div class="col-md-6">
						<i class="fa fa-plus-circle addmore-divs" aria-hidden="true"></i>
						</div>
						<div class="clear"></div>
						<div class="form-group">
						<label class="control-label adminlabel col-md-4"> City<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	    <select name="city[]" id="city1" class="detailfields"   onchange="fetchArea();">
			                      <option value="">Select City</option>
			                      <?php  foreach($location as $city): ?>
			                        <option value="<?php echo @$city->id; ?>"><?php echo @$city->city_name; ?></option>
			                      <?php endforeach;  ?>  
			                    </select>
						</div>
					  </div>
					  <div class="clear"></div>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Area<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						 		<select name="area_id[]" id="area_id1" class="detailfields">
			                      <option value="">Select Area</option>
			                    </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Address: </label>
						 <div class="col-md-8">
						 	 <div id="locationField">
						      <input type="text" class="detailfields" name="address[]" id="autocomplete"  onFocus="geolocate()"></input>
						    </div>
						   	<!-- <input type="text" class="detailfields" name="address[]"> -->
						</div>
					  </div>
					   <div class="clear"></div>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Pincode: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="pin_code[]">
						</div>
					  </div>
					  
					   <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Nature of Location: </label>
						 <div class="col-md-8">
						   <select class="detailfields" id="myselect1" name="nature_of_location[]">
							  <option value=""> Select Location</option>
							  <option value="owned_commercial"> Owned Commercial</option>
							  <option value="rented_commercial">Rented Commercial</option>
							  <option value="owned_non_commercial">Owned Non Commercial </option>
							  <option value="rented_commercial"> Rented Non Commercial</option>
							  <option value="other"> Other</option>
						   </select>
							<input type="text" class="show-secondoption1 detailfields" name="location_other[]">
						</div>
					  </div>
					  					 
					 </div>
					  
					 <div class="location-div" id="location-divshow" >
						
						<div class="col-md-6">
							<h2>Location 2</h2>
						</div>
						<div class="col-md-6">
						<i class="fa fa-times-circle closediv" aria-hidden="true"></i>
						</div>
						<div class="clear"></div>
						<div class="form-group">
						<label class="control-label adminlabel col-md-4"> City<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						   	    <select name="city[]" id="city2" class="detailfields"   onchange="fetchArea2();" disabled>
			                      <option value="">Select City</option>
			                      <?php  foreach($location as $city): ?>
			                        <option value="<?php echo @$city->id; ?>"><?php echo @$city->city_name; ?></option>
			                      <?php endforeach;  ?>  
			                    </select>
						</div>
					  </div>
					  <div class="clear"></div>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Area<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						 		<select name="area_id[]" id="area_id2" class="detailfields" disabled>
			                      <option value="">Select Area</option>
			                    </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Address: </label>
						 <div class="col-md-8">
						 <div id="locationField1">
						      <input type="text" class="detailfields" name="address[]" id="autocomplete1"  onFocus="geolocate1()" disabled></input>
						    </div>
						   	<!-- <input type="text" class="detailfields" name="address[]"> -->
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Pincode: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="pin_code[]" disabled>
						</div>
					  </div>
					  
					   <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Nature of Location: </label>
						 <div class="col-md-8">
						   <select class="detailfields" id="myselect2" name="nature_of_location[]" disabled>
							  <option value=""> Select Location</option>
							  <option value="owned_commercial"> Owned Commercial</option>
							  <option value="rented_commercial">Rented Commercial</option>
							  <option value="owned_non_commercial">Owned Non Commercial </option>
							  <option value="rented_commercial"> Rented Non Commercial</option>
							  <option value="other"> Other</option>
						   </select>
							<input type="text" class="show-secondoption1 show-secondoption2 detailfields" name="location_other[]" disabled>
						</div>
					  </div>
					  					 
					 </div>
					  <?php }  ?>
					  
					  
					 <!-- end location here -->
					 <!-- end location here -->
					 <div class="clear"></div>
					 <br/>
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Services Offered<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						    <select class="detailfields" name="service_id[]" multiple>
							  <option value="">  Select Services </option>
							  <?php foreach($services as $service): ?>
							  <option value="<?php echo $service->id?>" <?php if(!empty($this->session->userdata("vendorData")) && in_array($service->id,explode(',',$this->session->userdata("vendorData")['service_id']))){ echo "selected"; } ?>><?php echo$service->name; ?></option>
							  <?php endforeach; ?>
						   </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Year of Establishment: </label>
						 <div class="col-md-8">
						   	<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="year_of_establishment" value="<?php echo (!empty($this->session->userdata("vendorData")['year_of_establishment']))?$this->session->userdata("vendorData")['year_of_establishment']:''?>">
						</div>
					  </div>
					<div class="clear"></div>	
					<div class="form-group">
						<label class="control-label adminlabel col-md-4"> Age Group  </label>
						 <div class="col-md-4">
						 <h4 class="pricemin">Min</h4>
							<?php $minage = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15); ?>
						    <select class="detailfields1" name="age_min" id="age_min">
							 <option value=""> Select min age </option>
							 <?php foreach($minage as $mkey => $mvalue): ?>
							  <option value="<?php echo $mvalue ?>" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['age_min'] == $mvalue){ echo "selected"; } ?>> <?php echo $mvalue ?> </option>
							 <?php endforeach; ?>
						   </select>
						</div>
						 <div class="col-md-4">
						  <h4 class="pricemin">Max</h4>
						  <?php $maxage = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15); ?>
						     <select class="detailfields1" name="age_max" id="age_max">
							 <option value=""> Select max age </option>
							 <?php foreach($maxage as $key => $value): ?>
							  <option value="<?php echo $value ?>" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['age_max'] == $value){ echo "selected"; } ?>> <?php echo $value ?> </option>
							 <?php endforeach; ?>
						   </select>
						</div>
					 </div>	
					  
					  <h2 class="addheadding">Budget Range </h2>
					 
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Hourly  </label>
						 <div class="col-md-4">
						 <h4 class="pricemin">Min</h4>
							<input type="text" class="detailfields" name="hourly_min" id="hourly_min"  value="<?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['hourly_min']){ echo $this->session->userdata("vendorData")['hourly_min']; } ?>"></input>
							<!--<?php $minH = array(1,2,3,4,5); ?>
						    <select class="detailfields1" name="hourly_min">
							 <option> Select min hourly </option>
							 <?php foreach($minH as $keyh => $valueh): ?>
							  <option value="<?php echo $valueh ?>" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['hourly_min'] == $valueh){ echo "selected"; } ?>> <?php echo $valueh ?> </option>
							 <?php endforeach; ?>
						   </select>-->
						</div>
						 <div class="col-md-4">
						  <h4 class="pricemin">Max</h4>
						  <input type="text" class="detailfields" name="hourly_max" id="hourly_max" onKeyPress="return isNumberKey(event)" value="<?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['hourly_max']){ echo $this->session->userdata("vendorData")['hourly_max']; } ?>"></input>
						    <!--<?php $maxH = array(6,7,8,9,10); ?>
						     <select class="detailfields1" name="hourly_max">
							<option> Select max hourly </option>
							 <?php foreach($maxH as $keyhm => $valuehm): ?>
							  <option value="<?php echo $valuehm ?>" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['hourly_max'] == $valuehm){ echo "selected"; } ?>> <?php echo $valuehm ?> </option>
							 <?php endforeach; ?>
							 
						   </select>-->
						</div>
					  </div>
 
					 
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Monthly  </label>
						 <div class="col-md-4">
						 <h4 class="pricemin">Min</h4>
						 <input type="text" class="detailfields" name="monthly_min" id="monthly_min" onKeyPress="return isNumberKey(event)" value="<?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['monthly_min']){ echo $this->session->userdata("vendorData")['monthly_min']; } ?>"></input>
						 <!--<?php $minMon = array(1,2,3,4,5); ?>
						    <select class="detailfields1" name="monthly_min">
							 <option> Select min monthly </option>
							 <?php foreach($minMon as $keymm => $valuemm): ?>
							  <option value="<?php echo $valuemm ?>" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['monthly_min'] == $valuemm){ echo "selected"; } ?>> <?php echo $valuemm ?> </option>
							 <?php endforeach; ?>
							  
						   </select>-->
						</div>
						 <div class="col-md-4">
						  <h4 class="pricemin">Max</h4>
						  <input type="text" class="detailfields" name="monthly_max" id="monthly_max" onKeyPress="return isNumberKey(event)" value="<?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['monthly_max']){ echo $this->session->userdata("vendorData")['monthly_max']; } ?>"></input>
						    <!--<?php $maxMon = array(6,7,8,9,10); ?>
						     <select class="detailfields1" name="monthly_max">
							 <option> Select max monthly </option>
							 <?php foreach($maxMon as $k => $v): ?>
							  <option value="<?php echo $v ?>" <?php if(!empty($this->session->userdata("vendorData")) && $this->session->userdata("vendorData")['monthly_max'] == $v){ echo "selected"; } ?>> <?php echo $v ?> </option>
							 <?php endforeach; ?>
							 
						   </select>-->
						</div>
					  </div>
				</div>	  
					    
					  <!--input type="file" name="files[]" id="filer_input2" multiple="multiple"-->
					     
					<div class="clear"></div>	
					 <div class="col-md-12">
					<div class="form-group"><br>
						<label class="control-label adminlabel col-md-2"> Image </label>
						 <div class="col-md-10">
						 <br>
						   <input type="file" name="vendor_images[]" class="upload_6 uploadimgs" />
						<?php if(!empty($this->session->userdata("vendorData")['vendor_images'])){ ?>
						<div class="jFiler-items jFiler-row" id="img1">
						<ul class="jFiler-items-list jFiler-items-grid">
							<?php $i =1; foreach(json_decode($this->session->userdata("vendorData")['vendor_images']) as $image){ ?>
							<?php if(file_exists('./assets/vendor_image/'.$image)){ ?>
							<li class="jFiler-item" data-jfiler-index="0" style="" id="<?php echo $i; ?>">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$image)[1]; ?>"><?php echo explode('_',$image)[1]; ?></b></span>  
								   
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $image; ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							</div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage"  id="<?php echo $image; ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
							<?php } ?>
							<?php $i++; } ?>
						 </ul>
					 </div>
						<?php } ?>						   
						</div>
					  </div>	
					 </div>
				 <div class="col-md-6">		
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> Vendor logo </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="vendor_logo">
						<?php if(!empty($this->session->userdata("vendorData")['vendor_logo']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['vendor_logo'])){ ?>
						<div class="jFiler-items jFiler-row" id="img2">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['vendor_logo'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['vendor_logo'])[1]; ?></b></span>  
								     
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['vendor_logo'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['vendor_logo'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>	
					  
					   <h2 class="addheadding">vendor KYC Doc Upload </h2>
					   
					   <div class="form-group"> 
						<label class="control-label adminlabel col-md-4">   PAN of entity<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_pan_entity">
						<?php if(!empty($this->session->userdata("vendorData")['v_pan_entity']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_pan_entity'])){ ?>
						<div class="jFiler-items jFiler-row" id="img3">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_pan_entity'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_pan_entity'])[1]; ?></b></span>  
								    
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_pan_entity'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_pan_entity'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					  
					  
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> PAN of vendor SPOC<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_pan_spoc">
						<?php if(!empty($this->session->userdata("vendorData")['v_pan_spoc']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_pan_spoc'])){ ?>
						<div class="jFiler-items jFiler-row" id="img4">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_pan_spoc'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_pan_spoc'])[1]; ?></b></span>  
								 
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_pan_spoc'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_pan_spoc'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					  <div class="clear"></div>
					  
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4">  Address proof of SPOC<span style="color:red;">*</span>:</label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_address_proff_spoc">
						<?php if(!empty($this->session->userdata("vendorData")['v_address_proff_spoc']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_address_proff_spoc'])){ ?>
						<div class="jFiler-items jFiler-row" id="img5">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_address_proff_spoc'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_address_proff_spoc'])[1]; ?></b></span>  
								     
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_address_proff_spoc'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_address_proff_spoc'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					   <div class="clear"></div>
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> Registration : </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_registration">
						<?php if(!empty($this->session->userdata("vendorData")['v_registration']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_registration'])){ ?>
						<div class="jFiler-items jFiler-row" id="img6">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_registration'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_registration'])[1]; ?></b></span>  
								  
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_registration'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_registration'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					  
					   <div class="clear"></div>
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> Owner academic proofs<span style="color:red;">*</span>: </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_owner_academic">
						<?php if(!empty($this->session->userdata("vendorData")['v_owner_academic']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_owner_academic'])){ ?>
						<div class="jFiler-items jFiler-row" id="img7">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_owner_academic'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_owner_academic'])[1]; ?></b></span>  
								     
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_owner_academic'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_owner_academic'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					   <div class="clear"></div>
					  
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> Tin Number of Entity : </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_tin_entity">
						<?php if(!empty($this->session->userdata("vendorData")['v_tin_entity']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_tin_entity'])){ ?>
						<div class="jFiler-items jFiler-row" id="img8">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_tin_entity'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_tin_entity'])[1]; ?></b></span>  
								      
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_tin_entity'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_tin_entity'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					  
					   <div class="clear"></div>
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> Aadhar card of Entity : </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_adhar">
						<?php if(!empty($this->session->userdata("vendorData")['v_adhar']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_adhar'])){ ?>
						<div class="jFiler-items jFiler-row" id="img9">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_adhar'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_adhar'])[1]; ?></b></span>  
								     
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_adhar'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_adhar'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
					   <div class="clear"></div>
					  
					  <div class="form-group"> 
						<label class="control-label adminlabel col-md-4"> Bank Account of Entity<span style="color:red;">*</span> </label>
						 <div class="col-md-8">
						<input type="file" class="detailfile upload_single" name="v_bank">
						<?php if(!empty($this->session->userdata("vendorData")['v_bank']) && file_exists('./assets/vendor_image/'.$this->session->userdata("vendorData")['v_bank'])){ ?>
						<div class="jFiler-items jFiler-row" id="img10">
						<ul class="jFiler-items-list jFiler-items-grid">
							<li class="jFiler-item" data-jfiler-index="0" style="">                        
							<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                               
							 <div class="jFiler-item-thumb">                                   
							 <div class="jFiler-item-status"></div>                                  
							 <div class="jFiler-item-info">                                    
								 <span class="jFiler-item-title">
								 <b title="<?php echo explode('_',$this->session->userdata("vendorData")['v_bank'])[1]; ?>"><?php echo explode('_',$this->session->userdata("vendorData")['v_bank'])[1]; ?></b></span>  
								  
							 </div>                                   
							 <div class="jFiler-item-thumb-image">
								<img src="<?php echo base_url(); ?>assets/vendor_image/<?php echo $this->session->userdata("vendorData")['v_bank'] ?>" draggable="false"></div> 
							 </div>                                
							 <div class="jFiler-item-assets jFiler-row"> 
							 <ul class="list-inline pull-left">   
							 <li><div class="jFiler-jProgressBar" style="display: none;">
							 <div class="bar" style="width: 100%;">
							 </div>
							 </div>
							 <div class="jFiler-item-others text-error">
							 </div>
							 </li>                                    
							 </ul>                            
							 <ul class="list-inline pull-right">
							 <li><a class="icon-jfi-trash jFiler-item-trash-action deleteImage" id="<?php echo $this->session->userdata("vendorData")['v_bank'] ?>"></a>
							 </li>                                  
							 </ul>                             
							 </div>                          
							 </div>                       
							 </div>                    
							 </li>
						 </ul>
					 </div>
						<?php } ?>
						</div>
					  </div>
						
					 <h2 class="addheadding">Vendor Social Media Link </h2>
					 
					 <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Facebook </label>
						 <div class="col-md-8">
						   	<input type="text" class="detailfields" name="v_facebook" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['v_facebook']:''?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Linkedin </label>
						 <div class="col-md-8">
						   	<input type="text" class="detailfields" name="v_linkedin" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['v_linkedin']:''?>">
						</div>
					  </div>
					  
					  
					  <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Google+ </label>
						 <div class="col-md-8">
						   	<input type="text" class="detailfields" name="v_google_plus" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['v_google_plus']:''?>">
						</div>
					  </div>
					  
					  
					   <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Description<span style="color:red;">*</span> : </label>
						 <div class="col-md-8">
						   <textarea  name="description" class="detailfields"   rows="5" value="<?php echo (!empty($this->session->userdata("vendorData")))?$this->session->userdata("vendorData")['description']:''?>"> </textarea>
						</div>
					  </div>
					  
					   <div class="form-group">
						<label class="control-label adminlabel col-md-4"> Status : </label>
						 <div class="col-md-8">
						    <select class="detailfields" name="v_status">
							   <option value="">Select Status</option>
							   <option value="1">Active</option>
							   <option value="2">Inactive</option>
						   </select>
						</div>
					  </div>
					  
					 
					<div class="clear"></div>	
					 <center> <button class="addsubmit" type="submit"><span class="glyphicon glyphicon-arrow-right"></span>Next </button><a href="<?php echo base_url()."admin/vendor/" ?>" class="addsubmit" style="margin-left:5px"> Cancel </a>  </center>
				 </div>
				 </form>
			  </div>
		 	   	
        </div>
 
    		
										
										 
					</div>
			</div>
							
		</div>
	</div>
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>	
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/jquery.filer.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/jquery.filer.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/custom.js" type="text/javascript"></script> 	
<script type="text/javascript" src="<?php echo base_url(); ?>frontend_assets/js/jquery.validate.min.js"></script>	

<script>
	
      var placeSearch, autocomplete,autocomplete1;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      function geolocate1() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
 </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGv-IITVOmG5XHIO3b99MmaMfGOe8vDgQ&libraries=places&callback=initAutocomplete"
        async defer></script>

<script type="text/javascript">
	$('.deleteImage').click(function(){
		var name = $(this).attr('id');
		var count  = $(this).parent().parent().parent().parent().parent().parent().parent().children().length;
		if(count == 1){
			var _id = $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('id');
		}
		else{
			var _id = $(this).parent().parent().parent().parent().parent().parent().attr('id');
		}
		//alert($(this).parent().parent().parent().parent().parent().parent().attr('id'));
		//return false;
		
		//return false;
		
		if(confirm('Are you sure delete this image!')){
			$.ajax({
      		url: "<?php echo base_url('admin/vendor/deleteImage') ?>",
      		method: 'POST',
      		data:   {name: name},
      		dataType: 'text',
      		success: function(response){
				$('#'+_id).remove();
      		}
			});
		}
	});
	
	function fetchArea()
  	{
    	var city_id = $('#city1 :selected').val();
    	
    	$.ajax({
      		url: "<?php echo base_url('admin/vendor/getAreaName') ?>",
      		method: 'POST',
      		data:   {city_id: city_id},
      		dataType: 'text',
      		success: function(response){
          		$('#area_id1').html(response);
          		//findAddress(response.latitude, response.longitude);
      		}
    	});
  	}
  	function fetchArea2()
  	{
    	var city_id = $('#city2 :selected').val();
    	
    	$.ajax({
      		url: "<?php echo base_url('admin/vendor/getAreaName') ?>",
      		method: 'POST',
      		data:   {city_id: city_id},
      		dataType: 'text',
      		success: function(response){
          		$('#area_id2').html(response);
          		//findAddress(response.latitude, response.longitude);
      		}
    	});
  	}

	  function findAddress(lat,lng) {

	    var input = document.getElementById('address_redemption'+count);
	    var cityBounds = new google.maps.LatLngBounds(
	         new google.maps.LatLng(lat, lng)
	     );
	    var options = {   
	      bounds: cityBounds,
	      componentRestrictions: {country: 'khm'}
	    };
	      var autocomplete = new google.maps.places.Autocomplete(input, options);
	    google.maps.event.addListener(autocomplete, 'place_changed', function(){
	      var place = autocomplete.getPlace();
	      //var address = place.formatted_address;
	      var latitude = place.geometry.location.lat();
	      var longitude = place.geometry.location.lng();
	      //var total_info = [address,latitude,longitude];
	      $('#deal_redemtion_locations'+count).val(latitude+','+longitude);

	    });
	    google.maps.event.addDomListener(window, 'load', findAddress);

	   }
</script>

<script>
	$('select[name="service_id[]"]').select2();

	$(".yes").click(function(){
        $(this).parent().parent().parent().parent().next().next().find('input').show('slow');
    });
	 $(".no").click(function(){
        $(this).parent().parent().parent().parent().next().next().find('input').hide('');
    });

	$(document).ready(function() {
	   $('#myselect1').on('change',function(){
	     var myselect1 = $('#myselect1').find(":selected").val();
    		if(myselect1 == 'other'){
    			$('.show-secondoption1').show();
    			$('.show-secondoption1').prop('disabled',false);
    			$('.show-secondoption2').prop('disabled',false);
    		}
    		else{
    			$('.show-secondoption1').hide();
    			 $('.show-secondoption1').prop('disabled',true);
    			 $('.show-secondoption2').prop('disabled',true);
    			//$('.show-secondoption1').attr('value','');
    		}
	   });
	    $('#myselect2').on('change',function(){	
	       	var myselect2 = $('#myselect2').find(":selected").val();
    		if(myselect2 == 'other'){
    			$('.show-secondoption2').show();
    			$('.show-secondoption2').prop('disabled',false);
    			$('.show-secondoption1').prop('disabled',false);
    		}
    		else{
    			$('.show-secondoption2').hide();
    			$('.show-secondoption2').prop('disabled',true);
    			$('.show-secondoption2').prop('disabled',true);
    			//$('.show-secondoption2').attr('value',''); 
    		}
        });   
		
	
		
		$('select[name="nature_of_location[]"]').change(function() { 
			
			var opval = $(this).val();		
			if(opval=="other"){
				$(this).next().show('');
			}
			else{
				$(this).next().hide('');
				$(this).next().attr('value','');
			}
		});

		$(".addmore-divs").click(function(){
			//var inputCount = $('#location-divshow').find('select').length;
			//var selectCount = $('#location-divshow').find('input').length;
			$('#location-divshow select').each(function() {
				$(this).prop('disabled', false);
				  
			});
			$('#location-divshow input').each(function() {
				$(this).prop('disabled', false);
				  
			});
			$("#location-divshow").show('slow');
		});
		
		$(".closediv").click(function(){
			$('#location-divshow select').each(function() {
				$(this).prop('disabled', true);
				  
			});
			$('#location-divshow input').each(function() {
				$(this).prop('disabled', true);
				  
			});
			$('#location-divshow').hide('slow');
		});
		
		$("#features_id1").click(function(){
			$('#features_text1').show('slow');
		});
		
		$("#features_id2").click(function(){
			$('#features_text1').hide('slow');
		});
	});

</script>
<script type="text/javascript">
        jQuery().ready(function() {
            // validate form on keyup and submit
            var v = jQuery("#BasicDeatailsForm").validate({
				
                rules: {
                    nature_of_vendor: {
                        required: true,
                    },
                    vendor_name: {
                        required: true,
                        //lettersonly: true,
                    },
					description: {
                        required: true,
						maxlength: 200
                    },
                    moblie_1: {
                        required: true,
                        is_integer: true,
                        maxlength: 10,
						minlength: 10,
                    },
                    moblie_2: {
                        required: true,
                        is_integer: true,
                        maxlength: 10,
						minlength: 10,
                    },
					landline: {
						required: true,
                        is_integer: true,
                        maxlength: 10,
						minlength: 10,
                    },
					hourly_max: {
						is_integer: true,
						le: '#hourly_min'
                    },
					hourly_min: {
						is_integer: true,
                    },
					monthly_max: {
						is_integer: true,
						le: '#monthly_min'
                    },
					monthly_min: {
						is_integer: true,
                    },
					age_max: {
						le: '#age_min'
                    }, 
                    email: {
                        required: true,
                        email: true,
                        remote:"<?php echo base_url('admin/vendor/isUniqueEmail'); ?>",
                    },

                    vendor_spoc: {
                        required: true,
						
                    },
                    "city[]": {
                        required: true,
                    },
					"area_id[]": {
                        required: true,
                    },
                    area_id: {
                        required: true,
                    },
                    pin_code: {
                        is_integer: true,
                    },
					"service_id[]": {
                        required: true,
                    },
					<?php if(empty($this->session->userdata('vendorData')['v_pan_entity'])){ ?>
                    v_pan_entity: {
                        required: true
                    },
					<?php } ?>
					<?php if(empty($this->session->userdata('vendorData')['v_pan_spoc'])){ ?>
                    v_pan_spoc: {
                        required: true,
                    },
					<?php } ?>
					<?php if(empty($this->session->userdata('vendorData')['v_address_proff_spoc'])){ ?>
                    v_address_proff_spoc: {
                        required: true,
                        
                    },
					<?php } ?>
					<?php if(empty($this->session->userdata('vendorData')['v_owner_academic'])){ ?>
                    v_owner_academic: {
                        required: true,
                        
                    },
					<?php } ?>
					<?php if(empty($this->session->userdata('vendorData')['v_bank'])){ ?>
                    v_bank: {
                        required: true,
                    },
					<?php } ?>
                   
                },
                messages: {
					moblie_1: {
                       required:"This field is required",
                        is_integer: true,
                        maxlength: "mobile number required maximum 10 characters a long",
						minlength: "mobile number required minimum 10 characters a long"
                    },
                    moblie_2: {
                       required:"This field is required",
                        is_integer: true,
                         maxlength: "mobile number required maximum 10 characters a long",
						minlength: "mobile number required minimum 10 characters a long"
                    },
					landline: {
						required:"This field is required",
                        is_integer: true,
                      maxlength: "mobile number required maximum 10 characters a long",
						minlength: "mobile number required minimum 10 characters a long"
                    },
					email: {
                        required:"This field is required",
                        remote: 'Email Id already exist'
                    },
					"city[]": "Please select city",
					"area_id[]": "Please select area",
                    /*license: {
                        required:"This field is required",
                        extension: 'Please upload only image file'
                    },*/
                },
                errorElement: "span",
                errorClass: "help-inline-error",
            });
			
			$('[name="hourly_min"]').on('change blur keyup', function() {
				$('[name="hourly_max"]').valid();
			});
			$('[name="monthly_min"]').on('change blur keyup', function() {
				$('[name="monthly_max"]').valid();
			});
			$('[name="age_min"]').on('change blur keyup', function() {
				$('[name="age_max"]').valid();
			});
	
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Please enter alphabet only"); 
			
	
            jQuery.validator.addMethod("is_integer", function(value,element) {
                if(value=='' || value==null)
                {
                    return true;
                }
                return  /^[0-9]+$/i.test(value);
            },'Please enter positive integer only..!!');
			
			
			 $.validator.addMethod('le', function (value, element, param) {
				return this.optional(element) || parseInt(value) >= parseInt($(param).val());
			}, 'Invalid value');
	
        });

</script>

<script type="text/javascript">
function isNumberKey(evt)//For no to be entered only no on keypress
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45) return false;
return true;
}
</script>