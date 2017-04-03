<div class="clearfix"></div>
<div class="slider inner-slide">
<div class="inner-banner">
	<img src="<?=base_url()?>frontend_assets/img/inner-baner.jpg" class="img-responsive">
</div>
    
</div>

<div class="clearfix"></div>

<div class="pad-50">
	<div class="container">
	    <div class="row">
            <div class="col-md-12">
              <?= get_flashdata() ?>
            </div>            
        </div>
        <?php
            
             if(@$profile_info->id!='')
             {
			 	$readonly	=	"readonly";
			 	$disabled	=	"disabled";
			 }else{
			 	$readonly	=	"";
			 	$disabled	=	"";
			 }
            ?>
      <div class="clearfix"></div> 
		<div class="row">
            <div class="col-md-12">
                <h2 class="inner-heading"> User Profile </h2>
            </div>            
        </div>
    
    	<div class="row">
    		<div class="col-md-3 col-sm-4 col-xs-12">
                <div class="profile profile-img" id="profileImgDiv">
                <?php
                  if(empty(@$profile_info->profile_image))
                  {
				  	$img	=	base_url().'assets/upload_image/user-placeholder.png' ;
					$class="img-responsive blank_img";
					
				  }else{
				  	$img	=	base_url().'assets/upload_image/'.@$profile_info->profile_image ;
					$class="img-responsive user-image";
				  }
                    
                ?>
                    <img src="<?=$img?>" class="<?=$class?>" id="profileImgId" />
					
					
                </div>
                
				<?= form_open_multipart('site/user/changeImage', array('name'=>'uploadForm','id' => 'imgChangeForms')); ?>
                <div class="upload-pic">
                	 <input type="file" id="profileImg">
                	<a href="" class="btn btn-default"> Change Profile Picture <i> Browse </i></a>
                </div>
                <?php echo form_close();?>
            </div>
        	<div class="col-md-9 col-sm-8 col-xs-12">
        	    <?php echo form_open('', array('class' => 'login-form bs-example-form','id'=>'resetForm')); ?>
    			<div class="profile_details">
                	<ul>
                    	<li class="name"> <?=ucfirst(@$profile_info->first_name).'  '.ucfirst(@$profile_info->last_name)?></li>
                    	<li class="heading"> Basic Information :-  </li>
                        <li>  <span class="left-heading"> User Name : </span> <span  class="form-control"  <?= $readonly ?>  <?= $disabled ?>><?=@$profile_info->user_name?></span></li>
                        <li>  <span class="left-heading"> Email Address : </span> <span  class="form-control" <?= $readonly ?>  <?= $disabled ?>><?=@$profile_info->email?></span></li>
						<?php if(@$profile_info->user_type == '2') { ?>
		                <li>  <span class="left-heading"> Business Name : </span> 
						    <input type="text" name="business_name"  class="form-control" maxlength="50" value="<?=@$profile_info->business_name?>" />
						
						</li>
						<?php } ?>
                        <li>  <span class="left-heading"> First Name : </span> <input type="text" name="first_name"  class="form-control" maxlength="50" value="<?=@$profile_info->first_name?>" /></li>
                        <li>  <span class="left-heading"> Last Name : </span><input type="text" name="last_name"  class="form-control" maxlength="50" value="<?=@$profile_info->last_name?>" /> </li>
                        <li>  <span class="left-heading"> Contact Number : </span><input type="text" id="contactNumber" name="contact_number" maxlength="12"  class="form-control"  value="<?=@$profile_info->contact_number?>" /> </li>
                        <li>  <span class="left-heading"> Address : </span><textarea name="address" class="form-control"><?=@$profile_info->address?></textarea> </li>
                        <li>  <span class="left-heading"> Registration Date : </span><span  class="form-control" <?= $readonly ?>  <?= $disabled ?>><?=date('Y-m-d',strtotime(@$profile_info->created))?></span> </li>
                    </ul>
                    <div class="text-center spacer">
                    	
                    	<button type="submit" class="btn btn-primary"><i aria-hidden="true" class="fa fa-floppy-o"></i> Save</button>
                        &nbsp;    &nbsp;
                        <button type="button" class="btn btn-info" onclick="history.go(-1);">Go Back</button>
                    </div>	
                </div>
                <?php echo form_close(); ?>	
    		</div>
		</div>
	
    <div class="clearfix"></div>
</div>

</div>

<script>

//-----------
$("#profileImg").on('change',(function(e) {
	e.preventDefault();
    //image_block =   $(this).parents().eq(1).find('.targetLayer').attr('data');
   // $(this).parents().eq(1).find('.targetLayer').html('<i class="fa fa-circle-o-notch fa-spin lineheight fa-spin-color"></i>');
   $("#profileImgDiv").html('<i class="fa fa-circle-o-notch loading fa-spin lineheight fa-spin-color"></i>');
   
    var file_data = $(this).prop("files")[0];
    var form_data = new FormData();               
    var th  =   $(this);
    setTimeout(function(){
    form_data.append("userfile", file_data);
    $.ajax({
            url: "<?=base_url()?>site/user/changeImage",
            type: "POST",
            data:  form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
              data    =   JSON.parse(data);
              if(data['status']=='success')
              {
              	  //$('img[src="<?=base_url()?>assets/upload_image/<?= profile_image(currentuserinfo()->id) ?>"]').attr('src',data);
              	  var imagepath="<?=base_url()?>assets/upload_image/"+data['img'];
              	 $("#profileImgDiv").html('<img src="'+imagepath+'"  class="img-responsive user-image" />'); 
				 $('.user-image').attr('src',imagepath);
					
               }else if(data['status']=='error'){                                       
                    
               }
                                    
            },
            error: function() 
            {
            	
            } 	        
                
	   });
           },500);
	}));
//-----------
	

</script>