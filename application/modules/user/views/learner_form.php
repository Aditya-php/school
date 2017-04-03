<?= get_flashdata() ?>
<link href="<?= SITE_PATH ?>global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
<link href="<?= SITE_PATH ?>admin/pages/css/image-crop.css" rel="stylesheet"/>
<link href="<?=SITE_PATH?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<div id="divid"></div>

<div class="dashboard-panel" id="learner_form">
<div class="dashboard-panel-heading-inner">
<div class="lms-heading-bg margin-bottom-20">
      <div class="icon-white-gray"><img src="<?= base_url() ?>assets/admin/layout4/img/icon.png"></div>
      <div class="text-white-gray"><?= $form_title ?></div>
    </div>
    </div>
    
    <div class="dashboard-panel-body">
        <!-- BEGIN FORM-->
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'regForm')); ?>
        <div class="form-body">
            <div class="row">
                <?php if (@$_REQUEST['grp']) { ?>
                    <input type="hidden" id="group_id" name="group_id" value="<?= $_REQUEST['grp'] ?>" />
                <?php } else { ?>
                    <input type="hidden" id="group_id" name="group_id" value="" />
                <?php } ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('user_name') ?><em class="required">*</em></label>
                        <div class="col-md-8">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" autocomplete="off" class="form-control" name="user_name" id="user_name" placeholder="<?= lang('user_name') ?>" value="<?= @$_POST['user_name'] ? @$_POST['user_name'] : @$result->user_name ?>" <?= @$result->user_name ? 'disabled' : '' ?> required="" onblur="learnerExist(this.value);"/>

                            </div>
                            <div><span id="msg" class="text-danger"> </span></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('email_address') ?><em class="required">*</em></label><div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" id="email" name="email" class="form-control" required="" placeholder="<?= lang('email_address') ?>" value="<?= @$_POST['email'] ? @$_POST['email'] : @$result->email ?>" <?= (@$result->email) ? 'disabled' : '' ?> onblur="emailExist(this.value);" required="">
                            </div>	
                            <div><span id="emailmsg" class="text-danger"> </span></div>
                        </div>

                    </div>
                </div>                                                                                   
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('first_name') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <input type="text" id="first_name"  name="first_name"   class="form-control" placeholder="<?= lang('first_name') ?>"  value="<?= @$_POST ? @$_POST['first_name'] : @$result->first_name ?>" required />
                            <span id="msg1" class="text-danger"> </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('last_name') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <input type="text" autocomplete="off" id="last_name" name="last_name"   class="form-control" placeholder="<?= lang('last_name') ?>" required="" value="<?= @$_POST ? @$_POST['last_name'] : @$result->last_name ?>">
                            <span id="msg2" class="text-danger"> </span>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ((int)currentuserinfo()->user_type === 1) { ?>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label bold"><?= lang('tutor') ?><em class="required">*</em></label>
                            <div class="col-md-8">
                                <input type="hidden" name="cur_tutor_id" id="cur_tutor_id" value="<?= @$result->parent_id ?>">

                                <select class="form-control"  name="tutor" id="tutor_id"  required <?= currentuserinfo()->user_type != '1' ? 'readonly' : '' ?> >
                                    <option value=""><?= lang('select_tutor') ?></option>
                                    <?php foreach ($tutor_list as $t_k => $t_v) { ?>
                                        <option value="<?= @$t_v->id ?>" <?= @$_POST ? (@$_POST['tutor'] == $t_v->id ? 'selected' : '') : (@$result->parent_id == $t_v->id ? 'selected' : '') ?> ><?= ucwords($t_v->first_name . " " . $t_v->last_name) ?></option>
                                    <?php } ?>
                                </select> 

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            
                        </div>
                    </div>
                </div>
                        <?php } ?>


            <div class="row">


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('password') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" autocomplete="off" class="form-control" name="password" id="password"  placeholder="<?= lang('password') ?>(<?=lang('min_8_characters')?>)" <?= @$result->id ? 'disabled' : '' ?>  required="">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('contact_number') ?><!--<em class="required">*</em>--></label>
                        <div class="col-md-8">
                            <input type="text"  name="contact_number" id="contact_number" class="form-control" placeholder="<?= lang('contact_number') ?>" value="<?= @$_POST ? @$_POST['contact_number'] : @$result->contact_number ?>"  />													
                        </div>
                    </div>
                </div>


            </div>


            <div class="row">  

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('status') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <select class="form-control" name="status" id="status">
                                <option value="active" <?= @$_POST ? (@$_POST['status'] == 'active' ? 'selected' : '') : (@$result->status == 'active' ? 'selected' : '') ?>><?= lang('active') ?></option>
                                <option value="inactive" <?= @$_POST ? (@$_POST['status'] == 'inactive' ? 'selected' : '') : (@$result->status == 'inactive' ? 'selected' : '') ?>><?= lang('inactive') ?></option>
                            </select>


                        </div>
                    </div>
                </div>                                                


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('location') ?></label>
                        <div class="col-md-8">
                            <textarea  name="location" id="location" class="form-control" placeholder="<?= lang('location') ?>" ><?= @$_POST ? $_POST['location'] : @$result->location ?></textarea>

                        </div>
                    </div>
                </div>


            </div>


            <div class="row"> 
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="tutor" value="<?= currentuserinfo()->id ?>" />
                        <label class="col-md-4 control-label bold">Profile Image</label>
                        <div class="col-md-8">
                            <span class="btn default btn-file">
							<span class="fileinput-new" id="pimg"><?=lang('select_image')?></span>									  
						    <input type="file" name="userfile" class="file_selected"  id="file_text" onChange="pressed()">
							</span>
							<span id="selid">&nbsp;</span> 
                        
                            <?php if (@$result->id   != '') { ?>
                                <img class="todo-userpic pull-right" src="<?= profile_image(@$result->id) ?>" style="width:65px;height:65px;">
                            <?php } ?>
                            <div id="p_img"></div>    
                        </div>
                    </div>                        
                    <span class="label label-danger"><?=lang('note')?>!</span> <span class="fileinput-exists"> <?=lang('img_upload_note')?></span>
                </div>
                <div class="col-md-6" id="image"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('description') ?></label>
                        <div class="col-md-8">
                            <textarea  name="description" id="description" class="form-control" placeholder="<?= lang('description') ?>" ><?= @$_POST ? @$_POST['description'] : @$result->description ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">  

            </div>
            <div class="row">  
                <div class="col-md-12">
                    <div  id="dynamic_pic" style="display: none;"></div>
                </div>
            </div>
            <!--- image dimensions --->   
            <input type="hidden" id="crop_x" name="x" value=""/>
            <input type="hidden" id="crop_y" name="y" value=""/>
            <input type="hidden" id="crop_w" name="w" value=""/>
            <input type="hidden" id="crop_h" name="h" value=""/>
            <!---end of image dimensions --->
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12"><div id="div_id">
        <?php if (@$result->id   !=  '') { ?>
                <input type="hidden" id="edit_id" name="id" value="<?= @$result->id ?>" />
                <input type="hidden" name="profile_image" value="<?= @$result->profile_image ?>" />
        <?php } ?>    
            </div>
            <div class="row form">
                <div class="form-actions">

                    <button type="button" onclick="send_data();"  id="register-submit-btn" class="btn btn-primary"><span class="circle-icon"><i class="fa fa-circle"></i></span> <?= $action ?></button>
                    <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span>  <?= lang('go_back') ?></button>
                </div>
            </div>
        </div>
    <?php echo form_close(); ?>
        <!-- END FORM-->
    </div>

