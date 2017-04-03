
     <?php foreach($superadmin as $value)
	 {
		 // pr($value);
	 };?>  <?php
        if ($this->session->flashdata('account_create')) {
            ?>
            <div class="alert bg-success display-show" id="success">
                <button class="close" data-close="alert"></button>
                <span>
                    <?php
                    echo $this->session->flashdata('account_create');
                    ?> 
                </span>
            </div>

<?php } ?>
<form action="<?php echo base_url().'admin/appointment/assign/'.$value->id;?>" id="signUp-form" method="post" action="">
<div class="center-or">
 
      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">Appointment Assign</div>
 
<div class="col-md-6">
<select name="assign_to" id="assign_to" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
<option value="">Select</option>
<?php if(isset($superadmin) && !empty($superadmin)){ ?>
<?php 
foreach($superadmin as $val)
{ ?>
<option  value="<?php echo $val->id; ?>" <?php echo  set_select('assign_to',$val->id);?> ><?php echo $val->first_name; ?></option>
<?php 
}														?>
<?php }else{ ?> 
<option value="">No Data </option>
<?php  } ?>
</select>
</div>

<?php echo form_error('assign_to');?>	

<!-----------------area----------------------------->
 
         <input type="submit" value="Sign up"/>
		
