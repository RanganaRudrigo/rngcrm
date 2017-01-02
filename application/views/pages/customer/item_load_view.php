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
                            <h4 class="page-title">Item Purchase</h4>
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
                            <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                            <div class="row" >
                                <div class="col-lg-4" >
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th> Code </th>
                                            <td> <?= $CustomerItem->cus_code ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Company Name </th>
                                            <td><?= "$CustomerItem->company" ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Contact Person </th>
                                            <td><?= "$CustomerItem->title$CustomerItem->customerName" ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Contact </th>
                                            <td><?= $CustomerItem->tel_no ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-8" >
                                    <table class="table table-bordered" id="datatable"  >
                                        <thead>
                                        <tr>
                                            <td>Item Code</td>
                                            <td>Item Name</td>
                                            <td>Serial No </td>
                                            <td> Action </td>
                                        </tr>
                                        </thead>
                                        <?php foreach ($CustomerItem->ItemDetail as $k => $detail ): ?>
                                            <?php foreach ($detail->serial as $list) :     ?>
                                                <tr>
                                                    <td> <?= $detail->ItemCode ?> </td>
                                                    <td> <?= $detail->ItemName ?> </td>
                                                    <td> <?= $list->SerialNo ?> </td>
                                                    <td>
                                                        <a class="btn btn-danger fa fa-times " data-serial="<?= $list->SerialNoId ?>"  onclick="deleteRequest(this)"  ></a>
                                                        <a class="btn btn-warning fa fa-refresh " data-serial="<?= $list->SerialNoId ?>" onclick="transferItem(this)"  >Change Customer </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;     ?>
                                        <?php endforeach; ?>
                                        <tbody >
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

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
    <div id="remove_item" class="hidden">
        <input type="hidden"   >
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th> Reason </th>
                <td> <select class="form-control"    >
                        <option value="Mistaken Entire" > Mistaken Entire </option>
                        <option value="1" > Call Over </option>
                        <option value="other" > Other </option>
                    </select>  </td>
            </tr>
            <tr>
                <th> Note </th>
                <td> <textarea class="form-control"   ></textarea>  </td>
            </tr>
            </tbody></table>
        <button class="btn btn-primary pull-right m_b_10 "> OK </button>
        <button class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
        <div class="clearfix"></div>
    </div>
    <div id="transfer_item" class="hidden">
        <fieldset class="form-group job-order-1">
            <label for="exampleInputEmail1"> ( Code , Name , Company contact Person
                ) </label>
            <div class="input-group">
                <input type="text" class="form-control"  autocomplete="off">

                <span class="input-group-addon bg-custom b-0"><i class="fa fa-search"></i></span>
            </div>
        </fieldset>
        <fieldset class="form-group job-order-1">
            <label for="exampleInputEmail1">  Property </label>
            <select class="form-control" id="property" >
                <option value='1' >RNG</option> <option value='2'  >Customer Property</option>
            </select>
        </fieldset>
        <button class="btn btn-primary pull-right m_b_10 "> OK </button>
        <button class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
        <div class="clearfix"></div>
    </div>
    <input type="hidden"  id="CustomerId">
    <input type="hidden"  id="serialNo">
<?php $this->view( 'includes/footer_start.php') ?>
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
    <script src="<?= base_url("js/autocomplete.min.js") ?>"></script>
<?php $this->view('includes/footer_end.php') ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable({"scrollY": "300px", "scrollCollapse": true, "paging": false});
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
        function deleteRequest(self) {
            $(self).closest('tr').removeClass('removeTr').addClass('removeTr');
            var deleteRequest = $("#remove_item").clone() ;
            deleteRequest.find('.btn-primary').attr('id','removeBtn');
            deleteRequest.find('select').attr('id','reason');
            deleteRequest.find('textarea').attr('id','note');
            $('#serialNo').val($(self).data('serial'));
            ajaxModel.show( 'Remove Item', deleteRequest.html() , {dialogSize: 'md' });
        }
        function transferItem(self) {
            $(self).closest('tr').removeClass('removeTr').addClass('removeTr');
            var deleteRequest = $("#transfer_item").clone();
            deleteRequest.find('.btn-primary').attr('id','TransferBtn');
            $('#serialNo').val($(self).data('serial'));
            deleteRequest.find('input[type=text]').attr('id','customer-search');
            ajaxModel.show( 'Transfer Item', deleteRequest.html() , {dialogSize: 'md' });
            setTimeout(function () {
                $('body').find('#customer-search').autocomplete({
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
                        $('body').find('#customer-search').val(a['label']);
                    }
                });
            },1000)
        }


        $('body')
            .on('click','#removeBtn',function (e) {
                e.preventDefault();
                e.stopPropagation();
                var reason = $("#reason").val() ,  note = $("#note").val(),  serialNo = $("#serialNo").val() ;
                if(reason =='other' && note.length < 1 ){
                    $('#note').css('border','1px solid red ');
                }else{
                    $('#note').removeAttr('style');
                    $.ajax({
                        url: "<?= current_url() ?>/remove",
                        data : { reason : reason ,note : note , SerialNoId : serialNo },
                        success: function (result) {
                            if(result){
                                $('.removeTr').remove();
                                ajaxModel.hide();
                            }
                        }
                    });
                }
            })
            .on('click','#TransferBtn',function (e) {
                e.preventDefault();
                e.stopPropagation();
                var CustomerId = $("#CustomerId").val() , serialNo = $("#serialNo").val() , property = $("#property").val() ;
                $.ajax({
                    url: "<?= current_url() ?>/transfer_customer",
                    data : { CustomerId : CustomerId , SerialNoId : serialNo ,Property:property },
                    success: function (result) {
                        if(result){
                            $('.removeTr').remove();
                            ajaxModel.hide();
                        }
                    }
                });
            });
    </script>

<?php $this->view( 'includes/footer_end.php') ?>