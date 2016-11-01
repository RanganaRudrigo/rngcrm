<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?>">
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
                

                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Filter Product</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1"> Product ( Code , Serial No , Company Code
                                        ) </label>
                                    <div class="input-group">
                                        <input type="text" id="product-search" class="form-control">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>
                                <?= form_error('form[ItemId]') ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12" id="select-result-container" >
                                <p> This Box Contain Product More Information </p>
                            </div>
                        </div>
                    </div>


                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Job Order No</label>
                                            <div class="clear"></div> 
                                             <select class="form-control name-3" name="form[JobOrderType]" id="job_order_type">

                                        <option value="P" selected=""   >Printer Job</option>
                                        <option value="T" >Toner Job</option>
                                        
                                        
                                    </select>
                                            <input type="text" class="form-control name-4" readonly=""
                                                   name="form[jobOrderNo]"
                                                   id="jobOrderNo" value="<?= $result->jobOrderNo ?>"
                                                 placeholder="Job Order No">
                                                 <?= form_error('form[jobOrderNo]') ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset class="form-group job-order-1">
                                            <label for="exampleInputEmail1">Complain Date & Time </label>
                                            <div class="input-group">
                                                <input type="text" name="form[ComplainDate]" data-date-format="yyyy-mm-dd" class="form-control datepicker" value="<?= set_value("form[ComplainDate]",date('Y-m-d')) ?>" 
                                                       placeholder="yyyy-mm-dd"
                                                       id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                            </div>
                                             <?= form_error('form[ComplainDate]') ?> 
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Company Name</label>
                                            <input type="text" class="form-control"  
                                                   id="company_name"
                                                   value="<?= $result->company_name ?>" readonly
                                                   placeholder="Company Name"> 
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Contact Person</label>
                                            <input type="text" class="form-control" name="form[contactPerson]"
                                                   id="contactPerson"
                                                   value="<?= $result->contactPerson ?>" 
                                                   placeholder="Contact Person">
                                                   <?= form_error('form[contactPerson]') ?>
                                        </fieldset>
                                    </div>

                                </div>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Repair Mode </label>

                                    <select class="form-control code-1" name="form[RepairModeId]" required="" id="RepairModeId">
                                        <option value="" >--------Select---------</option>
                                        <?php foreach ($repair_modes as $key => $value) { ?>
                                            <option value="<?= $value->RepairModeId ?>" ><?= $value->rep_mode_name ?></option>
                                        <?php } ?> 
                                    </select>
                                     <?= form_error('form[RepairModeId]') ?>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Complain Details</label>                                
                   <textarea class="form-control" rows="3" name="form[complainDetails]" id="complainDetails"
                             value="<?= $result->complainDetails ?>" placeholder="Complain Details"></textarea>
                       <?= form_error('form[complainDetails]') ?>
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
    <script src="<?= base_url("js/autocomplete.min.js") ?>"></script>
    <script src="<?= base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
    
    <script type="text/javascript">
         $(function () {
            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true , 
                minDate : 0
            });
             $('#product-search').autocomplete({
                'source': function(request, response) {
                    if(request.length){
                        $.ajax({
                            url: Api+"Joborder/product",
                            data:{str: request},
                            dataType: 'json',
                            success: function(json) {
                                response($.map(json, function(item) {
                                    return {
                                        label:item['company']+" > "+ item['ItemCode'] + "-"+ item['ItemName'] +" ( "+ item['SerialNo'] +")"  ,
                                        value: item
                                    }
                                }));
                            }
                        });
                    }
                },
                'select': function(json) {
                    $('#product-search').val("");
                     var obj = json['value'],
                     $table = $('<table>').attr({
                        class : 'table table-bordered'
                     });
                     $("#company_name").val(obj['company'])
                     $("#contactPerson").val(obj['customerName'])

                      if($("#SerialNo").length){
                                $("#SerialNo").val(obj["SerialNo"])
                            }else{
                                $("<input>").attr({id: "SerialNo" 
                                    ,name:"form[SerialNo]",type:'hidden',value:obj["SerialNo"]}).appendTo("form");
                            }

                      for(var i in obj){
                        if(i == 'AreaCode') $('#jobOrderNo').data('AreaCode',obj[i]).val(obj[i]+$("#job_order_type").val());
                        else if(i == 'CustomerId' || i == 'ItemId'  ) {
                            if($("#"+i).length){
                                $("#"+i).val(obj[i])
                            }else{
                                $("<input>").attr({id:i ,name:"form["+i+"]",type:'hidden',value:obj[i]}).appendTo("form");
                            }
                            continue ;
                        }
                        else
                            $table.append($('<tr>').append('<th>'+i+'</th>'+'<td>'+obj[i]+'</td>'));
                      }

                     $('#select-result-container').html($table);


                }
            });
             $("#job_order_type").change(function(){

                if($('#jobOrderNo').data('AreaCode') !=  undefined )
                    $('#jobOrderNo').val( $('#jobOrderNo').data('AreaCode') +$("#job_order_type").val());
             });
         })
    </script>

    <!-- extra js end -->
    <?php $this->view('includes/footer_end.php') ?>
 