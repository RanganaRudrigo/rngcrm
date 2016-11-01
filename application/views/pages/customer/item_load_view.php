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
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Item Purchase</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="<?=base_url()?>">Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('purchase')?>"> Purchase </a>
                                </li>
                                <li class="active">
                                    Purchase Item
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <?php $this->view('includes/notification.php') ; ?>

                <div class="row">
                    <div class="col-sm-12">
                        <?= form_open() ?>

                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Customer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th> Code </th>
                                            <td> <?= $CustomerItem->cus_code ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Company Name </th>
                                            <td><?= "$CustomerItem->company" ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Contact Person </th>
                                            <td><?= "$CustomerItem->title$CustomerItem->customerName" ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Contact </th>
                                            <td><?= $CustomerItem->tel_no ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                            <div class="row">

                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Item Code</td>
                                            <td>Item Name</td>
                                            <td>Item Qty</td>
                                            <td>Serial No </td>
                                        </tr>
                                        </thead>
                                        <?php foreach ($CustomerItem->ItemDetail as $k => $detail ): ?>
                                            <tr>
                                                <td> <?= $k+1 ?> </td>
                                                <td> <?= $detail->ItemCode ?> </td>
                                                <td> <?= $detail->ItemName ?> </td>
                                                <td> <?= $detail->Qty ?> </td>
                                                <td> <?php foreach ($detail->serial as $k =>$list) echo ($k==0 ? "":",").$list->SerialNo     ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tbody >
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

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

<?php $this->view( 'includes/footer_start.php') ?>


<?php $this->view( 'includes/footer_end.php') ?>