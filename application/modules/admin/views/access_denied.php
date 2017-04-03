
<style>
      .permission_denied{ width:100%; max-width:500px; margin: 0 auto; background: #ededed; padding: 10% 15px; box-sizing: border-box; border-radius:5px; text-align: center;} 
      .permission_denied h1{ font-size:40px; color: #f36a5a; margin-bottom:10px; font-weight:600;}
      .permission_denied p{ color: #f36a5a; font-size: 18px;}
</style>
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
 <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
					<span style="float:left;padding-top:10px;color:white;">Permission Denied</span>
                       
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
                             <div class="row">
                                <div class="col-md-12">
                                                
                                  <div class="permission_denied">
                                  <h1> Access Denied </h1>
                                  <p> You don't have permission to access this Module     </p>
                                 </div>
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

