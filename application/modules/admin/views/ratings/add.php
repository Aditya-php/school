 
 <script type="text/javascript" src="<?php echo base_url()?>assets/front/js/jquery-rating.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/jquery-rating.css" type="text/css" media="screen" title="Rating CSS">
     <script type="text/javascript">
        $(function(){
            $('.container').rating();
        });
    </script>
    
    
    
<div class="page-content-wrapper">
    <div class="page-content">

        <ul class="page-breadcrumb breadcrumb">
            <?php foreach ($breadcum as $b_key => $b_val) {
                if ($b_key != '') {
                    ?>
                    <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
                <?php } else if ($b_key == '') { ?>
                    <li class="active"> <?= $b_val ?> </li>
                <?php }
            }
            ?>
        </ul>

        <?php
        if ($this->session->flashdata('vendor_create')) {
            ?>
            <div class="alert bg-success display-show" id="success">
                <button class="close" data-close="alert"></button>
                <span>
                    <?php
                    echo $this->session->flashdata('vendor_create');
                    ?> 
                </span>
            </div>

		<?php } ?>

       
     
		
		
		
		
		<div class="portlet light bordered taballs" >
			<div class="portlet-title" style="border-bottom:none">
					<button ype="button" class="btn btn-primary rightbuttons">Edit Rating</button>
			</div>
		
		<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="rating-liftside">
				 <div class="form-group">
					<label class="control-label ratting-labels  col-md-6">Learning  </label>
					<div class="col-md-6"> 
						<div class="group1">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				 </div>	
					
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Care  </label>
					<div class="col-md-6"> 
						<div class="group2">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>

				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Staff  </label>
					<div class="col-md-6"> 
						<div class="group3">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>


				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Overall Management  </label>
					<div class="col-md-6"> 
						<div class="group4">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>


				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Cleanliness  </label>
					<div class="col-md-6"> 
						<div class="group5">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>


				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Safeguarding  </label>
					<div class="col-md-6"> 
						<div class="group6">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>	
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Facilities  </label>
					<div class="col-md-6"> 
						<div class="group7">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>	
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Resources/Equipment/ICT  </label>
					<div class="col-md-6"> 
						<div class="group8">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>	
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6"> Co-circular activities</label>
					<div class="col-md-6"> 
						<div class="group9">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Value for money  </label>
					<div class="col-md-6"> 
						<div class="group10">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Overall Standard </label>
					<div class="col-md-6"> 
						<div class="group11">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">First Aid  </label>
					<div class="col-md-6"> 
						<div class="group12">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Free Structure </label>
					<div class="col-md-6"> 
						<div class="group13">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Food Nutrition   </label>
					<div class="col-md-6"> 
						<div class="group14">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Summer Camps   </label>
					<div class="col-md-6"> 
						<div class="group15">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
				
				<div class="clear" style="padding-top:5px"></div>	
				 <div class="form-group">	
					<label class="control-label  ratting-labels   col-md-6">Child Care for special
need Childrens   </label>
					<div class="col-md-6"> 
						<div class="group16">
							<div   class="jr-ratenode jr-nomal"></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
							<div   class="jr-ratenode jr-nomal "></div>
						</div> 
					</div>
				</div>
				
				
 
				
			</div>
		</div>	
		
		<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
			 <div class="rating-liftside">
				 <div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6">  Gardens/Swings  </label>
						<div class="col-md-6"> 
							<div class="group17">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6">  Pick N Drop  </label>
						<div class="col-md-6"> 
							<div class="group18">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6">Communication Channel for Parents    </label>
						<div class="col-md-6"> 
							<div class="group19">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Staff Turnover   </label>
						<div class="col-md-6"> 
							<div class="group20">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Onsite Screening Facility   </label>
						<div class="col-md-6"> 
							<div class="group21">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Financial and Management Stability   </label>
						<div class="col-md-6"> 
							<div class="group22">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Medical Facility and doc on call   </label>
						<div class="col-md-6"> 
							<div class="group23">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Other Ancillary activities (PT, Yoga, Home assistance)   </label>
						<div class="col-md-6"> 
							<div class="group24">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Social Media Presence   </label>
						<div class="col-md-6"> 
							<div class="group25">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Child care registrations   </label>
						<div class="col-md-6"> 
							<div class="group26">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Child care regulations   </label>
						<div class="col-md-6"> 
							<div class="group27">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Additional Accreditations   </label>
						<div class="col-md-6"> 
							<div class="group28">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6">  Insurance  </label>
						<div class="col-md-6"> 
							<div class="group29">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6"> Recognition and Rewards   </label>
						<div class="col-md-6"> 
							<div class="group30">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
					
					<div class="clear" style="padding-top:5px"></div>	
					<div class="form-group">	
						<label class="control-label  ratting-labels   col-md-6">  Indemnity Bond for any demage </label>
						<div class="col-md-6"> 
							<div class="group30">
								<div   class="jr-ratenode jr-nomal"></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
								<div   class="jr-ratenode jr-nomal "></div>
							</div> 
						</div>
					</div>
					
				 
					
					
				</div>	
		</div>	
			
		</div>	

    </div>
</div>
<script type="text/javascript">
	$('.group1').start(function(cur){
		console.log(cur);
		// $('#info').text(cur);
	});





</script>

<!-- BEGIN PORTLET-->

<!-- END PORTLET-->

