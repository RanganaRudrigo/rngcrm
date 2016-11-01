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
                        <h4 class="page-title">Transaction - Job without Parts</h4>
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

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30">Filter Option</h4>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Search</label>
                                    <input type="text" class="form-control" name="form[search]" id="search"
                                           value="<?= $result->search ?>"
                                        <?= form_error('form[search]') ?>
                                           placeholder="Search">
                                    <small class="text-muted">Job Order No. / Technician / Handover Date
                                    </small>
                                </fieldset>

                                <button type="submit" class="btn btn-primary">Reset</button>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30">Select Job to Technician</h4>
                                <fieldset class="form-group">
                                    <div class="select-item-box">
                                        <table class="table">
                                            <thead class="thead-default">
                                            <tr>
                                                <th>#</th>
                                                <th>Job Order No</th>
                                                <th>Technician</th>
                                                <th>Handover Date & Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>OSO156</td>
                                                <td>Seylan - Batticaloa</td>
                                                <td>16-june -2016 : 1.00 pm</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>OSO156</td>
                                                <td>Seylan - Batticaloa</td>
                                                <td>16-june -2016 : 1.00 pm</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>OSO156</td>
                                                <td>Seylan - Batticaloa</td>
                                                <td>16-june -2016 : 1.00 pm</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </fieldset>

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
                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy"
                                               id="datepicker">
                                        <span class="input-group-addon bg-custom b-0"><i
                                                class="icon-calender"></i></span>
                                    </div>
                                </fieldset>


                                <fieldset class="form-group job-order-1">


                                    <label for="exampleInputEmail1">Start Time</label>
                                    <div class="input-group clockpicker ">
                                        <input type="text" class="form-control" value="09:30">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>

                                </fieldset>

                                <fieldset class="form-group job-order-2 ">
                                    <label for="exampleInputEmail1">End Time</label>
                                    <div class="input-group clockpicker ">
                                        <input type="text" class="form-control" value="09:30">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Job Sheet </label>
                                    <input type="file" class="form-control">
                                </fieldset>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> Before Job </label>
                                    <input type="file" class="form-control">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> After Job </label>
                                    <input type="file" class="form-control">
                                </fieldset>

                            </div>

                        </div>
                    </div>
                    <div class="card-box" >
                        <h4 class="header-title m-t-0 m-b-30"> Repair Information</h4>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="repair_mode">Repair Mode</label>

                                    <select class="form-control " name="form[repair_mode]" id="repair_mode">
                                        <option>--------Select---------</option>
                                        <option>Service</option>
                                        <option>Toner Job</option>
                                        <option>Paper Jam</option>
                                        <option>Cable Damage</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="past_used_for"> Part Used For</label>

                                    <select class="form-control " name="form[past_used_for]" id="past_used_for">
                                        <option>Free</option>
                                        <option>Invoice</option>
                                        <option>Invoice and Free</option>
                                        <option>Quotation</option>
                                    </select>
                                </fieldset>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30" > IF Change Repair Mode </h4>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Has Serial Number</label>
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" class="form-control" name="form[has_serial]"
                                               id="has_serial"
                                               value="<?= $result->has_serial ?>"  >
                                        <label for="checkbox21">
                                            <strong>Yes</strong>
                                        </label>
                                        <?= form_error('form[has_serial]') ?>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> Serial No </label>
                                    <input type="text" class="form-control" name="form[search]" id="search"
                                           value="<?= $result->search ?>"
                                        <?= form_error('form[search]') ?>
                                           placeholder="Serial No">
                                </fieldset>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30" > IF Change Quotation - Part User for </h4>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> Quotation Receipt No </label>
                                    <input type="text" class="form-control" name="form[search]" id="search"
                                           value="<?= $result->search ?>"
                                        <?= form_error('form[search]') ?>
                                           placeholder="Quotation Receipt No">
                                </fieldset>
                                <fieldset class="form-group job-order-1">
                                    <label for="exampleInputEmail1">Date</label>
                                    <div class="input-group   ">
                                        <input type="text" class="form-control" value="">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-calendar"></span> </span>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                        <div class="row" >
                            <div class="col-lg-12">
                                <h4 class="header-title m-t-0 m-b-30" > IF Change Invoice - Part User for </h4>
                                <table class="table table-bordered" >
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Item Code</td>
                                        <td>Item Name</td>
                                        <td>Item Qty</td>
                                        <td> Type </td>
                                        <td> Amount </td>
                                        <td>  </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> PRO-01 </td>
                                        <td> HP Printer </td>
                                        <td> 1 </td>
                                        <td> <select> <option>free</option> <option>pay</option> </select> </td>
                                        <td> 12000.00 </td>
                                        <td> <i class="fa fa-times btn btn-danger" ></i> </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="repair_mode"> Job Status </label>
                                    <select class="form-control " name="form[repair_mode]" id="repair_mode">
                                        <option>--------Select---------</option>
                                        <option>Completed</option>
                                        <option> In completed </option>
                                    </select>
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
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