</div>


<script>

    function emailExist(emailid)
    {
        if (emailid == '' || emailid == null)
        {
            $("#emailmsg").html('');
            return;
        }

        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>user/learner/email_exist", // specify url to call functon email_exist for check duplicate email
            data: csrf_name + '=' + csrf_token + "&email=" + emailid,
            success: function (data) {

                data = $.parseJSON(data);

                if (parseInt(data['isExist']) !== 0)
                {
                    $("#email").val('');
                    $("#emailmsg").html(data['msg']);
                }
                else
                {
                    $("#emailmsg").html('');
                }

            }
        });
    }
    function learnerExist(username)
    {
        if (username == '' || username == null)
        {
            $("#msg").html('');
            return;
        }
        var group_id = $('#group_id').val();
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>user/learner/learner_exist",
            data: csrf_name + '=' + csrf_token + "&user_name=" +username+"&group_id="+group_id,
            success: function (data) {
               
                data = $.parseJSON(data);

                if (parseInt(data['err_no']) >='1')
                {

                    $("#msg").html(data['msg']);
                    if(data['err_no']==='1' || data['err_no']==='2')
                    {
						 $("#first_name").val(data['result']['first_name']);
                    	 $('#first_name').attr('readonly', true);
                    	$("#last_name").val(data['result']['last_name']);
                    	$('#last_name').attr('readonly', true);
                   	 	$('#password').attr('readonly', true);
                    	$("#email").val(data['result']['email']);
                    	$('#email').attr('readonly', true);
                    	$("#contact_number").val(data['result']['contact_number']);
                    	$('#contact_number').attr('readonly', true);
                    	$("#location").val(data['result']['location']);
                    	$('#location').attr('readonly', true);
                    	$("#description").val(data['result']['description']);
                    	$('#description').attr('readonly', true);
                    	$("#status").val(data['result']['status']);
                    	$("#status").attr('disabled', true);
                    	$("#userfile").attr('disabled', true);
                    	$('#div_id').html('<input type="hidden" id="edit_id" name="id" value="' + data['result']['id'] + '" /><input type="hidden" name="profile_image" value="' + data['result']['profile_image'] + '" />');
                    	$('#p_img').html('<img class="todo-userpic pull-right" src="' + data['image_path'] + '" style="width:65px;;height:65px;">');
                    
					}else if (parseInt(data['err_no'])=='3'){
					
                    $('#div_id').html('');
                    $('#p_img').html('');
                    $('#first_name').attr('readonly', false);
                    $("#last_name").val('');
                    $('#last_name').attr('readonly', false);
                    $('#password').attr('readonly', false);
                    $("#email").val('');
                    $('#email').attr('readonly', false);
                    $("#contact_number").val('');
                    $('#contact_number').attr('readonly', false);
                    $("#location").val('');
                    $('#location').attr('readonly', false);
                    $("#description").val('');
                    $('#description').attr('readonly', false);
                    $("#status").attr('disabled', false);
                    $("#cat_id").attr('disabled', false);
                    $("#userfile").attr('disabled', false);
					}
                }
                else
                {
                	
                    $("#msg").html('');
                    $("#first_name").val('');
                    $('#first_name').attr('readonly', false);
                    $("#last_name").val('');
                    $('#last_name').attr('readonly', false);
                   	$('#password').attr('readonly', false);
                    $("#email").val('');
                    $('#email').attr('readonly', false);
                    $("#contact_number").val('');
                    $('#contact_number').attr('readonly', false);
                    $("#location").val('');
                    $('#location').attr('readonly', false);
                    $("#description").val('');
                    $('#description').attr('readonly', false);
                    $("#status").attr('disabled', false);
                    $("#userfile").attr('disabled', false);
                    $('#div_id').html('');
                    $('#p_img').html('');
                    
                }
            }
        });
    }
    function getcat(id)
    {
        var tutor_id = $("#tutor_id").val();
        var id = $("#edit_id").val();
        var cur_tutor = $("#cur_tutor_id").val();
        var mystr = $("#cat_arr").val();
        var myarray = mystr.split(':');

        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>user/learner/tutor_category",
            data: csrf_name + '=' + csrf_token + "&TUTOR_ID=" + tutor_id,
            success: function (data) {

                data = $.parseJSON(data);
                var str = '';
                var strval = '';
                var val = ''

                for (var i = 0; i < data['result'].length; i++)
                {
                    strval = data['result'][i].category;
                    val = strval.charAt(0).toUpperCase() + strval.substr(1);
                    if ((jQuery.inArray(data['result'][i].id, myarray) !== -1) && (cur_tutor == tutor_id))
                    {
                        str += '<option value="' + data['result'][i].id + '" selected>' + val + '</option>';
                    }
                    else
                    {
                        str += '<option value="' + data['result'][i].id + '">' + val + '</option>';
                    }
                }
                $("#cat_id").html(str);
            }
        });
    }
