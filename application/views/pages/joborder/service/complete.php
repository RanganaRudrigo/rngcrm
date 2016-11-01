<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet"
      type="text/css"/>
<link href="<?= base_url("assets/plugins/datatables/buttons.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet"
      type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?>">
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
                        <h4 class="page-title">Job Order</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li class="active">
                                Customer Registration
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-sm-12">
                    <?php $this->view('includes/notification.php'); ?>

                    <?= form_open() ?>
                    <div class="row" >
                        <div class="col-lg-12" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"> Customer Information </h4>
                                <h5><?= $result->CUSTOMER->cus_code ?> <?= $result->CUSTOMER->company ?></h5>
                                <p> ADDRESS : <?= $result->CUSTOMER->address ?> </p>
                                <p> EMAIL :<?= $result->CUSTOMER->email ?> </p>
                                <p> MOBILE : <?= $result->CUSTOMER->mob_no ?> </p>
                                <p> FAX : <?= $result->CUSTOMER->fax_no ?> </p>
                            </div>
                        </div>
                        <div class="col-lg-12" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                                <div class="row">
                                    <?= form_hidden("ServiceId",$result->ServiceId) ?>
                                    <div class="col-lg-12">
                                        <table  class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Item Code</td>
                                                <td>Item Name</td>
                                                <td>Serial No </td>
                                                <td> Technician </td>
                                                <td> Note </td>
                                            </tr>
                                            </thead>
                                            <tbody   >
                                            <?php foreach ($result->ITEM as $k => $item ): ?>
                                                <tr>
                                                    <td><?= $k+1 ?></td>
                                                    <td><?= $item->ItemCode ?></td>
                                                    <td><?= $item->ItemName ?></td>
                                                    <td><?= $item->SerialNo ?></td>
                                                    <td>
                                                        <?= form_hidden("Item[$k][ItemId]",$item->ItemId) ?>
                                                        <?= form_hidden("Item[$k][SerialNo]",$item->SerialNo) ?>
                                                        <?= form_hidden("Item[$k][ServiceId]",$result->ServiceId) ?>
                                                        <select name="Item[<?=$k?>][TechnicianId]" required class="form-control" >
                                                            <option value="" > ----------- </option>
                                                            <?php foreach ($technicians as $technician): ?>
                                                                <option value="<?= $technician->TechnicianId ?>" > <?= $technician->title.$technician->technicianName ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea name="Item[<?=$k?>][Note]" class="form-control" ></textarea>
                                                    </td>
                                                </tr>
                                            <?php endforeach;  ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

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
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("js/autocomplete.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js") ?>"></script>

<script type="text/javascript">
    $(function () {
        var i = 0  ;
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


        $("form").submit(function (e) {
            var f = true  ;

            if(!$("#CustomerId").val().length){
                $('#customer-search').addClass('form-control-danger').closest('.input-group').addClass('has-danger');
                f= false ;
            }else
                $('#customer-search').removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');

            if(!$("#table-body").find('tr').length){
                $('#product-search').addClass('form-control-danger').closest('.input-group').addClass('has-danger');
                f= false ;
            }else
                $('#product-search').removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');


            if(!f){
                e.preventDefault();
                return false ;
            }

        });
    })
</script>

<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
