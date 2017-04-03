<?php //print_r(currentuserinfo()); die;?>
<div class="withou_search">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="border_bottom">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <h2 class="inner-heading"> <?php echo @$title; ?> </h2>
                    </div>  
                    <div class="col-md-4 text-right">
                        <ul class="page-breadcrumb breadcrumb">
                           <?php foreach (@$breadcum as $b_key => $b_val) {
								if (@$b_key != '') {
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
              if($this->session->flashdata('error_msg1')) 
                {
			 ?>
			<div class="alert bg-error display-show" style="color:red;"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><?php echo $this->session->flashdata('error_msg1');?> </div>
			 <?php  	
			   }
             ?>
            </div>

		   <div class="col-md-12" id="errorMsg">
             <?php
               if(@$error_msg!=''){
			 ?>
			 <div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Error!</strong> <?=@$error_msg?> </div>
			 <?php  	
			   }
             ?>
            </div> 
             <div class="col-md-12" id="success">
             <?php
               if(@$success!=''){
			 ?>
			 <div class="alert alert-danger flash-row"><button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i><strong>Success!</strong> <?=@$success?> </div>
			 <?php  	
			   }
             ?>
            </div> 			
        </div>
	    <?= form_open_multipart('', array('name'=>'serviceForm','id' => 'serviceForm')); ?>
	   
        <div class="row add_article">
            <div class="col-md-5 col-md-offset-4">
                <div class="text-center">
	            	<h2 style="color:#2d2d29"> <?php echo @$title; ?> </h2>
                    <img src="<?= base_url() ?>frontend_assets/img/line.png">
                </div>
                <div class="form-group">
                    <?php @$category_type = get_category_type();  
					//pr(@$state_value); die;
					?>
                	<label> Select Catagory : </label>
					<?php echo form_dropdown('category_id[]',@$category_type,@$category,'class="form-control"  id="category_id" multiple="multiple" required');
					echo form_error('category_id');
					?>	
					<label for="category_id" generated="true" class="error" style="color:red"></label>
					
				</div>
                
                <div class="form-group">
                	<label> First Name : </label>
					<?php echo currentuserinfo()->first_name; ?>
				</div>
				<div class="form-group">
                	<label> Last Name : </label>
					<?php echo currentuserinfo()->last_name; ?>
				</div>
				<div class="form-group">
                	<label> Email : </label>
					<?php echo currentuserinfo()->email; ?>
				</div>
				<div class="form-group">
                	<label> Phone Number : </label>
					<?php echo currentuserinfo()->contact_number; ?>
				</div>
				<div class="form-group">
                	<label> Title : </label>
					<input type="text" name="title" id="title" value="<?php if(@$_POST['title']){ echo @$_POST['title'];}else if(@$service_result!='' && @$service_result->title!=''){echo @$service_result->title;}else{echo '';}?>"  placeholder="Title" class="form-control"  />
					<label for="title" generated="true" class="error" style="color:red"></label>
				</div>
				<div class="form-group">
                	<label> Business phone No. : </label>
					<input type="text" name="business_phone" id="business_phone" value="<?php if(@$_POST['business_phone']){ echo @$_POST['business_phone'];}else if(@$service_result!='' && @$service_result->business_phone!=''){echo @$service_result->business_phone;}else{echo '';}?>"  placeholder="Business Phone" class="form-control"  />
					<label for="business_phone" generated="true" class="error" style="color:red"></label>
				</div>
				<div class="form-group">
                	<label> Contact Email : </label>
					<input type="text" name="contact_email" id="contact_email" value="<?php if(@$_POST['contact_email']){ echo @$_POST['contact_email'];}else if(@$service_result!='' && @$service_result->contact_email!=''){echo @$service_result->contact_email;}else{echo '';}?>"  placeholder="Contact Email" class="form-control"  />
					<label for="contact_email" generated="true" class="error" style="color:red"></label>
				</div>
				<div class="form-group">
                	<label> Website : </label>
					<input type="text" name="website" id="website" value="<?php if(@$_POST['website']){ echo @$_POST['website'];}else if(@$service_result!='' && @$service_result->website!=''){echo @$service_result->website;}else{echo '';}?>"  placeholder="Website" class="form-control"  />
					<label for="website" generated="true" class="error" style="color:red"></label>
				</div>
                <div class="form-group">
                	<label>  Description : </label>
					<textarea class="form-control" placeholder="Description" name="description" id="description" ><?php if(@$_POST['description']){ echo @$_POST['description'];}else if(@$service_result!='' && @$service_result->description!=''){echo @$service_result->description;}else{echo '';}?> </textarea>
					<label for="description" generated="true" class="error" style="color:red"></label>
				</div>
				<div class="form-group">
                	<label> Full Description : </label>
					<textarea class="form-control" placeholder="Full Description" name="full_desc" id="full_desc" ><?php if(@$_POST['full_desc']){ echo @$_POST['full_desc'];}else if(@$service_result!='' && @$service_result->full_desc!=''){echo @$service_result->full_desc;}else{echo '';}?> </textarea>
					<label for="full_desc" generated="true" class="error" style="color:red"></label>
				</div>
				
				<div class="form-group">
                	<label> Select State : </label>
					<?php $states = fetch_states(); 
					    
					?>
					   <?php  echo form_dropdown('state_id',@$states,@$service_result->state_id,'class="form-control state location"  id="state_id" ');
					     echo form_error('state_id');
					?>	
					<label for="state_id" generated="true" class="error" style="color:red"></label>
                </div>
				
			    <div class="form-group">
				 <label> Select city : </label>
				 <?php //print_r($state_value->city_id); die;?>
                	<select name="city_id" class="form-control city location">
                                <option value="<?php echo @$state_value->city_id;?>" <?php if(@$_POST['city_id']!='' && @$_POST['city_id']== @$state_value->city_id){echo "selected"; }else if(@$service_result!='' && @$service_result->city_id == @$state_value->city_id){echo "selected";}else{echo "";}?>><?php echo @$state_value->Name?></option>
                    </select>
					<label for="city_id" generated="true" class="error" style="color:red"></label>
				</div>
				
				<div class="form-group">
				 <label> Enter Loaction : </label>
                	<input type="text" name="location" id="location" value="<?php if(@$_POST['location']){ echo @$_POST['location'];}else if(@$service_result!='' && @$service_result->location!=''){echo @$service_result->location;}else{echo '';}?>"  placeholder="Location" class="form-control"  />
					<label for="location" generated="true" class="error" style="color:red"></label>
				</div>
				
				<div class="form-group">
                	<label> Upload Photo : </label>
					<div class="input-group image-preview">
               
                <span class="input-group-btn">
                    <div class="btn btn-default image-preview-input">
                       
                        <span class="image-preview-input-title">Choose File</span>
                        <input type="file" id="service_image"  name="service_image"/> <!-- rename it -->
                    </div>
                </span>
                <?php if(@$service_result!='' && @$service_result->service_image!=''){?>
                &nbsp;&nbsp;<img src="<?=base_url()?>assets/service_image/<?=@$service_result->service_image?>" width="35px;" height="35px;">
            	<?php } ?>
            		</div>
                        <span class="image-preview-input-title" style="color:#F36F02;">Note:</span>
                        <span class="image-preview-input-title"> Only jpg, png, gif extensions images allowed.</span>
                </div>
				
				
				<div class="form-group">
				  <label> Upload Video : </label>
					<input name="service_video" class="form-control" placeholder="Upload Video" type="file"/>
				</div>
				<?php if(@$service_result!='' && @$service_result->service_video!=''){ ?>
				 <iframe width="70" height="50"
                src="<?= base_url() ?>assets/service_video/<?=@$service_result->service_video?>" type="video/mp4" frameborder="0" >
                </iframe>  
                <?php } ?>
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
<script type="text/javascript" src="<?= base_url() ?>assets/admin/pages/scripts/validate.js"></script>
<script>
$(document).on("change",".state",function(){
        var state_id    =   $(this).val();
        $.ajax({ 
            type    :   'POST',
            url     :   "<?= base_url() ?>site/service/fetch_cities",
            data    :   "state="+state_id, 
            success :   function(data) {
                data    =   JSON.parse(data);
                if(data.status == "success")
                {
                    $('.city').html(data.citydata);
                }else{
                    
                }
            }
        });	

    });

 $("#serviceForm").validate({
    ignore: [],
	  rules: 
		{
		    category_id: 
			{
				required: true
               
			},
            contact_email: 
			{
				required:true,
				email: true,
            },
			title:
			{
                required: true
            },
			business_phone:
			{
				required:true,
				digits:true,
				//maxlength: 10,
			},
			website: 
			{
				required: true,
                url: true,
			},
            description: 
			{
				required:true,
				maxlength: 300,
			},
			full_desc:
			{
                required: true
            },
			state_id:
			{
				required:true,
			},
			city_id:
			{
				required:true,
			},
			location:
			{
				required:true,
			},
            
		},
		messages: 
		{
		  
				category_id: 
				{
					required: "Please Select category id."
					
				},
				contact_email:
				{
				required: "Please Enter a valid Email Id.",
				email:"Please Enter the valid email.",
				remote:"This Email Id Exist"
				} ,
				title:
				{
						required: "Please Enter The Title."
				},
				business_phone:
				{
						required: "Please Enter the business phone",
						digits:"Please Enter Only Numbers",
						//maxlength: "Please Enter 10 Digit Number"
				},
				website:
				{
				required: "Please Enter a valid Website."
				//url: "Please Enter Valid URL"
				} ,
				description: 
				{
					required: "Please Enter description.",
					maxlength: "Maximum Length is 300 Characters."
				},
				full_desc:
				{
						required: "Please Enter The full description."
				},
				state_id:
				{
						required: "Please Select the State id"
				},
				city_id:
				{
						required: "Please Select the City id"
				},
				location:
				{
						required: "Please Enter the Location"
				}
				
        }
	}); 
</script>


