
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
					<span style="float:left;padding-top:10px;color:white;">List Appointments</span>
                       <div style="padding-top:7px" class="pull-right">
					  
                                 <div class="btn-group">
								<button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV  </button>
								<ul class="dropdown-menu pull-right">
								<li onclick="export_excel()">
								<a  href="<?php echo base_url();?>admin/appointment/export_appointment">  Export All</a>
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
						<form action="<?php echo base_url().'admin/appointment/export_appointment'; ?>" id="export_form" method="post">
                        <table class="table table-striped table-hover table-bordered" id="users">
					
                            <thead>
                                <tr class="bg-info">
                                   <th><input type="checkbox" onclick="check_all(this,'select_all')" class="select_all" value=""></th>
								    <th>S.No.</th>
                                    <th>Parent Name</th>
                                    <th> Vendor Name</th>
									<th> Email </th>
									<th> Mobile No.</th>
									<th> Scheduled Date & Time</th>
									<th> Remarks </th>
									<th> Assigned To</th>
									<th> Status</th>	
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
<?php foreach($all_users as $value){} ?>

    </div>
</div>

<div id="Remarkmodel" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top:120px;"> 

    <!-- Modal content-->
    <form action="<?php echo base_url().'admin/appointment/remarkData/'.$value->id;?>" id="remark_form" method="post"  class="forgot-form myforget-f" >
	<input type="hidden" name="rowId" id="rowId" value="">

      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal" style="margin-top: -20px; margin-right: -10px;">&times;</button>
        <!--div class="heading">Remark Assign</div-->
		 <div id="forgot_msg" ></div>
      </div>
	     <div class="modal-centerside">
      <div class="left forget-div-leftside centermy-forget">

<div class="input-remark">Remarks :</div>
<div name="remarks" id="remarks"></div>

	 </div>
		</div>
		<!--a style="margin-left: 245px;" href="<?php echo base_url().'admin/appointment'; ?>" class="btn default" ><i aria-hidden="true" class="fa fa-times"></i> Cancel</a-->
  		</form>
	 
  </div>
</div>
<?php //pr($remark);die;?>
<div id="forgotmodel" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  "> 

    <!-- Modal content-->
    <form action="<?php echo base_url().'admin/appointment/assign/'.$value->id;?>" id="assign_form" method="post"  class="forgot-form myforget-f" >
	<input type="hidden" name="appoint_id" id="appoint_id" value="">
	
      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">ASSIGN APPOINTMENT</div>
		    <div id="forgot_msg" ></div>
      </div>
	    <div class="modal-centerside">
      <div class="left forget-div-leftside centermy-forget">
      
<select name="assign_to" id="assign_to" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
<option value="">Select</option>
<?php if(isset($all_users) && !empty($all_users)){ ?>
<?php 
foreach($all_users as $val)
{ ?>
<option  value="<?php echo $val->id; ?>"><?php echo $val->first_name; ?></option>
<?php 
}?>
<?php }else{ ?> 
<option value="">No Data </option>
<?php  } ?>
</select>
 
		
        <input type="button" value="Submit"  id="forget_btn" onclick="assign_admin()" class="btn-block"/><div id="loader_forget"> </div>
        
      </div>
		</div>
  		</form>
	 
  </div>
</div>


<div id="statusmodel" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  "> 

    <!-- Modal content-->
    <form action="<?php echo base_url().'admin/appointment/assign/'.$value->id;?>" id="status_form" method="post"  class="forgot-form myforget-f" >
	<input type="hidden" name="status_id" id="status_id" value=""/>
    <input type="hidden" name="parent_id" id="parent_id" value="" />
	
      <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">Change Status </div>
		    <div id="forgot_msg" ></div>
       
      </div>
      
	    <div class="modal-centerside">
      <div class="left forget-div-leftside centermy-forget">
      
<select name="appointment_status" onchange="find_kids(this.value)" id="appointment_status" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
<option value="">Select</option>
  <option value="1">confirm schedule</option>
  <option value="2">done</option>
  <option value="3">closed</option>
  <option value="5">Not Confirmed</option>
</select>
  <div style="margin-top: 15px; " id="kid_table">
        <form action="http://localhost/c3/admin/role/permission/5327222955" method="post" accept-charset="utf-8" class="form-horizontal">                       
         <table class="table table-striped table-hover table-bordered" id="">
            <thead>
                <tr class="bg-info">
                   <th><input type="checkbox" onclick="check_all_kids(this,'select_all_kids')" class="select_all_kids" value=""></th>
                    <th> S.No. </th>
                    <th>Kid id</th>
                     <th>Kid Name</th>
				</tr>
            </thead>
			<tbody id="kids_data">
    			
		   </tbody>
        </table>
							
		</form>
    </div>
		
        <input type="button" value="Submit"  id="status_btn" onclick="assign_status()" class="btn-block"/><div id="loader_status"> </div>
      
      </div>
            
		</div>
  		</form>
	 
  </div>
</div>
<script>
function check_all_kids(thisref,class_name)
{
    if(thisref.checked == true){
            $('.'+class_name).prop("checked",true);
    }
    else {
           $('.'+class_name).prop("checked",false);
    }
}
</script>
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
#forget_btn{
     background: #c23d78;
    color: #fff !important;
    font-family: 'Open Sans', sans-serif;
    font-size: 17px;
    padding: 13px 20px;
    border: none;
    margin-top: 30px;
	}
#status_btn{
     background: #c23d78;
    color: #fff !important;
    font-family: 'Open Sans', sans-serif;
    font-size: 17px;
    padding: 13px 20px;
    border: none;
    margin-top: 30px;
	}
