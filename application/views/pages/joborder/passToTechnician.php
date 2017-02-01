<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet"
      type="text/css"/>
<link href="<?= base_url("assets/plugins/datatables/buttons.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet"
      type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?>">
<link href="<?= base_url("assets/plugins/clockpicker/bootstrap-clockpicker.min.css") ?>" rel="stylesheet">
<!-- extra css end -->
<?php $this->view('includes/header_end.php'); ?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> Job Order Pass To Technician</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li class="active">
                                Job Order Pass To Technician
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <?php $this->view('includes/notification.php'); ?>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Select Job Order Number</h4>
                        <?= form_error('form[JobOrderId]') ?>
                        <div class="select-item-box">
                            <table class="table" id='datatable'>
                                <thead class="thead-default">
                                <tr>
                                    <th>#</th>
                                    <th>Job Order No</th>
                                    <th>Customer</th>
                                    <th>Reason</th>
                                    <th>Complain Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($records as $k => $row): ?>
                                    <tr class="data-tr" data-object="<?= htmlentities(json_encode($row)) ?>" >
                                        <td> <?= $k + 1 ?>  </td>
                                        <td> <?= $row->jobOrderNo ?> </td>
                                        <td> <?= $row->company ?> </td>
                                        <td> <?= $row->reason ?> </td>
                                        <td> <?= $row->ComplainDate ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>


                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Technician Name</label>
                            <input type="text" class="form-control" id="technician-search"
                                   value=""
                                   placeholder="Technician Name">
                            <input type="hidden" name="form[TechnicianId]" id="TechnicianId">
                            <?= form_error('form[TechnicianId]') ?>
                        </fieldset>


                        <fieldset class="form-group job-order-1">


                            <label for="exampleInputEmail1">Handover Date</label>
                            <div class="input-group">
                                <input type="text" name="form[HandoverDate]" value="<?= set_value("form[HandoverDate]",date('Y-m-d')) ?>" class="form-control datepicker" data-date-format="yyyy-mm-dd"   placeholder="yyyy-mm-dd" id="datepicker">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div>

                        </fieldset>

                        <fieldset class="form-group job-order-2 ">
                            <label for="exampleInputEmail1">Handover Time  </label>
                            <div class="input-group clockpicker m-b-20">
                                <input type="text" class="form-control timepicker" name="form[HandoverTime]" value="<?= set_value("form[HandoverTime]",date('H:i')) ?>">
                                <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                            </div>
                        </fieldset>


                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Note of Any</label>
                                
                   <textarea class="form-control" rows="3" name="form[note_of_any]" id="note_of_any"
                             value="<?= $result->note_of_any ?>"
                       <?= form_error('form[note_of_any]') ?> placeholder="Note of Any"></textarea>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>
        </div>


        <!-- end row -->
    </div>
    <!-- end row -->


</div> <!-- container -->

<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view('includes/footer_start.php') ?>
<!-- extra js start -->
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>

<script src="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("js/autocomplete.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js") ?>"></script>
<script type="text/javascript">
    <?php
        $JobOrderTechnicianId = $this->session->flashdata("JobOrderTechnicianId");
        if($JobOrderTechnicianId):   ?>
    (function(window, undefined){
        var win = window.open('<?= current_url() ?>/view/<?=$JobOrderTechnicianId?>', '_blank', 'width=600,height=400');
        win.focus();
    })(window);
    <?php endif; ?>

    $(document).ready(function () {

        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true ,
            minDate : 0
        });
        $('.timepicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('#datatable').DataTable({
            "scrollY":        "300px",
            "scrollCollapse": true,
            "paging":         false
        });
        $('#technician-search').autocomplete({
            'source': function (request, response) {
                if (request.length) {
                    $.ajax({
                        url: Api + "technician/autocomplete",
                        data: {str: request},
                        dataType: 'json',
                        success: function (json) {
                            response($.map(json, function (item) {
                                return {
                                    label: item['title']  + item['technicianName'] + "(" + item['tec_code'] + ")" ,
                                    value: item["TechnicianId"]
                                }
                            }));
                        }
                    });
                }
            },
            'select': function (json) {
                $('#technician-search').val(json['label'] );
                $('#TechnicianId').val(json['value']);


            }
        });
        
        $("#datatable").on('click','.data-tr',function (e) {
            var $this = $(this) , obj = $this.data('object') ;
            if(obj.JobOrderId){
                if($("#JobOrderId").length){
                    $("#JobOrderId").val(obj.JobOrderId)
                }else{
                    $("<input>").attr({
                        id :"JobOrderId",
                        type:"hidden",
                        name:"form[JobOrderId]",
                        value : obj.JobOrderId
                    }).appendTo("form");
                }
            }else{
                location.reload();
            }
            $("#datatable").find('tr').removeAttr('style')
            $this.css({"background-color":"#6c7f8c",'color':'#fff'});
            $this.data('object')
        });
    });
</script>
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
