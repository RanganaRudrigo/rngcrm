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
                        <h4 class="page-title">Product Item </h4>
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
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Product Type</label>

                                    <select class="form-control " name="form[product_tpe]" id="product_tpe">
                                        <option>--------Select---------</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>

                                    <select class="form-control " name="form[brand_name]" id="brand_name">
                                        <option>--------Select---------</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                    </select>
                                </fieldset>
                                </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Model Name</label>

                                    <select class="form-control " name="form[model_name]" id="model_name">
                                        <option>--------Select---------</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                        <option>Product Type</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Has Serial Number</label>

                                    <div class="checkbox checkbox-primary">

                                        <input type="checkbox" class="form-control" name="form[has_serial]"
                                               id="has_serial"
                                               value="<?= $result->has_serial ?>" <?= form_error('form[has_serial]') ?>
                                        >
                                        <label for="checkbox21">
                                            <strong>NO</strong>
                                        </label>
                                    </div>
                                </fieldset>

                                </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Item Name</label>
                                    <input type="text" class="form-control" name="form[name]" id="name"
                                           value="<?= $result->rep_mode_name ?>"
                                        <?= form_error('form[name]') ?>
                                           placeholder="Item Name">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                
                   <textarea class="form-control" id="exampleTextarea" rows="3" name="form[description]"
                             id="description" value="<?= $result->description ?>"
                       <?= form_error('form[description]') ?> placeholder="Description"></textarea>
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
