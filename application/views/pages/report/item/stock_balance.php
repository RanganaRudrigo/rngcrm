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
                        <h4 class="page-title"> Item Stock Balance</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">Report</a>
                            </li>
                            <li class="active">
                                Item Stock Balance
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table  id="datatable-buttons" class=" table table-striped " >
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Code </th>
                                        <th> Item  </th>
                                        <th> Brand   </th>
                                        <th> Model   </th>
                                        <th> Type </th>
                                        <th> Serial No  </th>
                                        <th> Qty </th>
                                        <th> Customer Qty </th>
                                        <th> Damage Qty </th>
                                        <th> Total Qty in Store </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $k => $row): ?>
                                        <tr>
                                            <td> <?= $k+1 ?>  </td>
                                            <td> <?= $row->ItemCode ?> </td>
                                            <td> <?= $row->ItemName ?> </td>
                                            <td> <?= $row->ItemBrandName ?> </td>
                                            <td> <?= $row->ItemModelName ?> </td>
                                            <td> <?= $row->ItemTypeName ?> </td>
                                            <td> <?= $row->has_serial? "YES":"NO" ?> </td>
                                            <td> <?= $row->AvaQty ?> </td>
                                            <td> <?= (int)$row->cus_qty ?> </td>
                                            <td> <?= (int)$row->dam_qty ?> </td>
                                            <td> <?= (int)$row->dam_qty + $row->AvaQty ?> </td>
                                        </tr>
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
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
        $(".button-menu-mobile").click();
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'colvis']
        });
        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>