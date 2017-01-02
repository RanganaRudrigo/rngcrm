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
                            <h4 class="page-title"> Items Load To Customer </h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="<?=base_url()?>">Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('Customer/item_load')?>">Pages</a>
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

                <?php $this->view('includes/notification.php') ; ?>

                <div class="row">
                    <div class="col-sm-12">
                        <?= form_open() ?>
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Filter Customer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <fieldset class="form-group job-order-1">
                                        <label for="exampleInputEmail1"> ( Code , Name , Company contact Person
                                            ) </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="customer-search" autocomplete="off">
                                            <input type="hidden" name="form[CustomerId]" id="CustomerId">
                                            <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30"> Customer Information </h4>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12" id="customer_info">
                                    <p> This Box Contain Customer More Information </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Filter Product</h4>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
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
                        </div>
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Item Code</td>
                                            <td>Item Name</td>
                                            <td>Item Qty</td>
                                            <td> Property </td>
                                            <td>  </td>
                                        </tr>
                                        </thead>
                                        <tbody id="item-table-tr">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" > Save </button>

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

<?php $this->view( 'includes/footer_start.php') ?>
    <!-- extra js start -->
    <script src="<?= base_url("js/autocomplete.min.js") ?>"></script>
    <script>
        $(function () {
            var loadItemList = 0 ,
                obj = [],
                qty = 0 ,
                item = [] ;
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
                    AjaxLoader.show();
                    $.ajax({
                        url: Api+"customer/checkCustomerForItemLoading",
                        data:{CustomerId: a['value']},
                        success: function (json) {
                            AjaxLoader.hide();
                            if(json['reload']){
                                location.href = BaseUrl + "customer/item_load/"+a['value']
                            }else{
                                $("#CustomerId").val(a['value']);
                                $("#customer-search").val(a['label'])
                                    .removeClass('form-control-danger').val("").closest('.input-group').removeClass('has-danger');
                                $("#customer_info").html("");
                                $("<table>").attr('class','table table-bordered')
                                    .append('<tr> <th> Code </th> <td> ' + json['customer'].cus_code +' </td> </tr>')
                                    .append('<tr> <th> Company Name </th> <td> ' + json['customer'].company +' </td> </tr>')
                                    .append('<tr> <th> Customer Name </th> <td> ' + json['customer'].customerName +' </td> </tr>')
                                    .appendTo("#customer_info");
                            }
                        }
                    })
                }
            });
            $('#product-search').autocomplete({
                'source': function(request, response) {
                    if(request.length){
                        $.ajax({
                            url: Api+"item/autocomplete",
                            data:{str: request},
                            dataType: 'json',
                            success: function(json) {
                                response($.map(json, function(item) {
                                    return {
                                        label:item['ItemCode'] + " > " + item['ItemName'] ,
                                        value: item['ItemId'] + "-" + item['has_serial']
                                    }
                                }));
                            }
                        });
                    }
                },
                'select': function(a) {
                    $("#product-search").val(a['label'])
                        .removeClass('form-control-danger').val("").closest('.input-group').removeClass('has-danger');
                    obj = a['value'].split('-'), item = a['label'].split('>') ;
                    qty_template = $("#item_qty").clone() ;
                    qty_template.find('.btn-primary').attr('id','qty_button');
                    qty_template.find('input[type=number]').attr({'id':'qty_input', 'value': 0});
                    ajaxModel.show( 'Item Quantity', qty_template.html() , {dialogSize: 'md' });
                }
            });
            $('body')
                .on('click','#qty_button',function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    qty = $('#qty_input').val();
                    loadItemList++ ;
                    $('#product-search').val("");
                    ajaxModel.hide();
                    AjaxLoader.show();
                    var serial_template = $("#serial_list").clone() , table = serial_template.find('table');
                    serial_template.find('.btn-primary').attr('id','serial_submit');
                    table.find('tbody').empty().html();
                    for(var i=0;i < qty;i++){
                        $("<tr>").append(
                            "<td>" + (i+1) + "</td>"+
                            "<td> <input type='text' class='form-control serial_no_checker' name='item[serial_list]["+ loadItemList   +"][]' > </td>"
                        ).appendTo(table.find('tbody'));
                    }
                    App.SerialNoChecker();
                    AjaxLoader.hide();
                    ajaxModel.show( 'Serial No(s)', serial_template.html() , {dialogSize: 'sm' });
                    $("body").find("#ajaxModel").css("padding-top","0");

                })
                .on('click','#serial_submit',function (e) {
                    e.stopPropagation();
                    var f = true ,data = [] , self = $(this);
                    $("#item-table-tr").find(".serialList").each(function (k,v) {
                        data.push($(v).val());
                    });
                    $(this).closest('.modal').find('input[type=text]').each(function(k,v){
                        if($(v).val().length < 1 || $.inArray($(v).val(),data) !== -1  ){
                            f = false ;
                            $(v).addClass('form-control-danger').closest('td').addClass('has-danger');
                        }else{
                            data.push($(v).val());
                            $(v).removeClass('form-control-danger').closest('td').removeClass('has-danger');
                        }
                    });
                    if(f){
                        AjaxLoader.show();
                        $("<tr>").data('id',loadItemList ).append(
                            "<td>" + (loadItemList ) + "</td>"+
                            "<td>" +  item[0]+ "</td>"+
                            "<td>" +  item[1]+ "</td>"+
                            "<td>" +  qty+ "</td>" +
                            "<td> "+
                            " <input type='hidden'  name='item[id][" + loadItemList   + "]' value='"+ obj[0] +"' /> " +
                            " <input type='hidden'  name='item[qty][" + loadItemList   + "]' value='"+ qty +"' /> " +
                            "<select class='form-control' name='item[property][" + loadItemList   + "]'  > <option value='1' >RNG</option> <option value='2'  >Customer Property</option>  </select> </td>"+
                            "<td> <a data-remove='tr' class='fa fa-times btn btn-danger btn-remove' >  </a>  </td>"
                        ).appendTo("#item-table-tr");
                        self.closest('.modal').find('input[type=text]').each(function(k,v){
                            $("#item-table-tr").find('tr').eq(loadItemList-1).find('td').eq(0).append($(v).attr({type:"hidden",class:"serialList",value: $(v).val() }));
                            $("#item-table-tr").find('tr').eq(loadItemList-1).find('td').eq(3).append( (k == 0 ? "<br/>":" , ") + $(v).val());
                        });
                        ajaxModel.hide();
                        AjaxLoader.hide();
                    }
                })
                .on("submit","form",function (e) {
                    var f=true;
                    if( !$('#CustomerId').val().length ){
                        $('#customer-search').addClass('form-control-danger').val("").closest('.input-group').addClass('has-danger');
                        f = false ;
                    }else if(!$("#item-table-tr").find('tr').length){
                        $('#product-search').addClass('form-control-danger').val("").closest('.input-group').addClass('has-danger');
                        f = false ;
                    }
                    if(!f){
                        e.preventDefault();
                        return false ;
                    }
                })
                .on('click','.btn-remove',function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    loadItemList--;

                });
        })


    </script>

    <!-- extra js end -->

<?php $this->view( 'includes/footer_end.php') ?>