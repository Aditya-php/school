<?= get_flashdata() ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?= SITE_PATH ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?= SITE_PATH ?>admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="<?= SITE_PATH ?>admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<script src="<?= SITE_PATH ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>


<!-- BEGIN PROFILE SIDEBAR -->
<div class="dashboard-panel">
    <div class="dashboard-panel-heading-inner">
    <div class="lms-heading-bg margin-bottom-20">
      <div class="icon-white-gray"><img src="<?= base_url() ?>assets/admin/layout4/img/icon.png"></div>
      <div class="text-white-gray">Profile Overview </div>
    </div>
  </div>
 <div class="dashboard-panel-body">  
     
     
     <div class="col-md-3">
        <div class="my-profile-tutors-gray">
          <div class="my-profile-tutor">
           <img src="<?= profile_image(currentuserinfo()->id) ?>" alt="">
           </div>
          <div class="my-profile-tutors-heading">
            <h1><?= ucwords($profile_info->first_name . " " . $profile_info->last_name) ?> </h1>
            <h2><?php
                if ((int)$profile_info->user_type === 1) {
                    echo lang('admin');
                } elseif ((int)$profile_info->user_type === 2) {
                    echo lang('tutor');
                } elseif ((int)$profile_info->user_type === 3) {
                    echo lang('learner');
                }
                ?></h2>
          </div>
        </div>
      </div>
     
    
<!-- END BEGIN PROFILE SIDEBAR -->

