
<link href="<?= SITE_PATH ?>global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
<link href="<?= SITE_PATH ?>admin/pages/css/image-crop.css" rel="stylesheet"/>
<link href="<?=SITE_PATH?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<div id="divid"></div>


 <div class="dashboard-panel">
   <div class="dashboard-panel-heading"><?= $form_title ?></div>
   <div class="dashboard-panel-body">
    <div class="dashboard-panel-repeat">
     	
        <!-- BEGIN FORM-->
        <?php echo form_open_multipart('', array('class' => 'form-horizontal','id'=>'regForm')); ?>
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('user_name') ?><em class="required">*</em></label>
                        <div class="col-md-8">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="<?= lang('user_name') ?>" value="<?= @$_POST['user_name'] ? @$_POST['user_name'] : @$result->user_name ?>" <?= @$result->user_name ? 'disabled' : '' ?>  onblur="userExist(this.value);" required />

                            </div>
                            <div><span id="msg" class="text-danger"> </span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('password') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="<?= lang('password') ?>(<?=lang('min_8_characters')?>)" <?= @$result->id ? 'disabled' : '' ?>  required/>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('first_name') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <input type="text"  name="first_name" maxlength="30"  pattern="[a-zA-Z]+" class="form-control" placeholder="<?= lang('first_name') ?>"  value="<?= @$_POST ? @$_POST['first_name'] : @$result->first_name ?>" required />
                            <span id="msg1" class="text-danger"> </span>
                        </div>
                      
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('last_name') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <input type="text"  name="last_name" maxlength="30" pattern="[a-zA-Z]+"  class="form-control" placeholder="<?= lang('last_name') ?>" required="" value="<?= @$_POST ? @$_POST['last_name'] : @$result->last_name ?>">
                             <span id="msg2" class="text-danger"> </span>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('categories') ?><em class="required">*</em></label>
                        <div class="col-md-8">

                            <select class="form-control"  name="category[]" multiple="" required>
                                <?php
                                if (@$result->id !=  '') {
                                    $category = get_categories($result->id);
                                    if ($category!='') {
                                        $cat_arr = array();
                                        if (@$_POST['category']) {
                                            foreach ($_POST['category'] as $uc_k => $uc_v) {
                                                $cat_arr[] = $uc_v;
                                            }
                                        } else {
                                            foreach ($category as $uc_k => $uc_v) {
                                                $cat_arr[] = $uc_v->id;
                                            }
                                        }
                                        foreach ($categories as $dc_k => $dc_v) {
                                            if (in_array($dc_v->id, $cat_arr)) {
                                                echo '<option value="' . $dc_v->id . '" selected>' . ucwords($dc_v->category) . '</option>';
                                            } else {
                                                echo '<option value="' . $dc_v->id . '">' . ucwords($dc_v->category) . '</option>';
                                            }
                                        }
                                    } else {
                                        foreach ($categories as $dc_k => $dc_v) {
                                            echo '<option value="' . $dc_v->id . '">' . ucwords($dc_v->category) . '</option>';
                                        }
                                    }
                                } else {
                                    foreach ($categories as $dc_k => $dc_v) {
                                        echo '<option value="' . $dc_v->id . '">' . ucwords($dc_v->category) . '</option>';
                                    }
                                }
                                ?>


                            </select> 
							<span class="text-sm light-green">Press "ctrl" to select multiple category</span>
