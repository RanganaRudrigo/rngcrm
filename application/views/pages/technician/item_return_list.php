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
                        <h4 class="page-title">Technician</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="<?= base_url('technician') ?>">Technician</a>
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
                            <a class="btn btn-info m_b_10 pull-left fa fa-plus " href="<?= current_url()."/create" ?>"  > Create New </a>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Technician Details</h4>

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table id="datatable" class=" table table-striped " >
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Code </th>
                                        <th> Name </th>
                                        <th> Address </th>
                                        <th> Email </th>
                                        <th> Phone No </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $k => $row): ?>
                                        <tr>
                                            <td> <?= $k+1 ?>  </td>
                                            <td> <?= $row->tec_code ?> </td>
                                            <td><?= $row->technicianName  ?> </td>
                                            <td> <?= $row->address ?> </td>
                                            <td> <?= $row->email ?> </td>
                                            <td> <?= $row->tel_no ?> </td> 
                                            <td class="text-center" >
                                                <a href="<?= current_url()."/items/$row->TechnicianId" ?>" class="btn btn-warning fa fa-edit " > Item Details </a>
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

<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
       $('#datatable').DataTable({             "scrollY":        "300px",             "scrollCollapse": true,             "paging":         false         }); 

    });
</script>