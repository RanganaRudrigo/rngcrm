<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/buttons.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />

<link href="<?= base_url("assets/plugins/bootstrap-daterangepicker/daterangepicker.css") ?>" rel="stylesheet">

<!-- extra css end -->
<?php $this->view( 'includes/header_end.php'); ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> Job Orders </h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">Report</a>
                            </li>
                            <li class="active">
                                Job Orders
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Filter Option</h4>

                        <?= form_open('',['method'=>'get']) ?>
                        <div class="row" >
                            <fieldset class="form-group col-lg-3 ">
                                <label for="exampleInputEmail1"> Date Range </label>
                                <div>
                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="<?= $this->input->get('daterange') ?>"/>
                                </div>
                            </fieldset>



                            <div class="field_binder" >
                                <fieldset id="Customer_Wise_Reports_field" class="form-group col-lg-3    extra_field ">
                                    <label for="exampleInputEmail1"> Supplier </label>
                                    <div>
                                        <?= form_dropdown("Supplier",$suppliers,$this->input->get('Supplier'),"class='form-control '") ?>
                                    </div>
                                </fieldset>
                            </div>


                            <div class="col-lg-12" >
                                <label> &nbsp; </label>
                                <button class="btn btn-primary pull-right" > Filter </button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table  id="datatable-buttons" class=" table table-striped " >
                                    <thead>
                                    <tr>
                                        <th   > # </th>
                                        <th  > Code </th>
                                        <th  > Supplier  </th>
                                        <th> Item Code </th>
                                        <th> Item Name </th>
                                        <th> Qty </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $k => $row): ?>
                                        <?php foreach ($row->Items as $item) : ?>
                                        <tr>
                                            <td> <?= $k+1 ?>  </td>
                                            <td> PUR-<?= repeater(0,5-strlen($row->PurchaseId)).$row->PurchaseId ?> </td>
                                            <td> <?= "$row->title.$row->contact_person ( $row->company )" ?> </td>
                                            <td> <?= $item->Item->ItemCode  ?> </td>
                                            <td> <?=  $item->Item->ItemName ?> </td>
                                            <td> <?= $item->Qty ?> </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!-- content -->
</div><!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view( 'includes/footer_start.php') ?>
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

<script src="<?= base_url("assets/plugins/moment/moment.js") ?>"></script>
<script src="<?=base_url("assets/plugins/bootstrap-daterangepicker/daterangepicker.js")?>"></script>

<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
        // $('#datatable').DataTable({             "scrollY":        "300px",             "scrollCollapse": true,             "paging":         false         }); 
        $(".button-menu-mobile").click();
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'colvis']
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


        $('.input-daterange-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '01/01/2012',
            maxDate: new Date(),
            showDropdowns: true,
            linkedCalendars: false,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')]  ,
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        });

    });

</script>