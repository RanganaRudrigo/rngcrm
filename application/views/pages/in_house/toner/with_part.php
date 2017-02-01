<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?>" rel="stylesheet" type="text/css" >
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
                        <h4 class="page-title">Toner Job Without Part</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">In House</a>
                            </li>
                            <li class="active">
                                Toner Job Without Part
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <?php $this->view('includes/notification.php'); ?>

            <div class="row">
                <div class="col-sm-12">
                    <?= form_open_multipart() ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Select Job to Technician</h4>
                                <table id="datatable" class=" table table-striped " >
                                    <thead  >
                                    <tr>
                                        <th>#</th>
                                        <th>Job Order No</th>
                                        <th>Customer</th>
                                        <th>Tech</th>
                                        <th>Item</th>
                                        <th>Serial No </th>
                                        <th>Handover Date & Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $k => $row): ?>
                                        <tr class="data-tr" data-object="<?= htmlentities(json_encode($row)) ?>" >
                                            <th scope="row"> <?= $k+1 ?> </th>
                                            <td><?= $row->jobOrderNo ?></td>
                                            <td><?= $row->company ?>-<?= $row->contactPerson ?></td>
                                            <td><?= $row->JOB_TO_TECH->Technician->title ?><?= $row->JOB_TO_TECH->Technician->technicianName ?></td>
                                            <td><?= $row->Item->ItemCode  ?><?= $row->Item->ItemName  ?></td>
                                            <td><?= $row->SerialNo  ?> </td>
                                            <td><?= $row->JOB_TO_TECH->HandoverDate ?> - <?= $row->JOB_TO_TECH->HandoverTime ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Job Date</label>
                                    <div class="input-group">
                                        <input type="text" name="form[EndDate]" required value="<?= set_value("form[EndDate]",date('Y-m-d')) ?>" class="form-control datepicker" data-date-format="yyyy-mm-dd"  placeholder="yyyy-mm-dd"
                                               id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                    </div>
                                </fieldset>

                                <!--
                                <fieldset class="form-group job-order-1">


                                    <label for="exampleInputEmail1">Start Time</label>
                                    <div class="input-group clockpicker ">
                                        <input type="text" name=""  class="form-control timepicker" value="<?= set_value("form[HandoverTime]",date('H:i')) ?>">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>

                                </fieldset>-->

                                <fieldset class="form-group job-order-2 ">
                                    <label for="exampleInputEmail1">End Time</label>
                                    <div class="input-group clockpicker ">
                                        <input type="text" name="form[EndTime]" required class="form-control timepicker" value="<?= set_value("form[EndTime]",date('H:i')) ?>">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Job Sheet </label>
                                    <input type="file" name="jobSheet" required class="form-control">
                                </fieldset>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> Before Job </label>
                                    <input type="file"  name="BeforeJob"  class="form-control">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> After Job </label>
                                    <input type="file"  name="AfterJob"  class="form-control">
                                </fieldset>

                            </div>

                        </div>
                    </div>

                    <div class="card-box" >
                        <h4 class="header-title m-t-0 m-b-30"> Repair Information</h4>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="repair_mode">Repair Mode</label>

                                    <select class="form-control " name="form[RepairModeId]" id="RepairModeId">
                                        <?php foreach ($repairs as $repair): ?>
                                            <option value="<?=$repair->RepairModeId ?>" ><?=$repair->rep_mode_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="repair_mode"> Job Repair Status </label>
                                    <select class="form-control " name="replace[WarrantyStatus]" id="WarrantyStatus">
                                        <option value="0" >Warranty</option>
                                        <option value="1" >Replace - 01 </option>
                                        <option value="2" >Replace - 02 </option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="row" >
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1"> Current Serial No </label>
                                            <input type="text" class="form-control" required name="replace[CurrentItemSerialNo]"
                                                   value="<?= $result->CurrentItemSerialNo ?>"  autocomplete="off"
                                                   placeholder="Serial No">
                                            <?= form_error('replace[CurrentItemSerialNo]') ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <fieldset class="form-group job-order-1">
                                            <label for="exampleInputEmail1">Date</label>
                                            <div class="input-group   ">
                                                <input type="text" name="replace[CurrentItemSerialDate]" class="form-control datepicker" value="<?= set_value("replace[CurrentItemSerialDate]",date('Y-m-d')) ?>" >
                                                <span class="input-group-addon"> <span class="zmdi zmdi-calendar"></span> </span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1"> Replace Serial No </label>
                                            <input type="text" class="form-control" required name="replace[ReplaceItemSerialNo]"
                                                   value="<?= $result->ReplaceItemSerialNo ?>" autocomplete="off"
                                                   placeholder="Serial No">
                                            <?= form_error('replace[ReplaceItemSerialNo]') ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <fieldset class="form-group job-order-1">
                                            <label for="exampleInputEmail1">Date</label>
                                            <div class="input-group   ">
                                                <input type="text" class="form-control datepicker" name="replace[ReplaceItemSerialDate]"  value="<?= set_value("replace[ReplaceItemSerialDate]",date('Y-m-d')) ?>"  >
                                                <span class="input-group-addon"> <span class="zmdi zmdi-calendar"></span> </span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box" >
                        <h4 class="header-title m-t-0 m-b-30"> Job Close Status </h4>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="repair_mode"> Job Status </label>
                                    <select class="form-control " name="form[JobStatus]" required id="repair_mode">
                                         
                                        <option value="1">Completed</option> 
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="note"> Note </label>
                                    <textarea id="note" rows="4" class="form-control" name="form[Note]" ></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label  > Star </label> <br/>
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="1" >  Bad</label> &nbsp;&nbsp;
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="2" >  Ok</label>&nbsp;&nbsp;
                                    <label><input type="radio" checked name="form[star]" class="radio-inline" value="3" >  Good</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="4" >  Very Good</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="5" >  Excellent </label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form[JobOrderType]" value="T" >
                    <button type="submit" class="btn btn-primary">Add</button>
                    <?= form_close() ?>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view('includes/footer_start.php') ?>
<!-- extra js start -->
<!-- Required datatable js -->
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.js") ?>"></script>
<!-- Buttons examples -->
<script src="<?= base_url("assets/plugins/datatables/dataTables.buttons.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/buttons.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/jszip.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/pdfmake.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/vfs_fonts.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/buttons.html5.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/buttons.print.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/buttons.colVis.min.js") ?>"></script>
<!-- extra js end -->
<script src="<?= base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js") ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("form").submit(function () {
            if(!$("#JobOrderId").length) alert("Please Select the job order");
            return $("#JobOrderId").length ? true : false   ;
        });
       $('#datatable').DataTable({             "scrollY":        "300px",             "scrollCollapse": true,             "paging":         false         }); 
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
                $("#RepairModeId").val(obj.RepairModeId);
            }else{
                location.reload();
            }
            $this.closest('table').find('tr').removeAttr('style')
            $this.css({"background-color":"#6c7f8c",'color':'#fff'});
        });

    });
</script>
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
