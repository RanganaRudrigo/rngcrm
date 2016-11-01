<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/buttons.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
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
                        <h4 class="page-title"> <?= $jobOrder->jobOrderNo ?> - Details </h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="<?= base_url('joborder') ?>"> Job Order </a>
                            </li>
                            <li class="active">
                                 Detail View
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row" >
                        <div class="col-lg-3 col-lg-offset-9 " >
                            <table class="table table-bordered" >
                                <tr>
                                    <th> jobOrderNo </th>
                                    <td> <?= $jobOrder->jobOrderNo ?> </td>
                                </tr>
                                <tr>
                                    <th> Complain Date </th>
                                    <td><?= $jobOrder->ComplainDate ?> </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Customer Details</h4>
                                <div class="row">

                                    <div class="col-lg-12  ">
                                        <table class="table table-bordered" >
                                            <tr>
                                                <th> Code </th>
                                                <td> <?= $jobOrder->Customer->cus_code ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Company Name </th>
                                                <td><?= $jobOrder->Customer->company ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Contact Person </th>
                                                <td><?= "{$jobOrder->Customer->title}{$jobOrder->Customer->customerName}" ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Contact </th>
                                                <td><?= $jobOrder->Customer->tel_no ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Item Details</h4>
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <table class="table table-bordered" >
                                            <tr>
                                                <th> Name </th>
                                                <td> <?= $jobOrder->Item->ItemCode ?> - <?= $jobOrder->Item->ItemName ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Serial No </th>
                                                <td> <?= $jobOrder->SerialNo ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Repair Mode </th>
                                                <td><?= $jobOrder->Repair->rep_mode_name ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Other  </th>
                                                <td><?= $jobOrder->complainDetails ?> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
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
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>
