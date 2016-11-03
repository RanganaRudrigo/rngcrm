<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?>" rel="stylesheet" type="text/css" >
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
                        <h4 class="page-title">Printer Job With Part</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="<?= base_url('joborder') ?>">Job Order</a>
                            </li>
                            <li class="active">
                                Printer Job With Part
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <?php $this->view('includes/notification.php'); ?>

            <div class="row">
                <div class="col-sm-12">
                    <?= form_open_multipart() ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Select Job to Technician</h4>
                                <table id="datatable" class=" table table-striped " >
                                    <thead  >
                                    <tr>
                                        <th>#</th>
                                        <th>Job Order No</th>
                                        <th>Technician</th>
                                        <th>Handover Date & Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $k => $row): ?>
                                        <tr class="data-tr" data-object="<?= htmlentities(json_encode($row)) ?>" >
                                            <th scope="row"> <?= $k+1 ?> </th>
                                            <td><?= $row->jobOrderNo ?></td>
                                            <td><?= $row->company ?>-<?= $row->contactPerson ?></td>
                                            <td><?= $row->JOB_TO_TECH->HandoverDate ?> - <?= $row->JOB_TO_TECH->HandoverTime ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Job Date</label>
                                    <div class="input-group">
                                        <input type="text" name="form[EndDate]" required value="<?= set_value("form[EndDate]",date('Y-m-d')) ?>" class="form-control datepicker" data-date-format="yyyy-mm-dd"  placeholder="yyyy-mm-dd"
                                               id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                    </div>
                                </fieldset>

                                <!--
                                <fieldset class="form-group job-order-1">


                                    <label for="exampleInputEmail1">Start Time</label>
                                    <div class="input-group clockpicker ">
                                        <input type="text" name=""  class="form-control timepicker" value="<?= set_value("form[HandoverTime]",date('H:i')) ?>">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>

                                </fieldset>-->

                                <fieldset class="form-group job-order-2 ">
                                    <label for="exampleInputEmail1">End Time</label>
                                    <div class="input-group clockpicker ">
                                        <input type="text" name="form[EndTime]" required class="form-control timepicker" value="<?= set_value("form[EndTime]",date('H:i')) ?>">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Job Sheet </label>
                                    <input type="file" name="jobSheet" required class="form-control">
                                </fieldset>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> Before Job </label>
                                    <input type="file"  name="BeforeJob"  class="form-control">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> After Job </label>
                                    <input type="file"  name="AfterJob"  class="form-control">
                                </fieldset>

                            </div>

                        </div>
                    </div>
                    <div class="card-box" >
                        <h4 class="header-title m-t-0 m-b-30"> Changed Part Details  </h4>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Parts Used For</label>
                                    <select class="form-control code-1"  name="form[PartUsedFor]" id="parts_used_for" >
                                        <option value="0" > Without Part </option>
                                        <option value="1" >Free OR Invoiced </option>
                                        <option value="2" >Quotation</option>
                                    </select>
                                </fieldset>

                            </div> 
                        </div>
                        <div  class="row"   >
                            <div class="col-lg-12 col-sm-12 col-md-12" id="data-bind-container" >
                            </div>
                        </div>
                    </div>
                    <div class="card-box" >
                        <h4 class="header-title m-t-0 m-b-30"> Repair Information</h4>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="repair_mode">Repair Mode</label>

                                    <select class="form-control " name="form[RepairModeId]" id="RepairModeId">
                                        <?php foreach ($repairs as $repair): ?>
                                            <option value="<?=$repair->RepairModeId ?>" ><?=$repair->rep_mode_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="repair_mode"> Job Status </label>
                                    <select class="form-control " name="form[JobStatus]" required id="repair_mode">

                                        <option value="1">Completed</option>
                                        <option value="2" >Pass To Courier</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="note"> Note </label>
                                    <textarea id="note" rows="4" class="form-control" name="form[Note]" ></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label  > Star </label> <br/>
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="1" >  Bad</label> &nbsp;&nbsp;
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="2" >  Ok</label>&nbsp;&nbsp;
                                    <label><input type="radio" checked name="form[star]" class="radio-inline" value="3" >  Good</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="4" >  Very Good</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="form[star]" class="radio-inline" value="5" >  Excellent </label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form[JobOrderType]" value="P" >
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
<script src="<?= base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js") ?>"></script>
<script src="<?= base_url("js/autocomplete.min.js") ?>"></script>

<div id="free-and-invoice" style="display: none" >
    <h4 class="header-title m-t-0 m-b-30">Filter Product</h4>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
            <fieldset class="form-group job-order-1">
                <label for="exampleInputEmail1"> Product ( Code , Serial No , Company Code
                    ) </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="product-search-input" autocomplete="off">

                    <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
                </div>
            </fieldset>
        </div>
    </div>
    <table  class="table table-bordered "   >
        <thead>
        <tr>
            <td>#</td>
            <td>Item Code</td>
            <td>Item Name</td>
            <td>Item Qty</td>
            <td> Type </td>
            <td>  </td>
        </tr>
        </thead>
        <tbody  >
        </tbody>
    </table>
