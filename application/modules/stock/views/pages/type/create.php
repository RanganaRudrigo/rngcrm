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
                        <h4 class="page-title">Type</h4>
                        <ol class="breadcrumb p-0">
                            <li><a href="<?= base_url() ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('stock/item_type') ?>">Type</a></li>
                            <li class="active"> Type </li>
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
                                <h4 class="header-title m-t-0 m-b-30">Type</h4>
                                <!--
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Type Code</label>
                                    <input type="text" class="form-control code-1"   name="form[ItemTypeCode]" id="ItemTypeCode"
                                           value="<?= $result->ItemTypeCode?>"
                                           <?= $result->ItemTypeId ? "readonly":"" ?>
                                           placeholder="Type Code">
                                        <?= form_error('ItemTypeCode]') ?>
                                </fieldset>
                                -->
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Type Name</label>
                                    <input type="text" class="form-control" name="form[ItemTypeName]" id="ItemTypeName"
                                           value="<?= $result->ItemTypeName?>"
                                           placeholder="Type Name">
                                        <?= form_error('form[ItemTypeName]') ?>
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
