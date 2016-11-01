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
                        <h4 class="page-title"> Dashboard </h4>
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

            <div class="row" >
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers pull-xs-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"> <a href="<?= base_url('joborder/passToTechnician') ?>" >Pending Jobs  </a></h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?= $pendingJob ?></h2>
                        <span class="text-muted"> &nbsp; </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers pull-xs-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"> <a href="<?= base_url('joborder/printer_job_close_with_part') ?>" > Technician Hand </a>  </h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?= $technicianHandPrinter ?></h2>
                        <span class="text-muted"> Printer Jobs </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers pull-xs-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"> <a href="<?= base_url('joborder/toner_job_close_with_part') ?>" > Technician Hand  </a> </h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?= $technicianHandToner ?></h2>
                        <span class="text-muted"> Toner Jobs </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers pull-xs-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">  <a href="<?= base_url('joborder/quotation_job') ?>" >  Quotation Jobs </a> </h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?= $quotationJob ?></h2>
                        <span class="text-muted"> &nbsp; </span>
                    </div>
                </div>
            </div>
            <!--
             <div class="row">
                 <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30"> Pending Jobs </h4>
                            <div class="row" >
                               <div class="col-lg-12" >
                                   <table id="datatable" class=" table table-striped " >
                                       <thead  >
                                       <tr>
                                           <th>#</th>
                                           <th>Job Order No</th>
                                           <th>Job Type</th>
                                           <th>Company</th>
                                           <th>Handover Date </th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       <?php foreach ($pendingJob as $k => $row): ?>
                                           <tr class="data-tr"   >
                                               <th scope="row"> <?= $k+1 ?> </th>
                                               <td><?= $row->jobOrderNo ?></td>
                                               <td><?= $row->JobOrderType == "P" ? "Printer":"Toner" ?></td>
                                               <td><?= $row->company ?>-<?= $row->contactPerson ?></td>
                                               <td><?= $row->JOB_TO_TECH->HandoverDate ?>  </td>
                                           </tr>
                                       <?php endforeach; ?>
                                       </tbody>
                                   </table>
                               </div>
                            </div>
                        </div>
                    </div>
                 <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30"> Technician Hand Jobs </h4>
                            <div class="row" >
                                <div class="col-lg-12" >
                                    <table class="table" id='datatable1'>
                                        <thead class="thead-default">
                                        <tr>
                                            <th>#</th>
                                            <th>Job Order No</th>
                                            <th> Technician </th>
                                            <th> Handover Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($technicianHand as $k => $row): ?>
                                            <tr class="data-tr"  >
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
                    </div>
                 <div class="col-lg-6">
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($quotationJob as $k => $row): ?>
                                        <tr class="data-tr"   >
                                            <th scope="row"> <?= $k+1 ?> </th>
                                            <td><?= $row->jobOrderNo ?></td>
                                            <td><?= $row->JobOrderType == "P" ? "Printer":"Toner" ?></td>
                                            <td><?= $row->company ?>-<?= $row->contactPerson ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                         </div>
                     </div>
                 </div>
            </div>

            -->
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
