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
                        <h4 class="page-title">Model</h4>
                        <ol class="breadcrumb p-0">
                            <li><a href="<?= base_url() ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('stock/item_model') ?>">Model</a></li>
                            <li class="active"> Model </li>
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
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <h4 class="header-title m-t-0 m-b-30">Model</h4>
                                <!-- <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Model Code</label>
                                    <input type="text" class="form-control code-1"   name="form[ItemModelCode]" id="ItemModelCode"
                                           value="<?= $result->ItemModelCode?>"
                                           <?= $result->ItemModelId ? "readonly":"" ?>
                                           placeholder="Model Code">
                                        <?= form_error('ItemModelCode]') ?>
                                </fieldset>
                                -->
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Model Name</label>
                                    <input type="text" class="form-control" name="form[ItemModelName]" id="ItemModelName"
                                           value="<?= $result->ItemModelName?>"
                                           placeholder="Model Name">
                                        <?= form_error('form[ItemModelName]') ?>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" >Save</button>
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

</div>
<!-- content -->

</div>
<!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view('includes/footer_start.php') ?>
<!-- extra js start -->
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
