 
<style>
.services h4 a {
    color: #e97a77;
}

  #map {
    height: 80%;
  }
  .zmin:after {
  display:none !important;
}
.centermy-innerdiv{
margin-top:35px;
margin-bottom:35px	
}
.img-div{
width:80%;
float:right;
}
sup {
    top: -19px;
    margin-left: -15px;
}
sup img{
    width: 26px;
  
}



  </style>
<div class="services" style="background:#f3f0cf;">
	<div class="services-div">
		<div class="container centermy-innerdiv">
			<div class="row">
				<div class="col-md-3">
						<?php 
						if($vendor_details->vendor_logo!='' && !empty($vendor_details->vendor_logo))
						{
						?>
						<div class="img-div">
                        <img class="vender_img_prof" src="<?php echo base_url().'assets/vendor_image/'.$vendor_details->vendor_logo;?>">
                        </div>
						<?php
						}
						else{
							?>
						<div class="img-div">
						<img style="height: 190px;" class="vender_img_prof" src="<?php echo base_url().'frontend_assets/img/user-placeholder.png';?>">	
                        </div>
					   <?php	
					   } 
						?>
				</div>
				<div class="col-md-9">
					<h4><?php echo ucwords($vendor_details->vendor_name);?>
					<?php if($this->session->userdata('isLogin') === 'yes'){ ?>
					<a href="#" title="Add to wish list" id="<?php echo ID_encode($vendor_details->id); ?>" class="addToWishlist"><sup>
					<?php if(in_array($vendor_details->id,($this->session->userdata('vendor_arr'))?$this->session->userdata('vendor_arr'):array())){ ?>
					<img class="" src="<?php echo base_url().'frontend_assets/img/vendericons.png';?>">	
					<?php } else{ ?>
					<img class="" src="<?php echo base_url().'frontend_assets/img/vendericons1.png';?>">
					<?php } ?>
					</sup></a>
					<?php } else{ ?>
					<a href="#" data-toggle="modal" data-target="#loginmodel"><sup><img id="Heartshow" src="<?php echo base_url().'frontend_assets/img/vendericons1.png';?>"></sup></a>
					<?php } ?>
					</h4>
                    <p><?php echo $vendor_details->description; ?></p>
				</div>
			</div>	
		</div>
	</div>	
</div>