<!-- <input type="hidden" class="form-control " id="select2_tags" value="" name="select2tags"/>-->


                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('email_address') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                             
                               <input type="email" id="email" name="email" class="form-control"  placeholder="<?= lang('email_address') ?>" value="<?= @$_POST['email'] ? @$_POST['email'] : @$result->email ?>" <?= (@$result->email) ? 'disabled' : '' ?> onblur="emailExist(this.value);" required>
                              
                            </div>	
                            <div><span id="emailmsg" class="text-danger"> </span></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('contact_number') ?></label>
                        <div class="col-md-8">
                            <input type="text"  name="contact_number"  maxlength="10" class="form-control" placeholder="<?= lang('contact_number') ?>" value="<?= @$_POST ? @$_POST['contact_number'] : @$result->contact_number ?>" required="" />													
                            <span id="msg3" class="text-danger"> </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('status') ?><em class="required">*</em></label>
                        <div class="col-md-8">
                            <select class="form-control" name="status">
                                <option value="active" <?= @$_POST ? (@$_POST['status'] == 'active' ? 'selected' : '') : (@$result->status == 'active' ? 'selected' : '') ?>><?= lang('active') ?></option>
                                <option value="inactive" <?= @$_POST ? (@$_POST['status'] == 'inactive' ? 'selected' : '') : (@$result->status == 'inactive' ? 'selected' : '') ?>><?= lang('inactive') ?></option>
                            </select>
                        </div>
                    </div>
                </div>                                                
            </div>
            <div class="row">  
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('location') ?></label>
                        <div class="col-md-8">
                            <textarea maxlength="300"  name="location" class="form-control" placeholder="<?= lang('location') ?>"><?= @$_POST ? @$_POST['location'] : @$result->location ?></textarea>
                        </div>
                    </div>
                </div>


                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label bold"><?= lang('description') ?></label>
                        <div class="col-md-10">
                            <textarea  name="description" id="description" class="ckeditor" placeholder="<?= lang('description') ?>"><?= @$_POST ? @$_POST['description'] : @$result->description ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">  

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label bold"><?= lang('profile_image') ?></label>
                        <div class="col-md-8">
                          
                           <div class="fileinput fileinput-new" data-provides="fileinput">
								<span class="btn default btn-file">
								<span class="fileinput-new" id="pimg"><?=lang('select_image')?></span>									  
								 <input type="file" name="userfile" class="file_selected"  id="file_text" onChange="pressed()">
								</span>
								<span id="selid">&nbsp;</span>
								<span class="pull-right"><?php if (@$result->id !=   '') { ?>
                                <img  src="<?= profile_image(@$result->id) ?>" style="width:65px;height:65px;">
                            <?php } ?></span>
								
					     </div>
                        </div>
                        
                    </div>
                    <span class="label label-danger"><?=lang('note')?>!</span> <span class="fileinput-exists">  <?=lang('img_upload_note')?></span>
                </div>
              
                <div class="col-md-6" id="image">

                </div>


            </div>

            <div class="row">  
                <div class="col-md-12">
                    <div  id="dynamic_pic" class="display_none">

                    </div>


                </div>
            </div>

            <!--- image dimensions --->   
            <input type="hidden" id="crop_x" name="x"/>
            <input type="hidden" id="crop_y" name="y"/>
            <input type="hidden" id="crop_w" name="w"/>
            <input type="hidden" id="crop_h" name="h"/>
            <!---end of image dimensions --->

        </div>
        <?php if (@$result->id   != '') { ?>
            <input type="hidden" name="id" value="<?= $result->id ?>" />
            <input type="hidden" name="profile_image" value="<?= @$result->profile_image ?>" />
        <?php } ?>
        <div class="clearfix"></div>
        <div class="col-md-12 form margin-top-30">
            <div class="row">
                <div class="form-actions">
                    <button type="button"  onclick="send_data();" id="register-submit-btn" class="btn btn-primary"><span class="circle-icon"><i class="fa fa-circle"></i></span> <?= $action ?></button>
                    <button type="button" class="btn btn-info" onclick="history.go(-1);"><span class="circle-icon"><i class="fa fa-circle"></i></span> <?= lang('go_back') ?></button>
                </div>
            </div>
        </div>
        </form>
        <!-- END FORM-->
    
    
    </div>
   </div>
 </div>



 
<script>
$(document).ready(function () {
	
  form_required_field_validation();
});	
</script>  
<script src="<?=SITE_PATH?>admin/pages/scripts/jquery.form.js"></script>

