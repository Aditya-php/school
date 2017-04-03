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
                    </ul><?php //pr();die;?>
		
        <!--Breadcrumb End-->
		<div class="portlet light bordered taballs" >
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users" aria-hidden="true"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Edit Vendor Full Details  </span>
					
				</div>
			</div>
			<div class="portlet-body form ">
			<?=get_flashmsg()?>							 							 
		 <?php echo validation_errors(); ?>

        <ul class="nav nav-tabs" id="createNotTab">
          <li><a href="#theory" data-toggle>Basic Detail</a></li>
          <li class="active"><a href="#aim" data-toggle>Full Detail</a></li>
        
        </ul>
        <div id="myTabContent" class="tab-content">
        	
          <div class="tab-pane active in" id="aim">
           <form action="<?php echo base_url(); ?>admin/vendor/final_edit/<?php echo ID_encode($result['id']); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="finalDetailsForm">	
			<div class="col-md-6">
				<h2 class="addheadding">Learning </h2>	
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Nanny Assistance : </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="learning_nanny_assistance" value=""><?php echo $result['learning_nanny_assistance']; ?></textarea>
					 </div>
				 </div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Hourly Day Care on Demand : </label>
					 <div class="col-md-8">
					<textarea rows="5" cols="10"  class="detailfields" name="learning_hourly_day_care" value=""><?php echo $result['learning_hourly_day_care']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Flexible & Customized Day Care : </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields" name="learning_flexible_customize_care" value=""><?php echo $result['learning_flexible_customize_care']; ?></textarea>
					 </div>
				 </div>
				  <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">Day Care : </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"   class="detailfields" name="learning_day_care" value=""><?php echo $result['learning_day_care']; ?></textarea>
					 </div>
				 </div>
				 
				 <h2 class="addheadding">Care </h2>	
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Features: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields" name="care_features" value=""><?php echo $result['care_features']; ?></textarea>
					 </div>
				 </div>
				 
				  <h2 class="addheadding">Staff </h2>	
				<div class="form-group">
					<?php $staff =  explode(':',$result['staff_ratio']); ?>
					 <label class="control-label adminlabel col-md-4"> Ratio: </label>
					 <div class="col-md-3">
						<input type="text" class="detailfields" name="staff_ratio_1" value="<?php echo $staff[0]; ?>">
					 </div>
					 <div class="col-md-2">
						<h5 class="colum-h5">:</h5>
					 </div>
					 <div class="col-md-3">
						<input type="text" class="detailfields" name="staff_ratio_2" value="<?php echo $staff[1]; ?>">
					 </div>
				 </div>
				 <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Total Teacher: </label>
					 <div class="col-md-8">
						<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="staff_total_teacher" value="<?php echo $result['staff_total_teacher']; ?>">
					 </div>
				 </div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Total Nanny: </label>
					 <div class="col-md-8">
						<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="staff_total_nanny" value="<?php echo $result['staff_total_nanny']; ?>">
					 </div>
				 </div>
				 
				  <h2 class="addheadding">Overall Management </h2>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">Features : </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="overall_manage_features" value=""><?php echo $result['overall_manage_features']; ?></textarea>
					 </div>
				 </div>	

			<h2 class="addheadding">Cleanliness   </h2>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">Features : </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="cleanliness_features" value=""><?php echo $result['cleanliness_features']; ?></textarea>
					 </div>
				 </div>

		<h2 class="addheadding">Safegurading   </h2>		
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">CCTV Camera : </label>
					 <div class="col-md-2 radiobutton-adds">
						<input type="radio" class="yes" name="safegurading_cctv" value="1" <?php if($result['safegurading_cctv'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" class="no" name="safegurading_cctv" value="0" <?php if($result['safegurading_cctv'] == 0){ echo "checked"; } ?>><h6 class="radioyes">No </h6>
					 </div>
				</div>
				<div class="clear"></div>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields features_text_field" id="" name="safegurading_cctv_text" value="" style="<?php if($result['safegurading_cctv'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['safegurading_cctv_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">  Guard : </label>
					 <div class="col-md-2 radiobutton-adds">
						<input type="radio" class="yes" name="safegurading_guard" value="1" <?php if($result['safegurading_guard'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" class="no" name="safegurading_guard" value="0" <?php if($result['safegurading_guard'] == 0){ echo "checked"; } ?>><h6 class="radioyes">No </h6>
					 </div>
				</div>
				<div class="clear"></div>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="safegurading_guard_text" value="" style="<?php if($result['safegurading_guard'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['safegurading_guard_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">  Fire extinguisher : </label>
					 <div class="col-md-2 radiobutton-adds">
						<input type="radio" class="yes" name="safegurading_fire_extinguisher" value="1" <?php if($result['safegurading_fire_extinguisher'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" class="no" name="safegurading_fire_extinguisher" value="0" <?php if($result['safegurading_fire_extinguisher'] == 0){ echo "checked"; } ?>><h6 class="radioyes">No </h6>
					 </div>
				</div>
				<div class="clear"></div>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="safegurading_fire_extinguisher_text" value="" style="<?php if($result['safegurading_fire_extinguisher'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['safegurading_fire_extinguisher_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Other: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields" name="safegurading_other" value=""><?php echo $result['safegurading_other']; ?></textarea>
					 </div>
				 </div>
				
				<h2 class="addheadding">Facilites   </h2>
				<div class="form-group">
					 <label class="control-label adminlabel col-md-4">Garden : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_garden" value="1" id="" class="yes" <?php if($result['facilites_garden'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_garden" value="0" <?php if($result['facilites_garden'] == 0){ echo "checked"; } ?> id="" class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="features_text1" name="facilites_garden_text" value="" style="<?php if($result['facilites_garden'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['facilites_garden_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">Labs : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_labs" value="1" class="yes" <?php if($result['facilites_labs'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_labs" value="0" <?php if($result['facilites_labs'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="facilites_labs_text" value="" style="<?php if($result['facilites_labs'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['facilites_labs_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">kitchen : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_kitchen" value="1" class="yes" <?php if($result['facilites_kitchen'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_kitchen" value="0" <?php if($result['facilites_kitchen'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="facilites_kitchen_text" value="" style="<?php if($result['facilites_kitchen'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['facilites_kitchen_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">Play Station : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_play_station" value="1" class="yes" <?php if($result['facilites_play_station'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="facilites_play_station" value="0" <?php if($result['facilites_play_station'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="facilites_play_station_text" value="" style="<?php if($result['facilites_play_station'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['facilites_play_station_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> No of Rooms: </label>
					 <div class="col-md-8">
						<input type="text" onpaste="return false" onKeyPress="return isNumberKey(event)" class="detailfields" name="facilites_on_of_rooms" value="<?php echo $result['facilites_on_of_rooms']; ?>">
					 </div>
				 </div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Other: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="facilites_other" value="">
						<?php echo $result['facilites_other']; ?></textarea>
					 </div>
				 </div>
				 
				 <h2 class="addheadding">Co-Curricular Activities   </h2>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Features: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="activities_features" value="">
						<?php echo $result['activities_features']; ?></textarea>
					 </div>
				 </div>
				 
				  <h2 class="addheadding">Free Structure  </h2>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Free Structure: </label>
					 <div class="col-md-8">
						 <select class="detailfields" name="free_free_structure">
							  <option>    Free Structure   </option>
							   <option>    Free Structure 1   </option>
							   <option>     Free Structure 2</option>
							  <option>    Free Structure 3 </option>
							 <option>   Free Structure  4 </option>	
						   </select>
					 </div>
				 </div>
				  <h2 class="addheadding">Overall Standard    </h2>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Features: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields" name="overall_features" value=""><?php echo $result['overall_features']; ?></textarea>
					 </div>
				 </div>
				 
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  First Aid : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_first_aid" value="1" class="yes" <?php if($result['overall_first_aid'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_first_aid" value="0" <?php if($result['overall_first_aid'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_first_aid_text" value="" style="<?php if($result['overall_first_aid'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_first_aid_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">    Food/Nutrition : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_food_nutrition" value="1" class="yes" <?php if($result['overall_food_nutrition'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_food_nutrition" value="0" <?php if($result['overall_food_nutrition'] == 0){ echo "checked"; } ?> class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_food_nutrition_text" value="" style="<?php if($result['overall_food_nutrition'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_food_nutrition_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">    Summer camps+winter camps : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_summer_winter_campus" value="1" class="yes" <?php if($result['overall_summer_winter_campus'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_summer_winter_campus" value="0" <?php if($result['overall_summer_winter_campus'] == 0){ echo "checked"; } ?> class="no" ><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_summer_winter_campus_text" value="" style="<?php if($result['overall_summer_winter_campus'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_summer_winter_campus_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">    Childcare for special needs children : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_childcare" value="1" class="yes" <?php if($result['overall_childcare'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_childcare" value="0" <?php if($result['overall_childcare'] == 0){ echo "checked"; } ?> class="no" ><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_childcare_text" value="" style="<?php if($result['overall_childcare'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_childcare_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">    Garden/swings : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_garden_swings" value="1" class="yes" <?php if($result['overall_garden_swings'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_garden_swings" value="0" <?php if($result['overall_garden_swings'] == 0){ echo "checked"; } ?> class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_garden_swings_text" value="" style="<?php if($result['overall_garden_swings'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_garden_swings_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">    Pick N Drop : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_pick_n_drop" value="1" class="yes" <?php if($result['overall_pick_n_drop'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_pick_n_drop" value="0" <?php if($result['overall_pick_n_drop'] == 0){ echo "checked"; } ?> class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_pick_n_drop_text" value="" style="<?php if($result['overall_pick_n_drop'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_pick_n_drop_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4">    Communication Channels for Parents : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_communication_parents" value="1"  class="yes" <?php if($result['overall_communication_parents'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_communication_parents" value="0" <?php if($result['overall_communication_parents'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_communication_parents_text" value="" style="<?php if($result['overall_communication_parents'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_communication_parents_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Staff Turnover : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_staff_turnover" value="1"  class="yes" <?php if($result['overall_staff_turnover'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_staff_turnover" value="0" <?php if($result['overall_staff_turnover'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_staff_turnover_text" value="" style="<?php if($result['overall_staff_turnover'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_staff_turnover_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Onsidt Screening Facility : </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_onside_screening" value="1"  class="yes" <?php if($result['overall_onside_screening'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="overall_onside_screening" value="0" <?php if($result['overall_onside_screening'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="overall_onside_screening_text" value="" style="<?php if($result['overall_onside_screening'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['overall_onside_screening_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				  <h2 class="addheadding"> Finanial & management Stability </h2>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Features: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="finacial_features" value=""><?php  echo $result['finacial_features']; ?></textarea>
					 </div>
				 </div>
				 
				 <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Medical Facility & Doc on call: </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="finacial_medical_facility" value="1"  class="yes" <?php if($result['finacial_medical_facility'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="finacial_medical_facility" value="0" <?php if($result['finacial_medical_facility'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="finacial_medical_facility_text" value="" style="<?php if($result['finacial_medical_facility'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['finacial_medical_facility_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				  <h2 class="addheadding">Other ancillary activites like homework assistance, PT, Yoga etc.</h2>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Features: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="other_features" value=""><?php echo $result['other_features']; ?></textarea>
					 </div>
				 </div>
				 
				  <h2 class="addheadding">Social media presence </h2>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Features: </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields" name="social_features" value=""><?php echo $result['social_features']; ?></textarea>
					 </div>
				 </div>
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Child care registration </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_child_care_registration" value="1"  class="yes" <?php if($result['social_child_care_registration'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_child_care_registration" value="0" <?php if($result['social_child_care_registration'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields features_text_field" id="" name="social_child_care_registration_text" value="" style="<?php if($result['social_child_care_registration'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['social_child_care_registration_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Child care regulations </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_child_care_regulations" value="1"  class="yes" <?php if($result['social_child_care_regulations'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_child_care_regulations" value="0" <?php if($result['social_child_care_regulations'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="social_child_care_regulations_text" value="" style="<?php if($result['social_child_care_regulations'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['social_child_care_regulations_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Additonal accreditations</label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_additional_accreditions" value="1"  class="yes" <?php if($result['social_additional_accreditions'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_additional_accreditions" value="0" <?php if($result['social_additional_accreditions'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10"  class="detailfields features_text_field" id="" name="social_additional_accreditions_text" value="" style="<?php if($result['social_additional_accreditions'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['social_additional_accreditions_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  Insurance</label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_insurance" value="1"  class="yes" <?php if($result['social_insurance'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_insurance" value="0" <?php if($result['social_insurance'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="social_insurance_text" value="" style="<?php if($result['social_insurance'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['social_insurance_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Recognition & rewards </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_recognitions" value="1"  class="yes" <?php if($result['social_recognitions'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_recognitions" value="0" <?php if($result['social_recognitions'] == 0){ echo "checked"; } ?> class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="social_recognitions_text" value="" style="<?php if($result['social_recognitions'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['social_recognitions_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
				 
				 
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4"> Identity bonds for any demage </label>
					  <div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_identity_bonds" value="1"  class="yes" <?php if($result['social_identity_bonds'] == 1){ echo "checked"; } ?>> <h6 class="radioyes">Yes </h6> 
					 </div>
					<div class="col-md-2 radiobutton-adds">
						<input type="radio" name="social_identity_bonds" value="0" <?php if($result['social_identity_bonds'] == 0){ echo "checked"; } ?>  class="no"><h6 class="radioyes">No </h6>
					 </div>
				 </div>
				 <div class="clear"></div>
				  <div class="form-group">
					 <label class="control-label adminlabel col-md-4">  </label>
					 <div class="col-md-8">
						<textarea rows="5" cols="10" class="detailfields features_text_field" id="" name="social_identity_bonds_text" value="" style="<?php if($result['social_identity_bonds'] == 1){ echo 'display:inline-block;'; } ?>"><?php echo $result['social_identity_bonds_text']; ?></textarea>
					 </div>
				 </div>
				 <div class="clear"></div>
					 <center><a class="addsubmit" href="<?php echo base_url(); ?>vendors/account/update_profile/<?php echo ID_encode($this->session->userdata('userinfo')->id); ?>"><span class="glyphicon glyphicon-arrow-left"></span>Previous </a>
					 <button class="addsubmit" type="submit">Submit </button>
                     <a href="<?php echo base_url()."admin/vendor/" ?>" class="addsubmit" style="margin-left:5px"> Cancel </a></center>	
				 
			</div>
			</form>			
          </div>
         
        </div>
 
    		
										
										 
					</div>
			</div>
							
		</div>
	</div>
	
	
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/jquery.filer.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>frontend_assets/jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/jquery.filer.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>frontend_assets/jquery-filer/js/custom.js" type="text/javascript"></script> 	
<script type="text/javascript" src="<?php echo base_url(); ?>frontend_assets/js/jquery.validate.min.js"></script>	
	
	
<script>
 $(document).ready(function() {
$('#myselect1').change(function() {
    var opval = $(this).val();
    if(opval=="other"){
        $('.show-secondoption1').show('');
    }
});

 /*  $(".addmore-divs").click(function(){
        $("#location-divshow").toggle('slow');
    });
	 $(".closediv").click(function(){
        $('#location-divshow').hide('slow');
    }); */

	/* $("#features_id1").click(function(){
        $('#features_text1').show('slow');
    });
	 $("#features_id2").click(function(){
        $('#features_text1').hide('slow');
    });*/

     $(".yes").click(function(){
     	//alert($(this).parent().parent().parent().parent().next().next().find('input').attr('name'));
        $(this).parent().parent().parent().parent().next().next().find('textarea').show('slow');
    });
	 $(".no").click(function(){
        $(this).parent().parent().parent().parent().next().next().find('textarea').hide('');
    });

});

</script>
<script type="text/javascript">
        jQuery().ready(function() {
            // validate form on keyup and submit
            var v = jQuery("#finalDetailsForm").validate({
				
                rules: {
                    staff_ratio_1: {
                        is_integer: true,
                        max: 10,
                    },
					staff_ratio_2: {
                        is_integer: true,
                        max: 10,
                    },
                    staff_total_teacher: {
                        is_integer: true,
                    },
                    staff_total_nanny: {
						is_integer: true,
                    },
                   
                },
                messages: {
					
                },
                errorElement: "span",
                errorClass: "help-inline-error",
            });
			 
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Please enter alphabet only"); 

            $.validator.addMethod("is_integer", function(value,element) {
                if(value=='' || value==null)
                {
                    return true;
                }
                return  /^[0-9]+$/i.test(value);
            },'Please enter positive integer only..!!');

          
          
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