</script>   

<script src="<?= SITE_PATH ?>admin/pages/scripts/jquery.form.js"></script>
<script>
$(document).ready(function () {
	
  form_required_field_validation();
});	
</script>
<script>
    
/*$( "form" ).submit(function(){
	    var group_id = $('#group_id').val(); 
        var url =   '';
        <?php 
        if(@$result->id)
        { ?>
            url =   "<?= base_url() ?>user/learner/edit/<?= @$result->id ?>";
        <?php }else{ ?>
            url =   "<?= base_url() ?>user/learner/add";
        <?php } ?>
        var data    =   $("form").serialize();
        $.post(url,data,function(dat){
           // dat    =   JSON.parse(dat);
            if(dat=='success')
            {
               if (group_id != '')
                {
                    window.location.href = "<?= base_url() ?>groups/groups_detail/" + group_id;
                }
                else
                {
                    window.location.href = "<?= base_url() ?>groups/mygroups";
                }
            }else{
            	$("#divid").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> '+dat+'</div>');
                setTimeout(function(){$("#divid").empty(); },2600);
                $("#register-submit-btn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#register-submit-btn").attr('disabled',false);  
                
            }
        });
        return false;
    });*/
    function send_data()
    {

        $("#register-submit-btn").find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
        $("#register-submit-btn").attr('disabled', true);
        $("#regForm").ajaxForm({
            success: showResponse
        }).submit();
    }

    function showResponse(responseText, statusText)
    {
        var group_id = $('#group_id').val();
        
        if (statusText === 'success')
        {
            if (responseText === 'success')
            {
                if (parseInt(group_id) !== '')
                {
                    window.location.href = "<?= base_url() ?>groups/groups_detail/" + group_id;
                }
                else
                {
                    window.location.href = "<?= base_url() ?>groups/mygroups";
                }
            } else {
            	
                $("#divid").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> ' + responseText + '</div>');
                setTimeout(function () {
                    $("#divid").empty();
                }, 3600);
                $("#register-submit-btn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
                $("#register-submit-btn").attr('disabled', false);

            }

        }
    }
</script>



<script src="<?= SITE_PATH ?>global/plugins/jcrop/js/jquery.color.js"></script>
<script src="<?= SITE_PATH ?>global/plugins/jcrop/js/jquery.Jcrop.min.js"></script>
<script src="<?= SITE_PATH ?>admin/pages/scripts/form-image-crop.js"></script>
<script>
jQuery(document).ready(function() {
FormImageCrop.init();
});
</script>
<script>
    $("input[name='userfile']").change(function () {
        var files = this.files;
        var reader = new FileReader();
        var name = this.value;
        
        var a   =   $("input[name='userfile']").val();
        var theSplit = a.split('\\');
        var filename    =   theSplit[theSplit.length-1];
        var exten       =   filename.split('//');
        $("#selid").html(filename);
        exten           =   exten[0];
        exten           =   exten.split('.')[1];
        if(exten    ===  'jpg' || exten    ===  'JPG' || exten    ===  'PNG' ||exten    ===  'png' || exten    ===  'GIF' || exten    ===  'gif')
        {
            reader.onload = function (e) {
                $("#dynamic_pic").html("<img src='" + e.target.result + "' id='demo8' alt='' /><br/><button type='button' class='btn btn-success btn-sm crop-done'>Crop</button>");
                FormImageCrop.init();
            };
        }else{
            $("#dynamic_pic").html('<p style="color: #e02222;padding-top:6px;">Uploaded extension file not allowd. Only .jpg, .png, .gif extensions allow.</p>');
            setTimeout(function(){
                $("input[name='userfile']").val('');
            },500);
        }
        reader.readAsDataURL(files[0]);
        $("#dynamic_pic").show('slow');
    });

    $(document).on('click', '.crop-done', function () {
        $("#dynamic_pic").hide('slow');
    });
    
    /*$("input[name='userfile']").change(function () {
        var files = this.files;
        var reader = new FileReader();
        var name = this.value;
        var a   =   $("input[name='userfile']").val();
        var theSplit = a.split('\\');
        var filename    =   theSplit[theSplit.length-1];
        var exten       =   filename.split('//');
        exten           =   exten[0];
        exten           =   exten.split('.')[1];
        
        if(exten    ==  'jpg' || exten    ==  'JPG' || exten    ==  'PNG' ||exten    ==  'png' || exten    ==  'GIF' || exten    ==  'gif')
        {
            reader.onload = function (e) {
                $("#dynamic_pic").html("<img src='" + e.target.result + "' id='demo8' style='max-width:1040px;' alt='Jcrop Example' /><br/><button type='button' class='btn btn-success btn-sm crop-done'>Crop</button>");
                FormImageCrop.init();
            };
            
        }else{
            $("#dynamic_pic").html('<p style="color: #e02222;padding-top:6px;">Uploaded extension file not allowd. Only .jpg, .png, .gif extensions allow.</p>');
            setTimeout(function(){
                $("input[name='userfile']").val('');
            },500);
        }
        reader.readAsDataURL(files[0]);
            $("#dynamic_pic").show('slow');
    });*/
    
</script>


<script>
	window.pressed = function(){
    var a = document.getElementById('file_text');
    if(a.value == "")
    {
        fileLabel.innerHTML = "No file Selected";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};
	
</script>



