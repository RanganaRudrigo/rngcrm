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
                        <div class="col-lg-4" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Filter </h4>
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1">Customer</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="customer-search" autocomplete="off">
                                        <input type="hidden" name="CustomerId" id="CustomerId">
                                        <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1"> Product ( Code , Serial No , Company Code
                                        ) </label>
                                    <div class="input-group">
                                         <input type="text" class="form-control" id="product-search" autocomplete="off">
                                        <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                        <div class="col-lg-8" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <table  class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <td>Item Code</td>
                                                <td>Item Name</td>
                                                <td>Serial No </td>
                                                <td>Action</td>
                                            </tr>
                                            </thead>
                                            <tbody id="table-body" >
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
                    .removeClass('form-control-danger').closest('.input-group').removeClass('has-danger');
            }
        });
        $('#product-search').autocomplete({
            'source': function(request, response) {
                if(request.length && $("#CustomerId").val().length){
                    $.ajax({
                        url: Api+"customer/customer_item",
                        data:{str: request , CustomerId : $("#CustomerId").val() },
                        dataType: 'json',
                        success: function(json) {
                            response($.map(json, function(item) {
                                return {
                                    label:item['ItemCode'] + " > " + item['ItemName'] + "(" +  item['SerialNo'] + ")" ,
                                    value: encodeURI(JSON.stringify(item))
                                }
                            }));
                        }
                    });
                }else{
                    if(!$("#CustomerId").val().length){
                        $('#customer-search').addClass('form-control-danger').closest('.input-group').addClass('has-danger');
                    }
                }
            },
            'select': function(a) {
                var f = true ;
                var item = $.parseJSON(decodeURI(a.value)) ;
                console.log(item);
                $("#table-body").find(".itemId").each(function (k,v) {
                    if($(v).val() == item.SerialNo) f = false ;
                });
                if(f)
                    $("<tr>").append(
                        "<td>" + item.ItemCode + "</td>"+
                        "<td>" + item.ItemName + "</td>"+
                        "<td>" +
                        " <input type='hidden'   name='item[ItemId][]' value='"+  item.ItemId +"' /> "+
                        " <input type='hidden' class='itemId'  name='item[SerialNo][]' value='"+  item.SerialNo +"' /> "
                        + item.SerialNo + "</td>"+
                        "<td> <a data-remove='tr' class='fa fa-times btn btn-danger btn-remove' >  </a>  </td>"
                    ).appendTo($("#table-body"));
                else
                    alert("This Item Already Selected")
            }
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
