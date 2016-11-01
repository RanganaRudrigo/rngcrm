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
                        <div class="col-lg-6" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Filter </h4>
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1">Customer</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="customer-search" autocomplete="off">
                                        <input type="hidden" name="form[CustomerId]" id="CustomerId">
                                        <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1">Courier</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="courier-search" autocomplete="off">
                                        <input type="hidden" name="form[CourierId]" id="CourierId">
                                        <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1"> Product ( Code , Serial No , Company Code
                                        ) </label>
                                    <div class="input-group">
                                        <input type="hidden" name="form[SerialNo]" id="SerialNo">
                                        <input type="text" class="form-control" id="product-search" autocomplete="off">
                                        <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                        <div class="col-lg-4" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Handover Information</h4>

                                <fieldset class="form-group job-order-1">


                                    <label for="exampleInputEmail1">Handover Date</label>
                                    <div class="input-group">
                                        <input type="text" name="form[HandoverDate]" value="<?= set_value("form[HandoverDate]",date('Y-m-d')) ?>" class="form-control datepicker" data-date-format="yyyy-mm-dd"   placeholder="yyyy-mm-dd" id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                    </div>

                                </fieldset>

                                <fieldset class="form-group job-order-2 ">
                                    <label for="exampleInputEmail1">Handover Time  </label>
                                    <div class="input-group clockpicker m-b-20">
                                        <input type="text" class="form-control timepicker" name="form[HandoverTime]" value="<?= set_value("form[HandoverTime]",date('H:i')) ?>">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                </fieldset>



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
<div id="item_qty" class="hidden">
    <table class="table table-bordered">
        <tbody><tr>
            <th> Qty </th>
            <td> <input type="number" value="" class="number-only form-control">  </td>
        </tr>
        </tbody></table>
    <button class="btn btn-primary pull-right m_b_10 "> OK </button>
    <button class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
    <div class="clearfix"></div>

</div>
<div id="serial_list" class="hidden">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th> Serial No </th>
        </tr>
        </thead>
        <tbody> </tbody>
    </table>
    <button class="btn btn-primary pull-right m_b_10 "> OK </button>
    <button class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $(function () {

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
        $('#customer-search').autocomplete({
            'source': function(request, response) {
                if(request.length){
                    $.ajax({
                        url: Api+"customer/autocomplete",
                        data:{str: request},
                        dataType: 'json',
                        success: function(json) {
                            response($.map(json, function(item) {
                                return {
                                    label:item['company'] ,
                                    value: item['CustomerId']
                                }
                            }));
                        }
                    });
                }
            },
            'select': function(a) {
                $("#CustomerId").val(a['value']);
                $("#customer-search").val(a['label'])
            }
        });
        $('#product-search').autocomplete({
            'source': function(request, response) {
                if(request.length){
                    $.ajax({
                        url: Api+"item/autocomplete_with_serial",
                        data:{str: request},
                        dataType: 'json',
                        success: function(json) {
                            response($.map(json, function(item) {
                                return {
                                    label:item['ItemCode'] + " > " + item['ItemName'] + "(" +  item['SerialNo'] + ")" ,
                                    value: item['SerialNo']
                                }
                            }));
                        }
                    });
                }
            },
            'select': function(a) {
                $("#product-search").val(a['label']);
                $("#SerialNo").val(a['value']);
            }
        });
        $('#courier-search').autocomplete({
            'source': function(request, response) {
                if(request.length){
                    $.ajax({
                        url: Api+"courier/autocomplete",
                        data:{str: request},
                        dataType: 'json',
                        success: function(json) {
                            response($.map(json, function(item) {
                                return {
                                    label:item['companyName']   ,
                                    value: item['CourierId']
                                }
                            }));
                        }
                    });
                }
            },
            'select': function(a) {
                $('#courier-search').val(a['label'])
                    .removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');
                $('#CourierId').val(a['value']);

            }
        });

        $("form").submit(function (e) {
            var f = true  ;
            if(!$("#CourierId").val().length){
                $('#courier-search').addClass('form-control-danger').closest('.input-group').addClass('has-danger');
                f= false ;
            }else
                $('#courier-search').removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');

            if(!$("#SerialNo").val().length){
                $('#product-search').addClass('form-control-danger').closest('.input-group').addClass('has-danger');
                f= false ;
            }else
                $('#product-search').removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');

            if(!$("#CustomerId").val().length){
                $('#customer-search').addClass('form-control-danger').closest('.input-group').addClass('has-danger');
                f= false ;
            }else
                $('#customer-search').removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');

            if(!f){
                e.preventDefault();
                return false ;
            }

        });
    })
</script>

<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