<!-- BEGIN PROFILE CONTENT -->

    
        <div class="col-md-9">
           
                <div class="tabbable-line">
                    <div id="divid"> </div> 
                    <div class="grid">
                    <ul class="nav nav-tabs nav-success">
                        <li></li>
                        <li class="">
                            <a href="#tab_1_1" data-toggle="tab"><?= lang('edit_profile') ?></a>
                        </li>

                        <li>
                            <a href="#tab_1_2" data-toggle="tab"><?= lang('change_avatar') ?></a>
                        </li>

                        <li>
                            <a href="#tab_1_3" data-toggle="tab"><?= lang('change_password') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_4" data-toggle="tab"><?= lang('change_language') ?></a>
                        </li>
                        <!--<li>
                                <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                        </li>-->
                    </ul>
                </div>
               
                <div class="tab-content transparent">
                	<div class="tab-pane transparent active" id="tab_1_0">
              			<div class="row margin-top-20">
                		<div class="col-md-6 margin-bottom-10">
                  		<label class="col-md-4 control-label"><?= lang('first_name') ?></label>
                  		<div class="col-md-8"> <b><?= ucwords($profile_info->first_name); ?></b> </div>
               			 </div>
                		<div class="col-md-6 margin-bottom-10">
                  		<label class="col-md-4 control-label"><?= lang('first_name') ?></label>
                  		<div class="col-md-8"> <b><?= ucwords($profile_info->last_name) ?></b> </div>
                		</div>
              			</div>
              			<div class="row">
              			<div class="col-md-6 margin-bottom-10">
                  		<label class="col-md-4 control-label"><?= lang('email_address') ?></label>
                  		<div class="col-md-8"> <b><?= $profile_info->email ?></b> </div>
                		</div>
                		<div class="col-md-6 margin-bottom-10">
                  		<label class="col-md-4 control-label"><?= lang('contact_number') ?></label>
                  		<div class="col-md-8"> <b><?= $profile_info->contact_number ?></b> </div>
                		</div>
                		
              			</div>
              			<div class="row">
                			<div class="col-md-6 margin-bottom-10">
                 			 <label class="col-md-4 control-label"><?= lang('location') ?></label>
                  			<div class="col-md-8"> <b> <?= $profile_info->location ?></b> </div>
                			</div>
                			
                                </div>
                                <div class="row">
                                    <div class="col-md-12 margin-bottom-10">
                                        <label class="col-md-2 control-label"><?= lang('description') ?></label>
                                        <div class="col-md-10 text-justify"> <?= $profile_info->description ?> </div>
                                    </div>
                                </div>
            			</div>
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane" id="tab_1_1">
                            <?= form_open('', array('id' => 'infoChangeForm')); ?>
                            <div class="row margin-top-20">
                                <div class="col-md-6 margin-bottom-10">
                                    <label class="col-md-4 control-label"><?= lang('first_name') ?></label>
                                    <div class="col-md-8">
                                        <input type="text" id="f_name" placeholder="First Name" value="<?= $profile_info->first_name ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-bottom-10">
                                  <label class="col-md-4 control-label"><?= lang('last_name') ?></label>
                                  <div class="col-md-8">
                                      <input type="text" id="l_name" placeholder="Last Name" value="<?= $profile_info->last_name ?>" class="form-control"/>
                                  </div>
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-md-6 margin-bottom-10">
                                    <label class="col-md-4 control-label"><?= lang('email_address') ?></label>
                                    <div class="col-md-8">
                                        <input type="email" id="email_id" placeholder="Email Address" value="<?= $profile_info->email ?>" class="form-control"/>
                                        <input type="hidden" id="email_old" placeholder="Email Address" value="<?= $profile_info->email ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-bottom-10">
                                  <label class="col-md-4 control-label"><?= lang('contact_number') ?></label>
                                  <div class="col-md-8">
                                        <input type="text" id="c_no" placeholder="Contact Number" value="<?= $profile_info->contact_number ?>" class="form-control"/>
                                  </div>
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-md-12 margin-bottom-10">
                                    <label class="col-md-2 control-label"><?= lang('location') ?></label>
                                    <div class="col-md-10">
                                        <textarea id="loc" name="location" class="form-control" placeholder="Location" ><?= $profile_info->location ?></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row margin-top-20">
                            <div class="col-md-12 margin-bottom-10">
                                  <label class="col-md-2 control-label"><?= lang('description') ?></label>
                                  <div class="col-md-10">
                                        <textarea id="descpt" rows="8" name="description" class="form-control" placeholder="Description" ><?= $profile_info->description ?></textarea>
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $profile_info->id ?>"> 
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                			<div class="form">
                 			 <div class="form-actions">
                 			 <button type="button" id="editbt" onclick="editProfile();" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span>  Save Changes</button>
							 <button type="button" class="btn btn-info" onclick="load_view();"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  			</div>
                			</div>
              				</div>
                            <?php echo form_close(); ?>
                        </div>

                        <!-- END PERSONAL INFO TAB -->
                        <!-- CHANGE AVATAR TAB -->
                        <div class="tab-pane" id="tab_1_2">
                        <div class="col-md-12">
                            <?= form_open_multipart('user/user/changeImage', array('id' => 'imgChangeForms')); ?>
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                    </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new" id="pimg"><?= lang('select_image') ?></span>
                                            <span class="fileinput-exists"><?= lang('change') ?> </span>
                                            <input type="file" name="userfile" id="userfile">
                                        </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"><?= lang('remove') ?> </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                    <span class="label label-danger margin-right-10"><?= lang('note') ?>! </span>
                                    <span><?= lang('attached_note') ?> </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                			<div class="form">
                 			 <div class="form-actions">
                 			 <button type="button" id="chimgbt" onclick="changeImg();" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span> Submit</button>
							 <button type="button" class="btn btn-info" onclick="load_view();"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  			 <input type="hidden" id="userid" name="userid" value="<?= $profile_info->id ?>">		
                  			</div>
                			</div>
              				</div>
                            
                            <?php echo form_close(); ?>
                        </div>
                        </div>

                        <!-- END CHANGE AVATAR TAB -->
                        <!-- CHANGE PASSWORD TAB -->
                        <div  class="tab-pane" id="tab_1_3">
                        <div class="row">
                            <?= form_open('', array('id' => 'changePassForm')); ?>
                            
                            
                            <div class="col-md-12 margin-bottom-10">
                            <div class="form-group">
                                <label class="control-label col-md-4"><?= lang('password') ?></label>
                                <div class="col-md-5"><input type="password" id="cu_pass" class="form-control" placeholder="Password" name="password"  required="true"/> </div> 
                            </div>
                            </div>
                            
                            <div class="col-md-12 margin-bottom-10">
                            <div class="form-group">
                                <label class="control-label col-md-4"><?= lang('new_password') ?></label>
                                <div class="col-md-5"><input type="password" id="new_pass" class="form-control" placeholder="New Password" name="new_password"  required="true"/>  </div>
                            </div>
                            </div>
                            <div class="col-md-12 margin-bottom-10">
                            <div class="form-group">
                                <label class="control-label col-md-4"><?= lang('re_type_new_password') ?></label>
                                <div class="col-md-5"><input type="password" id="rtype_pass" class="form-control" placeholder="Confirm Password" name="confirm_password" required="true"/></div>
                            </div>
                            <div class="col-md-12">
                			<div class="form">
                 			 <div class="form-actions">
                 			 <button type="button" value="draft" id="chpwdbt" onclick="changePassword();" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span>  <?= lang('change_password') ?></button>
                 			 
							 <button type="button" class="btn btn-info" onclick="load_view();"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  			</div>
                			</div>
              				</div>
                            
                            <?php echo form_close(); ?>
                        </div>
                        </div>
                        </div>

                        <!-- END CHANGE PASSWORD TAB -->
                        <!--START CHANGE LANGUAGE TAB-->
                        <div  class="tab-pane" id="tab_1_4">
                        <div class="col-md-12">
                            <?= form_open('', array('id' => 'changeLangForm')); ?>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?= lang('language') ?></label>
                                <div class="col-md-5"><select name="laguage" id="new_lang" class="form-control" >
                                    <option value="english" <?php if ($profile_info->language === 'english') { echo "selected"; } ?>><?= lang('english') ?></option>
                                    <option value="french" <?php if ($profile_info->language === 'french') {echo "selected";} ?>><?= lang('français') ?></option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                			<div class="form">
                 			 <div class="form-actions">
                 			 <button type="button"  id="chlangbt" onclick="changeLanguage(this);" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span><?= lang('change_language') ?> </button>
							 <button type="button" class="btn btn-info" onclick="load_view();"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  			</div>
                			</div>
              				</div>
                            
                            <?php echo form_close(); ?>
                        </div>
                        </div>

                        <!--END CHANGE LANGUAGE TAB-->
                   
                </div>
            
        </div>
    </div>
