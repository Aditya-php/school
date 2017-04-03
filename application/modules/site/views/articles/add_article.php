<div class="withou_search">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="border_bottom">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-6 text-left">
                        <h2 class="inner-heading">  
                             <?php if(uri_segment(3) ==  'add'){ ?>
                                New Article
                            <?php }else if(uri_segment(3) ==  'edit'){ ?>
                                Edit Article 
                            <?php }?>
                        </h2>
                    </div>  
                    <div class="col-md-4 col-sm-6 col-xs-6 text-right">
                        <ul class="page-breadcrumb breadcrumb">
                            <?php foreach ($breadcum as $b_key => $b_val) {
                                if ($b_key != '') {
                                ?>
                                <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a> </li>
                                <?php } else if ($b_key == '') { ?>
                                <li class="active"> <?= $b_val ?> </li>
                                <?php } } ?>
                        </ul>
                    </div>
                <div class="clearfix"></div>
                </div>
            </div>
                
                </div>
            </div>
        </div>
</div>

<div class="clearfix"></div>

<div class="pad-50">
   
	<div class="container">
	    <div class="row">
            <div class="col-md-12" id="errorMsg">
             <?php
               if(@$error_msg!=''){
			 ?>
			 <div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> <?=@$error_msg?> </div>
			 <?php  	
			   }
             ?>
            </div>            
        </div>
	    <?= form_open_multipart('', array('name'=>'articleForm','id' => 'articleForm')); ?>
	    <?php
	            
	    ?>
        <div class="row add_article">
            <div class="col-md-5 col-md-offset-4">
                <div class="text-center">
	            	<h2 style="color:#2d2d29">
                            
                            <?php if(uri_segment(3) ==  'add'){ ?>
                                Add New Article 
                            <?php }else if(uri_segment(3) ==  'edit'){ ?>
                                Edit Article 
                            <?php }?>
                        </h2>
                    <img src="<?= base_url() ?>frontend_assets/img/line.png">
                </div>
                <div class="form-group">
                    
                	<label> Select Category : </label>
					<select class="form-control" name="article_category">
                    	<option value=""> Select Category </option>
                    	<?php 
                    	  if(@$articles_cat != '')
                    	  {
						  	foreach(@$articles_cat as $obcat)
						  	{
						?>
						      <option value="<?=$obcat->id?>" <?php if(@$_POST['article_category']!='' && @$_POST['article_category']== $obcat->id){echo "selected"; }else if(@$article_result!='' && @$article_result->article_category==$obcat->id){echo "selected";}else{echo "";}?>><?=$obcat->title?></option>
						<?php		
							}
						  }
                    	?>
                        
                    </select>
				</div>
                
                <div class="form-group">
                	<label> Title : </label>
					<input type="text" name="article_title" value="<?php if(@$_POST['article_title']){ echo @$_POST['article_title'];}else if(@$article_result!='' && @$article_result->title!=''){echo @$article_result->title;}else{echo '';}?>"  placeholder="Title" class="form-control"  />
				</div>
                <div class="form-group">
                    <label>  Description : </label>
                    <textarea class="form-control" placeholder="Write Description Here" name="description" ><?php if(@$_POST['description']){ echo @$_POST['description'];}else if(@$article_result!='' && @$article_result->description!=''){echo @$article_result->description;}else{}?></textarea>
		</div>
                <div class="form-group">
                	<label> Upload Photo : </label>
					<div class="input-group image-preview">
               
                <span class="input-group-btn">
                    <div class="btn btn-default image-preview-input">
                       
                        <span class="image-preview-input-title">Choose File</span>
                        <input type="file" id="articleImg" accept="image/png, image/jpeg, image/gif" name="article_image"/> <!-- rename it -->
                    </div>
                </span>
                <?php if(@$article_result!='' && @$article_result->article_image!=''){?>
                &nbsp;&nbsp;<img src="<?=base_url()?>assets/article_image/<?=@$article_result->article_image?>" width="35px;" height="35px;">
            	<?php } ?>
            		</div>
                        <span class="image-preview-input-title" style="color:#F36F02;">Note:</span>
                        <span class="image-preview-input-title"> Only jpg, png, gif extensions images allowed.</span>
                </div>
               <div class="text-center divider">
               		<button type="submit" name="save" id="save_bt" class="btn btn-md  btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
					&nbsp;&nbsp;<button type="button" class="btn btn-md  btn-warning" onclick="history.go(-1);">Go Back</button>
               </div>
                
            </div>
             <div class="clearfix"></div>
        </div>
        <?php echo form_close();?>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<script>

/*$("#save_bt").on('click',(function(e) {
	//e.preventDefault();
    $(this).parents().eq(1).find('i').addClass('fa fa-circle-o-notch fa-spin fa-spin-color');
    $("#save_bt").attr('disabled',true);
    var file_data = $("#articleImg").prop("files")[0];
    var form_data = new FormData($(this)[0]);              
    var th  =   $(this);
  
    	form_data.append("article_image",file_data);
    	
    	$.ajax({
    		 url: "<?=base_url()?>site/articles/add",
             type: "POST",
             data:  form_data,
             contentType: false,
             cache: false,
             processData:false,
            success: function(data)
            {alert(data);
            	data    =   JSON.parse(data);
              if(data['status']=='success')
              {
              	 window.location.href="<?=base_url()?>site/articles";
              }
              else if(data['status']=='error')
              {
              	$("#save_bt").attr('disabled',false);
			  	$("#errorMsg").html('<div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> '+data['error_msg']+' </div>');
			  }
            },
            error: function() 
            {
            	
            } 
    	});
    
}));*/

</script>


