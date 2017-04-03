<?= get_flashdata() ?>



 <div class="dashboard-panel">
 	 <!--***************-->
 <?php
$arr_list = array(); 
$arr_list=$this->session->userdata('sess_tut_list');
if(@$arr_list !='' && $arr_list != NULL){
$key = array_search(@$id,$arr_list);
?>
<div class="question-prev-next-bg margin-bottom-20">
<div class="question-back"><a href="<?= base_url() ?>user/tutor/">Go Back</a></div>
<div class="question-prev-auto">

   <div class="question-prev-bg">
    <?php if($key!=0){
    	  if($t_id=$arr_list[$key-1]){
		 
    ?>
    <div class="question-prev-icon"><img src="<?= base_url() ?>assets/admin/layout4/img/prev-icon.png"></div>
    <div class="question-prev-text"><a href="<?= base_url() ?>user/tutor/view/<?=@$t_id?>">PREVIOUS</a></div>
   <?php }}else{?>
    <div class="question-prev-icon"><img src="<?= base_url() ?>assets/admin/layout4/img/prev-icon.png"></div>
    <div class="question-prev-text"><a href="<?= base_url() ?>user/tutor/view/<?=@$t_id?>" class="disabled-link">PREVIOUS</a></div>
   <?php  }?>
  </div>
   
   <div class="question-prev-bg">
 <?php if($key!=(count($arr_list)-1)){
    	  if($t_id=$arr_list[$key+1]){
		 
   ?>
  <div class="question-prev-text"><a href="<?= base_url() ?>user/tutor/view/<?=@$t_id?>">NEXT</a></div>
  <div class="question-prev-icon1"><img src="<?= base_url() ?>assets/admin/layout4/img/next-icon.png"></div>
   <?php }}else{?>
   
     <div class="question-prev-text"><a href="<?= base_url() ?>user/tutor/view/<?=@$t_id?>" class="disabled-link">NEXT</a></div>
     <div class="question-prev-icon1"><img src="<?= base_url() ?>assets/admin/layout4/img/next-icon.png"></div>
   <?php 
    }?>
  </div>
  
  
 
  
</div>
</div>
<?php } ?>
 <!--****************-->
   <div class="dashboard-panel-heading">
   <div class="lms-heading-bg margin-bottom-10">
      <div class="icon-white-gray"><img src="<?= base_url() ?>assets/admin/layout4/img/icon.png"></div>
      <div class="text-white-gray"><?= lang('tutor') ?></div>
    </div>
</div>

   <div class="dashboard-panel-body">
       
       <div class="row">
        <div class="col-md-3">
        	<div class="portlet light">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="<?= profile_image($result->id) ?>" class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name bold">
                                <?= ucwords($result->first_name) ?> <?= $result->last_name ?>
                            </div>
                            <div class="profile-usertitle-job"><?= lang('tutor') ?> </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <a href="<?= base_url() ?>user/tutor/edit/<?= $result->id ?>" class="btn blue-madison btn-sm">
                                <i class="fa fa-edit"></i> <?= lang('edit') ?>  </a>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                    </div>
        
        </div>
        
        
        <div class="col-md-9">
        
        <div class="form-body">

                           

                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group margin-top-10">
                                        <label class="col-md-5 control-label bold"><?= lang('user_name') ?></label>
                                        <label class="col-md-7 control-label"><?= $result->user_name ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group margin-top-10">  
                                        <label class="col-md-5 control-label bold"><?= lang('email_address') ?></label>
                                        <label class="col-md-7 control-label"><?= ucwords($result->email) ?></label>
                                    </div>
                                </div>
                                

                                
                            </div>

                            <div class="row">
                                

                                <div class="col-md-6">
                                    <div class="form-group margin-top-10">
                                        <label class="col-md-5 control-label bold"><?= lang('contact_number') ?></label>
                                        <label class="col-md-7 control-label"><?= $result->contact_number ?></label>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group margin-top-10">
                                        <label class="col-md-5 control-label bold"><?= lang('created_on') ?></label>
                                        <label class="col-md-7 control-label"><?= readable_date($result->created) ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group margin-top-10">  
                                        <label class="col-md-5 control-label bold"><?= lang('status') ?></label>
                                        <label class="col-md-7 control-label"><?= ucwords($result->status) ?></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group margin-top-10">
                                        <label class="col-md-5 control-label bold"><?= lang('location') ?></label>
                                        <label class="col-md-7 control-label word-wrap1"><?= $result->location ?></label>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group margin-top-10">  
                                        <label class="col-md-5 control-label bold"><?= lang('description') ?></label>
                                        <label class="col-md-7 control-label"><?= ucwords($result->description) ?></label>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group margin-top-10">  
                                        <label class="col-md-5 control-label bold">Categories</label>
                                        <label class="col-md-7 control-label">
                                        <?php $category = get_categories($result->id);
                                            if (count($category)>0) {
                                                foreach ($category as $ck => $cv) {
                                                    echo ucwords($cv->category) . "<br>";
                                                }
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                               
                                 
                            </div>

                        </div>
        
        
        
        </div>
       	<div class="col-md-12  margin-top-30">
                    <div class="form">
                        <div class="form-actions">

                            <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span> <?= lang('go_back') ?> </button>
                        </div>
                    </div>
                </div>
       </div>
          
       
  </div>
 </div>
 
 
 



