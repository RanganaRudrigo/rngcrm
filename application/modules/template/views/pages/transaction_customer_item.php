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
                        <h4 class="header-title m-t-0 m-b-30">Filter Customer</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1"> ( Code , Name , Company contact Person
                                        ) </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> Customer Information </h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
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
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="fa fa-search"></i></span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> Product Information </h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table class="table table-bordered" >
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
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> PRO-01 </td>
                                        <td> HP Printer </td>
                                        <td> 1 </td>
                                        <td> <select> <option>RNG </option> <option>Customer</option> </select> </td>
                                        <td> <i class="fa fa-times btn btn-danger" ></i> </td>
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
