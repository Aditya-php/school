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
					<span style="float:left;padding-top:10px;color:white;">Manage Kids </span>
                       <div style="padding-top:7px" class="pull-right">
					       <button type="button" class="btn btn-info btn-sm" onclick="delete_multiple('select_all','<?php echo base_url().'parents/kids/multi_delete'; ?>')"> Delete</button>
					    <a class="btn btn-info btn-sm" href="<?php echo base_url();?>parents/kids">Add </a>
						
						  <div class="btn-group">
								<button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV </button>
								<ul class="dropdown-menu pull-right">
								<li onclick="export_excel()">
								<a  href="<?php echo base_url();?>parents/kids/export_kid">  Export All</a>
								</li>
								<li onclick="export_multiple('select_all')">
								<a href="javascript:;">
								Export Selected </a>
								</li>
								</ul>
						    	</div>
							
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--<div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn green">
                                            Add New <i class="fa fa-plus"></i>
                                            </button>
                                    </div>-->
                                </div>

                            </div>
                        </div>
<form action="<?php echo base_url().'parents/kids/export_kid'; ?>" id="export_form" method="post">
                        <table class="table table-striped table-hover table-bordered" id="users">
                            <thead>
                                <tr class="bg-info">
                                 <th><input type="checkbox" id="chk123" onclick="check_all(this,'select_all')" class="select_all" value=""></th>
                                    <th> S.No.</th>
									<th> Kid Id</th>
                                    <th>Kid Name</th>
									<th> Age</th>
									<th> Status</th>
									<th> Vendor Name</th>
									<!--th> Remark</th-->
							       <th> Action</th>
                                </tr>
                            </thead>
                          </table>
						</form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT -->

<?php $alldata = $this->session->all_userdata("userinfo");
 // pr($data1);die;?>
    </div>
</div>
<div id="forgotmodel" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  ">

    <!-- Modal content-->
    <form action="<?php echo base_url().'parents/kids/change_request/'.ID_encode($data1[0]->id);?>" id="assign_form" method="post"  class="forgot-form myforget-f" >
	<input type="hidden" name="kid_id" id="kid_id" value="">


      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">Vendor Change Request</div>
		    <div id="forgot_msg" ></div>
      </div>
	    <div class="modal-centerside">
      <div class="left forget-div-leftside  ">
	  <div class="row">

 <div class="form-group">
<label class="control-label adminlabel col-md-4"><b>Reason For Change:<b> </label>
	<div class="col-md-8">
 <textarea rows="5" cols="20" name="reason_of_change" id="reason_of_change" class="changetextfield"></textarea><?php echo form_error('reason_of_change');?>

		
        
        
      </div>
<div class="col-md-12">
<center> <input type="button" value="Submit"  id="change_request" onclick="status_request()"  class="btn-block changetextfield-submit"/></center><div id="loader_change_request"> </div>
</div>

	  </div> </div>
		</div>
  		</form>
	 
  </div>
</div>
</div>
<!-----discontinue modal-->
<div id="discontinue_model" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  "> 
			<!-- Modal content-->
			<form action="<?php echo base_url().'parents/kids/change_request/'.ID_encode($data1[0]->id);?>" id="discontinue_form" method="post"  class="forgot-form myforget-f" >
						<input type="hidden" name="kid_id" id="dis_kid_id" value="">
						<input type="hidden" name="action" value="discontinue_sbmt">
						<div class="popup_head">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class="heading">Discontinue Request</div>
								<div id="forgot_msg" ></div>
						 </div>
				<div class="modal-centerside">
					  <div class="left forget-div-leftside  ">
							  <div class="row">
									 <div class="form-group">
												<label class="control-label adminlabel col-md-4"><b>Reason For Discontinue:<b> </label>
												<div class="col-md-8">
													<textarea rows="5" cols="20" name="reason_of_change" id="dis_reason_of_change" class="changetextfield"></textarea><?php echo form_error('reason_of_change');?>
													<span style="color:red;display:none;" id='dis_reason_of_change_err'>Please enter Reason for Discontinue</span>
													
													</div>
													<div class="col-md-12">
													<center><input type="button" onclick="discontinue_request()" value="Submit"  
													id="discontinue_btn"   class="btn-block changetextfield-submit"/></center>
													<div id="loader_discontinue_btn"></div>
												</div> 
									  </div> 
							   </div>
						</div>
				
		        </div>
		     </form> 
   </div>
