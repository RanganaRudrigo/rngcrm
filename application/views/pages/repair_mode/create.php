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
                        <h4 class="page-title">Repair Mode</h4>
                        <ol class="breadcrumb p-0">
                            <li><a href="<?= base_url() ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('repair_mode') ?>">Repair Mode</a></li>
                            <li class="active"> Repair Mode Registration</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <?php $this->view('includes/notification.php'); ?>

            <div class="row">
                <div class="col-sm-12">
                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">General Information</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1"> Repair code</label>
                                    <input type="text" class="form-control repair_code-1" name="form[repair_code]" id="repair_code"
                                           value="<?= $result->repair_code ?>" <?= $result->repair_code ? "readonly":"" ?>
                                         placeholder="Repair Code">
                                    <?= form_error('form[repair_code]') ?>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Repair Mode Name</label>
                                    <input type="text" class="form-control" name="form[rep_mode_name]"
                                           id="rep_mode_name"
                                           value="<?= $result->rep_mode_name ?>"
                                           placeholder="Repair Mode Name">
                                    <?= form_error('form[rep_mode_name]') ?>
                                </fieldset>
                                <!-- <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Has Serial Number</label>

                                    <div class="checkbox checkbox-primary">
                                        <input type="hidden" name="form[has_serial]" value="0" >
                                        <input type="checkbox" class="form-control" name="form[has_serial]"
                                               id="has_serial" value="1" <?= $result->has_serial ? "checked":"" ?>  >
                                        <?= form_error('form[has_serial]') ?>
                                        <label for="has_serial"  >
                                            <strong>Yes</strong>
                                        </label>
                                    </div>
                                </fieldset> -->
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success"> Save</button>
                    <?= form_close() ?>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div>
<!-- container -->
  

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view('includes/footer_start.php') ?>
<!-- extra js start -->
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
