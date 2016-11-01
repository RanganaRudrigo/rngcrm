<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
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
                        <h4 class="page-title">Transaction - Purchase</h4>
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
                        <h4 class="header-title m-t-0 m-b-30">Primary Details</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Purchase Code</label>
                                    <input type="text" class="form-control code-1" name="form[sup_code]" id="pur_code"
                                           value="<?= $result->pur_code ?>"
                                        <?= form_error('form[pur_code]') ?> placeholder="Purchase Code">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <input type="text" class="form-control" name="form[supplier_name]"
                                           id="supplier_name"
                                           value="<?= $result->supplier_name ?>"
                                        <?= form_error('form[supplier_name]') ?>
                                           placeholder="Supplier Name">
                                </fieldset>


                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <div class="form-group">
                                    <label>Purchase Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy"
                                               id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-box">

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30">Filter Item</h4>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Item Name</label>
                                    <input type="text" class="form-control" name="form[item_name]" id="item_name"
                                           value="<?= $result->item_name ?>"
                                        <?= form_error('form[item_name]') ?>
                                           placeholder="Item Name">
                                </fieldset>

                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30">Select Item</h4>
                                <fieldset class="form-group">
                                    <div class="select-item-box">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>

                                                <th>Item Code</th>
                                                <th>Item Name</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            <tr>

                                                <td>ITEMS00574</td>
                                                <td>Printer Name</td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </fieldset>

                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Purchase Details</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">

                                <table class="table">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>#</th>
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>QTY</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>#1</td>
                                        <td>Hp Print</td>
                                        <td>2</td>
                                        <td><a class="fa fa-times btn btn-danger"></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>#2</td>
                                        <td>Leaser Print</td>
                                        <td>3</td>
                                        <td><a class="fa fa-times btn btn-danger"></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>#3</td>
                                        <td>dot matrix printer</td>
                                        <td>1</td>
                                        <td><a class="fa fa-times btn btn-danger"></a></td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
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
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