</div>
<style>
.modal-dialog{
    background: #fff;
    padding: 20px
	}
#assign_to{
padding:10px;
margin-top:10px
}
#appointment_status{
padding:10px;
margin-top:10px
}
.heading{
color: #4f4e4e;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    padding: 23px;
    font-size: 24px;
    font-family: 'Open Sans', sans-serif;
    letter-spacing: 1px;
	
}
#change_request{
     background: #c23d78;
    color: #fff !important;
    font-family: 'Open Sans', sans-serif;
    font-size: 17px;
    padding: 13px 20px;
    border: none;
    margin-top: 30px;
	}
#discontinue_btn{
     background: #c23d78;
    color: #fff !important;
    font-family: 'Open Sans', sans-serif;
    font-size: 17px;
    padding: 13px 20px;
    border: none;
    margin-top: 30px;
	}	
.centermy-forget{
margin:30px auto;
width:70%
}


.loader-btn{
	  float: left; 
	  width: 54px;
	  height: 60px;
	  margin-top: -2px;
	  margin-right: 70px;
	  margin-top: -56px;
      margin-left: 100px;
}
.changetextfield{width:100%;float:left;border:1px solid #eee}
.changetextfield-submit{width:auto !important;}
</style>
<!-- BEGIN PORTLET-->

<!-- END PORTLET-->
<script type="text/javascript" language="javascript" >
    $(document).ready(function () {
		var dataTable = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "lengthMenu": [[10,25, 50, 100],[10,25, 50, 100]], // change perpage values here
            // set the initial value
                "pageLength":10,
                "pagingType": "bootstrap_full_number",
                "language": {"search": "Search: ","lengthMenu": "  _MENU_ Records","paginate": {"previous":"Prev","next": "Next","last": "Last","first": "First"}},
            "columnDefs"      : [{ 'className': 'control', 'orderable': false, 'targets':[]},
                    {'orderable': false, 'targets': [] },
                    {"targets": [ ],"visible": false,"searchable": false}
                ],
            "ordering": false,
            "ajax": {
                url :<?php base_url(); ?>'kid_list_ajax', // json datasource
                        type: "post", // method  , by default get
                        
                error: function () {  // error handling
                    
                  //  $(".employee-grid-error").html("");
                  //  $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="7">No data found in the server</th></tr></tbody>');
                   // $("#employee-grid_processing").css("display", "none");

                }
            },
            //"order": [[1, "desc"]] // set first column as a default sort by desc
        });
    });

</script>
<script>
setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);


	function forgotPwd(id,parent_id)
	{
	
	  $("#kid_id").val(id);
	  $("#parent_id").val(parent_id);
	  $("#forgotmodel").modal('show');
	}
   function discontinueRequest(id,parent_id)
   {
	  $("#dis_kid_id").val(id);
	 // $("#dis_parent_id").val(parent_id);
	  $("#discontinue_model").modal('show');
   }   
	function status_request()
	{
		var formdata=$("#assign_form").serialize();
			$.ajax({
					url:"<?php echo base_url('parents/kids/change_request'); ?>",
					type: "POST",
					data: ""+formdata,
					beforeSend : function(){
						    $("#change_request").prop("disabled",true);  
                            $('#loader_change_request').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
                    },
					success: function(res) {
						$("#change_request").prop("disabled",false);
                        $('#loader_change_request').html('');
					     	alert(res);
							location.reload();
						
						}
					});
	}
	
function discontinue_request()
{
        if($("#dis_reason_of_change").val()=='' || $("#dis_reason_of_change").val()==null)
		{
			$("#dis_reason_of_change_err").css('display','');
			return false;
		}
		var formdata=$("#discontinue_form").serialize();
			$.ajax({
					url:"<?php echo base_url('parents/kids/change_request'); ?>",
					type: "POST",
					data: ""+formdata,
					beforeSend : function(){
						    $("#discontinue_btn").prop("disabled",true);  
                            $('#loader_discontinue_btn').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
                    },
					success: function(res) {
						$("#discontinue_btn").prop("disabled",false);
                        $('#loader_discontinue_btn').html('');
					     	alert(res);
							location.reload();
						
						}
					});
}	
$(document).ready(function(){
	$("#dis_reason_of_change").keyup(function(){
		if($(this).val().length>0)
		{
			$("#dis_reason_of_change_err").css('display','none');
		}
	});
});
</script>
