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
                            <h4 class="page-title">Job Order</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="<?=base_url()?>">Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('purchase')?>"> Purchase </a>
                                </li>
                                <li class="active">
                                    Purchase Item
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
                            <h4 class="header-title m-t-0 m-b-30"> Technician </h4>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <fieldset class="form-group job-order-1">
                                        <label for="exampleInputEmail1"> </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="technician-search" autocomplete="off">
                                            <input type="hidden" id="technician-id" name="form[TechnicianId]"   >
                                            <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                                        </div>
                                    </fieldset>
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
                item = [] ;

            $('#technician-search').autocomplete({
                'source': function(request, response) {
                    if(request.length){
                        $.ajax({
                            url: Api+"technician/autocomplete",
                            data:{str: request},
                            dataType: 'json',
                            success: function(json) {
                                response($.map(json, function(item) {
                                    return {
                                        label:item['title']  + item['technicianName'] + "(" + item['tec_code'] + ")" ,
                                        value: item['TechnicianId']
                                    }
                                }));
                            }
                        });
                    }
                },
                'select': function(a) {
                    $('#technician-search').val(a['label']);
                    $('#technician-id').val(a['value']); 
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
                    obj = a['value'].split('-'), item = a['label'].split('>') ;
                    var f = true;
                    $("body").find(".items").each(function (k,v) {
                        if(obj[0] == $(v).val() ){
                            alert("This Item Already Selected in below ");
                             f = false ;
                        }
                    });
                    if(!f) return;

                    if( ! parseInt(obj[1])  ){
                        var qty_template = $("#item_qty").clone() ;
                         qty_template.find('.btn-primary').attr('id','qty_button');
                         qty_template.find('input[type=number]').attr({'id':'qty_input', 'value': 0});
                         ajaxModel.show( 'Item Quantity', qty_template.html() , {dialogSize: 'md' });
                        return ;
                    }

                    AjaxLoader.show();
                    var serial_template = $("#serial_list").clone() ,table = serial_template.find('table');
                    serial_template.find('.btn-primary').attr('id','serial_submit');
                    table.find('tbody').empty().html("");
                    $.ajax({
                        url: Api + "item/serialNoFromItemId",
                        data: {ItemId: obj[0]},
                        success: function (json) {
                            AjaxLoader.hide();
                            for(var i=0;i < json.length;i++){
                                $("<tr>").append(
                                    "<td> <label> " +
                                    json[i].SerialNo  +
                                    "  <input type='checkbox'   value='"+json[i].SerialNo+"' >  "+
                                    "</label>" +
                                    " </td>"
                                ).appendTo(table.find('tbody'));
                            }
                            ajaxModel.show( 'Serial No(s)', serial_template.html() , {dialogSize: 'sm' });
                        }
                    });


                }
            });
 
            $('body')
                .on('click','#qty_button',function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    qty = $('#qty_input').val();
                    loadItemList++ ;
                    $('#product-search').val("");
                    var int =$(this).closest('.modal').find("input[type=number]");
                    if( ! parseInt(obj[1])  ) {
                        var qty = int.val();
                        AjaxLoader.show();
                        $.ajax({
                            url : Api + "item/check_qty",
                            data : {ItemId : obj[0] },
                            success: function (json) {
                                if(parseInt(json.AvaQty) >= qty ){
                                    $("<tr>").data('id',loadItemList ).append(
                                        "<td>" + (loadItemList+1 ) + "</td>"+
                                        "<td>" +  item[0]+ "</td>"+
                                        "<td>" +  item[1]+ "</td>"+
                                        "<td>" +  qty+
                                        " <input type='hidden' class='items' name='item[id][" + loadItemList   + "]' value='"+ obj[0] +"' /> " +
                                        " <input type='hidden'  name='item[qty][" + loadItemList   + "]' value='"+ qty +"' /> " +
                                        "<td> <a data-remove='tr' class='fa fa-times btn btn-danger btn-remove' >  </a>  </td>"
                                    ).appendTo("#item-table-tr");
                                    loadItemList++ ;
                                    ajaxModel.hide();
                                }else{
                                    int.addClass('form-control-danger').closest('td').addClass('has-danger');
                                }
                                AjaxLoader.hide();
                            }
                        });
                        return;
                    }
                    AjaxLoader.show();
                    var serial_template = $("#serial_list").clone() ,table = serial_template.find('table');
                    serial_template.find('.btn-primary').attr('id','serial_submit');
                    $.ajax({
                        url : Api+"item/serialNoFromItemId",
                        data : {ItemId : obj[0] },
                        success: function (json) {
                            AjaxLoader.hide();
                            if(json.length >= qty  ) {
                                table.find('tbody').empty().html("");
                                for(var i=0;i < json.length;i++){
                                    $("<tr>").append(
                                        "<td> <label> " +
                                        json[i].SerialNo  +
                                        "  <input type='checkbox'   name='item[serial_list]["+ json[i].SerialNo   +"][]' >  "+
                                        "</label>" +
                                        " </td>"
                                    ).appendTo(table.find('tbody'));
                                }
                                ajaxModel.show( 'Serial No(s)', serial_template.html() , {dialogSize: 'sm' });


                            }else{
                                alert( "Only "+json.length+" Items Available on that product" );
                            }
                        }
                    }) ;

                })
                .on('click','#serial_submit',function (e) {
                    e.stopPropagation();
                    var qty = $(this).closest('.modal').find("input[type=checkbox]:checked").length , input = "<br/>" ;
                    $(this).closest('.modal').find("input[type=checkbox]:checked").each(function (k,v) {
                        if(k>0) input += ", ";
                        input += $(v).val()+" <input type='hidden'  name='item[serial][" + loadItemList   + "]["+k+"]' value='"+ $(v).val() +"' /> " ;
                    })
                    $("<tr>").data('id',loadItemList ).append(
                        "<td>" + (loadItemList+1 ) + "</td>"+
                        "<td>" +  item[0]+ "</td>"+
                        "<td>" +  item[1]+ "</td>"+
                        "<td>" +  qty+
                        input +
                        " <input type='hidden' class='items'  name='item[id][" + loadItemList   + "]' value='"+ obj[0] +"' /> " +
                        " <input type='hidden'  name='item[qty][" + loadItemList   + "]' value='"+ qty +"' /> " +
                        "<td> <a data-remove='tr' class='fa fa-times btn btn-danger btn-remove' >  </a>  </td>"
                    ).appendTo("#item-table-tr");
                    ajaxModel.hide();
                    loadItemList++ ;
                });
        })
    </script>
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
    <!-- extra js end -->

<?php $this->view( 'includes/footer_end.php') ?>