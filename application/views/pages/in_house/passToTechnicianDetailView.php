<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<!-- extra css end -->
<!-- App CSS -->
<link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/plugins/bootstrap-sweetalert/sweet-alert.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('css/custom.css')?>" rel="stylesheet" type="text/css" />
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!-- Modernizr js -->
<script src="<?=base_url('assets/js/modernizr.min.js')?>"></script>

</head>

<body>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box" >
                <table class="table table-bordered" >
                    <tr>
                        <th> Job Order </th>
                        <td> <?= $result->JobOrder->jobOrderNo ?> </td>
                        <th> Date </th>
                        <td> <?= date('Y-m-d',strtotime($result->HandoverDate)) ?> </td>
                    </tr>
                </table>

                <h4 class="header-title m-t-0 m-b-30"> Technician Details </h4>
                <table class="table table-bordered" >
                    <tr>
                        <th> Technician Name </th>
                        <td> <?= $result->Technician->title.$result->Technician->technicianName ?> </td>
                    </tr>
                    <tr>
                        <th> Email </th>
                        <td> <?= $result->Technician->email ?> </td>
                    </tr>
                    <tr>
                        <th> Telephone No </th>
                        <td> <?= $result->Technician->tel_no." ".$result->Technician->mob_no  ?> </td>
                    </tr>
                </table>
                <h4 class="header-title m-t-0 m-b-30"> Company Details </h4>
                <table class="table table-bordered" >
                    <tr>
                        <th> Company </th>
                        <td> <?= $result->JobOrder->Customer->company ?> </td>
                    </tr>
                    <tr>
                        <th> Contact Person </th>
                        <td> <?= $result->JobOrder->Customer->customerName ?> </td>
                    </tr>
                    <tr>
                        <th> Address </th>
                        <td> <?= $result->JobOrder->Customer->address ?> </td>
                    </tr>
                    <tr>
                        <th> Telephone No </th>
                        <td> <?= $result->JobOrder->Customer->tel_no." ".$result->JobOrder->Customer->mob_no  ?> </td>
                    </tr>

                </table>
                <h4 class="header-title m-t-0 m-b-30"> Order Item Details </h4>
                <table class="table table-bordered" >
                    <tr>
                        <th> Item Name </th>
                        <td> <?= $result->JobOrder->Item->ItemName ?> </td>
                    </tr>
                    <tr>
                        <th> Serial No </th>
                        <td> <?= $result->JobOrder->SerialNo ?> </td>
                    </tr>
                    <tr>
                        <th> Repair Mode </th>
                        <td> <?= $result->JobOrder->Repair->rep_mode_name ?> </td>
                    </tr>
                    <tr>
                        <th> Complain Details </th>
                        <td> <?= $result->complainDetails ?> </td>
                    </tr>
                    <tr>
                        <th> Note </th>
                        <td> <?= $result->note_of_any ?> </td>
                    </tr>

                </table>
            </div>
            <div class="card-box" >
                <p>
                    <b><?= $result->JobOrder->jobOrderNo ?> - <?= date('Y-m-d',strtotime($result->HandoverDate)) ?></b> <br/>
                    <b>Technician Details</b> <br/>
                    <?= $result->Technician->title.$result->Technician->technicianName ?> <br/>
                    <?= $result->Technician->email ?> <br/>
                    <?= $result->Technician->tel_no." ".$result->Technician->mob_no  ?> <br/>
                    <b>Company Details</b> <br/>
                    <?= $result->JobOrder->Customer->company ?>   <br/>
                    <?= $result->JobOrder->Customer->customerName ?> <br/>
                    <?= $result->JobOrder->Customer->address ?> <br/>
                    <?= $result->JobOrder->Customer->tel_no." ".$result->JobOrder->Customer->mob_no  ?>
                    <b>Order Item Details</b> <br/>
                    <?= $result->JobOrder->Item->ItemName ?> <br/>
                    <?= $result->JobOrder->Repair->rep_mode_name ?> <br/>
                    <?= $result->complainDetails ?> <br/>
                    <?= $result->note_of_any ?>
                </p>
            </div>
        </div>
    </div>

</div>
<!-- End content-page -->

</body>
</html>