</div>
<!-- END PROFILE CONTENT -->
</div>
<script src="<?= SITE_PATH ?>admin/pages/scripts/jquery.form.js"></script>                              
<script>
function editProfile() {

    $("#editbt").find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
    $("#editbt").attr('disabled', true);
    // $('#editbt').prop('disabled', true);
    var first_name 		= 	$("#f_name").val();
    var last_name 		= 	$("#l_name").val();
    var contact_number	= 	$("#c_no").val();
    var location		= 	$("#loc").val();
    var email			=	$("#email_id").val();
    var email_old		=	$("#email_old").val();    
    var description 	= 	$("#descpt").val();
    var id = $("#user_id").val();
    var postdata = csrf_name + '=' + csrf_token + "&id=" + id + "&first_name=" + first_name + "&last_name=" + last_name + "&email_old=" +email_old+ "&email=" +email+ "&contact_number=" + contact_number + "&location=" + location + "&description=" + description;

    $.ajax({
        type: 'POST',
        url: "<?= base_url() ?>user/user/profile_edit",
        data: postdata,
        beforeSend: function () {


        },
        success: function (data) {


            if (data == "email_verify")
            {

                $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Profile Info Updated Successfully & your account is under email verification.Please check mail  </div>');
                $("#editbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#editbt").attr('disabled', false);
                $("#email_old").val(email); 
                setTimeout(function () {
                    window.location.href = '<?= base_url() ?>user/user/profile_account';
                },750);
            }
            else if (data == "success")
            {

                $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Profile Info Updated Successfully </div>');
                $("#editbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#editbt").attr('disabled', false);
                setTimeout(function () {
                    window.location.href = '<?= base_url() ?>user/user/profile_account';
                },750);  
            }
            else if (data == "error")
            {
                $("#divid").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> Invalid request</div>');
                $("#editbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#editbt").attr('disabled', false);

            }
        }
    });
}

