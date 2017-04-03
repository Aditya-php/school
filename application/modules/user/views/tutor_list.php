<?= get_flashdata() ?>
<div class="row">
<div class="col-md-12">
<div class="lms-heading-bg">
      <div class="icon-white"><img src="<?= base_url() ?>assets/admin/layout4/img/icon.png"></div>
      <div class="text-white"><?= lang('listing') ?></div>
    </div>
    </div>
    </div>
<div class="row">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade border-none">
           
                
            <div class="portlet-body no-padding">
                 <?php echo form_open('user/tutor/exportexcel'); ?>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group1">
                                <span class="tooltips" data-original-title="<?= lang('add') ?>" data-placement="top"><a href="<?= base_url() ?>user/tutor/add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></span>
                                <span class="tooltips" data-original-title="<?= lang('view') ?>" data-placement="top"><a href="javascript:view_fun()" class="btn green-turquoise btn-sm"><i class="fa fa-eye"></i></a></span>
                                <span class="tooltips" data-original-title="<?= lang('edit') ?>" data-placement="top"><a href="javascript:edit_fun()" data-bb="alert" class="btn blue-madison btn-sm"><i class="fa fa-edit"></i></a></span>
                                <span class="tooltips" data-original-title="<?= lang('delete') ?>" data-placement="top"> <a href="javascript:delTutor()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></span>
                                <!---->
                                <span class="tooltips" data-original-title="<?=lang('export_to_excel')?>" data-placement="top"><button type="submit" class="btn blue-hoki btn-sm"><i class="fa fa-download"></i></button></span>
                                <!---->
                            </div>
                            <!--<div class="btn-group">
                                <a href="<?= base_url() ?>user/tutor/add" class="btn btn-success btn-sm">
                                    <?= strtoupper(lang('tutor')) ?> <i class="fa fa-plus"></i>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <!--<button class="btn dropdown-toggle btn-sm" data-toggle="dropdown"><?= lang('tools') ?> <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:delTutor();">
                                            <?= lang('delete') ?> </a>
                                    </li>

                                    <li><a href="<?=base_url() ?>user/tutor/exportexcel"><?= lang('export_to_excel')?></a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="table-checkbox" width="3%">
                                <input type="checkbox" class="group-checkable fcy_checkbox" data-set="#sample_1 .checkboxes">  
                                <address class="checkbox"><span class="highlight"></span></address>
                            </th>
                            <th width="2%"><?= lang('sno') ?></th>
                            <th width="15%"><?= lang('user_name') ?></th>
                            <th width="18%"><?= lang('first_name') ?></th>
                            <th width="18%"><?= lang('last_name') ?></th>
                            <th width="10%"><?= lang('categories') ?></th>
                            <th width="2%"><?= lang('email') ?></th>
                            <th width="5%"><?= lang('location') ?></th>
                            <th width="20%"><?= lang('description') ?></th>
                            <th width="5%"><?= lang('status') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (@$result != '') {
                            $sno = 1;
                            foreach (@$result as $k => $v) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes group-checkable fcy_checkbox" name="tutor_id[]" id="tutor_id" value="<?= $v->id ?>"/>  
                                        <address class="checkbox"><span class="highlight"></span></address>
                                    </td>
                                    <td><?= $sno++ ?></td>
                                    <td><?= $v->user_name ?></td>
                                    <td><?= ucwords($v->first_name) ?></td>
                                    <td><?= ucwords($v->last_name) ?></td>
                                    <td><?php
                                        $category = get_categories($v->id);
                                        if (count($category)>0) {
                                            foreach ($category as $ck => $cv) {
                                                echo ucwords($cv->category) . "<br>";
                                            }
                                        }
                                        ?></td>
                                    <td><?= $v->email ?></td>
                                    <td><?= (strlen($v->location)>10)? substr($v->location,0,10)."..." :$v->location ?></td>
                                    <td><?= (strlen($v->description)>10)? substr($v->description,0,10)."..." :$v->description ?></td>
                                    <td><span id="<?= $v->id ?>" status='<?= $v->status ?>' class="label change-status label-sm label-<?= $v->status == 'active' ? 'success' : 'warning' ?>"><?= ucwords($v->status) ?> </span> </td>
                                    <!--<td><a href="<?= base_url() ?>user/tutor/view/<?= $v->id ?>"><i class="fa fa-eye font-black"></i></a> 
                                        <a href="<?= base_url() ?>user/tutor/edit/<?= $v->id ?>">
                                            <i class="fa fa-edit font-black"></i></a>
                                    </td>-->
                                </tr>

    <?php }
} ?>


                    </tbody>
                </table>
                <?php echo form_close();?>
            </div>
        
        <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>


