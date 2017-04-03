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
					<span style="float:left;padding-top:10px;color:white;">List Parent</span>
                       <div style="padding-top:7px" class="pull-right">
					   <button type="button" class="btn btn-info btn-sm" onclick="delete_multiple('select_all','<?php echo base_url().'admin/parents/multi_delete'; ?>')"> Delete </button>
					   
					      <div class="btn-group">
								<button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV  </button>
								<ul class="dropdown-menu pull-right">
								<li onclick="export_excel()">
								<a  href="<?php echo base_url();?>admin/parents/export_parents">  Export All</a>
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
						<form action="<?php echo base_url().'admin/parents/export_parents'; ?>" id="export_form" method="post">
                        <table class="table table-striped table-hover table-bordered" id="users">
					
                            <thead>
                                <tr class="bg-info">
                                   <th><input type="checkbox" onclick="check_all(this,'select_all')" class="select_all" value=""></th>
								    <th>S.No.</th>
                                    <th>Parent ID</th>
                                    <th> Parent Name</th>
									<th> Registered On</th>
									<th> Address</th>
									<th> Email</th>
									<th> Mobile Number </th>
									<th> Status</th>
									<th> Action &nbsp;&nbsp;&nbsp;&nbsp;</th>
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
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0,1,9]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "ajax": {
                url :<?php base_url(); ?>'parents/parents_list_ajax/', // json datasource
                        type: "post", // method  , by default get
                        
                error: function () {  // error handling
                    
                  //  $(".employee-grid-error").html("");
                  //  $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="7">No data found in the server</th></tr></tbody>');
                   // $("#employee-grid_processing").css("display", "none");

                }
            },
            "order": [[2, "desc"]] // set first column as a default sort by desc
        });
		$('.table-scrollable').css({"overflow-y":"scroll","width":"1060px" });
    });
/*$(document).ready(function(){
        var table = $('#city_master');
            table.dataTable({
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
                "processing": true,
                "serverSide": true,
                "lengthMenu": [[50, 100, 200, -1],[50, 100, 200, "All"]], // change perpage values here
                // set the initial value
                "pageLength":10,
                "pagingType": "bootstrap_full_number",
                "language": {"search": "Search: ","lengthMenu": "  _MENU_ Records","paginate": {"previous":"Prev","next": "Next","last": "Last","first": "First"}},
                "columnDefs"      : [{ 'className': 'control', 'orderable': false, 'targets':[0,4,5,6,7,8]},
                    {'orderable': true, 'targets': [-1] },
                    {"targets": [ ],"visible": false,"searchable": false}
                ],
                "ajax":{
                    url :'<?php base_url(); ?>'+"admin/city/city_list_ajax/", // json datasource
                    type: "post",
                    data: '',
                    error: function(data){
                        console.log(data);
                    }
                } ,
                "order": [[1, "desc"]] // set first column as a default sort by desc
            });
             var table = $('#run').DataTable();
}); */
    

</script>
<script>
function confirmArchieve(){
  
   if(confirm("Are you sure move parents to archieve?")) return true;
   else return false;
}

setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);
</script>
<style>
#tdAction{
	width:174px;
}
</style>

