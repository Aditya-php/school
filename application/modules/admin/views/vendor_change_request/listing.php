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
					<span style="float:left;padding-top:10px;color:white;">Manage Vendor Change Request</span>
                       <div style="padding-top:7px" class="pull-right">
					  <!--
					  <button type="button" class="btn btn-info btn-sm" onclick="change_status_multiple(3)">Approve</button>
					  <button type="button" class="btn btn-info btn-sm" onclick="change_status(2)">Disapprove</button>
					  -->
					      <div class="btn-group">
								<button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV </button>
								<ul class="dropdown-menu pull-right">
								<li onclick="export_excel()">
								<a  href="<?php echo base_url();?>admin/change_request/export_request">  Export All</a>
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
                                  
                                </div>

                            </div>
                        </div>
<form action="<?php echo base_url().'admin/change_request/export_request'; ?>" id="export_form" method="post">						
                        <table class="table table-striped table-hover table-bordered" id="users">
                            <thead>
                                <tr class="bg-info">
                                   <th><input type="checkbox" id="chk123" onclick="check_all(this,'select_all')" class="select_all" value=""></th>
                                   <th> S.No.</th>
									 <th> Parent Name</th>
									 <th> Kid Name</th>
								     <th> Current Vendor</th>
								     <th> Requested Date</th>
                                     <th> Comment</th>
									 <th> Request Type</th>
                                     <th> Status</th>
                                     <th> Action</th>	
                                </tr>
                       
                        </table>
						</form>
						</form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT -->


    </div>
</div>

<!-- BEGIN PORTLET-->

<!-- END PORTLET-->
<!--------------Modal form start from here------------------>
<div id="approve_model" class="modal fade my-model-reg " role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog"> 

  
	 <form action="<?php echo base_url().'admin/change_request/change_request_approve/';?>" id="status_form" method="post"  >
	   <input type="hidden" name="vendor_change_request_id" id="vendor_change_request_id" value=""/>
	   <input type="hidden" name="action"  value="submitChangeRequest"/>
       <div class="popup_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="heading">Manage Change Request</div>
      </div>
      
	    <div class="modal-centerside">
			  <div class="left forget-div-leftside centermy-forget">
			     
				<select name="vendor_id" id="vendor_id"  class="appointment_status" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
				
				<option value="">Select Vendor</option>
				<?php 
				$all_vendors=get_all_vendor();
				foreach($all_vendors as $vendors)
				{
				?>
				  <option  value="<?php echo $vendors['id'];?>"><?php echo $vendors['vendor_name'];?></option>
				<?php		
				}
				?>
				</select>
				<span style="color:red;display:none;" id="vendorValid">Please select vendor</span>
				
			  <div style="margin-top: 15px; " id="kid_table">
				  <input type="text" name="assign_date" class="form-control appointment_status" placeholder="Please select date" maxlength="55" id="datepicker" style="font-family: 'Open Sans', sans-serif; color: #909090;  text-transform: uppercase; width:100%;">
			 </div>
			 <span style="color:red;display:none;" id="dateValid">Please select date</span>
				
				<input type="submit" value="Submit"  id="forget_btn" onclick="assign_status()" class="btn-block"/>
				<div id="loader_forget"> </div>
				
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
.appointment_status{
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
.centermy-forget{
margin:30px auto;
width:70%	
}
</style>
<script>
function approveChangeRequest(vendor_change_request,vendor_id, request_type)
{
   $("#vendor_change_request_id").val(vendor_change_request);
   $("#vendor_id option[value='"+vendor_id+"']").remove();        
   
   if(request_type=='1')
   {
    $("#approve_model").modal("show");	
   }
   else 
   {
	   var flag=confirm('Are you sure want to Approve for discontinue');
	   if(flag)
	   {
          $( "#status_form" ).submit();		  
		  return true;
	   }
	   else 
	   {
		   return false;
	   }
   }
}
</script>


<!-------------modal form end over here----------------------->


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
                url :<?php base_url(); ?>'change_request/request_list_ajax', // json datasource
                        type: "post", // method  , by default get
                        
                error: function () {  // error handling
                    
                  //  $(".employee-grid-error").html("");
                  //  $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="7">No data found in the server</th></tr></tbody>');
                   // $("#employee-grid_processing").css("display", "none");

                }
            },
            //"order": [[1, "desc"]] // set first column as a default sort by desc
        });
     var today =new Date();
     $( "#datepicker" ).datepicker({
           startDate : today,   minDate: today, maxDate: "",format: 'dd-M-yyyy', yearRange: "2010:", changeMonth: true, changeYear: true
        });
 }); 
</script>           
<script>


function change_status_multiple(curr_status)
{
	// alert(curr_status);
   var id=[];
    	$('.select_all:checked').each(function(i){
		id[i] = $(this).val();							 
	});
    if(id.length>=1){
         var conf=confirm('Are you sure you want to Approve');//alert(conf);
         if(conf){
        		$.ajax({
					url:'<?php echo  base_url().'admin/admin_testmonial/change_status_multiple' ?>',
					type: "POST",
					data: '&id='+id+'&curr_status='+curr_status,
					success: function(res) {
						// alert(res);return false;
						if(res == 1){
						  alert('Records Updated successfully!!');
						}
                        else{
                          alert('Some database error,try again!!');
                        }
                        location.reload();
						}
					});
       }
    }else{
        alert("Select at least one record");
        return false;
    } 
}


function change_status(curr_status)
{

   var id=[];
    	$('.select_all:checked').each(function(i){
		id[i] = $(this).val();							 
	});
    if(id.length>=1){
         var conf=confirm('Are you sure you want to Disapprove');//alert(conf);
         if(conf){
        		$.ajax({
					url:'<?php echo  base_url().'admin/admin_testmonial/change_status_multiple' ?>',
					type: "POST",
					data: '&id='+id+'&curr_status='+curr_status,
					success: function(res) {
						// alert(res);return false;
						if(res == 1){
						  alert('Records Updated successfully!!');
						}
                        else{
                          alert('Some database error,try again!!');
                        }
                        location.reload();
						}
					});
       }
    }else{
        alert("Select at least one record");
        return false;
    } 
}
function disapproveValidate()
{
	if(confirm("Are you sure want to Disapprove"))
		return true;
	else 
		return false;
}
$(document).ready(function(){
	$("#forget_btn").click(function(){
		
		var vendor=$("#vendor_id").val();
		var dates=$("#datepicker").val();
		if(vendor=='' || vendor==null)
		{
			$("#vendorValid").css('display','');
			return false;
		}
		if(dates=='' || dates==null)
		{
			$("#dateValid").css('display','');
	        return false;
		}
		return true;
	});

  $("#vendor_id").change(function(){
	  
	  if($(this).val()!='')
	  {
		  $("#vendorValid").css('display','none');
	  }
  })	
$("#datepicker").change(function(){
	  
	  if($(this).val()!='')
	  {
		  $("#dateValid").css('display','none');
	  }
  })	  
});

</script>
<script>
setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);
</script>