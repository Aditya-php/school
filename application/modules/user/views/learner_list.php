<?= get_flashdata() ?>
<div class="row">
    <div>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i><?= lang('listing') ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?= base_url() ?>user/learner/add" class="btn btn-success btn-sm">
                                    <?= strtoupper(lang('learner')) ?> <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle btn-sm" data-toggle="dropdown"><?= lang('tools') ?> <i class="fa fa-angle-down"></i> 

                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:delLearner();">
                                            <?= lang('delete') ?> </a>
                                    </li>

                                    <li><a href="<?= base_url() ?>user/learner/exportexcel"><?= lang('export_to_excel') ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                            </th>
                            <th><?= lang('sno') ?></th>
                            <th><?= lang('user_name') ?></th>
                            <th><?= lang('tutor_name') ?></th>
                            <th><?= lang('first_name') ?></th>
                            <th><?= lang('last_name') ?></th>
                            <!--<th><?= lang('categories') ?></th>-->
                            <th><?= lang('email') ?></th>
                            <th><?= lang('location') ?></th>
                            <th><?= lang('description') ?></th>
                            <th><?= lang('status') ?></th>
                            <th><?= lang('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (count($result)>0) {
                            $sno = 1;
                            foreach ($result as $k => $v) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes" name="learner_id" id="learner_id" value="<?= $v->id ?>"/>
                                    </td>
                                    <td><?= $sno++ ?></td>
                                    <td><?= $v->user_name ?></td>
                                    <td><?= ucwords($v->tutor_f . " " . $v->tutor_l) ?></td>
                                    <td><?= ucwords($v->first_name) ?></td>
                                    <td><?= ucwords($v->last_name) ?></td>
                                <!-- <td>
                                        <?php
                                        $category = get_categories($v->id);
                                        if (count($category)>0) {
                                            foreach ($category as $ck => $cv) {
                                                echo ucwords($cv->category) . "<br>";
                                            }
                                        }
                                        ?>
                                    </td>-->
                                    <td><?= $v->email ?></td>
                                    <td><?= $v->location ?></td>
                                    <td><?= $v->description ?></td>
                                    <td> <span id="<?= $v->id ?>" status='<?= $v->status ?>' class="label change-status label-sm label-<?= $v->status == 'active' ? 'success' : 'warning' ?>"> <?= ucwords($v->status) ?> </span> 
                                    </td>
                                    <td><a href="<?= base_url() ?>user/learner/view/<?= $v->id ?>"><i class="fa fa-eye font-black icon-gap"></i></a> 
                                        <a href="<?= base_url() ?>user/learner/edit/<?= $v->id ?>">
                                            <i class="fa fa-edit font-black icon-gap"></i></a></td>

                                </tr>

                    <?php } } ?>
                    </tbody>
                </table>
            </div>
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
                    },{
                        "orderable": true
                    },{
                        "orderable": false
                    },{
                        "orderable": false
                    },{
                        "orderable": true
                    },{
                        "orderable": false
                    },{
                        "orderable": false
                    },{
                        "orderable": false
                    },{
                        "orderable": false
                    },{
                        "orderable": false
                    },{
                        "orderable": false
                    }],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 7,
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
    function delLearner()
    {
        var learner_list = [];
        $.each($("input[name='learner_id']:checked"), function () {
            learner_list.push($(this).val());
        });

        if (parseInt(learner_list.length) === 0)
        {
            alert("Please select at least one Learner");
            return;
        }
        var flag = confirm("Are you sure you want to delete?");
        if (flag)
        {

            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>user/learner/delete_learner",
                data: csrf_name + '=' + csrf_token + "&learnerArr=" + learner_list,
                success: function (data) {

                    if (data === "success")
                    {

                        window.location.href = "<?= base_url() ?>user/learner";
                    }
                    else if (data === "error")
                    {

                        window.location.href = "<?= base_url() ?>cuser/learner";
                    }

                }
            });
        }
        else
        {
            return;
        }
    }
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
        $.post('<?= base_url() ?>user/learner/change_status', csrf_name + '=' + csrf_token + '&id=' + id + '&status=' + status);

    });
</script>