function changePassword()
{

    // $('#chpwdbt').prop('disabled',true);
    $("#chpwdbt").find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
    $("#chpwdbt").attr('disabled', true);

    var password = $("#cu_pass").val();
    var new_password = $("#new_pass").val();
    var confirm_password = $("#rtype_pass").val();
    var id = $("#user_id").val();
    //#################

    var postdata = csrf_name + '=' + csrf_token + "&id=" + id + "&password=" + password + "&new_password=" + new_password + "&confirm_password=" + confirm_password;

    $.ajax({
        type: 'POST',
        url: "<?= base_url() ?>user/user/change_password",
        data: postdata,
        beforeSend: function () {


        },
        success: function (data) {


            if (data === "success")
            {

                $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Password Updated Successfully </div>');
                $("#chpwdbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#chpwdbt").attr('disabled', false);
            }
            else
            {

                $("#divid").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> ' + data + '</div>');
                $("#chpwdbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#chpwdbt").attr('disabled', false);


            }
        }
    });
    //}

    //###################


}


function changeImg()
{
    //$('#chimgbt').prop('disabled',true);

    $("#chimgbt").find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
    $("#chimgbt").attr('disabled', true);
    $("#imgChangeForms").ajaxForm({
        success: showResponse
    }).submit();


}
function showResponse(responseText, statusText)
{
    if (statusText === 'success')
    {

        getProfileImage(responseText);
        $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>' + responseText + '</div>');
        //$('#chimgbt').prop('disabled',false);
        $("#chimgbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
        $("#chimgbt").attr('disabled', false);
    }


}

function getProfileImage()
{
    var id = $("#user_id").val();
    var postdata = csrf_name + '=' + csrf_token + "&id=" + id
    $.ajax({
		type: 'POST',
        url: "<?= base_url() ?>user/user/profile_image",
        data: postdata,
        success: function (data) {
            alert(data);
            //$("#imgid").html('<img src="' + data + '" class="img-responsive" alt="">');
            //$("#pimgid").html('<img src="' + data + '" class="img-circle" alt="">');
            $('img[src="<?= profile_image(currentuserinfo()->id) ?>"]').attr('src', data);
            
        }
    });
}


function changeLanguage(th)
{

    //$("#chlangbt").hide();
    $("#chlangbt").find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
    $("#chlangbt").attr('disabled', true);
    var new_lang = $("#new_lang").val();

    var id = $("#user_id").val();

    var postdata = csrf_name + '=' + csrf_token + "&id=" + id + "&language=" + new_lang;

    $.ajax({
        type: 'POST',
        url: "<?= base_url() ?>user/user/change_language",
        data: postdata,
        beforeSend: function () {

            // th.find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
        },
        success: function (data) {
            // alert(data);

            if (data === "success")
            {
                $("#chlangbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#chlangbt").attr('disabled', false);
                $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Language Updated Successfully </div>');
                //$('#chpwdbt').prop('disabled',false);
                //$("#chlangbt").show();
                setTimeout(function () {
                    window.location.href = '<?= base_url() ?>user/user/profile_account';
                }, 750);

            }
            else
            {
                $("#chlangbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#chlangbt").attr('disabled', false);

                $("#divid").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> ' + data + '</div>');
                //$("#chlangbt").show();


            }
        }
    });
    //}

    //###################


}
function load_view() {
    location.reload();
}
</script>                        



