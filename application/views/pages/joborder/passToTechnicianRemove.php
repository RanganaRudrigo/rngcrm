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
                        <h4 class="page-title"> Remove Job Order From Technician</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                Remove Job Order From Technician
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <?php $this->view('includes/notification.php'); ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Select Job Order Number</h4>
                        <?= form_error('form[JobOrderId]') ?>
                        <div class="select-item-box">
                            <table class="table" id='datatable'>
                                <thead class="thead-default">
                                <tr>
                                    <th>#</th>
                                    <th>Job Order No</th> 
                                    <th> Technician </th>
                                    <th> Handover Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($records as $k => $row): ?>
                                    <tr class="data-tr" data-object="<?= htmlentities(json_encode($row)) ?>" >
                                        <td> <?= $k + 1 ?>  </td>
                                        <td> <?= $row->jobOrderNo ?> </td>
                                        <td> <?= $row->title.$row->technicianName ?> </td>
                                        <td> <?= $row->ComplainDate ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>


                        <fieldset class="form-group job-order-1">


                            <label for="exampleInputEmail1"> Cancel Date</label>
                            <div class="input-group">
                                <input type="text" name="form[CancelDate]" value="<?= set_value("form[CancelDate]",date('Y-m-d')) ?>" class="form-control datepicker" data-date-format="yyyy-mm-dd"   placeholder="yyyy-mm-dd" id="datepicker">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div>

                        </fieldset>

                        <fieldset class="form-group job-order-2 ">
                            <label for="exampleInputEmail1">Cancel Time  </label>
                            <div class="input-group clockpicker m-b-20">
                                <input type="text" class="form-control timepicker" name="form[CancelTime]" value="<?= set_value("form[CancelTime]",date('H:i')) ?>">
                                <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Reason</label>

                            <select name="form[reason]" class="form-control" >
                                <option> part pending </option>
                                <option> temporary solution  </option>
                                <option> other  </option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                                <label for="exampleInputEmail1">Note</label>
                            <textarea class="form-control" rows="3" name="form[note_of_any]" id="note_of_any"
                             value="<?= $result->note_of_any ?>"
                            <?= form_error('form[note_of_any]') ?> placeholder="Note of Any"></textarea>
                        </fieldset>
                        <input type="hidden" id="JobOrderId" name="form[JobOrderId]" >
                        <input type="hidden" id="JobOrderTechnicianId" name="form[JobOrderTechnicianId]" >
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
       $('#datatable').DataTable({             "scrollY":        "300px",             "scrollCollapse": true,             "paging":         false         }); 

        $("#datatable").on('click','.data-tr',function (e) {
            var $this = $(this) , obj = $this.data('object') ;
            if(obj.JobOrderId){
                $("#JobOrderId").val(obj.JobOrderId)
                $("#JobOrderTechnicianId").val(obj.JobOrderTechnicianId)
            }else{
                location.reload();
            }
            $this.closest('table').find('tr').removeAttr('style')
            $this.css({"background-color":"#6c7f8c",'color':'#fff'});
            $this.data('object')
        });
    });
</script>
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