<div class="services-tab">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					 <!-- Nav tabs -->
			  <div class="card">
				<ul class="nav nav-tabs" role="tablist">
				  <li role="presentation" id="first_tab" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> Basic Details</a></li>
				  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Full Details </a></li>
				  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"> Rating </a></li>
				  <li role="presentation" id="geo_map" class="active"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"> Location </a></li>
				  
				</ul>
		<?php //pr($services);die;?>
	<!-- Tab panes -->
				<div class="tab-content">
			    <div role="tabpanel" class="tab-pane" id="home"> 
					   
						<div class="col-md-3">
							<h4>Year of Establishment</h4>
							<h4> Age Group </h4>
							<h4> Services Offered </h4>
							<h4> Budget Range </h4>
						</div>
						<div class="col-md-9" style="">
							<h4> : 
							<?php if(isset($vendor_details->year_of_establishment) && !empty($vendor_details->year_of_establishment))
							{
							?>
							<?php echo ($vendor_details->year_of_establishment)?$vendor_details->year_of_establishment:'0000'; ?>
							<?php
							}else{
								echo "N/A";
							}?>	
							</h4>
							<h4> :
							<?php if(isset($vendor_details->age_min) && !empty($vendor_details->age_min))
							{
						     ?>
							<?php echo $vendor_details->age_min; ?> to <?php echo $vendor_details->age_max; ?> Years
							<?php
							}
							else{
								echo "N/A";
							}
							?>
							</h4>
							<h4> : <?php if(isset($vendor_details->name) && !empty($vendor_details->name)) 
							{
						     ?>
							<?php echo $vendor_details->name; ?>
							<?php
							}
							else{
								echo "N/A";
							}
							?> </h4>
						</div>
						<div class="clear"></div>
					 	<div class="col-md-6 tab1-div">
							<div class="col-md-2">
								<h5> Hourly&nbsp;:</h5>
								<h5> Monthly&nbsp;:</h5>
							</div>
							
							<div class="col-md-8">
                               	<h5> <i class="fa fa-inr" aria-hidden="true"></i> 
								<?php if(isset($vendor_details->hourly_min) && !empty($vendor_details->hourly_min))
							{
						     ?>
							<?php echo $vendor_details->hourly_min; ?> - <i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $vendor_details->hourly_max; ?> 
							<?php
							}
							else{
								echo "N/A";
							}
							?>
								</h5>
								<h5> <i class="fa fa-inr" aria-hidden="true"></i> 
								<?php if(isset($vendor_details->monthly_min) && !empty($vendor_details->monthly_min))
								{?>
							     <?php echo $vendor_details->monthly_min ;?> - <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $vendor_details->monthly_max ;?>
								<?php }
								else{
                            	echo "N/A";	 		
								}	
                                  ?>								
								</h5>
							</div>	 
						</div>	
				  </div>
				  <!--tab2 start-->				  
				  <div role="tabpanel" class="tab-pane" id="profile"> 
					<div class="col-md-6">
						<p style="font-weight:bold; ">Learning </p>
						<p>Nanny Assistance</p>
                         
                         </div>
					<div class="col-md-6">
						<p> &nbsp </p>
						 <p>
							 <?php if(isset($vendor_details->learning_nanny_assistance) && !empty($vendor_details->learning_nanny_assistance))
							{?>
							 <?php echo $vendor_details->learning_nanny_assistance ;?> 
							<?php }
							else{
							echo "N/A";	 		
							}	
							?>
						</p>
                        
                        
						 
					</div>
					<div class="clear"></div><br>
					<div class="col-md-6"><p>Hourly Day Care on Demand</p></div>
					<div class="col-md-6">
					 <p>
						<?php if(isset($vendor_details->learning_hourly_day_care) && !empty($vendor_details->learning_hourly_day_care))
						{?>
						 <?php echo $vendor_details->learning_hourly_day_care ;?> 
						<?php }
						else{
						echo "N/A";	 		
						}	
						 ?>
					  </p>
					
					</div>
					<div class="clear"></div><br>
					
					<div class="col-md-6"><p>Flexible &amp; Customized Day Care</p></div>
					<div class="col-md-6">
					 <p>
					  <?php if(isset($vendor_details->learning_flexible_customize_care) && !empty($vendor_details->learning_flexible_customize_care))
						{?>
						 <?php echo $vendor_details->learning_flexible_customize_care ;?> 
						<?php }
						else{
						echo "N/A";	 		
						}	
						  ?>
					  </p>
					
					</div>
					
				<div class="clear"></div><br>
						<div class="col-md-6">  <p>Day Care</p></div>
						<div class="col-md-6">
                       <p>
					   <?php if(isset($vendor_details->learning_day_care) && !empty($vendor_details->learning_day_care))
						{?>
						 <?php echo $vendor_details->learning_day_care ;?> 
						<?php }
						else{
						echo "N/A";	 		
						}	
						  ?>
						 </p>
					</div>
					
					<div class="clear"></div><br>
					<div class="col-md-6">	
						<p style="font-weight:bold;">Care</p>
					    <p>Features</p>
					</div>
					<div class="col-md-6">
					      <p></p></br>
						<p><?php if(isset($vendor_details->care_features) && !empty($vendor_details->care_features)){?>
                         <?php 	echo $vendor_details->care_features;?>
						<?php }else{
							echo "N/A";
						}?></p>
					</div>
					
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p style="font-weight:bold;">Staff</p>
						<p>Ratio</p>
                        <p>Total Teacher</p>
                        <p>Total Nanny</p>
					</div>
					<div class="col-md-6">
						<p></p><br>
						<p>
						<?php if(isset($vendor_details->staff_ratio) && !empty($vendor_details->staff_ratio))
						{
						?>
							<?php echo $vendor_details->staff_ratio;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?>
						   </p>
                        <p>
						<?php if(isset($vendor_details->staff_total_teacher) && !empty($vendor_details->staff_total_teacher))
						{
						?>
							<?php echo $vendor_details->staff_total_teacher;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?>
						 </p>
						<p><?php if(isset($vendor_details->staff_total_nanny) && !empty($vendor_details->staff_total_nanny))
						{
						?>
							<?php echo $vendor_details->staff_total_nanny;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					</div>
					
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p style="font-weight:bold;">Overall Management</p>
							<p>Features</p>
					</div>
					<div class="col-md-6">
						<p></p></br>
						<p>	<?php if(isset($vendor_details->overall_manage_features) && !empty($vendor_details->overall_manage_features))
						{
						?>
							<?php echo $vendor_details->overall_manage_features;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					</div>
					
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p style="font-weight:bold;">Cleanliness</p>
						<p>Features</p>
					</div>
					<div class="col-md-6">
						<p></p></br>
						<p><?php if(isset($vendor_details->cleanliness_features) && !empty($vendor_details->cleanliness_features))
						{
						?>
							<?php echo $vendor_details->cleanliness_features;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					</div>
					
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p style="font-weight:bold;">Safeguarding</p>
						<p>CCTV Camera</p>
                      </div>  
					   <div class="col-md-6">
							   <p>
								  <?php if(isset($vendor_details->safegurading_cctv_text) && !empty($vendor_details->safegurading_cctv_text))
								   {
								   ?>
									<?php echo $vendor_details->safegurading_cctv_text;?>
								   <?php
								   }else{ 
									  echo "N/A";
									  }?>
								</p>
						 </div>
					   <div class="clear"></div><br>
					   <div class="col-md-6"><p>Guard</p></div>
					   <div class="col-md-6">
								<p>
								<?php if(isset($vendor_details->safegurading_guard_text) && !empty($vendor_details->safegurading_guard_text))
								{
								?>
									<?php echo $vendor_details->safegurading_guard_text;?>
								<?php
								}else{ 
								   echo "N/A";
								   }?>
								  </p>
						</div>
						<div class="clear"></div><br>
						<div class="col-md-6"><p>Fire extinguisher</p> </div>
						<div class="col-md-6">
							 <p>
						       <?php if(isset($vendor_details->safegurading_fire_extinguisher_text) && !empty($vendor_details->safegurading_fire_extinguisher_text))
								{
								?>
									<?php echo $vendor_details->safegurading_fire_extinguisher_text;?>
								<?php
								}else{ 
								   echo "N/A";
								   }?>
								</p>
						</div>
						<div class="clear"></div><br>
						<div class="col-md-6"><p>Other</p> </div>
						<div class="col-md-6">
							<p>
								<?php if(isset($vendor_details->safegurading_other) && !empty($vendor_details->safegurading_other))
								{
								?>
									<?php echo $vendor_details->safegurading_other;?>
								<?php
								}else{ 
								   echo "N/A";
								   }?>
							</p>
					</div>
					
					<div class="clear"></div><br>
					<div class="col-md-6">
					<p style="font-weight:bold;">Facilities</p>
				    </div>
					 
					<div class="clear"></div><br>
					<div class="col-md-6"><p>Garden</p></div>
					<div class="col-md-6">
						   <p><?php if(isset($vendor_details->facilites_garden_text) && !empty($vendor_details->facilites_garden_text))
						{
						?>
							<?php echo $vendor_details->facilites_garden_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						    <div class="clear"></div><br>
					<div class="col-md-6"><p>Labs</p></div>
					<div class="col-md-6">
                           <p><?php if(isset($vendor_details->facilites_labs_text) && !empty($vendor_details->facilites_labs_text))
						{
						?>
							<?php echo $vendor_details->facilites_labs_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						    <div class="clear"></div><br>
					<div class="col-md-6"><p>Kitchen</p></div>
					<div class="col-md-6">
						   <p><?php if(isset($vendor_details->facilites_kitchen_text) && !empty($vendor_details->facilites_kitchen_text))
						{
						?>
							<?php echo $vendor_details->facilites_kitchen_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   	    <div class="clear"></div><br>
					<div class="col-md-6"><p>Play Station</p></div>
					<div class="col-md-6">
                        <p><?php if(isset($vendor_details->facilites_play_station_text) && !empty($vendor_details->facilites_play_station_text))
						{
						?>
							<?php echo $vendor_details->facilites_play_station_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					</div>
						    <div class="clear"></div><br>
					<div class="col-md-6"><p>No of Rooms</p></div>
					<div class="col-md-6">
                        <p><?php if(isset($vendor_details->facilites_on_of_rooms) && !empty($vendor_details->facilites_on_of_rooms))
						{
						?>
							<?php echo $vendor_details->facilites_on_of_rooms;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					</div>
						    <div class="clear"></div><br>
					<div class="col-md-6"><p>Other</p></div>
					<div class="col-md-6">
                        <p><?php if(isset($vendor_details->facilites_other) && !empty($vendor_details->facilites_other))
						{
						?>
							<?php echo $vendor_details->facilites_other;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					</div>
					
					
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p style="font-weight:bold;"> Co-Curricular Activities</p>
					</div>
					    <div class="clear"></div><br>
					<div class="col-md-6"><p>Features</p></div>
					<div class="col-md-6">
						<p><?php if(isset($vendor_details->activities_features) && !empty($vendor_details->activities_features))
						{
						?>
							<?php echo $vendor_details->activities_features;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   
				    <div class="clear"></div><br>
					<div class="col-md-6">
				    <p style="font-weight:bold;">Fee Structure</p>
					 </div>
					  <div class="clear"></div><br>
					<div class="col-md-6"><p> Fee Structure</p></div>
					<div class="col-md-6">
						  <p><?php if(isset($vendor_details->free_free_structure) && !empty($vendor_details->free_free_structure))
						{
						?>
							<?php echo $vendor_details->free_free_structure;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   
						   
				    <div class="clear"></div><br>
					<div class="col-md-6">
					<p style="font-weight:bold;"> Overall Standard</p>
				    </div>
						 <div class="clear"></div><br>
					     <div class="col-md-6"><p>Features</p></div>
				       	 <div class="col-md-6">
						      <p>
							  <?php if(isset($vendor_details->overall_features) && !empty($vendor_details->overall_features))
						       {
						      ?>
							      <?php echo $vendor_details->overall_features;?>
					         	<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						    <div class="clear"></div><br>
					<div class="col-md-6"><p> First Aid</p></div>
					<div class="col-md-6">
                         <p><?php if(isset($vendor_details->overall_first_aid_text) && !empty($vendor_details->overall_first_aid_text))
						{
						?>
							<?php echo $vendor_details->overall_first_aid_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
					
					</div>
					 
					
					
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p>Food/Nutrition</p>
                       </div>

					<div class="col-md-6">
					 <p><?php if(isset($vendor_details->overall_food_nutrition_text) && !empty($vendor_details->overall_food_nutrition_text))
						{
						?>
							<?php echo $vendor_details->overall_food_nutrition_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   	   <div class="clear"></div><br>
					<div class="col-md-6"><p>Summer camps+winter camps</p></div>
					<div class="col-md-6">
                     <p><?php if(isset($vendor_details->overall_summer_winter_campus_text) && !empty($vendor_details->overall_summer_winter_campus_text))
						{
						?>
							<?php echo $vendor_details->overall_summer_winter_campus_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   	   <div class="clear"></div><br>
					<div class="col-md-6"><p>Childcare for special needs children</p></div>
					<div class="col-md-6">
                     <p><?php if(isset($vendor_details->overall_childcare_text) && !empty($vendor_details->overall_childcare_text))
						{
						?>
							<?php echo $vendor_details->overall_childcare_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   	   <div class="clear"></div><br>
					<div class="col-md-6"><p>Garden/Swings</p></div>
					<div class="col-md-6">
				     <p><?php if(isset($vendor_details->overall_garden_swings_text) && !empty($vendor_details->overall_garden_swings_text))
						{
						?>
							<?php echo $vendor_details->overall_garden_swings_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   <div class="clear"></div><br>
					<div class="col-md-6"><p>Pick N Drop</p></div>
					<div class="col-md-6">
                     <p><?php if(isset($vendor_details->overall_pick_n_drop_text) && !empty($vendor_details->overall_pick_n_drop_text))
						{
						?>
							<?php echo $vendor_details->overall_pick_n_drop_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
				
						   <div class="clear"></div><br>
					<div class="col-md-6"><p>Communication Channels for Parents</p></div>
					<div class="col-md-6">
			    	 <p><?php if(isset($vendor_details->overall_communication_parents_text) && !empty($vendor_details->overall_communication_parents_text))
						{
						?>
							<?php echo $vendor_details->overall_communication_parents_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   
						      <div class="clear"></div><br>
					<div class="col-md-6"><p>Staff Turnover</p></div>
					<div class="col-md-6">
			    	 <p><?php if(isset($vendor_details->overall_staff_turnover_text) && !empty($vendor_details->overall_staff_turnover_text))
						{
						?>
							<?php echo $vendor_details->overall_staff_turnover_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   </div>
						   
						   
						   <div class="clear"></div><br>
					<div class="col-md-6"><p> Onsite Screening Facility</p></div>
					<div class="col-md-6">
				     <p><?php if(isset($vendor_details->overall_onside_screening_text) && !empty($vendor_details->overall_onside_screening_text))
						{
						?>
							<?php echo $vendor_details->overall_onside_screening_text;?>
						<?php
						}else{ 
						   echo "N/A";
						   }?></p>
						   
					</div>
					
					 
					<div class="clear"></div><br>
					<div class="col-md-6">
						<p style="font-weight:bold;">  Financial and Management Stability </p>
					</div>
			       <div class="clear"></div><br>
					<div class="col-md-6"><p> Features </p></div>
					<div class="col-md-6">
						<p><?php if(isset($vendor_details->finacial_features) && !empty($vendor_details->finacial_features)){
							?>
							<?php echo $vendor_details->finacial_features;?>
						<?php }else{
							echo "N/A";
						}?></p>
						</div>
						<div class="clear"></div><br>
					<div class="col-md-6"><p>Medical Facility & Doc on call</p></div>
					<div class="col-md-6">
                        <p><?php if(isset($vendor_details->finacial_medical_facility_text) && !empty($vendor_details->finacial_medical_facility_text)){
							?>
							<?php echo $vendor_details->finacial_medical_facility_text;?>
						<?php } else{
							echo "N/A";
						}?></p>
						</div>
						
						
						
						<div class="clear"></div><br>
					<div style="font-weight:bold;"><p> Other Ancillary Activities like <br>homework Assistanve, PT, Yoga Etc </p></div>
					
					<div class="clear"></div><br>
					<div class="col-md-6"><p>Features</p></div>
					<div class="col-md-6">
                        <p><?php if(isset($vendor_details->social_features) && !empty($vendor_details->social_features)){
							?>
							<?php echo $vendor_details->social_features;?>
						<?php } else{
							echo "N/A";
						} ?></p>
                      
					</div>
					
					
					<div class="clear"></div><br>
					<div style="font-weight:bold;"><p>Social media presence </p></div>
					
						<div class="clear"></div> 
					<div class="col-md-6"><p>Features</p></div>
					<div class="col-md-6">
                         <p>
							<?php if(isset($vendor_details->social_features) && !empty($vendor_details->social_features)){
							?>
							<?php echo $vendor_details->social_features;?>
							<?php }else{
								echo "N/A";
							}?>
						</p>
					</div>
				
					<div class="clear"></div> 
					<div class="col-md-6"><p>Child Care Registration</p></div>
					<div class="col-md-6">
                         <p>
							<?php if(isset($vendor_details->social_child_care_registration_text) && !empty($vendor_details->social_child_care_registration_text)){
							?>
							<?php echo $vendor_details->social_child_care_registration_text;?>
							<?php }else{
								echo "N/A";
							}?>
						</p>
					</div>
					<div class="clear"></div><br>
					<div class="col-md-6"><p>Child Care Regulations</p></div>
					<div class="col-md-6">
                       <p>
					     <?php if(isset($vendor_details->social_child_care_regulations_text) && !empty($vendor_details->social_child_care_regulations_text)){
							?>
							<?php echo $vendor_details->social_child_care_regulations_text;?>
							<?php }else{
								echo "N/A";
							}?></p>
							</div>
							<div class="clear"></div><br>
					<div class="col-md-6"><p>Additonal accreditations</p></div>
					<div class="col-md-6">
                       <p>
					     <?php if(isset($vendor_details->social_additional_accreditions_text) && !empty($vendor_details->social_additional_accreditions_text)){
							?>
							<?php echo $vendor_details->social_additional_accreditions_text;?>
							<?php }else{
								echo "N/A";
							}?></p>
							</div>
							  	<div class="clear"></div><br>
					<div class="col-md-6"><p>Insurance</p></div>
					<div class="col-md-6">
					    <p><?php if(isset($vendor_details->social_insurance_text) && !empty($vendor_details->social_insurance_text)){
							?>
							<?php echo $vendor_details->social_insurance_text;?>
							<?php }else{
								echo "N/A";
							}?></p>
					</div>
					<div class="clear"></div><br>
					<div class="col-md-6"><p>Recognition & rewards</p></div>
					<div class="col-md-6">
                       <p>
					     <?php if(isset($vendor_details->social_recognitions_text) && !empty($vendor_details->social_recognitions_text)){
							?>
							<?php echo $vendor_details->social_recognitions_text;?>
							<?php }else{
								echo "N/A";
							}?></p>
							</div>
							<div class="clear"></div><br>
					<div class="col-md-6"><p>Identity bonds for any damage</p></div>
					<div class="col-md-6">
                       <p>
					     <?php if(isset($vendor_details->social_identity_bonds_text) && !empty($vendor_details->social_identity_bonds_text)){
							?>
							<?php echo $vendor_details->social_identity_bonds_text;?>
							<?php }else{
								echo "N/A";
							}?></p>
							</div>
				  
				  </div>
				  <div role="tabpanel" class="tab-pane" id="messages">
					<div class="col-md-2">
						<div class="circle-div">
							<img src="<?php echo base_url().'assets/front/images/circle-face.png';?>">
						</div>
					</div>
					<div class="col-md-4">
						<p class="rating-user"> Priya Sharma</p>
						<p>Nov 16, 216 at 10:33AM</p>
					</div>
					<div class="col-md-6">
						<p class="rating-star"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						<div class="clear"></div>
						<a href="#"><span class="view-de"> View Detail... </span></a>
 					</div>
					
					<div class="clear"></div>
					<hr class="star-hr">
					<div class="col-md-2">
						<div class="circle-div">
							<img src="<?php echo base_url().'assets/front/images/circle-face.png';?>">
						</div>
					</div>
					<div class="col-md-4">
						<p class="rating-user"> Priya Sharma</p>
						<p>Nov 16, 216 at 10:33AM</p>
					</div>
					<div class="col-md-6">	</div>
					
					<div class="clear"></div><br>
					<div class="col-md-3">
						 <p>Learning</p>
                                        <p>Care</p>
                                        <p>Staff</p>
                                        <p>Overall Management</p>
                                        <p>Cleaning</p>
                                        <p>Safeguarding</p>
                                        <p>Resources/Eqiupment</p>
                                        <p>Co circular Activities</p>
                                        <p>Value for Money</p>
                                        <p>Overall Standard</p>
                                        <p>First Aid</p>
                                        <p>Fee Structure</p>
                                        <p>Food/Nutrition</p>
                                        <p>Summer camps</p>
					</div>
					<div class="col-md-3">
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
					</div>
					<div class="col-md-3">
						<p>Garden/Swings</p>
                                        <p>Pick N Drop</p>
                                        <p>Communication channels for parents</p>
                                        <p>staff turnover</p>
                                        <p>Onsite Screening facility</p>
                                        <p>Financial and Management stability</p>
                                        <p>Medical Facility and Doc on call</p>
                                        <p>Other ancillary activities like Homework assistance, PT, Yoga etc)</p>
                                        <p>Social Media Presence</p>
                                        <p>Child care registration</p>
                                        <p>Child care regulations</p>
                                        <p>Additional accreditations</p>
                                        <p>Insurance</p>
                                        <p>Recognition and rewards</p>
					</div>
					<div class="col-md-3">
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						<br>
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p><br><br> 
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p><br><br><br>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
						
						<p class="rating-star1"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						</p>
					</div>
					<div class="clear"></div>
					<hr class="star-hr">
					<div class="col-md-2">
						<div class="circle-div">
							<img src="<?php echo base_url().'assets/front/images/circle-face.png';?>">
						</div>
					</div>
					<div class="col-md-4">
						<p class="rating-user"> Priya Sharma</p>
						<p>Nov 16, 216 at 10:33AM</p>
					</div>
					<div class="col-md-6">
						<p class="rating-star"> 
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar" aria-hidden="true"></i>
						<i class="fa fa-star-half-o halfstar" aria-hidden="true"></i>
						<i class="fa fa-star fullstar-no" aria-hidden="true"></i>
						</p>
						<div class="clear"></div>
						<a href="#"><span class="view-de"> View Detail... </span></a>
 					</div>
					<div class="clear"></div>
					<hr class="star-hr">
					<div class="col-md-12">
					<a href="#"><span class="view-de" style="font-weight:bold"> << View More... </span></a>
					</div>
				  </div>
				  <div role="tabpanel" class="tab-pane active" id="settings"> 
                 
                   <input type="hidden" id="lat" name="lat" value="" />
                    <input type="hidden" id="lang" name="lang" value="" />
                  <?php 
                $lat=$lang='';
                $vendor_loc=get_vendor_location($vendor_details->id);
                $adr=(isset($vendor_loc['address']) && !empty($vendor_loc['address'])) ? $vendor_loc['address'] : "";
                
                $parent_loc=get_vendor_location();
                $prnt_adr=(isset($parent_loc['address']) && !empty($parent_loc['address'])) ? $parent_loc['address'] : "";
                 ?>
					<div class="col-md-12">
						<div class="search-location">
							<div class="col-md-10">
								<input type="text" id="start" placeholder="Enter Your Pickup Location" class="search-location-text">
							</div>
							<div class="col-md-2">
							<center><a href="#" id="search_location" class="search-locaton-b"> <i class="fa fa-search" aria-hidden="true"></i></a></center>	
							</div>
						</div>
					</div>
                    <div class="clear"></div>
					<div class="col-md-12">
                    <div style="font-weight:bold;font-size:15px;margin-top:10px;" id="time_dist"></div>
                    <div id="map" style="overflow: visible;margin-top:15px;width: 100%;float: left;z-index: 999;display: list-item;height: 500px;"></div>
					<!--iframe class="mapframe" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d224126.53792515406!2d77.10639600184282!3d28.63044677498279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sdelhi!3m2!1d28.7040592!2d77.10249019999999!4m5!1s0x390ce5a43173357b%3A0x37ffce30c87cc03f!2snoida!3m2!1d28.5355161!2d77.3910265!5e0!3m2!1sen!2sin!4v1487317280200" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe-->
					</div>
				  </div>
				  <!--div role="tabpanel" class="tab-pane" id="extra"> </div-->
				</div>
			  </div>
	  
			</div>
		</div>
	</div>	
</div>

	<?php //pr($vendor_details);//die;if
	if($vendor_details->vendor_images){
			?>
<div class="our-gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Our Gallery</h1>
			</div>
			<div class="col-md-12">
				<div class="our-gallery-div">
					<!--gallery start-->
	 <div class="carousel-reviews ">
 
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
        			<li data-target="#carousel-reviews" data-slide-to="0" class="active"></li>
        			<li data-target="#carousel-reviews" data-slide-to="1" class=""></li>	 
        		</ol>
				   <div class="carousel-inner">
				   
               <?php 
			     if(isset($vendor_details->vendor_images) && !empty($vendor_details->vendor_images) ) //&& file_exists('assets/vendor_image/'.$vendor_details->vendor_images)
				 {
				   $glry_img=json_decode($vendor_details->vendor_images,true);
						// pr(array_chunk($glry_img,3,true));..die;
				$sliced_arr = array_chunk($glry_img,3,true); //pr($sliced_arr);die;
				
				 
			    ?>
             
				<?php $i=1; foreach($sliced_arr as $arr1){ ?>
                    <div class="item <?php echo ($i==1) ? "active" : "" ?>">
					<?php foreach($arr1 as $arr2){ ?>
                	    <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin"> 
						    <img src="<?php echo base_url().'assets/vendor_image/'.$arr2;?>">
					        </div>
		 
						</div>
						<?php } ?>
            			
					 
                    </div>
				<?php $i++; } } ?>
                   
                                        
                </div>
                <a class="left carousel-control  " href="#carousel-reviews" role="button" data-slide="prev">
                    <!--i class="fa fa-angle-left slidernext5 glyphicon-chevron-left" aria-hidden="true"></i-->
                    <img class="nextgallery-img1" src="<?php echo base_url();?>frontend_assets/img/gallerynext1.png">
                </a>
                <a class="right carousel-control  " href="#carousel-reviews" role="button" data-slide="next">
                    <!--i class="fa fa-angle-right slidernext6 glyphicon-chevron-left" aria-hidden="true"></i-->
                     <img class="nextgallery-img2" src="<?php echo base_url();?>frontend_assets/img/gallerynext2.png">
                </a>
            </div>
        </div>
 


					
					<!--gallery end-->
				</div>
			</div>
		</div>
	</div>	

</div>
	<?php
	}else{
		
	}
	?>
<div class="grid-div2"></div>



<script>
	$(document).ready(function(){
		$(".addToWishlist").click(function(event){ 
			event.preventDefault();
			var vendor_id = $(this).attr('id');
			var wishlistCount = $("#wishlistCount").text();
			$.ajax({
      		url: "<?php echo base_url('home/addToWishlist') ?>",
      		method: 'POST',
      		data:   {vendor_id: vendor_id},
      		success: function(response){
				if(response == 1){
					$("#wishlistCount").text(parseInt(wishlistCount)+1);
					var newimg = "<?php echo base_url();?>frontend_assets/img/vendericons.png";
					$('.addToWishlist img').attr("src",newimg ).attr("class","vendericon-img" );
					$('.addToWishlist img').attr("class","vendericon-img" );
					alert("Vendor has been added to wish list successfully");
					location.reload();	
				}
				else if(response != '')
				{
						var vendor_id = $(".addToWishlist").attr('id');
						var wishlistCount = $("#wishlistCount").text();
						//alert(vendor_id);
						if(confirm("Do you want to remove this vendor from wishlist?")){
							$.ajax({
							url: "<?php echo base_url('home/removeToWishlist') ?>",
							method: 'POST',
							data:   {vendor_id: vendor_id},
							success: function(response){
								
								
									$("#wishlistCount").text(parseInt(wishlistCount)-1);
									$(this).parent().parent().html()
									alert("Vendor has been removed from wish list successfully!!");
									location.reload();				
							 }
							});	
						}
				}
				else if(response == ""){
					alert("Vendor has not been added to wish list, Please try again");	
				}
      		}
			});
		});

	
	});//end ready
</script>


<script>

    window.onload = initGeolocation;
     function initGeolocation()
     {
        if( navigator.geolocation )
        {
           // Call getCurrentPosition with success and failure callbacks
           navigator.geolocation.getCurrentPosition( success, fail );
        }
        else
        {
           alert("Sorry, your browser does not support geolocation services.");
        }
     }
</script>

<script>
     function success(position)
     {

         document.getElementById('lang').value = position.coords.longitude;
         document.getElementById('lat').value = position.coords.latitude
     }
     function fail()
     {
        // Could not obtain location
     }
     var curr_adr='<?php echo $prnt_adr; ?>'; 
     var curr_prnt_org='<?php echo $prnt_adr; ?>';
     console.log("add"+curr_adr);
     var curr_lat=$("#lat").val();
     var curr_lang=$("#lang").val();
     var curr_org = {lat: 28.4089, lng: 77.3178};
     if(curr_adr!=''){
          
           curr_org = curr_adr;
     }
     else if(curr_lat!='' && curr_lang!='')
     {
        curr_org=  {lat: curr_lat, lng: curr_lang};
     }
    
     //console.log("hi"+curr_org);
     
         
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: 20.5937, lng: 78.9629}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
          var new_org=document.getElementById('start').value;
          calculateTimeAndDistance(new_org,'<?php echo $adr; ?>');
          
        };
        
        $(document).ready(function() {
            calculateAndDisplayRouteOnLoad(directionsService, directionsDisplay);
            calculateTimeAndDistance(curr_prnt_org,'<?php echo $adr; ?>');
        });
        document.getElementById('search_location').addEventListener('click', onChangeHandler);
        
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: '<?php echo $adr; ?>',//
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }  
      function calculateAndDisplayRouteOnLoad(directionsService, directionsDisplay) {
        
        directionsService.route({
          origin: curr_org,
          destination: '<?php echo $adr; ?>',
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      } 
      function calculateTimeAndDistance(org,dest){
      console.log(org+""+dest);
        $.ajax({
      		url: "<?php echo base_url('home/calulate_time_mapapi') ?>",
      		method: 'POST',
      		data:   {org_lat: org,dest_lat:dest},
      		success: function(response){
				console.log(response);
                $("#time_dist").html(response);
      		}
			});
        
      } 
      
      window.onload = function() {
          $("#settings").removeClass('active');
          $("#geo_map").removeClass('active');
          
          $("#first_tab").addClass('active');
          $("#home").addClass('active');
     };
     
     
      
</script>
    
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWsPXrc3aZSTfGLt4qtAO0zHsiB0OG6bE&callback=initMap">
    </script>	 

