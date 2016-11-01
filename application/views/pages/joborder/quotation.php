<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<!-- extra css end -->
<?php $this->view( 'includes/header_end.php'); ?>


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
                        <h4 class="page-title"> Quotation Pending Jobs </h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="#"><?= TITLE ?></a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li class="active">
                                Starter Page
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-box">
                         <h4 class="header-title m-t-0 m-b-30"> Quotation Jobs </h4>
                         <div class="row" >
                            <div class="col-lg-12" >
                                <table id="datatable2" class=" table table-striped " >
                                    <thead  >
                                    <tr>
                                        <th>#</th>
                                        <th>Job Order No</th>
                                        <th>Job Type</th>
                                        <th> Company </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($quotationJob as $k => $row): ?>
                                        <tr class="data-tr "   >
                                            <th scope="row"> <?= $k+1 ?> </th>
                                            <td><?= $row->jobOrderNo ?></td>
                                            <td><?= $row->JobOrderType == "P" ? "Printer":"Toner" ?></td>
                                            <td><?= $row->company ?>-<?= $row->contactPerson ?></td>
                                            <td>
                                                <a class="btn btn-success delete-btn" href="<?= current_url() ?>/approved/<?= $row->JobOrderClosedId ?>"
                                                   data-title="Quotation Approve"
                                                   data-text=" Are you sure This Quotation is approved ??? "
                                                   data-confirm-button-text="Yes "
                                                   data-type="success"
                                                   data-confirm-button-class="btn-success"
                                                > Approved </a>
                                                <a class="btn btn-danger delete-btn"
                                                   data-title="Quotation Canceld"
                                                   data-text=" Are you sure This Quotation is canceled ??? "
                                                   data-type="error"
                                                   data-confirm-button-text="Yes "
                                                   data-confirm-button-class="btn-danger waves-effect waves-light"
                                                   href="<?= current_url() ?>/canceled/<?= $row->JobOrderClosedId ?>"   > Canceled </a>
                                            </td>
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

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view( 'includes/footer_start.php') ?>
<!-- extra js start -->
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.js") ?>"></script>
<script>
    $(function () {
        $('#datatable').DataTable();
        $('#datatable1').DataTable();
        $('#datatable2').DataTable();
    })
</script>
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>