<script>
    var TableManaged = function () {

        var initTable1 = function () {

            var table = $('#sample_1');

            // begin first table
            table.dataTable({
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "emptyTable": "<?=lang('emptyTable')?>",
                        "info": "<?=lang('showing')?> _START_ <?=lang('to')?> _END_ <?=lang('of')?> _TOTAL_ <?=lang('entries')?>",
                        "infoEmpty": "<?=lang('infoEmpty')?>",
                        "infoFiltered": "(<?=lang('filtered_from')?> _MAX_ <?=lang('total')?> <?=lang('entries')?>)",
                        "lengthMenu": "<?=lang('show')?> _MENU_ <?=lang('entries')?>",
                        "search": "<?=lang('my_search')?>",
                        "zeroRecords": "<?=lang('zeroRecords')?>",
                        "paginate": {
                            "previous": "<?=lang('prev')?>",
                            "next": "<?=lang('next')?>",
                            "last": "<?=lang('last')?>",
                            "first": "<?=lang('first')?>"
                        }
                    },
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

                "columns": [{
                        "orderable": false
                    }, {
                        "orderable": true
                    }, {
                        "orderable": true
                    }, {
                        "orderable": true
                    }, {
                        "orderable": true
                    }, {
                        "orderable": true
                    },
                    {
                        "orderable": false
                    },
                    {
                        "orderable": true
                    },
                    {
                        "orderable": false
                    },
                    {
                        "orderable": false
                    }],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                
                "columnDefs": [{// set default column settings
                        'orderable': false,
                        'targets': [0]
                    }, {
                        "searchable": false,
                        "targets": [0]
                    }],
                "order": [
                    [1, "asc"]
                ] // set first column as a default sort by asc
            });

            var tableWrapper = jQuery('#sample_1_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });

            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }


        return {
            //main function to initiate the module
            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }
                initTable1();
            }

        };
    }();
</script>



<script>

    jQuery(document).ready(function () {
        TableManaged.init();
    });
</script>

<script>
    $(document).on('click', '.change-status', function () {
        var id = $(this).attr('id');
        var status = $(this).attr('status');
        if (status === 'active')
        {
            $(this).parent().html('<span id="' + id + '" status="inactive" class="label change-status label-sm label-warning"> Inactive </span>');
        }
        else
        {
            $(this).parent().html('<span id="' + id + '" status="active" class="label change-status label-sm label-success"> Active </span>');
        }
        $.post('<?= base_url() ?>user/tutor/change_status', csrf_name + '=' + csrf_token + '&id=' + id + '&status=' + status);

    });
</script>

<script>
    
    /*Function to view a record*/
    function view_fun()
    {
        var tutor_list = [];
        $.each($("input[name='tutor_id[]']:checked"), function () {
            tutor_list.push($(this).val());
        });
        
        if (parseInt(tutor_list.length) === 0)
        {
            jAlert("<?= lang('none_tutor_sel_error') ?>", "Warning");
            return;
        }else if (tutor_list.length > 1){
            jAlert("<?= lang('more_tutor_view_error') ?>", "Warning");
            return;
        }else if (parseInt(tutor_list.length) === 1){
            window.location.href    =   "<?= base_url() ?>user/tutor/view/"+tutor_list;
        }
    }
    
    /*Function to edit a record*/
    function edit_fun()
    {
        var tutor_list = [];
        $.each($("input[name='tutor_id[]']:checked"), function () {
            tutor_list.push($(this).val());
        });
        if (parseInt(tutor_list.length) === 0)
        {
            jAlert("<?= lang('none_tutor_sel_error') ?>", "Warning");
            return;
        }else if (tutor_list.length > 1){
            jAlert("<?= lang('more_tutor_edit_error') ?>", "Warning");
            return;
        }else if (parseInt(tutor_list.length) === 1){
            window.location.href    =   "<?= base_url() ?>user/tutor/edit/"+tutor_list;
        }
    }
    
    function delTutor()
    {
        var tutor_list = [];
        $.each($("input[name='tutor_id[]']:checked"), function () {
            tutor_list.push($(this).val());
        });
        
        if (parseInt(tutor_list.length) === 0)
        {
            jAlert("<?= lang('tutor_del_conf_msg') ?>", "Warning");
            return ;
        }
        //alert(tutor_list);	
        jConfirm("<?= lang('tutor_del_conf_msg') ?>", "Confirmation", function(r) {
            if (r)
            {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url() ?>user/tutor/delete_tutor",
                    data: csrf_name + '=' + csrf_token + "&tutorArr=" + tutor_list,
                    success: function (data) {

                        if (data === "success")
                        {
                            window.location.href = "<?= base_url() ?>user/tutor";
                        }
                        else if (data === "error")
                        {
                            window.location.href = "<?= base_url() ?>user/tutor";
                        }

                    }
                });
            }
            else
            {
                return;
            }
        });
    }
</script>