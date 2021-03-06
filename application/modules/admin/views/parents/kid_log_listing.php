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
<?php $parent_id=(isset($parent_id) && !empty($parent_id)) ? $parent_id : "";
       // echo  $parent_id; die;
 ?>

        <div class="test"></div>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
					<span style="float:left;padding-top:10px;color:white;">View Logs</span>
					
                       <div style="padding-top:7px" class="pull-right">
					  <!--<button type="button" class="btn btn-info btn-sm" onclick="delete_multiple('select_all','<?php echo base_url().'admin/parents/kid_multi_delete'; ?>')"> Delete </button>
					  -->
					  
					     <div class="btn-group">
								<button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV</button>
								<ul class="dropdown-menu pull-right">
								<li onclick="export_excel()">
								<a  href="<?php echo base_url().'admin/parents/export_log_kids/'.$kid_id ;?>"><i class="fa fa-plus" aria-hidden="true"></i> Export All</a>
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
				<!--<b style="font-size: 15px;">Parent Id</b>:&nbsp;&nbsp;<?php //echo (isset($data1[0]->unique_id) && !empty($data1[0]->unique_id)) ? $data1[0]->unique_id : "" ;?></br>
				<b style="font-size: 15px;">Parent Name</b>:&nbsp;&nbsp;<?php //echo (isset($data1[0]->first_name) && !empty($data1[0]->first_name)) ?  ucwords($data1[0]->first_name) : ""; echo (isset($data1[0]->last_name) && !empty($data1[0]->last_name)) ? ucwords( $data1[0]->last_name) : ""; ;?></br>
				<b style="font-size: 15px;">Kid Name</b>:&nbsp;&nbsp;<?php //echo (isset($data1[0]->name) && !empty($data1[0]->name)) ?  ucwords($data1[0]->name) : "" ;?></br>
</br>-->
						<form action="<?php echo base_url().'admin/parents/export_log_kids/'.$kid_id ;?>"" id="export_form" method="post">
                        <table class="table table-striped table-hover table-bordered" id="users">
                            <thead>
                                <tr class="bg-info">
									<th>
									<input type="checkbox" id="chk123" onclick="check_all(this,'select_all')" class="select_all" value="">
									</th>
                                  
									<th> S.No.</th>
									<th> Vendor Name </th>
									<th> Session Start Date </th>
                                   	<th> Session End Date </th>
									<th> Reason for Change </th>
                                </tr>
										
                            </thead>
							
                        </table>
						</form>
							
						<div class="form-actions">
												<div class="row">
															<div class="text-center col-md-12">
															
																<button type="button" class="btn default" onclick='window.history.back()'>  Back</button>
														
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
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
                url :'<?php echo base_url(); ?>'+'admin/parents/kid_log_list_ajax/'+'<?php echo $kid_id; ?>', // json datasource
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
setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);
</script>

<script type="text/javascript">
    $(document).ready(function(){
		$('#chk123').click(function(){
		    if($(this).prop("checked") == true){
                $('.select_all').prop("checked",true);
				//$("#deleteDta").css("pointers-event","auto").attr('disabled',false);
            }
            else if($(this).prop("checked") == false){
                  $('.select_all').prop("checked",false);
				  //$("#deleteDta").css("pointers-event","none").attr('disabled',true);
            }
        });
		
		$("#deleteDta").click(function(){
		   var conf=confirm('Are you sure you want to delete');
			if(conf){
							
			$('.select_all:checked').each(function(value){
				// console.log(value);
				var ids = $(this).val();
				$.ajax({
					url:"<?php echo base_url('parents/kids/multi_delete'); ?>",
					type: "POST",
					data: '&id='+ids,
					success: function(res) {
						if(res == 1){
							$('#success').html('Parents deleted successfully!!');
						    location.reload();
						}
						}
					});

				// console.log(ids.push = $(this).val());
			});
		}
		});
    });
</script>