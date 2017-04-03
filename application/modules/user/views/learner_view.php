<?=get_flashdata()?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i><?=lang('learner')?>
								
							</div>
							<div class="actions">
								<a href="<?=base_url()?>user/learner/edit/<?=$result->id?>" class="btn btn-circle red-sunglo btn-sm">
								<i class="fa fa-edit"></i><?=lang('edit')?></a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
						<div class="profile-sidebar small-width">
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src="<?=profile_image($result->id)?>" class="img-responsive" alt="">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 <?=ucwords($result->first_name)?> <?=$result->last_name?>
								</div>
								<div class="profile-usertitle-job"><?=lang('tutor')?></div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
                                <a href="<?=base_url()?>user/learner/edit/<?=$result->id?>" class="btn btn-circle green-haze btn-sm">
								<i class="fa fa-edit"></i> <?=lang('edit')?> </a>
            				</div>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
						</div>
						<!-- END PORTLET MAIN -->
					</div>	
                    
                         <div class="profile-content">          
                           <div class="form-horizontal">
                             	<div class="form-body">
                                              <div class="row">
                                               <div class="col-md-6">
												<div class="form-group">  
													<label class="col-md-4 control-label bold"><?=lang('first_name')?></label>
													<label class="col-md-8 control-label"><?=ucwords($result->first_name)?></label>
											   	  </div>
                                                 </div>
                                                 
                                                 <div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label bold"><?=lang('last_name')?></label>
													<label class="col-md-8 control-label"><?=$result->last_name?></label>
											   	  </div>
                                                 </div>
                                                </div>
                                               <div class="row">
                                               <div class="col-md-6">
												<div class="form-group">  
													<label class="col-md-4 control-label bold"><?=lang('tutor')?></label>
													<label class="col-md-8 control-label"><?=ucwords($result->tutor_f).'  '.ucwords($result->tutor_l)?></label>
											   	  </div>
                                                 </div>
                                                 <div class="col-md-6">
												<div class="form-group">
											<label class="col-md-4 control-label bold"><?=lang('email_address')?></label>
											<label class="col-md-8 control-label"><?=ucwords($result->email)?></label>
											   	  </div>
                                                 </div>
                                                <!-- <div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><?=lang('categories')?></label>
													<label class="col-md-8 control-label"><?php
                                                                $category=get_categories($result->id);
                                                                if(count($category)>0){
                                                                 foreach($category as $ck=>$cv){
                                                                    echo ucwords($cv->category)."<br>";
                                                                     } }?></label>
											   	  </div>
                                                 </div>-->
                                                </div> 
                                                <div class="row">
                                               <div class="col-md-6">
												<div class="form-group">  
													<label class="col-md-4 control-label bold"><?=lang('user_name')?></label>
													<label class="col-md-8 control-label"><?=$result->user_name?></label>
											   	  </div>
                                                 </div>
                                                 <div class="col-md-6">
												<div class="form-group">  
												<label class="col-md-4 control-label bold"><?=lang('contact_number')?></label>
											   <label class="col-md-8 control-label"><?=$result->contact_number?></label>
											   	  </div>
                                                 </div>
                                                 
                                                </div>
                                                
                                                <div class="row">
                                                   <div class="col-md-6">
												<div class="form-group">
												<label class="col-md-4 control-label bold"><?=lang('description')?></label>
										<label class="col-md-8 control-label"><?=ucwords($result->description)?></label>
											   	  </div>
                                                 </div>
                                                 
                                                 <div class="col-md-6">
												<div class="form-group">
													    <label class="col-md-4 control-label bold"><?=lang('status')?></label>
											  <label class="col-md-8 control-label"><?=ucwords($result->status)?></label>
											   	  </div>
                                                 </div>
                                                </div>
                                                
                                                <div class="row">
                                               <div class="col-md-6">
												<div class="form-group">  
													<label class="col-md-4 control-label bold"><?=lang('location')?></label>
												  <label class="col-md-8 control-label"><?=@$result->location?></label>
											   	  </div>
                                                 </div>
                                                 <div class="col-md-6">
												<div class="form-group">  
													<label class="col-md-4 control-label bold"><?=lang('created_on')?></label>
													<label class="col-md-8 control-label"><?=readable_date($result->created)?></label>
											   	  </div>
                                                 </div>
                                                
                                                </div>
                                                
                                                
                                                
                                                <div class="row">
                                               
                                                 
                                                 <div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label bold"></label>
													<label class="col-md-8 control-label"></label>
											   	  </div>
                                                 </div>
                                                </div>
                                            
											
											</div>
											
										</div> 
                          </div>
                          <div class="clearfix"></div>
                          
                          <div class="form-actions">
												<div class="row">
													<div class="col-md-12">
														
														<button type="button" class="btn btn-circle default" onclick="history.go(-1);"> <i class="fa fa-undo"></i> <?=lang('go_back')?> </button>
													</div>
												</div>
											</div>                          
                                                    
							
						</div>
					</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
            
 