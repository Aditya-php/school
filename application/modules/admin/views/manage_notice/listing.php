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
<!------------------for Display massage---------------------------------->
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
<!------------------for Display massage---------------------------------->
   <div class="test"></div>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
					   <span style="float:left;padding-top:10px;color:white;"> Notice Approval Request </span>
                          <div style="padding-top:7px" class="pull-right">
					            <button type="button" class="btn btn-info btn-sm" onclick="change_status_multiple(3)">Approve</button>
				                <button type="button" class="btn btn-info btn-sm" onclick="change_status_multiple(2)">Disapprove</button>
					                <div class="btn-group">
								     <button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV</button>
								          <ul class="dropdown-menu pull-right">
								            <li onclick="export_excel()">
								               <a  href="<?php echo base_url();?>admin/admin_notice/export_notice">  Export All</a>
								            </li>
								            <li onclick="export_multiple('select_all')">
								               <a href="javascript:;">Export Selected </a>
								            </li>
								          </ul>
						     	    </div>
						</div>
                    </div>
                    <div class="portlet-body">
                    <form action="<?php echo base_url().'admin/admin_notice/export_notice'; ?>" id="export_form" method="post">
                           <table class="table table-striped table-hover table-bordered" id="users">
                              <thead>
                                <tr class="bg-info">
                                 <th><input type="checkbox" id="chk123" onclick="check_all(this,'select_all')" class="select_all" value=""></th>
                                     <th> S.No.</th>
									 <th> Notice Title</th>
                                     <th> Notice Description</th>
                                     <th> Start Date</th>
									 <th> End Date</th> 
									 <th> Document</th>
									 <th> Status</th>
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
   </div>
</div>

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
                url :<?php base_url(); ?>'vendor_list_ajax', // json datasource
                        type: "post", // method  , by default get
                 error: function () {  // error handling
                   }
            },
          
            });
		// $('.table-scrollable').css({"overflow-y":"scroll","width":"1060px" });
    }); 

setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);
</script>
        
<script>
function change_status_multiple(curr_status)
{
// alert(vendor_id);
   var id=[];
    	$('.select_all:checked').each(function(i){
		id[i] = $(this).val();							 
	});
    if(id.length>=1){
       var sts_msg=(curr_status==3) ?  ' Approve' : " Disapprove";       
	   var conf=confirm('Are you sure you want to'+sts_msg);//alert(conf);
         if(conf){
        		$.ajax({
					url:'<?php echo  base_url().'admin/admin_notice/change_status_multiple' ?>',
					type: "POST",
					data: '&id='+id+'&curr_status='+curr_status,
					success: function(res) {
						// alert(res);return false;
						if(res == 1){
						  alert('Records Updated successfully!!');
						    location.reload();
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



</script>
