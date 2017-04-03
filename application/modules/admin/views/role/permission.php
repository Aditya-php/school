<style>  input[type=checkbox] {
    margin: 0px 0px 0px 0px !important;
}</style>
<div class="page-content-wrapper">
    <div class="page-content">

        <ul class="page-breadcrumb breadcrumb">
            <?php foreach ($breadcum as $b_key => $b_val) {
                if ($b_key != '') {
                    ?>
                    <li class=""> <a href="<?= base_url() . $b_key ?>"><?= $b_val ?></a><i class="fa fa-circle"></i> </li>
                <?php } else if ($b_key == '') { ?>
                    <li class="active"> <?= $b_val ?> </li>
                <?php }
            }
            ?>
        </ul>

        <?php
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

        <div class="test"></div>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                   <div class="portlet box blue">
                    <div class="portlet-title">
					<span style="float:left;padding-top:10px;color:white;">Permissions</span>
                   </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                  
                                </div>

                            </div>
                        </div> 
					 <?php echo form_open('', array('class' => 'form-horizontal')); ?>
                        <table class="table table-striped table-hover table-bordered" id="permission_form">
                            <thead>
                                <tr class="bg-info">
                                  
                                    <th> S.No. </th>
                                    <th>Modules</th>
                                     <th><input type="checkbox" id="chk123" onclick="check_allbox(this,'select_checkbox')" class="select_checkbox" value="">Access</th>
								</tr>
                            </thead>
							<tbody>

						 
										<?php //pr($data1); pr($permission); die;

										foreach ($data1 as $value)
										{?>
										<tr>
										<td><?php echo $value->id ; ?></td>
										<td><?php echo ucwords($value->module) ; ?></td>
										<td class="control-label col-md-1"><input type="checkbox" name="prmsn_ids[]" class="select_checkbox" 
										onclick="select('select_all','<?php echo base_url().'admin/role/select_one'; ?>')"
										
										value="<?= $value->id?>"
										  <?php  echo (isset($permission) && !empty($permission) && in_array($value->id,$permission)) ?  set_checkbox('prmsn_ids[]',$value->id,TRUE) : set_checkbox('prmsn_ids[]',$value->id,False);
										  ?>></td>	
										</tr>
										<?php 
										}
										?>

                        </table>
						
								<div class="form-actions">
														<div class="row">
															<div class=" col-md-12 text-center">
																<button type="submit" class="btn blue">  <i aria-hidden="true" class="fa fa-check"></i>  Submit</button>
																<button type="button" class="btn default" onclick='window.history.back()'>  <i aria-hidden="true" class="fa fa-times"></i> Cancel</button>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										 <?php echo form_close(); ?>
										 </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT -->


    </div>
</div>


<script>

	function check_allbox(thisref,class_name)
	{
		
		if(thisref.checked) {
			// check select status
				$('.'+class_name).each(function() { //loop through each checkbox
					$('.'+class_name).parent('span').addClass('checked');
					this.checked = true;       
				});
			}else{
				 $('.'+class_name).each(function() { //loop through each checkbox
					this.checked = false;
					$('.'+class_name).parent('span').removeClass('checked');                       
				 });         
				 }
	}
	
function export_multiple(class_name)
{
   var all_ids=[];
    	$('.'+class_name+':checked').each(function(i){
		all_ids[i] = $(this).val();									 
	});
    if(all_ids.length>=1){
       
					$("#permission_form").submit();
      
    }else{
        alert("Select at least one record to export");
        return false;
    } 
}

</script>

