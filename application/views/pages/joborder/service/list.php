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
                        <h4 class="page-title">Courier</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="<?= base_url('joborder') ?>">Job Order</a>
                            </li>
                            <li class="active">
                                Manage
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row" >
                        <div class="col-lg-12" >
                            <a class="btn btn-info m_b_10 pull-left fa fa-plus " href="<?= base_url('joborder/service') ?>"  > Create New </a>
                        </div>
                    </div>
                    
                    <?php $this->view('includes/notification.php'); ?>

                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Courier Details</h4>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table id="datatable" class=" table table-striped " >
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td> ServiceCode </td>
                                        <td>Date </td>
                                        <td>Customer </td>
                                        <td>Item</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody id="table-body" >
                                    <?php foreach ($records as $k => $row): ?>
                                        <tr>
                                            <td> <?= $k+1 ?>  </td>
                                            <td> <?= $row->CUSTOMER->AreaCode ?>SER-<?= $row->ServiceId ?>  </td>
                                            <td> <?=  date("Y-m-d",strtotime($row->CreatedDate)) ?> </td>
                                            <td> <?= $row->CUSTOMER->AreaCode ?> - <?= $row->CUSTOMER->cus_code ?> - <?= $row->CUSTOMER->company ?> </td>
                                            <td>
                                                <?php foreach ($row->ITEM as $item ):  ?>
                                                    <?= $item->ItemCode  ?> - <?= $item->ItemName  ?> - <?= $item->SerialNo  ?> <br/>
                                                 <?php endforeach;  ?>
                                            </td>
                                            <td class="text-center" >
                                                <a href="<?= base_url("joborder/service/complete")."/$row->ServiceId" ?>" class="btn btn-success fa fa-edit   " > Complete </a>
                                                <a href="<?= base_url("joborder/service/delete")."/$row->ServiceId" ?>" class="btn btn-danger fa fa-times delete-btn " > Delete </a>
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
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });
        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>