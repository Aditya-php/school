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
					<span style="float:left;padding-top:10px;color:white;"> Area List</span>
                       <div style="padding-top:7px" class="pull-right">
					   		   <button type="button" class="btn btn-info btn-sm" onclick="delete_multiple('select_all','<?php echo base_url().'admin/area/multi_delete'; ?>')"> Delete </button>
							   
							    
							   <div class="btn-group">
								<button class="btn btn-sm blue dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Export to CSV  </button>
								<ul class="dropdown-menu pull-right">
								<li onclick="export_excel()">
								<a  href="<?php echo base_url();?>admin/area/export_area">  Export All</a>
								</li>
								<li onclick="export_multiple('select_all')">
								<a href="javascript:;">
								Export Selected </a>
								</li>
								</ul>
						    	</div>
							   
					 
							<a class="btn btn-info btn-sm" href="<?php echo base_url();?>admin/area/add">   Add  </a>	
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
							<form action="<?php echo base_url().'admin/area/export_area'; ?>" id="export_form" method="post">
                        <table class="table table-striped table-hover table-bordered" id="area_master">
                            <thead>
                                <tr class="bg-info">
                                  <th><input type="checkbox" onclick="check_all(this,'select_all')" value=""></th>
                                    <th> S.No.</th>
                                    <th> City </th>
                                    <th> Area </th>
                                    <th> Status</th>
									<th> Action</th>
                                </tr>
                            </thead>
                            </table>
							</form>
                        </div>
                  </div>
              </div>
        </div>
     </div>
</div>

<!-- BEGIN PORTLET-->

<!-- END PORTLET-->
<script type="text/javascript" language="javascript" >
    $(document).ready(function () {
        var dataTable = $('#area_master').DataTable({
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
                url :<?php base_url(); ?>'area/area_list_ajax/', // json datasource
                        type: "post", // method  , by default get
                        
                error: function () {  // error handling
                }
            },
            //"order": [[1, "desc"]] // set first column as a default sort by desc
        });
		// $('.table-scrollable').css({"overflow-y":"scroll","width":"1060px" });
    }); 

    
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
					url:"<?php echo base_url('admin/area/multi_delete'); ?>",
					type: "POST",
					data: '&id='+ids,
					success: function(res) {
						if(res == 1){
							$('#success').html('Area deleted successfully!!');
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
<script>
setTimeout(function(){ $(".bg-info th div ").removeClass('checker');}, 500);
</script>