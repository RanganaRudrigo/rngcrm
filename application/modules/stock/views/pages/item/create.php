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
                        <h4 class="page-title">ITEM</h4>
                        <ol class="breadcrumb p-0">
                            <li><a href="<?= base_url() ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('stock/item') ?>">Item</a></li>
                            <li class="active"> Create </li>
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



                            <div class="col-lg-6 col-md-6 col-sm-12 ">

                                <fieldset class="form-group">
                                    <label for="ItemModelId">Product Type</label>
                                    <select class="form-control " name="form[ItemTypeId]" id="ItemTypeId">
                                        <option value="" >--------Select---------</option>
                                         <?php foreach ($types as $type): ?>
                                             <option <?= $result->ItemTypeId == $type->itemTypeId ? "selected":"" ?>  value="<?= $type->itemTypeId ?>" ><?= $type->ItemTypeName ?></option>
                                         <?php endforeach; ?>
                                    </select>
                                    <?= form_error('form[ItemTypeId]') ?>
                                </fieldset>
                                </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <fieldset class="form-group">
                                    <label for="ItemModelId">Brand</label>
                                    <select class="form-control " name="form[ItemBrandId]" id="ItemBrandId">
                                        <option value="" >--------Select---------</option>
                                        <?php foreach ($brands as $brand): ?>
                                            <option <?= $result->ItemBrandId == $brand->itemBrandId ? "selected":"" ?>   value="<?= $brand->itemBrandId ?>" ><?= $brand->ItemBrandName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('form[ItemBrandId]') ?>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12  ">

                                <fieldset class="form-group">
                                    <label for="ItemModelId">Product Model</label>
                                    <select class="form-control " name="form[ItemModelId]" id="ItemModelId">
                                        <option value="" >--------Select---------</option>
                                        <?php foreach ($models as $model): ?>
                                            <option <?= $result->ItemModelId == $model->itemModelId ? "selected":"" ?>   value="<?= $model->itemModelId ?>" ><?= $model->ItemModelName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('form[ItemModelId]') ?>
                                </fieldset>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <fieldset class="form-group">
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
                                </fieldset>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 ">


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Item Code</label>
                                    <input type="text" class="form-control" name="form[ItemCode]" id="ItemCode"
                                           value="<?= $result->ItemCode ?>"
                                           placeholder="Item Code">
                                    <?= form_error('form[ItemCode]') ?>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Item Name</label>
                                    <input type="text" class="form-control" name="form[ItemName]" id="ItemName"
                                           value="<?= $result->ItemName ?>"
                                           placeholder="Item Name">
                                    <?= form_error('form[ItemName]') ?>
                                </fieldset>

                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success pull-right " > Save </button>



                    <?= form_close() ?>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div>
<!-- container -->

<!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view('includes/footer_start.php') ?>
<!-- extra js start -->
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