</div>
<div id="quotation-container" style="display: none" >
    <div class="row" >
        <div class="col-lg-6" >
            <fieldset class="form-group">
                <label for="exampleInputEmail1"> Quotation No</label>
                <input type="text" name="quotation[QuotationNo]" class="form-control" >
            </fieldset>
        </div>
        <div class="col-lg-6" >
            <fieldset class="form-group">
                <label for="exampleInputEmail1"> Quotation Date</label>
                <input type="text" name="quotation[QuotationDate]" data-date-format="yyyy-mm-dd"   class="form-control date" value="<?= date('Y-m-d') ?>" >
            </fieldset>
        </div>
    </div>
</div>
<div id="serial_list" class="hidden">
    <form>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th> Serial No </th>
        </tr>
        </thead>
        <tbody> </tbody>
    </table>
    <button type="submit" class="btn btn-primary pull-right m_b_10 "> OK </button>
    <button type="button" class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
    </form>
    <div class="clearfix"></div>
</div>
<div id="free-or-invoice" class="hidden">
    <fieldset class="form-group">
        <label > Free
            <input id="free" type="radio" value="free" name="type" >
        </label>
        <label class="pull-right" > Invoice
            <input id="free" type="radio" value="invoice" name="type" >
        </label>
    </fieldset>
    <button class="btn btn-primary pull-right m_b_10 "> OK </button>
    <button class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
    <div class="clearfix"></div>
</div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#parts_used_for").change(function (e) {
            var val = $(this).val() , container = $("#data-bind-container");
            if(val == 0 ){
                container.empty();
            }else if(val == 1 ){
                var free_and_invoice = $("#free-and-invoice").clone().attr({
                    "id" : "item-detail-table"
                });
                free_and_invoice.find("#product-search-input").attr({
                    id : "product-search"
                });
                free_and_invoice.find("tbody").attr({
                    id : "item-table-tr"
                });
                container.html( free_and_invoice.html() );
                ProductSearch();
            }else if(val ==2 ){
                var quo = $("#quotation-container").clone();
                quo.find(".date").addClass('datepicker');
                container.html( quo.html() );
                DatePickerEnable();
            }
        });
