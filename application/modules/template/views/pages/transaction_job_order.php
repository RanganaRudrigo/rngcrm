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
                                             <select class="form-control name-3" id="exampleSelect1">

                                        <option>Printer Job</option>
                                        <option>Toner Job</option>
                                        
                                        
                                    </select>
                                            <input type="text" class="form-control name-4" readonly=""
                                                   name="form[job_order_no]"
                                                   id="job_order_no" value="<?= $result->job_order_no ?>"
                                                <?= form_error('form[job_order_no]') ?> placeholder="Job Order No">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset class="form-group job-order-1">
                                            <label for="exampleInputEmail1">Complain Date & Time </label>
                                            <div class="input-group">
                                                <input type="text" readonly class="form-control"
                                                       placeholder="mm/dd/yyyy"
                                                       id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Company Name</label>
                                            <input type="text" class="form-control" name="form[company_name]"
                                                   id="company_name"
                                                   value="<?= $result->company_name ?>"
                                                <?= form_error('form[company_name]') ?>
                                                   placeholder="Company Name">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Contact Person</label>
                                            <input type="text" class="form-control" name="form[contact_person]"
                                                   id="contact_person"
                                                   value="<?= $result->contact_person ?>"
                                                <?= form_error('form[contact_person]') ?>
                                                   placeholder="Contact Person">
                                        </fieldset>
                                    </div>

                                </div>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Repair Mode </label>

                                    <select class="form-control code-1" name="form[type_of_fault]" id="type_of_fault">
                                        <option>--------Select---------</option>
                                        <option>Type of Fault</option>
                                        <option>Type of Fault</option>
                                        <option>Type of Fault</option>
                                        <option>Type of Fault</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Complain Details</label>
                                
                   <textarea class="form-control" rows="3" name="form[complain_details]" id="complain_details"
                             value="<?= $result->complain_details ?>"
                       <?= form_error('form[complain_details]') ?> placeholder="Complain Details"></textarea>
                                </fieldset>

                            </div>
                        </div>
                    </div>

                    <!--<div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Product Details</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Product Type</label>

                                    <select class="form-control code-1" name="form[product_type]" id="product_type">
                                        <option>--------Select---------</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>

                                    <select class="form-control code-1" name="form[brand_name]" id="brand_name">
                                        <option>--------Select---------</option>
                                        <option>Brand Name</option>
                                        <option>Brand Name</option>
                                        <option>Brand Name</option>
                                        <option>Brand Name</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Model Name</label>
                                    <input type="text" class="form-control" name="form[model_name]" id="model_name"
                                           value="<? /*= $result->model_name */ ?>"
                                        <? /*= form_error('form[model_name]') */ ?>
                                           placeholder="Model Name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Serial Number</label>
                                    <input type="text" class="form-control" name="form[serial_number]"
                                           id="serial_number"
                                           value="<? /*= $result->serial_number */ ?>"
                                        <? /*= form_error('form[serial_number]') */ ?>
                                           placeholder="Serial Number">
                                </fieldset>


                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1">Invoice Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy"
                                               id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Guarantee Status</label>

                                    <select class="form-control code-2" name="form[guarantee_status]"
                                            id="guarantee_status">
                                        <option>YES</option>
                                        <option>NO</option>

                                    </select>
                                </fieldset>


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