.centermy-forget{
    margin: 10px auto;
    width: 90%;
}

.loader-btn{
	  float: left;      width: 50px;
    height: 54px; margin-top: -2px;  margin-right: 70px;  margin-top: -51px;    margin-left: -49px;
}

.input-remark{     float: left;
    font-size: 15px;
    line-height: 18px;
    padding-right: 10px;
    font-weight: bold;
    color: #5d5d5d;}
</style>

  


<!-- BEGIN PORTLET-->

<!-- END PORTLET-->
<script type="text/javascript" language="javascript" >
    $(document).ready(function () {
		var dataTable = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "lengthMenu": [[10,25, 50, 100],[10,25, 50, 100]], // change perpage values here
            "pageLength": 10,
            // set the initial value
                "pagingType": "bootstrap_full_number",
                "language": {"search": "Search: ","lengthMenu": "  _MENU_ Records","paginate": {"previous":"Prev","next": "Next","last": "Last","first": "First"}},
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0,1,8,9]
            }, {
                "searchable": false,
                "targets": [0]
            }],
       
            "ajax": {
                url :<?php base_url(); ?>'appointment/appointment_list_ajax/', // json datasource
                        type: "post", // method  , by default get
                        
                error: function () {  // error handling
                    
                  //  $(".employee-grid-error").html("");
                  //  $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="7">No data found in the server</th></tr></tbody>');
                   // $("#employee-grid_processing").css("display", "none");

                }
            },
            "order": [[0, "desc"]] // set first column as a default sort by desc
        });
		$('.table-scrollable').css({"overflow-y":"scroll","width":"1060px" });
    }); 

	
	setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);
// setTimeout(function(){ $(".bg-info-kid th div ").removeClass('checker');}, 500);


function find_kids(curr_status){
    var parent_id= $("#parent_id").val();
    if(curr_status!='' && curr_status=='3' && parent_id!=''){
        
        $.ajax({
		url:"<?php echo base_url('admin/appointment/find_kids_detail'); ?>",
		type: "POST",
		data: "parent_id="+parent_id,
		success: function(res) {
			
			if(res != '')
			{
				$("#kid_table").show();
                $("#kids_data").html(res);

			}
            else
            {
		     alert('Some Error try agian');
			}
		 }
		});
    }
}  
    

</script>           
<script>
//................remarks start .............................//


	function remarkView(app_id){
		
		$.ajax({
					url:"<?php echo base_url('admin/appointment/remarkData/'); ?>",
					type: "POST",
					data: "app_id="+app_id,
					success: function(res) {
					     	$("#Remarkmodel").modal('show');
							$("#remarks").html(res);
						}
		});
	}
//................remarks close .............................//
//................assign_admin Start .............................//
	
function forgotPwd(id,app_id){
		$("#assign_to option").each(function(){
			if(($(this).val()) == app_id)
			{
				 $(this).attr("selected","selected");
			}
			
		});
		$("#appoint_id").val(id);
		$("#forgotmodel").modal('show');
	}
function assign_admin(){
	
	if($("#assign_to").val()!='')
	{
		var formdata=$("#assign_form").serialize();
		$.ajax({
					url:"<?php echo base_url('admin/appointment/assign'); ?>",
					type: "POST",
					data: ""+formdata,
					beforeSend : function(){
						    $("#forget_btn").prop("disabled",true);  
                            $('#loader_forget').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30"  margin-left: -49px; border="0" alt="">');
                    },
					success: function(res) {

						$("#forget_btn").prop("disabled",false);
                        $('#loader_forget').html('');
						if(res == '1')
						{
							alert('User assigned successfully');
							location.reload();
						}else{
					     alert('Some database error');
							//location.reload();
						     }
						}
					});
	}
	else{
		alert("Please select at least one");
	}
}
//................assign_admin close .............................//
//................status Start .............................//

	function status(id,status_id,parent_id){
	
		$("#appointment_status option").each(function(){
			if(($(this).val()) == status_id)
			{
				 $(this).attr("selected","selected");
			}
			
		});
        $("#kid_table").hide();
		$("#status_id").val(id);
        $("#parent_id").val(parent_id);
		$("#statusmodel").modal('show');
	}
	
	function assign_status(){
		var curr_status = $("#appointment_status").val(); 
        z=true;
	if($("#appointment_status").val()!='')
	{
		var formdata=$("#status_form").serialize();	//alert(formdata);	
        if(curr_status=='3'){
            var kid_id=$('input[name="kid_id[]"]:checked').val();
            if(typeof kid_id=='undefined'){
                 alert("Appointment can't be closed untill kids selected!!");
                 z=false;
            } 
        }
       if(z){ 
		$.ajax({
					url:"<?php echo base_url('admin/appointment/status'); ?>",
					type: "POST",
					data: ""+formdata,
					beforeSend : function(){
						    $("#status_btn").prop("disabled",true);  
                            $('#loader_status').html('<img class="loader-btn"  src="<?php echo base_url()."/frontend_assets/img/loader.gif"?>" width="30" height="30" border="0" alt="">');
                    },
					success: function(res) {
						$("#status_btn").prop("disabled",false);
                        $('#loader_status').html('');
						if(res == '1')
						{
							alert('Status updated successfully');
							location.reload();
						}else{
					     alert('Some database error');
						 // location.reload();
						     }
						}
					});
     }else{
       // alert("Appointment can't be closed untill kids selected!!");
     }
	}
	else{
		alert("Please select Status");
	}
}

//................Status close .............................//
</script>