//        $("#data-bind-container").on("keyup","#product-search",function () {
//
//        });

        $("form").submit(function () {
            if(!$("#JobOrderId").length) alert("Please Select the job order");
            return $("#JobOrderId").length ? true : false   ;
        });
        $('#datatable').DataTable();
        DatePickerEnable();
        $('.timepicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });

        $(".data-tr").click(function (e) {
            var $this = $(this) , obj = $this.data('object') ;
            if(obj.JobOrderId){
                console.log(obj);
                if($("#JobOrderId").length){
                    $("#JobOrderId").val(obj.JobOrderId)
                    $("#TechnicianId").val(obj.TechnicianId)
                }else{
                    $("<input>").attr({
                        id :"JobOrderId",
                        type:"hidden",
                        name:"form[JobOrderId]",
                        value : obj.JobOrderId
                    }).appendTo("form");
                    $("<input>").attr({
                        id :"TechnicianId",
                        type:"hidden",
                        name:"TechnicianId",
                        value : obj.JOB_TO_TECH.TechnicianId
                    }).appendTo("form");
                }
                $("#RepairModeId").val(obj.RepairModeId);
            }else{
                location.reload();
            }
            $this.closest('table').find('tr').removeAttr('style')
            $this.css({"background-color":"#6c7f8c",'color':'#fff'});
        });

    });

    function ProductSearch() {
        var loadItemList = 0 ,
            obj = [],
            item = [] ,
            type = null ,
            JobOrderId =0  ,
            TechnicianId =0  ;

        $("#data-bind-container").
            find('#product-search')
            .autocomplete({
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
                    if(!$("#JobOrderId").length){
                        alert("Please Select the job order");
                        return false ;
                    }
                    var f = true;
                    $("body").find(".items").each(function (k,v) {
                        if(obj[0] == $(v).val() ){
                            alert("This Item Already Selected in below ");
                            f = false ;
                        }
                    });
                    if(!f) return;
                    JobOrderId = $("#JobOrderId").val();
                    TechnicianId = $("#TechnicianId").val();
                    var free_invoice = $("#free-or-invoice").clone();
                    free_invoice.find('.btn-primary').attr('id','free_invoice_checker');
                    ajaxModel.show( 'Free Or Invoice', free_invoice.html() , {dialogSize: 'sm' });
                }
            });

        $("body")
            .on("click","#free_invoice_checker", function (e) {
                e.preventDefault();
                type = $(this).closest('.modal').find("input[type=radio]:checked").val();
                if( typeof type == "undefined"){
                    return;
                }
                AjaxLoader.show();
                ajaxModel.hide();

                if(! parseInt(obj[1]) ){
                    var qty_template = $("#item_qty").clone() ;
                    qty_template.find('.btn-primary').attr('id','qty_button');
                    qty_template.find('input[type=number]').attr({'id':'qty_input', 'value': 0});
                    ajaxModel.show( 'Item Quantity', qty_template.html() , {dialogSize: 'md' });
                    return ;
                }

                var serial_template = $("#serial_list").clone() ,table = serial_template.find('table');
                serial_template.find('.btn-primary').attr('id','serial_submit');
                table.find('tbody').empty().html("");
                $.ajax({
                    url: Api + "technician/serialNoFromItemId",
                    data: {ItemId: obj[0] , TechnicianId :TechnicianId  },
                    success: function (json) {
                        AjaxLoader.hide();
                        for(var i=0;i < json.length;i++){
                            $("<tr>").append(
                                "<td> <label> " +
                                json[i].SerialNo  +
                                "  <input type='checkbox' data-for='"+i+"'  value='"+json[i].SerialNo+"' >  "+
                                "</label>" +
                                ( type == "free" ? "<input type='text' class='input-"+i+" pull-right form-control'  />" :"" ) +
                            " </td>"
                            ).appendTo(table.find('tbody'));
                        }
                        ajaxModel.show( 'Serial No(s)', serial_template.html() , {dialogSize: 'sm' });
                    }
                });
            })
            .on('click','#serial_submit',function (e) {
                e.preventDefault();
                e.stopPropagation();
                var qty = $(this).closest('.modal').find("input[type=checkbox]:checked").length , input = "<br/>" , f = true ;
                $(this).closest('.modal').find("input[type=checkbox]:checked").each(function (k,v) {
                    var inp = $(".input-"+$(v).data('for')) ;
                    if(type == "free" ){
                        if( ! inp.val().length ){
                            f = false ;
                            inp.addClass('form-control-danger').closest('td').addClass('has-danger');
                        }else{
                            inp.removeClass('form-control-danger').closest('td').removeClass('has-danger');
                            if(k>0) input += ", ";
                            input += $(v).val()+"-"+inp.val()+
                                " <input type='hidden'  name='item[NewSerialNo][" + loadItemList   + "]["+k+"]' value='"+ $(v).val() +"' /> " +
                                " <input type='hidden'  name='item[OldSerialNo][" + loadItemList   + "]["+k+"]' value='"+inp.val() +"' /> " ;
                        }
                    }else{
                        if(k>0) input += ", ";
                        input += $(v).val() +
                            " <input type='hidden'  name='item[NewSerialNo][" + loadItemList   + "]["+k+"]' value='"+ $(v).val() +"' /> "   ;
                    }

                });
                if(f){
                    $("<tr>").data('id',loadItemList ).append(
                        "<td>" + (loadItemList+1 ) + "</td>"+
                        "<td>" +  item[0]+ "</td>"+
                        "<td>" +  item[1]+ "</td>"+
                        "<td>" +  qty+
                        input +
                        " <input type='hidden' class='items'  name='item[type][" + loadItemList   + "]' value='"+ type +"' /> " +
                        " <input type='hidden' class='items'  name='item[id][" + loadItemList   + "]' value='"+ obj[0] +"' /> " +
                        " <input type='hidden'  name='item[qty][" + loadItemList   + "]' value='"+ qty +"' /> " +
                        "<td>  "+ type +"  </td>" +
                        "<td> <a data-remove='tr' class='fa fa-times btn btn-danger btn-remove' >  </a>  </td>"
                    ).appendTo("#item-table-tr");
                    ajaxModel.hide();
                    loadItemList++ ;
                }
        })
            .on("click","#qty_button",function (e) {
                e.preventDefault();
                var $this = $(this) , qty =  $this.closest('.modal').find("input[type=number]").val();
                AjaxLoader.show();
                $.ajax({
                    url : Api + "technician/check_qty",
                    data : {ItemId : obj[0] , JobOrderId :JobOrderId },
                    success: function (json) {
                        if(json.Qty >= qty ) {
                            $("<tr>").data( 'id' , loadItemList ).append(
                                "<td>" + ( loadItemList + 1 ) + "</td>" +
                                "<td>" + item[0] + "</td>" +
                                "<td>" + item[1] + "</td>" +
                                "<td>" + qty +
                                " <input type='hidden' class='items'  name='item[type][" + loadItemList   + "]' value='"+ type +"' /> " +
                                "<input type='hidden' class='items'  name='item[id][" + loadItemList   + "]' value='"+ obj[0] +"' /> " +
                                "<input type='hidden'  name='item[qty][" + loadItemList   + "]' value='"+ qty +"' /> " +
                                "<td>  "+ type +"  </td>" +
                                "<td> <a data-remove='tr' class='fa fa-times btn btn-danger btn-remove' >  </a>  </td>"
                            ).appendTo("#item-table-tr");
                            ajaxModel.hide();
                            loadItemList++ ;
                        } else {
                            $this.closest('.modal').find("input[type=number]").addClass('form-control-danger').closest('td').addClass('has-danger');
                        }
                        AjaxLoader.hide();
                    },
                    error : function () {
                        ajaxModel.hide();
                        AjaxLoader.hide();
                        alert("Please Select JobOrder");
                    }
                });
            });
    }
    function DatePickerEnable() {
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true ,
            minDate : 0
        });
    }
</script>
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
