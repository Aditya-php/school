<?= get_flashdata() ?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?= SITE_PATH ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?= SITE_PATH ?>admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="<?= SITE_PATH ?>admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->

<script src="<?= SITE_PATH ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>



<div class="dashboard-panel">
   <div class="dashboard-panel-heading">
   <div class="lms-heading-bg margin-bottom-10">
      <div class="icon-white-gray"><img src="<?= base_url() ?>assets/admin/layout4/img/icon.png"></div>
      <div class="text-white-gray"><?= lang('profile_overview') ?></div>
    </div>
</div>

   <div class="dashboard-panel-body">
       
       <div class="row">
        <div class="col-md-3">
        	<div class="portlet light">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            
                            
                            <img src="<?= profile_image($profile_info->id) ?>" class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name bold"><?= ucwords($profile_info->first_name . " " . $profile_info->last_name) ?></div>
                            <div class="profile-usertitle-job">
                                <?php
                                if ((int)$profile_info->user_type === 1) {
                                    echo lang('admin');
                                } elseif ((int)$profile_info->user_type === 2) {
                                    echo lang('tutor');
                                } elseif ((int)$profile_info->user_type === 3) {
                                    echo lang('learner');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
        
        </div>
        
        
        <div class="col-md-9">
        
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group margin-top-10">
                                <label class="col-md-5 control-label bold"><?= lang('contact_number') ?></label>
                                <label class="col-md-7 control-label"><?= $profile_info->contact_number ?></label>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group margin-top-10">  
                            <label class="col-md-5 control-label bold"><?= lang('email_address') ?></label>
                            <label class="col-md-7 control-label"><?= $profile_info->email ?></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group margin-top-10">
                            <label class="col-md-5 control-label bold"><?= lang('location') ?></label>
                            <label class="col-md-7 control-label"><?= $profile_info->location ?></label>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group margin-top-10">  
                            <label class="col-md-5 control-label bold"><?= lang('status') ?></label>
                            <label class="col-md-7 control-label"><?= $profile_info->status ?></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group margin-top-10">
                            <label class="col-md-5 control-label bold"><?= lang('created_on') ?></label>
                            <label class="col-md-7 control-label word-wrap1"><?= readable_date($profile_info->created) ?></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group margin-top-10">
                            <label class="col-md-2 control-label bold"><?= lang('description') ?></label>
                            <label class="col-md-10 control-label text-justify"><?= $profile_info->description ?></label>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
       	<div class="col-md-12  margin-top-30">
                    <div class="form">
                        <div class="form-actions">

                            <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back </button>
                        </div>
                    </div>
                </div>
       </div>
          
       
  </div>
 </div>
<!-- END PROFILE CONTENT -->