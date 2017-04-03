<div id="assignmodel" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  modal-sm"> 

    <!-- Modal content-->
    <form action="#" id="" method="post"  class="forgot-form myforget-f" >
      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">Appointment Assigned</div>
		    <div id="forgot_msg" ></div>
      </div>
	    <div class="modal-centerside">
      <div class="left forget-div-leftside">
       			 <div class="col-md-6">
												   <div class="form-group ">
													<label class="control-label col-md-4">City name<span class="star">*</span> :</label>
													<div class="col-md-8">
													<?php if(isset($city_list) && !empty($city_list)){ ?>
														<select name="city_id" class="form-control menu">
														<option value="">Select</option>
															
														<?php
															foreach($city_list as $val)
															{ ?>
														<option value="<?php echo $val->id;?>"<?php echo  set_select('city_id',$val->id);?>><?php echo $val->city_name; ?></option>
														<?php 
															}														?>
														
													</select>
													<?php }else{ echo "Please enter city first"; } ?>
													<?php echo form_error('city_id');?>		
													</div>
												</div>
											</div>
		
        <input type="submit" value="Submit"  id="forget_btn" class="btn-block"/><div id="loader_forget"> </div>
        
      </div>
		</div>
  		</form>
	 
  </div>
</div>
