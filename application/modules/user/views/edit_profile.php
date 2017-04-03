<div class="dashboard-panel">
  <div class="dashboard-panel-heading-inner">
    <div class="lms-heading-bg margin-bottom-20">
      <div class="icon-white-gray"><img src="<?= base_url() ?>assets/admin/layout4/img/icon.png"></div>
      <div class="text-white-gray">Profile Overview </div>
    </div>
  </div>
  <div class="dashboard-panel-body">
    <div class="row">
      <div class="col-md-3">
        <div class="my-profile-tutors-gray">
          <div class="my-profile-tutor">
           <img src="<?= profile_image($profile_info->id) ?>" alt="">
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
      <div class="col-md-9">
        <div class="tabbable-line">
          <div class="grid">
            <ul class="nav nav-tabs nav-success">
              <li></li>
              <li> <a href="#tab_15_2" data-toggle="tab"><?= lang('edit_profile')?>  </a> </li>
              <li> <a href="#tab_15_3" data-toggle="tab"> <?= lang('change_avatar') ?> </a> </li>
              <li> <a href="#tab_15_4" data-toggle="tab"> <?= lang('change_password') ?></a> </li>
              <li> <a href="#tab_15_5" data-toggle="tab"> <?= lang('change_language') ?> </a> </li>
            </ul>
          </div>
          <div class="tab-content transparent ">
            <div class="tab-pane transparent active" id="tab_15_1">
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
                  <label class="col-md-4 control-label"><?= lang('contact_no') ?></label>
                  <div class="col-md-8"> <b><?= $profile_info->contact_number ?></b> </div>
                </div>
                <div class="col-md-6 margin-bottom-10">
                  <label class="col-md-4 control-label"><?= lang('email_address') ?></label>
                  <div class="col-md-8"> <b><?= $profile_info->email ?></b> </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 margin-bottom-10">
                  <label class="col-md-4 control-label"><?= lang('location') ?></label>
                  <div class="col-md-8"> <b> <?= $profile_info->location ?></b> </div>
                </div>
                <div class="col-md-6 margin-bottom-10">
                  <label class="col-md-4 control-label"><?= lang('description') ?></label>
                  <div class="col-md-8"> <b> <?= $profile_info->description ?> </b> </div>
                </div>
              </div>
            </div>
            <div class="tab-pane transparent" id="tab_15_2">
              <?= form_open('', array('id' => 'infoChangeForm')); ?>
                <div style="display:none">
                  <input type="hidden" name="csrf_test_name" value="e67983da5e51b703180d2df651bff147">
                </div>
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
                <div class="row">
                  <div class="col-md-6 margin-bottom-10">
                    <label class="col-md-4 control-label"><?= lang('contact_no') ?></label>
                    <div class="col-md-8">
                      <input type="text" id="c_no" placeholder="<?= lang('contact_no') ?>" value="<?= $profile_info->contact_number ?>" class="form-control"/>
                     </div>
                    </div>
                           <div class="col-md-6 margin-bottom-10">
                    <label class="col-md-4 control-label"><?= lang('email_address') ?></label>
                    <div class="col-md-8">
                      <input type="text" id="emailid" placeholder="<?= lang('email_address') ?>" value="<?= $profile_info->email ?>" class="form-control" readonly>
                    </div>
                  </div>
                  </div>
           
                
                <div class="row">
                  <div class="col-md-6 margin-bottom-10">
                    <label class="col-md-4 control-label"><?= lang('location') ?></label>
                    <div class="col-md-8">
                      <textarea id="loc" name="location" class="form-control" placeholder="Location" ><?= $profile_info->location ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 margin-bottom-10">
                    <label class="col-md-4 control-label"><?= lang('description') ?></label>
                    <div class="col-md-8">
                      <textarea id="descpt" name="description" class="form-control" placeholder="Description" ><?= $profile_info->description ?></textarea>
                      <input type="hidden" id="user_id" name="user_id" value="<?= $profile_info->id ?>">		
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form">
                    <div class="form-actions">
                      <button type="button" id="editbt" onclick="editProfile();" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span> Save</button>
                      <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                    </div>
                  </div>
                </div>
               <?php echo form_close(); ?>
            </div>
            <div class="tab-pane transparent" id="tab_15_3"> 
            
            
            <div class="col-md-12">
                <div class="form">
                  <div class="form-actions">
                    <button type="button" value="draft" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span> Save </button>
                    <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane transparent" id="tab_15_4">
              <div class="row">
                <div class="col-md-12 margin-bottom-10">
                  <label class="col-md-3 control-label">Password</label>
                  <div class="col-md-5">
                    <input type="text" id="f_name"  value="Test" class="form-control">
                  </div>
                </div>
                <div class="col-md-12 margin-bottom-10">
                  <label class="col-md-3 control-label">New Password</label>
                  <div class="col-md-5">
                    <input type="text" id="l_name"  value="Tutor" class="form-control">
                  </div>
                </div>
                <div class="col-md-12 margin-bottom-10">
                  <label class="col-md-3 control-label">Re-type New Password</label>
                  <div class="col-md-5">
                    <input type="text" id="f_name"  value="Test" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form">
                  <div class="form-actions">
                    <button type="button" value="draft" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span> Change Password</button>
                    <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane transparent" id="tab_15_5">
              <div class="row">
                <div class="col-md-12 margin-bottom-10">
                  <label class="col-md-3 control-label">Language</label>
                  <div class="col-md-5">
                    <select name="laguage" id="new_lang" class="form-control">
                      <option value="english" selected="">English</option>
                      <option value="french">Français</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form">
                  <div class="form-actions">
                    <button type="button" value="draft" class="btn btn-warning blue-hoki-custom"><span class="circle-icon"><i class="fa fa-circle"></i></span> Change Language </button>
                    <button type="button" class="btn btn-info" onclick=""><span class="circle-icon"><i class="fa fa-circle"></i></span> Go Back</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= SITE_PATH ?>admin/pages/scripts/jquery.form.js"></script>                              
<script>
function editProfile() {

    $("#editbt").find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
    $("#editbt").attr('disabled', true);
    // $('#editbt').prop('disabled', true);
    var first_name = $("#f_name").val();
    var last_name = $("#l_name").val();
    var contact_number = $("#c_no").val();
    var location = $("#loc").val();
    var description = $("#descpt").val();
    var id = $("#user_id").val();
    var postdata = csrf_name + '=' + csrf_token + "&id=" + id + "&first_name=" + first_name + "&last_name=" + last_name + "&contact_number=" + contact_number + "&location=" + location + "&description=" + description;

    $.ajax({
        type: 'POST',
        url: "<?= base_url() ?>user/user/profile_edit",
        data: postdata,
        beforeSend: function () {


        },
        success: function (data) {

            if (data === "success")
            {

                $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Profile Info Updated Successfully </div>');
                $("#editbt").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#editbt").attr('disabled', false);

            }
            else if (data === "error")
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

                $("#divid").html('<div class="alert alert-success flash-row" ><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Password Updated Successfully & your account is under email verification.<br />Please check the mail  </div>');
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

</script>                        