<script>
/*$( "form" ).submit(function(){
        var url =   '';
        <?php 
        if(@$result->id)
        { ?>
            url =   "<?= base_url() ?>user/tutor/edit/<?= @$result->id ?>";
        <?php }else{ ?>
            url =   "<?= base_url() ?>user/tutor/add";
        <?php } ?>
        var data    =   $("form").serialize();
        $.post(url,data,function(dat){
           // dat    =   JSON.parse(dat);
            if(dat=='success')
            {
               window.location.href="<?=base_url()?>user/tutor";
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
	   $("#register-submit-btn").attr('disabled',true);	
       $("#regForm").ajaxForm({
               success: showResponse
       }).submit();
  }
  
function showResponse(responseText,statusText)
{ 
  //responseText=$.parseJSON(responseText);
  if(statusText === 'success')
  {  
     if(responseText === 'success')
     {  
	  	window.location.href="<?=base_url()?>user/tutor";
     }else{
	  	$("#divid").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> '+responseText+'</div>');
       /* setTimeout(function(){$("#divid").empty(); },2600);*/
        $("#register-submit-btn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-save');
        $("#register-submit-btn").attr('disabled',false);  
            
     }
        
   }
}	
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
        
        if(exten    ===  'jpg' || exten    ===  'JPG' || exten    ===  'PNG' || exten    ===  'png' || exten    ===  'GIF' || exten    ===  'gif')
        {
            reader.onload = function (e) {
                setTimeout(function(){
                    $("#dynamic_pic").html("<img src='" + e.target.result + "' id='demo8' style='max-width:1040px;' alt='Jcrop Example' /><br/><button type='button' class='btn btn-success btn-sm crop-done'>Crop</button>");
                    FormImageCrop.init();
                },500);    
        };
            
        }else{
            setTimeout(function(){
                $("#dynamic_pic").html('<p style="color: #e02222;padding-top:6px;">Uploaded extension file not allowd. Only .jpg, .png, .gif extensions allow.</p>');
                $("input[name='userfile']").val('');
            },500);
        }
        reader.readAsDataURL(files[0]);
            $("#dynamic_pic").show('slow');
    });

    $(document).on('click', '.crop-done', function () {
        $("#dynamic_pic").hide('slow');
    });
</script>

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
            url: "<?= base_url() ?>user/tutor/email_exist",
            data: csrf_name + '=' + csrf_token + "&email=" + emailid,
            success: function (data) {

                data = $.parseJSON(data);

                if (parseInt(data['isExist']) != 0)
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
    function userExist(username)
    {
        if (username == '' || username == null)
        {
            $("#msg").html('');
            return;
        }
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>user/tutor/user_exist",
            data: csrf_name + '=' + csrf_token + "&username=" + username,
            success: function (data) {

                data = $.parseJSON(data);

                if (parseInt(data['isExist']) != 0)
                {
                    $("#user_name").val('');
                    $("#msg").html(data['msg']);
                }
                else
                {
                    $("#msg").html('');
                }

            }
        });

    }

</script>

<script>
    window.pressed = function(){
        var a = document.getElementById('file_text');
        if(a.value == "")
        {
            fileLabel.innerHTML = "No file Selected";
        }else{
            var theSplit = a.value.split('\\');
            fileLabel.innerHTML = theSplit[theSplit.length-1];
        }
    };
	
</script>


<script src="<?= SITE_PATH ?>global/plugins/jcrop/js/jquery.color.js"></script>
<script src="<?= SITE_PATH ?>global/plugins/jcrop/js/jquery.Jcrop.min.js"></script>
<script src="<?= SITE_PATH ?>admin/pages/scripts/form-image-crop.js"></script>

<script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="css/samples.css">
<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
<script>
$(document).ready(function(){
    /*ckeditor toolbar remover*/
        var cknumber    =   $('.ckeditor').size();
        $('.ckeditor').each(function(){
            var check=($(this).attr('class'));
            if(check=='ckeditor')
            {
            CKEDITOR.replace( $(this).attr('id'), {
	toolbar: [
		{ name: 'document', items: [ 'Source', '-','Copy', 'PasteFromWord','Scayt'] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
					// Defines toolbar group without name.
		['TextColor','BGColor','Font','FontSize'],
                { name: 'Styles', items: [ 'Styles'] },
		
                                // Line break - next group will be placed in new line.
		{ name: 'basicstyles', items: [ 'Bold','Italic','Underline','-','Subscript','Superscript'] },
               
		['NumberedList','BulletedList','Outdent','Indent','Blockquote'],
                ['Link','Unlink'],["JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock"],
                 
                { name: 'wiris', items: [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_formulaEditorChemistry' ] },
                { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Maximize' ] },
        ]
    });
        }
        else
        {
         
             CKEDITOR.replace($(this).attr('id'), {
    toolbar: [
        { name: 'document', items: [ 'Source', '-','Copy', 'Paste', 'PasteText', 'PasteFromWord','Scayt'] },    // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        ['TextColor','BGColor'],["Undo","Redo"],            // Defines toolbar group without name.                                                                                    // Line break - next group will be placed in new line.
        { name: 'basicstyles', items: [ 'Bold','Italic','Underline','-','Subscript','Superscript'] },
                { name: 'wiris', items: [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_formulaEditorChemistry' ] },
                { name: 'insert', items : [ 'Image','Flash','SpecialChar' ] },
            ]
        });
       
        }
        });
});
</script>