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
                            <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                            <div class="row" >
                                <div class="col-lg-4" >
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
                                <div class="col-lg-8" >
                                    <table class="table table-bordered" id="datatable"  >
                                        <thead>
                                        <tr>
                                            <td>Item Code</td>
                                            <td>Item Name</td>
                                            <td>Serial No </td>
                                            <td> Action </td>
                                        </tr>
                                        </thead>
                                        <?php foreach ($CustomerItem->ItemDetail as $k => $detail ): ?>
                                            <?php foreach ($detail->serial as $list) :     ?>
                                                <tr>
                                                    <td> <?= $detail->ItemCode ?> </td>
                                                    <td> <?= $detail->ItemName ?> </td>
                                                    <td> <?= $list->SerialNo ?> </td>
                                                    <td> <a class="btn btn-danger fa fa-times " data-serial="<?= $list->SerialNo ?>"  onclick="deleteRequest(this)"  ></a> </td>
                                                </tr>
                                            <?php endforeach;     ?>
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
<?php $this->view('includes/footer_end.php') ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable({"scrollY": "300px", "scrollCollapse": true, "paging": false});
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
        function deleteRequest(self) {
            var reason = prompt("Reason for removing this item ???");
            if (reason != null) {
                self = $(self);
               $.ajax({
                   url: "<?= current_url() ?>/remove",
                   data : { reason : reason , serialNo : self.data('serial') },
                   success: function (result) {
                        if(result){
                            self.closest('tr').remove();
                        }
                   }
               });
            }
        }
    </script>

<?php $this->view( 'includes/footer_end.php') ?>